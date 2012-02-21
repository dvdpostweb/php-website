<?php 
require('configure/application_top.php');

$current_page_name = "studio_adult.php";

if (!tep_session_is_registered('adult_pwd')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('studio_id'=>$_GET['studio_id'])));
	tep_redirect(FILENAME_LOGIN_ADULTPWD);
}  


if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('studio_id'=>$_GET['studio_id'])));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private_adult.php'));

require('configure/application_bottom.php');

?>