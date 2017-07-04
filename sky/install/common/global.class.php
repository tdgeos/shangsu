<?php

if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

/**
 * @purpose 公用函数
 * @author tortoise or sigong
 * @email chixiaosheng05@163.com
 * @QQ 255979
 * @link http://www.flexsns.com
 * 
 * @notice 
 * 
 * @createDate 2009.4.25
 * @modified 2009.4.25
 * 
 */

class Common_Global_Class
{
	var $_db;
	var $get;
	var $post;
	var $config;
	var $view;
	var $specialCharsTable;
	var $stripSpecialCharsTable;
	
	function Common_Global_Class()
	{
		global $get, $post, $viewObject;
		
		$this->get = $get;
		$this->post = $post;
		
		$this->view = $viewObject;
		
		$this->specialCharsTable =  get_html_translation_table( HTML_SPECIALCHARS, ENT_QUOTES );
		$this->stripSpecialCharsTable = array_flip( $this->specialCharsTable );
		$this->stripSpecialCharsTable['&#039;'] = "'";
		
		
	}
	
	function dbObj()
	{
		$className = $this->loadClass( 'Common_Mysql' );
		$db = new $className();
		
		return $db;
	}
	
	function db()
	{
		
		if( !$this->_db )
		{
			$className = $this->loadClass( 'Common_Mysql' );
			$this->_db = new $className();
			$this->_db->init( $this->config['db']['host'], $this->config['db']['user'], $this->config['db']['password'], $this->config['db']['dbName'], $this->config['db']['charset'] );
		}
			
		return $this->_db;
	}
	
	function loadClass( $className, $install = true )
	{
		
		$classInfo = explode( '_', $className );
		
		$size = sizeof( $classInfo );
		if( $size == 0 )
		return false;
		
		foreach ( $classInfo as $key => $value )
		{
			$classInfo[$key] = strtolower( $value );
		}
		
		$size -= 1;
		$classDir = '';
		
		for( $i=0; $i < $size; $i++ )
		{
			$classDir .= $classInfo[$i].'/';
		}
		
		$classDir = ( $install == true ? SKY_INSTALL_ROOT : SKY_ROOT )."/{$classDir}{$classInfo[$size]}.class.php";
		$classDir = str_replace( '/', DIRECTORY_SEPARATOR, $classDir );
		
		if( $classDir != realpath( $classDir ) )
		$this->message( '操作失败', '访问的方法不允许', 'failed' );
		
		@include_once realpath( $classDir );
		
		if( !class_exists( $className.'_Class' ) )
		return 'Controller_Index_Class';
		
		return $className.'_Class';
		
	}
	
	function d2s( $data )
	{
		return $this->ransack( $data, '_specialChars' );
	}
	
	function _specialChars( $str )
	{
		return htmlspecialchars( $str, ENT_QUOTES );	
	}
	
	
	function s2d( $data )
	{
		return $this->ransack( $data, '_stripSpecialChars' );
	}
	
	function _stripSpecialChars( $str )
	{
		return stripcslashes( strtr( $str, $this->stripSpecialCharsTable ) );
	}
	
	function skyAddslashes( $data )
	{
		$dataResult = $data;

		if( !get_magic_quotes_gpc() )
		$dataResult = $this->ransack( $data, 'addslashes' );
		
		return $dataResult;
	}
	
	function skyStripslashes( $data )
	{
		
		$dataResult = $this->ransack( $data, 'stripslashes' );
		
		return $dataResult;
	}
	
	function ransack( $val, $func )
	{
		if(  empty( $val ) )
		return false;
		
		if(  is_array( $val ) && !empty( $val ) )
		{
			foreach ( $val as $key => $value )
			{
				if( is_array( $value ) && !empty( $value ) )
				{
					$val[$key] = $this->ransack( $value, $func );
				}
				else
				{
					$val[$key] = function_exists( $func ) ? $func( $value ) : $this->$func( $value ) ;	
				}
			}
		}
		else
		{
			$val = function_exists( $func ) ? $func( $val ) : $this->$func( $val ) ;
		}
		
		return $val;
	}
	
	function template( $template )
	{
		include_once( SKY_INSTALL_ROOT.'/view/'.$template.'.php' ) ;
	}
	
	function dataReturn( $str = '', $marker = 'success', $rmarkerNums = 20 )
	{
		$markerLen = strlen( $marker );
		
		if( $markerLen > $rmarkerNums )
		exit( 'failed00000000000000标识码长度超过限制' );
		
		for( $iTemp = $markerLen; $iTemp < $rmarkerNums; $iTemp++ )
		{
			$marker .= '0';
		}
		
		exit( $marker.$str );
	}
	
	function message( $subject, $messageData, $status = 'success', $link = '' )
	{
		if( $this->get['isAjax'] == true )
		$this->dataReturn( $subject, $status );
		
		$message = array();
		$message['subject'] = $subject;
		$message['messages'] = $messageData;
		
		if( empty( $link['url'] ) )
		$link['url'] = 'javascript:history.go(-1);';
		
		if( empty( $link['str'] ) )
		$link['str'] = '返回上一页';
		
		$message['link'] = $link;
		$message['status'] = $status;
		
		$this->view->message = $message;
		
		$this->browserTitle = 'Flexsns-Sky 信息提示  - '.$subject;
		
		$this->template( 'message' );
		exit;
	}
	
	function cookie( $name, $value = array(), $expire = 3600 )
	{
		if( $expire < 0 )
		{
			setcookie ( $name, ' ', $this->config['nowtime']+3600, $this->config['cookiePath'], $this->config['cookieDomain'] );
			setcookie ( $name, '', $this->config['nowtime']+$expire, $this->config['cookiePath'], $this->config['cookieDomain'] );
			return true;
		}
		
		if( !empty( $value ) )
		{
			setcookie ( $name, $this->authcode( implode( "\t", $value ), 'ENCODE' ), $this->config['nowtime']+$expire, $this->config['cookiePath'], $this->config['cookieDomain'] );
			return true;
		}
		
		if( !$_COOKIE[$name] )
		{
			return false;
		}
		
		$cookie = explode( "\t", $this->authcode( $_COOKIE[$name] ) );
		
		$cookie = $this->skyAddslashes( $this->skyStripslashes( $cookie ) );
		
		return $cookie;
		
	}
	
	function clearCookie( $name )
	{
		$this->cookie( $name, array(), -31536000 );
	}

	function clearSession( $name )
	{
		@session_start();
		$_SESSION[$name] = '';
		unset( $_SESSION[$name] );
	}
	
	function authcode( $string, $operation = 'DECODE', $key = '', $expiry = 0 ) 
	{
		
		$ckey_length = 4;
	
		$key = md5( $key!='' ? $key : $this->config['authKey'] );
		$keya = md5(substr( $key, 0, 16 ) );
		$keyb = md5(substr( $key, 16, 16 ) );
		$keyc = $ckey_length ? ( $operation == 'DECODE' ? substr( $string, 0, $ckey_length ): substr( md5( microtime() ), -$ckey_length ) ) : '';
	
		$cryptkey = $keya.md5( $keya.$keyc );
		$key_length = strlen( $cryptkey );
	
		$string = $operation == 'DECODE' ? base64_decode( substr( $string, $ckey_length ) ) : sprintf( '%010d', $expiry ? $expiry + time() : 0 ).substr( md5( $string.$keyb ), 0, 16 ).$string;
		$string_length = strlen( $string );
	
		$result = '';
		$box = range( 0, 255 );
	
		$rndkey = array();
		for( $i = 0; $i <= 255; $i++ ) 
		{
			$rndkey[$i] = ord( $cryptkey[$i % $key_length] );
		}
	
		for( $j = $i = 0; $i < 256; $i++ ) 
		{
			$j = ( $j + $box[$i] + $rndkey[$i] ) % 256;
			$tmp = $box[$i];
			$box[$i] = $box[$j];
			$box[$j] = $tmp;
		}
	
		for( $a = $j = $i = 0; $i < $string_length; $i++ ) 
		{
			$a = ($a + 1) % 256;
			$j = ($j + $box[$a]) % 256;
			$tmp = $box[$a];
			$box[$a] = $box[$j];
			$box[$j] = $tmp;
			$result .= chr( ord( $string[$i] ) ^ ( $box[( $box[$a] + $box[$j] ) % 256] ) );
		}
	
		if($operation == 'DECODE') 
		{
			if( ( substr( $result, 0, 10 ) == 0 || substr( $result, 0, 10 ) - time() > 0 ) && substr( $result, 10, 16 ) == substr( md5( substr( $result, 26 ).$keyb ), 0, 16 ) ) 
			{
				return substr($result, 26);
			} 
			else 
			{
				return '';
			}
		} 
		else 
		{
			return $keyc.str_replace( '=', '', base64_encode( $result ) );
		}
	}
	
	function pages( $pageUrl, $total, $perpage = 20, $pagenums = 10, $showOne = true )
	{
	
		$page = $_GET['__rewrite_arg'] ? intval( $_GET['__rewrite_arg'] ) : intval( $this->get['page'] );
		
		$totalPage = ceil( $total/$perpage );
		$totalPage = max( $totalPage, 1 );
		$pagenums = min( $pagenums, $totalPage );
		
		$page = max( $page, 1 );
		$page = min( $page, $totalPage );
		
		
		$sqlStart = ( $page - 1 )* $perpage;
		
		if( $showOne )
		{
			$pageStart = min( max( 1, $totalPage - $pagenums ), max( 1, $page - ceil( $pagenums/2 ) ) );
			$pageEnd = min( $pageStart+$pagenums, $totalPage );
			
			for( $i = $pageStart; $i <= $pageEnd; $i++ )
			{
				$pageArray['page'] = $i;
				$pageArray['link'] = $pageUrl.'page-'.$i;
				
				$pages[] = $pageArray;
			}
		}
		else
		{
			$sqlStart = 0;
			$pages = array();
		}
		
		return array( $sqlStart, $perpage, $totalPage, $pages );
	}
	
	
	function xmlHeader()
	{
		header( 'Content-Type:text/xml;charset=utf-8' );
		echo '<?xml version="1.0" encoding="utf-8" ?>'."\n";
	}
	
	function cutstr( $str, $len, $isUtf8 = true, $tag = '...' )
	{
		$strReturn = '';
		
		if( strlen( $str ) <= $len )
		return $str;
		
		if( ord( $str[$len] ) > 127 )
		{
			if( $isUtf8 )
			{
				$strReturn = substr( $str, 0, $len ).$str[$len+1].$str[$len+2].$tag;
			}
			else
			{
				$strReturn = substr( $str, 0, $len ).$str[$len+1].$tag;
			}
		}
		else
		{
			$strReturn = substr( $str, 0, $len ).$tag;
		}
		
		return $strReturn;
	}
	
	function session( $name, $value = array() )
	{
		session_start();
		
		if( !empty( $value ) )
		{
			$value = implode( "\t", $value );
			$_SESSION[$name] = $this->authcode( $value, 'ENCODE' );
			@session_regenerate_id( true );
			
			return true;
		}
		else
		{
			if( !$_SESSION[$name] )
			{
				return false;
			}
			
			$session = explode( "\t", $this->authcode( $_SESSION[$name] ) );
			
			return $session;
		}
	}
	
	function dateFormat( $date, $format = 'full' )
	{
		switch ( $format )
		{
			default:
			case 'full':
				return date( 'Y-m-d H:i:s', $date );
			
			case 'date':
				return date ( 'Y-m-d', $date );
				break;
		}
	}

	function listDir( $dirPath, $isDir = true, $filter = '' )
	{
		$dir = dir( $dirPath );
		
		$items = array();
		
		while ( false != ( $item = $dir->read() ) ) {
			
			if( ( $filter && !strpos( $item, $filter ) ) || is_dir( $dirPath.$item ) !=  $isDir || $item == '.' || $item == '..' )
			continue;
			
			$items[] = $item;
		}
		
		$dir->close();
		
		return $items;
		
	}
	
	function fw( $file, $data )
	{
		$fh = @fopen( $file, 'w' );
		$return = @fwrite( $fh, $data );
		@fclose( $fh );
		
		return $return;
	}
	
	function fr( $file )
	{
		$fh = @fopen( $file, 'r' );
		$return = fread( $fh, filesize ($file) );
		@fclose( $fh );
		
		return $return;
	}
	
	function checkLength( $str, $min, $max, $isUtf8 = true )
	{
		$str = htmlspecialchars( $str, ENT_QUOTES );
		$length = strlen( $str );
		
		$trueLength = $length;
		
		if( $isUtf8 )
		{
			for($i = 0; $i < $length; $i++) 
			{
				
				if( ord( $str[$i] ) > 127 )
				{
					$trueLength -= 2;
					$i+=2;
				}
			}
			
		
		}
		else
		{
			for($i = 0; $i < $length; $i++) 
			{
				
				if( ord( $str[$i] ) > 127 )
				{
					$trueLength -= 1;
					$i++;
				}
			}
		
		}
		
		if( $trueLength < $min || $trueLength > $max )
		return false;
		
		return true;
		
	}
	
	function randomKey( $length, $joinTime = false )
	{
		$keys = 'abcdefghijkmnpqrstuvwxyz123456789';
		$randLength = strlen( $keys ) - 1;
		
		$returnKeys = '';
		
		for ( $i = 0; $i<= $length; $i++ )
		{
			$returnKeys .= $keys{rand( 0, $randLength)};
		}
		
		return ( $joinTime ? $returnKeys.time() : $returnKeys );
	}

	function skyIconv( $fcharset, $tcharset, $str )
	{
		if( function_exists( 'iconv' ) )
		{
			return iconv( $fcharset, $tcharset, $str );
		}
		elseif ( function_exists( 'mb_convert_encoding' ) )
		{
			return mb_convert_encoding( $str, $tcharset, $fcharset );
		}
		
		return $str;
	}
	
	function checkIconv()
	{
		if( !function_exists( 'iconv' ) && function_exists( 'mb_convert_encoding' ) )
		return false;
		
		return true;
	}
	
	function writeAble( $obj )
	{
		if( is_dir( $obj ) )
		{
			if( false != ( $fh = @fopen( $obj.'/writeAbleTest.txt', 'w' ) ) )
			{
				@fclose( $fh );
				@unlink( $obj.'/writeAbleTest.txt' );
				return true;
			}
			else
			{
				return false;
			}
		}
		elseif( is_file( $obj ) )
		{
			return is_writable( $obj );
		}
		
		return true;
	}


	function fstream( $url, $data = '', $cookie = '' ) 
	{
		$ucUrlArray = parse_url( $url );
		$ucUrlArray['path'] = $ucUrlArray['path'] ? $ucUrlArray['path'].( $ucUrlArray['query'] ? '?'.$ucUrlArray['query'] : '' ) : '/';
		
		$out ='';
		
		if( !empty( $data ) )
		{	
			$out = "POST {$ucUrlArray['path']} HTTP/1.0\r\n";
			$out .= "Accept: */*\r\n";
			$out .= "Accept-Language: zh-cn\r\n";
			$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
			$out .= "Host: {$ucUrlArray['host']}\r\n";
			$out .= 'Content-Length: '.strlen($data)."\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Cache-Control: no-cache\r\n";
			$out .= "Cookie: {$cookie}\r\n\r\n";
			$out .= $data;
		}
		else
		{
			$out = "GET {$ucUrlArray['path']} HTTP/1.0\r\n";
			$out .= "Accept: */*\r\n";
			$out .= "Accept-Language: zh-cn\r\n";
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
			$out .= "Host: {$ucUrlArray['host']}\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Cookie: {$cookie}\r\n\r\n";
		}
		
		$errno = -1;
		$errstr = '';
		$timeOut = 30;
		
		$fh = @fsockopen( $ucUrlArray['host'], $ucUrlArray['port']?$ucUrlArray['port']:80, $errno, $errstr, $timeOut );
		
		if( $errstr )
		return false;
		
		stream_set_blocking( $fh, true );
		stream_set_timeout( $fh, $timeOut );
		@fwrite( $fh, $out );
		
		$status = stream_get_meta_data($fh);
		
		if( $status['timed_out'] )
		return false;
		
		while ( !feof( $fh ) ) 
		{
			if(( $header = @fgets( $fh )) && ( $header == "\r\n" ||  $header == "\n" ) ) 
			{
				break;
			}
		}

		$streadata = '';
		while( !feof( $fh ) ) 
		{
			$streadata .= @fread( $fh, 8192 );
		}
		
		return $streadata;
	}
}

?>