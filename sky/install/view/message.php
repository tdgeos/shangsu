<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>
			
<div class="main_main">

	<div class="messageWrap">
		<ul class="messageMain">
			<li class="subject" >
				<?php if( $this->view->message['status'] == 'success' ){?>
				<img src="./view/images/check_right.gif" alt="成功ICON" align="middle" />
				<?php }else{?>
				<img src="./view/images/check_error.gif" alt="失败ICON" align="middle" />
				<?php }?>
				<?php echo $this->view->message['subject'];?>
			</li>
			
			<?php if( is_array( $this->view->message['messages'] ) ){ foreach ( $this->view->message['messages'] as $value ){?>
			<li class="message" >
				<?php echo $value;?>
			</li>
			<?php }}elseif( is_string( $this->view->message['messages'] ) ){?>
			<li class="message" >
				<?php echo $this->view->message['messages'];?>
			</li>
			<?php }if( !empty( $this->view->message['link'] ) ) {?>
			<li class="link" >
				<a href="<?php echo $this->view->message['link']['url'];?>" ><?php echo $this->view->message['link']['str'];?></a>
			</li>
			<?php }?>
		</ul>
	</div>
	
</div>

<script type="text/javascript" src="./view/javascripts/pagebind/admin.js"></script>
<?php
$this->template('footer');
?>