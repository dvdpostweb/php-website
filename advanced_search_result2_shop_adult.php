<?php
require('configure/application_top.php');

$current_page_name = 'advanced_search_result2_shop_adult.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_adult.php'));

require('configure/application_bottom.php');

?>