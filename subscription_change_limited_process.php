<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if(empty($HTTP_POST_VARS['products_id']))
{
	tep_redirect(tep_href_link('subscription_change_limited.php', '', 'SSL'));
}
$abo_active ='SELECT c.customers_id, c.customers_abo_dvd_norm ,customers_abo_dvd_credit, c.customers_abo_dvd_adult , pa.qty_credit,customers_locked__for_reconduction as locked FROM products_abo pa LEFT JOIN customers c ON c.customers_abo_type = pa.products_id WHERE c.customers_id ='.$customers_id ;
$abo_active_query = tep_db_query($abo_active);
$abo_active_values = tep_db_fetch_array($abo_active_query);

$abo_next ='SELECT qty_credit, qty_at_home FROM products_abo WHERE products_id ='.$HTTP_POST_VARS['products_id'] ;
$abo_next_query = tep_db_query($abo_next);
$abo_next_values = tep_db_fetch_array($abo_next_query);

$total=$abo_next_values['qty_at_home'];
$qtynorm=$abo_active_values['customers_abo_dvd_norm'];
$qtyadult=$abo_active_values['customers_abo_dvd_adult'];

if ($total <> $qtynorm + $qtyadult)
{// upgrade
	if($total > $qtynorm + $qtyadult){
		$qtynorm = $total - $qtyadult;
    }    
    else // downgrade
	{
		if($total > $qtynorm)
		{
			$qtyadult = $total - $qtynorm;
		}
        if( $total > $qtyadult)
		{
			$qtynorm = $total - $qtyadult;
		}
		if($total <= $qtynorm && $total <= $qtyadult)
 		{
			if( $qtynorm >= $qtyadult )
			{
                   $qtynorm = $total;
                   $qtyadult = 0;
            }   
			else
            {      $qtyadult = $total;
                   $qtynorm = 0;
            }  
		}
	}
}               

if ($abo_active_values['customers_abo_dvd_norm'] + $abo_active_values['customers_abo_dvd_adult']==4){
	
$dvd_norm=$abo_active_values['customers_abo_dvd_norm'];
$dvd_adult=$abo_active_values['customers_abo_dvd_adult'];
}else{
$dvd_norm=$abo_next_values['qty_at_home']-$abo_active_values['customers_abo_dvd_adult'];
$dvd_adult=$abo_active_values['customers_abo_dvd_adult'];	
}

if ($HTTP_POST_VARS['products_id']!=0){
	
	
	$number_dvd_query = tep_db_query("SELECT customers_abo_dvd_norm, customers_abo_dvd_adult, customers_abo_payment_method_name
	FROM customers c
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id=". $customer_id);
	$number_dvd_values = tep_db_fetch_array($number_dvd_query);
	if(!empty($number_dvd_values['customers_abo_payment_method_name']))
	{
		$payment=strtoupper($number_dvd_values['customers_abo_payment_method_name']);
	}
	else
	{
		$payment='UNDEFINED';
	}
		
	if ($abo_next_values['qty_credit']==$abo_active_values['qty_credit']+2 && $abo_active_values['locked'] == 0){
		tep_db_query("insert into abo (Customerid, Action, Date, product_id, payment_method, comment, site) values ('" . $customer_id . "', 14 ,now(), '" . $HTTP_POST_VARS['products_id'] . "' , '".$payment."', 'FREE UPGRADE', ".WEB_SITE_ID." ) "); 
		
		credit_history($customer_id  , $abo_active_values['customers_abo_dvd_credit'],2,6);
		
		tep_db_query("update customers set customers_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_abo_dvd_credit=customers_abo_dvd_credit+2, customers_locked__for_reconduction=1 ,  customers_abo_dvd_norm='".$qtynorm."', customers_abo_dvd_adult='".$qtyadult."'  where customers_id = '" . $customer_id . "'");
		$number_dvd_query = tep_db_query("SELECT customers_abo_dvd_norm, customers_abo_dvd_adult ,customers_abo_payment_method_name
		FROM customers c
		LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
		where customers_id=". $customer_id );
		$number_dvd_values = tep_db_fetch_array($number_dvd_query);
	}else{
		tep_db_query("update customers set customers_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_abo_dvd_norm='".$qtynorm."', customers_abo_dvd_adult='".$qtyadult."'  where customers_id = '" . $customer_id . "'");
	
		if($abo_next_values['qty_credit']>$abo_active_values['qty_credit'])
			tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method,comment,site) values ('" . $customer_id . "', 2 ,now(), '" . $HTTP_POST_VARS['products_id'] . "' , '".$payment."','site',".WEB_SITE_ID." ) ");
		else	
			tep_db_query("insert into abo (Customerid, Action , Date , product_id,payment_method, comment,site) values ('" . $customer_id . "', 3 ,now(), '" . $HTTP_POST_VARS['products_id'] . "' , '".$payment."','site',".WEB_SITE_ID." ) ");
		
	}

	
	// remove Activation_discount infos
	// if activation then remove infos concerning this promo 
	
	$abo_cust_query = tep_db_query("SELECT activation_discount_code_type FROM customers where customers_id='". $customer_id ."' ");
	$abo_cust_values = tep_db_fetch_array($abo_cust_query);
	
		
	tep_db_query("update customers set customers_next_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_abo_auto_stop_next_reconduction=0 where customers_id = '" . $customer_id . "'");


	tep_redirect(tep_href_link('subscription_change_limited_complete.php', '', 'SSL'));
}else{tep_redirect(tep_href_link('subscription_change_limited.php', '', 'SSL'));}
?>
