<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminilib
{
	var $CI;

	//this is the expiration for a non-remember session
	var $session_expire	= 3600;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('encrypt');
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
		
	}
	
	function isUsernameAvailable( $username )
	{
		$sql 		= "SELECT * FROM user WHERE ( name = ? OR mail = ? )";
		$arr_record = $this->CI->db->query($sql, array($username,$username))->row_array();
		return ( sizeof($result) == 0 );
	}
		
	function isLoggedIn()
	{		
		$admin = $this->CI->session->userdata('admin');
		if( $admin )
		{
			$admin = json_decode($admin,true);
			$admin['picture'] = json_decode($admin['picture'],true);			
			
			$sql 		= "SELECT *,( SELECT `name` FROM  `bkMenu` WHERE `bkMenu`.`id` = `authority`.`menu_id` ) AS 'menu_name'  FROM `authority` WHERE `group_id` = ?;";
			$arr_record = $this->CI->db->query($sql, array($admin['group_id']))->row_array();
			$admin['authFunction'] = $arr_record;
		}
		return $admin;
	}
	
	function isExist($where)
	{
		$arr_find = array();
		$sql = "";
		foreach( $where AS $k => $v )
		{
			$sql = "SELECT * FROM  `user` WHERE `$k` = ?;";	
			$arr_find[] = $v;
		}
		$result = $this->CI->db->query($sql, $arr_find)->result_array();
		$result = ( count($result) > 0 )?true:false;
		return $result;
	}
	
	function createUser( $data_user )
	{	
		$result = false;
		
		$infoKey = $this->GUID();
		
		$nameExist = $this->isExist(array("name"=>$data_user['name']));
		$mailExist = $this->isExist(array("mail"=>$data_user['mail']));
		if($nameExist == false && $mailExist == false)
		{
			$default = array(
				"name" 			=> "sample.png",
				"thumbnailUrl"	=> base_url("/uploads/avatar.png"),
				"mediumUrl"		=> base_url("/uploads/avatar.png"),
				"url"			=> base_url("/uploads/avatar.png")
			);
			
			$user = array();
			$user["infoKey"] 	= $infoKey;
			$user["name"] 		= $data_user['name'];
			$user["mail"] 		= $data_user['mail'];
			$user["password"]	= sha1($data_user['password']);
			$user["picture"]	= json_encode($default);
			$user["flag"]		= "1";
			$user["updateTime"]	= date("Y-m-d H:i:s");
			$user["createTime"]	= date("Y-m-d H:i:s");
			
			$insert				= "INSERT INTO `user`(`infoKey`, `name`, `mail`, `password`, `picture`, `flag`, `updateTime`, `createTime`) VALUES (?,?,?,?,?,?,?,?)";			
			$this->CI->db->query($insert, $user);
			$user = $this->CI->db->affected_rows();
						
			$info 		= array();
			$info[0]	= $infoKey;
			$info[1]	= json_encode($data_user['info']);
			$insert		= "INSERT INTO `user_info`(`infoKey`, `value`) VALUES (?,?)";
			
			$this->CI->db->query($insert, $info);
			$info = $this->CI->db->affected_rows();
			
			if($user == 1 && $info == 1)
			{
				$result = true;				
			}
		}
		return $result;
	}

	function login($username, $password)
	{
		$sql 	= "SELECT * FROM `user` WHERE ( name = ? OR mail = ? ) AND password = ? AND isAdmin = 1;";

		$result = $this->CI->db->query($sql, array($username,$username, sha1($password)))->result_array();
		$return = -2;
		if ( count($result) == 1 )
		{
			$result = $result[0];
			$return = -1;
			if($result['flag'] == "1")
			{
				$this->updateLastLoginTime($result['id']);//Update LoginTime
				$user['admin']						= array();
				$user['admin']['id']				= $result['id'];
				$user['admin']["isAdmin"]			= $result['isAdmin'];
				$user['admin']['name']				= $result['name'];
				$user['admin']['picture']			= $result['picture'];
				$user['admin']['langCode']			= $result['langCode'];
				$user['admin']['point']				= $result['point'];
				$user['admin']['mail']				= $result['mail'];
				$user['admin']['group_id']			= $result['group_id'];
				$user['admin']['currenciesIsoCode']	= $result['currenciesIsoCode'];
				$this->CI->session->set_userdata('admin',json_encode($user['admin']));
				$return = 1;
			}
		}
		return $return;
	}
    	
	function logout()
	{
		$this->CI->session->unset_userdata('admin');
	}

	function updateLastLoginTime( $id )
	{
		$save					= array();
		$save['lastLoginTime']	= date('Y-m-d H:i:s');
		
		$this->CI->db->where('id', 	   $id);
		$this->CI->db->update('user', $save);
	}

	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}