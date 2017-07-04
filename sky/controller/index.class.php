<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

class Controller_Index_Class extends Common_Global_Class 
{
	function Controller_Index_Class()
	{
		parent::Common_Global_Class();
	}
	
	function indexAction()
	{
		$this->template( 'index' );
	}
	
	function testAction()
	{
		$subject = '这是测试信息';
		$message[] = '当前服务器时间:'.$this->dateFormat( $this->config['nowtime'] );
		$link['url'] = 'javascript:history.go(-1);';
		$link['str'] = '返回上一页';
		
		$this->message( $subject, $message, $link );
	}
}

?>