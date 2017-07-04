/**
 * @purpose 公用函数
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
jQuery.successMarker = 'success';
jQuery.failedMarker = 'failed';
jQuery.markerLen = 20;

jQuery.getAjaxResult = function( _str )
{
	_str = $.trim( _str );
	
	var result = new Array();
	
	var _markerLen = $.successMarker.length;
	
	if( _markerLen > $.markerLen )
	{
		alert( '系统错误:标识码长度超过限制' );
		
		result[0] = false;
		result[1] = '系统错误:标识码长度超过限制';
		
		return result;
	}
	
	var _successMarker = $.successMarker;
	for( var _i = _markerLen; _i < $.markerLen; _i++ )
	{
		_successMarker += '0';
	}
	
	if( _str.substr( 0, $.markerLen ) == _successMarker )
	{
		result[0] = true;
	}
	else
	{
		result[0] = false;
	}
	
	result[1] = _str.substr( $.markerLen, _str.length );
	return result;
}

jQuery.fn.tabChange = function( _shObj, _downClass, _upClass ){
	
	_target = this;
	
	_target.click( function(){

		if( $(_shObj).css( 'display' ) == 'block' )
		{
			$(_shObj).css( 'display', 'none' );
		}
		else
		{
			$(_shObj).css( 'display', '' );
		}
	})

}

jQuery.fn.cempty = function()
{
	var _val = $.trim( this.val() );
	
	if( _val == '' )
	return '';
	
	_val = _val.replace(/\+/g, "%2B");
	_val = _val.replace(/\&/g, "%26");
	
	return _val;
}