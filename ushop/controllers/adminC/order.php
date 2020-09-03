<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
		
		$this->data["objLang"]["shoppingcart"] = $this->loadLang("widget/shoppingcart/");
		$this->data["objLang"]["orderlist"] = $this->loadLang("widget/orderlist/");
	}
	
	public function index($query)
	{
		
	}
	
	public function ShipmentNotice()
	{
		if( isset($_GET["id"]) )
		{
		
			$this->data["css_include"] 	= "product";
		
			$this->load->model("Order_model");
		
			$obj_orderlist_lang = $this->loadLang("widget/orderlist/");
			
			$this->data['list_order'] = $this->Order_model->findOrderDetail($_GET["id"]);
			$this->data['list_status_selector'] = array(
				"-1" 	=> $obj_orderlist_lang['invalid'],
				"101" 	=> $obj_orderlist_lang['failed'],
				"100" 	=> $obj_orderlist_lang['expired'],
				"0" 	=> $obj_orderlist_lang['pending'],
				"1" 	=> $obj_orderlist_lang['remittanceChecked'],
				"2" 	=> $obj_orderlist_lang['shipping'],
				"3" 	=> $obj_orderlist_lang['arrival'],
				"4" 	=> $obj_orderlist_lang['waitOfflinePay']
			);
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/order/ShipmentNotice',$this->data);
		}
		else 
		{
			redirect("/admin/order/listTable","location","301");
		}
	}
	
	public function distributeShoppingPoint()
	{
		if(
			isset($_POST['transId']) &&
			isset($_POST['userId']) &&
			isset($_POST['value']) 
		)
		{
			$this->load->model("User_model");
			$this->data["result"] = $this->User_model->distributeShoppingPoint($_POST['userId'],$_POST['value']);
			
			$this->load->model("Order_model");
			$this->data["result"] = $this->Order_model->isAllot($_POST['transId']);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			$this->jsonRS['post']		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function shoppingPoint()
	{
		if(isset($_GET['id']))
		{
		
			$this->data["css_include"] 	= "product";
		
			$this->load->model("Order_model");
		
			$orderlist_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "orderlist" . DIRECTORY_SEPARATOR;
			$temp_orderlist_lang_path = $orderlist_lang_path . $this->data['Lang'] . ".json";		
			$orderlist_lang_path=(!file_exists($temp_orderlist_lang_path))?$orderlist_lang_path. DEFAULTLANG . ".json":$temp_orderlist_lang_path;		
			$obj_orderlist_lang = json_decode( file_get_contents($orderlist_lang_path),true );
			$this->data['list_order'] = $this->Order_model->findOrderDetail($_GET['id']);
			$this->data['list_status_selector'] = array(
				"101" 	=> $obj_orderlist_lang['failed'],
				"100" 	=> $obj_orderlist_lang['expired'],
				"0" 	=> $obj_orderlist_lang['pending'],
				"1" 	=> $obj_orderlist_lang['remittanceChecked'],
				"2" 	=> $obj_orderlist_lang['shipping'],
				"3" 	=> $obj_orderlist_lang['arrival'],
				"4" 	=> $obj_orderlist_lang['waitOfflinePay']
			);
			//get ShoppingPointRate 
			$this->load->model("Option_model");	
			$this->data["ShoppingPointRate"] = (is_int($this->Option_model->readVal("ShoppingPointRate"))) ? $this->Option_model->readVal("ShoppingPointRate") : 0 ;
			/*
			header('Content-Type: application/json; charset=utf-8');
			var_dump($this->data['list_order']);
			exit;
			*/
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/order/shoppingPoint',$this->data);
		}
		else 
		{
			redirect("/admin/order/listTable","location","301");
		}
	}
	
	public function detail()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "product";
		
			$this->load->model("Order_model");
		
			$obj_orderlist_lang = $this->loadLang("widget/orderlist/");
			
			$orderDetail = $this->Order_model->findOrderDetail($_GET['id']);

			/*$this->data['list_status_selector'] = array(
				"-1" 	=> $obj_orderlist_lang['invalid'],
				"101" 	=> $obj_orderlist_lang['failed'],
				"100" 	=> $obj_orderlist_lang['expired'],
				"0" 	=> $obj_orderlist_lang['pending'],
				"1" 	=> $obj_orderlist_lang['remittanceChecked'],
				"2" 	=> $obj_orderlist_lang['shipping'],
				"3" 	=> $obj_orderlist_lang['arrival'],
				"4" 	=> $obj_orderlist_lang['waitOfflinePay']
			);*/

			if( isset($orderDetail['cashData']["callback"]["PaymentType"]) ){
				(strpos($orderDetail['cashData']["callback"]["PaymentType"],"WebATM") === 0) ? $orderDetail['cashData']["callback"]["PaymentType"] = "WebATM" :"" ;
				(strpos($orderDetail['cashData']["callback"]["PaymentType"],"ATM") === 0) ? $orderDetail['cashData']["callback"]["PaymentType"] = "ATM" :"" ;
				$orderDetail['cashData']["callback"]["PaymentTypeName"] = isset($obj_orderlist_lang[$orderDetail['cashData']["callback"]["PaymentType"]])? $obj_orderlist_lang[$orderDetail['cashData']["callback"]["PaymentType"]] :"" ; 
			}

			$this->data['list_order'] = $orderDetail ; 
			/*
			header('Content-Type: application/json; charset=utf-8');
			var_dump($this->data['list_order']);
			exit;
			*/
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/order/detail',$this->data);
		}
		else 
		{
			redirect("/admin/order/listTable","location","301");
		}
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
			$this->data["result"][] = $this->Product_model->saveProduct($_POST['data_product'],$isNew);
			$this->data["result"][] = $this->Product_model->saveDetail($_POST['data_detail'],$isNew);
			$this->data["result"][] = $this->Product_model->savePrice($_POST['data_price'],$isNew);
			$this->data["result"][] = $this->Product_model->saveStock($_POST['data_stock'],$isNew);
			
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

	private function sendMessageForUser($id)
	{
		$this->load->model("Order_model");
		
		$list_order = $this->Order_model->findOrderDetail($id);
		
		if( $list_order["isSend"] != "1" )
		{
			/*
			$this->load->model("Product_model");
			foreach( $list_order["detail"]  AS $sDetail )
			{
				$this->Product_model->reduceStock($sDetail['qty'],$sDetail['productId'],false);				
			}
			*/
			
			if( $list_order['userId'] == "-1" )
			{
				$nonUser = json_decode($list_order["nonUserInfo"],true);
				$mail_name = $nonUser["fullname"];
				$mail_addr = $nonUser["mail"];
			}
			else
			{
				$mail_name = $list_order["dataUser"]["name"];
				$mail_addr = $list_order["dataUser"]["mail"];
			}
			//$list_order["unique_id"]
				
			$this->load->helper('email_helper');
			$this->load->model("Option_model","mOption");
			
			$AdminMail 	= $this->mOption->readVal("AdminMail");	
			$OrderSend 	= $this->mOption->readVal("OrderSend");
			
			$OrderSend["title"] 	= str_replace("_NAME_", 		$mail_name, 				$OrderSend["title"]);
			$OrderSend["title"] 	= str_replace("_ORDERNUMBER_", 	$list_order["unique_id"], 	$OrderSend["title"]);
			$OrderSend["content"] 	= str_replace("_NAME_", 		$mail_name, 				$OrderSend["content"]);
			$OrderSend["content"] 	= str_replace("_ORDERNUMBER_", 	$list_order["unique_id"], 	$OrderSend["content"]);
			
			sendMailBySystemMail( $mail_addr, $AdminMail["account"], $OrderSend["title"], $OrderSend["content"]);
			
		}
	}

	private function sendRefundMessageForUser($id)
	{
		$this->load->model("Order_model");	
		$list_order = $this->Order_model->findOrderDetail($id);
		
		if( $list_order['userId'] == "-1" )
		{
			$nonUser = json_decode($list_order["nonUserInfo"],true);
			$mail_name = $nonUser["fullname"];
			$mail_addr = $nonUser["mail"];
		}
		else
		{
			$mail_name = $list_order["firstName"]." ".$list_order["lastName"] ;
			$mail_addr = $list_order["mail"];
		}
			
		$this->load->helper('email_helper');
		$this->load->model("Option_model","mOption");
		$AdminMail 	= $this->mOption->readVal("AdminMail");	

		$this->load->model("Widget_model","mWidget");
		$RefundSendMail	= $this->mWidget->find("RefundSendMail", $list_order["langCode"]);  
		$OrderSend 			= isset($RefundSendMail[0]) ? $RefundSendMail[0]["value"] : array("title"=>"", "content"=>"") ;
			
		$OrderSend["title"] 	= str_replace("_NAME_", 		$mail_name, 				$OrderSend["title"]);
		$OrderSend["title"] 	= str_replace("_ORDERNUMBER_", 	$list_order["unique_id"], 	$OrderSend["title"]);
		$OrderSend["content"] 	= str_replace("_NAME_", 		$mail_name, 				$OrderSend["content"]);
		$OrderSend["content"] 	= str_replace("_ORDERNUMBER_", 	$list_order["unique_id"], 	$OrderSend["content"]);
			
		sendMailBySystemMail( $mail_addr, $AdminMail["account"], $OrderSend["title"], $OrderSend["content"]);
			
	}
	
	private function pushNotification($id)
	{
		$this->load->model("Order_model");
		
		$order = $this->Order_model->findOrderDetail($id);
		$order_createTime =  isset($order["createTime"]) ? $order["createTime"] : date("Y-m-d H:i:s") ;
		
		if( $order["hostId"] != 0 )
		{
			$this->load->model("User_model","mUser");
			$this->load->model("Option_model","mOption");
			$rate = $this->mOption->readString("HostRate");
			$money = round($order['clearTotal'] * $rate);
			//update order isPushNotify 
			if ( $order["isPushNotify"] == "0"  ){ 
				$this->mUser->pushNotification($order["hostId"],"恭喜您獲得一筆獎金 NT $".$money);
				$this->Order_model->save(array("id"=>$order["id"],"isPushNotify"=>1));
			}
			// update or insert bonus status ('1') 
			$result = $this->mUser->queryBonus($order["hostId"],$order["id"]);
			if (isset($result[0]["id"]) ){ // update
				$this->mUser->logBonus($order["hostId"],$order["id"],0,$result[0]["id"],date("Y-m-d H:i:s"),true);
			}
			else { //insert 
				$this->mUser->logBonus($order["hostId"],$order["id"],$money,"",$order_createTime);
			}
		}
	}

	public function changeAddr(){
		if( 
			isset($_POST['id']) &&
			isset($_POST['method']) &&
			isset($_POST['region']) &&
			isset($_POST['zip']) &&
			isset($_POST['address']) &&
			isset($_POST['city']) &&
			isset($_POST['district'])
		)
		{
			$this->load->model("Order_model");
			//取得原本 訂單物件
			$orderDetailObj = $this->Order_model->findOrderDetail($_POST['id']);
			$shipData["reciverName"]= $orderDetailObj['shipData']['reciverName'] ;
			$shipData["region"] 	= $_POST['region'] ;
			$shipData["zip"] 		= $_POST['zip'] ;
			$shipData["address"] 	= $_POST['address'] ;
			$shipData["city"] 		= $_POST['city'] ;
			$shipData["district"] 	= $_POST['district'] ;

			$updateData = array();

			if ( $_POST['method'] == "orderAddrUpdate" ){
				$updateData["region"] 		= $_POST['region'] ;
				$updateData["zip"] 			= $_POST['zip'] ;
				$updateData["address"] 		= $_POST['address'] ;
				$updateData["country"] 		= $_POST['city'] ;
				$updateData["district"] 	= $_POST['district'] ;
				$updateData["shipData"] 	= json_encode($shipData);
				$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
			}
			$resp = $this->Order_model->updateStatus($_POST['id'], $updateData );

			//transaction_log data
			$transactionLogArray = array();
			$transactionLogArray["userId"] = $this->admin["id"] ;
			$transactionLogArray["orderId"] = isset($orderDetailObj["unique_id"])?$orderDetailObj["unique_id"] :"" ;
			$transactionLogArray["method"] 	= $_POST['method'] ;
			$transactionLogArray["type"] 	= $orderDetailObj['type'] ;
			$transactionLogArray["reson"] 	= json_encode($orderDetailObj['shipData']);
			$this->Order_model->transactionLogSave($transactionLogArray);    // insert transaction_log

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function changeStatus()
	{
		if( 
			isset($_POST['id']) &&
			isset($_POST['method']) &&
			isset($_POST['type']) &&
			isset($_POST['reson'])
		)
		{
			/*$this->load->model("Order_model");
			$this->load->model("Option_model","mOption");
			
			$OrderSendStatus = $this->mOption->readString("OrderSendStatus");
			$isSend = false;
			if( $_POST['type'] == $OrderSendStatus )
			{				
				$this->sendMessageForUser($_POST['id']);
				$isSend = true;
			}	
			$pushNotify = array(1,2,3);
			$failType = array(101,100,-1);		
			if( in_array($_POST['type'], $pushNotify) )
			{
				$this->jsonRS['pushNotify']  = $this->pushNotification($_POST['id']);
			}
			else if( in_array($_POST['type'], $failType) )    // auto revokeBonus 
			{
				$this->jsonRS['revokeBonus'] = $this->autoRevokeBonus($_POST['id']);
			}
			$resp = $this->Order_model->changeStatus($_POST['id'],$_POST['type'],$isSend);		
			*/
			$this->load->model("Order_model");
			//$this->load->model("Option_model","mOption");
			//取得原本 訂單物件
			$orderDetailObj = $this->Order_model->findOrderDetail($_POST['id']);
			$updateData = array();

			if ( $_POST['method'] == "orderType" )
			{
				$updateData["type"] 		= $_POST['type'] ;
				$updateData["updateTime"] 	= date("Y-m-d H:i:s");
				if($_POST['type']=="9" && $orderDetailObj['shipType']==2)
				{
					if($orderDetailObj['paymentType']!=0){
						$updateData["paymentType"] 		= 11 ;
						$updateData["paymentTypeTime"] 	= date("Y-m-d H:i:s") ;
						$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;	
					}					
					$updateData["shipType"] = 31;	
					$updateData["shipTypeTime"] 	= date("Y-m-d H:i:s") ;
					$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
				}
				elseif($_POST['type']=="-1")
				{
					if($orderDetailObj['shoppingPoint']>0){
						$this->load->model("User_model","mUser");	
						$currentPoint = $this->mUser->realTimePoint($orderDetailObj["userId"]);
						$shoppingPoint = $orderDetailObj['shoppingPoint'];;
						
						//將已使用的購物金 從消費者帳戶中補回
						$newPoint = intval($currentPoint) + intval($shoppingPoint);
						$this->mUser->setShoppingPoint($orderDetailObj["userId"], $newPoint);
					}
					
					if($orderDetailObj['shipType']==31){
						if($orderDetailObj['paymentType']!=0){
							$updateData["paymentType"] 	= 10 ;
							$updateData["paymentTypeTime"] 	= date("Y-m-d H:i:s") ;
							$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
						}
						$updateData["shipType"] = 31;	
						$updateData["shipTypeTime"] 	= date("Y-m-d H:i:s") ;
						$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
					}
				}
			}
			elseif( $_POST['method'] == "paymentType" ) 
			{
				$updateData["paymentType"] 		= $_POST['type'] ;
				$updateData["paymentTypeTime"] 	= date("Y-m-d H:i:s") ;
				$updateData["updateTime"] 		= date("Y-m-d H:i:s") ;
			}
			elseif ( $_POST['method'] == "shipType" ) {
				$updateData["shipType"] 		= $_POST['type'] ;
				$updateData["shipTypeTime"] 	= date("Y-m-d H:i:s") ;
				$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;

				if($_POST['type']=="10"||$_POST['type']=="30"){
					$updateData["type"] 		= 1 ;
					$updateData["updateTime"] 	= date("Y-m-d H:i:s");			
					$updateData["paymentType"] 		= 1 ;
					$updateData["paymentTypeTime"] 	= date("Y-m-d H:i:s") ;
					$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
				}
			}
			$resp = $this->Order_model->updateStatus($_POST['id'], $updateData );

			//transaction_log data
			$transactionLogArray = array();
			$transactionLogArray["userId"] = $this->admin["id"] ;
			$transactionLogArray["orderId"] = isset($orderDetailObj["unique_id"])?$orderDetailObj["unique_id"] :"" ;
			$transactionLogArray["method"] 	= $_POST['method'] ;
			$transactionLogArray["type"] 	= $_POST['type'] ;
			$transactionLogArray["reson"] 	= $_POST['reson'] ;
			$this->Order_model->transactionLogSave($transactionLogArray);    // insert transaction_log

			// 根據 option 欄位寄送通知信 
			$isSend = false;
			if( $_POST['method'] == "shipType" && ($_POST['type'] == "5" || $_POST['type'] == "25" ) && $resp >= 1 )
			{				
				$this->sendMessageForUser($_POST['id']);
				$isSend = true;
				$updateData = array();
				$updateData['isSend'] = "1";
				$updateData["updateTime"] 	= date("Y-m-d H:i:s") ;
				$this->Order_model->updateStatus($_POST['id'],$updateData );
			}

			//if( $_POST['method'] == "paymentType" && $_POST['type'] == "10" && $resp >= 1 )
			//{				
			//	$this->sendRefundMessageForUser($_POST['id']);
			//}

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}

	private function autoRevokeBonus($orderId)
	{
		$this->load->model("Order_model");
		$order = $this->Order_model->findOrderDetail($orderId);
		if( $order["hostId"] != 0 )
		{
			$this->load->model("User_model","mUser");
			// update or insert bonus status ('0') 
			$result = $this->mUser->queryBonus($order["hostId"],$order["id"]);
			if (isset($result[0]["id"]) ){ // update
				$this->mUser->logBonusForCancel($result[0]["id"]);
			}
		}
	}

	public function revokeBonus()
	{
		if( 
			isset($_POST['id']) 
		)
		{
			$this->load->model("User_model");

			$resp = $this->User_model->logBonusForCancel($_POST['id']);		
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}
	
	public function changeBankRemittancesAccount()
	{
		if( 
			isset($_POST['id']) &&
			isset($_POST['cashFlow']) &&
			isset($_POST['cashData'])
		)
		{
			$this->load->model("Order_model");

			$resp = $this->Order_model->changeBankRemittancesAccount($_POST['id'],$_POST['cashFlow'],$_POST['cashData']);		
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}

	public function refundStock()
	{
		if( 
			isset($_POST['orderId']) 
		)
		{
			$this->load->model("Order_model");
			$this->load->model("Product_model");
			//查詢訂單明細 
			$orderDetailObj = $this->Order_model->findOrderDetail($_POST['orderId']); 
			//更新庫存 & "isRefundStock: 1=>已回補"
			$admin = $this->admin ;
			$adminId=  (isset($admin["id"]))? $admin["id"]:"";
			$resp = $this->Product_model->refundStock( $orderDetailObj["detail"],$_POST['orderId'] , $adminId) ;

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}
	
	public function listTable()
	{
		$this->data["css_include"] 	= "user";
		
		$obj_orderlist_lang = $this->loadLang("widget/orderlist/");
		
		$this->load->model("User_model");	
		$this->data["listBloger"] = $this->User_model->findAllBloger();
		
		$this->load->model("Order_model");	
		$this->load->model("Option_model");
		
		$startStr = ( isset($_POST["start"]) && strlen($_POST["start"]) >0 ) ? date("Y-m-d 00:00:00",strtotime($_POST["start"])) : false ;
		$endStr = ( isset($_POST["end"]) && strlen($_POST["end"]) >0 ) ? date("Y-m-d 23:59:59",strtotime($_POST["end"])) : false ;
		$typeStr = ( isset($_POST["ordtype"]) && $_POST["ordtype"] != "all" ) ? $_POST["ordtype"] : "all" ;
		$paymentTypeStr = ( isset($_POST["paymenttype"]) && $_POST["paymenttype"] != "all" ) ? $_POST["paymenttype"] : "all" ;
		$shipTypeStr = ( isset($_POST["shiptype"]) && $_POST["shiptype"] != "all" ) ? $_POST["shiptype"] : "all" ;
		$emailStr = ( isset($_POST["email"]) && strlen($_POST["email"]) >0  ) ? $_POST["email"] : false ;
		$list_order = $this->Order_model->findOrderListByCritiria($startStr,$endStr,$emailStr ,$typeStr);

		//$list_order = $this->Order_model->findOrderList();
		foreach( $list_order AS $k => $order )
		{
			if($order['userId'] == "-1")
			{
				$nonUser = json_decode($order["nonUserInfo"],true);
				$list_order[$k]['userMail'] = "<a class=\"btn btn-default btn-xs\">非會員</a><br/>".$nonUser["mail"];
			}
			if($order['bonusLogId'] != "-1")  // 取得紅利金狀態
			{
				$bonusResult = $this->User_model->queryBonusById($order['bonusLogId']);
				$bonusStatus = isset($bonusResult[0]["status"])? $bonusResult[0]["status"] : "" ;
				$list_order[$k]['bonusStatus'] = $bonusStatus ;
			}
			if( isset($list_order[$k]['cashData']["callback"]["PaymentType"]) ){
				(strpos($list_order[$k]['cashData']["callback"]["PaymentType"],"WebATM") === 0) ? $list_order[$k]['cashData']["callback"]["PaymentType"] = "WebATM" :"" ;
				(strpos($list_order[$k]['cashData']["callback"]["PaymentType"],"ATM") === 0) ? $list_order[$k]['cashData']["callback"]["PaymentType"] = "ATM" :"" ;
				$list_order[$k]['cashData']["callback"]["PaymentTypeName"] = isset($obj_orderlist_lang[$list_order[$k]['cashData']["callback"]["PaymentType"]])? $obj_orderlist_lang[$list_order[$k]['cashData']["callback"]["PaymentType"]] :"" ; 
			}
		}
		//取得紅利金比例
		$this->data["rate"] = $this->Option_model->readString("HostRate");
		//取得購物金比例
		$this->data["ShoppingPointRate"] = (is_int($this->Option_model->readVal("ShoppingPointRate"))) ? $this->Option_model->readVal("ShoppingPointRate") : 0 ;

		$this->data['list_order'] = $list_order;

		$obj_orderstatus_lang = $this->loadLang("widget/orderstatus/");
// error_log(print_r($obj_orderstatus_lang,true),3,"uploads/log_controller_order_obj_orderstatus_lang.log");
		$this->data['list_status_selector'] = array(    //order
			"0" 	=> isset($obj_orderstatus_lang["order_0"]) ? $obj_orderstatus_lang["order_0"] : "成立",
			"9" 	=> isset($obj_orderstatus_lang["order_9"]) ? $obj_orderstatus_lang["order_9"] : "取消處理中",
			"-1" 	=> isset($obj_orderstatus_lang["order_-1"]) ? $obj_orderstatus_lang["order_-1"] : "已取消",
			"1" 	=> isset($obj_orderstatus_lang["order_1"]) ? $obj_orderstatus_lang["order_1"] : "完成"
		);
		$this->data['list_payment_status_selector'] = array(   //payment
			"0" 	=> isset($obj_orderstatus_lang["payment_0"]) ? $obj_orderstatus_lang["payment_0"] : "--",
			"1" 	=> isset($obj_orderstatus_lang["payment_1"]) ? $obj_orderstatus_lang["payment_1"] : "成功",
			"-1" 	=> isset($obj_orderstatus_lang["payment_-1"]) ? $obj_orderstatus_lang["payment_-1"] : "失敗",
			"9" 	=> isset($obj_orderstatus_lang["payment_9"]) ? $obj_orderstatus_lang["payment_9"] : "等待",
			"11" 	=> isset($obj_orderstatus_lang["payment_11"]) ? $obj_orderstatus_lang["payment_11"] : "退款處理中",
			"10" 	=> isset($obj_orderstatus_lang["payment_10"]) ? $obj_orderstatus_lang["payment_10"] : "退款完成"
		);
		$this->data['list_ship_status_selector'] = array(    //ship
			"0" 	=> isset($obj_orderstatus_lang["ship_0"]) ? $obj_orderstatus_lang["ship_0"] : "--",
			"2" 	=> isset($obj_orderstatus_lang["ship_2"]) ? $obj_orderstatus_lang["ship_2"] : "準備中",
			// "3" 	=> isset($obj_orderstatus_lang["ship_3"]) ? $obj_orderstatus_lang["ship_3"] : "待出庫",
			"31" 	=> isset($obj_orderstatus_lang["ship_31"]) ? $obj_orderstatus_lang["ship_31"] : "取消出庫",
			"5" 	=> isset($obj_orderstatus_lang["ship_4"]) ? $obj_orderstatus_lang["ship_4"] : "已寄出",
			"10" 	=> isset($obj_orderstatus_lang["ship_10"]) ? $obj_orderstatus_lang["ship_10"] : "已取貨",
			"12" 	=> isset($obj_orderstatus_lang["ship_12"]) ? $obj_orderstatus_lang["ship_12"] : "退貨(已收)",
			"25" 	=> isset($obj_orderstatus_lang["ship_25"]) ? $obj_orderstatus_lang["ship_25"] : "換貨(寄出)",
			"30" 	=> isset($obj_orderstatus_lang["ship_30"]) ? $obj_orderstatus_lang["ship_30"] : "換貨(已取貨)"
		);
		/*
		$this->data['list_order'] = $list_order;
		$this->data['list_status_selector'] = array(
			"101" 	=> $obj_orderlist_lang['failed'],
			"100" 	=> $obj_orderlist_lang['expired'],
			"0" 	=> $obj_orderlist_lang['pending'],
			"1" 	=> $obj_orderlist_lang['remittanceChecked'],
			"2" 	=> $obj_orderlist_lang['shipping'],
			"3" 	=> $obj_orderlist_lang['arrival'],
			"4" 	=> $obj_orderlist_lang['waitOfflinePay']
		);*/

		$this->data["start"] = ( isset($_POST["start"]) && strlen($_POST["start"]) >0 ) ? $_POST["start"] : "" ;
		$this->data["end"] =  ( isset($_POST["end"]) && strlen($_POST["end"]) >0 ) ? $_POST["end"] : "" ;
		$this->data["ordtype"] =  ( isset($_POST["ordtype"]) && $_POST["ordtype"] != "all" ) ? $_POST["ordtype"] : "all" ;
		$this->data["paymenttype"] =  ( isset($_POST["paymenttype"]) && $_POST["paymenttype"] != "all" ) ? $_POST["paymenttype"] : "all" ;
		$this->data["shiptype"] =  ( isset($_POST["shiptype"]) && $_POST["shiptype"] != "all" ) ? $_POST["shiptype"] : "all" ;
		$this->data["email"] =  ( isset($_POST["email"]) && strlen($_POST["email"]) >0  ) ? $_POST["email"] : "" ;

		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/order/index',$this->data);
	}
	
	public function report()
	{
		$this->data["css_include"] 	= "user";

		$this->load->model("User_model");	
		$this->data["listBloger"] = $this->User_model->findAllBloger();

		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/order/report',$this->data);
	}
	
	public function productExportExcel($method=false, $query=false)
	{
		$rule = array(
			"years" => "none",
			"months" => array("-6","0"),
			"days" => array("-60","0")
		);
		if( $method !== false && $query !== false && array_key_exists($method, $rule) )
		{
			$queryTime = strtotime($query);
			if( $rule[$method] != "none" )
			{
				$startTerm = strtotime(date("Y-m-d") . " " . $rule[$method][0]." ". $method);
				$endTerm   = strtotime(date("Y-m-d") . " " . $rule[$method][1]." ". $method);
				
				if( $queryTime < $startTerm || $queryTime > $endTerm )
				{
					redirect("/admin/dashboard","location",301);
				}
			}
			$content = "沒有交易\r\n";
			$this->load->model("Order_model");			
			if( $method == "years" )
			{	
				$filename = date("Y",strtotime($query))."年度產品銷售排行表.csv";
				$start = date("Y-01-01 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query." +1 years -1 days"));
				
				$list_order = $this->Order_model->findProudctSellListWhereCase($start, $end);
			}
			if( $method == "months" )
			{
				$filename = date("Y-m",strtotime($query))."產品月排行表.csv";
				$start = date("Y-m-01 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query." +1 months -1 days"));
				
				$list_order = $this->Order_model->findProudctSellListWhereCase($start, $end);
				
			}
			if( $method == "days" )
			{
				$filename = date("Y-m-d",strtotime($query))."產品日排行.csv";
				$start = date("Y-m-d 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query));
				
				$list_order = $this->Order_model->findProudctSellListWhereCase($start, $end);
				
			}
			/*
			header("Content-type: text/plain");
			var_dump($list_order);
			*/
			if( count($list_order) > 0 ) 
			{
				$content = implode(",", array_keys($list_order[0]) ) . "\r\n";
			}
			
			foreach( $list_order AS $k => $order )
			{
				$content.= implode(",", $list_order[$k] ) . "\r\n";
			}
			header("Content-type: text/x-csv");
			header("Content-Disposition: attachment;filename=".$filename);
			header("Expires: 0");
			header("Pragma: public");
			echo mb_convert_encoding($content , "Big5" , "UTF-8");
		}
	}
		
	public function exportExcell($method=false, $query=false)
	{
		$rule = array(
			"years" => "none",
			"months" => array("-6","0"),
			"days" => array("-21","0")
		);
		if( $method !== false && $query !== false && array_key_exists($method, $rule) )
		{
			$queryTime = strtotime($query);
			if( $rule[$method] != "none" )
			{
				$startTerm = strtotime(date("Y-m-d") . " " . $rule[$method][0]." ". $method);
				$endTerm   = strtotime(date("Y-m-d") . " " . $rule[$method][1]." ". $method);
				
				if( $queryTime < $startTerm || $queryTime > $endTerm )
				{
					//redirect("/admin/dashboard","location",301);
				}
			}
			
			$content = "沒有交易\r\n";
			$this->load->model("Order_model");			
			if( $method == "years" )
			{
				$filename = date("Y",strtotime($query))."年訂單表.csv";
				$start = date("Y-01-01 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query." +1 years -1 days"));
				
				$list_order = $this->Order_model->findOrderSumWhereCase("month", $start, $end);
			}
			if( $method == "months" )
			{
				$filename = date("Y-m",strtotime($query))."訂單月報表.csv";
				$start = date("Y-m-01 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query." +1 months -1 days"));
				
				$list_order = $this->Order_model->findOrderSumWhereCase("day", $start, $end);
				
			}
			if( $method == "days" )
			{
				$filename = date("Y-m-d",strtotime($query))."訂單日報表.csv";
				$start = date("Y-m-d 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query));
				
				$list_order = $this->Order_model->findOrderListWhereCase($start, $end);
				
			}
			
			if( count($list_order) > 0 ) 
			{
				$content = implode(",", array_keys($list_order[0]) ) . "\r\n";
			}
			
			foreach( $list_order AS $k => $order )
			{
				$content.= implode(",", $list_order[$k] ) . "\r\n";
			}
			/*
			header("Content-type: text/plain");
			echo $content;
			*/
			header("Content-type: text/x-csv");
			header("Content-Disposition: attachment;filename=".$filename);
			header("Expires: 0");
			header("Pragma: public");
			echo mb_convert_encoding($content , "Big5" , "UTF-8");
		}
		else
		{
			redirect("/admin/dashboard","location",301);
		}
	}
	public function exportBlogOrderExcell($method=false, $query=false , $type=false , $hostId=false )
	{
		$rule = array("months" => array("-12","0"));
		if( $method !== false && $query !== false && array_key_exists($method, $rule) && $type !== false &&  $hostId !== false  )
		{
			$queryTime = strtotime($query);
			if( $rule[$method] != "none" )
			{
				$startTerm = strtotime(date("Y-m-d") . " " . $rule[$method][0]." ". $method);
				$endTerm   = strtotime(date("Y-m-d") . " " . $rule[$method][1]." ". $method);
				
				if( $queryTime < $startTerm || $queryTime > $endTerm )
				{
					redirect("/admin/dashboard","location",301);
				}
			}
			$content = "沒有交易\r\n";
			$this->load->model("Order_model");			
			if( $method == "months" )
			{
				$filename = date("Y-m",strtotime($query))."部落客訂單月報表.csv";
				$start = date("Y-m-01 00:00:00",strtotime($query));
				$end   = date("Y-m-d 23:59:59",strtotime($query." +1 months -1 days"));
				
				$list_order = $this->Order_model->findBlogOrderListWhereCase($start, $end, $type,$hostId);
			}

			if( count($list_order) > 0 ) 
			{
				$content = implode(",", array_keys($list_order[0]) ) . "\r\n";
			}
			
			foreach( $list_order AS $k => $order )
			{
				$content.= implode(",", $list_order[$k] ) . "\r\n";
			}
			header("Content-type: text/x-csv");
			header("Content-Disposition: attachment;filename=".$filename);
			header("Expires: 0");
			header("Pragma: public");
			echo mb_convert_encoding($content , "Big5" , "UTF-8");
		}
	}

	public function qryLogData()
	{
		$this->jsonRS['post']		= $_POST;
		if( isset($_POST['orderId']) )
		{
			$this->load->model("Order_model");
			$orders = $this->Order_model->findLogByOrderId( $_POST['orderId'] );
			foreach ($orders as $key => $order) {
				$orders[$key]['reson'] = json_decode($order['reson']);
			}

			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';			
			$this->jsonRS['resp'] 		= $orders;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */