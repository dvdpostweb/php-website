<?php 
require('configure/application_top.php');
$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$customers_values = tep_db_fetch_array($customers);

if($customers_values['customers_newsletter']>0){
	$sql_data_array = array('customers_newsletter' => 0);
	tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . tep_db_input($customer_id) . "'");		
}else{
	$sql_data_array = array('customers_newsletter' => 1);
	tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . tep_db_input($customer_id) . "'");
	}
tep_redirect(tep_href_link(FILENAME_MY_PROFILE, '', 'SSL'));
			
?>



