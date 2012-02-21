<?php 
$logpwd=1;

require('configure/application_top.php');

$current_page_name = FILENAME_ACCOUNT_EDIT_PROCESS;

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => FILENAME_ACCOUNT_EDIT));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

if ($HTTP_POST_VARS['action'] != 'process') {
   tep_redirect(tep_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL'));
}

  $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
  $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
  $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
  $dob = tep_db_prepare_input($HTTP_POST_VARS['dob']);
  $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
  $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
  $telephone_evening = tep_db_prepare_input($HTTP_POST_VARS['telephone_evening']);
  $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);
  $newsletter = tep_db_prepare_input($HTTP_POST_VARS['newsletter']);
  $newsletterpartner = tep_db_prepare_input($HTTP_POST_VARS['newsletterpartner']);
  $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
  $confirmation = tep_db_prepare_input($HTTP_POST_VARS['confirmation']);
  $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
  $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
  $suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
  $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
  $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
  $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
  $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
  $country = tep_db_prepare_input($HTTP_POST_VARS['country']);
  $adult_pwd = tep_db_prepare_input($HTTP_POST_VARS['adult_pwd']);

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
    $entry_firstname_error = true;
  } else {
    $entry_firstname_error = false;
  }

  if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
    $error = true;
    $entry_lastname_error = true;
  } else {
    $entry_lastname_error = false;
  }

  if (ACCOUNT_DOB == 'true') {
    if (checkdate(substr(tep_date_raw($dob), 4, 2), substr(tep_date_raw($dob), 6, 2), substr(tep_date_raw($dob), 0, 4))) {
      $entry_date_of_birth_error = false;
    } else {
      $error = true;
      $entry_date_of_birth_error = true;
    }
  }

  if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
    $error = true;
    $entry_email_address_error = true;
  } else {
    $entry_email_address_error = false;
  }

  if (!mail_verify($email_address)) {
    $error = true;
    $entry_email_address_check_error = true;
  } else {
    $entry_email_address_check_error = false;
  }

  if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
    $error = true;
    $entry_street_address_error = true;
  } else {
    $entry_street_address_error = false;
  }

  if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
    $error = true;
    $entry_post_code_error = true;
  } else {
    $entry_post_code_error = false;
  }

  if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
    $error = true;
    $entry_city_error = true;
  } else {
    $entry_city_error = false;
  }

  if (!is_numeric($country)) {
    $error = true;
    $entry_country_error = true;
  } else {
    $entry_country_error = false;
  }

  if (ACCOUNT_STATE == 'true') {
    if ($entry_country_error) {
      $entry_state_error = true;
    } else {
      $zone_id = 0;
      $entry_state_error = false;
      $country_check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "'");
      $country_check = tep_db_fetch_array($country_check_query);
      if ($entry_state_has_zones = ($country_check['total'] > 0)) {
        $match_zone_query = tep_db_query("select zone_id from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' and zone_name = '" . tep_db_input($state) . "'");
        if (tep_db_num_rows($match_zone_query) == 1) {
          $match_zone = tep_db_fetch_array($match_zone_query);
          $zone_id = $match_zone['zone_id'];
        } else {
          $match_zone_query = tep_db_query("select zone_id from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' and zone_code = '" . tep_db_input($state) . "'");
          if (tep_db_num_rows($match_zone_query) == 1) {
            $match_zone = tep_db_fetch_array($match_zone_query);
            $zone_id = $match_zone['zone_id'];
          } else {
            $error = true;
            $entry_state_error = true;
          }
        }
      } elseif (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
        $error = true;
        $entry_state_error = true;
      }
    }
  }

  if (strlen($telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
    $error = true;
    $entry_telephone_error = true;
  } else {
    $entry_telephone_error = false;
  }

if(strlen($password)>0){  
	if (strlen($password) < ENTRY_PASSWORD_MIN_LENGTH) {
    	$error = true;
    	$entry_password_error = true;
  	} else {
    	$entry_password_error = false;
  	}
}
  if ($password != $confirmation) {
    $error = true;
    $entry_password_error = true;
  }

  $check_email_query = tep_db_query("select count(*) as total from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "' and customers_id != '" . tep_db_input($customer_id) . "'");
  $check_email = tep_db_fetch_array($check_email_query);
  if ($check_email['total'] > 0) {
    $error = true;
    $entry_email_address_exists = true;
  } else {
    $entry_email_address_exists = false;
  }

  if ($error == true) {
    $processed = true;

		include(DIR_WS_INCLUDES . 'translation.php');
		
		$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
		
		$page_body_to_include = $current_page_name;
		
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

  } else {
	$customers_query = tep_db_query("select customers_registration_step,customers_info_date_account_created , customers_abo from customers where customers_id = '" . $customer_id . "' ");
	$customers_values = tep_db_fetch_array($customers_query);
	if ($customers_values['customers_registration_step'] > 30){
		$step=$customers_values['customers_registration_step'];
		$created_date=$customers_values['customers_info_date_account_created'];
	}else{
		$step=80;
		$created_date=date("'Y-m-d H:m:s'");
	}
	   
    $sql_data_array = array('customers_firstname' => $firstname,
                            'customers_lastname' => $lastname,
                            'customers_email_address' => $email_address,
                            'customers_telephone' => $telephone,
                            'customers_telephone_evening' => $telephone_evening,
                            'customers_fax' => $fax,
                            'customers_newsletter' => $newsletter,
                            'customers_newsletterpartner' => $newsletterpartner,
                            'sponsored_code' => $sponsoring,
                            'customers_default_address_id' => 1,
                            'customers_info_number_of_logons' => 0,
                            'customers_registration_step' => $step,
                            'customers_language' => $languages_id,
                            'site' => WEB_SITE,
                            'partners_id' =>$partners_id,                
                            );
	if(strlen($password)>0)
		$sql_data_array['customers_password'] = crypt_password($password);
	//var_dump($sql_data_array);
	//die();
    if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;
    if (ACCOUNT_DOB == 'true') $sql_data_array['customers_dob'] = tep_date_raw($dob);

    tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("update customers set customers_info_date_account_last_modified = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_id = '" . $customer_id . "'");

    $sql_data_array = array('entry_street_address' => $street_address,
                            'entry_firstname' => $firstname,
                            'entry_lastname' => $lastname,
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

    $count_address = tep_db_query("select * from address_book where customers_id = '" . $customer_id . "' and address_book_id = '" . $customer_default_address_id . "'");
	if ($count = tep_db_fetch_array($count_address)){
		tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array, 'update', "customers_id = '" . tep_db_input($customer_id) . "' and address_book_id = '" . tep_db_input($customer_default_address_id) . "'");
	}else{
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
	}
    tep_db_query("update customers set customers_info_date_account_last_modified = now() where customers_id = '" . tep_db_input($customer_id) . "'");

    $customer_first_name = $firstname;
    if ($HTTP_COOKIE_VARS['first_name']) setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	$customers_query = tep_db_query("select customers_registration_step, customers_abo from customers where customers_id = '" . $customer_id . "' ");
	$customers_values = tep_db_fetch_array($customers_query);
	setcookie('customers_registration_step', $customers_values['customers_registration_step'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	$customers_registration_step=$customers_values['customers_registration_step'];
    
	$customer_country_id = $country;
    $customer_zone_id = $zone_id;

    tep_redirect(tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  }

require('configure/application_bottom.php');

?>