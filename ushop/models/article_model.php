<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends My_Model {

	public $id = false;
	
    function __construct()
    {
        parent::__construct();		
		$this->table = "article_content";
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
	
	
	public function findAll( $status, $langCode = false, $isBackend = false, $author = false )
	{	
		if($author){  $where_author = " AND author='".$author."' ";	}

		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT * FROM `article_content` WHERE `article_content`.`status` = ? AND `article_content`.`langCode` = ? ".$where_author." ORDER BY `markDate` DESC";
		if( $status == "blog" && $isBackend === false )
		{			
			$sql = "SELECT * FROM `article_content` WHERE `article_content`.`status` = ? AND `article_content`.`flag` = '1' AND `article_content`.`langCode` = ? ".$where_author." ORDER BY `markDate` DESC";
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
		$sql = "SELECT * FROM `article_class` ";
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
		
		$flagVar = ($flag === false)?";":" AND `article_content`.`flag` = 1;";
		$sql = "SELECT *
				  FROM `article_content` 
				  JOIN `article_class` ON `article_class`.id = `article_content`.`class`
				 WHERE `article_content`.`class` = ? AND `article_content`.`status` = ? AND `article_content`.`langCode` = ? $flagVar";
		$result = $this->db->query($sql,array($class,"blog",$lang))->result_array();
		return count($result);
	}
	
	public function classHome( $class, $start = 0, $limit = 12, $sort = "touch", $langCode = false)
	{
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		if( $class ===  false )
		{
			$sql = "SELECT *,
						`article_content`.`id` AS id,
						`article_class`.`value` AS cvalue,
						`article_class`.`icon` AS cicon,
						`article_class`.`banner` AS cbanner,
						`article_class`.`touch` AS ctouch,
						`article_content`.`touch` AS atouch,
						`article_content`.`value` AS value,
						( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
					  FROM `article_content` 
					  JOIN `article_class` ON `article_class`.id = `article_content`.`class`
					 WHERE `article_content`.`status` = ? 
							AND `article_content`.`langCode` = ?
							AND `article_content`.`flag` = ?
						ORDER BY  `article_content`.`{$sort}` DESC 
						LIMIT {$start}, {$limit} ";
			$result = $this->db->query($sql,array("blog",$lang,"1"))->result_array();
		}
		else
		{
			$sql = "SELECT *,
						`article_content`.`id` AS id,
						`article_class`.`value` AS cvalue,
						`article_class`.`icon` AS cicon,
						`article_class`.`banner` AS cbanner,
						`article_class`.`touch` AS ctouch,
						`article_content`.`touch` AS atouch,
						`article_content`.`value` AS value,
						( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
					  FROM `article_content` 
					  JOIN `article_class` ON `article_class`.id = `article_content`.`class`
					 WHERE `article_content`.`class` = ? 
							AND `article_content`.`status` = ? 
							AND `article_content`.`langCode` = ?
							AND `article_content`.`flag` = ?
						ORDER BY  `article_content`.`{$sort}` DESC 
						LIMIT {$start}, {$limit} ";	
			$result = $this->db->query($sql,array($class,"blog",$lang,"1"))->result_array();
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
			$row["listArticle"] = $this->classHome( $row["id"], 0, 5);
		}
		return $result;
	}
	
	public function admin_find( $status, $id = false, $user_id = false, $orderby = false )
	{
		if( $user_id === false )
		{
			$orderby = ( $orderby === false ) ? "markDate" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
			FROM `article_content` WHERE `article_content`.`status` = ? AND `article_content`.`id` = ?
			ORDER BY `article_content`.`{$orderby}` DESC; ";		
			$result = $this->db->query($sql,array($status,$id))->result_array();			
		}
		else if( $id == false) 
		{
			$orderby = ( $orderby === false ) ? "touch" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
			FROM `article_content` WHERE `article_content`.`author` = ? AND `article_content`.`status` = ? ORDER BY `article_content`.`{$orderby}` DESC; ";		
			$result = $this->db->query($sql,array($user_id,$status))->result_array();		
		}
		else
		{
			$orderby = ( $orderby === false ) ? "markDate" : $orderby;
			$sql = "SELECT *
			, ( SELECT `key` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
			FROM `article_content` WHERE `article_content`.`author` = ? AND `article_content`.`status` = ? AND `article_content`.`id` = ? ORDER BY `article_content`.`{$orderby}` DESC; ";		
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
		$sql = "UPDATE `article_content` SET `touch`=`touch`+1 WHERE `id` = '".$id."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		$sql = "UPDATE `article_class` SET `touch`=`touch`+1 WHERE `key` = '".$classKey."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		$sql = "UPDATE `blog` SET `touch`=`touch`+1 WHERE `user_id` = '".$blogerId."'";
		$this->db->query($sql);
		$result+=$this->db->affected_rows();
		return $result;
	}
	
	public function keywordSearch( $title )
	{
		
		$sql = "SELECT * FROM `article_content` WHERE `article_content`.`blog-title` like '%$title%'; ";
		
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
			$this->db->delete('article_content', array('id' => $id)); 
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
			$this->db->insert('article_content', $new_data); 
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
			$this->db->update('article_content', $new_data, array("id" => $data["id"]));
		}
		$result[] = $this->db->last_query();
		return $result;
	}
	
	public function find( $id, $langCode = false )
	{	
		
		$lang = ($langCode == false)?$this->currentLang:$langCode;
		
		$sql = "SELECT *
			, ( SELECT `key` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
				FROM `article_content` WHERE `article_content`.`id` in ($id) AND `article_content`.`status` = 'blog' AND `article_content`.`langCode` = ?";		
		
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
			, ( SELECT `key` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classKey'
			, ( SELECT `value` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classValue'
			, ( SELECT `icon` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classIcon'
			, ( SELECT `banner` FROM `article_class` WHERE `article_class`.`id` = `article_content`.`class` LIMIT 1 ) AS 'classBanner'
			, ( SELECT COUNT(*) FROM `message_board` WHERE `message_board`.`articleId` = `article_content`.`id` LIMIT 1 ) AS msgCount
				FROM `article_content` WHERE `article_content`.`id` in ($id) AND `article_content`.`status` = 'brand' AND `article_content`.`langCode` = ?";		
		
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
		$sql = "SELECT * FROM `article_content` WHERE `article_content`.`contentKey` = ? AND `article_content`.`langCode` = ?";
	
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