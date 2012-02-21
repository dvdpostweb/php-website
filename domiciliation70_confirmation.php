<?php 
require('configure/application_top.php');

$current_page_name = 'domiciliation70_confirmation.php';
$page_body_to_include = $current_page_name;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
if( $customers_registration_step==100){
	tep_redirect(tep_href_link('mydvdpost.php'));
	die();
}

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('step1.php'));
}else{
	$sql='select * from customers c
	left join address_book a on a.customers_id = c.customers_id and address_book_id = 1
	where c.customers_id='.$customer_id;
	
	tep_db_query("update customers set domiciliation_status=0 where customers_id = '" . $customer_id . "'");
	
	$sql_query=tep_db_query($sql,'db_link',true);
	$customers_value=tep_db_fetch_array($sql_query);

		
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));
		require('configure/application_bottom.php');
}
?>