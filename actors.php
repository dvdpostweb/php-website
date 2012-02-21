<?php 
require('configure/application_top.php');

$current_page_name = FILENAME_ACTORS;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	$page_body_to_include = 'actors_public.php';
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	$page_body_to_include = $current_page_name;
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}
require('configure/application_bottom.php');

?>

