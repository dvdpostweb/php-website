<?php 
require('configure/application_top.php');

$current_page_name = 'shopping_cart_checkout.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
	tep_redirect(tep_href_link('create_account.php', '', 'SSL'));
	
}else if($customers_registration_step!=100){
		if ($customers_registration_step<80) {
		$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
		tep_redirect(tep_href_link('account_edit.php', '', 'SSL'));
		}	
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_public.php'));
	}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop.php'));
	}


require('configure/application_bottom.php');
?>