<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
  
  tep_db_query("update customers set ogone_exp_date  = '" . $HTTP_POST_VARS['new_date_exp'] . "' where customers_id =  '" . $customer_id  . "' ");
  tep_db_query("update customers set ogone_cc_expiration_status   = 2 where customers_id =  '" . $customer_id  . "' ");
  tep_db_query("insert into cc_expiration_status_history (customers_id, new_value, old_value, date_added )values('" . $customer_id . "', 2, 1, now()) ");

  tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));

?>
