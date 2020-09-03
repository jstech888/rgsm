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

            $sql = "select name, hall_desc from hall_lang where hall_id = ? and langCode = ? ";
            $bind = array(
              $row['id'],
              $lang,
            );
            $langResult = $this->db->query($sql, $bind)->row_array();
            $record['name'] = $langResult['name'];
            $record['hall_desc'] = $langResult['hall_desc'];

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

	// 計算商品折扣價格
	public function calProduct($halls = array()){

	    if (!$halls)return array();

	    $returnHall = array();

	    foreach ($halls as $hallId => $products) {

	        $hall = array();

	        # 取得館別資訊
	        $sql = "select * from hall where id = ? ";
	        $hall = $this->db->query($sql, array($hallId))->row_array();

	        //1 => '依照設定折扣', 2 => '低價商品館 (滿額折扣結帳)', 3 => '滿件折扣'
	        if ($hall['type'] == 1){
	            $price = $this->_calProductDiscount($hall, $products);
	        }elseif ($hall['type'] == 2){
	            $price = $this->_calProductFullDiscount($hall, $products);
	        }elseif ($hall['type'] == 3){
	            $price = $this->_calProductQtyDiscount($hall, $products);
	        }

	        $returnHall[$hallId] = $price;
	    }

	    return $returnHall;
	}

	// 依照設定折扣
	protected function _calProductDiscount($hall, $products) {

	    $allPrice = 0;
	    $discountPrice = 0 ;

	    foreach ($products as $product) {
	        $price = $product['showPrice'] * $product['qty'];
	        $allPrice += $price;
	    }

	    if ($hall['discount_type'] == 1 ){

	        // % 折扣
	        $discountPrice = round($allPrice * $hall['discount'] );

	    }elseif ($hall['discount_type'] == 2){

	        // 直接扣
	        $discountPrice = $allPrice <= $hall['discount'] ? 0 : $allPrice - $hall['discount'];
	    }

	    return $discountPrice;
	}

	// 滿額折扣
	protected function _calProductFullDiscount($hall, $products) {

	    $allPrice = 0;
	    $discountPrice = 0 ;

	    foreach ($products as $product) {
	        $price = $product['showPrice'] * $product['qty'];
	        $allPrice += $price;
	    }

	    $hallContent = json_decode($hall['content'],true);

	    // 未達標準
	    if ($allPrice < $hallContent['moneyLimit'])return $allPrice;

	    // 先檢查是否超過額度
	    if ($hall['discount_type'] == 1 ){

	        // % 折扣
	        $discountPrice = round($allPrice * $hall['discount'] );

	    }elseif ($hall['discount_type'] == 2){

	        // 直接扣
	        $discountPrice = $allPrice <= $hall['discount'] ? 0 : $allPrice - $hall['discount'];
	    }

	    return $discountPrice;
	}

	// 滿件折扣
	protected function _calProductQtyDiscount($hall, $products) {

	    $allPrice = 0;
	    $discountPrice = 0 ;
// error_log(print_r($products,true)."\r\n\r\n",3,"uploads/log_hall_model_calProductQtyDiscount_products.log");
	    foreach ($products as $product) {
	        $price = $product['showPrice'] * $product['qty'];
	        $allPrice += $price;
	        $allQty += $product['qty'];
	    }

	    $hallContent = json_decode($hall['content'],true);
// echo "<br>allQty=".$allQty.", itemUnm=".$hallContent['itemUnm'].", discount=".$hall['discount'].", allPrice=".$allPrice;
	    // 未達標準
	    if ($allQty < $hallContent['itemUnm']) return $allPrice;
// echo "<br>hall['discount_type']=".$hall['discount_type'].", hall['discount']=".$hall['discount'];
	    // 先檢查是否超過額度
	    if ($hall['discount_type'] == 1 ){

	        // % 折扣
	        $discountPrice = round($allPrice * $hall['discount']  );

	    }elseif ($hall['discount_type'] == 2){

	        // 直接扣
	        $discountPrice = $allPrice <= $hall['discount'] ? 0 : $allPrice - $hall['discount'];
	    }
// echo "<br>discountPrice=".$discountPrice; exit;
	    return $discountPrice;

	}


}