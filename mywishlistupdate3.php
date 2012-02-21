<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_MYWISHLIST . '?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$wl_query = tep_db_query('select * from ' . TABLE_WISHLIST . ' where customers_id = \'' . $customer_id . '\' order by wl_id ');

while ($wl = tep_db_fetch_array($wl_query)) {		
	switch ($HTTP_POST_VARS['priority' . $wl['wl_id']]) {
		case "h" :
			tep_db_query('update ' . TABLE_WISHLIST . ' set priority = 1 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "m" :
			tep_db_query('update ' . TABLE_WISHLIST . ' set priority = 2 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "l" :
			tep_db_query('update ' . TABLE_WISHLIST . ' set priority = 3 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "del" :
			tep_db_query('delete from ' . TABLE_WISHLIST . ' where wl_id =  \'' . $wl['wl_id']  . '\'');
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
			$args .= '&catalogId='.$wl['wl_id'];
			$args .= '&eventType=RemoveFromWishlist';
			$args .= '&userId='.$customer_id;
			$args .= '&userLanguage='.$lang;
			$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
			
		    // Get and config the curl session object
		    $session = curl_init($request.'/'.$format.'?'.$args);
		    curl_setopt($session, CURLOPT_HEADER, false);
		    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
			    //execute the request and close
		    $response = curl_exec($session);
		    curl_close($session);
		break;
		
	}
}

tep_reorder_wishlist2($customer_id);

tep_redirect(tep_href_link('mywishlist.php', '', 'SSL'));

?>