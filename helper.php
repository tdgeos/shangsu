<?php
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
<link href="css/allhelper.css" rel="stylesheet" />
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
<li class="frest"><a href="helper.php?i=0" class="active">生活助手</a>
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
<h6><div class="container_helper"></div></h6> 
 <div class="subContainerpading clearfix"> 
 <div class="d_avatar avatar48">
 <div class="slide">
<nav2> 
<ul><ul> 
<li><a href="helper/everday.php">日 常 生 活</a></li>
<li><a href="helper/recreation.php">休 闲 娱 乐</a></li>
<li><a href="helper/luck.php">星 座 运 程</a></li>
<li><a href="helper/net.php">上 网 工 具</a></li>
<li><a href="helper/shop.php">购 物 理 财</a></li>
<li><a href="helper/study.php">在 线 学 习</a></li>
</ul></ul>
 </nav2>
 </div>
 </div>
 </div> 
 <div class="container_top_C">
<div class="subContainer eheight">
 <ul>
 <td vAlign=top align=left width="165">

<div style="PADDING-RIGHT: 10px; PADDING-LEFT: 0px; PADDING-BOTTOM: 5px; OVERFLOW: hidden; PADDING-TOP: 20px; HEIGHT: 300px">

<MARQUEE onmouseover=this.stop(); onmouseout=this.start(); scrollAmount=1 scrollDelay=1 direction=up>
<?php
$sql = "SELECT `username` ,`uid`FROM `ss_ucenter_members` order by uid desc";
$result = mysql_query($sql) or die("查询失败!");
$number = 9;
while ($row=mysql_fetch_array($result)) 
{if ($number != 0){?>
<tr>
 <td><a href="forum/?<?php echo $row['uid'];?>"target="_blank"><h5>
<?php echo $row['username']; $number--;?></h5></a></td>
</tr>
<?php }}
mysql_free_result($result);
?>
</MARQUEE>

</div>
</td>
</ul>
</div> 
</div> 
</aside>
<article class="widecolumn6">
<h3><div class="container_helper_everday">
<a2><a href="helper/everday.php">更多</a></a2></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix">
<div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="dayli">
<li class="o-item-con" tool-id="tianqi" toolkit-id="dayli">
<a target="_blank" href="http://www.weather.com.cn/static/html/weather.shtml" class="o-item-link-con">
<span class="item-icon-wraper">
 <span class="single-round"></span>
 <span class="item-icon" style="background:url(images/tool/tianqi.jpg) no-repeat 0 0;">
 </span>
</span>
<span class="des-content">
<span class="k title-hover">天气预报</span>
<span class="subtitle">专业天气预报，覆盖全国</span></span></a></li>

<li class="o-item-con" tool-id="wannianli" toolkit-id="dayli">
<a target="_blank" href="http://app.baidu.com/saturdaycalendar" class="o-item-link-con"><span class="item-icon-wraper">
<span class="single-round"></span>
<span class="item-icon" style="background:url(images/tool/wannianli.jpg) no-repeat 0 0;"></span></span>
<span class="des-content">
<span class="k title-hover">万年历</span>
<span class="subtitle">阴阳历、节假日、黄道吉日</span></span></a></li>
</ul>
</div>
</div>
 </div>
<h3><div class="container_helper_recreation">
<a href="helper/recreation.php">更多</a></div></h3> 
 <div class="subContainer eheight2 subContainerpading clearfix">
<div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="amuse">
<li class="o-item-con" tool-id="gexingwangming" toolkit-id="amuse"><a target="_blank" href="http://www.qqgexing.com/wangming/" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/gexingwangming.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">个性网名</span><span class="subtitle">个性，另类的各类网名</span></span></a></li><li class="o-item-con" tool-id="gexingqianming" toolkit-id="amuse"><a target="_blank" href="http://www.qqgexing.com/qianming/" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/gexingqianming.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">QQ个性签名</span><span class="subtitle">最给力，最流行的个性签名</span></span></a></li></ul>
</div>
</div>

 </div>
 
<h3><div class="container_helper_luck">
<a2><a href="helper/luck.php">更多</a></a2></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix">
<div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="trans">
<li class="o-item-con" tool-id="zhougongjiemeng" toolkit-id="trans"><a target="_blank" href="http://www.51jiemeng.com/" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/zhougongjiemeng.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">周公解梦</span><span class="subtitle">帮您洞悉梦的奥秘</span></span></a></li><li class="o-item-con" tool-id="xingzuoyunshi" toolkit-id="trans"><a target="_blank" href="http://www.hao123.com/xingzuonew.html" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/xingzuoyunshi3.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">星座运势</span><span class="subtitle">十二星座每日运势分析</span></span></a></li></ul>
</div>
</div>
 </div>
<h3><div class="container_helper_net">
<a href="helper/net.php">更多</a></div></h3> 
 <div class="subContainer eheight2 subContainerpading clearfix">
<div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="inter">
<li class="o-item-con" tool-id="wangsuceshi" toolkit-id="inter"><a target="_blank" href="http://app.baidu.com/ada_nettest" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/adawangshuceshi.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">网速测试</span><span class="subtitle">最权威最准确的网速测试</span></span></a></li><li class="o-item-con" tool-id="mianfeishadu" toolkit-id="inter"><a target="_blank" href="http://app.baidu.com/kis_duba/index.html" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/mianfeishadu.gif) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">金山在线杀毒</span><span class="subtitle">查杀木马病毒，全面体检</span></span></a></li></ul>
</div>
</div>

 </div>
<h3><div class="container_helper_shop">
<a2><a href="helper/shop.php">更多</a></a2></div></h3>
 <div class="subContainer eheight2 subContainerpading clearfix">
 <div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="shop">
<li class="o-item-con" tool-id="gupiao" toolkit-id="shop"><a target="_blank" href="http://quote.eastmoney.com/center/" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/gupiao.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">股票行情</span><span class="subtitle">中国最权威的股市行情资讯</span></span></a></li><li class="o-item-con" tool-id="waihui" toolkit-id="shop"><a target="_blank" href="http://www.boc.cn/sourcedb/whpj/" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/waihui.gif) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">外汇牌价</span><span class="subtitle">中国最权威外汇牌价信息</span></span></a></li></ul>
</div>
</div>

 </div>
<h3><div class="container_helper_study">
<a href="helper/study.php">更多</a></div></h3> 
 <div class="subContainer eheight2 subContainerpading clearfix">
<div class="item-container">
<div class="hd clearfix">
</div>
<div class="bd">
<ul class="clearfix" id="study">
<li class="o-item-con" tool-id="fanyi" toolkit-id="study"><a target="_blank" href="http://www.hao123.com/ss/fy.htm" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/fanyi.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">在线翻译</span><span class="subtitle">谷歌在线翻译</span></span></a></li><li class="o-item-con" tool-id="naoliduanlian" toolkit-id="study"><a target="_blank" href="http://app.baidu.com/app/enter?appid=105986" class="o-item-link-con"><span class="item-icon-wraper"><span class="single-round"></span><span class="item-icon" style="background:url(images/tool/naolixunlian.jpg) no-repeat 0 0;"></span></span><span class="des-content"><span class="k title-hover">脑力训练</span><span class="subtitle">简单便捷的脑年龄测试</span></span></a></li></ul>
</div>
</div>
</div>
</article>
</section>
</div>
</div>
</body>
</html>