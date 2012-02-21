<?php 
require('configure/application_top.php');

$current_page_name = 'step_subscription_info.php';

if (!tep_session_is_registered('customer_id'))  {
	switch($HTTP_GET_VARS['discount_code_id'])
			  {
			  case 283:					
				$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&discount_code_id=' .$HTTP_GET_VARS['discount_code_id'] ));    
				tep_redirect(tep_href_link('create_account.php?email_address='.$HTTP_GET_VARS['email'], '', 'SSL'));				
			  break;
			  case 285:					
				$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&discount_code_id=' .$HTTP_GET_VARS['discount_code_id'] ));    
				tep_redirect(tep_href_link('create_account.php?email_address='.$HTTP_GET_VARS['email'], '', 'SSL'));				
			  break;
			  default:
				$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&discount_code_id=' .$HTTP_GET_VARS['discount_code_id'] ));    
				tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
			  break;
			  }	 
	
    
}

$customers_query = tep_db_query("select customers_next_abo_type, customers_registration_step, activation_discount_code_id from customers where customers_id = '" . $customers_id. "'");
$customers_values = tep_db_fetch_array($customers_query);			      
      	

//if ($customers_values['customers_next_abo_type']<2) {
//	tep_redirect(tep_href_link(FILENAME_SUBSCRIPTION, '', 'SSL'));
//}

if ($customers_values['customers_registration_step']<41){
	tep_redirect(tep_href_link('step1.php'));	
}


include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>