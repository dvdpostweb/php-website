<?php 
require('configure/application_top.php');

$current_page_name = 'payment_method_change.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('payment'=>$_GET['payment'])));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'NONSSL'));
}else{
	$page_body_to_include = $current_page_name;
	$sql='select * from customers c left join address_book a on a.customers_id = c.customers_id and address_book_id = customers_default_address_id where c.customers_id = '.$customer_id;
	$query=tep_db_query($sql);
	$customers_value=tep_db_fetch_array($query);
	
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>

