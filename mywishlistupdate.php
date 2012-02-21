<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_MYWISHLIST . '?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$wl_query = tep_db_query('select * from ' . TABLE_WISHLIST . ' where customers_id = \'' . $customer_id . '\' order by wl_id ');

while ($wl = tep_db_fetch_array($wl_query)) {
	if ($HTTP_POST_VARS['del' . $wl['wl_id']]) {
		tep_db_query('delete from ' . TABLE_WISHLIST . ' where wl_id =  \'' . $wl['wl_id']  . '\'');
	}
	tep_db_query('update ' . TABLE_WISHLIST . ' set rank = \'' . $HTTP_POST_VARS['rank' . $wl['wl_id']] . '\' where wl_id =  \'' . $wl['wl_id']  . '\'');
}

tep_reorder_wishlist($customer_id);

tep_redirect(tep_href_link(FILENAME_MYWISHLIST, '', 'SSL'));

?>