<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class hall extends Admin_Controller {

	protected $_type = array(1 => '依照設定折扣', 2 => '低價商品館 (滿額折扣結帳)', 3 => '滿件折扣' );
	protected $_status = array(1 => '啟用', 2 => '停用');
	protected $_discount_type = array(1 => '%折扣', 2 => '金額折扣');
	protected $_isShow = array(1 => '是', 2 => '否');

	function __construct()
	{
		parent::__construct();
		$this->forceLogin();
	}

	public function index()
	{
	    $this->data['widget'] = array();
	    $this->load->model("hall_model");

	    //$this->load->model("Product_model");
	    $this->data["lang"]	= $this->currentLang;

	    $halls = $this->hall_model->findAll();

	    foreach ($halls as $key => $hall){
	        $halls[$key]['status'] = @$this->_status[$hall['status']];
	        $halls[$key]['type'] = @$this->_type[$hall['type']];
	        $halls[$key]['discount_type'] = @$this->_discount_type [$hall['discount_type']];
	        $halls[$key]['discount2'] = $hall['discount_type']==1? ($hall['discount']*100)."%" : number_format($hall['discount'])."元";
	        $halls[$key]['is_show'] = @$this->_isShow[$hall['is_show']];
	    }

	    $this->data['halls'] = $halls;

	    if (@$_SESSION['errMsg']){
	        $this->data['errMsg'] = $_SESSION['errMsg'];
	        unset($_SESSION['errMsg']);
	    }

	    $this->load->view('admin/inc/head',$this->data);
	    $this->load->view('admin/hall/index',$this->data);
	}

	// 新增
	public function create() {

		foreach ($this->listLang as $lang) {
			$this->data['landCodes'][$lang["code"]] = $lang["code"];
		}
		$this->data["css_include"] 	= "widget";
		$this->data['isNew'] = true;

		// 取得所有商品
		$this->load->model("Product_model");
		$this->data['produsts'] = $this->Product_model->findAll($this->currentLang, false, 2);

		$this->data['widget'] = array();
		$this->data["lang"] = $this->currentLang;
		$this->data['type'] = $this->_type;
		$this->data['status'] = $this->_status;
		$this->data['discount_type'] = $this->_discount_type;
		$this->data['isShow'] = $this->_isShow;

		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/hall/edit',$this->data);
	}

	// 修改
	public function edit() {

	    $this->load->model("hall_model");
	    $this->load->model("Product_model");

	    foreach ($this->listLang as $lang) {
	        $this->data['landCodes'][$lang["code"]] = $lang["code"];
	    }
	    $this->data["css_include"] 	= "widget";
	    $this->data['isNew'] = false;

	    $id = $_GET['id'];

	    $data = $this->hall_model->getById($id);  
	    $data['hall']['discount'] = $data['hall']['discount_type']==1 ? $data['hall']['discount']*100 : number_format($data['hall']['discount']);
	    $this->data['data'] = $data;

	    // 取得所有商品
	    $this->data['produsts'] = $this->Product_model->findAll($this->currentLang, false, 2);

	    $this->data['widget'] = array();
	    $this->data["lang"] = $this->currentLang;
	    $this->data['type'] = $this->_type;
	    $this->data['status'] = $this->_status;
	    $this->data['discount_type'] = $this->_discount_type;
	    $this->data['isShow'] = $this->_isShow;
	    $this->data['description'] = stripslashes($data["description"]);

	    $this->load->view('admin/inc/head',$this->data);
	    $this->load->view('admin/hall/edit',$this->data);
	}


	// 刪除
	public function delete()
	{
	    $id = (int) $_GET['id'];

	    if ($id){
	        $this->load->model("hall_model");
	        $this->hall_model->delete($id);
	    }

	    $_SESSION['errMsg'] = '刪除成功';

	    redirect('/admin/hall/index');
	}

	// 儲存動作
	public function save(){

	    try {
	        $this->load->model("hall_model");

	        $isNew = $_POST['isNew'];
	        $type = $_POST['type'];
	        $status = $_POST['status'];
	        $discount_type = $_POST['discount_type'];
	        $discount = $discount_type==1? $_POST['discount']/100 : $_POST['discount'];
	        $product_ids = $_POST['products'];
	        $description = $_POST['description'];

	        $errProduct = array();

	        if ($status == 1){

	            $id = false;

	            if (!$isNew){
	                $id = (int) $_POST['id'];
	            }
	            //TODO 檢查產品衝突
	            foreach ($product_ids as $product_id){
	                $temp = array();
	                $temp = $this->hall_model->checkProduct($product_id, $id);
	                if ($temp){
	                    $errProduct[] = $temp;
	                }
	            }
	        }

	        if ($errProduct){
	            $msg = '';
	            foreach ($errProduct as $ep ){
	                $msg .= " 產品重複設定 : ".$ep." <br/>";
	            }
	            throw new Exception($msg);
	        }

	        if ($discount_type == 1){
	            if ($discount > 1)throw new Exception('折扣 % 數設定錯誤');
	        }

	        if ($discount_type == 2){
	            $discount = (int) $discount;
	        }

	        $start_date = date('Y-m-d',strtotime($_POST['start_date']));
	        $end_date = date('Y-m-d',strtotime($_POST['end_date']));

	        if ($end_date < $start_date){
	            $temp = $end_date;
	            $end_date = $start_date;
	            $start_date = $temp;
	        }

	        $content = array();

	        if ($type == 1){
	            // 依照百分比折扣

	        }elseif ($type == 2){
	            // 低價商品館滿額結帳
	            $content['moneyLimit'] = (int) $_POST['moneyLimit'];
	        }elseif ($type == 3){
	            $content['itemUnm'] = (int) $_POST['itemUnm'];
	        }

	        $data['hall'] = array(
	            'type' => $type,
	            'discount_type' => $discount_type,
	            'discount' => $discount,
	            'product_ids' => implode(',', $product_ids ),
	            'status' => $status,
	            'content' => json_encode($content,true),
	            'description' => $_POST['ckeditor1'],
	            'is_show' => $_POST['is_show'],
	            'start_date' => $start_date,
	            'end_date' => $end_date,
	            'updateTime' => date('Y-m-d H:i:s')
	        );

	        foreach ($this->listLang as $lang) {
	            $data['hall_lang'][$lang["code"]] = array(
	                'name' => $_POST['name_'.$lang["code"]],
	                'hall_desc' => $_POST['hall_desc_'.$lang["code"]],
	                'langCode' => $lang["code"],
	            );
	        }

	        if (!$isNew){
	            $data['hall']['id'] = (int) $_POST['id'];
	        }

	        $result = $this->hall_model->saveHall($data, $isNew);

	        if ($result == false){
	            throw new Exception('儲存失敗');
	        }

	        $_SESSION['errMsg'] = '儲存成功';
	        redirect('/admin/hall/index');

	    }catch (Exception $e){
	        $message = $e->getMessage();
	        $message .= "<br/> <a herf='javascript:;' onclick=\"history.go(-1)\">回上一頁</a>";
	        show_error($message);
	    }
	}
}
