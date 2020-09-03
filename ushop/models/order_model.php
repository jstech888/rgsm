<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "transaction";
    }	
	
	public function isAllot($id)
	{
		$nowTime = date("Y-m-d H:i:s");
		$this->db->update("transaction",array("isAllot"=>"1", "type"=>"1", "orderTypeTime"=>$nowTime),array("id"=>$id));
		return $this->db->affected_rows();
	}
	
	public function getHostOrder($id, $start="1970-01-01 00:00:00", $end=false)
	{
		/*
		$end === false ? $end = date("Y-m-d 23:59:59") : "";
		$sql = "
		SELECT *
		  FROM (
				SELECT *
						,( CASE `userId`
							WHEN '-1' THEN 'N/A'
							ELSE ( SELECT mail FROM user WHERE user.id = transaction.userId )
							END ) \"userMail\"
						,( CASE `hostId`
							WHEN '0' THEN 'N/A'
							ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
							END ) \"hostName\"
				  FROM `transaction` 
				 WHERE hostId = ? AND ( `createTime` BETWEEN ? AND ? ) 
		 ) AS Trans
		 WHERE Trans.`type` >= 1 AND Trans.`type` <= 3;";//AND type IN ( 1,2,3 )
		$result = $this->db->query($sql,array($id, $start, $end))->result_array();
		return $result;
		*/
		$end === false ? $end = date("Y-m-d 23:59:59") : "";
		$sql = "
		SELECT *
				,( CASE `hostId`
					WHEN '0' THEN 'N/A'
					ELSE ( SELECT name FROM user WHERE user.id = `user_bonus_log`.`hostId` )
					END ) \"hostName\"
		  FROM `user_bonus_log`
		 WHERE hostId = ? AND `status` = ? AND ( `createTime` BETWEEN ? AND ? ) ;";//AND type IN ( 1,2,3 )
		$result = $this->db->query($sql,array($id,'1', $start, $end))->result_array();
		return $result;
	}	
	
	public function getListHostOrder($arr_id, $start="1970-01-01 00:00:00", $end=false)
	{
		$end === false ? $end = date("Y-m-d 23:59:59") : "";
		$sql = "
		SELECT hostId, COUNT(id) AS nums, SUM(amount) AS money
		  FROM `user_bonus_log`
		 WHERE hostId in (".(implode(",",$arr_id)).") AND `status` = ? AND ( `createTime` BETWEEN ? AND ? ) 
		 group by hostId;";
		$result = $this->db->query($sql,array('1',$start, $end))->result_array();
		return $result;
	}	
	
	public function getHostOrderAll($id)
	{
		$now_month 	 = date("Y-m");
		$start = date("Y-m-01 00:00:00",strtotime($now_month." -1 years +1 months"));
		$end = date("Y-m-d 23:59:59",strtotime($now_month." +1 months -1 days"));
		$sql = "
		SELECT DATE_FORMAT(`createTime`,'%Y-%m') AS sumYM , SUM(`amount`) AS sumClearTotal, COUNT(`id`) AS sumHostOrderNums
				  FROM `user_bonus_log` 
				 WHERE hostId = ? AND `status` = ?
					AND ( `createTime` BETWEEN ? AND ? ) 
				GROUP BY YEAR(`createTime`), MONTH(`createTime`);";//AND type IN ( 1,2,3 )
		$result = $this->db->query($sql,array($id,'1',$start,$end))->result_array();
		return $result;
	}	
	
	public function findOrderList()
	{	
		
		$sql = "SELECT *
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT mail FROM user WHERE user.id = transaction.userId )
			END ) \"userMail\"
		, ( CASE `hostId`
			WHEN '0' THEN '公司會員'
			ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
			END ) \"hostName\"
		, ( CASE 
			WHEN EXISTS( SELECT `id` FROM `user_bonus_log` WHERE `user_bonus_log`.`orderId` = `transaction`.`id` LIMIT 1 ) 
				THEN ( SELECT `id` FROM `user_bonus_log` WHERE `user_bonus_log`.`orderId` = `transaction`.`id` LIMIT 1 )
			ELSE '-1'
			END ) \"bonusLogId\"
				  FROM `transaction`";
					
		$result = $this->db->query($sql)->result_array();
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			$record["status"] 	= $this->statusConvert($record["type"]);
			$record["cashData"] = json_decode($record["cashData"],true);
			$record["shipData"] = json_decode($record["shipData"],true);
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function findOrderListByCritiria($start=false,$end=false,$email=false,$status=false)
	{	
		$slqCritiriaStr = " WHERE 1=1 " ;
		$slqCritiriaStr .= (strlen($start) > 0 && $start!== false )? " AND `createTime` >= '" .$start. "' " : " " ;
		$slqCritiriaStr .= (strlen($end) > 0 && $end!== false )? " AND `createTime` <= '" .$end. "' " : " " ;
		$slqCritiriaStr .= (strlen($email) > 0 && $email!== false )? " AND `userId` in ( SELECT `id` FROM `user` WHERE `user`.`mail` like '%".$email."%' ) " : " " ;
		$slqCritiriaStr .= (strlen($status) > 0 && $status!= "all" )? " AND `type` in (".$status.") ":" " ;
		
		$sql = "SELECT `transaction`.*
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT mail FROM user WHERE user.id = transaction.userId )
			END ) \"userMail\"
		, ( CASE `hostId`
			WHEN '0' THEN '公司會員'
			ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
			END ) \"hostName\"
		, ( CASE 
			WHEN EXISTS( SELECT `id` FROM `user_bonus_log` WHERE `user_bonus_log`.`orderId` = `transaction`.`id` LIMIT 1 ) 
				THEN ( SELECT `id` FROM `user_bonus_log` WHERE `user_bonus_log`.`orderId` = `transaction`.`id` LIMIT 1 )
			ELSE '-1'
			END ) \"bonusLogId\"
				  FROM `transaction` ".$slqCritiriaStr ;
				  //WHERE `transaction`.`userId` = ( SELECT id FROM user WHERE user.mail = '' ) " ;
				  //AND `transaction``createTime` BETWEEN '".$start."' AND '".$end."'  ";
					
		$result = $this->db->query($sql)->result_array();
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			$record["status"] 	= $this->statusConvert($record["type"]);
			$record["cashData"] = json_decode($record["cashData"],true);
			// $record["cashData"] = $record["cashData"]=="{}"? "":json_decode($record["cashData"],true);
			$record["shipData"] = json_decode($record["shipData"],true);
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	private $showColumn = array(
		"unique_id" 	=> "訂單編號", 
		//"hostName" 	    => "部落客訂單", 
		"iso_code" 		=> "幣別", 
		"rate" 			=> "匯率", 
		"updateTime" 	=> "更新時間",
		"createTime" 	=> "建立時間",
		"userAccount"   => "會員帳號",		
		"userMail"   	=> "會員信箱",		
		"userUUID" 		=> "會員編號",
		"type"			=> "訂單狀態",
		"cashFlow"		=> "付款方式",
		"CreditCard"	=> "線上刷卡",
		"BankRemittances"	=> "銀行匯款",
		"PayOnArrival"		=> "貨到付款",
		"WebATM"			=> "WebATM",
		"ConvenienceStorePayBarcode" => "24H付款(超商、郵局條碼付款、虛擬帳戶)",
		"AliPay"			=> "AliPay",
		"shipData"		=> array(
			"reciverName" 		=> "收件人",
			"zip" 		=> "郵遞區號",
			"address" 		=> "地址",
			"CompanyTitle" 		=> "公司抬頭",
			"VATNumber" 		=> "統一編號",
			"DeliveryAddress" 	=> "寄送地址",
			"InvoiceAddress" 	=> "發票地址"
		),
		"promotionObj" 	=> array(
			"CheckoutDiscount" => "結帳優惠(TWD)"
		),
		"total"			=> "商品金額(TWD)",
		"promotionObj" 	=> array(
			"CheckoutDiscount" => "結帳優惠(TWD)",
			"coupon" => "優惠券(TWD)"
		),
		"transFee"      => "手續費(TWD)",
		"transFare"		=> "運費(TWD)",
		"shoppingPoint"	=> "使用購物金(TWD)",		
		"clearTotal"	=> "訂單金額(TWD)"
	);
	
	public function findOrderSumWhereCase($groupby,$start,$end)
	{
		if( $groupby == "day" )
		{
			$sql = "  SELECT DATE_FORMAT(`createTime`,'%Y-%m-%d') AS date, COUNT(`id`) AS count, SUM(`clearTotal`) AS total	
						FROM `transaction`
					   WHERE `createTime` BETWEEN ? AND ?
					GROUP BY YEAR(`createTime`), MONTH(`createTime`), DAY(`createTime`) ;";
		}	
		if( $groupby == "month" )
		{
			$sql = "  SELECT DATE_FORMAT(`createTime`,'%Y-%m') AS date, COUNT(`id`) AS count, SUM(`clearTotal`) AS total	
						FROM `transaction`
					   WHERE `createTime` BETWEEN ? AND ?
					GROUP BY YEAR(`createTime`), MONTH(`createTime`);";
		}		
		$result = $this->db->query($sql,array($start,$end))->result_array();
		
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function findOrderListWhereCase($start,$end)
	{	
		
		/*$sql = "SELECT *
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `name` FROM user WHERE user.id = transaction.userId )
			END ) \"userAccount\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `mail` FROM user WHERE user.id = transaction.userId )
			END ) \"userMail\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `name` FROM user WHERE user.id = transaction.userId )
			END ) \"userUUID\"
		, ( CASE `hostId`
			WHEN '0' THEN 'N/A'
			ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
			END ) \"hostName\"
				 FROM `transaction`
				WHERE `createTime` BETWEEN ? AND ?";*/

		$sql = "SELECT `unique_id`,`id`,`rate`,`GatewayType`,`GatewayId`,`type`,`isSend`,`isAllot`,`status`
		,`callback`,`notifyback`,`offlineback`,`userId`,`hostId`,`nonUserInfo`,`currenciesIsoCode`,`cashFlow`,`cashData`
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `name` FROM user WHERE user.id = transaction.userId )
			END ) \"userAccount\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `mail` FROM user WHERE user.id = transaction.userId )
			END ) \"userMail\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `nickname` FROM user WHERE user.id = transaction.userId )
			END ) \"userUUID\"
		, ( CASE `hostId`
			WHEN '0' THEN 'N/A'
			ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
			END ) \"hostName\" ,
		`iso_code`,`total`,`promotionObj`,`shoppingPoint`,`transFee`,`transFare`,`clearTotal`,`country`,`region`,`zip`,`district`,`address`,`extraInfoObj`
		,`shipFlow`,`shipData`,`updateTime`,`createTime`
				 FROM `transaction`
				WHERE `createTime` BETWEEN ? AND ?";
					
		$showResult = array();
		$result = $this->db->query($sql,array($start,$end))->result_array();
		foreach( $result AS $record )
		{
			//非會員購物
			$nonUserName = "" ;
			$nonUSerMail = "";
			$nonUserPhone = "" ; 
			if( $record['userId'] == "-1" )
			{
				$nonUserInfo = json_decode($record["nonUserInfo"],true);
				$nonUserName =  $nonUserInfo["fullname"] ;
				$nonUSerMail =  $nonUserInfo["mail"] ; 
				$nonUserPhone  = $nonUserInfo["phone"] ;
			}
			$showRow = array();
			foreach( $record AS $col => $row )
			{
				if( array_key_exists($col, $this->showColumn ))
				{	
					if( $col == "type" )
					{				
						$obj_status = $this->statusConvert($row);
						$showRow[$this->showColumn[$col]] = $obj_status["text"];
					}
					else if( $col == "cashFlow" )
					{
						$showRow[$this->showColumn[$col]] = $this->showColumn[$row];
					}
					else if( $col == "shipData" )
					{
						$row = json_decode($row,true);	
						foreach( $row AS $jCol => $jVal )
						{						
							if( array_key_exists($jCol, $this->showColumn["shipData"]) )
							{
								if( is_array($jVal) )
								{
									$showRow[$this->showColumn["shipData"][$jCol]] = $jVal["Address"];									
								}
								else
								{									
									$showRow[$this->showColumn["shipData"][$jCol]] = $jVal;
								}
							}
						}
					}
					else if( $col == "promotionObj" )
					{
						$row = json_decode($row,true);
						// for CheckoutDiscount (限時促銷)
						$showRow[$this->showColumn["promotionObj"]["CheckoutDiscount"]]  = "0" ;
						if ( isset($row["type"]) ) {
							if( $row["type"] == "CheckoutDiscount" )
							{
								if ( isset($row["value"]["discountAmout"]) ){
									$showRow[$this->showColumn["promotionObj"][$row["type"]]] = strval($row["value"]["discountAmout"]);						

								}
								else{
									$showRow[$this->showColumn["promotionObj"][$row["type"]]]  = "0" ;
								}
							}	
						}
						// for 優惠卷
						$showRow[$this->showColumn["promotionObj"]["coupon"]]  = "0" ;
						if ( isset($row[0]) ) {
							if ( isset($row[0]["type"] ) ) {
								if( $row[0]["type"] == "coupon" )
								{
									if ( isset($row[0]["value"]["amount"]) ){
										$showRow[$this->showColumn["promotionObj"][$row[0]["type"]]] = strval($row[0]["value"]["amount"]);						
									}
									else{
										$showRow[$this->showColumn["promotionObj"][$row[0]["type"]]]  = "0" ;
									}
								}
							}
						}

						/*if( array_key_exists("type",$row) )
						{
							if( $row["type"] == "CheckoutDiscount" )
							{
								$showRow[$this->showColumn["promotionObj"][$row["type"]]] = strval($row["value"]["discountAmout"]);						
							}								
						}*/
					}
					else if( $col == "userAccount" )
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUserName .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else if( $col == "userMail" )  
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUSerMail .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else if( $col == "phone" )  
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUserPhone .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else
					{
						$showRow[$this->showColumn[$col]] = $row;					
					}
				}
			}
			$showResult[] = $showRow;
		}
		$this->last_result = $showResult;
		return $this->last_result;
	}
	public function findBlogOrderListWhereCase($start, $end, $type, $hostId)
	{
		$sqlLimitStr = "" ;
		if ( $type === "S") $sqlLimitStr = " AND `transaction`.`type` in (1,2,3) ";
		$sql = "SELECT `unique_id`,`id`,`rate`,`GatewayType`,`GatewayId`,`type`,`isSend`,`isAllot`,`status`
		,`callback`,`notifyback`,`offlineback`,`userId`,`hostId`,`nonUserInfo`,`currenciesIsoCode`,`cashFlow`,`cashData`
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `name` FROM user WHERE user.id = transaction.userId )
			END ) \"userAccount\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `mail` FROM user WHERE user.id = transaction.userId )
			END ) \"userMail\"
		, ( CASE `userId`
			WHEN '-1' THEN 'N/A'
			ELSE ( SELECT `nickname` FROM user WHERE user.id = transaction.userId )
			END ) \"userUUID\"
		, ( CASE `hostId`
			WHEN '0' THEN 'N/A'
			ELSE ( SELECT name FROM user WHERE user.id = transaction.hostId )
			END ) \"hostName\" ,
		`iso_code`,`total`,`promotionObj`,`shoppingPoint`,`transFee`,`transFare`,`clearTotal`,`country`,`region`,`zip`,`district`,`address`,`extraInfoObj`
		,`shipFlow`,`shipData`,`updateTime`,`createTime`
				 FROM `transaction`
				WHERE `createTime` BETWEEN ? AND ?  AND `transaction`.`hostId` = ? ".$sqlLimitStr ;
					
		$showResult = array();
		$result = $this->db->query($sql,array($start,$end,$hostId))->result_array();
		foreach( $result AS $record )
		{
			//非會員購物
			$nonUserName = "" ;
			$nonUSerMail = "";
			$nonUserPhone = "" ; 
			if( $record['userId'] == "-1" )
			{
				$nonUserInfo = json_decode($record["nonUserInfo"],true);
				$nonUserName =  $nonUserInfo["fullname"] ;
				$nonUSerMail =  $nonUserInfo["mail"] ; 
				$nonUserPhone  = $nonUserInfo["phone"] ;
			}
			$showRow = array();
			foreach( $record AS $col => $row )
			{
				if( array_key_exists($col, $this->showColumn ))
				{	
					if( $col == "type" )
					{				
						$obj_status = $this->statusConvert($row);
						$showRow[$this->showColumn[$col]] = $obj_status["text"];
					}
					else if( $col == "cashFlow" )
					{
						$showRow[$this->showColumn[$col]] = $this->showColumn[$row];
					}
					else if( $col == "shipData" )
					{
						$row = json_decode($row,true);	
						foreach( $row AS $jCol => $jVal )
						{						
							if( array_key_exists($jCol, $this->showColumn["shipData"]) )
							{
								if( is_array($jVal) )
								{
									$showRow[$this->showColumn["shipData"][$jCol]] = $jVal["Address"];									
								}
								else
								{									
									$showRow[$this->showColumn["shipData"][$jCol]] = $jVal;
								}
							}
						}
					}
					else if( $col == "promotionObj" )
					{
						$row = json_decode($row,true);
						// for CheckoutDiscount (限時促銷)
						$showRow[$this->showColumn["promotionObj"]["CheckoutDiscount"]]  = "0" ;
						if ( isset($row["type"]) ) {
							if( $row["type"] == "CheckoutDiscount" )
							{
								if ( isset($row["value"]["discountAmout"]) ){
									$showRow[$this->showColumn["promotionObj"][$row["type"]]] = strval($row["value"]["discountAmout"]);						

								}
								else{
									$showRow[$this->showColumn["promotionObj"][$row["type"]]]  = "0" ;
								}
							}	
						}
						// for 優惠卷
						$showRow[$this->showColumn["promotionObj"]["coupon"]]  = "0" ;
						if ( isset($row[0]) ) {
							if ( isset($row[0]["type"] ) ) {
								if( $row[0]["type"] == "coupon" )
								{
									if ( isset($row[0]["value"]["amount"]) ){
										$showRow[$this->showColumn["promotionObj"][$row[0]["type"]]] = strval($row[0]["value"]["amount"]);						
									}
									else{
										$showRow[$this->showColumn["promotionObj"][$row[0]["type"]]]  = "0" ;
									}
								}
							}
						}

						/*if( array_key_exists("type",$row) )
						{
							if( $row["type"] == "CheckoutDiscount" )
							{
								$showRow[$this->showColumn["promotionObj"][$row["type"]]] = strval($row["value"]["discountAmout"]);						
							}								
						}*/
					}
					else if( $col == "userAccount" )
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUserName .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else if( $col == "userMail" )  
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUSerMail .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else if( $col == "phone" )  
					{
						if (  $row == "N/A" ) {
							$showRow[$this->showColumn[$col]] = "非會員(".$nonUserPhone .")";
						}
						else{
							$showRow[$this->showColumn[$col]] = $row;
						}
					}
					else
					{
						$showRow[$this->showColumn[$col]] = $row;					
					}
				}
			}
			$showResult[] = $showRow;
		}
		$this->last_result = $showResult;
		return $this->last_result;
	}
	
	public function checkOrderExist($id)
	{		
		$sql = "SELECT *,( SELECT mail FROM user WHERE user.id = transaction.userId ) AS \"userMail\"
				  FROM `transaction` 
				 WHERE id = ? OR unique_id = ?;";
		$result = $this->db->query($sql,array($id,$id))->result_array();
		return count($result) < 1 ? false : true;
	}
	
	public function findOrderDetail($id)
	{	
		$sql = "SELECT *,
				  CASE transaction.userId 
					WHEN -1 THEN 'N/A'
					ELSE ( SELECT mail FROM user WHERE user.id = transaction.userId LIMIT 1 )
				  END userMail
				  FROM `transaction` 
				 WHERE id = ? OR unique_id = ?;";
		$result = $this->db->query($sql,array($id,$id))->result_array();
		
		$record = $data_user = array();		
		if( isset($result[0]) )
		{
			//非會員購物
			if( $result[0]['userId'] == "-1" )
			{
				$nonUserInfo = json_decode($result[0]["nonUserInfo"],true);
				$data_user = array(
					"nickname" => $nonUserInfo["fullname"],
					"name" => "-1",
					"mail" => $nonUserInfo["mail"],
					"phone" => $nonUserInfo["phone"]
				);
			}
			else
			{
				$sql = "SELECT *
						  FROM `user` 
						 WHERE `id` = ?;";
				$data_user = $this->db->query($sql,array($result[0]['userId']))->result_array();
				$data_user = $data_user[0];
			}
			
			$sql = "SELECT *, 
					( SELECT detailKey FROM product WHERE product.id = td.productId ) AS 'productMainKey',
					( SELECT `product_detail`.`name` FROM `product_detail` WHERE `product_detail`.detailKey = (SELECT detailKey FROM product WHERE product.id = td.productId LIMIT 1) AND `product_detail`.`langCode` = 'zh-hant' ) AS 'productName',
					( SELECT `product_detail`.`src` FROM `product_detail` WHERE `product_detail`.detailKey = (SELECT detailKey FROM product WHERE product.id = td.productId LIMIT 1) AND `product_detail`.`langCode` = 'zh-hant' ) AS 'productPhoto'
					  FROM `transaction_detail` AS td
					 WHERE td.`transactionId` = ?;";
			$arr_detail = $this->db->query($sql,array($result[0]['id']))->result_array();

			$record 			= array();
			$record 			= $result[0];
			$record["dataUser"]	= $data_user;
			$record["detail"]	= $arr_detail;
			$record["status"] 	= $this->statusConvert($record["type"]);
			$record["cashData"] 		= json_decode($record["cashData"],true);		
			$record["shipData"] 		= json_decode($record["shipData"],true);
			$record["invoiceData"] 		= json_decode($record["invoiceData"],true);

			$record["orderStatus"]		= $this->orderStatusConvert($record["type"],"order");
			$record["paymentStatus"] 	= $this->orderStatusConvert($record["paymentType"],"payment");
			$record["shipStatus"] 		= $this->orderStatusConvert($record["shipType"],"ship");
			
			
			$record["coupon"] = array(
				"ticketNumber" => false,
				"amount" => 0
			);
			$record["promotionObj"] = json_decode($record["promotionObj"],true);
			if( isset($record["promotionObj"][0]) && $record["promotionObj"][0]["type"] == "coupon" )
			{
				$record["coupon"] = $record["promotionObj"][0]["value"];
			}
		}
		$this->last_result = $record;
		return $this->last_result;
	}
	
	public function save($data,$isNew = false)
	{
		if( $isNew === false )
		{
			$sample = array("isSend","isPushNotify","type", "orderTypeTime", "paymentType", "paymentTypeTime", "shipType", "shipTypeTime","GatewayType","GatewayId","callback","notifyback","offlineback","iso_code","cashFlow","cashData","shipFlow","shipData");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					$updateData[$key] = is_array($val)?json_encode($val):$val;
				}
			}
			$this->db->update("transaction", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$sample = array("isSend","isPushNotify","type", "orderTypeTime", "paymentType", "paymentTypeTime", "shipType", "shipTypeTime","GatewayType","GatewayId","callback","notifyback","offlineback","iso_code","cashFlow","cashData","shipFlow","shipData");
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					$insertData[$key] = is_array($val)?json_encode($val):$val;
				}
			}
			$this->db->insert("transaction", $insertData);
			return $this->db->affected_rows();
		}
	}

	public function transactionLogSave($data)
	{
		if( count($data) > 0 )
		{
			$this->db->insert("transaction_log", $data );
			return $this->db->affected_rows();
		}
	}
	
	public function updateStatus($id,$updateData)
	{
		$result = 0;
		
		$this->db->update('transaction',$updateData,array('id' => $id)); 
		$result+= $this->db->affected_rows();
		return $result;
	}

	public function changeStatus($id,$type,$isSend=false)
	{
		$result = 0;
		$updateData = array('type' => $type, 'updateTime' => date("Y-m-d H:i:s"));
		if($isSend === true)
		{
			$updateData['isSend'] = "1";
		}
		$this->db->update('transaction',$updateData,array('id' => $id)); 
		$result+= $this->db->affected_rows();
		return $result;
	}
	public function changeBankRemittancesAccount($id,$cashFlow,$cashData)
	{
		$result = 0;
		$updateData = array('cashData' => json_encode($cashData,true) , 'updateTime' => date("Y-m-d H:i:s"));

		$this->db->update('transaction',$updateData,array('cashFlow' => $cashFlow , 'id' => $id)); 
		$result+= $this->db->affected_rows();
		return $result;
	}
	
	private $showProductColumn = array(
		"productKey"	=> "產品編號",
		"productName" 	=> "產品名稱",
		"formatType"	=> "尺寸",
		"sumQty" 		=> "總量"
	);	
	
	public function findProudctSellListWhereCase($start,$end)
	{
		$sql = "SELECT 
					(  SELECT `product`.`detailKey` 
						 FROM `product`
						WHERE `product`.`id` = `transaction_detail`.`productId`
						LIMIT 1
					) AS productKey,				
					(  SELECT `product_detail`.`name` 
						 FROM `product`
						 JOIN `product_detail` ON `product_detail`.`detailKey` = `product`.`detailKey`
						WHERE `product`.`id` = `transaction_detail`.`productId`
						LIMIT 1
					) AS productName,
					`formatType`,
					SUM(`qty`) AS sumQty
				  FROM `transaction_detail`
				 WHERE `createTime` BETWEEN ? AND ?
			  GROUP BY `productId`
			  ORDER BY `sumQty` DESC ";
		$showResult = array();
		$result = $this->db->query($sql,array($start,$end))->result_array();
		foreach( $result AS $record )
		{
			$showRow = array();
			foreach( $record AS $col => $row )
			{
				$showRow[$this->showProductColumn[$col]] = $row;		
			}
			$showResult[] = $showRow;
		}
		$this->last_result = $showResult;
		return $this->last_result;
	}

	public function findLogByOrderId($orderId)
	{

		$sql = "SELECT *
		, ( CASE `userId`
			WHEN '0' THEN 'System'
			ELSE ( SELECT `name` FROM user WHERE user.id = transaction_log.userId )
			END ) \"userName\"
			FROM `transaction_log`
			WHERE `transaction_log`.`orderId` = ? ";
					
		$result = $this->db->query($sql,array($orderId))->result_array();
		return $result ;
	}

	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}
}