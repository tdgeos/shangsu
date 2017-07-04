<?php
 $link=MySQL_connect('localhost','tdgeos','tdgeos');//连接MySQL
 mysql_select_db('shangsu');
 mysql_query('set names utf8');
	if (!$link)
	  {
	  	die('数据库连接错误: ' . mysql_error());
	  }
?>