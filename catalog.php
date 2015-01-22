<?php
require('configure/application_top.php');

header('Location: '.ruby_host().$lang_short.'/products?jacob='.$jacob);
$memcache_available=true; 

$current_page_name = FILENAME_CATALOG;

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

$meta1 =TEXT_META_TITLE1B ;
$meta1 = str_replace('µµµcountµµµ',  $cpt_catalog , $meta1);
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));

require('configure/application_bottom.php');

?>