<?php 
require('configure/application_top.php');

$current_page_name = FILENAME_SURVEY_CUSTSERV;

if (!tep_session_is_registered('customer_id')) {
	if (strlen($HTTP_COOKIE_VARS['email_address']) > 0){
		$customers_query = tep_db_query("select * from customers where customers_email_address   = '" . $HTTP_COOKIE_VARS['email_address'] . "' ");
		$customers = tep_db_fetch_array($customers_query);
		if ($customers['customers_id']>0){
			$customer_id = $customers['customers_id'];
			$customer_default_address_id = $customers['customers_default_address_id'];
			$customer_first_name = $customers['customers_firstname'];
			$customer_country_id = "21";
			$customer_zone_id = "0";
			tep_session_register('customer_id');
			tep_session_register('customer_default_address_id');
			tep_session_register('customer_first_name');
			tep_session_register('customer_country_id');
			tep_session_register('customer_zone_id');		
	        setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	        setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	        setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	        $date_now = date('Ymd');
					last_login($customer_id);
		}else{
			$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
			tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
		}
	}else{
		$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
		tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
	}	
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>