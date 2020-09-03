<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function index()
	{
		$this->data["css_include"] 	= "product";
		$this->data['widget'] 		= array();
		
		$this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/file/index',$this->data);
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */