<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends My_Model {

	public $type = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "menu";
    }
	
	public function Load($type = "")
	{	
		$this->type  = $type;

		$sql = "SELECT *
				  FROM `menu` 
					JOIN `menu_info` ON `menu`.`id` = `menu_info`.`menu_id` 
				  WHERE `menu_info`.`langCode` = ? 
				  ORDER BY  `menu`.`sortkey` ASC ";
					
		$result = $this->db->query($sql,array($this->currentLang))->result_array();
		
		if( count($result) == 0 )
		{
			$result = $this->db->query($sql,array($this->DEFAULTLANG))->result_array();
		}
		
		$new_res = array();
		foreach( $result as $row )
		{
			$menu = array();
			$menu = $row;
			$menu['content'] = json_decode($row['content'],true);
			$new_res[] = $menu;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}