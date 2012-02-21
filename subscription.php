<?php 
require('configure/application_top.php');

$current_page_name = 'step1.php';

/*if ($customers_registration_step==100) {
	;//tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
}else{
	if (tep_session_is_registered('customer_id')){
		$check_abo="select customers_abo from customers where customers_id=".$customer_id;
		$check_abo_query = tep_db_query($check_abo);
		$check_abo_values = tep_db_fetch_array($check_abo_query);
		if ($check_abo_values['customers_abo']<1){
			if ($no==1 || $customers_registration_step> 40){
				$show_freetrial=0;
				tep_db_query("update customers set activation_discount_code_id='0',activation_discount_code_type=' ',customers_next_discount_code='0' where customers_id = '" . $customer_id . "'");
			}	
			else{$show_freetrial=1;}
		}
	}else{$show_freetrial=1;}*/


	//if (!tep_session_is_registered('customer_id')) {
	//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
	//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
	//}

	include(DIR_WS_INCLUDES . 'translation.php');

	$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

	$page_body_to_include = $current_page_name;

	if (!tep_session_is_registered('customer_id') || $customers_registration_step<100) {
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
	}else{
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
	}
//}

require('configure/application_bottom.php');

?>