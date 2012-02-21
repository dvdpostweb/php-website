<?php

  require('configure/application_top.php');
  require 'auth/src/authentification.php';

  $authentification= new Authentification(array(
    'client_id'  => HTTPS_CLIENT_ID,
    'secret' => HTTPS_SECRET,
	  'domain' => HTTPS_URL,
	  'site' => PRIVATE_SITE,
  ));
  	$authentification->logout_old_site();
		$logout=$authentification->api('/sign_out','POST',array('oauth_token' => $_SESSION['access_token']));
    $_SESSION['access_token']='';
    $_COOKIE['refresh_token']='';
		header('location: /default.php');
    die();

  setcookie ("email_address", "", time() - 3600);
  setcookie ("first_name", "", time() - 3600);
  setcookie ("customers_registration_step", "", time() - 3600);
  setcookie('customers_id', '', time()- 3600);
  tep_session_unregister('customer_id');
  tep_session_unregister('customer_country_id');
  tep_session_unregister('customer_zone_id');
  tep_session_unregister('osCsid');
  tep_session_unregister('sessionCookie');
  tep_redirect(tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'));

  require('configure/application_bottom.php');
?>