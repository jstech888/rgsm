<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_model extends My_Model {

	private $key = "ssss1234";

	public $type = false;
	
	public $coupon = array(
		"id" => -1,
		"title" => "",
		"key" => "",
		"value" => array(),
		"expiredTime" => ""
	);
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "coupon";
    }
	
	public function listTitle()
	{
		$sql = "SELECT DISTINCT `coupon`.`title` AS title, `coupon`.`expiredTime`, `coupon`.`id`  FROM `coupon`;";
		$result = $this->db->query($sql)->result_array();
		return $result; 
	}
	
	public function validate( $ticketNumber, $used = false )
	{
		$response = array();
		$response["code"] = -1; // 此 ticket number 不存在
		$response["result"] = array();
		$sql = "SELECT `coupon_ticket`.`isUsed`,
					( SELECT `expiredTime` FROM `coupon` WHERE `coupon`.`id` = `coupon_ticket`.`couponId`  ) AS expiredTime,
					( SELECT `value` FROM `coupon` WHERE `coupon`.`id` = `coupon_ticket`.`couponId`  ) AS value
				  FROM `coupon_ticket`
				 WHERE `coupon_ticket`.`ticketNumber` = ?";
		$result = $this->db->query($sql,array($ticketNumber))->result_array();
		if( count($result) == 1 )
		{
			$response["code"] = -2; // 該 coupon 券 已經使用過
			if( $result[0]["isUsed"] == 0 )
			{
				$response["code"] = -3; // 該 coupon 券 已經逾期
				$deltaT = strtotime($result[0]["expiredTime"]) - time();
				if( $deltaT > 0 )
				{
					$response["code"] = 1; // 該 coupon 券 可以使用
					$value = json_decode($result[0]["value"],true);
					$response["result"] = $value["amount"];
					
					// 使用 該 coupon 券
					if( $used === true )
					{
						$this->db->update("coupon_ticket", array("isUsed" => 1), array("ticketNumber"=>$ticketNumber));
					}
				}
				
			}
		}	
		return $response;
	}
	
	public function listCouponByCouponId($couponId)
	{
		$listCoupon = array();
		$sql = "SELECT * 
		  FROM `coupon_ticket`
			JOIN `coupon` ON `coupon_ticket`.`couponId` = `coupon`.`id`
		 WHERE `coupon_ticket`.`couponId` = ?";
		$result = $this->db->query($sql,array($couponId))->result_array();
		$show = array("title","ticketNumber","value","expiredTime","isUsed");
		foreach( $result AS $ind => $rec )
		{
			$coupon = array();
			foreach( $rec AS $k => $v )
			{
				if( in_array($k, $show) )
				{
					if( $k == "isUsed" )
					{
						if ($v == 0 ){
							$coupon[$k] = "未使用" ;
						}
						else{
							$coupon[$k] = "已使用過" ;
						}
					}
					else if( $k == "value" )
					{
						$value = json_decode($v,true);
						$coupon["qty"] 		= $value["qty"];
						$coupon["amount"] 	= $value["amount"];
					}
					else if( $k == "expiredTime" )
					{
						$coupon[$k] = date("Y-m-d",strtotime($v));
					}
					else
					{
						$coupon[$k] = $v;
					}
				}
			}
			$listCoupon[] = $coupon;
		}
		return $listCoupon;
	}
	
	private function init($data)
	{
		$newCoupon = array();
		foreach( $data AS $k => &$v )
		{
			if( $k != "id" ) 
			{
				if( array_key_exists( $k, $this->coupon ) )
				{
					is_array($v)?$newCoupon[$k]=json_encode($v):$newCoupon[$k]=$v;
				}
			}
		}
		return $newCoupon;
	}	
	
	public function create($data)
	{
		$response = false;
		$Coupon = $this->init($data);
		
		$result = $this->read_RecordByWhereCase( array( "title" => $Coupon["title"] ) );
		if( count( $result ) == 0 )
		{
		
			$this->db->insert("coupon", $Coupon);		
			$couponId = $this->db->insert_id();
			
			$arrTicket = array();
			for($i=0;$i<$data["value"]["qty"];$i++)
			{
				$ticket = array();
				$ticket["couponId"] = $couponId;
				$ticket["ticketNumber"] = strtoupper(MD5($i.$data["key"].$data["value"]["qty"].$data["value"]["amount"].$data["expiredTime"].$this->key));
				$arrTicket[] = $ticket;
			}
			
			$this->db->insert_batch("coupon_ticket", $arrTicket);
			
			$response = $this->db->affected_rows();			
		}
		return $response;
	}
	
	public function save($data)
	{
		$Coupon = $this->init($data);
		$this->db->update("coupon", $Coupon, array("id"=>$data["id"]));
		return $this->db->affected_rows();
	}
	
	public function delete($couponId)
	{
		$response = array();
		$this->db->delete('coupon',	array('id' => $couponId ));
		$response[] = $this->db->affected_rows();
		
		$this->db->delete('coupon_ticket',	array('couponId' => $couponId ));
		$response[] = $this->db->affected_rows();	
		return $response;
	}	
	
}