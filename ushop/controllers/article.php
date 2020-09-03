<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article extends Web_Controller {

	public function index()
	{
		/* <!-- Current Active MainMenu  --> */
		$this->setActiveTag();
		// $this->load->model("Article_model","mNews");	
		$this->load->model("Article_model","mNews");
		
		$getYear = ( isset($_GET["y"]) )?$_GET["y"]:date("Y");
		
		if( isset($_GET["q"]) )
		{
			$getYear = "n";
			$this->data["listNews"] = $this->mNews->keywordSearch( $_GET["q"] );
		}
		else
		{
			$this->data["listNews"] = $this->mNews->findAll( "brand" );
		}
		
		
		
		$listTime = array();
		foreach( $this->data["listNews"] AS $record )
		{
			$markDate = date("Y-m-d H:i:s",strtotime($record["markDate"]));
			$php_date = getdate(strtotime($record["markDate"]));
			( !array_key_exists( $php_date["year"],$listTime ) ) ? $listTime[$php_date["year"]] = array() : "";
			( !array_key_exists( $php_date["month"],$listTime[$php_date["year"]] ) ) ? $listTime[$php_date["year"]][$php_date["month"]] = array() : "";
			$listTime[$php_date["year"]][$php_date["month"]][] = $record;
		}
		$this->data["listTime"] = $listTime;
		
		
		
		$this->data["getYear"] = $getYear;
		$this->load->view('inc/head',$this->data);
		$this->load->view('article/timeline',$this->data);
		$this->load->view('inc/footer',$this->data);	
	}
	
	public function detail($query)
	{	  
		if( isset( $query ) )
		{
			/* <!-- Current Active MainMenu  --> */
			$this->setActiveTag();
			$this->load->model("Article_model");	
			$arr_article = $this->Article_model->admin_find( "brand", $query );
			if( count($arr_article) > 0 )
			{
				$php_date = getdate(strtotime($arr_article[0]["raw-date"]));
				$this->data['article'] 	    = $arr_article[0];
				$this->data['article_date'] = $php_date;
				$this->load->view('inc/head',$this->data);
				$this->load->view('article/index',$this->data);
				$this->load->view('inc/footer',$this->data);			
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
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */