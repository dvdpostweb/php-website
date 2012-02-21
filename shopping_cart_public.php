<?php
require('configure/application_top.php');

$current_page_name = 'shopping_cart.php';

include(DIR_WS_INCLUDES . 'translation.php');
$current_page_name = 'shopping_cart_public.php';

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_public.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop.php'));
}

require('configure/application_bottom.php');
?>