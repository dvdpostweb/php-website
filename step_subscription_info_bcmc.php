<?php
require('configure/application_top.php');

$current_page_name = 'step_subscription_info_bcmc.php';

if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&discount_code_id=' .$HTTP_GET_VARS['discount_code_id'] ));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

if ($HTTP_GET_VARS['products_id']<2) {
	tep_redirect(tep_href_link(FILENAME_SUBSCRIPTION, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>