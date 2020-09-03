<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends Admin_Controller {

    private $error=array();
    private $data=array();

    function __construct() {
        parent::__construct();
echo "<br>123"; exit;     
        $this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('session');
        $this->load->model('Campaign_Model');
        $this->load->model('Gift_Model');
        $this->load->library('form_validation');
    }

    public function param($key){
        $val=$this->input->post($key);
        if($val)return $val;
        $val=$this->input->get($key);
        if($val)return $val;
    }

    public function index() {
        $this->data['gitf_opts']=$this->Gift_Model->opts();
        $para=array(
            'condition'=> array(
                'sn'=>$this->param('sn'),
                'username'=>$this->param('username'),
                'phone'=>$this->param('phone'),
                'played_flag'=>$this->param('played_flag'),
                'gift_id'=>$this->param('gift_id'),
            ),
            'pagination'=>array(
                'page'=>$this->param('page'),
                'per_page'=>10,
                'base_url'=>site_url('campaign_manager/'),
                 'page_query_string'=>true
            )
        );
        $this->data['datalist']=$this->Campaign_Model->pagi_all($para);
        //Create pagination
        $this->load->library('pagination');
        $this->pagination->initialize($this->data['pagination']);
        $this->data['datalist']['pagination']['html']=$this->pagination->create_links();
        $this->load->view('admin/campaign/index',$this->data);        
        // $this->load->view('campaign_manager/index',$this->data);
    }
}
