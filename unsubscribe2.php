<?php 
require('configure/application_top.php');


tep_db_query("update sponsoring set unsubscribe= 1 where  email = '" . $HTTP_GET_VARS['customers_email'] . "' ");

tep_db_query("update contest set unsubscribe= 1 where  email = '" . $HTTP_GET_VARS['customers_email'] . "' ");

tep_db_query("update quizz  set unsubscribe= 1 where  email = '" . $HTTP_GET_VARS['customers_email'] . "' ");

tep_db_query("update mem_get_mem  set unsubscribe= 1 where  email = '" . $HTTP_GET_VARS['customers_email'] . "' ");

tep_db_query("update lesoir_adress  set unsubscribe= 1 where  email_address = '" . $HTTP_GET_VARS['customers_email'] . "' ");

//tep_db_query("update emakina_rent_a_wife  set unsubscribe= 1 where   email = '" . $HTTP_GET_VARS['customers_email'] . "' ");


$customers_query = tep_db_query("select * from customers where  customers_email_address  = '" . $HTTP_GET_VARS['customers_email'] . "' ");
$customers = tep_db_fetch_array($customers_query);
if ($customers['customers_id']>0) {
	tep_db_query("update customers set  customers_newsletter = 0, customers_newsletterpartner = 0,marketing_ok='NO' where  customers_id = '" . $customers['customers_id'] . "' ");
	tep_db_query("insert into newsletters_unsubscribe_history (customers_id, date) values('" . $customers['customers_id'] . "', now() ) ");

}

$current_page_name = 'unsubscribe.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>