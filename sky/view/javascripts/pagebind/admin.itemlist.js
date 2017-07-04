$(document).ready(function(){
	
	$('.delItemForJs').click(function(){
		
		var _target = this;
		
		if( confirm( '确定要删除该内容吗？' ) )
		{
			$.post(
			
				'./index.php?admin-delitem/isAjax-1-itemId-'+$(_target).next().text(),
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
	
});