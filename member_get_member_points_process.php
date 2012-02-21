<?php

require('configure/application_top.php');

$current_page_name = 'member_get_member_points_process.php';

include(DIR_WS_INCLUDES . 'translation.php');

require(DIR_WS_INCLUDES . 'stat.php');

if (!tep_session_is_registered('customer_id')) {
   $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'sponsoring.php'));
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

	$gift_query = tep_db_query("select * from mem_get_mem_gift where mem_get_mem_gift_id = '" . $HTTP_POST_VARS['mgmgift'] . "' ");
	$gift = tep_db_fetch_array($gift_query);
	if ($gift['quantity'] > 0 ) {
		$cust_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
		$cust = tep_db_fetch_array($cust_query);
		if ($cust['mgm_points'] >= $gift['points'] ) {
			tep_db_query("insert into mem_get_mem_gift_history (customers_id, date, gift_id, points) values ('" . $customer_id . "', now(), '" . $gift['mem_get_mem_gift_id'] . "', '" . $gift['points'] . "') ");
			tep_db_query("update customers set mgm_points= mgm_points - " . $gift['points'] . " where customers_id = '" . $customer_id . "' ");
			tep_db_query("update mem_get_mem_gift set quantity= quantity - 1 where mem_get_mem_gift_id = '" . $gift['mem_get_mem_gift_id'] . "' ");
			
			//$email_text = TEXT_MAIL;
			//$email_text = str_replace('µµµcustomers_nameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'], $email_text);
			//$email_text = str_replace('µµµmail_idµµµ', $mem_get_mem_id, $email_text);
			//tep_mail('', $mgmmail, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
	
			tep_redirect(tep_href_link('member_get_member.php?ok=1', '', 'SSL'));
		}else{		
		tep_redirect(tep_href_link('member_get_member.php?error=2', '', 'SSL'));}
	}else{		
		tep_redirect(tep_href_link('member_get_member.php?error=1', '', 'SSL'));
	}

    

	

?>
