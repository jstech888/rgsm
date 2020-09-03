<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Currencies extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function index()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->load->model("Currencies_model","mCurrency");	
		$this->data["listCurrency"] = $this->mCurrency->findAll();			
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/currencies/index',$this->data);			
	}
	
	
	public function swapActive()
	{
		if( isset($_POST["currencyData"]) )
		{
			$this->load->model("Currencies_model","mCurrency");	
			$resp = $this->mCurrency->swap($_POST["currencyData"]);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			$this->jsonRS['post'] 		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	
}