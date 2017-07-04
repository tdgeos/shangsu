<?php

require_once ( SKY_ROOT.'/data/multiple/comsenzuc/config.php');
require_once ( SKY_ROOT.'/api/comsenzuc/uc_client/client.php' );

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 康盛系列产品同步,同步登录及退出
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.25
 * @modified 2009.4.27
 * 
 */

class Common_Multiple_Comsenzuc_Class
{
	var $globalObj;
	
	function Common_Multiple_Comsenzuc_Class( $globalObj )
	{
		$this->globalObj = $globalObj;
	}
	
	function login( $username, $password, $expire = 31104000 )
	{
		if( $this->globalObj->config['authServerCharset']!= $this->globalObj->config['db']['charset'] )
		{
			$username = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $username );
			$password = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $password );
		}
		
		list( $uid, $username, $password ) = uc_user_login( $username, $password );
		
		if( $uid > 0) 
		{
			$this->saveCookieSession( $uid, $username, $password, $expire );
			
			if( $this->globalObj->config['authServerCharset']!= $this->globalObj->config['db']['charset'] )
			{
				$username = $this->globalObj->skyIconv( $this->globalObj->config['authServerCharset'], $this->globalObj->config['db']['charset'], $username );
				$password = $this->globalObj->skyIconv( $this->globalObj->config['authServerCharset'], $this->globalObj->config['db']['charset'], $password );
			}
			
			$this->_userinfoXML( $uid, $username, $this->useravatar( $uid, false, 'big' ), uc_user_synlogin( $uid ), true );
			
		} 
		elseif( $uid == -1 ) 
		{
			$this->globalObj->dataReturn( '用户不存在,或者被删除', 'failed' );
		} 
		elseif( $uid == -2 ) 
		{
			$this->globalObj->dataReturn( '密码错误', 'failed' );
		} 
		else 
		{
			$this->globalObj->dataReturn( '未定义的操作', 'failed' );
		}
		
	}
	
	function saveCookieSession( $uid, $username, $password, $expire = 31104000 )
	{
		if( $this->globalObj->config['authServerCharset']!= $this->globalObj->config['db']['charset'] )
		{
			$username = $this->globalObj->skyIconv( $this->globalObj->config['authServerCharset'], $this->globalObj->config['db']['charset'], $username );
			$password = $this->globalObj->skyIconv( $this->globalObj->config['authServerCharset'], $this->globalObj->config['db']['charset'], $password );
		}
		
		$this->globalObj->cookie( $this->globalObj->config['userCookieName'], array( $uid, $username, $password, $expire ), $expire );
		$this->globalObj->session( $this->globalObj->config['userSessionName'], array( $uid, $username, $password ) );
	}
	
	function logout()
	{
		$this->clearCookieSession();
		$sylogoutUrl = $this->getScriptSrc( uc_user_synlogout() );
		$this->globalObj->dataReturn( implode( ',', $sylogoutUrl ) );
	}
	
	function clearCookieSession()
	{
		$this->globalObj->clearCookie( $this->globalObj->config['userCookieName'] );
		$this->globalObj->clearSession( $this->globalObj->config['userSessionName'] );
	}
	
	function userinfo()
	{
		$userinfoCookie = $this->globalObj->cookie( $this->globalObj->config['userCookieName'] );
		$userinfoSession = $this->globalObj->session( $this->globalObj->config['userSessionName'] );
		
		$userinfo = array();
		if( !empty( $userinfoCookie[0] ) &&  $userinfoCookie[0] ==  $userinfoSession[0] )
		{
			$userinfo['uid'] = $userinfoSession[0];
			$userinfo['username'] = $userinfoSession[1];
			$userinfo['password'] = $userinfoSession[2];
			$userinfo['bigface'] = $this->useravatar( $userinfoSession[0], false, 'big' );
			$userinfo['smallface'] = $this->useravatar( $userinfoSession[0], false, 'small' );
		}
		elseif( !empty( $userinfoCookie[0] ) )
		{
			list( $uid, $username, $password ) = uc_user_login( $userinfoCookie[1], $userinfoCookie[2] );
			if( $uid > 0) 
			{
				$userinfo['uid'] = $uid;
				$userinfo['username'] = $username;
				$userinfo['password'] = $password;
				$userinfo['bigface'] = $this->useravatar( $uid, false, 'big' );
				$userinfo['smallface'] = $this->useravatar( $uid, false, 'small' );
				$this->saveCookieSession( $uid, $username, $password, $userinfoCookie[3] );
			}
		}
		
		return $userinfo;
	}
	
	function useravatar( $uid, $encode, $size )
	{
		$type = '';
		if( $this->globalObj->config['useRealAvatar'] == 1 )
		{
			$type='type=real&';	
		}
		
		$url = preg_match( '/.+\/$/', UC_API ) ? UC_API : UC_API.'/';
		
		if( $encode == true )
		{
			return urlencode( $url.'avatar.php?'.$type.'uid='.$uid.'&size='.$size );
		}
		else
		{
			return $url.'avatar.php?'.$type.'uid='.$uid.'&size='.$size;
		}
	}
	
	function checkLogin()
	{
		$userinfo = $this->userinfo();
		
		if( !empty( $userinfo ) )
		{
			$this->_userinfoXML( $userinfo['uid'], $userinfo['username'], $userinfo['bigface'], uc_user_synlogin( $userinfo['uid'] ), true );
		}
		else
		{
			$this->globalObj->dataReturn( '', 'failed' );
		}
	}
	
	function addFeed( $fuid, $fuser, $subjectLink, $subject, $contentLink, $content )
	{
		
		$feed = array();
		$feed['icon'] = 'post';
		
		$feed['title_template'] = '{subject}';
		$feed['title_data'] = array( 'subject'=>$subject.'(&nbsp;<a href="'.$subjectLink.'" target="_blank">查看</a>)' , 'subjectLink'=>$subjectLink );
		$feed['body_template'] = '{content}';
		$feed['body_data'] = array(
			'content' => '<a href="'.$contentLink.'" target="_blank">'.$content.'</a>',
			'contentLink' => $contentLink
		);
		
		if( $this->globalObj->config['authServerCharset']!= $this->globalObj->config['db']['charset'] )
		{
			$fuser = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $fuser );
			$feed['title_template'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['title_template'] );
			$feed['title_data']['subject'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['title_data']['subject'] );
			$feed['title_data']['subjectLink'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['title_data']['subjectLink'] );
			$feed['body_template'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['body_template'] );
			$feed['body_data']['content'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['body_data']['content'] );
			$feed['body_data']['contentLink'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $feed['body_data']['contentLink'] );
		}
		
		uc_feed_add( $feed['icon'], $fuid, $fuser, $feed['title_template'], $feed['title_data'], $feed['body_template'], $feed['body_data'], '', '', array() );

		return true;
	}
	
	//待定
	function addNote( $tuid, $tuser, $note = '' )
	{
		$userinfo = $this->userinfo();
		
		if( $this->globalObj->config['authServerCharset']!= $this->globalObj->config['db']['charset'] )
		{
			$tuser = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $tuser );
			$note = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $note );
			$userinfo['username'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $userinfo['username'] );
			$userinfo['password'] = $this->globalObj->skyIconv( $this->globalObj->config['db']['charset'], $this->globalObj->config['authServerCharset'], $userinfo['password'] );
		}
		
		$tuser = urlencode( $tuser );
		$ec_note = urlencode( $note );
		$userinfo['ec_password'] = urlencode( $userinfo['password'] );
		$userinfo['ec_username'] = urlencode( $userinfo['username'] );
		
		$spaceUrl = $this->globalObj->config['flash']['spaceUrl'];
		$url =  strrpos( $spaceUrl, '/?' ) ? substr( $spaceUrl, 0, strrpos( $spaceUrl, '/?' )+1 ) : substr( $spaceUrl, 0, strrpos( $spaceUrl, '/' )+1 );
		$url .=  'FlexsnsSkyHook.php';
		
		if( strpos( $url, 'http://' ) === false )
		return false;
		
		$result = $this->globalObj->fstream( $url, "appid=".UC_APPID."&hookKey={$this->globalObj->config['hookKey']}&toUid={$tuid}&toUser={$tuser}&note={$ec_note}&password={$userinfo['ec_password']}&username={$userinfo['ec_username']}" );
		
		$result = trim( $result );
		if( $result == 'notification_function_not_exists' )
		{
			$apps = uc_app_ls();
			$note = str_replace( '&nbsp;', '', $note );
			uc_pm_send( 0, $tuid, strip_tags( $note ), preg_replace( "/(.*?)<a.+?href=\"(.*?)\".*?>(.*?)<\/a>(.*?)/i", '$1[url=$2]$3[/url]$4', $note ) );
			
		}
		
		
		return true;
	}
	
	function introduction()
	{
		return 'comsenz系列产品sky适配器,可以兼容Discuz7!,UCH1.5等基于UC1.5的程序.通过该适配器,使得用户可以使用UCH或Discuz!的用户数据进行登录.' ;
	}

	function version()
	{
		return 'version1.0';
	}
	
	function getScriptSrc( $script, $encode = false )
	{
		$match = array();
		preg_match_all( '/\ssrc="(.*?[^"])"\s/', $script, $match );
		
		$urls = $match[1];
		
		if( $encode == true )
		{
			foreach ($urls as $key => $value )
			{
				$urls[$key] = urlencode( $value );
			}
		}
		
		return $urls;
	}
	
	function _userinfoXML( $uid, $username, $userHead, $synlogin = '', $encode = false )
	{
		if( $encode == true )
		{
			$username = urlencode( $username );
			$userHead = urlencode( $userHead );
		}
		
		$syloginUrl = $this->getScriptSrc($synlogin, $encode );
		$synloginXML = sizeof( $syloginUrl ) > 0 ? '<site>'.implode( '</site><site>', $syloginUrl ).'</site>' : '';
		
		$loginedData = "<userinfo><uid>{$uid}</uid>
			<username>{$username}</username>
			<userHead>{$userHead}</userHead>
			<synlogin>{$synloginXML}</synlogin></userinfo>";
		
		$this->globalObj->dataReturn( $loginedData, 'success');
	}
}

?>