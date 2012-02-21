<?php  
require('configure/application_top.php');
$current_page_name = 'cinefriends.php';
include(DIR_WS_INCLUDES . 'translation.php');
$page_body_to_include = $current_page_name;
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_light.php',0,$jacob));

require('configure/application_bottom.php');

?>
