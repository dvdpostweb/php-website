<?php
require('configure/application_top.php');

$current_page_name = 'gfc50_confirm.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
$products_id=$HTTP_POST_VARS['products_id'];
$customers_next_discount_code=$HTTP_POST_VARS['discount_code'];

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));


require('configure/application_bottom.php');
?>