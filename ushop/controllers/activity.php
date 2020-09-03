<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity extends Web_Controller {
	
	public function index()
	{
		$this->data["objLang"]["product"] = $this->loadLang( "page/product/" );
		
		$this->load->model("Product_model","mProduct");	
		
		$this->data["HomeSlider"] = $this->mWidget->find("activitySlider");
		$arrRes = $this->mOption->find("ActSlider-Effect");
		$this->data["WHSlidertEffect"] = json_decode($arrRes[0]["value"],true);		
		
		$PromotionBlock = $this->mOption->find("PromotionBlock");
		foreach( $PromotionBlock AS &$record )
		{
			$tempVal = json_decode($record["value"],true);

			if( array_key_exists( $this->currentLang, $tempVal ) )
			{
				$listProd = array();
				if( is_array($tempVal[$this->currentLang]["listProduct"]) )
				{
					$indsProd = implode(",", $tempVal[$this->currentLang]["listProduct"]);
					$listProd = $this->mProduct->find( $indsProd );
					uasort($listProd,'cmp');
				}
				$tempVal[$this->currentLang]["listProductDetail"] = $listProd;
			}		
			
			UNSET($record["value"]);
			$record["value"] = array();
			$record["value"] = $tempVal[$this->currentLang];
		}
		
		$this->data["PromotionBlock"] = $PromotionBlock;
		$this->data["sliderCount"] = 30;
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('activity/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */