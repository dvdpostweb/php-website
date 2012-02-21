<?php 
require('configure/application_top.php');

$current_page_name = 'promo.php';

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
	$error=true;
if (!tep_session_is_registered('customer_id')) {
}else{
	$code=trim(strtolower($_POST['code']));
	$sql_user='SELECT qty_credit ,customers_abo_payment_method_name,customers_abo_dvd_credit,customers_abo_type
	FROM `products_abo` p
	JOIN customers c ON c.customers_abo_type = p.products_id
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id ='.$customer_id;
	$query_user=tep_db_query($sql_user,'db_link',true);
	$value_user=tep_db_fetch_array($query_user);
	
	if(!empty($value_user['customers_abo_payment_method_name']))
	{
		$payment=strtoupper($value_user['customers_abo_payment_method_name']);
	}
	else
	{
		$payment='UNDEFINED';
	}
	if($value_user['qty_credit']==0)
	{
		$error_text=ERROR_ILLIMITED;	
	}
	else
	{
		if(!empty($code))
		{
		
			$sql='select *,if(activation_code_validto_date > now(), 1, 0) as expired from activation_code where activation_code like "'.$code.'"';
			$query=tep_db_query($sql,'db_link',true);
			if($value=tep_db_fetch_array($query))
			{
				$sql_test='SELECT *	FROM `abo` a join activation_code ac on a.code_id = ac.activation_id WHERE `Action` in (1,5,6,8,9) and customerid='.$customer_id.' order by abo_id desc limit 1 ';
				
				$query_test=tep_db_query($sql_test);
				$value_test=tep_db_fetch_array($query_test);
				$nb=tep_db_num_rows($query_test);
				if($nb>0)
				{
						if(strpos($value_test['activation_code'],'sod')===0)
						{
							$nb2=1;
						}
						else
						{
							$sql_test2='SELECT * FROM `abo`	WHERE `Action` =7 and abo_id > '.$value_test['abo_id'].' and customerid='.$customer_id.' order by abo_id desc limit 1';
							$query_test2=tep_db_query($sql_test2);
							$nb2=tep_db_num_rows($query_test2);
						}
					
				}
				$expired=$value['expired'];
				$combined_action=$value['combined_action'];
			
				if($nb2==0)
				{
					$error_text=ERROR_FREETEST;
				}
				else
				{
					if ($expired==0)
					{
						$error_text=ERROR_EXPIRED;
					}
					else
					{
						if($value['customers_id']>0)
						{
							$error_text=ERROR_CODE_ALREADY_USED;
						}
						else{
							if($combined_action=='NO')
							{
								$error_text=ERROR_NO_COMBINED;
							}
							else{
								$sql_test='SELECT *	FROM `abo`	WHERE `Action` =15 and customerid='.$customer_id;
								$query_test=tep_db_query($sql_test,'db_link',true);
								$nb=tep_db_num_rows($query_test);

								if($nb>0)
								{
									$error_text=ERROR_CUSTOMERS_USE_PROMO_ALREADY;
								}
								else
								{
							
									$sql_abo='insert into abo(customerid,Action,Date,code_id,payment_method,comment,site) values ('.$customer_id.',15,now(),'.$value['activation_id'].',"'.$payment.'","add credit ('.$value['abo_dvd_credit'].')",'.WEB_SITE_ID.')';
									tep_db_query($sql_abo);
									$sql_activation='update activation_code set customers_id ='.$customer_id.', activation_date = now() where activation_code = "'.$code.'"';
									tep_db_query($sql_activation);
									
									
									credit_history($customer_id  , $value_user['customers_abo_dvd_credit'],$value['abo_dvd_credit'],9, $value_user['customers_abo_type']);
									
									$sql_customers='update customers set customers_abo_dvd_credit=customers_abo_dvd_credit+'.$value['abo_dvd_credit'].' where customers_id ='.$customer_id;
									tep_db_query($sql_customers);
									tep_redirect('/promo.php?finish=1');
									$error=false;	
								}
						
							}	
						}
					}
				}
			
			}
			else
			{
				$error_text=ERROR_CODE_NOT_EXISTED;
			}
		}
	}
	$page_body_to_include = $current_page_name;
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}
require('configure/application_bottom.php');
?>

