<?php

require('configure/application_top.php');


if (!tep_session_is_registered('customer_id')) {
   $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'mydvdpost.php'));
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

		$custabo_query = tep_db_query("select *, UNIX_TIMESTAMP(customers_abo_validityto) - UNIX_TIMESTAMP(now()) as ced from customers c LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id where customers_id = '" . $customer_id . "' ");
		$custabo = tep_db_fetch_array($custabo_query);
		
		$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $custabo['customers_abo_type']);
		$products_abo = tep_db_fetch_array($products_abo_query);
		$DVD_credit= $products_abo['qty_credit'];
		
		if ($custabo['customers_abo'] > 0 and $DVD_credit>0)
		{
			
			
			tep_db_query("update customers set customers_abo_validityto = now() , customers_abo_auto_stop_next_reconduction = 0 , customers_locked__for_reconduction=0 where customers_id = '" . $customer_id . "' ");
			
			
			
			if(!empty($custabo['customers_abo_payment_method_name']))
			{
				$payment=strtoupper($custabo['customers_abo_payment_method_name']);
			}
			else
			{
				$payment='UNDEFINED';
			}
			$sql_insert="insert into abo (Customerid, Action , Date , product_id, payment_method,comment,site) values 
			('" . $customer_id . "', 13 ,now(), '" .$custabo['customers_abo_type'] . "' , '".$payment."','".floor($custabo['ced']/86400)." (site)',".WEB_SITE_ID." ) ";
			tep_db_query($sql_insert);
						
		}
		

tep_redirect(tep_href_link('mydvdpost.php', '', 'SSL'));
?>
