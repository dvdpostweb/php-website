<?php
require('configure/application_top.php');
require 'authentification2/src/authentification.php';
require_once 'authentification2/examples/example2.php';
$authentification= new Authentification(array(
  'client_id'  => HTTPS_CLIENT_ID,
  'secret' => HTTPS_SECRET,
  'domain' => HTTPS_URL,
  'site' => PRIVATE_SITE,
  ));
  $current_page_name = 'step1.php';
  $nav = true;
  include(DIR_WS_INCLUDES . 'translation.php');
  //error counter
  $error_cpt=0;
  //error flags
  $error_pass=0;
  $error_email=0;
  $error_captcha=0;
  //$_POST['activation_code']='yyyodasss';
  //$_COOKIE['activation_code']='yyyodasss';
  $_POST['email_address']=trim($_POST['email_address_step']);
  $_POST['password']=trim($_POST['password_step']);
  if($customer_id ==0)
    unset($_SESSION['customer_id']);

  if (!tep_session_is_registered('customer_id')) {
    if (!empty($_COOKIE['activation_code']) && empty($_GET['activation_code']) && empty($_POST['activation_code']))
      $_POST['activation_code']=$_COOKIE['activation_code'];			
    if (!empty($_GET['activation_code']) && empty($_POST['activation_code']))
      $_POST['activation_code']=$_GET['activation_code'];

    $activation_code=$_POST['activation_code'];

    $_POST['activation_code']=strtolower($_POST['activation_code']);
    if (strlen($_POST['activation_code'])>1 || strlen($_COOKIE['activation_code'])>1){
      $act_code ="SELECT activation_id,next_discount, activation_group, activation_products_id,next_abo_type from activation_code where activation_code='". $_POST['activation_code']."' and customers_id=0 AND activation_code_validto_date > now()";
      $act_code_query = tep_db_query($act_code);			  
      if ($act_code_values = tep_db_fetch_array($act_code_query)){
        $activation_discount_code_id=$act_code_values['activation_id'];
        if ($act_code_values['activation_group']==3){
          switch($act_code_values['activation_products_id']){
            case 5:
            $hd_products=18;
            break;
            case 6:
            $hd_products=20;
            break;
            case 7:
            $hd_products=22;
            break;
            default:	
            $hd_products=$act_code_values['activation_products_id'];
            break;
          }
          setcookie('activation_code', $_POST['activation_code'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1)); 
          tep_db_query("update activation_code set activation_products_id = ".$hd_products." where activation_code = '".$_POST['activation_code']."'");

        }
        $products_id=$act_code_values['activation_products_id'];	
        if ($act_code_values['next_abo_type'] > 0)
          $next_abo_type=$act_code_values['next_abo_type'];
        else
          $next_abo_type=$act_code_values['activation_products_id'];

        $activation_discount_code_type="A";		
        $goto_step=31;
        $activation_discount_next=$act_code_values['next_discount'];

      }
      else
      {
        $disc_code ="SELECT discount_code_id,next_discount, goto_step,listing_products_allowed,discount_value,next_abo_type  from discount_code where discount_code='". $_POST['activation_code']."' and (discount_validityto > now() || discount_validityto is NULL) and discount_status=1";
        $disc_code_query = tep_db_query($disc_code);
        if($disc_code_values = tep_db_fetch_array($disc_code_query)){
          $activation_discount_code_id=$disc_code_values['discount_code_id'];
          if ($disc_code_values['next_abo_type'] > 0)
            $next_abo_type=$disc_code_values['next_abo_type'];
          else
            $next_abo_type=$disc_code_values['listing_products_allowed'];
          $activation_discount_code_type="D";
          $discount_value=$disc_code_values['discount_value'];
          $goto_step=$disc_code_values['goto_step'];
          if ($goto_step>=31) { $products_id=$disc_code_values['listing_products_allowed'];}
          $activation_discount_next=$disc_code_values['next_discount'];
          setcookie('activation_code', $_POST['activation_code'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1)); 
        }else{
          //mauvais code on force a freetest2
          if($_SERVER['SERVER_NAME'] == 'www.dvdpost.nl' ||  $_SERVER['SERVER_NAME'] == 'dvdpost.nl')
          {
            $activation_code='DVDNL';
            $activation_discount_code_id=130200;
            $products_id = $activation_discount_code_id;
          }
          else
          {
            $activation_code='univers';
            $activation_discount_code_id=1022;
          }
          $activation_discount_code_type="D";	
          $activation_discount_next=0;
          $goto_step=21;

          if (!tep_session_is_registered('customer_id')) {
            $cust_info ="SELECT discount_code_id , next_discount from discount_code where discount_code='". $_POST['activation_code']."'";
            $cust_info_query = tep_db_query($cust_info);
            $cust_info_values = tep_db_fetch_array($cust_info_query);

          }
        }
      }
    }
    else
    {
      //si il y a un probleme de cookies on force au FREETRIAL 	

      $activation_discount_code_type="D";	
      $activation_discount_next=0;
      $goto_step=21;
      if($_SERVER['SERVER_NAME'] == 'www.dvdpost.nl' ||  $_SERVER['SERVER_NAME'] == 'dvdpost.nl')
      {
        $activation_code='DVDNL';
        $activation_discount_code_id=1461;
        $products_id = 130200;
      }
      else
      {
        $activation_code='univers';
        $activation_discount_code_id=1022;
      }
      if (!tep_session_is_registered('customer_id')) 
      {
        $cust_info ="SELECT discount_code_id , next_discount from discount_code where discount_code='". $_POST['activation_code']."'";
        $cust_info_query = tep_db_query($cust_info);
        $cust_info_values = tep_db_fetch_array($cust_info_query);

      }
    }
    if ($_POST['products_id']){$products_id=$_POST['products_id'];}
    //else {$products_id=$_POST['products_id'];}
    if(!$next_abo_type>0)
    {
      $next_abo_type = $products_id;
    }
    //

    $current_products_id=$products_id;

    $current_products_query = tep_db_query("SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$current_products_id. "'");
    $current_products_values = tep_db_fetch_array($current_products_query);
    $current_credits=$current_products_values['qty_credit'];
    $promo_type = (($current_credits == 0) ? 'unlimited':'freetrial');


    $products_query = tep_db_query("SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$next_abo_type. "'");
    $products_values = tep_db_fetch_array($products_query);
    $credits=$products_values['qty_credit'];
    $price_abo=$products_values['products_price'];
    $rotation = $products_values['qty_at_home'];
    $promo_id=$activation_discount_code_id;
    $discount_type=$activation_discount_code_type;
    if ($discount_type=='A'){
      //ACTIVATION VIA OGONE
      $activation_query = tep_db_query("SELECT * FROM activation_code WHERE activation_id ='".$promo_id. "'");
      $activation_values = tep_db_fetch_array($activation_query);
      $abo_dvd_credit= $activation_values['abo_dvd_credit'];
      if ($activation_values['activation_waranty'] == 2)
      {
        $promo_type = 'pre_paid';
      }
      if($abo_dvd_credit > 0)
      {
        $credits=$abo_dvd_credit;
      }
      switch ($activation_values['validity_type']){
        case 1:	
        $duration = $activation_values['validity_value'].' '.TEXT_DAYS;
        $period =  $credits.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $activation_values['validity_value']. ' day';

        break;
        case 2:	
        $duration = $activation_values['validity_value'].' '.TEXT_MONTHS;
        $period = $credits.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $activation_values['validity_value']. ' month';
        break;
        case 3:	
        $duration = $activation_values['validity_value'].' '.TEXT_YEAR;
        $period = $credits.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $activation_values['validity_value'].' year';

        break;
      }
      $promotion = promotion($current_products_id, $next_abo_type, 'A', $promo_id,$jacob);
    }else{
      $sql="SELECT * FROM discount_code WHERE discount_code_id ='".$promo_id. "'";
      $discount_query = tep_db_query($sql);
      $discount_values = tep_db_fetch_array($discount_query);
      $abo_dvd_credit= $discount_values['abo_dvd_credit'];

      if($abo_dvd_credit==0)
        $abo_dvd_credit=$credits;
      switch ($discount_values['discount_abo_validityto_type']){
        case 1:	
        $duration = $discount_values['discount_abo_validityto_value'].' '.TEXT_DAYS;
        $period = $abo_dvd_credit.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $discount_values['discount_abo_validityto_value']. ' day';

        break;
        case 2:	
        $duration = $discount_values['discount_abo_validityto_value'].' '.TEXT_MONTHS;
        $period = $abo_dvd_credit.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $discount_values['discount_abo_validityto_value']. ' month';
        break;
        case 3:	
        $duration = $discount_values['discount_abo_validityto_value'].' '.TEXT_YEAR;
        $period = $abo_dvd_credit.' DVDs '.TEXT_FOR.' '.$duration;
        $nb_days = $discount_values['discount_abo_validityto_value'].' year';

        break;

      }

      $promotion = promotion($current_products_id, $next_abo_type, 'D', $promo_id,$jacob);
      $period_next = $credits.' DVDs '.TEXT_PER.' '.TEXT_MONTH.', '. $rotation.' DVDs '.AT_TIME.' &euro; '.$price_abo;

      $date_now = date("Y-m-d");// current date
      $date_sub = strtotime ( '+'.$nb_days , strtotime ( $date_now ) ) ;
      $date_sub = date ( 'd/m/Y' , $date_sub );
    }
    //




    //IF FORM IS SUBMITED 
    if($_POST['sent']) {	
      $is_client ="SELECT customers_id, customers_abo, customers_email_address from customers where customers_email_address='".$_POST['email_address']."'";
      $is_client_query = tep_db_query($is_client);			  
      $is_client_values = tep_db_fetch_array($is_client_query);	

      //CHECK IF THERE IS NO ERROR 
      if ( strlen($_POST['password'])< 4){
        $error_pass=1;
        $error_cpt++;	
      }else if(strlen($_POST['password'])> 12){
        $error_pass=1;
        $error_cpt++;	
      }

      //check email 

      if (mail_verify($_POST['email_address'])) {	    
      } else {
        $error_email=2;
        $error_cpt++;
      }

      //MAIL CHECKER2
      if ($_POST['email_address'] == $is_client_values['customers_email_address']){
        $error_email=1;
        $error_cpt++;	
      }
      //if(WEB_SITE_ID!=101)
      if(1==0)
      {
        $captcha_check=strtolower($_POST['nombre']);
        $captcha_check=str_replace('o','0',$captcha_check);
        if(md5($captcha_check) != $_POST['image_value']){
          $error_captcha=1;
          $error_cpt++;	
        }
      }	
    }


    //DB INSERT IF NO ERRORS	
    if ($error_cpt==0 && $_POST['sent']){
      switch($language)
      {
        case 'dutch' :
        $language_id=2;
        break;
        case 'english' :
        $language_id=3;
        break;
        default:
        $language_id=1;
        break;
      }
      //$birth_date= $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
      if (!isset( $partners_id )){
        $partners_id = 0;
      }
      if(isset($HTTP_POST_VARS['marketing']))
      {
        $marketing='YES';
        $newsletter = 1;
      }	
      else
      {
        $marketing='NO';
        $newsletter = 0;
      }	
      $sql="select count(1) as count from " . TABLE_CUSTOMERS . " where customers_email_address = '" . $_POST['email_address'] . "'";
      $check_count_customer_query = tep_db_query($sql,'db_link',true);
      $check_count_customer = tep_db_fetch_array($check_count_customer_query);
      if($check_count_customer['count']==0){
        //step20
        $customers_sql ="insert into customers (customers_id, EntityID , group_id , customers_email_address, customers_password,customers_next_abo_type, customers_abo_validityto ,  customers_newsletter,  customers_newsletterpartner,activation_discount_code_id,activation_discount_code_type, customers_next_discount_code,customers_registration_step , customers_language, customers_info_number_of_logons, site ,customers_info_date_account_created, customers_info_date_account_last_modified, partners_id, dvdpost_known_by,marketing_ok ) "; 
        if($activation_code=='VERSLAVENIR1' || $activation_code=='verslavenir1')
        {
          $site = 'lavenir';
        }
        elseif (strpos($_SERVER['HTTP_HOST'],'.nl')>0)
        {
          $site ='nl';
        }
        else
        {
          if(!empty($_COOKIE['partner']))
            $site =	$_COOKIE['partner'];
          else
          {
            $site = WEB_SITE;	
          }
        }
        $customers_sql .="values (NULL,'".ENTITY_ID."','".GROUP_ID."', '" . $_POST['email_address']  . "', '" . md5($_POST['password'])  . "', '" . $next_abo_type  . "', NULL , ".$newsletter." , ".$newsletter.",'". $activation_discount_code_id."' , '".$activation_discount_code_type."' , '".$activation_discount_next."' ,'".$goto_step."', '" . $language_id  . "', 0 , '" . $site . "',now(),now(), '" . $partners_id  . "','".$_POST['dvdpost_heard']." ', '".$marketing."' ) ";
        tep_db_query($customers_sql);
        $cust_id = tep_db_insert_id();
        if($jacob==1)
        {
          $ab='jacob bailey';
        }
        else
        {
          $ab='dvdpost';
        }
        if($_GET['p_id']>0)
        {
          $sql_parrain = 'insert into mem_get_mem (customers_id, date,email,firstname,lastname,language,mail_opened,mail_opened_date,unsubscribe) values ('.$_GET['p_id'].',now(),"'.$_POST['email_address'].'","","",'.$language_id.',0,null,0)';
          tep_db_query($sql_parrain);
        }

        $sql_attributes='insert into customer_attributes (customer_id,ab_testing,created_at,updated_at,number_of_logins,last_login_at) values ('.$cust_id.',"'.$ab.'", now(),now(),1,now())
          ';
        tep_db_query($sql_attributes);
        //tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','insert into',$customers_sql,'bugreport@dvdpost.be','bugreport@dvdpost.be');
      }

      $check_customer_query = tep_db_query("select customers_id, customers_password, customers_language, customers_email_address, customers_default_address_id , customers_registration_step from " . TABLE_CUSTOMERS . " where customers_email_address = '" . $_POST['email_address'] . "'",'db_link',true);
      $check_customer = tep_db_fetch_array($check_customer_query);
      $customer_id = $check_customer['customers_id'];
      $languages_id = $check_customer['customers_language'];
      $customers_registration_step=$check_customer['customers_registration_step'];
      $date_now = date('Ymd');
      tep_db_query("insert into address_book ( customers_id , address_book_id ) values ('".$customer_id."','1')");
      if ($goto_step==31){
        tep_db_query("update " . TABLE_CUSTOMERS . " set customers_abo_type = ".$products_id.",customers_next_abo_type = ".$next_abo_type."  where customers_id = '" . $customer_id . "'");
      }
      last_login($customer_id);

      //REGISTER CUSTOMER SESSION
      $result = $authentification->api('/authorization/token','POST',array("client_id"=> HTTPS_CLIENT_ID,"client_secret"=> HTTPS_SECRET, "grant_type" => "user_basic", "username" => $_POST['email_address'], "password"=> $_POST['password'], 'redirect_uri' => $authentification->getCurrentUrl()));
      $data_token=json_decode($result,true);
      if(!empty($data_token['access_token']) )
      {
        $_SESSION['access_token']=$data_token['access_token'];
        setcookie('refresh_token', $data_token['refresh_token'], time()+315360000, substr(DIR_WS_CATALOG, 0, -1));
        $customer_default_address_id = $check_customer['customers_default_address_id'];
        $customer_first_name = $check_customer['customers_firstname'];
        $customers_registration_step = $check_customer['customers_registration_step'];
        $customer_country_id = "21";
        $customer_zone_id = "0";
        tep_session_register('customer_id');
        tep_session_register('customer_default_address_id');
        tep_session_register('customers_registration_step');
        tep_session_register('customer_first_name');
        tep_session_register('customer_country_id');
        tep_session_register('customer_zone_id');	

        setcookie('email_address', $check_customer['customers_email_address'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
        setcookie('first_name', $customer_first_name, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
        setcookie('customers_id', $customer_id, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
        header('Location: '.$authentification->getRememberMe($data_token['access_token']));
      }


      //EMAIL PREPARATION
      $link=HTTP_SERVER.'/step1_mail_process.php?mail='.$email_address;
      /*  $email_text = TEXT_MAIL;

$check_logo_query = tep_db_query("select logo , site_link  from site where site_id = '" . WEB_SITE_ID . "'");
$check_log_values = tep_db_fetch_array($check_logo_query);
$logo = $check_log_values['logo'];
$site_link=$check_log_values['site_link'];
$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
$email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
$email_text = str_replace('µµµlinkµµµ', $link , $email_text);
$email_text = str_replace('µµµemailµµµ', $email_address , $email_text);
$email_text = str_replace('µµµpassµµµ', $_POST['password'] , $email_text);    
tep_mail($email_address, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');*/

/* $check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
$check_step_values = tep_db_fetch_array($check_step_query);
tep_redirect(tep_href_link($check_step_values['CodeDesc2']));*/

}else{	
  $current_page_name = 'step1.php';
}

}
else
{//REGISTERED CLIENT
  if ($update==1 && !$_POST['sent'] && $customers_registration_step<21)
  {//CHECK IF EMAIL UPDATE IS NEEDED
    $customers_query = tep_db_query("select customers_email_address, customers_dob from customers where customers_id = '" . $customer_id . "' ");
    $customers_values = tep_db_fetch_array($customers_query);
    $_POST['email_address']=$customers_values['customers_email_address'];
    $day=substr($customers_values['customers_dob'],8,2);
    $month=substr($customers_values['customers_dob'],5,2);
    $year=substr($customers_values['customers_dob'],0,4);
  }
  else{//CHECK IF EMAIL IS UPDATED WITHOUT FAULT
    if ($update==1 &&  $updated==1 && $error_cpt==0 && $_POST['sent'] && $customers_registration_step<21 )
    {

      tep_db_query("Update customers SET customers_email_address ='" . $_POST['email_address']  . "' , customers_password ='" . md5($_POST['password'])  ."' where customers_id = '" . $customer_id . "' ");		
      $link=HTTP_SERVER.'/step1_mail_process.php?mail='.$email_address;

      $check_logo_query = tep_db_query("select logo, site_link from site where site_id = '" . WEB_SITE_ID . "'");
      $check_log_values = tep_db_fetch_array($check_logo_query);
      $logo = $check_log_values['logo'];
      $site_link=$check_log_values['site_link'];
      $email_text = TEXT_MAIL;
      $email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
      $email_text = str_replace('µµµlink_dvdpostµµµ', $site_link , $email_text);
      $email_text = str_replace('µµµlinkµµµ', $link , $email_text);
      $email_text = str_replace('µµµemailµµµ', $_POST['email_address'] , $email_text);
      $email_text = str_replace('µµµpassµµµ', $_POST['password'] , $email_text);
      setcookie('email_address', $_POST['email_address'], time()+2592000, substr(DIR_WS_CATALOG, 0, -1));    
      //step mail check	    
      //tep_mail($email_address, $_POST['email_address'], EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
      //tep_redirect(tep_href_link('step1_mail.php'));		
    }
    //CHECK IF EMAIL IS UPDATED AND THEY ARE FAULTS
    if ($update==1 &&  $updated==1 && $error_cpt>0 && $_POST['sent'] ){
      $current_page_name = 'step1.php';		
    }	

    else
    {//NO UPDATE ID NEEDED REDIRECT TO ANOTHER PAGE

      #die('ICI');

      //CUSTOMER IS ALREADY REGISTERED AND DON'T NEED TO UPDATE EMAIL
      $customers_query = tep_db_query("select customers_registration_step,customers_language, customers_abo from customers where customers_id = '" . $customer_id . "' ");
      $customers_values = tep_db_fetch_array($customers_query);
      setcookie('language_id', $customers_values['customers_language'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
      $languages_id=$customers_values['customers_language'];
      setcookie('customers_registration_step', $customers_values['customers_registration_step'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
      $customers_registration_step=$customers_values['customers_registration_step'];

      if ($activation_discount_code_id && $customers_values['customers_abo']<1 ){
        tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."' , activation_discount_code_type='".$activation_discount_code_type."' , customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "' AND  customers_registration_step<90");
      }
      if ($products_id){
        tep_db_query("update customers set customers_next_abo_type =$next_abo_type where customers_id = '" . $customer_id . "' ");
      }
      $check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $customers_registration_step . "' AND  CodeType='STEP'");
      $check_step_values = tep_db_fetch_array($check_step_query);
      switch($customers_registration_step){
        case 41:
        $customers_query = tep_db_query("select customers_next_abo_type, activation_discount_code_id from customers where customers_id = '" . $customers_id. "'");
        $customers_values = tep_db_fetch_array($customers_query);			      
        tep_redirect(tep_href_link($check_step_values['CodeDesc2'].'?discount_code_id='.$customers_values['activation_discount_code_id'].'&products_id='.$customers_values['customers_next_abo_type']));
        break;

        case 80:
        tep_redirect(tep_href_link('step_member_choice.php'));
        break;

        case 90:
        tep_redirect(tep_href_link('step_member_choice.php'));
        break;


        default:
        tep_redirect(tep_href_link($check_step_values['CodeDesc2']));
      }		    
    }

  }
}
if (strpos(strtoupper($activation_code),'BGC') === 0) { ?> 
  <link href="http://www.dvdpost.be/images/relance012012/new.css" rel="stylesheet" type="text/css" />
  <? } 

  //if (!tep_session_is_registered('customer_id')) {
    //	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
    //	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
    //}

    //include(DIR_WS_INCLUDES . 'translation.php');

    $breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
    if ($_POST['activation_code']=='0' || $activation_code=='FREETEST2' || $activation_code=='univers' || $activation_code==''  ){
      if($_SERVER['SERVER_NAME'] == 'www.dvdpost.nl' ||  $_SERVER['SERVER_NAME'] == 'dvdpost.nl')
      {
        $activation_code='DVDNL';
        $activation_discount_code_id=1461;
      }
      else
      {
        $activation_code='univers';
        $activation_id=1022;
      }

      $show_discount_form=1;
    }
    $disc_explain='';
    $promo_footer=TEXT_FOOTER_EXPLAIN;

    /*if (strlen($_GET['activation_code'])>1){
    $activation_code=$_GET['activation_code'];
    setcookie('activation_code', $activation_code, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));  
    }else {
    $activation_code=$_COOKIE['activation_code'];	 
    }*/

    $page_body_to_include = $current_page_name;
    //echo tep_ab_testing_link('step1.php?activation_code=14');
    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step_2010.php',0,1));

    require('configure/application_bottom.php');

    ?>
