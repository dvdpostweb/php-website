<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'addtoshoppingcart_new_adult.php' . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

//BEN001 $products_query = tep_db_query("select * from products_adult where products_id = '" . $HTTP_POST_VARS['products_id'] . "' ");
$products_query = tep_db_query("select * from products where products_id = '" . $HTTP_POST_VARS['products_id'] . "' "); //BEN001
$products = tep_db_fetch_array($products_query);


//BEN001 $shopping_cart_query = tep_db_query("select * from shopping_cart_new_adult where customers_id = '" . $customer_id . "' and products_id = '" . $HTTP_POST_VARS['products_id'] . "' ");
$shopping_cart_query = tep_db_query("select * from shopping_cart_new where customers_id = '" . $customer_id . "' and products_id = '" . $HTTP_POST_VARS['products_id'] . "' "); //BEN001 
$shopping_cart = tep_db_fetch_array($shopping_cart_query);
if ($shopping_cart['shopping_cart_id']>0){
}else{
//BEN001 tep_db_query(" insert into shopping_cart_new_adult (customers_id, products_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $HTTP_POST_VARS['products_id'] . "', 1,'" . $products['products_new_sale_price'] . "',now() ) ");
tep_db_query(" insert into shopping_cart_new (customers_id, products_id, quantity, price, date_added, products_type) values ('" . $customer_id. "' , '" . $HTTP_POST_VARS['products_id'] . "', 1,'" . $products['products_new_sale_price'] . "',now(),'DVD_ADULT' ) "); //JER001
}

require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('shopping_cart_new_adult.php', '', 'SSL'));


?>