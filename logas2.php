<?php  
require('configure/application_top.php');
  $user_query = tep_db_query("select count(*) as cpt from dvdpostlogin where login='".$HTTP_POST_VARS['login']."' ");
  $user = tep_db_fetch_array($user_query);  
  if($user['cpt']==1){  
	  if($HTTP_POST_VARS['customers_id']>0){
			$sql="select * from customers where customers_id  = '" . $HTTP_POST_VARS['customers_id'] . "' ";
			$customers_query = tep_db_query($sql,'db_test',true);
			$customers = tep_db_fetch_array($customers_query);
			
			$customer_id = $customers['customers_id'];
			$customer_default_address_id = $customers['customers_default_address_id'];
			$customer_first_name = $customers['customers_firstname'];
			$customer_country_id = "21";
			$customer_zone_id = "0";
			$customers_registration_step=$customers['customers_registration_step'];    
			
			session_destroy();
			tep_session_register('customer_id');
        	tep_session_register('customer_default_address_id');
        	tep_session_register('customer_first_name');
        	tep_session_register('customer_country_id');
        	tep_session_register('customer_zone_id');

        	setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
        	setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	    	setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
	    	setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));

			
			tep_redirect(tep_href_link('step1.php', '', 'SSL'));	
			  
	   } 
	}else{
		tep_redirect('logas.php?customers_id='.$HTTP_GET_VARS['customers_id']);	
	}        
?>
