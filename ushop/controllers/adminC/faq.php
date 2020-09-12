<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faq extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();

        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];
	}

	public function newsClass($method = "index")
	{
		if( $method == "index" )
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("Faq_class_model");
			$arr_class = $this->Faq_class_model->loadAll();
			$this->data['arr_class'] = $arr_class;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/faq/edit/blogClass',$this->data);
		}
		else if( $method == "edit" )
		{
			if( isset($_GET["key"]) )
			{
				$this->data["key"] = $_GET["key"];
				
				$this->data["css_include"] 	= "article";
				$this->data['widget'] 		= array();
				
				$this->load->model("Faq_class_model");
				$aClass = $this->Faq_class_model->find( $_GET["key"] );
				$this->data['aClass'] = $aClass;
				$this->data["back_url"] = "/admin/faq/newsClass";
				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/faq/edit/blogClassEdit',$this->data);
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
				
				$this->load->model("News_class_model");
				$aClass = $this->News_class_model->find( $_GET["key"] );
				$this->data['aClass'] = $aClass;
				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/faq/edit/blogClassSlider',$this->data);
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
						
			$this->load->model("Faq_class_model");
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $this->Faq_class_model->save($postData);
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else if( $method == "delete" )
		{
			$this->jsonRS["POST"] = $_POST;
			if( isset( $_POST["id"] ) )
			{
				$this->load->model("News_class_model");	
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['resp'] 		= $this->News_class_model->delete($_POST["id"]);
			}
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else
		{
			redirect("/","location",301);
		}
	}
	
	
	public function index($query)
	{
		/* <!-- Current Active MainMenu  --> */
		$this->setActiveTag();
		$this->load->model("News_model");
		// $this->load->model("Article_model");
		$arr_article = $this->News_model->query($query);
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
			"status"	   => "faq",
			"tag"	   	   => "",
			"langCode"	   => $this->DEFAULTLANG,
			"author"	   => "",
			"flag"	   		=> "1",
			"raw-date"     => date("Y-m-d H:i:s"),
			"raw-extra"	   => '{"url":"/uploads/sample-icon.png","alt":"sample"}',
			"blog-extra"   => array( "url" => "/uploads/sample-icon.png", "alt" => "" ),
			"blog-summary" => ""
		);
		
		$this->data["isNew"]   = true;
		$this->data["isBrand"]   = true;
		$this->data["article"] = $sample;
		
		$this->data["save_url"] = "/admin/faq/save";
		$this->data["back_url"] = "/admin/faq/listPage";
		
		$this->data["self"] = true;
		
		$this->load->model("Faq_class_model");
		$arr_class = $this->Faq_class_model->loadAll();
		$this->data['arr_class'] = $arr_class;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/faq/edit/article',$this->data);
	}

	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "article";
			$this->data['widget'] 		= array();
			
			$this->load->model("News_model");	
			
			$arr_article = $this->News_model->admin_find("news", $_GET['id'] );
			$this->data["article"] = $arr_article[0];			
			$this->data["isNew"]   = false;
			
			$this->data["refer_uri"] = "/admin/faq/listPage";
			$this->data["save_url"]  = "/admin/faq/save";
			$this->data["back_url"]  = "/admin/faq/listPage";
			
			$this->data["self"] = true;
			
			$this->load->model("Faq_class_model");
			$arr_class = $this->Faq_class_model->loadAll();
			$this->data['arr_class'] = $arr_class;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/faq/edit/article',$this->data);
		}
		else 
		{
			redirect("/admin/article/listTable","location","301"); /* ??? */
		}
	}
	
	public function save()
	{
		$this->jsonRS['post'] = $_POST;

		if(
			isset($_POST['id']) 			&&
			isset($_POST['class']) 			&&
			isset($_POST['blog-title']) 	&&
//			isset($_POST['tag']) 			&&
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
				"flag"     		=> $_POST['flag'],
				"value"   	   	=> $_POST['raw-extra'],
				"blog-content" 	=> $_POST['blog-content'],
				"langCode" 		=> $_POST['langCode']
			);

			$this->load->model("faq_model");
			$this->data["result"] = $this->faq_model->save($saveData);
			
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
			$this->load->model("Faq_model");
			$resp = $this->Faq_model->delete($_POST['id']);
			
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

		$this->load->model("Faq_model");
		$arr_article = $this->Faq_model->findAll("faq", $this->currentLang, $this->admin["id"]);
		
		$this->data["lang"] 		= $this->currentLang;
		$this->data['articles'] 	= $arr_article;
		$this->data["edit_url"] 	= "/admin/faq/edit";
		$this->data["switch_url"] 	= "/admin/faq/listPage";
		$this->data["flag"] 		= "label";
		
		$this->load->model("Faq_class_model");
		$arr_class = $this->Faq_class_model->loadAll();
		$new_class = array();
		foreach($arr_class AS $rec )
		{
			$new_class[$rec["id"]] = $rec;
		}
		$this->data['arr_class'] = $new_class;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/faq/index',$this->data);
	}
	
	
}
/* End of file news.php */
/* Location: ./application/controllers/welcome.php */