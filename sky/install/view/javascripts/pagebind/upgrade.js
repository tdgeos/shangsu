/**
 * @purpose 升级
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.6.11
 * @modified 2009.6.11
 * 
 */
$(document).ready(function(){

	var posting = false;
	
	$('#upgradeSubmit').click( function(){

		if( posting == true )
		return false;
		
		var _dbUser = $('#dbUser').cempty();
		var _dbPassword  = $('#dbPassword').cempty();

		if(  _dbUser == '' )
		{
			alert( '数据库用户名' );
			return false;
		}
		
		
		if( confirm( '注意\r\n\r\n升级前请备份好您的数据库以免发生意外丢失数据，Flexsns不对使用(升级)本软件可能存在的不良影响或造成的任何后果负责。' ) )
		{

			if( posting == true )
			return false;
			
			posting = true;
			
			$("#upgradeForm").submit();
			var _target = this;
			$(_target).next().text( '提交请求中,请稍候...' );

		}	
		
	});

});