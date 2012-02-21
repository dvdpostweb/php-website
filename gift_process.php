<?php 
require('configure/application_top.php');
if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);

//$customers_addr_query = tep_db_query("select * from address_book where customers_id = '" . $customer_id . "' and address_book_id  ='" . $customers['customers_default_address_id'] . "' ");
//$customers_addr = tep_db_fetch_array($customers_addr_query);

//insert gift_order
tep_db_query("insert into activation_gift (date, customers_id, products_id, duration, quantity, gifttype, firstname, lastname, message ) values (now(), '" . $customer_id . "', '" . $gift_products_id . "', '" . $gift_duration . "', 1, 1, '" . strtr($gift_firstname,"'","''") . "', '" . strtr($gift_lastname,"'","''") . "', '" . strtr($gift_message,"'","''") . "' ) ");
$insert_id = tep_db_insert_id();

//create_activation_code
$intflag_activation_code_unique=0;
while($intflag_activation_code_unique<1):	
	$stractivation_code = 'KDO' . rand(11111,99999)	;
	$actcode_unique_query = tep_db_query("select * from activation_code where activation_code = '" . $stractivation_code . "' ");
	$actcode_unique = tep_db_fetch_array($actcode_unique_query);
	if ($actcode_unique['activation_code_id'] > 0) {				
	}else{
		$intflag_activation_code_unique = 1;
	}
endwhile;

tep_session_register('stractivation_code');

//insert into act codes
tep_db_query("insert into activation_code (activation_code, activation_group, activation_group_id, activation_code_creation_date, activation_code_validto_date, activation_products_id, validity_type, validity_value, activation_waranty, comment ) values ('" . $stractivation_code . "', 2, '" . $insert_id . "', now(), DATE_ADD(now(), INTERVAL 3 MONTH), '" . $gift_products_id . "', 2, '" . $gift_duration . "', 0, 'gift cid:" . $customer_id . "' ) ");

//sponsoring?
if ($customers['customers_abo_type']> 0){	
	tep_db_query("update customers set customers_abo_validityto = DATE_ADD(customers_abo_validityto, INTERVAL 3 DAY) where customers_id = '" . $customer_id . "' ");
	tep_db_query("insert into sponsoring_used (date , father_id, father_abo_type , extra_days) values(now(), '" . $customer_id . "', '" . $customers['customers_abo_type'] . "' , 3) ");
}

//send mail
require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('gift_complete.php?gift_order_id=' . $insert_id, '', 'SSL'));
?>