<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

class Controller_Index_Class extends Common_Global_Class 
{
	function Controller_Index_Class()
	{
		parent::Common_Global_Class();
	}
	
	function checkAction()
	{
		$hookKey = $this->get['hookKey'] ? $this->get['hookKey'] : $this->post['hookKey'];
		if( $this->config['hookKey'] == $hookKey )
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}

?>