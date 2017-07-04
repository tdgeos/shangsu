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

	var posting = false;
	
	$('#joinFlexsnsSubmit').click( function(){

		if( posting == true )
		return;
		

		var _target = this;

		var _webmasterEmail = $('#webmasterEmail').cempty();
		var _websiteName = $('#websiteName').cempty();
		var _website = $('#website').cempty();
		var _charset = $('#charset').cempty();
		var _websiteType = $('#websiteType').cempty();
		var _intro = $('#intro').cempty();
		
		if(  _webmasterEmail == '' )
		{
			alert( '请输入站长联系邮箱' );
			return false;
		}

		if(  _websiteName == '' )
		{
			alert( '请输入网站中文或英文名' );
			return false;
		}
		
		if(  _website == '' )
		{
			alert( '请输入网地址' );
			return false;
		}
		
		if(  _websiteType == '' )
		{
			alert( '请输入网站类型,潜在的用户可能对您的站点产生兴趣' );
			return false;
		}
		
		if(  _intro == '' )
		{
			alert( '请输入网站的简短介绍,潜在的用户可能对您的站点产生兴趣' );
			return false;
		}

		$(_target).next().text( '提交请求中,请稍候...' );
		posting = true;
		 
		$.post(
			
			'./index.php?admin-joinflexsnsjoin/isAjax-1',
			{
				webmasterEmail:_webmasterEmail,
				websiteName:_websiteName,
				website:_website, 
				charset:_charset, 
				websiteType:_websiteType,
				intro:_intro
			},
			function( data )
			{
				posting = false;
				 
				$(_target).next().text( '' );
				var _result = $.getAjaxResult( data );
				
				alert( _result[1] );
				if( _result[0] == true )
				{
					location.reload();
					
					return true;
				}
				
				return false;
			}
				
		);
		
	});
	
});
