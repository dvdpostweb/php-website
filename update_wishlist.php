<?php 
require('configure/application_top.php');

$current_page_name = 'update_wishlist.php';


if (!tep_session_is_registered('customer_id')) {
	$current_page_name .='?'.$QUERY_STRING;
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => $current_page_name));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');
?>