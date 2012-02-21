<?php
require('configure/application_top.php');

$current_page_name = 'step1_mail.php';



//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

if ($customers_registration_step!=10){
		$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
	    $check_step_values = tep_db_fetch_array($check_step_query);
	    tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
	}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>