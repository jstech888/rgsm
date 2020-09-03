<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart
{
	var $CI;

	//this is the expiration for a non-remember session
	var $session_expire	= 3600;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('encrypt');
		$this->CI->load->library('auth');
		$this->CI->load->library('session');
		$this->CI->load->helper('url');
		$this->CI->load->model('Product_model',"Product");
		$this->CI->load->model('hall_model','hallM');
		$this->CI->load->model('Option_model','OptionM');
	}

	function init()
	{
		if( $this->CI->session->userdata('cart') === "null" )
		{
			$cart = array();
			$this->CI->session->set_userdata('cart',json_encode($cart));
		}
	}

	function show()
	{
		$arr_rs = array();
		$result = array("cart"=>array(),"count"=>"0","total"=>0, "hall" => array());
		$total 	= 0;
		$twTotal = 0;
		$count  = 0;
		$cart = json_decode($this->CI->session->userdata('cart'),true);
		$self = $this->CI->auth->isLoggedIn();
		if( count($cart) != 0 )
		{
			$arr_inds = array();
			foreach($cart AS $item)
			{
				array_push($arr_inds,$item['PID']);
			}
			$arr_rs = $this->CI->Product->find(implode(",",$arr_inds));
// error_log(print_r($arr_rs,true),3,"uploads/log_library_cart_arr_rs.log");
			$itemsData = array();

			if ($arr_rs){
    			foreach ($arr_rs as $val){
    			    $itemsData[$val['PID']] = $val;
    			}
			}

			$total_promotion = array();
			foreach($cart AS $key => &$item)
			{
			    $rec = $itemsData[$item['PID']];

    			if( $self !== false )
    			{
    				$item["showPrice"] = $rec['cPrice'];
    				$total+= $item['qty'] * $rec['cPrice'];
    				$twTotal+= $item['qty'] * $rec['cTWPrice'];
    			}
    			else
    			{
    				$item["showPrice"] = $rec['price'];
    				$rec['cPrice'] = $rec['price'];
    				$total+= $item['qty'] * $rec['price'];
    				$twTotal+= $item['qty'] * $rec['TWPrice'];
    			}

    			// 依活動館分類
    			$hall = $this->CI->Product->findHall($item['PID']);
    			$rec['showPrice'] = $item['showPrice'];
    			$rec['qty'] = $item['qty'];

    			if ($hall){
    			    $result["hall"][$hall['id']][] = $rec;
    			    $cart[$key]['hall'] = $hall['id'];
    			    $total_promotion[$hall['id']] = $total_promotion[$hall['id']]+$rec['showPrice']*$rec['qty'];
    			}
    			else{
    				$result["hall"][0][] = $rec;
    				$total_main_prodcut += $rec['showPrice']*$rec['qty'];
    			}

    			$count+= $item['qty'];
    			$item = array_merge($rec,$item);
			}

			$DateLimitCheckoutDiscount = $this->CI->OptionM->readVal("DateLimitCheckoutDiscount");
			$DateLimitCheckoutDiscount["inTerm"] = false;
			if( floatval($DateLimitCheckoutDiscount["Rate"]) >= 0.1 )
			{
				$StartDate = strtotime($DateLimitCheckoutDiscount["StartDate"]." 00:00:00");
				$EndDate   = strtotime($DateLimitCheckoutDiscount["EndDate"]." 23:59:59");
				( time() >= $StartDate ) && ( $EndDate >= time() )? $DateLimitCheckoutDiscount["inTerm"] = true:"";	
			}
			if($DateLimitCheckoutDiscount["inTerm"] === true) {
	            if ( floatval($total_main_prodcut) >= floatval($DateLimitCheckoutDiscount["LimitAmount"]) )
	            {
	            	$discount = $total_main_prodcut * round(( floatval( 1 - $DateLimitCheckoutDiscount["Rate"] ) ),2);
	            }
	        }
	        $result['total_main_prodcut_discount'] = $discount;	        
// error_log(print_r($result["hall"],true)."\r\n\r\n",3,"uploads/log_library_cart_result[hall].log");
			$calProduct = $this->CI->hallM->calProduct($result["hall"]);

			foreach ($calProduct as $key => $price_promotion) {
				if($key>0){
					if($price_promotion!=0){
						$final_total_price = $final_total_price + $price_promotion;
					}
					else{
						$final_total_price = $final_total_price + $total_promotion[$key];
					}
				}	        	
	        }
	        $final_total_price += $total_main_prodcut - $discount;
	        $final_total_price = round($final_total_price);

			$result["calProduct"]  = $calProduct;
			$result["cart"]  = $cart;
			$result["count"] = $count;
			$result["total"] = $final_total_price;
			// $result["total"] = $total;
			$result["total_main_prodcut"] = $total_main_prodcut;
			$result["total_promotion"] = $total_promotion;
			$result["twTotal"] = $final_total_price;
			// $result["twTotal"] = $twTotal;
		}
// error_log(print_r($result,true),3,"uploads/log_library_cart_result.log");
		return $result;
	}

	private function findRealStock($dataStock, $formatType)
	{
		$realStock = 0;
		foreach( $dataStock AS &$row )
		{
// echo "<br>formatType=".$formatType.", row[formatType]=".$row["formatType"];
			if($row['formatType']=="F"){
				if( $row["formatType"] == $formatType )
				{
					$realStock = $row['value'];
					break;
				}
			}
			else{
				if( $row["id"] == $formatType )
				{
					$realStock = $row['value'];
					break;
				}
			}	
		}
		return $realStock;
	}

	function append( $PID, $qty, $formatType = "F" )
	{
		$appendSuccess = false;
		$dataProduct 	= $this->CI->Product->findAllKey(array("id"=>$PID));
		$mainKey		= $dataProduct[0]["detailKey"];
		$dataStock 		= $this->CI->Product->findStock($mainKey);

		$realStock 		= $this->findRealStock($dataStock, $formatType);

		$cart = json_decode($this->CI->session->userdata('cart'),true);

		(!is_array($cart))?$cart=array():'';
		$isExist = false;

		if ( $dataProduct[0]["status"] == "3" ) {  //加價購 不能單獨加入購物車
			if (count($cart) == 0 ){
				return "fail";
			}
		}
// $appendSuccess = "realStock=".$realStock.", dataStock=".var_dump($dataStock);
		foreach($cart AS $ind => $item)
		{
			if( $item['PID'] == $PID && $item['formatType'] == $formatType )
			{
				if ( $dataProduct[0]["status"] == "3" ) {  //加價購不能修改數量(1)
					$appendSuccess = true;
				}
				else if( $realStock >= $cart[$ind]['qty']+$qty )
				{
// $appendSuccess.=", cart[ind][qty]+qty=".$cart[$ind]['qty']+$qty;
					$cart[$ind]['qty'] = $cart[$ind]['qty']+$qty;
					$appendSuccess = true;
				}
				$isExist = true;
			}
		}
		if($isExist === false)
		{
			if( $realStock >= $qty )
			{
				$new_item = array();
				$new_item['id']   		= count($cart);
				$new_item['mainKey']  	= $mainKey;
				$new_item['PID']  		= $PID;
				$new_item['formatType'] = $formatType;
				$new_item['qty']  		= $qty;
				$new_item['status']  	= $dataProduct[0]["status"] ;   //for 特殊產品 3: 加價購
				//coupon etc.
				array_push($cart, $new_item);
				$appendSuccess = true;
			}
		}
		$this->CI->session->set_userdata('cart',json_encode($cart));
		return $appendSuccess;
	}

	function update($PID,$qty,$formatType = "F")
	{
		$updateSuccess = false;
		$product   = $this->CI->Product->findAllKey(array("id"=>$PID));
		$dataStock = $this->CI->Product->findStock($product[0]["detailKey"]);

		$realStock 		= $this->findRealStock($dataStock, $formatType);

		if( $qty != 0 )
		{
			$cart = json_decode($this->CI->session->userdata('cart'),true);
			foreach($cart AS $ind => &$item)
			{
				if( $item['PID'] == $PID  && $item["formatType"] == $formatType )
				{
					if ( $product[0]["status"] == "3" ) {  //加價購不能修改數量(1)
						$appendSuccess = true;
					}
					else if( $realStock >= $qty )
					{
						$item['qty'] = $qty;
						$updateSuccess = true;
					}
				}
			}
			$this->CI->session->set_userdata('cart',json_encode($cart));
		}
		else
		{
			$this->delete($PID, $formatType);
		}
		return $realStock;
	}

	function delete($PID,$formatType = "F")
	{
		$cart = json_decode($this->CI->session->userdata('cart'),true);
		$new_cart = array();
		$isExist = false;
		$normalProdCnt = 0 ;
		$specialProdCnt = 0 ;
		foreach($cart AS $item)
		{
			if(!( $item['PID'] == $PID && $item["formatType"] == $formatType ))
			{
				array_push($new_cart, $item);

				if( $item['status'] != "3" ){
					$normalProdCnt++ ;
				}
				else{
					$specialProdCnt++;
				}
			}
			else
			{
				$isExist = true;
			}
		}
		if( $isExist )
		{
			$this->CI->session->set_userdata('cart',json_encode($new_cart));
		}
		// 加價購商品 不能單獨存在
		if( $normalProdCnt == 0 && $specialProdCnt > 0 ) {
			$this->clear();
		}
	}

	function clear()
	{
		$this->CI->session->unset_userdata('cart');
		$cart = array();
		$this->CI->session->set_userdata('cart',json_encode($cart));
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