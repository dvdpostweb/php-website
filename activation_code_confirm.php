<?php 
require('configure/application_top.php');
$host=$_SERVER['HTTP_HOST'];
if(strpos($host,'.be')>0){
	$site='www.dvdpost.be';
	$freetest='FREETEST2';}
else if (strpos($host,'.nl')>0){
	$site='www.dvdpost.nl';	
	$freetest='TRIALNL';
}else{
	$site= SITE_ID;
	$freetest='FREETEST2';
	}
if ($_POST['code']==$_POST['base_code'] || $_POST['code']=='' )
	$var_post_code=$freetest;
else
	$var_post_code=trim($_POST['code']);

$_POST['email']=trim($_POST['email']);
$email=false;
if(!empty($_POST['email']))
{
$sql='select * from customers where customers_email_address="'.$_POST['email'].'"';
$email_query=tep_db_query($sql);
$email_values = tep_db_fetch_array($email_query);
	if($email_values['customers_email_address'])
		$email=true;
	else
		$email=false;
}

if (!tep_session_is_registered('customer_id') || $customers_registration_step < 20) {
	//LANDING PAGE REDIRECT
	//$discount_info = tep_db_query("select discount_code_id,discount_code, landing_page , landing_page_php from discount_code where discount_status=1 AND landing_page_php IS NOT NULL AND discount_code = '" . strtoupper($var_post_code) . "' ");
	//if ($discount_info_values = tep_db_fetch_array($discount_info)){
	//	tep_redirect(tep_href_link($discount_info_values['landing_page_php'], '', 'SSL'));
	//}
	
	setcookie('activation_code', $var_post_code, time()+2592000, substr(DIR_WS_CATALOG, 0, -1));		
	
	$discount_info = tep_db_query("select discount_code_id,discount_code, landing_page , landing_page_php from discount_code where (discount_validityto > now() || discount_validityto is NULL) and discount_status=1 and discount_code = '" . strtoupper($var_post_code) . "' ");
		if ($discount_info_values = tep_db_fetch_array($discount_info)){
			switch($language)
			{
				case 'french':
					$lang='fr';
				break;
				case 'dutch':
					$lang='nl';
				break;
				case 'english':
					$lang='en';
				break;
				
			}
			$url_step = 'http://'.$site.'/step1.php?activation_code='.strtoupper($var_post_code).'&language='.$lang;
			if($_POST['p_id']>0)
			{
				$url_step .= '&p_id='.$_POST['p_id']; 
			}
			if($email==true)
				tep_redirect('http://'.$site.'/login_code.php?email_address='.$_POST['email'].'&code='.strtoupper($var_post_code).'&language='.$lang);
			else
				tep_redirect($url_step);
				
	}
		
	$act_code ="SELECT activation_id,next_discount,activation_group,activation_products_id from activation_code where customers_id=0 AND activation_code_validto_date > now() AND activation_code='".strtoupper($var_post_code)."'";
	$act_code_query = tep_db_query($act_code);	
	if ($act_code_values = tep_db_fetch_array($act_code_query)){
		if ($act_code_values['activation_group']==3){
			switch($act_code_values['activation_products_id']){
				case 5:
					$hd_products=18;
					$banner='4dvd.gif';
					break;
				case 6:
					$hd_products=20;
					$banner='8dvd.gif';
					break;
				case 7:
					$hd_products=22;
					$banner='10dvd.gif';
					break;
				default:	
					$hd_products=$act_code_values['activation_products_id'];
					switch ($hd_products){
						case 18:
							$banner='4dvd.gif';
							break;
						case 20:
							$banner='8dvd.gif';
							break;
						case 22:
							$banner='10dvd.gif';
							break;
						
					}
					break;
			}
			tep_db_query("update activation_code set activation_products_id = ".$hd_products." , banner='".$banner."' where activation_code = '".$var_post_code."'");
				
		}
		
		if($email==true)
			tep_redirect(tep_href_link('login_code.php?email_address='.$_POST['email'].'&code='.strtoupper($var_post_code), '', 'SSL'));
		else
			tep_redirect(tep_href_link('step1.php?activation_code='.strtoupper($var_post_code), '', 'SSL'));
	}
}

if (strlen($HTTP_GET_VARS['code']) >0){
	$stractivation_code = $HTTP_GET_VARS['code'];
}else{
	$stractivation_code = $var_post_code;
}


$act_code ="SELECT activation_id,next_discount,activation_group,activation_products_id from activation_code where activation_code='".$stractivation_code."' AND activation_code_validto_date > now()";
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
			tep_db_query("update activation_code set activation_products_id = ".$hd_products." where activation_code = '".$stractivation_code."'");
				
		}
	
	$activation_discount_code_type="A";
	$activation_discount_next=$act_code_values['next_discount'];
	$allisok =1;
}else{
	$disc_code ="SELECT discount_code_id,next_discount from discount_code where discount_code='".$stractivation_code."'";
	$disc_code_query = tep_db_query($disc_code);
	$disc_code_values = tep_db_fetch_array($disc_code_query);
	$activation_discount_code_id=$disc_code_values['discount_code_id'];
	$activation_discount_code_type="D";
	$activation_discount_next=$disc_code_values['next_discount'];
	$allisok =1;
}

if (tep_session_is_registered('customer_id')) {
	if(empty($customer_id))
		$customer_id=$_SESSION['customer_id'];
	if(empty($customer_id))
		$customer_id=$_COOKIE['customers_id'];
		
	$check_abo="select customers_abo,customers_registration_step from customers where customers_id=".$customer_id;
	$check_abo_query = tep_db_query($check_abo);
	$check_abo_values = tep_db_fetch_array($check_abo_query);
	
	if ($check_abo_values['customers_abo']<1 && $activation_discount_code_id >0  ){
		if ($activation_discount_code_type=="A"){
				$activation_query = tep_db_query("select * from activation_code where activation_code = '" . $stractivation_code . "' AND activation_code_validto_date > now() and customers_id=0 ");
				if ($activation = tep_db_fetch_array($activation_query)){
						tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
						if ($activation['next_abo_type'] > 0)
						{
							$next = $activation['next_abo_type'];
						}
						else
						{
							$next = $activation['activation_products_id'];
						}
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$activation['activation_products_id']."'  where customers_id = '" . $customer_id . "'");					
						$check_step_query = tep_db_query("select CodeDesc2 from generalglobalcode where CodeValue = '" . $check_abo_values['customers_registration_step']. "' AND  CodeType='STEP'");
						$check_step_values = tep_db_fetch_array($check_step_query);
						tep_redirect(tep_href_link($check_step_values['CodeDesc2']));	 
				} 
		}
	
		if($activation_discount_code_type=="D"){
			$code_query = tep_db_query("select *, gc.CodeDesc2 from discount_code dc LEFT JOIN generalglobalcode gc on gc.CodeValue=dc.goto_step where (discount_validityto > now() || discount_validityto is NULL) and discount_status=1 AND discount_code = '" . strtoupper($stractivation_code) . "' ");
			
			$code = tep_db_fetch_array($code_query);

			if($code['discount_status'] < 1 or $code['discount_limit'] < 1){
				$allisok = 0;
				$strreason= TEXT_DISCOUNT_EXPIRED;				
			}
			if($code['bypass_discountuse'] < 1 && $code['discount_nbr_month_before_reuse']!=''){									
				$use_query = tep_db_query("select * from discount_use where customers_id  = '" . $customer_id . "' and discount_use_date > DATE_sub(now(), INTERVAL " . $code['discount_nbr_month_before_reuse'] . " MONTH)");
				if ($use = tep_db_fetch_array($use_query)){
					$allisok = 0;
					$strreason= TEXT_DISCOUNT_ALREADY_USED;					
				}else{
					if ($code['goto_step']==31 && $code['goto_step']==32) {
						if ($code['next_abo_type'] > 0)
						{
							$next = $code['next_abo_type'];
						}
						else
						{
							$next = $code['listing_products_allowed'];
						}
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$code['listing_products_allowed']."'  where customers_id = '" . $customer_id . "'");
					}
					tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
					tep_redirect(tep_href_link($code['CodeDesc2'], '', 'SSL'));
				}
			}else{
					if ($code['goto_step']==31 && $code['goto_step']==32) {
						if ($code['next_abo_type'] > 0)
						{
							$next = $code['next_abo_type'];
						}
						else
						{
							$next = $code['listing_products_allowed'];
						}
						tep_db_query("update customers set customers_next_abo_type='".$next."', customers_abo_type='".$code['listing_products_allowed']."'  where customers_id = '" . $customer_id . "'");
					}
					tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
					tep_redirect(tep_href_link($code['CodeDesc2'], '', 'SSL'));
				}
		}else{
				$allisok = 0;
				$strreason= TEXT_WRONG_DISCOUNT;	
		}	
	}
	
	
	
}

$current_page_name = FILENAME_ACTIVATION_CODE_CONFIRM;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));

require('configure/application_bottom.php');

?>