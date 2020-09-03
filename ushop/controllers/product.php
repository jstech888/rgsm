<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends Web_Controller {
	private $limit = 12;
	private $page = 1;
	private $maxPage = 0;
	private $layout = "grid";
	private $pSort = "timeDesc";

	function __construct()
	{
		parent::__construct();
		$this->load->model("Product_model","ProductM");
		$this->load->model("Option_model","OptionM");
		
		$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
		$this->data["pSort"] = $this->pSort = isset($_GET["s"])?urldecode($_GET["s"]):"timeDesc";
		$this->data["limit"] = $this->limit = isset($_GET["l"])?$_GET["l"]:12;
		$this->data["page"] = $this->page = isset($_GET["p"])?$_GET["p"]:1;
		$this->data["layout"] = $this->layout = isset($_GET["ly"])?urldecode($_GET["ly"]):"grid";
	}

	public function index()
	{
		if( isset($_POST["keyword"]) || isset($_GET["keyword"]) )
		{
			$keyword = "" ;
			( isset($_POST["keyword"]) ) ? $keyword = $_POST["keyword"] : "" ;
			( isset($_GET["keyword"]) ) ? $keyword = $_GET["keyword"] : "" ;

			$this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
			$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
			$functionBarLang =  $this->loadLang("widget/function_bar/");
			$this->data["objLang"]["function_bar"] = $functionBarLang ;

			//$this->data["listProduct"] = $this->ProductM->queryKeyword($_POST["keyword"]);
			$listAllCatelogProduct = $this->ProductM->queryKeyword($keyword);

			$this->flatListProduct($listAllCatelogProduct);
			$this->sortListProduct($listAllCatelogProduct);

			//篩選掉目錄與沒有上架的
			$ListCurrentChildProduct = array();
			foreach($listAllCatelogProduct AS $product)
			{
				if( ( $product["status"] == 1 || $product["status"] == 3 ) && $product["Shelves"] === true )
				{
					$ListCurrentChildProduct[] = $product;
				}
			}
			$ListCurrentChildProduct = array_chunk($ListCurrentChildProduct,$this->limit);
			$this->maxPage = count($ListCurrentChildProduct);
			$this->data["listAllCatelogProduct"] = array_key_exists($this->page-1, $ListCurrentChildProduct)?$ListCurrentChildProduct[$this->page-1]:array();
			$this->init_pagination();

			$this->data["pageTitle"] = isset($functionBarLang["searchResult"] )? $functionBarLang["searchResult"] :""  ;
			$this->data["keyword"] = $keyword ;
			$this->load->view('inc/head',$this->data);
			$this->load->view('product/result',$this->data);
			$this->load->view('inc/footer',$this->data);
		}
		else
		{
			redirect("/","location",301);
		}
	}

	public function event( $mainkey = false )
	{
		if( $mainkey === false )
		{
			redirect("/","location",301);
		}
		if( $mainkey == "newarrival" || $mainkey == "realtimeproduct" || $mainkey == "instock"  )
		{
			//1 .最新商品=> newarrival
			//2. 即時連線=> realtimeproduct
			//3. 現貨專區=> instock
			$searchKey = "" ;
			($mainkey == "newarrival")? $searchKey = "ProductNavTabsHot" :"" ;
			($mainkey == "realtimeproduct")? $searchKey = "ProductNavTabsReal" :"" ;
			($mainkey == "instock")? $searchKey = "ProductNavTabsStock" :"" ;

			$this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
			$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
			$functionBarLang =  $this->loadLang("widget/function_bar/");
			$this->data["objLang"]["function_bar"] = $functionBarLang ;

			//精選產品
			$ProductNavTabs = $this->mWidget->find($searchKey);
			$listAllCatelogProduct = array();
			if( is_array($ProductNavTabs[0]["value"]) && count( $ProductNavTabs[0]["value"] ) >  0 )
			{
				$listAllCatelogProduct = $this->mProduct->find( implode(",",$ProductNavTabs[0]["value"]) );
			}

			$this->flatListProduct($listAllCatelogProduct);
			$this->sortListProduct($listAllCatelogProduct);

			//篩選掉目錄與沒有上架的
			$ListCurrentChildProduct = array();
			foreach($listAllCatelogProduct AS $product)
			{
				if( ( $product["status"] == 1 || $product["status"] == 3 ) && $product["Shelves"] === true )
				{
					$ListCurrentChildProduct[] = $product;
				}
			}
			$ListCurrentChildProduct = array_chunk($ListCurrentChildProduct,$this->limit);
			$this->maxPage = count($ListCurrentChildProduct);
			$this->data["listAllCatelogProduct"] = array_key_exists($this->page-1, $ListCurrentChildProduct)?$ListCurrentChildProduct[$this->page-1]:array();
			$this->init_pagination();

			$this->data["pageTitle"] = isset($functionBarLang[$mainkey] )? $functionBarLang[$mainkey] :""  ;

			$this->load->view('inc/head',$this->data);
			$this->load->view('product/result',$this->data);
			$this->load->view('inc/footer',$this->data);
		}
		else
		{
			redirect("/","location",301);
		}

	}

	public function catelog( $mainkey = false )
	{
		if( $mainkey === false )
		{
			redirect("/","location",301);
		}

		//活動廣告輪播
		//$this->data["activityWidgetSlider"] = $this->mWidget->find("activityWidgetSlider");

		$selfData = $this->ProductM->queryCatelogSelf( $mainkey );
		if( $selfData === false )
		{
			redirect("/","location",301);
		}
		$this->data['selfData'] = $selfData;
		$this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
		$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );

		//品牌列表
		$this->data["BrandList"] = $this->mWidget->find("BrandList");

		//商品 目錄
		$this->data["ProductSlider"] = $this->mWidget->find("ProductSlider");
		$listChild = $this->ProductM->listAllCatelogForFrontEnd();
		$this->data['listChild'] = $listChild;

		//商品子目選項
		$listAllCatelogProduct = $this->ProductM->listAllCatelogProduct($selfData["PID"]);
		//$this->data['listAllCatelogProduct'] = $listAllCatelogProduct;
		$this->flatListProduct($listAllCatelogProduct);
		$this->sortListProduct($listAllCatelogProduct);

		//篩選掉目錄與沒有上架的
		$ListCurrentChildProduct = array();
		foreach($listAllCatelogProduct AS $product)
		{
			if( ( $product["status"] == 1 || $product["status"] == 3 ) && $product["Shelves"] === true )
			{
				$ListCurrentChildProduct[] = $product;
			}
		}
		$ListCurrentChildProduct = array_chunk($ListCurrentChildProduct,$this->limit);
		$this->maxPage = count($ListCurrentChildProduct);
		$this->data["listAllCatelogProduct"] = array_key_exists($this->page-1, $ListCurrentChildProduct)?$ListCurrentChildProduct[$this->page-1]:array();
		$this->init_pagination();

//print_r( $listAllCatelogProduct ) ;
		//新上商品
		/*$newListProduct = array();
		$this->listAllProductFromCatelog($listChild, $newListProduct);
		uasort($newListProduct,'cmp');
		$this->data['newListProduct'] = $newListProduct;*/

		//熱門排行榜
		/*$this->load->model("Option_model","mOption");
		$listAllChild = $this->ProductM->listAllCatelogProduct(0);
		$hotListProduct = array();
		$this->listAllProductFromCatelog($listAllChild, $hotListProduct);
		uasort($hotListProduct,'cmphot');
		$this->data['hotListProduct'] = $hotListProduct;
		$this->data['TotalRaty'] = $this->mOption->readString("TotalRaty");*/

		//商品父層項目
		$parentProduct = $this->ProductM->listAllCatelog($selfData["PID"]);
		krsort($parentProduct);
		$this->data["parentProduct"] = $parentProduct;
		if( count($parentProduct) >=2 )    //
		{
			foreach( $parentProduct AS $c ) {
				$mainkey = $c["detailKey"] ;
				break;
			}
		}

		$catelogID = "" ;
		$catelogSrc = "" ;
		foreach( $parentProduct AS $c )
        {
        	if ( $c["parentId"] == "0" )
        	{
        		if ( $c["src"] != "/uploads/sample-icon.png"){
        			$catelogSrc =  $c["src"] ;
        		}
        		$catelogID = $c["PID"] ;
        	}
        }
        $this->data["catelogSrc"] = $catelogSrc;
        $this->data['catelogID'] = $catelogID;

		$this->data["mainkey"] = $mainkey;
		$this->load->view('inc/head',$this->data);
		$this->load->view('product/catelog',$this->data);
		$this->load->view('inc/footer',$this->data);
	}

	// 活動館瀏覽
	public function hall( $id = false )
	{
	    if( $id === false )
	    {
	        redirect("/","location",301);
	    }

	    $this->load->model("hall_model","hallM");

	    $selfData = $this->hallM->getById($id);

	    if( $selfData === false )
	    {
	        redirect("/","location",301);
	    }

	    $now = strtotime('now');

	    // 確認狀態
	    if ($selfData['hall']['status'] != 1)redirect("/","location",301);

	    // 確認開啟時間
	    if ($now < strtotime($selfData['hall']['start_date']) || $now > strtotime($selfData['hall']['end_date'].' 23:59:59'))redirect("/","location",301);

	    // 取得名稱與描述
	    $selfData['hall']['name'] = $selfData['hall_lang'][$this->currentLang]['name'];
	    $selfData['hall']['desc'] = $selfData['hall_lang'][$this->currentLang]['hall_desc'];

	    $this->data['selfData'] = $selfData['hall'];
	    $this->data['objLang']['catelog'] = $this->loadLang( "page/catelog/" );
	    $this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
	    $this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");

	    // 取得所有館別
	    $this->data['halls'] = $this->hallM->findEffectHall();

	    //商品 目錄
	    $listChild = $this->ProductM->listAllCatelogForFrontEnd();
	    $this->data['listChild'] = $listChild;

	    //商品子目選項
	    //$listAllCatelogProduct = $this->ProductM->listAllCatelogProduct($selfData["PID"]);
	    $listAllCatelogProduct = $this->ProductM->listProductByIds($selfData["hall"]['product_ids']);
	    $this->sortListProduct($listAllCatelogProduct);

	    //篩選掉目錄與沒有上架的
	    $ListCurrentChildProduct = array();
	    foreach($listAllCatelogProduct AS $product)
	    {
	        if( ( $product["status"] == 1 || $product["status"] == 3 ) && $product["Shelves"] === true )
	        {
	            $ListCurrentChildProduct[] = $product;
	        }
	    }
	    $ListCurrentChildProduct = array_chunk($ListCurrentChildProduct,$this->limit);
	    $this->maxPage = count($ListCurrentChildProduct);
	    $this->data["listAllCatelogProduct"] = array_key_exists($this->page-1, $ListCurrentChildProduct)?$ListCurrentChildProduct[$this->page-1]:array();
	    $this->init_pagination();

	    //商品父層項目
	    $parentProduct = $this->ProductM->listAllCatelog();
	    krsort($parentProduct);
	    $this->data["parentProduct"] = $parentProduct;
	    if( count($parentProduct) >=2 )    //
	    {
	        foreach( $parentProduct AS $c ) {
	            $mainkey = $c["detailKey"] ;
	            break;
	        }
	    }
// var_dump($parentProduct); exit;
	    $catelogID = "" ;
	    $catelogSrc = "" ;
	    foreach( $parentProduct AS $c )
	    {
	        if ( $c["parentId"] == "0" )
	        {
	            if ( $c["src"] != "/uploads/sample-icon.png"){
	                $catelogSrc =  $c["src"] ;
	            }
	            $catelogID = $c["PID"] ;
	        }
	    }
	    $this->data["catelogSrc"] = $catelogSrc;
	    $this->data['catelogID'] = $catelogID;

	    $this->data["mainkey"] = '';
	    $this->load->view('inc/head',$this->data);
	    $this->load->view('product/hall',$this->data);
	    $this->load->view('inc/footer',$this->data);
	}

	private function listAllProductFromCatelog($catelog, &$listProduct)
	{
		foreach( $catelog AS $child )
		{
			if( $child["status"] == 1 )
			{
				$newRecord = $child;
				UNSET($newRecord["child"]);
				$listProduct[] = $newRecord;
			}
			else
			{
				if( count($child["child"]) > 0 )
				{
					$this->listAllProductFromCatelog($child["child"], $listProduct);
				}
			}
		}
	}

	private function liteCatelogCreator($arr_rest,$lel = 0,$sep = "")
	{
		$new_rs = array();
		if( is_array( $arr_rest ) )
		{
			$gap 	= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$new_row = $arr_rest;
			$new_row['level'] = "level-".$lel;
			$new_row['title'] = $sep.$new_row['title'];
			if(  is_array( $arr_rest['subtitle'] ) && count($arr_rest['subtitle']) > 0 )
			{
				$lel++;
				$sep = $sep.$gap;
				$new_row['subtitle'] = $this->liteCatelogCreator($arr_rest['subtitle'],$lel,$sep);
			}
			$new_rs[] = $new_row;
		}
		return $new_rs;
	}

	private function liteCatelogShow($arr_rest,$lel = 0,$sep = "")
	{
		$new_rs = "";
		if( is_array( $arr_rest ) )
		{
			$gap 	= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			$new_rs = $new_rs . "<option class=\"level-".$lel."\" value=\"".$arr_rest['links']."\">".$sep.$arr_rest['title']."</option>";
			if(  is_array( $arr_rest['subtitle'] ) && count($arr_rest['subtitle']) > 0 )
			{
				$lel++;
				$sep = $sep.$gap;
				$new_rs = $new_rs . $this->liteCatelogShow($arr_rest['subtitle'],$lel,$sep);
			}
		}
		return $new_rs;
	}

	public function detail($query)
	{
		$this->data["objLang"]["product"] = $this->loadLang("page/product/");

		// 外包部份: 加價購商品
		// 找出目前商品的所有加價購商品和對應加購價錢，可購買數量
		// 待加功能，目前僅簡易模擬
		//$addiProducts = array_merge( $this->ProductM->find( 136 ), $this->ProductM->find( 135 ), $this->ProductM->find( 139 ), $this->ProductM->find( 142 ), $this->ProductM->find( 134 ), $this->ProductM->find( 141 ) );
		//$this->data['addiProducts'] = $addiProducts;

		$prod = $this->ProductM->queryDetail( $query );
// error_log(print_r($prod,true),3,"uploads/log_product_prod.log");
		// var_dump($prod); exit;
// echo $prod[0]['PID']; exit;
		$prodHall = $this->ProductM->findHall( $prod[0]['PID'] );
		$this->data['prodHall'] = $prodHall;
		$DateLimitCheckoutDiscount = $this->OptionM->readVal("DateLimitCheckoutDiscount");
		$nowData = date("Y/m/d");
		if($DateLimitCheckoutDiscount['StartDate'] <= $nowData &&  $nowData <= $DateLimitCheckoutDiscount['EndDate']){
			$this->data["allHall_description"] = $DateLimitCheckoutDiscount['description'];
		}
// error_log(print_r($prodHall,true),3,"uploads/log_product_prodHall.log");		
// error_log(print_r($DateLimitCheckoutDiscount,true),3,"uploads/log_product_DateLimitCheckoutDiscount.log");		
// error_log(print_r($DateLimitCheckoutDiscount2,true),3,"uploads/log_product_DateLimitCheckoutDiscount2.log");		
// error_log(print_r($prod,true),3,"uploads/log_controller_product_detail_prod.log");

		//  加價購商品
		$adds = array();
		if ($prod[0]['add_products']){
		    foreach ($prod[0]['add_products'] as $addProducts){
		        if (in_array($addProducts['status'], array(1,3)) && $addProducts['Shelves'] === true){
		            $adds[] = $addProducts;
		        }
		    }
		}

		$this->data['addiProducts'] = $adds;

		$this->data['product'] = false;

		if( count($prod) == 1 &&  ( $prod[0]["status"] == 1 || $prod[0]["status"] == 3 ) && ($prod[0]["Shelves"] ===true) )
		{

			$this->data['product'] = $prod[0];
			$this->data['TotalRaty'] = $this->mOption->readString("TotalRaty");

			//商品父層項目
			$parentProduct = $this->ProductM->listAllCatelog($prod[0]["PID"]);
			krsort($parentProduct);
			$this->data["parentProduct"] = $parentProduct;

			$this->data["socialHref"] = $this->get_current_url(true, false);

			//推薦商品 
			$promotionProducts = array() ;
			if ( $prod[0]["tag"] != "" )
			{  
				$promotionProducts = $this->ProductM->findTag($prod[0]["tag"]);
			}
			$this->data["promotionProducts"] = $promotionProducts ;
// error_log(print_r($this->data,true),3,"uploads/log_controller_product_detail_this_data.log");			
//print_r( $prod[0]) ;
				// 直接購賣 設置
				/*$this->BankRemittances  	= $this->mOption->readVal("BankRemittances");
				$this->PayOnArrival     	= $this->mOption->readVal("PayOnArrival");
				$this->CreditCard     		= $this->mOption->readVal("CreditCard");
				$this->WebATM     			= $this->mOption->readVal("WebATM");
				$this->AliPay     			= $this->mOption->readVal("AliPay");
				$this->FreeFare  		   	= $this->mOption->readString("FreeFare");

				$this->data['methods']								= array();
				$this->data['methods']['BankRemittances'] 			= $this->BankRemittances;
				$this->data['methods']['PayOnArrival']	  			= $this->PayOnArrival;
				$this->data['methods']['CreditCard']	  			= $this->CreditCard;
				$this->data['methods']['WebATM']	  				= $this->WebATM;
				$this->data['methods']['AliPay']	  				= $this->AliPay;

				$this->data['FreeFare'] 	= $this->FreeFare;
				$this->data["ExchangeRate"] = $this->mOption->readVal("ExchangeRate");

				//匯款帳號
				$this->data["BankRemittancesInfo"]= $this->mOption->readVal("BankRemittancesInfo");
				//$BankRemittancesInfo = $this->mWidget->find("BankRemittancesInfo");
				//$this->data["BankRemittancesInfo"] = $BankRemittancesInfo[0];*/

			$this->load->view('inc/head',$this->data);
			$this->load->view('product/detail',$this->data);
			$this->load->view('inc/footer',$this->data);
			/*
			UNSET($this->webVar['productTouch']);
			$this->session->set_userdata('webVar',$this->webVar);
			*/
			if( array_key_exists( 'productTouch', $this->webVar ) )
			{
				if( count($this->webVar['productTouch']) > 9 )
				{
					UNSET($this->webVar['productTouch']);
					$this->webVar['productTouch'] = array();
					$this->webVar['productTouch'][$prod[0]["PID"]] = array(
						"PID" => $prod[0]["PID"],
						"time" => date("Y-m-d H:i:s"),
						"IP" => $this->getUserIP()
					);
					$this->session->set_userdata('webVar',$this->webVar);
				}
				else
				{
					if( !array_key_exists( $prod[0]["PID"], $this->webVar['productTouch'] ) )
					{
						$this->webVar['productTouch'][$prod[0]["PID"]] = array(
							"PID" => $prod[0]["PID"],
							"time" => date("Y-m-d H:i:s"),
							"IP" => $this->getUserIP()
						);
						$this->session->set_userdata('webVar',$this->webVar);
					}
				}
			}
			else
			{
				$this->webVar['productTouch'] = array();
				$this->webVar['productTouch'][$prod[0]["PID"]] = array(
					"PID" => $prod[0]["PID"],
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

	/*public function detailB($query)
	{
		$this->setActiveTag();
		$prod = $this->ProductM->queryDetail( $query );
		$this->data['product'] = false;

		if( count($prod) == 1 )
		{
			$this->data['product'] = $prod[0];

			$this->load->view('inc/head',$this->data);
			$this->load->view('product/detailB',$this->data);
			$this->load->view('inc/footer',$this->data);
		}
		else
		{
			redirect("/","location","301");
		}
	}*/

	public function addProdTags($tag = false)
	{
		if($tag === false)
		{
			redirect("location","/","301");
			return;
		}

		$this->data["currentTag"] = $tag;

		$this->load->model("Product_model",'mProduct');
		$lastProducts = $this->mProduct->findAddProdTag($tag);
		//$lastProducts = $this->mProduct->findAllAddProd();    // list all

		$this->sortListProduct($lastProducts);

		$lastProducts = array_chunk($lastProducts,$this->limit);
		$this->maxPage = count($lastProducts);
		$this->data["lastProducts"] = (array_key_exists($this->page-1, $lastProducts))?$lastProducts[$this->page-1]:array();
		$this->init_pagination();
//print_r( $this->data["lastProducts"]  );
//exit ;
		//星星分數上限
		$this->data['TotalRaty'] = $this->mOption->readString("TotalRaty");

		$this->load->view('inc/head',$this->data);
		$this->load->view('product/addprodtags',$this->data);
		$this->load->view('inc/footer',$this->data);
	}


	public function touch()
	{
		ini_set("display_errors","On");
		if( array_key_exists( 'productTouch', $this->webVar ) )
		{
			if( count($this->webVar['productTouch']) > 9 )
			{
				UNSET($this->webVar['productTouch']);
				$this->session->set_userdata('webVar',$this->webVar);
			}
			else
			{
				foreach( $this->webVar['productTouch'] AS &$touch )
				{
					echo $touch["PID"].",".$touch["time"].",".$touch["IP"]."<br/>";
					//停留超過 3秒可以計次
					$limit = strtotime($touch["time"]." +3 seconds");
					echo date("Y-m-d H:i:s",$limit)."<br/>\r\n";

					if( time() - $limit > 0 )
					{
						$result = $this->ProductM->touchProduct( $touch["PID"] );
						echo "touch touchProduct:".$result."<br/>";
						//每計次一次後，同IP下次計次時間，為1分鐘後
						$newTime = date("Y-m-d H:i:s",strtotime($touch["time"]." +60 seconds"));
						$touch["time"] = $newTime;
						echo "touch next-time:".$newTime."<br/>\r\n";
					}
				}
				$this->session->set_userdata('webVar',$this->webVar);
			}
		}
	}

	private function init_pagination()
	{
		if( $this->maxPage > 0 )
		{
			$this->data["currentPage"] 	= $this->page;
			$this->data["prevPage"] 	= ($this->page == 1)?false:$this->page-1;
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
	}

	private function sortListProduct(&$lastProducts)
	{
		if(!function_exists( "timeDesc" ))
		{
			function timeDesc($a,$b){ return strtotime($a['createTime'])<strtotime($b['createTime'])?1:-1; }
		}
		if(!function_exists( "timeASC" ))
		{
			function timeASC($a,$b){ return strtotime($a['createTime'])>strtotime($b['createTime'])?1:-1; }
		}
		if(!function_exists( "priceAsc" ))
		{
			function priceAsc($a,$b){ return $a['cPrice']>$b['cPrice']?1:-1; }
		}
		if(!function_exists( "priceDesc" ))
		{
			function priceDesc($a,$b){ return $a['cPrice']<$b['cPrice']?1:-1; }
		}
		if(!function_exists( "qtyDesc" ))
		{
			function qtyDesc($a,$b){ return intval($a['stock'])<intval($b['stock'])?1:-1; }
		}
		uasort($lastProducts, $this->pSort);
	}
	private function flatListProduct(&$listProduct)
	{
		foreach( $listProduct AS $product )
		{
			if( isset($product["child"]) && count($product["child"]) > 0 )
			{
				foreach( $product["child"] AS $child )
				{
					$listProduct[] = $child;
				}
			}
		}
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */