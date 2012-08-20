<?php 
require('configure/application_top.php');
require('includes/classes/actions.php');
$current_page_name = FILENAME_PASSWORD_FORGOTTEN;

include(DIR_WS_INCLUDES . 'translation.php');
	
  if ($HTTP_GET_VARS['action'] == 'process' ) {
	$HTTP_POST_VARS['email_address']=trim($HTTP_POST_VARS['email_address']);
	if(!empty($HTTP_POST_VARS['email_address']) && mail_verify($HTTP_POST_VARS['email_address']))
	{
		$error_password_form=0;
    	$check_customer = tep_db_query("select customers_firstname, customers_lastname, customers_password, customers_id from " . TABLE_CUSTOMERS . " where customers_email_address = '" .$HTTP_POST_VARS['email_address'] . "'");
    	if (tep_db_num_rows($check_customer)) {
      		$check_customer_values = tep_db_fetch_array($check_customer);
      		// Crypted password mods - create a new password, update the database and mail it to them
      		//$newpass = tep_create_password(ENTRY_PASSWORD_MIN_LENGTH);
      		//$crpted_password = crypt_password($newpass);
      		//$sql = sprintf("UPDATE " . TABLE_CUSTOMERS . " SET customers_password = '%s' WHERE customers_id = %d", $crpted_password, $check_customer_values['customers_id']);
      		//tep_db_query($sql);
	  		
			//creation of uniqid for change mdp
	
			$actions=new Actions();
			$uniqid=$actions->createKey($check_customer_values['customers_id'],2);
			$url='http://'.$host.'/actions.php?uniq_id='.$uniqid;
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
      
      		tep_mail($check_customer_values['customers_firstname'] . " " . $check_customer_values['customers_lastname'], $HTTP_POST_VARS['email_address'], EMAIL_PASSWORD_REMINDER_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
      		//tep_redirect(tep_href_link(FILENAME_LOGIN, 'info_message=' . urlencode(TEXT_PASSWORD_SENT), 'SSL', true, false));
		
    	} else {
      		$error_password_form=1;
    	}
	}else{
		$error_password_form=1;
	}
	$page_body_to_include = $current_page_name;
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/jacob_canvas_step_2010.php'));
	
	require('configure/application_bottom.php');
  } else {
	$error_password_form=0;
	$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
	
	$page_body_to_include = $current_page_name;
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/jacob_canvas_step_2010.php'));
	
	require('configure/application_bottom.php');
  }
?>