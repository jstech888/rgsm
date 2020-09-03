<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "lang";
    }
	
	public function findAll()
	{	
		$sql = "SELECT *, ( SELECT `lang_flags`.`flag` FROM `lang_flags` WHERE `lang_flags`.`lang_code` = `lang`.`code` ) AS 'flag'
				  FROM `lang` 
				  WHERE `lang`.`tag` != '';";
		$result = $this->db->query($sql)->result_array();
				
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function load()
	{	
		$sql = "SELECT *, ( SELECT `lang_flags`.`flag` FROM `lang_flags` WHERE `lang_flags`.`lang_code` = `lang`.`code` ) AS 'flag'
				  FROM `lang` 
				  WHERE `lang`.`tag` != '' AND `lang`.`active` = '1';";
		$result = $this->db->query($sql)->result_array();
				
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function loadDisplay()
	{
		$sql = "SELECT * FROM `lang_display`";
		$result = $this->db->query($sql)->result_array();
		$new_result = array();
		foreach( $result AS $row )
		{
			( !array_key_exists( $row["self_code"], $new_result ) )? $new_result[$row["self_code"]] = array() : "";
			 $new_result[$row["self_code"]][$row["display_code"]] = $row;			
		}
		$this->last_result = $new_result;
		return $this->last_result;
	}
	
	public function swap($data)
	{
		$sample = array("active","english_name");
		$updateData = array();
		foreach( $data AS $key => $val )
		{
			if( in_array($key, $sample) )
			{
				$updateData[$key] = $val;
			}
		}
		$this->db->update("lang", $updateData, array("id" => $data['id']));
		return $this->db->affected_rows();
	}
	
	public function saveDisplayName($data)
	{
		$sample = array("self_code","display_code");
		$checkData = array();
		foreach( $data AS $key => $val )
		{
			if( in_array($key, $sample) )
			{
				$checkData[$key] = $val;
			}
		}
		$this->table = "lang_display";
		$arr_lang  = $this->read_RecordByWhereCase( $checkData );
		
		if( count($arr_lang) > 0 )
		{
			$sampleUpdate = array("display");
			$updateData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sampleUpdate) )
				{
					$updateData[$key] = $val;
				}
			}
			$this->db->update("lang_display", $updateData, $checkData);
			return $this->db->affected_rows();
		}
		else
		{
			$sampleInsert = array("self_code","display_code","display");
			$insertData = array();
			foreach( $data AS $key => $val )
			{
				if( in_array($key, $sampleInsert) )
				{
					$insertData[$key] = $val;
				}
			}
			$this->db->insert("lang_display", $insertData);
			return $this->db->affected_rows();
		}
	}

	public function widget()
	{
		
		
		$lang['en']['display'] 		= "English";
		$lang['en']['src']			= "/libs/images/flags/en.png";
		$lang['en']['href']			= base_url("/?lang=en");
		$lang['zh-hant']['display'] = "Chinese (Traditional)";
		$lang['zh-hant']['src']		= "/libs/images/flags/tw.png";
		$lang['zh-hant']['href']	= base_url("/?lang=zh-hant");
		$lang['zh-hans']['display'] = "Chinese (Simplified)";
		$lang['zh-hans']['src']		= "/libs/images/flags/zh-hans.png";
		$lang['zh-hans']['href']	= base_url("/?lang=zh-hans");
	}	
}