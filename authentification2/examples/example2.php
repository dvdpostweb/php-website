<?php
session_start();
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,

));

$refresh = 0;
get_access_token($authentification, $_GET['code']);
$status=login($authentification);
if($status!==false)
{
  $customer_id = $status['customer_id'];
	$customer_default_address_id = $status['customer_default_address_id'];
	$customers_registration_step = $status['customers_registration_step'];
	$customer_first_name = $status['customer_first_name'];
	$customer_country_id = "21";
	$customer_zone_id = "0";
	tep_session_register('customer_id', $customer_id);
	tep_session_register('customer_default_address_id', $customer_default_address_id);
	tep_session_register('customers_registration_step', $customers_registration_step);
	tep_session_register('customer_first_name', $customer_first_name);
	tep_session_register('customer_country_id', $customer_country_id);
	tep_session_register('customer_zone_id', $customer_zone_id);
}
function get_access_token($authentification, $code){
  if(empty($_SESSION['access_token']) && !empty($code))
  {
    $result=$authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID,"client_secret"=> HTTPS_SECRET, "grant_type" => "authorization_code", "code" => $code, 'redirect_uri' => $authentification->getCurrentUrl()));
  	$data_token=json_decode($result,true);
    if(!empty($data_token['access_token']) )
    {
  		$_SESSION['access_token']=$data_token['access_token'];
  		if(!empty($data_token['refresh_token']) and empty($_COOKIE['refresh_token']))
  		  setcookie('refresh_token', $data_token['refresh_token'], time()+315360000, substr(DIR_WS_CATALOG, 0, -1));
  		  $refresh=$data_token['refresh_token'];
    }
  }
  if(empty($_SESSION['access_token']))
  {
    if(!empty($refresh))
    {
      $refresh_token = $data_token['refresh_token'];
    }
    else
    {
      $refresh_token = $_COOKIE['refresh_token'];
    }
    if(!empty($refresh_token)){
      $result=$authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID, "client_secret"=> HTTPS_SECRET,"grant_type" => "refresh_token", "refresh_token" => $refresh_token, 'redirect_uri' => $authentification->getCurrentUrl()));
  	  $data_token=json_decode($result,true);
      if(!empty($data_token['access_token']) )
      {
  		  $_SESSION['access_token']=$data_token['access_token'];
  		  if(!empty($data_token['refresh_token']) and empty($_COOKIE['refresh_token']))
  		  {
  		    setcookie('refresh_token', $data_token['refresh_token'], time()+315360000, substr(DIR_WS_CATALOG, 0, -1));
  		  }
      }
      else
      {
				unset($_COOKIE['refresh_token']);		
      }
    }
  }
}

function login($authentification)
{
  $page=$_SERVER['SCRIPT_NAME'];
  if(!empty($_SESSION['access_token']))
  {
  	$me=$authentification->api('/me','GET',array('access_token' => $_SESSION['access_token']));
  	$data=json_decode($me,true);
  	if(isset($data['id']) && !isset($data['error']))
  	{
  		$select ='select * from customers where customers_id = '.$data['id'];
  		$query = tep_db_query($select);
  		$customers = tep_db_fetch_array($query);
  		if ($customers['customers_id']>0)
  		{
  			$customer_id = $customers['customers_id'];
  			$customer_default_address_id = $customers['customers_default_address_id'];
  			$customer_first_name = $customers['customers_firstname'];
  			$customers_registration_step = $customers['customers_registration_step'];
  			$customer_country_id = "21";
  			$customer_zone_id = "0";
  			tep_session_register('customer_id', $customer_id);
  			tep_session_register('customer_default_address_id', $customer_default_address_id);
  			tep_session_register('customers_registration_step', $customers_registration_step);
  			tep_session_register('customer_first_name', $customer_first_name);
  			tep_session_register('customer_country_id', $customer_country_id);
  			tep_session_register('customer_zone_id', $customer_zone_id);	
  				
  		  setcookie('email_address', $email_address, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
  		  setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
  		  setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
  			if($page == '/login_verif.php' || $page == '/login.php' || $page == '/index.php')
  			{
  				$step ="SELECT * FROM generalglobalcode g where codeType='STEP' and codevalue= ".$customers_registration_step;
  				$query_step = tep_db_query($step);
  				$step_data = tep_db_fetch_array($query_step);
  				if (!empty($step_data['CodeDesc2']))
  				{
  					header('Location: /'.$step_data['CodeDesc2']);
  					die();
  				}
  				else
  				{
  					header('Location: '.$authentification->getNewSite());
  					die();
  				}
  			}
				else if ($page == '/step2b.php' || $page == '/step1.php' || $page == '/step3b.php' || $page == '/step3c.php'|| $page == '/step3d.php'|| $page == '/step_check.php'|| $page == '/step4.php'|| $page =='/ogone_process.php' || $page =='/login_code.php' || $page =='/create_account.php'|| $page =='/jobs.php' || $page =='/jobs_description.php' || $page =='/sitemap.php' || $page == '/product_info_shop.php'|| $page =='/custserv_public.php'|| $page ==	'/custserv_detail_public.php' || $page ==	'/custserv_list_public.php' || $page ==	'/custserproblemdvd.php'  || $page ==	'/custserfact.php'|| $page ==	'/custserdvdxy.php' || $page ==	'/custserdom.php' || $page ==	'/custsercodes.php' || $page ==	'/custseroffline.php' || $page ==	'/password_forgotten.php' || $page ==	'/custservtecherror.php' || $page == '/custserfacteramount.php' || $page == '/custserfactsubnodvd.php' || $page ==	'/custserdvdnotreadable.php' || $page ==	'/custserdvdbroken.php' || $page ==	'/custserdvderror.php' || $page ==	'/custserdvdnotarrived.php' || $page ==	'/custserdvdnotyetret.php' || $page ==	'/custserdvdihavedamaged.php' || $page ==	'/custserdvdihavelost.php' || $page ==	'/custsernoenvelope.php' || $page ==	'/custserdvdfinallyarrived.php' || $page == '/custserdvdnotarrived_process.php' || $page ==	'/custserdvdnotreadable_process.php' || $page ==	'/custserdvdbroken_process.php' || $page ==	'/custserdvderror_process.php' || $page ==	'/custserdvdnotyetret_process.php' || $page ==	'/custserdvdihavedamaged_process.php' || $page ==	'/custserdvdihavelost_process.php' || $page ==	'/custserdvdfinallyarrived_process.php' || $page == '/shopping_complete.php' || $page == '/privacy.php')
				{
					//do nothing;
					return array("customer_id" => $customers['customers_id'], "customer_default_address_id" => $customers['customers_default_address_id'], "customer_first_name" => $customers['customers_firstname'],"customers_registration_step" => $customers['customers_registration_step']);
				}
  			else
  			{
  				if($customers_registration_step!=100)
  				{
  						$step ="SELECT * FROM generalglobalcode g where codeType='STEP' and codevalue= ".$customers_registration_step;
  						$query_step = tep_db_query($step);
  						$step_data = tep_db_fetch_array($query_step);
  						if (!empty($step_data['CodeDesc2']))
  						{
  							header('Location: /'.$step_data['CodeDesc2']);
  							die();
  						}
  						else
  						{
  							header('Location: '.$authentification->getNewSite());
  							die();
  						}
  				}
  				else
  				{
  					$redirect=$authentification->redirect();
  					if($redirect !==false)
  					{
  						header('location: '.$redirect);
  						die();
  					}
  					else
  					{
  						//nothing go logged in php
  						return array("customer_id" => $customers['customers_id'], "customer_default_address_id" => $customers['customers_default_address_id'], "customer_first_name" => $customers['customers_firstname'],"customers_registration_step" => $customers['customers_registration_step']);
  					}
  				}
  			}
  		}
  		else //access wrong deconnected
  		{
  			
  			no_access($authentification);
  		}
  	}
  	else //no indentified try to connect or login pass
  	{
  	  $_SESSION['access_token']='';
  		get_access_token($authentification, $_GET['code']);
  		return login($authentification);
  	}
  }
  else //no indentified try to connect or login pass
  {
  	no_access($authentification);
  }
}
function no_access($authentification)
{
	$page=$_SERVER['SCRIPT_NAME'];
  if($page !='/index.php' && $page !='/step1.php' && $page !='/login_code.php' && $page !='/contact.php' && $page !='/how.php'
	){
    $_SESSION['access_token']='';
	  unset($_COOKIE['refresh_token']);
	  $authentification->logout_old_site();
		$url = $authentification->getLogin();
		header('Location: '.$url);
	  die();
	}
	
}
?>