<?php
require('configure/application_top.php');

$current_page_name = 'step1_mail_process.php';

include(DIR_WS_INCLUDES . 'translation.php');

$check_customer_query = tep_db_query("select customers_id,customers_email_address, customers_default_address_id , customers_registration_step from customers where customers_email_address = '" . $mail . "' ");
$check_customer = tep_db_fetch_array($check_customer_query);
//IF EMAIL EXIST - DO UPDATE
if ($mail == $check_customer['customers_email_address'] && $check_customer['customers_registration_step'] <=20 ){	
	tep_db_query("update customers set customers_registration_step= 20 where customers_registration_step<=20 AND customers_email_address = '" . $mail . "'");
	$customers_registration_step=20;
	tep_session_register('customers_registration_step'); 
	setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));

	if (!tep_session_is_registered('customer_id')) {
		$customer_id = $check_customer['customers_id'];
		$email_address =$check_customer['customers_email_address'];
		//REGISTER CUSTOMER SESSION
	    tep_session_register('customer_id');
	    tep_session_register('customer_default_address_id');
	       	
	    setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	    setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));    
	}
		
	$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
	$check_step_values = tep_db_fetch_array($check_step_query);
	tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
}else {tep_redirect(tep_href_link('step1.php'));}
?>