<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coupon extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function index()
	{
		ini_set("display_errors","On");
		$this->load->model("Coupon_model","mCoupon");
		//後台
		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();
		
		$this->data["listTitle"] = $this->mCoupon->listTitle();
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/Coupon/index',$this->data);
	}
	
	public function create()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(
			isset($_POST["title"]) &&
			isset($_POST["qty"]) &&
			isset($_POST["amount"]) &&
			isset($_POST["expired"]) 
		)
		{
			$this->load->model("Coupon_model","mCoupon");				
			
			$key = $this->generator();
			$value = array(
				"qty" => $_POST["qty"],
				"amount" => $_POST["amount"]
			);
			$saveData = array( "title" => $_POST["title"], "key" => $key, "value" => $value, "expiredTime" => $_POST["expired"]. " 23:59:59" );
			$result = $this->mCoupon->create($saveData);
			
			if( $result === false )
			{
				$this->jsonRS['code'] 		= '-1';
				$this->jsonRS['message'] 	= '名稱重複';
				$this->jsonRS['result'] 	= $result;	
			}
			else
			{
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;				
			}
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function save()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["postData"]))
		{
			$this->load->model("Option_model");			
			foreach( $_POST["postData"] AS &$item )
			{
				$item["value"] = json_encode($item["value"]);
				$result[] = $this->Option_model->save($item);
			}			
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['result'] 	= $result;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function delete()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["couponId"]))
		{
			$this->load->model("Coupon_model","mCoupon");
			$result = $this->mCoupon->delete($_POST["couponId"]);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['result'] 	= $result;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function changeCouponExpired()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(
			isset($_POST["id"]) &&
			isset($_POST["expiredTime"])
		)
		{
			$this->load->model("Coupon_model","mCoupon");
			$saveData = array( "id" => $_POST["id"], "expiredTime" => $_POST["expiredTime"]. " 23:59:59" );
			$result = $this->mCoupon->save($saveData);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['result'] 	= $result;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function download($couponId = false)
	{
		if( $couponId === false )
		{
			return;
		}
		
		$content = "沒有優惠券\r\n";
		
		$this->load->model("Coupon_model","mCoupon");
		$list_coupon = $this->mCoupon->listCouponByCouponId($couponId);
		
		if( count($list_coupon) > 0 ) 
		{
			$content = "流水號,優惠券代碼,使用否,標題,數量,金額,到期日\r\n";//implode(",", array_keys($list_coupon[0]) ) . "\r\n";
			
			foreach( $list_coupon AS $k => $order )
			{
				$content.= ($k+1).','.implode(",", $list_coupon[$k] ) . "\r\n";
			}
			
		}
		$filename = "coupon-".$list_coupon[0]["title"]."-".date("Ymd").".csv";
		header("Content-type: text/x-csv");
		header("Content-Disposition: attachment;filename=".$filename);
		header("Expires: 0");
		header("Pragma: public");
		echo mb_convert_encoding($content , "Big5" , "UTF-8");
	}
	
	private function generator()
	{
		/*
		$passes = array();
		$chars = "abcdefghkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$amount = 100;
		$length = 6;   
		for($j=0; $j<$amount; $j++)
		{
			 $i = 0; $pass = '' ;
			 while ($i <= $length)
			 { $num = rand() % 33; $tmp = substr($chars, $num, 1);
				$pass = $pass . $tmp; $i++;
			 }
			 $passes[] = $pass;
		}

		foreach($passes as &$password)
		{
			$password = strtoupper(substr(md5($password),0,15));
		} 
		return implode("",$passes);
		*/
		return uniqid(time());
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */