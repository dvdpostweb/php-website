<?php
require('configure/application_top.php');

$current_page_name = FILENAME_TEL;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/jacob_canvas_step_2010.php'));

require('configure/application_bottom.php');

?>