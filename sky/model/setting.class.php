<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 系统设置数据模型
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.6.6
 * @modified 2009.6.16
 * 
 */

class Model_Setting_Class
{
	var $_tableName = 'setting';
	var $_db;
	function Model_Setting_Class( $db, $tablePrefix )
	{
		$this->_db = $db;
		$this->_tableName = $tablePrefix.$this->_tableName;
	}
	
	function getSetting()
	{
		$sql = "SELECT `setname`, `data` FROM `{$this->_tableName}`";
			
		$query = $this->_db->query( $sql );
				
		while ( false != ( $result = $this->_db->fetch( $query ) ) )
		{
			$return[] = $result;
		}
		unset( $result );
		
		return $return;
		
	}
	
	function add( $name, $value )
	{
		$sql = "INSERT INTO `{$this->_tableName}` ( `setname`, `data` ) VALUES ( '{$name}', '{$value}' ) ";
		
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
	
	function update( $array )
	{
		$val = implode( ',', $array );
		$sql = "REPLACE INTO `{$this->_tableName}` ( `setname`, `data` ) VALUES {$val} ";
		
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
	
	function del( $name )
	{
		$sql = "DELETE FROM `{$this->_tableName}` WHERE `setname` = '{$name}'";
		
		$this->_db->query( $sql );
		
		return $this->_db->affected_rows();
	}
}

?>