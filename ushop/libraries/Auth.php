<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	var $CI;

	//this is the expiration for a non-remember session
	var $session_expire	= 3600;

	public $mobile_key = false;
	
	public $result = false;
	
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
		return ( sizeof($arr_record) == 0 );
	}
	
	function isEmailAvailable($Email)
	{
		$sql 		= "SELECT * FROM user WHERE ( mail = ? )";
		$arr_record = $this->CI->db->query($sql, array($Email))->row_array();
		return ( sizeof($arr_record) == 0 );
	}
	
	function isLoggedIn()
	{		
		$self = $this->CI->session->userdata('self');
		if( $self )
		{
			$self = json_decode($self,true);
			$self['picture'] = json_decode($self['picture'],true);	
			if( isset($self["id"]))
			{
				$sql = "SELECT * FROM user WHERE id = ?;";
				$rec = $this->CI->db->query($sql, array($self['id']))->row_array();
				$self["point"] = $rec["point"];
			}		
			if( !array_key_exists("backend",$self) )
			{
				$this->logout();
				$this->login($self["id"], false, true);
			}
		}
		return $self;
	}
	
	function reloadSession($id)
	{
		$this->logout();
		$this->login($id,false,true);
	}
	
	function isExist($where)
	{
		/*
		$arr_find = array();		
		$sql = "";		
		foreach( $where AS $k => $v )
		{
			$sql = "SELECT * FROM  `user` WHERE `$k` = ?;";	
			$arr_find[] = $v;
		}
		*/
		$result = $this->CI->db->get_where("user",$where)->result_array();
		//$result = $this->CI->db->query($sql, $arr_find)->result_array();
		$this->result = $result;
		$result = ( isset($result) && $result != false && is_array($result) && count($result) > 0 )?true:false;
		return $result;
	}
	
	function get_client_ip() {
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
	
	function checkOrder()
	{
		$listMid = array();
		$listMessage = array();
		if( $this->result != false && count($this->result) > 0 )
		{
			$sql = "INSERT INTO `apptouch`(`ip`, `request`, `createTime`) VALUES (?,?,?);";
			$this->CI->db->query($sql, array($this->get_client_ip(),json_encode($_REQUEST),date("Y-m-d H:i:s")));
				
			$sql 		= "SELECT * FROM `checkOrder_Task` WHERE `userId` = ? AND `isSend` = ?;";
			$arr_record = $this->CI->db->query($sql, array($this->result[0]["id"],0))->result_array();
			foreach( $arr_record AS &$v )
			{
				$listMessage[] = $v["message"];
				$listMid[] = $v["id"];
			}
			$indsMid = implode(",",$listMid);
			if( !empty( $indsMid ) )
			{
				$sql = "UPDATE `checkOrder_Task` SET `isSend`= 1 WHERE `id` in (".$indsMid.");";
				$this->CI->db->query($sql);
			}
		}
		return $listMessage;
	}
	
	function forgot($account,$birthday)
	{
		$sql 		= "SELECT * FROM user WHERE ( name = ? OR mail = ? ) AND birthday = ? AND flag = '1';";
		$arr_record = $this->CI->db->query($sql, array($account,$account,$birthday))->row_array();
		$result = false;
		if( count($arr_record) != 0 )
		{
			$this->CI->load->helper('email_helper');
			
			$this->CI->load->model("Option_model","mOption");	
			$AdminMail 			= $this->CI->mOption->readVal("AdminMail");	
			$mainForgotPassword = $this->CI->mOption->readVal("forgotPassword");	
			
			$newPW = $this->randomPassword();
			
			$this->CI->db->update('user', array("password" => sha1($newPW)), array("id" => $arr_record["id"]));
			
				
			$mainForgotPassword["title"] 	= str_replace("_NAME_", $arr_record["name"], $mainForgotPassword["title"]);			
			$mainForgotPassword["content"] 	= str_replace("_NAME_",	$arr_record["name"], $mainForgotPassword["content"]);
			
			$mainForgotPassword["title"] 	= str_replace("_NEWPASSWORD_", $newPW, $mainForgotPassword["title"]);			
			$mainForgotPassword["content"] 	= str_replace("_NEWPASSWORD_", $newPW, $mainForgotPassword["content"]);
			
			sendMailBySystemMail( $arr_record["mail"], $AdminMail["account"], $mainForgotPassword["title"], $mainForgotPassword["content"]);	

			$mailto = array( 
				"mail" => $arr_record["mail"],
				"name" => $arr_record["name"]
			);			
			$result = $mailto;
		}
		return $result;
	}
	
	function randomPassword() 
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	function createUser( $data_user, $isMemberCheckEmail=false )
	{	
		$result = false;
		$infoKey = $this->GUID();
		
		$userName = ( strlen($data_user['name'])==0 )? "xxxxxxxxxx" : $data_user['name'] ;  //避免判斷為已存在
		$exist = $this->isExist("`mail` = '".$data_user['mail']."' ");
		// $exist = $this->isExist("`name` = '".$userName."' OR `mail` = '".$data_user['mail']."' ");

		if($exist === false )
		{
			$flag = "1" ;
			if ($isMemberCheckEmail){ //啟用新會員認證信機制
				$flag = "0" ;
			}
			$default = array(
				"name" 			=> "sample.png",
				"thumbnailUrl"	=> base_url("/uploads/avatar.png"),
				"mediumUrl"		=> base_url("/uploads/avatar.png"),
				"url"			=> base_url("/uploads/avatar.png")
			);
			
			$user = array();
			$user["name"] 		= $data_user['name'];
			$user["mail"] 		= $data_user['mail'];
			$user['nickname'] 	= $data_user['nickname'];
			$user['birthday'] 	= $data_user['birthday'];
			$user['phone'] 		= $data_user['phone'];
			$user['gender']  	= $data_user['gender'];
			$user['region']  	= $data_user['region'];
			$user['county']  	= $data_user['county'];
			$user['district']	= $data_user['district'];
			$user['zip'] 		= $data_user['zip'];
			$user['address']    = $data_user['address'];
			$user['subscript']    = $data_user['subscript'];
			$user['host_id'] 	= 0;
			$user['point']      = (isset($data_user['point']))? $data_user['point'] : 0;   //註冊 購物金
			$user["password"]	= sha1($data_user['password']);
			$user["picture"]	= json_encode($default);
			$user["flag"]		= $flag ;
			$user["updateTime"]	= date("Y-m-d H:i:s");
			$user["createTime"]	= date("Y-m-d H:i:s");
						
			$this->CI->db->insert('user', $user); 
			$userId = $this->CI->db->insert_id();
			$userResult = $this->CI->db->affected_rows();
						
			$arr_info = array();
			foreach( $data_user['info'] AS $k => $v )
			{
				$info 				= array();
				$info["user_id"]	= $userId;
				$info["key"]		= $k;
				$info["value"]		= json_encode($v);
				$arr_info[] 		= $info;
			}
			$this->CI->db->insert_batch("user_exinfo", $arr_info);
			$info = $this->CI->db->affected_rows();

			//send 認證信
			if($isMemberCheckEmail){	
				$this->activeLink($userId);
			}
			
			if($userResult > 0 && $info > 0)
			{
				$result = true;				
			}
		}

		return $result;
	}
	
	function updateUser( $data_user )
	{
		
		$result = false;
		$isExist = $this->isExist(array("id"=>$data_user['id']));
		if($isExist == true)
		{
			$user = array();
			$user["nickname"] 	= $data_user['nickname'];
			$user["mail"] 		= $data_user['mail'];
			$user["birthday"] 	= $data_user['birthday'];
			$user["phone"] 		= $data_user['phone'];
			$user['gender']  	= $data_user['gender'];
			$user['region']  	= $data_user['region'];
			$user['county']  	= $data_user['county'];
			$user['district']	= $data_user['district'];
			$user['zip'] 		= $data_user['zip'];
			$user['address']    = $data_user['address'];
			$user['subscript']  = $data_user['subscript'];
			$user["updateTime"]	= date("Y-m-d H:i:s");
			$where = array();
			$where["id"] = $data_user['id'];
			
			$this->CI->db->update("user", $user, $where);
			$user = $this->CI->db->affected_rows();
			if($user == 1)
			{
				$result = true;		
				$this->login($data_user['id'],false,true);
			}
		}
		return $result;
	}
	
	function changePassword($data_user)
	{
		$result 	= false;
		$userExist 	= $this->isExist(array("id"=>$data_user['id'],"password"=>sha1($data_user['oldPassword'])));
		if($userExist == true)
		{
			$this->CI->db->update("user", array("password"=>sha1($data_user['password'])), array("id"=>$data_user['id']));
			$user = $this->CI->db->affected_rows();
			
			if($user == 1)
			{
				$result = true;		
			}
		}
		return $result;
	}

	function login($username, $password, $force=false, $mobile=false,$flag=false,$loginMedia ="" )
	{
		if($force === false && $flag === false )
		{
			$sql 	= "SELECT * FROM `user` WHERE ( name = ? OR mail = ? ) AND password = ? AND flag = '1'";
			$result = $this->CI->db->query($sql, array($username,$username, sha1($password)))->result_array();	
		}
		else if( $password !="" && $flag !== true  )  // for 認證信 機制啟用時
		{	
			$sql 	= "SELECT * FROM `user` WHERE ( name = ? OR mail = ? ) AND password = ?  ";
			$result = $this->CI->db->query($sql, array($username,$username, sha1($password)))->result_array();	
		}
		else if($loginMedia == "facebook"){
			$sql 	= "SELECT * FROM `user` WHERE ( name = ? OR mail = ? )  ";
			$result = $this->CI->db->query($sql, array($username,$username))->result_array();	
		}
		else if ( $force == true ){
			$sql 	= "SELECT * FROM `user` WHERE `id` = ? ";
			$result = $this->CI->db->query($sql, array($username))->result_array();
		}
		else
		{
			$sql 	= "SELECT * FROM `user` WHERE `id` = ? ";
			$result = $this->CI->db->query($sql, array($username))->result_array();				
			//var_dump($this->CI->db->last_query());
		}
		$return = -2;
		if ( count($result) == 1 )
		{
			$result = $result[0];
			$return = -1;
			if($result['flag'] == "1")
			{
				$this->CI->session->unset_userdata('self');		
				$this->updateLastLoginTime($result['id']);//Update LoginTime
				
				//生日禮金
				if( date("Y-m-d") == $result["birthday"] )
				{
					$this->CI->load->model("Option_model");
					$BirthdayMoneny = $this->CI->Option_model->readString("BirthdayMoneny");	
					
					$save = array();
					$result['point'] = $save['point'] = $BirthdayMoneny + $result["point"];
					
					$this->CI->db->where('id', $result["id"]);
					$this->CI->db->update('user', $save);			
				}
				//get gender
				$this->CI->load->model("User_exinfo_model");	
				$genderResult = $this->CI->User_exinfo_model->findUserById($result['id'],"gender","none");
				$gender = "" ;
				if( count($genderResult) > 0 )
				{
					$gender =  json_decode($genderResult[0]["value"],true);
					//if (strlen($gender) > 1 ) $gender = str_replace("\"",,"",$gender) 
				}
				
				$user['self']						= array();
				$user['self']['id']					= $result['id'];
				$user['self']['host_id']			= $result['host_id'];
				$user['self']["isAdmin"]			= $result['isAdmin'];
				$user['self']['nickname']			= $result['nickname'];
				$user['self']['name']				= $result['name'];
				$user['self']['mail']				= $result['mail'];
				$user['self']['gender']				= $result['gender'];
				$user['self']['region']  			= $result['region'];
				$user['self']['county']  			= $result['county'];
				$user['self']['district']			= $result['district'];
				$user['self']['zip'] 				= $result['zip'];
				$user['self']['address']  			= $result['address'];
				$user['self']['birthday']			= $result['birthday'];
				$user['self']['phone']				= $result['phone'];
				$user['self']['picture']			= $result['picture'];
				$user['self']['langCode']			= $result['langCode'];
				$user['self']['point']				= $result['point'];
				$user['self']['subscript']			= $result['subscript'];
				$backend = array("1","2","5");
				$user['self']['backend']			= in_array($result['group_id'],$backend);
				$user['self']['currenciesIsoCode']	= $result['currenciesIsoCode'];
				$this->CI->session->set_userdata('self',json_encode($user['self']));
				$return = 1;
				
				if($mobile === true)
				{
					$Device = is_array($_POST['Device'])?$_POST['Device']:json_decode($_POST['Device']);
					$this->mobile_key = $Device["uuid"];
					$mobile_info = json_encode($Device);
					$sql 	= "UPDATE `user` SET `unique_mobile`= ?, `mobile_info` = ? WHERE `id` = ?;";
					$this->CI->db->query($sql, array($this->mobile_key, $mobile_info, $user['self']['id']));	
				}
			}
			else{
				$return = intval($result['flag']) ; 
			}
		}
		return $return;
	}
    	
	function logout()
	{
		$this->CI->session->unset_userdata('self');
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

	function activeLink($id,$name = true)
	{
		if( $name === true ){
			$sql 		= "SELECT * FROM user WHERE id = ?;";
			$arr_record = $this->CI->db->query($sql, array($id))->row_array();
		}
		else{
			$sql 		= "SELECT * FROM user WHERE ( name = ? OR mail = ? )";
			$arr_record = $this->CI->db->query($sql, array($name,$name))->row_array();
		}
		
		$result = false;
		if( count($arr_record) > 0 ) 
		{
			$this->CI->load->helper('email_helper');			
			
			$this->CI->load->model("Option_model","mOption");	
			$AdminMail 		= $this->CI->mOption->readVal("AdminMail");	
			$memberActive 	= $this->CI->mOption->readVal("memberActive");	
			
			$activeCode = md5($arr_record["name"].time());
			
			$updateData = array("unique_mobile" => $activeCode);
			$this->CI->db->update('user', $updateData, array("id" => $arr_record["id"]));
			
			$memberActive["title"] 		= str_replace("_NAME_", $arr_record["nickname"], $memberActive["title"]);			
			$memberActive["content"] 	= str_replace("_NAME_",	$arr_record["nickname"], $memberActive["content"]);

            $hostDNS = $this->CI->config->item('server_hostname');
			$activeLink = '<a href="'.$hostDNS.'?active='.$activeCode.'">啟用</a>';
			$memberActive["title"] 		= str_replace("_ACTIVELINK_", $activeLink, $memberActive["title"]);			
			$memberActive["content"] 	= str_replace("_ACTIVELINK_", $activeLink, $memberActive["content"]);

			sendMailBySystemMail( $arr_record["mail"], $AdminMail["account"], $memberActive["title"], $memberActive["content"]);	

			$mailto = array( 
				"mail" => $arr_record["mail"],
				"name" => $arr_record["nickname"]
			);			
			$result = $mailto;
		}
		return $result;
	}

	function checkActiveCode($activeCode)      //unique_mobile 用這 欄位 來暫存 認證碼
	{
		$return = 0;
		$sql = "SELECT * FROM user WHERE `unique_mobile` = ?";
		$rec = $this->CI->db->query($sql, array($activeCode))->row_array();
		if( count($rec) > 0 )
		{
			if( $rec["flag"] == "0" )
			{
				$user_id = intval($rec["id"]) ;
				$this->CI->db->update('user', array("flag" => '1'), array("unique_mobile" => $activeCode ));
				$this->CI->db->insert("user_exinfo", array("user_id" => intval($rec["id"]) ,"key"=> "isMemberCheckEmail","value" => "1" ) );

				$this->logout();
				//$this->login($user_id,"",true);		
				$return = 1;
			}
			else
			{
				$return = -1;
			}
		}
		return $return;
	}

	function checkLoginWithMedia($name,$mail,$loginMedia ="facebook")      //
	{
		$return = 0;   // default : 無此會員資料 ＝》 可註冊
		$sql 		= "SELECT * FROM user WHERE ( name = ? OR mail = ? )";
		$arr_record = $this->CI->db->query($sql, array($name,$mail))->row_array();
		
		$result = false;
		if( count($arr_record) > 0 ) 
		{
			$sql_user_exinfo = "SELECT * FROM user_exinfo  WHERE  user_id = ? AND `key` = ? ";
			$user_exinfo_record = $this->CI->db->query($sql_user_exinfo, array(intval($arr_record["id"]),"loginMedia"))->row_array();
			$return = 3 ;   // default : name & account exist but user_exinfo havn't facebook record 會員帳號存在 但不是facebook 會員
			if( count($user_exinfo_record) > 0 )    //"facebook" login 
			{
				if( json_decode($user_exinfo_record["value"]) ==  $loginMedia ) $return = 2 ;
			}
			//$return = $arr_record["id"] ;
		}
		return $return;
	}
}