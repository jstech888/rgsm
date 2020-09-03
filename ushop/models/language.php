<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "product_detail";
    }
	
	public function findAll( $langCode = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT *, 
					`product`.`id` AS 'PID',
					`product_price`.`value` AS 'sell',
					`product_stock`.`value` AS 'qty'
				  FROM `product` 
				  JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey`
				  JOIN `product_stock` ON `product`.`stockKey` = `product_stock`.`stockKey`
				  WHERE `product`.`status` = 1;";
		$result = $this->db->query($sql)->result_array();
				
		$this->table = "product_detail";
		$arr_detail  = $this->read_RecordByWhereCase(array( "langCode" => $langCode ));		
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			foreach($arr_detail AS $detail)
			{
				if($detail["detailKey"] == $row["detailKey"])
				{
					$record["detail"] = $detail;
					break;
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
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}
	
	
	public function saveProduct($data,$isNew = false)
	{
		
		if( $isNew === false )
		{
			$sample = array("parentId","detailKey","priceKey","stockKey","updateTime");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" )
					{
						$updateData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "parentId" )
					{
						$updateData[$key] = $val;
					}
					else
					{
						$updateData[$key] = str_replace (" ","%20",$val);						
					}
				}
			}
			$this->db->update("product", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$sample = array("parentId","status","detailKey","priceKey","stockKey","updateTime","createTime");
			
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" || $key == "createTime" )
					{
						$insertData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "status" || $key == "parentId" )
					{
						$insertData[$key] = $val;
					}
					else
					{
						$insertData[$key] = str_replace (" ","%20",$val);						
					}
				}
			}
			$this->db->insert("product", $insertData);
			return $this->db->affected_rows();
		}
	}
	
	public function saveDetail($data,$isNew = false)
	{
		if( $isNew === false )
		{
			$sample = array("id","detailKey","name","src","alt","value");
			$updateData = array();
			foreach( $data AS $record )
			{
				$new_record = array();
				foreach( $record AS $key => $val  )
				{
					if( in_array($key, $sample) )
					{
						if( $key == "value" ) 
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
				$updateData[] = $new_record;
			}
			$this->db->update_batch("product_detail", $updateData,"id");
			return $this->db->affected_rows();
			
		}
		else
		{
			$sample = array("detailKey","name","src","alt","value","langCode");
			$insertData = array();
			foreach( $data AS $record )
			{
				$new_record = array();
				foreach( $record AS $key => $val  )
				{
					if( in_array($key, $sample) )
					{
						if( $key == "value" ) 
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
				$insertData[] = $new_record;
			}
			$this->db->insert_batch("product_detail", $insertData);
			return $this->db->affected_rows();
		}
	}
	
	public function savePrice($data,$isNew = false)
	{
		if( $isNew === false )
		{
			$sample = array("priceKey","normal","value","term","begin","end");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "priceKey" ) 
					{							
						$updateData[$key] = str_replace (" ","%20",$val);
					}
					else
					{
						$updateData[$key] = $val;
					}
				}
			}
			$this->db->update("product_price", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$sample = array("priceKey","normal","value","term","begin","end","currenciesIsoCode");
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "priceKey" ) 
					{							
						$insertData[$key] = str_replace (" ","%20",$val);
					}
					else
					{
						$insertData[$key] = $val;
					}
				}
			}
			$this->db->insert("product_price", $insertData);
			return $this->db->affected_rows();
		}
	}
	
	public function reduceStock( $delta, $stockKey )
	{
		$sql = "UPDATE  `product_stock` SET  `value` = `value` - $delta WHERE `stockKey` =  '$stockKey'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function saveStock($data, $isNew = false)
	{
		if( $isNew === false )
		{
			$sample = array("stockKey","value");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "stockKey" ) 
					{							
						$updateData[$key] = str_replace (" ","%20",$val);
					}
					else
					{
						$updateData[$key] = $val;
					}
				}
			}
			$this->db->update("product_stock", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$sample = array("stockKey","value");
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "stockKey" ) 
					{							
						$insertData[$key] = str_replace (" ","%20",$val);
					}
					else
					{
						$insertData[$key] = $val;
					}
				}
			}
			$this->db->insert("product_stock", $insertData);
			return $this->db->affected_rows();
		}
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
	
	public function find( $id, $summ = false )
	{	
		$this->id  = $id;
		
		if( floatval($this->MEMEBERPRICE) > 0.01 )
		{
			$cPrice = ",`product_price`.`value` AS dPrice
			 ,(`product_price`.`normal` * ".$this->MEMEBERPRICE.") AS cPrice
			 ,`product_price`.`term` AS term
			 ,`product_price`.`begin` AS begin
			 ,`product_price`.`end` AS end ";
		}
		else
		{
			$cPrice = ",`product_price`.`value` AS dPrice
			,`product_price`.`value` AS cPrice
			,`product_price`.`term` AS term
			,`product_price`.`begin` AS begin
			,`product_price`.`end` AS end ";
		}
		
		$sql = "SELECT *
				,`product_detail`.`value` AS value
				,`product`.`id` AS PID
				,(SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) AS stock
				,`product_price`.`normal` AS price
				$cPrice
				  FROM `product` 
					LEFT JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
					LEFT JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey` 
				WHERE `product`.`id` in ( $id ) 
					AND `product_detail`.`langCode` = ?";

		$result = $this->db->query($sql,array($this->currentLang))->result_array();
				

		if( count($result)== 0 )
		{
			$sql = "SELECT *
			,`product_detail`.`value` AS value
			,`product`.`id` AS PID
			,(SELECT `value` FROM `product_stock` WHERE `product_stock`.`stockKey` = `product`.`stockKey` ) AS stock
			,`product_price`.`normal` AS price
			$cPrice
				  FROM `product` 
					JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
					JOIN `product_price` ON `product`.`priceKey` = `product_price`.`priceKey` 
				WHERE `product`.`id` in ( $id ) 
					AND `product_detail`.`langCode` = ?";
			$result = $this->db->query($sql,array($this->DEFAULTLANG))->result_array();
		}
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record['href'] 		= base_url('productDetail/'.$row['detailKey']);
			$record['detailKey'] 	= $row['detailKey'];
			$record['PID'] 			= $row['PID'];
			$record['stock'] 		= $row['stock'];
			$record['price'] 		= $row['price'];
			$record['dPrice'] 		= $row['dPrice'];
			$record['cPrice'] 		= $row['cPrice'];
			
			$record['inSOff'] 		= false;
			if( $row["term"]  == "specialoffer" )
			{
				$beginDate 	= strtotime($row["begin"]);
				$endDate 	= strtotime($row["end"]);
				if( time() > $beginDate && time() < $endDate )
				{
					$record['dPrice'] 		= $row['dPrice'];
					$record['cPrice'] 		= $row['cPrice'];	
					$record['inSOff'] 		= true;
				}
				else
				{
					$record['dPrice'] 		= $row['price'];	
					$record['cPrice'] 		= $row['price'];	
					$record['inSOff'] 		= false;			
				}
			}
			$record['name'] 		= $row['name'];
			$record['src'] 			= $row['src'];
			$record['alt'] 			= $row['alt'];
			$record['status'] 		= $row['status'];
			$record['value'] 		= json_decode($row['value']);
			
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
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function queryCatelog( $mainkey )
	{	
		$dataProduct = $this->findAllKey(array("detailKey"=>$mainkey));
		
		if( count($dataProduct) > 0)
		{
			$PID = $dataProduct[0]["id"];
			
			$sql = "SELECT * FROM `product` AS c WHERE c.id = $PID;";
			$result = $this->db->query($sql)->result_array();
			$new_result = array();			
			$this->findParentById($PID,$new_result);
			$this->findChildById($PID,$new_result);
			
			$arr_inds = array();
			foreach( $new_result as $row )
			{
				$arr_inds[$row['parentId']] = $row['id'];
			}
			ksort($arr_inds);
			if(count($arr_inds) > 0 )
			{
				$result =  array();
				foreach( $arr_inds as $id )
				{
					$result = $this->find( $id );
					$row = $result[0];
					$record = array();
					$record['PID'] 		= $row['PID'];
					$record['stock'] 	= $row['stock'];
					$record['price'] 	= $row['price'];
					$record['dPrice'] 	= $row['dPrice'];
					$record['cPrice'] 	= $row['cPrice'];
					$record['inSOff'] 	= $row['inSOff'];
					$record['name'] 	= $row['name'];
					$record['src'] 		= $row['src'];
					$record['alt'] 		= $row['alt'];
					$record['status'] 	= $row['status'];
					$record['value']	= (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);
					
					$status = ($row['status'] == 0)?'parent':'child';
					$record['href'] 	= ($row['status'] == 0)?base_url('productCatelog/'.$row['detailKey']):base_url('productDetail/'.$row['detailKey']);
					
					$new_res[$status][] = $record;
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
				$this->findParentById($rec['parentId'],$new_result);
			}
		}
	}
	
	private function findChildById($id,&$new_result)
	{
		
		$sql = "SELECT *
				  FROM `product`
				 WHERE parentId = $id;";
		$result = $this->db->query($sql)->result_array();
		///echo $this->db->last_query()."<br/>";
		if( count($result) > 0 )
		{
			foreach($result as $rec)
			{
				$new_result[$rec['id']] = $rec;
				$this->findChildById($rec['id'],$new_result);
			}
		}
	}
	
}