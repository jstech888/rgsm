<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_class_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "article_class";
    }
	
	public function delete($id)
	{
		$this->check_RecordExistByWhereCase( array( 'id' => $id ) );
		$result = $this->last_result;
		if( count($result) > 0 )
		{
			$this->db->delete("article_class", array('id' => $id)); 
		}
	}
	
	public function save( $data )
	{
		$new_data 	 = array();
		$sample_data = array("key","value","icon","banner");
		if( $data["id"] == "-1" )
		{
			foreach($data AS $key=>$val)
			{ 
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->insert('article_class', $new_data); 
		}
		else
		{
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->update('article_class', $new_data, array("id" => $data["id"]));
		}
		$result[] = $this->db->last_query();
		return $result;
	}
	
	public function find( $key )
	{	
		$sql = "SELECT * FROM `article_class` WHERE `article_class`.`key` = ?";		
		
		$result = $this->db->query($sql,array($key))->result_array();
		
		foreach( $result as &$row )
		{
			$row["value"] 	= json_decode($row["value"], 	true);
			$row["icon"]  	= json_decode($row["icon"], 	true);
			$row["banner"] 	= json_decode($row["banner"], 	true);
		}
		$this->last_result = $result[0];
		return $this->last_result;
	}
	
	public function loadAll()
	{
		$sql = "SELECT * FROM `article_class`";		
		
		$result = $this->db->query($sql)->result_array();
		
		foreach( $result as &$row )
		{
			$row["value"] 	= json_decode($row["value"], 	true);
			$row["icon"]  	= json_decode($row["icon"], 	true);
			$row["banner"] 	= json_decode($row["banner"], 	true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}


}