<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends Web_Controller {

	private $jsonRS = array(
		"code" => -1,
		"message" => "操作失敗"
	);

	public function index()
	{
		if( $this->self === false )
			redirect('/user/login', 'location', 301);

		$this->data["BuyDirect"] = false;
		// 直接購買參數帶入
		if(
			isset($_POST["cashFlow"]) &&
			isset($_POST["cashData"]) &&
			isset($_POST["region"]) &&
			isset($_POST["county"]) &&
			isset($_POST["district"]) &&
			isset($_POST["zipcode"]) &&
			isset($_POST["cAddress"])
		)
		{
			$this->data["BuyDirect"] = array(
				"cashFlow" 	=> $_POST["cashFlow"],
				"cashData" 	=> $_POST["cashData"],
				"region" 	=> $_POST["region"],
				"county" 	=> $_POST["county"],
				"district" 	=> $_POST["district"],
				"zipcode" 	=> $_POST["zipcode"],
				"address" 	=> $_POST["cAddress"]
			);
		}

		$this->data['ucart'] = $this->cart->show();

		if($this->data['ucart']['total'] == 0 )
				redirect('/shoppingcart', 'location', 301);

		$this->BankRemittances  	= $this->mOption->readVal("BankRemittances");
		$this->PayOnArrival     	= $this->mOption->readVal("PayOnArrival");
		/*$this->CreditCard     		= $this->mOption->readVal("CreditCard");
		$this->WebATM     			= $this->mOption->readVal("WebATM");
		$this->ConvenienceStorePayBarcode   		= $this->mOption->readVal("ConvenienceStorePayBarcode");
		$this->ConvenienceStorePayCode     			= $this->mOption->readVal("ConvenienceStorePayCode");
		$this->AliPay     			= $this->mOption->readVal("AliPay");*/
		$this->Allpay     			= $this->mOption->readVal("Allpay");

		$this->FreeFare  		   	= $this->mOption->readString("FreeFare");
		$this->privacy 				= $this->mOption->readVal("privacy");

		$this->data['methods']								= array();
		$this->data['methods']['BankRemittances'] 			= $this->BankRemittances;
		$this->data['methods']['PayOnArrival']	  			= $this->PayOnArrival;
		/*$this->data['methods']['CreditCard']	  			= $this->CreditCard;
		$this->data['methods']['WebATM']	  				= $this->WebATM;
		$this->data['methods']['ConvenienceStorePayBarcode']	  			= $this->ConvenienceStorePayBarcode;
		$this->data['methods']['ConvenienceStorePayCode']	  				= $this->ConvenienceStorePayCode;
		$this->data['methods']['AliPay']	  				= $this->AliPay;*/
		$this->data['methods']['Allpay']	  				= $this->Allpay;

		$this->data['FreeFare'] 	= $this->FreeFare;
		$this->data["privacy"]		= $this->privacy[$this->currentLang];
		$this->data["ExchangeRate"] = $this->mOption->readVal("ExchangeRate");

		//匯款帳號
		$this->data["BankRemittancesInfo"]= $this->mOption->readVal("BankRemittancesInfo");
		//$BankRemittancesInfo = $this->mWidget->find("BankRemittancesInfo");
		//$this->data["BankRemittancesInfo"] = $BankRemittancesInfo[0];

		$this->data["shoppingPoint"] = ( $this->self === false ) ? 0 : $this->mUser->realTimePoint($this->self["id"]);

		//常用收件人資料
		$reciverSlot = array(
			"user_id" => $this->self["id"],
			"key" => "reciverSlot",
			"langCode" => $this->currentLang,
			"value" => array( "reciverName" => empty($this->self["nickname"])?"":$this->self["nickname"],
							"region" => empty($this->self["region"])?"0":$this->self["region"],
							"city" => empty($this->self["county"])?"":$this->self["county"],
							"district" => empty($this->self["district"])?"":$this->self["district"],
							"zip" => empty($this->self["zip"])?"":$this->self["zip"],
							"address" => empty($this->self["address"])?"":$this->self["address"]
							)
			);

		$this->data["reciverSlot"] = $reciverSlot;
		$this->data["langCode"] = $this->currentLang;

		$this->load->view('inc/head',$this->data);
		$this->load->view('checkout/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}

	public function process()
	{
		if( $this->self === false )
			redirect('/user/login', 'location', 301);

		$this->data["BuyDirect"] = false;
		// 直接購買參數帶入
		if(
			isset($_POST["cashFlow"]) &&
			isset($_POST["cashData"]) &&
			isset($_POST["region"]) &&
			isset($_POST["county"]) &&
			isset($_POST["district"]) &&
			isset($_POST["zipcode"]) &&
			isset($_POST["cAddress"])
		)
		{
			$this->data["BuyDirect"] = array(
				"cashFlow" 	=> $_POST["cashFlow"],
				"cashData" 	=> $_POST["cashData"],
				"region" 	=> $_POST["region"],
				"county" 	=> $_POST["county"],
				"district" 	=> $_POST["district"],
				"zipcode" 	=> $_POST["zipcode"],
				"address" 	=> $_POST["cAddress"]
			);
		}

		$this->data['ucart'] = $this->cart->show();

		if($this->data['ucart']['total'] == 0 )
				redirect('/shoppingcart', 'location', 301);

		$this->BankRemittances  	= $this->mOption->readVal("BankRemittances");
		$this->PayOnArrival     	= $this->mOption->readVal("PayOnArrival");
		/*$this->CreditCard     		= $this->mOption->readVal("CreditCard");
		$this->WebATM     			= $this->mOption->readVal("WebATM");
		$this->ConvenienceStorePayBarcode   		= $this->mOption->readVal("ConvenienceStorePayBarcode");
		$this->ConvenienceStorePayCode     			= $this->mOption->readVal("ConvenienceStorePayCode");
		$this->AliPay     			= $this->mOption->readVal("AliPay");*/
		$this->Allpay     			= $this->mOption->readVal("Allpay");

		$this->FreeFare  		   	= $this->mOption->readString("FreeFare");
		$this->privacy 				= $this->mOption->readVal("privacy");

		$this->data['methods']								= array();
		$this->data['methods']['BankRemittances'] 			= $this->BankRemittances;
		$this->data['methods']['PayOnArrival']	  			= $this->PayOnArrival;
		/*$this->data['methods']['CreditCard']	  			= $this->CreditCard;
		$this->data['methods']['WebATM']	  				= $this->WebATM;
		$this->data['methods']['ConvenienceStorePayBarcode']	  			= $this->ConvenienceStorePayBarcode;
		$this->data['methods']['ConvenienceStorePayCode']	  				= $this->ConvenienceStorePayCode;
		$this->data['methods']['AliPay']	  				= $this->AliPay;*/
		$this->data['methods']['Allpay']	  				= $this->Allpay;

		$this->data['FreeFare'] 	= $this->FreeFare;
		$this->data["privacy"]		= $this->privacy[$this->currentLang];
		$this->data["ExchangeRate"] = $this->mOption->readVal("ExchangeRate");

		//匯款帳號
		$this->data["BankRemittancesInfo"]= $this->mOption->readVal("BankRemittancesInfo");
		//$BankRemittancesInfo = $this->mWidget->find("BankRemittancesInfo");
		//$this->data["BankRemittancesInfo"] = $BankRemittancesInfo[0];

		$this->data["shoppingPoint"] = ( $this->self === false ) ? 0 : $this->mUser->realTimePoint($this->self["id"]);

		//常用收件人資料
		$reciverSlot = array(
			"user_id" => $this->self["id"],
			"key" => "reciverSlot",
			"langCode" => $this->currentLang,
			"value" => array( "reciverName" => empty($this->self["nickname"])?"":$this->self["nickname"],
							"region" => empty($this->self["region"])?"0":$this->self["region"],
							"city" => empty($this->self["county"])?"":$this->self["county"],
							"district" => empty($this->self["district"])?"":$this->self["district"],
							"zip" => empty($this->self["zip"])?"":$this->self["zip"],
							"address" => empty($this->self["address"])?"":$this->self["address"]
							)
			);

		$this->data["reciverSlot"] = $reciverSlot;
		$this->data["langCode"] = $this->currentLang;
// error_log(print_r($this->data['objLang'],true),3,"uploads/log_controller_checkout_process_objLang.log");
error_log(print_r($this->data['ucart'],true),3,"uploads/log_controller_checkout_process_ucart.log");

		$this->load->view('inc/head',$this->data);
		$this->load->view('checkout/process',$this->data);
		$this->load->view('inc/footer',$this->data);
	}

	//計算運費以及手續費
	private function readFeeFare( $cashFlow, $objAddr, $ExchangeRate )
	{
		$outsea =  array("澎湖縣","金門縣","連江縣","南海諸島","綠島鄉","蘭嶼鄉");


		$sRegion = "inIsland";
		if( $objAddr["region"] == 0 )
		{
			( in_array($objAddr["city"], $outsea) ) ? $sRegion = "outIsland" : "";
			( in_array($objAddr["district"], $outsea) ) ? $sRegion = "outIsland" : "";
		}
		else
		{
			( $objAddr["region"] == 1 )?$sRegion="china":"";
			( $objAddr["region"] == 2 )?$sRegion="foreign":"";
		}
		$ObjVar = $this->data['methods'][$cashFlow][$sRegion];
		/*
		$ObjVar["fee"]  = ( floatval($ObjVar["fee"])  / floatval($ExchangeRate[$this->currentCurrency]["rate"]) );
		$ObjVar["fare"] = ( floatval($ObjVar["fare"]) / floatval($ExchangeRate[$this->currentCurrency]["rate"]) );
		$ObjVar["fee"]  = round($ObjVar["fee"],2);
		$ObjVar["fare"] = round($ObjVar["fare"],2);
		*/
		return $ObjVar;
	}

	private function setShoppingPoint($ucart)
	{
		$this->load->model("User_model","mUser");
		$currentPoint = $this->mUser->realTimePoint($this->self["id"]);
		//判斷購物金，是否超過消費帳戶本身持有購物金
		$shoppingPoint = ($_REQUEST['shoppingPoint'] > $currentPoint)?$currentPoint:$_REQUEST['shoppingPoint'];

		//若購物金折抵量超過訂單總價，僅將該筆訂單扣到0為止。
		$tempCal  = $ucart['total'] - $shoppingPoint;
		$shoppingPoint = ( $tempCal < 0 ) ? $ucart['total'] : $shoppingPoint;

		//將該使用的購物金 從消費者帳戶中扣除
		$newPoint = intval($currentPoint) - intval($shoppingPoint);
		$this->mUser->setShoppingPoint($this->data['self']['id'],$newPoint);

		return $shoppingPoint;
	}

	public function order()
	{
		$this->load->model("Checkout_model","MOrder");

		$ucart = $this->cart->show();
		if(
			isset($_REQUEST['shoppingPoint'])  &&
			isset($_REQUEST['cashFlow'])  &&
			isset($_REQUEST['shipFlow'])  &&
			isset($_REQUEST['shipFlowData'])  &&
			$ucart['total'] > 0
		)
		{
			$this->BankRemittances  	= $this->mOption->readVal("BankRemittances");
			$this->PayOnArrival     	= $this->mOption->readVal("PayOnArrival");
			$this->CreditCard     		= $this->mOption->readVal("CreditCard");
			$this->ConvenienceStorePayBarcode   		= $this->mOption->readVal("ConvenienceStorePayBarcode");
			$this->ConvenienceStorePayCode     			= $this->mOption->readVal("ConvenienceStorePayCode");
			$this->WebATM     			= $this->mOption->readVal("WebATM");
			$this->AliPay     			= $this->mOption->readVal("AliPay");
			$this->Allpay     			= $this->mOption->readVal("Allpay");

			$this->data['methods']								= array();
			$this->data['methods']['BankRemittances'] 			= $this->BankRemittances;
			$this->data['methods']['PayOnArrival']	  			= $this->PayOnArrival;
			$this->data['methods']['CreditCard']	  			= $this->CreditCard;
			$this->data['methods']['ConvenienceStorePayBarcode']	  			= $this->ConvenienceStorePayBarcode;
			$this->data['methods']['ConvenienceStorePayCode']	  				= $this->ConvenienceStorePayCode;
			$this->data['methods']['WebATM']	  				= $this->WebATM;
			$this->data['methods']['AliPay']	  				= $this->AliPay;
			$this->data['methods']['Allpay']	  				= $this->Allpay;

			$this->data["ExchangeRate"] = $this->mOption->readVal("ExchangeRate");

			$this->FreeFare  		   	= $this->mOption->readString("FreeFare");

			$isLogin = ($this->self === false) ? false : true;

			$nonUserInfo = ( isset($_REQUEST['nonUserInfo']) ) ? $_REQUEST['nonUserInfo'] : array();

			$data = array(
				"code" 		=> "800",
				"message"	=> $this->data['objLang']["shoppingcart"]["orderfailed"],
				"url"		=> base_url('/message?status=error&title=800&content='.$this->data['objLang']["shoppingcart"]["orderfailed"].'&auto=3000')
			);

			$tran_main = array();
			$tran_main['createTime']	= date("Y-m-d H:i:s");
			$tran_main['userId'] 		= ($isLogin) ? $this->data['self']['id'] : -1;
			$tran_main['nonUserInfo']	= ($isLogin) ? "{}" : json_encode($nonUserInfo) ;

			//檢核訂單歸屬
			$hostId = 0;
			/*
				//$this->webVar["hostId"] 沒有預設為 0
				//非登入狀態下，有部落客代碼，則直接歸屬於該部落客
				if( $this->self === false )
				{
					$hostId = $this->webVar["hostId"];
				}
				//登入狀態下，需檢核該會員是否歸屬於某部落客，若成立當前的分享代碼也必須是該部落客
				else
				{

				//檢核該會員是否歸屬於某部落客
					//不歸屬任何人
					if( $this->self["host_id"] == 0 )
					{
						$hostId = $this->webVar["hostId"];
					}
					//歸屬於某個部落客
					else
					{
					//若有分享代碼必須與當下分享代碼相同
						//無分享代碼，該會員交易必須歸類為所歸屬之部落客
						if( $this->webVar["hostId"] == 0 )
						{
							$hostId = $this->self["host_id"];
						}
						//有分享代碼
						else
						{
							//該會員歸屬部落客必須與分享代碼之部落客
							if( $this->self["host_id"] == $this->webVar["hostId"] )
							{
								$hostId = $this->webVar["hostId"];
							}
						}
					}
				}
			*/
			$tran_main['hostId'] 		= $hostId;


			//取得 金流選擇
			$cashFlowData 				= isset($_REQUEST['cashFlowData']) ? $_REQUEST['cashFlowData'] : "{}";
			$tran_main['cashFlow'] 		= $_REQUEST['cashFlow'];
			$tran_main['cashData'] 		= json_encode($cashFlowData);
			$tran_main['GatewayType'] 	= ($_REQUEST['cashFlow'] == "Allpay")? "allpay" :"suntech" ;
			//取得 物流地址資訊
			$shipFlowData 				= $_REQUEST['shipFlowData'];
			$tran_main['shipFlow'] 		= $_REQUEST['shipFlow'];
			$tran_main['shipData'] 		= json_encode($shipFlowData);
			$tran_main['region']		= $shipFlowData['region'];
			$tran_main['zip'] 			= $shipFlowData['zip'];
			$tran_main['country'] 		= $shipFlowData['city'];
			$tran_main['district'] 		= $shipFlowData['district'];
			$tran_main['address'] 		= $shipFlowData['address'];

			// 更新常用收件人資料
			if ($isLogin)
			{
				$this->load->model("User_exinfo_model");
				$reciverSlot = array(
					array(
						"user_id" => $this->self["id"],
						"key" => "reciverSlot",
						"langCode" => $this->currentLang,
						"value" => $shipFlowData
					));
				$this->User_exinfo_model->save($reciverSlot[0]);
			}

			//取得 促銷模組使用狀況
			$promotion = "{}";
			$promotionAry = array();
			$discountAmout = 0;
			$discountObj = array();
			$discountObj["discountAmout"] = $discountAmout;
			$DateLimitCheckoutDiscount = $this->data["DateLimitCheckoutDiscount"];
			if( $DateLimitCheckoutDiscount["inTerm"] === true )
			{
				if ( floatval($ucart['twTotal']) >= floatval($DateLimitCheckoutDiscount["LimitAmount"]) ){
					$discountAmout = round( floatval($ucart['twTotal']) * ( 1 - floatval($DateLimitCheckoutDiscount["Rate"]) ));
					$DateLimitCheckoutDiscount["discountAmout"] = $discountAmout;
				}
				else{
					$DateLimitCheckoutDiscount["inTerm"] = false ;
				}
				$discountObj = $DateLimitCheckoutDiscount;
			}
			$promotionAry = array(
				"type" => "CheckoutDiscount",
				"value" => $discountObj
			);
			//取得 促銷模組使用狀況
			/*$promotion = "{}";
			$coupon = array(
				"ticketNumber" => false,
				"amount" => 0
			);*/

			//取得 購物金使用狀況
			$shoppingPoint			 	= ($isLogin) ? $this->setShoppingPoint($ucart) : 0;
			$tran_main['shoppingPoint'] = $shoppingPoint;

			$coupon = array(
				"ticketNumber" => false,
				"amount" => 0
			);
			//檢察優惠券
			if( isset($_REQUEST['coupon']) )
			{
				$this->load->model("Coupon_model","mCoupon");
				$response = $this->mCoupon->validate($_REQUEST['coupon'],true);
				if( $response["code"] == 1 )
				{
					$coupon["ticketNumber"] = $_REQUEST['coupon'];
					$coupon["amount"] = $response["result"];
					/*$promotion = json_encode(array(
						"type" => "coupon",
						"value" => $coupon
					));*/
					array_push($promotionAry, array(
						"type" => "coupon",
						"value" => $coupon
					));
				}
			}
			$promotion = json_encode( $promotionAry) ;
			$tran_main['promotionObj'] 	= $promotion;

			//檢察優惠券
			/*if( isset($_REQUEST['coupon']) )
			{
				$this->load->model("Coupon_model","mCoupon");
				$response = $this->mCoupon->validate($_REQUEST['coupon'],true);
				if( $response["code"] == 1 )
				{
					$coupon["ticketNumber"] = $_REQUEST['coupon'];
					$coupon["amount"] = $response["result"];
					$promotion = json_encode(array(
						"type" => "coupon",
						"value" => $coupon
					));
				}
			}
			$tran_main['promotionObj'] 	= $promotion;	*/

			//取得 手續費/運費金額
			$listFeeFare = $this->readFeeFare( $_REQUEST['cashFlow'], $shipFlowData, $this->data["ExchangeRate"] );
			$tran_main['transFee'] 		= $listFeeFare['fee'];
			$tran_main['transFare'] 	= ( floatval($ucart['twTotal']) - floatval($shoppingPoint) - floatval($coupon["amount"]) > $this->FreeFare )?0:$listFeeFare['fare'];
			//訂單毛額/總金額
			$tran_main['total'] 		= $ucart['twTotal'];
			$tran_main['clearTotal'] 	= floatval($ucart['twTotal']) - floatval($discountAmout) - floatval($shoppingPoint) - floatval($coupon["amount"]) + floatval($tran_main['transFee']) + floatval($tran_main['transFare']);
			$tran_main['iso_code']      = $this->currentCurrency;
			$tran_main['rate']      	= $this->data["ExchangeRate"][$this->currentCurrency]["rate"];


			$this->load->model("Option_model","mOption");

			//check product stock & total amount
			$this->load->model("Product_model");
			$ordTotalFromDB = 0 ;
			$ordTotalCheckFlag = true ;
			$prodStockFlag = true ;
			foreach( $ucart['cart'] AS $row )
			{
				// 數量 form db
				$dataProduct 	= $this->Product_model->findAllKey(array("id"=>$row['PID']));
				$mainKey		= $dataProduct[0]["detailKey"];
				if ( $dataProduct[0]["flag"] == "0" || $dataProduct[0]["flag"] == "2" ){  //產品下架 或待審
					$prodStockFlag = false ;
					break;
				}

				$dataStock 		= $this->Product_model->findStock($mainKey);
				$realStock 		= $this->findRealStock($dataStock, $row['formatType']);
				$qty = intval( $row['qty']) ;
				if( $realStock < $qty ){
					$prodStockFlag = false ;
					break;
				}

				//計算訂單總金額 from db (prod)
				$arrProd_rs = $this->Product_model->find( $row['PID'] );
				if ( isset($arrProd_rs[0]) ){
					if( $isLogin !== false )
					{
						$ordTotalFromDB+= $qty * $arrProd_rs[0]['cTWPrice'] ;
					}
					else
					{
						//$total+= $item['qty'] * $arr_rs[0]['price'] - ( $discountQty * $arr_rs[0]['TWPrice'] );
						$ordTotalFromDB+= $qty * $arrProd_rs[0]['TWPrice'] ;
					}
				}
			}
			// check prod total amount == ucart prod total amount
			if ( $ordTotalFromDB != $ucart['twTotal'] ){
				$ordTotalCheckFlag = false ;
			}

			$checkWarn = array();

			if($prodStockFlag && $ordTotalCheckFlag ){
				//建立訂單 商品明細子表
				$this->load->model("Product_model");
				$tran_detail = array();
				foreach( $ucart['cart'] AS $row )
				{
					$new_row = array();
					$new_row['productId'] 		= $row['PID'];
					$new_row['price'] 			= $row['showPrice'];
					$new_row['qty'] 			= $row['qty'];
					$new_row['formatType'] 		= $row['formatType'];
					$new_row['createTime'] 		= date("Y-m-d H:i:s");
					$tran_detail[] = $new_row;

					$this->Product_model->reduceStock($row['qty'],$row['detailKey'],$row['formatType']);

					// 檢查庫存
					if ($this->Product_model->checkWarnValue($row['detailKey'],$row['formatType']) === false){
					    $checkWarn[] = array(
					        'detailKey' => $row['detailKey'],
					        'formatType' => $row['formatType'],
					    );
					}

				}
				$result = $this->MOrder->createTransaction($tran_main, $tran_detail);


				//$result = true;
				if( $result != false )
				{
					if( $_REQUEST['cashFlow'] == "BankRemittances" || $_REQUEST['cashFlow'] == "PayOnArrival" )
					{
						$showBankRemittancesInfo = ($tran_main['cashFlow'] == "BankRemittances")?'&BankRemittancesInfo=1':'';
						$phone = ($isLogin)?'':'&phone='.$nonUserInfo["phone"];
						$data = array(
							"code" 		=> "200",
							"message"	=> $this->data['objLang']["shoppingcart"]['ordersuccess'],
							"url"		=> base_url('/message?status=info&title='.$this->data['objLang']["shoppingcart"]['ordersuccess'].'	&transId='.$result.$phone.'&content='.$showBankRemittancesInfo.' TransID : '.$result)
						);
					}
					else
					{
						/*
						//匯率轉換
						$MN = 0;
						$ExchangeRate = $this->mOption->readVal("ExchangeRate");
						$MN = floatval($tran_main['clearTotal']) * $ExchangeRate[$this->currentCurrency]["rate"];
						$MN = ceil( floatval($MN) );
						*/


						// 優惠券  ; 購物金 ; 全館折扣
						$orderDiscount = - floatval($discountAmout) - floatval($shoppingPoint) - floatval($coupon["amount"]) ;
						// 運費 ; 手續費
						$orderTax =  floatval($tran_main['transFee']) + floatval($tran_main['transFare']);
						$MN = $tran_main['clearTotal'];
						//金流
						if(  $_REQUEST['cashFlow'] == "Allpay"  )
						{
							$CashOutData = array(
								"Gateway_Type" 		=> 0,
								"MerchantTradeNo" 	=> $result,
								"MerchantTradeDate" => date("Y/m/d H:i:s"),
								"PaymentType" 		=> "aio",
								"ChoosePayment" 	=> "ALL",
								"TotalAmount"		=> $MN,
								"OrderDiscount"		=> $orderDiscount,
								"OrderTax"			=> $orderTax,
								"TradeDesc" 		=> "交易描述",
								"ItemName" 			=> "測試ITEM",
								"AlipayItemName" 	=> "測試ITEMs",
								"AlipayItemCounts" 	=> 9,
								"AlipayItemPrice" 	=> $MN,
								"Email" 			=> ($isLogin) ? $this->self['mail']  : $nonUserInfo["mail"],
								"PhoneNo" 			=> ($isLogin) ? $this->self['phone'] : $nonUserInfo["phone"],
								"UserName" 			=> ($isLogin) ? $this->self['name']  : $nonUserInfo["fullname"]
							);
							//清空購物車   (不清除 => 要傳送訂單明細給 allpay)
							//$this->cart->clear();
						}
						else
						{
							$CashOutData = array(
								"Gateway_Type" 	=> 0,
								"Payment_Type" 	=> $_REQUEST['cashFlow'],
								"Td" 			=> $result,
								"sna" 			=> ($isLogin) ? $this->self['name']  : $nonUserInfo["fullname"],
								//"sdt" 			=> ($isLogin) ? $this->self['phone'] : $nonUserInfo["phone"],
								"sdt" 			=> "",
								"email" 		=> ($isLogin) ? $this->self['mail']  : $nonUserInfo["mail"],
								"MN"			=> $MN,
								"note1"			=> "",
								"note2"			=> "",
								"Card_Type"		=> 0
							);
							//清空購物車
							$this->cart->clear();
						}

						$CashOutProductData = array();    //for 金流 ( ConvenienceStorePayBarcode ) 使用
						if( $_REQUEST['cashFlow'] == "ConvenienceStorePayBarcode" )
						{
							$CashOutProductData["ProductName1"] = "商品總計" ;
							$CashOutProductData["ProductPrice1"] = $MN ;
							$CashOutProductData["ProductQuantity1"] = "1" ;
							$CashOutProductData["DueDate"] = date("Ymd",strtotime(" +3 days")) ;
						}

						$data = array(
							"code" 		=> "301",
							"message"	=> $this->data['objLang']["shoppingcart"]['ordersuccess'],
							"url"		=> '/payment/index/'.$_REQUEST['cashFlow'].'?'.http_build_query($CashOutData)."&".http_build_query($CashOutProductData)
						);
					}
				}

				//準備通知客戶信箱
				$this->load->helper('email_helper');
				$mail_name	  = ($isLogin) ? $this->data['self']['name'] : $nonUserInfo["fullname"];
				$mail_address = ($isLogin) ? $this->data['self']['mail'] : $nonUserInfo["mail"];
				$AdminMail 			= $this->mOption->readVal("AdminMail");
				$OrderSuccessMail 	= $this->mOption->readVal("OrderSuccessMail");
				//取代 資料變數 客戶姓名
				$OrderSuccessMail["title"] 		= str_replace("_NAME_", 		$mail_name, $OrderSuccessMail["title"]);
				$OrderSuccessMail["content"] 	= str_replace("_NAME_", 		$mail_name, $OrderSuccessMail["content"]);
				//取代 資料變數 訂單編號
				$OrderSuccessMail["title"] 		= str_replace("_ORDERNUMBER_", 	$result, 	$OrderSuccessMail["title"]);
				$OrderSuccessMail["content"] 	= str_replace("_ORDERNUMBER_", 	$result, 	$OrderSuccessMail["content"]);

				$AdminMailStr = str_replace( ";" , "," , $AdminMail["mail"]);
				//通知客戶信箱 訂單已確立
				sendMailBySystemMail( $AdminMailStr.",".$mail_address, $AdminMail["account"], $OrderSuccessMail["title"], $OrderSuccessMail["content"]);

				if (@$checkWarn){
				    $message = '';
				    foreach ($checkWarn as $k => $v){
    				    $detail = $this->Product_model->findNameByDetailKey($v['detailKey'], $v['formatType']);
    				    $message .= "{$detail['name']} {$v['formatType']} 低庫存警告數量設定 : {$detail['warnValue']}, 實際庫存 : {$detail['value']}    \n";
				    }

				    $title = date('Y')." 年 ". date('m') ." 月 ". date('d') ." 日 " .date('H'). "時". date('i') ."分 商品低庫存警告信 ";

				    sendMailBySystemMail($AdminMailStr, $AdminMail["account"], '庫存警告信', $message);
				}



				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($data);
			}
			else{   // stock 庫存不足 或金額不對
				//清空購物車
				$this->cart->clear();

				$data = array(
					"code" 		=> "800",
					"message"	=> $this->data['objLang']["shoppingcart"]["orderfailed"],
					"url"		=> base_url('/message?status=error&title='.$this->data['objLang']["shoppingcart"]["orderfailed"].'&content='.$this->data['objLang']["shoppingcart"]["addCartInsufficientContent"].'&auto=3000')
				);
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($data);
			}
		}
		else
		{
			$data = array(
				"code" 		=> "404",
				"message"	=> "none",
				"url"		=> base_url('/')
			);
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($data);
		}
	}

	public function coupon()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if( isset($_POST["ticketNumber"]) )
		{
			$this->load->model("Coupon_model","mCoupon");

			$response = $this->mCoupon->validate($_POST["ticketNumber"]);

			$mappingMsg = array( "-1" => "validateIsEmpty", "-2" => "validateIsUsed", "-3" => "validateIsExpired", "1" => "validateSuccess" );

			$ExchangeRate = $this->mOption->readVal("ExchangeRate");

			//優惠券是以TWD為基底，必須轉換為當前貨幣
			$response["result"] = ( floatval($response["result"])  / floatval($ExchangeRate[$this->currentCurrency]["rate"]) );

			$this->jsonRS['code'] 		= $response["code"];
			$this->jsonRS['message'] 	= $this->data['objLang']['shoppingcart'][$mappingMsg[$response["code"]]];//'操作完成';
			$this->jsonRS['result'] 	= $response["result"];
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	private function findRealStock($dataStock, $formatType)
	{
		$realStock = 0;
		foreach( $dataStock AS &$row )
		{
			if( $row["formatType"] == $formatType )
			{
				$realStock = $row['value'];
				break;
			}
		}
		return $realStock;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */