<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "product_detail";
    }
	
	public function LoadAll()
	{
		$result = array();
		$this->recursiveGetChildren( $result, 0 );
		return $result;
	}

	public function LoadAType()  //加價購類別
	{
		$sql = "SELECT *,
					( SELECT `name` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'name',
					( SELECT `src` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'src',
					( SELECT `alt` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'alt',
					( SELECT `value` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'detail'
				  FROM `product` 
				 WHERE `product`.`status`= '2' " ;
		
		$result = $this->db->query($sql)->result_array();
		return $result;
	}
	
	public function recursiveGetChildren( &$children, $parentId )
	{
		$sql = "SELECT *,
					( SELECT `name` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'name',
					( SELECT `src` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'src',
					( SELECT `alt` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'alt',
					( SELECT `value` FROM `product_detail` WHERE `product`.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '{$this->currentLang}' ) AS 'detail'
				  FROM `product` 
				 WHERE `product`.`status`= '0' AND `product`.`parentId` = '{$parentId}';";
				
		$children = $this->db->query($sql)->result_array();
		
		if( count($children) > 0 )
		{
			foreach( $children AS &$record )
			{
				$record["detail"] = json_decode($record["detail"],true);
				$record["children"] = array();
				$this->recursiveGetChildren( $record["children"], $record["id"] );
			}
		}
	}
	
	
	public function findAll( $langCode = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		//$this->table 	= "product";
		//$result 		= $this->read_RecordByWhereCase(array( "status" => "0" ));		
		$sql = "SELECT *,
				  CASE `product`.`parentId`
					WHEN 0 THEN '根層'
					ELSE
					( SELECT `product_detail`.`name` 
						FROM `product` AS parentP
						JOIN `product_detail` ON parentP.`detailKey` = `product_detail`.`detailKey` AND `product_detail`.`langCode` = '$lang'
					   WHERE parentP.`id` = `product`.`parentId` LIMIT 1 ) 
				   END AS 'parentName'
				  FROM `product` 
				 WHERE `product`.`status`= '0';";
				
		$result =  $this->db->query($sql)->result_array();
				
		$this->table 	= "product_detail";
		$arr_detail 	= $this->read_RecordByWhereCase(array( "langCode" => $langCode ));		
		
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
	
	public function findAllCatalog( $self, $langCode )
	{
		$this->table 	= "product";
		$result 		= $this->read_RecordByWhereCase(array( "status" => "0" ));
		
		$this->table 	= "product_detail";
		$arr_detail 	= $this->read_RecordByWhereCase(array( "langCode" => $langCode ));		
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			foreach($arr_detail AS $detail)
			{
				if( $detail["detailKey"] == $row["detailKey"] )
				{
					$record["detail"] = $detail;
					break;
				}
			}
			if( $self != $row["detailKey"] )
				$new_res[] = $record;
		}
		
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function findAllKey($where)
	{
		$this->db->select("*");
		$this->db->from("product");
		$this->db->where($where);
		$result  = $this->db->get()->result_array();
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
	
	
	public function saveProduct($data,$isNew = false)
	{
		
		if( $isNew === false )
		{
			$sample = array("parentId","detailKey","priceKey","stockKey","sortkey","updateTime");
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
			$sample = array("parentId","status","detailKey","priceKey","stockKey","sortkey","updateTime","createTime");
			
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
	
	public function delete($mainkey)
	{
		$result = 0;
		$this->db->delete('product',		array('detailKey' => $mainkey)); 
		$result+= $this->db->affected_rows();
		$this->db->delete('product_detail', array('detailKey' => $mainkey)); 
		$result+= $this->db->affected_rows();
		return $result;
	}
	
	public function find( $id, $summ = false )
	{	
		$this->id  = $id;
		
		$sql = "SELECT *,`product`.`id` AS PID,(SELECT `normal` FROM `product_price` WHERE `product`.`priceKey` = `product_price`.`priceKey` ) AS price
				  FROM `product` 
					JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
				WHERE `product`.`id` = $id 
					AND `product_detail`.`langCode` = ?";
		if( !is_numeric($id) )
		{
			$sql = "SELECT *,`product`.`id` AS PID,(SELECT `normal` FROM `product_price` WHERE `product`.`priceKey` = `product_price`.`priceKey` ) AS price
				  FROM `product` 
					JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
				WHERE `product`.`id` in($id)
					AND `product_detail`.`langCode` = ?";
		}	
		
		$result = $this->db->query($sql,array($this->currentLang))->result_array();
				

		if( count($result)== 0 )
		{
			$sql = "SELECT *,`product`.`id` AS PID,(SELECT `normal` FROM `product_price` WHERE `product`.`priceKey` = `product_price`.`priceKey` ) AS price
				  FROM `product` 
					JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
				WHERE `product`.`id` = $id 
					AND `product_detail`.`langCode` = ?";
			if( !is_numeric($id) )
			{
				$sql = "SELECT *,`product`.`id` AS PID,(SELECT `normal` FROM `product_price` WHERE `product`.`priceKey` = `product_price`.`priceKey` ) AS price
					  FROM `product` 
						JOIN `product_detail` ON `product`.`detailKey` = `product_detail`.`detailKey` 
					WHERE `product`.`id` in($id)
						AND `product_detail`.`langCode` = ?";
			}
			$result = $this->db->query($sql,array(DEFAULTLANG))->result_array();
		}
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record['href'] 	= base_url('productDetail/'.$row['name']);
			$record['PID'] 		= $row['PID'];
			$record['price'] 	= $row['price'];
			$record['name'] 	= $row['name'];
			$record['src'] 		= $row['src'];
			$record['alt'] 		= $row['alt'];
			$record['status'] 	= $row['status'];
			$record['value'] 	= json_decode($row['value']);
			
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function queryDetail( $text )
	{
		$new_res = array();
		$sql = "SELECT (SELECT `id` FROM `product` WHERE `product_detail`.`detailKey` = `product`.`detailKey` LIMIT 1 ) AS PID
				  FROM `product_detail` 
				 WHERE `product_detail`.`name`= ?";
				 
		$result = $this->db->query($sql,array($text))->result_array();
		
		if( count($result) > 0)
		{
			$PID = $result[0]['PID'];
			$new_res = $this->find($PID);
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function queryCatelog( $text )
	{	
		$new_res = array();
		$sql = "SELECT (SELECT `id` FROM `product` WHERE `product_detail`.`detailKey` = `product`.`detailKey` LIMIT 1 ) AS PID
				  FROM `product_detail` 
				 WHERE `product_detail`.`name`= ?";
		$result = $this->db->query($sql,array($text))->result_array();
		if( count($result) > 0)
		{
			$PID = $result[0]['PID'];
			$sql = "SELECT * FROM `product` AS c WHERE c.id = $PID;";
			$result = $this->db->query($sql)->result_array();
			$new_result = array();
			if( count($result) > 0 )
			{
				foreach($result as $rec)
				{
					if($rec['status'] == 0)
					{
						$new_result[$rec['id']] = $rec;
						$this->findProductByParentId($rec['id'],$new_result);
					}
					else
					{
						$new_result[$rec['id']] = $rec;
					}
				}
			}
			
			$arr_inds = array();
			foreach( $new_result as $row )
			{
				$arr_inds[] = $row['id'];
			}
			$result =  array();
			if(count($arr_inds) > 0 )
				$result = $this->find( implode( ",", $arr_inds ) );
						
			foreach( $result as $row )
			{
				$record = array();
				$record['PID'] 		= $row['PID'];
				$record['price'] 	= $row['price'];
				$record['name'] 	= $row['name'];
				$record['src'] 		= $row['src'];
				$record['alt'] 		= $row['alt'];
				$record['status'] 	= $row['status'];
				$record['value']	= (is_array($row['value']) || is_object($row['value']) )?$row['value']:json_decode($row['value'],true);
				
				$status = ($row['status'] == 0)?'parent':'child';
				$record['href'] 	= ($row['status'] == 0)?base_url('productCatelog/'.$row['name']):base_url('productDetail/'.$row['name']);
				
				$new_res[$status][] = $record;
			}
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

	private function findProductByParentId($id,&$new_result)
	{
		$new_result;
		$sql = "SELECT * FROM `product` AS c WHERE c.parentId = $id;";
		$result = $this->db->query($sql)->result_array();
				
		if( count($result) > 0 )
		{
			foreach($result as $rec)
			{
				if($rec['status'] == 0)
				{
					$new_result[$rec['id']] = $rec;
					$this->findProductByParentId($rec['id'],$new_result);
				}
				else
				{
					$new_result[$rec['id']] = $rec;
				}
			}
		}
	}
	
}