<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>
			
<div class="main_main">

	<div class="listFormBlock">
	
		<ul class="changeTab completeSubject">
			<li>
				<img src="./view/images/check_right.gif" alt="成功ICON" align="middle" />是否被繁琐的安装过程困扰着？不必忧虑，因为安装结束了。
			</li>
		</ul>
		
	</div>
	
	<div class="listFormBlock">
	
		<ul class="changeTab">
			<li class="tab" >
				<a href="../admincp.php">访问后台<span class="infoText">请务必记住此地址"/admincp.php",这是后台的管理地址</span></a>
			</li>
		</ul>
		
	</div>
	<div class="listFormBlock">
	
		<ul class="changeTab">
			<li class="tab" >
				<a href="../?index-index">访问天空<span class="infoText"></span></a>
			</li>
		</ul>
		
	</div>
	
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/mainConfig.js"></script>
<?php
$this->template('footer');
?>