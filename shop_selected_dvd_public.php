<?php 
require('configure/application_top.php');

if (tep_session_is_registered('customer_id') && $customers_registration_step==100) {
	tep_redirect(tep_href_link('shop_selected_dvd.php?'.$QUERY_STRING, '', 'SSL'));
}else{
	$current_page_name = 'shop_selected_dvd_public.php';
	
	include(DIR_WS_INCLUDES . 'translation.php');
	
	$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
	
	$page_body_to_include = $current_page_name;
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_public.php'));
	
	require('configure/application_bottom.php');
}
?>