<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 后台管理控制器
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice
 * 
 * @createDate 2009.4.27
 * @modified 2009.5.1
 * 
 */

class Controller_Admin_Class extends Common_Global_Class 
{
	var $_itemListPerpage = 20;
	
	function Controller_Admin_Class()
	{
		
		$link['url'] = 'javascript:location.reload();';
		$link['str'] = '重新检测';
			
		$this->browserTitle = 'Flexsns-Sky后台管理';
		parent::Common_Global_Class();
		
		
		if( !$this->writeAble( SKY_ROOT.'/data' ))
		$this->message( '无法使用管理平台', 'data目录或其子目录不可写不可写,请设置data目录为可写', 'failed', $link );
		
		if( !$this->writeAble( SKY_ROOT.'/data/backup' ) )
		$this->message( '无法使用管理平台', 'data/backup目录不可写,请设置data/backup目录为可写', 'failed', $link );
		
		if( !file_exists( SKY_ROOT.'/data/multiple' ) )
		{
			$this->message( '无法使用管理平台', 'data/multiple目录不存在,请重新安装sky', 'failed', $link );
			
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple' ) )
		{
			$this->message( '无法使用管理平台', 'data/multiple目录不可写,请设置data/multiple目录为可写', 'failed', $link );
		}
		
		if( !file_exists( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			$this->message( '无法使用管理平台', 'data/multiple/comsenzuc目录不存在,请重新安装sky', 'failed', $link );
			
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			$this->message( '无法使用管理平台', 'data/multiple/comsenzuc目录不可写,请设置data/multiple/comsenzuc目录为可写', 'failed', $link );
		}
		
		$this->_checkLogin();
		
	}
	
	function indexAction()
	{
		$this->configAction();
	}
	
	//天空数据列表
	function itemListAction()
	{
		$className = $this->loadClass( 'Model_SkyItem' );
		$_ENV['skyItemModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$itemNums = $_ENV['skyItemModel']->itemsNums();
		
		list( $sqlStart, $perpage, $totalPage, $pages ) = $this->pages( './index.php?admin-itemList/', $itemNums, $this->_itemListPerpage );
		
		$this->view->totalPage = $totalPage;
		$this->view->pages = $pages;
		$this->view->items =  $_ENV['skyItemModel']->items( $sqlStart, $perpage );
		
		$this->template( 'admin/itemlist' );
	}

	function configAction()
	{
		$skinList = $this->listDir( SKY_ROOT.'/sky/skin/' );
		
		if( is_array( $skinList ) && !empty( $skinList ) )
		{
			$skin = array();
			foreach ( $skinList as $value) 
			{
				$skin[] = $value;
			}
			
			$this->view->skin = $skin;
		}
		
		$this->view->date = $this->dateFormat( time(), 'full', false );
		
		$this->template( 'admin/config' );
	}
	
	//删除天空数据
	function delitemAction()
	{
		$className = $this->loadClass( 'Model_SkyItem' );
		$_ENV['skyItemModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$className = $this->loadClass( 'Model_Reply' );
		$_ENV['replyModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$itemId = intval( $this->get['itemId'] );
		
		
		if( $itemId <= 0 )
		$this->dataReturn( '参数不足,无法执行该操作', 'failed' );
		
		if( !$_ENV['skyItemModel']->getone( $itemId ) )
		$this->dataReturn( '删除失败,数据可能已经被管理员删除', 'failed' );
		
		if( $_ENV['skyItemModel']->delete( $itemId ) == 0 )
		{
			$this->dataReturn( '删除失败，数据可能已经被管理员删除', 'failed' );
		}
		else
		{
			$_ENV['replyModel']->delReply( $itemId );
		}
		
		$this->dataReturn( '删除数据成功' );
	}
	
	function logoutAction()
	{
		$this->clearSession( 'sky_admin_session' );
		header( 'Location:./index.php?admin-index');
	}
	
	function _checkLogin()
	{
		if( $this->post['admin'] )
		{
			
			$this->post['admin'] = $this->skyAddslashes( $this->s2d( $this->post['admin'] ) );
			$this->post['adminPassword'] = md5( $this->skyAddslashes( $this->s2d( $this->post['adminPassword'] ) ) );
			
			if( $this->post['admin'] == $this->config['admin'] && $this->post['adminPassword'] == $this->config['adminPassword']  )
			{
				$this->session( 'sky_admin_session', array( $this->post['admin'], $this->post['adminPassword'] ) );
				
				$link['url'] = './index.php?admin-index';
				$link['str'] = '进入后台';
			
				$this->message( '登录成功', '请点击下面按钮进入sky后台', 'success', $link );
			}
			else
			{
				$this->message( '登录失败', '请检查用户名及密码是否输入正确', 'failed' );
			}
		}
		else
		{
			
			$admin = $this->session( 'sky_admin_session' );
			
			if( $admin[0] != $this->config['admin'] || $admin[1] != $this->config['adminPassword']  )
			{
				$this->clearSession( 'sky_admin_session' );
				$this->template( 'admin/login' );
				exit;
			}
			else
			{
				$this->view->isAdmin = true;
			}
		}
		
	}
	
	function broadcastAction()
	{
		$className = $this->loadClass( 'Model_Broadcast' );
		$_ENV['broadcastModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$itemNums = $_ENV['broadcastModel']->broadcastNums();
		
		list( $sqlStart, $perpage, $totalPage, $pages ) = $this->pages( './index.php?admin-broadcast/', $itemNums, $this->_itemListPerpage );
		
		$this->view->totalPage = $totalPage;
		$this->view->pages = $pages;
		$this->view->items =  $_ENV['broadcastModel']->broadcasts( $sqlStart, $perpage );
		$this->view->showNum = $this->config['broadcastNum'];
		
		$this->template( 'admin/broadcast' );
	}

	function addBroadcastAction()
	{
		$content = $this->post['content'];
		$sort = intval( $this->post['sort'] );
		$gourl = str_replace( array( '%2B', '%26' ), array( '+', '&' ), $this->post['gourl'] );
		$gourl = $gourl == '' ? '#' : $gourl;
		
		if( !$this->checkLength( $content, 3, 200 ) )
		$this->message( '添加广播失败', '广播内容长度应在3-200个字符间', 'failed' );
		
		$className = $this->loadClass( 'Model_Broadcast' );
		$_ENV['broadcastModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$return = $_ENV['broadcastModel']->add( $content, $sort, $gourl );
		
		if( $return > 0 )
		$this->message( '添加广播成功', '广播数据已经更新' );
		
		$this->message( '添加广播失败', '未知的错误导致添加广播失败,请刷新后再试', 'failed' );
		
	}
	
	function joinflexsnsAction()
	{
		$this->template( 'admin/joinflexsns' );
	}
	
	function joinflexsnsjoinAction()
	{
		$webmasterEmail = urlencode( $this->post['webmasterEmail'] );
		$websiteName = urlencode( $this->post['websiteName'] );
		$website = urlencode( $this->post['website'] );
		$charset = urlencode( $this->config['db']['charset'] );
		$websiteType = urlencode( $this->post['websiteType'] );
		$intro = urlencode( $this->post['intro'] );
		
		$return = $this->fstream( 'http://www.flexsns.com/addlink.php?addlink-remote', "webmasterEmail={$webmasterEmail}&websiteName={$websiteName}&website={$website}&charset={$charset}&websiteType={$websiteType}&intro={$intro}" );
		
		if( trim( $return ) == 'true' )
		{
			$this->dataReturn( '添加链接成功,您支持了flexsns的同时,也将可能为自己带来潜在的用户' );
		}
		else
		{
			$this->dataReturn( '添加链接失败,请刷新后再尝试,给您造成的不便请见谅', 'failed' );
		}
	}
	
	function delbroadcastAction()
	{
		
		$bid = intval( $this->get['bid'] );
		
		if( $bid <= 0 )
		$this->dataReturn( '参数不足,请刷新后再试', 'failed' );
		
		$className = $this->loadClass( 'Model_Broadcast' );
		$_ENV['broadcastModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$return = $_ENV['broadcastModel']->del( $bid );
		
		if( $return > 0 )
		$this->dataReturn( '删除广播成功' );
		
		$this->dataReturn( '删除广播失败,请刷新后再试', 'failed' );
		
	}
	
	function updateBroadcastSortAction()
	{
		
		$bid = intval( $this->get['bid'] );
		
		$sortid = intval( $this->get['sortid'] );
		
		if( $bid <= 0 )
		$this->dataReturn( '参数不足,请刷新后再试', 'failed' );
		
		$className = $this->loadClass( 'Model_Broadcast' );
		$_ENV['broadcastModel'] = new $className( $this->db(), $this->config['db']['tablePrefix'] );
		
		$data = array( 'sortid'=>$sortid );
		$_ENV['broadcastModel']->update( $bid, $data );
		
		$this->dataReturn( '更新广播成功' );
		
	}
	
	function saveConfigAction()
	{
		
		$className = $this->loadClass( 'Model_Setting' );
		$settingObj = new $className(  $this->db(), $this->config['db']['tablePrefix'] );
		
		if( $this->post['adminPassword'] )
		{
			
			$adminOldPassword = md5( $this->skyAddslashes( $this->s2d( $this->post['adminOldPassword'] ) ) );
			if( $adminOldPassword != $this->config['adminPassword'] )
			$this->message( '配置失败', '管理员旧密码不正确', 'failed' );
			
			if( $this->post['adminPassword'] != $this->post['adminPasswordRe'] )
			$this->message( '配置失败', '两次输入的管理员密码不相同', 'failed' );
			
			$this->post['admin'] = $this->skyAddslashes( $this->s2d( $this->post['admin'] ) );
			$this->post['adminPassword'] = md5( $this->skyAddslashes( $this->s2d( $this->post['adminPassword'] ) ) );
			
		}
		
		if( $this->post['dbUser'] )
		{
			$this->post['dbUser'] = $this->s2d( $this->post['dbUser'] );
			$this->post['dbPassword'] = $this->s2d( $this->post['dbPassword'] );
			$this->post['dbName'] = $this->s2d( $this->post['dbName'] );
			
			
			$db = $this->dbObj();
			$conn = $db->connect( $this->post['dbHost'], $this->post['dbUser'], $this->post['dbPassword'] );
		
			if( !$conn )
			$this->message( '配置失败', '数据库用户名或密码错误,请检查数据库连接信息是否输入正确', 'failed' );
			
			if( false == $db->select_db( $this->post['dbName'] ) )
			$this->message( '配置失败', '您希望连接的数据库不存在', 'failed' );
			
			$db->close();
		}
		
		foreach ( $this->post as $key => $value )
		{
			$updateData[] = "('{$key}','{$value}')";
		}
		
		if( !$settingObj->update( $updateData ) )
		$this->message( '配置失败', '可能是网络或服务器正忙,请稍候再试.', 'failed' );
		
		$setting = $settingObj->getSetting();
		
		foreach ( $setting as $key => $value )
		{
			$$value['setname'] = $value['data'];
		}
		
		$daySound = explode( "\n", $daySound );
		$nightSound = explode( "\n", $nightSound );
		
		if( is_array( $daySound ) && sizeof( $daySound ) > 0 )
		{
			$daySoundXML = '<sound>'.implode( '</sound><sound>', $daySound ).'</sound>';
			$daySoundPHP = '\''.implode( '\',\'', $daySound ).'\'';
		}
		
		if( is_array( $nightSound ) && sizeof( $nightSound ) > 0 )
		{
			$nightSoundXML = '<sound>'.implode( '</sound><sound>', $nightSound ).'</sound>';
			$nightSoundPHP = '\''.implode( '\',\'', $nightSound ).'\'';
		}
		
		$maxItems = intval( $maxItems );
		$autoFillItem = intval( $autoFillItem );
		$itemMaxLength = intval( $itemMaxLength );
		$replyMaxLength = intval( $replyMaxLength );
		$replyMinLength = intval( $replyMinLength );
		$itemPostTimeLimit = intval( $itemPostTimeLimit );
		$replyPostTimeLimit = intval( $replyPostTimeLimit );
		$skyBroadcastLoop = intval( $skyBroadcastLoop );
		$skyBroadcastTimer = intval( $skyBroadcastTimer );
		$maxDiggPertime = intval( $maxDiggPertime );
		$leftPanelStatus = intval( $leftPanelStatus );
		$debugMode = intval( $debugMode );
		$timezone = intval( $timezone );
		$broadcastNum = intval( $broadcastNum );
		$showUserInfo = intval( $showUserInfo );
		$useRealAvatar = intval( $useRealAvatar );
		$newItemAddFeed = intval( $newItemAddFeed );
		$diggItemAddFeed = intval( $diggItemAddFeed );
		$replyItemAddFeed = intval( $replyItemAddFeed );
		
		$db = $this->dbObj();
		$conn = $db->connect( $this->config['db']['host'], $this->config['db']['user'], $this->config['db']['password'] );
	
		if( !$conn )
		$this->message( '配置失败', '数据库用户名或密码错误,请检查数据库连接信息是否输入正确', 'failed' );
		
		if( false == $db->select_db( $this->config['db']['dbName'] ) )
		$this->message( '配置失败', '您希望连接的数据库不存在', 'failed' );
		
		$db->close();
		
		$skinXML = array();
		$skinXMLConfig = $this->fr( SKY_ROOT.'/sky/skin/'.$skin.'/config.xml' );
		preg_match( "/<config>(.*)<\/config>/is", $skinXMLConfig, $skinXML );
		$xml = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<sky author="池晓生" email="chixiaosheng05@163.com"	qq="255979" >
    <config>
		<skin>
			<skinDIR>./sky/skin/{$skin}/</skinDIR>
			<skinLogo>./skin/{$skin}/logo.png</skinLogo>
			<skinMainFile>./skin/{$skin}/{$skin}.swf</skinMainFile>
			<showUserInfo>{$showUserInfo}</showUserInfo>
			{$skinXML[1]}
		</skin>
		
		<skyUrl>{$skyUrl}/</skyUrl>
		<spaceUrl>{$spaceUrl}</spaceUrl>
		<regUrl>{$regUrl}</regUrl>
		<websiteUrl>{$websiteUrl}</websiteUrl>
		
		<daySound>
			{$daySoundXML}
		</daySound>
		<nightSound>
			{$nightSoundXML}
		</nightSound>
		
		<defaultUserHead>./sky/default.gif</defaultUserHead>
		
		<maxItems>{$maxItems}</maxItems>
		<myBoxPerPage>8</myBoxPerPage>
		<replysPerPage>8</replysPerPage>
		
		<autoFillItem>{$autoFillItem}</autoFillItem>
		<resizeArray>0.5,0.7,0.7,0.8,0.7,0.6</resizeArray>
		<defaultContent>{$defaultContent}</defaultContent>
		<maxItemContentWords>{$itemMaxLength}</maxItemContentWords>
		<maxReplyContentWords>{$replyMaxLength}</maxReplyContentWords>
		<minItemContentWords>{$itemMinLength}</minItemContentWords>
		<minReplyContentWords>{$replyMinLength}</minReplyContentWords>
		<itemPostTimeLimit>{$itemPostTimeLimit}</itemPostTimeLimit>
		<replyPostTimeLimit>{$replyPostTimeLimit}</replyPostTimeLimit>
		
		<requestMarkerNums>20</requestMarkerNums>
		<requestSuccessStr>success</requestSuccessStr>
		<requestFailedStr>failed</requestFailedStr>


		<leftPadding>50</leftPadding>
		<rightPadding>50</rightPadding>

		<topPadding>30</topPadding>
		<bottomPadding>30</bottomPadding>

		<skyBroadcastLoop>{$skyBroadcastLoop}</skyBroadcastLoop>
		<skyBroadcastTimer>{$skyBroadcastTimer}</skyBroadcastTimer>
		
		<maxDiggPertime>{$maxDiggPertime}</maxDiggPertime>
		<leftPanelStatus>{$leftPanelStatus}</leftPanelStatus>
		
		<debugMode>{$debugMode}</debugMode>
    </config>
</sky>
EOD;
		if( !$this->fw( SKY_ROOT.'/data/config.xml', $xml ) )
		$this->message( '配置失败', '请确保data目录有写入权限', 'failed' );
		
		unset( $xml );
		
		$php = <<<EOD
<?php

define( 'IN_SKY', true );

//注意路径后面没有斜杆 '/'
define( 'SKY_ROOT', substr( dirname( __FILE__ ), 0, -5 ) );

\$config = array();

\$config['db']['host'] = '{$dbHost}';
\$config['db']['user'] = '{$dbUser}';
\$config['db']['password'] = '{$dbPassword}';

\$config['db']['charset'] = '{$dbCharset}';
\$config['authServerCharset'] = '{$authServerCharset}';

\$config['db']['dbName'] = '{$dbName}';
\$config['db']['tablePrefix'] = '{$dbTablePrefix}';

//是否为排错模式,仅供开发者使用
\$config['debugMode'] = {$debugMode};

//加密密钥
\$config['authKey'] = '{$authKey}';

//调用其他应用的特殊接口的验证字符
\$config['hookKey'] = '{$hookKey}';

//时区
\$config['timezone'] = {$timezone};//如果时间有误,请自行修改此处的值,一般填0或8

//当前时间
\$config['nowtime'] = time();

//天空数据设定
\$config['item']['postTimeLimit'] = {$itemPostTimeLimit};//每次发送数据时间限制
\$config['item']['maxLength'] = {$itemMaxLength};//最长字数
\$config['item']['minLength'] = {$itemMinLength};//最小字数
\$config['item']['maxItems'] = {$maxItems};//每片天空显示的最多星星个数

//天空回复设定
\$config['reply']['postTimeLimit'] = {$replyPostTimeLimit};//每次发送数据时间间隔限制
\$config['reply']['maxLength'] = {$replyMaxLength};//最长回复字数
\$config['reply']['minLength'] = {$replyMinLength};//最小回复字数

//多系统兼容适配器,comsenz系列产品用户请选择Common_Multiple_Comsenz适配器
//Common_Multiple_Comsenz
\$config['multipleAdapter'] = 'Common_Multiple_Comsenzuc';

//用户信息cookie名,供sky生成cookie
\$config['userCookieName'] = '{$userCookieName}';
//用户信息session名,供sky生成session
\$config['userSessionName'] = '{$userSessionName}';


// cookie 作用路径
\$config['cookiePath'] = '{$cookiePath}';
// cookie 作用域
\$config['cookieDomain'] = '{$cookieDomain}'; 

//顶部广播显示条数
\$config['broadcastNum'] = {$broadcastNum};

//浏览器标题
\$config['browserTitle'] = '{$browserTitle}';

\$config['showUserInfo'] = {$showUserInfo};
\$config['useRealAvatar'] = {$useRealAvatar};

\$config['flash']['skin'] = '{$skin}';
\$config['flash']['autoFillItem'] = {$autoFillItem};
\$config['flash']['skyUrl'] = '{$skyUrl}';
\$config['flash']['spaceUrl'] = '{$spaceUrl}';
\$config['flash']['regUrl'] = '{$regUrl}';
\$config['flash']['websiteUrl'] = '{$websiteUrl}';
\$config['flash']['daySound'] = array( {$daySoundPHP} );
\$config['flash']['nightSound'] = array( {$nightSoundPHP} );
\$config['flash']['defaultContent'] = '{$defaultContent}';
\$config['flash']['skyBroadcastLoop'] = {$skyBroadcastLoop};
\$config['flash']['skyBroadcastTimer'] = {$skyBroadcastTimer};
\$config['flash']['maxDiggPertime'] = {$maxDiggPertime};
\$config['flash']['leftPanelStatus'] = {$leftPanelStatus};

\$config['admin'] = '{$this->config['admin']}';
\$config['adminPassword'] = '{$adminPassword}';

\$config['newItemAddFeed'] = {$newItemAddFeed};
\$config['diggItemAddFeed'] = {$diggItemAddFeed};
\$config['replyItemAddFeed'] = {$replyItemAddFeed};

\$config['feedNewItemTitle'] = '{$feedNewItemTitle}';
\$config['feedDiggItemTitle'] = '{$feedDiggItemTitle}';
\$config['feedReplyItemTitle'] = '{$feedReplyItemTitle}';

?>
EOD;
	
		
		if( !$this->fw( SKY_ROOT.'/data/config.php', $php ) )
		$this->message( '配置失败', '请确保data目录又写入权限', 'failed' );
		
		if( $this->post['adminPassword'] )
		{
			$link['str'] = '现在登录';
			$this->clearSession( 'sky_admin_session' );
			$this->message( '配置成功', '由于修改了管理员密码,您需要重新登录系统', 'success', $link );
		}
		else
		{
			$this->message( '配置成功', '配置已经更新,请点击下面链接返回' );
		}
		
		
	}
	
}

?>