<?php 
require('configure/application_top.php');
$current_page_name = 'step2b.php';

include(DIR_WS_INCLUDES . 'translation.php');
if (!tep_session_is_registered('customer_id') || $customers_registration_step < 21) {
	tep_redirect(tep_href_link('step1.php'));
}
else{
	if(!empty($_GET['dvd']))
	{
		
		$nb_dvd=$_GET['dvd'];
		switch($nb_dvd)
		{
			case 3:
				$produt_id=127762;	
			break;
			case 5:
				$produt_id=127764;
			break;
			case 8:
				$produt_id=127766;
			break;
			case 13:
				$produt_id=127768;
			break;
			case 15:
				$produt_id=127769;
			break;
			default:
				$produt_id=127764;

		}
		
	
	$_POST['products_id']=	$produt_id;
	}
	if ($_POST['products_id']>0){
		
		if ($customers_registration_step==21){
			$customers_registration_step=31;	
			tep_db_query("update " . TABLE_CUSTOMERS . " set customers_next_abo_type = '".$_POST['products_id']."' , customers_abo_type = '".$_POST['products_id']."' , customers_registration_step='".$customers_registration_step."' where customers_id = '" . $customer_id . "'");
			setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
			$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
    		$check_step_values = tep_db_fetch_array($check_step_query);
    		tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
		}else{
			
			//redirection page confirmation step 40 bis 
			//pending ... 
			tep_db_query("update " . TABLE_CUSTOMERS . " set customers_next_abo_type = '".$_POST['products_id']."' , customers_abo_type = '".$_POST['products_id']."'  where customers_id = '" . $customer_id . "'");
			tep_redirect(tep_href_link('step3b.php'));
			
		}
		
	
		setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
    	$check_step_values = tep_db_fetch_array($check_step_query);
    	tep_redirect(tep_href_link($check_step_values['CodeDesc2']));

	}else{
	
	$is_client ="SELECT customers_id, customers_abo, customers_email_address,  activation_discount_code_id, activation_discount_code_type,customers_next_abo_type from customers where customers_id='".$customers_id."'";
	$is_client_query = tep_db_query($is_client);			  
	$is_client_values = tep_db_fetch_array($is_client_query);
	$promotion = promotion($is_client_values['customers_abo_type'],$is_client_values['customers_next_abo_type'],$is_client_values['activation_discount_code_type'],$is_client_values['activation_discount_code_id']);
	
	//ACTIVATION CODE 
	if ($is_client_values['activation_discount_code_type']=='A' && $is_client_values['activation_discount_code_id'] !=0 ){
		$code ="SELECT activation_code from  activation_code where activation_id='".$is_client_values['activation_discount_code_id']."'";
		$code_query = tep_db_query($code);			  
		$code_values = tep_db_fetch_array($code_query);
		tep_redirect(tep_href_link('activation_code_confirm.php?code='.$code_values['activation_code']));		
	}else{
		
		//LANDING PAGE REDIRECT
		//$landing_page ="SELECT landing_page from discount_code where discount_code_id='".$is_client_values['activation_discount_code_id']."'";
		// $landing_page_query = tep_db_query($landing_page);			  
		// $landing_page_values = tep_db_fetch_array($landing_page_query);
		// if($landing_page_values['landing_page']==0){
		// }else{
		//  	$code ="SELECT discount_code from  discount_code where discount_code_id='".$is_client_values['activation_discount_code_id']."'";
		///	$code_query = tep_db_query($code);			  
		//	$code_values = tep_db_fetch_array($code_query);
		//	tep_redirect(tep_href_link('activation_code_confirm.php?code='.$code_values['discount_code']));
		//  }
		
		$banner_code ="SELECT * from discount_code where discount_code_id='".$is_client_values['activation_discount_code_id']."'";
		$banner_code_query = tep_db_query($banner_code);			  
		$banner_code_values = tep_db_fetch_array($banner_code_query);
		$banner=$banner_code_values['banner'];
		$promo_id = $promo_id = $banner_code_values['discount_code_id'];
		$discount_type = $banner_code_values['discount_type'];
		$discount_value =	$banner_code_values['discount_value'];
		}
	
	}
}

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step_2010.php',0,$jacob));

require('configure/application_bottom.php');

?>