<?php
$logpwd=1;

require('configure/application_top.php');

$current_page_name = FILENAME_CREATE_ACCOUNT_SUCCESS;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

if (sizeof($navigation->snapshot) > 0) {
    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
    $navigation->clear_snapshot();
} else {
    $origin_href = tep_href_link(FILENAME_DEFAULT);
}

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>