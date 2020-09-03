<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Option extends Admin_Controller {
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();

        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];
	}

	private $cashflowMethod = array(
		"PayOnArrival",
		"BankRemittances",
		"CreditCard",
		"WebATM",
		"ConvenienceStorePayBarcode",
		"ConvenienceStorePayCode",
		"AliPay"
	);

	private $cashflowMethodAllpay = array(
		"PayOnArrival",
		"BankRemittances",
		"Allpay"
	);

	public function subscribe()
	{
		$this->data["css_include"] = "infopage";
		$this->data["title"] = "電子報 編輯";		
		$this->load->model("Subscribe_model","mSubscribe");
		$this->data["listMail"] = $this->mSubscribe->loadSubscribe();
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/page/subscribe',$this->data);
	}
	
	public function exportNewsLetterList()
	{
		
		$this->load->model("Subscribe_model","mSubscribe");
		$listMail = $this->mSubscribe->loadSubscribe();
		$content = "編號,信箱\r\n";
		foreach( $listMail AS $k => $order )
		{
			$content.= implode(",", $order ) . "\r\n";
		}
		
		$filename = date("Y-m-d")."電子報訂閱清單.csv";
		header("Content-type: text/x-csv");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Expires: 0");
		header("Pragma: public");
		echo mb_convert_encoding($content , "Big5" , "UTF-8");
	}

	public function sendEDM()
	{
		$this->jsonRS['POST'] = $_POST;
		
		if( 
			isset($_POST['reciver']) &&
			isset($_POST['subject']) &&
			isset($_POST['content'])
		)
		{			
			$response 	= array();
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			echo json_encode($this->jsonRS);
		
		
			$this->load->model("Option_model","mOption");
			$this->load->model("Subscribe_model","mSubscribe");
			$this->load->helper('email');
			$mail = $this->mOption->readVal("AdminMail");
			
			$reciverAry = explode(",", $_POST['reciver'] ) ;
			$arr_rest = $this->mSubscribe->find( implode(",",$reciverAry) );

			$mailTo = array();
			foreach( $arr_rest AS $row )
			{
				$mailTo[] = $row["mail"];
			}
			
			$sCharset = 'UTF-8';

			foreach( $arr_rest AS $row )
			{
				//$mailTo[] = $row["mail"];
				//@ 要送給誰
				$sMailTo = $row["mail"];
				
				//@ 誰送的
				$sMailFrom = isset($mail["account"]) && !empty($mail["account"])?$mail["account"]:"devicten97@gmail.com";
				//@ 信件的主旨
				$sSubject = $_POST['subject'];
				//@ 信件內容
				$sMessage = $_POST['content'];

				//@ 為了傳送 HTML 格式的 email, 我們需要設定 MIME 版本和 Content-type header 內容.
				$sHeaders = "MIME-Version: 1.0\r\n" .
							"Content-type: text/html; charset=$sCharset\r\n" .
							"From: $sMailFrom\r\n";

				//@ 傳送 email
				$this->jsonRS['status'][] = mail($sMailTo, $sSubject, $sMessage, $sHeaders);
				sleep(36);
			}
		}

		//header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function mailManager()
	{
		$this->load->model("Option_model","mOption");			
		$this->data["listMail"] = array();
		$this->data["listMail"]["OrderSuccessMail"] = $this->mOption->readVal("OrderSuccessMail");	
		$this->data["listMail"]["OrderSend"] 		= $this->mOption->readVal("OrderSend");	
		$this->data["listMail"]["forgotPassword"]	= $this->mOption->readVal("forgotPassword");
		$this->data["listMail"]["memberActive"]	= $this->mOption->readVal("memberActive");
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/option/mail',$this->data);
	}
	
	public function PromotionBlock($method="index")
	{
		if( $method == "index" )
		{
			$this->load->model("Option_model","mOption");
			//後台
			$this->data["css_include"] 	= "user";
			$this->data['widget'] 		= array();
			
			$PromotionBlock = $this->mOption->find("PromotionBlock");
			foreach( $PromotionBlock AS &$record )
			{
				$recommend = json_decode($record["value"],true);
				$recommend = $this->convertToMutiLangObj($recommend, json_decode('{"title":"","listProduct":"none","sortKey":0}',true));
				$record["value"] = $recommend;
			}
			$this->data["listRecommend"] = $PromotionBlock;		
			$this->load->model("Product_model");
			$this->data["listProduct"] = $this->Product_model->findAll();
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/PromotionBlock/index',$this->data);		
		}
		else if( $method == "create" )
		{
			$this->jsonRS['POST'] 		= $_POST;
			if(
				isset($_POST["key"]) &&
				isset($_POST["value"]) &&
				isset($_POST["description"]) 
			)
			{
				$this->load->model("Option_model");				
				
				$saveData = array(
					"key" => $_POST["key"],
					"value" => json_encode($_POST["value"]),
					"description" => $_POST["description"]
				);
				$result = $this->Option_model->create($saveData);
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else if( $method == "save" )
		{
			$this->jsonRS['POST'] 		= $_POST;
			if(isset($_POST["postData"]))
			{
				$this->load->model("Option_model");			
				foreach( $_POST["postData"] AS &$item )
				{
					$item["value"] = json_encode($item["value"]);
					$result[] = $this->Option_model->save($item);
				}			
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}		
		else if( $method == "delete" )
		{
			$this->jsonRS['POST'] 		= $_POST;
			if(isset($_POST["id"]))
			{
				$this->load->model("Option_model");				
				$result = $this->Option_model->delete($_POST["id"], "PromotionBlock");
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}		
	}
		
	public function privacy()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();


		
		$data = $this->Option->find("privacy");	
		$this->data["privacy"] = json_decode($data[0]["value"],true);
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/option/privacy',$this->data);
	}
	
	public function cashflow()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$objLangShoppingcart = $this->loadLang("widget/shoppingcart/");
		
		$this->data["FreeFare"] = $this->Option->readVal("FreeFare");	
		$this->data["cashflow"] = $this->data["cashflowMethod"] = array();
		foreach( $this->cashflowMethod AS $method )
		{
			$this->data["cashflow"][$method] 		= $this->Option->readVal($method);	
			$this->data["cashflowMethod"][$method] 	= $objLangShoppingcart[$method];
		}	
		
		$this->data["suntechMerchantParam"] = $this->Option->readVal("suntechMerchantParam");	
				
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/option/cashflow',$this->data);
	}

	public function cashflowAllpay()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$objLangShoppingcart = $this->loadLang("widget/shoppingcart/");
		
		$this->data["FreeFare"] = $this->Option->readVal("FreeFare");	
		$this->data["cashflow"] = $this->data["cashflowMethod"] = array();
		foreach( $this->cashflowMethodAllpay AS $method )
		{
			$this->data["cashflow"][$method] 		= $this->Option->readVal($method);	
			$this->data["cashflowMethod"][$method] 	= $objLangShoppingcart[$method];
		}	
		
		$this->data["allpayMerchantParam"] = $this->Option->readVal("allpayMerchantParam");	

		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/option/cashflowAllpay',$this->data);
	}
	
	public function setting()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->data["isShowLangSelector"] 		= $this->Option->isShowLangSelector;
		$this->data["isShowCurrencySelector"] 	= $this->Option->isShowCurrencySelector;
		
		$ExchangeRate = json_decode($this->Option->ExchangeRate,true);
		empty($ExchangeRate)?$ExchangeRate=array():"";
		$ExchangeRate = $this->convertToMutiCurrenciesObj($ExchangeRate, array("rate"=>"1"));
		$this->data["ExchangeRate"] 	= $ExchangeRate;
		
		$this->data["socialLink"] 		= $this->Option->readVal("socialLink");		
		
		$this->data["AdminMail"] 		= $this->Option->readVal("AdminMail");	

		$this->data["DateLimitCheckoutDiscount"] 	= $this->Option->readVal("DateLimitCheckoutDiscount");

		//銀行帳號
		$this->data["BankRemittancesInfo"] 	= $this->Option->readVal("BankRemittancesInfo");
		// google Analytics
		$this->data["GoogleAnalyticsInfo"] 	= $this->Option->readVal("GoogleAnalyticsInfo");
		
		//購物金換算比例
		$this->data["ShoppingPointRate"] 	= $this->Option->readVal("ShoppingPointRate");
		$this->data["ShoppingPointMaxRate"] = $this->Option->readVal("ShoppingPointMaxRate");

		//註冊時 贈送購物金
		$this->data["RegisterMoney"] 	= $this->Option->readVal("RegisterMoney");
		//生日 當天贈送購物金
		$this->data["BirthdayMoneny"] 	= $this->Option->readVal("BirthdayMoneny");
		//部落客 獎金分配比例
		//$this->data["HostRate"] 	= $this->Option->readVal("HostRate");

		//是否啟用會員認證信機制
		$this->data["isMemberCheckEmail"] 	= $this->Option->readVal("isMemberCheckEmail");

		//是否啟用Facebook 登入
		$this->data["isMemberCheckFacebook"] 	= $this->Option->readVal("isMemberCheckFacebook");
		
		/*
		$this->data["price"] 				= $this->Option->MEMEBERPRICE;		
		$this->data["BankRemittancesVar"] 	= $this->Option->BankRemittancesVar;		
		$this->data["PayOnArrivalVar"] 		= $this->Option->PayOnArrivalVar;		
		$this->data["FreeFare"] 			= $this->Option->FreeFare;
		*/
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/option/index',$this->data);
	}
	
	public function change()
	{
		if( isset($_POST["optionData"]) )
		{
			$resp = -1;
			foreach( $_POST["optionData"] AS $option )
			{
				( $resp == -1 )?$resp=array():"";
				if(
					isset($option["type"]) &&
					isset($option["value"])
				)
				{				
					$this->load->model("Option_model");	
					
					if( $option["type"] == "suntechMerchantParam" )
					{
						$pos = strpos($option["value"]["privateKey"], "_change_");
						$suntechMerchantParam = $this->Option_model->readVal("suntechMerchantParam");
						$pos === false ? "" : $suntechMerchantParam["privateKey"] = $option["value"]["privateKey"];
						$suntechMerchantParam["web"] = $option["value"]["web"];
						
						$value  = json_encode($suntechMerchantParam);
						$resp[] = $this->Option_model->change($option["type"],$value);		
					}
					else
					{
						$value  = ( is_array($option["value"]) )?json_encode($option["value"]):$option["value"];
						$resp[] = $this->Option_model->change($option["type"],$value);						
					}
				}
			}
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			$this->jsonRS['post'] 		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */