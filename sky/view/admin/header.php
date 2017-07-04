<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $this->browserTitle;?> - Powered By Flexsns</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Flexsns-Sky后台管理 - Powered By Flexsns" />
<meta name="generator" content=" Flexsns.com" />
<meta name="author" content="Flexsns Tortoise" />
<meta name="copyright" content="Powered by Flexsns.com" />

<link href="./view/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./view/javascripts/libs/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="./view/javascripts/libs/global.js"></script>
</head>
<body>
	
	<div class="header">
		<div class="header_main">
			<div class="logo">
				<a href="http://www.flexsns.com" ></a>
			</div>
			<div class="skyVersion">
			<span id="versionInfoLoading">
			正在获取Flexsns-sky的更新信息...
			</span>
			<span id="versionInfo">
			</span>
			<script type="text/javascript" src="http://www.flexsns.com/remote.php?project=sky&charset=<?php echo $this->config['db']['charset'];?>&url=<?php echo base64_encode($this->config['flash']['websiteUrl']); ?>&rk=<?php echo $this->randomKey(10); ?>" defer ></script>
			<!--注意，此处脚本是flexsns.com发布更新，使用的脚本,您可以删除，但作为对flexsns的一种支持,不建议删除-->
			<br/>
			<span>您安装的版本:<?php echo $this->view->version; ?></span>
			</div>
		</div>
	</div>
	<div class="main_wrap">
		<div class="main">
		<?php if( $this->view->isAdmin ){?>
			<div class="menu">
				<ul>
					<li><a href="?admin-config" <?php if( $this->view->ctrlAction == 'config' || $this->view->ctrlAction == 'index' ){?>class="hover"<?php }?> >修改配置</a></li>
					<li><a href="?admin-itemList" <?php if( $this->view->ctrlAction == 'itemlist' ){?>class="hover"<?php }?> >管理SKY数据</a></li>
					<li><a href="?admin-broadcast" <?php if( $this->view->ctrlAction == 'broadcast' ){?>class="hover"<?php }?> >管理SKY广播</a></li>
					<li><a href="?admin-joinflexsns" <?php if( $this->view->ctrlAction == 'joinflexsns' ){?>class="hover"<?php }?> style="color:red!important;" >支持SKY开发</a></li>
					<li><a href="?index-index" target="_blank" >访问天空</a></li>
					<li><a href="?admin-logout" >退出系统</a></li>
				</ul>
			</div>
		<?php }?>