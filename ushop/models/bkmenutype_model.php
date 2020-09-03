<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bkmenutype_model extends My_Model {

    function __construct()
    {
        parent::__construct();		
		$this->table = "bkMenuType";
    }
	
	public function load()
	{
		return $this->read_RecordByWhereCase(false,"`type_id`,`sortKey`");
	}
	
	public function save($data)
	{
		$record = $this->read_RecordByWhereCase(array( "id"=>$data["id"] ));
		$result = "-1";
		
		//update
		if( count($record) > 0 )
		{
			$updataData = array();
			$whereData  = array();
			$sample = array("id");
			foreach( $data AS $k => $item )
			{
				if( in_array($k,$sample) )
				{
					$whereData[$k] = $item;
				}
				else
				{
					$updataData[$k] = $item;
				}
			}
			$result = $this->update_Record( $updataData, $whereData );
		}
		//insert
		else
		{
			$sample = array("id");
			$inserData = array();
			foreach($data AS $key=>$val)
			{
				if( !in_array($key,$sample) )
				{
					$inserData[$key] = $val;	
				}
			}
			$result = $this->create_Record($inserData);
		}
		return $result;
	}
	
	public function isExist($id)
	{
		$rest = $this->read_RecordByWhereCase(array( "id"=>$id ));
		return (count($rest) == 0)?false:true;
	}

}