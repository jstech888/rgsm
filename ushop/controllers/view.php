<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends Web_Controller {
	
	function __construct()
	{
		parent::__construct();		
	}
	
	public function show($query)
	{
		$this->setActiveTag();
		
		$this->data['debugmode'] = true;
		$this->data['viewmode'] = true;
		
		$this->load->view('inc/head',$this->data);
		
		$this->data["HomeSlider"] = $this->mWidget->find("HomeSlider");
		$arrRes = $this->mOption->find("WHSlidert-Effect");
		$this->data["WHSlidertEffect"] = json_decode($arrRes[0]["value"],true);
		
		$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
		$this->data["objLang"]["bloger"] = $this->loadLang("widget/blog/");
		$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
		$this->load->model("Product_model",'mProduct');
		$this->load->model("Article_model",'mArticle');
		
		$this->data["HomeSlider"] = $this->mWidget->find("HomeSlider");
		$this->data["WHSlidertEffect"] = $this->mOption->readVal("WHSlidert-Effect");
		
		$ProductNavTabs = $this->mWidget->find("ProductNavTabs");
		$listProd = array();
		if( count( $ProductNavTabs[0]["value"] ) >  0 )
		{
			$listProd = $this->mProduct->find( implode(",",$ProductNavTabs[0]["value"]) );
			uasort($listProd,'cmp');
		}
		$ProductNavTabs[0]["listProduct"] = $listProd;
		$this->data["ProductNavTabs"] = $ProductNavTabs[0];
		
		$GridBlock = $this->mWidget->find("GridBlock");
		$this->data["GridBlock"] = $GridBlock[0];
		
		$hotNews = $this->mWidget->find("hotNews");
		$listNews = array();
		( count( $hotNews[0]["value"] ) >  0 ) ? $listNews = $this->mArticle->find( implode(",",$hotNews[0]["value"]) ) : "";
		$this->data["listNews"] = $listNews;
		
		
		$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
		$this->load->model("Article_model");	
		$this->data["listStory"] = $this->Article_model->findAll("brand");

		$this->data["ProductSlider"] = $this->mWidget->find("ProductSlider");
		$this->data["ProductSlider"] = $this->mWidget->find("ProductSlider");
		
		$this->load->view('widget/home/'.($query),$this->data);
//		$this->load->view('inc/footer',$this->data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */