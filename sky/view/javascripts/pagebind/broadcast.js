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
	
	$('#addBroadcast').tabChange( '#addBroadcastValue', 'tabDown', 'tabUp' );
	$('#addBroadcastSubmit').click( function(){

		if( posting == true )
		return;
		
		var _content = $('[@name=content]').cempty();
		
		if(  _content == '' )
		{
			alert( '请输入广播文字,建议不要超过50个中文字符' );
			return false;
		}


		var _target = this;
		$(_target).next().text( '提交请求中,请稍候...' );
		
		posting = true;
		
		$("#addBroadcastForm").submit();
		
	});
	
	$('.delItemForJs').click(function(){
		
		var _target = this;
		
		if( confirm( '确定要删除该内容吗？' ) )
		{
			$.post(
			
				'./index.php?admin-delbroadcast/isAjax-1-bid-'+$(_target).next().text(),
				function( data ){

					var _result = $.getAjaxResult( data );
					
					if( _result[0] == true )
					{
						$(_target).parent().parent().remove();
					}
					else
					{
						alert( _result[1] );
					}
					
				}
			);
		}
		
	});

	$('.updateSortForJs').click(function(){
		
		var _target = this;
		
		$.post(
			
			'./index.php?admin-updateBroadcastSort/isAjax-1-bid-'+$(_target).next().text()+'-sortid-'+$(_target).prev().val(),
			function( data ){

				var _result = $.getAjaxResult( data );
				
				if( _result[0] == true )
				{
					location.reload();
				}
				else
				{
					alert( _result[1] );
				}
				
			}
		);
		
	});
});
