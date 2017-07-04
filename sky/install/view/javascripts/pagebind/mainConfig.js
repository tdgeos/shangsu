/**
 * @purpose 安装第一步主要配置
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.5.2
 * @modified 2009.6.11
 * 
 */
$(document).ready(function(){

	var posting = false;
	//数据库配置信息提交
	$('#mainConfigSubmit').click( function(){

		if( posting == true )
		return false;
		
		var _admin = $('#admin').cempty();
		var _adminPassword  = $('#adminPassword').cempty();

		if(  _admin == '' )
		{
			alert( '请输入管理员用户名' );
			return false;
		}
		
		if(  _adminPassword.length < 6 )
		{
			alert( '请输入6位以上的管理员密码' );
			return false;
		}
		
		if( _adminPassword !== $('#adminPasswordRe').cempty() )
		{
			alert( '两次输入的管理员密码不一致,请检查' );
			return false;
		}
		
		var _doNotRewriteDB = $('#doNotRewriteDB').attr( 'checked' ) ? 1 : 0;
		var _dbHost = $('#dbHost').cempty();
		var _dbUser  = $('#dbUser').cempty();
		var _dbPassword  = $('#dbPassword').cempty();
		var _dbName  = $('#dbName').cempty();
		var _dbTablePrefix  = $('#dbTablePrefix').cempty();

		if( _dbHost == '' )
		{
			alert( '请输入数据库主机地址' );
			return false;
		}

		if( _dbUser == '' )
		{
			alert( '请输入数据库用户名' );
			return false;
		}

		if( _dbName == '' )
		{
			alert( '请输入数据库名' );
			return false;
		}

		if( _dbTablePrefix == '' )
		{
			alert( '请指定数据表前缀' );
			return false;
		}
		
		if( confirm( '注意\r\n\r\n安装任何第三方应用都存在一定的风险，在安装前您最好备份您的网站数据，Flexsns不对使用(安装)本软件可能存在的不良影响或造成的任何后果负责。' ) )
		{

			if( posting == true )
			return false;
			
			posting = true;
			
			$("#installForm").submit();
			var _target = this;
			$(_target).next().text( '提交请求中,请稍候...' );

		}	
		
	});

});