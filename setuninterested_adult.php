<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
tep_db_query("insert into products_uninterested_adult (products_id, date , customers_id) values ('" . $HTTP_GET_VARS['movieid'] . "', now(), '" . $customer_id . "') ");
tep_redirect($HTTP_GET_VARS['url']);
}
  require(DIR_WS_INCLUDES . 'stat.php');

?>
