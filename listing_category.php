<?php
require('configure/application_top.php');

$current_page_name = FILENAME_LISTING_CATEGORY;

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => $current_page_name ));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	tep_redirect(tep_href_link('listing_category_public.php?list='.$HTTP_GET_VARS['list'].'&12', '', 'SSL'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>