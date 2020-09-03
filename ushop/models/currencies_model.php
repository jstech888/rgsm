<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Currencies_model extends My_Model {

	public $type = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "currencies";
    }
	
	public function findAll()
	{	
		$sql = "SELECT *
				  FROM `currencies` 
				  WHERE `currencies`.`unicode` != '';";
		$result = $this->db->query($sql)->result_array();
				
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function Load($act="1")
	{	
		if( $act == "all")
		{
			$sql = "SELECT * FROM `currencies`";
			$result = $this->db->query($sql)->result_array();
		}
		else
		{
			$sql = "SELECT *
					  FROM `currencies` 
					  WHERE `currencies`.`active` = ? ";
						
			$result = $this->db->query($sql,array($act))->result_array();
			
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function swap($data)
	{
		$sample = array("active");
		$updateData = array();
		foreach( $data AS $key => $val )
		{
			if( in_array($key, $sample) )
			{
				$updateData[$key] = $val;
			}
		}
		$this->db->update("currencies", $updateData, array("iso_code" => $data['iso_code']));
		return $this->db->affected_rows();
	}
	
	public function findByIsoCode( $IsoCode )
	{	
		$whereCase = array( "iso_code" => $IsoCode );
		$this->check_RecordExistByWhereCase( $whereCase );
		return $this->last_result;
	}
}