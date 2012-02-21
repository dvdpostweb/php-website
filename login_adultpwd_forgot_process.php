<?php
$logpwd=1;
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'SSL', 'page' => $current_page_name ));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
$current_page_name = FILENAME_LOGIN_ADULTPWD_FORGOT_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');
$cust_query = tep_db_query("select * from customers where customers_id = " . $customer_id . ";");
$cust = tep_db_fetch_array($cust_query);

$sql_update='update customers set adult_pwd="movix" where customers_id = '. $customer_id . ';';		

tep_db_query($sql_update);
$sql_insert="INSERT INTO `mail_messages_sent_history` (`mail_messages_sent_history_id` ,`date` ,`customers_id` ,`mail_messages_id`,`language_id` ,	`mail_opened` ,	`mail_opened_date` ,`customers_email_address`)
VALUES (NULL , now(), ".$customers_id.", '393', $languages_id, '0', NULL , '".$cust['customers_email_address']."'	);";
tep_db_query($sql_insert);
$mail_id=tep_db_insert_id();

$sql='SELECT * FROM mail_messages m where mail_messages_id =393 and language_id = '.$languages_id;

$mail_query = tep_db_query($sql);
$mail_values = tep_db_fetch_array($mail_query);
$email_text = $mail_values['messages_html'];
$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);

$email_text = str_replace('µµµcustomers_nameµµµ', $cust['customers_firstname'] . ' ' . $cust['customers_lastname'] , $email_text);
$email_text = str_replace('µµµpwdµµµ',  'movix' , $email_text);
tep_mail($cust['customers_firstname'] . ' ' . $cust['customers_lastname'], $cust['customers_email_address'], $mail_values['messages_title'], $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
		
require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link(FILENAME_LOGIN_ADULTPWD . '?mailsend=1', '', 'SSL'));

require('configure/application_bottom.php');

?>