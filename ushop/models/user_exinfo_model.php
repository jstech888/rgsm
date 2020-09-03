<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_exinfo_model extends My_Model {

    function __construct()
    {
        parent::__construct();		
		$this->table = "user_exinfo";
    }
	
	public function findUserById ( $userId, $type, $lang = false )
	{
		$findLang = ( $lang === false ) ? $this->currentLang : $lang;
		$sql = "SELECT *
				  FROM `user_exinfo` 
				  WHERE `user_exinfo`.`user_id` = ? AND `user_exinfo`.`key` = ? AND `user_exinfo`.`langCode` = ?;";
		$result = $this->db->query($sql,array($userId,$type,$findLang))->result_array();
		return $result;
	}

	public function save($data)	
	{
		$rec = $this->findUserById( $data["user_id"], $data["key"], $data["langCode"] );
		$sample = array("user_id","key","value","langCode");
		if( count($rec) > 0 )
		{
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "value" )
					{
						$updateData[$key] = json_encode($val);
					}
					else
					{
						$updateData[$key] = $val;						
					}
				}
			}
			//$this->db->update("user_exinfo", $updateData, array("id" => $data['id']));
			$this->db->update("user_exinfo", $updateData, array("id" => $rec[0]['id']));
			return $this->db->affected_rows();
		}
		else
		{
			
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "value" )
					{
						$insertData[$key] = json_encode($val);
					}
					else
					{
						$insertData[$key] = $val;						
					}
				}
			}
			$this->db->insert("user_exinfo", $insertData);
			return $this->db->affected_rows();
		}
	}
}