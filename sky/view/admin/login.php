<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('admin/header');
?>
			
<div class="main_main">

	<form action="./index.php?admin-index" method="post" id="loginForm" >
	<!-- 管理员配置 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" >
				<a href="javascript:void(0);">管理员登录<span class="infoText"></span></a>
			</li>
		</ul>
		<div class="listFormContainer">
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">管理员</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" class="inputText" id="admin" name="admin" />
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
				<li class="listFormCtrl">
					<input class="submit" type="button" value="登录系统" id="loginSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
			
		</div>	
		
	</div>
	</form>
	
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/admin.js"></script>
<?php
$this->template('admin/footer');
?>