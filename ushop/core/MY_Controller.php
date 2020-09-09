<?php
class Admin_Controller extends CI_Controller
{
	public $currentLang  = false;
	public $DEFAULTLANG  = false;	
	
	public $currentCurrency = false;
	public $DEFAULTCURRENCY = false;
		
	public $data		 = array();
	
	public $listLang = false;
	public $listDisplay = false;
	
	public $listCurrencies = false;
	
	public $ExchangeRate = false;
	
	protected $admin;
	protected $sampleImage = array(
		"url" => "/uploads/sample-icon.png"
	);
	
	protected $adminVar;
	
	function __construct()
	{
		parent::__construct();		
		
		$this->adminVar = $this->session->userdata('adminVar');
		
		//多國語言 環境設定
		$this->load->model("Language_model","mLang");
		( $this->listLang === false ) ? $this->listLang = $this->mLang->load() : "";
		( $this->listDisplay === false ) ? $this->listDisplay = $this->mLang->loadDisplay() : "";
		
		$this->load->model("Currencies_model","mCurrencises");
		( $this->listCurrencies === false ) ? $this->listCurrencies = $this->mCurrencises->load() : "";
				
		session_start();
		$this->load->model("Option_model","Option");
		
		if($this->DEFAULTLANG == false)
		{
			$this->DEFAULTLANG = $this->Option->DEFAULTLANG;
		}
		$this->settingCurrentLang();
		$this->settingCurrentCurrency();
		
		$this->langWidget();		
		$this->currencyWidget();
		
		
		($this->ExchangeRate == false)?$this->ExchangeRate = $this->Option->ExchangeRate:"";
		
		
		$this->load->library('adminilib');
		$this->data['admin'] = $this->admin = $this->adminilib->isLoggedIn();
		
		$this->data['css_include'] = "Dashboard";
				
		$this->load->model("Bkmenutype_model","mBKMT");
		$this->load->model("Bkmenu_model","mBKM");
		
		$listBKMT = $this->mBKMT->load();
		$listBKM  = $this->mBKM->load();
		$listBKMenu = array();
		$listBKMenu = $this->findChidrensByTypeId($listBKM, $listBKMT, 0);
	
		foreach( $listBKMenu AS &$menu )
		{
			$child = array();
			$child = $this->findChidrensByTypeId($listBKM, $listBKMT, $menu["id"]);			
			
			foreach( $child AS &$smenu )
			{
				if( isset($smenu["id"]) && !isset($smenu["path"]) )
				{
					$smenu["child"] = $this->findChidrensByTypeId($listBKM, $listBKMT, $smenu["id"]);
				}					
			}
			$menu["child"] = $child;
		}
		
		$this->data["BKM"] = $listBKMenu;
		
		
		$listBKMenu = array();
		$listBKMenu = $this->findChidrensByTypeId($listBKM, $listBKMT, 0, true);
	
		foreach( $listBKMenu AS &$menu )
		{
			$child = array();
			$child = $this->findChidrensByTypeId($listBKM, $listBKMT, $menu["id"], true);			
			
			foreach( $child AS &$smenu )
			{
				if( isset($smenu["id"]) && !isset($smenu["path"]) )
				{
					$smenu["child"] = $this->findChidrensByTypeId($listBKM, $listBKMT, $smenu["id"], true);
				}					
			}
			$menu["child"] = $child;
		}
		$this->data["BKMN"] = $listBKMenu;		
	}
	
	public function reloadSession()
	{
		$this->adminilib->reloadSession($this->admin["id"]);
	}
	
	private function findChidrensByTypeId($listBKM, $listBKMT, $type_id, $no_rule = false )
	{
		$chidrens = array();
		foreach( $listBKMT AS &$type )
		{
			if( $type_id == $type["type_id"] )
			{					
				$chidrens[$type["sortKey"]] = $type;
				$chidrens[$type["sortKey"]]["type"] = "type";
			}			
		}
		foreach( $listBKM AS &$menu )
		{
			if( $type_id == $menu["type_id"] )
			{
				if( $no_rule === false )
				{
					if( $authMenu = $this->checkAuthBKM($menu) )
					{
						$chidrens[$menu["sortKey"]] = $authMenu;
						$chidrens[$menu["sortKey"]]["type"] = "menu";									
					}
				}
				else
				{
					$chidrens[$menu["sortKey"]] = $menu;
					$chidrens[$menu["sortKey"]]["type"] = "menu";
				}
			}				
		}
		return $chidrens;
	}
	
	private function checkAuthBKM($menu)
	{
		$auth = false;
		if( isset($this->admin["authBKM"]) )
		{
			foreach( $this->admin["authBKM"] AS $authMenu )
			{			
				if( $authMenu["menu_id"] == $menu["id"] && $authMenu["read"] == 1 )
				{
					$auth = $menu;
					$auth["auth"] = $authMenu;
				}
			}
		}
		return $auth;
	}
	
	function langWidget()
	{
		$widgetLang = array();
		foreach( $this->listLang AS &$lang )
		{	
			$widgetLang[$lang["code"]] = array();
			foreach( $this->listLang AS $langB )
			{
				$widgetLang[$lang["code"]][$langB['code']] = ( isset($this->listDisplay[$lang["tag"]][$langB['tag']]) ) ? $this->listDisplay[$lang["tag"]][$langB['tag']]["display"] : $lang["english_name"];
			}
		}
		$this->data["widgetLang"] = $widgetLang;
		
		$htmlListLang = "";
		foreach( $widgetLang AS $code=>$langItem )
		{
			$itemActive = ( $this->currentLang == $code ) ? " class=\"active\"" : "";
			$htmlListLang.="<li role=\"presentation\" {$itemActive} ><a data-langCode=\"{$code}\">{$langItem[$this->currentLang]}</a></li>";			
		}
		$this->data["htmlLang"] = $htmlListLang;
				
		$htmlListLang = "";
		foreach( $widgetLang AS $code=>$langItem )
		{
			$itemActive = ( $this->DEFAULTLANG == $code ) ? " class=\"active\"" : "";
			$htmlListLang.="<li role=\"presentation\" {$itemActive} ><a data-langCode=\"{$code}\">{$langItem[$this->currentLang]}</a></li>";			
		}
		$this->data["htmlLangDefault"] = $htmlListLang;
		
		
		$optListLang = "";
		foreach( $widgetLang AS $code=>$langItem )
		{
			$itemActive = ( $this->DEFAULTLANG == $code ) ? " class=\"selected\"" : "";
			$optListLang.="<option value=\"{$code}\" {$itemActive}>{$langItem[$this->currentLang]}</option>";			
		}
		$this->data["optListLang"] = $optListLang;
		
	}
	
	public function currencyWidget()
	{
		$this->data["widgetCurrency"] = $this->listCurrencies;
		$htmlListCurrency = "";
		foreach( $this->listCurrencies AS &$currencyObj )
		{
			$itemActive = ( $this->currentCurrency == $currencyObj["iso_code"] ) ? " class=\"active\"" : "";
			$htmlListCurrency.="<li role=\"presentation\" {$itemActive} ><a data-ISOCODE=\"{$currencyObj["iso_code"]}\">{$currencyObj["iso_code"]}</a></li>";			
		}
		$this->data["htmlCurrency"] = $htmlListCurrency;
	}
	
	public function convertToMutiLangObj($listObj, $clearObj)
	{
		$newlistObj = array();
		foreach( $this->listLang AS $langObj )
		{
			$finded = false;
			foreach( $listObj AS $obj )
			{
				if( $obj["langCode"] == $langObj["code"] )
				{
					$finded = true;
					$newlistObj[$langObj["code"]] = $obj;
				}
			}
			if( $finded === false )
			{
				$clearObj["langCode"] = $langObj["code"];
				$newlistObj[$langObj["code"]] = $clearObj;
			}
		}
		return $newlistObj;
	}
	
	public function convertToMutiCurrenciesObj($listObj, $clearObj)
	{
		$newlistObj = array();
		foreach( $this->listCurrencies AS $currencyObj )
		{
			$finded = false;
			foreach( $listObj AS $obj )
			{
				if( $obj["currenciesIsoCode"] == $currencyObj["iso_code"] )
				{
					$finded = true;
					$newlistObj[$currencyObj["iso_code"]] = $obj;
				}
			}
			if( $finded === false )
			{
				$clearObj["currenciesIsoCode"] = $currencyObj["iso_code"];
				$newlistObj[$currencyObj["iso_code"]] = $clearObj;
			}
		}
		return $newlistObj;
	}
	
	
	function forceLogin()
	{
		
		if($this->admin == NULL)
		{
			redirect('/admin/login','location','301');
		}
	}
	
	
	public function settingCurrentCurrency()
	{
		($this->DEFAULTCURRENCY == false) ? $this->DEFAULTCURRENCY = $this->Option->DEFAULTCURRENCY : "";
		$currency = (isset($this->adminVar['Currency']))?$this->adminVar['Currency']:$this->DEFAULTCURRENCY;
		/* Currency DATA */
		if( isset($_GET['currency']) )
		{
			// Selector Currency 使用者切換貨幣
			$this->currentCurrency = $_GET['currency'];
			$this->adminVar['Currency'] = $this->currentCurrency;
			$this->session->set_userdata('adminVar',$this->adminVar);
		}
		else
		{	
			// 頁面載入 檢查 session 有，則用session 無，則用預設
			$this->currentCurrency = ( $currency != false )?$currency:$this->DEFAULTCURRENCY;
		}		
		
		$this->adminVar['Currency'] = $this->currentCurrency;
		//將當前語言寫入 session
		( $currency === false ) ? $this->session->set_userdata('adminVar',$this->adminVar) : "";
		$this->data['Currency'] = $this->currentCurrency;
		$this->data['DEFAULTCURRENCY'] = $this->DEFAULTCURRENCY;
	}
	
	public function settingCurrentLang()
	{
		($this->DEFAULTLANG == false) ? $this->DEFAULTLANG = $this->mOption->DEFAULTLANG : "";
		$lang = (isset($this->adminVar['Lang']))?$this->adminVar['Lang']:$this->DEFAULTLANG;
		/* LANG DATA */
		if( isset($_GET['lang']) )
		{
			// Selector Lang 使用者切換語言
			$this->currentLang 	= $_GET['lang'];
			$this->adminVar['Lang'] = $this->currentLang;
			$this->session->set_userdata('adminVar',$this->adminVar);
		}
		else
		{	
			// 頁面載入 檢查 session 有，則用session 無，則用預設
			$this->currentLang = ( $lang != false )?$lang:$this->DEFAULTLANG;
		}		
		
		//將當前語言寫入 session
		( $lang === false ) ? $this->session->set_userdata('adminVar',$this->currentLang) : "";
		$this->data['Lang'] = $this->currentLang;
		$this->data['DEFAULTLANG'] = $this->DEFAULTLANG;
	}
	
	
	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	
	function loadLang( $path )
	{
		$lang_path = LANGPATH . $path;
		$temp_lang_path = $lang_path . $this->currentLang . ".json";	
		$lang_path=(!file_exists($temp_lang_path))?$lang_path."default.json":$temp_lang_path;
		$obj_lang = json_decode( file_get_contents($lang_path),true );		
		return $obj_lang;
	}
	
	public function cloneWithLang($data)
	{
		$widgetLang = array();
		foreach( $this->listLang AS &$lang )
		{	
			$data['langCode'] = $lang["code"];
			$widgetLang[$lang["code"]] = $data;
		}
		return $widgetLang;
	}	
	
	
	function debugOut($data)
	{
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
		exit;
	}
}

class Web_Controller extends CI_Controller
{

	/* 多國語言 變數 */
	public $currentLang  = false;
	public $DEFAULTLANG  = false;
	public $isShowLangSelector = false;
	
	/* 多國貨幣 變數 */
	public $currentCurrency = false;
	public $DEFAULTCURRENCY = false;
	public $isShowCurrencySelector = false;
	
	public $socialLink = false;
	public $debug = false;
	
	public $listLang = false;
	public $listDisplay = false;
	
	public $data		 = array();
	
	public $webVar = array();
	
	protected $self = false;
	
	function __construct()
	{
		parent::__construct();				
		
		ini_set("display_errors","Off");
		
		$this->data['objLang']	 = array();
		$this->data['debugmode'] = false;
		
		@session_start();
		$this->load->library('cart');
		$this->load->library('auth');
		$this->load->library('session');
		
		$this->load->model("Currencies_model","mCurrencies");
		$this->load->model("Option_model","mOption");
		$this->load->model("Widget_model","mWidget");
		$this->load->model("Menu_model","mMenu");
		$this->load->model("User_model","mUser");
		$this->load->model("Pagemeta_model","mPageMeta");	
		$this->load->model("Product_model","mProduct");
		
		$this->webVar = $this->session->userdata('webVar');

		/* https 設置 /
		$hostname = "beautywomantest2.mooo.com";
		if (strtolower($_SERVER['SERVER_NAME'])===$hostname){
			// var_dump($_SERVER);
			if(strrpos($_SERVER['REQUEST_URI'],"/Page/activity")!==0 && strrpos($_SERVER['REQUEST_URI'],"/campaign")!==0 && strrpos($_SERVER['REQUEST_URI'],"/user")!==0 && strrpos($_SERVER['REQUEST_URI'],"/message")!==0 && strrpos($_SERVER['REQUEST_URI'],"/shoppingcart")!==0 ){
// echo "<br>REQUEST_URI=".$_SERVER['REQUEST_URI']; 
// echo "<br>/Page/activity=".strrpos("/Page/activity", $_SERVER['REQUEST_URI']);
// echo "<br>/campaign=".strrpos("/campaign", $_SERVER['REQUEST_URI']);
// echo "<br>/user=".strrpos($_SERVER['REQUEST_URI'],"/user");
// exit;
				header('Location: http://'.$hostname.'/Page/activity');
			}
		}
		elseif (empty($_SERVER['HTTPS'])) 
		{
			header('Location: https://'.$hostname);
			exit;
		}*/

		//驗證碼信箱啟用聯結反饋
		if(isset($_GET["active"]))
		{
			$this->load->library('auth');
			$activeCode = $_GET["active"];
			$result = $this->auth->checkActiveCode($activeCode);
			if( $result == 1  )
			{
				$message = array(
					"status" 	=> "info",
					"title" 	=> "",
					"content" 	=> "會員啟用成功，系統將於5秒後回首頁",
					"auto" 		=> "5000"
				);
				redirect('/message?'.http_build_query($message),'location','301');
			}
		}	
		
		//部落客代碼檢核與轉換
		ini_set("display_errors","On");
		//$this->checkHostCode();
		$this->webVar["hostId"] = 0 ; 
		
		//check is login
		$this->self = $this->data['self'] = $this->auth->isLoggedIn();
		
		$this->cart->init();
		$this->data['cart'] = $this->cart->show();
		
		
		$this->data['showBreadcrumb'] = false;
		$this->data['home'] = site_url('/');
		
		//多國語言 環境設定
		$this->load->model("Language_model","mLang");
		$this->listLang = $this->mLang->load();
		$this->listDisplay = $this->mLang->loadDisplay();
		
		/* 設定 多國語言 */
		$this->settingCurrentLang();
		$this->checkActiveLangForSelector();
		($this->isShowLangSelector == false) ? $this->isShowLangSelector = $this->mOption->isShowLangSelector : "";		
		$this->data["isShowLangSelector"] = $this->isShowLangSelector;
		
		/* 設定 多國貨幣 */
		$this->settingCurrentCurrency();
		$this->init_CurrencySelector();
		($this->isShowCurrencySelector == false) ? $this->isShowCurrencySelector = $this->mOption->isShowCurrencySelector : "";		
		$this->data["isShowCurrencySelector"] = $this->isShowCurrencySelector;
				
		
		$this->data["socialLink"] = $this->mOption->readVal("socialLink");
		
		/* META DATA */
		$url  = $this->get_current_url();
		$path = parse_url($url, PHP_URL_PATH);
		$pageKey = $path == "/" ? "home" : $path;
		$this->data["meta"] = $this->mPageMeta->find($pageKey);
		if( is_string($this->data["meta"]["value"]) )
		{
			$this->data["meta"]["value"] = array( "title" => "", "keywords" => "", "description" => "", "author" => "" );
		}
		
		/* WebSite Logo DATA */
		$this->settingLogo();

		/* 載入網站所需語系檔案 */
		$this->data['objLang']['shoppingcart'] 	= $this->loadLang( "widget/shoppingcart/" );
		$this->data['objLang']['subscribe'] 	= $this->loadLang( "widget/subscribe/" );
		$this->data['objLang']['product'] 		= $this->loadLang( "page/product/" );
		
		/* Function-Menu DATA */
		$this->data["functionBar"] = $this->loadLang( "widget/function_bar/" );
		
		/* Main-Menu DATA */
		$this->data["mainmenu"] = $this->mMenu->Load();
		
		///$this->debugOut($this->data["mainmenu"]);

		/* FOOTER DATA */
		$this->data["footer"] = $this->mWidget->find("footerB");
		
		/* Copyright DATA */
		$this->settingCopyRight();

		//GoogleAnalyticsInfo
		$this->data['GoogleAnalyticsInfo'] = $this->mOption->readVal("GoogleAnalyticsInfo");

		$this->data["ShoppingPointRate"] = (is_int($this->mOption->readVal("ShoppingPointRate"))) ? $this->mOption->readVal("ShoppingPointRate") : 0 ;

		//熱門產品 fot footer
		//$this->data["touchProducts"] = $this->mProduct->touchProducts(8);

		//限時結帳促銷
		$DateLimitCheckoutDiscount = $this->mOption->readVal("DateLimitCheckoutDiscount");
		$DateLimitCheckoutDiscount["inTerm"] = false;
		if( floatval($DateLimitCheckoutDiscount["Rate"]) >= 0.1 )
		{
			$StartDate = strtotime($DateLimitCheckoutDiscount["StartDate"]." 00:00:00");
			$EndDate   = strtotime($DateLimitCheckoutDiscount["EndDate"]." 23:59:59");
			( time() >= $StartDate ) && ( $EndDate >= time() )?$DateLimitCheckoutDiscount["inTerm"] = true:"";	
		}
		$this->data["DateLimitCheckoutDiscount"] = $DateLimitCheckoutDiscount;
		
		$this->setActiveTag();
	}
		
	public function reloadSession()
	{
		$this->auth->reloadSession($this->self["id"]);
	}
	
	function checkHostCode()
	{
		if( is_array( $this->webVar ) )
		{
			( !array_key_exists("hostId",$this->webVar))?$this->webVar["hostId"] = 0:"";
			if( isset($_GET["c"]) )
			{
				$hostId = $this->mUser->findHostIdByCode($_GET["c"]);
				//如果登入狀態 不可以是自己
				$hostId = $this->self !== false && $this->self["id"] == $hostId ? 0 : $hostId;
				$this->webVar["hostId"] = $hostId;
			}		
			$this->session->set_userdata('webVar',$this->webVar);	
		}
	}
	
	function get_current_url($strip = true, $hasReq = true) {
		// filter function
		static $filter;
		$filter = function($input) use($strip) {
			$input = str_ireplace(array(
				"\0", '%00', "\x0a", '%0a', "\x1a", '%1a'), '', urldecode($input));
			if ($strip) {
				$input = strip_tags($input);
			}
			// or whatever encoding you use instead of utf-8
			$input = htmlentities($input, ENT_QUOTES, 'utf-8'); 
			return trim($input);
		};

		$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		return 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '')
			.'://'. $_SERVER['SERVER_NAME'] . ($hasReq === true ? $filter($_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI_PATH']);
	}

	public function settingLogo()
	{
		$logo 					= $this->mWidget->find("LogoBanner");
		$this->data["logo"] 	= isset($logo[0]['value']) ? $logo[0]['value'] : array("url"=>"http://dummyimage.com/100x105/000/f","alt"=>"");
	}
	
	public function settingCopyRight()
	{
		$copyright = "版權所有©宸翔生醫科技有限公司2015 All Rights Reserved. 網站及系統設計: <a href='http://www.ubestshop888.com' target='_break'>UBestSHOP</a>";
		$this->data["copyright"] = $copyright;
	}
	
	public function settingCurrentLang()
	{
		($this->DEFAULTLANG == false) ? $this->DEFAULTLANG = $this->mOption->DEFAULTLANG : "";
		
		$lang = (isset($this->webVar['Lang']))?$this->webVar['Lang']:$this->DEFAULTLANG;
		/* LANG DATA */
		if( isset($_GET['lang']) )
		{
			// Selector Lang 使用者切換語言
			$this->currentLang 	= $_GET['lang'];
			$this->webVar['Lang'] = $this->currentLang;
			$this->session->set_userdata('webVar',$this->webVar);
		}
		else
		{	
			// 頁面載入 檢查 session 有，則用session 無，則用預設
			$this->currentLang = ( $lang != false )?$lang:$this->DEFAULTLANG;
		}		
		
		$this->webVar['Lang'] = $this->currentLang;
		//將當前語言寫入 session
		( $lang === false ) ? $this->session->set_userdata('webVar',$this->webVar) : "";
		$this->data['Lang'] = $this->currentLang;
	}
	
	public function checkActiveLangForSelector()
	{
		
		$currentTag = "";
		foreach( $this->listLang AS &$lang )
		{	
			if( $lang["code"] == $this->currentLang )
			{
				$currentTag = $lang["tag"];
			}
		}
		$widgetLang = array();
		foreach( $this->listLang AS &$lang )
		{	
			$widgetLang[$lang["code"]] = array();
			$widgetLang[$lang["code"]]['display'] = ( isset($this->listDisplay[$lang["tag"]][$currentTag]) ) ? $this->listDisplay[$lang["tag"]][$currentTag]["display"] : $lang["english_name"];
			$widgetLang[$lang["code"]]['src'] = "/libs/images/flags/".$lang["flag"];
			$widgetLang[$lang["code"]]['href'] = base_url("/?lang=".$lang["code"]);
		}
		
		$this->data["selector_lang"] 	= $widgetLang;	
	}
	
	public function cloneWithLang($data)
	{
		$widgetLang = array();
		foreach( $this->listLang AS &$lang )
		{	
			$data['langCode'] = $lang["code"];
			$widgetLang[$lang["code"]] = $data;
		}
		return $widgetLang;
	}	
	
	public function settingCurrentCurrency()
	{
		($this->DEFAULTCURRENCY == false) ? $this->DEFAULTCURRENCY = $this->mOption->DEFAULTCURRENCY : "";
		$currency = (isset($this->webVar['Currency']))?$this->webVar['Currency']:$this->DEFAULTCURRENCY;
		/* Currency DATA */
		if( isset($_GET['currency']) )
		{
			// Selector Currency 使用者切換貨幣
			$this->currentCurrency = $_GET['currency'];
			$this->webVar['Currency'] = $this->currentCurrency;
			$this->session->set_userdata('webVar',$this->webVar);
		}
		else
		{	
			// 頁面載入 檢查 session 有，則用session 無，則用預設
			$this->currentCurrency = ( $currency != false )?$currency:$this->DEFAULTCURRENCY;
		}		
		
		$this->webVar['Currency'] = $this->currentCurrency;
		//將當前語言寫入 session
		( $currency === false ) ? $this->session->set_userdata('webVar',$this->webVar) : "";
		$this->data['Currency'] = $this->currentCurrency;
	}
	
	public function init_CurrencySelector()
	{
		$listCurrencies	= $this->mCurrencies->Load();		
		$newList = array();
		foreach( $listCurrencies as &$row )
		{
			$row["display"] = $row["symbol"] . " - " . $row["iso_code"];
			$row["href"] 	= $this->get_current_url(true,false)."?currency=" . $row["iso_code"];
			$newList[$row["iso_code"]] = $row;
		}
		$this->data["selector_currencies"]		= $newList;
		$this->data["selector_currencies_lang"] = $this->loadLang( "widget/currencies_selector/" );
	}
	
	public function valid( $required )
	{
		$result = array();
		foreach( $required as $k => $v )
		{
			if( array_key_exists( $v, $_REQUEST ) ) //true if the given $v is set in the $_REQUEST.
			{
				$result[$v] =  $_REQUEST[$v];
			}
			else
			{
				$result = false;
				break;
			}
		}
		return $result;
	}
	
	public function setActiveTag($activeTag="")
	{	
		if( $this->uri->segment(1) && $this->uri->segment(1) != "home")
		{
			if( $this->uri->segment(1) )
			{
				$activeTag = $this->checkSegmentExist($activeTag,1);
			}
		}
		else
		{
			$activeTag = "/";
		}
		$this->data["activeTag"] = $activeTag;
	}
	
	public function recursive_mkdir($path, $chmod = 0777)
	{
		  $parent = dirname($path);
		  if (!file_exists($parent)) $this->recursive_mkdir($parent, $chmod);
		  mkdir($path, $chmod);
	}

	function checkSegmentExist($tag, $cnt)
	{
		if( $this->uri->total_segments() >= $cnt ){
			if( $tag != $this->uri->segment($cnt) )
			{
				$tag.= '/'. $this->uri->segment($cnt);
			}
			$cnt++;
			return $this->checkSegmentExist($tag, $cnt);
		} else {
			return $tag;
		}
	}
	
	function GUID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	function loadLang( $path )
	{
		$lang_path = LANGPATH . $path;
		$temp_lang_path = $lang_path . $this->currentLang . ".json";
		$lang_path=(!file_exists($temp_lang_path))?$lang_path. DEFAULTLANG . ".json":$temp_lang_path;
		$obj_lang = json_decode( file_get_contents($lang_path),true );
//echo "<br>path=".$path; var_dump($obj_lang);
		if( $this->debug  === true )
		{
			echo $lang_path . "<br/>\r\n";	
			var_dump(file_get_contents($lang_path));
			echo "<br/>\r\n";
			var_dump( $obj_lang );		
			echo "<br/>\r\n";
		}
		return $obj_lang;
	}
	
	function getUserIP()
	{
		if(isset($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])){
		 $ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
		}
		elseif(isset($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])){
		 $ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
		}
		elseif (isset($HTTP_SERVER_VARS["REMOTE_ADDR"])){
		 $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
		}
		elseif (getenv("HTTP_X_FORWARDED_FOR")){
		 $ip = getenv("HTTP_X_FORWARDED_FOR");
		}
		elseif (getenv("HTTP_CLIENT_IP")){
		 $ip = getenv("HTTP_CLIENT_IP");
		}
		elseif (getenv("REMOTE_ADDR")){
		 $ip = getenv("REMOTE_ADDR");
		}
		else{
		 $ip = "Unknown";
		}
		return $ip;
	}
	
	function debugOut($data)
	{
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
		exit;
	}
	
	 function ReadAllFile($dir = "root_dir/here") 
    { 
        $listDir = array(); 
		
        if($handler = opendir($dir)) { 
            while (($sub = readdir($handler)) !== FALSE) { 
                if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != ".htaccess") { 
                    if(is_file($dir."/".$sub)) {
                        $listDir[] = $sub; 
                    }elseif(is_dir($dir."/".$sub)){ 
                        //$listDir[$sub] = $this->ReadFolderDirectory($dir."/".$sub); 
                    } 
                } 
            }    
            closedir($handler); 
        } 
        return $listDir;    
    } 	
	
	function read_all_files($root = '.'){ 
	  $files  = array('files'=>array(), 'dirs'=>array()); 
	  $directories  = array(); 
	  $last_letter  = $root[strlen($root)-1]; 
	  $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR; 
	  
	  $directories[]  = $root; 
	  
	  while (sizeof($directories)) { 
		$dir  = array_pop($directories); 
		if ($handle = opendir($dir)) { 
		  while (false !== ($file = readdir($handle))) { 
			if ($file == '.' || $file == '..') { 
			  continue; 
			} 
			$file  = $dir.$file; 
			if (is_dir($file)) { 
			  $directory_path = $file.DIRECTORY_SEPARATOR; 
			  array_push($directories, $directory_path); 
			  $files['dirs'][]  = $directory_path; 
			} elseif (is_file($file)) { 
			  $files['files'][]  = $file; 
			} 
		  } 
		  closedir($handle); 
		} 
	  } 
	  
	  return $files; 
	} 
}

class User_Controller extends Web_Controller
{

	public $currentUser  = false;
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('auth');
		//check is login
		$this->auth->isLoggedIn();
		
		$this->currentUser = $this->auth->getUserAuth();
		
		$this->currentLang = $this->currentUser['langCode'];
		
		if(isset($_COOKIE['lang']))
		{
			$this->currentLang = $_COOKIE['lang'];
		}
		else 
		{
			if($this->input->cookie('lang'))
			{
				$this->currentLang = $this->input->cookie('lang');
			}
		}
		
		
		$this->data['home'] = site_url('/');
	}

}