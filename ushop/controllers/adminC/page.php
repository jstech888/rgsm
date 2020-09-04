<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller {
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "操作失敗"
	);
		
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();

        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];
	}
	
	public function create()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["id"]))
		{			
			$this->load->model("Page_model","mPage");	
			$this->load->model("Pagemeta_model","mPageMeta");
			
			$this->jsonRS['code'] 		= '-2';
			$this->jsonRS['message'] 	= 'KEY值重複！';
			
			if( $this->mPageMeta->checkPageKeyExist($_POST["id"]) === false )
			{
				
				$save_data = array();
				$save_data['id'] 				= "-1";
				$save_data['key'] 				= "/Page/".$_POST["id"];
				$save_data['value']				= "";
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				
				$arrSaveData = $this->cloneWithLang($save_data);
				foreach($arrSaveData AS $k => &$save)
				{
					$this->jsonRS['response']['meta'][$k] = $this->mPageMeta->save($save);		
				}
				
				$save_data = array( "key" => $_POST["id"], "title" => "", "image" => "", "content" => "" );
				$arrSaveData = $this->cloneWithLang($save_data);
				foreach($arrSaveData AS $k => &$save)
				{
					$this->jsonRS['response']['page'][$k] = $this->mPage->save($save);		
				}
			
			}
			
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
		
	public function delete()
	{
		$this->jsonRS['POST'] 		= $_POST;
		if(isset($_POST["id"]))
		{			
			$response = array();
			$this->load->model("Page_model","mPage");	
			$this->load->model("Pagemeta_model","mPageMeta");
			
			$response[] = $this->mPage->delete($_POST["id"]);		
			$response[] = $this->mPageMeta->delete("/Page/".$_POST["id"]);	
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['response']	= $response;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function listPage()
	{
		$this->data["css_include"] = "product";
		$this->data["title"] = "頁面管理";
		
		$this->load->model("Page_model","mPage");
		$this->data['listPage'] = $this->mPage->loadAll();
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/page/index',$this->data);
	}
	
	public function edit()
	{
		
		$this->data["css_include"] = "infopage";
		$this->data["title"] = "頁面編輯";
		
		$this->load->model("Pagemeta_model","mPageMeta");
		$this->load->model("Page_model","mPage");
		
		$infopage = $this->mPage->find($_GET['id']);
		$this->data['infopage'] = $infopage[$this->currentLang];
		$this->data['meta'] 	= $this->mPageMeta->find("/Page/".$_GET['id'],false);
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/page/edit',$this->data);
	}
	
	public function save()	
	{
		$this->jsonRS['POST'] 		= $_POST;
		
		if( isset($_POST['metadata']) &&
			isset($_POST['infopage'])
		)
		{
			$meta		= $_POST['metadata'];
			$page 		= $_POST['infopage'];
			
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
			
			if(
				isset($page['title']) &&
				isset($page['content']) &&
				isset($page['langCode'])
			)
			{
				$save_data = array();
				$save_data['key'] 				= $page['key'];
				$save_data['title'] 			= $page['title'];
				$save_data['image']				= isset($page['image'])?json_encode($page['image']):"";
				$save_data['content']			= $page['content'];
				$save_data['langCode'] 			= $page['langCode'];
				
				$response = array();
				$this->load->model("Page_model","mPage");
				$resp = $this->mPage->save($save_data);
				
				$this->jsonRS['response']['page'] = $response;
			}
			
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */