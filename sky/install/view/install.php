<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('installheader');
?>
			
<div class="main_main">

	<form action="./index.php?install-saveConfig" method="post" id="installForm" >
	<!-- 安装配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">后台管理员<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">管理员</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="admin" class="inputText" id="admin" name="admin" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">管理员密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="adminPassword" name="adminPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">确认密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="adminPasswordRe" name="adminPasswordRe" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
		
		
		</div>	
		
	</div>
	
	<!-- 数据相关配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">数据相关配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);" class="warning">是否保留原来sky数据)</a>
				</li>
				<li class="listFormValue">
					<input type="checkbox" value="1" class="inputText" id="doNotRewriteDB" name="doNotRewriteDB" />
				</li>
				<li class="listFormInfo">
				如果您安装过sky了，不想清空数据，请勾上此选项（还是建议备份多一份）
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">时区设置</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="8" class="inputText" id="timezone" name="timezone" />
				</li>
				<li class="listFormInfo">
				当前服务器时间：<?php echo $this->view->date;?>,填入服务器与实际时间的小时差值
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库主机</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="localhost" class="inputText" id="dbHost" name="dbHost" />
				</li>
				<li class="listFormInfo">
				一般使用localhost即可
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">用户名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="root" class="inputText" id="dbUser" name="dbUser" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">密码</a>
				</li>
				<li class="listFormValue">
					<input type="password" value="" class="inputText" id="dbPassword" name="dbPassword" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">数据库名</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" class="inputText" id="dbName" name="dbName" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">表名前缀</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="sky_" class="inputText" id="dbTablePrefix" name="dbTablePrefix" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
		</div>
	</div>
	<!-- 数据库配置 结束 -->
	
	
	
	<!-- sky关键配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">sky关键配置<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">sky-URL地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->view->skyUrl;?>" class="inputText" id="skyUrl" name="skyUrl" />
				</li>
				<li class="listFormInfo">
				即访问sky根目录的url。末尾不要加'/'。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">个人空间地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="#" class="inputText" id="spaceUrl" name="spaceUrl" />
				</li>
				<li class="listFormInfo">
				如填入“space.php?uid=“,末尾uid留空即可,程序会处理Uid
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">新用户注册地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="#" class="inputText" id="regUrl" name="regUrl" />
				</li>
				<li class="listFormInfo">
				用户点击sky左侧面板的“注册”按钮,将跳转到此处设定的url。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">   
					<a href="javascript:void(0);">网站地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->view->hostUrl;?>" class="inputText" id="websiteUrl" name="websiteUrl" />
				</li>
				<li class="listFormInfo">
				方便用户返回网站首页
				</li>
			</ul>
			
		
		</div>
	</div>
	<!-- sky关键配置 结束 -->

	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">开始安装<span class="infoText"></span></a>
			</li>
		</ul>
	
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="开始安装" id="mainConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
		
	</div>
	
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/mainConfig.js"></script>
<?php
$this->template('footer');
?>