<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 天空数据模型
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

class Model_SkyItem_Class
{
	var $_tableName = 'items';
	var $_db;
	
	function Model_SkyItem_Class( $db, $tablePrefix )
	{
		$this->_db = $db;
		$this->_tableName = $tablePrefix.$this->_tableName;
	}
	
	function delete( $itemId )
	{
		
		$sql = "DELETE
				FROM   {$this->_tableName}
				WHERE `itemid` = {$itemId}";
		
		$this->_db->query( $sql );
	
		return $this->_db->affected_rows();
	}
	
	function updateDiggNum( $itemId, $val = 1 )
	{
		
		$sql = "UPDATE  {$this->_tableName} SET digg = digg+{$val} WHERE itemid = {$itemId}";
		
		$this->_db->query( $sql );
	
		return $this->_db->affected_rows();
	}
	
	function newItem( $content, $uid, $account, $dateline )
	{
		if( $uid <= 0 || empty( $content ) || empty( $account ) )
		{
			return 0;
		}
		
		
		$sql = "INSERT INTO {$this->_tableName} 
							(
							`uid`, 
							`account`,
							`content`, 
							`dateline`
							) 
							VALUES 
							(
							{$uid},
							'{$account}',
							'{$content}',
							{$dateline}
							)";
				
		$this->_db->query( $sql );
		
		return $this->_db->insert_id();
		
	}
	
	function updateReplyNum( $itemId, $val = 1 )
	{
		
		$sql = "UPDATE  {$this->_tableName} SET reply = reply+{$val} WHERE itemid = {$itemId}";
		
		$this->_db->query( $sql );
	
		return $this->_db->affected_rows();
	}
	
	function items( $start = 0, $limit = 100, $withOutItem = 0, $orderBy = ' itemid DESC ' )
	{
		$sql = "SELECT `itemid`, 
					   `uid`, 
					   `account`,
					   `content`, 
					   `dateline`, 
					   `digg`, 
					   `reply`
				FROM   {$this->_tableName}
				WHERE  `itemid` != {$withOutItem}
				ORDER BY {$orderBy}
				LIMIT {$start}, {$limit}";
		
		$query = $this->_db->query( $sql );
		
		while ( false !== ( $result = $this->_db->fetch( $query ) ) )
		{
			$return[] = $result;
		}
		
		unset( $result );
		
		return $return;
	}
	
	function itemsNums( $withOutItem = 0 )
	{
		$sql = "SELECT `itemid`
				FROM   {$this->_tableName}
				WHERE  `itemid` != {$withOutItem}";
		
		return $this->_db->num_rows( $sql );
	}
	
	function getone( $itemId )
	{
		$sql = "SELECT `itemid`, 
					   `uid`, 
					   `account`,
					   `content`, 
					   `dateline`, 
					   `digg`, 
					   `reply`
				FROM   {$this->_tableName}
				WHERE  `itemId` = {$itemId}";
				
		$query = $this->_db->query( $sql );
		
		return  $this->_db->fetch( $query );
	}
	
	function userItems( $uid, $start = 0, $limit = 100 )
	{
		$sql = "SELECT `itemid`, 
					   `uid`, 
					   `account`,
					   `content`, 
					   `dateline`, 
					   `digg`, 
					   `reply`
				FROM   {$this->_tableName}
				WHERE  `uid` = {$uid}
				
				ORDER BY itemid DESC
				LIMIT {$start}, {$limit}";
		
		$query = $this->_db->query( $sql );
		
		while ( false != ( $result = $this->_db->fetch( $query ) ) )
		{
			$return[] = $result;
		}
		
		unset( $result );
		
		return $return;
	}
	
	function userItemsNums( $uid )
	{
		$sql = "SELECT `itemid`
				FROM   {$this->_tableName}
				WHERE  `uid` = {$uid}";
		
		
		return $this->_db->num_rows( $sql );
	}
}

?>