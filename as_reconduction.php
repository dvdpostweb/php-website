<?php 
require('configure/application_top.php');

if ($HTTP_GET_VARS['customers_id'] < 1) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$customers_query = tep_db_query("select * from customers where customers_id = '" . $HTTP_GET_VARS['customers_id'] . "' ");
$customers = tep_db_fetch_array($customers_query);

if ($customers[customers_abo] > 0){
    tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
}

$customer_id = $customers['customers_id'];
$customer_default_address_id = $customers['customers_default_address_id'];
$customer_first_name = $customers['customers_firstname'];
$customer_country_id = "21";
$customer_zone_id = "0";
tep_session_register('customer_id');
tep_session_register('customer_default_address_id');
tep_session_register('customer_first_name');
tep_session_register('customer_country_id');
tep_session_register('customer_zone_id');

switch ($HTTP_GET_VARS['option']){
	case 'a': //normal reconduct
		tep_redirect(tep_href_link('subscription.php', '', 'SSL'));
	break;
	case 'b': //discount reconduct
		tep_redirect(tep_href_link('as_reconduction_upfront.php', '', 'SSL'));
	break;
}
?>