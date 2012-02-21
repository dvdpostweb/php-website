<?php 

require('configure/application_top.php');

$current_page_name = 'member_get_member_process.php';

include(DIR_WS_INCLUDES . 'translation.php');

if (!tep_session_is_registered('customer_id')) {
   $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'member_get_member.php'));
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

function mgm($mgmmail,$lastname,$firstname, $custid , $lang) {
	$mailerror = 0;
	$customers_query = tep_db_query("select * from customers where customers_id = '" . $custid . "' ");
	$customers = tep_db_fetch_array($customers_query);
	if(mail_verify($mgmmail )===false)
	{
		$mailerror = 1;
	}
	else
	{
		if ($customers['customers_email_address'] == $mgmmail) {
			$mailerror = 0;
		}else{
			$customers2_query = tep_db_query("select * from customers where customers_email_address = '" . trim($mgmmail) . "' and customers_abo = 1 ");
			$customers2 = tep_db_fetch_array($customers2_query);
			$customers3_query = tep_db_query("select * from mem_get_mem where email = '" . trim($mgmmail) . "'  ");
			$customers3 = tep_db_fetch_array($customers3_query);				
			if ($customers2['customers_id'] > 0 || $customers3['mem_get_mem_id'] > 0) {
				$mailerror = 1;
			}else{			
				tep_db_query("insert into mem_get_mem (customers_id, date, email, firstname,lastname,language) values ('" . $custid . "', now(), '" . $mgmmail . "', '". $firstname . "', '". $lastname . "', '" . $lang . "') ");
				$mem_get_mem_id = tep_db_insert_id();
				$sql= 'SELECT * FROM mail_messages where mail_messages_id = 446';
				$query_mail = tep_db_query($sql);
				$mail_value = tep_db_fetch_array($query_mail);
				$subject = $mail_value['messages_subject'];
				$subject = str_replace('$$$godfather_name$$$', ucwords($customers['customers_firstname']) . ' ' . ucwords($customers['customers_lastname']) , $subject);
				$email_text = $mail_value['messages_html'];
			
				$check_logo_query = tep_db_query("select * from site where site_id = '" . WEB_SITE_ID . "'");
				$check_log_values = tep_db_fetch_array($check_logo_query);
				$logo = $check_log_values['logo'];
				$link = $check_log_values['site_link'];
		
				$email_text = str_replace('$$$logo_dvdpost$$$', $logo , $email_text);
				$email_text = str_replace('$$$logo_dvdpost$$$', $logo , $email_text);	
		    $email_text = str_replace('$$$link$$$', $link , $email_text);			
				$email_text = str_replace('$$$son_name$$$', ucwords($firstname) . ' ' . ucwords($lastname), $email_text);
				$email_text = str_replace('$$$godfather_name$$$', ucwords($customers['customers_firstname']) . ' ' . ucwords($customers['customers_lastname']) , $email_text);
				$email_text = str_replace('$$$strMailID$$$', $mem_get_mem_id, $email_text);
				tep_mail('', $mgmmail, $subject, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
			}
		}
	}
	return $mailerror;
}

$error = 0;
$indice=1;
while(1==1){
	if (strlen($HTTP_POST_VARS['email'.$indice]) > 0){
		$error= mgm($HTTP_POST_VARS['email'.$indice],$HTTP_POST_VARS['name'.$indice],$HTTP_POST_VARS['surname'.$indice],$customer_id, $languages_id); 
		$indice++;
	}
	else
	{
		break;
	}
}


require(DIR_WS_INCLUDES . 'stat.php');
if ( $error > 0){
	tep_redirect(tep_href_link('member_get_member.php?mailsent=2#form_tool', '', 'SSL'));
}else{
	tep_redirect(tep_href_link('member_get_member.php?mailsent=1#form_tool', '', 'SSL'));
}
?>
