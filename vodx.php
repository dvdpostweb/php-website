<?php
require('configure/application_top.php');
$current_page_name = 'vodx.php';


if (!tep_session_is_registered('customer_id')) {
	if(!empty($_GET['cat']))
		$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('cat'=>$_GET['cat'])));
	else
		$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
	$link=tep_href_link(FILENAME_LOGIN, ((!empty($_GET['email']))?'email='.$_GET['email']:''), 'SSL');
	tep_redirect($link);
}
  

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private_adult_vod.php'));

require('configure/application_bottom.php');

?>