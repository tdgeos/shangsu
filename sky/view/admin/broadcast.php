<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('admin/header');
?>
			
<div class="main_main">
	
	<form action="./index.php?admin-addBroadcast" method="post" id="addBroadcastForm" >
	<!-- 添加 -->
	<div class="listFormBlock">
		<ul class="changeTab">
			<li class="tab" id="addBroadcast" >
				<a href="javascript:void(0);">添加广播<span class="infoText">当前设定为显示前<?php echo $this->view->showNum;?>条,您可以在常用配置中修改此值</span></a>
			</li>
		</ul>
		<div class="listFormContainer" id="addBroadcastValue" >
		
			<ul class="listForm" style="height:120px!important;">
				<li class="listFormName" style="height:120px!important;">
					<a href="javascript:void(0);">广播内容</a>
				</li>
				<li class="listFormValue" style="height:120px!important;">
					<textarea name="content" style="height:110px;width:700px;"></textarea>
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">排序序号</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="0" name="sort" />
				</li>
				<li class="listFormInfo">
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormName">
					<a href="javascript:void(0);">广播链接</a>
				</li>
				<li class="listFormValue">
					<input type="text" value="#" name="gourl" />
				</li>
				<li class="listFormInfo">
				请填写http://开头的绝对链接, 留空或为#表示广播没有链接
				</li>
			</ul>
			
			<ul class="listForm">
				<li class="listFormCtrl">
					<input class="submit" type="button" value="添加" id="addBroadcastSubmit" />
					<span class="posting"></span>
				</li>
			</ul>
		</div>
	</div>
	<!-- 添加 结束 -->
	</form>
	
	<ul class="listTitle">
		<li class="itemContent listFirstItem" style="width:656px;">数据内容</li>
		<li class="itemCtrl">排序</li>
		<li class="itemCtrl">删除</li>
	</ul>
	<?php 
	
	if( is_array( $this->view->items ) &&  sizeof( $this->view->items ) > 0 )
	{ 
	foreach ( $this->view->items as $value )
	{
	?>
	<ul class="listContent">
		<li class="itemContent listFirstItem" style="width:656px;"><a href="javascript:void(0);"><?php echo $value['content'];?></a></li>
		<li class="itemCtrl">
			<input type="text" value="<?php echo $value['sortid'];?>" style="width:40px;" />
			<a class="updateSortForJs" href="javascript:void(0);">修改排序</a>
			<span class="hiddenContent"><?php echo $value['bid'];?></span>
		</li>
		<li class="itemCtrl">
			<a class="delItemForJs" href="javascript:void(0);">删除</a>
			<span class="hiddenContent"><?php echo $value['bid'];?></span>
		</li>
	</ul>
	<?php }}else{?>
	<ul class="listForm">
		<li class="listFormCtrl">
			暂无数据
		</li>
	</ul>
	<?php }?>
	<?php
	$this->template('admin/pages');
	?>
	
</div>
<script type="text/javascript" src="./view/javascripts/pagebind/broadcast.js"></script>
<?php
$this->template('admin/footer');
?>