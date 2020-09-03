<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		// $this->table = "article_content";
		$this->table = "news_content";
		$this->table2 = "news_class";
    }
	
	function findResponseMessage($aid)
	{
		$sql = "SELECT *, 
				( SELECT `name` FROM `user` WHERE `user`.`id` = `message_board`.`userId` LIMIT 1 ) AS name,
				( SELECT `nickname` FROM `user` WHERE `user`.`id` = `message_board`.`userId` LIMIT 1 ) AS nickname,
				( SELECT `picture` FROM `user` WHERE `user`.`id` = `message_board`.`userId` LIMIT 1 ) AS picture
				  FROM `message_board` 
				 WHERE `articleId` = ? ORDER BY `message_board`.`createTime` DESC; ";
		$result = $this->db->query($sql,array($aid))->result_array();
		foreach( $result AS &$rec )
		{
			$rec["picture"] = json_decode($rec["picture"],true);
		}
		return $result;
	} 	
	
	function replyMessage( $aid, $uid, $msg )
	{		
		$this->db->insert("message_board",array( 
									"articleId" => $aid,
									"userId" 	=> $uid,
									"message" 	=> $msg
									));
		return $this->db->insert_id();
	}
	
	
	public function findAll( $status, $langCode = false, $isBackend = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT *	
		FROM `".$this->table."` WHERE `".$this->table."`.`status` = ? AND `".$this->table."`.`langCode` = ? ORDER BY `markDate` DESC";
		if( $status == "news" && $isBackend === false )
		{			
			$sql = "SELECT * FROM `".$this->table."` WHERE `".$this->table."`.`status` = ? AND `".$this->table."`.`flag` = '1' AND `".$this->table."`.`langCode` = ? ORDER BY `markDate` DESC";
		}
		$result = $this->db->query($sql,array($status,$lang))->result_array();
		foreach( $result as &$row )
		{
			$row['value'] 	= json_decode($row['value'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function allClass()
	{
		$sql = "SELECT * FROM `".$this->table2."` ";
		$result = $this->db->query($sql)->result_array();
		foreach( $result as &$row )
		{
			$row['value'] 	= json_decode($row['value'],true);
			$row['icon'] 	= json_decode($row['icon'],true);
			$row['banner'] 	= json_decode($row['banner'],true);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function countClassHome( $class, $langCode = false, $flag = false )
	{		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$flagVar = ($flag === false)?";":" AND `".$this->table."`.`flag` = 1;";
		$sql = "SELECT *
				  FROM `".$this->table."` 
				  JOIN `".$this->table2."` ON `".$this->table2."`.id = `".$this->table."`.`class`
				 WHERE `".$this->table."`.`class` = ? AND `".$this->table."`.`status` = ? AND `".$this->table."`.`langCode` = ? $flagVar";
		$result = $this->db->query($sql,array($class,"news",$lang))->result_array();
		return count($result);
	}
	
	public function classHome( $class, $start = 0, $limit = 12, $sort = "touch", $langCode = false)
	{
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		if( $class ===  false )
		{
			$sql = "SELECT *,
						`".$this->table."`.`id` AS id,
						`".$this->table2."`.`value` AS cvalue,
						`".$this->table2."`.`icon` AS cicon,
						`".$this->table2."`.`banner` AS cbanner,
						`".$this->table2."`.`touch` AS ctouch,
						`".$this->table."`.`touch` AS atouch,
						`".$this->table."`.`value` AS value,
						( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
					  FROM `".$this->table."` 
					  JOIN `".$this->table2."` ON `".$this->table2."`.id = `".$this->table."`.`class`
					 WHERE `".$this->table."`.`status` = ? 
							AND `".$this->table."`.`langCode` = ?
							AND `".$this->table."`.`flag` = ?
						ORDER BY  `".$this->table."`.`{$sort}` DESC 
						LIMIT {$start}, {$limit} ";
			$result = $this->db->query($sql,array("news",$lang,"1"))->result_array();
		}
		else
		{
			$sql = "SELECT *,
						`".$this->table."`.`id` AS id,
						`".$this->table2."`.`value` AS cvalue,
						`".$this->table2."`.`icon` AS cicon,
						`".$this->table2."`.`banner` AS cbanner,
						`".$this->table2."`.`touch` AS ctouch,
						`".$this->table."`.`touch` AS atouch,
						`".$this->table."`.`value` AS value						
					  FROM `".$this->table."` 
					  JOIN `".$this->table2."` ON `".$this->table2."`.id = `".$this->table."`.`class`
					 WHERE `".$this->table."`.`class` = ? 
							AND `".$this->table."`.`status` = ? 
							AND `".$this->table."`.`langCode` = ?
							AND `".$this->table."`.`flag` = ?
						ORDER BY  `".$this->table."`.`{$sort}` DESC 
						LIMIT {$start}, {$limit} ";	
			$result = $this->db->query($sql,array($class,"news",$lang,"1"))->result_array();
		}
		$this->load->model("User_model","mUser");	
		foreach( $result as &$row )
		{
			$row['cvalue'] 	= json_decode($row['cvalue'],true);
			$row['cicon'] 	= json_decode($row['cicon'],true);
			$row['cbanner'] = json_decode($row['cbanner'],true);
			$row['value'] 	= json_decode($row['value'],true);
			
			$bloger = $this->mUser->findUserById($row["author"]);
			$bloger[0]["picture"] = isset($bloger[0]["picture"]) ? json_decode($bloger[0]["picture"],true) :"";
			$row['bloger'] = $bloger[0];
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function allBloger()
	{
		
		$sql = "SELECT *,
					`blog`.`value` AS bvalue,
					`blog`.`status` AS bstatus,
					`blog`.`class` AS bclass,
					`blog`.`touch` AS btouch
				  FROM `blog` 
				  JOIN `user` ON `user`.id = `blog`.`user_id`
				  ORDER BY `btouch` DESC ";
		$result = $this->db->query($sql)->result_array();
		foreach( $result as &$row )
		{
			$row['bvalue'] 		= json_decode($row['bvalue'],true);
			$row['picture'] 	= json_decode($row['picture'],true);
			$row['arrBClass'] 	= explode(",", $row['bclass']);
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	public function allClassTopFive()
	{
		$result = $this->allClass();
		foreach( $result AS &$row )
		{
			$row["listArticle"] = $this->classHome($row["id"], 0, 5);
		}
		return $result;
	}
	
	public function admin_find( $status, $id = false, $user_id = false, $orderby = false )
	{
		if( $user_id === false )
		{
			$orderby = ( $orderby === false ) ? "markDate" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
			FROM `".$this->table."` WHERE `".$this->table."`.`status` = ? AND `".$this->table."`.`id` = ?
			ORDER BY `".$this->table."`.`{$orderby}` DESC; ";		
			$result = $this->db->query($sql,array($status,$id))->result_array();			
		}
		else if( $id == false) 
		{
			$orderby = ( $orderby === false ) ? "touch" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
			FROM `".$this->table."` WHERE `".$this->table."`.`author` = ? AND `".$this->table."`.`status` = ? ORDER BY `".$this->table."`.`{$orderby}` DESC; ";		
			$result = $this->db->query($sql,array($user_id,$status))->result_array();		
		}
		else
		{
			$orderby = ( $orderby === false ) ? "markDate" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
			FROM `".$this->table."` WHERE `".$this->table."`.`author` = ? AND `".$this->table."`.`status` = ? AND `".$this->table."`.`id` = ? ORDER BY `".$this->table."`.`{$orderby}` DESC; ";		
			$result = $this->db->query($sql,array($user_id,$status,$id))->result_array();	
		}
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record['blog-date'] 	= $this->format_date($row['markDate']);
			$record['raw-date'] 	= $row['markDate'];
			$record['id'] 			= $row['id'];
			$record['author'] 		= $row['author'];
			isset($row['classKey']) ? $record['classKey'] = $row['classKey'] : "";
			isset($row['classValue']) ? $record['classValue'] = json_decode($row['classValue'],true) : "";
			isset($row['classIcon']) ? $record['classIcon'] = json_decode($row['classIcon'],true) : "";
			isset($row['classBanner']) ? $record['classBanner'] = json_decode($row['classBanner'],true) : "";
			$record['class'] 		= $row['class'];
			$record['tag'] 			= $row['tag'];
			$record['status'] 		= $row['status'];
			$record['msgCount'] 	= $row['msgCount'];
			$record['touch'] 		= $row['touch'];
			$record['blog-title'] 	= $row['blog-title'];
			$record['blog-content'] = $row['blog-content'];
			$record['blog-summary'] = $row['blog-summary'];
			$record['blog-href'] 	= base_url("article/".$row['id']);
			$record['blog-extra'] 	= json_decode($row['value'],true);
			$record['raw-extra'] 	= $row['value'];
			$record['langCode'] 	= $row['langCode'];
			
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function touchArticle( $id, $classKey, $blogerId )
	{		
		$result = 0;
		$sql = "UPDATE `".$this->table."` SET `touch`=`touch`+1 WHERE `id` = '".$id."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		$sql = "UPDATE `".$this->table2."` SET `touch`=`touch`+1 WHERE `key` = '".$classKey."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		$sql = "UPDATE `blog` SET `touch`=`touch`+1 WHERE `user_id` = '".$blogerId."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		return $result;
	}
	
	public function keywordSearch( $title )
	{
		
		$sql = "SELECT * FROM `".$this->table."` WHERE `".$this->table."`.`blog-title` like '%$title%'; ";
		
		$result = $this->db->query($sql,array())->result_array();
		
		$new_res = array();
		
		
		
		foreach( $result as $row )
		{
			$record = array();
			$record['blog-date'] 	= $this->format_date($row['markDate']);
			$record['raw-date'] 	= $row['markDate'];
			$record['markDate'] 	= $row['markDate'];
			$record['id'] 			= $row['id'];
			$record['author'] 		= $row['author'];
			$record['tag'] 			= $row['tag'];
			$record['class'] 		= $row['class'];
			$record['blog-title'] 	= $row['blog-title'];
			$record['blog-content'] = $row['blog-content'];
			$record['blog-summary'] = $row['blog-summary'];
			// $record['blog-href'] 	= base_url("article/".$row['contentKey']);
			$record['blog-extra'] 	= json_decode($row['value'],true);
			$record['raw-extra'] 	= $row['value'];
			$record['langCode'] 	= $row['langCode'];
			
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	public function delete($id)
	{
		$this->check_RecordExistByWhereCase( array( 'id' => $id ),"`sortkey` ASC" );
		$result = $this->last_result;
		if( count($result) > 0 )
		{
			$this->db->delete('".$this->table."', array('id' => $id)); 
		}
	}
	
	public function save( $data )
	{
		$new_data 	 = array();
		$sample_data = array("blog-title","status","class","flag","tag","author","blog-content","blog-summary","markDate","value","langCode");
		if( $data["id"] == "-1" )
		{
			foreach($data AS $key=>$val)
			{ 
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->insert($this->table, $new_data); 
		}
		else
		{
			foreach($data AS $key=>$val)
			{
				if(in_array($key,$sample_data))
				{
					$new_data[$key] = (is_array($val))?json_encode($val):$val;	
				}					
			}
			$this->db->update($this->table, $new_data, array("id" => $data["id"]));
		}
		$result[] = $this->db->last_query();
		return $result;
	}
	
	public function find( $id, $langCode = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT *
			, ( SELECT `key` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
				FROM `".$this->table."` WHERE `".$this->table."`.`id` in ($id) AND `".$this->table."`.`status` = 'blog' AND `".$this->table."`.`langCode` = ?";		
		
		$result = $this->db->query($sql,array($lang))->result_array();
		
		foreach( $result as &$row )
		{
			$row['blog-date'] 	= $this->format_date($row['markDate']);
			$row['blog-href'] 	= base_url("article/".$row['id']);
			$row['classValue'] 	= json_decode($row['classValue'],true);
			$row['classIcon'] 	= json_decode($row['classIcon'],true);
			$row['classBanner']	= json_decode($row['classBanner'],true);
			$row['blog-extra'] 	= json_decode($row['value'],true);
			$sql = "SELECT * FROM `user` WHERE `user`.`id` = '{$row["author"]}'";	
			$res = $this->db->query($sql)->result_array();
			//$res[0]["picture"] = json_decode($res[0]["picture"],true);
			//$row['bloger'] = $res[0];
		}
		$this->last_result = $result;
		return $this->last_result;
	}

	public function findBrand( $id, $langCode = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT *
			, ( SELECT `key` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `".$this->table2."` WHERE `".$this->table2."`.`id` = `".$this->table."`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `".$this->table."`.`id` LIMIT 1 ) AS msgCount
				FROM `".$this->table."` WHERE `".$this->table."`.`id` in ($id) AND `".$this->table."`.`status` = 'brand' AND `".$this->table."`.`langCode` = ?";		
		
		$result = $this->db->query($sql,array($lang))->result_array();
		
		foreach( $result as &$row )
		{
			$row['blog-date'] 	= $this->format_date($row['markDate']);
			$row['blog-href'] 	= base_url("article/".$row['id']);
			$row['classValue'] 	= json_decode($row['classValue'],true);
			$row['classIcon'] 	= json_decode($row['classIcon'],true);
			$row['classBanner']	= json_decode($row['classBanner'],true);
			$row['blog-extra'] 	= json_decode($row['value'],true);
			$sql = "SELECT * FROM `user` WHERE `user`.`id` = ? ";	
			$res = $this->db->query($sql,array($row["author"]))->result_array();
			//$res[0]["picture"] = json_decode($res[0]["picture"],true);
			//$row['bloger'] = $res[0];
		}
		$this->last_result = $result;
		return $this->last_result;
	}
	
	function query($contentKey)
	{
		$sql = "SELECT * FROM `".$this->table."` WHERE `".$this->table."`.`contentKey` = ? AND `".$this->table."`.`langCode` = ?";
	
		$result = $this->db->query($sql,array($contentKey,$this->currentLang))->result_array();
		
		$new_res = array();
		foreach( $result as $row )
		{
			$record = array();
			$record['blog-date'] 	= $this->format_date($row['markDate']);
			$record['class'] 		= $row['class'];
			$record['tag'] 			= $row['tag'];
			$record['blog-title'] 	= $row['blog-title'];
			$record['blog-content'] = $row['blog-content'];
			$record['blog-summary'] = $row['blog-summary'];
			$record['blog-href'] 	= base_url("article/".$row['contentKey']);
			$record['blog-extra'] 	= json_decode($row['value'],true);
			
			$new_res[] = $record;
		}
		$this->last_result = $new_res;
		return $this->last_result;
	}
	
	
	function format_date($date)
	{
		
		$result = date("d M Y", strtotime( $date ) );
		$monthKey = intval (date("m", strtotime( $date ) ));
		$ch_mount = array("一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月");
		switch($this->currentLang)
		{
			case 'zh-hant':
				$result = date("d ".$ch_mount[$monthKey-1]." Y", strtotime( $date ) );
				break;
			case 'zh-hans':
				$result = date("d ".$ch_mount[$monthKey-1]." Y", strtotime( $date ) );
				break;
		}
		
		return $result;
	}
	
	public function sizeOf()
	{
		return ($this->type)?count($this->last_result):false;
	}

}