<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$abo_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$abo = tep_db_fetch_array($abo_query);
$a = $abo['customers_abo_dvd_norm'];
$b = $abo['customers_abo_dvd_adult'];
$e = $abo['customers_abo_dvd_home_norm'];
$f = $abo['customers_abo_dvd_home_adult'];


//credit + dvd@home pompé dans la DB
$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $HTTP_GET_VARS['products_id']);
$products_abo = tep_db_fetch_array($products_abo_query);
$DVD_credit= $products_abo['qty_credit'];
$DVD_at_home= $products_abo['qty_at_home'];

if ($DVD_credit>0){
	tep_db_query("update customers set customers_abo_dvd_credit  = ".$DVD_credit." where customers_id = '" . $customer_id . "'");
}else{
	tep_db_query("update customers set customers_abo_start_rentthismonth  = 0 where customers_id = '" . $customer_id . "'");
}


tep_db_query("insert into abo (customerid, action, date, product_id) values ('" . $customer_id . "', '" . $HTTP_GET_VARS['ch'] . "', now(),'" . $HTTP_GET_VARS['products_id'] . "' )");
tep_db_query("update customers set customers_abo_type = '" . $HTTP_GET_VARS['products_id'] . "' ,  customers_next_abo_type = '" . $HTTP_GET_VARS['products_id'] . "' where customers_id = '" . $customer_id . "'");
if (($DVD_at_home - $b)<0){ //downgrade quand norm devient negatif et on doit alors diminuer aussi adult
tep_db_query("update customers set customers_abo_dvd_norm = 0 where customers_id = '" . $customer_id . "'");
tep_db_query("update customers set customers_abo_dvd_adult = customers_abo_dvd_adult + '" . $DVD_at_home . "' - '" . $b . "'  where customers_id = '" . $customer_id . "'");								
}else{	
	tep_db_query("update customers set customers_abo_dvd_norm = '" . $DVD_at_home . "' - '" . $b . "' where customers_id = '" . $customer_id . "'");
}
require(DIR_WS_INCLUDES . 'stat.php');
tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));

?>
