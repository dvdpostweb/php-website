<?php
require('configure/application_top.php');

$current_page_name = 'step_member_choice.php';



//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}
/*if (tep_session_is_registered('customer_id')) {
	$sql='select * from abo a 
	join customers c on c.customers_id=a.customerid
	where customers_registration_step=90 and code_id in (580,581,582,583,584,585) and c.customers_id='.$customer_id;
	 $check_customer_query = tep_db_query($sql);
	
	 if($check_customer = tep_db_fetch_array($check_customer_query))
	 {
		
			 tep_redirect(tep_href_link('login_code.php?email_address='.$check_customer['customers_email_address'].'&code=gfc50'));
			
 	 }
	
}*/

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>