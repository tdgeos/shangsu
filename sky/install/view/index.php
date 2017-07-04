<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>
			
<div class="main_main">

	<div class="messageWrap">
		<ul class="messageMain">
			<li class="subject" >
				<img src="./view/images/check_right.gif" alt="成功ICON" align="middle" />请根据是否安装过sky做出选择
			</li>
			<li class="link" >
				<a href="./index.php?install-index" >全新安装</a>
			</li>
			<li class="link" >
				<a href="./index.php?upgrade-index" >升级程序</a>
			</li>
		</ul>
	</div>
	
</div>
<?php
$this->template('footer');
?>