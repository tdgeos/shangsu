<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Flexsns-Sky系统安装</title>
<link href="./view/style/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./view/javascripts/libs/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="./view/javascripts/libs/global.js"></script>
</head>
<body>
	
	<div class="header">
		<div class="header_main">
			<div class="logo">
				<a href="javascript:void(0);" ></a>
			</div>
			<div class="skyVersion">
			<span id="versionInfoLoading">
			正在获取flexsns-sky的更新信息...
			</span>
			<span id="versionInfo">
			</span>
			<script type="text/javascript" src="http://www.flexsns.com/remote.php?url=<?php echo base64_encode($this->config['flash']['websiteUrl']); ?>&rk=<?php echo $this->randomKey(10); ?>" defer="defer" ></script>
			<br/>
			<span>您正在安装的版本:<?php echo $this->view->version; ?></span>
			</div>
		</div>
	</div>
	<div class="main_wrap">
		<div class="main">
		<?php if(  $this->view->ctrlAction != 'complete' ){?>
			<div class="menu">
				<ul>
					<li><a href="./index.php?install-index" <?php if( $this->view->ctrlAction == 'config' || $this->view->ctrlAction == 'index'){ ?>class="hover"<?php }?> >1.关键配置</a></li>
					<li><a href="./index.php?install-multipleSetup" <?php if( $this->view->ctrlAction == 'multiplesetup' ){ ?>class="hover"<?php }?>  >2.同步主程序</a></li>
				</ul>
			</div>
		<?php }else{?>
			<div class="menu">
				<ul>
					<li><a href="javascript:void(0);" >安装成功</a></li>
					
				</ul>
			</div>
		<?php }?>