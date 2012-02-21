<?php
$lang_available=array(1=>'FR',2=>'NL');
require('../../configure/application_top.php');

$current_page_name = 'concours/lunchpass/index.php';
$quizzid=34;
//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
$available_lang=array(1,2);
if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
}

require('../../configure/application_bottom.php');

?>