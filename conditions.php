<?php
require('configure/application_top.php');

$current_page_name = FILENAME_CONDITIONS;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php',0,$jacob));

require('configure/application_bottom.php');

?>