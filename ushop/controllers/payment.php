<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends Web_Controller {
	
	private $testMode = 0;
	
	private $suntech = array(
		0 => "https://test.esafe.com.tw/Service/Etopm.aspx",
		1 => "https://www.esafe.com.tw/Service/Etopm.aspx"
	);
	
	private $suntechMerchantParam = array(
		"privateKey" => "chentron123", //商家交易密碼
		"web" => array(
			"CreditCard" 					=> "S1509229017",
			"WebATM" 						=> "S1509229025",
			"ConvenienceStorePayBarcode" 	=> "S1509229033",
			"ConvenienceStorePayCode" 		=> "S1602049015",
			"AliPay" 						=> ""
		)
	);

	private $allpay = array(
		0 => "http://payment-stage.allpay.com.tw/Cashier/AioCheckOut",   // allpay test site 
		1 => "https://payment.allpay.com.tw/Cashier/AioCheckOut",     // allpay production site 
		2 => "/payment/allpayCallback" ,   	// ReturnURL
		3 => "/payment/allpayCallback" ,    // OrderResultURL
											// ClientBackURL (返回商店)
		5 => "/payment/allpayCallback"		// ClientRedirectURL  此設定僅使用非即時性付款(ATM、超商條碼、超商代碼)才會轉導
	);

	private $allpayMerchantParam = array(
		"status" => "0", //testing
		"web" => array(
			"MerchantID" 	=> "2000132",
			"HashKey" 		=> "5294y06JbISpM5x9",
			"HashIV" 		=> "v77hoKGq4kWxNNIS"
		)
	);
	
	private $param = array(	
		"CreditCard" => array(
			"web" 			=> "", 		//商店代號
			"MN" 			=> "", 		//交易金額
			"OrderInfo" 	=> "none", 	//交易內容 
			"Td" 			=> "",		//商家訂單編號 
			"sna" 			=> "",		//消費者姓名  
			"sdt" 			=> "",		//消費者電話 
			"email"			=> "",		//消費者 Email 建議不代
			"note1" 		=> "",		//備註 1 
			"note2" 		=> "",		//備註 2   
			"Card_Type" 	=> "",		//交易類別  空白 or 0 信用卡交易、1 銀聯卡交易。  
			"Country_Type" 	=> "",		//語言類別  空白 or EN(英文)、JIS(日文)。
			"ChkValue"		=> ""   	//交易檢查碼 sha1($web.$privateKey,$MN);
		),
		"WebATM" => array(
			"web" 			=> "", 		//商店代號
			"MN" 			=> "", 		//交易金額
			"OrderInfo" 	=> "none", 	//交易內容 
			"Td" 			=> "",		//商家訂單編號 
			"sna" 			=> "",		//消費者姓名  
			"sdt" 			=> "",		//消費者電話 
			"email"			=> "",		//消費者 Email 建議不代
			"note1" 		=> "",		//備註 1 
			"note2" 		=> "",		//備註 2   
			"ChkValue"		=> ""   	//交易檢查碼 sha1($web.$privateKey,$MN);
		),
		"ConvenienceStorePayBarcode" => array(
			"web" 			=> "", 		//商店代號
			"MN" 			=> "", 		//交易金額
			"OrderInfo" 	=> "none", 	//交易內容 
			"Td" 			=> "",		//商家訂單編號 
			"sna" 			=> "",		//消費者姓名  
			"sdt" 			=> "",		//消費者電話 
			"email"			=> "",		//消費者 Email 建議不代
			"note1" 		=> "",		//備註 1 
			"note2" 		=> "",		//備註 2   
			"DueDate"		=> "", 		//繳費期限 date("Ymd",strtotime(" +180 days"))
			"UserNo"		=> "", 		//用戶編號
			"BillDate"		=> "",		//列帳日期 date("Ymd");
			"ProductName1"	=> "",
			"ProductPrice1"  => "",
			"ProductQuantity1"  => "",
			"ProductName2"	=> "",
			"ProductPrice2"  => "",
			"ProductQuantity2"  => "",
			//ProductName  	  1 ~ 10 length 1 ~ 100 
			//ProductPrice 	  1 ~ 10 length 1 ~ 99999
			//ProductQuantity 1 ~ 10 length 1 ~ 99999
			"ChkValue"		=> ""   	//交易檢查碼 sha1($web.$privateKey,$MN);
		),
		"ConvenienceStorePayCode" => array(
			"web" 			=> "", 		//商店代號
			"MN" 			=> "", 		//交易金額
			"OrderInfo" 	=> "none", 	//交易內容 
			"Td" 			=> "",		//商家訂單編號 
			"sna" 			=> "",		//消費者姓名  
			"sdt" 			=> "",		//消費者電話 
			"email"			=> "",		//消費者 Email 建議不代
			"note1" 		=> "",		//備註 1 
			"note2" 		=> "",		//備註 2   
			"DueDate"		=> "", 		//繳費期限 date("Ymd",strtotime(" +180 days"))
			"UserNo"		=> "", 		//用戶編號
			"BillDate"		=> "",		//列帳日期 date("Ymd");
			"ProductName1"	=> "",
			"ProductPrice1"  => "",
			"ProductQuantity1"  => "",
			"ProductName2"	=> "",
			"ProductPrice2"  => "",
			"ProductQuantity2"  => "",
			//ProductName  	  1 ~ 10 length 1 ~ 100 
			//ProductPrice 	  1 ~ 10 length 1 ~ 99999
			//ProductQuantity 1 ~ 10 length 1 ~ 99999
			"ChkValue"		=> ""   	//交易檢查碼 sha1($web.$privateKey,$MN);
		),
		"AliPay" => array(
			"web" 			=> "", 		//商店代號
			"MN" 			=> "", 		//交易金額
			"OrderInfo" 	=> "none", 	//交易內容 
			"Td" 			=> "",		//商家訂單編號 
			"sna" 			=> "",		//消費者姓名  
			"sdt" 			=> "",		//消費者電話 
			"email"			=> "",		//消費者 Email 建議不代
			"note1" 		=> "",		//備註 1 
			"note2" 		=> "",		//備註 2   
			"ChkValue"		=> ""   	//交易檢查碼 sha1($web.$privateKey,$MN);
		)
	);
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model("Option_model","mOption");	
	}
	
		
	public function index($method = false)
	{
		if( $method === false || !isset($_REQUEST["Gateway_Type"]) || ( $_REQUEST["Gateway_Type"] != 0 && $_REQUEST["Gateway_Type"] != 1 ) )
		{
			//redirect("/","location","301");
			echo "1";
			return;
		}
		if( ($method != "Allpay" ) && !array_key_exists($method, $this->param) )		
		{
			//redirect("/","location","301");
			echo "2";
			return;
		}
//		LANGPATH = isset(LANGPATH) ? LANGPATH:"/www/icodad/ushop/libraries/" ;
//echo "[".LANGPATH."]" ; 		
		if( $method == "Allpay" )
		{
			//require(LIBRPATH."AllPay.Payment.Integration.php");
			//require("/www/icodad/ushop/libraries/AllPay.Payment.Integration.php");
			require(UWEBPATH."libraries/AllPay.Payment.Integration.php");
			try 
			{
				//取得 後台設定參數  status 0 => 用 程式測試 para
				$allpayMerchantParam = $this->mOption->readVal("allpayMerchantParam");	
				$allpayMerchantParam = ( $allpayMerchantParam["status"] == "0" ) ? $this->allpayMerchantParam : $allpayMerchantParam ;

				$oPayment = new AllInOne();
				/* 服務參數  */
				$oPayment->ServiceURL 	= $this->allpay[ intval($allpayMerchantParam["status"]) ] ;
				$oPayment->HashKey 		= $allpayMerchantParam["web"]["HashKey"];
				$oPayment->HashIV 		= $allpayMerchantParam["web"]["HashIV"] ;
				$oPayment->MerchantID	= $allpayMerchantParam["web"]["MerchantID"] ;
			
				/* 基本參數 */
				$getCurrentURL = $this->getCurrentHost() ;
error_log(print_r($getCurrentURL,true),3,"uploads/log_payment_index_getCurrentURL.log");

				$oPayment->Send['ReturnURL'] 			= $getCurrentURL.$this->allpay[2] ;
				$oPayment->Send['ClientBackURL'] 		= $getCurrentURL.$this->allpay[3];
				$oPayment->Send['OrderResultURL'] 		= $getCurrentURL.$this->allpay[3];
				//$oPayment->Send['ClientRedirectURL'] 	= $getCurrentURL.$this->allpay[5];
				$oPayment->Send['PaymentInfoURL'] 		= $getCurrentURL.$this->allpay[5];
				$oPayment->Send['ClientBackURL'] 		= $getCurrentURL ;
				
				$oPayment->Send['MerchantTradeNo'] 		= $_REQUEST["MerchantTradeNo"];
				$oPayment->Send['MerchantTradeDate'] 	= date('Y/m/d H:i:s');
				$oPayment->Send['TotalAmount'] 			= (float) $_REQUEST["TotalAmount"];
				$oPayment->Send['TradeDesc'] 			= "交易描述";
				$oPayment->Send['ChoosePayment'] 		= PaymentMethod::ALL;
				$oPayment->Send['Remark'] 				= "Remark";
				$oPayment->Send['ChooseSubPayment'] 	= PaymentMethodItem::None;
				$oPayment->Send['NeedExtraPaidInfo'] 	= ExtraPaymentInfo::No;
				$oPayment->Send['DeviceSource'] 		= DeviceType::PC;
				//$oPayment->Send['IgnorePayment'] 		= "Alipay#Tenpay"; // 例(排除支付寶與財富通): Alipay#Tenpay
			
				$oPayment->Send['Items'] = array();

				/* 加入選購商品資料。 */
				foreach( $this->data['cart']['cart'] AS $item )
				{
					array_push($oPayment->Send['Items'], array(
						'Name' 		=> $item["name"], 
						'Price' 	=> (int) $item["cPrice"], 
						'Currency' 	=> "元", 
						'Quantity' 	=> (int) $item["qty"],
						'URL'		=> ""
					));
				}
				if( (float) $_REQUEST["OrderDiscount"] < 0 )
				{
					array_push($oPayment->Send['Items'], array(
						'Name' 		=> "訂單折扣", 
						'Price' 	=> (float) $_REQUEST["OrderDiscount"], 
						'Currency' 	=> "元", 
						'Quantity' 	=> 1,
						'URL'		=> ""
					));
				}
				if( (float) $_REQUEST["OrderTax"] > 0 )
				{
					array_push($oPayment->Send['Items'], array(
						'Name' 		=> "訂單運費及手續費", 
						'Price' 	=> (float) $_REQUEST["OrderTax"], 
						'Currency' 	=> "元", 
						'Quantity' 	=> 1,
						'URL'		=> ""
					));
				}
				/* 清空購物車 */
				$this->cart->clear();

				$oPayment->CheckOut();
			}
			catch (Exception $e)
			{
				//echo "<pre>";
				//echo "</pre>";
				echo $e->message;
			}			
		}
		else
		{
			$dParam = $this->param[$method];
			foreach( $_REQUEST AS $k => $v )
			{
				if(array_key_exists($k, $dParam))
				{
					$dParam[$k] = $v;
				}
			}
			$suntechMerchantParam = ($this->testMode == 0)?$this->suntechMerchantParam:$this->mOption->readVal("suntechMerchantParam");	
			
			$dParam["web"] = $suntechMerchantParam["web"][$method];		
			array_key_exists("DueDate",  $dParam) ? $dParam["DueDate"] 	= date("Ymd",strtotime(" +3 days")) : "";
			array_key_exists("UserNo", 	 $dParam) ? $dParam["UserNo"]   = $this->self["id"] : "";
			array_key_exists("BillDate", $dParam) ? $dParam["BillDate"] = date("Ymd") : "";
			
			$dParam["ChkValue"] = strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$dParam["MN"]));
			/*
			echo "<pre>";
			var_dump(array(
				"post" => $_REQUEST,
				"url" => $this->suntech[$_REQUEST["Gateway_Type"]],
				"param" => $dParam
			));
			echo "</pre>";
			*/
			$this->sendToBank(array(
				"url" => $this->suntech[$_REQUEST["Gateway_Type"]],
				"param" => $dParam
			));
		}
	}
	
	public function demo()
	{
		$this->load->view('inc/head',$this->data);
		$this->load->view('payment/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}	
	
	private $CVS_map = array(
		4 => "全家超商",
		5 => "統一超商(7-11)",
		6 => "OK 超商",
		7 => "萊爾富超商"
	);
	
	private $backParam = array(
		"CreditCard" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"Td"			=> "",
			"MN"			=> "",
			"webname"		=> "",
			"Name"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"ApproveCode"	=> "",
			"Card_NO"		=> "",
			"SendType"		=> "",
			"errcode"		=> "",
			"errmsg"		=> "",
			"Card_Type"		=> "",
			"ChkValue"		=> ""
		),
		"WebATM" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"Td"			=> "",
			"MN"			=> "",
			"webname"		=> "",
			"Name"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"SendType"		=> "",
			"errcode"		=> "",
			"errmsg"		=> "",
			"ChkValue"		=> ""
		),
		"ConvenienceStorePayBarcode" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"UserNo"		=> "",
			"Td"			=> "",
			"MN"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"SendType"		=> "",
			"BarcodeA"		=> "",
			"BarcodeB"		=> "",
			"BarcodeC"		=> "",
			"PostBarcodeA"	=> "",
			"PostBarcodeB"	=> "",
			"PostBarcodeC"	=> "",
			"EntityATM"		=> "",
			"ChkValue"		=> ""
		),
		"ConvenienceStorePayCode" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"Td"			=> "",
			"MN"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"SendType"		=> "",
			"paycode"		=> "",
			"PayType"		=> "",
			"ChkValue"		=> ""
		),
		"AliPay" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"Td"			=> "",
			"MN"			=> "",
			"webname"		=> "",
			"Name"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"SendType"		=> "",
			"errcode"		=> "",
			"errmsg"		=> "",
			"ChkValue"		=> ""
		)
	);
	
	private $offline = array(
		"ConvenienceStorePayBarcode" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"Td"			=> "",
			"MN"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"UserNo"		=> "",
			"PayDate"		=> "",
			"errcode"		=> "",
			"PayType"		=> "",
			"ChkValue"		=> ""
		),
		"ConvenienceStorePayCode" => array(
			"buysafeno" 	=> "",
			"web"			=> "",
			"UserNo"		=> "",
			"Td"			=> "",
			"MN"			=> "",
			"note1"			=> "",
			"note2"			=> "",
			"PayDate"		=> "",
			"errcode"		=> "",
			"PayType"		=> "",
			"ChkValue"		=> ""
		)
	);
	
	public function callback($method = false)
	{		
		if( $method === false )
		{
			redirect("/","location","301");
			return;
		}
		
		$this->data["objLang"]["orderlist"] = $this->loadLang("widget/orderlist/");
		
		$this->load->model("Payment_model","mPay");
		$this->mPay->touch(array("gateway"=>"suntech","type"=>$method,"url"=>$this->getCurrentURL()));
		
		$param = $this->backParam[$method];
		foreach( $_REQUEST AS $k => &$v )
		{
			if( array_key_exists($k, $this->backParam[$method]) )
			{
				$param[$k] = urldecode($v);
			}
		}
		$this->data["param"] = $param;
		
		
		$this->load->model("User_model","mUser");
		$this->load->model("Order_model","mOrder");
		$this->load->model("Option_model","mOption");
		$suntechMerchantParam = ($this->testMode == 0)?$this->suntechMerchantParam:$this->mOption->readVal("suntechMerchantParam");								
		/*
		** 1.確認訂單存在，有則取出，無則結束			
		** 2.依狀況處理訂單，修改訂單狀態為 1
		**		a.SendType:2：該付款方式的相關資訊做紀錄 ( cashData->callback )	 ，更新 callback   timestamp
		**		b.SendType:1：該付款方式的相關資訊做紀錄 ( cashData->notifyback )，更新 notifyback timestamp
		**/
		$exist = $this->mOrder->checkOrderExist($param["Td"]);
		if( $exist === true )
		{
			$order = $this->mOrder->findOrderDetail($param["Td"]);
		
			$this->load->model("Product_model");
			foreach( $order['detail'] AS $k=>$row )
			{
				$newDataDetail = array();
				$dataDetail = $this->Product_model->findDetail($row['productMainKey']);
				foreach($dataDetail AS $detail)
				{
					$newDataDetail[$detail["langCode"]] = $detail;
				}
				$order['detail'][$k]["dataDetail"] = $newDataDetail;
			}
			$this->data["order"] = $order;
			is_string($order["cashData"])?$order["cashData"]=array():"";
			
			( $param["SendType"] == 2 ) ? $order["callback"] = date("Y-m-d H:i:s") : $order["notifyback"] = date("Y-m-d H:i:s");
			( $param["SendType"] == 2 ) ? $order["cashData"]["callback"] = $param : $order["cashData"]["notifyback"] = $param;
			
			if( $method == "CreditCard" )
			{
				if( strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$param["buysafeno"].$param["MN"].$param["errcode"])) !== $param["ChkValue"] ) 
				{
					redirect("/","location","301");
				}
				($param["errcode"] == "00" && $order["type"] == 0)?$order["type"] = 1:'';
				($param["errcode"] != "00" && $order["type"] == 0)?$order["type"] = 101:'';
			}
			if( $method == "WebATM" )
			{
				if( strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$param["buysafeno"].$param["MN"].$param["errcode"])) !== $param["ChkValue"] ) 
				{
					redirect("/","location","301");
				}
				($param["errcode"] == "00" && $order["type"] == 0)?$order["type"] = 1:'';
				($param["errcode"] != "00" && $order["type"] == 0)?$order["type"] = 101:'';
			}
			if( $method == "ConvenienceStorePayBarcode" )
			{
				if( strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$param["buysafeno"].$param["MN"].$param["EntityATM"])) !== $param["ChkValue"] ) 
				{
					//redirect("/","location","301");
					echo -1;
				}
			}
			if( $method == "ConvenienceStorePayCode" )
			{
				if( strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$param["buysafeno"].$param["MN"].$param["paycode"])) !== $param["ChkValue"] ) 
				{
					//redirect("/","location","301");
					echo -1;
				}
			}
			if( $method == "AliPay" )
			{
				if( strtoupper(sha1($suntechMerchantParam["web"][$method].$suntechMerchantParam["privateKey"].$param["buysafeno"].$param["MN"].$param["errcode"])) !== $param["ChkValue"] ) 
				{
					redirect("/","location","301");
				}
				($param["errcode"] == "00" && $order["type"] == 0)?$order["type"] = 1:'';
				($param["errcode"] != "00" && $order["type"] == 0)?$order["type"] = 101:'';
			}
			
			$this->mOrder->save($order,false);
			
			
				
			if( $order["hostId"] != 0 && $param["errcode"] == "00" && $order["type"] == 0 && $order["isPushNotify"] == 0 )
			{
				$rate = $this->mOption->readString("HostRate");
				$money = round($order['clearTotal'] * $rate);
				$this->mUser->pushNotification($order["hostId"],"恭喜您獲得一筆廣告獎金 NT $".$money);
				$this->mOrder->save(array("id"=>$order["id"],"isPushNotify"=>1));
				
				$this->mUser->logBonus($order["hostId"],$order["id"],$money,date("Y-m-d H:i:s"));
			}
			
			if( $param["SendType"] == 2 )
			{
				redirect("/message?transId=".$param["Td"],"location","301");
				/*
				$this->load->view('inc/head',$this->data);
				$this->load->view('payment/'.$method.'/callback',$this->data);
				$this->load->view('inc/footer',$this->data);			
				*/
			}
		}
		/*
		else
		{
			//redirect("/","location","301");
			return;
		}
		*/
	}
	
	private function sendToBank($data)
	{
		$urlencode = array("web","OrderInfo","sna","email","note1","note2","ProductName1","ProductName2","ProductName3","ProductName4","ProductName5","ProductName6","ProductName7","ProductName8","ProductName9","ProductName10");
		
		header("Content-Type:text/html; charset=utf-8");
		$url = $data["url"];
		$html = "<html><head><meta http-equiv=\"Content-Language\" content=\"zh-hant\" /><meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\" /></head><body onload=\"document.getElementById('form1').submit();\"><form id=\"form1\" name=\"form1\" action=\"".$url."\" method=\"POST\">";
		
		foreach( $data["param"] AS $name => &$value )
		{
			( in_array($name,$urlencode) )?urlencode($value):"";
			$html.= "<input type=\"hidden\" name=\"{$name}\" value=\"{$value}\" />";
		}
		
		$html.= "</form></body></html>";
		echo $html;		
	}
	
	public function notifyback($method=false)
	{
		$this->callback($method);
	}
	
	public function offlineback($method=false)
	{
		$this->callback($method);
	}

	public function allpayCallback()
	{		
		$this->load->model("Payment_model","mPay");
		$this->mPay->touch(array("gateway"=>"歐付寶","type"=>"Allpay","url"=>$this->getCurrentURL()));
		//$callbackAry = $_POST ; 

		//$_POST = json_decode( "{\"Barcode1\":\"0505106EA\",\"Barcode2\":\"3451511490305148\",\"Barcode3\":\"05037X000000622\",\"ExpireDate\":\"2016\/05\/10 14:09:06\",\"MerchantID\":\"2000132\",\"MerchantTradeNo\":\"MUU00000000000000069\",\"PaymentNo\":\"\",\"PaymentType\":\"BARCODE_BARCODE\",\"RtnCode\":\"10100073\",\"RtnMsg\":\"Get CVS Code Succeeded.\",\"TradeAmt\":\"622\",\"TradeDate\":\"2016\/05\/03 14:09:06\",\"TradeNo\":\"1605031408572999\",\"CheckMacValue\":\"DED3F7C7EF703DF4A56DEA01AD512818\"}" );
		
		//require(LIBRPATH."AllPay.Payment.Integration.php");
		require(UWEBPATH."libraries/AllPay.Payment.Integration.php");
		/*
		* 接收訂單資料產生完成的範例程式碼。
		*/
		try
		{
			$oPayment = new AllInOne();
			
			//取得 後台設定參數  status 0 => 用 程式測試 para
			$allpayMerchantParam = $this->mOption->readVal("allpayMerchantParam");	
			$allpayMerchantParam = ( $allpayMerchantParam["status"] == "0" ) ? $this->allpayMerchantParam : $allpayMerchantParam ;

			/* 服務參數 */
			$oPayment->HashKey 		= $allpayMerchantParam["web"]["HashKey"];
			$oPayment->HashIV 		= $allpayMerchantParam["web"]["HashIV"] ;
			$oPayment->MerchantID 	= $allpayMerchantParam["web"]["MerchantID"] ;
			
			//echo "<pre>";
			//var_dump($_POST);			
			//echo "</pre>";
			
			/* 取得回傳參數 */
			$arFeedback = $oPayment->CheckOutFeedback();
			/* 檢核與變更訂單狀態 */
			if (sizeof($arFeedback) > 0) {
				foreach ($arFeedback as $key => $value) {
					switch ($key)
					{
						// 支付後的回傳的基本參數
						case "MerchantID": $szMerchantID = $value; break;
						case "MerchantTradeNo": $szMerchantTradeNo = $value; break;
						case "PaymentDate": $szPaymentDate = $value; break;
						case "PaymentType": $szPaymentType = $value; break;
						case "PaymentTypeChargeFee": $szPaymentTypeChargeFee = $value; break;
						case "RtnCode": $szRtnCode = $value; break;
						case "RtnMsg": $szRtnMsg = $value; break;
						case "SimulatePaid": $szSimulatePaid = $value; break;
						case "TradeAmt": $szTradeAmt = $value; break;
						case "TradeDate": $szTradeDate = $value; break;
						case "TradeNo": $szTradeNo = $value; break;
						default: break;
					}				
				}
				
				$this->data["objLang"]["orderlist"] = $this->loadLang("widget/orderlist/");
				
				$this->load->model("Order_model","mOrder");
				
				//
				// 1.確認訂單存在，有則取出，無則結束			
				// 2.依狀況處理訂單，修改訂單狀態為 1
				//		a.SendType:2：該付款方式的相關資訊做紀錄 ( cashData->callback )	 ，更新 callback   timestamp
				//		b.SendType:1：該付款方式的相關資訊做紀錄 ( cashData->notifyback )，更新 notifyback timestamp
				//
				$exist = $this->mOrder->checkOrderExist($szMerchantTradeNo);
				if( $exist === true )
				{
					$order = $this->mOrder->findOrderDetail($szMerchantTradeNo);
					$this->load->model("Product_model");
					foreach( $order['detail'] AS $k=>$row )
					{
						$newDataDetail = array();
						$dataDetail = $this->Product_model->findDetail($row['productMainKey']);
						foreach($dataDetail AS $detail)
						{
							$newDataDetail[$detail["langCode"]] = $detail;
						}
						$order['detail'][$k]["dataDetail"] = $newDataDetail;
					}
					$this->data["order"] = $order;
					
					$status = array(1,2,800,10100073);
					( in_array($szRtnCode, $status) ) ? $order["callback"] = date("Y-m-d H:i:s") : "";
					( in_array($szRtnCode, $status) ) ? $order["notifyback"] = date("Y-m-d H:i:s") : "";
					
					//( in_array($szRtnCode, $status) ) ? $order["cashData"]["callback"] = $arFeedback : $order["cashData"]["notifyback"] = $arFeedback;
					if ( in_array($szRtnCode, $status) ) {  // 回傳成功 
						$order["type"] = ($szRtnCode == 1 )? 1:0 ;
						//$order["cashData"]["callback"] = $arFeedback ; 
						$order["paymentTypeTime"] = date("Y-m-d H:i:s") ;
						$order["paymentType"] = ($szRtnCode == 1 )? 1:9 ;   // 1:成功 ; 9:等待

						$order["cashData"] = array("callback"=>$arFeedback);
					}
					else{ //失敗
						$order["type"] = -1;
						$order["paymentTypeTime"] = date("Y-m-d H:i:s") ;
						$order["paymentType"] = -1 ;						
						$order["cashData"] = array("callback"=>$arFeedback);
					}
error_log(print_r($order,true),3,"uploads/log_payment_allpayCallback_order.log");
					$this->mOrder->save($order,false);

					//transaction_log data
					$transactionLogArray = array();
					$transactionLogArray["orderId"] = $order["unique_id"];
					$transactionLogArray["method"] 	= "paymentType" ;
					$transactionLogArray["type"] 	= $order["paymentType"] ;
					$transactionLogArray["reson"] 	= "payment return status" ;
					
					$this->mOrder->transactionLogSave($transactionLogArray);    // insert transaction_log
					
					print '1|OK';		
					redirect("/message?transId=".$order["unique_id"],"location",301);
				} 
				else 
				{
					print '-1|Fail';
					//redirect("/","location","301");
					return;
				}
			} else {
				print '0|Fail';
				//redirect("/","location","301");
				return;
			}
		
		}
		catch (Exception $e)
		{
			// 例外錯誤處理。
			//echo '0|' . $e->getMessage();
			echo 0 . "<br/>";
			return;
		}
	}
	
	private function getCurrentURL()
	{
		$currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		$currentURL .= $_SERVER["SERVER_NAME"];
		if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
		{
			$currentURL .= ":".$_SERVER["SERVER_PORT"];
		} 
		$currentURL .= $_SERVER["REQUEST_URI"];
		return $currentURL;
	}

	private function getCurrentHost()
	{
		$currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		$currentURL .= $_SERVER["SERVER_NAME"];
		if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
		{
			$currentURL .= ":".$_SERVER["SERVER_PORT"];
		} 
		return $currentURL;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */