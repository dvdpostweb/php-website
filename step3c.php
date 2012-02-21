<?php 
require('configure/application_top.php');

$current_page_name = 'step3c.php';
$page_body_to_include = $current_page_name;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
if( $customers_registration_step==100){
	tep_redirect(tep_href_link('mydvdpost.php'));
}

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('step1.php'));
}else{
	if( $customers_registration_step<32){
    	tep_redirect(tep_href_link('step1.php'));
    }else{
		if(empty($_POST['confirm'])){
			$sql_32='update customers set customers_registration_step='.$customers_registration_step.' where customers_id = '.$customer_id;
			tep_db_query($sql_32);
			setcookie('customers_registration_step', $customers_registration_step, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		}
		//data
		else{
			
			switch($_POST['confirm']){
				case 'phone':
					if(!empty($_POST['phone']))
					{
						$phone = preg_replace("/([^0-9])/i","",$_POST['phone']);
						$phone_ok=preg_match('/^(\+)?[0-9 \-\/.]+$/',$_POST['phone']); 
						if (strlen($phone)< 9 || $phone_ok==false )
							$error=true;
						else
						{
							$error=false;
							$sql='select * from customers where customers_id='.$customer_id;
							$sql_query=tep_db_query($sql,'db_link',true);
							$customers_value=tep_db_fetch_array($sql_query);
							$sql= "select abo_auto_stop_next_reconduction as cpt from discount_code where discount_code_id = '" . $customers_value['activation_discount_code_id'] . "' ";
							$discount_query = tep_db_query($sql);
							$discount_query_value = tep_db_fetch_array($discount_query);
							if ($discount_query_value['cpt']>0){
								$auto_stop_next_reconduction=1;
							}else{
								$auto_stop_next_reconduction=0;
							} 

				
				
							$sql_phone='update customers set customers_abo_auto_stop_next_reconduction = "'.$auto_stop_next_reconduction.'",customers_telephone="'.$_POST['phone'].'" , customers_abo_payment_method=20,customers_registration_step=100 where customers_id = '.$customer_id;
							setcookie('customers_registration_step', 100, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		
							tep_db_query($sql_phone);
				
							setcookie('customers_registration_step', 100, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
						    setcookie('email_address', $customers_value['customers_email_address'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
					        setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
							setcookie('first_name', $customers_value['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				
							//mail
							$check_logo_query = tep_db_query("select logo from site where site_id = '" . WEB_SITE_ID . "'");
							$check_log_values = tep_db_fetch_array($check_logo_query);
							$logo = $check_log_values['logo'];
				
							if($languages_id>0)
								$lang=$languages_id;
							else
								$lang=3;
								
							if($customers_value['activation_discount_code_type']=='A')
							{
								//action special
								require('includes/classes/activation_code_actions.php');
								$action=new Activation_code_actions();
								$action->execute($customer_id,$customers_value['activation_discount_code_id']);
								
							}
								
							$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $customers_value['customers_abo_type'] . "' and pd.products_id = '" . $customers_value['customers_abo_type'] . "' and pd.language_id = '".$lang."' ");
						  	$product_info_values = tep_db_fetch_array($product_info);
							$sql_insert="INSERT INTO `mail_messages_sent_history` (`mail_messages_sent_history_id` ,`date` ,`customers_id` ,`mail_messages_id`,`language_id` ,	`mail_opened` ,	`mail_opened_date` ,`customers_email_address`)
							VALUES (NULL , now(), $customer_id, '321', $lang, '0', NULL , '".$customers_value['customers_email_address']."'	);";
							tep_db_query($sql_insert);
							$mail_id=tep_db_insert_id();
				
							$sql='SELECT * FROM mail_messages m where mail_messages_id =321 and language_id = '.$lang;
				
							$mail_query = tep_db_query($sql);
							$mail_values = tep_db_fetch_array($mail_query);
							$email_text = $mail_values['messages_html']; 
							$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);
							$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
							$email_text = str_replace('µµµcustomers_nameµµµ', $customers_value['customers_firstname'] . ' ' . $customers_value['customers_lastname'] , $email_text);
							$email_text = str_replace('µµµabo_typeµµµ',  $product_info_values['products_name'] , $email_text);
							$email_text = str_replace('µµµcustomers_emailµµµ',  $customers_value['customers_email_address'] , $email_text);

							$email_text = str_replace('µµµpay_methodµµµ', PAYMENT_METHOD_PHONE  , $email_text);
							tep_mail($customers_value['customers_firstname'] . ' ' . $customers_value['customers_lastname'], $customers_value['customers_email_address'], $mail_values['messages_title'], $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
							tep_redirect(tep_href_link('step4.php?type=callback'));
						}	
					}
				break;
				case 'sms':
				//	echo 'sms';
					if(!empty($_POST['code_portable']))
					{
						$status_code =tep_inused_portable($customer_id,strtolower($_POST['code_portable']));
						if($status_code=='GOOD')
						{
								$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ",'db_link',true);
								$customers = tep_db_fetch_array($customers_query);
								
								$phone_update='update registration_sms_status set used_date=now(), used_time=now() where customers_id= '.$customer_id.' and code = "'.$_POST['code_portable'].'"';
								tep_db_query($phone_update);
								
								$site_sql="select site_id from site where site_name='".$customers['site']."'";
								$site_query=tep_db_query($site_sql);
								$site_value = tep_db_fetch_array($site_query);
								if($customers['activation_discount_code_type']=='D')
									registration_discount($customers['activation_discount_code_id'],$customer_id,$customers['customers_abo_type'],$site_value['site_id'],$languages_id,0 ,'Sms',322,21);
								else
									registration_activation($customers['activation_discount_code_id'],$customer_id,$customers['customers_abo_type'],$site_value['site_id'],$languages_id,'Sms',322,21);
								setcookie('customers_registration_step', 95 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
								setcookie('customers_id', $customer_id , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
								setcookie('email_address', $customers['customers_email_address'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
								setcookie('first_name', $customers['customers_firstname'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));	
								$customer_id = $customer_id;
								tep_session_register('customer_id');
								header("location: http://" . SITE_ID . "/step4.php?type=sms");
							break;
						}
						else if($status_code=="USED")
							$code_error='USED_CODE';
						else
						{
							$code_error='WRONG_CODE';
						}
					}
					else
						$code_error='EMPTY_CODE';
				break;
			}
		}	
		$sql='select * from customers where customers_id='.$customer_id;
		$sql_query=tep_db_query($sql,'db_link',true);
		$customers_value=tep_db_fetch_array($sql_query);
		
		
		
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));
		require('configure/application_bottom.php');
	}
}
?>