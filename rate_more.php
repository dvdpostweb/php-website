<?php
require('configure/application_top.php');

$current_page_name = FILENAME_RATE_MORE;

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}
if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');


$page_body_to_include = $current_page_name;
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));


require('configure/application_bottom.php');
?>