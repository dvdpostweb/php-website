<?php
$act_code ="SELECT activation_id,next_discount,activation_group,activation_products_id from activation_code where activation_code='".$code."'";
$act_code_query = tep_db_query($act_code);			  
if ($act_code_values = tep_db_fetch_array($act_code_query)){
	$activation_discount_code_id=$act_code_values['activation_id'];
	if ($act_code_values['activation_group']==3){
			switch($act_code_values['activation_products_id']){
				case 5:
					$hd_products=18;
					break;
				case 6:
					$hd_products=20;
					break;
				case 7:
					$hd_products=22;
					break;
				default:	
					$hd_products=$act_code_values['activation_products_id'];
					break;
			}
			tep_db_query("update activation_code set activation_products_id = ".$hd_products." where activation_code = '".$code."'");
				
		}
	
	$activation_discount_code_type="A";
	$activation_discount_next=$act_code_values['next_discount'];
	$allisok =1;
	$payment_type='activation';
	$products=$act_code_values['activation_products_id'];
}else{
	$disc_code ="SELECT * from discount_code where discount_code='".$code."'";
	$disc_code_query = tep_db_query($disc_code);
	$disc_code_values = tep_db_fetch_array($disc_code_query);
	$activation_discount_code_id=$disc_code_values['discount_code_id'];
	$activation_discount_code_type="D";
	$activation_discount_next=$disc_code_values['next_discount'];
	$allisok =1;
	$payment_type='norm';
	$products=$disc_code_values['listing_products_allowed'];
}
if (tep_session_is_registered('customer_id')) {
	$check_abo="select customers_abo,customers_registration_step from customers where customers_id=".$customer_id;
	$check_abo_query = tep_db_query($check_abo);
	$check_abo_values = tep_db_fetch_array($check_abo_query);
	if ($disc_code_values['listing_products_allowed'] == 21)
  {	
  	$step = 21;
	}
	else
	{
    if ($check_abo_values['customers_registration_step'] == 90 )
  	{
  		$step = 33;
  	}
  	else
  	{
  		$step = $check_abo_values['customers_registration_step'];
  	}	  
	}
	$sql="select CodeDesc2 from generalglobalcode where CodeValue = '" . $step. "' AND  CodeType='STEP'";
	$check_step_query = tep_db_query($sql);
	
	$check_step_values = tep_db_fetch_array($check_step_query);
	if ($check_abo_values['customers_abo']<1 && $activation_discount_code_id >0  ){
		if ($activation_discount_code_type=="A"){
				$activation_query = tep_db_query("select * from activation_code where activation_code = '" . $code . "' and customers_id=0 ");
				if ($activation = tep_db_fetch_array($activation_query)){
					if ($activation['next_abo_type'] > 0)
					{
						$next = $activation['next_abo_type'];
					}
					else
					{
						$next = $activation['activation_products_id'];
					}
					
						tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$activation['activation_products_id']."'  where customers_id = '" . $customer_id . "'");					
						tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
							 
				} 
		}
		if($activation_discount_code_type=="D"){
			$sql= "select *, gc.CodeDesc2 from discount_code dc LEFT JOIN generalglobalcode gc on gc.CodeValue=dc.goto_step where discount_status=1 AND discount_code = '" . strtoupper($code) . "' ";
			$code_query = tep_db_query($sql);
			$code_data = tep_db_fetch_array($code_query);
			if($code_data['discount_status'] < 1 or $code_data['discount_limit'] < 1){
				$allisok = 0;
				$strreason= TEXT_DISCOUNT_EXPIRED;				
			}
			if($code_data['bypass_discountuse'] < 1){									
				$use_query = tep_db_query("select * from discount_use where customers_id  = '" . $customer_id . "' and discount_use_date > DATE_sub(now(), INTERVAL " . $code_data['discount_nbr_month_before_reuse'] . " MONTH)");
				if ($use = tep_db_fetch_array($use_query)){
					$allisok = 0;
					$strreason= TEXT_DISCOUNT_ALREADY_USED;					
				}else{
					if ($code_data['goto_step']==31 || $code_data['goto_step']==32) {
						if ($code_data['next_abo_type'] > 0)
						{
							$next = $code_data['next_abo_type'];
						}
						else
						{
							$next = $code_data['listing_products_allowed'];
						}
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$code_data['listing_products_allowed']."'  where customers_id = '" . $customer_id . "'");
					}
					tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
					
					tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
					
				}
			}else{
					if ($code_data['goto_step']==31 || $code_data['goto_step']==32) {
						if ($code_data['next_abo_type'] > 0)
						{
							$next = $code_data['next_abo_type'];
						}
						else
						{
							$next = $code_data['listing_products_allowed'];
						}
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$code_data['listing_products_allowed']."'  where customers_id = '" . $customer_id . "'");
					}
					$sql="update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'";
					tep_db_query($sql);
					tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
					
				}
		}else{
				$allisok = 0;
				$strreason= TEXT_WRONG_DISCOUNT;	
		}	
	}
	
	
	
}
?>