<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seo extends Admin_Controller {

	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "操作失敗"
	);
	
	function __construct()
	{
		parent::__construct();	
		//驗證登入
		$this->forceLogin();	
	}
	
	public function listPage()
	{
		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();
		
		$this->load->model("Pagemeta_model","mPageMeta");
		$this->data["listPageMeta"] = $this->mPageMeta->listAll();
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/pagemeta/index',$this->data);
	}
	
	public function create()
	{
		
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["URI"]))
		{			
			$this->load->model("Pagemeta_model","mPageMeta");
			
			$this->jsonRS['code'] 		= '-2';
			$this->jsonRS['message'] 	= 'URI值重複！';
			
			if( $this->mPageMeta->checkPageKeyExist($_POST["URI"]) === false )
			{								
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				
				$save_data = array();
				$save_data['id'] 			= "-1";
				$save_data['key'] 			= $_POST["URI"];
				$save_data['value']			= "";				
				$arrSaveData = $this->cloneWithLang($save_data);
				
				foreach($arrSaveData AS $k => &$save)
				{
					$this->jsonRS['response'][$k] = $this->mPageMeta->save($save);		
				}
			}
			
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}		
		
	public function delete()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["URI"]))
		{			
			$response = array();
			$this->load->model("Pagemeta_model","mPageMeta");
			
			$response = $this->mPageMeta->delete($_POST["URI"]);	
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['response']	= $response;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function edit()
	{
		$this->data["css_include"] = "infopage";
		$this->data["title"] = "頁面編輯";
		
		$this->load->model("Pagemeta_model","mPageMeta");
		$this->data['meta'] = $this->mPageMeta->find(urldecode($_GET['uri']),false);
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/pagemeta/edit',$this->data);
	}
	
	
	public function save()	
	{
		$this->jsonRS['POST'] 		= $_POST;
		
		if( isset($_POST['metadata']) )
		{
			$meta		= $_POST['metadata'];
			
			$response 	= array();
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
				
			if(
				isset($meta['key']) &&
				isset($meta['value']) &&
				isset($meta['langCode'])
			)
			{
				$save_data = array();
				$save_data['id'] 				= $meta['id'];
				$save_data['key'] 				= $meta['key'];
				$save_data['value']				= json_encode($meta['value']);
				$save_data['langCode'] 			= $meta['langCode'];
				
				$response = array();
				$this->load->model("Pagemeta_model","mPageMeta");
				$resp = $this->mPageMeta->save($save_data);
				
				$this->jsonRS['response']['meta'] = $response;
			}
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */