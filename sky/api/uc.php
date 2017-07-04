<?php

define('UC_CLIENT_VERSION', '1.5.0');	//note UCenter 版本标识
define('UC_CLIENT_RELEASE', '20081031');

define('API_DELETEUSER', 0);		//note 用户删除 API 接口开关
define('API_RENAMEUSER', 0);		//note 用户改名 API 接口开关
define('API_GETTAG', 0);		//note 获取标签 API 接口开关
define('API_SYNLOGIN', 1);		//note 同步登录 API 接口开关
define('API_SYNLOGOUT', 1);		//note 同步登出 API 接口开关
define('API_UPDATEPW', 0);		//note 更改用户密码 开关
define('API_UPDATEBADWORDS', 0);	//note 更新关键字列表 开关
define('API_UPDATEHOSTS', 0);		//note 更新域名解析缓存 开关
define('API_UPDATEAPPS', 0);		//note 更新应用列表 开关
define('API_UPDATECLIENT', 0);		//note 更新客户端缓存 开关
define('API_UPDATECREDIT', 0);		//note 更新用户积分 开关
define('API_GETCREDITSETTINGS', 0);	//note 向 UCenter 提供积分设置 开关
define('API_GETCREDIT', 0);		//note 获取用户的某项积分 开关
define('API_UPDATECREDITSETTINGS', 0);	//note 更新应用积分设置 开关

define('API_RETURN_SUCCEED', '1');
define('API_RETURN_FAILED', '-1');
define('API_RETURN_FORBIDDEN', '-2');

define( 'UCAPI_ROOT',  dirname( __FILE__  ).'/comsenzuc' );
define( 'UC_CONFIG_FILE', substr( dirname( __FILE__  ), 0, -3 ).'data/multiple/comsenzuc/config.php' );
require_once UC_CONFIG_FILE;
	
//note 普通的 http 通知方式
if(!defined('IN_UC')) {

	error_reporting(0);
	set_magic_quotes_runtime(0);

	defined( 'MAGIC_QUOTES_GPC' ) || define( 'MAGIC_QUOTES_GPC', get_magic_quotes_gpc() );
	

	$_DCACHE = $get = $post = array();
	
	$code = @$_GET['code'];
	parse_str(_authcode($code, 'DECODE', UC_KEY), $get);
	if(MAGIC_QUOTES_GPC) {
		$get = _stripslashes($get);
	}

	$timestamp = time();
	if($timestamp - $get['time'] > 3600) {
		exit('Authracation has expiried');
	}
	if(empty($get)) {
		exit('Invalid Request');
	}
	$action = $get['action'];
	require_once UCAPI_ROOT.'/uc_client/lib/xml.class.php';
	$post = xml_unserialize(file_get_contents('php://input'));

	if(in_array($get['action'], array('test', 'deleteuser', 'renameuser', 'gettag', 'synlogin', 'synlogout', 'updatepw', 'updatebadwords', 'updatehosts', 'updateapps', 'updateclient', 'updatecredit', 'getcreditsettings', 'updatecreditsettings'))) {
		require_once UCAPI_ROOT.'/include/db_'.UC_CONNECT_ADAPTER.'.class.php';
		$GLOBALS['db'] = new dbstuff;
		$GLOBALS['db']->connect( $config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['dbName'], FALSE, TRUE, $config['db']['charset'] );
		$GLOBALS['tablepre'] = $config['db']['tablePrefix'];
		unset($dbhost, $dbuser, $dbpw, $dbname, $pconnect);
		$uc_note = new uc_note();
		exit($uc_note->$get['action']($get, $post));
	} else {
		exit(API_RETURN_FAILED);
	}

//note include 通知方式
} else {

	require_once UCAPI_ROOT.'/include/db_'.UC_CONNECT_ADAPTER.'.class.php';
	$GLOBALS['db'] = new dbstuff;
	$GLOBALS['db']->connect( $config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['dbName'], FALSE, TRUE, $config['db']['charset'] );
	$GLOBALS['tablepre'] = $config['db']['tablePrefix'];
	unset( $config );
}

class uc_note {

	var $dbconfig = '';
	var $db = '';
	var $tablepre = '';
	
	function _serialize($arr, $htmlon = 0) {
		if(!function_exists('xml_serialize')) {
			include_once UCAPI_ROOT.'/uc_client/lib/xml.class.php';
		}
		return xml_serialize($arr, $htmlon);
	}

	function uc_note() {
		
		$this->dbconfig = UC_CONFIG_FILE;
		$this->db = $GLOBALS['db'];
		$this->tablepre = $GLOBALS['tablepre'];
		
		require_once SKY_ROOT.'/common/global.class.php';
		new Common_Global_Class();
	}

	function test($get, $post) {
		return API_RETURN_SUCCEED;
	}
	
	function synlogin($get, $post) {
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		$_ENV['multipleObj']->saveCookieSession( $get['uid'], $get['username'], $get['password'] );
	}
	
	function synlogout( $get, $post ) {
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"');
		$_ENV['multipleObj']->clearCookieSession();
	}
	
	
	function deleteuser($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function renameuser($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function gettag($get, $post) {
		return API_RETURN_SUCCEED;
	}
	

	function updatepw($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updatebadwords($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updatehosts($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updateapps($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updateclient($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updatecredit($get, $post){
		return API_RETURN_SUCCEED;
	}

	function getcredit($get, $post) {
		return API_RETURN_SUCCEED;
	}
	
	function getcreditsettings($get, $post) {
		return API_RETURN_SUCCEED;
	}

	function updatecreditsettings($get, $post) {
		return API_RETURN_SUCCEED;
	}
	
}


function _authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
	$ckey_length = 4;

	$key = md5($key ? $key : UC_KEY);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
				return '';
			}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}

}

function _stripslashes($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = _stripslashes($val);
		}
	} else {
		$string = stripslashes($string);
	}
	return $string;
}