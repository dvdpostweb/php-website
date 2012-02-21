<?php
// Un peu de sécurité
$code = $_GET['code'] + 0;
if ($code == 0)
    die('Hack');
    
$page_body_to_include = $current_page_name;
	
require('configure/application_top.php');



$pos = strpos($_SERVER['REQUEST_URI'], '/images/customers/accepted');
if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/customers/user-thumb.png');
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/images/dvd/');
//echo '/images/www3/languages/'.$language.'/images/movie_blank.gif';
if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/www3/languages/'.$language.'/images/movie_blank.gif');
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/images//dvd/');

if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/www3/languages/'.$language.'/images/movie_blank.gif');
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/imagesx/dvd/');

if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/www3/languages/'.$language.'/images/moviex_blank.gif');
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/imagesx//dvd/');

if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/www3/languages/'.$language.'/images/moviex_blank.gif');
	die();	
}

$pos = strpos($_SERVER['REQUEST_URI'], '/imagesx/screenshots');

if ($pos !== false)
{
	$pos = strpos($_SERVER['REQUEST_URI'], '7.jpg');
	if ($pos !== false)
	{
		header("Content-type: image/jpeg");
		echo file_get_contents("http://www.dvdpost.be/".str_replace('7.jpg','1.jpg', $_SERVER['REQUEST_URI']));
		die();
	}
	else
	{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/blank.gif');
	die();	
	}
}
$pos = strpos($_SERVER['REQUEST_URI'], '/images/screenshots');

if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/blank.gif');
	die();	
	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/images/www3/quizz/q');

if ($pos !== false)
{
	header("Content-type: image/jpeg");
	echo file_get_contents('http://www.dvdpost.be/images/blank.gif');
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '//dvd/');

if ($pos !== false)
{
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '/dvd/');

if ($pos !== false)
{
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], '.rar');
if ($pos !== false)
{
	die();	
}
$pos = strpos($_SERVER['REQUEST_URI'], 'bigshop.cz');
if ($pos !== false)
{
	die();	
}


$pos = strpos($_SERVER['HTTP_REFERER'], 'http://buymanagement');

if ($pos !== false)
{
	die();	
}
$pos = strpos($_SERVER['HTTP_REFERER'], 'http://buymanagement');

if ($pos !== false)
{
	die();	
}


$current_page_name = 'error.php';

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/error.php'));


require('configure/application_bottom.php');

?>