<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if ($HTTP_POST_VARS['products_id']!=0){
	tep_db_query("update customers set customers_next_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_next_discount_code='" . $HTTP_POST_VARS['discount_code'] . "' , customers_abo_auto_stop_next_reconduction=0 where customers_id = '" . $customer_id . "'");
	require(DIR_WS_INCLUDES . 'stat.php');
	tep_redirect(tep_href_link('relaunch_tvv_complete.php', '', 'SSL'));
}else{tep_redirect(tep_href_link('relaunch_tvv.php', '', 'SSL'));}
?>
