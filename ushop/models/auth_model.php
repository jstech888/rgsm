<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends My_Model {

    function __construct()
    {
        parent::__construct();		
    }
	
	public function getAllGroup($group_id)
	{
		$sql = "SELECT * FROM `group` WHERE `id` != 5;";
		if($group_id == 5)
		{		
			$sql = "SELECT * FROM `group`;";	
		}		
		$result = $this->db->query($sql)->result_array();
		return $result;
	}
	
	public function loadGroup()
	{
		$sql = "SELECT * FROM `group`;";
		$result = $this->db->query($sql)->result_array();		
		return $result;
	}
	
	public function findGroup($where)
	{
		$this->table = "group";
		$record = $this->read_RecordByWhereCase($where);
		return $record[0];
	}
	
	public function loadAuthority()
	{
		$sql = "SELECT * FROM `authority`;";
		$result = $this->db->query($sql)->result_array();		
		return $result;
	}	
	
	public function findAuthority($id)
	{
		$sql = "SELECT * FROM `authority` WHERE `group_id` = ?;";
		$result = $this->db->query($sql,array($id))->result_array();		
		return $result;
	}
	
	public function save($table, $data)
	{
		$this->table = $table;
		
		if( $table == "authority")
			$record = $this->read_RecordByWhereCase(array( "group_id"=>$data["group_id"], "menu_id"=>$data["menu_id"] ));
		else
			$record = $this->read_RecordByWhereCase(array( "id"=>$data["id"] ));
	
		$result = "-1";
		
		//update
		if( count($record) > 0 )
		{
			$updataData = array();
			$whereData  = array();
			$sample = array("id");
			( $table == "authority" ) ? $sample = array("group_id","menu_id") : "";
			
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
	
	public function delete($id)
	{
		$this->table = "group";
		return $this->delete_Record(array( "id" => $id ));
	}
	
	public function isExist($id)
	{
		$rest = $this->read_RecordByWhereCase(array( "id"=>$id ));
		return (count($rest) == 0)?false:true;
	}

}