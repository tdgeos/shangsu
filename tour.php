<?php
$i = isset($_GET['i']) ? intval($_GET['i']) : 0;
require_once("My_SQL/_My_SQL_link_All.php");
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="Powerless" /> 
<meta name="Copyright" content="北京思行伟业数码科技有限公司" /> 
<meta name="description" content="尚素网是北京思行伟业数码科技有限公司推出的一款公益型素食网站" /> 
<title>尚素网|休闲旅游|素食者的首选网站</title>
<link rel="shortcut icon" href="images/ym/logo_s.gif" type="image/x-icon" />
<link href="css/allstyle.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/global.css">
<link href="css/tour.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/CreateHTML5Elements.js"></script><!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/ie.css" />
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
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
 <li class="frest"><a href="tour.php?i=0" class="active">休闲旅游</a>
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
<li><a href="sky"target="_blank">尚素天空</a></li>
<li><a href="phone.php">手机客户端</a></li>
</ul> 
 </nav>
 <section id="content" class="clearfix"> 
<aside class="narrowcolumn2">
<h6><div class="container_tour"></div></h6> 
 <div class="subContainerpading clearfix"> 
 <div class="d_avatar avatar48">
 <div class="slide">
<nav2> 
<ul>
<li><a href="tour.php?i=1">宗 教 圣 地</a></li>
<li><a href="tour.php?i=2">名 山 名 川</a></li>
<li><a href="tour.php?i=3">素 食 之 都</a></li>
<li><a href="tour.php?i=4">摄 影 分 享</a></li>
<li><a href="tour.php?i=5">路 线 推 荐</a></li>
<li><a href="tour.php?i=6">当 地 特 色</a></li>
</ul>
 </nav2>
 </div>
 </div>
 </div>
 <div class="container_top_B">
<div class="subContainer eheight">
 <ul>
 <td vAlign=top align=left width="165">

<div style="PADDING-RIGHT: 10px; PADDING-LEFT: 0px; PADDING-BOTTOM: 5px; OVERFLOW: hidden; PADDING-TOP: 20px; HEIGHT: 300px">

<MARQUEE onmouseover=this.stop(); onmouseout=this.start(); scrollAmount=1 scrollDelay=1 direction=up>
<?php
$sql = "SELECT `subject`,`author`,`authorid`,`tid` FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
$row=mysql_fetch_array($result);
/* 在 HTML 中打印结果 */
$number = 9;
while($row=mysql_fetch_array($result)) 
{if($number !=0){?>
<tr>
<td><a href="forum/forum.php?mod=viewthread&tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo mb_substr($row['subject'],0,16,'utf-8');$number--;?></h3></a></td>
</tr>
<?php
}}mysql_free_result($result);?>
</MARQUEE>

</div>
</td>
</ul>
</div> 
</div>
<script type="text/javascript" src="http://ji.revolvermaps.com/r.js"></script>
<script type="text/javascript">rm_f1st('8','170','true','true','FEFCC9','817jg8yaslk','true','ff8a00');</script> 
</aside> 
<article class="widecolumn6"> 
<?php
switch ($i){
case 0:
?>
<div class="container_tour_out"></div>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
<div class="box" id="box">
 <ul>
<div class="weatherNetwork">
<embed type="application/x-shockwave-flash" quality="high" width="655" height="493" wmode="transparent" base="http://flash.weather.com.cn/wmaps/" src="http://flash.weather.com.cn/wmaps/index.swf?url1=http:%2F%2Fwww.weather.com.cn%2Fweather%2F&amp;url2=.shtml&amp;from=cn"></embed>
</div>
</ul></div>
<ul class="tool-img">
<li class=""><a target="_blank" href="http://tool.114la.com/tianqi/">
<b class="ico ico-49"></b><b class="ico-sha"></b>
<span class="tool-name">天气预报</span>
<span class="ext">未来一周天气预报</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/huoche/">
<b class="ico ico-27"></b><b class="ico-sha"></b>
<span class="tool-name">列车时刻表</span>
<span class="ext">全国列车时刻在线查询</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/bus/">
<b class="ico ico-141"></b><b class="ico-sha"></b>
<span class="tool-name">公交查询</span>
<span class="ext">全国各大城市公交查询</span></a></li>
<li><a target="_blank" href="http://tool.114la.com/shouji/">
<b class="ico ico-1"></b><b class="ico-sha"></b>
<span class="tool-name">手机号码归属地</span>
<span class="ext">准确判断来电所在地区</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/calendar/">
<b class="ico ico-4"></b><b class="ico-sha"></b>
<span class="tool-name">万年历</span>
<span class="ext">农历、公历、重要节日</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/idcard/">
<b class="ico ico-3"></b><b class="ico-sha"></b>
<span class="tool-name">身份证归属地查询</span>
<span class="ext">查询身份证所在地</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/fanyi/">
<b class="ico ico-8"></b><b class="ico-sha"></b>
<span class="tool-name">免费在线翻译</span>
<span class="ext">各国语言互译</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/history/">
<b class="ico ico-135"></b><b class="ico-sha"></b>
<span class="tool-name">历史上的今天</span>
<span class="ext">回顾历史的长河</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/menses/">
<b class="ico ico-85"></b><b class="ico-sha"></b>
<span class="tool-name">女性安全期测算</span>
<span class="ext">女性安全期测算</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/express/">
<b class="ico ico-79"></b><b class="ico-sha"></b>
<span class="tool-name">快递查询</span>
<span class="ext">各类快递查询</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/youbian/">
<b class="ico ico-2"></b><b class="ico-sha"></b>
<span class="tool-name">邮编区号查询</span>
<span class="ext">区号、邮编、地名互查</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/nongli/">
<b class="ico ico-99"></b><b class="ico-sha"></b>
<span class="tool-name">黄道吉日查询</span>
<span class="ext">查看农历时辰宜忌</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/finance/rate/">
<b class="ico ico-9"></b><b class="ico-sha"></b>
<span class="tool-name">汇率查询</span>
<span class="ext">实时汇率兑换查询</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/phone/">
<b class="ico ico-82"></b><b class="ico-sha"></b>
<span class="tool-name">常用电话号码</span>
<span class="ext">常用电话号码</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/car/">
<b class="ico ico-7"></b><b class="ico-sha"></b>
<span class="tool-name">车辆违章查询</span>
<span class="ext">查询各地车辆违章记录</span></a></li>
<li><a target="_blank" href="http://tool.114la.com/live/chepai/">
<b class="ico ico-83"></b><b class="ico-sha"></b>
<span class="tool-name">车牌号码查询</span>
<span class="ext">车牌号码查询</span></a></li>
<li class=""><a target="_blank" href="http://tool.114la.com/live/herb/">
<b class="ico ico-24"></b><b class="ico-sha"></b>
<span class="tool-name">中药大全</span>
<span class="ext">中草药详细介绍</span></a></li>
<li><a target="_blank" href="http://tool.114la.com/live/food/">
<b class="ico ico-29"></b><b class="ico-sha"></b>
<span class="tool-name">食物热量查询</span>
<span class="ext">食物热量查询</span></a></li>
<li><a target="_blank" href="http://tool.114la.com/live/ditu/">
<b class="ico ico-75"></b><b class="ico-sha"></b>
<span class="tool-name">世界地图</span><span class="ext">世界地图</span></a></li>
<li><a target="_blank" href="http://tool.114la.com/tvshow/">
<b class="ico ico-144"></b><b class="ico-sha"></b>
<span class="tool-name">电视节目预告</span>
<span class="ext">全国各电视台节目预告</span></a></li>
</ul>
 </div>
<?php
break;
case 1:
?>
<h3><div class="container_tour_religion"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==69 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
case 2:
?>
<h3><div class="container_tour_mountain"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==70 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
case 3:
?>
<h3><div class="container_tour_vegetarian"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==71 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
case 4:
?>
<h3><div class="container_tour_shoot"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==72 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
case 5:
?>
<h3><div class="container_tour_path"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==73 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
case 6:
?>
<h3><div class="container_tour_local"></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix"> 
 <div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
</div>
<ul>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 50;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==74 &&$number != 0)
{?>
<tr>
<td><a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo $row['subject'];$number--;?></h3></a></td>
<td><a href="forum/?<?php echo $row['authorid'];?>"target="_blank"><h3>
<?php echo $row['author'];?></h3></a></td>
</tr>
<?php }
}
mysql_free_result($result);
?>
</table>
</ul></div>
<?php
break;
default:
$i=0;
break;
}
?>
</article>
</section>
</div>
</div>
</body>
</html>