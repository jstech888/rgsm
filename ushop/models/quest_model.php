<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quest_model extends My_Model {

	public $key = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "qa";
    }
	
	public function query($title)
	{
		$sql = "SELECT *,(SELECT `type` FROM `qa_type` WHERE `qa_type`.`id` = `qa`.`type_id` ) AS type FROM `qa` WHERE `qa`.`quest` LIKE '%{$title}%' AND `qa`.`langCode` = ? ";
		$result = $this->db->query($sql,array($this->currentLang))->result_array();
		foreach( $result AS &$row )
		{
			$row["answer"] = json_decode($row["answer"],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function findAllType( $lang=false )
	{
		$lang = ( $lang === false ) ? $this->currentLang : $lang;
		
		$sql = "SELECT * FROM `qa_type` WHERE `qa_type`.`langCode` = ? ";
		$result = $this->db->query($sql,array($lang))->result_array();
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function findType( $id )
	{
		$sql = "SELECT * FROM `qa_type` WHERE `qa`.`id` = ? ";
		$result = $this->db->query($sql,array($id))->result_array();
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function saveType($data)
	{
		$result = "-1";
		if( $data["id"] == "-1" )
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
			$this->table = "qa_type";
			$result = $this->create_Record($inserData);
		}
		else
		{
			$updataData = array();
			$whereData  = array();
			$sample = array("id","langCode");
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
			$this->table = "qa_type";
			$result = $this->update_Record( $updataData, $whereData );
		}
		return $result;
	}
	
	public function deletType($id)
	{
		$this->table = "qa_type";
		return $this->delete_Record( array( "id" => $id ) );
	}
	
	public function findAll( $lang=false )
	{
		$lang = ( $lang === false ) ? $this->currentLang : $lang;
		$sql = "SELECT *,(SELECT `type` FROM `qa_type` WHERE `qa_type`.`id` = `qa`.`type_id` ) AS type FROM `qa` WHERE `qa`.`langCode` = ? ORDER BY `qa`.`sortKey`";
		$result = $this->db->query($sql,array($lang))->result_array();
		foreach( $result AS &$row )
		{
			$row["answer"] = json_decode($row["answer"],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}

	public function find($id = "" )
	{	
		$sql = "SELECT *,(SELECT `type` FROM `qa_type` WHERE `qa_type`.`id` = `qa`.`type_id` ) AS typ FROM `qa` WHERE `qa`.`id` = ? ";
		$result = $this->db->query($sql,array($id))->result_array();
		foreach( $result AS &$row )
		{
			$row["answer"] = json_decode($row["answer"],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function save($data)
	{
		//$record = $this->find( $data['langCode'] );
		$result = "-1";
		
		//insert
		if( $data["id"] == "-1" )
		{
			$sample = array("id");
			$inserData = array();
			foreach($data AS $key=>$val)
			{
				if( !in_array($key,$sample) )
				{
					if( $key == "answer" )
					{
						$inserData[$key] = json_encode($val);
					}
					else
					{
						$inserData[$key] = $val;						
					}
				}
			}
			$this->table = "qa";
			$result = $this->create_Record($inserData);
		}
		//update
		else
		{
			$updataData = array();
			$whereData  = array();
			$sample = array("id","typ","langCode");
			foreach( $data AS $k => $item )
			{
				if( in_array($k,$sample) )
				{
					if( $k != "typ")
					{
						$whereData[$k] = $item;						
					}
				}
				else if( $k == "answer" )
				{
					$updataData[$k] = json_encode($item);
				}
				else
				{
					$updataData[$k] = $item;
				}
			}
			$this->table = "qa";
			$result = $this->update_Record( $updataData, $whereData );
		}
		return $result;
	}
	
	
	public function delet($id)
	{
		$this->table = "qa";
		return $this->delete_Record( array( "id" => $id ) );
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}