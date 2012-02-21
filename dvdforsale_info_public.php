<?php
require('configure/application_top.php');

$current_page_name = "dvdforsale_info_public.php";

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>