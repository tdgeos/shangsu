<?php

/**
 * @purpose valueObject 传递数据用,singleton
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.4.27
 * @modified 2009.5.2
 * 
 */

class Vo_View_Class{
	
	var $_vo;
	
	function Vo_View_Class(){}
	
	function __get( $name )
	{
		return $this->_vo[$name];	
	}
	
	function __set( $name, $value )
	{
		$this->_vo[$name] = $value;
	}
	
}

?>