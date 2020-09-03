<?php
if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gift_Model extends CI_Model {
    public $table='gift';
    function __construct() {
        parent::__construct();
    }

    public function get_valid_total() {
        $query=$this->db->from($this->table)->select('sum(total) as total')->get();
        $result=$query->result();
        return $result[0]->total;
    }

    public function get($id) {
        $result=$this->db->from($this->table)->where('id',$id)->get()->result();
        $result[0]->title=$id;
        return $result[0];
        // return $result[0];
    }

    public function opts() {
        $result=$this->db->from($this->table)->get()->result();
        $ret=array();
        foreach($result as $id=>$data) {
            $ret[$data->id]=$data->title;
        }
        return $ret;
    }

}
