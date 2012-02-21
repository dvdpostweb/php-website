<?
require('configure/application_top.php');
$sql= 'SELECT * FROM dvdpost_be_prod.mail_messages where mail_messages_id = 446';
$query_mail = tep_db_query($sql);
$mail_value = tep_db_fetch_array($query_mail);


$firstname = 'John';
$lastname = 'Doe';

$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);
$email_text = str_replace('$$$logo_dvdpost$$$', $logo , $mail_value['messages_html']);
$email_text = str_replace('$$$logo_dvdpost$$$', $logo , $email_text);	
$email_text = str_replace('$$$link$$$', $link , $email_text);			
$email_text = str_replace('$$$son_name$$$', ucwords($firstname) . ' ' . ucwords($lastname), $email_text);
$email_text = str_replace('$$$godfather_name$$$', ucwords($customers['customers_firstname']) . ' ' . ucwords($customers['customers_lastname']) , $email_text);
$email_text = str_replace('$$$strMailID$$$', $mem_get_mem_id, $email_text);
echo $email_text;
?>