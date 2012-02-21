<?php
require('configure/application_top.php');

$current_page_name = FILENAME_SUBSCRIPTION_INFO;

if (!tep_session_is_registered('customer_id')) {
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

if ($HTTP_GET_VARS['products_id']<2) {
	tep_redirect(tep_href_link(FILENAME_SUBSCRIPTION, '', 'SSL'));
}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>