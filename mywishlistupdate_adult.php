<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' =>  'mywishlist_adult.php?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$wl_query = tep_db_query('select * from wishlist where customers_id = \'' . $customer_id . '\' order by wl_id ');

while ($wl = tep_db_fetch_array($wl_query)) {
	if ($HTTP_POST_VARS['del' . $wl['wl_id']]) {
		tep_db_query('delete from wishlist where wl_id =  \'' . $wl['wl_id']  . '\'');
	}
	tep_db_query('update wishlist set rank = \'' . $HTTP_POST_VARS['rank' . $wl['wl_id']] . '\' where wl_id =  \'' . $wl['wl_id']  . '\'');
}

tep_reorder_wishlist_adult($customer_id);

tep_redirect(tep_href_link('mywishlist_adult.php', '', 'SSL'));

?>