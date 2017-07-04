<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>
			
<div class="main_main">
	
	<?php if( $this->view->upgrading == false ){?>
	<form action="./index.php?upgrade-upgrade" method="post" id="upgradeForm" >
	<!-- 安装配置更新 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">数据库连接<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库用户名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="root" class="inputText" id="dbUser" name="dbUser" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="dbPassword" name="dbPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">UCenter地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" class="inputText" id="ucUrl" name="ucUrl" />
				</li>
				<li class="listFormInfo">
				即登录到Ucenter用户管理中心,使用的url,末尾不要加"/".
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">UCenter密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="ucPassword" name="ucPassword" />
				</li>
				<li class="listFormInfo">
				即登录Ucenter时所用的密码
				</li>
			</ul>
			
		</div>	
		
	</div>
	
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);" class="warning">注意<span class="infoText"></span></a>
			</li>
		</ul>
	
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormCtrl">
					此处的数据库用户名和密码仅用来判断升级权限,程序会根据您原先的配置文件升级
				</li>
			</ul>
			
		</div>
		
	</div>

	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">开始升级<span class="infoText"></span></a>
			</li>
		</ul>
	
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="开始升级" id="upgradeSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
		
	</div>
	<?php }else{?>
	
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);" class="warning">转换数据<span class="infoText"></span></a>
			</li>
		</ul>
	
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormCtrl" id="runInfo">
					转换数据中...
				</li>
			</ul>
			
		</div>
		
	</div>
	
	<?php }?>
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/upgrade.js"></script>
<?php
$this->template('footer');
?>