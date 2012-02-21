<?php
$logpwd=1;

require('configure/application_top.php');

$current_page_name = FILENAME_CREATE_ACCOUNT;

if (tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
}
	

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));

require('configure/application_bottom.php');

?>