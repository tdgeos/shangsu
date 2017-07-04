<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>
			
<div class="main_main">

	
	<form action="./index.php?install-multipleSave" method="post" id="multipleConfigForm" >
	<!-- 配置  -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab">
				<a href="javascript:void(0);">UCenter连接<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="commonConfigValue">
		
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
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="连接Ucenter" id="ucConfigSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>
	</div>
	<!-- 配置 结束 -->
	</form>
	
</div>
<script type="text/javascript" src="./view/multiple/comsenzuc/javascripts/main.js"></script>
<?php
$this->template('footer');
?>