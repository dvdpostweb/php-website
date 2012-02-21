<?php 
//require('configure/application_top.php');

//$current_page_name = FILENAME_SUBSCRIPTION_CANCEL;

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

//include(DIR_WS_INCLUDES . 'translation.php');

//$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

//$page_body_to_include = $current_page_name;

//include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

//require('configure/application_bottom.php');

?>

<?php  
require('configure/application_top.php');
$current_page_name = 'step3b.php';

include(DIR_WS_INCLUDES . 'translation.php');

//error counter
$error_cpt=0;
//error flags
$error_gender=0;
$error_firstname=0;
$error_lastname=0;
$error_street=0;
$error_postcode=0;
$error_city=0;
$error_country=0;
$error_phone=0;
$error_birth=0;
//IF FORM IS SUBMITED 
if($_POST['sent']) {	
	
	$is_client ="SELECT customers_id, customers_abo, customers_email_address from customers where customers_email_address='".$_POST['email_address']."'";
	$is_client_query = tep_db_query($is_client);			  
	$is_client_values = tep_db_fetch_array($is_client_query);
	
	//CHECK IF THERE IS NO ERROR 
	if ($_POST['gender']!='m' && $_POST['gender']!='f'){
		$error_gender=1;
		$error_cpt++;	
	}
	
	if (strlen($_POST['firstname'])< 3){
		$error_firstname=1;
		$error_cpt++;	
	}	
	
	if (strlen($_POST['lastname'])< 3 ){
		$error_lastname=1;
		$error_cpt++;	
	}
	
	if (strlen($_POST['street_address'])< 6 ){
		$error_street=1;
		$error_cpt++;	
	}
	
	if ( $_POST['day']==0 || $_POST['month']==0 || $_POST['year']==0 ){
		$error_birth=1;
		$error_cpt++;	
	}	
    
	switch ($_POST['country']){
		case 21:
			if (strlen($_POST['postcode'])!= 4 ){
				$error_postcode=1;
				$error_cpt++;	
			}
			break;
		case 124:
			if (strlen($_POST['postcode'])< 5 ){
				$error_postcode=2;
				$error_cpt++;	
			}
			break;
		case 150:
			if (strlen($_POST['postcode']) < 6 ){
				$error_postcode=3;
				$error_cpt++;	
			}
			break;
	}		
	
		
    if (strlen($_POST['city'])< 3 ){
		$error_city=1;
		$error_cpt++;	
	}
	if ($_POST['country']== 0 ){
		$error_country=1;
		$error_cpt++;	
	}
	if (strlen($_POST['phone'])< 9 ){
		$error_phone=1;
		$error_cpt++;	
	}
}

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('step1.php'));
}else{
	//basic queries
	
	$customer_query = tep_db_query("SELECT c.customers_next_abo_type , c.customers_next_discount_code,  c.activation_discount_code_id,  c.activation_discount_code_type from customers c WHERE customers_id ='".$customer_id. "'");
	$customer_values = tep_db_fetch_array($customer_query);
	
	if ($HTTP_POST_VARS['products_id']){$products_id=$HTTP_POST_VARS['products_id'];}
	else{$products_id=$customer_values['customers_next_abo_type'];}
	

	//$products_id=$customers_values['customers_next_abo_type'];
	
	$products_query = tep_db_query("SELECT p.products_price, pa.qty_credit from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'");
	$products_values = tep_db_fetch_array($products_query);
	$credits=$products_values['qty_credit'];
	$price=$products_values['products_price'];
	
	$discount=$customer_values['activation_discount_code_id'];
	$discount_type=$customer_values['activation_discount_code_type'];
	$next_discount=$customer_values['customers_next_discount_code'];
	

	if ($customers_registration_step>=31){
		$customers_query = tep_db_query("SELECT ab.entry_gender, ab.entry_firstname, ab.entry_lastname, ab.entry_street_address, ab.entry_postcode, ab.entry_city, entry_country_id, DATE_FORMAT(c.customers_dob, '%Y') as year, DATE_FORMAT(c.customers_dob, '%m') as month,DATE_FORMAT(c.customers_dob, '%d') as day,c.customers_telephone, c.customers_default_address_id FROM customers c LEFT JOIN address_book ab ON c.customers_id = ab.customers_id AND ab.address_book_id = c.customers_default_address_id WHERE c.customers_id ='".$customer_id. "'");
		$customers_values = tep_db_fetch_array($customers_query);
		if ($customers_values['year']=='0000'){$flag_tile=0;}
		else {$flag_tile=1;} 
		
		
		if ($_POST['firstname']){$firstname=$_POST['firstname'];}
		else{$firstname=$customers_values['entry_firstname'];}
		
		if ($_POST['lastname']){$lastname=$_POST['lastname'];}
		else{$lastname=$customers_values['entry_lastname'];}

		if ($_POST['gender']){$gender=$_POST['gender'];}
		else{$gender=$customers_values['entry_gender'];}

		if ($_POST['street_address']){$street_address=$_POST['street_address'];}
		else{$street_address=$customers_values['entry_street_address'];}
		
		if ($_POST['postcode']){$postcode=$_POST['postcode'];}
		else{$postcode=$customers_values['entry_postcode'];}
		
		if ($_POST['city']){$city=$_POST['city'];}
		else{$city=$customers_values['entry_city'];}
		
		if ($_POST['phone']){$phone=$_POST['phone'];}
		else{$phone=$customers_values['customers_telephone'];}
		
		if ($_POST['year']){$year=$_POST['year'];}
		else{$year=$customers_values['year'];}
		
		if ($_POST['month']){$month=$_POST['month'];}
		else{$month=$customers_values['month'];}
		
		if ($_POST['day']){$day=$_POST['day'];}
		else{$day=$customers_values['day'];}

		if ($_POST['country']){$country=$_POST['country'];}
		else{$country=$customers_values['entry_country_id'];}
		
		if ($HTTP_POST_VARS['products_id']){
			//UPDATE PRODUCTS_ID
			tep_db_query("update customers set customers_next_abo_type='".$products_id."' , customers_abo_type='".$products_id."' , customers_registration_step=90  where customers_id = '" . $customer_id . "'");
		}
	}
	
	
	//CUSTOMER IS ALREADY REGISTERD
	$birth_date= $year.'-'.$month.'-'.$day;
    
    //DB INSERT IF NO ERRORS	
	if ($error_cpt==0 && $_POST['sent']){
		if ($customers_registration_step<31){			
			$customers_registration_step=31;	
		}	
	tep_db_query("update customers set EntityID='".ENTITY_ID."' ,customers_dob='".$birth_date."', customers_gender = '".$_POST['gender']."', customers_firstname = '".$_POST['firstname']."', customers_lastname = '".$_POST['lastname']."', customers_telephone='".$_POST['phone']."' , customers_registration_step='".$customers_registration_step."'  where customers_id = '" . $customer_id . "'");
	tep_db_query("UPDATE address_book set entry_gender='".$gender."', entry_firstname='".$firstname."', entry_lastname='".$lastname."',entry_street_address='".$street_address."',entry_postcode='".$postcode."',entry_city='".$city."', entry_country_id='".$country ."' WHERE customers_id='".$customers_id."' and address_book_id =1 ");
    
	
    //REGISTER CUSTOMER SESSION
    tep_session_register('customer_first_name');
    tep_session_register('customer_country_id');
    tep_session_register('customer_zone_id');

    //SET CUSTOMER COOKIES
    setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('customers_registration_step', $customers_registration_step, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	
	
	
	if ($discount_type=='A'){
		//ACTIVATION VIA OGONE
		$payment_type='activation';
		$activation_code_id=$discount;
		$discount_code_id='0';
		$warranty_query = tep_db_query("SELECT activation_waranty, activation_code FROM activation_code WHERE activation_id ='".$activation_code_id. "'");
		$warranty_values = tep_db_fetch_array($warranty_query);
		$warranty=$warranty_values['activation_waranty'];
		$warranty_code=$warranty_values['activation_code'];
	}else{
		//DISCOUNT & FULLPRICE VIA OGONE
		$payment_type='norm';
		$discount_code_id=$discount;
		$activation_code_id='0';
		$warranty=1;
	}
	//PAYMENT REDIRECT 
	if ($warranty>0){
		switch ($HTTP_POST_VARS['payment']){
			case 'domiciliation' :				
				tep_redirect(tep_href_link('domiciliation_redirect.php?code='.$discount_code_id.'&infos=0&products_id='.$products_id));
				//goto dom explain
			break;
					
			case 'ogonevisa' :			
				$ogone_amount = $HTTP_POST_VARS['confirm_price'] * 100;
				$ogone_orderID = $customer_id . date('YmdHis');			
				tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, activation_code_id ,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', '".$payment_type."', '" . $products_id . "', '" . $discount_code_id . "','".$activation_code_id."' , '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
				tep_redirect(tep_href_link('ogone_redirect.php?orderID='.$ogone_orderID.'&payment=ogonevisa'));
				//goto ogone redirect_page
			break;
			
			
			case 'ogonemaster' :
				$ogone_amount = $HTTP_POST_VARS['confirm_price'] * 100;
				$ogone_orderID = $customer_id . date('YmdHis');
				tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, activation_code_id ,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', '".$payment_type."', '" . $products_id . "', '" . $discount_code_id . "' ,'".$activation_code_id."', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
				tep_redirect(tep_href_link('ogone_redirect.php?orderID='.$ogone_orderID.'&payment=ogonemaster'));
				//goto ogone redirect_page			
			break;
	
			
						
			case 'ogoneamex' :
				$ogone_amount = $HTTP_POST_VARS['confirm_price'] * 100;
				$ogone_orderID = $customer_id . date('YmdHis');
				tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, activation_code_id ,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', '".$payment_type."', '" . $products_id . "', '" . $discount_code_id . "','".$activation_code_id."' , '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
				tep_redirect(tep_href_link('ogone_redirect.php?orderID='.$ogone_orderID.'&payment=ogoneamex'));
				//goto ogone redirect_page			
			break;
			
		}
	}else{
			// BYPASS - OGONE ACTIVATION 
			tep_redirect(tep_href_link('actication_code_redirect.php?code='.$warranty_code));	
	}
	

	
	if ($customers_registration_step<31){		
		$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
	    $check_step_values = tep_db_fetch_array($check_step_query);
	    tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
	}   
}
}
//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>