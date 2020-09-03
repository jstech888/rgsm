<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hall_model extends My_Model {

	public $id = false;
	protected $_type = array(1 => '依照設定折扣', 2 => '低價商品館 (滿額折扣結帳)', 3 => '滿件折扣' );
	protected $_status = array(1 => '啟用', 2 => '停用');
	protected $_discount_type = array(1 => '%折扣', 2 => '金額折扣');
	protected $_isShow = array(1 => '是', 2 => '否');

    function __construct()
    {
        parent::__construct();
		$this->table = "hall";
    }

    public function findAll( $langCode = false, $currenciesIsoCode = false )
    {
        $lang = ($langCode == false)?$this->currentLang:$langCode;

        $currency = ($currenciesIsoCode == false)?$this->currentCurrency:$currenciesIsoCode;

        $result = $this->db->get('hall')->result_array();

        $new_res = array();
        foreach( $result as $row )
        {
            $record = array();
            $record = $row;

            $sql = "select name from hall_lang where hall_id = ? and langCode = ? ";
            $bind = array(
              $row['id'],
              $lang,
            );
            $langResult = $this->db->query($sql, $bind)->row_array();
            $record['name'] = $langResult['name'];

            $new_res[] = $record;
        }
        $this->last_result = $new_res;
        return $this->last_result;
    }

    public function getById($id){

        if (!$id)return false;

        $sql = "select * from hall where id = ? ";
        $hall = $this->db->query($sql, array($id))->row_array();

        if (!$hall) return false;

        $content = json_decode($hall['content'],true);

        $hall = array_merge($hall, $content);

        $hall['product_ids'] = explode(',' , $hall['product_ids']);

        $sqlLang = "select * from hall_lang where hall_id = ?  ";
        $hallLang = $this->db->query($sqlLang, array($id))->result_array();

        foreach ($hallLang as $key => $val){
            $newHallLang[$val['langCode']] = $val;
        }

        return array('hall' => $hall, 'hall_lang' => $newHallLang);
    }

	public function saveHall($data, $isNew = false){

		if ($isNew){
		    $this->db->trans_begin();

		    $this->db->insert('hall', $data['hall']);
		    $parentId = $this->db->insert_id();

		    foreach ($data['hall_lang'] as $lang => $langData){
		        $langData['hall_id'] = $parentId;
		        $this->db->insert('hall_lang', $langData);
		    }

		    if ($this->db->trans_status() === FALSE)
		    {
		        $this->db->trans_rollback();
		        return false;
		    }
	        $this->db->trans_commit();
		}
		else{

		    $this->db->trans_begin();

		    $this->db->update("hall", $data['hall'],array("id" => $data['hall']["id"]));
		    //$parentId = $this->db->insert_id();

		    foreach ($data['hall_lang'] as $lang => $langData){

		        $this->db->update("hall_lang", $langData,array("hall_id" => $data['hall']["id"], 'langCode' => $langData['langCode']));
		    }

		    if ($this->db->trans_status() === FALSE)
		    {
		        $this->db->trans_rollback();
		        return false;
		    }
		    $this->db->trans_commit();
		}
		return true;
	}

	public function delete($id){

	    $id = (int) $id;
	    $this->db->trans_begin();

	    $this->db->delete('hall', array('id' => $id));
	    $this->db->delete('hall_lang', array('hall_id' => $id));

	    if ($this->db->trans_status() === FALSE)
	    {
	        $this->db->trans_rollback();
	        return false;
	    }
	    $this->db->trans_commit();
	    return true;
	}


	public function checkProduct($id, $hallId) {
	    // find_in_set
	    $sql = "select * from hall where status = 1 and find_in_set({$id},product_ids)";

	    if ($hallId){
	        $sql .= " and id <> {$hallId} ";
	    }

	    $row = $this->db->query($sql)->row_array();

	    if ($row){
	        $sql = "
	          select pd.name
	            from product p
	            left join product_detail pd on p.detailKey = pd.detailKey
	           where p.id = {$id}
	             and pd.langCode = '{$this->currentLang}'
	        " ;

	        $product = $this->db->query($sql)->row_array();

	        return $product['name'];
	    }

	    return false;
	}


	// 取得有效的活動館別
	public function findEffectHall(){
	    $now = strtotime('now');

	    $halls = $this->findAll();

	    $result = array();

	    if (@$halls){
    	    foreach ($halls as $hall){
    	        // 過濾狀態
    	        if($hall['status'] != 1)continue;

    	        // 過濾開始時間
    	        if ($now < strtotime(@$hall['start_date']) || $now > strtotime(@$hall['end_date'].' 23:59:59'))continue;

    	        $result[$hall['id']] = $hall;
    	    }
	    }

	    return $result;
	}


}