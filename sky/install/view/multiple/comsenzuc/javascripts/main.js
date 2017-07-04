/**
 * @purpose UCENTER配置
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

	var posting = false;
	
	//数据库配置信息提交
	$('#ucConfigSubmit').click( function(){

		var _ucUrl = $('#ucUrl').cempty();
		var _ucPassword  = $('#ucPassword').cempty();

		if(  _ucUrl == '' )
		{
			alert( '请输入Ucenter地址' );
			return false;
		}
		
		if(  _ucPassword == '' )
		{
			alert( '请输入Ucenter密码' );
			return false;
		}

		if( posting == true )
		return false;
		
		posting = true;
		
		$("#multipleConfigForm").submit();
		var _target = this;
		$(_target).next().text( '提交请求中,请稍候...' );

		
	});
	
});