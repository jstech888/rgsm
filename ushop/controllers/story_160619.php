<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Story extends Web_Controller {

	public function index()
	{		
		$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
		$this->load->model("Article_model");	
		$this->data["listStory"] = $this->Article_model->findAll("brand");
		$this->load->view('inc/head',$this->data);
		$this->load->view('story/listStory',$this->data);
		$this->load->view('inc/footer',$this->data);	
	}
	
	public function detail($id = false)
	{
		if( $id !== false )
		{
			$this->data["objLang"]["function_bar"] = $this->loadLang("widget/function_bar/");
			$this->data["id"] = $id;
			$this->load->model("Article_model");	
			$arr_article = $this->Article_model->admin_find("brand", $id);
			if( count($arr_article) > 0 )
			{
				$this->data["og"] = array(
					"url" => base_url("/story/detail/".$id.'/'),
					"type" => "article",
					"title" => $arr_article[0]["blog-title"],
					"description" => strip_tags($arr_article[0]['blog-content']),
					"image" => base_url($arr_article[0]['blog-extra']["url"])
				);	
				
				$php_date = getdate(strtotime($arr_article[0]["raw-date"]));
				$this->data['article'] 	    = $arr_article[0];
				$this->data['article_date'] = $php_date;
				$this->load->view('inc/head',$this->data);
				$this->load->view('story/index',$this->data);
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