<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 广播数据模型
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.28
 * @modified 2009.5.1
 * 
 */

class Model_Broadcast_Class
{
	var $_tableName = 'broadcast';
	var $_db;
	function Model_Broadcast_Class( $db, $tablePrefix )
	{
		$this->_db = $db;
		$this->_tableName = $tablePrefix.$this->_tableName;
	}
	
	function add( $content, $sort = 0, $goUrl = '#' )
	{
		
		$sql = "INSERT INTO {$this->_tableName} ( sortid, content, gourl ) VALUES ( {$sort}, '{$content}', '{$goUrl}' )";
			
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
	
	function broadcasts( $start = 0, $limit = 10 )
	{
		$sql = "SELECT	`bid`,
						`sortid`, 
						`content`,
						`gourl` 
						
				FROM	{$this->_tableName}
				
				ORDER BY `sortid` DESC , `bid` DESC 
				
				LIMIT {$start}, {$limit}";
			
		$query = $this->_db->query( $sql );
				
		while ( false != ( $result = $this->_db->fetch( $query ) ) )
		{
			$return[] = $result;
		}
		unset( $result );
		
		return $return;
	}

	function broadcastNums()
	{
		$sql = "SELECT	`bid` FROM	{$this->_tableName}";
			
		return $this->_db->num_rows( $sql );
	}
	
	function del( $bid = -1 )
	{
		if( $bid  < 0 )
		{
			$sql = "TRUNCATE TABLE {$this->_tableName}";
		}
		else
		{
			$sql = "DELETE	FROM {$this->_tableName} WHERE	`bid` = {$bid} ";
		}
		
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
	
	function update( $bid, $data )
	{
		if( sizeof( $data ) == 0 )
		return false;
		
		$sqlAdd = '';
		foreach ( $data as $key=>$value )
		{
			$sqlAdd[] = " {$key} = '{$value}' ";
		}
		
		$sqlAdd = implode( ',', $sqlAdd );
		
		$sql = "UPDATE {$this->_tableName} SET {$sqlAdd} WHERE bid = {$bid} ";
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
}

?>