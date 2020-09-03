<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends Web_Controller {

    public function __construct() 
    {
        parent::__construct(); 
    } 
	
	public function index()
	{
		/* <!-- Current Active MainMenu  --> */
		$this->setActiveTag();

		if( isset($_GET['transId']))
		{			
			$transId = trim($_GET['transId']);
			if( empty($transId) )
			{
				show_404();
				return;
			}
			$this->data["objLang"]["orderlist"] = $this->loadLang("widget/orderlist/");
			$isLogin = (isset($thid->data['self']) && isset($thid->data['self']['name'])) ? true : false;
			
			$this->data["BankRemittancesInfo"] = false;
			
			if(isset($_GET['BankRemittancesInfo']))
			{
				$this->data["BankRemittancesInfo"]= $this->mOption->readVal("BankRemittancesInfo");
			}	
			
			$obj_orderlist_lang = $this->loadLang("widget/orderlist/");
			
			$this->load->model("Order_model");	
			$list_order = $this->Order_model->findOrderDetail($_GET['transId']);

			if( $list_order["userId"] == "-1" )
			{
				if(isset($_GET['phone']))
				{
					$phone = trim($_GET['phone']);
					if( empty($phone) )
					{
						show_404();
						return;
					}
					$list_order = $this->Order_model->findOrderDetail($_GET['transId']);
					if( $list_order["dataUser"]["phone"] != $_GET['phone'] )
					{
						show_404();
						return;
					}
					$list_order["dataUser"]["name"] = "(非會員)" ;
				}
				else
				{
					show_404();
					return;
				}
			}
			else{  //check user 是否為自己的訂單

				if (isset($this->data['self']['id']) ){

					if ( $list_order["userId"] !=  $this->data['self']['id'] ){
						show_404();
						return;
					}

				}
				else{
					show_404();
					return;
				}


			}
			
			if( count($list_order) == 0 )
			{
				show_404();
				return;
			}
			
			$this->data['list_status_selector'] = array(
				"101" 	=> $obj_orderlist_lang['failed'],
				"100" 	=> $obj_orderlist_lang['expired'],
				"0" 	=> $obj_orderlist_lang['pending'],
				"1" 	=> $obj_orderlist_lang['remittanceChecked'],
				"2" 	=> $obj_orderlist_lang['shipping'],
				"3" 	=> $obj_orderlist_lang['arrival'],
				"4" 	=> $obj_orderlist_lang['waitOfflinePay']
			);
			
			$this->load->model("Product_model");	
			
			foreach( $list_order['detail'] AS $k=>$row )
			{
				$newDataDetail = array();
				$dataDetail = $this->Product_model->findDetail($row['productMainKey']);
				foreach($dataDetail AS $detail)
				{
					$newDataDetail[$detail["langCode"]] = $detail;
				}
				$list_order['detail'][$k]["dataDetail"] = $newDataDetail;
			}

			// 銀行匯款
			if ($list_order['cashFlow'] == "BankRemittances") {
				$this->data["BankRemittancesInfo"] = true ;
				$this->data["BankRemittancesInfo"] = $this->mOption->readVal("BankRemittancesInfo");

			}
			else if (  $list_order['cashFlow'] == "Allpay"){
				$PaymentType = isset($list_order['cashData']["callback"]["PaymentType"])? $list_order['cashData']["callback"]["PaymentType"]:"" ;
				(strpos($PaymentType,"WebATM") === 0) ? $PaymentType = "WebATM" :"" ;
				(strpos($PaymentType,"ATM") === 0) ? $PaymentType = "ATM" :"" ;
				if ( $PaymentType != "" ){
					$list_order['cashData']["callback"]["PaymentTypeName"] = isset($obj_orderlist_lang[$PaymentType])? $obj_orderlist_lang[$PaymentType] :"" ;
				}
			}

			$this->data['list_order'] = $list_order;
			$this->load->view('inc/head',$this->data);
			if($_GET['status']=="info2")
				$this->load->view('message/orderinfo2',$this->data);
			else
				$this->load->view('message/orderinfo',$this->data);
			$this->load->view('inc/footer',$this->data);
			
		}
		else		
		{		
			if(
				isset($_GET['status'])		&&
				isset($_GET['title'])		&&
				isset($_GET['content'])		&&
				isset($_GET['auto'])		
			)
			{
				
				$this->data['err_status']	= $_GET['status'];
				$this->data['err_title']  	= $_GET['title'];
				$this->data['err_content']	= $_GET['content'];
				$this->data['err_auto']		= $_GET['auto'];
				$this->data['redirectURL']	= isset($_GET['redirectURL'])? $_GET['redirectURL']:"";
				$this->load->view('inc/head',$this->data);
				$this->load->view('message/alert',$this->data);
				$this->load->view('inc/footer',$this->data);	
			}
			else
			{
				//redirect("/","location","301");
			}
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */