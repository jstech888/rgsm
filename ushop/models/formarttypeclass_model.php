<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formarttypeclass_model extends My_Model {

    function __construct()
    {
        parent::__construct();		
    }
	
	public function loadAll()
	{
		$this->db->select("*");
		$this->db->from("formatType_class");
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}
	
	public function find($id)
	{
		$this->db->select("*");
		$this->db->from("formatType_class");
		$this->db->where(array("group"=>$id));
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}
	
	
	public function save($data)
	{
			
		$check = array();
		if( $data["id"] != -1 )
		{
			$this->db->select("*");
			$this->db->from("formatType_class");
			$this->db->where(array("id"=>$data["id"]));
			$check = $this->db->get()->result_array();
		}
		
		$sample = array("group","title","content");
		if( count($check) > 0 )
		{
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				( in_array($key, $sample) )?$updateData[$key] = $val:"";
			}
			$this->db->update("formatType_class", $updateData, array("id" => $data['id']));
			return $this->db->affected_rows();
		}
		else
		{
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				( in_array($key, $sample) )?$insertData[$key] = $val:"";
			}
			$this->db->insert("formatType_class", $insertData);
			return $this->db->affected_rows();
		}
	}
	
	public function delete($id)
	{
		$result = 0;
		$this->db->delete('formatType_class', array('id' => $id)); 
		$result = $this->db->affected_rows();
		return $result;
	}
	
}