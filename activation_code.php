<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'activation_code.php' ));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$current_page_name = FILENAME_ACTIVATION_CODE;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>