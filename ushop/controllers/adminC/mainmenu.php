<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mainmenu extends Admin_Controller {	
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "system error!"
	);
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	
	public function edit()
	{
		if(isset($_GET['id']))
		{
			$this->data["css_include"] 	= "widget";
			$this->data["title"] 		= "主選單";
			$this->load->model("Menu_model","Menu");	
			$rawData = $this->Menu->findById( $_GET['id'] );
			if( count($rawData) ==  0 )
			{		
				$this->data["widget"] = $this->Menu->sample();
			}
			else
			{					
				$this->data["widget"] = $rawData[0];
			}
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/mainmenu/edit',$this->data);
			return;
		}
		else
		{
			redirect("/admin/mainmenu/listTable","location",301);	
		}
	}
	
	public function listTable()
	{
		
		$this->data["css_include"] 	= "widget";
		$this->data["langCode"]		= $this->currentLang;
		
		$this->load->model("Menu_model","Menu");	
		$rawData = $this->Menu->Load("all");
		$newData 	= array();
		$systemData = array();
		foreach( $rawData AS $row )
		{
			(!isset($newData[$row["langCode"]]))?$newData[$row["langCode"]]=array():'';
			$newData[$row["langCode"]][] 		= $row;
		}
		$this->data["mainmenu"] 	= $newData;
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/mainmenu/index',$this->data);
	}
	
	
	public function save($query="")
	{
		$this->jsonRS['POST'] = $_POST;
		
		if( isset($_POST['mainmenuData']) )
		{
			$this->load->model("Menu_model","Menu");
			
			$obj = $_POST['mainmenuData'];
			$resp = $this->Menu->save($obj);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp']		= $resp;
		}
			
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function delete($query="")
	{
		$this->jsonRS['POST'] = $_POST;
		
		if( isset($_POST['id']) )
		{
			$this->load->model("Menu_model","Menu");
			$resp = $this->Menu->delete($_POST['id']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
		}	
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	public function sortkey($query="")
	{
		$this->jsonRS['POST'] = $_POST;
		if( isset($_POST['itemData']) )
		{
			$this->load->model("Menu_model","menu");
			$resp = $this->menu->sortkey($_POST['itemData']);
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			$this->jsonRS['result']		= $this->find("MainMenu",true);
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */