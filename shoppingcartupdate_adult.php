<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_MYWISHLIST . '?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$sc_query = tep_db_query('select * from shopping_cart_adult where customers_id = \'' . $customer_id . '\' order by shopping_cart_id ');

while ($sc = tep_db_fetch_array($sc_query)) {
	if ($HTTP_POST_VARS['del' . $sc['shopping_cart_id']]) {
		tep_db_query('delete from shopping_cart_adult where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');
	}
	$quantity_query = tep_db_query("select * from products_adult where products_id = '" . $sc['products_id'] . "' ");
	$quantity = tep_db_fetch_array($quantity_query);
    tep_db_query('update shopping_cart_adult set quantity = \'' . min($HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']],$quantity['quantity_to_sale']) . '\' where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');

	
	//tep_db_query('update shopping_cart_adult set quantity = \'' . $HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']] . '\' where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');
}


tep_redirect(tep_href_link('shopping_cart_adult.php', '', 'SSL'));

?>