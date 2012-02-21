<?php
require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot();
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if ( ($navigation->snapshot['page'] != FILENAME_ADDRESS_BOOK) || ($navigation->snapshot['page'] != FILENAME_CHECKOUT_ADDRESS) ) {
$navigation->set_path_as_snapshot(1);
}

if ( ($HTTP_GET_VARS['action'] == 'remove') && (tep_not_null($HTTP_GET_VARS['entry_id'])) ) {
$entry_id = tep_db_prepare_input($HTTP_GET_VARS['entry_id']);
tep_db_query("delete from " . TABLE_ADDRESS_BOOK . " where address_book_id = '" . tep_db_input($entry_id) . "' and customers_id = '" . $customer_id . "'");
tep_db_query("update " . TABLE_ADDRESS_BOOK . " set address_book_id = address_book_id - 1 where address_book_id > " . tep_db_input($entry_id)  . " and customers_id = '" . $customer_id . "'");
tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
}

// Post-entry error checking when updating or adding an entry
$process = false;
if (($HTTP_POST_VARS['action'] == 'process') || ($HTTP_POST_VARS['action'] == 'update')) {
$process = true;
$error = false;

$gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
$company = tep_db_prepare_input($HTTP_POST_VARS['company']);
$firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
$lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
$street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
$suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
$postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
$city = tep_db_prepare_input($HTTP_POST_VARS['city']);
$country = tep_db_prepare_input($HTTP_POST_VARS['country']);
$zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
$state = tep_db_prepare_input($HTTP_POST_VARS['state']);

if (ACCOUNT_GENDER == 'true') {
  if (($gender == 'm') || ($gender == 'f')) {
    $gender_error = false;
  } else {
    $gender_error = true;
    $error = true;
  }
}

if (ACCOUNT_COMPANY == 'true') {
  if (strlen($ompany) < ENTRY_COMPANY_MIN_LENGTH) {
    $company_error = true;
    $error = true;
  } else {
    $company_error = false;
  }
}

if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
  $firstname_error = true;
  $error = true;
} else {
  $firstname_error = false;
}

if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
  $lastname_error = true;
  $error = true;
} else {
  $lasttname_error = false;
}

if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
  $street_address_error = true;
  $error = true;
} else {
  $street_address_error = false;
}

if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
  $postcode_error = true;
  $error = true;
} else {
  $postcode_error = false;
}

if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
  $city_error = true;
  $error = true;
} else {
  $city_error = false;
}

if (!$country) {
  $country_error = true;
  $error = true;
} else {
  $country_error = false;
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

if ($error == false) {
  $sql_data_array = array('entry_firstname' => $firstname,
                          'entry_lastname' => $lastname,
                          'entry_street_address' => $street_address,
                          'entry_postcode' => $postcode,
                          'entry_city' => $city,
                          'entry_country_id' => $country);

  if (ACCOUNT_GENDER == 'true') $sql_data_array['entry_gender'] = $gender;
  if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $company;
  //if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
  if (ACCOUNT_STATE == 'true') {
    if ($zone_id > 0) {
      $sql_data_array['entry_zone_id'] = $zone_id;
      $sql_data_array['entry_state'] = '';
    } else {
      $sql_data_array['entry_zone_id'] = '0';
      $sql_data_array['entry_state'] = $state;
    }
  }

  $entry_id = tep_db_prepare_input($HTTP_POST_VARS['entry_id']);
  if ($HTTP_POST_VARS['action'] == 'update') {
    tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array, 'update', "address_book_id = '" . tep_db_input($entry_id) . "' and customers_id ='" . tep_db_input($customer_id) . "'");
  } else {
    $sql_data_array['customers_id'] = $customer_id;
    $sql_data_array['address_book_id'] = $entry_id + 1;
    tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);

// Go back to where we came from
    if (sizeof($navigation->snapshot) > 0) {
      $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      $navigation->clear_snapshot();
      tep_redirect($origin_href);
    }
  }
  tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
}
}

if (($HTTP_GET_VARS['action'] == 'modify') && ($HTTP_GET_VARS['entry_id'])) {
$entry_query = tep_db_query("select entry_gender, entry_company, entry_firstname, entry_lastname, entry_street_address, entry_suburb, entry_postcode, entry_city, entry_state, entry_zone_id, entry_country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $customer_id . "' and address_book_id = '" . $HTTP_GET_VARS['entry_id'] . "'");
$entry = tep_db_fetch_array($entry_query);
} else {
$entry = array('entry_country_id' => STORE_COUNTRY);
}

$current_page_name = FILENAME_ADDRESS_BOOK_PROCESS;

include(DIR_WS_INCLUDES . 'translation.php');

if ( ($HTTP_GET_VARS['action'] == 'modify') || ( ($HTTP_POST_VARS['action'] == 'update') && ($HTTP_POST_VARS['entry_id']) ) ) {
$breadcrumb->add(NAVBAR_TITLE_MODIFY_ENTRY, tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'action=modify&entry_id=' . ((isset($HTTP_GET_VARS['entry_id'])) ? $HTTP_GET_VARS['entry_id'] : $HTTP_POST_VARS['entry_id']), 'SSL'));
} else {
$breadcrumb->add(NAVBAR_TITLE_ADD_ENTRY, tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL'));
}

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');

?>