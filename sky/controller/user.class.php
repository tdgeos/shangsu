<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 用户操作控制器
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.25
 * @modified 2009.4.25
 * 
 */

class Controller_User_Class extends Common_Global_Class 
{
	
	function Controller_User_Class()
	{
		parent::Common_Global_Class();
		
	}
	
	function indexAction(){}
	
	function loginAction()
	{
		
		$user = $this->s2d( $this->post['username'] );
		$password = $this->s2d( $this->post['password'] );
		
		$expire = $this->get['keepOnline'] == 1 ? 31104000 : 86400;
		$_ENV['multipleObj']->login( $user, $password, $expire );
	}
	
	function checkLoginAction()
	{
		$_ENV['multipleObj']->checkLogin();
	}

	function logoutAction()
	{
		$_ENV['multipleObj']->logout();
	}
	
	
}

?>