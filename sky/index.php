<?php

	error_reporting(0);

	$version = 'Flexsns-Sky 1.1';
	
	header( 'Content-Type:text/html;Charset=utf-8');
	ob_start();
	
	$config = array();
	@require_once 'data/config.php';
	@require_once SKY_ROOT.'/common/global.class.php';
	
	require_once SKY_ROOT.'/vo/view.class.php';
	$viewObject = new Vo_View_Class();
	$viewObject->version = $version;
	
	$globalClass = new Common_Global_Class();
	
	$queryStr = '';

	if( $_SERVER['QUERY_STRING'] )
	{
		$queryStr = $globalClass->skyAddslashes( $_SERVER['QUERY_STRING'] );

		$ctrlParam = array();
		$ctrlParam = explode( '/', $queryStr );
		
		$ctrl = array();
		if(  sizeof( $ctrlParam ) > 0 )
		{
			$ctrl = explode( '-', $ctrlParam[0] );
		}
		else
		{
			$ctrl = array( 'index', 'index' );
		}

		$get = array();
		if( sizeof( $ctrlParam ) > 1 )
		{
			$params = explode( '-', $ctrlParam[1] );
		
			for( $i=0; $i < sizeof($params); $i+=2 )
			{
				$get[$params[$i]] = $params[$i+1];
			}
			$get = $globalClass->d2s( $get );
		}
		
		$post = array();
		if( $_POST )
		{
			$post = $globalClass->d2s( $_POST );
		}
		
		$controller = sizeof( $ctrl )>0 ? $ctrl[0] : 'Index' ;
		$controller = ucwords( strtolower( $controller ) ); 
		
		$ctrlAction =sizeof( $ctrl )>1 ? $ctrl[1] : 'Index' ;
		$ctrlAction = ucwords( strtolower( $ctrlAction ) ); 
		$ctrlAction .= 'Action';
		
		$classname = $globalClass->loadClass( 'Controller_'.$controller );
		$controller = new $classname();
		
		if( !method_exists( $controller, $ctrlAction ) )
		{
			$ctrlAction = 'indexAction';
		}
		
		$viewObject->ctrlAction = strtolower( str_replace( 'Action', '', $ctrlAction ) );
		
		$controller->$ctrlAction();
	}
	else
	{
		$classname = $globalClass->loadClass( 'Controller_Index' );
		$controller = new $classname();
		$viewObject->ctrlAction = 'index';
		$controller->indexAction();
	}

	
?>