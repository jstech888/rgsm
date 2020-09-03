<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
		$this->data['sampleImage'] = $this->sampleImage;

        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];
	}
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "system error!"
	);
	
	private $mapping_title = array(
		"LogoBanner" 	 		=> "商店LOGO橫幅",
		"ProductNavTabsHot" 	=> "最新商品",
		"ProductNavTabsReal"	=> "熱門商品",
		"ProductNavTabsStock" 	=> "現貨專區",
		"hotNews"    	 		=> "精選部落文",
		"News"			 		=> "最新消息",
		"MainMenu" 		 		=> "主選單",
		"HomeSlider"	 		=> "大圖輪播",
		"ProductSlider"	 		=> "產品大圖輪播",
		"GridBlock1"	 		=> "格狀廣告1",
		"GridBlock"		 		=> "格狀廣告",
		"SingleVideo"		 	=> "單格影音廣告",
		"promotionBlock"		=> "促銷專區",
		"MemberRight"			=> "會員權益",
		"footer"		 		=> "頁尾設置",
		"footerB"		 		=> "頁尾設置",
		"BrandList"				=> "品牌",
		//部落格
		"blogSlider"	 		=> "部落格主頁 大圖輪播",
		//主題活動
		"activitySlider" 		=> "大圖輪播",
		"adList" 				=> "小圖輪播",

		"activityWidgetSlider"	=> "廣告輪播",
		"PromotionBlock" 		=> "精選區塊"
	);
	
	private $MainSlider = array("HomeSlider" => "WHSlidert-Effect","homeslider" => "WHSlidert-Effect","activitySlider" => "ActSlider-Effect", "blogSlider" => "BlogSlider-Effect", "activityWidgetSlider" => "ActivityWidgetSlider-Effect","ProductSlider" => "WHSlidert-Effect","productslider" => "WHSlidert-Effect" );
	
	public function edit($query)
	{
		if( isset($_GET["id"]) )
		{
			$this->data["css_include"] 	= "widget";
			$this->data["key"] 			= $query;
			$this->data["title"] 		= $this->mapping_title[$query];
			
			$this->load->model("Widget_model","mWidget");
			$result = $this->mWidget->read_RecordByWhereCase( array("id" => $_GET['id']) );
			
			$arr_data = array();
			foreach($result AS $row)
			{
				$arr_data 					= $row;
				$arr_data["value"] 			= json_decode($row["value"],true);
			}
			$this->data["widget"] = $arr_data;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/home/edit/'.$query,$this->data);
		}
		else
		{
			redirect("/admin/widget/footer","location",301);			
		}
	}
	
	public function find($query,$return = false)
	{		
		if( $query == "edit" )
		{
			$this->edit($return);
			return;
		}
		
		$this->data["css_include"] 	= "widget";
		$this->data["key"] 			= $query;		
		$this->data["title"] 		= $this->mapping_title[$query];
		
		$this->data["langCode"]		= $this->currentLang;
			
		$this->load->model("Widget_model","mWidget");
		$arr_widget =  $this->mWidget->find($query,"all");
		$new_arrWidget 	= array();
		$new_record 	= array();
		if( array_key_exists($query, $this->MainSlider) )
		{
			$this->load->model("Option_model");
			$arrRes = $this->Option_model->find($this->MainSlider[$query]);			
			$this->data["effect"] = json_decode($arrRes[0]["value"],true);
		}
		
		foreach($arr_widget AS $widget)
		{
			switch($query)
			{
				case "LogoBanner":
					$new_record = $widget;
					break;
				case "footer":
					$new_record = $widget;
					break;
				case "News":
					$new_record = $widget;
					$this->load->model("News_model");
					$this->data['articles'] = $this->News_model->findAll("news",$this->currentLang,$this->admin["id"]);
					// $this->load->model("Article_model");
					// $this->data['articles'] = $this->Article_model->findAll("brand");
					break;
				case "promotionBlock":
					$this->load->model("Product_model");
					$this->data['produsts'] = $this->Product_model->findAll($this->currentLang);
					$new_record = $widget;
					break;
				case "hotNews":
					$this->load->model("Article_model");
					$this->data['articles'] = $this->Article_model->findAll("blog");
					$new_record = $widget;
					break;
				case "ProductNavTabsHot":
					$this->load->model("Product_model");
					$this->data['produsts'] = $this->Product_model->findAll($this->currentLang);
					$new_record = $widget;
					break;
				case "ProductNavTabsReal":
					$this->load->model("Product_model");
					// $this->data['produsts'] = $this->Product_model->findAll($this->currentLang);
					$this->data['produsts'] = $this->Product_model->findAll($this->currentLang, false, 1);
					$new_record = $widget;			
					break;
				case "ProductNavTabsStock":
					$this->load->model("Product_model");
					$this->data['produsts'] = $this->Product_model->findAll($this->currentLang);
					$new_record = $widget;
					break;
				case "ProductNavTabs":
					$this->load->model("Product_model");
					$this->data['produsts'] = $this->Product_model->findAll($this->currentLang);
					$new_record = $widget;
					break;
				case "blogSlider":
				case "activitySlider":
				case "HomeSlider":
					$new_record = $widget;
					break;
				case "ProductSlider":
					$new_record = $widget;					
					break;
				default:
					$new_record = $widget;
					break;
			}				
			$new_arrWidget[$widget["langCode"]][] = $new_record;
		}
		//$this->debugOut($new_arrWidget);
		$this->data['widget'] 		= $new_arrWidget;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/home/'.$query,$this->data);
	}
	
	public function save($query="")
	{		
		$this->jsonRS['POST'] = $_POST;
		if(
			isset($_POST['type']) &&
			isset($_POST['widgetData'])
		)
		{
			$this->load->model("Widget_model","mWidget");
			$data = $_POST['widgetData'];
			$response = array();
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS['result'] 	= '';
			foreach($_POST['widgetData'] AS $langObj )
			{
				foreach($langObj AS $obj )
				{
					if(
						isset($obj['value']) &&
						isset($obj['langCode'])
					)
					{
						$save_data = array();						
						(isset($obj['id']))?$save_data['id'] = $obj['id']:'';
						$save_data['type'] 				= $_POST['type'];
						$save_data['value'] 			= json_encode($obj['value']);
						$save_data['langCode'] 			= $obj['langCode'];
						$response = array();
						$resp = $this->mWidget->save($save_data);
						$response['code'] 		= $resp;
						$response['message'] 	= $resp == "-1"?"儲存失敗":"儲存成功";
						$this->jsonRS['response'][$obj['langCode']] = $response;
					}
				}
			}
		}
			
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function delete($query="")
	{
		$this->jsonRS['POST'] = $_POST;
		if( isset($_POST['type']) && isset($_POST['id']) )
		{
			$this->load->model("widget_model","mWidget");
			$resp = $this->mWidget->delete($_POST['id']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			$this->jsonRS['result']		= $this->find($_POST['type'],true);
		}	
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function createWidget()
	{
		if( isset($_POST['type']) && isset($_POST['newItem']) )
		{
			$this->load->model("Widget_model","mWidget");
			$arr_data = $_POST['newItem'];
			foreach( $arr_data AS $k=>$widget )
			{
				UNSET($widget['id']);
				$widget['value'] 	= json_encode($widget['value']);
				$arr_data[$k] = $widget;
			}
			$resp = $this->mWidget->createWidget($arr_data);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS['resp'][]		= $resp;
			$this->jsonRS['result']		= $this->find($_POST['type'],true);
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function sortkeyHomeSlider()
	{
		$this->load->model("Widget_model","mWidget");			
		$this->load->model("Option_model","mOption");
		$resp = "";
		isset($_POST['sortkey']['itemData']) ? $resp+= $this->mWidget->sortkey($_POST['sortkey']['itemData']) : "";
		isset($_POST['effect']) ? $resp+=  $this->mOption->change($_POST['effect']['key'],json_encode($_POST['effect']['value'])) : "";
		$this->jsonRS['code'] 		= '1';
		$this->jsonRS['message'] 	= '操作完成';
		$this->jsonRS['POST'] 		= $_POST;
		$this->jsonRS['resp'][]		= $resp;
		$this->jsonRS['result']		= false;
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function sortkey($query="")
	{
		
		if(array_key_exists($query, $this->MainSlider))
		{
			$this->sortkeyHomeSlider();
			exit;
		}
		
		if( isset($_POST['itemData']) )
		{
			if ($query=="mainmenu"){
				$this->load->model("menu_model","mMenu");
				$resp = $this->mMenu->sortkey($_POST['itemData']);
			}
			else{
				$this->load->model("Widget_model","mWidget");
				$resp = $this->mWidget->sortkey($_POST['itemData']);
			}
			
			$this->load->model("Widget_model","mWidget");
			$resp = $this->mWidget->sortkey($_POST['itemData']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS['resp'][]		= $resp;
			$this->jsonRS['result']		= false;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */