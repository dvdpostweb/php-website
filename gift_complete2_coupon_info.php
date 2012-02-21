<?php
require('configure/application_top.php');
if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$gift = tep_db_prepare_input($HTTP_POST_VARS['gift']);
$by_mail = tep_db_prepare_input($HTTP_POST_VARS['by_mail']);

tep_db_query("update activation_gift set coupon_template = '" . $gift  . "' , gift_pack = '" . $by_mail . "' where customers_id =  '" . $customer_id . "' order by activation_gift_id desc limit 1");

require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('gift_history_detail.php', '', 'SSL'));
?>