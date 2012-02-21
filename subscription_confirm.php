<?php
require('configure/application_top.php');
$current_page_name = FILENAME_SUBSCRIPION_CONFIRM;
if (!tep_session_is_registered('customer_id')) {
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => FILENAME_SUBSCRIPTION));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);

if ($customers[customers_abo] > 0){
    tep_redirect(tep_href_link('mysubscription.php', '', 'SSL'));
}

if ($HTTP_POST_VARS['discount_code'] =='fructisstyle' or $HTTP_POST_VARS['discount_code'] =='FRUCTISSTYLE') {
	tep_redirect(tep_href_link('fructisstyle.php', '', 'SSL'));	  
}

//  if ($HTTP_POST_VARS['discount_code'] =='sodexho2005' or $HTTP_POST_VARS['discount_code'] =='SODEXHO2005') {
//	tep_redirect(tep_href_link('sodexho.php', '', 'SSL'));	  
//  }

if ($HTTP_POST_VARS['discount_code'] =='freetest' or $HTTP_POST_VARS['discount_code'] =='FREETEST') {
	tep_redirect(tep_href_link('freetrial.php', '', 'SSL'));	  
}

if ($HTTP_POST_VARS['discount_code'] =='freetrialmsn' or $HTTP_POST_VARS['discount_code'] =='FREETRIALMSN') {
	tep_redirect(tep_href_link('freetrial_msn.php', '', 'SSL'));	  
}

if ($HTTP_POST_VARS['discount_code'] == '50pct' or $HTTP_POST_VARS['discount_code'] == '50PCT') {
	tep_redirect(tep_href_link('as_reconduction_upfront.php?payment=' . $HTTP_POST_VARS['payment'], '', 'SSL'));	  
}

if ($HTTP_POST_VARS['discount_code'] == 'freegift' or $HTTP_POST_VARS['discount_code'] == 'FREEGIFT') {
	tep_redirect(tep_href_link('giftz_offer_form.php', '', 'SSL'));	  
}

if ($HTTP_POST_VARS['products_id'] <> 2){
	  if ($HTTP_POST_VARS['discount_code'] =='BASIC999' or $HTTP_POST_VARS['discount_code'] =='basic999') {
	    tep_redirect(tep_href_link('basic999.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='CINDERELLAMAN' or $HTTP_POST_VARS['discount_code'] =='cinderellaman') {
	    tep_redirect(tep_href_link('basic_promo.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032BA' or $HTTP_POST_VARS['discount_code'] =='dmb8645032ba') {
	    tep_redirect(tep_href_link('bl_basic.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='BAS365' or $HTTP_POST_VARS['discount_code'] =='bas365') {
	    tep_redirect(tep_href_link('bl_basic2.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='3DVDFREE' or $HTTP_POST_VARS['discount_code'] =='3dvdfree') {
	    tep_redirect(tep_href_link('3dvdfree.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='3BESTDVD' or $HTTP_POST_VARS['discount_code'] =='3bestdvd') {
	    tep_redirect(tep_href_link('3bestdvd.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='1MONTHTICKET' or $HTTP_POST_VARS['discount_code'] =='1monthticket') {
	    tep_redirect(tep_href_link('1monthticket.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='BCC06' or $HTTP_POST_VARS['discount_code'] =='bcc06') {
	    tep_redirect(tep_href_link('subscription_info.php?products_id=2', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='3TBASIC' or $HTTP_POST_VARS['discount_code'] =='3tbasic') {
	    tep_redirect(tep_href_link('subscription_info.php?products_id=2&discount_code=3TBASIC', '', 'SSL'));	  
	  }	 
	  if ($HTTP_POST_VARS['discount_code'] =='vers2007' or $HTTP_POST_VARS['discount_code'] =='VERS2007') {
	    tep_redirect(tep_href_link('vers2007.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='261') {
	    tep_redirect(tep_href_link('1mfree.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='264') {
		tep_redirect(tep_href_link('scarlet2007.php', '', 'SSL'));	  
	  }	
	  if ($HTTP_POST_VARS['discount_code_id'] =='283') {
	    tep_redirect(tep_href_link('rentawife.php', '', 'SSL'));	  
	  }	 
	  if ($HTTP_POST_VARS['discount_code_id'] =='285') {
	    tep_redirect(tep_href_link('drivefree.php', '', 'SSL'));	  
	  }	 
	  if ($HTTP_POST_VARS['discount_code_id'] =='289') {
	    tep_redirect(tep_href_link('queen.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='292') {
	    tep_redirect(tep_href_link('bcc3dvd.php', '', 'SSL'));	  
	  }	 
	  if ($HTTP_POST_VARS['discount_code_id'] =='296') {
	    tep_redirect(tep_href_link('neo3dvd.php', '', 'SSL'));	  
	  }	
  }
  
if ($HTTP_POST_VARS['products_id'] < 5){
	  if ($HTTP_POST_VARS['discount_code_id'] =='295') {
	    tep_redirect(tep_href_link('2for1paid.php', '', 'SSL'));	  
	  }  
}

if ($HTTP_POST_VARS['products_id'] <> 5){
	  if ($HTTP_POST_VARS['discount_code'] =='DM3SUISSNL93KI445PH' or $HTTP_POST_VARS['discount_code'] =='dm3suissnl93ki445ph') {
	    tep_redirect(tep_href_link('3suissdm.php?code=nl', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='DM3SUISSFR93KI445PH' or $HTTP_POST_VARS['discount_code'] =='dm3suissfr93ki445ph') {
	    tep_redirect(tep_href_link('3suissdm.php?code=fr', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='RELINS93KI445PHG' or $HTTP_POST_VARS['discount_code'] =='relins93ki445phg') {
		tep_redirect(tep_href_link('relinsdm.php', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='DISRU93KI445PHG' or $HTTP_POST_VARS['discount_code'] =='disru93ki445phg') {
		tep_redirect(tep_href_link('distribflyers.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='TVGIDS37659' or $HTTP_POST_VARS['discount_code'] =='tvgids37659') {
	    tep_redirect(tep_href_link('tvgids.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032RE' or $HTTP_POST_VARS['discount_code'] =='dmb8645032re') {
	    tep_redirect(tep_href_link('bl_regular.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='REG365' or $HTTP_POST_VARS['discount_code'] =='reg365') {
	    tep_redirect(tep_href_link('bl_regular2.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='CARS15' or $HTTP_POST_VARS['discount_code'] =='cars15') {
	    tep_redirect(tep_href_link('cars15.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='263') {
	    tep_redirect(tep_href_link('lovingyou.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='268') {
	    tep_redirect(tep_href_link('carbu_info.php?code=REG797', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='269') {
	    tep_redirect(tep_href_link('carbu_info.php?code=REG3746', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='270') {
	    tep_redirect(tep_href_link('carbu_info.php?code=REG7787', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='290') {
	    tep_redirect(tep_href_link('rentitnow.php', '', 'SSL'));	  
	  }	
	  if ($HTTP_POST_VARS['discount_code_id'] =='294') {
	    tep_redirect(tep_href_link('fvj.php', '', 'SSL'));	  
	  }	
  }

if ($HTTP_POST_VARS['products_id'] <> 6){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032CL' or $HTTP_POST_VARS['discount_code'] =='dmb8645032cl') {
	    tep_redirect(tep_href_link('bl_classic.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='271') {
	    tep_redirect(tep_href_link('carbu_info.php?code=CLA1147', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='272') {
	    tep_redirect(tep_href_link('carbu_info.php?code=CLA5412', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='273') {
	    tep_redirect(tep_href_link('carbu_info.php?code=CLA10995', '', 'SSL'));	  
	  }
  }

if ($HTTP_POST_VARS['products_id'] <> 7){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032DE' or $HTTP_POST_VARS['discount_code'] =='dmb8645032de') {
	    tep_redirect(tep_href_link('bl_discovery.php', '', 'SSL'));	  
	  }	
	  if ($HTTP_POST_VARS['discount_code_id'] =='274') {
	    tep_redirect(tep_href_link('carbu_info.php?code=DIS1497', '', 'SSL'));  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='275') {
	    tep_redirect(tep_href_link('carbu_info.php?code=DIS6996', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='276') {
	    tep_redirect(tep_href_link('carbu_info.php?code=DIS14662', '', 'SSL'));	  
	  }
  }

if ($HTTP_POST_VARS['products_id'] <> 8){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032AV' or $HTTP_POST_VARS['discount_code'] =='dmb8645032av') {
	    tep_redirect(tep_href_link('bl_adventure.php', '', 'SSL'));	  
	  }	
      if ($HTTP_POST_VARS['discount_code_id'] =='277') {
	    tep_redirect(tep_href_link('carbu_info.php?code=ADV1847', '', 'SSL'));  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='278') {
	    tep_redirect(tep_href_link('carbu_info.php?code=ADV8579', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='279') {
	    tep_redirect(tep_href_link('carbu_info.php?code=ADV1787', '', 'SSL'));	  
	  }	  
  }

if ($HTTP_POST_VARS['products_id'] <> 9){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032PA' or $HTTP_POST_VARS['discount_code'] =='dmb8645032pa') {
	    tep_redirect(tep_href_link('bl_passion.php', '', 'SSL'));	  
	  }	
      if ($HTTP_POST_VARS['discount_code_id'] =='280') {
	    tep_redirect(tep_href_link('carbu_info.php?code=PAS2197', '', 'SSL'));
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='281') {
	    tep_redirect(tep_href_link('carbu_info.php?code=PAS10246', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code_id'] =='282') {
	    tep_redirect(tep_href_link('carbu_info.php?code=PAS21079', '', 'SSL'));	  
	  }	 	  
  }

if ($HTTP_POST_VARS['products_id'] > 6){
	  if ($HTTP_POST_VARS['discount_code'] =='3weeks' or $HTTP_POST_VARS['discount_code'] =='3WEEKS') {
	    tep_redirect(tep_href_link('3weeks.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='insideman3w' or $HTTP_POST_VARS['discount_code'] =='INSIDEMAN3W') {
	    tep_redirect(tep_href_link('insideman3w.php', '', 'SSL'));	  
	  }	
	  if ($HTTP_POST_VARS['discount_code'] =='15daysfree' or $HTTP_POST_VARS['discount_code'] =='15DAYSFREE') {
	    tep_redirect(tep_href_link('15daysfree.php?discount_code_id=244', '', 'SSL'));	  
	  }	
	  if ($HTTP_POST_VARS['discount_code'] =='3wdec' or $HTTP_POST_VARS['discount_code'] =='3WDEC') {
	    tep_redirect(tep_href_link('15daysfree.php?discount_code_id=244', '', 'SSL'));	  
	  }	
    }
	
if ($HTTP_POST_VARS['products_id'] > 5){
	  if ($HTTP_POST_VARS['discount_code'] =='twoforone' or $HTTP_POST_VARS['discount_code'] =='TWOFORONE') {
	    tep_redirect(tep_href_link('twoforone.php', '', 'SSL'));	  
	  }

	  if ($HTTP_POST_VARS['discount_code'] =='m1euro' or $HTTP_POST_VARS['discount_code'] =='M1EURO') {
	    tep_redirect(tep_href_link('m1euro.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='m1 euro' or $HTTP_POST_VARS['discount_code'] =='M1 EURO') {
	    tep_redirect(tep_href_link('m1euro.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='mieuro' or $HTTP_POST_VARS['discount_code'] =='MIEURO') {
	    tep_redirect(tep_href_link('m1euro.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='mi euro' or $HTTP_POST_VARS['discount_code'] =='MI EURO') {
	    tep_redirect(tep_href_link('m1euro.php', '', 'SSL'));	  
	  }
    }

 if ($HTTP_POST_VARS['products_id'] < 6){
	  if ($HTTP_POST_VARS['discount_code'] =='2months25' or $HTTP_POST_VARS['discount_code'] =='2MONTHS25') {
	    tep_redirect(tep_href_link('2months25.php', '', 'SSL'));	  
	  }
    }	

if (strlen($HTTP_POST_VARS['payment']) < 1) {
	tep_redirect(tep_href_link('subscription_info.php?error=1&products_id=' . $HTTP_POST_VARS['products_id'] . '&discount_code_id=' . $HTTP_POST_VARS['discount_code_id'] , '', 'SSL'));	  
  }

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
$page_body_to_include = $current_page_name;
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));
require('configure/application_bottom.php');
?>