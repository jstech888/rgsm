<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->data['article_type'] = "blog";	
		$this->forceLogin();	
	}
	
	public function blogClass($method = "index")
	{
		if( $method == "index" )
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("Article_class_model");
			$arr_class = $this->Article_class_model->loadAll();
			$this->data['arr_class'] = $arr_class;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/article/edit/blogClass',$this->data);			
		}
		else if( $method == "edit" )
		{
			if( isset($_GET["key"]) )
			{
				$this->data["key"] = $_GET["key"];
				
				$this->data["css_include"] 	= "article";
				$this->data['widget'] 		= array();
				
				$this->load->model("Article_class_model");
				$aClass = $this->Article_class_model->find( $_GET["key"] );
				$this->data['aClass'] = $aClass;
				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/article/edit/blogClassEdit',$this->data);
			}
			else
			{
				redirect("/","location",301);
			}
		}
		else if( $method == "slider" )
		{
			///admin/blog/blogClass/slider?key=test&sid=0&sl=zh-hant
			if( isset($_GET["key"]) && isset($_GET["sid"]) && isset($_GET["sl"]) )
			{
				$this->data["key"] 	= $_GET["key"];
				$this->data["sid"] 	= $_GET["sid"]; //inds
				$this->data["sl"] 	= $_GET["sl"];  //lang
				
				$this->data["css_include"] 	= "article";
				$this->data['widget'] 		= array();
				
				$this->load->model("Article_class_model");
				$aClass = $this->Article_class_model->find( $_GET["key"] );
				$this->data['aClass'] = $aClass;
				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/article/edit/blogClassSlider',$this->data);
			}
			else
			{
				redirect("/","location",301);
			}
		}
		else if( $method == "save" )
		{
			$this->jsonRS["POST"] = $_POST;
			$Basic 		= array("id","key","value","icon","banner");
			$mutiLang  	= array("value","icon","banner");
			
			$postData = array();
			$break = false;
			foreach( $Basic AS $req )
			{
				if( array_key_exists($req, $_POST) )
				{
					$v = $_POST[$req];
					if( in_array($req, $mutiLang) )
					{
						$v = $this->convertToMutiLangObj($v, $v[$this->DEFAULTLANG]);						
					}
					$postData[$req] = $v;
				}
				else					
				{
					$break = true;
					break;
				}		
			}
			//( $break === true )?redirect("/","location",301):"";
						
			$this->load->model("Article_class_model");
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $this->Article_class_model->save($postData);
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else if( $method == "delete" )
		{
			$this->jsonRS["POST"] = $_POST;
			if( isset( $_POST["id"] ) )
			{
				$this->load->model("Article_class_model");	
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['resp'] 		= $this->Article_class_model->delete($_POST["id"]);
			}
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else
		{
			redirect("/","location",301);
		}
	}
	
	public function changeFlag()
	{
		$this->jsonRS["POST"] = $_POST;
		if( isset($_POST["id"]) && isset($_POST["flag"]) )
		{
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			
			$this->load->model("Article_model");	
			$this->jsonRS['resp'] 		= $this->Article_model->save( array(
				"id" => $_POST["id"],
				"flag" => $_POST["flag"]
			) );
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function approve()
	{
		$this->data["css_include"] 	= "article";
		$this->data['widget'] 		= array();
		
		$this->load->model("Article_model");	
		$arr_article = $this->Article_model->findAll("blog",$this->currentLang,true);
		
		$this->data["lang"] 		= $this->currentLang;
		$this->data['articles'] 	= $arr_article;
		$this->data["edit_url"] 	= "/admin/blog/editfull";
		$this->data["switch_url"] 	= "/admin/blog/approve";
		$this->data["flag"] 		= "switch";
		
			
		$this->load->model("Article_class_model");
		$arr_class = $this->Article_class_model->loadAll();
		$new_class = array();
		foreach($arr_class AS $rec )
		{
			$new_class[$rec["id"]] = $rec;
		}
		$this->data['arr_class'] = $new_class;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/index',$this->data);
	}
	
	public function info($method = "index")
	{
		if( $method == "index" )
		{
			$this->data["css_include"] 	= "product";
			$this->load->model("Blog_model");	
			$selfBlog = $this->Blog_model->find($this->admin["id"]);
			if( empty( $selfBlog["value"] ) )
			{
				$selfBlog["value"] = array();
				$selfBlog["value"][$this->DEFAULTLANG] = array(
					"title"	 	  => "",
					"mail"	 	  => "",
					"description" => "",
					"banner" 	  => array(
						"url" => "/uploads/sample-icon.png"
					),
					"langCode"	  => $this->DEFAULTLANG
				);
				
			}
			$selfBlog["value"] 		= $this->convertToMutiLangObj($selfBlog["value"], $selfBlog["value"][$this->DEFAULTLANG]);
			$selfBlog["user_id"] 	= $this->admin["id"];
			
			$this->data["selfBlog"] = $selfBlog;
			
			$this->load->model("Article_class_model");
			$arr_class = $this->Article_class_model->loadAll();
			$new_class = array();
			foreach($arr_class AS &$rec )
			{
				//$rec["value"] = array();
				$new_class[$rec["id"]] = $rec;
			}
			$this->data['arr_class'] = $new_class;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/blog/info',$this->data);
		}
		else if( $method == "save" )
		{
			$this->jsonRS['post'] = $_POST;
			if(
				isset($_POST['id']) 			&&
				isset($_POST['user_id']) 		&&
				isset($_POST['value']) 			&&
				isset($_POST['status']) 		&&
				isset($_POST['class']) 			
			)
			{
				ini_set("display_errors","On");
				$this->load->model("Blog_model");		
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';		
				$this->jsonRS["result"] = $this->Blog_model->save(array(
					"id" 			=> $_POST['id'],
					"user_id"   	=> $_POST['user_id'],
					"class"     	=> $_POST['class'],
					"status"     	=> $_POST['status'],
					"value"     	=> $_POST['value']
				));
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else
		{
			redirect("/admin/dashboard","location","301");
		}
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
	}
	
	public function create(){
		
		$this->data["css_include"] 	= "article";
		
		$sample = array(
			"blog-content" => "",
			"blog-title"   => "",
			"id"		   => "-1",
			"class"		   => 0,
			"status"	   => "blog",
			"tag"	   	   => "",
			"langCode"	   => $this->DEFAULTLANG,
			"author"	   => "",
			"raw-date"     => date("Y-m-d H:i:s"),
			"raw-extra"	   => '{"url":"/uploads/sample-icon.png","alt":"sample"}',
			"blog-extra"   => array( "url" => "/uploads/sample-icon.png", "alt" => "" ),
			"blog-summary" => ""
		);
		
		$this->data["isNew"]   = true;
		$this->data["article"] = $sample;
		
		$this->data["save_url"] = "/admin/blog/save";		
		$this->data["back_url"] = "/admin/blog/listPage";
		
		$this->data["self"] = true;
		
		$this->load->model("Article_class_model");
		$arr_class = $this->Article_class_model->loadAll();
		$this->data['arr_class'] = $arr_class;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/edit/article',$this->data);
	}
	
	public function editfull()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("Article_model");	
			
			$arr_article = $this->Article_model->admin_find( "blog", $_GET['id'] );
			$this->data["article"] = $arr_article[0];			
			$this->data["isNew"]   = false;
			
			$this->data["refer_uri"] = "/admin/blog/approve";	
			$this->data["save_url"]  = "/admin/blog/save";		
			$this->data["back_url"]  = "/admin/blog/approve";
			
			$this->data["self"] = true;
			
			$this->load->model("Article_class_model");
			$arr_class = $this->Article_class_model->loadAll();
			$this->data['arr_class'] = $arr_class;
				
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/article/edit/article',$this->data);
		}
		else 
		{
			redirect("/admin/article/listTable","location","301");
		}
	}
	
	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("Article_model");	
			
			$arr_article = $this->Article_model->admin_find( "blog", $_GET['id'] );
			$this->data["article"] = $arr_article[0];			
			$this->data["isNew"]   = false;
			
			$this->data["refer_uri"] = "/admin/blog/listPage";	
			$this->data["save_url"]  = "/admin/blog/save";		
			$this->data["back_url"]  = "/admin/blog/listPage";
			
			$this->data["self"] = true;
			
			$this->load->model("Article_class_model");
			$arr_class = $this->Article_class_model->loadAll();
			$this->data['arr_class'] = $arr_class;
			
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
			isset($_POST['class']) 			&&
			isset($_POST['blog-title']) 	&&
			isset($_POST['tag']) 			&&
			isset($_POST['status']) 		&&
			isset($_POST['raw-date']) 		&&
			isset($_POST['raw-extra']) 		&&
			isset($_POST['langCode']) 		&&
			isset($_POST['blog-content'])
		)
		{
			
			$saveData = array(
				"id" 			=> $_POST['id'],
				"blog-title"   	=> $_POST['blog-title'],
				"markDate"     	=> $_POST['raw-date'],
				"class"     	=> $_POST['class'],
				"status"     	=> $_POST['status'],
				"tag"     		=> $_POST['tag'],
				"author"     	=> isset($_POST['author'])?$_POST['author']:$this->admin["id"],
				"flag"     		=> isset($_POST['author'])?"1":"0",
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

		$arr_article = $this->Article_model->findAll("blog",$this->currentLang, $this->admin["id"], $this->admin["id"]);
		
		$this->data["lang"] 		= $this->currentLang;
		$this->data['articles'] 	= $arr_article;
		$this->data["edit_url"] 	= "/admin/blog/edit";
		$this->data["switch_url"] 	= "/admin/blog/listPage";
		$this->data["flag"] 		= "label";
		
		$this->load->model("Article_class_model");
		$arr_class = $this->Article_class_model->loadAll();
		$new_class = array();
		foreach($arr_class AS $rec )
		{
			$new_class[$rec["id"]] = $rec;
		}
		$this->data['arr_class'] = $new_class;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/article/index',$this->data);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */