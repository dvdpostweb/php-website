<?php
require('configure/application_top.php');



  $querystring = '';
  foreach($HTTP_GET_VARS as $k=>$v) {
      $querystring .= $k.'='.$v.'&';
  }
  substr($querystring, 0, -1);
  tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'ogone test', $querystring, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
$sql="select * from ogone_check where orderid = '" . $HTTP_GET_VARS['orderID'] . "' ";
$ogone_check_query = tep_db_query($sql,'db',true);
$ogone_check = tep_db_fetch_array($ogone_check_query);
$customers_query = tep_db_query("select * from customers where customers_id = '" . $ogone_check['customers_id'] . "' ",'db',true);
$customers = tep_db_fetch_array($customers_query);
$customers_addr_query = tep_db_query("select * from address_book where customers_id = '" . $ogone_check['customers_id'] . "' and address_book_id  ='" . $customers['customers_default_address_id'] . "' ",'db',true);
$customers_addr = tep_db_fetch_array($customers_addr_query);
if ($ogone_check['products_id']>0)
{
	$sql_product="select * from products_abo where products_id = " . $ogone_check['products_id'];
	$products_abo_query = tep_db_query($sql_product,'db',true);
	$products_abo = tep_db_fetch_array($products_abo_query);
}

$languages_id = $customers['customers_language'];
if($languages_id<1){
	$languages_id=1;
}
tep_session_register('languages_id');

$current_page_name = 'ogone_process.php';

include(DIR_WS_INCLUDES . 'translation.php');
$sql_query = "update customers set ppv_status_id = 1, ogone_owner='".addslashes($customers['customers_firstname'])." ".addslashes($customers['customers_lastname'])."' , ogone_exp_date ='" . $HTTP_GET_VARS['ED'] . "' , ogone_card_no='" . $HTTP_GET_VARS['CARDNO'] . "' , ogone_card_type='" . $HTTP_GET_VARS['BRAND'] . "' where customers_id = '" . $ogone_check['customers_id'] . "' ";
tep_db_query($sql_query); 
$check_logo_query = tep_db_query("select logo from site where site_id = '" . WEB_SITE_ID . "'");
$check_log_values = tep_db_fetch_array($check_logo_query);
$logo = $check_log_values['logo'];
switch ($ogone_check['context']){
case 'payment_method_change':
	$sql_update='update customers set customers_abo_payment_method=1 where customers_id ='.$ogone_check['customers_id'];
	tep_db_query($sql_update);
	$sql_user='SELECT qty_credit ,customers_abo_payment_method_name,customers_firstname,customers_lastname,customers_email_address,customers_abo_type
	FROM `products_abo` p
	JOIN customers c ON c.customers_abo_type = p.products_id
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id ='.$ogone_check['customers_id'];
	
	$query_user=tep_db_query($sql_user,'db_link',true);
	$value_user=tep_db_fetch_array($query_user);
	$email=$value_user['customers_email_address'];
	if(!empty($value_user['customers_abo_payment_method_name']))
	{
		$payment=strtoupper($value_user['customers_abo_payment_method_name']);
	}
	else
	{
		$payment='UNDEFINED';
	}
	$sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$ogone_check['customers_id'].',16,now(),'.$value_user['customers_abo_type'].',"'.$payment.'","payment method change (site)",'.WEB_SITE_ID.')';
	tep_db_query($sql_abo);
	
	
	
	
	$mail_id=430;
	$sql='SELECT * FROM mail_messages m where mail_messages_id ='.$mail_id.' and language_id = '.$languages_id;
	$mail_query = tep_db_query($sql);
	$mail_values = tep_db_fetch_array($mail_query);
	$email_text = $mail_values['messages_html'];
	//	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);

	$name=ucfirst($value_user['customers_firstname']).' '.ucfirst($value_user['customers_lastname']);




	$email_text=str_replace('$$$name$$$',$name,$email_text);
	$email_text = str_replace('$$$site_link$$$',  'http://'.$host , $email_text);

	switch($languages_id)
	{
		case 2:
			$lang='nl';
			break;
		case 3:
			$lang='en';
			break;
		default:
			$lang='fr';
	}
	
	tep_mail($email, $email, $mail_values['messages_title'], $email_text, 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
	header("location: http://private.dvdpost.com/".$lang."/customers/".$ogone_check['customers_id']."/payment_methods?type=credit_card_finish");
break;
case 'ogone_change':
	$sql_update='update customers set customers_abo_payment_method=1 where customers_id ='.$ogone_check['customers_id'];
	tep_db_query($sql_update);
	$sql_user='SELECT qty_credit ,customers_abo_payment_method_name,customers_firstname,customers_lastname,customers_email_address,customers_abo_type
	FROM `products_abo` p
	JOIN customers c ON c.customers_abo_type = p.products_id
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id ='.$ogone_check['customers_id'];
	
	$query_user=tep_db_query($sql_user,'db_link',true);
	$value_user=tep_db_fetch_array($query_user);
	$email=$value_user['customers_email_address'];
	if(!empty($value_user['customers_abo_payment_method_name']))
	{
		$payment=strtoupper($value_user['customers_abo_payment_method_name']);
	}
	else
	{
		$payment='UNDEFINED';
	}
	switch($languages_id)
	{
		case 2:
			$lang='nl';
			break;
		case 3:
			$lang='en';
			break;
		default:
			$lang='fr';
	}
	$sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$ogone_check['customers_id'].',18,now(),'.$value_user['customers_abo_type'].',"'.$payment.'","(site)",'.WEB_SITE_ID.')';
	tep_db_query($sql_abo);
	
	
	
	
	header("location: http://private.dvdpost.com/".$lang."/customers/".$ogone_check['customers_id']."/payment_methods?type=credit_card_modification_finish");
break;
case 'ogone_for_ppv':
	$sql_user='SELECT qty_credit ,customers_abo_payment_method_name,customers_firstname,customers_lastname,customers_email_address,customers_abo_type
	FROM `products_abo` p
	JOIN customers c ON c.customers_abo_type = p.products_id
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id ='.$ogone_check['customers_id'];
	
	$query_user=tep_db_query($sql_user,'db_link',true);
	$value_user=tep_db_fetch_array($query_user);
	$email=$value_user['customers_email_address'];
	if(!empty($value_user['customers_abo_payment_method_name']))
	{
		$payment=strtoupper($value_user['customers_abo_payment_method_name']);
	}
	else
	{
		$payment='UNDEFINED';
	}
	switch($languages_id)
	{
		case 2:
			$lang='nl';
			break;
		case 3:
			$lang='en';
			break;
		default:
			$lang='fr';
	}
	$sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$ogone_check['customers_id'].',28,now(),'.$value_user['customers_abo_type'].',"'.$payment.'","(site)",'.WEB_SITE_ID.')';
	tep_db_query($sql_abo);
	
	
	
	
	header("location: http://private.dvdpost.com/".$lang."/customers/".$ogone_check['customers_id']."/payment_methods?type=credit_card_for_ppv_finish");
break;
case 'gift':	
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
	
	tep_db_query("insert into activation_gift (date, customers_id, products_id, duration, quantity, gifttype, firstname, lastname, message, activation_code ) values (now(), '" . $ogone_check['customers_id'] . "', '" .  $ogone_check['products_id'] . "', '" . $ogone_check['gift_duration'] . "', 1, 1, '" . strtr($ogone_check['gift_firstname'],"'","''") . "', '" . strtr($ogone_check['gift_lastname'],"'","''") . "', '" . strtr($ogone_check['gift_message'],"'","''") . "' , '". $stractivation_code . "') ");
	$insert_id = tep_db_insert_id();
	
	//insert into act codes
	tep_db_query("insert into activation_code (activation_code, activation_group, activation_group_id, activation_code_creation_date, activation_code_validto_date, activation_products_id, validity_type, validity_value, activation_waranty, comment ) values ('" . $stractivation_code . "', 2, '" . $insert_id . "', now(), DATE_ADD(now(), INTERVAL 3 MONTH), '" . $ogone_check['products_id'] . "', 2, '" . $ogone_check['gift_duration'] . "', 0, 'gift cid:" . $ogone_check['customers_id'] . "' ) ");
	
	//sponsoring?
	//if ($customers['customers_abo_type']> 0){	
	//	tep_db_query("update customers set customers_abo_validityto = DATE_ADD(customers_abo_validityto, INTERVAL 3 DAY) where customers_id = '" . $ogone_check['customers_id'] . "' ");
	//	tep_db_query("insert into sponsoring_used (date , father_id, father_abo_type , extra_days) values(now(), '" . $ogone_check['customers_id'] . "', '" . $customers['customers_abo_type'] . "' , 3) ");
	//}
	
	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $ogone_check['products_id'] . "' and pd.products_id = '" . $ogone_check['products_id'] . "' and pd.language_id = '3' ");
  	$product_info_values = tep_db_fetch_array($product_info);					  		
	
  	switch($ogone_check['products_id']){
	  	case 2:
	  		$abo_explain = '1 DVD at the same time' ;
	  	break;
	  	case 5:
	  		$abo_explain = '1 DVD at the same time' ;
	  	break;
	  	case 6:
	  		$abo_explain = '2 DVD at the same time' ;
	  	break;
	  	case 7:
	  		$abo_explain = '3 DVD at the same time' ;
	  	break;
	  	case 8:
	  		$abo_explain = '4 DVD at the same time' ;
	  	break;
	  	case 9:
	  		$abo_explain = '5 DVD at the same time' ;
	  	break;
	}
	
	$email_text = TEXT_MAIL_GIFTS;
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
	$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
	$email_text = str_replace('µµµABO_NAMEµµµ', $product_info_values['products_name'] , $email_text);
	$email_text = str_replace('µµµABO_EXPLAINµµµ',  $abo_explain , $email_text);
	$email_text = str_replace('µµµABO_DURATIONµµµ', $ogone_check['gift_duration'] , $email_text);
	$email_text = str_replace('µµµABO_CODEµµµ', $stractivation_code , $email_text);
	
  	tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], EMAIL_TEXT_SUBJECT_KDO, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

		
	header("location: http://" . $_SERVER["SERVER_NAME"] . "/gift_complete2.php");
break;	

case 'activation':
	
	if ($customers['customers_abo'] == 0)
	{
		registration_activation($ogone_check['activation_code_id'],$ogone_check['customers_id'],$ogone_check['products_id'],$ogone_check['site'],$languages_id );
		#$vod = 'insert into beta_tests values (NULL,'.$ogone_check['customers_id'].')';
		#tep_db_query($vod);	    	    				
	}
	setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('customers_id', $ogone_check['customers_id'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('email_address', $customers['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('first_name', $customers['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
	$customer_id = $ogone_check['customers_id'];
	tep_session_register('customer_id');

	
  header("location: http://" . $_SERVER["SERVER_NAME"] . "/step4.php?type=ogone");

break;	

case 'norm':
	//MGM
	if ($customers['customers_abo'] == 0)
	{
		registration_discount($ogone_check['discount_code_id'],$ogone_check['customers_id'],$ogone_check['products_id'],$ogone_check['site'],$languages_id,$ogone_check['belgiqueloisirs_id']);
		#$vod = 'insert into beta_tests values (NULL,'.$ogone_check['customers_id'].')';
		#tep_db_query($vod);	    	    				
		
	}
	setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('customers_id', $ogone_check['customers_id'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('email_address', $customers['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('first_name', $customers['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
	$customer_id = $ogone_check['customers_id'];
	tep_session_register('customer_id');

	header("location: http://" . $_SERVER["SERVER_NAME"] . "/step4.php?type=ogone");
break;	

case 'bcmc':
	//MGM
	$first_time = tep_db_query("select * from abo where customerid = '" . $ogone_check['customers_id'] . "' ");
	$first_time_value = tep_db_fetch_array($first_time);	
	if ($first_time_value['abo_id']>0){
	}else{	
		$query_mgm = tep_db_query("select * from mem_get_mem where email = '" . $customers['customers_email_address'] . "' order by mem_get_mem_id  ");
		while ($query_mgm_value = tep_db_fetch_array($query_mgm)) {
			if($query_mgm_value['mem_get_mem_id']>0){
				//give 200 to new customers
				//update customers points
				tep_db_query("update customers set mgm_points= 200 where customers_id = '" . $ogone_check['customers_id'] . "' ");	    	    				
				//insert into point history
				tep_db_query("insert into customers_points_history (customers_id, date, action, sub_action, points ) values ('" . $ogone_check['customers_id'] . "', now(), 1, 2, 200) ");	    	    				
				$father = tep_db_query("select * from customers where customers_id = '" . $query_mgm_value['customers_id'] . "' ");
				$father_value = tep_db_fetch_array($father);	
				if ($father_value['customers_abo']>0){
					tep_db_query("insert into mem_get_mem_used (date, father_id, father_abo_type, son_id , son_abo_type , points ) values (now(), '" . $query_mgm_value['customers_id'] . "', '" . $father_value['customers_abo_type'] . "', '" . $ogone_check['customers_id'] . "', '" . $ogone_check['products_id'] . "', '200' )");	    	    				
					//update customers points
					tep_db_query("update customers set mgm_points= mgm_points + 200 where customers_id = '" . $query_mgm_value['customers_id'] . "' ");	    	    				
					//insert into point history
					tep_db_query("insert into  customers_points_history (customers_id, date, action, sub_action, points ) values ('" . $query_mgm_value['customers_id'] . "', now(), 1, 1, 200) ");	    	    				
					
					break;  // on sort dela boucle while ???
				}
			}
		}
	}

	if ($ogone_check['discount_code_id'] < 1){
		//norm
		tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method, site) values ('" . $ogone_check['customers_id'] . "', 1 ,now(), '" . $ogone_check['products_id'] . "' , 'bcmc', '" . $ogone_check['site'] . "') "); 
		tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL 1 MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
	}else{
		//discount
		$code_query_disc = tep_db_query("select * from discount_code where discount_code_id  = '" . $ogone_check['discount_code_id'] . "' ");
		$code_disc = tep_db_fetch_array($code_query_disc);
		tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $ogone_check['customers_id'] . "', 6, '" . $ogone_check['discount_code_id']  . "' ,now(), '" . $ogone_check['products_id'] . "' , 'ogone', '" . $ogone_check['site'] . "') "); 
		tep_db_query("insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('" . $ogone_check['discount_code_id']  . "', now(), '" . $ogone_check['customers_id'] . "' )");
		tep_db_query("update discount_code set discount_limit = discount_limit  -1 where  discount_code_id  = '" . $ogone_check['discount_code_id']  . "' ");
		tep_db_query("update customers set activation_discount_code_id=".$ogone_check['discount_code_id'].", customers_abo_validityto  = DATE_ADD(now(), INTERVAL 1 MONTH), customers_abo_auto_stop_next_reconduction =".$code_disc['abo_auto_stop_next_reconduction']." , customers_next_discount_code  =". $code_disc['next_discount']."   where customers_id = '" . $ogone_check['customers_id'] . "'");
	
		
		switch ($code_disc['discount_abo_validityto_type']){
			case 1:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;
			case 2:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;
			case 3:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_abo_validityto_value'] . " YEAR)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;		
		}
		//recurring discount
		if ($code_disc['discount_recurring_nbr_of_month'] > 0 ){
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(now(), INTERVAL " . $code_disc['discount_recurring_nbr_of_month'] . " MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(customers_abo_discount_recurring_to_date , INTERVAL 1 DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
		}
	}
	
	tep_db_query("update products set products_quantity  = products_quantity - 1 where products_id = '" . $ogone_check['products_id'] . "' ");
	tep_db_query("update products set products_ordered  = products_ordered + 1 where products_id = '" . $ogone_check['products_id'] . "' "); 
		
	tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=95 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_type  = '" . $ogone_check['products_id'] . "',  customers_next_abo_type = '" . $ogone_check['products_id'] . "' where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_start_rentthismonth  =0 where customers_id = '" . $ogone_check['customers_id'] . "'");
	//RALPH-001 START
	if ($code_disc['abo_dvd_credit'] > 0 )
	{
		tep_db_query("update customers set customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $ogone_check['customers_id'] . "'");
		tep_db_query("update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $code_disc['abo_dvd_credit']." where customers_id = '" . $ogone_check['customers_id'] . "'");				
	}
	else
	{
		tep_db_query("update customers set customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $ogone_check['customers_id'] . "'");
		tep_db_query("update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $products_abo['qty_credit']." where customers_id = '" . $ogone_check['customers_id'] . "'");		
    }

	tep_db_query("update customers set customers_abo_payment_method  = 17 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_rank  = 15 where customers_id = '" . $ogone_check['customers_id'] . "'");
	
	
	//belgiqueloisirs_id
	if (strlen($ogone_check['belgiqueloisirs_id']) > 0 ){		
		tep_db_query("update customers set belgiqueloisirs_id = '" . $ogone_check['belgiqueloisirs_id'] . "' where customers_id = '" . $ogone_check['customers_id'] . "'");
	}

  	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $ogone_check['products_id'] . "' and pd.products_id = '" . $ogone_check['products_id'] . "' and pd.language_id = '3' ");
  	$product_info_values = tep_db_fetch_array($product_info);					  		
	
	$email_text = TEXT_MAIL;
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
	$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
	$email_text = str_replace('µµµabo_typeµµµ',  $product_info_values['products_name'] , $email_text);
	$email_text = str_replace('µµµpay_methodµµµ', 'Ogone' , $email_text);
	$email_text = str_replace('µµµcustomers_emailµµµ',  $customers['customers_email_address'] , $email_text);
	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);	
	
  	tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], EMAIL_TEXT_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
	setcookie('customers_registration_step', 95 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	/*if(!empty($_COOKIE['partner']))
	{
		$site=$_COOKIE['partner'];
		setcookie('customers_registration_step', 95 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1),$_COOKIE['partner']);
	}
	else
	{
		$site=SITE_ID;
	}*/
	$site=$_SERVER["SERVER_NAME"];
	header("location: http://" . $site. "/step4.php?type=ogone");
break;	


case 'as_reconduction_upfront':
	
	//discount
	tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $ogone_check['customers_id'] . "', 6, '109' ,now(), '5' , 'ogone', '" . $ogone_check['site'] . "') "); 
	tep_db_query("insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('109', now(), '" . $ogone_check['customers_id'] . "' )");
	tep_db_query("update discount_code set discount_limit = discount_limit  -1 where  discount_code_id  = '109' ");
	tep_db_query("update customers set activation_discount_code_id=".$ogone_check['discount_code_id'].", customers_abo_validityto  = DATE_ADD(now(), INTERVAL 3 MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
		
	tep_db_query("update products set products_quantity  = products_quantity - 1 where products_id = '5' ");
	tep_db_query("update products set products_ordered  = products_ordered + 1 where products_id = '5' "); 
		
	tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=95 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_type  = '5',  customers_next_abo_type = 5 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_dvd_norm  = 1 where customers_id = '" . $ogone_check['customers_id'] . "'");
		
	tep_db_query("update customers set customers_abo_payment_method  = 1 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_rank  = 15 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_start_rentthismonth  =0 where customers_id = '" . $ogone_check['customers_id'] . "'");
	setcookie('customers_registration_step', 95 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));		
	header("location: http://" . $_SERVER["SERVER_NAME"] . "/abo_google_ogone_conf.php");
break;

case 'giftz_offer':	
	tep_db_query("insert into abo (Customerid, Action , code_id, Date , product_id, payment_method, site) values ('" . $ogone_check['customers_id'] . "', 6, '" . $ogone_check['discount_code_id']  . "' ,now(), '" . $ogone_check['products_id'] . "' , 'ogone', '" . $ogone_check['site'] . "') "); 
	tep_db_query("insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('" . $ogone_check['discount_code_id']  . "', now(), '" . $ogone_check['customers_id'] . "' )");
	tep_db_query("update discount_code set discount_limit = discount_limit  -1 where  discount_code_id  = '" . $ogone_check['discount_code_id']  . "' ");
	tep_db_query("update customers set activation_discount_code_id=".$ogone_check['discount_code_id'].", customers_abo_validityto  = DATE_ADD(now(), INTERVAL 1 MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		

	tep_db_query("update products set products_quantity  = products_quantity - 1 where products_id = '" . $ogone_check['products_id'] . "' ");
	tep_db_query("update products set products_ordered  = products_ordered + 1 where products_id = '" . $ogone_check['products_id'] . "' "); 
		
	tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=95 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_type  = '" . $ogone_check['products_id'] . "',  customers_next_abo_type = '" . $ogone_check['products_id'] . "' where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_start_rentthismonth  =0 where customers_id = '" . $ogone_check['customers_id'] . "'");
	
	tep_db_query("update customers set customers_abo_dvd_norm  =". $products_abo['qty_at_home']." where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_dvd_credit  = customers_abo_dvd_credit + ". $products_abo['qty_credit']." where customers_id = '" . $ogone_check['customers_id'] . "'");

	tep_db_query("update customers set customers_abo_payment_method  = 1 where customers_id = '" . $ogone_check['customers_id'] . "'");
	tep_db_query("update customers set customers_abo_rank  = 15 where customers_id = '" . $ogone_check['customers_id'] . "'");

  	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $ogone_check['products_id'] . "' and pd.products_id = '" . $ogone_check['products_id'] . "' and pd.language_id = '3' ");
  	$product_info_values = tep_db_fetch_array($product_info);					  		
	$sql_insert="INSERT INTO `mail_messages_sent_history` (`mail_messages_sent_history_id` ,`date` ,`customers_id` ,`mail_messages_id`,`language_id` ,	`mail_opened` ,	`mail_opened_date` ,`customers_email_address`)
	VALUES (NULL , now(), ".$ogone_check['customers_id'].", '322', $languages_id, '0', NULL , '".$customers['customers_email_address']."'	);";
	tep_db_query($sql_insert);
	$mail_id=tep_db_insert_id();
	
	$sql='SELECT * FROM mail_messages m where mail_messages_id =322 and language_id = '.$languages_id;
	
	$mail_query = tep_db_query($sql);
	$mail_values = tep_db_fetch_array($mail_query);
	$email_text = $mail_values['messages_html'];
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
	$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
	$email_text = str_replace('µµµabo_typeµµµ',  $product_info_values['products_name'] , $email_text);
	$email_text = str_replace('µµµpay_methodµµµ', 'Ogone' , $email_text);
	$email_text = str_replace('µµµcustomers_emailµµµ',  $customers['customers_email_address'] , $email_text);
	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);
  	
tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], $mail_values['messages_title'], $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
  	
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
	
	tep_db_query("insert into activation_gift (date, customers_id, products_id, duration, quantity, gifttype, firstname, lastname, message, activation_code, gift_pack ) values (now(), '" . $ogone_check['customers_id'] . "', '" .  $ogone_check['products_id'] . "', '1', 1, 1, '', '', 'news87' , '". $stractivation_code . "', 1) ");
	$insert_id = tep_db_insert_id();
	
	//insert into act codes
	tep_db_query("insert into activation_code (activation_code, activation_group, activation_group_id, activation_code_creation_date, activation_code_validto_date, activation_products_id, validity_type, validity_value, activation_waranty, comment ) values ('" . $stractivation_code . "', 2, '" . $insert_id . "', now(), DATE_ADD(now(), INTERVAL 3 MONTH), '" . $ogone_check['products_id'] . "', 2, '1', 0, 'gift cid:" . $ogone_check['customers_id'] . "' ) ");
		
	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $ogone_check['products_id'] . "' and pd.products_id = '" . $ogone_check['products_id'] . "' and pd.language_id = '3' ");
  	$product_info_values = tep_db_fetch_array($product_info);					  		
	
  	switch($ogone_check['products_id']){
	  	case 2:
	  		$abo_explain = '1 DVD at the same time' ;
	  	break;
	  	case 5:
	  		$abo_explain = '1 DVD at the same time' ;
	  	break;
	  	case 6:
	  		$abo_explain = '2 DVD at the same time' ;
	  	break;
	  	case 7:
	  		$abo_explain = '3 DVD at the same time' ;
	  	break;
	  	case 8:
	  		$abo_explain = '4 DVD at the same time' ;
	  	break;
	  	case 9:
	  		$abo_explain = '5 DVD at the same time' ;
	  	break;
	}
	
	$email_text = TEXT_MAIL_GIFTS;
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
	$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $email_text);
	$email_text = str_replace('µµµABO_NAMEµµµ', $product_info_values['products_name'] , $email_text);
	$email_text = str_replace('µµµABO_EXPLAINµµµ',  $abo_explain , $email_text);
	$email_text = str_replace('µµµABO_DURATIONµµµ', $ogone_check['gift_duration'] , $email_text);
	$email_text = str_replace('µµµABO_CODEµµµ', $stractivation_code , $email_text);
	
  	tep_mail($customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $customers['customers_email_address'], EMAIL_TEXT_SUBJECT_KDO, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

		
	header("location: http://" . $_SERVER["SERVER_NAME"] . "/gift_history_detail.php");
break;	


case 'dvdsale':
	//only products single
	//$dvdsale_query = tep_db_query("select * from shopping_cart where customers_id = '" . $ogone_check['customers_id'] . "' and products_id > 0");
	$dvdsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') or (p.products_type = 'BUY')) and customers_id = '" . $ogone_check['customers_id'] . "' and sc.products_id > 0",'db',true); //BEN001
	$list_id='';
   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
   	    $type=$dvdsale['products_type'];
   	    if($type=='DVD_NORM')
   	        $state='EX_RENTAL';
   	    else
   	        $state='ACCESSORY';
		tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price, discount_code_id , products_type, products_state, order_id) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $dvdsale['products_id'] . "','" . $dvdsale['quantity'] . "',1," . $dvdsale['quantity'] * $dvdsale['price'] . " ,  '" . $ogone_check['discount_code_id'] . "' , '".$type."', '".$state."', ".$HTTP_GET_VARS['orderID']." )");
		$insert_id = tep_db_insert_id();
		$list_id.=$insert_id .',';
		tep_db_query("insert into shopping_orders_status_history ( shopping_orders_id , new_value, old_value, date_added ) values ( '" . $insert_id . "', 1, 0, now()  )");
		tep_db_query("update products set  quantity_to_sale =  quantity_to_sale - '". $dvdsale['quantity'] . "' where products_id = '" . $dvdsale['products_id'] . "' ");
		tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");	   	
		$totdvd= $totdvd + $dvdsale['quantity'];
	}
		
  
	//only box
	$sql="select * from shopping_cart where customers_id = '" . $ogone_check['customers_id'] . "' and shopping_box_id > 0 ";
	$dvdsale_query = tep_db_query($sql,'db',true);
	//$dvdsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where p.products_type = 'DVD_NORM' and customers_id = '" . $ogone_check['customers_id'] . "' and shopping_box_id > 0"); //BEN001
	
   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
	   	//NB on va diviser le proc du coffret en le niomnre de item dans le coffret, comme cela la somme = pros du coffret.
		$box_query = tep_db_query("select * from shopping_box where shopping_box_id = '" . $dvdsale['shopping_box_id'] . "' ");
		$box = tep_db_fetch_array($box_query);

		$boxsale_query = tep_db_query("select * from shopping_box_products_id where shopping_box_id = '" . $dvdsale['shopping_box_id'] . "' ",'db',true);
	   	while ($boxsale = tep_db_fetch_array($boxsale_query)) {   	
			//tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $boxsale['products_id'] . "','" . $dvdsale['quantity'] . "',1," . $dvdsale['quantity'] * $dvdsale['price'] / $box['nbr_items'] . "  )");
			tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price, discount_code_id , products_type, products_state ) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $boxsale['products_id'] . "','" . $dvdsale['quantity'] . "',1," . $dvdsale['quantity'] * $dvdsale['price'] / $box['nbr_items'] . " ,  '" . $ogone_check['discount_code_id'] . "' , 'DVD_NORM', 'EX_RENTAL'  )");
			
			$insert_id = tep_db_insert_id();
			$list_id.=$insert_id .',';
			tep_db_query("insert into shopping_orders_status_history ( shopping_orders_id , new_value, old_value, date_added ) values ( '" . $insert_id . "', 1, 0, now()  )");
			//pas de products_quantity pour les coffrets
			//tep_db_query("update products set  quantity_to_sale =  quantity_to_sale - '". $dvdsale['quantity'] . "' where products_id = '" . $boxsale['products_id'] . "' ");
			tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");	   	
			$totdvd= $totdvd + $dvdsale['quantity'];
		}
		
		tep_db_query("update shopping_box set  quantity_to_sale =  quantity_to_sale - '". $dvdsale['quantity'] . "' where shopping_box_id = '" . $dvdsale['shopping_box_id'] . "' ");
	}
	$list_id = substr($list_id, 0,-1);
	$decshipping_fee =shipping(21,$totdvd);
		
	tep_db_query("insert into shopping_orders_shipping_fee (customers_id, date, shipping_fee) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $decshipping_fee. "'  )");
	switch($languages_id)
	{
		case 2:
			$lang='nl';
			break;
		case 3:
			$lang='en';
			break;
		default:
			$lang='fr';
	}
	header("location: http://private.dvdpost.com/".$lang."/shopping_orders/".$HTTP_GET_VARS['orderID']."?list=".$list_id);
break;	

case 'dvdsale_adult':

	$dvdsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where customers_id = '" . $ogone_check['customers_id'] . "' and products_type = 'DVD_ADULT' and p.products_product_type= 'Movie' ",'db',true); //BEN001
   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
		tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $dvdsale['products_id'] . "','" . $dvdsale['quantity'] . "',1, " . $dvdsale['quantity'] * $dvdsale['price'] . "  )");
		$insert_id = tep_db_insert_id();
		tep_db_query("insert into shopping_orders_status_history ( shopping_orders_id , new_value, old_value, date_added ) values ( '" . $insert_id . "', 1, 0, now()  )");
		
		tep_db_query("update products set  quantity_to_sale =  quantity_to_sale - '". $dvdsale['quantity'] . "' where products_id = '" . $dvdsale['products_id'] . "' ");
		//tep_db_query("update products_adult set  products_quantity =  products_quantity - '". $dvdsale['quantity'] . "' where products_id = '" . $dvdsale['products_id'] . "' ");
		//BEN001 tep_db_query("delete from shopping_cart_adult where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");
		tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'"); //BEN001 
		$totdvd= $totdvd + $dvdsale['quantity'];
	   	
	}
	$decshipping_fee =shipping(21,$totdvd);
	
	tep_db_query("insert into shopping_orders_shipping_fee (customers_id, date, shipping_fee) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $decshipping_fee. "'  )");


	header("location: http://" . $_SERVER["SERVER_NAME"] . "/shopping_complete_adult.php");
break;	

case 'dvdsale_new_adult':

	$dvdsale_query = tep_db_query("select * from shopping_cart_new where customers_id = '" . $ogone_check['customers_id'] . "' ",'db',true);
   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
		//tep_db_query("insert into shopping_orders_new (customers_id, date, products_id, quantity, status, price ) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $dvdsale['products_id'] . "','" . $dvdsale['quantity'] . "',1 , " . $dvdsale['quantity'] * $dvdsale['price'] . " )");
		tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price, products_type, products_state) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $dvdsale['products_id'] . "','" . $dvdsale['quantity'] . "',1," . $dvdsale['quantity'] * $dvdsale['price'] . " , 'DVD_ADULT', 'NEW' )");
		$insert_id = tep_db_insert_id();
		//tep_db_query("insert into shopping_orders_new_status_history ( shopping_orders_id , new_value, old_value, date_added ) values ( '" . $insert_id . "', 1, 0, now()  )");
		tep_db_query("insert into shopping_orders_status_history ( shopping_orders_id , new_value, old_value, date_added ) values ( '" . $insert_id . "', 1, 0, now()  )");
		
		tep_db_query("update products set  quantity_new_to_sale =  quantity_new_to_sale - '". $dvdsale['quantity'] . "' where products_id = '" . $dvdsale['products_id'] . "' ");
		tep_db_query("delete from shopping_cart_new where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");
		//BEN001 tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'"); //BEN001
		$totdvd= $totdvd + $dvdsale['quantity'];	   	
	}
	$decshipping_fee =shipping(21,$totdvd);
	
	tep_db_query("insert into shopping_orders_shipping_fee (customers_id, date, shipping_fee) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $decshipping_fee. "'  )");
	

	header("location: http://" . $_SERVER["SERVER_NAME"] . "/shopping_complete_new_adult.php");
break;	

case 'droselia_credit':
	
	$dvdsale_query = tep_db_query("select * from shopping_cart where customers_id = '" . $ogone_check['customers_id'] . "' and products_type ='VOD' order by 1 desc limit 1 ",'db',true);
	if($dvdsale = tep_db_fetch_array($dvdsale_query)) {
		tep_db_query("insert into shopping_orders (customers_id, date, products_id, quantity, status, price, discount_code_id , products_type, products_state) values ( '" . $ogone_check['customers_id'] . "', now(), '" . $dvdsale['products_id'] . "','" . $dvdsale['quantity'] . "', 3 ," . $dvdsale['quantity'] * $dvdsale['price'] . " ,  '1' , 'VOD', 'NEW' )",'db',true);
		$insert_id = tep_db_insert_id();
		$vod_credit_query = tep_db_query("select products_weight from products where products_id = '" . $dvdsale['products_id'] . "'",'db',true);
		$vod_credit = tep_db_fetch_array($vod_credit_query);
		$nb=$vod_credit['products_weight'];
		for ($i=1; $i<= $vod_credit['products_weight'];$i++ ){

			$droselia_codes=create_code_droselia();

			tep_db_query("insert into droselia_codes (droselia_codes, customers_id, buy_date , catalog_id) values ( '" . $droselia_codes . "','" . $ogone_check['customers_id'] . "',now() , 0 )");
		}	
		
		tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");	
		$sucess = '1';
	}
	else
	{
		$sucess = '0';
	}
	$url= "location: http://" . $_SERVER["SERVER_NAME"] . "/vod_order_conf.php?list=".$insert_id.'&id='.$HTTP_GET_VARS['orderID'].'&nb='.$nb.'&sucess='.$sucess;
	header($url);
	
break;


case 'testogone':
	setcookie('customers_registration_step', 95 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	header("location: http://" . $_SERVER["SERVER_NAME"] . "/abo_google_ogone_conf.php");
	//mouchard tradedoubler
// 	include(getBestMatchToInclude(DIR_WS_COMMON . 'tradedoubler.php'));
	
break;

}
?>