<?php  
ini_set('display_errors','1'); 
require('configure/application_top.php');

$logpwd=1;
$current_page_name = FILENAME_LOGIN;

include(DIR_WS_INCLUDES . 'translation.php');

  if ($HTTP_GET_VARS['action'] == 'process') {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
// Check if email exists
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, customers_registration_step , customers_language  from customers where customers_email_address = '" . tep_db_input($email_address) . "'",'db_link',true);
    
    if (!tep_db_num_rows($check_customer_query)) {
      $HTTP_GET_VARS['login'] = 'fail';
    } else {
      $check_customer = tep_db_fetch_array($check_customer_query);
// Check that password is good
      if (!validate_password($password, $check_customer['customers_password'])) {
        $HTTP_GET_VARS['login'] = 'fail';
		$subbits = explode(":", $check_customer['customers_password'], 2);
	    $dbpassword = $subbits[0];
	    $salt = $subbits[1];
	    $passtring = $salt . $password;

	    $encrypted = md5($passtring);

      } else {
        $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $check_customer['customers_id'] . "' and address_book_id = '1'",'db_link',true);
        $check_country = tep_db_fetch_array($check_country_query);

        $customer_id = $check_customer['customers_id'];
        $customer_default_address_id = $check_customer['customers_default_address_id'];
        $customer_first_name = $check_customer['customers_firstname'];
        $customer_country_id = $check_country['entry_country_id'];
        $customer_zone_id = $check_country['entry_zone_id'];
        $customers_registration_step=$check_customer['customers_registration_step'];
        
        tep_session_register('customer_id');
        tep_session_register('customer_default_address_id');
        tep_session_register('customer_first_name');
        tep_session_register('customer_country_id');
        tep_session_register('customer_zone_id');
        setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
        setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	    	setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	    	setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				
        $date_now = date('Ymd');
		
		tep_db_query("update customers set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_id = '" . $customer_id . "'",'db_link',true);
        if (sizeof($navigation->snapshot) > 0) {
          $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
          $navigation->clear_snapshot();
          tep_redirect($origin_href);
        } else {
          //tep_redirect(tep_href_link(FILENAME_DEFAULT));
          switch($customers_registration_step){
			      
	          	  case 21:
			      	 tep_redirect(tep_href_link('step2b.php'));
			      	break;
			      	
			      case 31:
			      	 tep_redirect(tep_href_link('step3b.php'));
			      	break;
	          	  case 32:
				   	 tep_redirect(tep_href_link('step3c.php'));
				  	break;
				  case 70:
				   	 tep_redirect(tep_href_link('/step3d.php'));
				  break;
				  case 75:
				  	 tep_redirect(tep_href_link('step4.php?type=domiciliation'));
				  break;
				
			      case 80:
			      	 tep_redirect(tep_href_link('mydvdshop_public.php'));
			      	break;
			      	
			      case 90:
			      	 tep_redirect(tep_href_link('step_member_choice.php'));
			      	break;
			      	
			      case 95:
			      	 tep_redirect(tep_href_link('step4.php?type=login'));
			      	break;
			      	
			      	
			     default:
		    		tep_redirect(tep_href_link('step1.php'));
		    	}	
        }
      }
    }
  }

  
$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'SSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_login.php'));

require('configure/application_bottom.php');
?>