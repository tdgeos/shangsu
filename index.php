<?php
require_once("My_SQL/_My_SQL_link_All.php");
?>
<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>尚素网|素食者的首选网站</title> 
<link rel="shortcut icon" href="images/ym/logo_s.gif" type="image/x-icon" /> 
<link href="css/allstyle.css" rel="stylesheet" type="text/css" />
<link href="css/slide.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/CreateHTML5Elements.js"></script>
<script type="text/javascript" src="js/in-jquery.js"></script> 
<script type="text/javascript" src="js/tutorial.js"></script>
<script type="text/javascript" src="js/runonload.js"></script>
<!--[if IE]>
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
<li class="frest"><a href="index.php"class="active">主页</a></li>
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
        <section id="content" class="clearfix"> 
        		<aside class="narrowcolumn">
<div class="subContainer eheight2 subContainerpading clearfix"> 
                     <div class="d_avatar avatar48">
                     	<div class="slide"> 
						<div class="sliderContent">
<?php
/* 在 HTML 中打印结果 */
$number = 5;
$sql = "SELECT `subject`, `message`, `first` ,`fid` ,`tid`FROM `ss_forum_post` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
while ($row=mysql_fetch_array($result)) 
{if ($row['fid'] ==99&&$number != 0&&$row['first'] !=0)
{
echo"<div class='item'> ";
echo str_replace("[/img]"," />",str_replace("[img]","<img width='340' height='360'src=",$row['message']));
echo"</div>";
$number--;
}}
mysql_free_result($result);
?>
                        </div>
                    </div>
                    </div> 
                    </div>
                    </aside>
                <article class="widecolumn">
                <br>
<form class="searchform" method="post" autocomplete="off" action="forum/search.php?mod=forum" onsubmit="if($('scform_srchtxt')) searchFocus($('scform_srchtxt'));">
<table id="scform" class="mbm" cellspacing="0" cellpadding="0">
<tbody><tr>
<td>
<table id="scform_form" cellspacing="0" cellpadding="0">
<tbody><tr>
<td class="td_srchtxt"><input type="text" id="scform_srchtxt" name="srchtxt" size="45" maxlength="40" value="请输入搜索内容" tabindex="1" class=" xg1"><script type="text/javascript">initSearchmenu('scform_srchtxt');$('scform_srchtxt').focus();</script></td>
<td class="td_srchbtn"><input type="hidden" name="searchsubmit" value="yes"><button type="submit" id="scform_submit" class="schbtn"><strong>搜索</strong></button></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</form>
                  <div class="subContainer eheight">
<?php
$sql = "SELECT `subject`, `message`, `first` , `fid` ,`tid`FROM `ss_forum_post` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 4;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] >=45&&$row['fid'] <=62&&$number != 0&&$row['first'] !=0)
{?>
<tr>
<a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h1>
<?php echo mb_substr($row['subject'],0,16,'utf-8');$number--;?></h1></a>
<h4>
<?php echo mb_substr($row['message'],0,60,'utf-8');?></h4>
</tr>
<?php
}}
mysql_free_result($result);
?>
</div><br/>
                </article> 
                <aside class="narrowcolumnRight"> 
<script type="text/javascript" src="http://ext.weather.com.cn/62348.js"></script>
                
<script charset="Shift_JIS" src="js/honehone_clock.js"></script>

<td vAlign=top align=left width="155">
<div style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; OVERFLOW: hidden; PADDING-TOP: -20px; HEIGHT: 216px">
<MARQUEE onmouseover="this.stop();" onmouseout="this.start();" scrollAmount="1" scrollDelay="1" direction="up">
<?php
$sql = "SELECT `subject`,`author`,`authorid`,`tid`,`fid` FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
$row=mysql_fetch_array($result);
/* 在 HTML 中打印结果 */
$number = 9;
while($row=mysql_fetch_array($result)) 
{if($row['fid'] >=45&&$row['fid'] <=74&&$number !=0){?>
<tr>
<td><a href="forum/forum.php?mod=viewthread&tid=<?php echo $row['tid'];?>"target="_blank"><h4>
<?php echo mb_substr($row['subject'],0,11,'utf-8');$number--;?></h4></a></td>
</tr><br>
<?php
}}mysql_free_result($result);?>
</MARQUEE>
</div>
</td>
            	 </aside>
        		<aside class="narrowcolumn3_1"> 
                    <article class="widecolumn3">
                 <div class="container_space"></div> 
                    </article><br/>
                <div class="container3"><h2>健康资讯</h2></div>
                        <div class="subContainer eheight  subContainerpading clearfix">
                        <table border="0" width="245" cellspacing="1" align="left">
                        <br>
<?php
$sql = "SELECT `subject`,`fid`,`tid` FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 13;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] >=45&&$row['fid'] <=50&&$number != 0)
{?>
<a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo '　• ',mb_substr($row['subject'],0,11,'utf-8');$number--;?></h3></a>
<?php
}}mysql_free_result($result);
?>
</table>
                        </div> 
                        </aside>
                        
        		<aside class="narrowcolumn3_1"> 
                    <article class="widecolumn3">
                    </article><br/>
                <div class="container33"></div>
                        <div class="subContainer eheight  subContainerpading clearfix">
                        <table border="0" width="245" cellspacing="1" align="left">
                        <br>
<?php
$sql = "SELECT `subject`,`fid`,`tid` FROM `ss_forum_thread` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 13;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] >=51&&$row['fid'] <=56&&$number != 0)
{?>
<a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h3>
<?php echo '　• ',mb_substr($row['subject'],0,11,'utf-8');$number--;?></h3></a>
<?php
}}mysql_free_result($result);
?>
</table>
                        </div>
                    </aside>
                <article class="widecolumn5"> <br/>
                    <article class="widecolumn7"><br/><br/><br/>
                 <div class="container_vertical"></div> 
                    </article>
                <div class="container3"><h2>素食瘦身</h2></div> 
<div class="subContainer eheight"> 
<div class="previewAreapadding">
<div id="previewArea" class="previewArea"></div>
<div class="d_avatar avatar48">
<li class="clearfix_w2">
<div class="content_w2">
<?php
$sql = "SELECT `subject`, `message`, `first` ,`fid` ,`tid`FROM `ss_forum_post` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 2;
while ($row=mysql_fetch_array($result)) 
{
 if ($row['fid'] ==100&&$row['first'] !=0)
$mes = $row['message'];
if ($row['fid'] >=57&&$row['fid'] <=68&&$number != 0&&$row['first'] !=0)
{echo str_replace("[/img]"," />",str_replace("[img]","<img class='venuelist-front_w2' width='100' height='100'src=",$mes));?>
<p class="recommend-text_w2">
<a href="content.php?tid=<?php echo $row['tid'];?>"target="_blank"><h1>
<?php 
echo mb_substr($row['subject'],0,16,'utf-8');$number--;?></h1></a><h4>
<?php echo mb_substr($row['message'],0,136,'utf-8');?></h4></p>
<?php
}}mysql_free_result($result);
?>
</div></li></div></div></div></article>
                
        		<aside class="narrowcolumn3"> 
                    <article class="widecolumn3">
                 <div class="container_space"></div> 
                    </article><br/>
                <div class="container2"><h2>旅游摄影</h2></div>
                        <div class="subContainer eheight subContainerpading clearfix">
                        <table border="0" width="490" cellspacing="1" align="left">
<br/>
<?php
$sql = "SELECT `subject`, `message`, `first` ,`fid` ,`tid`FROM `ss_forum_post` order by tid desc";
$result = mysql_query($sql) or die("查询失败!");
/* 在 HTML 中打印结果 */
$number = 2;
while ($row=mysql_fetch_array($result)) 
{
if ($row['fid'] ==101&&$row['first'] !=0&&$number != 0)
{
$mes = $row['message'];
echo str_replace("[/img]"," />",str_replace("[img]","<img width='220' height='240'src=",$mes));$number--;echo "　";
}}mysql_free_result($result);
?>
</table>
</div>
                    </aside>
                <article class="widecolumn8"><br/>
                    <article class="widecolumn7">
                 <div class="container_vertical"></div> 
                    </article>
                <div class="container1_1"><h2>新友报道</h2></div>
                     <div class="subContainer eheight">
                     <table border="0" width="160" cellspacing="1" align="left">
<?php
$sql = "SELECT `username` ,`uid`  FROM `ss_ucenter_members` order by uid desc";
$result = mysql_query($sql) or die("查询失败!");
$number = 8;
while ($row=mysql_fetch_array($result)) 
{if ($number != 0){?>
 	<img width="30" height="30" src="forum/uc_server/avatar.php?uid=<?php echo $row['uid'];?>&size=middle"/>
    <a href="forum/?<?php echo $row['uid'];?>"target="_blank">
		<?php echo substr($row['username'],0,15); $number--;?></a><br>
<?php
}}
mysql_free_result($result);
?>
</table></div></article>
                <article class="widecolumn8"><br/>
                    <article class="widecolumn7">
                 <div class="container_vertical3"></div> 
                    </article>
                     <div class="subContainer eheight">
                    <div class="container1_2"><h2>　 排行榜</h2></div>
                     <table border="0" width="160" cellspacing="1" align="left">
<?php
$sql = "SELECT `username` ,`uid`,`credits`  FROM `ss_common_member` order by credits desc";
$result = mysql_query($sql) or die("查询失败!");
$number = 8;
while ($row=mysql_fetch_array($result)) 
{if ($number != 0){?>
 	<img width="30" height="30" src="forum/uc_server/avatar.php?uid=<?php echo $row['uid'];?>&size=middle"/>
    <a href="forum/?<?php echo $row['uid'];?>"target="_blank">
		<?php echo substr($row['username'],0,15); $number--;?></a><br>
<?php
}}
mysql_free_result($result);
?></table></div></article>
                <article class="widecolumn8"><br/>
                    <article class="widecolumn7">
                 <div class="container_vertical3"></div> 
                    </article>
<div class="container1_3"><h2>发帖狂人</h2></div>
                     <div class="subContainer eheight">
                     <table border="0" width="160" cellspacing="1" align="left">
<?php
$sql_ = "SELECT `username` ,`uid`  FROM `ss_ucenter_members`";
$result_ = mysql_query($sql_) or die("查询失败!");
$sql = "SELECT `uid`,`posts`  FROM `ss_common_member_count` order by posts desc";
$result = mysql_query($sql) or die("查询失败!");
$number = 8;
while ($row_=mysql_fetch_array($result_))
{ $row=mysql_fetch_array($result);
	if ($number != 0&&$row['uid'] == $row_['uid']){?>
 	<img width="30" height="30" src="forum/uc_server/avatar.php?uid=<?php echo $row['uid'];?>&size=middle"/>
    <a href="forum/?<?php echo $row['uid'];?>"target="_blank">
		<?php echo substr($row_['username'],0,15); $number--;?></a><br>
<?php
}}
mysql_free_result($result);
mysql_free_result($result_);
?>
</table>
                    </div>
                </article>
                <article class="widecolumn3">
                 <div class="container_space"></div>
                 <a href="phone.php"><div class="phone"></div></a>
                 </article>
        </section>
        
</div>
</div>
</body>
<script src="js/global.js"></script>
<script src="js/IEffembedfix.jQuery.js"></script> 
<script src="js/slider.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/lightbox.js"></script>
</html>
<!--iframe src="http://app1.i.maxthon.cn/" frameborder="0" height="1640" marginheight="0" marginwidth="0" scrolling="no" width="100%"></iframe-->