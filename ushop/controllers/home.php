<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Web_Controller {

    function __construct()
    {
        parent::__construct();
    }

    /*public function test01()
    {
        $this->load->view('home/index01',$this->data);
    }*/

	public function index()
	{
	/*
        header('Access-Control-Allow-Origin: *');

		$this->load->view('home/commingsoon',$this->data);
	}

	public function test()
	{*/

		$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
		//$this->data["objLang"]["bloger"] = $this->loadLang("widget/blog/");
		$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );

		$this->load->model("Product_model",'mProduct');
		$this->load->model("Article_model",'mArticle');

		//大圖輪播
//		$this->data["HomeSlider"] = $this->mWidget->find("HomeSlider");
//		$this->data["WHSlidertEffect"] = $this->mOption->readVal("WHSlidert-Effect");

		//小圖輪播
		//$adList = $this->mWidget->find("adList");
		//$this->data["adList"] = $adList[0];

		//精選產品
		/*$ProductNavTabs = $this->mWidget->find("ProductNavTabs");
		$listProd = array();
		if( is_array($ProductNavTabs[0]["value"]) && count( $ProductNavTabs[0]["value"] ) >  0 )
		{
			$listProd = $this->mProduct->find( implode(",",$ProductNavTabs[0]["value"]) );
			uasort($listProd,'cmp');
		}
		$ProductNavTabs[0]["listProduct"] = $listProd;
		$this->data["ProductNavTabs"] = $ProductNavTabs[0];*/

		//格狀廣告
		//$GridBlockOne = $this->mWidget->find("GridBlock1");
		//$this->data["GridBlockOne"] = $GridBlockOne[0];

//		$GridBlock = $this->mWidget->find("GridBlock");
//		$this->data["GridBlock"] = $GridBlock[0];

		//美妝部落
		//$this->data["hotStory"]  = $this->mArticle->classHome( false, 0, 8 );

		//最新消息
		//$hotNews = $this->mWidget->find("News");
//		$listNews = ( count( $hotNews[0]["value"]["ids"] ) > 0 )?$this->mArticle->findBrand(implode(",",$hotNews[0]["value"]["ids"])):array();
//		$newsCount = ( count( $hotNews[0]["value"]["ids"] ) > 0 )?count(implode(",",$hotNews[0]["value"]["ids"])):1 ;
//		$itemListNews = array_chunk($listNews,2);
//		$this->data["NewsTitle"] = isset($hotNews[0]["value"]["title"])?$hotNews[0]["value"]["title"]:"";
//		$this->data["itemListNews"] = $itemListNews;

		//會員權益
		$this->data["MemberRight"] = $this->mWidget->find("MemberRight");

        // 關於我們
		$this->load->model("Page_model","mPage");
        $infopage =  $this->mPage->find('about', $this->currentLang);
        $this->data["infopage"] = $infopage[$this->currentLang];

		$this->load->view('inc/head',$this->data);
		$this->load->view('home/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}

	public function subscribe()
	{
		if( isset($_POST["email"]) && !empty($_POST["email"]) )
		{
			$email = strtolower($_POST["email"]) ;
			$langSubscribe = $this->loadLang("widget/subscribe/");
			$actionType = "subscribe" ;
			//get param
			if( isset($_POST["actionType"]) ){
				$actionType = $_POST["actionType"] ;
			}

			if ( $actionType == "subscribe" ){   //訂閱
				$param = array(
					"status" 	=> "error",
					"title"		=> $langSubscribe["addRepeatSubscriptionTitle"],
					"content"	=> $langSubscribe["addRepeatSubscriptionContent"],
					"auto"		=> "3000"
				);
				$this->load->model("Subscribe_model","mSubscribe");
				$result = $this->mSubscribe->saveOrUpdate(array("mail"=>$email,"flag"=>"1"));

				if( $result == 1 )
				{
					$response = array();
					$param['code'] 		= 'info';
					$param['title'] 	= $langSubscribe["addSuccessTitle"];
					$param['content'] 	= $langSubscribe["addSuccessContent"];

				}
				redirect("/message?".http_build_query($param));
			}
			else if ( $actionType == "cancel" ){   //取消訂閱
				$param = array(
					"status" 	=> "error",
					"title"		=> $langSubscribe["addRepeatSubscriptionTitle"],
					"content"	=> $langSubscribe["addRepeatSubscriptionContent"],
					"auto"		=> "3000"
				);
				$this->load->model("Subscribe_model","mSubscribe");
				$result = $this->mSubscribe->saveOrUpdateCancel(array("mail"=>$email,"flag"=>"0"));

				if( $result == 0 )  // 尚未在本站訂閱 無需取消
				{
					$response = array();
					$param['code'] 		= 'info';
					$param['title'] 	= $langSubscribe["cancelSuccessWithNoOrder"];
					$param['content'] 	= "" ;

				}
				else if( $result == 1 )  // 取消 訂閱 成功
				{
					$response = array();
					$param['code'] 		= 'info';
					$param['title'] 	= $langSubscribe["cancelSuccessTitle"];
					$param['content'] 	= "" ;

				}
				redirect("/message?".http_build_query($param));
			}
			else
			{
				redirect("/","location","301");
			}

		}
		else
		{
			redirect("/","location","301");
		}
	}

    public function pushNotification()
    {
        $this->data['debugmode'] = true;
        $this->data['viewmode'] = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if( isset($_POST["userId"]) &&
                isset($_POST["message"])
            )
            {
                $this->mUser->pushNotification($_POST["userId"],$_POST["message"]);
            }
        }

        $this->data['userList'] = $this->mUser->findAll();
        $this->load->view('inc/head',$this->data);
        $this->load->view('home/pushNotification',$this->data);
        $this->load->view('inc/footer',$this->data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */