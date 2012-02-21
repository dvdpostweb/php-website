<?php

require('configure/application_top.php');


if (!tep_session_is_registered('customer_id')) {
   $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'sponsoring.php'));
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

if (strlen($HTTP_POST_VARS['email1']) > 0){
	tep_db_query("insert into sponsoring (customers_id, sponsoring_date, email, sponsoring_language) values ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['email1'] . "', '" . $languages_id . "') ");
}
if (strlen($HTTP_POST_VARS['email2']) > 0){
	tep_db_query("insert into sponsoring (customers_id, sponsoring_date, email, sponsoring_language) values ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['email2'] . "', '" . $languages_id . "') ");
}
if (strlen($HTTP_POST_VARS['email3']) > 0){
	tep_db_query("insert into sponsoring (customers_id, sponsoring_date, email, sponsoring_language) values ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['email3'] . "' , '" . $languages_id . "') ");
}
if (strlen($HTTP_POST_VARS['email4']) > 0){
	tep_db_query("insert into sponsoring (customers_id, sponsoring_date, email, sponsoring_language) values ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['email4'] . "' , '" . $languages_id . "') ");
}
if (strlen($HTTP_POST_VARS['email5']) > 0){
	tep_db_query("insert into sponsoring (customers_id, sponsoring_date, email, sponsoring_language) values ('" . $customer_id . "', now(), '" . $HTTP_POST_VARS['email5'] . "', '" . $languages_id . "')  ");
}
require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('mysponsoring.php', '', 'SSL'));
?>
