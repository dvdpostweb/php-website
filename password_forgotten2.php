<?php 
require('configure/application_top.php');
require('includes/classes/actions.php');
$current_page_name = FILENAME_PASSWORD_FORGOTTEN;

include(DIR_WS_INCLUDES . 'translation.php');
	
  if ($_GET['action'] == 'process') {
    $check_customer = tep_db_query("select customers_firstname, customers_lastname, customers_password, customers_id from " . TABLE_CUSTOMERS . " where customers_email_address = '" . $_GET['email'] . "'");
  	if (tep_db_num_rows($check_customer)) {
      $check_customer_values = tep_db_fetch_array($check_customer);
    // Crypted password mods - create a new password, update the database and mail it to them

	  $name=$check_customer_values['customers_firstname'].' '.$check_customer_values['customers_lastname'];
	  $check_logo_query = tep_db_query("select logo, site_link from site where site_id = '" . WEB_SITE_ID . "'");
	  $check_log_values = tep_db_fetch_array($check_logo_query);
	  $logo = $check_log_values['logo'];
	  $site_link = $check_log_values['site_link'];
      	$actions=new Actions();
		$uniqid=$actions->createKey($check_customer_values['customers_id'],2);
		$url_back = 	$url='http://'.$host.'/login_code.php?action=process&email='.$_GET['email'].'&code='.$_GET['code'].'&force='.$_GET['force'];
		$url_back=rawurlencode($url_back);
		$url='http://'.$host.'/actions.php?uniq_id='.$uniqid.'&url_back='.$url_back;
		$name=$check_customer_values['customers_firstname'].' '.$check_customer_values['customers_lastname'];
		$check_logo_query = tep_db_query("select logo, site_link from site where site_id = '" . WEB_SITE_ID . "'");
		$check_log_values = tep_db_fetch_array($check_logo_query);
		$logo = $check_log_values['logo'];
		$site_link = $check_log_values['site_link'];

		$email_text = EMAIL_PASSWORD_REMINDER_BODY; //sprintf(EMAIL_PASSWORD_REMINDER_BODY, $newpass)
		$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
		$email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
		$email_text = str_replace('µµµREMOTE_ADDRµµµ', $REMOTE_ADDR , $email_text);
		$email_text = str_replace('[url]', $url , $email_text);
		// $email_text = str_replace('µµµpasswordµµµ', $newpass , $email_text);
		$email_text = str_replace('µµµcustomers_lastnameµµµ', $name , $email_text);

		tep_mail($check_customer_values['customers_firstname'] . " " . $check_customer_values['customers_lastname'], $_GET['email'], EMAIL_PASSWORD_REMINDER_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
      tep_redirect(tep_href_link('login_code.php', 'info=1&email_address='.$_GET['email'].'&code='.$_GET['code']."&force=".$_GET['force'], 'SSL', true, false));
    } else {
      tep_redirect(tep_href_link(FILENAME_PASSWORD_FORGOTTEN, 'email=nonexistent', 'SSL'));
    }
  }
  ?>