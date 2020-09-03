<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagemeta extends Admin_Controller {
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "system error!"
	);
	
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();				
	}
	
	public function save()	
	{
		if(
			isset($_POST['id']) &&
			isset($_POST['key']) &&
			isset($_POST['value']) &&
			isset($_POST['langCode']) 
		)
		{
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			
			$save_data = array();
			$save_data['id'] 				= $_POST['id'];
			$save_data['key'] 				= $_POST['key'];
			$save_data['value'] 			= json_encode($_POST['value']);
			$save_data['langCode'] 			= $_POST['langCode'];
			
			$this->load->model("Pagemeta_model","mPageMeta");
			$resp = $this->mPageMeta->save($save_data);
			
			$response 				  = array();
			$response['code'] 		  = $resp;
			$response['message'] 	  = $resp == "-1"?"儲存失敗":"儲存成功";
			$response['POST'] 		  = $_POST;
			$this->jsonRS['response'] = $response;
					
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */