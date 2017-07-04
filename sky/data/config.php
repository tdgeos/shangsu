<?php

define( 'IN_SKY', true );

//注意路径后面没有斜杆 '/'
define( 'SKY_ROOT', substr( dirname( __FILE__  ), 0, -5 ) );

$config = array();

$config['db']['host'] = 'localhost';
$config['db']['user'] = 'tdgeos';
$config['db']['password'] = 'tdgeos';

$config['db']['charset'] = 'utf-8';
$config['authServerCharset'] = '';

$config['db']['dbName'] = 'shangsu';
$config['db']['tablePrefix'] = 'sky_';

//是否为排错模式,仅供开发者使用
$config['debugMode'] = 0;

//加密密钥
$config['authKey'] = 'vu2rs6dv7';

//调用其他应用的特殊接口的验证字符
$config['hookKey'] = '7at5hgw177zvv';

//时区
$config['timezone'] = 8;//如果时间有误,请自行修改此处的值,一般填0或8
		
//当前时间
$config['nowtime'] = time();

//天空数据设定
$config['item']['postTimeLimit'] = 30;//每次发送数据时间限制
$config['item']['maxLength'] = 60;//最长字数
$config['item']['minLength'] = 5;//最小字数
$config['item']['maxItems'] = 100;//每片天空显示的最多星星个数


//天空回复设定
$config['reply']['postTimeLimit'] = 30;//每次发送数据时间间隔限制
$config['reply']['maxLength'] = 100;//最长回复字数
$config['reply']['minLength'] = 5;//最小回复字数

//多系统兼容适配器,comsenz系列产品用户请选择Common_Multiple_Comsenz适配器
//Common_Multiple_Comsenz
$config['multipleAdapter'] = 'Common_Multiple_Comsenzuc';

//用户信息cookie名,供sky生成cookie
$config['userCookieName'] = 'flexsns_sky_userinfo';
//用户信息session名,供sky生成session
$config['userSessionName'] = 'flexsns_sky_userinfo';

// cookie 作用路径
$config['cookiePath'] = '/';
// cookie 作用域
$config['cookieDomain'] = ''; 

//顶部广播显示条数
$config['broadcastNum'] = 10;

//浏览器标题
$config['browserTitle'] = 'Sky';

$config['showUserInfo'] = 1;
$config['useRealAvatar'] = 0;

$config['flash']['skin'] = 'default';
$config['flash']['autoFillItem'] = 1;
$config['flash']['skyUrl'] = 'http://127.0.0.1/shang4.0/sky';
$config['flash']['spaceUrl'] = '';
$config['flash']['regUrl'] = '';
$config['flash']['websiteUrl'] = 'http://127.0.0.1/shang4.0/index.php';
$config['flash']['daySound'] = array( './sky/media/sound/day.mp3' );
$config['flash']['nightSound'] = array( './sky/media/sound/night.mp3' );
$config['flash']['defaultContent'] = '赶快发送你的愿望到天空中来吧';
$config['flash']['skyBroadcastLoop'] = 3;
$config['flash']['skyBroadcastTimer'] = 6;
$config['flash']['maxDiggPertime'] = 1;
$config['flash']['leftPanelStatus'] = 5;

$config['admin'] = 'admin';
$config['adminPassword'] = 'e43b060da6d25fdf7cba5f9938f1679c';

$config['newItemAddFeed'] = 1;
$config['diggItemAddFeed'] = 1;
$config['replyItemAddFeed'] = 1;

$config['feedNewItemTitle'] = '{fromuser}在天空发了一颗小星星';
$config['feedDiggItemTitle'] = '{fromuser}顶了{touser}的星星';
$config['feedReplyItemTitle'] = '{fromuser}回复了{touser}的星星';

?>