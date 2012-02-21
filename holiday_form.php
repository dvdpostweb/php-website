<?php
require('configure/application_top.php');

$current_page_name = 'holiday_form.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

include(DIR_WS_INCLUDES . 'canvas_switcher.php');

require('configure/application_bottom.php');

?>