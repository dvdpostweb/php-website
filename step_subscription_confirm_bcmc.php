<?php
require('configure/application_top.php');

$current_page_name = 'step_subscription_confirm_bcmc.php';

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
	    tep_redirect(tep_href_link('step_subscription_info_bcmc.php?products_id=2', '', 'SSL'));	  
	  }	  
	  if ($HTTP_POST_VARS['discount_code'] =='3TBASIC' or $HTTP_POST_VARS['discount_code'] =='3tbasic') {
	    tep_redirect(tep_href_link('step_subscription_info_bcmc.php?products_id=2&discount_code=3TBASIC', '', 'SSL'));	  
	  }	 
	  if ($HTTP_POST_VARS['discount_code'] =='vers2007' or $HTTP_POST_VARS['discount_code'] =='VERS2007') {
	    tep_redirect(tep_href_link('vers2007.php', '', 'SSL'));	  
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
  }
  
  if ($HTTP_POST_VARS['products_id'] <> 6){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032CL' or $HTTP_POST_VARS['discount_code'] =='dmb8645032cl') {
	    tep_redirect(tep_href_link('bl_classic.php', '', 'SSL'));	  
	  }	  
  }
  
  if ($HTTP_POST_VARS['products_id'] <> 7){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032DE' or $HTTP_POST_VARS['discount_code'] =='dmb8645032de') {
	    tep_redirect(tep_href_link('bl_discovery.php', '', 'SSL'));	  
	  }	  
  }
  
  if ($HTTP_POST_VARS['products_id'] <> 8){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032AV' or $HTTP_POST_VARS['discount_code'] =='dmb8645032av') {
	    tep_redirect(tep_href_link('bl_adventure.php', '', 'SSL'));	  
	  }	  
  }
  
  if ($HTTP_POST_VARS['products_id'] <> 9){
	  if ($HTTP_POST_VARS['discount_code'] =='DMB8645032PA' or $HTTP_POST_VARS['discount_code'] =='dmb8645032pa') {
	    tep_redirect(tep_href_link('bl_passion.php', '', 'SSL'));	  
	  }	  
  }
  
 if ($HTTP_POST_VARS['products_id'] > 6){
	  if ($HTTP_POST_VARS['discount_code'] =='3weeks' or $HTTP_POST_VARS['discount_code'] =='3WEEKS') {
	    tep_redirect(tep_href_link('3weeks.php', '', 'SSL'));	  
	  }
	  if ($HTTP_POST_VARS['discount_code'] =='insideman3w' or $HTTP_POST_VARS['discount_code'] =='INSIDEMAN3W') {
	    tep_redirect(tep_href_link('insideman3w.php', '', 'SSL'));	  
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
	tep_redirect(tep_href_link('step_subscription_info_bcmc.php?error=1&products_id=' . $HTTP_POST_VARS['products_id'] , '', 'SSL'));	  
  }

  
  
  include(DIR_WS_INCLUDES . 'translation.php');

  
  	$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.language_id = '" . $languages_id . "' ");
	$product_info_values = tep_db_fetch_array($product_info);
						  		
	$final_price =  $product_info_values['products_price'];
	switch ($HTTP_POST_VARS['products_id']) {
	  case 2:
	  	$intdvdout = 1;
	  break;    
	  case 5:
	  	$intdvdout = 1;
	  break;    
	  case 6:
	  	$intdvdout = 2;
	  break;    
	  case 7:
	  	$intdvdout = 3;
	  break;    
	  case 8:
	  	$intdvdout = 4;
	  break;    
	  case 9:
	  	$intdvdout = 5;
	  break;    	      
	}
	$allisok = 1;

	if(strlen($HTTP_POST_VARS['discount_code']) >0 ){
		$code_query = tep_db_query("select * from " . TABLE_DISCOUNT_CODE . " where discount_code  = '" . $HTTP_POST_VARS['discount_code'] . "' ");
		$code = tep_db_fetch_array($code_query);
		if($code['discount_code_id'] > 0){
			if($code['discount_status'] < 1 or $code['discount_limit'] < 1){
				$allisok = 0;
				$strreason= TEXT_DISCOUNT_EXPIRED;				
			}
			if($code['bypass_discountuse'] < 1){									
				$use_query = tep_db_query("select * from " . TABLE_DISCOUNT_USE . " where customers_id  = '" . $customer_id . "' and discount_use_date > DATE_sub(now(), INTERVAL " . $code['discount_nbr_month_before_reuse'] . " MONTH)");
				$use = tep_db_fetch_array($use_query);
				if($use['discount_use_id'] > 0){
					$allisok = 0;
					$strreason= TEXT_DISCOUNT_ALREADY_USED;					
				}			
			}			
			switch ($code['discount_type']) {
				case 1: // - X%
				if ($code['discount_code_id'] == 28){ //amex reduction not for other pay method than amex
					if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){
						$strdiscount_code_line_explained = ($code['discount_value'] / 100 * $final_price ) . ' EUR';
						$final_price  = ($final_price  - ($code['discount_value'] / 100 * $final_price ))  ;
						$discount_code_id_used= $code['discount_code_id'];	
					    tep_session_register('discount_code_id_used');
					}else{
						$allisok = 0;
						$strreason= TEXT_ERROR_AMEX;					
					}	
				}else{
					$strdiscount_code_line_explained= ($code['discount_value'] / 100 * $final_price ) . ' EUR';
					$final_price  = ($final_price  - ($code['discount_value']  / 100 * $final_price ))  ;
					$discount_code_id_used= $code['discount_code_id'];	
				    tep_session_register('discount_code_id_used');								
				}
				break;
				case 2: //tot=x euro 
					if ($code['discount_code_id'] == 59){ //amex reduction not for other pay method than amex
						if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){ 
							$strdiscount_code_line_explained= ($final_price - $code['discount_value']) . ' EUR';
							$final_price = ($final_price - $final_price + $code['discount_value'])  ;
							$discount_code_id_used= $code['discount_code_id'];	
						    tep_session_register('discount_code_id_used');
						}else{
							$allisok = 0;
							$strreason= TEXT_ERROR_AMEX;					
						}	
					}else{
							$strdiscount_code_line_explained= ($final_price - $code['discount_value']) . ' EUR';
							$final_price = ($final_price - $final_price + $code['discount_value'])  ;
							$discount_code_id_used= $code['discount_code_id'];	
						    tep_session_register('discount_code_id_used');
					}
				break;
				case 3: //tot=tot - x euro 
					$strdiscount_code_line_explained= ($code['discount_value']) . ' EUR';
					$final_price = ($final_price - $code['discount_value'])  ;
					$discount_code_id_used= $code['discount_code_id'];	
				    tep_session_register('discount_code_id_used');
				break;
			}			
		}else{
			$allisok = 0;
			$strreason= TEXT_WRONG_DISCOUNT;	
		}
	}
	
	$final_price = round($final_price,2);
	
  if (($final_price) == 0) {
	tep_redirect(tep_href_link('step_subscription_info_bcmc.php?error=2&products_id=' . $HTTP_POST_VARS['products_id'] . '&discount_code_id=' . $HTTP_POST_VARS['discount_code_id'], '', 'SSL'));	  
  }
	

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas.php'));

require('configure/application_bottom.php');

?>