<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widget_model extends My_Model {

	public $type = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "widget";
    }
	
	public function find($type, $lang="default")
	{	
		$this->type  = $type;

		$whereCase = array( "type" => $type, "langCode" => $lang );
		( $lang == "all" )?$whereCase = array( "type" => $type ):'';
		( $lang == "default" )?$whereCase = array( "type" => $type, "langCode" => $this->currentLang ):'';
		$this->read_RecordByWhereCase( $whereCase,"`sortKey` ASC " );
		$result = $this->last_result;
		foreach( $result as &$row )
		{
			$row['value'] = json_decode($row['value'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function updateWidget( $updataData, $whereCase )
	{
		$this->db->update('widget', $updataData, $whereCase);
		$menu_row = $this->db->affected_rows();
		return $menu_row;
	}
	
	public function createWidget($data)
	{
		$this->db->insert_batch('widget', $data); 
		$menu_row = $this->db->affected_rows();
		return $menu_row;
	}

	public function delete($id)
	{
		$this->db->delete('widget', "`id` in ( ".implode(",",$id)." )"); 
		$menu_row = $this->db->affected_rows();
		return $menu_row;
	}
	
	
	public function save($data)
	{
		$record = $this->find($data['type'], $data['langCode']);
		$result = "-1";
		
		//update
		if( count($record) > 0  )
		{
			$updataData = array();
			$whereData  = array();
			foreach( $data AS $k => $item )
			{
				if( $k == "type" || $k == "langCode" || $k == "id" )
				{
					$whereData[$k] = $item;
				}
				else
				{
					$updataData[$k] = $item;
				}
			}
			$result = $this->updateWidget( $updataData, $whereData );
		}
		//insert
		else
		{
			$result = $this->createWidget(array($data));
		}
		return $result;
	}
	
	public function sortkey($data)
	{
		$this->db->update_batch('widget', $data, 'id'); 
		return $this->db->affected_rows();
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}