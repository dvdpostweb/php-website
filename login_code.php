<?php  
$logpwd=1;
require('configure/application_top.php');
require_once 'auth/src/authentification.php';
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,
));
$current_page_name = 'login_code.php';

include(DIR_WS_INCLUDES . 'translation.php');
$email=$HTTP_GET_VARS['email'];
if(!empty($_GET['invisible']))
{
	$invisible=$HTTP_GET_VARS['invisible'];
}

if(empty($email))
{
	$email=$HTTP_GET_VARS['email_address'];
}
if(empty($email))
{
	$email=$HTTP_POST_VARS['email_address'];
}
if (tep_session_is_registered('customer_id')){
	$sql='select * from customers where customers_id='.$_SESSION['customer_id'];
	$query = tep_db_query($sql);
 	$customer_data = tep_db_fetch_array($query);
	$email = $customer_data['customers_email_address'];
} 
  if ($_GET['action'] == 'process') {
  		if (tep_session_is_registered('customer_id')){ 
			$customers_registration_step=$_COOKIE['customers_registration_step'];
			
			if($_GET['force']==1 || $_POST['force']==1)
			{
				include(DIR_WS_INCLUDES . 'check_code.php');
			}
			
			else
			{
				switch($customers_registration_step){			      
	      			case 90:
		   				include(DIR_WS_INCLUDES . 'check_code.php');
						break;
					default:
		         		tep_redirect(tep_href_link('step1.php'));
		         	break;
				
				}
			}	
		}
		}
		else if ($_GET['action'] == 'login'){	
	  		$email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
	   	 	$password = tep_db_prepare_input($HTTP_POST_VARS['password']);
			// Check if email exists
			$sql_query="select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, customers_registration_step , customers_language  from customers where customers_email_address = '" . tep_db_input($email_address) . "'";
	    	$check_customer_query = tep_db_query($sql_query);
	    	if (!tep_db_num_rows($check_customer_query)) {
	     		$login = 'fail';
	    	} else {
	     		 $check_customer = tep_db_fetch_array($check_customer_query);
				// Check that password is good
	      		if (!validate_password($password, $check_customer['customers_password'])) {
	        		$login = 'fail';
	      		} else {
	        		$result = $authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID,"client_secret"=> HTTPS_SECRET, "grant_type" => "user_basic", "username" => $email_address, "password"=> $password, 'redirect_uri' => $authentification->getCurrentUrl()));
							$data_token=json_decode($result,true);
							
							if(!empty($data_token['access_token']) )
					    {
					  		$_SESSION['access_token']=$data_token['access_token'];
								setcookie('refresh_token', $data_token['refresh_token'], time()+315360000, substr(DIR_WS_CATALOG, 0, -1));
								$select ='select * from customers where authentication_token = "'.$data_token['access_token'].'"';
					  		$query = tep_db_query($select);
					  		$customers = tep_db_fetch_array($query);
					  		$customer_id = $customers['customers_id'];
					  		$customer_default_address_id = $customers['customers_default_address_id'];
					  		$customer_first_name = $customers['customers_firstname'];
					  		$customers_registration_step = $customers['customers_registration_step'];
					  		$customer_country_id = "21";
					  		$customer_zone_id = "0";
					  		tep_session_register('customer_id');
					  		tep_session_register('customer_default_address_id');
					  		tep_session_register('customers_registration_step');
					  		tep_session_register('customer_first_name');
					  		tep_session_register('customer_country_id');
					  		tep_session_register('customer_zone_id');	
				  		  setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				  		  setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				  		  setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
								$host = $_SERVER['HTTP_HOST'] ;

								if(strpos($host,'dvdpost.nl')!==false)
								{
									$host='www.dvdpost.nl';
								}
								else if(strpos($host,'dvdpost.be')!==false)
								{
									$host='www.dvdpost.be';
								}
								$url='http://'.$host.'/login_code.php?'.(($_POST['force']==1)?'force=1':'').'&action=process'.(($_POST['force']==1)?'&force=1':'').((!empty($_POST['code']))?'&code='.$_POST['code']:'');
								$url=rawurlencode($url);
								$all=$authentification->getRememberMe($data_token['access_token'],$url);
								header('Location: '.$all);
								die();
							}
	
	        		$date_now = date('Ymd');
			
							last_login($customer_id);	        
	        		if (sizeof($navigation->snapshot) > 0) {
	          			$origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
	          			$navigation->clear_snapshot();
	          			tep_redirect($origin_href);
	        		} else {
	          			//tep_redirect(tep_href_link(FILENAME_DEFAULT));
						if($_GET['force']==1 || $_POST['force']==1)
						{
							include(DIR_WS_INCLUDES . 'check_code.php');
						}
				        else
						{
							switch($customers_registration_step){			          	  
						 	
					      		case 90:
					     			include(DIR_WS_INCLUDES . 'check_code.php');	
								break;
								default:
			          	    		tep_redirect(tep_href_link('step1.php'));
			          	    	break;
		       				}
					   }
	        		}	
	      		}
	    	}
      	}	
  	
	

  
$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'SSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id' || $check_customer['customers_registration_step']<100 )) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
}

require('configure/application_bottom.php');
?>