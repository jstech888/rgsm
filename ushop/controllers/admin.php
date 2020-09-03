<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {
	
	private $arr_login 		=  array('username','password','captcha');
	private $arr_register 	=  array('nickname','username','mail','password','retypepassword');
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "操作失敗"
	);		
		
	private $arr_err_info 	= array(
		"default"			=> "isn't empty!",
		"username" 			=> "[username] error!",
		"password" 			=> "[password]error !",
		"captcha" 			=> "[captcha] error !",
		"nickname" 			=> "[nickname] error!",
		"mail" 				=> "[mail] isn't exit!",
		"password" 			=> "[password] isn't empty!",
		"retypepassword" 	=> "[retypepassword] error!"
	);
	
	
	private function getOption($view)
	{
		$data = array( "status" => false, "message" => array(), "old"=>array() );
		
		$arr_target = ($view == "login")?$this->arr_login:$this->arr_register;
		foreach( $arr_target AS $opt )
		{
			if( array_key_exists( $opt, $_POST ) )
			{
				$v = trim($_POST[$opt]);
				$data['old'][$opt] = $v;
				
				if( empty( $v ) )
				{
					$data['status']		= true;
					$data['message'][] 	= "[$opt] ".$this->arr_err_info['default'];
				}
				if( $opt == "password" && $view == "register" )
				{
					if( $v != $_POST['retypepassword'] )
					{
						$data['status']		= true;
						$data['message'][] 	= "[$opt] different with [retypepassword] !";
					}
				}
				if( $opt == "captcha" && $view == "login" )
				{
					if( $v != $_SESSION['SCW'] )
					{
						$data['status']		= true;
						$data['message'][] 	= "[$opt] error !";
					}
				}
			}
		}
		return $data;
	}
	
	function __construct()
	{
		parent::__construct();				
	}
	
	private function index($view)
	{
		$result = $this->getOption($view);
		$this->data['opt'] = $result;
		if( !$result['status'] )
		{
			$username = $result['old']['username'];
			$password = $result['old']['password'];
			$result = $this->adminilib->login($username, $password);
			if($result == 1)
			{
				$this->data['opt']['status'] = "info";
				$this->data['opt']['message'][] = "You have successfully logged in！";
				
				//登出前台
				$this->load->library('auth');
				$this->auth->logout();
			}
			else
			{
				$this->data['opt']['status'] 	= "danger";
				$this->data['opt']['message'][] = "account or password incorrect !";
			}
			return;
		}
	}	
	
	public function login()
	{
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("login");
		}
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/login',$this->data);
	}
	
	
	public function logout()
	{
		if( isset($this->data['admin']) && count($this->data['admin']) > 0 )
		{
			@session_start();
			session_destroy();
			$this->adminilib->logout();
		}
		redirect('/admin/login','location','301');
	}
	
	public function custom($method="index")
	{
		$this->forceLogin();
		if($method == "index")
		{
			$this->data["css_include"] = "product";
		
			$this->load->model("Auth_model","mAuth");		
			$this->data["listGroup"] = $this->mAuth->loadGroup();
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/custom/index',$this->data);
		}
		else
		{
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS["code"]		= "-2";
			
			if( isset($_POST["postData"]) )
			{
				$this->jsonRS["code"]		= "1";
				$this->jsonRS["message"]	= "操作成功";
				
				$resp = array();
				$this->load->model("Auth_model","mAuth");
				if($method == "save")
				{
					$sample = array("id","name");
					foreach( $_POST["postData"] AS $data )
					{
						$saveData = array();
						foreach($data AS $k=>$v)
						{
							if( in_array($k,$sample) )
							{
								$saveData[$k] = $v;
							}
						}
						$resp[] = $this->mAuth->save("group",$saveData);
					}
				}
				if($method == "delete")
				{
					$resp[] = $this->mAuth->delete($_POST["postData"]["id"] );
				}
				$this->jsonRS["resp"] = $resp;
			}			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function authority($method = "index")
	{
		ini_set("display_errors","On");
		$this->forceLogin();	
		if( $method ==  "index" )
		{			
			$this->data["css_include"] = "product";
			$this->load->model("Auth_model","mAuth");
			$listAuth = $this->mAuth->findAuthority($_GET["id"]);
			$new_listAuth = array();
			foreach( $listAuth AS &$v )
			{
				$new_listAuth[$v["menu_id"]] = $v;
			}
			$this->data["listAuth"]  = $new_listAuth;
			$this->data["dataGroup"] = $this->mAuth->findGroup(array( "id"=>$_GET["id"] ));
			$this->data["group_id"]  = $_GET["id"];
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/custom/authority',$this->data);	
		}	
		else
		{
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS["code"]		= "-2";
			
			if( isset($_POST["postData"]) )
			{
				$this->jsonRS["code"]		= "1";
				$this->jsonRS["message"]	= "操作成功";
				
				$resp = array();
				$this->load->model("Auth_model","mAuth");
				if($method == "save")
				{
					$sample = array("menu_id","group_id","read","edit","create","delete");
					foreach( $_POST["postData"] AS $data )
					{
						$saveData = array();
						foreach($data AS $k=>$v)
						{
							if( in_array($k,$sample) )
							{
								$saveData[$k] = $v;
							}
						}
						$resp[] = $this->mAuth->save("authority",$saveData);
					}
				}
				/*
				if($method == "delete")
				{					
					$resp[] = $this->mAuth->delete_Record(array( "id" => $_POST["postData"]["id"] ));
				}
				*/
				$this->jsonRS["resp"] = $resp;
			}			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}		
	}
	
	public function bkmenutype($method=false)
	{
		$this->forceLogin();
		$this->jsonRS['POST'] 		= $_POST;
		$this->jsonRS["code"]		= "-1";
		if( isset($_POST["postData"]) && $method != false )
		{
			
			$this->jsonRS["code"]		= "1";
			$this->jsonRS["message"]	= "操作成功";
			
			$resp = array();
			$this->load->model("Bkmenutype_model","mBKmenutype");	
			if($method == "save")
			{
				foreach( $_POST["postData"] AS $data )
				{
					$resp[] = $this->mBKmenutype->save($data);
				}
			}
			if($method == "delete")
			{
				$resp[] = $this->mBKmenutype->delete_Record(array( "id" => $_POST["postData"]["id"] ));
			}
			$this->jsonRS["resp"] = $resp;
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function bkmenu($method="index")
	{
		$this->forceLogin();
		if($method == "index")
		{
			$this->data["css_include"] = "product";
			$this->load->model("Bkmenu_model","mBKmenu");		
			$this->load->model("Bkmenutype_model","mBKmenutype");		
			
			$this->data["listMenu"] = $this->mBKmenu->load();
			$this->data["listMenuType"] = $this->mBKmenutype->load();
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/bkmenu/index',$this->data);
		}
		else
		{
			$this->jsonRS['POST'] 		= $_POST;
			$this->jsonRS["code"]		= "-2";
			
			if( isset($_POST["postData"]) )
			{
				$this->jsonRS["code"]		= "1";
				$this->jsonRS["message"]	= "操作成功";
				
				$resp = array();
				$this->load->model("Bkmenu_model","mBKmenu");	
				if($method == "save")
				{
					$sample = array("id","name","path","type_id","sortKey");
					foreach( $_POST["postData"] AS $data )
					{
						$saveData = array();
						foreach($data AS $k=>$v)
						{
							if( in_array($k,$sample) )
							{
								$saveData[$k] = $v;
							}
						}
						$resp[] = $this->mBKmenu->save($saveData);
					}
				}
				if($method == "saveSortMenu")
				{
					$this->load->model("Bkmenutype_model","mBKmenutype");	
					$sample = array("id","type_id","sortKey");
					foreach( $_POST["postData"] AS $data )
					{
						$saveData = array();
						foreach($data AS $k=>$v)
						{
							if( in_array($k,$sample) )
							{
								$saveData[$k] = $v;
							}
						}
						if( $data["type"] == "menu" )
						{
							$resp[] = $this->mBKmenu->save($saveData);							
						}
						if( $data["type"] == "type" )
						{
							$resp[] = $this->mBKmenutype->save($saveData);							
						}
					}
					
				}
				if($method == "delete")
				{
					$resp[] = $this->mBKmenu->delete_Record(array( "id" => $_POST["postData"]["id"] ));
				}
				$this->jsonRS["resp"] = $resp;
			}			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
	}
	
	public function queryLog($method="index")
	{
		$this->forceLogin();
		if($method == "index")
		{
			$this->load->model("Option_model");

			$page  = isset($_GET["p"])?$_GET["p"]:1;
			$limit = isset($_GET["l"])?$_GET["l"]:20;
			$start = ( $page - 1 ) * $limit;
	
			$coutBonus = $this->Option_model->queryCntSysLog() ;
			$lastPage = ceil( $coutBonus  / $limit );
	
			$showPrev = ( $page - 1 === 0 ) ? false : true;
			$showNext = ( $page >= $lastPage ) ? false : true;
			$this->data["page"] = $page;
			$this->data["totalPage"] = $lastPage;
			$this->data["showPrev"] = $showPrev;
			$this->data["showNext"] = $showNext;

			$sysLoglist = $this->Option_model->querySysLog( $start , $limit ) ;
			$this->data["sysLoglist"] = $sysLoglist;

			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/option/queryLog',$this->data);
		}
		else
		{
			$this->jsonRS['POST'] 		= "";
			$this->jsonRS["code"]		= "-2";
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */