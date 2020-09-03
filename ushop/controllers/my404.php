<?php 
class my404 extends Web_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    public function index() 
    { 
		$this->setActiveTag();
		
        //$this->output->set_status_header('404'); 
		$this->data['err_status']	= "404";
		$this->data['err_title']  	= "找不到您要的資訊";
		$this->data['err_content']	= "";
		$this->data['err_auto']		= "10000";
		
		$this->load->view('inc/head',$this->data);
		$this->load->view('message/alert',$this->data);
		$this->load->view('inc/footer',$this->data);		
    } 
} 
?> 