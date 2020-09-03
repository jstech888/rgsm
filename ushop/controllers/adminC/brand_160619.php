<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Brand extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function index($query)
	{
		/* <!-- Current Active MainMenu  --> */
		$this->setActiveTag();
		$this->load->model("Article_model");	
		$arr_article = $this->Article_model->query($query);
		$this->data['article'] = $arr_article[0];
		$this->load->view('inc/head',$this->data);
		$this->load->view('article/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function create(){
		
		$this->data["css_include"] 	= "article";
		
		$sample = array(
			"blog-content" => "",
			"blog-title"   => "",
			"id"		   => "-1",
			"status"	   => "video",
			"langCode"	   => "en",
			"author"	   => "",
			"tag" 		   => "",
			"class"		   => "",
			"raw-date"     => date("Y-m-d H:i:s"),
			"raw-extra"	   => '{"url":"/uploads/sample-icon.png","alt":"sample"}',
			"blog-extra"   => array( "url" => "/uploads/sample-icon.png", "alt" => "" ),
			"blog-summary" => ""
		);
		
		$this->data["isNew"]   	= true;
		$this->data["article"] 	= $sample;
		$this->data["self"] 	= false;
		
		$this->data["save_url"] = "/admin/brand/save";		
		$this->data["back_url"] = "/admin/brand/listPage";
		
		$this->data["isBrand"] = true;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/edit/article',$this->data);
	}
	
	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("Article_model");	
			
			$arr_article = $this->Article_model->admin_find( "brand", $_GET['id'] );
			$this->data["article"] = $arr_article[0];			
			$this->data["isNew"]   = false;
			
			$this->data["refer_uri"] = "/admin/brand/listPage";	
			$this->data["save_url"]  = "/admin/brand/save";		
			$this->data["back_url"]  = "/admin/brand/listPage";
			$this->data["self"] 	 = false;
			$this->data["isBrand"] = true;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/article/edit/article',$this->data);
		}
		else 
		{
			redirect("/admin/article/listTable","location","301");
		}
	}
	
	public function save()
	{
		$this->jsonRS['post'] = $_POST;
		if(
			isset($_POST['id']) 			&&
			isset($_POST['blog-title']) 	&&
			isset($_POST['status']) 		&&
			isset($_POST['author']) 		&&
			isset($_POST['raw-date']) 		&&
			isset($_POST['raw-extra']) 		&&
			isset($_POST['blog-content'])
		)
		{
			
			$saveData = array(
				"id" 			=> $_POST['id'],
				"blog-title"   	=> $_POST['blog-title'],
				"markDate"     	=> $_POST['raw-date'],
				"status"     	=> $_POST['status'],
				"author"     	=> $_POST['author'],
				"value"   	   	=> $_POST['raw-extra'],
				"blog-content" 	=> $_POST['blog-content'],
				"langCode" 		=> $_POST['langCode']
			);
			
			$this->load->model("Article_model");				
			$this->data["result"] = $this->Article_model->save($saveData);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	
	public function delete()
	{
		if( isset($_POST['id']) )
		{
			$this->load->model("Article_model");
			$resp = $this->Article_model->delete($_POST['id']);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}
	
	public function listPage()
	{
		$this->data["css_include"] 	= "article";
		$this->data['widget'] 		= array();
		
		$this->load->model("Article_model");	
		$arr_article = $this->Article_model->findAll("brand",$this->currentLang);
		
		$this->data["lang"] 		= $this->currentLang;
		$this->data['articles'] 	= $arr_article;
		$this->data["edit_url"] 	= "/admin/brand/edit";
		$this->data["switch_url"] 	= "/admin/brand/listPage";
		$this->data["flag"] 		= "hide";
		$this->data["isBrand"] = true;
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/index',$this->data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */