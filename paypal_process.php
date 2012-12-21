<?php
require('configure/application_top.php');
require_once('./paypal/CallerService.php');

$token=urlencode($_REQUEST['token']);
$nvpStr="&TOKEN=$token";
$resArray=hash_call("CreateBillingAgreement",$nvpStr);
$ack = strtoupper($resArray["ACK"]);

if($ack!="SUCCESS")
{
	$_SESSION['reshash']=$resArray;
	tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'payment error', serialize($resArray).'.'.$customer_id, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
	die('paypal error');
}
$agreement_id = $resArray['BILLINGAGREEMENTID'];

$sql_update = "update customers set paypal_agreement_id = '".$agreement_id."' where customers_id = ".$customer_id;
tep_db_query($sql_update);
$sql="SELECT * from customers c WHERE customers_id ='".$customer_id. "'";
$customer_query = tep_db_query($sql);
$customer_values = tep_db_fetch_array($customer_query);
$sql_product="select * from products_abo where products_id = " . $customer_values['customers_abo_type'];
$products_abo_query = tep_db_query($sql_product,'db',true);
$products_abo = tep_db_fetch_array($products_abo_query);
if($languages_id<1){
	$languages_id=1;
}
if($customer_values['activation_discount_code_type']=='A')
{
  registration_activation($customer_values['activation_discount_code_id'], $customer_id,$customer_values['customers_abo_type'], 'wwww',$languages_id ,'PAYPAL',556,4);
} else
{
  registration_discount($customer_values['activation_discount_code_id'],$customer_id,$customer_values['customers_abo_type'],'www', $languages_id,0,'PAYPAL',556,4,$agreement_id);
}
setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('customers_id', $ogone_check['customers_id'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('email_address', $customers['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('first_name', $customers['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
$customer_id = $ogone_check['customers_id'];
tep_session_register('customer_id');

header("location: http://" . $_SERVER["SERVER_NAME"] . "/step4.php?type=paypal");

?>

