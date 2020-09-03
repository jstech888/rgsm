<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends My_Model {

	public $type = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "menu";
    }
	
	public function Load($lang="default")
	{	
		if( $lang == "all")
		{
			$sql = "SELECT *
					  FROM `menu` 
					  ORDER BY  `menu`.`sortkey` ASC ";
			$result = $this->db->query($sql)->result_array();
		}
		else
		{
			$sql = "SELECT *
					  FROM `menu` 
					  WHERE `menu`.`langCode` = ? 
					  ORDER BY  `menu`.`sortkey` ASC ";
						
			$result = $this->db->query($sql,array($this->currentLang))->result_array();
			
		}
		foreach( $result as &$row )
		{
			$row['content'] = json_decode($row['content'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function sample()
	{
		$rest = $this->Load();
		return array(
			"id" => "-1",
			"title" => "",
			"content" => "",
			"type" => "link",
			"href" => "",
			"sortkey" => count($rest),
			"langCode" => $this->currentLang
		);
	}
	
	public function findById( $id )
	{	
		$whereCase = array( "id" => $id, "langCode" => $this->currentLang );
		
		$this->check_RecordExistByWhereCase( $whereCase,"`sortkey` ASC" );
		$result = $this->last_result;
		foreach( $result as &$row )
		{
			$row['content'] = json_decode($row['content'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function find($title, $lang="default", $hasSystemId=false )
	{	
		
		$whereCase = array( "title" => $title, "langCode" => $lang );
		( $lang == "all" )?$whereCase = array( "title" => $title ):'';
		( $lang == "default" )?$whereCase = array( "title" => $title, "langCode" => $this->currentLang ):'';
		
		$this->check_RecordExistByWhereCase( $whereCase,"`sortkey` ASC" );
		$result = $this->last_result;
		$new_res = array();
		foreach( $result as $row )
		{
			$new_row = json_decode($row['value'],true);
			$new_row['langCode'] = $row['langCode'];
			if($hasSystemId)
			{
				$new_row['system_id'] = $row["system_id"];
			}
			$new_res[] = $new_row;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function createMenu($data)
	{
		$this->db->insert('menu', $data); 
		$menu_id = $this->db->insert_id();
		return $menu_id;
	}
	
	public function updateMenu( $updataData, $whereCase )
	{
		$this->db->update('menu', $updataData, $whereCase);
		$menu_row = $this->db->affected_rows();
		return $menu_row;
	}
	
	public function save($data)
	{
		$result = array();
		$record = false;
		if(isset($data['id']))
		{
			$record = $this->check_RecordExistByWhereCase( array( "id" => $data['id'] ),"`sortkey` ASC" );
			$result[] = $record;
		}
		//update
		if( $record != false  )
		{
			$new_data 	 = array();
			$sample_data = array("title","content","href","type","sortkey","background");
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->updateMenu( $new_data, array("id" => $data['id']) );
		}
		//insert
		else
		{
			$new_data 	 = array();
			$sample_data = array("id");
			foreach($data AS $key=>$val)
			{
				if(!in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->createMenu($new_data);
		}
		$result[] = $this->db->last_query();
		return $result;
	}
	
	public function delete($id)
	{
		$this->check_RecordExistByWhereCase( array( 'id' => $id ),"`sortkey` ASC" );
		$result = $this->last_result;
		if( count($result) > 0 )
		{
			$this->db->delete('menu', array('id' => $result[0]['id'])); 
		}
	}
	
	public function sortkey($data)
	{
		$this->db->update_batch('menu', $data, 'id'); 
		return $this->db->affected_rows();
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}