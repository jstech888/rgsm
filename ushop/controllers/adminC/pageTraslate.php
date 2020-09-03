<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PageTraslate extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function listPage()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
			
		//$this->debugOut($this->listLang);
		$this->data["lang"] 	= $this->DEFAULTLANG;
		$this->data["mapping"] 	= json_decode(file_get_contents(LANGPATH."mapping.json"),true);
		
		$this->load->helper("dir_helper");
		
		$new_listPage = array();
		$listPage	= listdir(LANGPATH . "/widget/");
		$new_listPage = $this->getListTranslate($new_listPage,$listPage);
		$listPage	= listdir(LANGPATH . "/page/");
		$new_listPage = $this->getListTranslate($new_listPage,$listPage);
		
		$this->data["listPage"] = $new_listPage;
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/pageTraslate/index',$this->data);
	}
	
	private function getListTranslate($new_listPage,$listPage)
	{
		foreach($listPage AS $path)
		{
			$key = basename(dirname($path));
			(!array_key_exists($key, $new_listPage))?$new_listPage[$key]=array():"";
			$arr_name = explode(".",basename($path));
			$object = json_decode(file_get_contents($path));
			$new_listPage[$key][$arr_name[0]] 			= array();
			$new_listPage[$key][$arr_name[0]]['path'] 	= $path;
			$new_listPage[$key][$arr_name[0]]['object'] = $object;
		}
		return $new_listPage;
	}
	
	public function language()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->load->model("Language_model","mLang");	
		$this->data["listLang"] = $this->mLang->findAll();			
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/language/index',$this->data);			
	}
	
	public function display()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->load->model("Language_model","mLang");	
		$listLang = $this->mLang->load();
		$listDisplay = $this->mLang->loadDisplay();
		
		foreach( $listLang AS &$lang )
		{	
			foreach( $listLang AS $langB )
			{
				$lang[$langB["tag"]] = ( isset($listDisplay[$lang["tag"]][$langB["tag"]]) ) ? $listDisplay[$lang["tag"]][$langB["tag"]] : "" ;
			}
		}
		$this->data["listLang"] = $listLang;
		$this->data["listDisplay"] = $listDisplay;
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/language/display',$this->data);			
	}
	
	public function saveDisplayLang()
	{
		if( isset($_POST["langData"]) )
		{
			$this->load->model("Language_model","mLang");
			$resp	  = array();
			$langData = $_POST["langData"];
			foreach($langData AS $lang )
			{
				foreach($lang AS $display)
				{
					$resp[] = $this->mLang->saveDisplayName($display);					
				}
			}
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
		}
		$this->jsonRS['post'] 		= $_POST;
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	
	public function swapActLang()
	{
		if( isset($_POST["langData"]) )
		{
			$this->load->model("Language_model","mLang");	
			$resp = $this->mLang->swap($_POST["langData"]);
			
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			$this->jsonRS['post'] 		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function update()
	{
		if(isset($_POST["listPage"]))
		{			
			$command = VIEWPATH . "chmod.sh";
			exec("$command 2>&1", $resp);
			
			foreach( $_POST["listPage"] AS $page )
			{
				foreach( $page AS $ObjLang )
				{
					$saveData = json_encode($ObjLang['object']);
					@file_put_contents($ObjLang['path'],$saveData);
				}
			}
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= "1";
			$this->jsonRS['cmd'] 		= $resp;
			$this->jsonRS['post'] 		= $_POST;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */