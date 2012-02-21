<?php
require('configure/application_top.php');


if ($HTTP_POST_VARS['movieid']< 1) {
	tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));	
}

		
if (!tep_session_is_registered('customer_id')) {
tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
//tep_db_query("insert into products_uninterested (products_id, date , customers_id) values ('" . $HTTP_POST_VARS['movieid'] . "', now(), '" . $customer_id . "') ");
//tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_POST_VARS['movieid'] . "' and customers_id= '" . $customer_id . "' ");

switch($languages_id){
	case 1:
		$lang='FR';
	break;
	case 2:
		$lang='NL';
	break;
	case 3:
		$lang='EN';
	break;
}

$request =  'http://partners.thefilter.com/DVDPostService';
$format = 'CaptureService.ashx';   // this can be xml, json, html, or php

$args = 'cmd=AddEvidence';
$args .= '&catalogId='.$HTTP_POST_VARS['movieid'];
$args .= '&eventType=NotInterestedItem';
$args .= '&userId='.$customer_id;
$args .= '&userLanguage='.$lang;
$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];


//echo '<br /><br />'.$request.'/'.$format.'?'.$args.'<br /><br />';

// Get and config the curl session object
$session = curl_init($request.'/'.$format.'?'.$args);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    //execute the request and close
$response = curl_exec($session);
curl_close($session);


$series_query = tep_db_query("select * from products where products_id = '" . $HTTP_POST_VARS['movieid'] . "' limit 1");
while ($series = tep_db_fetch_array($series_query)) {

	if ($series['products_series_id'] > 0 ){
		$intproducts_series_id = $series['products_series_id'];
		$series_query = tep_db_query("select * from products where products_series_id = " . $intproducts_series_id );
		while ($series = tep_db_fetch_array($series_query)) {
			tep_db_query("insert into products_uninterested (products_id, date , customers_id) values ('" . $series['products_id'] . "', now(), '" . $customer_id . "') ");
			
			//tep_db_query("delete from  products_recommandation where  products_id = '" . $series['products_id'] . "' and customers_id= '" . $customer_id . "' ");
			$args = 'cmd=AddEvidence';
			$args .= '&catalogId='.$series['products_id'];
			$args .= '&eventType=NotInterestedItem';
			$args .= '&userId='.$customer_id;
			$args .= '&userLanguage='.$lang;

			//echo '<br /><br />'.$request.'/'.$format.'?'.$args.'<br /><br />';

			// Get and config the curl session object
			$session = curl_init($request.'/'.$format.'?'.$args);
			curl_setopt($session, CURLOPT_HEADER, false);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			    //execute the request and close
			$response = curl_exec($session);
			curl_close($session);
		}
	}
	else
	{
			tep_db_query("insert into products_uninterested (products_id, date , customers_id) values ('" . $HTTP_POST_VARS['movieid'] . "', now(), '" . $customer_id . "') ");
			
			//tep_db_query("delete from  products_recommandation where  products_id = '" . $series['products_id'] . "' and customers_id= '" . $customer_id . "' ");
			$args = 'cmd=AddEvidence';
			$args .= '&catalogId='.$HTTP_POST_VARS['movieid'];
			$args .= '&eventType=NotInterestedItem';
			$args .= '&userId='.$customer_id;
			$args .= '&userLanguage='.$lang;

			//echo '<br /><br />'.$request.'/'.$format.'?'.$args.'<br /><br />';

			// Get and config the curl session object
			$session = curl_init($request.'/'.$format.'?'.$args);
			curl_setopt($session, CURLOPT_HEADER, false);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			    //execute the request and close
			$response = curl_exec($session);
			curl_close($session);
	}
	 
}
if(!empty($_POST['url']))
{
tep_redirect($_POST['url']);
die();
}
?>

<body onload="window.history.go(-1);"></body>
<?
}
?>
