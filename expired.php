<?php
// Un peu de sécurité
    
	
require('configure/application_top.php');

$current_page_name = 'expired.php';

include(DIR_WS_INCLUDES . 'translation.php');

include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/expired.php'));


require('configure/application_bottom.php');

?>