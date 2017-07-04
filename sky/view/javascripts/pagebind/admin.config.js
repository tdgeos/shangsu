/**
 * @purpose 后台参数配置页面操作绑定
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.4.27
 * @modified 2009.5.1
 * 
 */
$(document).ready(function(){

	
	$('#adminpwConfig').tabChange( '#adminpwConfigValue', 'tabDown', 'tabUp' );
	$('#soundConfig').tabChange( '#soundConfigValue', 'tabDown', 'tabUp' );
	$('#skinConfig').tabChange( '#skinConfigValue', 'tabDown', 'tabUp' );
	$('#linkConfig').tabChange( '#linkConfigValue', 'tabDown', 'tabUp' );
	$('#importantConfig').tabChange( '#importantConfigValue', 'tabDown', 'tabUp' );
	$('#dbConfig').tabChange( '#dbConfigValue', 'tabDown', 'tabUp' );
	$('#cookieSessionConfig').tabChange( '#cookieSessionConfigValue', 'tabDown', 'tabUp' );
	$('#skyPostConfig').tabChange( '#skyPostConfigValue', 'tabDown', 'tabUp' );
	$('#commonConfig').tabChange( '#commonConfigValue', 'tabDown', 'tabUp' );
	$('#feedConfig').tabChange( '#feedConfigValue', 'tabDown', 'tabUp' );
	 
	var posting = false;

	//管理员密码提交
	$('#adminpwConfigSubmit').click( function(){
		postForm( "#adminpwConfigForm", this );
	});

	//重要配置提交
	$('#importantConfigSubmit').click( function(){
		postForm( "#importantConfigForm", this );
	});

	//强制页面更新
	$('#setHTMLExpires').click( function(){
		window.location.href = './index.php?admin-saveConfig/setHTMLExpires-1';
	});
	
	//音乐配置信息提交
	$('#soundConfigSubmit').click( function(){
		postForm( "#soundConfigForm", this );
	});
	
	//皮肤配置信息提交
	$('#skinConfigSubmit').click( function(){
		postForm( "#skinConfigForm", this );
	});
	

	//数据推送配置信息提交
	$('#feedConfigSubmit').click( function(){
		postForm( "#feedConfigForm", this );
	});
	
	//综合配置信息提交
	$('#commonConfigSubmit').click( function(){
		postForm( "#commonConfigForm", this );
	});
	
	//链接信息提交
	$('#linkConfigSubmit').click( function(){
		postForm( "#linkConfigForm", this );
	});
	
	//数据库配置信息提交
	$('#dbConfigSubmit').click( function(){
		postForm( "#dbConfigForm", this );
	});
	
	//cookie-session配置信息提交
	$('#cookieSessionConfigSubmit').click( function(){
		postForm( "#cookieSessionConfigForm", this );
	});
	
	//sky数据发送相关配置信息提交
	$('#skyPostConfigSubmit').click( function(){
		postForm( "#skyPostConfigForm", this );
	});
	
	function postForm( _form, _target )
	{
		if( posting == true )
		return false;
		
		posting = true;
		
		$(_target).next().text( '提交请求中,请稍候...' );

		$(_form).submit();
	}
		
});