<?php
require('configure/application_top.php');
require_once('./paypal/CallerService.php');

$current_page_name = "step_check.php";

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
#$customers_registration_step=33;
if( $customers_registration_step==100){
	tep_redirect(tep_href_link('mydvdpost.php'));
}

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('default.php'));
}else{
	if( $customers_registration_step==31){
		$customers_registration_step=33;
		tep_db_query("update customers set customers_registration_step='".$customers_registration_step."' where customers_id = '" . $customer_id . "'");
	}
	
	
	if( $customers_registration_step<33){
    	tep_redirect(tep_href_link('step1.php'));
	}else{
			$sql="SELECT customers_telephone, c.customers_abo_type , c.customers_next_discount_code,  c.activation_discount_code_id,  c.activation_discount_code_type,customers_registration_step,customers_default_address_id,site,customers_next_abo_type from customers c WHERE customers_id ='".$customer_id. "'";
			
			$customer_query = tep_db_query($sql);
			$customer_values = tep_db_fetch_array($customer_query);
			
			$promotion = promotion($customer_values['customers_abo_type'],$customer_values['customers_next_abo_type'],$customer_values['activation_discount_code_type'],$customer_values['activation_discount_code_id']);
			$address_sql="select *  from address_book where customers_id= '".$customer_id."' and address_book_id = '" . $customer_values['customers_default_address_id'] . "'";
			$address_book = tep_db_query($address_sql);  
			$address_book_values = tep_db_fetch_array($address_book);
			if ($address_book_values['entry_country_id']!='124' && $address_book_values['entry_country_id']!='150' && $customer_values['activation_discount_code_id'] !=999)
			{
				$phone_available=true;
			}
			else
			{
				$phone_available=false;
			}
			$cc_available=true;
			$paypal_available=true;
			if($customer_values['activation_discount_code_id'] == 1038)
			{
			  $phone_available=false;
			  $cc_available=false;
			}
			if($customer_values['activation_discount_code_id'] == 1099 || $customer_values['activation_discount_code_id'] == 1100 || $customer_values['activation_discount_code_id'] == 999 || $customer_values['activation_discount_code_id'] == 1262 || $customer_values['activation_discount_code_id'] == 1263)
			{
			  $phone_available=false;
			}
			$products_id=$customer_values['customers_abo_type'];


			$products_query = tep_db_query("SELECT p.products_price, pa.qty_credit, p.products_model from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'");
			$products_values = tep_db_fetch_array($products_query);
			$credits=$products_values['qty_credit'];
			
			$price=$products_values['products_price'];
      $full_price = $price;
			$promo_id=$customer_values['activation_discount_code_id'];
			$discount_type=$customer_values['activation_discount_code_type'];
			$next_discount=$customer_values['customers_next_discount_code'];

		if ($discount_type=='A'){
			//ACTIVATION VIA OGONE
			$activation_query = tep_db_query("SELECT * FROM activation_code WHERE activation_id ='".$promo_id. "'");
			$activation_values = tep_db_fetch_array($activation_query);
			$warranty=$activation_values['activation_waranty'];
			$price = 0;
			$discount_code_id = 0;
			$activation_code_id = $promo_id ;
			
		}else{
			$warranty=1;
			$discount_query = tep_db_query("SELECT * FROM discount_code WHERE discount_code_id ='".$promo_id. "'");
			$discount_values = tep_db_fetch_array($discount_query);
			switch ($discount_values['discount_abo_validityto_type']){
				case 1:	
					$period = $discount_values['discount_abo_validityto_value'].' '.TEXT_DAYS;
				break;
				case 2:	
					$period = $discount_values['discount_abo_validityto_value'].' '.TEXT_MONTHS;
				break;
				case 3:	
					$period = $discount_values['discount_abo_validityto_value'].' '.TEXT_YEAR;
				break;
			}
			$discount_code_id = $promo_id;
			$activation_code_id = 0 ;
			
			switch ($discount_values['discount_type']) {
				case 1: // - X%
					$strdiscount_code_line_explained = ($discount_values['discount_value'] / 100 * $price ) . ' EUR';
					$final_price  = round($price  - ($discount_values['discount_value']  / 100 * $price ),2)  ;
				break;
				case 2: //tot=x euro 
					$strdiscount_code_line_explained= ($final_price - $discount_values['discount_value']) . ' EUR';
					$final_price = ($final_price - $final_price + $discount_values['discount_value'])  ;
				break;
				case 3: //tot=tot - x euro 
					$strdiscount_code_line_explained= ($discount_values['discount_value']) . ' EUR';
					$final_price = ($final_price - $discount_values['discount_value'])  ;
				break;
			}

		}
		if ($promo_id>0){									
			switch ($discount_type){
				case 'A':
					$payment_type="activation";
					$activation_sql ="SELECT ac.activation_code, ac.activation_waranty, ag.activation_group_name,activation_text_fr,activation_text_nl,activation_text_en, activation_group from activation_code ac LEFT JOIN activation_group ag on ag.activation_group_id=ac.activation_group	 where activation_id= ".$promo_id ;
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
					$payment_type="norm";
					$discount_sql ="SELECT discount_type, discount_value, discount_text_fr, discount_text_nl , discount_text_en,discount_code from discount_code where discount_code_id= ".$promo_id ;
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
		}else
		{
			$payment_type = 'norm';
			$final_price = $price;
		}
		
			if(!empty($_POST['sent']))
			{
				$error = false;
				$error_phone=false;
				switch ($_POST['payment'])
				{
				  case 'paypal':
				                 
            $nvpstr=
"&PAYMENTREQUEST_0_PAYMENTACTION=AUTHORIZATION&PAYMENTREQUEST_0_AMT=0&PAYMENTREQUEST_0_CURRENCYCODE=EUR&L_BILLINGTYPE0=MerchantInitiatedBilling&L_BILLINGAGREEMENTDESCRIPTION0=".urlencode("DVDPost")."&cancelUrl=".urlencode('http://'.$host.'/step_check.php')."&returnUrl=".urlencode('http://'.$host.'/paypal_process.php');
            $resArray=hash_call("SetExpressCheckout",$nvpstr);
            $ack = strtoupper($resArray["ACK"]);
            if($ack!="SUCCESS"){
                $_SESSION['reshash']=$resArray;
            	  tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'payment error step check', $nvpstr.'.'.serialize($resArray).'.'.$customer_id, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
            }
            $url = PAYPAL_URL.$resArray["TOKEN"];
            tep_redirect($url);
            break;
					case 'ogonevisa':
					case 'ogonemaster':
					case 'ogoneamex':
						$ogone_amount = $final_price * 100;
						$ogone_orderID = $customer_id . date('YmdHis');			
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, activation_code_id ,site) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', '".$payment_type."', '" . $products_id . "', '" . $discount_code_id . "','".$activation_code_id."' , '" . WEB_SITE_ID . "')");
							tep_redirect(tep_href_link('ogone_redirect.php?orderID='.$ogone_orderID.'&payment='.$_POST['payment']));
					break;
					case 'phone': 
							$phone = preg_replace("/([^0-9])/i","",$_POST['phone']);
							$phone_ok=preg_match('/^(\+)?[0-9 \-\/.]+$/',$_POST['phone']); 
							if (strlen($phone)< 9 || $phone_ok==false )
							{
								$error_phone=true;
							}
							else
							{
								$sql='select * from customers where customers_id='.$customer_id;
								$sql_query=tep_db_query($sql,'db_link',true);
								$customers_value=tep_db_fetch_array($sql_query);
								if ($discount_type=='A')
								{
								   $sql= "select abo_auto_stop_next_reconduction as cpt from activation_code where activation_id = '" . $customers_value['activation_discount_code_id'] . "' ";
								}
								else
								{
								  $sql= "select abo_auto_stop_next_reconduction as cpt from discount_code where discount_code_id = '" . $customers_value['activation_discount_code_id'] . "' ";
							  }
								$discount_query = tep_db_query($sql);
								$discount_query_value = tep_db_fetch_array($discount_query);
								if ($discount_query_value['cpt']>0){
									$auto_stop_next_reconduction=1;
								}else{
									$auto_stop_next_reconduction=0;
								} 

                $sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$customer_id.',29,now(),'.$customers_value['customers_abo_type'].',"VIREMENT","call me",'.WEB_SITE_ID.')';
              	tep_db_query($sql_abo);
              	$host=$_SERVER['HTTP_HOST'];
                if(strpos($host,'dvdpost')>0)
              	{
               	 tep_mail('info@dvdpost.be', 'info@dvdpost.be', 'demande d\'activation (client :'.$lang_short.')', 'Ce client '.$customer_id.' veut activer son compte. Merci de bien vouloir le rappeler au plus vite.', STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
               	$data = array();
       					$data['customers_name'] = ucwords($customers_value['customers_firstname']) . ' ' . ucwords($customers_value['customers_lastname']);
       					if(strpos($_SERVER['HTTP_HOST'],'.nl')>0)
                {
                  $data['host'] = 'www.dvdpost.nl';
                  $data['host_private'] = 'private.dvdpost.nl';
                }
                else
                {
                  $data['host'] = 'www.dvdpost.be';
                  $data['host_private'] = 'private.dvdpost.be';
                }
                
       					mail_message($customers_value['customers_id'], 647, $data);
              	}

								$sql_phone='update customers set customers_abo_auto_stop_next_reconduction = "'.$auto_stop_next_reconduction.'",customers_telephone="'.$_POST['phone'].'" , customers_abo_payment_method=3,customers_registration_step=100 where customers_id = '.$customer_id;
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
								$lang=1;
								if($languages_id>0)
									$lang=$languages_id;
								else
									$lang=3;

								$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $customers_value['customers_abo_type'] . "' and pd.products_id = '" . $customers_value['customers_abo_type'] . "' and pd.language_id = '".$lang."' ");
							  	$product_info_values = tep_db_fetch_array($product_info);
								

								$sql='SELECT * FROM mail_messages m where mail_messages_id =645 and language_id = '.$lang;

								$mail_query = tep_db_query($sql);
								$mail_values = tep_db_fetch_array($mail_query);
								$email_text = $mail_values['messages_html']; 
								
								//$email_text = str_replace('$$$email$$$',  $customers_value['customers_email_address'] , $email_text);
								$promotion = promotion($customers_value['customers_abo_type'], $customers_value['customers_next_abo_type'], $discount_type, $promo_id);
								//$email_text = str_replace('$$$promotion$$$', $promotion, $email_text);
								
								$data=array();
								
								$type_gender = (strtoupper($customers_value['customers_gender']) == 'f' ? 'female_gender' : 'male_gender');
								$gender_sql = "select * from  dvdpost_common.translation2 where translation_key = '".$type_gender."' and language_id = ".$languages_id;
								$gender_query = tep_db_query($gender_sql);
								$gender_value = tep_db_fetch_array($gender_query);

								$data['gender_simple'] = $gender_value['translation_value'];
								if($languages_id==1)
              	{
              	  $locale_id = 2;
              	}
              	elseif($languages_id==2)
              	{
              	  $locale_id = 3;
              	}
              	else
              	{
              	  $locale_id = 1;
              	}
								$dom = "select * from `i18n_db_translations` where tr_key = 'info'  and namespace = 'info.conditions' and locale_id = ".$locale_id;
                $dom_query = tep_db_query($dom);
                $dom_values = tep_db_fetch_array($dom_query);
                $conditions = $dom_values['text'];
								
								$promotion2 = promotion($customers_value['customers_abo_type'], $customers_value['customers_next_abo_type'], $discount_type, $promo_id,2,$languages_id);
								$data['customers_name'] = $customers_value['customers_firstname'] . ' ' . $customers_value['customers_lastname'];
								$data['email'] = $customers_value['customers_email_address'];
								$data['promotion'] = $promotion2;
								$data['final_price'] = $final_price;
								$data['price'] = $price;
								$data['abo_price'] = $full_price;
                $data['general_conditions'] = $conditions;
                $data['subscription'] = $products_values['products_model'];
                if(strpos($_SERVER['HTTP_HOST'],'.nl')>0)
                {
                  $data['host'] = 'www.dvdpost.nl';
                  $data['host_private'] = 'private.dvdpost.nl';
                }
                else
                {
                  $data['host'] = 'www.dvdpost.be';
                  $data['host_private'] = 'private.dvdpost.be';
                }
                
								require('includes/classes/activation_code_actions.php');
								$action=new Activation_code_actions();
								if($discount_type =='A')
									$data2 = $action->execute($customer_id,$customers_value['activation_discount_code_id']);
								else
									$data2 = $action->execute($customer_id,0);
								$error=$data2['error'];
								$status=$data2['status'];
								if ($error == 7)
									parrainage_classic($customer_id);
									
								mail_message($customer_id, 645, $data);
								
								
								if ($customer_values['site'] == 'lavenir')
								{
									mail_message($customer_id, 560, $data);
								}
									
								tep_redirect(tep_href_link('step4.php?type=callback'));
							}
					break;
					default: 
					 $error = true;
				}
			}
			else
			{
					
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
	}
}
require('configure/application_bottom.php');

?>