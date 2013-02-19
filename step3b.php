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
$error_conditions=0;

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('login.php'));
}else{
	//basic queries
	$sql="SELECT c.customers_next_abo_type , c.customers_next_discount_code,customers_abo_type,  c.activation_discount_code_id,  c.activation_discount_code_type,customers_registration_step from customers c WHERE customers_id ='".$customer_id. "'";
	$customer_query = tep_db_query($sql);
	$customer_values = tep_db_fetch_array($customer_query);
	$promotion = promotion($customer_values['customers_abo_type'],$customer_values['customers_next_abo_type'],$customer_values['activation_discount_code_type'],$customer_values['activation_discount_code_id'],$jacob);
	if($customer_values['customers_registration_step']==32||$customer_values['customers_registration_step']==33 ||$customer_values['customers_registration_step']==70)
	{
		tep_db_query("update customers set customers_registration_step='31' where customers_id = '" . $customer_id . "'");
	}
	if ($HTTP_POST_VARS['products_id']){$products_id=$HTTP_POST_VARS['products_id'];}
	else{$products_id=$customer_values['customers_next_abo_type'];}
	

	//$products_id=$customers_values['customers_next_abo_type'];
	$sql="SELECT p.products_price, pa.qty_credit from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'";
	$products_query = tep_db_query($sql);
	$products_values = tep_db_fetch_array($products_query);
	$credits=$products_values['qty_credit'];
	$discount=$customer_values['activation_discount_code_id'];
	$discount_type=$customer_values['activation_discount_code_type'];
	$next_discount=$customer_values['customers_next_discount_code'];
}
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
//IF FORM IS SUBMITED 
if($_POST['sent']) {	
	
	//CHECK IF THERE IS NO ERROR 
	if ($_POST['gender']!='m' && $_POST['gender']!='f'){
		$error_gender=1;
		$error_cpt++;	
		
	}
	if (strlen($_POST['firstname'])< 2){
		$error_firstname=1;
		$error_cpt++;	
	}	
	if (strlen($_POST['lastname'])< 2 ){
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
	if(!checkdate($_POST['month'],$_POST['day'],$_POST['year'])){
		$error_birth=1;
		$error_cpt++;	
	}	
  if(!checkdate($_POST['month'],$_POST['day'],$_POST['year'])){
		$error_birth=1;
		$error_cpt++;	
	}
	$birth = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
	$age = age($birth);
	if($age<18)
	{
	  
    $error_minor=1;
		$error_cpt++;
	}
	$test_postcode = preg_match("/[^0-9]/i",$_POST['postcode']);
	if($test_postcode == true)
	{
	  $error_postcode=4;
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
			if (strlen($_POST['postcode'])!= 4 ){
				$error_postcode=2;
				$error_cpt++;	
			}
			break;
		case 150:
			if (strlen($_POST['postcode'])!= 4 ){
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
	$phone = preg_replace("/([^0-9])/i","",$_POST['phone']);
	$phone_ok=preg_match('/^(\+)?[0-9 \-\/.]+$/',$_POST['phone']); 
	if (strlen($phone)< 9 || $phone_ok==false ){
		$error_phone=1;
		$error_cpt++;	
	}
	if($_POST['conditions']!=1)
	{
		$error_conditions=1;
	}
}
if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('login.php'));
}else{
	//basic queries

	$customer_query = tep_db_query("SELECT c.customers_next_abo_type, c.customers_abo_type , c.customers_next_discount_code,  c.activation_discount_code_id,  c.activation_discount_code_type from customers c WHERE customers_id ='".$customer_id. "'");
	$customer_values = tep_db_fetch_array($customer_query);
	if($_POST['old_customer']==1)
	{
		$sql = 'update customers set customers_abo_type = '.$HTTP_POST_VARS['products_id'].', customers_next_abo_type ='.$HTTP_POST_VARS['products_id'].', `activation_discount_code_id`=0,`activation_discount_code_type`="",customers_next_discount_code=0 where customers_id = '. $customer_id;
		tep_db_query($sql);
	}
	if ($HTTP_POST_VARS['products_id']){$products_id=$HTTP_POST_VARS['products_id'];}
	else{$products_id=$customer_values['customers_next_abo_type'];}
	

	//$products_id=$customers_values['customers_next_abo_type'];
	
	$products_query = tep_db_query("SELECT p.products_price, pa.qty_credit from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'");
	$products_values = tep_db_fetch_array($products_query);
	$credits=$products_values['qty_credit'];
	$discount=$customer_values['activation_discount_code_id'];
	$discount_type=$customer_values['activation_discount_code_type'];
	$next_discount=$customer_values['customers_next_discount_code'];
	

	if ($customers_registration_step>=31){
		$customers_query = tep_db_query("SELECT customers_email_address,activation_discount_code_id, ab.entry_gender, ab.entry_firstname, ab.entry_lastname, ab.entry_street_address, ab.entry_postcode, ab.entry_city, entry_country_id, DATE_FORMAT(c.customers_dob, '%Y') as year, DATE_FORMAT(c.customers_dob, '%m') as month,DATE_FORMAT(c.customers_dob, '%d') as day,c.customers_telephone, c.customers_default_address_id FROM customers c LEFT JOIN address_book ab ON c.customers_id = ab.customers_id AND ab.address_book_id = c.customers_default_address_id WHERE c.customers_id ='".$customer_id. "'");
		$customers_values = tep_db_fetch_array($customers_query);
		if ($customers_values['entry_gender']==''){$flag_tile=0;}
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
		if($customers_values['activation_discount_code_id']==805)
		{
			require("partial/step3/qualifio.php");
		}
		if ($HTTP_POST_VARS['products_id']){
			//UPDATE PRODUCTS_ID
			//tep_db_query("update customers set customers_next_abo_type='".$products_id."' , customers_abo_type='".$products_id."'  where customers_id = '" . $customer_id . "'");
		}
	}
	
	//CUSTOMER IS ALREADY REGISTERD
	$birth_date= $year.'-'.$month.'-'.$day;
 	if ($discount_type=='A'){
		//ACTIVATION VIA OGONE
		$payment_type='activation';
		$activation_code_id=$discount;
		$discount_code_id='0';
		$warranty_query = tep_db_query("SELECT activation_waranty, activation_code FROM activation_code WHERE activation_id ='".$activation_code_id. "'");
		$warranty_values = tep_db_fetch_array($warranty_query);
		$warranty=$warranty_values['activation_waranty'];
		$warranty_code=$warranty_values['activation_code'];
	} else if($discount_type=='D'){	
		
		$sql = "select p.products_id,   p.products_model, p.products_quantity, p.products_image,  p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p  where p.products_id = '" . $products_id. "'";
		$product_info = tep_db_query($sql);
		$products_values_price = tep_db_fetch_array($product_info);
		$price=$products_values_price['products_price'];
		
		$payment_type='norm';
		$discount_code_id=$discount;
		$activation_code_id='0';
		$warranty=1;
	}
	else
	{
		$sql = "select p.products_id,   p.products_model, p.products_quantity, p.products_image,  p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p  where p.products_id = '" . $products_id. "'";
		$product_info = tep_db_query($sql);
			$products_values_price = tep_db_fetch_array($product_info);
		$price=$products_values_price['products_price'];
		$warranty=1;
		
	}
	
 
    //DB INSERT IF NO ERRORS	
 	
	if ($error_cpt ==0 && $_POST['sent']){
		if ($customers_registration_step<31){			
			$customers_registration_step=31;	
		}	
	tep_db_query("update customers set EntityID='".ENTITY_ID."' ,customers_dob='".$birth_date."', customers_gender = '".$_POST['gender']."', customers_firstname = '".$_POST['firstname']."', customers_lastname = '".$_POST['lastname']."', customers_telephone='".$_POST['phone']."' , customers_registration_step='".$customers_registration_step."'  where customers_id = '" . $customer_id . "'");
	tep_db_query('update customer_attributes set nickname ="'.$_POST['firstname'].'" where customer_id = '.$customer_id);
	$sql_check_address="select count(1) as count from address_book where customers_id = '" . $customer_id. "'";
	$query_check_address=tep_db_query($sql_check_address,'db_link',true);
	$value_check_address = tep_db_fetch_array($query_check_address);
	if($value_check_address['count']==0)
		tep_db_query("insert into address_book ( customers_id , address_book_id ) values ('".$customer_id."','1')");
	$street_address =str_replace(';',' ',$street_address);
	$street_address =str_replace('   ',' ',$street_address);
	$street_address =str_replace('  ',' ',$street_address);
	
	$sql_address_book="UPDATE address_book set entry_gender='".$gender."', entry_firstname='".$firstname."', entry_lastname='".$lastname."',entry_street_address='".$street_address."',entry_postcode='".$postcode."',entry_city='".$city."', entry_country_id='".$country ."' WHERE customers_id='".$customers_id."' and address_book_id =1 ";
	tep_db_query($sql_address_book);
    
    //REGISTER CUSTOMER SESSION
    tep_session_register('customer_first_name');
    tep_session_register('customer_country_id');
    tep_session_register('customer_zone_id');

    //SET CUSTOMER COOKIES
    setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('customers_registration_step', $customers_registration_step, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	
	if ($error_conditions == 0)
			if($discount_type == 'A' && $warranty == 2)
			{
				if ($customers['customers_abo'] == 0)
				{
					registration_activation($activation_code_id,$customers_id,$customer_values['customers_abo_type'],1,$languages_id );
					$sql_up="UPDATE customers set customers_abo_payment_method = 3 WHERE customers_id=".$customers_id;
					tep_db_query($sql_up);
				}
				setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				setcookie('customers_id', $ogone_check['customers_id'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				setcookie('email_address', $customers['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				setcookie('first_name', $customers['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
				$customer_id = $customers_id;
				tep_session_register('customer_id',$customers_id);


			  header("location: http://" . $_SERVER["SERVER_NAME"] . "/step4.php?type=ogone");

			} 
			else
			{
				tep_redirect(tep_href_link("step_check.php", '', 'SSL'));
			}
		
	

	}
}
//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
	if ($discount>0){									
		switch ($discount_type){
			case 'A':
				$activation_sql ="SELECT ac.activation_code, ac.activation_waranty, ag.activation_group_name,activation_text_fr,activation_text_nl,activation_text_en from activation_code ac LEFT JOIN activation_group ag on ag.activation_group_id=ac.activation_group	 where activation_id= ".$discount ;
				$activation_query = tep_db_query($activation_sql);
				$activation_values =tep_db_fetch_array($activation_query);	
				$final_price=0;
				$warranty=	$activation_values['activation_waranty'];	
				switch ($languages_id){
					case 1:
						$promo = $activation_values['activation_text_fr'];
					break;

					case 2:
						$promo = $activation_values['activation_text_nl'];
					break;

					case 3:
						$promo = $activation_values['activation_text_en'];
					break;
				}																							
				break;

			case 'D':
				$discount_sql ="SELECT discount_type, discount_value, discount_text_fr, discount_text_nl , discount_text_en from discount_code where discount_code_id= ".$discount ;
				$discount_query = tep_db_query($discount_sql);
				$discount_values =tep_db_fetch_array($discount_query);
				$warranty=1;
				switch ($languages_id){
					case 1:
						$promo = $discount_values['discount_text_fr'];
					break;

					case 2:
						$promo = $discount_values['discount_text_nl'];
					break;

					case 3:
						$promo = $discount_values['discount_text_en'];
					break;
				}
				switch ($discount_values['discount_type']) {
					case 1: // - X%
					if ($discount_values['discount_code_id'] == 28){ //amex reduction not for other pay method than amex
						if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){
							$strdiscount_code_line_explained = ($discount_values['discount_value'] / 100 * $price ) . ' EUR';
							$final_price  = round($price  - ($discount_values['discount_value'] / 100 * $price ),2)  ;
							$discount_code_id_used= $discount_values['discount_code_id'];	
							tep_session_register('discount_code_id_used');
						}else{
							$allisok = 0;
							$strreason= TEXT_ERROR_AMEX;					
						}	
					}else{
						$strdiscount_code_line_explained= ($discount_values['discount_value'] / 100 * $price ) . ' EUR';
						$final_price  = round($price  - ($discount_values['discount_value']  / 100 * $price ),2)  ;
						$discount_code_id_used= $discount_values['discount_code_id'];	
						tep_session_register('discount_code_id_used');								
					}
					break;
					case 2: //tot=x euro 
						if ($discount_values['discount_code_id'] == 59){ //amex reduction not for other pay method than amex
							if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){ 
								$strdiscount_code_line_explained= ($final_price - $discount_values['discount_value']) . ' EUR';
								$final_price = ($final_price - $final_price + $discount_values['discount_value'])  ;
								$discount_code_id_used= $discount_values['discount_code_id'];	
								tep_session_register('discount_code_id_used');
							}else{
								$allisok = 0;
								$strreason= TEXT_ERROR_AMEX;					
							}	
						}else{
								//$strdiscount_code_line_explained= ($final_price - $discount_values['discount_value']) . ' EUR';
								$final_price = ($final_price - $final_price + $discount_values['discount_value'])  ;
								$discount_code_id_used= $discount_values['discount_code_id'];	
								tep_session_register('discount_code_id_used');
						}
					break;
					case 3: //tot=tot - x euro 
						$strdiscount_code_line_explained= ($discount_values['discount_value']) . ' EUR';
						$final_price = ($final_price - $discount_values['discount_value'])  ;
						$discount_code_id_used= $discount_values['discount_code_id'];	
						tep_session_register('discount_code_id_used');
					break;
				}																								
				break;		
		}									
	}
	else
	{
			$final_price=$price;		
	}
if(WEBSITE==101)
{
	$slogan1=str_replace("0800/95 990",'02/503.68.11',SLOGAN1);
}
else	
{
	$slogan1= SLOGAN1;
}
	
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step_2010.php',0,$jacob));

require('configure/application_bottom.php');

?>