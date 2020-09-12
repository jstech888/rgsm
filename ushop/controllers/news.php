<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends Web_Controller {

	private $limit = 5;
	private $page = 1;
	private $maxPage = 0;
	private $layout = "grid";
	private $pSort = "timeDesc";

	function __construct()
	{
		parent::__construct();
		$this->load->model("News_model","News_model");

		$this->data["pSort"] = $this->pSort = isset($_GET["s"])? urldecode($_GET["s"]):"timeDesc";
		$this->data["limit"] = $this->limit = isset($_GET["l"])? $_GET["l"]: $this->limit;
		$this->data["page"] = $this->page = isset($_GET["p"])? $_GET["p"]:1;
		$this->data["layout"] = $this->layout = isset($_GET["ly"])? urldecode($_GET["ly"]):"grid";
	}

	public function index()
	{
        $this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
        $this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
        $this->data["objLang"]["bloger"] = $this->loadLang("widget/blog/");

        $this->load->model("News_model");
        $page  = isset($_GET["p"])? $_GET["p"]:$this->page;
        $limit = isset($_GET["l"])? $_GET["l"]:$this->limit;
        $start = ( $page - 1 ) * $limit;

        $currentClass["id"] = 1;
        $coutClassArtical = $this->News_model->countClassHome($currentClass["id"]);
        $lastPage = ceil( $coutClassArtical  / $limit );

        $showPrev = ( $page - 1 === 0 ) ? false : true;
        $showNext = ( $page >= $lastPage ) ? false : true;

        $this->data["listStory"] = $this->News_model->classHome($currentClass["id"], $start, $limit, "markDate" );
        $listStory = $this->News_model->classHome( $currentClass["id"], $start, $limit, "markDate" );
        $this->maxPage = $lastPage;
        $this->init_pagination();

        $this->data["hotStory"]  = $this->News_model->classHome( $currentClass["id"], 0, 5 );

        $allBloger  = $this->News_model->allBloger();
        $classBloger = array();
        foreach($allBloger AS $bloger)
        { ( in_array($currentClass["id"], $bloger["arrBClass"]))?$classBloger[]=$bloger:""; }
        $this->data["classBloger"]  = $classBloger;

        $this->data["layout"] = isset($_GET["lyt"])?$_GET["lyt"]:"list";

        if($_GET['s_year']!=''){
            $this->data['s_year'] = $_GET['s_year'];
        }

        $this->load->view('inc/head',$this->data);
        $this->load->view('news/index',$this->data);
        $this->load->view('inc/footer',$this->data);
	}
	
	public function detail($id = false)
	{
		if( $id !== false )
		{
			$this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
			//活動廣告輪播
			$this->data["activityWidgetSlider"] = $this->mWidget->find("activityWidgetSlider");
			
			$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
			$this->data["objLang"]["bloger"] = $this->loadLang("widget/blog/");
			$this->data["objLang"]["product"] = $this->loadLang("page/product/");
			
			$this->data["id"] = $id;
			$this->load->model("News_model");	
			$this->load->model("Blog_model");
			$this->load->model("User_exinfo_model");
			$this->load->model("Product_model");
			
			$arr_article = $this->News_model->admin_find("news", $id);
			if( count($arr_article) > 0 )
			{
				
				$listMessage = $this->News_model->findResponseMessage($id);
				foreach( $listMessage AS &$msg )
				{ 
					$msg["showTime"] = $this->convertTimeTag($msg["createTime"]);
				}
				$this->data["listMessage"] = $listMessage;
				
				$allClass = $this->News_model->allClass();	
				rsort($allClass);
				$this->data["allClass"]  = $allClass;
				
				//替換日期 
				$php_date = getdate(strtotime($arr_article[0]["raw-date"]));
				$this->data['News_date'] = $php_date;	
				//整理標籤 
				$arr_article[0]["arrTag"] = explode(",",$arr_article[0]["tag"]);	
				//放置本頁文章
				$this->data['article'] = $arr_article[0];
				
				$this->data["og"] = array(
					"url" => base_url("/news/detail/".$id),
					"type" => "article",
					"title" => $arr_article[0]["blog-title"],
					"description" => strip_tags($arr_article[0]['blog-content']),
					"image" => base_url($arr_article[0]['blog-extra']["url"])
				);	
		
				//找出本篇文章之版主
				$this->data['blog']	= $this->Blog_model->find($arr_article[0]["author"]);
				$bloger = $this->mUser->findUserById($arr_article[0]["author"]);
				$bloger[0]["picture"] = json_decode($bloger[0]["picture"],true);
				$this->data['bloger'] = $bloger[0];	
				
				//版主最新文章
				$authorLastArticle = $this->News_model->admin_find("news", false, $arr_article[0]["author"]);
				$this->data["authorLastArticle"] = $authorLastArticle;
				
				//版主推薦商品
				$recProduct = $this->User_exinfo_model->findUserById ( $arr_article[0]["author"], "recommend" );
				( count( $recProduct ) > 0 ) ? $recProduct = $this->Product_model->find( implode(",",json_decode($recProduct[0]["value"])) ) : "";
				$this->data["recProduct"] = $recProduct;		
				
				$this->data["TotalRaty"] = $this->mOption->readString("TotalRaty");
								
				$this->load->view('inc/head',$this->data);
				$this->load->view('news/_news',$this->data);
				// $this->load->view('news/index',$this->data);
				$this->load->view('inc/footer',$this->data);	
				
				/*
				UNSET($this->webVar['blogTouch']);
				$this->session->set_userdata('webVar',$this->webVar);
				*/
				if( array_key_exists( 'blogTouch', $this->webVar ) )
				{	
					if( count($this->webVar['blogTouch']) > 9 )
					{
						UNSET($this->webVar['blogTouch']);
						$this->webVar['blogTouch'] = array();
						$this->webVar['blogTouch'][$arr_article[0]["id"]] = array(
							"AID" => $arr_article[0]["id"],
							"ClassKey" => $arr_article[0]["classKey"],
							"blogerId" => $bloger[0]["id"],
							"time" => date("Y-m-d H:i:s"),
							"IP" => $this->getUserIP()
						);
						$this->session->set_userdata('webVar',$this->webVar);	
					}
					else
					{
						if( !array_key_exists( $arr_article[0]["id"], $this->webVar['blogTouch'] ) )
						{
							$this->webVar['blogTouch'][$arr_article[0]["id"]] = array(
								"AID" => $arr_article[0]["id"],
								"ClassKey" => $arr_article[0]["classKey"],
								"blogerId" => $bloger[0]["id"],
								"time" => date("Y-m-d H:i:s"),
								"IP" => $this->getUserIP()
							);
							$this->session->set_userdata('webVar',$this->webVar);	
						}
					}
				}
				else
				{
					$this->webVar['blogTouch'] = array();
					$this->webVar['blogTouch'][$arr_article[0]["id"]] = array(
						"AID" => $arr_article[0]["id"],
						"ClassKey" => $arr_article[0]["classKey"],
						"blogerId" => $bloger[0]["id"],
						"time" => date("Y-m-d H:i:s"),
						"IP" => $this->getUserIP()
					);
					$this->session->set_userdata('webVar',$this->webVar);					
				}
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

	public function touch()
	{
		ini_set("display_errors","On");
		if( array_key_exists( 'blogTouch', $this->webVar ) )
		{
			if( count($this->webVar['blogTouch']) > 9 )
			{				
				UNSET($this->webVar['blogTouch']);
				$this->session->set_userdata('webVar',$this->webVar);
			}
			else
			{
				$this->load->model("News_model");	
				foreach( $this->webVar['blogTouch'] AS &$touch )
				{
					echo $touch["AID"].",".$touch["ClassKey"].",".$touch["blogerId"].",".$touch["time"].",".$touch["IP"]."<br/>";
					//停留超過 5秒可以計次
					$limit = strtotime($touch["time"]." +5 seconds");
					echo date("Y-m-d H:i:s",$limit)."<br/>\r\n";
					
					if( time() - $limit > 0 )
					{
						$result = $this->News_model->touchArticle( $touch["AID"], $touch["ClassKey"], $touch["blogerId"] );
						echo "touch touchArticle:".$result."<br/>";
						//每計次一次後，同IP下次計次時間，為20分鐘後
						$newTime = date("Y-m-d H:i:s",strtotime($touch["time"]." +20 minutes"));
						$touch["time"] = $newTime;
						echo "touch next-time:".$newTime."<br/>\r\n";
					}
				}
				$this->session->set_userdata('webVar',$this->webVar);
			}
		}
	}
	
	public function reply()
	{
		if( 
			$this->self !== false &&
			isset($_POST["aid"]) &&
			isset($_POST["msg"])
		)
		{		
			$this->load->model("News_model");	
			$this->News_model->replyMessage( $_POST["aid"], $this->self["id"], $_POST["msg"]);
		}
	}
	
	public function msgtoblog()
	{
		if( 
			$this->self !== false &&
			isset($_POST["bid"]) &&
			isset($_POST["msg"])
		)
		{		
			$this->load->model("Blog_model");	
			$this->Blog_model->msgToBlog( $_POST["bid"], $this->self["id"], $_POST["msg"]);
		}
	}
	
	private function convertTimeTag($dateTime)
	{
		$deltaTime = time() - strtotime( $dateTime );
		$showTime = $deltaTime.$this->data["objLang"]["bloger"]["s"];
		( $deltaTime > 60 && $deltaTime < 3600 ) ? $showTime = floor($deltaTime/60).$this->data["objLang"]["bloger"]["m"] : "";
		( $deltaTime > 3600 && $deltaTime < 86400 ) ? $showTime = floor($deltaTime/3600).$this->data["objLang"]["bloger"]["h"] : "";
		( $deltaTime > 86400 && $deltaTime < 2592000 ) ? $showTime = floor($deltaTime/86400).$this->data["objLang"]["bloger"]["d"] : "";
		( $deltaTime > 2592000 && $deltaTime < 31104000 ) ? $showTime = floor($deltaTime/2592000).$this->data["objLang"]["bloger"]["mt"] : "";
		( $deltaTime > 31104000 ) ? $showTime = floor($deltaTime / 31104000).$this->data["objLang"]["bloger"]["y"] : "";
		return $showTime;
	}
	
	public function moderators($id = false)
	{
		if( $id !== false )
		{
			$this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
			//活動廣告輪播
			$this->data["activityWidgetSlider"] = $this->mWidget->find("activityWidgetSlider");
			
			$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
			$this->data["objLang"]["bloger"] = $this->loadLang("widget/blog/");
			$this->data["objLang"]["product"] = $this->loadLang("page/product/");
			
			$this->load->model("News_model");	
			$this->load->model("Blog_model");
			$this->load->model("User_exinfo_model");
			$this->load->model("Product_model");
			$user = $this->mUser->findUserById($id);
			$blog = $this->Blog_model->find($id);
			$arrMod = array(1,2,5);
			if( in_array($user[0]["group_id"], $arrMod) && $blog["id"] != -1 )
			{
				//版主基本資料
				$user[0]["picture"] = json_decode($user[0]["picture"],true);
				$this->data["bloger"] = $user[0];
				$this->data["blog"] = $blog;
				
				//版主最新文章
				$authorLastArticle = $this->News_model->admin_find("blog", false, $id, "markDate" );
				foreach( $authorLastArticle AS &$article )
				{ 
					$article["showTime"] = $this->convertTimeTag($article["raw-date"]);
				}
				$this->data["authorLastArticle"] = $authorLastArticle;
				
				//版主熱門文章
				$authorHotArticle = $this->News_model->admin_find("blog", false, $id, "touch" );
				foreach( $authorHotArticle AS &$story )
				{
					$bloger = $this->mUser->findUserById($story["author"]);
					$bloger[0]["picture"] = json_decode($bloger[0]["picture"],true);
					$story['bloger'] = $bloger[0];
				}
				
				$page  = isset($_GET["p"])?$_GET["p"]:1;
				$limit = isset($_GET["l"])?$_GET["l"]:12;
				$start = ( $page - 1 ) * $limit;
				
				$coutClassArtical = count($authorHotArticle);
				$lastPage = ceil( $coutClassArtical  / $limit );
				
				$showPrev = ( $page - 1 === 0 ) ? false : true;
				$showNext = ( $page == $lastPage ) ? false : true;
				
				$this->data["page"] = $page;
				$this->data["totalPage"] = $lastPage;
				$this->data["showPrev"] = $showPrev;
				$this->data["showNext"] = $showNext;
				
				$authorHotArticle = array_chunk($authorHotArticle,$limit);
				
				$this->data["authorHotArticle"] = $authorHotArticle;
				
				$this->data["layout"] = isset($_GET["lyt"])?$_GET["lyt"]:"list";
				
				//版主推薦商品
				$recProduct = $this->User_exinfo_model->findUserById ( $id, "recommend" );
				if(count($recProduct) > 0)
				{
					$recProduct = $this->Product_model->find( implode(",",json_decode($recProduct[0]["value"])) );					
				}
				$this->data["recProduct"] = $recProduct;
				
				$this->data["TotalRaty"] = $this->mOption->readString("TotalRaty");
				$this->load->view('inc/head',$this->data);
				$this->load->view('blog/mod',$this->data);
				$this->load->view('inc/footer',$this->data);	
			}
		}
		else
		{
			redirect("/","location","301");
		}
	}

	private function init_pagination()
	{
		if( $this->maxPage > 0 )
		{
			$this->data["currentPage"] 	= $this->page;
			$this->data["prevPage"] 	= ($this->page == 1)? false:$this->page-1;
			$this->data["nextPage"] 	= ($this->page == $this->maxPage)?false:$this->page+1;
			$this->data["maxPage"] 		= $this->maxPage;
		}
		else
		{
			$this->data["currentPage"] 	= 1;
			$this->data["prevPage"] 	= false;
			$this->data["nextPage"] 	= false;
			$this->data["maxPage"] 		= 1;
		}
// echo "<br>currentPage=".$this->data["currentPage"].", prevPage=".$this->data["prevPage"].", nextPage=".$this->data["nextPage"].", maxPage=".$this->data["maxPage"]; 
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */