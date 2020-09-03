<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "subscribe";
    }
	
	public function loadAll()
	{
		$this->db->select("*");
		$this->db->from($this->table);
		$result = $this->db->get()->result_array();
		$this->last_result = $result;
		return $result;
	}
	
	public function loadSubscribe()
	{
		$sql = "SELECT `id`,`mail`
				  FROM `subscribe` 
				 WHERE `subscribe`.`flag` = '1' ;";
		$result = $this->db->query($sql,array())->result_array();
		$this->last_result = $result;
		return $result;
	}

	public function delete($id)
	{
		$this->check_RecordExistByWhereCase( array( 'id' => $id ),"`sortkey` ASC" );
		$result = $this->last_result;
		if( count($result) > 0 )
		{
			$this->db->delete('article_content', array('id' => $id)); 
		}
	}
	
	public function save( $data )
	{
		$isExit = $this->check_RecordExistByWhereCase(array("mail"=>$data["mail"]));
		$result = -1;
		if( $isExit === false )
		{
			$new_data 	 = array();
			$sample_data = array("mail","flag");
			foreach($data AS $key=>$val)
			{ 
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->insert( $this->table, $new_data );
			$result = 100;
		}
		else
		{
			/*
			$new_data 	 = array();
			$sample_data = array("mail","flag");
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->update( $this->table, $new_data, array("id" => $$this->last_result['id']) );
			*/
			$result = 200;
		}
		return $result;
	}

	public function find($idAry)
	{
		
		$sql = "SELECT `id`,`mail`
				  FROM `subscribe` 
				 WHERE `id` in ( $idAry );";
		$result = $this->db->query($sql)->result_array();
		$this->last_result = $result;
		return $result;
	}

	public function saveOrUpdate( $data )
	{
		$isExit = $this->check_RecordExistByWhereCase(array("mail"=>$data["mail"]));
		$result = -1;
		if( $isExit === false )
		{
			$new_data 	 = array();
			$sample_data = array("mail","flag");
			foreach($data AS $key=>$val)
			{ 
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->insert( $this->table, $new_data );
			$result = 1;
		}
		else
		{
			$new_data 	 = array();
			$sample_data = array("flag");
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->update( $this->table, $new_data, array("mail" => $data["mail"] ) );
			$result = 1;
		}
		return $result;
	}
	
	public function saveOrUpdateCancel( $data )
	{
		$isExit = $this->check_RecordExistByWhereCase(array("mail"=>$data["mail"]) );
		$result = -1;
		if( $isExit === false )  //不存在不需要 insert 
		{
			/*$new_data 	 = array();
			$sample_data = array("mail","flag");
			foreach($data AS $key=>$val)
			{ 
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->insert( $this->table, $new_data );*/
			$result = 0;
		}
		else
		{
			$new_data 	 = array();
			$sample_data = array("flag");
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->update( $this->table, $new_data, array("mail" => $data["mail"] ) );
			$result = 1;
		}
		return $result;
	}
	
}