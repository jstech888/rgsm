<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Campaign extends Admin_Controller {

    public $error = array();
    public $data = array();
    
    public $upload_cfg=array(
        'upload_path'=>'/tmp',
        'allowed_types'=>'*',//xlsx|csv|xls
        'max_size'=>'100000',
        'overwrite'=>true,
        'encrypt_name'=>false,
        'remove_spaces'=>true
    );

	function __construct()
	{
		parent::__construct();	
		$this->load->helper('url');
        $this->load->helper('captcha');
        $this->load->library('session');
        $this->load->model('Campaign_Model');
        $this->load->model('Gift_Model');
        $this->load->library('form_validation');
	}
	
    // public function param($key){
    //     $val = $this->input->post($key);
    //     if($val) return $val;
    //     $val = $this->input->get($key);
    //     if($val) return $val;
    // }

    public function download() {
        $datetime=date('YmdHis');
        $filename='campaign_users_'.$datetime.'.csv';
        header('Content-Type: application/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        $datalist=$this->Campaign_Model->get_winners();
        foreach($datalist as $d) {
            //$temp=(array)$d;
            $temp=array();
            $temp[]=$d->prefix;
            $temp[]=$d->title;
            $temp[]=$d->sn;
            $temp[]=$d->username;
            $temp[]=$d->email;
            $temp[]=$d->addr;
            $temp[]=$d->played_at;
            $buff[]=implode(',',$temp);
        }
        echo implode("\n",$buff);
    }

    public function param($key) {
        return $this->input->get_post($key);
    }

	public function index()
	{
        $this->data['gitf_opts'] = $this->Gift_Model->opts();

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

        $this->load->view('admin/inc/head',$this->data);
		$this->load->view('admin/campaign/index',$this->data);
	}

}
/* End of file campaign.php */
/* Location: ./ushop/controllers/admin/campaign.php */