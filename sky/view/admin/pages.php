<ul class="listPage">
	<?php 
	foreach ( $this->view->pages as $value )
	{
	?>
	<li><a href="<?php echo $value['link'];?>"><?php echo $value['page'];?></a></li>
	<?php }?>
</ul>