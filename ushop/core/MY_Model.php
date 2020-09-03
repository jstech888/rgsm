<?php
/*123*/
class My_Model extends CI_Model
{
	public $currentLang   = false;
	public $DEFAULTLANG   = false;
	public $currentCurrency = false;
	public $DEFAULTCURRENCY = false;
	
	public $MEMEBERPRICE  = false;
	
	public $BankRemittancesVar  = false;	
	public $PayOnArrivalVar  	= false;
	public $FreeFare  			= false;
	
	public $isShowLangSelector = false;
	public $isShowCurrencySelector = false;
	
	public $ExchangeRate = false;
	
	public $table = "";
	public $prefix = "";
	
	public $last_result = false;

	public $webVar = false;
	function __construct()
	{
		parent::__construct();
		
		$this->table = "option";
		$this->load->library('session');
	
		if($this->DEFAULTLANG == false)
		{
			$result = $this->read_RecordByWhereCase(array( "key" => "DEFAULTLANG"));
			$this->DEFAULTLANG = $result[0]['value'];
		}
		
		if($this->DEFAULTCURRENCY == false)
		{
			$result = $this->read_RecordByWhereCase(array( "key" => "DEFAULTCURRENCY"));
			$this->DEFAULTCURRENCY = $result[0]['value'];
		}
		
		if($this->isShowLangSelector == false)
		{
			$result = $this->read_RecordByWhereCase(array( "key" => "isShowLangSelector"));
			$this->isShowLangSelector = $result[0]['value'];
		}
		if($this->isShowCurrencySelector == false)
		{
			$result = $this->read_RecordByWhereCase(array( "key" => "isShowCurrencySelector"));
			$this->isShowCurrencySelector = $result[0]['value'];
		}
		
		if($this->ExchangeRate == false)
		{
			$result = $this->read_RecordByWhereCase(array( "key" => "ExchangeRate"));
			$this->ExchangeRate = $result[0]['value'];
		}
		
		
		$this->webVar = $this->session->userdata('webVar');
		
		$lang = isset($this->webVar["lang"]) ? $this->webVar["lang"] : $this->DEFAULTLANG;
		$currency = isset($this->webVar["currency"]) ? $this->webVar["currency"] : $this->DEFAULTCURRENCY;
		
		/* LANG DATA */
		if( isset($_GET['lang']) )
		{
			$this->currentLang = $_GET['lang'];
			$this->webVar["lang"] = $this->currentLang;
			$this->session->set_userdata('webVar',$this->webVar);
		}
		else
		{	
			$this->currentLang = ( $lang != false )?$lang:$this->DEFAULTLANG;
		}	
		if( $lang === false )
		{
			$this->webVar["lang"] = $this->currentLang;
			$this->session->set_userdata('webVar',$this->webVar);
		}
		
		
		/* CURRENCY DATA */
		if( isset($_GET['currency']) )
		{
			$this->currentCurrency = $_GET['currency'];
			$this->webVar["currency"] = $this->currentCurrency;
			$this->session->set_userdata('webVar',$this->webVar);
		}
		else
		{	
			$this->currentCurrency = ( $currency != false )?$currency:$this->DEFAULTCURRENCY;
		}	
		if( $currency === false )
		{
			$this->webVar["currency"] = $this->currentCurrency;
			$this->session->set_userdata('webVar',$this->webVar);
		}
	}

	public function readEnumValues( $field )
	{
		$type = $this->db->query( "SHOW COLUMNS FROM {$this->table} WHERE Field = '{$field}'" )->row( 0 )->Type;
		preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
		$enum = explode("','", $matches[1]);
		return $enum;
	}
	
	public function read_ColumnName()
	{
		$this->db->set_dbprefix($this->prefix);
		$fields = $this->db->list_fields($this->table);
		return $fields;
	}

	public function read_RecordByWhereCase($where=false,$order_by=false)
	{
		$this->db->set_dbprefix($this->prefix);
		$this->db->select("*");
		$this->db->from($this->table);
		($where != false)?$this->db->where($where):'';
		($order_by != false)?$this->db->order_by($order_by):'';
		$result  = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}

	public function create_Record( $data )
	{
		$this->db->set_dbprefix($this->prefix);
		$this->db->insert($this->table, $data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	public function create_RecordBatch( $data )
	{
		$this->db->set_dbprefix($this->prefix);
		$this->db->insert_batch($this->table, $data);
		return $this->db->affected_rows();
	}

	public function update_Record( $data, $where )
	{
		$this->db->set_dbprefix($this->prefix);
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_Record( $where )
	{
		$this->db->set_dbprefix($this->prefix);
		$this->db->delete($this->table, $where);
		return $this->db->affected_rows();
	}

	public function check_RecordExistByWhereCase( $where=false )
	{
		$result = false;
		if($where!=false)
		{
			$where = is_array($where)?$where:array("id"=>$where);
			$this->db->set_dbprefix($this->prefix);
			$this->db->select("*");
			$this->db->from( $this->table );
			$this->db->where( $where );
			$query = $this->db->get();
			$result = ( $query->num_rows() > 0 )?true:false;
			$this->last_result = $query->result_array();
		}
		return $result;
	}
	
	
	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	
	function loadLang( $path )
	{
		$lang_path = LANGPATH . $path;
		$temp_lang_path = $lang_path . $this->currentLang . ".json";		
		$lang_path=(!file_exists($temp_lang_path))?$lang_path. DEFAULTLANG . ".json":$temp_lang_path;
		$obj_lang = json_decode( file_get_contents($lang_path),true );		
		return $obj_lang;
	}
	
	
	public function statusConvert($status)
	{
		$obj_orderlist_lang = $this->loadLang("widget/orderstatus/");
		// $obj_orderlist_lang = $this->loadLang("widget/orderlist/");

		$list_status_selector = array(
			"0" 	=> isset($obj_orderstatus_lang["order_0"]) ? $obj_orderstatus_lang["order_0"] : "成立",
			"9" 	=> isset($obj_orderstatus_lang["order_9"]) ? $obj_orderstatus_lang["order_9"] : "取消處理中",
			"-1" 	=> isset($obj_orderstatus_lang["order_-1"]) ? $obj_orderstatus_lang["order_-1"] : "已取消",
			"1" 	=> isset($obj_orderstatus_lang["order_1"]) ? $obj_orderstatus_lang["order_1"] : "完成"
		);
		
		$result = array();
		if($status == "0")
		{
			$result['html'] = '<span class="label label-default">'.$list_status_selector[$status].'</span>';
			$result['text'] = $list_status_selector[$status];
		}
		if($status == "9")
		{
			$result['html'] = '<span class="label label-warning">'.$list_status_selector[$status].'</span>';
			$result['text'] = $list_status_selector[$status];
		}
		if($status == "-1")
		{
			$result['html'] = '<span class="label label-danger">'.$list_status_selector[$status].'</span>';
			$result['text'] = $list_status_selector[$status];
		}
		if($status == "1")
		{
			$result['html'] = '<span class="label label-success">'.$list_status_selector[$status].'</span>';
			$result['text'] = $list_status_selector[$status];
		}

		/*if($status == "101")
		{
			$result['html'] = '<span class="label label-danger">'.$obj_orderlist_lang['failed'].'</span>';
			$result['text'] = $obj_orderlist_lang['failed'];
		}
		if($status == "100")
		{
			$result['html'] = '<span class="label label-danger">'.$obj_orderlist_lang['expired'].'</span>';
			$result['text'] = $obj_orderlist_lang['expired'];
		}
		if($status == "0")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['pending'].'</span>';
			$result['text'] = $obj_orderlist_lang['pending'];
		}
		if($status == "1")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['remittanceChecked'].'</span>';
			$result['text'] = $obj_orderlist_lang['remittanceChecked'];
		}
		if($status == "2")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['shipping'].'</span>';
			$result['text'] = $obj_orderlist_lang['shipping'];
		}
		if($status == "3")
		{
			$result['html'] = '<span class="label label-success">'.$obj_orderlist_lang['arrival'].'</span>';
			$result['text'] = $obj_orderlist_lang['arrival'];
		}
		if($status == "4")
		{
			$result['html'] = '<span class="label label-warning">'.$obj_orderlist_lang['waitOfflinePay'].'</span>';
			$result['text'] = $obj_orderlist_lang['waitOfflinePay'];
		}
		if($status == "5")
		{
			$result['html'] = '';
			$result['text'] = '';
		}
		if($status == "-1")
		{
			$result['html'] = '';
			$result['text'] = $obj_orderlist_lang['revoke'];
		}*/
		return $result;
	}
	public function orderStatusConvert($status,$method)
	{
		$obj_orderstatus_lang = $this->loadLang("widget/orderstatus/");
		$result['value'] = $status ;
		
		$result = array();
		$result['text'] = isset($obj_orderstatus_lang[$method."_".$status]) ? $obj_orderstatus_lang[$method."_".$status] : "" ;

		return $result;
	}
}
?>