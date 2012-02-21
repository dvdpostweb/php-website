<?php
require('configure/application_top.php');

$current_page_name = FILENAME_DIRECTORS_PUBLIC;

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

$meta_query = tep_db_query("select * from directors where directors_id = '" . $HTTP_GET_VARS['directors_id'] . "' ");
$meta_value = tep_db_fetch_array($meta_query);	
$strmeta = $meta_value['directors_name'];	    	


include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));

require('configure/application_bottom.php');

?>