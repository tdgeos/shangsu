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
<title>尚素网|美容瘦身|素食者的首选网站</title>
<link rel="shortcut icon" href="images/ym/logo_s.gif" type="image/x-icon" /> 
<link href="css/allstyle.css" rel="stylesheet" type="text/css" />
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
<li class="frest"><a href="slimming.php?i=0" class="active">美容瘦身</a>
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
<li><a href="sky/"target="_blank">尚素天空</a></li>
<li><a href="phone.php">手机客户端</a></li>
</ul> 
 </nav>
<section id="content" class="clearfix"> 
<aside class="narrowcolumn2">
<h6><div class="container_slimming"></div></h6> 
<div class="subContainerpading clearfix"> 
 <div class="d_avatar avatar48">
<div class="slide">
<nav2> 
<ul>
<li><a href="slimming.php?i=1">健 康 美 容</a></li>
<li><a href="slimming.php?i=2">科 学 瘦 身</a></li>
<li><a href="slimming.php?i=3">瘦 身 食 谱</a></li>
<li><a href="slimming.php?i=4">三 高 保 健</a></li>
<li><a href="slimming.php?i=5">特 殊 人 群</a></li>
<li><a href="slimming.php?i=6">瘦 身 误 区</a></li>
</ul>
 </nav2>
 </div>
 </div>
</div>
<div class="container_top_A">
<div class="subContainer eheight">
 <ul>
<td vAlign=top align=left width="165">

<div style="PADDING-RIGHT: 10px; PADDING-LEFT: 0px; PADDING-BOTTOM: 5px; OVERFLOW: hidden; PADDING-TOP: 20px; HEIGHT: 300px">

<MARQUEE onmouseover=this.stop(); onmouseout=this.start(); scrollAmount=1 scrollDelay=1 direction=up>
<?php
$sql = "SELECT `subject`,`tid`,`author`FROM `ss_forum_thread` order by views desc";
$result = mysql_query($sql) or die("查询失败!");
$number = 9;
while ($row=mysql_fetch_array($result)) 
{if ($number != 0){?>
<a href="forum/forum.php?mod=viewthread&tid=<?php echo $row['tid'];?>"target="_blank">
<h4><?php echo mb_substr($row['subject'],0,16,'utf-8');$number--;?><br /></h4></a>
<?php }}
mysql_free_result($result);
?>
</MARQUEE>

</div>
</td>
</ul>
<a class="poster4">广告4</a>
</div> 
</div> 
 </aside>
<article class="widecolumn6"> 
<?php
switch ($i){
case 0:
?>
 <h3><div class="container_slimming_health"><a2>
<a href="slimming.php?i=1">更多</a></a2></div></h3>
<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==63 &&$number != 0)
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
</table></div>
 <h3><div class="container_slimming_science">
<a href="slimming.php?i=2">更多</a></div></h3>

<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==64 &&$number != 0)
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
</div>
 <h3><div class="container_slimming_recipe"><a2>
<a href="slimming.php?i=3">更多</a></a2></div></h3>
<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==65 &&$number != 0)
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
</div>
 <h3><div class="container_slimming_tall">
<a href="slimming.php?i=4">更多</a></div></h3>
<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==66 &&$number != 0)
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
</div>
 <h3><div class="container_slimming_special"><a2>
<a href="slimming.php?i=5">更多</a></a2></div></h3>
<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==67 &&$number != 0)
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
</div>
 <h3><div class="container_slimming_error">
<a href="slimming.php?i=6">更多</a></div></h3>
<div class="subContainer eheight2 subContainerpading clearfix"> 
<div id="previewArea" class="previewArea"></div>
 <div class="d_avatar avatar48">
</div>
<table border="0" width="800" cellspacing="1" align="center">
<?php
$sql = "SELECT `subject`, `author`,`authorid`, `fid` ,`tid`FROM `ss_forum_thread` order by tid desc";
 $result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 6;
 while ($row=mysql_fetch_array($result)) 
 {
 if ($row['fid'] ==68 &&$number != 0)
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
</div>
<?php
break;
 case 1:
?>
<h3><div class="container_slimming_health"></div></h3>
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
if ($row['fid'] ==63 &&$number != 0)
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
<h3><div class="container_slimming_science2"></div></h3>
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
if ($row['fid'] ==64 &&$number != 0)
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
<h3><div class="container_slimming_recipe"></div></h3>
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
if ($row['fid'] ==65 &&$number != 0)
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
<h3><div class="container_slimming_tall2"></div></h3>
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
if ($row['fid'] ==66 &&$number != 0)
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
</ul>
</div>
<?php
break;
 case 5:
?>
<h3><div class="container_slimming_special"></div></h3>
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
if ($row['fid'] ==67 &&$number != 0)
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
<h3><div class="container_slimming_error2"></div></h3>
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
if ($row['fid'] ==68 &&$number != 0)
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