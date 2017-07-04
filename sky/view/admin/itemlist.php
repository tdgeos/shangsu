<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('admin/header');
?>
			
<div class="main_main">
	<ul class="listTitle">
		<li class="itemContent listFirstItem">数据内容</li>
		<li class="itemDate">时间</li>
		<li class="itemAuthor">发布者</li>
		<li class="itemCtrl">操作</li>
	</ul>
	<?php 
	
	if( is_array( $this->view->items ) &&  sizeof( $this->view->items ) > 0 )
	{ 
	foreach ( $this->view->items as $value )
	{
	?>
	<ul class="listContent">
		<li class="itemContent listFirstItem"><a href="<?php echo $this->config['flash']['skyUrl'],'/?index-index/itemId-',$value['itemid'];?>" target="_blank" ><?php echo $value['content'];?></a></li>
		<li class="itemDate"><a href="javascript:void(0);"><?php echo $this->dateFormat( $value['dateline'], 'date' );?></a></li>
		<li class="itemAuthor"><a href="<?php echo $this->config['flash']['spaceUrl'],$value['uid'];?>" target="_blank" ><?php echo $value['account'];?></a></li>
		<li class="itemCtrl">
			<a class="delItemForJs" href="javascript:void(0);">删除</a>
			<span class="hiddenContent"><?php echo $value['itemid'];?></span>
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
<script type="text/javascript" src="./view/javascripts/pagebind/admin.itemlist.js"></script>
<?php
$this->template('admin/footer');
?>