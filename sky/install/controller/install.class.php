<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

class Controller_Install_Class extends Common_Global_Class 
{
	function Controller_Install_Class()
	{
		$link['url'] = 'javascript:location.reload();';
		$link['str'] = '重新检测';
			
		parent::Common_Global_Class();
		
		if( $this->checkIconv() == false )
		$this->message( '安装失败', '您的系统不支持iconv或mb_convert_encoding函数,无法安装,请联系空间商开启', 'failed' );
		
		if( file_exists( SKY_ROOT.'/data/installed.sky' ) )
		$this->message( '安装失败', '您已安装过SKY,如果需要重新安装sky,请先删除data目录下的installed.sky文件', 'failed', $link );
		
		if( !$this->writeAble( SKY_ROOT.'/data' ))
		$this->message( '暂时无法安装', 'data目录或其子目录不可写,请设置data目录为可写', 'failed', $link );
		
		if( !$this->writeAble( SKY_ROOT.'/data/backup' ) )
		$this->message( '暂时无法安装', 'data/backup目录不可写,请设置data/backup目录为可写', 'failed', $link );
		
		if( !file_exists( SKY_ROOT.'/data/multiple' ) )
		{
			if( false == mkdir( SKY_ROOT.'/data/multiple' ) )
			{
				$this->message( '暂时无法安装', 'data/multiple目录不存在且无法创建,请创建该目录并设置可写', 'failed', $link );
			}
			else
			{
				$this->fw( SKY_ROOT.'/data/multiple/index.htm', '<html></html>' );
				$this->fw( SKY_ROOT.'/data/multiple/index.html', '<html></html>' );
			}
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple' ) )
		{
			$this->message( '暂时无法安装', 'data/multiple目录不可写,请设置data/multiple目录为可写', 'failed', $link );
		}
		
		if( !file_exists( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			if( false == mkdir( SKY_ROOT.'/data/multiple/comsenzuc' ) )
			{
				$this->message( '暂时无法安装', 'data/multiple/comsenzuc目录不存在且无法创建,请创建该目录并设置可写', 'failed', $link );
			}
			else
			{
				$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/index.htm', '<html></html>' );
				$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/index.html', '<html></html>' );
			}
			
		}
		elseif( !$this->writeAble( SKY_ROOT.'/data/multiple/comsenzuc' ) )
		{
			$this->message( '暂时无法安装', 'data/multiple/comsenzuc目录不可写,请设置data/multiple/comsenzuc目录为可写', 'failed', $link );
		}
		
	}
	
	function indexAction()
	{
		
		$this->view->hostUrl = strtolower( 'http://'.$_SERVER['SERVER_NAME'] );
		$this->view->skyUrl = $this->view->hostUrl.str_replace( '/install/index.php', '', strtolower( $_SERVER['SCRIPT_NAME'] ) );
		
		$this->view->date = $this->dateFormat( time() );
		
		$this->template( 'install' );
	}

	function saveConfigAction()
	{
		$dataArray = $this->post;
		
		if( strlen( $dataArray['admin'] ) < 1 )
		{
			$this->message( '安装失败', '请输入管理员用户名', 'failed' );
		}
		
		if( strlen( $dataArray['adminPassword'] ) < 6 )
		{
			$this->message( '安装失败', '请输入6位以上密码', 'failed' );
		}
	
		if( !$dataArray['skyUrl'] )
		{
			$this->message( '安装失败', '请设置sky的url', 'failed' );
		}
		
		$dataArray['dbUser'] = $this->s2d( $dataArray['dbUser'] );
		$dataArray['dbPassword'] = $this->s2d( $dataArray['dbPassword'] );
		$dataArray['dbName'] = $this->s2d( $dataArray['dbName'] );
		
		$db = $this->dbObj();
		$conn = $db->connect( $dataArray['dbHost'], $dataArray['dbUser'], $dataArray['dbPassword'] );
		
		if( $conn == false )
		$this->message( '安装失败', '数据库用户名或密码错误,请检查数据库连接信息是否输入正确', 'failed' );
		
		$dataArray['dbCharset'] = 'utf8';
		
		if( false == $db->select_db( $dataArray['dbName'] ) )
		{
			if( $db->version() > '4.1' )
			{
				$db->query( "CREATE DATABASE  IF NOT EXISTS {$dataArray['dbName']} DEFAULT CHARACTER SET ".$dataArray['dbCharset'] );
			}
			else
			{
				$db->query( "CREATE DATABASE  IF NOT EXISTS {$dataArray['dbName']}" );
			}
			
			if( false == $db->select_db( $dataArray['dbName'] ) )
			$this->message( '安装失败', '您希望连接的数据库不存在,且您的mysql账户没有建立数据库的权限，您需要输入一个已经存在的数据库名', 'failed' );
			
		}
		
		$dataArray['admin'] = $this->skyAddslashes( $this->s2d( $dataArray['admin'] ) );
		$dataArray['adminPassword'] = md5( $this->skyAddslashes( $this->s2d( $dataArray['adminPassword'] ) ) );
		
		$dataArray['authKey'] = $this->randomKey( 8 );
		$dataArray['hookKey'] = $this->randomKey( 12 );
	
		$setCharset = '';
		if( $db->version() > '4.1' )
		{
			$setCharset = 'DEFAULT CHARSET='.$dataArray['dbCharset'];
			$db->charset( $dataArray['dbCharset'] );
		}
		
		$sql = $this->fr( SKY_INSTALL_ROOT.'/installsql.txt' );
		$sql = str_replace( array( '{DB_NAME}', '{DB_TABLE_PREFIX}', '{setCharset}' ), array( $dataArray['dbName'], $dataArray['dbTablePrefix'], $setCharset ), $sql );
	
		if( $dataArray['doNotRewriteDB'] == 1 )
		{
			$upgradeSql = $this->fr( SKY_INSTALL_ROOT.'/upgradesql.txt' );
			$upgradeSql = str_replace( array( '{DB_NAME}', '{DB_TABLE_PREFIX}', '{setCharset}' ), array( $dataArray['dbName'], $dataArray['dbTablePrefix'], $setCharset ), $upgradeSql );
			$sql .= $upgradeSql;
		}
		
		$sqlList = explode( ';', $sql );
		
		if( is_array( $sqlList ) && !empty( $sqlList ) )
		{
			foreach ( $sqlList as $value )
			{
				if( strpos( $value, 'DROP' ) !== false && $dataArray['doNotRewriteDB'] == 1 )
				continue;

				$db->query( trim( $value ) );
			}
		}
		
		$dataArray['dbCharset'] = 'utf-8';
		$sql = "REPLACE INTO `{$dataArray['dbTablePrefix']}setting` (`setname`, `data`) VALUES 
				('dbHost','{$dataArray['dbHost']}'),
				('dbUser','{$dataArray['dbUser']}'),
				('dbPassword','{$dataArray['dbPassword']}'),
				('dbCharset','{$dataArray['dbCharset']}'),
				('authServerCharset',''),
				('dbName','{$dataArray['dbName']}'),
				('dbTablePrefix','{$dataArray['dbTablePrefix']}'),
				('debugMode','0'),
				('authKey','{$dataArray['authKey']}'),
				('hookKey','{$dataArray['hookKey']}'),
				('timezone','{$dataArray['timezone']}'),
				('itemPostTimeLimit','30'),
				('itemMaxLength','60'),
				('itemMinLength','5'),
				('maxItems','100'),
				('replyPostTimeLimit','30'),
				('replyMaxLength','100'),
				('replyMinLength','5'),
				('userCookieName','flexsns_sky_userinfo'),
				('userSessionName','flexsns_sky_userinfo'),
				('cookiePath','/'),
				('cookieDomain',''),
				('broadcastNum','10'),
				('browserTitle','Sky'),
				('showUserInfo','1'),
				('useRealAvatar','0'),
				('skin','default'),
				('autoFillItem','1'),
				('skyUrl','{$dataArray['skyUrl']}'),
				('spaceUrl','{$dataArray['spaceUrl']}'),
				('regUrl','{$dataArray['regUrl']}'),
				('websiteUrl','{$dataArray['websiteUrl']}'),
				('daySound','./sky/media/sound/day.mp3'),
				('nightSound','./sky/media/sound/night.mp3'),
				('defaultContent','赶快发送你的愿望到天空中来吧'),
				('skyBroadcastLoop','3'),
				('skyBroadcastTimer','6'),
				('maxDiggPertime','1'),
				('leftPanelStatus','5'),
				('admin','{$dataArray['admin']}'),
				('adminPassword','{$dataArray['adminPassword']}'),
				('newItemAddFeed','1'),
				('diggItemAddFeed','1'),
				('replyItemAddFeed','1'),
				('feedNewItemTitle','{fromuser}在天空发了一颗小星星'),
				('feedDiggItemTitle','{fromuser}顶了{touser}的星星'),
				('feedReplyItemTitle','{fromuser}回复了{touser}的星星')
		";
		$db->query( $sql );
		
		$flashConfig = $this->_flashConfig( $dataArray );
		$phpConfig= $this->_phpConfig( $dataArray );
		
		if( !$this->fw( SKY_ROOT.'/data/config.php', $phpConfig ) )
		$this->message( '安装失败', '写入配置文件失败,请将data目录设置为可写', 'failed' );
		
		if( !$this->fw( SKY_ROOT.'/data/config.xml', $flashConfig ) )
		$this->message( '安装失败', '写入配置文件失败,请将data目录设置为可写', 'failed' );
		
		header('Location:./index.php?install-multipleSetup');
	}
	
	//不同适配器请自行修改此处的代码
	function multipleSetupAction()
	{
		if( !file_exists( SKY_ROOT.'/data/config.php' ) )
		{
			header( 'Location:./index.php?install-index' );
			exit;
		}
		
		$this->template( 'multiple/comsenzuc/index' );
	}
	
	
	//不同适配器请自行修改此处的代码
	function multipleSaveAction()
	{
		$config = array();
		require_once SKY_ROOT.'/data/config.php';
		$this->config = $config;
		
		if( empty( $this->config ) )
		{
			header( 'Location:./index.php?install-index' );
			exit;
		}
		
		$url = $this->post['ucUrl'];
		$url = preg_match( '/.+\/$/', $url ) ? $url : $url.'/';
		
		
		$pw = urlencode( $this->s2d( $this->post['ucPassword'] ) );
		$appName = urlencode( 'Flexsns-Sky' );
		$appUrl = urlencode( $this->config['flash']['skyUrl'] );
		
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
		$this->message( 'Ucenter配置失败', '连接Ucenter失败,可能是连接有误', 'failed' );
		
		$appTempFiled = array();
		$appTempFiled['content'] = '[the content user posted]';
		$appTempFiled['contentLink'] = '[the content link]';
		
		$app_tagtemplates = 'apptagtemplates[template]='.urlencode('{content}').'&'.
		'apptagtemplates[fields][content]='.urlencode($appTempFiled['content']).'&'.
		'apptagtemplates[fields][contentLink]='.urlencode($appTempFiled['contentLink']);
		
		$post = "m=app&a=add&ucfounder=&ucfounderpw={$pw}&apptype=OTHER&appname={$appName}&appurl={$appUrl}&appip=&{$app_tagtemplates}&appcharset={$this->config['db']['charset']}&appdbcharset={$this->config['db']['charset']}&release=".UC_CLIENT_RELEASE;
		
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
			$sql = " REPLACE INTO `{$this->config['db']['tablePrefix']}setting` (`setname`, `data`) VALUES ( 'authServerCharset', '{$uccharset}' ) ";
			
			$db = $this->db();
			$db->query( $sql );
			$dataArray['dbHost'] = $this->config['db']['host'];
			$dataArray['dbUser'] = $this->config['db']['user'];
			$dataArray['dbPassword'] = $this->config['db']['password'];
			$dataArray['dbCharset'] = $this->config['db']['charset'];
			$dataArray['authServerCharset'] = $uccharset;
			$dataArray['dbName'] = $this->config['db']['dbName'];
			$dataArray['dbTablePrefix'] = $this->config['db']['tablePrefix'];
			$dataArray['authKey'] = $this->config['authKey'];
			$dataArray['timezone'] = $this->config['timezone'];
			$dataArray['skyUrl'] = $this->config['flash']['skyUrl'];
			$dataArray['spaceUrl'] = $this->config['flash']['spaceUrl'];
			$dataArray['regUrl'] = $this->config['flash']['regUrl'];
			$dataArray['websiteUrl'] = $this->config['flash']['websiteUrl'];
			$dataArray['admin'] = $this->config['admin'];
			$dataArray['adminPassword'] = $this->config['adminPassword'];

			$phpConfig= $this->_phpConfig( $dataArray );
			
			if( !$this->fw( SKY_ROOT.'/data/config.php', $phpConfig ) )
			$this->message( '配置失败', '写入配置文件失败,请将data目录设置为可写', 'failed' );
			
			if( !$this->fw( SKY_ROOT.'/data/multiple/comsenzuc/config.php', $ucconfigStr ) )
			$this->message( 'Ucenter配置失败', '写入配置文件失败,请将data/multiple/comsenzuc目录设置为可写', 'failed' );
			
		}
		else
		{
			$this->message( 'Ucenter配置失败', '获取Ucenter配置信息失败，请检查Ucenter地址及创始人密码是否输入正确', 'failed' );
		}
		
		header( 'Location:./index.php?install-complete' );
	}
	
	
	function completeAction()
	{
		if( !file_exists( SKY_ROOT.'/data/multiple/comsenzuc/config.php') )
		{
			header( 'Location:./index.php?install-index' );
		}
		
		$this->fw( SKY_ROOT.'/data/installed.sky', 'Powered By Flexsns.com' );
		$this->template( 'complete' );
	}
	
	//生成flash配置文件内容
	function _flashConfig( $dataArray )
	{
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
			{$skinXML[1]}
		</skin>
		
		<skyUrl>{$dataArray['skyUrl']}/</skyUrl>
		<spaceUrl>{$dataArray['spaceUrl']}</spaceUrl>
		<regUrl>{$dataArray['regUrl']}</regUrl>
		<websiteUrl>{$dataArray['websiteUrl']}</websiteUrl>
		
		<daySound>
			<sound>./sky/media/sound/day.mp3</sound>
		</daySound>
		<nightSound>
			<sound>./sky/media/sound/night.mp3</sound>
		</nightSound>
		
		<defaultUserHead>./sky/default.gif</defaultUserHead>
		
		<maxItems>100</maxItems>
		<myBoxPerPage>8</myBoxPerPage>
		<replysPerPage>8</replysPerPage>
		
		<autoFillItem>1</autoFillItem>
		<resizeArray>0.5,0.7,0.7,0.8,0.7,0.6</resizeArray>
		<defaultContent>赶快发送你的愿望到天空中来吧</defaultContent>
		<maxItemContentWords>60</maxItemContentWords>
		<maxReplyContentWords>100</maxReplyContentWords>
		<minItemContentWords>5</minItemContentWords>
		<minReplyContentWords>5</minReplyContentWords>
		<itemPostTimeLimit>30</itemPostTimeLimit>
		<replyPostTimeLimit>30</replyPostTimeLimit>
		
		<requestMarkerNums>20</requestMarkerNums>
		<requestSuccessStr>success</requestSuccessStr>
		<requestFailedStr>failed</requestFailedStr>


		<leftPadding>50</leftPadding>
		<rightPadding>50</rightPadding>

		<topPadding>30</topPadding>
		<bottomPadding>30</bottomPadding>

		<skyBroadcastLoop>3</skyBroadcastLoop>
		<skyBroadcastTimer>6</skyBroadcastTimer>
		
		<maxDiggPertime>3</maxDiggPertime>
		<leftPanelStatus>5</leftPanelStatus>
		
		<debugMode>0</debugMode>
    </config>
</sky>
EOD;
	
		return $xml;
	}
	
	function _phpConfig( $dataArray )
	{
	
		$php = <<<EOD
<?php

define( 'IN_SKY', true );

//注意路径后面没有斜杆 '/'
define( 'SKY_ROOT', substr( dirname( __FILE__  ), 0, -5 ) );

\$config = array();

\$config['db']['host'] = '{$dataArray['dbHost']}';
\$config['db']['user'] = '{$dataArray['dbUser']}';
\$config['db']['password'] = '{$dataArray['dbPassword']}';

\$config['db']['charset'] = '{$dataArray['dbCharset']}';
\$config['authServerCharset'] = '{$dataArray['authServerCharset']}';

\$config['db']['dbName'] = '{$dataArray['dbName']}';
\$config['db']['tablePrefix'] = '{$dataArray['dbTablePrefix']}';

//是否为排错模式,仅供开发者使用
\$config['debugMode'] = 0;

//加密密钥
\$config['authKey'] = '{$dataArray['authKey']}';

//调用其他应用的特殊接口的验证字符
\$config['hookKey'] = '{$dataArray['hookKey']}';

//时区
\$config['timezone'] = {$dataArray['timezone']};//如果时间有误,请自行修改此处的值,一般填0或8
		
//当前时间
\$config['nowtime'] = time();

//天空数据设定
\$config['item']['postTimeLimit'] = 30;//每次发送数据时间限制
\$config['item']['maxLength'] = 60;//最长字数
\$config['item']['minLength'] = 5;//最小字数
\$config['item']['maxItems'] = 100;//每片天空显示的最多星星个数


//天空回复设定
\$config['reply']['postTimeLimit'] = 30;//每次发送数据时间间隔限制
\$config['reply']['maxLength'] = 100;//最长回复字数
\$config['reply']['minLength'] = 5;//最小回复字数

//多系统兼容适配器,comsenz系列产品用户请选择Common_Multiple_Comsenz适配器
//Common_Multiple_Comsenz
\$config['multipleAdapter'] = 'Common_Multiple_Comsenzuc';

//用户信息cookie名,供sky生成cookie
\$config['userCookieName'] = 'flexsns_sky_userinfo';
//用户信息session名,供sky生成session
\$config['userSessionName'] = 'flexsns_sky_userinfo';

// cookie 作用路径
\$config['cookiePath'] = '/';
// cookie 作用域
\$config['cookieDomain'] = ''; 

//顶部广播显示条数
\$config['broadcastNum'] = 10;

//浏览器标题
\$config['browserTitle'] = 'Sky';

\$config['showUserInfo'] = 1;
\$config['useRealAvatar'] = 0;

\$config['flash']['skin'] = 'default';
\$config['flash']['autoFillItem'] = 1;
\$config['flash']['skyUrl'] = '{$dataArray['skyUrl']}';
\$config['flash']['spaceUrl'] = '{$dataArray['spaceUrl']}';
\$config['flash']['regUrl'] = '{$dataArray['regUrl']}';
\$config['flash']['websiteUrl'] = '{$dataArray['websiteUrl']}';
\$config['flash']['daySound'] = array( './sky/media/sound/day.mp3' );
\$config['flash']['nightSound'] = array( './sky/media/sound/night.mp3' );
\$config['flash']['defaultContent'] = '赶快发送你的愿望到天空中来吧';
\$config['flash']['skyBroadcastLoop'] = 3;
\$config['flash']['skyBroadcastTimer'] = 6;
\$config['flash']['maxDiggPertime'] = 1;
\$config['flash']['leftPanelStatus'] = 5;

\$config['admin'] = '{$dataArray['admin']}';
\$config['adminPassword'] = '{$dataArray['adminPassword']}';

\$config['newItemAddFeed'] = 1;
\$config['diggItemAddFeed'] = 1;
\$config['replyItemAddFeed'] = 1;

\$config['feedNewItemTitle'] = '{fromuser}在天空发了一颗小星星';
\$config['feedDiggItemTitle'] = '{fromuser}顶了{touser}的星星';
\$config['feedReplyItemTitle'] = '{fromuser}回复了{touser}的星星';

?>
EOD;
	
		return $php;
	}
	
}

?>