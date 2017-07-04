<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

class Controller_Upgrade_Class extends Common_Global_Class 
{
	var $config = array();
	function Controller_Upgrade_Class()
	{
		$link['url'] = 'javascript:location.reload();';
		$link['str'] = '重新检测';
			
		parent::Common_Global_Class();
		
		if( $this->checkIconv() == false )
		$this->message( '升级失败', '您的系统不支持iconv或mb_convert_encoding函数,无法安装,请联系空间商开启', 'failed' );
		
		if( file_exists( SKY_ROOT.'/data/upgraded.sky' ) )
		$this->message( '升级失败', '您已升级过SKY,如果需要再次运行升级程序(有风险),请先删除data目录下的upgraded.sky文件', 'failed', $link );
		
		$config = array();
		@include_once SKY_ROOT.'/data/config.php';
		
		$this->config = $config;
		if( sizeof( $this->config ) == 0 )
		$this->message( '升级失败', '升级程序没有检测到您的SKY配置文件,您可能需要全新安装SKY', 'failed', $link );
		
		if( !$this->writeAble( SKY_ROOT.'/data' ))
		$this->message( '升级失败', 'data目录或其子目录不可写,请设置data目录为可写', 'failed', $link );
		
		if( !$this->writeAble( SKY_ROOT.'/data/backup' ) )
		$this->message( '升级失败', 'data/backup目录不可写,请设置data/backup目录为可写', 'failed', $link );
		
		if( !file_exists( SKY_ROOT.'/data/multiple' ) )
		{
			if( false == mkdir( SKY_ROOT.'/data/multiple' ) )
			{
				$this->message( '升级失败', 'data/multiple目录不存在且无法创建,请创建该目录并设置可写', 'failed', $link );
			}
			else
			{
				$this->fw( SKY_ROOT.'/data/multiple/index.htm', '<html></html>' );
				$this->fw( SKY_ROOT.'/data/multiple/index.html', '<html></html>' );
			}
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple' ) )
		{
			$this->message( '升级失败', 'data/multiple目录不可写,请设置data/multiple目录为可写', 'failed', $link );
		}
		
		if( !file_exists( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			if( false == mkdir( SKY_ROOT.'/data/multiple/comsenzuc' ) )
			{
				$this->message( '升级失败', 'data/multiple/comsenzuc目录不存在且无法创建,请创建该目录并设置可写', 'failed', $link );
			}
			else
			{
				$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/index.htm', '<html></html>' );
				$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/index.html', '<html></html>' );
			}
			
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			$this->message( '升级失败', 'data/multiple/comsenzuc目录不可写,请设置data/multiple/comsenzuc目录为可写', 'failed', $link );
		}
		
	}
	
	function indexAction()
	{
		
		$this->template( 'upgrade' );
	}
	

	function upgradeAction()
	{
		$dataArray = $this->post;
		
		$config = $this->config;
		
		if( $config['db']['user'] != $this->post['dbUser'] || $config['db']['password'] != $this->post['dbPassword'] )
		$this->message( '升级失败', '数据库用户名或密码与配置文件不相符', 'failed' );
		
		
		$db = $this->dbObj();
		$conn = $db->connect( $config['db']['host'], $config['db']['user'], $config['db']['password'] );
		
		if( $conn == false )
		$this->message( '升级失败', '数据库用户名或密码错误,请检查数据库连接信息是否输入正确', 'failed' );
		
		$dataArray['dbCharset'] = 'utf8';
		
		if( false == $db->select_db( $config['db']['dbName'] ) )
		{
			if( $db->version() > '4.1' )
			{
				$db->query( "CREATE DATABASE  IF NOT EXISTS {$config['db']['dbName']} DEFAULT CHARACTER SET ".$dataArray['dbCharset'] );
			}
			else
			{
				$db->query( "CREATE DATABASE  IF NOT EXISTS {$config['db']['dbName']}" );
			}
			
			if( false == $db->select_db( $config['db']['dbName'] ) )
			$this->message( '升级失败', '您希望连接的数据库不存在,且您的mysql账户没有建立数据库的权限，您需要输入一个已经存在的数据库名', 'failed' );
			
		}
		
		$dataArray['admin'] = $config['admin'];
		$dataArray['adminPassword'] = $config['adminPassword'];
		
		$dataArray['authKey'] = $config['authKey'];
		$hookKey = $this->randomKey( 12 );
	
		$setCharset = '';
		if( $db->version() > '4.1' )
		{
			$setCharset = 'DEFAULT CHARSET='.$dataArray['dbCharset'];
			$db->charset( $dataArray['dbCharset'] );
		}
		
		$sql = $this->fr( SKY_INSTALL_ROOT.'/installsql.txt' );
		$sql = str_replace( array( '{DB_NAME}', '{DB_TABLE_PREFIX}', '{setCharset}' ), array( $config['db']['dbName'], $config['db']['tablePrefix'], $setCharset ), $sql );
	
		$upgradeSql = $this->fr( SKY_INSTALL_ROOT.'/upgradesql.txt' );
		$upgradeSql = str_replace( array( '{DB_NAME}', '{DB_TABLE_PREFIX}', '{setCharset}' ), array( $config['db']['dbName'], $config['db']['tablePrefix'], $setCharset ), $upgradeSql );
		$sql .= $upgradeSql;
		
		$sqlList = explode( ';', $sql );
		
		if( is_array( $sqlList ) && !empty( $sqlList ) )
		{
			foreach ( $sqlList as $value )
			{
				if( strpos( $value, 'DROP' ) !== false )
				continue;

				$db->query( trim( $value ) );
			}
		}
		else
		{
			$this->message( '升级失败', '安装用SQL语句解析失败', 'failed' );
		}
		
		$config['flash']['daySound'] = implode( "\n", $config['flash']['daySound'] );
		$config['flash']['nightSound'] = implode( "\n", $config['flash']['nightSound'] );
		
		$dataArray['dbCharset'] = 'utf-8';
		$sql = "REPLACE INTO `{$config['db']['tablePrefix']}setting` (`setname`, `data`) VALUES 
				('dbHost','{$config['db']['host']}'),
				('dbUser','{$config['db']['user']}'),
				('dbPassword','{$config['db']['password']}'),
				('dbCharset','{$dataArray['dbCharset']}'),
				('authServerCharset','{$config['authServerCharset']}'),
				('dbName','{$config['db']['dbName']}'),
				('dbTablePrefix','{$config['db']['tablePrefix']}'),
				('debugMode','0'),
				('authKey','{$config['authKey']}'),
				('hookKey','{$hookKey}'),
				('timezone','0'),
				('itemPostTimeLimit','{$config['item']['postTimeLimit']}'),
				('itemMaxLength','{$config['item']['maxLength']}'),
				('itemMinLength','{$config['item']['minLength']}'),
				('maxItems','{$config['item']['maxItems']}'),
				('replyPostTimeLimit','{$config['reply']['postTimeLimit']}'),
				('replyMaxLength','{$config['reply']['maxLength']}'),
				('replyMinLength','{$config['reply']['minLength']}'),
				('userCookieName','{$config['userCookieName']}'),
				('userSessionName','{$config['userSessionName']}'),
				('cookiePath','{$config['cookiePath']}'),
				('cookieDomain','{$config['cookieDomain']}'),
				('broadcastNum','{$config['broadcastNum']}'),
				('browserTitle','{$config['browserTitle']}'),
				('showUserInfo','1'),
				('useRealAvatar','0'),
				('skin','default'),
				('autoFillItem','{$config['flash']['autoFillItem']}'),
				('skyUrl','{$config['flash']['skyUrl']}'),
				('spaceUrl','{$config['flash']['spaceUrl']}'),
				('regUrl','{$config['flash']['regUrl']}'),
				('websiteUrl','{$config['flash']['websiteUrl']}'),
				('daySound','{$config['flash']['daySound']}'),
				('nightSound','{$config['flash']['nightSound']}'),
				('defaultContent','{$config['flash']['defaultContent']}'),
				('skyBroadcastLoop','{$config['flash']['skyBroadcastLoop']}'),
				('skyBroadcastTimer','{$config['flash']['skyBroadcastTimer']}'),
				('maxDiggPertime','{$config['flash']['maxDiggPertime']}'),
				('leftPanelStatus','{$config['flash']['leftPanelStatus']}'),
				('admin','{$config['admin']}'),
				('adminPassword','{$config['adminPassword']}'),
				('newItemAddFeed','1'),
				('diggItemAddFeed','1'),
				('replyItemAddFeed','1'),
				('feedNewItemTitle','{fromuser}在天空发了一颗小星星'),
				('feedDiggItemTitle','{fromuser}顶了{touser}的星星'),
				('feedReplyItemTitle','{fromuser}回复了{touser}的星星')
		";
		$db->query( $sql );
		
		$query = $db->query( "SELECT `setname`, `data` FROM {$config['db']['tablePrefix']}setting` " );
		
		while ( false != ( $value = $db->fetch( $query ) ) )
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
		
		$db->close();
		
		$skinXML = array();
		$skinXMLConfig = $this->fr( SKY_ROOT.'/sky/skin/default/config.xml' );
		preg_match( "/<config>(.*)<\/config>/is", $skinXMLConfig, $skinXML );
		$xml = <<<EOD
<?xml version="1.0" encoding="utf-8"?>
<sky author="池晓生" email="chixiaosheng05@163.com"	qq="255979" >
    <config>
		<skin>
			<skinDIR>./sky/skin/default/</skinDIR>
			<skinLogo>./skin/default/logo.png</skinLogo>
			<skinMainFile>./skin/default/default.swf</skinMainFile>
			<showUserInfo>1</showUserInfo>
			<poweredby>Flexsns.com,adopt-the-sky</poweredby>
			<skinName>默认皮肤</skinName>
			<dayBg>day.jpg</dayBg>
			<nightBg>night.jpg</nightBg>
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
		$this->message( '升级失败', '请确保data目录有写入权限', 'failed' );
		
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
		$this->message( '升级失败', '请确保data目录又写入权限', 'failed' );
		
		
		$url = $this->post['ucUrl'];
		$url = preg_match( '/.+\/$/', $url ) ? $url : $url.'/';
		
		$pw = urlencode( $this->s2d( $this->post['ucPassword'] ) );
		$appName = urlencode( 'Flexsns-Sky' );
		$appUrl = urlencode( $skyUrl );
		
		if(!defined('UC_API')) 
		{
			define('UC_API', '');
		}
		
		include_once SKY_ROOT.'/api/comsenzuc/uc_client/client.php';

		if( preg_match( '/^(.+)\/$/', $url ) )
		{
			$ucinfo = $this->fstream( $url.'index.php?m=app&a=ucinfo&release='.UC_CLIENT_RELEASE );
		}
		else
		{
			$ucinfo = $this->fstream( $url.'/index.php?m=app&a=ucinfo&release='.UC_CLIENT_RELEASE );
		}
		
		list( $status ) = explode( '|', $ucinfo );
		
		if( $status != 'UC_STATUS_OK' ) 
		$this->message( '升级', '连接UCenter失败,可能是连接有误', 'failed' );
		
		$appTempFiled = array();
		$appTempFiled['content'] = '[the content user posted]';
		$appTempFiled['contentLink'] = '[the content link]';
		
		$app_tagtemplates = 'apptagtemplates[template]='.urlencode('{content}').'&'.
		'apptagtemplates[fields][content]='.urlencode($appTempFiled['content']).'&'.
		'apptagtemplates[fields][contentLink]='.urlencode($appTempFiled['contentLink']);
		
		$post = "m=app&a=add&ucfounder=&ucfounderpw={$pw}&apptype=OTHER&appname={$appName}&appurl={$appUrl}&appip=&{$app_tagtemplates}&appcharset={$dbCharset}&appdbcharset={$dbCharset}&release=".UC_CLIENT_RELEASE;
		
		$ucconfig = $this->fstream( $url, $post );
		
		$urlParse = parse_url( $url );
		$ucip = gethostbyname( $urlParse['host'] );
		
		$ucconfig .= "|$url|$ucip";
		
		list( $appauthkey, $appid, $ucdbhost, $ucdbname, $ucdbuser, $ucdbpw, $ucdbcharset, $uctablepre, $uccharset, $ucapi, $ucip) = explode('|', $ucconfig);
	
		if( intval( $appid ) >= 1 ) 
		{
			$db = $this->dbObj();
		
			$uc_connnect = $db->connect( $ucdbhost, $ucdbuser, $ucdbpw, true )  ? 'mysql' : '';
			
$ucconfigStr =<<<EOD
<?php
\$config = array();
require_once substr( dirname( __FILE__ ), 0, -19  ).'/config.php';

define('UC_CONNECT_ADAPTER', 'mysql');
define('UC_CONNECT', '{$uc_connnect}');
define('UC_DBHOST', '{$ucdbhost}');
define('UC_DBUSER', '{$ucdbuser}');
define('UC_DBPW', '{$ucdbpw}');
define('UC_DBNAME', '{$ucdbname}');
define('UC_DBCHARSET', '{$ucdbcharset}');
define('UC_DBTABLEPRE', '`{$ucdbname}`.{$uctablepre}');
define('UC_DBCONNECT', '0');
define('UC_KEY', '{$appauthkey}');
define('UC_API', '{$ucapi}');
define('UC_CHARSET', '{$uccharset}');
define('UC_IP', '{$ucip}');
define('UC_APPID', '{$appid}');
define('UC_PPP', '20');
?>
EOD;
		}
		else
		{
			$this->message( '升级失败', '获取Ucenter配置信息失败，请检查Ucenter地址及创始人密码是否输入正确', 'failed' );
		}
		
		if( !$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/config.php', $ucconfigStr ) )
		$this->message( '升级失败', '写入UCenter配置文件失败,请将data/multiple/comsenzuc目录设置为可写', 'failed' );
			
		
		$link['str'] = '进入后台';
		$link['url'] = '../index.php?admin';
		
		$this->fw( SKY_ROOT.'/data/upgraded.sky', 'Powered By Flexsns.com' );
		$this->message( '升级成功', '升级完毕,请点击下面链接进入SKY后台', 'success', $link );
	}
	
}

?>