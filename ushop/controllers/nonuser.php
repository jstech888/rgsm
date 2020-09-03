<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nonuser extends Web_Controller {
	
	function __construct()
	{
		parent::__construct();				
	}
	
	public function queryorder()
	{
		$this->data["objLang"]["orderlist"] = $this->loadLang( "widget/orderlist/" );
		$this->data["objLang"]["queryoder"] = $this->loadLang( "widget/QueryOrder/" );
		
		$this->load->view('inc/head',$this->data);
		
		$this->load->view('nonUser/queryoder',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */