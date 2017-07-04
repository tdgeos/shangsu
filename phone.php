 <!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="Powerless" /> 
<meta name="Copyright" content="北京思行伟业数码科技有限公司" /> 
<meta name="description" content="尚素网是北京思行伟业数码科技有限公司推出的一款公益型素食网站" /> 
<meta name="keywords" content="尚素网、素食" />
<title>尚素网|手机客户端|素食者的首选网站</title> 
<link rel="shortcut icon" href="images/ym/logo_s.gif" type="image/x-icon" />
<link href="css/allstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="css/phone_tag.css"/>
<link rel="stylesheet" type="text/css" media="all" href="css/phone.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/CreateHTML5Elements.js"></script>
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
<li><a href="sky/"target="_blank">尚素天空</a></li>
<li class="frest"><a href="phone.php"class="active">手机客户端</a></li>
</ul> 
 </nav>
                 <section id="content" class="clearfix">
                 <article class="widecolumn3"> 
                 <div class="container"> 
                     <div class="subContainer eheight2 subContainerpading clearfix">
                        <script> 
$(function(){
	$(".mp_nav .li1 a").click(function(){
		$('.mp_div').hide();
		$('.mp_iphone').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
	$(".mp_nav .li2 a").click(function(){
		$('.mp_div').hide();
		$('.mp_ipad').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
	$(".mp_nav .li3 a").click(function(){
		$('.mp_div').hide();
		$('.mp_m9').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
	$(".mp_nav .li4 a").click(function(){
		$('.mp_div').hide();
		$('.mp_pad').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
	$(".mp_nav .li5 a").click(function(){
		$('.mp_div').hide();
		$('.mp_m8').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
	$(".mp_nav .li6 a").click(function(){
		$('.mp_div').hide();
		$('.mp_mphone').show();
		$(".mp_nav ul li a").removeClass('current');
		$(this).addClass('current');
	});
});
</script>
  <div class="mp_wrap"> 
	<div class="mp_nav"> 
		<ul class="clearfix"> 
			<li class="li1"><a href="javascript:void(0)"  class="current"></a></li>
			<li class="li2"><a href="javascript:void(0)"></a></li>
			<li class="li3"><a href="javascript:void(0)"></a></li>
			<li class="li4" style="display:none;"><a href="javascript:void(0)"></a></li>
			<li class="li5"><a href="javascript:void(0)" ></a></li>
			<li class="li6"><a href="javascript:void(0)" ></a></li>
		</ul> 
	</div> 
	<div class="mp_ipad mp_div" style="display:none;"> 
		<div class="links"> 
			<a target="_blank" href="#"></a> 
		</div>	
	</div> 
	<div class="mp_m9 mp_div" style="display:none;"> 
		<div class="links"> 
			<a target="_blank" href="#"></a> 
		</div>	
	</div> 
	<div class="mp_m8 mp_div" style="display:none;"> 
		<div class="links"> 
			<a target="_blank" href="#"></a> 
		</div>	
	</div> 
	<div class="mp_iphone mp_div"> 
	
		 <div class="links"> 
			<a target="_blank" href="#"></a> 
		</div>	
	</div> 
	<div class="mp_pad" style="display:none;"> 
		<div class="links"> 
			<a href=""></a> 
			<a href=""></a> 
		</div>	
	</div> 
	<div class="mp_mphone mp_div" style="display:none;"> 
		<div class="mp_iframe"> 
		 <iframe width="248" height="409" frameborder="0" class="mobile-sim" src="http://www.tdgeos.com/shangsu/forum/misc.php?mod=mobile&amp"></iframe> 
	    </div> 
	</div> 
</div> 
	 				</div>
      			</div>
                </article>
          		</section>
</div>
</div>
</body>
</html>