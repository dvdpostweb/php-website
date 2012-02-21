<?php  
require('configure/application_top.php');
$current_page_name = 'change_client_password.php';
include(DIR_WS_INCLUDES . 'translation.php');


$user_query = tep_db_query("select count(*) as cpt from customers where customers_id='".$HTTP_GET_VARS['customer']."' and customers_email_address='".$HTTP_GET_VARS['email']."' ");
$user = tep_db_fetch_array($user_query); 
if($user['cpt']==1){
	$user_info_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from customers where customers_id='".$HTTP_GET_VARS['customer']."' ");
	$user_info = tep_db_fetch_array($user_info_query);
	$new_pass=substr($user_info['customers_firstname'],0,4).rand(1, 9).rand(1, 9).rand(1, 9);
	$crypted_pass=md5($new_pass);
	$cust_email=$user_info['customers_email_address'];
	$cust_id=$HTTP_GET_VARS['customer'];
	
	//EMAIL PREPARATION
    $email_text = TEXT_MAIL;
	$check_logo_query = tep_db_query("select logo , site_link  from site where site_id = '" . WEB_SITE_ID . "'");
    $check_log_values = tep_db_fetch_array($check_logo_query);
	$logo = $check_log_values['logo'];
	$site_link=$check_log_values['site_link'];
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
	$email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
    $email_text = str_replace('µµµemailµµµ', $cust_email , $email_text);
    $email_text = str_replace('µµµpassµµµ', $new_pass , $email_text);    
    tep_mail($cust_email, $cust_email, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
	
	tep_db_query("update customers set customers_password = '".$crypted_pass."' where customers_id = '".$HTTP_GET_VARS['customer']."'");
} 


$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

