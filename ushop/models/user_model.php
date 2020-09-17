<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends My_Model {

	public $id = false;
	
	public $sample = array("id"=>"-1", "nickname"=>"", "name"=>"", "mail"=>"","gender"=>"", "point"=>"", "phone"=>"", "birthday"=>"", "password"=>"", "image"=>array(
		"name" => "sample.png",
		"thumbnailUrl" => "http:\/\/new-celena.mooo.com\/uploads\/avatar.png",
		"url" => "http:\/\/new-celena.mooo.com\/uploads\/avatar.png"
	));
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "user";
        $this->table2 = "user_resume";
    }

	function distributeShoppingPoint($userId,$value)
	{
		$result = $this->read_RecordByWhereCase(array( "id" => $userId));
		$this->db->update("user",array("point"=>intval($value) + intval($result[0]["point"])),array("id"=>$userId));
		return $this->db->affected_rows();
	}

	function setShoppingPoint($userId,$value)
	{
		$this->db->update("user",array("point"=>$value),array("id"=>$userId));
		return $this->db->affected_rows();
	}
	
	function realTimePoint($userId)
	{
		$result = $this->read_RecordByWhereCase(array( "id" => $userId));
		return $result[0]["point"];
	}
	
	function getHostGroup($id, $start="1970-01-01 00:00:00", $end="4000-01-01 00:00:00")
	{
		$sql = "SELECT *
				  FROM `user` 
				 WHERE host_id = ? AND ( createTime BETWEEN ? AND ? )";
		$result = $this->db->query($sql,array($id, $start, $end))->result_array();
		return $result;
	}
	
	function getListHostGroup($arr_id, $start="1970-01-01 00:00:00", $end="4000-01-01 00:00:00")
	{
		$sql = "SELECT host_id, COUNT(id) AS nums
				  FROM `user` 
				 WHERE host_id in (".implode(",",$arr_id).") AND ( createTime BETWEEN ? AND ? )
				 group by host_id";
		$result = $this->db->query($sql,array($start, $end))->result_array();
		return $result;
	}
	
	public function listAllBloger()
	{
		$sql = "SELECT `id`,`name`,`mail` FROM `user` WHERE `group_id` in ( 1, 2, 5 );";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}
	
	public function getHostGroupAll($id)
	{
		$now_month 	 = date("Y-m");
		$start = date("Y-m-01 00:00:00",strtotime($now_month." -1 years +1 months"));
		$end = date("Y-m-d 23:59:59",strtotime($now_month." +1 months -1 days"));
		$sql = "
		SELECT DATE_FORMAT(`createTime`,'%Y-%m') AS sumYM , COUNT(`id`) AS sumHostGroup
				  FROM `user` 
				 WHERE host_id = ? 
					AND ( `createTime` BETWEEN ? AND ? ) 
				GROUP BY YEAR(`createTime`), MONTH(`createTime`);";//AND type IN ( 1,2,3 )
		$result = $this->db->query($sql,array($id,$start,$end))->result_array();
		return $result;
	}	
	
	function pushNotification($userId,$message)
	{
		$sql = "INSERT INTO `checkOrder_Task`(`userId`, `message`) VALUES (?,?);";
		$this->db->query($sql,array($userId,$message));		
	}
	
	function logBonus($hostId,$orderId,$amount,$id,$createTime,$update=false)
	{
		($createTime === false)?$createTime = date("Y-m-d H:i:s"):"";

		if( $update  ){   //update
			$this->db->update("user_bonus_log", array( "status" => '1' ,"updatetime" => $createTime ), array( "id" => $id ));
		}
		else{   //insert
			$sql = "INSERT INTO `user_bonus_log`(`hostId`, `orderId`, `amount`, `createTime`) VALUES (?,?,?,?);";
			$this->db->query($sql,array($hostId,$orderId,$amount,$createTime));	
		}
		//return $result ;
	}

	function queryBonus($hostId,$orderId)
	{
		$sql = "SELECT * FROM `user_bonus_log` WHERE `hostId` = ? AND `orderId` = ?  ";
		$result = $this->db->query($sql,array( $hostId , $orderId ))->result_array(); 
		return $result ;
	}
	
	function queryBonusById($id)
	{
		$sql = "SELECT * FROM `user_bonus_log` WHERE `id` = ? ";
		$result = $this->db->query($sql,array( $id ))->result_array(); 
		return $result ;
	}

	function logBonusForCancel($logBonusId,$updatetime=false)
	{
		($updatetime === false)?$updatetime = date("Y-m-d H:i:s"):"";
		$result = $this->db->update("user_bonus_log", array( "status" => '0' ,"updatetime" => $updatetime ), array("id" => $logBonusId));
		return $result;
	}
	
	function findAll() {
		$this->table 	= "user";
		$result 		= $this->read_RecordByWhereCase( array() );		
		return $result;
	}

	function findAllOfUser() {
        $sql = "SELECT * FROM `user` WHERE `group_id` != 5 ";
        $result = $this->db->query($sql)->result_array();
        return $result;
	}
	
	function findAllBloger()
	{
		$sql = "
		SELECT *
		  FROM `user` 
		 WHERE `group_id` IN (1,2,3,5);";//AND type IN ( 1,2,3 )
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	function findAllResumeOfUser()
	{
		$sql = "SELECT * FROM `".$this->table2."` WHERE 1 AND `act` = 2 ORDER BY id ";
		$result = $this->db->query($sql)->result_array();

		return $result;
	}

	function findHostIdByCode($code)
	{
		$this->table 	= "user";
		$result 		= $this->read_RecordByWhereCase( array( "unique_host" => $code ) );
		return (count($result) > 0 )?$result[0]["id"]:0;
	}
	
	function findUserById($id)
	{
		$this->table 	= "user";
		$result 		= $this->read_RecordByWhereCase( array( "id" => $id ) );		
		return $result;
	}

	function findUserResumeById($id)
	{
		$this->table 	= "user_resume";
		$result 		= $this->read_RecordByWhereCase( array( "id" => $id ) );

		return $result;
	}

	function findUserByEmail($email)
	{
		$this->table 	= "user";
		$result 		= $this->read_RecordByWhereCase( array( "mail" => $email ) );		
		return $result;
	}
	
	public function saveUniqueHost($unique, $id)
	{
		$this->db->update("user", array("unique_host" => $unique ), array("id" => $id));
		return $this->db->affected_rows();
	}
		
	function isExist($where)
	{
		$result = $this->db->get_where("user",$where)->result_array();
		$this->result = $result;
		$result = ( isset($result) && $result != false && is_array($result) && count($result) > 0 )?true:false;
		return $result;
	}
	
	function createUser( $data_user )
	{	
		$result = false;
		$infoKey = $this->GUID();
		
		$exist = $this->isExist("`name` = '".$data_user['name']."' OR `mail` = '".$data_user['mail']."' ");
		
		if($exist === false )
		{
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
			$user['gender'] 	= $data_user['gender'];
			$user['group_id'] 	= 2 ;
			$user['host_id'] 	= 0;
			$user["password"]	= sha1($data_user['password']);
			$user["picture"]	= json_encode($default);
			$user["flag"]		= "1";
			$user["updateTime"]	= date("Y-m-d H:i:s");
			$user["createTime"]	= date("Y-m-d H:i:s");
						
			$this->db->insert('user', $user); 
			
			$result = true;	
		}
		return $result;
	}

	public function save_resume($data)
    {
//var_dump($data);
        if(!isset($data))  return "缺少必要欄位";

        if( $data["id"] == "" )
        {
            $insertData = array();
            $insertData = $data;
            $insertData['createdtime'] = date("Y-m-d H:i:s");
            unset($insertData['id']);

            $this->db->insert($this->table2, $insertData);

            return $this->db->insert_id();
        }
        else
        {
            $updateData = array();
            $updateData = $data;
            unset($updateData['id']);
            $updateData['updatedtime'] = date("Y-m-d H:i:s");
//echo "\r\n updateData=";var_dump($updateData);
            $this->db->update($this->table2, $updateData, array("id" => $data['id']));

            return $data['id'];
        }
    }
		
	public function save($data)
	{
		if(!isset($data["id"]))
			return "缺少必要欄位";
		
		if( $data["id"] == "-1" )
		{
			$sample = array("name","mail","password","nickname","phone","gender","birthday","point","infoKey","picture","langCode","currenciesIsoCode","flag","isAdmin","updateTime","createTime","group_id","host_id");
			
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" || $key == "createTime" )
					{
						$insertData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "password" )
					{
						$insertData[$key] = sha1(trim($val));
					}
					else if( $key == "picture" )
					{
						$insertData[$key] = json_encode($val);
					}
					else
					{
						$insertData[$key] = trim($val);
					}
				}
			}
			$this->db->insert("user", $insertData);
			return $this->db->last_query() . "," . $this->db->affected_rows();
		}
		else
		{
			$sample = array("name","mail","password","nickname","phone","gender","birthday","point","infoKey","picture","langCode","currenciesIsoCode","flag","isAdmin","updateTime","group_id","host_id");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sample) )
				{
					if( $key == "updateTime" )
					{
						$updateData[$key] = date("Y-m-d H:i:s");
					}
					else if( $key == "password" )
					{
						$updateData[$key] = sha1(trim($val));
					}
					else if( $key == "picture" )
					{
						$updateData[$key] = json_encode($val);
					}
					else
					{
						$updateData[$key] = trim($val);
					}
				}
			}
			$this->db->update("user", $updateData, array("id" => $data['id']));
			return $this->db->last_query() . "," . $this->db->affected_rows();
		}
	}

    function get_resume($uid)
    {
        $sql = "SELECT * FROM `".$this->table2."` WHERE user_id = ? ORDER BY createdtime DESC LIMIT 1 ";
        $result = $this->db->query($sql,array($uid))->result_array();

        return $result ;
    }

    function get_resume_by_id($id)
    {
        $sql = "SELECT * FROM `".$this->table2."` WHERE id = ? ORDER BY createdtime DESC LIMIT 1 ";
        $result = $this->db->query($sql,array($id))->result_array();

        return $result ;
    }

    public function delete($id)
	{
		$sql = "SELECT * FROM `".$this->table."` WHERE id = ? ";
		$result = $this->db->query($sql, array($id))->result_array();

		if( count($result) > 0 )
		{
			$this->db->delete($this->table, array('id' => $id)); 
		}
	}

}