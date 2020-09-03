<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends My_Model {

	public $key = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "page";
    }
	
	public function loadAll()
	{
		$sql = "SELECT * FROM `page` WHERE `page`.`langCode` = ? ";
		$result = $this->db->query($sql,array($this->currentLang))->result_array();
		foreach( $result as &$row )
		{
			$row['image']	 = json_decode($row['image'],true);
			$row['content']	 = json_decode($row['content'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function find($key = "", $lang="all" )
	{	
		$this->key  = $key;

		$sql = "SELECT * FROM `page` WHERE `page`.`key` = ? ";
		if($lang != "all")
		{
			$sql.="AND `page`.`langCode` = '$lang'";
		}
					
		$result = $this->db->query($sql,array($this->key))->result_array();
		
		$new_res = array();
		foreach( $result as $row )
		{
			$page = array();
			$page = $row;
			$page['image']	 = json_decode($row['image'],true);
			$new_res[$row['langCode']] = $page;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function delete($mainkey)
	{
		$this->db->delete('page', array('key' => $mainkey)); 
		return $this->db->affected_rows();
	}
	
	public function save($data)
	{
		$record = $this->find($data['key'], $data['langCode']);
		$result = "-1";
		
		//update
		if( count($record) > 0  )
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
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}