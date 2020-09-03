<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Normal extends Web_Controller {

	public function index($query)
	{
		$this->setActiveTag();
		
		/* <!-- Current Active MainMenu  --> */
		
		$this->load->model("Page_model","mPage");
		
		$infopage =  $this->mPage->find($query,$this->currentLang);
		$this->data['href']		= ($query == "公司介紹")?" href='http://www.strongbiotech.com/'":"";
		$this->data['title']	= $infopage[$this->currentLang]['title'];
		$this->data['image'] 	= $infopage[$this->currentLang]['image'];
		$this->data['layout'] 	= $infopage[$this->currentLang]['layout'];
		$this->data['content'] 	= $infopage[$this->currentLang]['content'];
				
		$this->load->view('inc/head',$this->data);
		$this->load->view('normal/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function service()
	{
		$this->setActiveTag();
		
		$this->load->model("Pagemeta_model","mPageMeta");
		$PageMeta = $this->mPageMeta->find("service");
		$this->data['PageMeta'] = $PageMeta[0];
	
		$this->load->model("Quest_model","mQuest");			
		$this->data['listType']  = $this->mQuest->findAllType();
		$this->data['listQuest'] = $this->mQuest->findAll();
		
		$this->data['listFile']  = $this->ReadAllFile(ROOTPATH."file/userfiles");
		
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('normal/service',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function query()
	{
		if(isset($_GET['q']))
		{
			$this->load->model("Pagemeta_model","mPageMeta");
			$PageMeta = $this->mPageMeta->find("service");
			$this->data['PageMeta'] = $PageMeta[0];
			
			$this->load->model("Quest_model","mQuest");
			
			$keyword = preg_replace('/[!@$%^&&^*()_?~]/','',$_GET['q']);
			$this->data["listQuest"] = $this->mQuest->query($keyword);
			
			$this->load->view('inc/head',$this->data);
			$this->load->view('normal/query',$this->data);
			$this->load->view('inc/footer',$this->data);
		}
		else
		{
			show_404();
		}	
	}
	
	public function appdownload()
	{
		$this->setActiveTag();
		$this->load->model("Page_model","mPage");
		$infopage = $this->mPage->find("appdownload");
		$this->data['infopage'] = $infopage[$this->currentLang];
	
		$this->load->view('inc/head',$this->data);
		$this->load->view('normal/appdownload',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	
	public function contract()
	{
		$this->setActiveTag();
		$this->load->model("Page_model","mPage");
		$infopage =  $this->mPage->find("聯絡我們",$this->currentLang);
		$this->data['title']	= $infopage[$this->currentLang]['title'];
		$this->data['image'] 	= $infopage[$this->currentLang]['image'];
		$this->data['content'] 	= $infopage[$this->currentLang]['content'];
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('normal/contract',$this->data);
		$this->load->view('inc/footer',$this->data);
	}	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */