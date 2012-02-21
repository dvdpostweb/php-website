<?php 
$discount_info_sql = tep_db_query("SELECT discount_code, discount_code_id, listing_products_allowed from discount_code WHERE  landing_page_php= '".$current_page_name."' ");
$discount_info_values = tep_db_fetch_array($discount_info_sql);

if ($discount_info_values['listing_products_allowed'] != NULL){
	$products_discount_sql = tep_db_query("SELECT p.products_id from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id where p.products_id in (". $discount_info_values['listing_products_allowed'] . ") and pa.allowed_public_entity like '%".ENTITY_ID."%'  ");
	$products_discount_values = tep_db_fetch_array($products_discount_sql);
}
	
if (!tep_session_is_registered('customer_id')) {
	$url="step1.php?activation_code=".$discount_info_values['discount_code'];
  }else{
	if ($discount_info_values['listing_products_allowed']==NULL){
		$url="step3.php?discount_code_id=".$discount_info_values['discount_code_id'];
	}else{
		$url="step_subscription_info.php?products_id=".$products_discount_values['products_id']."&discount_code_id=".$discount_info_values['discount_code_id'];
	}
}
?>