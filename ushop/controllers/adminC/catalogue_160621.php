<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Catalogue extends Admin_Controller {

	private $sample = array(
		"detail" => array("id"=>"-1","detailKey"=>"","name"=>"","src"=>"/uploads/sample-icon.png","alt"=>"sample","value"=>array()),
		"price" => array("id"=>"-1","priceKey"=>"","term"=>"forever","begin"=>"","end"=>"","normal"=>"0","value"=>"0"),
		"stock" => array("id"=>"-1","stockKey"=>"","formartType"=>"F","value"=>"0")
	);
	
	private $jsonRS = array("code"=>"-1","message"=>"系統錯誤");		
	
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
			$this->load->model("Catalog_model");
			$this->data["result"] = true;
			
			
			if( !empty($_REQUEST['pkey']) && !preg_match("/[^a-z0-9]/i", $_REQUEST['pkey']) )
			{
				$this->data["result"] = $this->Catalog_model->isMainKeyExist($_REQUEST['pkey']);
			}
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			$this->jsonRS['post']		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
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
	private function convertToFancyTree($listAll)
	{
		$FancyTree = array();
		$this->recursiveConvertItem($FancyTree, $listAll);		
		return $FancyTree;				
	}
	private function recursiveConvertItem(&$Tree, $list)
	{
		foreach( $list AS &$item )
		{
			/*
				{"key": "20", "title": "Simple node with active children (expand)",  "folder": true, "expanded": true, "children": [
					{"key": "20_1", "title": "Sub-item 2.1", "data": { "draggable": true } },
					{"key": "20_2", "title": "Sub-item 2.2" }
				]},
			*/	
			$Branch = array();	
			$Branch["data"] = array();
			$Branch["data"]["parentId"] = $item["parentId"];
			
			if( $item["status"] == 0 )
			{
				$Branch["key"] 			= $item["id"];
				$Branch["title"] 		= isset($item["detail"]["name"])?$item["detail"]["name"]:$item["name"];//["detailKey"];
				$Branch["folder"] 		= true;		
				$Branch["expanded"] 	= true;		
				$Branch["data"]["id"] 	= $item["id"];
				$Branch["data"]["droppable"] = true;
				if( $this->currentPID == $item["id"] )
				{
					$this->currentProductTitle = isset($item["detail"]["name"])?$item["detail"]["name"]:$item["name"];//$item["detailKey"];
					$Branch["data"]["draggable"] = true;
				}				
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
				$this->recursiveConvertItem($Branch["children"], $item["children"]);
			}			
			$Tree[] = $Branch;
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
	

	public function create()
	{
		$this->data["css_include"] 	= "product";
		
		$this->data["data_product"] = array(
				"id" 			=> "-1",
				"parentId"		=> "0",
				"status"		=> "0",
				"detailKey" 	=> "",
				"priceKey" 		=> "",
				"stockKey" 		=> "",
				"id" 			=> "-1",
				"id" 			=> "-1",
				"createTime" 	=> date("Y-m-d H:i:s"),
				"updateTime"	=> date("Y-m-d H:i:s")
		);
		
		
		
		$newDetail = $this->sample["detail"];
		$newDetail["langCode"] = $this->DEFAULTLANG;		
		$this->data["data_detail"] = $this->convertToMutiLangObj(array($newDetail), $this->sample["detail"]);
		
		$newPrice = $this->sample["price"];		
		$newPrice["currenciesIsoCode"] = $this->DEFAULTCURRENCY;
		$newPrice["begin"] 	= date("Y-m-d")." 00:00:00";
		$newPrice["end"] 	= date("Y-m-d")." 23:59:59";
		$this->data["data_price"]  = $this->convertToMutiCurrenciesObj(array($newPrice), $this->sample["price"]);	
		$this->data["data_stock"]  = array($this->sample["stock"]);

		$this->load->model("Product_model");	
		$this->load->model("Catalog_model");
		$allCatalog = $this->Catalog_model->LoadAll();
		$allProduct = $this->Product_model->findAll();
		$this->data["list_allCatalog"] 	= $allCatalog;
		
		$OptionList = "";
		$this->generateCatelogOptionList($allCatalog,$OptionList);
		$this->data["OptionList"] = $OptionList;
			
		$listAll = $this->putProductToCatalog($allCatalog, $allProduct);			
		$this->data["listAll"] = $listAll;			
			
		$this->data["currentPID"] = $this->currentPID;
					
		$fancyTree = $this->convertToFancyTree($listAll);
		$this->data["fancyTree"] = $fancyTree;					

		$this->data["currentProductTitle"] = $this->currentProductTitle;
			
		$this->data["isNew"] = true;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/catalog/edit',$this->data);
	}
	
	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "product";
			
			$this->load->model("Product_model");	
			$this->load->model("Catalog_model");
			$allCatalog = $this->Catalog_model->LoadAll();
			$allProduct = $this->Product_model->findAll();
			$this->data["list_allCatalog"] 	= $allCatalog;
			
			$listAll = $this->putProductToCatalog($allCatalog, $allProduct);			
			$this->data["listAll"] = $listAll;			
			
			$allKey = $this->Catalog_model->findAllKey(array("detailKey"=>$_GET['id']));
			$data_detail = $this->Catalog_model->findDetail($allKey[0]['detailKey']);
			$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);		
			$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);
			
			
			$this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
			
			$this->data["data_product"] = $allKey[0];	
			$this->data["data_detail"] 	= $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);
			
			$this->sample["price"]["priceKey"] = $allKey[0]['priceKey'];
			$data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);
			$this->data["data_price"]   = $data_price;	
			/*
			$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
			$data_stock = isset($data_stock[0]) ? $data_stock[0] : $this->sample["stock"];
			empty($data_stock["stockKey"])?$data_stock["stockKey"]=$allKey[0]['detailKey']:"";
			*/
			$this->data["data_stock"]   = $data_stock;
			
			$this->currentPID = $this->data["data_product"]["id"];
			$this->data["currentPID"] = $this->currentPID;
						
			$fancyTree = $this->convertToFancyTree($listAll);
			$this->data["fancyTree"] = $fancyTree;					

			$this->data["currentProductTitle"] = $this->currentProductTitle;			
			
			
			$this->data["isNew"]   = false;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/catalog/edit',$this->data);
		}
		else 
		{
			redirect("/admin/article/listTable","location","301");
		}
	}
	
	public function save()
	{
		
		if(
			isset($_POST['data_product']) 	&&
			isset($_POST['data_detail']) 
		)
		{
			$this->load->model("Catalog_model");	
			$this->load->model("Product_model");				
			$this->data["result"]   = array();
			
			$isNew = isset($_POST['isNew']);
			$this->data["result"]["product"] 	= $this->Catalog_model->saveProduct($_POST['data_product'],$isNew);
			$this->data["result"]["detail"] 	= $this->Catalog_model->saveDetail($_POST['data_detail'],$isNew);
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
			$this->load->model("Catalog_model");
			$resp = $this->Catalog_model->delete($_POST['mainKey']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}
	
	public function banner($method="index")
	{
		if( $method == "index" )
		{
			if(isset($_GET['id']))
			{
				$this->data["css_include"] 	= "product";
				
				$this->load->model("Product_model");	
				$this->load->model("Catalog_model");
				$allCatalog = $this->Catalog_model->LoadAll();
				$allProduct = $this->Product_model->findAll();
				$this->data["list_allCatalog"] 	= $allCatalog;
				
				$listAll = $this->putProductToCatalog($allCatalog, $allProduct);			
				$this->data["listAll"] = $listAll;			
				
				$allKey = $this->Catalog_model->findAllKey(array("detailKey"=>$_GET['id']));
				$data_detail = $this->Catalog_model->findDetail($allKey[0]['detailKey']);
				$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);		
				$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);
				
				
				$this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
				
				$this->data["data_product"] = $allKey[0];	
				$this->data["data_detail"] 	= $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);
				
				$this->sample["price"]["priceKey"] = $allKey[0]['priceKey'];
				$data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);
				$this->data["data_price"]   = $data_price;	
				
				$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
				$data_stock = isset($data_stock[0]) ? $data_stock[0] : $this->sample["stock"];
				empty($data_stock["stockKey"])?$data_stock["stockKey"]=$allKey[0]['detailKey']:"";
				$this->data["data_stock"]   = $data_stock;
				
				$this->currentPID = $this->data["data_product"]["id"];
				$this->data["currentPID"] = $this->currentPID;
							
				$fancyTree = $this->convertToFancyTree($listAll);
				$this->data["fancyTree"] = $fancyTree;					

				$this->data["currentProductTitle"] = $this->currentProductTitle;			
				
				$this->data["bannerId"] = $_GET['id'];
				
				$this->data["isNew"]   = false;
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/catalog/banner',$this->data);
			}
			else 
			{
				redirect("/admin/article/listTable","location","301");
			}
		}
		else if( $method == "slider" )
		{
			if( isset($_GET['id']) && isset($_GET['sid']) && isset($_GET["sl"]) )
			{
				$this->data["css_include"] 	= "product";
				
				$this->load->model("Product_model");	
				$this->load->model("Catalog_model");
				$allCatalog = $this->Catalog_model->LoadAll();
				$allProduct = $this->Product_model->findAll();
				$this->data["list_allCatalog"] 	= $allCatalog;
				
				$listAll = $this->putProductToCatalog($allCatalog, $allProduct);			
				$this->data["listAll"] = $listAll;			
				
				$allKey = $this->Catalog_model->findAllKey(array("detailKey"=>$_GET['id']));
				$data_detail = $this->Catalog_model->findDetail($allKey[0]['detailKey']);
				$data_price  = $this->Product_model->findPrice($allKey[0]['priceKey']);		
				$data_stock  = $this->Product_model->findStock($allKey[0]['stockKey']);
				
				$this->sample["detail"]["detailKey"] = $allKey[0]['detailKey'];
				
				$this->data["data_product"] = $allKey[0];	
				$this->data["data_detail"] 	= $this->convertToMutiLangObj($data_detail, $this->sample["detail"]);
				
				$this->sample["price"]["priceKey"] = $allKey[0]['priceKey'];
				$data_price = $this->convertToMutiCurrenciesObj($data_price, $this->sample["price"]);
				$this->data["data_price"]   = $data_price;	
				
				$this->sample["stock"]["stockKey"] = $allKey[0]['stockKey'];
				$data_stock = isset($data_stock[0]) ? $data_stock[0] : $this->sample["stock"];
				empty($data_stock["stockKey"])?$data_stock["stockKey"]=$allKey[0]['detailKey']:"";
				$this->data["data_stock"]   = $data_stock;
				
				$this->currentPID = $this->data["data_product"]["id"];
				$this->data["currentPID"] = $this->currentPID;
							
				$fancyTree = $this->convertToFancyTree($listAll);
				$this->data["fancyTree"] = $fancyTree;					

				$this->data["currentProductTitle"] = $this->currentProductTitle;			
				
				$this->data["bannerLang"] 	= $_GET['sl'];
				$this->data["bannerId"]		= $_GET['id'];
				$this->data["sliderId"] 	= $_GET['sid'];
				
				$this->data["isNew"]   = false;
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/catalog/banner_slider',$this->data);
			}
			else 
			{
				redirect("/admin/article/listTable","location","301");
			}
		}
		else 
		{
			redirect("/admin/article/listTable","location","301");
		}
	}
	
	public function listTable()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->load->model("Catalog_model");	
		$this->data["lang"] = $this->currentLang;
		$this->data['catalog'] = $this->Catalog_model->findAll($this->currentLang);
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/catalog/index',$this->data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */