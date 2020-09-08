<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends Admin_Controller {

	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "Failure"
	);
	
	public $arr_flag = array(
		0 => array(
			"title" => "Review",
			"html"	=> "<a class=\"btn btn-default btn-xs\">Review</a>"
		),
		1 =>  array(
			"title" => "Enable",
			"html"	=> "<a class=\"btn btn-info btn-xs\">Enable</a>"
		),
		2 =>  array(
			"title" => "Disable",
			"html"	=> "<a class=\"btn btn-warning btn-xs\">Disable</a>"
		),
		3 =>  array(
			"title" => "abnormal",
			"html"	=> "<a class=\"btn btn-danger btn-xs\">abnormal</a>"
		)
	);

	public $groupColor = array( "5" => "btn-danger", "1" => "btn-info", "2" => "btn-warning" );
	public $infoSample = array("id","nickname","name","mail",'gender',"point","phone","birthday","picture","region","county","district","zip","address");
	
	public $changePWSample = array("id", "password");
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	
	public function info()
	{
		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();
		
		$this->load->model("User_model");	
		$selfData = $this->User_model->findUserById($this->admin["id"]);
		$selfData[0]["picture"] = json_decode($selfData[0]["picture"],true);
		$newSelfData = array();
		foreach($selfData[0] AS $k=>&$row)
		{
			if(in_array($k,$this->infoSample))
			{
				$newSelfData[$k] = $row;
			}
		}

		//get gender
		$this->load->model("User_exinfo_model");	
		$genderResult = $this->User_exinfo_model->findUserById($this->admin["id"],"gender","none");
		$gender = "" ;	
		if( count($genderResult) > 0 )
		{
			$gender = json_decode($genderResult[0]["value"]) ;
		}
		
		$newSelfData['gender'] = $gender ;
		$this->data["selfData"] = $newSelfData;
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/user/info',$this->data);
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
			$msgData = $this->Inbox_model->findMessageByUserId($this->admin["id"]);
			$newMsgBox = array();
			$userInfo = array();
			foreach( $msgData AS $k => &$val )
			{
				$val["from_picture"] 	= json_decode($val["from_picture"],true);
				$val["to_picture"] 		= json_decode($val["to_picture"],true);
				$val["msgTime"]		    = strtotime($val["datetime"]);
				
				$userId = ( $val["from"] == $this->admin["id"] ) ? $val["to"] : $val["from"];
				
				( !array_key_exists( $userId, $newMsgBox ) ) ? $newMsgBox[$userId] = array() : "";
				( !array_key_exists( $userId, $userInfo ) ) ? $userInfo[$userId] = $val : "";
				
				$newMsgBox[$userId][$val["msgTime"]] = $val;
				krsort($newMsgBox[$userId], SORT_NUMERIC);
			}
			
			$this->data["msgData"] = $newMsgBox;
			$this->data["userInfo"] = $userInfo;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/user/inbox',$this->data);
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
				$msgData = $this->Inbox_model->findMessageByUserId($this->admin["id"]);
				foreach( $msgData AS $k => &$val )
				{
					$val["from_picture"] 	= json_decode($val["from_picture"],true);
					$val["to_picture"] 		= json_decode($val["to_picture"],true);
					$val["msgTime"]		    = strtotime($val["datetime"]);
					
					$userId = ( $val["from"] == $this->admin["id"] ) ? $val["to"] : $val["from"];
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
				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/user/chatroom',$this->data);
				
			}
		}
		else if($method == "sendMsg")
		{
			if( isset($_POST["content"]) && isset($_POST["to"]) )
			{
				$saveData = array();
				$saveData["from"] 		= $this->admin["id"];
				$saveData["to"] 		= $_POST["to"];
				$saveData["content"]	= strip_tags($_POST["content"]);
				$saveData["datetime"]	= date("Y-m-d H:i:s");
								
				$this->load->model("Inbox_model");	
				$this->Inbox_model->saveMessage($saveData);
				sleep(1);
			}
		}
		else if($method == "hideMessage")
		{
			if( isset($_POST["withId"]) )
			{
				$this->load->model("Inbox_model");	
				$this->Inbox_model->hideMessage($this->admin["id"], $_POST["withId"]);
				sleep(1);
			}
		}
	}
	
	public function recommend($method="index")
	{
		if( $method == "index" )
		{
			//後台
			$this->data["css_include"] 	= "user";
			$this->data['widget'] 		= array();
			
			$this->load->model("User_exinfo_model");	
			$recommend = $this->User_exinfo_model->findUserById($this->admin["id"],"recommend");
			
			( count($recommend) > 0 ) ? $recommend[0]["value"] = json_decode($recommend[0]["value"],true) : "";	
			$recommend = $this->convertToMutiLangObj($recommend, array("id"=>"-1","user_id"=>$this->admin["id"],"key"=>"recommend","value"=>array()));
			$this->data["listRecommend"] = $recommend;
			
			$this->load->model("Product_model");
			$this->data["listProduct"] = $this->Product_model->findAll();
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/user/recommend',$this->data);		
		}
		else if( $method == "save" )
		{
			$this->jsonRS['POST'] 		= $_POST;
			if(isset($_POST["postData"]))
			{
				$saveData = array();
				$infoData = array("id","user_id","key","value","langCode");
				foreach( $_POST["postData"] AS $k => $item )
				{
					if(in_array($k,$infoData))
					{
						$saveData[$k] = $item;
					}
				}
				$this->load->model("User_exinfo_model");				
				$result = $this->User_exinfo_model->save($saveData);
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}		
	}
	
	public function orderQuery($method="index")
	{	
		if( $method == "index" )
		{
			//前/後台	
			$this->data["css_include"] 	= "user";
			$obj_orderlist_lang = $this->loadLang( "widget/orderlist/" );
			$obj_shoppingCart_lang = $this->loadLang( "widget/shoppingcart/" );
			$this->load->model("Checkout_model","Checkout");	
			
			$result = $this->Checkout->queryTransactionByUserId($this->admin['id']);
			
			foreach( $result AS $k => $rec )
			{
				$result[$k]['Rtype'] = $result[$k]['type'];
				$rs = $this->Checkout->statusConvert($result[$k]['type'],$obj_orderlist_lang);
				$result[$k]['type'] = $rs['html'];
				$result[$k]['Otype'] = $rs['text'];
			}
			$this->data['listOrder'] = $result;
			$this->data['obj_orderlist_lang'] = $obj_orderlist_lang;
			$this->data['obj_shoppingCart_lang'] = $obj_shoppingCart_lang;
			
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/user/orderQuery',$this->data);	
		}
		else if( $method == "detail" )
		{
			if( isset($_GET["transId"]) )
			{
				//前/後台	
				$this->data["css_include"] 	= "user";
				$obj_orderlist_lang = $this->loadLang( "widget/orderlist/" );
				$obj_shoppingCart_lang = $this->loadLang( "widget/shoppingcart/" );
				$obj_invoice_lang = $this->loadLang( "page/invoice/" );
				
				$this->data["obj_orderlist_lang"] = $obj_orderlist_lang;
				$this->data["obj_shoppingCart_lang"] = $obj_shoppingCart_lang;
				$this->data["obj_invoice_lang"] = $obj_invoice_lang;
				
				$this->load->model("Order_model");				
				$list_order = $this->Order_model->findOrderDetail($_GET["transId"]);
				
				$this->load->model("Product_model");	
				foreach( $list_order['detail'] AS $k=>$row )
				{
					$newDataDetail = array();
					$dataDetail = $this->Product_model->findDetail($row['productMainKey']);
					foreach($dataDetail AS $detail)
					{
						$newDataDetail[$detail["langCode"]] = $detail;
					}
					$list_order['detail'][$k]["dataDetail"] = $newDataDetail;
				}
				$this->data["list_order"] = $list_order;
				
				$this->load->model("Widget_model");	
				//$BankRemittancesInfo = $this->Widget_model->find("BankRemittancesInfo");
				//$this->data["BankRemittancesInfo"] = $BankRemittancesInfo[0];

				$this->data["objLang"]["shoppingcart"] = $this->loadLang("widget/shoppingcart/");
				$this->data["objLang"]["orderlist"] = $this->loadLang("widget/orderlist/");
				

				$this->load->model("Option_model","mOption");
				$this->data["BankRemittancesInfo"]= $this->mOption->readVal("BankRemittancesInfo");
				
				$LogoBanner = $this->Widget_model->find("LogoBanner");
				$this->data["LogoBanner"] = $LogoBanner[0];

				if (isset($this->data['admin']['name']) ){

					if ( $list_order["dataUser"]["name"] !=  $this->data['admin']['name'] ){
						show_404();
						return;
					}

				}
				else{
					show_404();
					return;
				}


				
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/user/orderDetail',$this->data);	
			
			}
		}
	}
	
	public function followlist($method="index")
	{
		//前/後台
		if( $method == "index" )
		{
			$this->data["css_include"] 	= "user";
			$obj_followlist_lang = $this->loadLang( "page/followlist/" );
				
			$this->data["obj_followlist_lang"] = $obj_followlist_lang;
				
			$this->data['widget'] 		= array();
			
			$this->load->model("User_exinfo_model");	
			$followlist = $this->User_exinfo_model->findUserById($this->admin["id"],"followlist","none");
			$listProduct = array();
			if(count($followlist) > 0 )
			{
				$followlist = $followlist[0];				
				$followlist["value"] = json_decode($followlist["value"],true);	
				$this->data["listFollowlist"] = $followlist;
				
				
				if(is_array($followlist["value"]))
				{
					$this->load->model("Product_model");
					$listProduct = $this->Product_model->find(implode(",",$followlist["value"]));											
				}
						
			}
			$this->data["listProduct"] = $listProduct;
			$this->load->view('admin/inc/head',$this->data);
			$this->load->view('admin/user/followlist',$this->data);	
		}
		else if( $method == "save" )
		{
			$this->jsonRS['POST'] 		= $_POST;
			if(isset($_POST["postData"]))
			{
				$saveData = array();
				$infoData = array("id","user_id","key","value","langCode");
				foreach( $_POST["postData"] AS $k => $item )
				{
					if(in_array($k,$infoData))
					{
						$saveData[$k] = $item;
					}
				}
				$this->load->model("User_exinfo_model");				
				$result = $this->User_exinfo_model->save($saveData);
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($this->jsonRS);
		}
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
		$this->data["HostGroup"] = $this->User_model->getHostGroup($this->admin["id"], $start, $end);
		$this->data["HostGroupNums"] = count($this->data["HostGroup"]);
		/*
		//上月 人數
		$preHostGroup = $this->User_model->getHostGroup($this->admin["id"], $prevStart, $prevEnd);
		$preHostGroupNums = count($preHostGroup);
		*/
		//本月 單數
		$this->data["HostOrder"] = $this->Order_model->getHostOrder($this->admin["id"], $start, $end);
		$this->data["HostOrderNums"] = count($this->data["HostOrder"]);
		/*
		//上月 單數
		$preHostOrder = $this->Order_model->getHostOrder($this->admin["id"], $prevStart, $prevEnd);
		$preHostOrderNums = count($preHostOrder);
		*/
		
		//取得紅利金比例 2015-08-26 改版後不即時計算，改撈 user_bonus_log
		///$rate = $this->Option_model->readString("HostRate");
		
		//本月 紅利金
		$this->data["HostOrderTotal"] = $this->sum($this->data["HostOrder"],"amount");		
		/*
		//上月 紅利金
		$prevHostOrderTotal = $this->sum($preHostOrder,"amount");
		*/
		//總計 人數
		$HostGroupAll = $this->User_model->getHostGroup($this->admin["id"]);
		$this->data["HostGroupAllNums"] = count( $HostGroupAll );
		
		//總計 單數
		$HostOrderAll = $this->Order_model->getHostOrder($this->admin["id"]);
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
		$HostGroupAllYear = $this->User_model->getHostGroupAll($this->admin["id"]);
		foreach( $HostGroupAllYear AS $rec )
		{
			$xAxisHostGroup[$rec["sumYM"]] = $rec;
		}
		$this->data["xAxisHostGroupNums"] = $this->xAxisSum($xAxisHostGroup,"sumHostGroup",1,1);
		
		$xAxisHostOrder   = array();
		$HostOrderAllYear = $this->Order_model->getHostOrderAll($this->admin["id"]);
		foreach( $HostOrderAllYear AS $rec )
		{
			$HostOrderAllYear[$rec["sumYM"]] = $rec;
		}
		$this->data["xAxisHostOrderNums"] = $this->xAxisSum($HostOrderAllYear,"sumHostOrderNums",1,1);
		$this->data["xAxisHostOrderMoney"] = $this->xAxisSum($HostOrderAllYear,"sumClearTotal",1,1000);
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/user/bonus',$this->data);
		
	}
	
	public function managerbonus()
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
		
		$dataListBloger = array();
		//取得所有部落客 UserID
		$listBloger = $this->User_model->listAllBloger();
		$listBlogerIds = array();
		foreach( $listBloger AS &$bloger )
		{
			$listBlogerIds[] = $bloger["id"];
		}
		
		//本月 所有部落客 人數
		$listHostGroup = $this->User_model->getListHostGroup($listBlogerIds, $start, $end);
		//本月 單數
		$listHostOrder = $this->Order_model->getListHostOrder($listBlogerIds, $start, $end);
		
		//所有部落客 累計人數
		$listAllHostGroup = $this->User_model->getListHostGroup($listBlogerIds);
		
		foreach( $listBloger as &$blgr )
		{
			!array_key_exists($blgr["id"],$dataListBloger)?$dataListBloger[$blgr["id"]] = array("id"=>$blgr["id"],"name"=>$blgr["name"],"mail"=>$blgr["mail"],"hostgroupnums"=>0,"hostordernums"=>0,"hostordermoney"=>0,"hostgrouptotal"=>0):"";
			//本月 對應ID部落客 人數
			foreach($listHostGroup AS &$hostgroup )
			{
				if( $hostgroup["host_id"] == $blgr["id"] )
				{
					$dataListBloger[$blgr["id"]]["hostgroupnums"] = $hostgroup["nums"];
				}
			}
			//本月 對應ID部落客 人數
			foreach($listHostOrder AS &$hostorder )
			{
				if( $hostorder["hostId"] == $blgr["id"] )
				{
					$dataListBloger[$blgr["id"]]["hostordernums"] = $hostorder["nums"];
					$dataListBloger[$blgr["id"]]["hostordermoney"] = $hostorder["money"];
				}
			}
			//所有部落客 累計人數
			foreach( $listAllHostGroup AS &$AllHostGroup )
			{
				if( $AllHostGroup["host_id"] == $blgr["id"] )
				{
					$dataListBloger[$blgr["id"]]["hostgrouptotal"] = $AllHostGroup["nums"];
				}
			}
		}
		$this->data["dataListBloger"] = $dataListBloger;
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/user/managerbonus',$this->data);
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
		$self = $this->User_model->findUserById($this->admin["id"]);
		$unique_host = false;
		if( empty($self[0]["unique_host"]) )
		{
			$unique_host = strtoupper(md5(time()));
			$this->User_model->saveUniqueHost($unique_host,$this->admin["id"]);
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
	
	public function index($query)
	{
		
	}
	
	public function listPage()
	{
		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();
		
		$this->load->model("User_model");	
		$this->load->model("Auth_model");
		$listData = $this->User_model->findAllOfUser();
		//$this->data["listBloger"] = $this->User_model->findAllBloger();
		
		$listGroup = $this->Auth_model->getAllGroup($this->admin["group_id"]);
		foreach($listGroup AS &$group )
		{
			$btnStyle = ( array_key_exists($group["id"],$this->groupColor)) ? $this->groupColor[$group["id"]] : "btn-default";
			$group["html"] = "<a class=\"btn {$btnStyle} btn-xs\">{$group["name"]}</a>";
		}		
		$this->data["listGroup"] = $listGroup;
		
		foreach( $listData  AS &$record )
		{
			$record["createTime"] 	 = date("Y/m/d",strtotime($record["createTime"]));
			$lastLoginTime = strtotime($record["lastLoginTime"]);
			$record["lastLoginTime"] = ( $lastLoginTime < 0 ) ? "<a class=\"btn btn-default btn-xs\">從未登入</a>" :  date("Y/m/d", $lastLoginTime );
			$record["flag"] = $this->arr_flag[$record["flag"]];

			/* 批次掃過所有會員是否有訂閱電子報，有者加入訂閱清單中 */
			// if($record['subscript']!=0){
			// 	$this->load->model("Subscribe_model","mSubscribe");
			// 	$dataForm = array( "mail"=> $record["mail"], "flag"=>$record["subscript"]);
			// 	$this->mSubscribe->saveOrUpdate($dataForm);	
			// }
		}		
		
		$this->data["FlagSelOpt"] = $this->arr_flag;
		$this->data["listData"] = $listData;
        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];

        $this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/user/index',$this->data);
	}
		
	public function create()
	{
        $this->load->model("Auth_model");

		$this->data["css_include"] 	= "user";
		$this->data['widget'] 		= array();

        $bkm_data = $this->mBKM->find($_SERVER['REQUEST_URI']);
        $bkmt_data = $this->mBKMT->find($bkm_data[0]['type_id']);
        $this->data["bkm_name"] = $bkm_data[0]['name'];
        $this->data["bkmt_name"] = $bkmt_data[0]['name'];
		
		$this->load->model("User_model");	
		$this->data["selfData"] = $this->User_model->sample;

        $listGroup = $this->Auth_model->getAllGroup($this->admin["group_id"]);
        foreach($listGroup AS &$group )
        {
            $btnStyle = ( array_key_exists($group["id"],$this->groupColor)) ? $this->groupColor[$group["id"]] : "btn-default";
            $group["html"] = "<a class=\"btn {$btnStyle} btn-xs\">{$group["name"]}</a>";
        }
        $this->data["listGroup"] = $listGroup;
			
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/user/create',$this->data);
	}
	
	public function createUser()
	{
		$this->jsonRS['POST'] 	= $_POST;
		if(isset($_POST["saveData"]))
		{
			$saveData = $_POST["saveData"];
			if( isset($saveData["id"]) )
			{
				$this->load->model("User_model");				
				$result = $this->User_model->createUser( $saveData );
				
				if(isset($saveData["mail"]) && isset($saveData["gender"]) )
				{
					// insert gender
					//get ID 
					$resultUser = $this->User_model->findUserByEmail( $saveData['mail'] );
					if(count($resultUser) >= 1){
						$this->load->model("user_exinfo_model");
						$arr_info = array();
						$arr_info["user_id"]	= $resultUser[0]["id"];
						$arr_info["key"]		= "gender";
						$arr_info["value"]		= $saveData['gender'];
						$arr_info["langCode"]	= "none";
						$this->user_exinfo_model->save($arr_info);
					}
				}
				
				$this->jsonRS['code'] 		= '1';
				$this->jsonRS['message'] 	= '操作完成';
				$this->jsonRS['result'] 	= $result;
				
			}
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	
	public function detail()
	{
		if( isset( $_GET["id"] ) )
		{
			$this->data["css_include"] 	= "user";
			$this->data['widget'] 		= array();

            $this->load->model("Auth_model");
			$this->load->model("User_model");	
			$listData = $this->User_model->findUserById( $_GET["id"]);
			//get gender
			/*$this->load->model("User_exinfo_model");	
			$genderResult = $this->User_exinfo_model->findUserById($_GET["id"],"gender","none");
			$gender = "" ;	
			if( count($genderResult) > 0 )
			{
				$gender = json_decode($genderResult[0]["value"]) ;
			}*/

			$listGroup = $this->Auth_model->getAllGroup($this->admin["group_id"]);
            foreach($listGroup AS &$group )
            {
                $btnStyle = ( array_key_exists($group["id"],$this->groupColor)) ? $this->groupColor[$group["id"]] : "btn-default";
                $group["html"] = "<a class=\"btn {$btnStyle} btn-xs\">{$group["name"]}</a>";
            }
            $this->data["listGroup"] = $listGroup;

            if( count($listData) > 0 )
			{	
				$selfData = $listData[0];
				$newSelfData = array();
				foreach( $selfData AS $key => $self )
				{
					if( in_array( $key, $this->infoSample) )
					{
						$newSelfData[$key] = $self;
					}	
				}
				$this->data["selfData"] = $newSelfData;
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/user/detail',$this->data);
			}
			else
			{
				redirect("/admin/user/listPage","location","301");
			}
		}
		else
		{
			redirect("/admin/user/listPage","location","301");
		}
	}
	
	public function changePW()
	{
		if( isset( $_GET["id"] ) )
		{
			$this->data["css_include"] 	= "user";
			$this->data['widget'] 		= array();
			
			$this->load->model("User_model");	
			$listData = $this->User_model->findUserById( $_GET["id"]);

			$userGroupId = $listData[0]["group_id"] ; 
			if ($userGroupId == 5 && $this->admin["id"] != $_GET["id"] ){
				redirect("/admin/user/listPage","location","301");
			}

			if( count($listData) > 0 )
			{	
				$selfData = $listData[0];
				$newSelfData = array();
				foreach( $selfData AS $key => $self )
				{
					if( in_array( $key, $this->changePWSample) )
					{
						if( $key == "password" )
						{							
							$newSelfData[$key] = "";
						}
						else
						{
							$newSelfData[$key] = $self;							
						}
					}	
				}
				$this->data["selfData"] = $newSelfData;
				$this->load->view('admin/inc/head',$this->data);
				$this->load->view('admin/user/changePW',$this->data);
			}
			else
			{
				redirect("/admin/user/listPage","location","301");
			}
		}
		else
		{
			redirect("/admin/user/listPage","location","301");
		}
	}
	
	public function savePW()
	{
		if(isset($_POST["saveData"]))
		{
			$saveData = $_POST["saveData"];
			if( isset($saveData["id"]) &&
				isset($saveData["password"]) )
			{
				$this->load->model("User_model");				
				$result = $this->User_model->save($saveData);
				
				$JSONData = array();
				$JSONData["code"] 		= "1";
				$JSONData["message"] 	= "操作完成";
				$JSONData["POST"] 		= $_POST;
				$JSONData["result"] 	= $result;
			}
		}
	}
	
	public function saveInfo()
	{
		if(isset($_POST["saveData"]))
		{
			$saveData = $_POST["saveData"];
			if( isset($saveData["id"]) )
			{
				$this->load->model("User_model");				
				$result = $this->User_model->save($saveData);

				// update gender
				$this->load->model("user_exinfo_model");
				$arr_info = array();
				$arr_info["user_id"]	= $saveData["id"];
				$arr_info["key"]		= "gender";
				$arr_info["value"]		= $saveData['gender'];
				$arr_info["langCode"]	= "none";
				$this->user_exinfo_model->save($arr_info);
				
				$JSONData = array();
				$JSONData["code"] 		= "1";
				$JSONData["message"] 	= "操作完成";
				$JSONData["POST"] 		= $_POST;
				$JSONData["result"] 	= $result;
				$this->reloadSession();
			}
		}
	}
	
	public function changeInfo()
	{
		if(isset($_POST["saveData"]))
		{
			$saveData = $_POST["saveData"];
			if( isset($saveData["id"]) )
			{
				$this->load->model("User_model");				
				$result = $this->User_model->save($saveData);
				
				$JSONData = array();
				$JSONData["code"] 		= "1";
				$JSONData["message"] 	= "操作完成";
				$JSONData["POST"] 		= $_POST;
				$JSONData["result"] 	= $result;
			}
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */