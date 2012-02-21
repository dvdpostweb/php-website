<?php 
require('configure/application_top.php');

$current_page_name = 'freetrial_info.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('mydvdpost.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
	require('configure/application_bottom.php');	
}

