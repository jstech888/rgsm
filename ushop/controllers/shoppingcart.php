<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends Web_Controller {

	private $jsonRS = array(
		"code" 		=> "-1",
		"message"	=> "操作失敗"
	);

	public function index()
	{
		$query = "";
		/* <!-- Current Active MainMenu  --> */
		$this->setActiveTag();
		$this->load->model("Option_model","mOption");
		$this->data["isMemberCheckFacebook"] = $this->mOption->readVal("isMemberCheckFacebook");

		$this->data['ucart'] = $this->cart->show();
		$this->data["objLang"]["login"] = $this->loadLang("page/login/");

		$this->load->view('inc/head',$this->data);
		$this->load->view('ShoppingCart/index',$this->data);
		$this->load->view('inc/footer',$this->data);
	}
	public function show()
	{		
		$rs = $this->cart->show();
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($rs);
	}
	public function append()
	{
		$this->jsonRS["post"] = $_POST;
		if( isset($_REQUEST['PID']) && isset($_REQUEST['qty']) && isset($_REQUEST['formatType']) )
		{
			$PID 		= $_REQUEST['PID'];
			$qty 		= $_REQUEST['qty'];
			$formatType = $_REQUEST['formatType'];
			$result = $this->cart->append( $PID,$qty,$formatType );

			if( $result === "fail" )
			{
				$this->jsonRS["code"] = "100" ;
			}
			else
			{
				$this->jsonRS["code"] = $result == false ? "-1" : "200";
			}
			$this->jsonRS["message"] = $result == false ? "操作失敗" : "操作成功";
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	public function update()
	{
		$this->jsonRS["post"] = $_POST;

		$debug = array();
		$debug["PID"] = isset($_REQUEST['PID']);
		$debug["qty"] = isset($_REQUEST['qty']);
		$debug["formatType"] = isset($_REQUEST['formatType']);
		$this->jsonRS["debug"] = $debug;

		if( isset($_REQUEST['PID'])
			&& isset($_REQUEST['qty'])
			&& isset($_REQUEST['formatType']) )
		{
			$PID = $_REQUEST['PID'];
			$qty = $_REQUEST['qty'];
			$formatType = $_REQUEST['formatType'];
			if( $qty == 0 )
			{
				$this->cart->delete( $PID,$formatType );
				$this->jsonRS["code"] = "200";
				$this->jsonRS["message"] = "操作成功";
			}
			else
			{
				$result = $this->cart->update($PID,$qty,$formatType);
				$this->jsonRS["result"] 	= $result;
				$this->jsonRS["code"] 		= $result == false ? "-1" : "200";
				$this->jsonRS["message"] 	= $result == false ? "操作失敗" : "操作成功";
			}
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($this->jsonRS);
	}
	public function delete()
	{
		if( isset($_REQUEST['PID']) && isset($_REQUEST['formatType']) )
		{
			$PID = $_REQUEST['PID'];
			$formatType = $_REQUEST['formatType'];
			$this->cart->delete( $PID,$formatType );
		}
		$this->show();
	}
	public function clear()
	{
		$this->cart->clear();
	}
	public function bundle()
	{
		if( isset($_REQUEST['data']) )
		{
			$data = json_decode($_REQUEST['data'],true);
			foreach( $data AS $item )
			{
				if($item['method'] == "update")
				{
					$PID 		= $item['PID'];
					$qty 		= $item['qty'];
					$formatType = $item['formatType'];
					if( $qty == 0 )
					{
						$this->cart->delete( $PID, $formatType );
					}
					else
					{
						$this->cart->update( $PID, $qty, $formatType );
					}
				}
				if($item['method'] == "delete")
				{
					$PID = $item['PID'];
					$formatType = $item['formatType'];
					$this->cart->delete( $PID, $formatType );
				}
			}
		}
		$this->show();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */