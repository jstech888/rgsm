<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articleadmin extends Admin_Controller {

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
			"langCode"	   => "en",
			"author"	   => "",
			"raw-date"     => date("Y-m-d H:i:s"),
			"raw-extra"	   => '{"src":"/uploads/sample-icon.png","alt":"sample"}',
			"blog-extra"   => array( "src" => "/uploads/sample-icon.png", "alt" => "" ),
			"blog-summary" => ""
		);
		
		$this->data["isNew"]   = true;
		$this->data["article"] = $sample;
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
			$arr_article = $this->Article_model->admin_find($_GET['id']);
			$this->data["article"] = $arr_article[0];			
			$this->data["isNew"]   = false;
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
		if(
			isset($_POST['id']) 			&&
			isset($_POST['blog-title']) 	&&
			isset($_POST['author']) 		&&
			isset($_POST['raw-date']) 		&&
			isset($_POST['raw-extra']) 		&&
			isset($_POST['blog-content'])
		)
		{
			
			$this->data["css_include"] 	= "article";
			$this->data['post'] 		= array(
				"id" => $_POST['id'],
				"blog-title"   	=> $_POST['blog-title'],
				"markDate"     	=> $_POST['raw-date'],
				"author"     	=> $_POST['author'],
				"value"   	   	=> $_POST['raw-extra'],
				"blog-content" 	=> $_POST['blog-content'],
				/*"contentKey"    => uniqid(),*/
				"langCode" 		=> $_POST['langCode']
			);
			
			$this->load->model("Article_model");				
			$this->data["result"] = $this->Article_model->save($this->data['post'] );
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $this->data["result"];
			$this->jsonRS['post']		= $this->data['post'];
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
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
	
	public function listTable()
	{
		$this->data["css_include"] 	= "article";
		$this->data['widget'] 		= array();
		
		
		//$lang 		= ( isset($_GET['lang']) && in_array($_GET['lang'],$lang_code) )?$_GET['lang']:"en";
		$this->load->model("Article_model");	
		$arr_article = $this->Article_model->findAll($this->currentLang);
		
		$this->data["lang"] = $this->currentLang;
		$this->data['articles'] = $arr_article;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/index',$this->data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */