<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends My_Model {

	public $id = false;

    function __construct()
    {
        parent::__construct();
		$this->table = "product_detail";
    }

	public function findAll( $langCode = false, $currenciesIsoCode = false, $type = '' )
	{

		$lang = ($langCode == false)?$this->currentLang:$langCode;

		$currency = ($currenciesIsoCode == false)?$this->currentCurrency:$currenciesIsoCode;

		// has_be_add => 被加為加購品的數量
		$sql = "SELECT *,
                  pa.`id` AS 'PID',
                  `product_price`.`value` AS 'sell',
                   ( CASE
                   		WHEN ( SELECT count(*) FROM `product_stock` WHERE `product_stock`.`stockKey` = pa.`stockKey` ) = 1
                	 THEN ( SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = pa.`stockKey` LIMIT 1 )
                     ELSE -10000
                     END
                    ) AS stock,
                    (select count(1) from product pb where find_in_set (pa.id, pb.add_product_ids)  ) has_be_add
                FROM `product` pa
                JOIN `product_price` ON  pa.`priceKey` = `product_price`.`priceKey`
                WHERE pa.`status` = 1
			      AND `product_price`.`currenciesIsoCode` = ? ";

		if ($type){
		    $sql .= " AND find_in_set($type, pa.type) ";
		}

		$result = $this->db->query($sql,array($currency))->result_array();

		$this->table = "product_detail";
		$sql = "SELECT *
				  FROM `product_detail`
				  WHERE `product_detail`.`langCode` = ?;";
		$arr_detail = $this->db->query($sql,array($lang))->result_array();

		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			$name = array();

			// 多分類
			$parentIds = explode(',',$row['parentId']);
			foreach($parentIds as $parentId){
			  $sql = " SELECT ( SELECT `name` FROM `product_detail` WHERE `product_detail`.`detailKey` = pp.`detailKey` AND `product_detail`.`langCode` = ? LIMIT 1) FROM `product` AS pp WHERE pp.`id` = '$parentId'";
			  $temp = $this->db->query($sql,array($lang, $currency))->result_array();
			  if ($temp == false)continue;
			  $name[] = reset(reset($temp));
			}
			$record['parentName'] = implode(',',$name);

			//多規格
			if( $row['stock'] == "-10000" )
			{
				$record['stock'] = $this->findStock($row["detailKey"]);
			}

			foreach($arr_detail AS $detail)
			{
				if($detail["detailKey"] == $row["detailKey"])
				{
					$record["detail"] = $detail;
					break;
				}
			}

			$record['flag'] 		= $row['flag'];
			$record['flagVar'] = $flagVar = json_decode($row['flagVar'],true);

			$record['Shelves'] = true;
			$outShelves = array('0','2');
			if( in_array( $record['flag'], $outShelves ) )
			{
				$record['Shelves'] = false;
			}
			if( $record['flag'] == '3' )
			{
				$start = strtotime($flagVar["startDate"]);
				$end = strtotime($flagVar["endDate"]);
				if(
					time() < $start ||
					time() > $end
				)
				{
					$record['Shelves'] = false;
				}
			}
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function findAllofA( $langCode = false, $currenciesIsoCode = false )  //加價購商品
	{

		$lang = ($langCode == false)?$this->currentLang:$langCode;

		$currency = ($currenciesIsoCode == false)?$this->currentCurrency:$currenciesIsoCode;

		$sql = "SELECT *,
					`product`.`id` AS 'PID',
					`product_price`.`value` AS 'sell',
					( CASE
						WHEN ( SELECT count(*) FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) = 1
						THEN ( SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` LIMIT 1 )
						ELSE -10000
					   END
					) AS stock,
					CASE `parentId`
						WHEN 0 THEN '根層'
						ELSE ( SELECT ( SELECT `name` FROM `product_detail` WHERE `product_detail`.`detailKey` = pp.`detailKey` AND `product_detail`.`langCode` = 'zh-hant' LIMIT 1) FROM `product` AS pp WHERE pp.`id` = `product`.`parentId` )
					END 'parentName'
				  FROM `product`
				  JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey`
				  WHERE `product`.`status` = '3'
					AND `product_price`.`currenciesIsoCode` = ?;";
		$result = $this->db->query($sql,array($currency))->result_array();
		$this->table = "product_detail";
		$sql = "SELECT *
				  FROM `product_detail`
				  WHERE `product_detail`.`langCode` = ?;";
		$arr_detail = $this->db->query($sql,array($lang))->result_array();
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			//多規格
			if( $row['stock'] == "-10000" )
			{
				$record['stock'] = $this->findStock($row["detailKey"]);
			}

			foreach($arr_detail AS $detail)
			{
				if($detail["detailKey"] == $row["detailKey"])
				{
					$record["detail"] = $detail;
					break;
				}
			}
			$record['flag']    = $row['flag'];
			$record['flagVar'] = $flagVar = json_decode($row['flagVar'],true);

			$record['Shelves'] = true;
			$outShelves = array('0','2');
			if( in_array( $record['flag'], $outShelves ) )
			{
				$record['Shelves'] = false;
			}
			if( $record['flag'] == '3' )
			{
				$start = strtotime($flagVar["startDate"]);
				$end = strtotime($flagVar["endDate"]);
				if(
					time() < $start ||
					time() > $end
				)
				{
					$record['Shelves'] = false;
				}
			}
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function isMainKeyExist($key)
	{
		$this->db->select("*");
		$this->db->from("product");
		$this->db->where(array("detailKey" => $key));
		$result  = $this->db->get()->result_array();
		return ( count( $result ) > 0 )?true:false;
	}

	public function findAllKey($where)
	{
		$this->db->select("*");
		$this->db->from("product");
		$this->db->where($where);
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}

	public function findDetail($id)
	{
		$this->db->select("*");
		$this->db->from("product_detail");
		$this->db->where(array("detailKey"=>$id));
		$result = $this->db->get()->result_array();
		$new_result = array();
		foreach( $result AS $row )
		{
			$new_row = $row;
			$new_row["value"] = json_decode($new_row["value"],true);
			$new_result[] = $new_row;
		}
		$this->last_result = $new_result;
		return $new_result;
	}

	public function findPrice($id)
	{
		$this->db->select("*");
		$this->db->from("product_price");
		$this->db->where(array("priceKey"=>$id));
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}

	public function findStock($id)
	{
		$this->db->select("*");
		$this->db->from("product_stock");
		$this->db->where(array("stockKey"=>$id));
		$this->db->order_by("id", "asc");
		$result = $this->db->get()->result_array();
		foreach($result AS &$row )
		{
			$row["formatTypeTitle"] = json_decode($row["formatTypeTitle"],true);
		}
		$this->last_result = $result;
		return $result;
	}

	public function findAddProdTag($tag) //加價購 tag 搜尋
	{
		$inds = array();
		$sql = "SELECT *
				  FROM (
					SELECT *,
					( SELECT `product`.`id` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS PID,
					( SELECT `product`.`flag` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS flag,
					( SELECT `product`.`status` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS status
					  FROM `product_detail`
					 WHERE `product_detail`.`tag` like '%".$tag."%'
					) RES
				 WHERE RES.status = 3 AND RES.flag = 1;";
		$result = $this->db->query($sql)->result_array();
		foreach( $result AS $row )
		{
			(!empty($row["PID"]))?$inds[] = $row["PID"]:"";
		}
		return ( count( $inds ) > 0 ) ? $this->find(implode(",",$inds)) : array();
	}

	public function findAllAddProd() //加價購 list All
	{
		$inds = array();
		$sql = "SELECT *
				  FROM (
					SELECT *,
					( SELECT `product`.`id` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS PID,
					( SELECT `product`.`flag` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS flag,
					( SELECT `product`.`status` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS status
					  FROM `product_detail`
					) RES
				 WHERE RES.status = 3 AND RES.flag = 1;";
		$result = $this->db->query($sql)->result_array();
		foreach( $result AS $row )
		{
			(!empty($row["PID"]))?$inds[] = $row["PID"]:"";
		}
		return ( count( $inds ) > 0 ) ? $this->find(implode(",",$inds)) : array();
	}

	public function saveProduct($data,$isNew = false)
	{
		$sample = array("parentId","detailKey","priceKey","stockKey", "itemNo","updateTime","touch","flag","flagVar","status");

		if( $isNew === false )
		{
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" )
					{
						$updateData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "parentId" || $key == "flagVar" )
					{
						$updateData[$key] = $val;
					}
					else
					{
						$updateData[$key] = str_replace (" ","%20",$val);
					}
				}
			}

			if (@$data['type_1'])$types[] = $data['type_1'];

			if (@$data['type_2'])$types[] = $data['type_2'];

			if (@$data['type_3'])$types[] = $data['type_3'];

			$updateData['type'] = implode(',', $types);

			$this->db->update("product", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" )
					{
						$insertData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "flagVar" || $key == "parentId" )
					{
						$insertData[$key] = $val;
					}
					else
					{
						$insertData[$key] = str_replace (" ","%20",$val);
					}
				}
			}
			$insertData["createTime"] = date("Y-m-d H:i:s");

			if (@$data['type_1'])$types[] = $data['type_1'];

			if (@$data['type_2'])$types[] = $data['type_2'];

			if (@$data['type_3'])$types[] = $data['type_3'];

			$insertData['type'] = implode(',', $types);
			$this->db->insert("product", $insertData);
			return $this->db->affected_rows();
		}
	}

	public function saveDetail($data,$isNew = false)
	{
		$response   = array();
		$insertData = array();
		$updateData = array();
		$sample = array("detailKey","name","src", "tag", "alt","value","langCode");
		foreach( $data AS &$record )
		{
			$check = array();
			if( $record["id"] != -1 )
			{
				$this->db->select("*");
				$this->db->from("product_detail");
				$this->db->where(array("id"=>$record["id"]));
				$check = $this->db->get()->result_array();
			}

			if(count($check) > 0 )
			{
				$sampleUpdate = $sample;
				$new_record = array();
				foreach( $record AS $key => $val  )
				{
					if( in_array($key, $sampleUpdate) )
					{
						if( is_array($val) )
						{
							$new_record[$key] = json_encode($val);
						}
						else if( $key == "detailKey" )
						{
							$new_record[$key] = str_replace (" ","%20",$val);
						}
						else
						{
							$new_record[$key] = $val;
						}
					}
				}
				$this->db->update("product_detail", $new_record,array("id" => $record["id"]));
			}
			else
			{
				$sampleInsert = $sample;
				$new_record = array();
				foreach( $record AS $key => $val  )
				{
					if( in_array($key, $sampleInsert) )
					{
						if( is_array($val) )
						{
							$new_record[$key] = json_encode($val);
						}
						else if( $key == "detailKey" )
						{
							$new_record[$key] = str_replace (" ","%20",$val);
						}
						else
						{
							$new_record[$key] = $val;
						}
					}
				}
				$this->db->insert("product_detail", $new_record);
			}
		}
		return $response;
	}

	public function savePrice($data,$isNew = false)
	{
		$response = array();
		$insertData = array();
		$updateData = array();
		$sample = array("priceKey","normal","value","term","begin","end","currenciesIsoCode");
		foreach( $data AS &$record )
		{
			$check = array();
			if( $record["id"] != -1 )
			{
				$this->db->select("*");
				$this->db->from("product_price");
				$this->db->where(array("id"=>$record["id"]));
				$check = $this->db->get()->result_array();
			}

			if( count($check) > 0 )
			{
				$sampleUpdate = $sample;
				$recData = array();
				foreach( $record AS $key => $val )
				{
					if( in_array($key, $sampleUpdate) )
					{
						$recData[$key] = $val;
					}
				}
				$this->db->update("product_price", $recData, array("id" => $record["id"]));
			}
			else
			{
				$sampleInsert = $sample;
				$recData = array();
				foreach( $record AS $key => $val )
				{
					if( in_array($key, $sampleInsert) )
					{
						$recData[$key] = $val;
					}
				}
				$this->db->insert("product_price", $recData);
			}
		}
		return $response;
	}

	public function reduceStock( $delta, $stockKey, $isKey = true, $formatType = "F" )
	{
		if( $isKey === false )
		{
			$rec = $this->findAllKey(array("id"=>$stockKey));
			$stockKey = $rec[0]["stockKey"];
		}
		$sql = "UPDATE  `product_stock` SET  `value` = `value` - $delta WHERE `stockKey` = '$stockKey' AND `formatType` = '$formatType'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function refundStock( $orderDetail,$orderId ,$adminId )
	{
		$logStr = "" ;
		$this->db->trans_begin();
		if ( is_array($orderDetail) ){
			foreach ( $orderDetail as $oDkey => $oDvalue) {
				$delta = (isset($oDvalue["qty"] ))? $oDvalue["qty"]:"" ;
				$productMainKey = (isset($oDvalue["productMainKey"]) )? $oDvalue["productMainKey"] :"" ;
				$formatType = (isset($oDvalue["formatType"] ))? $oDvalue["formatType"] :"" ;
				$sql = "UPDATE  `product_stock` SET  `value` = `value` + $delta WHERE `stockKey` = '$productMainKey' AND `formatType` = '$formatType'";
				$this->db->query($sql);
				$logStr .= "[productMainKey:".$productMainKey."][formatType:".$formatType ."][qty:".$delta."]" ;
			}
			$this->db->update("transaction",array("isRefundStock"=>"1","updateTime" => date("Y-m-d H:i:s") ),array("id"=>$orderId));

			//insert log
			$clientIp = "" ;
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			   $clientIp = $_SERVER['HTTP_CLIENT_IP'];
			}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			   $clientIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
			   $clientIp= $_SERVER['REMOTE_ADDR'];
			}
			$info 		= array();
			$info[0]	=  $adminId ;
			$info[1]	= 'order' ;
			$info[2]	= $orderId ;
			$info[3]	= $clientIp ;
			$info[4]	= "RefundStock => ".$logStr ;
			$info[5]	= date('Y-m-d H:i:s');
			$insert		= "INSERT INTO `sys_log`(`userId`, `logType`,`actionType`,`clientIP`,`logDesc` ,`createTime` ) VALUES (?,?,?,?,?,?)";
			$this->db->query($insert, $info);
		}
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return count($orderDetail) ;
		}
	}

	public function saveStock($arrData, $isNew = false)
	{
		$result = 0;
		$arrInsertData = array();

		$this->db->delete('product_stock', 	array('stockKey' => $arrData[0]["stockKey"]));

		foreach( $arrData AS $data )
		{

			$sample = array("stockKey","formatType","formatTypeTitle","value","warnValue");
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					(is_array($val))?$insertData[$key] = json_encode($val):$insertData[$key] = $val;
				}
			}
			$arrInsertData[] = $insertData;
		}
		$this->db->insert_batch("product_stock", $arrInsertData);
		$result = $this->db->affected_rows();
		return $result;
	}

	public function delete($mainkey)
	{
		$result = 0;
		$this->db->delete('product',		array('detailKey' => $mainkey));
		$result+= $this->db->affected_rows();
		$this->db->delete('product_detail', array('detailKey' => $mainkey));
		$result+= $this->db->affected_rows();
		$this->db->delete('product_price', 	array('priceKey' => $mainkey));
		$result+= $this->db->affected_rows();
		$this->db->delete('product_stock', 	array('stockKey' => $mainkey));
		$result+= $this->db->affected_rows();
		return $result;
	}


	public function find( $id, $lang = false, $currency = false )
	{
		$sql 			= "SELECT * FROM `option` WHERE `key` = ?;";
		$result 		= $this->db->query($sql,array("ExchangeRate"))->result_array();
		$ExchangeRate 	= json_decode( $result[0]["value"], true );

		$this->id  = $id;

		$cPrice = "
			,CASE
				WHEN `product_price`.`saleRule` != 0 AND NOW() BETWEEN `product_price`.`saleRuleStart` AND `product_price`.`saleRuleEnd` THEN ROUND( `product_price`.`normal` * `product_price`.`saleRule` )
				ELSE `product_price`.`value`
			  END AS 'cPrice'
			,`product_price`.`currenciesIsoCode` AS isoCode
			,`product_price`.`normal` AS basic
			,`product_price`.`term` AS term
			,`product_price`.`begin` AS begin
			,`product_price`.`end` AS end ";

			//,(SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` LIMIT 1) AS stock
		$sql = "SELECT *
				,`product_detail`.`value` AS value
				,`product`.`id` AS PID
				,( CASE
					WHEN ( SELECT count(*) FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) = 1
					THEN ( SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` LIMIT 1 )
					ELSE -10000
				   END
				) AS stock
				,`product_price`.`normal` AS price
				$cPrice
				  FROM `product`
					LEFT JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey`
					LEFT JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey`
				WHERE `product`.`id` in ( $id )
					AND `product_detail`.`langCode` = ?
					AND `product_price`.`currenciesIsoCode` = 'TWD'";

		$findLang = ( $lang === false ) ? $this->currentLang : $lang;
		//$findCurrency = ( $currency === false ) ? $this->currentCurrency : $currency;
		$result = $this->db->query($sql,array($findLang))->result_array();


		if( count($result)== 0 )
		{
			//,(SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) AS stock
			$sql = "SELECT *
			,`product_detail`.`value` AS value
			,`product`.`id` AS PID
			,( CASE
				WHEN ( SELECT count(*) FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) = 1
				THEN ( SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` LIMIT 1 )
				ELSE -10000
			   END
			) AS stock
			,`product_price`.`normal` AS price
			$cPrice
				  FROM `product`
					JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey`
					JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey`
				WHERE `product`.`id` in ( $id )
					AND `product_detail`.`langCode` = ?
					AND `product_price`.`currenciesIsoCode` = ?";
			$result = $this->db->query($sql,array($this->DEFAULTLANG,$this->DEFAULTCURRENCY))->result_array();
		}

		$findCurrency = ( $currency === false ) ? $this->currentCurrency : $currency;
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record['href'] 		= base_url('product/detail/'.$row['detailKey']);
			$record['detailKey'] 	= $row['detailKey'];
			$record['parentId'] 	= $row['parentId'];
			$record['PID'] 			= $row['PID'];

			$record['stock'] 		= $row['stock'];
			if( $row['stock'] == "-10000" )
			{
				$record['stock'] = $this->findStock($row['detailKey']);
			}

			$record['isoCode'] 		= $row['isoCode'];

			$record['TWPrice'] 		= $row['price'];
			$record['price'] 		= (array_key_exists($findCurrency, $ExchangeRate))?round($row['price']/$ExchangeRate[$findCurrency]["rate"],4):0;

			$record['basic'] 		= (array_key_exists($findCurrency, $ExchangeRate))?round($row['basic']/$ExchangeRate[$findCurrency]["rate"],4):0;

			$record['cTWPrice'] 	= $row['cPrice'];
			$record['cPrice'] 		= (array_key_exists($findCurrency, $ExchangeRate))?round($row['cPrice']/$ExchangeRate[$findCurrency]["rate"],4):0;

			$record['createTime'] 	= $row['createTime'];
			$record['touch'] 		= $row['touch'];

			$record['inSOff'] 		= false;
			if( $row["term"]  == "specialoffer" )
			{
				$beginDate 	= strtotime($row["begin"]);
				$endDate 	= strtotime($row["end"]);

				if( time() > $beginDate && time() < $endDate )
				{
					$record['cPrice'] 		= $row['cPrice'];
					$record['inSOff'] 		= true;
					$record['inSOffBegin']	= $row['begin'];
					$record['inSOffEnd']	= $row['end'];
				}
				else
				{
					$record['cPrice'] 		= $row['price'];
					$record['cTWPrice'] 	= $row['price'];    //價格 期間上架 時間過後統一都用 原價
					$record['inSOff'] 		= false;
				}
			}
			$record['name'] 		= $row['name'];
			$record['itemNo'] 		= $row['itemNo'];
			$record['src'] 			= $row['src'];
			$record['alt'] 			= $row['alt'];
			$record['status'] 		= $row['status'];
			$record['value'] 		= json_decode($row['value']);

			$record['flag'] 		= $row['flag'];
			$record['flagVar'] = $flagVar = json_decode($row['flagVar'],true);

			$record['add_product_ids'] = $row['add_product_ids'] ? explode(',', $row['add_product_ids']) : array();

			$record['Shelves'] = true;
			$outShelves = array('0','2');
			if( in_array( $record['flag'], $outShelves ) )
			{
				$record['Shelves'] = false;
			}
			if( $record['flag'] == '3' )
			{
				$start = strtotime($flagVar["startDate"]);
				$end = strtotime($flagVar["endDate"]);
				if(
					time() < $start ||
					time() > $end
				)
				{
					$record['Shelves'] = false;
				}
			}
			//check price for display $record['TWPrice'] $record['cTWPrice'] 有一個為 0 前台不能顯示
			if ( intval( $record['TWPrice'] ) <= 0 || intval( $record['cTWPrice'] ) <=0 )
			{
				$record['Shelves'] = false;
			}

			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function queryDetail( $mainkey )
	{
		$dataProduct = $this->findAllKey(array("detailKey"=>$mainkey));
		$new_res = array();
		if( count($dataProduct) > 0)
		{
			$new_res = $this->find($dataProduct[0]["id"]);
			$new_res[0]['add_products'] = array();
		}


 		if (is_array(@$new_res[0]['add_product_ids']) && count($new_res[0]['add_product_ids'] > 0)){
 		    $adds = array();
 		    foreach ($new_res[0]['add_product_ids'] as $addId){

 		        $temp = array();
 		        $temp = $this->find($addId);
 		        $adds[] = $temp[0];
 		    }
 		    $new_res[0]['add_products'] = $adds;
 		}

		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function touchProduct( $id )
	{
		$sql = "UPDATE `product` SET `touch`=`touch`+1 WHERE `id` = '".$id."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function touchProducts($count=5)
	{
		$sql = "SELECT `product`.`id`
				  FROM `product`
				  WHERE `product`.`status` = 1
				  AND  `product`.`flag` in ('1','3')
			   ORDER BY  `product`.`touch` DESC
				  LIMIT ".$count.";";
		$result = $this->db->query($sql)->result_array();
		$arr_inds = array();
		foreach( $result AS &$v )
		{
			$arr_inds[] = $v["id"];
		}
		$result = $this->find(implode(",", $arr_inds));
		uasort($result,'cmp');
		return $result;
	}

	public function queryCatelogSelf( $mainkey )
	{
		$new_res = false;
		$dataProduct = $this->findAllKey(array("detailKey"=>$mainkey));
		if( count($dataProduct) > 0)
		{
			$new_res = array();
			$PID = $dataProduct[0]["id"];

			$self = $this->find( $PID );
			$new_res = $self[0];
		}
		return $new_res;
	}

	public function queryCatelog( $mainkey )
	{
		$new_res = array();
		$dataProduct = $this->findAllKey(array("detailKey"=>$mainkey));
		if( count($dataProduct) > 0)
		{
			$PID = $dataProduct[0]["id"];

			$self = $this->find( $PID );
			$new_res["self"] = $self[0];

			$new_result = array();
			$this->findParentById($PID,$new_result);
			$this->findChildById($PID,$new_result);
			$arr_inds = array();
			foreach( $new_result as $row )
			{
				$arr_inds[] = $row['id'];
			}
			ksort($arr_inds);


			if(count($arr_inds) > 0 )
			{
				$result =  array();
				foreach( $arr_inds as $id )
				{
					$result = $this->find( $id );
					if( count($result) > 0 )
					{
						$row = $result[0];
						$record = array();
						$record['detailKey'] = $row['detailKey'];
						$record['parentId']  = $row['parentId'];
						$record['PID'] 		 = $row['PID'];
						$record['stock'] 	 = $row['stock'];
						$record['price'] 	 = $row['price'];
						$record['cPrice'] 	 = $row['cPrice'];
						$record['inSOff'] 	 = $row['inSOff'];
						$record['name'] 	 = $row['name'];
						$record['src'] 		 = $row['src'];
						$record['alt'] 		 = $row['alt'];
						$record['status'] 	 = $row['status'];
						$record['createTime'] 	= $row['createTime'];
						$record['touch'] 		= $row['touch'];
						$record['value']	 = (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);

						$status = 'child';//($row['status'] == 0)?'parent':'child';
						$record['href'] 	 = ($row['status'] == 0)?base_url('product/catelog/'.$row['detailKey']):base_url('product/detail/'.$row['detailKey']);

						($id == $PID)?$new_res["self"]=$record:$new_res[$status][]=$record;
					}
				}
			}
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}

	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

	private function findParentById($id,&$new_result)
	{
		$sql = "SELECT * FROM `product` AS c WHERE c.id = $id;";
		$result = $this->db->query($sql)->result_array();
		//echo $this->db->last_query()."<br/>";
		if( count($result) > 0 )
		{
			foreach($result as $rec)
			{
				$new_result[$rec['id']] = $rec;
				//$this->findParentById($rec['parentId'],$new_result);
			}
		}
	}

	public function queryKeyword($keyword)
	{
		$inds = array();
		$sql = "SELECT *
				  FROM (
					SELECT *,
					( SELECT `product`.`id` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS PID,
					( SELECT `product`.`flag` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS flag,
					( SELECT `product`.`status` FROM `product` WHERE `product`.`detailKey` = `product_detail`.`detailKey` LIMIT 1 ) AS status
					  FROM `product_detail`
					 WHERE `product_detail`.`name` like '%".$keyword."%'
					) RES
				 WHERE RES.status = 1 AND RES.flag in( 1 ,3 );";
		$result = $this->db->query($sql)->result_array();
		foreach( $result AS $row )
		{
			(!empty($row["PID"]))?$inds[] = $row["PID"]:"";
		}
		return ( count( $inds ) > 0 ) ? $this->find(implode(",",$inds)) : array();
	}

	public function listRootCatelog()
	{
		$catelog = array();
		$sql = "SELECT * FROM `product` AS c WHERE c.parentId = '0';";
		$result = $this->db->query($sql)->result_array();
		if( count($result) > 0 )
		{
			$inds = array();
			foreach( $result AS $rec )
			{
				$inds[] = $rec["id"];
			}
			$catelog = $this->find( implode(",",$inds) );
		}
		return $catelog;
	}

	public function listAllCatelog($id = 0)
	{
		$new_res = array();
		if( $id != 0 )
		{
			$this->recursiveFindParentById($id, $new_res);
		}
		return $new_res;
	}

	private function recursiveFindParentById($id, &$new_res)
	{

		$sql = "SELECT * FROM `product` AS c WHERE c.id = $id;";
		$result = $this->db->query($sql)->result_array();
		if( count($result) > 0 )
		{
			$catelog = $this->find( $id );
			$new_res[] = $catelog[0];
			if( $result[0]["parentId"] != 0 )
			{
				$this->recursiveFindParentById($result[0]['parentId'],$new_res);
			}
		}
	}

	public function listAllCatelogProduct($parentId = 0)
	{
		$new_res = array();
		$this->recursiveFindChildById($parentId, $new_res);
		return $new_res;
	}

	public function listProductByIds($ids = array()){
        if (!$ids)return false;
        foreach ($ids as $id){
            $result = $this->find( $id );
            if( count($result) > 0 )
            {
                $row = $result[0];
                $record = $row;
                $record['value']	 = (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);
                $record['href'] 	 = ($row['status'] == 0)?base_url('product/catelog/'.$row['detailKey']):base_url('product/detail/'.$row['detailKey']);
                $record["child"] = array();
                if( $row['status'] == 0 )
                {
                    $this->recursiveFindChildById($row['PID'], $record["child"]);
                }
                $new_res[]=$record;
            }
        }
        return $new_res;
	}

	private function recursiveFindChildById($parentId, &$new_res)
	{

		$arr_inds = array();
		$new_result = array();
		$this->findChildById($parentId,$new_result);
		foreach( $new_result as $row )
		{
			$arr_inds[] = $row['id'];
		}
		ksort($arr_inds);
		if(count($arr_inds) > 0 )
		{
			$result =  array();
			foreach( $arr_inds as $id )
			{
				$result = $this->find( $id );
				if( count($result) > 0 )
				{
					$row = $result[0];
					$record = $row;
					$record['value']	 = (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);
					$record['href'] 	 = ($row['status'] == 0)?base_url('product/catelog/'.$row['detailKey']):base_url('product/detail/'.$row['detailKey']);
					$record["child"] = array();
					if( $row['status'] == 0 )
					{
						$this->recursiveFindChildById($row['PID'], $record["child"]);
					}
					$new_res[]=$record;
				}
			}
		}
	}

	private function findChildById($id,&$new_result)
	{
		if( sizeof($id) > 0 )
		{
			$sql = "SELECT *
					  FROM `product`
					 WHERE find_in_set($id, parentId);";
			$result = $this->db->query($sql)->result_array();
			///echo $this->db->last_query()."<br/>";
			if( count($result) > 0 )
			{
				foreach($result as $rec)
				{
					$new_result[$rec['id']] = $rec;
					//$this->findChildById($rec['id'],$new_result);
				}
			}
		}
	}

	public function listAllCatelogForFrontEnd($parentId = 0)
	{
		$new_res = array();
		$this->recursiveFindChildCatelogById($parentId, $new_res);
		return $new_res;
	}

	private function recursiveFindChildCatelogById($parentId, &$new_res)
	{

		$arr_inds = array();
		$new_result = array();
		$this->findChildCatelogById($parentId,$new_result);
		foreach( $new_result as $row )
		{
			$arr_inds[] = $row['id'];
		}
		ksort($arr_inds);
		if(count($arr_inds) > 0 )
		{
			$result =  array();
			foreach( $arr_inds as $id )
			{
				$result = $this->find( $id );
				if( count($result) > 0 )
				{
					$row = $result[0];
					$record = $row;
					$record['value']	 = (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);
					$record['href'] 	 = ($row['status'] == 0)?base_url('product/catelog/'.$row['detailKey']):base_url('product/detail/'.$row['detailKey']);
					$record["child"] = array();
					if( $row['status'] == 0 )
					{
						$this->recursiveFindChildCatelogById($row['PID'], $record["child"]);
					}
					$new_res[]=$record;
				}
			}
		}
	}
	private function findChildCatelogById($id,&$new_result)
	{
		if( sizeof($id) > 0 )
		{
			$sql = "SELECT *
					  FROM `product`
					 WHERE parentId = $id AND status = '0' ;";
			$result = $this->db->query($sql)->result_array();
			///echo $this->db->last_query()."<br/>";
			if( count($result) > 0 )
			{
				foreach($result as $rec)
				{
					$new_result[$rec['id']] = $rec;
					//$this->findChildById($rec['id'],$new_result);
				}
			}
		}
	}

	// 儲存加購品
	public function saveAddProducts($id, $productIds = array()){

	    if (!is_array($productIds))return false;

	    $updateData = array('add_product_ids' => implode(',', $productIds));

	    $this->db->update("product", $updateData, array("id" => $id));

	    return $this->db->affected_rows();
	}

	// 取得商品所屬活動館 ( 有過濾日期 )
	public function findHall($id){

	    $date = date('Y-m-d');

	    $sql = "
	        select *
	          from hall
	         where status = 1
	           and find_in_set({$id},product_ids)
	           and '{$date}' >= start_date
	           and '{$date}' <= end_date
	    ";

	    $hall = $this->db->query($sql)->row_array();

	    if (!$hall) return false;

	    return $hall;
	}

	// 檢查庫存
	public function checkWarnValue($stockKey, $formatType){

	    $sql = "select * from `product_stock` WHERE `stockKey` = '$stockKey' AND `formatType` = '$formatType'";

	    $stockRow = $this->db->query($sql)->row_array();

	    if (!$stockRow['warnValue'])return true;

	    if ($stockRow['value'] < $stockRow['warnValue'] )return false;

	    return true;
	}

	// 用 key 取得 產品名稱及規格
	public function findByDetailKey( $key, $formatType) {
	    $sql = "
	      select pd.name
	        from product_detail pd
	       where pd.detailKey = ?
	         and pd.langCode = ?
	    ";

	    $bind = array(
	      $key,
	      $this->currentLang,
	    );

	    $detail = $this->db->query($sql, $bind)->row_array();

	    $sql = "select * from `product_stock` WHERE `stockKey` = '$key' AND `formatType` = '$formatType'";

	    $stockRow = $this->db->query($sql)->row_array();

	    $result = array(
	      'name' => $detail['name'],
	      'value' => $stockRow['value'],
	      'warnValue' => $stockRow['warnValue']
	    );

	    return $result;
	}



}