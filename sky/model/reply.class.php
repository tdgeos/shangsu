<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 回复模型
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.25
 * @modified 2009.5.1
 * 
 */

class Model_Reply_Class
{
	var $_tableName = 'reply';
	var $_db;
	
	function Model_Reply_Class( $db, $tablePrefix )
	{
		$this->_db = $db;
		$this->_tableName = $tablePrefix.$this->_tableName;
	}

	function newReply( $replyTo, $uid, $username, $content, $dateline  )
	{
		
		$sql = "INSERT INTO {$this->_tableName} 
							( 
							`replyto`, 
							`uid`,
							`account`,
							`content`, 
							`dateline`
							) 
							VALUES 
							(
							{$replyTo}, 
							{$uid},
							'{$username}', 
							'{$content}', 
							{$dateline} 
							)";
				
		$this->_db->query( $sql );
		
		return $this->_db->insert_id();
		
	}
	
	function replys( $replyto, $start = 0, $limit = 30 )
	{
		
		$sql = "SELECT	`rid`, 
						`replyto`, 
						`uid`, 
						`account`, 
						`content`, 
						`dateline`
				FROM	{$this->_tableName}
				WHERE	`replyto` = {$replyto}
				
				ORDER BY rid DESC
				LIMIT {$start}, {$limit}";
		
		$query = $this->_db->query( $sql );
				
		while ( false != ( $result = $this->_db->fetch( $query ) ) )
		{
			$return[] = $result;
		}
		unset( $result );
		
		return $return;
	}

	function replysNums( $replyto )
	{
		
		$sql = "SELECT	`rid`
				FROM	{$this->_tableName}
				WHERE	`replyto` = {$replyto}
				";
		
		return $this->_db->num_rows( $sql );
	}
	
	function delReply( $replyto )
	{
		
		$sql = "DELETE
				FROM	{$this->_tableName}
				WHERE	`replyto` = {$replyto}
				";
		
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
}

?>