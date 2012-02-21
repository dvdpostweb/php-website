<?php 
require('configure/application_top.php');

$current_page_name = 'step3d.php';
$page_body_to_include = $current_page_name;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
if( $customers_registration_step==100){
	tep_redirect(tep_href_link('mydvdpost.php'));
	die();
}


if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link('step1.php'));
}else{
	$sql='select * from customers where customers_id='.$customer_id;
	$sql_query=tep_db_query($sql,'db_link',true);
	$customers_value=tep_db_fetch_array($sql_query);
	if($customers_value['customers_registration_step']==70)
	{
		switch($customers_value['domiciliation_status'])
		{
			case 6:
			case 7:
				tep_redirect(tep_href_link('domiciliation70_pending.php'));	
			break;
		}
	}
	if($customers_value['customers_registration_step']==31 ||$customers_value['customers_registration_step']==32  ){
	    $sql="update customers set customers_registration_step='70',domiciliation_status=0,customers_abo_payment_method=2,customers_info_date_account_last_modified=now() where customers_id = '" . $customer_id . "'";
		tep_db_query($sql);
	}
		
		
		
		
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));
		require('configure/application_bottom.php');
}

?>