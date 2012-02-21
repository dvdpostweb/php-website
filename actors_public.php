<?php
require('configure/application_top.php');
//die();
$current_page_name = FILENAME_ACTORS_PUBLIC;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
$page_body_to_include = $current_page_name;

$meta_query = tep_db_query("select * from actors where actors_id = '" . $HTTP_GET_VARS['actors_id'] . "' ");
$meta_value = tep_db_fetch_array($meta_query);	
$strmeta = $meta_value['actors_name'];	    	
if($meta_value['actors_type']=='DVD_ADULT'){
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_movix.php'));
}
else
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
require('configure/application_bottom.php');

?>