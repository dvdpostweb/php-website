<?php

if($_GET['confirm']=='letter_end')
{
	tep_db_query("update customers set domiciliation_status=7,customers_info_date_account_last_modified=now() where customers_id = '" . $customer_id . "'");
	$mail_id=431;
}
else 	if($_GET['confirm']=='download_end')
{
	tep_db_query("update customers set domiciliation_status=6,customers_info_date_account_last_modified=now() where customers_id = '" . $customer_id . "'");
	$mail_id=431;
}

$sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$customer_id.',16,now(),'.$customers_value['customers_abo_type'].',"DOMICILIATION","payment method change (site)",'.WEB_SITE_ID.')';
tep_db_query($sql_abo);
$sql='SELECT * FROM mail_messages m where mail_messages_id ='.$mail_id.' and language_id = '.$languages_id;

$mail_query = tep_db_query($sql);
$mail_values = tep_db_fetch_array($mail_query);
$email_text = $mail_values['messages_html'];
//	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);

$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);

$email_text = str_replace('$$$name$$$', $name , $email_text);
$email_text = str_replace('$$$url$$$',  'http://'.$host.'/payment_method_change.php' , $email_text);
$email_text = str_replace('$$$url_form$$$',  'http://'.$host.'/images/pdf_dom70/dom_form_'.$lang_short.'.pdf' , $email_text);
$email_text = str_replace('$$$url_letter$$$',  'http://'.$host.'/payment_method_change.php?payment=domiciliation&confirm=letter' , $email_text);



$city=$customers_value['entry_postcode'].' '.$customers_value['entry_city'];

$address= $customers_value['entry_street_address'];					
$email_text=str_replace('$$$name$$$',$name,$email_text);
$email_text=str_replace('$$$address$$$',$address,$email_text);
$email_text=str_replace('$$$city$$$',$city,$email_text);
$email_text = str_replace('$$$site_link$$$',  'http://'.$host , $email_text);


$email=$customers_value['customers_email_address'];

tep_mail($email, $email, $mail_values['messages_title'], $email_text, 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
?>
<p><?= TEXT_PAYMENT_DOMICILIATION_END;?></p>