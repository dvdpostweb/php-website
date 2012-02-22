<?php
$logpwd=1;
require('configure/application_top.php');
require 'authentification/src/authentification.php';
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,
));
$current_page_name = 'login_new.php';

include(DIR_WS_INCLUDES . 'translation.php');

$var_status='passwordstatus';
$var_customers_id ='passwordcustomers';
$var_status='passwordstatus';

if(!tep_session_is_registered($var_status) || $$var_status!==true )
{
	header('Location: /expired.php');
	die();
}
$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
$sql="select customers_email_address from customers where customers_id = " . $$var_customers_id;
$check_customer_query = tep_db_query($sql ,'db_link',true);
$check_customer = tep_db_fetch_array($check_customer_query);
$url_back = $_GET['url_back'];
if(empty($url_back))
	$url_back = $_POST['url_back'];

if(empty($_POST['process'])){
	$action="start";
}
else
{
	if(strlen($_POST['new_pass'])<13){
	if(strlen($_POST['new_pass'])>4)
	{
		if($_POST['new_pass']==$_POST['new_pass2'])
		{
			
			
			$crpted_password = crypt_password($_POST['new_pass']);
      		$sql = sprintf("UPDATE " . TABLE_CUSTOMERS . " SET customers_password = '%s' WHERE customers_id = %d", $crpted_password, $$var_customers_id);
      		$status=tep_db_query($sql);
			if($status==true)
			{
				
				
				
				/*auto login*/
				
				$result = $authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID,"client_secret"=> HTTPS_SECRET, "grant_type" => "user_basic", "username" => $check_customer['customers_email_address'], "password"=> $_POST['new_pass'], 'redirect_uri' => $authentification->getCurrentUrl()));
				$data_token=json_decode($result,true);
				tep_session_register('access_token',$data_token['access_token']);
				setcookie('refresh_token', $data_token['refresh_token'], time()+315360000, substr(DIR_WS_CATALOG, 0, -1));
				
				$sql="select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, customers_registration_step , customers_language  from customers where customers_id = " . $$var_customers_id;
				$check_customer_query = tep_db_query($sql ,'db_link',true);
 				$check_customer = tep_db_fetch_array($check_customer_query);
			// Check that password is good
		        $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $check_customer['customers_id'] . "' and address_book_id = '1'");
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
			    tep_session_register('customers_registration_step');
					tep_session_register('customer_zone_id');
					
			    setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
			    setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				  setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
				  setcookie('customers_registration_step', $customers_registration_step , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
			    $date_now = date('Ymd');
					last_login($customer_id);
					if(!empty($url_back))
					{
						$url = '/rememberme.php?url='.rawurlencode($url_back);
					}
					else
					{
						$url = '/rememberme.php?url='.rawurlencode(PRIVATE_SITE.'/'.$lang_short);
					}
					$refresh=array('link'=>$url,'secondes'=>125);
					/* invalidé le lien unique */
				
					
					
					
					$$var_customers_id=0;
					$$var_status=false;
					tep_session_register($var_customers_id);
					tep_session_register($var_status);
				
					$action="finish";
				
				
				
			}
			else
			{
				$action="start";
			}
		}
		else
		{
			$action="error2";
		}
	}
	else
	{
		$action="error1";
	}
	}
	else
	{
		$action="error3";
	}
}
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step.php'));

require('configure/application_bottom.php');

?>