<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends Admin_Controller {

	private $sample = array(
		"detail" => array("id"=>"-1","detailKey"=>"","name"=>"","src"=>"/uploads/sample-icon.png", "tag"=>"", "alt"=>"sample","value"=>array()),
		"price" => array("id"=>"-1","priceKey"=>"","term"=>"forever","begin"=>"","end"=>"","normal"=>"0","value"=>"0"),
		"stock" => array("id"=>"-1","stockKey"=>"","formatTypeTitle"=>"","formatType"=>"F","value"=>"0","warnValue"=>"")
	);

	private $listFlag = array("0" => "待審","1" => "上架","2" => "下架","3" => "特殊上架");

	private $jsonRS = array("code"=>"-1","message"=>"系統錯誤");

	private $FancyTree = array();

	private $_typeArr = array('1' => '一般商品', '2' => '主題促銷商品', '3' => '加購商品' );

	function __construct()
	{
		parent::__construct();
		$this->forceLogin();
	}

	public function index($query)
	{
	}

	public function isMainKeyExist()
	{
		if(isset($_REQUEST['pkey']))
		{
			$this->load->model("Product_model");
			$this->data["result"] = true;


			if( !empty($_REQUEST['pkey']) && !preg_match("/[^a-z0-9]/i", $_REQUEST['pkey']) )
			{
				$this->data["result"] = $this->Product_model->isMainKeyExist($_REQUEST['pkey']);
			}
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			$this->jsonRS['post']		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}

	private function generateCatelogOptionList($list_allCatalog,&$OptionList,$prefix = "")
	{
		foreach( $list_allCatalog AS $row )
		{
			if( $row["status"] == 0 )
			{
				$OptionList.="<option value=\"{$row['id']}\">{$prefix}{$row['name']}</option>";
				if( count( $row["children"] ) > 0 )
				{
					$this->generateCatelogOptionList($row["children"],$OptionList,$prefix." -- ");
				}
			}
		}
	}

	private function generateCatelogOptionListA($list_allCatalog,&$OptionList,$prefix = "")
	{
		foreach( $list_allCatalog AS $row )
		{
			if( $row["status"] == 2 )
			{
				$OptionList.="<option value=\"{$row['id']}\" selected >{$prefix}{$row['name']}</option>";
			}
		}
	}

	public function create()
	{
	    $this->load->model("Product_model");

	    $this->data["data_product"] = array(
            "id" 			=> "-1",
            "parentId"		=> "0",
            "status"		=> "1",
            "detailKey" 	=> "",
            "priceKey" 		=> "",
            "stockKey" 		=> "",
            "itemNo"		=> "",
            "brand"			=> "",
            "createTime" 	=> date("Y-m-d H:i:s"),
            "updateTime"	=> date("Y-m-d H:i:s"),
            "touch"			=> "0",
            "flag"			=> "0",
	        "type"          => "1"
	    );

		$this->data["css_include"] 	= "product";

		$newDetail = $this->sample["detail"];
		$newDetail["langCode"] = $this->DEFAULTLANG;

		$newPrice = $this->sample["price"];
		$newPrice["currenciesIsoCode"] = $this->DEFAULTCURRENCY;
		$newPrice["begin"] 	= date("Y-m-d 00:00:00", strtotime(" -7 days"));
		$newPrice["end"] 	= date("Y-m-d 23:59:59", strtotime(" +7 days"));

		$this->data["data_detail"] = $this->convertToMutiLangObj(array($newDetail), $this->sample["detail"]);
		$this->data["data_price"]  = $this->convertToMutiCurrenciesObj(array($newPrice), $this->sample["price"]);
		$this->data["data_stock"]  = array($this->sample["stock"]);

		$this->load->model("Catalog_model");
		$allCatalog = $this->Catalog_model->LoadAll();
		$allProduct = $this->Product_model->findAll();
		$this->data["list_allCatalog"] 	= $allCatalog;

		$OptionList = "";
		$this->generateCatelogOptionList($allCatalog,$OptionList);
		$this->data["OptionList"] = $OptionList;

		$listAll = $this->putProductToCatalog($allCatalog, $allProduct);
		$this->data["listAll"] = $listAll;

		$this->currentPID = $this->data["data_product"]["id"];
		$this->data["currentPID"] = $this->keyPrefix.$this->currentPID;

		$fancyTree = $this->convertToFancyTree($listAll);
		$this->data["fancyTree"] = $fancyTree;

		$this->data["currentProductTitle"] = $this->currentProductTitle;

		$this->load->model("Formarttypeclass_model");
		$formartTypeClass = $this->Formarttypeclass_model->loadAll();
		$this->data["formartTypeClass"] = $formartTypeClass;

		$this->data["isNew"]   	   = true;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/product/edit',$this->data);
	}


	private $tempArr = array();
	private function putProductToCatalog( $catalog, $product )
	{
		$this->tempArr = array();
		$result = $catalog;

		foreach( $product AS $item )
		{
			if( $item["parentId"] == 0 )
			{
				$result[] = $item;
			}
			else
			{
				$this->recursivePutProduct( $result, $item );
			}
		}
		return $result;
	}

	private function recursivePutProduct( &$branch, $item )
	{
		foreach( $branch AS &$subBranch )
		{
			if( $subBranch["id"] == $item["parentId"] )
			{
				if( !in_array($item["PID"],$this->tempArr) )
				{
					$this->tempArr[] = $item["PID"];
					isset($subBranch["children"])?"":$subBranch["children"] = array();
					$subBranch["children"][] = $item;
				}
				break;
			}
			else if( isset($subBranch["children"]) )
			{
				$this->recursivePutProduct( $subBranch["children"], $item );
			}
		}
	}

	private $keyPrefix  = "100000";
	private $currentPID = -1;
	private $currentProductTitle = -1;
	private function convertToFancyTree($listAll, $cataSelect = array())
	{
		$FancyTree = array();
		$this->recursiveConvertItem($FancyTree, $listAll, $cataSelect);
		return $FancyTree;
	}
	private function recursiveConvertItem(&$Tree, $list, $cataSelect = array())
	{
		foreach( $list AS &$item )
		{
			/*
				{"key": "20", "title": "Simple node with active children (expand)",  "folder": true, "expanded": true, "children": [
					{"key": "20_1", "title": "Sub-item 2.1", "data": { "draggable": true } },
					{"key": "20_2", "title": "Sub-item 2.2" }
				]},
			*/

		    // 跳過商品
		    if( $item["status"] == 1 ){
		        continue;
		    }

			$Branch = array();
			$Branch["data"] = array();
			$Branch["data"]["parentId"] = $item["parentId"];


		    if (in_array($item['id'], $cataSelect)){
			    $Branch['selected'] = true;
			}

			if( $item["status"] == 0 )
			{
				$Branch["key"] 			= $item["id"];
				$Branch["title"] 		= isset($item["detail"]["name"])?$item["detail"]["name"]:$item["name"];//$item["detailKey"];
				$Branch["folder"] 		= true;
				$Branch["expanded"] 	= true;
				$Branch["data"]["id"] 	= $item["id"];
				$Branch["data"]["droppable"] = true;
			}
			if( $item["status"] == 1 )
			{
				$Branch["key"] 					= $this->keyPrefix.$item["PID"];
				$Branch["title"] 				= isset($item["detail"]["name"])?$item["detail"]["name"]:$item["name"];//$item["detailKey"];
				$Branch["data"]["id"] 			= $item["PID"];
				$Branch["data"]["droppable"] 	= false;
				if( $this->currentPID == $item["PID"] )
				{
					$this->currentProductTitle = isset($item["detail"]["name"])?$item["detail"]["name"]:$item["name"];//$item["detailKey"];
					$Branch["data"]["draggable"] = true;
				}
			}


			if( isset($item["children"]) )
			{
				$Branch["children"] = array();
				$this->recursiveConvertItem($Branch["children"], $item["children"], $cataSelect);
			}

			$Tree[] = $Branch;

		}
	}

	public function addToOften()
	{
		$this->jsonRS['post']		= $_POST;
		if(
			isset($_POST['group']) 	&&
			isset($_POST['title']) 	&&
			isset($_POST['content'])
		)
		{
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->load->model("Formarttypeclass_model");

			$this->jsonRS['resp'] 		= $this->Formarttypeclass_model->save(array(
				"id" => -1,
				"group" => $_POST['group'],
				"title" => $_POST['title'],
				"content" => $_POST['content']
			));

		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "product";

			$this->load->model("Product_model");
			$this->load->model("Catalog_model");
			$allCatalog = $this->Catalog_model->LoadAll();
			//$allCatalog = $this->Catalog_model->findAllCatalog("",$this->currentLang);
			$allProduct = $this->Product_model->findAll();
			$this->data["list_allCatalog"] 	= $allCatalog;

			$listAll = $this->putProductToCatalog($allCatalog, $allProduct);
			$this->data["listAll"] = $listAll;


			$allKey = $this->Product_model->findAllKey(array("detailKey"=>$_GET['id']));

            $prodect = $allKey[0];

            $cataSelect = explode(',', $prodect['parentId']);

			$data_detail = $this->Product_model->findDetail($allKey[0]['detailKey']);
			$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);
			$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);

			$this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
			$data_detail = $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);

			$this->sample["price"]["priceKey"] 	= $allKey[0]['priceKey'];
			$this->sample["price"]["begin"] 	= date("Y-m-d 00:00:00", strtotime(" -7 days"));
			$this->sample["price"]["end"] 		= date("Y-m-d 23:59:59", strtotime(" +7 days"));
			$data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);

			//$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
			//$data_stock = $data_stock[0];//$this->convertToMutiCurrenciesObj($data_stock, $this->sample["stock"]);

			$this->data["data_product"] = $prodect;
			$this->data["data_detail"]  = $data_detail;
			$this->data["data_price"]   = $data_price;
			$this->data["data_stock"]   = $data_stock;

			$this->currentPID = $this->data["data_product"]["id"];
			$this->data["currentPID"] = $this->keyPrefix.$this->currentPID;

			$fancyTree = $this->convertToFancyTree($listAll , $cataSelect);

			$this->data["fancyTree"] = $fancyTree;

			$this->data["currentProductTitle"] = $this->currentProductTitle;

			$this->load->model("Formarttypeclass_model");
			$formartTypeClass = $this->Formarttypeclass_model->loadAll();
			$this->data["formartTypeClass"] = $formartTypeClass;

			$this->data["isNew"]   = false;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/product/edit',$this->data);
		}
		else
		{
			redirect("/admin/article/listTable","location","301");
		}
	}

	public function copy(){
	    if(isset($_GET['id']))
	    {
	        $this->data["css_include"] 	= "product";

	        $this->load->model("Product_model");
	        $this->load->model("Catalog_model");
	        $allCatalog = $this->Catalog_model->LoadAll();
	        //$allCatalog = $this->Catalog_model->findAllCatalog("",$this->currentLang);
	        $allProduct = $this->Product_model->findAll();
	        $this->data["list_allCatalog"] 	= $allCatalog;

	        $listAll = $this->putProductToCatalog($allCatalog, $allProduct);
	        $this->data["listAll"] = $listAll;

	        $allKey = $this->Product_model->findAllKey(array("detailKey"=>$_GET['id']));

	        $prodect = $allKey[0];
	        $cataSelect = explode(',', $prodect['parentId']);

	        $data_detail = $this->Product_model->findDetail($allKey[0]['detailKey']);
	        $data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);
	        $data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);

	        $this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
	        $data_detail = $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);

	        $this->sample["price"]["priceKey"] 	= $allKey[0]['priceKey'];
	        $this->sample["price"]["begin"] 	= date("Y-m-d 00:00:00", strtotime(" -7 days"));
	        $this->sample["price"]["end"] 		= date("Y-m-d 23:59:59", strtotime(" +7 days"));
	        $data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);

	        //$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
	        //$data_stock = $data_stock[0];//$this->convertToMutiCurrenciesObj($data_stock, $this->sample["stock"]);

	        //$this->data["data_product"] = $allKey[0];
	        $this->data["data_product"] = array(
	            "id" 			=> "-1",
	            "parentId"		=> $allKey[0]['parentId'],
	            "status"		=> "1",
	            "detailKey" 	=> "",
	            "priceKey" 		=> "",
	            "stockKey" 		=> "",
	            "itemNo"		=> "",
	            "brand"			=> $prodect['brand'],
	            "createTime" 	=> date("Y-m-d H:i:s"),
	            "updateTime"	=> date("Y-m-d H:i:s"),
	            "touch"			=> "0",
	            "flag"			=> "0",
	            "type"         => 1,
	        );

	        foreach ($data_detail as $key => $val){
	            $data_detail[$key]['id'] = '';
	            $data_detail[$key]['detailKey'] = '';
	        }

	        foreach ($data_price as $key => $val){
	            $data_price[$key]['id'] = '';
	            $data_price[$key]['priceKey'] = '';
	        }

	        foreach ($data_stock as $key => $val){
	            $data_stock[$key]['id'] = '';
	            $data_stock[$key]['stockKey'] = '';
	        }


	        $this->data["data_detail"]  = $data_detail;
	        $this->data["data_price"]   = $data_price;
	        $this->data["data_stock"]   = $data_stock;

	        $this->currentPID = $this->data["data_product"]["id"];
	        $this->data["currentPID"] = $this->keyPrefix.$this->currentPID;

	        $fancyTree = $this->convertToFancyTree($listAll , $cataSelect);

	        $this->data["fancyTree"] = $fancyTree;

	        $this->data["currentProductTitle"] = $this->currentProductTitle;

	        $this->load->model("Formarttypeclass_model");
	        $formartTypeClass = $this->Formarttypeclass_model->loadAll();
	        $this->data["formartTypeClass"] = $formartTypeClass;

	        $this->data["isNew"]   = true;
	        $this->load->view('admin/inc/head',$this->data);
	        $this->load->view('admin/product/edit',$this->data);
	    }
	    else
	    {
	        redirect("/admin/article/listTable","location","301");
	    }
	}

	public function editA()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "product";

			$this->load->model("Product_model");
			$this->load->model("Catalog_model");
			$this->load->model("Option_model");

			$allCatalog = $this->Catalog_model->LoadAType();
			$allProduct = $this->Product_model->findAll();
			//get shipping data
			$this->data["shippingDataAry"] = $this->Option_model->readVal("ShippingData");

			$this->data["list_allCatalog"] 	= $allCatalog;

			$listAll = $this->putProductToCatalog($allCatalog, $allProduct);
			$this->data["listAll"] = $listAll;

			$this->generateCatelogOptionListA($allCatalog,$OptionList);
			$this->data["OptionList"] = $OptionList;


			$allKey = $this->Product_model->findAllKey(array("detailKey"=>$_GET['id']));
			$data_detail = $this->Product_model->findDetail($allKey[0]['detailKey']);
			$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);
			$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);
//print_r($allKey) ;
			$this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
			$data_detail = $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);

			$this->sample["price"]["priceKey"] 	= $allKey[0]['priceKey'];
			$this->sample["price"]["begin"] 	= date("Y-m-d 00:00:00", strtotime(" -7 days"));
			$this->sample["price"]["end"] 		= date("Y-m-d 23:59:59", strtotime(" +7 days"));
			$data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);

			//$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
			//$data_stock = $data_stock[0];

			$this->data["data_product"] = $allKey[0];
			$this->data["data_detail"]  = $data_detail;
			$this->data["data_price"]   = $data_price;
			$this->data["data_stock"]   = $data_stock;

			$this->currentPID = $this->data["data_product"]["id"];
			$this->data["currentPID"] = $this->keyPrefix.$this->currentPID;

			$this->load->model("Formarttypeclass_model");
			$formartTypeClass = $this->Formarttypeclass_model->loadAll();
			$this->data["formartTypeClass"] = $formartTypeClass;

			$fancyTree = $this->convertToFancyTree($listAll);
			$this->data["fancyTree"] = $fancyTree;

			$this->data["currentProductTitle"] = $this->currentProductTitle;

			$this->data["isNew"]   = false;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/productA/edit',$this->data);
		}
		else
		{
			redirect("admin/productA/index","location","301");
		}
	}

	public function changeParentIdBySelfId()
	{
		$this->jsonRS["POST"] = $_POST;
		if( isset($_POST['id']) &&
			isset($_POST['parentId'])
		)
		{
			$this->load->model("Product_model");
			$saveData = array();
			$saveData["id"] 			= $_POST['id'];
			$saveData["parentId"] 		= $_POST['parentId'];
			$saveData["updateTime"] 	= date("Y-m-d H:i:s");

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message']	= '操作完成';
			$this->jsonRS["result"] 	= $this->Product_model->saveProduct($saveData);
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function save()
	{
		if(
			isset($_POST['data_product']) 	&&
			isset($_POST['data_detail']) 	&&
			isset($_POST['data_price']) 	&&
			isset($_POST['data_stock'])
		)
		{
			$this->load->model("Product_model");

			$this->data["result"]   = array();
			$isNew = isset($_POST['isNew']);
			$this->data["result"]["product"] 	= $this->Product_model->saveProduct($_POST['data_product'],$isNew);
			$this->data["result"]["detail"] 	= $this->Product_model->saveDetail($_POST['data_detail'],$isNew);
			$this->data["result"]["price"] 		= $this->Product_model->savePrice($_POST['data_price'],$isNew);
			$this->data["result"]["stock"] 		= $this->Product_model->saveStock($_POST['data_stock'],$isNew);

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			$this->jsonRS['post']		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else
		{
			redirect("/admin/article/listTable","location","301");
		}
	}

	public function delete()
	{
		if( isset($_POST['mainKey']) )
		{
			$this->load->model("Product_model");
			$resp = $this->Product_model->delete($_POST['mainKey']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}

	public function listTable()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();

		$this->load->model("Product_model");
		$this->data["lang"] 	= $this->currentLang;

		$products = $this->Product_model->findAll();

		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
		    if ($_POST['start'] && $_POST['end']){

		        $this->data['start'] = $start = $_POST['start'];
		        $this->data['end'] = $end = $_POST['end'];

		        foreach ($products as $key => $val){
		            if (is_array($val['stock'])){
		                foreach ($val['stock'] as $skey => $sval){
		                    if ($sval['value'] < $start ||$sval['value']>$end ){
		                        unset($products[$key]['stock'][$skey]);
		                    }
		                }
		            }else if ($val['stock'] < $start|| $val['stock'] > $end){
		                unset($products[$key]);
		                continue;
		            }

		            if (empty($products[$key]['stock'])){
		                unset($products[$key]);
		            }
		        }
		    }
		}

		$key = '';

		foreach ($products as $key => $product){
		    $tempTypes = array();
		    $tempType = '';
		    $temp = array();
            if ($product['type']){
              $tempTypes = explode(',', $product['type']);
              foreach ($tempTypes as $tempType){
                  $temp[] = $this->_typeArr[$tempType];
              }
              $products[$key]['showType'] = implode(',', $temp);
            }
		}

		$this->data['products'] = $products;

		if (@$_SESSION['errMsg']){
		    $this->data['errMsg'] = $_SESSION['errMsg'];
		    unset($_SESSION['errMsg']);
		}

		$this->data["listFlag"] = $this->listFlag;

		if(isset($_GET) && !is_null($_GET))
		{
			if ($_GET['excel'] == 1)
			{
			    error_reporting(0);

			    $content = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			    $content .= "<table>";

			    $content .="<tr>
			        <td>商品標題 (名稱)</td>
			        <td>上架狀態</td>
			        <td>商品屬性</td>
			        <td>低庫存警告(安全庫存)數量</td>
			        <td>現有庫存量</td>
			        <td>安全庫存量差</td>
			        </tr>";

			    foreach ($this->data['products'] as $product){

			        if (is_null($product['warnValue']))$product['warnValue'] = 0;

			        $product['stock'] = (int) $product['stock'];

			        $val = $product['stock'] - $product['warnValue'];

			        $content.="<tr>";

			        $content.= "<td>{$product["detail"]["name"]}</td>";
			        $content.= "<td>{$this->listFlag[$product['flag']]}</td>";
			        $content.= "<td>{$product['showType']}</td>";
			        $content.= "<td>{$product['warnValue']}</td>";
			        $content.= "<td>{$product['stock']}</td>";
			        $content.= "<td>{$val}</td>";

			        $content.="</tr>";

			    }

			    $content .= "</table>";


			    $content = preg_replace("/<a[^>]*>/i", "", $content);
			    $content = preg_replace("/<\/a>/i", "", $content);
			    $report['reportName'] = empty($report['reportName']) ? 'reportFile' : $report['reportName'];
			    header("Content-Type: application/vnd.ms-excel; charset=utf-8");
			    header("Content-Disposition: inline; filename=\"" . $report['reportName'] . ".xls\"");
			    //$this->load->view('admin/product/excel',$this->data);
			    echo $content;
			    exit;

			}
		}
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/product/index',$this->data);
	}

	public function listTableA()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();

		$this->load->model("Product_model");
		$this->data["lang"] 	= $this->currentLang;
		$this->data['products'] = $this->Product_model->findAllofA();

		$this->data["listFlag"] = $this->listFlag;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/productA/index',$this->data);
	}

	public function changeFlag()
	{
		$this->jsonRS['post']		= $_POST;
		if(
			isset($_POST['id']) 	&&
			isset($_POST['flag'])
		)
		{
			$this->load->model("Product_model");
			$saveData = array();
			$saveData["id"] 		= $_POST['id'];
			$saveData["flag"]		= $_POST['flag'];
			$saveData["flagVar"] 	= (isset($_POST['flagVar']))?json_encode($_POST['flagVar']):"";

			$this->data["result"] = $this->Product_model->saveProduct($saveData, false);

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function createA()   //加價購商品
	{
		$this->data["css_include"] 	= "product";

		$this->data["data_product"] = array(
				"id" 			=> "-1",
				"parentId"		=> "0",
				"status"		=> "3",
				"detailKey" 	=> "",
				"priceKey" 		=> "",
				"stockKey" 		=> "",
				"shippingKey" 	=> "",
				"id" 			=> "-1",
				"createTime" 	=> date("Y-m-d H:i:s"),
				"updateTime"	=> date("Y-m-d H:i:s"),
				"touch"			=> "0",
				"flag"			=> "0"
		);
		//get shipping Data
		$this->load->model("Option_model");
		$this->data["shippingDataAry"] = $this->Option_model->readVal("ShippingData");

		$newDetail = $this->sample["detail"];
		$newDetail["langCode"] = $this->DEFAULTLANG;

		$newPrice = $this->sample["price"];
		$newPrice["currenciesIsoCode"] = $this->DEFAULTCURRENCY;
		$newPrice["begin"] 	= date("Y-m-d 00:00:00", strtotime(" -7 days"));
		$newPrice["end"] 	= date("Y-m-d 23:59:59", strtotime(" +7 days"));

		$this->data["data_detail"] = $this->convertToMutiLangObj(array($newDetail), $this->sample["detail"]);
		$this->data["data_price"]  = $this->convertToMutiCurrenciesObj(array($newPrice), $this->sample["price"]);
		$this->data["data_stock"]  = array($this->sample["stock"]);

		$this->load->model("Product_model");
		$this->load->model("Catalog_model");
		$allCatalog = $this->Catalog_model->LoadAType();
		$allProduct = $this->Product_model->findAll();
		$this->data["list_allCatalog"] 	= $allCatalog;
//print_r($allCatalog) ;
		if (isset($allCatalog[0]["id"]) ){  //set 加價購 分類ID
			$tmpCatelogAry =  $this->data["data_product"] ;
			$tmpCatelogAry["parentId"] = $allCatalog[0]["id"] ;
			$this->data["data_product"] = $tmpCatelogAry ;
		}

		$listAll = $this->putProductToCatalog($allCatalog, $allProduct);
		$this->data["listAll"] = $listAll;

		$OptionList = "";
		$this->generateCatelogOptionListA($allCatalog,$OptionList);
		$this->data["OptionList"] = $OptionList;

		$this->currentPID = $this->data["data_product"]["id"];
		$this->data["currentPID"] = $this->keyPrefix.$this->currentPID;

		$this->load->model("Formarttypeclass_model");
		$formartTypeClass = $this->Formarttypeclass_model->loadAll();
		$this->data["formartTypeClass"] = $formartTypeClass;

		$fancyTree = $this->convertToFancyTree($listAll);
		$this->data["fancyTree"] = $fancyTree;

		$this->data["currentProductTitle"] = $this->currentProductTitle;

		$this->data["isNew"]   	   = true;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/productA/edit',$this->data);
	}

	public function createB()
	{
		$this->data["css_include"] 	= "product";

		$this->data["data_product"] = array(
				"id" 			=> "-1",
				"parentId"		=> "0",
				"status"		=> "1",
				"detailKey" 	=> "",
				"priceKey" 		=> "",
				"stockKey" 		=> "",
				"id" 			=> "-1",
				"createTime" 	=> date("Y-m-d H:i:s"),
				"updateTime"	=> date("Y-m-d H:i:s")
		);

		$this->data["data_detail"] = array(
			"en" 	  => array(
				"id" 		=> "-1",
				"alt" 		=> "",
				"detailKey" => "",
				"langCode"	=> "en",
				"name"		=> "",
				"src"		=> "uploads/sample-icon.png",
				"value"		=> array(
					"description" => "",
					"image"		  => array(),
					"UI"		  => array()
				)
			),
			"zh-hant" => array(
				"id" 		=> "-1",
				"alt" 		=> "",
				"detailKey" => "",
				"langCode"	=> "zh-hant",
				"name"		=> "",
				"src"		=> "uploads/sample-icon.png",
				"value"		=> array(
					"description" => "",
					"image"		  => array(),
					"UI"		  => array()
				)
			),
			"zh-hans" => array(
				"id" 		=> "-1",
				"alt" 		=> "",
				"detailKey" => "",
				"langCode"	=> "zh-hans",
				"name"		=> "",
				"src"		=> "uploads/sample-icon.png",
				"value"		=> array(
					"description" => "",
					"image"		  => array(),
					"UI"		  => array()
				)
			)
		);
		$this->data["data_price"]  = array(
			"id"	 			=> "-1",
			"priceKey"			=> "",
			"normal" 			=> "0",
			"value"  			=> "0",
			"term"  			=> "forever",
			"begin"  			=> date("Y-m-d 00:00:00",strtotime(" -7days")),
			"end"  				=> date("Y-m-d 23:59:59",strtotime(" +7days")),
			"currenciesIsoCode" => "TWD"
		);
		$this->data["data_stock"]   = array(
			"id"	 			=> "-1",
			"stockKey"			=> "",
			"value"  			=> "1000"
		);

		$this->load->model("Catalog_model");
		$allCatalog = $this->Catalog_model->findAllCatalog("",$this->currentLang);
		$this->data["list_allCatalog"] 	= $allCatalog;

		$this->data["isNew"]   	   = true;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/productB/edit',$this->data);
	}

	public function editB()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "product";


			$this->load->model("Catalog_model");
			$allCatalog = $this->Catalog_model->findAllCatalog("",$this->currentLang);
			$this->data["list_allCatalog"] 	= $allCatalog;

			$this->load->model("Product_model");

			$allKey = $this->Product_model->findAllKey(array("detailKey"=>$_GET['id']));
			$data_detail = $this->Product_model->findDetail($allKey[0]['detailKey']);
			$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);
			$data_price  = $data_price[0];
			$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);
			$data_stock  = $data_stock[0];

			$new_dataDetail = array();
			foreach( $data_detail AS $detail )
			{
				$new_dataDetail[$detail["langCode"]] = $detail;
			}
			$this->data["data_product"] = $allKey[0];
			$this->data["data_detail"]  = $new_dataDetail;
			$this->data["data_price"]   = $data_price;
			$this->data["data_stock"]   = $data_stock;
			$this->data["isNew"]   = false;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/productB/edit',$this->data);
		}
		else
		{
			redirect("/admin/product/listTableB","location","301");
		}
	}

	public function listTableB()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();


		$this->load->model("Product_model");
		$this->data["lang"] 	= $this->currentLang;
		$this->data['products'] = $this->Product_model->findAll($this->currentLang);
		//$this->debugOut($this->data['products']);
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/productB/index',$this->data);
	}

	// 加購品介面
	public function addP(){

	    $this->data["css_include"] 	= "widget";
	    // 取得所有商品
	    $this->load->model("Product_model");
	    $this->data['produsts'] = $this->Product_model->findAll($this->currentLang, false, 3);

	    $id = (int) $_GET['id'];

	    if (!$id){
	        redirect("/admin/product/listTable","location","301");
	        exit;
	    }

	    $data = $this->Product_model->find($id);

	    $this->data['id'] = $id;
	    $this->data['add_product_ids'] = $data[0]['add_product_ids'];

	    $this->load->view('admin/inc/head',$this->data);
	    $this->load->view('admin/product/addP',$this->data);
	}

	public function saveAddP(){

	    $id = (int) $_POST['id'];
	    $productIds = $_POST['products'];

	    if (!$productIds)$productIds = array();

	    $this->load->model("Product_model");
	    $this->Product_model->saveAddProducts($id, $productIds);

	    $_SESSION['errMsg'] = '儲存成功';

	    redirect("/admin/product/listTable");
	}


}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */