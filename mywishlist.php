<?php
ini_set('display_errors','1'); 
require('configure/application_top.php');
$wlcust_query = tep_db_query("select wishlist_kind from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$wlcust = tep_db_fetch_array($wlcust_query);

switch($wlcust['wishlist_kind']){
	case 1:
		$current_page_name = 'mywishlist.php';
	break;
	case 2:
		$current_page_name = 'mywishlist2.php';
	break;
}

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => $current_page_name ));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	tep_redirect(tep_href_link('index.php', '', 'SSL'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}


require('configure/application_bottom.php');
?>