/**
 * @purpose 后台管理
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.5.3
 * @modified 2009.5.3
 * 
 */
$(document).ready(function(){
	
	var posting =false;

	$('#loginSubmit').click( function(){
		
		if( posting == true )
		return;

		var _admin = $('#admin').cempty();
		var _adminPassword  = $('#adminPassword').cempty();

		if(  _admin == '' )
		{
			alert( '请输入管理员用户名' );
			return false;
		}
		
		if(  _adminPassword.length < 6 )
		{
			alert( '请输入6位以上的密码' );
			return false;
		}
			
		var _target = this;
		$(_target).next().text( '提交请求中,请稍候...' );
		
		
		posting = true;
		
		$("#loginForm").submit();
		
	});
	
});
