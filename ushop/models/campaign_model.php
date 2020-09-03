<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_Model extends CI_Model {
    public $table='campaign';
    function __construct() {
        parent::__construct();
    }

    public function pagi_all($para=array()) {
        $query=$this->db->from($this->table);
        if(!empty($para['condition']['sn'])) {
            $query->where('sn',$para['condition']['sn']);
        }
        if(!empty($para['condition']['username'])) {
            $query->like('username',$para['condition']['username'],'both');
        }
        if(!empty($para['condition']['phone'])) {
            $query->like('phone',$para['condition']['phone'],'both');
        }
        if(!empty($para['condition']['phone'])) {
            $query->like('phone',$para['condition']['phone'],'both');
        }
        if($para['condition']['played_flag'] == '1') {
            $query->where('played_at is not null',null,true);
        } else if($para['condition']['played_flag'] == '0') {
            $query->where('played_at is  null',null,true);
        }

        if(strlen($para['condition']['gift_id'])) {
            $query->where('gift_id',$para['condition']['gift_id']);
        }

        if(!empty($para['order_by']))
            $query->order_by($para['order_by'],'asc');
        
        $pagination=$para['pagination'];
        $temp=clone $this->db;
        $para['pagination']['total_rows']=$temp->count_all_results();
        $pagination['page']=$pagination['page'] > 0 ? $pagination['page'] : 1;
        $this->db->limit($pagination['per_page'],($pagination['page'] - 1) * $pagination['per_page']);
        $para['list']=$query->get()->result();
        return $para;
    }

    public function get_all($para=array()) {
        $query=$this->db->from($this->table);
        if(!empty($para['condition']['sn'])) {
            $query->where('sn',$para['condition']['sn']);
        }
        if(!empty($para['condition']['username'])) {
            $query->like('username',$para['condition']['username'],'both');
        }
        if(!empty($para['condition']['phone'])) {
            $query->like('phone',$para['condition']['phone'],'both');
        }
        if(!empty($para['condition']['phone'])) {
            $query->like('phone',$para['condition']['phone'],'both');
        }
        if($para['condition']['played_flag'] == '1') {
            $query->where('played_at is not null',null,true);
        } 
        else if($para['condition']['played_flag'] == '0') {
            $query->where('played_at is  null',null,true);
        }
        if(strlen($para['condition']['gift_id'])) {
            $query->where('gift_id',$para['condition']['gift_id']);
        }
        if(!empty($para['order_by']))
            $query->order_by($para['order_by'],'asc');

        // $pagination=$para['pagination'];
        // $temp=clone $this->db;
        // $para['pagination']['total_rows']=$temp->count_all_results();
        // $pagination['page']=$pagination['page'] > 0 ? $pagination['page'] : 1;
        // $this->db->limit($pagination['per_page'],($pagination['page'] - 1) * $pagination['per_page']);
        $para['list']=$query->get()->result();
        return $para;
    }

    public function get_winners() {
        $query=$this->db->from($this->table)->where('played_at is not null',null,false)->where("gift_id !='' ",null,false)->order_by('id asc');
        // $query=$this->db->from($this->table)->where('played_at is not null',null,false)->join('gift','gift.id = campaign.gift_id')->order_by('gift.id asc');
        return $query->get()->result();
    }

    public function check($sn) {        
        $query=$this->db->from($this->table)->where('sn',$sn)->get();
        $query->num_rows();
        return $query->num_rows() ? true : false;
    }

    public function get_valid_total() {
        $query=$this->db->from($this->table)->select('count(*) as total')->where('played_at is null',null,false)->get();
        $result=$query->result();
        return $result[0]->total;
    }

    public function get_total() {
        $query=$this->db->from($this->table)->where('played_at is not null',null,false)->get();
        return $query->num_rows();
    }

    public function get_by_sn($sn) {
        $result=$this->db->from($this->table)->where('sn',$sn)->get()->result();        
        // $result=$this->db->from($this->table)->where('sn',$sn)->where('played_at is not null',null,false)->get()->result();        
        return $result[0];
    }

    public function get_played_by_sn($sn) {
        // $result=$this->db->from($this->table)->where('sn',$sn)->get()->result();        
        $result=$this->db->from($this->table)->where('sn',$sn)->where('played_at is not null',null,false)->get()->result();        
        
        return $result[0];
    }

    public function update_by_sn($sn,$data) {
        $data=array(
            'username'=>$data['username'],
            'phone'=>$data['phone'],
            'addr'=>$data['addr'],
            'email'=>$data['email']
        );
        $this->db->set('played_at','now()',false);
        $this->db->where('sn',$sn);
        return $this->db->update($this->table,$data);
    }

}
