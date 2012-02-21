<?php 
require('configure/application_top.php');

$current_page_name = 'domiciliation70_pending.php';
$page_body_to_include = $current_page_name;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
if( $customers_registration_step==100){
	tep_redirect(tep_href_link('mydvdpost.php'));
	die();
}
if($_GET['change']==1)
{
	tep_db_query("update customers set domiciliation_status=0 where customers_id = '" . $customer_id . "'");
	tep_redirect(tep_href_link('step3b.php'));
	die();
	
}
if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('step1.php'));
	die();
}else{
	$sql='select * from customers c
	left join address_book a on a.customers_id = c.customers_id and address_book_id = 1
	where c.customers_id='.$customer_id;
	$sql_query=tep_db_query($sql,'db_link',true);
	$customers_value=tep_db_fetch_array($sql_query);
	
	
	if(!empty($_POST['confirm']) && $customers_value['customers_registration_step']==70 ){
	if($_POST['confirm']=='letter')
	{
		tep_db_query("update customers set domiciliation_status=7,customers_info_date_account_last_modified=now() where customers_id = '" . $customer_id . "'");
		$mail_id=414;
	}
	else 	if($_POST['confirm']=='download')
	{
		tep_db_query("update customers set domiciliation_status=6,customers_info_date_account_last_modified=now() where customers_id = '" . $customer_id . "'");
		$mail_id=413;
	}
	
	$sql='SELECT * FROM mail_messages m where mail_messages_id ='.$mail_id.' and language_id = '.$languages_id;

	$mail_query = tep_db_query($sql);
	$mail_values = tep_db_fetch_array($mail_query);
	$email_text = $mail_values['messages_html'];
//	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);
	
	$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
	
	$email_text = str_replace('$$$name$$$', $name , $email_text);
	$email_text = str_replace('$$$url$$$',  'http://'.$host.'/step3b.php' , $email_text);
	$email_text = str_replace('$$$url_form$$$',  'http://'.$host.'/images/pdf_dom70/dom_form_'.$lang_short.'.pdf' , $email_text);
	$email_text = str_replace('$$$url_letter$$$',  'http://'.$host.'/domiciliation70_confirm.php?confirm=letter' , $email_text);
	
	
	
	$city=$customers_value['entry_postcode'].' '.$customers_value['entry_city'];
	
	$address= $customers_value['entry_street_address'];					
	$email_text=str_replace('$$$name$$$',$name,$email_text);
	$email_text=str_replace('$$$address$$$',$address,$email_text);
	$email_text=str_replace('$$$city$$$',$city,$email_text);
	$email_text = str_replace('$$$site_link$$$',  'http://'.$host , $email_text);
	
	
	$email=$customers_value['customers_email_address'];
	tep_mail($email, $email, $mail_values['messages_title'], $email_text, 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
	
}
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));
		require('configure/application_bottom.php');
}
?>