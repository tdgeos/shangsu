<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('admin/header');
?>
			
<div class="main_main">
	
	<!-- 添加 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab">
				<a href="javascript:void(0);">将您的网站加入到Flexsns<span class="infoText">您的网址将会显示在Flexsns精心设计的站点介绍系统上,这将可能给您的网站带来更多的用户。</span></a>
			</li>
		</ul>
		<div class="listFormContainer" >
		
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">站长邮箱</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" id="webmasterEmail" />
				</li>
				<li class="listFormInfo">
				商家可能会希望和您的站点合作，这个邮箱将帮助他找到您，您不必担心有垃圾邮件。
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">网站名字</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" id="websiteName" />
				</li>
				<li class="listFormInfo">
				请输入网站的中文或英文名
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">网站地址</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="<?php echo $this->config['flash']['websiteUrl'];?>" id="website" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">网站类型</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="" id="websiteType" />
				</li>
				<li class="listFormInfo">
				潜在的用户将可能通过该标签找到您的网站,Flexsns会根据该值对网站进行分类
				</li>
			</ul>
			
			<ul class="listForm" style="height:120px!important;">
				<li class="listFormName" style="height:120px!important;">
					<a href="javascript:void(0);">网站介绍</a>
				</li>
				<li class="listFormValue" style="height:120px!important;">
					<textarea id="intro" style="height:110px;width:700px;"></textarea>
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="提交网站" id="joinFlexsnsSubmit" />
					<span class="posting"></span>
				</li>
				<li class="listFormInfo">
				通过提交网站，您默默的支持了SKY的开发，我们将继续免费发布新功能。
				</li>
			</ul>
		</div>
	</div>
	<!-- 添加 结束 -->
	
	
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/joinflexsns.js"></script>
<?php
$this->template('admin/footer');
?>