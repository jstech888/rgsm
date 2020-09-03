<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends My_Model {

	public $type = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "option";
    }
	
	public function find($key)
	{	
		$this->table = "option";
	
		$result = $this->read_RecordByWhereCase(array( "key" => $key));
		
		return $result;
	}
	
	public function readVal($key)
	{	
		$this->table = "option";
		$result = $this->read_RecordByWhereCase(array( "key" => $key));		

		return json_decode($result[0]["value"],true);
	}
	
	public function readString($key)
	{
		$this->table = "option";
		$result = $this->read_RecordByWhereCase(array( "key" => $key));		
		return $result[0]["value"];
	}
	
	public function activeLanguages()
	{	
		$this->table = "lang";
		$result = $this->read_RecordByWhereCase(array( "active" => 1 ),"`id` ASC");
		$arr_ids = array();
		foreach( $result AS $rec )
		{
			$arr_ids[] = "'".$rec['code']."'";
		}
		$this->table = "lang_flags";
		$newtmp = array();
		$resultflags = $this->read_RecordByWhereCase("lang_code in (".implode(",",$arr_ids).") ");
		foreach($resultflags AS $recordflags )
		{
			$newtmp[$recordflags["lang_code"]] = array();
			$newtmp[$recordflags["lang_code"]] = $recordflags;
		}
		
		$resultflags = $newtmp;
		
		$lang = array();
		foreach( $result AS $record)
		{
			$lang[$record['code']] = array(
				"display"	=>	$record['english_name'],
				"href"		=>	current_url() . '/?lang='.$record['code'],
				"src"		=>	site_url('/libs/images/flags/'.$resultflags[$record['code']]['flag']),
				"code"		=>	$record['code']
			);
		}	
		return $lang;
	}
	
	public function change( $key, $value )
	{
		$return = false;
		$result = $this->read_RecordByWhereCase(array( "key" => $key));
		if( count($result) > 0  )
		{
			$this->db->update("option", array("value" => $value), array("key" => $key));
			$return = $this->db->affected_rows();
		}
		return $return;
	}
	
	public function create($data)
	{
		$this->db->insert("option", $data);
		return $this->db->affected_rows();
	}
	
	public function save($data)
	{
		$this->db->update("option", $data, array("id"=>$data["id"]));
		return $this->db->affected_rows();
	}
	
	public function delete($id, $key)
	{
		$this->db->delete('option',	array('id' => $id, "key" => $key));
		return $this->db->affected_rows();		
	}	

	public function queryCntSysLog($logType = "adminlogin")
	{
		$sql = "SELECT count(`sys_log`.`id`) AS syscnt FROM `sys_log`,`user` where `sys_log`.`userId`=`user`.`id` AND `sys_log`.`logType` = ? ";
		$result = $this->db->query($sql,array($logType))->result_array(); 
		return count($result);
	}

	public function querySysLog( $start = 0, $limit = 12 ,$logType = "adminlogin" )
	{
		$sql = "SELECT `sys_log`.*,`user`.`name` FROM `sys_log`,`user` WHERE `sys_log`.`userId`=`user`.`id` AND `sys_log`.`logType` = ? ORDER bY `sys_log`.`id` desc LIMIT {$start}, {$limit} "; 
		$result = $this->db->query($sql,array($logType))->result_array(); 
		return $result ;
	}

	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}