<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "inbox";
    }

	public function findMessageByUserId($userId)
	{
		$sql = "SELECT *, 
				  ( SELECT `picture` FROM `user` WHERE `user`.`id` = `inbox`.`from` ) AS from_picture,
				  ( SELECT `picture` FROM `user` WHERE `user`.`id` = `inbox`.`to` ) AS to_picture,
				  ( SELECT `name` FROM `user` WHERE `user`.`id` = `inbox`.`from` ) AS from_name,
				  ( SELECT `name` FROM `user` WHERE `user`.`id` = `inbox`.`to` ) AS to_name
				  FROM `inbox` 
				  WHERE 
					( `inbox`.`from` = ? AND `inbox`.`from_show` = 1 ) OR
					( `inbox`.`to` = ? AND `inbox`.`to_show` = 1 );";
		$result = $this->db->query($sql,array($userId,$userId))->result_array();
		return $result;
	}
	
	public function saveMessage( $data )
	{
		$sample = array("from","to","datetime","content");
		$insertData = array();
		$new_record = array();
		foreach( $data AS $key => $val  )
		{
			if( in_array($key, $sample) )
			{
				$new_record[$key] = $val;
			}
		}
		$insertData[] = $new_record;
		$this->db->insert_batch("inbox", $insertData);
		return $this->db->affected_rows();		
	}
	
	public function hideMessage( $selfId, $withId )
	{
		$result = array();
		
		$this->db->update("inbox", array( "from_show" => 0 ), array("from" => $selfId, "to" => $withId));
		$result[] = $this->db->affected_rows();		
		
		$this->db->update("inbox", array( "to_show" => 0 ), array( "from" => $withId, "to" => $selfId));
		$result[] = $this->db->affected_rows();		
		
		return $result;
	}
}