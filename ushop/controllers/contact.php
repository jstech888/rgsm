<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends Web_Controller {

	
	/*public function index()
	{
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('contact/index',$this->data);
		$this->load->view('inc/footer',$this->data);		
	}*/

	public function contactUs()
	{
		if(
			isset($_POST["name"]) &&
			isset($_POST["email"]) &&
//			isset($_POST["mobile"]) &&
//			isset($_POST["subject"]) &&
			isset($_POST["message"]) 
		){

			$contentStr = "姓名: ".$_POST["name"]."<br><br>" ;
			$contentStr .= "電子信箱: ".$_POST["email"]."<br><br>" ;
//			$contentStr .= "聯絡手機: ".$_POST["mobile"]."<br><br>" ;
//			$contentStr .= ( isset($_POST["phone"]) && $_POST["phone"] != "" ) ?  "聯絡電話: ".$_POST["phone"]."<br><br>" :"" ;
//			$contentStr .= ( isset($_POST["address"]) && $_POST["address"] != "" ) ?  "住址: ".$_POST["address"]."<br><br>" :"" ;
//			$contentStr .= "訂單編號: ".$_POST["subject"]."<br><br>" ;
			$contentStr .= "訊息內容: ".$_POST["message"]."<br><br>" ;

			//準備通知信箱
			$this->load->helper('email_helper');

			$this->load->model("Option_model","mOption");	
			$AdminMail 			= $this->mOption->readVal("AdminMail");	
			$AdminMailStr = str_replace( ";" , "," , $AdminMail["mail"]);

			//通知客戶信箱 訂單已確立
			sendMailBySystemMail( $AdminMailStr , $AdminMail["account"] , "[".$_SERVER["HTTP_HOST"]."] 聯絡客服 ", $contentStr ) ;


			header('Content-Type: application/json; charset=utf-8');
			echo json_encode( true );
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */