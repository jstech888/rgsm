<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Web_Controller {
	
	private $arr_login 		=  array('username','password','captcha','redirectURL');
	private $arr_register 	=  array('redirectURL', 'captcha', 'nickname','username','mail','password','retypepassword','birthday','phone','gender');
	
	private $arr_err_info 	= array(
		"default"			=> "isn't empty!",
		"username" 			=> "[username] error!",
		"password" 			=> "[password]error !",
		"captcha" 			=> "[captcha] error !",
		"nickname" 			=> "[nickname] error!",
		"mail" 				=> "[mail] isn't exit!",
		"password" 			=> "[password] isn't empty!",
		"retypepassword" 	=> "[retypepassword] error!",
		"birthday"			=> "[birthday] couldn't empty!",
		"phone"				=> "[phone] couldn't empty!"
	);
	
	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "操作失敗"
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
				if( $opt == "captcha" && ( $view == "login" || $view == "register" ) )
				{
					if( $v != $_SESSION['SCW'] )
					{
						$data['status']		= true;
						$data['message'][] 	= "[$opt] error !";
					}
				}
			}
		}
// error_log(print_r($data,true),3,"uploads/log_controller_user_getOption_data.log");
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
			if( $view == "register" )
			{

				$this->load->model("Option_model");
				$RegisterMoney = $this->Option_model->readString("RegisterMoney");
				$isMemberCheckEmail = $this->Option_model->readVal("isMemberCheckEmail");
				
				$new_user = array();
				$new_user['name'] 				= "" ;
				$new_user['mail'] 	 			= $result['old']['mail'];
				$new_user['password'] 			= $result['old']['password'];
				$new_user['nickname'] 			= $result['old']['nickname'];
				$new_user['birthday'] 			= $result['old']['birthday'];
				$new_user['phone'] 				= $result['old']['phone'];
				$new_user['gender'] 			= $result['old']['gender'];
				$new_user['region'] 			= isset($_POST["region"])?$_POST["region"]:"" ; 
				$new_user['county'] 			= isset($_POST["county"])?$_POST["county"]:"" ; 
				$new_user['district'] 			= isset($_POST["district"])?$_POST["district"]:"" ; 
				$new_user['zip'] 				= isset($_POST["zipcode"])?$_POST["zipcode"]:"" ; 
				$new_user['address'] 			= isset($_POST["address"])?$_POST["address"]:"" ; 
				//$new_user['host_id']			= $this->webVar["hostId"];
				$new_user['subscript'] 			= isset($_POST["subscript"])?$_POST["subscript"]:"" ;
				$new_user['info'] 				= array(
					"followlist" => ""
				);
				$new_user['point'] 				= $RegisterMoney;   //註冊 禮金

				$redirectURL	= isset($result['old']['redirectURL'])?$result['old']['redirectURL'] :"" ;
				$username = $result['old']['mail'];
				$password = $result['old']['password'];

				$result = $this->auth->createUser($new_user,$isMemberCheckEmail);

				if($result)
				{
					$obj_register_lang = $this->loadLang("page/register/");
					if ($isMemberCheckEmail){    // 啟用認證信機制 之 註冊成功 wording 
						$message = array(
							"status" 	=> "info",
							"title" 	=> $obj_register_lang['register_finish'],
							"content" 	=> $obj_register_lang['register_email_content'],
							"auto" 		=> "30000"
						);

					}
					else{
						/*
						$message = array(
							"status" 	=> "info",
							"title" 	=> $obj_register_lang['register_finish'],
							"content" 	=> $obj_register_lang['register_finish_content'],
							"auto" 		=> "3000"
						);
						*/
						$result = $this->auth->login($username, $password);

						$obj_login_lang = $this->loadLang("page/login/");
						$contentString = ( $redirectURL =="/checkout")? $obj_login_lang['shoppingcart_login_finish_content']:$obj_login_lang['login_finish_content'];
					
						$message = array(
							"status" 		=> "info",
							"title" 		=> $obj_login_lang['login_finish'],
							"content" 		=> $contentString,
							"auto" 			=> "3000",
							"redirectURL"	=> $redirectURL
						);
					}
					
					redirect('/message?'.http_build_query($message),'location','301');
				}
				else
				{
					$this->data['opt']['status'] = true;
					$this->data['opt']['message'][] = "[name] OR [mail] already be used!";
				}
			}
			else if( $view == "forgot" )
			{
				if( isset($_POST['inputAccount']) && isset($_POST['inputBirthday']) )
				{
					$result = $this->auth->forgot($_POST['inputAccount'], $_POST['inputBirthday']);
					if( $result && is_array($result) )
					{
						$obj_forgot_lang = $this->loadLang("page/forgotten/");
						
						$fName = $this->cut_str($result["name"]);
						$fMail = $this->cut_mail($result["mail"]);
						
						$message = array(
							"status" 	=> "info",
							"title" 	=> $obj_forgot_lang['forgot_finish'],
							"content" 	=> $obj_forgot_lang['forgot_finish_content'] . "<br/><p>" . $fName . "</p><br/><p>" . $fMail . "</p><br/>",
							"auto" 		=> "3000"
						);
						
						redirect('/message?'.http_build_query($message),'location','301');
					}
				}
			}
			else if( $view == "profile" )
			{
				if( isset($_POST['nickname']) &&  
					isset($_POST['mail']) && 
					isset($_POST['birthday']) && 
					isset($_POST['phone']) &&
					isset($_POST['gender']) 
				)
				{
					$dataUser = array(
						"id" 		=> $this->self["id"],
						"nickname" 	=> $_POST["nickname"],
						"mail" 		=> $_POST["mail"],
						"birthday" 	=> $_POST["birthday"],
						"phone" 	=> $_POST["phone"],
						"gender" 	=> $_POST["gender"],
						"region" 	=> isset($_POST["region"])?$_POST["region"]:"" ,
						"county" 	=> isset($_POST["county"])?$_POST["county"]:"" , 
						"district"  => isset($_POST["district"])?$_POST["district"]:"" ,
						"zip" 		=> isset($_POST["zipcode"])?$_POST["zipcode"]:"" ,
						"address" 	=> isset($_POST["address"])?$_POST["address"]:"",
						"subscript"	=> isset($_POST["subscript"])? $_POST["subscript"]:"0"
					);

					$result = $this->auth->updateUser($dataUser);

					if($result){
						$this->load->model("Subscribe_model","mSubscribe");
						$dataForm = array( "mail"=> $dataUser["mail"], "flag"=>$dataUser["subscript"]);
						$this->mSubscribe->saveOrUpdate($dataForm);
					}
					
					$obj_profile_lang = $this->loadLang("page/profile/");
					
					$message = array(
						"status" 	=> "info",
						"title" 	=> $obj_profile_lang['modify_finish'],
						"content" 	=> $obj_profile_lang['modify_finish_content'],
						"auto" 		=> "3000"
					);
					
					$this->reloadSession();
					redirect('/message?'.http_build_query($message),'location','301');
				}
			}
			else if($view == "changePassword")
			{
				if( isset($_POST['oldPassword']) && 
					isset($_POST['password']) && 
					isset($_POST['retypepassword'])
				)
				{
					if( $_POST['password']!= $_POST['retypepassword'] )
					{
						$this->data['opt']['status']		= true;
						$this->data['opt']['message'][] 	= "[password] different with [retypepassword] !";
					}
					else if( $_POST['password'] === $_POST['oldPassword'] )
					{
						$this->data['opt']['status']		= true;
						$this->data['opt']['message'][] 	= "[password] no different with [Old Password] !";
					}
					else
					{
						$dataUser = array(
							"id" 				=> $this->data["self"]["id"],
							"oldPassword" 		=> $_POST["oldPassword"],
							"password" 			=> $_POST["password"]
						);
						$result = $this->auth->changePassword($dataUser);
						if( $result === true )
						{
							
							$obj_profile_lang = $this->loadLang("page/profile/");
							
							$message = array(
								"status" 	=> "info",
								"title" 	=> $obj_profile_lang['modify_finish'],
								"content" 	=> $obj_profile_lang['modify_finish_content'],
								"auto" 		=> "3000"
							);
							redirect('/message?'.http_build_query($message),'location','301');
						}
						else
						{							
							$this->data['opt']['status']		= true;
							$this->data['opt']['message'][] 	= "[old Password] is error !";
						}
					}
				}
			}
			else if($view == "reActive")   //重新取得認證信
			{
				$obj_register_lang = $this->loadLang("page/register/");

				$username = $result['old']['username'];
				//send 認證信
				$result = $this->auth->activeLink("",$username);
				$message = array(
					"status" 	=> "info",
					"title" 	=> "",
					"content" 	=> $obj_register_lang['register_email_content'],
					"auto" 		=> "30000"
				);
				redirect('/message?'.http_build_query($message),'location','301');
			}
			else if($view == "fbLogin")   //FB 登入
			{		
				$url = "" ;
				$resp = 0 ; 
				// check 是否有會員紀錄(FB) YES ＝》 login  // else inset new member and go to edit page (if email 已經使用)
				$email = $result['old']['mail'] ; 
				$resultCheck = $this->auth->checkLoginWithMedia($result['old']['username'],$result['old']['mail']) ;

				if( $resultCheck == 0){    // 0: 第一次註冊 ｜ 2: 可以 login | 3: 此email 非 FB 會員
		 
					$this->load->model("Option_model");
					$RegisterMoney = $this->Option_model->readString("RegisterMoney");
					$isMemberCheckEmail = $this->Option_model->readVal("isMemberCheckEmail");
					
					$new_user = array();
					$new_user['name'] 				= $result['old']['username'];
					$new_user['mail'] 	 			= $result['old']['mail'];
					$new_user['password'] 			= "";
					$new_user['nickname'] 			= $result['old']['nickname'];
					$new_user['gender'] 			= $result['old']['gender'];
					$new_user['birthday'] 			= "";
					$new_user['phone'] 				= "";
					$new_user['host_id']			= $this->webVar["hostId"];
					$new_user['region']				= 0;
					$new_user['county']				= '';
					$new_user['district']			= '';
					$new_user['zip']				= 0;
					$new_user['address']			= '';
					$new_user['subscript']			= 0;
					$new_user['info'] 				= array(
						"zip"		 => "",
						"country"	 => "",
						"district"	 => "",
						"address"	 => "",
						"followlist" => "",
						"loginMedia" => "facebook",
						"gender" 	 => $result['old']['gender']
					);
					$new_user['point'] 				= $RegisterMoney;   //註冊 禮金

					$result = $this->auth->createUser($new_user,$isMemberCheckEmail);
					if($result)   //會員編輯資料頁面
					{
						$this->auth->login($email , "" , false, false, false , "facebook" );
						$resp = 1 ;
						$url = '/user/profile' ; 
					}
					else{
						$resp = 0 ;	
					}
				}
				else if(  $resultCheck == 2 ){
					$this->auth->login($email , "" , false, false, false , "facebook" );
					$resp = 2 ;

					$obj_login_lang = $this->loadLang("page/login/");
					
					$message = array(
						"status" 	=> "info",
						"title" 	=> $obj_login_lang['login_finish'],
						"content" 	=> $obj_login_lang['login_finish_content'],
						"auto" 		=> "3000"
					);
					$url = '/message?'.http_build_query($message) ;

				}
				else{
					$resp = 3 ;
				}
				//if (isset($_POST['mail'])){
				//	$resp =  $this->auth->isEmailAvailable( $_POST['mail'] ) ;
				//}
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['url'] 		= $url;
				$this->jsonRS['resp'] 		= $resp;
				header('Content-Type: application/json; charset=utf-8');
				echo json_encode($this->jsonRS);
			}
			else
			{
				$this->load->model("Option_model");
				$isMemberCheckEmail = $this->Option_model->readVal("isMemberCheckEmail");

				$username 		= $result['old']['username'];
				$password 		= $result['old']['password'];
				$redirectURL	= isset($result['old']['redirectURL'])? $result['old']['redirectURL'] :"" ;
				if ($isMemberCheckEmail){
					$result = $this->auth->login($username, $password,true);
				}
				else{
					$result = $this->auth->login($username, $password);
				}
				
				if($result == 1)
				{
					$obj_login_lang = $this->loadLang("page/login/");
					$contentString = ( $redirectURL =="/checkout")? $obj_login_lang['shoppingcart_login_finish_content']:$obj_login_lang['login_finish_content'];
					
					$message = array(
						"status" 		=> "info",
						"title" 		=> $obj_login_lang['login_finish'],
						"content" 		=> $contentString,
						"auto" 			=> "3000",
						"redirectURL"	=> $redirectURL
					);
					redirect('/message?'.http_build_query($message),'location','301');
				}
				elseif($result == 0 )   // flag == "0" 審核 
				{
					$this->data['opt']['status'] 	= true;
					$this->data['opt']['message'][] = "會員尚未啟用 <a onclick=\"reActive('".$username."');\">重新取得認證信</a>！";
				}
				else
				{
					$this->data['opt']['status'] 	= true;
					$this->data['opt']['message'][] = "[name] OR [password] error!";
				}
			}
			return;
		}
	}
	
	function str_split_unicode($str, $l = 0) 
	{
		if ($l > 0) {
			$ret = array();
			$len = mb_strlen($str, "UTF-8");
			for ($i = 0; $i < $len; $i += $l) {
				$ret[] = mb_substr($str, $i, $l, "UTF-8");
			}
			return $ret;
		}
		return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	}
	
	function cut_str($name) 
	{    
		$arr_name = $this->str_split_unicode($name);
		$fName  = "";
		$isFirst = true;
		foreach( $arr_name AS $char )
		{
			if($isFirst)
			{
				$fName.=$char;
				$isFirst = false;
			}
			else
			{
				$fName.="＊";
			}
		}
		return $fName;    
    }  
	
	function cut_mail($mail)
	{
		$media_mail = explode("@",$mail);
		$acc_len = strlen($media_mail[0]);
		$mail_head = "";
		if( $acc_len <= 5 )
		{
			$mask = "";
			for($i=0;$i<($acc_len-1);$i++ )
			{
				$mask.="＊";
			}
			$mail_head = substr_replace($media_mail[0],$mask,1);
		}
		else
		{	
			$mask = "";
			for($i=0;$i<($acc_len-3);$i++ )
			{
				$mask.="＊";
			}		
			$mail_head = substr_replace($media_mail[0],$mask,3);
		}	
		return $mail_head."@".$media_mail[1];
	}
	 
	 
	public function gotoBackend()
	{
		$this->load->library('adminilib');
		$result = $this->adminilib->FrontToBackendConvert();
		$url = ( $result == 1 )?"/admin/dashboard":"/";
		redirect($url,"location","301");
	}
	
	public function appLogin()
	{
		if( isset($_POST['UserName']) && 
			isset($_POST['Password']) &&
			isset($_POST['Device']) 
		)
		{
			$this->jsonRS['code'] 		= 200;
			$this->jsonRS['message'] 	= "操作成功";
			$UserName = $_POST['UserName'];
			$Password = $_POST['Password'];

			$this->jsonRS['result'] = $this->auth->login($UserName, $Password, false, true);
			$this->jsonRS['mobile_key'] = $this->auth->mobile_key;
		}
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->jsonRS);
	}
	
	public function checkOrder()
	{
		if( isset($_GET['m']) )
		{
			$this->jsonRS['code'] 		= 404;
			$this->jsonRS['message'] 	= "無此MID";
			$mobile_key = $_GET['m'];
			if( $this->auth->isExist(array("unique_mobile" => $mobile_key)) )
			{
				$this->jsonRS['code'] 		 = 200;
				$this->jsonRS['message'] 	 = "操作成功";		
				$this->jsonRS['result'] 	 = 1;		
				$this->jsonRS['listMessage'] = $this->auth->checkOrder();
			}
		}
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->jsonRS);
	}
	 
	public function login()
	{
		$this->load->model("Option_model","mOption");
		$this->data["isMemberCheckFacebook"] = $this->mOption->readVal("isMemberCheckFacebook");
		
		$this->data["objLang"]["login"] = $this->loadLang("page/login/");
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("login");
		}
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/login',$this->data);
		$this->load->view('inc/footer',$this->data);
	}

	public function reActive()
	{
		$this->data["objLang"]["login"] = $this->loadLang("page/login/");
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("reActive");
		}
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/login',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function bonus()
	{
		ini_set("display_errors","On");
		
		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();
		
		$this->load->model("User_model");
		$this->load->model("Order_model");
		$this->load->model("Option_model");
		
		//取的目前設定月份(默認 當下年月)
		$query = isset($_GET["q"])?$_GET["q"]:date('Y-m-d');
		//計算 本月 起始/結束 年月日時分秒
		$start = date('Y-m-01 00:00:00',strtotime($query));
		$end   = isset($_GET["e"])?$_GET["e"]:date('Y-m-d 23:59:59',strtotime($start." +1 months -1 days"));
		
		//計算 上月 起始/結束 年月日時分秒		
		$prevStart 	  = date('Y-m-01 00:00:00',strtotime($start . " -1 months"));
		$prevEnd   	  = date('Y-m-d 23:59:59',strtotime($prevStart." +1 months -1 days"));
		//取得並設定 當下年月
		$this->data["current_month"] = date('Y-m',strtotime($query));
		
		//部落客 分享代碼
		$this->data["unique_host"] = $this->getUniqueHost();
		
		//本月 人數
		$this->data["HostGroup"] = $this->User_model->getHostGroup($this->self["id"], $start, $end);
		$this->data["HostGroupNums"] = count($this->data["HostGroup"]);
		/*
		//上月 人數
		$preHostGroup = $this->User_model->getHostGroup($this->self["id"], $prevStart, $prevEnd);
		$preHostGroupNums = count($preHostGroup);		
		*/	
		
		//本月 單數
		$this->data["HostOrder"] = $this->Order_model->getHostOrder($this->self["id"], $start, $end);
		$this->data["HostOrderNums"] = count($this->data["HostOrder"]);
		/*
		//上月 單數
		$preHostOrder = $this->Order_model->getHostOrder($this->self["id"], $prevStart, $prevEnd);
		$preHostOrderNums = count($preHostOrder);
		*/
		
		//取得紅利金比例 2015-08-26 改版後不即時計算，改撈 user_bonus_log 以下 rate 變數全為 1
		///$rate = $this->Option_model->readString("HostRate");
		
		//本月 紅利金
		$this->data["HostOrderTotal"] = $this->sum($this->data["HostOrder"],"amount");		
		/*
		//上月 紅利金
		$prevHostOrderTotal = $this->sum($preHostOrder,"amount");
		*/
		
		//總計 人數
		$HostGroupAll = $this->User_model->getHostGroup($this->self["id"]);
		$this->data["HostGroupAllNums"] = count( $HostGroupAll );
		
		//總計 單數
		$HostOrderAll = $this->Order_model->getHostOrder($this->self["id"]);
		$this->data["HostOrderAllNums"] = count( $HostOrderAll );
		//總計 紅利金
		$this->data["HostOrderAllTotal"] = $this->sum($HostOrderAll,"amount");
		
		//人數 上升程度
		$this->data["HostGroupRate"] = $this->calRate( $this->data["HostGroupNums"], $this->data["HostGroupAllNums"]);
		//單數 上升程度
		$this->data["HostOrderRate"] = $this->calRate( $this->data["HostOrderNums"], $this->data["HostOrderAllNums"] );		
		//紅利金 上升程度
		$this->data["HostOrderTotalRate"] = $this->calRate( $this->data["HostOrderTotal"], $this->data["HostOrderAllTotal"] );
		
		// xAxis.categories
		// 當下年月往後推 一年 ex. 2015-06 ~ 2014-06
		
		$xAxisHostGroup   = array();
		$HostGroupAllYear = $this->User_model->getHostGroupAll($this->self["id"]);
		foreach( $HostGroupAllYear AS $rec )
		{
			$xAxisHostGroup[$rec["sumYM"]] = $rec;
		}
		$this->data["xAxisHostGroupNums"] = $this->xAxisSum($xAxisHostGroup,"sumHostGroup",1,1);
		
		$xAxisHostOrder   = array();
		$HostOrderAllYear = $this->Order_model->getHostOrderAll($this->self["id"]);
		foreach( $HostOrderAllYear AS $rec )
		{
			$HostOrderAllYear[$rec["sumYM"]] = $rec;
		}
		$this->data["xAxisHostOrderNums"] = $this->xAxisSum($HostOrderAllYear,"sumHostOrderNums",1,1);
		$this->data["xAxisHostOrderMoney"] = $this->xAxisSum($HostOrderAllYear,"sumClearTotal",1,1000);
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/bonus',$this->data);
		$this->load->view('inc/footer',$this->data);
		
	}
	
	private function xAxisSum($data, $key, $rate = 1, $baseOn = 1000)
	{
		$result = array();
		
		$now_month 	 = date("Y-m");
		$start_month = date("Y-m",strtotime($now_month." -1 years +1 months"));
		$rule_month  = date("Y-m",strtotime($now_month." +1 months"));
		
		$cnt = 0;
		while( $start_month != $rule_month && $cnt < 12)
		{
			$sumClearTotal = 0;
			if( array_key_exists( $start_month, $data ) )
			{
				$sumClearTotal = $data[$start_month][$key];

				$sumClearTotal = ( round( $sumClearTotal * $rate ) ) / $baseOn;
			}
			
			$result[] = $sumClearTotal;
			$start_month = date("Y-m",strtotime($start_month." +1 months"));
			$cnt++;
		}
		return $result;
	}
	
	private function sum($data, $key, $rate = 1)
	{
		$Total = 0;
		foreach( $data AS &$rec )
		{
			$Total+= $rate * $rec[$key];
		}	
		return round($Total);
	}
	
	private function getUniqueHost()
	{
		$self = $this->User_model->findUserById($this->self["id"]);
		$unique_host = false;
		if( empty($self[0]["unique_host"]) )
		{
			$unique_host = strtoupper(md5(time()));
			$this->User_model->saveUniqueHost($unique_host,$this->self["id"]);
		}
		else
		{
			$unique_host = $self[0]["unique_host"];
		}
		return $unique_host;
	}
	
	private function calRate( $currentMonth, $prevMonth )
	{
		$HostOrderTotalRate = 0;
		if( $currentMonth != 0 && $prevMonth == 0 )
		{
			$HostOrderTotalRate = 100;
		}
		else if( $currentMonth != 0 && $prevMonth != 0 )
		{
			$HostOrderTotalRate = floor( ( $currentMonth / $prevMonth ) * 100 );
		}
		return $HostOrderTotalRate;
	}
	
	
	public function register()
	{
		$this->data["objLang"]["register"] = $this->loadLang("page/register/");
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("register");
		}

		$this->load->model("Option_model");
		$privacy = $this->Option_model->readVal("privacy");
		$this->data["privacy"] = array_key_exists($this->currentLang,$privacy)?$privacy[$this->currentLang]:$privacy[$this->DEFAULTLANG];
		
		$this->data["redirectURL"] = isset($_GET["redirectURL"])?$_GET["redirectURL"]:"/" ; 

		$this->load->view('inc/head',$this->data);
		$this->load->view('user/register',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function logout()
	{
		if( isset($this->data['self']) && count($this->data['self']) > 0 )
		{
			$this->auth->logout();
		}
		redirect('/','location','301');
	}
	
	public function forgot()
	{
		$this->data["objLang"]["forgotten"] = $this->loadLang("page/forgotten/");
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("forgot");
		}
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/forgotten',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function changePassword()
	{
		$this->data["objLang"]["changePassword"] = $this->loadLang("page/changePassword/");
	
		if( $this->self === false )
		{
			redirect("/","location",301);
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("changePassword");
		}
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/changePassword',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function orderlist()
	{
		if( $this->self === false )
		{
			redirect("/","location",301);
		}
		$this->data["objLang"]["orderlist"] = $obj_orderlist_lang = $this->loadLang("widget/orderlist/");
// error_log(print_r($obj_orderlist_lang,true),3,"uploads/log_controller_user_obj_orderlist_lang.log");
		$this->load->model("Checkout_model","Checkout");	
		$this->setActiveTag();
		
		$result = $this->Checkout->queryTransactionByUserId($this->data['self']['id']);
		$showRec = array();
		foreach( $result AS $k => $rec )
		{
			if( $result[$k]['type'] != -1 )
			{
				// $rec['Rtype'] = $rec['type'];
				// $rs = $this->statusConvert($rec['type'],$obj_orderlist_lang);				
				// $rec['type'] 	= $rs['html'];
				// $rec['Otype'] 	= $rs['text'];
				$rs1 = $this->statusConvertOrder($rec['type'],$obj_orderlist_lang);				
 				$rec['type1'] 	= $rs1['html'];
				$rec['Otype1'] 	= $rs1['text'];

				$rs2 = $this->statusConvertPayment($rec['paymentType'],$obj_orderlist_lang);				
				$rec['type2'] 	= $rs2['html'];
				$rec['Otype2'] 	= $rs2['text'];

				$rs3 = $this->statusConvertShip($rec['shipType'],$obj_orderlist_lang);				
				$rec['type3'] 	= $rs3['html'];
				$rec['Otype3'] 	= $rs3['text'];

				if($rec['type']==0 && ($rec['paymentType']==0||$rec['paymentType']=='1'||$rec['paymentType']=='-1'||$rec['paymentType']=='9') && ($rec['shipType']=='0'||$rec['shipType']=='2')){
					$rec['isAllowedCancelOrder'] = 1;
				}
				else{
					$rec['isAllowedCancelOrder'] = 0;
				}

				$showRec[]		= $rec;
			}
		}
		$this->data['orderlist'] = $showRec;
		$this->data['obj_orderlist_lang'] = $obj_orderlist_lang;
				
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/orderlist',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function profile()
	{
		$this->data["objLang"]["profile"] = $this->loadLang("page/profile/");
		if( $this->self === false )
		{
			redirect("/","location",301);
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$this->index("profile");
		}
		$this->load->view('inc/head',$this->data);
		$this->load->view('user/profile',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function followlist($method="index")
	{
		if( $this->self === false )
		{
			redirect("/","location",301);
		}
		if($method == "index")
		{	
			$followlist = array();
			$listProduct = array();
			
			$this->data["objLang"]["followlist"] = $this->loadLang( "page/followlist/" );
				
			$this->data['widget'] = array();
			$this->load->model("User_exinfo_model");	
			$followlist = $this->User_exinfo_model->findUserById($this->self["id"],"followlist","none");
			
			if( count($followlist) > 0 )
			{
				$followlist = $followlist[0];				
				$followlist["value"] = json_decode($followlist["value"],true);	
				if( is_array($followlist["value"]) && count($followlist["value"]) > 0)
				{
					$this->load->model("Product_model");
					$listProduct = $this->Product_model->find(implode(",",$followlist["value"]));											
				}
			}
			$this->data["listFollowlist"] = $followlist;
			$this->data["listProduct"] = $listProduct;
			$this->load->view('inc/head',$this->data);
			$this->load->view('user/followlist',$this->data);
			$this->load->view('inc/footer',$this->data);	
		}
		else if($method == "add" && isset($_REQUEST["PID"]))
		{
			$this->load->model("User_exinfo_model");
			$arr_followlist = $this->User_exinfo_model->findUserById( $this->self["id"], "followlist", "none" );
			if( count($arr_followlist) > 0  )
			{
				$arr_followlist = $arr_followlist[0];
				$arr_followlist["value"] = json_decode($arr_followlist["value"],true);
				empty($arr_followlist["value"]) ? $arr_followlist["value"] == array() : "";
				
				if(!in_array($_REQUEST["PID"],$arr_followlist["value"]))
				{
					$arr_followlist["value"][] = $_REQUEST["PID"];
					$result = $this->User_exinfo_model->save(array(
						"id" 		=> $arr_followlist["id"],
						"user_id" 	=> $this->self["id"],
						"key" 		=> "followlist",
						"value" 	=> $arr_followlist["value"],
						"langCode" 	=> "none"
					));
					$this->jsonRS['code'] 		= '1';
					$this->jsonRS['message'] 	= '操作完成';
					$this->jsonRS['result'] 	= $result;
				}
				else 
				{				
					$this->jsonRS['code'] 		= '101';
					$this->jsonRS['message'] 	= '操作完成';
				}
			}
			else
			{
				$arr_followlist["value"][] = $_REQUEST["PID"];
				$result = $this->User_exinfo_model->save(array(
					"id" 		=> $arr_followlist["id"],
					"user_id" 	=> $this->self["id"],
					"key" 		=> "followlist",
					"value" 	=> $arr_followlist["value"],
					"langCode" 	=> "none"
				));
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else if($method == "save" && isset($_REQUEST["PID"])) 
		{
			$this->jsonRS['POST'] = $_POST;
			
			$this->load->model("User_exinfo_model");
			$followlist = $this->User_exinfo_model->findUserById($this->self["id"],"followlist","none");
			if(count($followlist) > 0 )
			{
				$followlist = $followlist[0];				
				$followlist["value"] = json_decode($followlist["value"],true);	
				$newList = array();
			
				foreach( $followlist["value"] AS $pid )
				{
					if( $pid != $_REQUEST["PID"] )
					{
						$newList[] = $pid;
					}
				}
				UNSET($followlist["value"]);
				$followlist["value"] = array();
				$followlist["value"] = $newList;
						
				$result = $this->User_exinfo_model->save($followlist);
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
		else
		{
			redirect("/","location",301);
		}
	}
	
	private function statusConvertOrder($status,$obj_orderlist_lang)
	{		
		$result = array();
		switch ($status) {
			//Order Status
			case '0':
				$label = isset($obj_orderstatus_lang["order_".$status]) ? $obj_orderstatus_lang["order_".$status] : "成立";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '9':
				$label = isset($obj_orderstatus_lang["order_".$status]) ? $obj_orderstatus_lang["order_".$status] : "取消處理中";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '-1':
				$label = isset($obj_orderstatus_lang["order_".$status]) ? $obj_orderstatus_lang["order_".$status] : "已取消";
				$result['html'] = '<span class="label label-danger">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '1':
				$label = isset($obj_orderstatus_lang["order_".$status]) ? $obj_orderstatus_lang["order_".$status] : "完成";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			default:
				$result = '';
				break;
		}

		return $result;
	}

	private function statusConvertPayment($status,$obj_orderlist_lang)
	{		
		$result = array();

		switch ($status) {
			//Payment Status
			case '0':
				$label = isset($obj_orderstatus_lang["payment_0"]) ? $obj_orderstatus_lang["payment_0"] : "準備中";
				$result['html'] = '<span class="label label-warning">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '1':
				$label = isset($obj_orderstatus_lang["payment_1"]) ? $obj_orderstatus_lang["payment_1"] : "成功";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '-1':
				$label = isset($obj_orderstatus_lang["payment_-1"]) ? $obj_orderstatus_lang["payment_-1"] : "失敗";
				$result['html'] = '<span class="label label-danger">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '9':
				$label = isset($obj_orderstatus_lang["payment_9"]) ? $obj_orderstatus_lang["payment_9"] : "等待";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '10':
				$label = isset($obj_orderstatus_lang["payment_10"]) ? $obj_orderstatus_lang["payment_10"] : "已退款";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			default:
				$result = '';
				break;
		}

		return $result;
	}

	private function statusConvertShip($status,$obj_orderlist_lang)
	{		
		$result = array();

		switch ($status) {
			//Ship Status
			case '0':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "準備中";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '2':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "準備中";
				$result['html'] = '<span class="label label-default">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '31':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "取消出庫";
				$result['html'] = '<span class="label label-danger">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '5':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "已寄出";
				$result['html'] = '<span class="label label-warning">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '10':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "已取貨";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '12':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "退貨(已收)";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '25':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "換貨(寄出)";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			case '30':
				$label = isset($obj_orderstatus_lang["ship_".$status]) ? $obj_orderstatus_lang["ship_".$status] : "換貨(已取貨)";
				$result['html'] = '<span class="label label-success">'.$label.'</span>';
				$result['text'] = $label;
				break;
			default:
				$result = '';
				break;
		}

		return $result;
	}

	private function statusConvert($status,$obj_orderlist_lang){

		if($status == "101")
		{
			$result['html'] = '<span class="label label-danger">'.$obj_orderlist_lang['failed'].'</span>';
			$result['text'] = $obj_orderlist_lang['failed'];
		}
		if($status == "100")
		{
			$result['html'] = '<span class="label label-danger">'.$obj_orderlist_lang['expired'].'</span>';
			$result['text'] = $obj_orderlist_lang['expired'];
		}
		if($status == "0")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['pending'].'</span>';
			$result['text'] = $obj_orderlist_lang['pending'];
		}
		if($status == "1")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['remittanceChecked'].'</span>';
			$result['text'] = $obj_orderlist_lang['remittanceChecked'];
		}
		if($status == "2")
		{
			$result['html'] = '<span class="label label-default">'.$obj_orderlist_lang['shipping'].'</span>';
			$result['text'] = $obj_orderlist_lang['shipping'];
		}
		if($status == "3")
		{
			$result['html'] = '<span class="label label-success">'.$obj_orderlist_lang['arrival'].'</span>';
			$result['text'] = $obj_orderlist_lang['arrival'];
		}
		if($status == "4")
		{
			$result['html'] = '<span class="label label-warning">'.$obj_orderlist_lang['waitOfflinePay'].'</span>';
			$result['text'] = $obj_orderlist_lang['waitOfflinePay'];
		}
		if($status == "5")
		{
			$result = '';
		}
		return $result;
	}

	public function inbox($method="index")
	{
		$this->data["objLang"]["inbox"] = $this->loadLang( "page/inbox/" );
		if( $method == "index" )
		{
			//前/後台
			$this->data["css_include"] 	= "user";
			$this->data['widget'] 		= array();
			$this->load->model("Inbox_model");	
			$msgData = $this->Inbox_model->findMessageByUserId($this->self["id"]);
			$newMsgBox = array();
			$userInfo = array();
			foreach( $msgData AS $k => &$val )
			{
				$val["from_picture"] 	= json_decode($val["from_picture"],true);
				$val["to_picture"] 		= json_decode($val["to_picture"],true);
				$val["msgTime"]		    = strtotime($val["datetime"]);
				
				$userId = ( $val["from"] == $this->self["id"] ) ? $val["to"] : $val["from"];
				
				( !array_key_exists( $userId, $newMsgBox ) ) ? $newMsgBox[$userId] = array() : "";
				( !array_key_exists( $userId, $userInfo ) ) ? $userInfo[$userId] = $val : "";
				
				$newMsgBox[$userId][$val["msgTime"]] = $val;
				krsort($newMsgBox[$userId], SORT_NUMERIC);
			}
			
			$this->data["msgData"] = $newMsgBox;
			$this->data["userInfo"] = $userInfo;
			
			$this->load->view('inc/head',$this->data);
			$this->load->view('user/inbox',$this->data);
			$this->load->view('inc/footer',$this->data);
		}
		else if( $method == "detail" )
		{
			if( isset($_GET["withId"]) )
			{
				//前/後台
				$this->data["css_include"] 	= "user";
				$this->data['widget'] 		= array();
				
				$this->data["withId"] = $withId = $_GET["withId"];
				$newMsgBox = array();
				$userInfo = array();
				
				$this->load->model("Inbox_model");	
				$msgData = $this->Inbox_model->findMessageByUserId($this->self["id"]);
				foreach( $msgData AS $k => &$val )
				{
					$val["from_picture"] 	= json_decode($val["from_picture"],true);
					$val["to_picture"] 		= json_decode($val["to_picture"],true);
					$val["msgTime"]		    = strtotime($val["datetime"]);
					
					$userId = ( $val["from"] == $this->self["id"] ) ? $val["to"] : $val["from"];
					if( $withId == $userId )
					{
						( !array_key_exists( $userId, $userInfo ) ) ? $userInfo[$userId] = $val : "";
						
						( !array_key_exists( $userId, $newMsgBox ) ) ? $newMsgBox[$userId] = array() : "";
						
						$newMsgBox[$userId][$val["msgTime"]] = $val;
						ksort($newMsgBox[$userId], SORT_NUMERIC);
					}
				}
				
				$this->data["msgData"] 	= $newMsgBox;
				$this->data["userInfo"] = $userInfo;
				
				$this->load->view('inc/head',$this->data);
				$this->load->view('user/chatroom',$this->data);
				$this->load->view('inc/footer',$this->data);
				
			}
		}
		else if($method == "sendMsg")
		{
			if( isset($_POST["content"]) && isset($_POST["to"]) )
			{
				$saveData = array();
				$saveData["from"] 		= $this->self["id"];
				$saveData["to"] 		= $_POST["to"];
				$saveData["content"]	= $_POST["content"];
				$saveData["datetime"]	= date("Y-m-d H:i:s");
								
				$this->load->model("Inbox_model");	
				$this->Inbox_model->saveMessage($saveData);
			}
		}
		else if($method == "hideMessage")
		{
			if( isset($_POST["withId"]) )
			{
				$this->load->model("Inbox_model");	
				$this->Inbox_model->hideMessage($this->self["id"], $_POST["withId"]);
				sleep(1);
			}
		}
	}

	public function changeBankRemittancesAccount()
	{
		if( 
			isset($_POST['id']) &&
			isset($_POST['cashFlow']) &&
			isset($_POST['cashData'])
		)
		{
			$this->load->model("Order_model");

			$resp = $this->Order_model->changeBankRemittancesAccount($_POST['id'],$_POST['cashFlow'],$_POST['cashData']);		
			$this->jsonRS['code'] 		= '1';
			$this->jsonRS['message'] 	= '操作完成';
			$this->jsonRS['resp'] 		= $resp;
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}	
	}

	public function checkUsernameAvailable()
	{
		$resp = 0 ; 
		if( isset($_POST['nickname']) ){
			$resp =  $this->auth->isUsernameAvailable($_POST['nickname']) ;
		}
		$this->jsonRS['code'] 		= '1';
		$this->jsonRS['message'] 	= '操作完成';
		$this->jsonRS['resp'] 		= $resp;
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function checkEmailAvailable()
	{
		$resp = 0 ; 
		if (isset($_POST['mail'])){
			$resp =  $this->auth->isEmailAvailable( $_POST['mail'] ) ;
		}
		$this->jsonRS['code'] 		= '1';
		$this->jsonRS['message'] 	= '操作完成';
		$this->jsonRS['resp'] 		= $resp;
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}

	public function checkUserForFBLogin()
	{
		if ( isset($_POST ) )  
		{
			$this->index("fbLogin");
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */