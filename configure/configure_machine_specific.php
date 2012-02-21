<?php 

//LIMIT des affichages partie publique
$constants['MAX_DISPLAY_SEARCH_RESULTS'] = '10';

//LIMIT des affichages partie privée - listing_category.php 
$constants['MAX_DISPLAY_SEARCH_RESULTS_PRIVATE'] = '30';
//LIMIT des affichages partie privée - myrentals.php 
$constants['MAX_DISPLAY_ORDER_HISTORY'] = '20';

//emergency
	$constants['ENVIRONMENT'] = '';
	$constants['DIR_WS_COMMON'] = '/Users/gs/site_local/website/branches/newconnection/';
	$constants['DIR_FS_DOCUMENT_ROOT']= '/Users/gs/site_local/website/branches/newconnection/';
	$constants['ADMINIP']= '192.168.100.254';
	$constants['ADMINIP2']= '194.78.194.237';
	

	//DB test
	$constants['DB_SERVER']= '192.168.100.204';
	$constants['DB_SERVER_RO']= '192.168.100.14';
	$constants['DB_REDIRECT_ALL_RO'] = false;
	$constants['DB_SERVER_USERNAME']= 'root';
	$constants['DB_SERVER_PASSWORD']= '(:melissa:)';
//	$constants['DB_SERVER_USERNAME']= 'webuser';
//	$constants['DB_SERVER_PASSWORD']= '3gallfir-';
	$constants['DB_DATABASE']= 'dvdpost_test';
	//DB PROD

/*	$constants['DB_SERVER']= '192.168.100.204';
	$constants['DB_SERVER_RO']= '192.168.100.204';
	$constants['DB_REDIRECT_ALL_RO'] = true;
	$constants['DB_SERVER_USERNAME']= 'webuser';
	$constants['DB_SERVER_PASSWORD']= '3gallfir-';
	$constants['DB_DATABASE']= 'dvdpost_be_prod';*/
	
//		$constants['USE_PCONNECT']= 'true';
		$constants['USE_PCONNECT'] = 'false';  
		$constants['STORE_SESSIONS'] = '';
		
		$constants['HTTPS_URL'] = 'http://sso.dvdpost.dev';
		$constants['PRIVATE_SITE'] = 'http://dvdpost.dev';
		
		$constants['HTTPS_CLIENT_ID'] = 'dvdpost_php_development_client';
		$constants['HTTPS_SECRET'] = 'dvdpost_php_development_client_secret';
		 

//PROD
//	$constants['ENVIRONMENT'] = '';
//	$constants['DIR_WS_COMMON'] = 'D:/www3/';
//	$constants['DIR_FS_DOCUMENT_ROOT']= 'D:/www3/';
//	$constants['ADMINIP']= '194.78.194.237';
	
	//DB
//		$constants['DB_SERVER']= 'web03';
//		$constants['DB_SERVER_USERNAME']= 'root';
//		$constants['DB_SERVER_PASSWORD']= 'DVD7(post';
//		$constants['DB_DATABASE']= 'dvdpost_be_prod';
//		$constants['USE_PCONNECT']= 'true'; 
//		$constants['STORE_SESSIONS']= '';

//DEV
//	$constants['ENVIRONMENT'] = '';
//	$constants['DIR_WS_COMMON'] = 'D:/www3/';
//	$constants['DIR_FS_DOCUMENT_ROOT']= 'D:/www3/';
//	$constants['ADMINIP']= '194.78.194.237';
	
	//DB
//		$constants['DB_SERVER']= 'web03';
//		$constants['DB_SERVER_USERNAME']= 'root';
//		$constants['DB_SERVER_PASSWORD']= 'DVD7(post';
//		$constants['DB_DATABASE']= 'dvdpost_be_dev';
//		$constants['USE_PCONNECT']= 'true'; 
//		$constants['STORE_SESSIONS']= '';
	
//stage
	//$constants['ENVIRONMENT'] = '';
	//$constants['DIR_WS_COMMON'] = 'D:/www3/';
	//$constants['DIR_FS_DOCUMENT_ROOT']= 'D:/www3/';
	//$constants['ADMINIP']= '194.78.194.237';
	
	//DB
		//$constants['DB_SERVER']= 'web03';
		//$constants['DB_SERVER_USERNAME']= 'root';
		//$constants['DB_SERVER_PASSWORD']= 'DVD7(post';
		//$constants['DB_DATABASE']= 'dvdpost_be_staging';
		//$constants['USE_PCONNECT']= 'true'; 
		//$constants['STORE_SESSIONS']= '';

//DEVCED
	//$constants['ENVIRONMENT'] = 'Development ced';
	//$constants['DIR_WS_COMMON'] = 'C:/projects/dvdpost/www2/';
	//$constants['DIR_FS_DOCUMENT_ROOT']= 'C:/projects/dvdpost/www2/';
	//$constants['ADMINIP']= '127.0.0.1';
	
	//DB
		//$constants['DB_SERVER']= '127.0.0.1';
		//$constants['DB_SERVER_USERNAME']= 'root';
		//$constants['DB_SERVER_PASSWORD']= 'root';
		//$constants['DB_DATABASE']= 'dvdpost_be_prod';
		//$constants['USE_PCONNECT']= 'true'; 
		//$constants['STORE_SESSIONS']= '';
?>
