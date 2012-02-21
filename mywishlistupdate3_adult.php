<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_MYWISHLIST . '?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$wl_query = tep_db_query('select * from wishlist where customers_id = \'' . $customer_id . '\' order by wl_id ');

while ($wl = tep_db_fetch_array($wl_query)) {		
	switch ($HTTP_POST_VARS['priority' . $wl['wl_id']]) {
		case "h" :
			tep_db_query('update wishlist set priority = 1 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "m" :
			tep_db_query('update wishlist set priority = 2 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "l" :
			tep_db_query('update wishlist set priority = 3 where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		case "del" :
			tep_db_query('delete from wishlist where wl_id =  \'' . $wl['wl_id']  . '\'');
		break;
		
	}
}

tep_reorder_wishlist2($customer_id);

tep_redirect(tep_href_link('mywishlist_adult.php', '', 'SSL'));

?>