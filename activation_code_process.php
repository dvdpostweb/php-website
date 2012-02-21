<?php 
require('configure/application_top.php');
if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$current_page_name = 'activation_code_process.php';

include(DIR_WS_INCLUDES . 'translation.php');

$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);
if ($customers[customers_abo] > 0){
    tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
}

$customers_addr_query = tep_db_query("select * from address_book where customers_id = '" . $customer_id . "' and address_book_id  ='" . $customers['customers_default_address_id'] . "' ");
$customers_addr = tep_db_fetch_array($customers_addr_query);

$code_query = tep_db_query("select * from activation_code where activation_code  = '" . $HTTP_POST_VARS['code'] . "' ");
$code = tep_db_fetch_array($code_query);

if ($code['activation_products_id']>0){
	
	$products_query = tep_db_query("select  p.products_title, p.products_price,  pa.qty_at_home ,  pa.qty_credit from products p left join products_abo pa on p.products_id = pa.products_id where p.products_id = '" . $code['activation_products_id'] . "' ");
	$products = tep_db_fetch_array($products_query);
	
	
	$tot = $products['products_price'];
	$products_model = $products['products_title'];
	$dvdnorm = $products['qty_at_home'];
	if ($code['abo_dvd_credit']==0)
	{
		$dvdcredit =  $products['qty_credit'];
	}
	else
	{
		$dvdcredit =$code['abo_dvd_credit'];
	}

	tep_db_query("update products set products_ordered  = products_ordered + 1 , products_quantity  = products_quantity - 1 where products_id = '" . $code['activation_products_id'] . "' ");
	//tep_db_query("insert into abo (Customerid, Action , Date , product_id) values ('" . $customer_id . "', 1, now(), '" . $code['activation_products_id'] . "' ) "); 
	tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, site) values ('" . $customer_id . "', 8, '" . $code['activation_id'] . "',now(), '" . $code['activation_products_id'] . "', '" . WEB_SITE_ID . "' ) "); //8 = abo from activation
	
	credit_history($customer_id  , $customers['customers_abo_dvd_credit'],$dvdcredit,10, $customers['customers_abo_type']);
	if ($code['next_abo_type'] > 0)
	{
		$next = $code['next_abo_type'];
	}
	else
	{
		$next = $code['activation_products_id'];
	}
	tep_db_query("update customers set customers_abo  = 1, customers_registration_step=100 , customers_abo_dvd_norm  = '" . $dvdnorm . "',customers_abo_dvd_credit = customers_abo_dvd_credit + " . $dvdcredit . " , customers_abo_auto_stop_next_reconduction=".$code['abo_auto_stop_next_reconduction']." ,customers_abo_type  = '" . $code['activation_products_id'] . "', customers_next_abo_type= '" . $next . "' , customers_abo_payment_method  = 3 , customers_next_discount_code  =". $code['next_discount']."  where customers_id = '" . $customer_id . "'");
	
	
	switch ($code['validity_type']){
	    case 1: //day
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' DAY)  where customers_id = '" . $customer_id . "'");
	    	$validity_mail=$code['validity_value'].' '.TEXT_DAYS;
		break;
	    case 2: //month
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' MONTH)  where customers_id = '" . $customer_id . "'");
	    	$validity_mail=$code['validity_value'].' '.TEXT_MONTHS;
		break;
	    case 3: //year
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' YEAR)  where customers_id = '" . $customer_id . "'");
	    	$validity_mail=$code['validity_value'].' '.TEXT_YEARS;
		break;
	}
	
	tep_db_query("update customers set customers_abo_rank  = 10 where customers_id = '" . $customer_id . "'");
	tep_db_query("update customers set customers_abo_start_rentthismonth  =0 where customers_id = '" . $customer_id . "'");
	/*if($code['abo_auto_stop_next_reconduction']==0 && $code['activation_waranty']==0)
	{*/
		$method_payement=3;
	/*}
	else
	{
		$method_payement=3;
	}*/
	tep_db_query("update customers set customers_abo_payment_method   = ".$method_payement." where customers_id = '" . $customer_id . "'");
	
	tep_db_query("update activation_code set customers_id = '" . $customer_id . "' where activation_id  = '" . $code['activation_id'] . "' ");
	tep_db_query("update activation_code set activation_date  = now() where activation_id  = '" . $code['activation_id'] . "' ");
	 
		$email_text = TEXT_MAIL2;
		
		$check_logo_query = tep_db_query("select logo from site where site_id = '" . WEB_SITE_ID . "'");
		$check_log_values = tep_db_fetch_array($check_logo_query);
		$logo = $check_log_values['logo'];
		
		$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
		$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
		$email_text = str_replace('µµµvalidity_mailµµµ',  $validity_mail , $email_text);
		$email_text = str_replace('µµµabo_typeµµµ',  $products_model , $email_text);
		
	  	tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], EMAIL_TEXT_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
		setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
}else{
	//no code_id
	tep_redirect(tep_href_link('activation_code.php', '', 'SSL'));	
}
?>