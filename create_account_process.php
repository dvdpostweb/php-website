<?php 
$logpwd=1;

require('configure/application_top.php');
require_once 'authentification/src/authentification.php';
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,
));

$current_page_name = FILENAME_CREATE_ACCOUNT_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

  if (!@$HTTP_POST_VARS['action']) {
    tep_redirect(tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'NONSSL'));
  }
  $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
  $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
  $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
  $day = tep_db_prepare_input($HTTP_POST_VARS['day']);
  $month = tep_db_prepare_input($HTTP_POST_VARS['month']);
  $year = tep_db_prepare_input($HTTP_POST_VARS['year']);
  $dob=$year.'-'.$month.'-'.$day;
  $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address_step']);
  $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
//  $telephone_evening = tep_db_prepare_input($HTTP_POST_VARS['telephone_evening']);
//  $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);

  $newsletter = tep_db_prepare_input($HTTP_POST_VARS['newsletter']);
  $newsletterpartner = tep_db_prepare_input($HTTP_POST_VARS['newsletterpartner']);
  $password = tep_db_prepare_input($HTTP_POST_VARS['password_step']);
//  $confirmation = tep_db_prepare_input($HTTP_POST_VARS['confirmation']);

  $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
//  $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
  $suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
  $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
  $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
//  $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
//  $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
// $country = tep_db_prepare_input($HTTP_POST_VARS['country']);
//  $sponsoring = tep_db_prepare_input($HTTP_POST_VARS['sponsoring']);
  if(strpos($host,'dvdpost.nl')!==false)
	{
		$country = 150;
	}
	else
	{
		$country = 21;
	}
  $error = false; // reset error flag

  if (ACCOUNT_GENDER == 'true') {
    if (($gender == 'm') || ($gender == 'f')) {
      $entry_gender_error = false;
    } else {
      $error = true;
      $entry_gender_error = true;
    }
  }
  if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
    $error = true;
    $error_firstname = true;
  } else {
    $error_firstname = false;
  }
  if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
    $error = true;
    $error_lastname = true;
  } else {
    $error_lastname = false;
  }
  if (ACCOUNT_DOB == 'true') {
    if ($day>0 && $month>0 && $year>0) {
      $error_birth = false;
    } else {
      $error = true;
      $error_birth = true;
    }
  }
	$is_client ="SELECT customers_id, customers_abo, customers_email_address from customers where customers_email_address='".$_POST['email_address_step']."'";
	$is_client_query = tep_db_query($is_client);			  
	$is_client_values = tep_db_fetch_array($is_client_query);	
	

	
//check email 
	$error_email=-1;
	if (mail_verify($_POST['email_address_step'])) {	    
	} else {
	    $error_email=2;
		$error = true;
	}
	
	//MAIL CHECKER2
	if ($_POST['email_address_step'] == $is_client_values['customers_email_address']){
		$error_email=1;
		$error = true;
	}
  if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
    $error = true;
    $error_street = true;
  } else {
    $error_street = false;
  }
  if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
    $error = true;
    $entry_post_code_error = true;
  } else {
    $entry_post_code_error = false;
  }

  if (strlen($city) < 5) {
    $error = true;
    $error_city = 1;
  } else {
    $error_city = false;
  }
  if (ACCOUNT_STATE == 'true') {
    if ($entry_country_error) {
      $entry_state_error = true;
    } else {
      $zone_id = 0;
      $entry_state_error = false;
      $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "'");
      $check_value = tep_db_fetch_array($check_query);
      $entry_state_has_zones = ($check_value['total'] > 0);
      if ($entry_state_has_zones) {
        $zone_query = tep_db_query("select zone_id from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' and zone_name = '" . tep_db_input($state) . "'");
        if (tep_db_num_rows($zone_query) == 1) {
          $zone_values = tep_db_fetch_array($zone_query);
          $zone_id = $zone_values['zone_id'];
        } else {
          $zone_query = tep_db_query("select zone_id from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' and zone_code = '" . tep_db_input($state) . "'");
          if (tep_db_num_rows($zone_query) == 1) {
            $zone_values = tep_db_fetch_array($zone_query);
            $zone_id = $zone_values['zone_id'];
          } else {
            $error = true;
            $entry_state_error = true;
          }
        }
      } else {
        if (!$state) {
          $error = true;
          $entry_state_error = true;
        }
      }
    }
  }
	$phone = eregi_replace("([^0-9])","",$_POST['telephone']);
	$phone_ok=preg_match('/^(\+)?[0-9 \/.]+$/',$_POST['telephone']); 
	if (strlen($phone)< 9 || $phone_ok==false ){
		$error_phone=1;
		$error = true;	
	}
	
  $passlen = strlen($password);
  if ($passlen < ENTRY_PASSWORD_MIN_LENGTH) {
    $error = true;
    $error_pass = 1;
  } else if($passlen >= ENTRY_PASSWORD_MIN_LENGTH){
    $error_pass = -1;
  
  } else {
    $error_pass = 0;
  }
/* if(md5($_POST['nombre']) != $_POST['image_value']){
    $error = true;
    $error_captcha = true;
  }
var_dump($error);*/

  if ($error == true) {
    $processed = true;

    $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'NONSSL'));
    $breadcrumb->add(NAVBAR_TITLE_2);
	
	$page_body_to_include = $current_page_name;
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));
	$created_date=date("'Y-m-d H:m:s'");
  } else {
    $sql_data_array = array('customers_firstname' => $firstname,
                            'customers_lastname' => $lastname,
                            'customers_email_address' => $email_address_step,
                            'customers_telephone' => $telephone,
                            'customers_newsletter' => $newsletter,
                            'customers_newsletterpartner' => $newsletterpartner,
                            'marketing_ok' => (($newsletterpartner==1)?'YES':'NO'),
                            'customers_password' => crypt_password($password),
                            'customers_default_address_id' => 1,
                            'customers_info_number_of_logons' => 0,
                            'customers_registration_step' => 80,                            
                            'customers_language' => $languages_id,
                            'site' => WEB_SITE,
                            'partners_id' =>$partners_id,                
                            );

    if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;
    if (ACCOUNT_DOB == 'true') $sql_data_array['customers_dob'] = $dob;

    tep_db_perform(TABLE_CUSTOMERS, $sql_data_array);

    $customer_id = tep_db_insert_id();
    //activate custmers_id cookie
	setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
    if($customer_id ==0)
	{
		$sql='select * from customers where customers_firstname="'.$firstname.'" and customers_lastname="'.$lastname.'" order by customers_id desc ';
		$query=tep_db_query($sql,'db_link',true);
		if($values = tep_db_fetch_array($query)){
			$customer_id = $values['customers_id'];
		}
		
	}
	$sql_data_array = array('customers_id' => $customer_id,
                            'address_book_id' => 1,
                            'entry_firstname' => $firstname,
                            'entry_lastname' => $lastname,
                            'entry_street_address' => $street_address,
                            'entry_postcode' => $postcode,
                            'entry_city' => $city,
                            'entry_country_id' => $country);

    if (ACCOUNT_GENDER == 'true') $sql_data_array['entry_gender'] = $gender;
    if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $company;
    if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
    if (ACCOUNT_STATE == 'true') {
      if ($zone_id > 0) {
        $sql_data_array['entry_zone_id'] = $zone_id;
        $sql_data_array['entry_state'] = '';
      } else {
        $sql_data_array['entry_zone_id'] = '0';
        $sql_data_array['entry_state'] = $state;
      }
    }

    tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);
	tep_db_query("update customers set customers_info_date_account_created= now(), customers_info_date_account_last_modified = now() where customers_id = '" . $customer_id . "'");
	last_login($customer_id);
    
    
	//insert shopping items (products_id & box_id)
	//shopping bag products_id
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $id=>$qty) {
			$sc_query = tep_db_query("select p.products_sale_price, pd.products_name from products p left join products_description pd on pd.products_id = p.products_id and pd.language_id='" . $languages_id . "' where p.products_type = 'DVD_NORM' and p.products_id ='".$id."'");
			$sc = tep_db_fetch_array($sc_query);
			tep_db_query(" insert into shopping_cart (customers_id, products_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $id . "','". $qty."','" . $sc['products_sale_price'] . "',now() ) ");
		}
	}
		
	//Shopping bag box_id
	$cart_box = $_SESSION['cart_box'];
		if ($cart_box) {
		$items = explode(',',$cart_box);
		$contents = array();
					foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		foreach ($contents as $id=>$qty) {
			$sc_query = tep_db_query("select sb.shopping_box_id,sb.sale_price,sb.nbr_items, sbd.shopping_box_name from shopping_box sb left join shopping_box_description sbd on sbd.shopping_box_id = sb.shopping_box_id and sbd.language_id='" . $languages_id . "' where sb.shopping_box_id ='".$id."'");
			$sc = tep_db_fetch_array($sc_query);
			tep_db_query(" insert into shopping_cart (customers_id, shopping_box_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $id . "', '".$qty."','" . $sc['sale_price'] . "',now() ) ");
		}
	}	
	
	
	
    $customer_first_name = $firstname;
    $customer_default_address_id = 1;
    $customer_country_id = $country;
    $customer_zone_id = $zone_id;
    tep_session_register('customer_id');
    tep_session_register('customer_first_name');
    tep_session_register('customer_default_address_id');
    tep_session_register('customer_country_id');
    tep_session_register('customer_zone_id');
    
    $customers_query = tep_db_query("select customers_registration_step, customers_abo from customers where customers_id = '" . $customer_id . "' ");
	$customers_values = tep_db_fetch_array($customers_query);
	setcookie('customers_registration_step', $customers_values['customers_registration_step'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	$customers_registration_step=$customers_values['customers_registration_step'];
    

    // build the message content
    $name = $firstname . " " . $lastname;

    //old
    //if (ACCOUNT_GENDER == 'true') {
    //   if ($HTTP_POST_VARS['gender'] == 'm') {
    //     $email_text = EMAIL_GREET_MR;
    //   } else {
    //     $email_text = EMAIL_GREET_MS;
    //   }
    //} else {
    //  $email_text = EMAIL_GREET_NONE;
    //}

    //$email_text .= EMAIL_WELCOME . EMAIL_TEXT . EMAIL_CONTACT . EMAIL_WARNING;
    //tep_mail($name, $email_address, EMAIL_SUBJECT, nl2br($email_text), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
    
    
    //new
	//replace $$$truc$$$

	$email_text = TEXT_MAIL;
	$email_text = str_replace('µµµcustomers_nameµµµ', $name , $email_text);
	$email_text = str_replace('µµµcustomers_emailµµµ', $email_address , $email_text);
	$email_text = str_replace('µµµcustomers_addressµµµ', $street_address . ' ' .  $postcode . ' ' .  $city , $email_text);
    
    tep_mail($name, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

//    tep_redirect(tep_href_link(FILENAME_CREATE_ACCOUNT_SUCCESS, '', 'SSL'));

    if (sizeof($navigation->snapshot) > 0) {
      $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      $navigation->clear_snapshot();
      $url = $origin_href;
    } else {
      $url = tep_href_link('mydvdshop_public.php');
    }
			$result = $authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID,"client_secret"=> HTTPS_SECRET, "grant_type" => "user_basic", "username" => $email_address_step, "password"=> $password, 'redirect_uri' => $authentification->getCurrentUrl()));
			$data_token=json_decode($result,true);
			$all=$authentification->getRememberMe($data_token['access_token'],$url);
			header('Location: '.$all);
			die();
  }

require('configure/application_bottom.php');

?>