<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

class Controller_Index_Class extends Common_Global_Class 
{
	function Controller_Index_Class()
	{
		parent::Common_Global_Class();
		
		if( $this->checkIconv() == false )
		$this->message( '安装失败', '您的系统不支持iconv或mb_convert_encoding函数,无法安装,请联系空间商开启', 'failed' );
		
	}
	
	function indexAction()
	{
		$this->template( 'index' );
	}

}

?>