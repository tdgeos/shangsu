<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 数据库操作类
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice mysql version >= 4.1
 * 
 * @createDate 2009.4.25
 * @modified 2009.4.25
 * 
 */

class Common_Mysql_Class
{
	//数据库连接
	var $conn = null;
	var $version;
	
	//允许的字符集
	var $AllowCharset;
	
	
	function Common_Mysql_Class()
	{
		$this->AllowCharset = array( 'utf8', 'big5', 'gbk' );
	}

	function init( $dbHost, $dbUser, $dbPassword, $dbName, $charset = 'utf8'  )
	{
		
		$this->connect( $dbHost, $dbUser, $dbPassword );
		
		if( !$this->select_db( $dbName ) )
		return false;
		
		$this->version();
		$this->charset( $charset );
		
		return true;
	}
	
	function connect( $dbHost, $dbUser, $dbPassword )
	{
		
		$this->conn = @mysql_connect( $dbHost, $dbUser, $dbPassword );
		
		if( !$this->conn )
		return false;
		
		return true;
		
	}
			

	function charset( $char )
	{
		$charset = strtolower( str_replace( '-', '', $char ) );
		
		if( !in_array( $charset, $this->AllowCharset ) )
		return false;
		
		if( $this->version() > '4.1' )
		$this->query( 'SET NAMES '.$charset );
		
		return true;
	}
	
	function query( $sql, $mode = 'mysql_query' )
	{
		$sql = trim( $sql );
		if( !function_exists( $mode ) || $sql == '')
		return false;
		
		$query = @$mode( $sql, $this->conn );
		if( !false ==  mysql_error() )
		return false;
		
		return $query;
	}
	
	function select_db( $dbName )
	{
		if( !@mysql_select_db( $dbName, $this->conn ) )
		return false;
		
		return true;
	}
	
	function fetch( $query, $resultType = MYSQL_ASSOC ) 
	{
		return mysql_fetch_array( $query, $resultType );
	}
	
	function affected_rows() 
	{
		return mysql_affected_rows( $this->conn );
	}
	
	function num_rows( $sql ) 
	{
		return mysql_num_rows( $this->query( $sql ) );
	}

	function insert_id() 
	{
		return ( ( $id = mysql_insert_id( $this->conn ) ) && $id >= 0 ) ? $id : $this->result( 'SELECT last_insert_id()' );
	}

	function result( $sql, $row = 0 ) 
	{
		return @mysql_result( $this->query( $sql ), $row );
	}
	
	function fetch_row( $sql ) 
	{
		return mysql_fetch_row( $this->query( $sql ) );
	}
	
	function close() 
	{
		return mysql_close( $this->conn );
	}
		
	function version() {
		if( empty( $this->version ) ) 
		{
			$this->version = mysql_get_server_info($this->conn);
		}
		return $this->version;
	}
	
}

?>