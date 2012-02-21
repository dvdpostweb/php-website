<?php
require('configure/application_top.php');

$current_page_name = 'mywishlist2_adult.php';



if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => 'mywishlist_adult.php'));
	tep_redirect(FILENAME_LOGIN);
}
if (!tep_session_is_registered('adult_pwd')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => 'mywishlist_adult.php'));
	tep_redirect(FILENAME_LOGIN_ADULTPWD);
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private_adult.php'));

require('configure/application_bottom.php');
?>