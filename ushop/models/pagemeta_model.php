<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagemeta_model extends My_Model {

    function __construct()
    {
        parent::__construct();		
		$this->table = "page_meda";
    }
	
	public function listAll()
	{
		$this->last_result = array();
		$sql = "SELECT * FROM `page_meda` WHERE `page_meda`.`langCode` = ?;";
		$result = $this->db->query($sql,array($this->currentLang))->result_array();
		if( count($result) > 0 )
		{
			foreach( $result as &$row )
			{
				$row['value'] = json_decode($row['value'],true);
			}
			$this->last_result = $result;
		}
		return $this->last_result;
	}
	
	public function find($key = false, $getDefault = true )
	{	
		if( $key === false )
			return false;
		
		$sql = "SELECT * FROM `page_meda` WHERE `page_meda`.`key` = ? AND `page_meda`.`langCode` = ?;";
		$result = $this->db->query($sql,array($key,$this->currentLang))->result_array();
		if( count($result) > 0 )
		{
			foreach( $result as &$row )
			{
				$row['value'] = json_decode($row['value'],true);
			}
			$this->last_result = $result[0];
		}
		else if ( $getDefault === true )
		{		
			$sql = "SELECT * FROM `page_meda` WHERE `page_meda`.`key` = ? AND `page_meda`.`langCode` = ?;";
			$result = $this->db->query($sql,array($key,$this->DEFAULTLANG))->result_array();
			if( count($result) > 0 )
			{
				foreach( $result as &$row )
				{
					$row['value'] = json_decode($row['value'],true);
				}
				$this->last_result = $result[0];
			}
			else
			{
				$this->last_result = array( "id" => "-1", "key" => $key, "value" => array("title"=>"","keywords"=>"","description"=>"","author"=>""), "langCode" => $this->currentLang );
			}
		}
		else
		{
			$this->last_result = array( "id" => "-1", "key" => $key, "value" => array("title"=>"","keywords"=>"","description"=>"","author"=>""), "langCode" => $this->currentLang );
		}
		return $this->last_result;
	}
		
	public function delete($mainkey)
	{
		$this->db->delete('page_meda', array('key' => $mainkey)); 
		return $this->db->affected_rows();
	}
		
	public function save($data)
	{
		$record = $this->read_RecordByWhereCase(array( "key"=>$data["key"], "langCode"=>$data["langCode"] ));
		$result = "-1";
		
		//update
		if( count($record) > 0 )
		{
			$updataData = array();
			$whereData  = array();
			$sample = array("id","key","langCode");
			foreach( $data AS $k => $item )
			{
				if( in_array($k,$sample) )
				{
					$whereData[$k] = $item;
				}
				else
				{
					$updataData[$k] = $item;
				}
			}
			$result = $this->update_Record( $updataData, $whereData );
		}
		//insert
		else
		{
			$sample = array("id");
			$inserData = array();
			foreach($data AS $key=>$val)
			{
				if( !in_array($key,$sample) )
				{
					$inserData[$key] = $val;	
				}
			}
			$result = $this->create_Record($inserData);
		}
		return $result;
	}
	
	public function checkPageKeyExist($key)
	{
		$rest = $this->read_RecordByWhereCase(array( "key"=>$key ));
		return (count($rest) == 0)?false:true;
	}
}