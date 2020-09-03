<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->forceLogin();	
	}
	
	public function del()
	{
		if(isset($_POST["FileUrl"]))
		{
			$arrURL = explode("/uploads/",$_POST["FileUrl"]);
			$tempURL = str_replace("/",DIRECTORY_SEPARATOR,$arrURL[1]);
			$tempURL = str_replace("\\",DIRECTORY_SEPARATOR,$tempURL);
			$FileUrl = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR ."uploads". DIRECTORY_SEPARATOR . urldecode($tempURL);
			
			$this->data["code"] = 1;
			$this->data["message"] = "操作完成";
			$this->data["result"] = (file_exists($FileUrl))?unlink($FileUrl):"0";
			$this->debugOut($this->data);
		}	
	}	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
