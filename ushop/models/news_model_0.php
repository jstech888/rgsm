<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends My_Model {

	public $id = false;
	
	private $nums = 0;
	
	public $sample = array(
		"id" => -1,
		"user_id" => -1,
		"value"	=> "",
		"status" => 0,
		"class"	=> "",
		"touch"	=> 0
	);
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "news";
    }
	
	// function msgToNews( $bid, $uid, $msg )
	// {		
	// 	$this->db->insert("inbox",array( 
	// 		"from" 		=> $uid,
	// 		"to" 		=> $bid,
	// 		"content" 	=> $msg
	// 	));
	// 	return $this->db->insert_id();
	// }
	
	function find($userId)
	{
		$sql = "SELECT * FROM `news` WHERE `user_id` = ?; ";
		$result = $this->db->query($sql,array($userId))->result_array();
		
		foreach( $result as $row )
		{
			$row = &$row;
		}
		
		$this->nums = count($result);
		if( count($result) == 0 )
		{
			$result = array($this->sample);
			$result[0]["user_id"] = $userId;
		}
		$result[0]["value"] = json_decode($result[0]["value"],true);
		$this->last_result = $result[0];
		return $this->last_result;
	}
	
	function save($data)
	{
		$record = $this->find($data["user_id"]);
		$sample = array("user_id","value","status","class","touch");
		
		$newData = array();
		foreach( $data AS $k => &$v )
		{
			if( in_array( $k, $sample ) )
			{
				$newData[$k] = (is_array($v))?json_encode($v):$v;
			}
		}
		if( $this->nums > 0 )
		{
			$this->db->update("news",$newData,array("id"=>$data["id"]));
		}
		else
		{
			$this->db->insert("news",$newData);
		}
		return $this->db->affected_rows();
	}

}