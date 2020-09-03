<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
    }
	
	private function get_client_ip() {
		$ipaddress = '';
		if( isset($_SERVER) && array_key_exists('HTTP_CLIENT_IP', $_SERVER) )
		{
			if ($_SERVER['HTTP_CLIENT_IP'])
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if($_SERVER['HTTP_X_FORWARDED_FOR'])
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if($_SERVER['HTTP_X_FORWARDED'])
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if($_SERVER['HTTP_FORWARDED_FOR'])
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if($_SERVER['HTTP_FORWARDED'])
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if($_SERVER['REMOTE_ADDR'])
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
		}
		else if( function_exists("getenv") )
		{
			if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
			else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
			else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			else if(getenv('HTTP_FORWARDED'))
			   $ipaddress = getenv('HTTP_FORWARDED');
			else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
			else
				$ipaddress = 'UNKNOWN';
		}
		return $ipaddress;
	}
	
	function touch($data)
	{
		$result = false;
		$insertData = array();
		$sample = array("gateway","type","url");
		foreach( $data AS $k => &$v )
		{
			if( in_array($k, $sample) )
			{
				$insertData[$k] = $v;
			}
		}
		
		$insertData["ip"] = $this->get_client_ip();
		$insertData["POST"] = json_encode($_POST);
		$insertData["GET"] 	= json_encode($_GET);
		if( $insertData["ip"] != "220.135.92.138" )
		{
			$this->db->insert("apitouch", $insertData);			
		}
		$result = $this->db->affected_rows();
		return $result;
	}
}