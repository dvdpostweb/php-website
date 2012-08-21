<?php  
require('configure/application_top.php');
$current_page_name = 'step1b.php';

include(DIR_WS_INCLUDES . 'translation.php');

//error counter
$error_cpt=0;
//error flags
$error_pass=0;
$error_email=0;
$error_captcha=0;

//

if (!tep_session_is_registered('customer_id')) {
	
	if (strlen($_POST['activation_code'])>1 || strlen($_COOKIE['activation_code'])>1){
	$act_code ="SELECT activation_id,next_discount, activation_group, activation_products_id from activation_code where activation_code='". $_POST['activation_code']."'";
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
			tep_db_query("update activation_code set activation_products_id = ".$hd_products." where activation_code = '".$_POST['activation_code']."'");
				
		}
		$products_id=$act_code_values['activation_products_id'];		
		$activation_discount_code_type="A";		
		$goto_step=31;
		$activation_discount_next=$act_code_values['next_discount'];
		
	}else{
		$disc_code ="SELECT discount_code_id,next_discount, goto_step,listing_products_allowed  from discount_code where discount_code='". $_POST['activation_code']."'";
		$disc_code_query = tep_db_query($disc_code);
		$disc_code_values = tep_db_fetch_array($disc_code_query);
		$activation_discount_code_id=$disc_code_values['discount_code_id'];
		$activation_discount_code_type="D";
		$goto_step=$disc_code_values['goto_step'];
		if ($goto_step==31) { $products_id=$disc_code_values['listing_products_allowed'];}
		$activation_discount_next=$disc_code_values['next_discount'];
	}
}else{
	//si il y a un probleme de cookies on force au FREETRIAL 	

		$activation_discount_code_id=298;
		$activation_discount_code_type="D";	
		$activation_discount_next=0;
		$goto_step=21;
		
		if (!tep_session_is_registered('customer_id')) {
			$cust_info ="SELECT discount_code_id , next_discount from discount_code where discount_code='". $_POST['activation_code']."'";
			$cust_info_query = tep_db_query($cust_info);
			$cust_info_values = tep_db_fetch_array($cust_info_query);
			
		}
}

if ($_POST['products_id']){$products_id=$_POST['products_id'];}
//else {$products_id=$_POST['products_id'];}

//IF FORM IS SUBMITED 
if($_POST['sent']) {	
	$is_client ="SELECT customers_id, customers_abo, customers_email_address from customers where customers_email_address='".$_POST['email_address']."'";
	$is_client_query = tep_db_query($is_client);			  
	$is_client_values = tep_db_fetch_array($is_client_query);	
	
	//CHECK IF THERE IS NO ERROR 
	if ($_POST['password']!= $_POST['password2'] || strlen($_POST['password'])< 4){
		$error_pass=1;
		$error_cpt++;	
	}	
	
	//MAIL CHECKER	
	$atom   = '[-a-z0-9_.]';   // caractères autorisés avant l'arobase
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractères autorisés après l'arobase (nom de domaine)
	                               
	$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractères autorisés avant l'arobase
	'(\.' . $atom . '+)*' .         // Suivis par zéro point ou plus
	                                // séparés par des caractères autorisés avant l'arobase
	'@' .                           // Suivis d'un arobase
	'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 à 63 caractères autorisés pour le nom de domaine
	                                // séparés par des points
	$domain . '{2,63}$/i';          // Suivi de 2 à 63 caractères autorisés pour le nom de domaine
	
	if (preg_match($regex, $_POST['email_address'])) {	    
	} else {
	    $error_email=2;
		$error_cpt++;
	}
	
	//MAIL CHECKER2
	if ($_POST['email_address'] == $is_client_values['customers_email_address']){
		$error_email=1;
		$error_cpt++;	
	}
	
	$captcha_check=strtolower($_POST['nombre']);
	$captcha_check=str_replace('o','0',$captcha_check);
    if(md5($captcha_check) != $_POST['image_value']){
    	$error_captcha=1;
		$error_cpt++;	
	}	
}

	
	//DB INSERT IF NO ERRORS	
	if ($error_cpt==0 && $_POST['sent']){
		switch($language)
				{
				case 'dutch' :
					$language_id=2;
					break;
				case 'english' :
					$language_id=3;
					break;
				default:
					$language_id=1;
					break;
				}
	//$birth_date= $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
	if (!isset( $partners_id )){
	  $partners_id = 0;
	}
	$customers_sql ="insert into customers (customers_id, EntityID , group_id , customers_email_address, customers_password,customers_next_abo_type, customers_abo_validityto ,  customers_newsletter,  customers_newsletterpartner,activation_discount_code_id,activation_discount_code_type, customers_next_discount_code,customers_registration_step , customers_language, customers_info_number_of_logons, site ,customers_info_date_account_created, customers_info_date_account_last_modified, partners_id, dvdpost_known_by ) "; 
	//step check mail
	//$customers_sql .="values (NULL,'".ENTITY_ID."', '" . $_POST['email_address']  . "', '" . $birth_date  . "', '" . md5($_POST['password'])  . "', '" . $products_id  . "', NULL , 1 , 1, $activation_discount_code_id , '".$activation_discount_code_type."' , ".$activation_discount_next." ,'10', '" . $language_id  . "', 0 , '" . WEB_SITE . "',now(),now(), '" . $partners_id  . "','".$_POST['dvdpost_heard']." ') ";
	
	//step 20
	$customers_sql .="values (NULL,'".ENTITY_ID."','".GROUP_ID."', '" . $_POST['email_address']  . "', '" . md5($_POST['password'])  . "', '" . $products_id  . "', NULL , 1 , 1,'". $activation_discount_code_id."' , '".$activation_discount_code_type."' , '".$activation_discount_next."' ,'".$goto_step."', '" . $language_id  . "', 0 , '" . WEB_SITE . "',now(),now(), '" . $partners_id  . "','".$_POST['dvdpost_heard']." ') ";
	tep_db_query($customers_sql);		
	
	$check_customer_query = tep_db_query("select customers_id, customers_password, customers_language, customers_email_address, customers_default_address_id , customers_registration_step from " . TABLE_CUSTOMERS . " where customers_email_address = '" . $_POST['email_address'] . "'");
	$check_customer = tep_db_fetch_array($check_customer_query);
	$customer_id = $check_customer['customers_id'];
	$languages_id = $check_customer['customers_language'];
    $customers_registration_step=$check_customer['customers_registration_step'];
    
    $date_now = date('Ymd');
    tep_db_query("insert into address_book ( customers_id , address_book_id ) values ('".$customer_id."','1')");		
	IF ($goto_step==31){
	  tep_db_query("update " . TABLE_CUSTOMERS . " set customers_abo_type = ".$products_id.",customers_next_abo_type = ".$products_id."  where customers_id = '" . $customer_id . "'");
	}
    tep_db_query("update " . TABLE_CUSTOMERS . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_id = '" . $customer_id . "'");

    //REGISTER CUSTOMER SESSION
    tep_session_register('customer_id');
    tep_session_register('customer_default_address_id');

    //SET CUSTOMER COOKIES
    setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
    setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
    setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	
    
    //EMAIL PREPARATION
    $link=HTTP_SERVER.'/step1_mail_process.php?mail='.$email_address;
    $email_text = TEXT_MAIL;
	
	$check_logo_query = tep_db_query("select logo , site_link  from site where site_id = '" . WEB_SITE_ID . "'");
    $check_log_values = tep_db_fetch_array($check_logo_query);
	$logo = $check_log_values['logo'];
	$site_link=$check_log_values['site_link'];
	$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
	$email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
    $email_text = str_replace('µµµlinkµµµ', $link , $email_text);
    $email_text = str_replace('µµµemailµµµ', $email_address , $email_text);
    $email_text = str_replace('µµµpassµµµ', $_POST['password'] , $email_text);    
    tep_mail($email_address, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

    $check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
    $check_step_values = tep_db_fetch_array($check_step_query);
    tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
    
	}else{	
		$current_page_name = 'step1.php';
	}
		
}
else{//REGISTERED CLIENT
	if ($update==1 && !$_POST['sent'] && $customers_registration_step<21){//CHECK IF EMAIL UPDATE IS NEEDED
		$customers_query = tep_db_query("select customers_email_address, customers_dob from customers where customers_id = '" . $customer_id . "' ");
	    $customers_values = tep_db_fetch_array($customers_query);
		$_POST['email_address']=$customers_values['customers_email_address'];
		$day=substr($customers_values['customers_dob'],8,2);
		$month=substr($customers_values['customers_dob'],5,2);
		$year=substr($customers_values['customers_dob'],0,4);
	}
	else{//CHECK IF EMAIL IS UPDATED WITHOUT FAULT
		if ($update==1 &&  $updated==1 && $error_cpt==0 && $_POST['sent'] && $customers_registration_step<21 ){
		
		tep_db_query("Update customers SET customers_email_address ='" . $_POST['email_address']  . "' , customers_password ='" . md5($_POST['password'])  ."' where customers_id = '" . $customer_id . "' ");		
		$link=HTTP_SERVER.'/step1_mail_process.php?mail='.$email_address;
		
		$check_logo_query = tep_db_query("select logo, site_link from site where site_id = '" . WEB_SITE_ID . "'");
    	$check_log_values = tep_db_fetch_array($check_logo_query);
		$logo = $check_log_values['logo'];
		$site_link=$check_log_values['site_link'];
		$email_text = TEXT_MAIL;
		$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
		$email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
	    $email_text = str_replace('µµµlinkµµµ', $link , $email_text);
	    $email_text = str_replace('µµµemailµµµ', $_POST['email_address'] , $email_text);
	    $email_text = str_replace('µµµpassµµµ', $_POST['password'] , $email_text);
	    setcookie('email_address', $_POST['email_address'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));    
	    //step mail check	    
	    //tep_mail($email_address, $_POST['email_address'], EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
      	//tep_redirect(tep_href_link('step1_mail.php'));		
		}
		//CHECK IF EMAIL IS UPDATED AND THEY ARE FAULTS
		if ($update==1 &&  $updated==1 && $error_cpt>0 && $_POST['sent'] ){
		$current_page_name = 'step1.php';		
		}	
		
		else{//NO UPDATE ID NEEDED REDIRECT TO ANOTHER PAGE
			
			
					
			//CUSTOMER IS ALREADY REGISTERED AND DON'T NEED TO UPDATE EMAIL
			$customers_query = tep_db_query("select customers_registration_step,customers_language, customers_abo from customers where customers_id = '" . $customer_id . "' ");
		    $customers_values = tep_db_fetch_array($customers_query);
			setcookie('language_id', $customers_values['customers_language'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		    $languages_id=$customers_values['customers_language'];
		    setcookie('customers_registration_step', $customers_values['customers_registration_step'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		    $customers_registration_step=$customers_values['customers_registration_step'];
			
			if ($activation_discount_code_id && $customers_values['customers_abo']<1 ){
				tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."' , activation_discount_code_type='".$activation_discount_code_type."' , customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "' AND  customers_registration_step<90");
			}
			if ($products_id){
				tep_db_query("update customers set customers_next_abo_type =$products_id where customers_id = '" . $customer_id . "' ");
			}
			$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
		    $check_step_values = tep_db_fetch_array($check_step_query);
		    
		      switch($customers_registration_step){
			      case 41:
			      	$customers_query = tep_db_query("select customers_next_abo_type, activation_discount_code_id from customers where customers_id = '" . $customers_id. "'");
		    		$customers_values = tep_db_fetch_array($customers_query);			      
			      	tep_redirect(tep_href_link($check_step_values['CodeDesc2'].'?discount_code_id='.$customers_values['activation_discount_code_id'].'&products_id='.$customers_values['customers_next_abo_type']));
			      	break;
			      	
			      case 80:
			      	 tep_redirect(tep_href_link('step_member_choice.php'));
			      	break;
			      	
			      case 90:
			      	 tep_redirect(tep_href_link('step_member_choice.php'));
			      	break;
			      	
			      	
			     default:
		    		tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
		    	}		    
		}

	}
}




//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

//include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

 if ($_POST['activation_code']=='0' || $activation_code=='FREETEST2' || $activation_code==''  ){
	 $activation_code='univers';
	 $show_discount_form=1;
  }
  $disc_explain='';
  $promo_footer=TEXT_FOOTER_EXPLAIN;
  
  if (strlen($_GET['activation_code'])>1){
	  $activation_code=$_GET['activation_code'];
	  setcookie('activation_code', $activation_code, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));  
  }else {
	  $activation_code=$_COOKIE['activation_code'];	 
  }

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>
