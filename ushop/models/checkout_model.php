<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends My_Model {

	public $type = false;
	public $prefix = '';
	public $digits = -5;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "transaction";
		$this->prefix = "TSC";
    }
	public function lastTransactionId()
	{
		$sql = "SELECT `unique_id` AS 'id' FROM $this->table 
				WHERE `unique_id` LIKE '".$this->prefix.date("Ymd")."%' AND createTime LIKE '".date("Y-m-d")."%' 
				ORDER BY createTime DESC LIMIT 1 ";
// error_log($sql."\r\n",3,"uploads/log_checkout_model_sql.log");
		$query = $this->db->query($sql);		
		$result = $query->result_array();
// error_log(print_r($result,true)."\r\n",3,"uploads/log_checkout_model_result.log");		

		$ret = ($result[0]["id"]!='')? substr($result[0]["id"], $this->digits):0;
		
		return $ret;
	}

	public function lastTransactionId_0()
	{
		$query = $this->db->query("SELECT `AUTO_INCREMENT` AS 'id'
									 FROM INFORMATION_SCHEMA.TABLES
									WHERE TABLE_SCHEMA 	=  'tsaocheeb2c'
									  AND TABLE_NAME 	=  'transaction'");
		$result = $query->result_array();
		return $result[0]["id"];
	}
	
	
	public function createTransaction($data,$detail)
	{
		$this->db->trans_begin();
		
		$lastId  = $this->lastTransactionId() + 1;
// error_log("lastId=".$lastId."\r\n",3,"uploads/log_checkout_model_createTransaction_lastId.log");		
		$orderId = $this->prefix.date("Ymd")."".str_pad($lastId, 5, '0', STR_PAD_LEFT);
		// $orderId = "TSC" . str_pad($lastId,17,'0',STR_PAD_LEFT);
		$data["unique_id"] = $orderId;
		$data["orderTypeTime"] = date("Y-m-d H:i:s") ;
		
		$this->db->insert("transaction", $data); 
		$insert_id = $this->db->insert_id();
		
		foreach( $detail AS $k=>$row )
		{
			$detail[$k]['transactionId'] = $insert_id;
		}
		$this->db->insert_batch("transaction_detail", $detail); 
		
		//insert transaction log 
		$transaction_log = array();
		$transaction_log["orderId"] = $orderId;
		$transaction_log["method"] = "orderType" ;
		$transaction_log["type"] = 0 ;
		$transaction_log["reson"] = "initial order" ;
		$this->db->insert("transaction_log", $transaction_log);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $orderId;
		}
	}
	
	public function queryTransactionByUserId($userId)
	{
		//$result = $this->read_RecordByWhereCase(array('userId' => $userId));
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where(array('userId' => $userId, 'status' => 'enable' ));
		$result  = $this->db->get()->result_array();

		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record = $row;
			$record["status"] 	= $this->statusConvert($record["type"]);
			$record["cashData"] = json_decode($record["cashData"],true);
			$record["shipData"] = json_decode($record["shipData"],true);
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
}