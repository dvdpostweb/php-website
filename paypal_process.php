<?php
require('configure/application_top.php');
require_once('./paypal/CallerService.php');

$token=urlencode($_REQUEST['token']);
$nvpStr="&TOKEN=$token";
$resArray=hash_call("CreateBillingAgreement",$nvpStr);
$ack = strtoupper($resArray["ACK"]);
$res = serialize($resArray);
tep_session_register('customer_id');
	$_SESSION['reshash']=$resArray;
	$data = ' customers_id => '.$customer_id.' query => '.$nvpStr.' res => '. $res;
	if($ack!="SUCCESS"){
	  tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'paypal process payment error', $data, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
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
if(empty($languages_id))
{
  $languages_id=1;
}
if($customer_values['activation_discount_code_type']=='A')
{
  registration_activation($customer_values['activation_discount_code_id'], $customer_id,$customer_values['customers_abo_type'], 'wwww',$languages_id ,'PAYPAL',645,4);
} else
{
  registration_discount($customer_values['activation_discount_code_id'],$customer_id,$customer_values['customers_abo_type'],'www', $languages_id,0,'PAYPAL',645,4,$agreement_id);
}
setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('customers_id', $customer_values['customers_id'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('email_address', $customer_values['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
setcookie('first_name', $customer_values['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
tep_session_register('customer_id');

header("location: http://" . $_SERVER["SERVER_NAME"] . "/step4.php?type=paypal");

?>

