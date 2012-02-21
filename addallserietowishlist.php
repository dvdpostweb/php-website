<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_ADDTOWISHLIST . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if ($HTTP_POST_VARS['series_id'] > 0 ){	

	$media='select products_media from products where products_id = '.$HTTP_POST_VARS['products_id'];
	$query_media=tep_db_query($media);
	$media_value=tep_db_fetch_array($query_media);
	$products_media=$media_value['products_media'];
	
	
	$series_query = tep_db_query("select * from " . TABLE_PRODUCTS . " p where p.products_media= '".$products_media."' and p.products_series_id = '" . $HTTP_POST_VARS['series_id'] . "' order by products_series_number ");
	while ($series = tep_db_fetch_array($series_query)) {
		$wl_query = tep_db_query("select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $series['products_id'] . "' ");
		$wl = tep_db_fetch_array($wl_query);
		if ($wl['product_id'] > 0) {
		}else{  
			$maxwl_query = tep_db_query("select max(rank) as maxrank from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
			$maxwl = tep_db_fetch_array($maxwl_query);
			$nextrank = $maxwl['maxrank'] + 1; 
			
			$sql_assigned='select * from wishlist_assigned where products_id='.$series['products_id'].' and customers_id ='.$customer_id;

			$query_assigned=tep_db_query($sql_assigned);


			if(tep_db_num_rows($query_assigned) != 0)
			{
				$assigned="YES";
			}
			else
			{
				$assigned="NO";
			}
			
			
			$error=tep_db_query("insert into " . TABLE_WISHLIST . " (customers_id, product_id, rank, date_added, wishlist_type,already_rented) values ('" . $customer_id . "', '" . $series['products_id']  . "', '" . $nextrank . "',now(), '" . $series['products_type']  . "','".$assigned."')");
			/////////////////////
			///////filter////////
			/////////////////////
			$priority='med';	
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
			$args .= '&catalogId='.$series['products_id'];
			$args .= '&eventType=AddToWishlist';
			$args .= '&userId='.$customer_id;
			$args .= '&userLanguage='.$lang;
			$args .= '&priority='.$priority;
			$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
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
	
require(DIR_WS_INCLUDES . 'stat.php');


	
	
	$origin_href3 = $HTTP_POST_VARS['nexturl'];
	//echo 'addall:' . $origin_href3;
	tep_redirect($origin_href3, '', 'SSL');
}else{
    tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

?>
