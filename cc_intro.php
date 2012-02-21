<?php
require('configure/application_top.php');

$current_page_name = FILENAME_CC_INTRO;

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => 'cc_intro.php'));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}  
 
include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>