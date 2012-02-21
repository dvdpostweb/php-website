<?php 
require('configure/application_top.php');

if ($HTTP_GET_VARS['customers_id']< 1) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$customers_query = tep_db_query("select * from customers where customers_id = '" . $HTTP_GET_VARS['customers_id'] . "' ");
$customers = tep_db_fetch_array($customers_query);
if ($customers[customers_abo_payment_method] < 9){
    tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
}

if ($customers[customers_abo] < 1){
    tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
}

$customers_query = tep_db_query("select * from customers where customers_id  = '" . $HTTP_GET_VARS['customers_id'] . "' ");
$customers = tep_db_fetch_array($customers_query);

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

switch($customers['customers_abo_payment_method']){
	case 11:
		switch ($HTTP_GET_VARS['option']){
			case 'a': //normal reconduct
				tep_db_query("update customers set customers_abo_payment_method  = 1 where customers_id = '" . $HTTP_GET_VARS['customers_id'] . "'");
			break;
			case 'b': //discount reconduct
				tep_db_query("update customers set customers_abo_payment_method  = 1 where customers_id = '" . $HTTP_GET_VARS['customers_id'] . "'");
				tep_db_query("update customers set customers_abo_discount_recurring_to_date   = DATE_ADD(now(), INTERVAL 1 MONTH)  where customers_id = '" . $HTTP_GET_VARS['customers_id'] . "'");
				tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method, comment) values ('" . $HTTP_GET_VARS['customers_id'] . "', 4, now(), '5', 'ogone', 'end exell') "); 
				tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $HTTP_GET_VARS['customers_id'] . "', 6, 146 ,now(), '5'  , 'ogone', '" . WEB_SITE_ID . "') "); 
				tep_db_query("insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('146', now(), '" . $HTTP_GET_VARS['customers_id'] . "' )");
				tep_db_query("update discount_code set discount_limit = discount_limit  -1 where  discount_code_id  = '146' ");
			break;
		}
	break;
}
require(DIR_WS_INCLUDES . 'stat.php');
tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
?>