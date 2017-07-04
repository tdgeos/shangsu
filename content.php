<?php 
require_once("My_SQL/_My_SQL_link_All.php");//引用数据库链接文
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>尚素网|<?php
$id=$_GET['tid'];
$sql = "SELECT `subject`,`tid`  FROM `ss_forum_thread` where tid='$id'";
$result = mysql_query($sql) or die("查询失败!");
$row=mysql_fetch_array($result) ;
echo $row['subject'];
mysql_free_result($result);
?></title> 
<link rel="shortcut icon" href="images/ym/logo_s.gif" type="image/x-icon" /> 
<link href="css/allstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/CreateHTML5Elements.js"></script>
<script type="text/javascript" src="forum/static/js/common.js"></script>
<script type="text/javascript" src="forum/static/js/jquery.js"></script>
<script type="text/javascript" src="forum/static/js/logging.js"></script>
<script type="text/javascript" src="forum/static/js/forum_viewthread.js"></script>
<script type="text/javascript" src="forum/static/js/forum.js"></script>
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/ie.css" />
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--base href="forum/"-->
</head>
<body>
<header>
<div id="mlogo">
	<a href="index.php" title="尚素网" class="logo_"></a>
</div>
<div id="mlogo">
    <!--[if IE]>
    <img src="images/logo_hover.png" style="margin-left:30px;margin-top:-104px;" alt="尚素网"/>
    <![endif]-->
</div>
</header>
	<div class="main_wrapper"> 
    <div id="wrapper">
<nav class="clearfix">
<ul>
<li><a href="index.php">主页</a></li>
	<li><a href="message.php?i=0">资讯</a>
<ul>
	<li><a href="message.php?i=1">尚素资讯</a></li>
	<li><a href="message.php?i=2">名人动向</a></li>
	<li><a href="message.php?i=3">素食餐馆</a></li>
	<li><a href="message.php?i=4">素食百科</a></li>
	<li><a href="message.php?i=5">食素误区</a></li>
	<li><a href="message.php?i=6">线下活动</a></li> 
</ul>
</li>
	<li><a href="health.php?i=0">健康素食</a>
<ul>
	<li><a href="health.php?i=1">素食常识</a></li>
	<li><a href="health.php?i=2">素食菜谱</a></li>
	<li><a href="health.php?i=3">养生妙方</a></li>
	<li><a href="health.php?i=4">私房菜分享</a></li>
	<li><a href="health.php?i=5">营养师菜谱</a></li>
	<li><a href="health.php?i=6">亚健康食谱</a></li>
</ul>
</li>
	<li><a href="culture.php?i=0">素食文化</a>
<ul> 
	<li><a href="culture.php?i=1">佛教素食</a></li> 
	<li><a href="culture.php?i=2">道教素食</a></li>
	<li><a href="culture.php?i=3">低碳环保</a></li>
	<li><a href="culture.php?i=4">动物保护</a></li> 
	<li><a href="culture.php?i=5">瑜伽修身</a></li>
	<li><a href="culture.php?i=6">尚素人文</a></li> 
</ul>
</li>
	<li><a href="slimming.php?i=0">美容瘦身</a>
<ul>
	<li><a href="slimming.php?i=1">健康美容</a></li>
	<li><a href="slimming.php?i=2">科学瘦身</a></li>
	<li><a href="slimming.php?i=3">瘦身食谱</a></li> 
	<li><a href="slimming.php?i=4">三高保健</a></li>
	<li><a href="slimming.php?i=5">特殊人群</a></li>
	<li><a href="slimming.php?i=6">瘦身误区</a></li>
</ul>
</li>
	<li><a href="tour.php?i=0">休闲旅游</a>
<ul> 
	<li><a href="tour.php?i=1">宗教圣地</a></li> 
	<li><a href="tour.php?i=2">名山名川</a></li>
	<li><a href="tour.php?i=3">素食之都</a></li>
	<li><a href="tour.php?i=4">摄影分享</a></li> 
	<li><a href="tour.php?i=5">路线推荐</a></li> 
	<li><a href="tour.php?i=6">当地特色</a></li> 
</ul>
</li>
	<li><a href="helper.php">生活助手</a>
<ul>
<li><a href="helper/everday.php">日常生活</a></li>
<li><a href="helper/recreation.php">休闲娱乐</a></li>
<li><a href="helper/luck.php">星座运程</a></li> 
<li><a href="helper/net.php">上网工具</a></li>
<li><a href="helper/shop.php">购物理财</a></li> 
<li><a href="helper/study.php">在线学习</a></li>
</ul>
</li>
 
<li><a href="forum/"target="_blank">尚素论坛</a></li>
<li><a href="sky/"target="_blank">许愿天空</a></li>
<li><a href="phone.php">手机客户端</a></li>
</ul> 
 </nav>
        <style type="text/css">
        h1 {font-size:24px; font-weight:normal;  margin-top:-40px;margin-left:10px;margin-bottom:15px;color:#36F;}
        h2 {font-size:20px; font-weight:normal;  margin-left:365px;color:#36F;}
        h3 {font-size:18px;margin-top:-42px;margin-left:440px}
		h4 {font-size:18px;color:#36F;}
        h5 {font-size:18px; font-weight:normal;}
		</style>
	<section id="content" class="clearfix">
	<aside class="narrowcolumn4"> 
		<div class="subContainer eheight2 subContainerpading clearfix"></div>
	</aside> 
		<article class="widecolumn2"> 
    	<div class="container_content">
        <h1>
		<?php
$id=$_GET['tid'];
$sql = "SELECT `subject`,`tid`  FROM `ss_forum_thread` where tid='$id'";
$result = mysql_query($sql) or die("查询失败!");
$row=mysql_fetch_array($result) ;
echo $row['subject'];
mysql_free_result($result);
?>
<a2>
<form> 
<input type="button" name= "ok" value=" 关闭页面 " onClick="window.close()">
</form> 
</a2>
        </h1>
    <div class="subContainer eheight">
<ul>
<table border="0" width="700" cellspacing="1" align="center">

<?php
$id=$_GET['tid'];
$res=mysql_query("select * from ss_forum_post fid where tid='$id'");
while($row=mysql_fetch_array($res)){
if($row['first']!=0)
{
$mes = $row['message'];
echo str_replace("[/img]"," />",str_replace("[img]","<img src=",$mes));
}}
mysql_free_result($res);
?>
</h3>
</table>
</ul>
</div>
                    <br/>
                    <br/>
        		<aside class="narrowcolumn3_2">
                 <div class="comments"></div> 
                    <br/>
<form method="post" autocomplete="off" id="fastpostform" action="forum/forum.php?mod=post&amp;action=reply&amp;tid=<?php echo $_GET['tid'];?>&amp;extra=page%3D1&amp;replysubmit=yes&amp;infloat=yes&amp;handlekey=fastpost&amp;" onsubmit="return fastpostvalidate(this)" target="_blank">

<table cellspacing="0" cellpadding="0">
<tbody><tr>
<td class="plc">
<span id="fastpostreturn"></span>
<div class="cl">
<div id="fastposteditor">
<div class="tedt mtn">
<div class="bar">
<script src="forum/static/js/seditor.js?zcl" type="text/javascript"></script></div>
<div class="area">
<textarea rows="6" cols="60" name="message" id="fastpostmessage" onkeydown="seditor_ctlent(event, 'fastpostvalidate($(\'fastpostform\'))');" tabindex="4" class="pt"></textarea>
</div>
</div>
</div>
</div>
<?php
require 'forum/source/class/class_core.php';
$discuz = & discuz_core::instance();
$mod = !in_array($discuz->var['mod'], $modarray) ? 'index' : $discuz->var['mod'];
if($discuz->var['mod'] == 'group') {
	$_G['basescript'] = 'group';
}
$discuz->init();
?>
<input type="hidden" name="formhash" value="<?php echo $_G['formhash'];?>">
<input type="hidden" name="subject" value="" />
<p class="ptm pnpost">
<h3><button type="submit" name="replysubmit" id="fastpostsubmit" class="submit" value="replysubmit" tabindex="5" ><strong><h4>提交回复</h4></strong></button></h3>
<script type="text/javascript">if(getcookie('fastpostrefresh') == 1) {$('fastpostrefresh').checked=true;}</script>
</p>
</td>
</tr>
</tbody>
</table>
</form>

<div class="container_space2"></div> 
<div class="subContainer eheight clearfix">
<?php
$id=$_GET['tid'];
$res=mysql_query("select * from ss_forum_post where tid='$id'");
$number = 3;
while($row=mysql_fetch_array($res)){
	echo "<br/>";
	if($number !=0){
if($row['authorid'] != 0&&$row['first'] == 0)
{?><h4>
 	<img width="30" height="30" src="forum/uc_server/avatar.php?uid=<?php echo $row['authorid'];?>&size=middle"/>
    <a href="forum/?<?php echo $row['authorid'];?>"target="_blank">
		<?php echo "本站会员：",$row['author'];?></a></h4>
<?php
}
elseif($row['authorid'] == 0&&$row['first'] == 0)
{?><h4>
 	<img width="30" height="30" src="forum/uc_server/images/noavatar_small.gif"/>
    <a href="forum/forum.php"target="_blank">
		<?php echo "匿名用户：",substr($row['useip'],0,10),'X';?></a></h4>
<?php
}
if($row['first'] == 0)
{$mes = $row['message'];
echo "<h5>";
echo str_replace("[/img]"," />",str_replace("[img]","<img src=",$mes));
echo "<br/><br/><div class='container_space2'></div> ";
echo "</h5>";}
$number--;}
if($number == 0){echo "<a href='viewmes.php?tid=$id' target='_blank'><h2>查看更多留言</h2></a>";break;}
}
mysql_free_result($res);
?>
</div></aside>
</div>
</article>
</section>
</div>
</div>
</body>
</html>