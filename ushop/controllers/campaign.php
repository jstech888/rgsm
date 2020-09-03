<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends Web_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('url');
		$this -> load -> helper('captcha');
		$this -> load -> library('session');
		$this -> load -> model('Campaign_Model');
		$this -> load -> model('Gift_Model');
		$this -> load -> library('form_validation');
	}

	private function load_cap() {
        $cfg=array(
            'img_path' => './captcha/',
            'img_url' => base_url().'/captcha/',
            'char_set' => '0123456789',
            'char_length'=>4,
            'font_name'=>'arialbd.ttf',
            'font_path'=> './assets/fonts/from_shen',
            'font_size'=>24,
            'line_count'=>5,
        );
		$this->load->library('antispam');
		$captcha = $this->antispam->get_antispam_image($cfg);
		$this -> session -> set_userdata('captcha', $captcha['word']);
		$this -> data['cap'] =$captcha;
	}

    public function refresh_captcha(){
        $this->load_cap();
        echo $this->data['cap']['image'];
    }

	public function index()
	{
		if(!is_array($this->data['self'])){
			redirect('/user/login?redirectURL=/Page/activity','location','301');
		}

		$step = $this -> input -> post('step');
		$do = $this -> input -> post('do');
		if ($step == '') {
			if ($do) {
				$error = $this -> check_play($this -> input -> post());
				if ($error) {
					$this -> load_cap();
					$this->load->view('inc/head', $this -> data);
					$this -> load -> view('campaign/index', $this -> data);
				}
				else {
					$res = $this->has_played($this -> input -> post('sn'));
// echo "<br>res=".$res; 
// if($res!==NULL){ echo "<br>yes"; }
// exit;
					if($res!==NULL){
						// $this->load->view('inc/head', $this -> data);
						// $this -> load -> view('campaign/done', $this -> data);
						redirect('/campaign/done','location','301');
					}
					else{
						if($this->do_play($this->input->post())){
							$this->load->view('inc/head', $this -> data);
							$this->load->view('campaign/next', $this -> data);	
						}
						else{
							// $this->load->view('inc/head', $this -> data);
							// $this -> load -> view('campaign/thanks', $this -> data);	
							redirect('/campaign/done','location','301');
						}
					}
				}
			}
			else {
				$this -> load_cap();
				$this -> load -> view('inc/head', $this -> data);
				$this -> load -> view('campaign/index', $this -> data);
			}
		}
		else
		if ($step == 'next') {
			if ($do) {
				$error = $this -> check_keyin($this -> input -> post());
				if ($error) {
					$this->load->view('inc/head', $this -> data);
					$this->load->view('campaign/next', $this -> data);
				}
				else {
					$this->do_keyin($this -> input -> post());
					$this->load->view('inc/head', $this -> data);
					$this -> load -> view('campaign/finish', $this -> data);
				}
			}
			else{
				$this->load->view('inc/head', $this -> data);
				$this -> load -> view('campaign/next', $this->data);
			}
		}

		$this->load->view('inc/footer',$this->data);
	}

	function done(){
		$this->load->view('inc/head', $this -> data);
		$this->load->view('campaign/done', $this -> data);
		$this->load->view('inc/footer',$this->data);	
	}

	function thanks(){
		$this->load->view('inc/head', $this -> data);
		$this->load->view('campaign/thanks', $this -> data);
		$this->load->view('inc/footer',$this->data);	
	}

	function has_played($sn){
		$data=$this->Campaign_Model->get_by_sn($sn);		
		return $data->played_at;
	}
	function do_play($para = array()) {
		$sn=$para['sn'];
		$this->data['campaign']=$this->Campaign_Model->get_by_sn($sn);
var_dump($this->data['campaign']);
		if($this->data['campaign']->gift_id){
echo "<br>gift_id=".$this->data['campaign']->gift_id;
			$this->data['gift']=$this->Gift_Model->get($this->data['campaign']->gift_id);
			return true;
		}
		else{
			return false;
		}
	}
	
	function do_keyin($para = array()) {
		$this->Campaign_Model->update_by_sn($para['sn'],$para);
		return true;
	}
	
	function check_play($para = array()) {
		$sn = $para['sn'];
		$recaptcha = $para['recaptcha'];
		$error = array();
		if (empty($sn) || !$this -> Campaign_Model -> check($sn)) {
			$this->data['error']['sn'] = '請填入有效序號';
		}
		if (empty($recaptcha) || $recaptcha != $this -> session -> userdata('captcha')) {
			$this->data['error']['recaptcha'] = '請填入有效認證碼';
		}
		return count($this->data['error']);
	}

	function check_keyin($para = array()) {
		$sn = $para['sn'];
		$username = $para['username'];
		$addr = $para['addr'];
		$phone = $para['phone'];
		$email = $para['email'];
		$error = array();
		if (empty($username)|| mb_strlen($username)< 2) {
			$this->data['error']['username'] = '請填入有效使用者名稱';
		}
		if (empty($addr)) {
			$this->data['error']['addr'] = '請填入有效住址';
		}
		if (empty($phone)  ) {
			$this->data['error']['phone'] = '請填入有效電話';
		}
		if (empty($email) || !preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email) ) {
			$this->data['error']['email'] = '請填入有效電子信箱';
		}
		return count($this->data['error']);
	}

	function detail() {
		if(!is_array($this->data['self'])){
			redirect('/user/login?redirectURL=/campaign/detail','location','301');
		}

		$this->data['winners'] = $this->Campaign_Model->get_winners();
		foreach($this->data['winners'] as $data){
			$data->username=mb_substr($data->username,0,1).'x'.mb_substr($data->username,2);
			$len=mb_strlen($data->addr);
			$len=intval($len/2);
			$len=$len>0?$len:1;
			$temp=str_repeat('x', $len);
			$data->addr=mb_substr($data->addr,0,$len).$temp.mb_substr($data->addr,$len+1);
		}
		unset($data);
		$this->load->view('inc/head', $this->data);
		$this->load->view('campaign/detail', $this->data);
		$this->load->view('inc/footer',$this->data);
	}

}
/* End of file Campaign.php */
/* Location: ./application/controllers/campaign.php */