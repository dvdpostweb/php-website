<?php
require('configure/application_top.php');

$current_page_name = FILENAME_REVIEWS;

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	$link='product_info_public.php';
	$reviews_link='reviews_member_public.php';
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	$link='product_info.php';
	$reviews_link='reviews_member.php';
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}


require('configure/application_bottom.php');

?>