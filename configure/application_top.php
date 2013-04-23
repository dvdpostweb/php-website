<?php
//in case of emergency
//header("Location: http://".$SERVER_NAME."/default.htm");
//exit();
//working prrocess
header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"'); 



function getBestMatchToInclude($pathname,$debug=0,$jacob=0) {
  $tmp = substr($pathname,0,-4);
  $tmp2=str_replace('canvas_2009','canvas',$tmp);
  $site_id=SITE_ID;
	if($debug==1)
	{
		echo $tmp2 . '_' . $site_id . '.php '.SITE_ID;
	}
	$jacob_link = str_replace('pages/','pages/jacob_',$pathname);
	$jacob_link = str_replace('canvas/','canvas/jacob_',$jacob_link);
	if (file_exists($tmp2 . '_' . $site_id . '.php'))
	{
		
		return $tmp2 . '_' . $site_id . '.php';
	}
  else if($jacob==1 && file_exists($jacob_link)) {
    return $jacob_link;
  } else {
	if (file_exists($pathname)) {
      return $pathname;
	}
	else
	{
		$Name = "bugreport@dvdpost.be"; //senders name
		$email = "bugreport@dvdpost.be"; //senders e-mail adress
		$recipient = "bugreport@dvdpost.be"; //recipient
		$mail_body = "path ->".$pathname; //mail body
		$subject = "path error"; //subject
		$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields

		mail($recipient, $subject, $mail_body, $header);
die();
	}
  }
}

function getBestMatchToIncludeAny($pathname, $file_ext) {
  $tmp = substr($pathname,0,-4);
  $tmp2=str_replace('canvas_2009','canvas',$tmp);
  $site_id=SITE_ID;
#  $site_id=str_replace('in.','',SITE_ID);
  if (file_exists($tmp2 . '_' . $site_id . $file_ext)) {
      return $tmp2 . '_' . $site_id . $file_ext;
  } else {
      return $pathname;
  }
}

//function getBestMatchToIncludeGif($pathname, $file_ext) {
//  $relativePath = str_replace(DIR_WS_IMAGES_LANGUAGES, '', $pathname);
//  $tmp = substr(DIR_FS_IMAGES_LOCAL . $relativePath,0,-4);
//  if (file_exists($tmp . '_' . SITE_ID . $file_ext)) {
//      return $tmp . '_' . SITE_ID . $file_ext;
//  } else {
//      return $pathname;
//  }  
//}


function getQueryLanguageClause($the_language_id, $table_name) {
    If ($the_language_id==1) {
        return ' and '.$table_name.'.products_language_fr=1 ';
    } elseif ($the_language_id==2){
        return ' and '.$table_name.'.products_undertitle_nl=1 ';
    } elseif ($the_language_id==3){
        return ' ';
    }
    return ' blob';
}
$host=$_SERVER["SERVER_NAME"];
if(strpos($host,'.nl')!==false)
{
	define('WEBSITE',101);
}
else
{
	define('WEBSITE',1);
	
} 
// Start the clock for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());

// Set the level of error reporting
  error_reporting(E_ALL & ~E_NOTICE);
if($glabal!==false){
// Check if register_globals is enabled.
// Since this is a temporary measure this message is hardcoded. The requirement will be removed before 2.2 is finalized.
if (function_exists('ini_get')) {
    ini_get('register_globals') or exit('FATAL ERROR: register_globals is disabled in php.ini, please enable it!');
  }
}
else {
	//$_SERVER['DOCUMENT_ROOT']='/Users/gs/site_local/trunk/';
	$_SERVER['DOCUMENT_ROOT']='/data/sites/benelux/www';
}
// Disable use_trans_sid as tep_href_link() does this manually
  if (function_exists('ini_set')) {
    ini_set('session.use_trans_sid', 0);
  }

// Set the local configuration parameters - mainly for developers
  if (file_exists('includes/local/configure.php')) include('includes/local/configure.php');

  // include server parameters
  //require('includes/configure.php');
  $constants = array();
  require('configure.php');

  //define the configuration parameters created in configure.php as constants
  foreach ($constants as $key => $value) {
    define ($key,$value);
  }
 
// Define the project version
  define('PROJECT_VERSION', 'dvdpost 1.0'); //osCommerce 2.2-CVS
//PHONE NUMBER

  define('FAXE', '02/791.52.84');
// define the filenames used in the project
  define('FILENAME_30DAYSFREE', '30daysfree.php');
  define('FILENAME_ABO_ACTIVATION_CODE', 'abo_activation_code.php');
  define('FILENAME_ABO_ACTIVATION_CODE_CONFIRM', 'abo_activation_code_confirm.php');
  define('FILENAME_ABO_ACTIVATION_CODE_PROCESS', 'abo_activation_code_process.php');
  define('FILENAME_ACCOUNT', 'account.php');
  define('FILENAME_ACCOUNT_EDIT', 'account_edit.php');
  define('FILENAME_ACCOUNT_EDIT_PROCESS', 'account_edit_process.php');
  define('FILENAME_ACTIVATION_CODE', 'activation_code.php');
  define('FILENAME_ACTIVATION_CODE_CONFIRM', 'activation_code_confirm.php');  
  define('FILENAME_ACTORS', 'actors.php');
  define('FILENAME_ACTORS_ADULT', 'actors_adult.php');
  define('FILENAME_ACTORS_PUBLIC', 'actors_public.php');
  define('FILENAME_ADDRESS_BOOK', 'address_book.php');
  define('FILENAME_ADDRESS_BOOK_PROCESS', 'address_book_process.php');
  define('FILENAME_ADDTOWISHLIST', 'addtowishlist.php');
  define('FILENAME_LOGIN_ADULTPWD', 'login_adultpwd.php');
  define('FILENAME_LOGIN_ADULTPWD_FORGOT', 'login_adultpwd_forgot.php');
  define('FILENAME_LOGIN_ADULTPWD_FORGOT_PROCESS', 'login_adultpwd_forgot_process.php');
  define('FILENAME_ADVANCED_SEARCH', 'advanced_search.php');
  define('FILENAME_ADVANCED_SEARCH_RESULT2', 'advanced_search_result2.php');
  define('FILENAME_ADVANCED_SEARCH_RESULT2_ADULT', 'advanced_search_result2_adult.php');
  define('FILENAME_ADVANCED_SEARCH_RESULT2_PUBLIC', 'advanced_search_result2_public.php');
  define('FILENAME_BLANK', 'blank.php');
  define('FILENAME_BFM', 'bfm.php');
  define('FILENAME_BFM_PROCESS', 'bfm_process.php');
  define('FILENAME_CATALOG', 'catalog.php');
  define('FILENAME_CATALOGX', 'catalogx.php');
  define('FILENAME_CC_COMPLETE', 'cc_complete.php');
  define('FILENAME_CC_FORM', 'cc_form.php');
  define('FILENAME_CC_INTRO', 'cc_intro.php');
  define('FILENAME_CCVAL_FUNCTION', 'ccval.php');
  define('FILENAME_CHANGE_DEFAULT_ADDR', 'changedefaultaddr.php');
  define('FILENAME_CHECKOUT_ADDRESS', 'checkout_address.php');
  define('FILENAME_CHECKOUT_CANCEL', 'checkout_cancel.php');
  define('FILENAME_CHECKOUT_CONFIRMATIONCC', 'checkout_confirmationcc.php');
  define('FILENAME_CHECKOUT_DOMICILIATION2', 'checkout_domiciliation2.php');
  define('FILENAME_CHECKOUT_PAYMENTCC', 'checkout_paymentcc.php');
  define('FILENAME_CHECKOUT_PROCESS', 'checkout_process.php');
  define('FILENAME_CHECKOUT_PROCESS_HP', 'checkout_process_HP.php');
  define('FILENAME_CHECKOUT_SUCCESS', 'checkout_success.php');
  define('FILENAME_CHECKOUT_SUCCESS_DOMICILIATION', 'checkout_success_domiciliation.php');
  define('FILENAME_CHECKOUTDOMICILIATION', 'checkout_domiciliation2.php');
  define('FILENAME_CITOBI', 'citobi.php');
  define('FILENAME_CONDITIONS', 'conditions.php');
  define('FILENAME_CONTACT', 'contact.php');
  define('FILENAME_CREATE_ACCOUNT', 'create_account.php');
  define('FILENAME_CREATE_ACCOUNT_PROCESS', 'create_account_process.php');
  define('FILENAME_CREATE_ACCOUNT_SUCCESS', 'create_account_success.php');
  define('FILENAME_CUSTSERV', 'custserv.php');
  define('FILENAME_CUSTSERV_DETAIL', 'custserv_detail.php');
  define('FILENAME_CUSTSERV_LIST', 'custserv_list.php');
  define('FILENAME_CUSTSERVOFFLINE', 'custseroffline.php');
  define('FILENAME_CUSTSERVOFFLINE_PORCESS', 'custseroffline_process.php');
  define('FILENAME_CUSTSERVADDTITLES', 'custservaddtitles.php');  
  define('FILENAME_CUSTSERVADDTITLES_PROCESS', 'custservaddtitles_process.php');  
  define('FILENAME_CUSTSERVCODES', 'custsercodes.php');  
  define('FILENAME_CUSTSERVCODES_PROCESS', 'custsercodes_process.php');  
  define('FILENAME_CUSTSERVDOM', 'custserdom.php');  
  define('FILENAME_CUSTSERVDOM_PROCESS', 'custserdom_process.php');  
  define('FILENAME_CUSTSERVDVDBROKEN', 'custserdvdbroken.php');
  define('FILENAME_CUSTSERVDVDBROKEN_PROCESS', 'custserdvdbroken_process.php');
  define('FILENAME_CUSTSERVDVDERROR', 'custserdvderror.php');
  define('FILENAME_CUSTSERVDVDERROR_PROCESS', 'custserdvderror_process.php');
  define('FILENAME_CUSTSERVDVDIHAVEDAMAGED', 'custserdvdihavedamaged.php');  
  define('FILENAME_CUSTSERVDVDIHAVEDAMAGED_PROCESS', 'custserdvdihavedamaged_process.php');
  define('FILENAME_CUSTSERDVDIHAVELOST', 'custserdvdihavelost.php');  
  define('FILENAME_CUSTSERDVDIHAVELOST_PROCESS', 'custserdvdihavelost_process.php');
  define('FILENAME_CUSTSERVDVDNOTARRIVED', 'custserdvdnotarrived.php');
  define('FILENAME_CUSTSERVDVDFINALLYARRIVED', 'custserdvdfinallyarrived.php');
  define('FILENAME_CUSTSERVDVDFINALLYARRIVED_PROCESS', 'custserdvdfinallyarrived_process.php');
  define('FILENAME_CUSTSERVDVDNOTARRIVED_PROCESS', 'custserdvdnotarrived_process.php');
  define('FILENAME_CUSTSERVDVDNOTREADABLE', 'custserdvdnotreadable.php');
  define('FILENAME_CUSTSERVDVDNOTREADABLE_PROCESS', 'custserdvdnotreadable_process.php');
  define('FILENAME_CUSTSERVDVDNOTYETRET', 'custserdvdnotyetret.php');
  define('FILENAME_CUSTSERVDVDNOTYETRET_PROCESS', 'custserdvdnotyetret_process.php');
  define('FILENAME_CUSTSERDVDXY', 'custserdvdxy.php');
  define('FILENAME_CUSTSERDVDXY_PORCESS', 'custserdvdxy_process.php');
  define('FILENAME_CUSTSERDVDERRORMENU', 'custserdvderrormenu.php');
  define('FILENAME_CUSTSERDVDERRORMENU', 'custserdvderrormenu.php');
  define('FILENAME_CUSTSERDVDERRORINTERCHANGE', 'custserdvderrorinterchange.php');
  define('FILENAME_CUSTSERDVDERRORINTERCHANGE_PROCESS', 'custserdvderrorinterchange_process.php');
  define('FILENAME_CUSTSERVFACT', 'custserfact.php');
  define('FILENAME_CUSTSERVFACTCONVPRIV', 'custserfactconvpriv.php');
  define('FILENAME_CUSTSERVFACTCONVPRIV_PROCESS', 'custserfactconvpriv_process.php');
  define('FILENAME_CUSTSERVFACTERAMOUNT', 'custserfacteramount.php');
  define('FILENAME_CUSTSERVFACTERAMOUNT_PROCESS', 'custserfacteramount_process.php');
  define('FILENAME_CUSTSERVFACTPRIV', 'custserfactpriv.php');  
  define('FILENAME_CUSTSERVFACTSUBNODVD', 'custserfactsubnodvd.php');
  define('FILENAME_CUSTSERVFACTSUBNODVD_PROCESS', 'custserfactsubnodvd_process.php');
  define('FILENAME_CUSTSERVNOBOX', 'custsernobox.php');
  define('FILENAME_CUSTSERVNOENVELOPE', 'custsernoenvelope.php');
  define('FILENAME_CUSTSERVOTHER', 'custserother.php');
  define('FILENAME_CUSTSERVOTHER_PROCESS', 'custserother_process.php');
  define('FILENAME_CUSTSERVPROBLEMDVD', 'custserproblemdvd.php');
  define('FILENAME_CUSTSERVSUGGECTDVD', 'custsersuggestdvd.php');
  define('FILENAME_CUSTSERVSUGGECTDVD_PROCESS', 'custsersuggestdvd_process.php');
  define('FILENAME_CUSTSERVTECHERROR', 'custservtecherror.php');
  define('FILENAME_CUSTSERVTECHERROR_PORCESS', 'custservtecherror_process.php');
  define('FILENAME_DEFAULT', 'default.php');
  define('FILENAME_DIRECTORS', 'directors.php');
  define('FILENAME_DIRECTORS_PUBLIC', 'directors_public.php');
  define('FILENAME_DOM_COMPLETE', 'dom_complete.php');
  define('FILENAME_DOM_FORM', 'dom_form.php');
  define('FILENAME_DOM_INTRO', 'dom_intro.php');
  define('FILENAME_DOMICILIATION_BY_POST', 'domiciliation_by_post.php');
  define('FILENAME_DOWNLOAD', 'download.php');
  define('FILENAME_DVD_DISPONIBILITY', 'dvd_disponibility.php');
  define('FILENAME_DVD_ROTATE_INFO', 'dvd_rotate_info.php');
  define('FILENAME_DVDXPOST_ROTATE_INFO', 'dvdxpost_rotate_info.php');
  define('FILENAME_DVDPOSTMAP', 'dvdpostmap.php');
  define('FILENAME_EMAILS_DETAIL', 'emails_detail.php');
  
  define('FILENAME_FAQ', 'faq.php');
  define('FILENAME_FOIREDULIVRE', 'foiredulivre.php');
  define('FILENAME_FOIREDULIVRE_CANCEL', 'foiredulivre_cancel.php');
  define('FILENAME_FOIREDULIVRE_COMPLETE', 'foiredulivre_complete.php');
  define('FILENAME_FOIREDULIVRE_CONFIRM', 'foiredulivre_confirm.php');
  define('FILENAME_FOIREDULIVRE_SUBSCRIPTIONS', 'foiredulivre_subscriptions.php');
  define('FILENAME_FREETRIAL', 'freetrial.php');
  define('FILENAME_FREETRIAL_INFO', 'freetrial_info.php');
  define('FILENAME_FREETRIAL_MSN', 'freetrial_msn.php');
  define('FILENAME_FREETRIAL_CANCEL', 'freetrial_cancel.php');
  define('FILENAME_FRUCTIS', 'fructisstyle.php');
  define('FILENAME_FRUCTIS_CANCEL', 'fructisstyle_cancel.php');
  define('FILENAME_FRUCTIS_COMPLETE', 'fructisstyle_complete.php');
  define('FILENAME_FRUCTIS_FORM', 'fructisstyle_form.php');
  define('FILENAME_FRUCTIS_CONFIRM', 'fructisstyle_confirm.php');
  define('FILENAME_FRUCTIS_SUBSCRIPTIONS', 'fructisstyle_subscriptions.php');
  define('FILENAME_FRUCTIS_RECONDUCTION_COMPLETE', 'fructis_reconduction_complete.php');
  define('FILENAME_GIFT_COMPLETE', 'gift_complete.php');
  define('FILENAME_GIFT_CONFIRM', 'gift_confirm.php');
  define('FILENAME_GIFT_FORM', 'gift_form.php');
  define('FILENAME_GIFT_HiSTORY', 'gift_history.php');
  define('FILENAME_GIFT_HOW', 'gift_how.php');
  define('FILENAME_GIFT_CANCEL', 'gift_cancel.php');
  define('FILENAME_GIFT_POPUP', 'gift_popup.php');
  define('FILENAME_HOW', 'how.php');
  define('FILENAME_HOWTORENT', 'howtorent.php');
  define('FILENAME_IN_THE_BAGS', 'in_the_bags.php'); // This is the middle of default.php (found in modules)
  define('FILENAME_JOBS', 'jobs.php');
  define('FILENAME_JUSTFORYOU', 'justforyou.php');
  define('FILENAME_JFU_CANCEL', 'jfu_cancel.php');
  define('FILENAME_JFU_COMPLETE', 'jfu_complete.php');
  define('FILENAME_JFU_CONFIRM', 'jfu_confirm.php');
  define('FILENAME_JFU_FORM', 'jfu_form.php');
  define('FILENAME_JFU_RECONDUCTION_COMPLETE', 'jfu_reconduction_complete.php');
  define('FILENAME_KELKOO', 'kelkoo.php');
  define('FILENAME_KIALA_COMPLETE', 'kiala_complete.php');
  define('FILENAME_LESOIR', 'lesoir.php');
  define('FILENAME_LISTING_CATEGORY', 'listing_category.php');
  define('FILENAME_LISTING_CATEGORY_ADULT', 'listing_category_adult.php');
  define('FILENAME_LISTING_CATEGORY_PUBLIC', 'listing_category_public.php');
  define('FILENAME_LOGIN', 'login.php');
  define('FILENAME_LOGOFF', 'logoff.php');
  define('FILENAME_LONGTERM_OFFER', 'longterm_offer.php');
  define('FILENAME_LONGTERM_OFFER_CONFIRM', 'longterm_offer_confirm.php');
  define('FILENAME_LONGTERM_OFFER_PROCESS', 'longterm_offer_process.php');
  define('FILENAME_MANUFACTURERS', 'manufacturers.php');
  define('FILENAME_MEDIACENTER_HOME', 'mediacenter_home.php');
  define('FILENAME_MESSAGE_URGENT', 'messages_urgent.php');
  define('FILENAME_MIKADO', 'mikado.php');
  define('FILENAME_MIKADO_CANCEL', 'mikado_cancel.php');
  define('FILENAME_MSN_PROMOSTEP_ONE', 'msn_promo.php');  
  define('FILENAME_MSN_PROMOSTEP_TWO', 'msn_promo2.php');  
  define('FILENAME_MYDELAYED', 'mydelayed.php');
  define('FILENAME_MYDVDPOST', 'mydvdpost.php');
  define('FILENAME_MYDVDXPOST', 'mydvdxpost.php');
  define('FILENAME_MYDVDPOSTMENU', 'mydvdpostmenu.php');
  define('FILENAME_MY_PROFILE', 'my_profile.php');
  define('FILENAME_MY_PROFILE_ADULT', 'my_profile_adult.php');
  define('FILENAME_MYRENTALS', 'myrentals.php');
  define('FILENAME_MYSPONSORING', 'mysponsoring.php');
  define('FILENAME_MYSUBSCRIPTION', 'mysubscription.php');
  define('FILENAME_MYWISHLIST', 'mywishlist.php');
  define('FILENAME_MYWISHLIST_ADULT', 'mywishlist_adult.php');
  define('FILENAME_NEW_PRODUCTS', 'new_products.php'); // This is the middle of default.php (found in modules)
  define('FILENAME_NEWFUNCTIONS', 'newfunctions.php');
  define('FILENAME_PASSWORD_CRYPT', 'password_funcs.php');
  define('FILENAME_PASSWORD_FORGOTTEN', 'password_forgotten.php');
  define('FILENAME_PAYMENT', 'payment.php');
  define('FILENAME_PERMESSO', 'permesso.php');
  define('FILENAME_PERMESSO_CANCEL', 'permesso_cancel.php');
  define('FILENAME_PERMESSO_COMPLETE', 'permesso_complete.php');
  define('FILENAME_PERMESSO_CONFIRM', 'permesso_confirm.php');
  define('FILENAME_PERMESSO_FORM', 'permesso_form.php');
  define('FILENAME_PICTO', 'picto.php');
  define('FILENAME_POPUPAVAIL', 'popupavail.php');
  define('FILENAME_POPUPABOMANAGEMENT', 'popupabomanagement.php');
  define('FILENAME_POPUPABOMANAGEMENTAUTO', 'popupabomanagement.php');
  define('FILENAME_POPUPDOMICILIATION_INFO', 'popupdomiciliation_info.php');
  define('FILENAME_POPUPMANUALORDER', 'popupmanualorder.php');
  define('FILENAME_PRESSE', 'presse.php');
  define('FILENAME_PRIVACY', 'privacy.php');
  define('FILENAME_PRODUCT_INFO', 'product_info.php');
  define('FILENAME_PRODUCT_INFO_ADULT', 'product_info_adult.php');
  define('FILENAME_PRODUCT_INFO_PUBLIC', 'product_info_public.php');
  define('FILENAME_PRODUCT_INFO_OTHER', 'product_info_other.php');
  define('FILENAME_PRODUCT_LISTING', 'product_listing.php');
  define('FILENAME_PRODUCT_NOTIFICATIONS', 'product_notifications.php');
  define('FILENAME_PRODUCT_REVIEWS', 'product_reviews.php');
  define('FILENAME_PRODUCT_REVIEWS_INFO', 'product_reviews_info.php');
  define('FILENAME_PRODUCT_REVIEWS_WRITE_ADULT', 'product_reviews_write_adult.php');
  define('FILENAME_PRODUCT_REVIEWS_WRITE', 'product_reviews_write.php');
  define('FILENAME_PRODUCTS_NEW', 'products_new.php');
  define('FILENAME_PRODUCTS_NEXT', 'products_next.php');
  define('FILENAME_RATE_MORE', 'rate_more.php');
  define('FILENAME_RECOM', 'my_recommandation.php');
  define('FILENAME_RECOM_HOW', 'my_recommandation_how.php');
  define('FILENAME_REDIRECT', 'redirect.php');
  define('FILENAME_REVIEWS', 'reviews.php');
  define('FILENAME_REVIEWS_CUSTOMER', 'reviews_customer.php');
  define('FILENAME_RTLGATEWAY', 'rtlgateway.php');
  define('FILENAME_RTLBE', 'rtlbe.php');
  define('FILENAME_RTLBE_CANCEL', 'rtlbe_cancel.php');
  define('FILENAME_RTLBE_COMPLETE', 'rtlbe_complete.php');
  define('FILENAME_RTLBE_CONFIRM', 'rtlbe_confirm.php');
  define('FILENAME_RTLBE_SUBSCRIPTIONS', 'rtlbe_subscriptions.php');
  define('FILENAME_SAME_THEME_PRODUCTS', 'same_theme_products.php');
  define('FILENAME_SEARCH_ACTORS', 'search_actors.php');
  define('FILENAME_SEARCH_ACTORS_ADULT', 'search_actors_adult.php');
  define('FILENAME_SEARCH_ACTORS_PUBLIC', 'search_actors_public.php');
  define('FILENAME_SEARCH_DIRECTORS', 'search_directors.php');
  define('FILENAME_SEARCH_DIRECTORS_PUBLIC', 'search_directors_public.php');
  define('FILENAME_SEARCH_MANUFACTURERS', 'search_manufacturers.php');
  define('FILENAME_SHIPPING', 'shipping.php');
  define('FILENAME_SPONSORING', 'sponsoring.php');
  define('FILENAME_SITEMAP', 'sitemap.php');
  define('FILENAME_SODEXHO', 'sodexho.php');
  define('FILENAME_SODEXHO_CANCEL', 'sodexho_cancel.php');
  define('FILENAME_SODEXHO_COMPLETE', 'sodexho_complete.php');
  define('FILENAME_SODEXHO_CONFIRM', 'sodexho_confirm.php');
  define('FILENAME_SODEXHO_SUBSCRIPTIONS', 'sodexho_subscriptions.php');
  define('FILENAME_SPECIALS', 'specials.php');
  define('FILENAME_SPECTOR', 'spector.php');
  define('FILENAME_SPECTOR_INFO', 'spector_info.php');
  define('FILENAME_SPONSORING', 'sponsoring.php');
  define('FILENAME_SPONSORING2', 'sponsoring2.php');
  define('FILENAME_SPONSORING3', 'sponsoring3.php');
  define('FILENAME_SPONSORING4', 'sponsoring4.php');
  define('FILENAME_SPONSORING5', 'sponsoring5.php');
  define('FILENAME_SPONSORINGWINPRIVILEGE', 'sponsoringwinprivilege.php');
  define('FILENAME_SUBSCRIPTION', 'subscription.php');
  define('FILENAME_SUBSCRIPTION_INFO', 'subscription_info.php');
  define('FILENAME_SUBSCRIPTION_CANCEL', 'subscription_cancel.php');  
  define('FILENAME_SUBSCRIPION_CONFIRM', 'subscription_confirm.php');  
  define('FILENAME_SUBSCRIPTIONCHANGE', 'subscription_change.php');
  define('FILENAME_SUBSCRIPTIONCHANGE_COMPLETE', 'subscription_change_complete.php');
  define('FILENAME_SUBSCRIPTIONCHANGE_CONFIRM', 'subscription_change_confirm.php');
  define('FILENAME_SUBSCRIPTIONHOW', 'subscription_how.php');
  define('FILENAME_SUBSCRIPTIONSTOP', 'subscription_stop.php');
  define('FILENAME_SUBSCRIPTIONSTOP2', 'subscription_stop2.php');
  define('FILENAME_SUBSCRIPTIONSTOP_COMPLETE', 'subscription_stop_complete.php');
  define('FILENAME_SUBSCRIPTIONSTOP_CONFIRM', 'subscription_stop_confirm.php');
  define('FILENAME_SUGGESTIONS', 'suggestions.php');
  define('FILENAME_SURVEY_CUSTOMERS', 'Survey_customers.php');
  define('FILENAME_SURVEY_CUSTOMERS_PROCESS', 'Survey_customers_process.php');
  define('FILENAME_SURVEY_CUSTOMERS_SUCCESS', 'Survey_customers_success.php'); 
  define('FILENAME_SURVEY_NEW_SITE', 'Survey_new_site.php');
  define('FILENAME_SURVEY_NEW_SITE_PROCESS', 'Survey_new_site_process.php');
  define('FILENAME_SURVEY_NEW_SITE_SUCCESS', 'Survey_new_site_success.php');
  define('FILENAME_SURVEY_CUSTSERV', 'Survey_custserv.php');
  define('FILENAME_SURVEY_CUSTSERV_PROCESS', 'Survey_custserv_process.php');
  define('FILENAME_SURVEY_CUSTSERV_SUCCESS', 'Survey_custserv_success.php');    
  define('FILENAME_TEL', 'tel.php');
  define('FILENAME_TELL_A_FRIEND', 'tell_a_friend.php');
  define('FILENAME_TRIAL', 'trial.php');
  define('FILENAME_TRAILER', 'trailer.php');
  define('FILENAME_UPCOMING_PRODUCTS', 'upcoming_products.php'); // This is the bottom of default.php (found in modules)
  define('FILENAME_WHOWEARE', 'whoweare.php');
  define('FILENAME_VILLAGE', 'village.php');
  define('FILENAME_VILLAGE_CANCEL', 'village_cancel.php');
  define('FILENAME_VILLAGE_COMPLETE', 'village_complete.php');
  define('FILENAME_VILLAGE_CONFIRM', 'village_confirm.php');
  define('FILENAME_VILLAGE_FORM', 'village_form.php');
  define('FILENAME_VILLAGE_SUBSCRIPTIONS', 'village_subscriptions.php');
// customization for the design layout
  define('TAX_DECIMAL_PLACES', 0); // Pad the tax value this amount of decimal places
  define('DISPLAY_PRICE_WITH_TAX', true); // Display prices with tax (true) or without tax (false)
  define('BOX_WIDTH', 150); // how wide the boxes should be in pixels (default: 125)

// Control what fields of the customer table are used
  define('ACCOUNT_GENDER', 'true');
  define('ACCOUNT_DOB', 'true');
  define('ACCOUNT_COMPANY', 'false');
  define('ACCOUNT_SUBURB', 'false');
  define('ACCOUNT_STATE', 'false');

// Categories Box: recursive products count
  define('SHOW_COUNTS', 'False'); // show category count: true=Yes False=No
  define('USE_RECURSIVE_COUNT', 'true'); // recursive count: true=Yes False=No

// check to see if php implemented session management functions - if not, include php3/php4 compatible session class
  if (!function_exists('session_start')) {
    define('PHP_SESSION_NAME', 'sID');
    define('PHP_SESSION_SAVE_PATH', '/tmp');

    include(DIR_WS_CLASSES . 'sessions.php');
  }
	if(gethostbyname($host) != '127.0.0.1'){

	//memcache class
		//if($memcache_available===true)
		//{
			include(DIR_WS_CLASSES . 'MemcachedAggregator.php');
			$server=array();
			if(!defined('SERVER_MEMCACHE_HOST'))
				define('SERVER_MEMCACHE_HOST','matadi');
			if(!defined('SERVER_MEMCACHE_PORT'))
				define('SERVER_MEMCACHE_PORT','11211');

			$server[]=array('host'=>SERVER_MEMCACHE_HOST,'port'=>SERVER_MEMCACHE_PORT);
			$memcache=new MemcachedAggregator($server);
			$status_memcache=$memcache->serverStatus();
			if($_GET['debug']==1)
			{
				var_dump($server);
				echo $status_memcache;

			}
			if($status_memcache===false)
				unset($memcache);
		//}
	} 
// define how the session functions will be used
  require(DIR_WS_FUNCTIONS . 'sessions.php');
  tep_session_name('osCsid');

// define our general functions used application-wide
  require(DIR_WS_FUNCTIONS . 'general.php');
  require(DIR_WS_FUNCTIONS . 'html_output.php');
// include the database functions
  require(DIR_WS_FUNCTIONS . 'database.php');

// Clean out HTML comments from ALT tags etc.
require(DIR_WS_FUNCTIONS . 'clean_html_comments.php');


// make a connection to the database... now
  tep_db_connect() or die('Unable to connect to database server!');

// set the application parameters (can be modified through the administration tool)
  $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION . '');
  while ($configuration = tep_db_fetch_array($configuration_query)) {
    define($configuration['cfgKey'], $configuration['cfgValue']);
  }

// Get variables from $PATH_INFO
  if (SEARCH_ENGINE_FRIENDLY_URLS == 'true') {
    if (strlen($PATH_INFO) > 1) {
      $PHP_SELF = str_replace($PATH_INFO,'',$PHP_SELF);
      $vars = explode('/', substr($PATH_INFO, 1));
      while (list(, $var) = each($vars)) { 
        list(, $val) = each($vars); 
        $HTTP_GET_VARS[$var] = $val; 
        $GLOBALS[$var] = $val; 
      }
    }
  }

// include cache functions if enabled
  if (USE_CACHE == 'true') include(DIR_WS_FUNCTIONS . 'cache.php');

// include navigation history class
  require(DIR_WS_CLASSES . 'navigation_history.php');

// some code to solve compatibility issues
  require(DIR_WS_FUNCTIONS . 'compatibility.php');

// lets start our session
   if ($HTTP_POST_VARS[tep_session_name()]) {   
     tep_session_id($HTTP_POST_VARS[tep_session_name()]);   
   }   
   if ( (getenv('HTTPS') == 'on') && ($HTTP_GET_VARS[tep_session_name()]) ) {   
     tep_session_id($HTTP_GET_VARS[tep_session_name()]);   
   } 
   if (function_exists('session_set_cookie_params')) {
    session_set_cookie_params(0, substr(DIR_WS_CATALOG, 0, -1));
  }

  tep_session_start();

$private_page=array('/mydvdpost.php','/mywishlist.php','/login.php','/holiday_form.php','/step4.php','/step3b.php','/step2b.php','/step3c.php','/step3d.php','/step4.php','/abo_google_ogone_conf.php','/abo_google_ogone_conf.php','/mydvdshop.php'	,'/account.php','/account_edit.php','/account_edit_process.php'	,'/actors.php'	,'/address_book.php'	,'/address_book_process.php','/member_get_member.php','/my_profile.php',"/listing_category.php",
		'/contact.php'                    ,
		'/contest.php'                    ,
		'/contest2.php'                   ,
		'/contest2_process.php'           ,
		'/contest_event.php'              ,
		'/contest_event_process.php'      ,
		'/contest_process.php'            ,
		'/custserdvdbroken.php'           ,
		'/custserdvderror.php'            ,
		'/custserdvderrorinterchange.php' ,
		'/custserdvderrormenu.php'        ,
		'/custserdvdihavedamaged.php'     ,
		'/custserdvdihavelost.php'        ,
		'/custserdvdnotarrived.php'       ,
		'/custserdvdnotreadable.php'      ,
		'/custserdvdnotyetret.php'        ,
		'/custserfactconvpriv.php'        ,
		'/custserfactpriv.php'            ,
		'/custsernobox.php'               ,
		'/custserother.php'               ,
		'/custserproblemdvd.php'          ,
		'/custsersuggestdvd.php'          ,
		'/custservtecherror.php'					,
		'/custservtecherror_process.php'	,
		'/custserv.php'                   ,
		'/custserv_detail.php'            ,
		'/custserv_list.php'              ,
		'/custserv_public.php'            ,
		'/custserv_detail_public.php'            ,
		'/custserv_list_public.php'              ,
		'/custsurvmar08.php'              ,
		'/custsurvmar08_process.php'      ,
		'/directors.php'                  ,
		'/dvd_rotate_info.php'            ,
		'/dvdxpost_rotate_info2.php'      ,
		'/emails_detail.php'              ,
		'/freetrial.php'                  ,
		'/freetrial_cancel.php'           ,
		'/gfc50_confirm.php'              ,
		'/gfc50_formulas.php'             ,
		'/gift2_chose_template.php'       ,
		'/gift_cancel.php'                ,
		'/gift_complete.php'              ,
		'/gift_complete2.php'             ,
		'/gift_confirm.php'               ,
		'/gift_confirm2.php'              ,
		'/gift_form.php'                  ,
		'/gift_form2.php'                 ,
		'/gift_form2_public.php'          ,
		'/gift_history.php'               ,
		'/gift_history_detail.php'        ,
		'/gift_how.php'                   ,
		'/giftz_offer_confirm.php'        ,
		'/giftz_offer_form.php'           ,
		'/holiday_process.php'            ,
		'/howtorent.php'									,
		'/my_recommandation.php'					,
		'/info_post.php'                               ,
		'/jobs.php'                                    ,
		'/jobs_description.php'                        ,
		'/listing_category.php'                        ,
		'/login_adultpwd.php'                          ,
		'/login_adultpwd_forgot.php'                   ,
		'/login_code.php'                              ,
		'/member_get_member.php'                       ,
		'/member_get_member_faq.php'                   ,
		'/member_get_member_gift.php'                  ,
		'/member_get_member_mail.php'                  ,
		'/member_get_member_points.php'                ,
		'/member_get_member_points_complete.php'       ,
		'/messages_urgent.php'                         ,
		'/my_profile.php'                              ,
		'/my_recommandation.php'                       ,
		'/my_recommandation_how.php'                   ,
		'/my_recommandation_process_info.php'          ,
		'/mydelayed.php'                               ,
		'/mydvdpost.php'                               ,
		'/myrentals.php'                               ,
		'/mysponsoring.php'                            ,
		'/mywishlist.php'                              ,
		'/mywishlist2.php'                             ,
		'/payment_method_change.php'                   ,
		'/picto.php'                                   ,
		'/presse.php'                                  ,
		'/product_info.php'                            ,
		'/product_reviews_write.php'                   ,
		'/promo.php'                                   ,
		'/quizz.php'                                   ,
		'/quizz2.php'                                  ,
		'/rate_more.php'                               ,
		'/relaunch_complete.php'                       ,
		'/relaunch_gfc.php'                            ,
		'/relaunch_gfc.php'                            ,
		'/relaunch_tvv.php-'                           ,
		'/relaunch_tvv.php'                            ,
		'/relaunch_tvv2.php'                           ,
		'/relaunch_tvv2.php'                           ,
		'/relaunch_tvv_complete.php'                   ,
		'/reviews.php'                                 ,
		'/reviews_member.php'                          ,
		'/reviews_member_public.php'                   ,
		'/sitemap.php'                                 ,
		'/sponsoring.php'                              ,
		'/studio.php'                                  ,
		'/subscription.php'                            ,
		'/subscription2.php'                           ,
		'/subscription_change.php'                     ,
		'/subscription_change2.php'                    ,
		'/subscription_change_confirm.php'             ,
		'/subscription_change_limited.php'             ,
		'/subscription_change_limited_complete.php'    ,
		'/subscription_confirm.php'                    ,
		'/subscription_confirm_bcmc.php'               ,
		'/subscription_info.php'                       ,
		'/subscription_info_bcmc.php'                  ,
		'/subscription_prepay.php'                     ,
		'/subscription_stop.php'                       ,
		'/subscription_stop2.php'                      ,
		'/subscription_stop_confirm.php'               ,
		'/subscription_upgrade.php'                    ,
		'/subsription_unswitch.php'                    ,
		'/Survey_customer.php'                         ,
		'/Survey_customer_process.php'                 ,
		'/Survey_customers.php'                        ,
		'/Survey_customers_process.php'                ,
		'/Survey_custserv.php'                         ,
		'/Survey_custserv_process.php'                 ,
		'/survey_games.php'                            ,
		'/survey_games_process.php'                    ,
		'/Survey_new_site.php'                         ,
		'/Survey_new_site_process.php'                 ,
		'/switch.php'                                  ,
		'/unsubscribe.php'                             ,
		'/unsubscribe2.php'                            ,
		'/update_wishlist.php'                         ,
		'/whoweare.php'                                ,
		'/wishlist_explain.php'                        ,
		'/advanced_search_result2.php'								 ,
		'/advanced_search_result2_shop.php'            ,
		'/conditions_buy_dvd.php'                     ,
		'/dvdforsale_info.php'                        ,
		'/dvdforsale_listing.php'                     ,
		'/mydvdbought.php'                            ,
		'/mydvdshop.php'                              ,
		'/pack_shop.php'                              ,
		'/product_info_shop.php'                      ,
		'/shop_accessory.php'                         ,
		'/shop_best_buy.php'                          ,
		'/shop_last_added.php'                        ,
		'/shop_listing.php'                           ,
		'/shop_offline.php'                           ,
		'/shop_selected_dvd.php'                      ,
		'/shopping_cart.php'                          ,
		'/shopping_cart_checkout.php'                 ,
		'/shopping_complete.php'                      ,
		'/actors_adult.php'                           ,
		'/advanced_search_result2_adult.php'          ,
		'/dvdforsale_info_adult.php'                  ,
		'/dvdforsale_listing_adult.php'               ,
		'/dvdxpost_rotate_info2.php'                  ,
		'/listing_category_adult.php'                 ,
		'/manufacturers.php'                          ,
		'/my_profile_adult.php'                       ,
		'/mydvdxpost.php'                             ,
		'/myrentals_adult.php'                        ,
		'/mywishlist_adult.php'                       ,
		'/product_info_adult.php'                     ,
		'/product_reviews_write_adult.php'            ,
		'/reviews_adult.php'                          ,
		'/shopping_cart_adult.php'                    ,
		'/shopping_cart_checkout_adult.php'           ,
		'/shopping_complete_adult.php'                ,
		'/shopping_complete_new_adult.php'            ,
		'/studio_adult.php'                           ,
		'/vod_check_code.php'                         ,
		'/vod_code_order.php'                         ,
		'/vod_code_process.php'                       ,
		'/vod_order_conf.php'                         ,
		'/vod_payment_confirm.php'                    ,
		'/vod_stream.php'                             ,
		'/vodx.php'                                   ,
		'/vodx_detail.php'                            ,
		'/vodx_faq.php'                               ,
		'/advanced_search_result2_shop_adult.php'     ,
		'/dvdforsale_listing_new_adult.php'           ,
		'/mydvdbought_adult.php'                      ,
		'/mydvdshop_adult.php'                        ,
		'/product_info_shop_adult.php'                ,
		'/shop_listing_adult.php'                     ,
		'/shop_offline.php'                           ,
		'/shopping_cart_checkout_new_adult.php'       ,
		'/shopping_cart_new_adult.php'                ,
		'/basic_reconduction_info.php'								,
		'/basic_reconduction_process.php'							,
		'/custsercodes.php'                           ,
		'/custsercodes_process.php'                   ,
		'/custserdom.php'                             ,
		'/custserdom_process.php'                     ,
		'/custserdvdbroken_process.php'               ,
		'/custserdvderror_process.php'                ,
		'/custserdvderrorinterchange_process.php'     ,
		'/custserdvdfinallyarrived.php'               ,
		'/custserdvdfinallyarrived_process.php'       ,
		'/custserdvdihavedamaged_process.php'         ,
		'/custserdvdihavelost_process.php'            ,
		'/custserdvdnotarrived_process.php'           ,
		'/custserdvdnotreadable_process.php'          ,
		'/custserdvdnotyetret_process.php'            ,
		'/custserdvdxy.php'                           ,
		'/custserdvdxy_process.php'                   ,
		'/custserfact.php'                            ,
		'/custserfactconvpriv_process.php'            ,
		'/custserfacteramount.php'                    ,
		'/custserfacteramount_process.php'            ,
		'/custserfactsubnodvd.php'                    ,
		'/custserfactsubnodvd_process.php'            ,
		'/custsernoenvelope.php'                      ,
		'/custseroffline.php'                         ,
		'/custseroffline_process.php'                 ,
		'/custserother_process.php'                   ,
		'/custsersuggestdvd_process.php'              ,
		'/custservaddtitles.php'                      ,
		'/custservaddtitles_process.php'              ,
		'/addtowishlist_adult.php'              			,
		'/ogone_change.php'														,
		'/step_check.php'
		
		);                
  foreach($private_page as $page)
  {
    if($page == $_SERVER['SCRIPT_NAME'])
    {
      require_once 'authentification2/src/authentification.php';
      require_once 'authentification2/examples/example2.php';
    }
  }
// include currencies class and create an instance
  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();
// include the mail classes
  require(DIR_WS_CLASSES . 'mime.php');
  require(DIR_WS_CLASSES . 'class.phpmailer.php');
  require(DIR_WS_CLASSES . 'email.php');
  if (strlen(DEFAULT_LANGUAGE)>0)
	$HTTP_GET_VARS['language']=DEFAULT_LANGUAGE;
	if(empty($HTTP_GET_VARS['language']))
	{
		if(!empty($_COOKIE['language_id']))
		{
			
			$languages_id=$_COOKIE['language_id'];
			
			switch($languages_id)
			{
				case 1:
					$language='french';
				break;
				case 2:
					$language='dutch';
				break;
				case 3:
					$language='english';
				break;
				default:
					$languages_id=1;
					$language='french';
					
			}
		}else{
			if(strpos($_SERVER['SERVER_NAME'],'www')===0){
				//tep_redirect(tep_href_link('language.php', '', 'SSL'));
				//die();
			}
			
		}
	}
// language
  if ( (!$languages_id) || ($HTTP_GET_VARS['language']) ) {
   

    include(DIR_WS_CLASSES . 'language.php');
    if (strlen(DEFAULT_LANGUAGE)>0) {
	    $lng = new language(DEFAULT_LANGUAGE);
	}else{
    	$lng = new language($HTTP_GET_VARS['language']);
			$languages_id = $lng->language['id'];
    	if (!$HTTP_GET_VARS['language']) 
			{
				$lng->get_browser_language();
				$languages_id = $lng->language['id'];
				if ($languages_id<1 || $languages_id >2) {
					$languages_id= 1;
					$language = 'french';
				}
			}
				
	}

    $language = $lng->language['directory'];
    $languages_id = $lng->language['id'];
		
  }
  
  if ($languages_id<1 || $languages_id >3) {
	$languages_id= 1;
	$language = 'french';
  }
  switch($languages_id)
  {
	case 1:
		$lang_short='fr';
	break;
	case 2:
		$lang_short='nl';
	break;
	case 3:
		$lang_short='en';
	break;
	default:
		$lang_short='fr';
  }
  if(count($lang_available)>0)
  {
	$find=false;
	$i=0;
	foreach($lang_available as $key =>$value)
	{
		if($i==0)
		{
			$good_key=$key;
		}
		if($key==$languages_id)
		{
			$find=true;
		}
		$i++;
	}
	if($find===false)
	{
		$languages_id= $good_key;
		switch($languages_id)
		{
			case 1:
				$language='french';
			break;
			case 2:
				$language='dutch';
			break;
			case 3:
				$language='english';
			break;
			default:
				$languages_id=1;
				$language='french';
				
		}
	}
  }

if(WEB_SITE_ID==101)
{
	$languages_id=2;
	$language='dutch';
}
$languages_id=intval($languages_id);
  setcookie('language_id', $languages_id, time()+2592000, '/');
  define("SHORT", $lang_short);
tep_session_register('lang_short',$lang_short);
tep_session_register('language');
tep_session_register('languages_id');

/*************************************
 *    SPECIAL JACOB BAILEYS    *
 *************************************/

	if(strpos($_SERVER['HTTP_HOST'],'www')===false && $host!='localhost' && $host!='test' && $host!='192.168.100.206')
	{
		setcookie('jacob',1);
		$jacob=1;
	}
	else if(!isset($_SESSION['jacob']))
	{
		/*$rand= mt_rand(0, 999);
		if ($rand % 2 == 1) 
			$value = 1;
		else
			$value = 0;
		
		tep_session_register('jacob', $value);
		$jacob=$value;*/
		$jacob=1;
	}
	else
	{
		$jacob = $_SESSION['jacob'];
	}
/***************************************/
/****************************************/

if(tep_session_is_registered('customer_id'))
{
  if($languages_id != 1 && $languages_id != 2 && $languages_id != 3)
  {
    $languages_id = 1;
  }
  tep_db_query("update customers set customers_language = '".$languages_id."' where customers_id = '" . $customers_id . "'");
}
// include the language nns
require(DIR_WS_INCLUDES . 'translation_root.php');
require(DIR_WS_INCLUDES . $language . '.php');

define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

// Return date in raw format
// $date should be in format dd/mm/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}


  
// currency
  if ( (!$currency) || ($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!$currency) tep_session_register('currency');

    if ($HTTP_GET_VARS['currency']) {
      $currency = tep_currency_exists($HTTP_GET_VARS['currency']);
      if (!$currency) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }

// navigation history
  if (tep_session_is_registered('navigation')) {
    if (PHP_VERSION < 4) {
      $broken_navigation = $navigation;
      $navigation = new navigationHistory;
      $navigation->unserialize($broken_navigation);
    }
  } else {
    tep_session_register('navigation');
    $navigation = new navigationHistory;
  }
  $navigation->add_current_page();

// include the who's online functions
if (WHOSONLINE > 0 ){
  require(DIR_WS_FUNCTIONS . 'whos_online.php');
  tep_update_whos_online();
}

// Include the password crypto functions
  require(DIR_WS_FUNCTIONS . FILENAME_PASSWORD_CRYPT);

// Include validation functions (right now only email address)
  require(DIR_WS_FUNCTIONS . 'validations.php');

// split-page-results
  require(DIR_WS_CLASSES . 'split_page_results.php');



// infobox
  //require(DIR_WS_CLASSES . 'boxes.php');
  require(getBestMatchToInclude(DIR_WS_CLASSES . 'boxes.php'));

// auto activate and expire banners
  require(DIR_WS_FUNCTIONS . 'banner.php');
  tep_activate_banners();
  tep_expire_banners();

// auto expire special products
  require(DIR_WS_FUNCTIONS . 'specials.php');
  tep_expire_specials();

// calculate category path
  if ($HTTP_GET_VARS['cPath']) {
    $cPath = $HTTP_GET_VARS['cPath'];
  } elseif ($HTTP_GET_VARS['products_id'] && !$HTTP_GET_VARS['manufacturers_id']) {
    $cPath = tep_get_product_path($HTTP_GET_VARS['products_id']);
  } else {
    $cPath = '';
  }
  if (strlen($cPath) > 0) {
    $cPath_array = array_map('tep_string_to_int', explode('_', $cPath));
    $cPath = implode('_', $cPath_array);
    $current_category_id = $cPath_array[(sizeof($cPath_array)-1)];
  } else {
    $current_category_id = 0;
  }

  require(DIR_WS_CLASSES . 'breadcrumb.php');
  $breadcrumb = new breadcrumb;

  $breadcrumb->add(HEADER_TITLE_TOP, HTTP_SERVER);
  $breadcrumb->add(HEADER_TITLE_CATALOG, tep_href_link(FILENAME_DEFAULT));

  if (isset($cPath_array)) {
    for($i=0; $i<sizeof($cPath_array); $i++) {
      $categories_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '" . $cPath_array[$i] . "' and language_id='" . $languages_id . "'");
      $categories = tep_db_fetch_array($categories_query);
      $breadcrumb->add($categories['categories_name'], tep_href_link(FILENAME_DEFAULT, 'cPath=' . implode('_', array_slice($cPath_array, 0, ($i+1)))));
    }
  } elseif ($HTTP_GET_VARS['manufacturers_id']) {
    $manufacturers_query = tep_db_query("select manufacturers_name from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . $HTTP_GET_VARS['manufacturers_id'] . "'");
    $manufacturers = tep_db_fetch_array($manufacturers_query);
    $breadcrumb->add($manufacturers['manufacturers_name'], tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id']));
  }

  if ($HTTP_GET_VARS['products_id']) {
    $model_query = tep_db_query("select products_model from " . TABLE_PRODUCTS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
    $model = tep_db_fetch_array($model_query);
    $breadcrumb->add($model['products_model'], tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . $cPath . '&products_id=' . $HTTP_GET_VARS['products_id']));
  }
//nombre de dvd dans le catalogue
$sql="select count(products_id) as cpt from products where products_status >-1";

$count_dvd_query=tep_db_cache($sql,43200);
//var_dump($count_dvd_query)
$cpt_catalog=ceil($count_dvd_query[0]['cpt']/1000)*1000;
if($languages_id==1)
	$cpt_catalog = number_format($cpt_catalog, 0, '.', ' ');
else if($languages_id==3)
	$cpt_catalog = number_format($cpt_catalog, 0, '.', ',');
else
{
	$cpt_catalog = number_format($cpt_catalog, 0, '.', '.');
}

// set which precautions should be checked
  define('WARN_INSTALL_EXISTENCE', 'true');
  define('WARN_CONFIG_WRITEABLE', 'true');
  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');
  define('WARN_SESSION_AUTO_START', 'true');
  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');
  $nb_host=strpos($_SERVER['HTTP_HOST'],'.');
  if($nb_host!==false){
	$host_srv=substr($_SERVER['HTTP_HOST'],$nb_host);
  }
  if(strpos($_SERVER['HTTP_HOST'],'www')===false)
  {	
  
	if(!empty($host_srv))
		setcookie('partner', WEB_SITE, time()+2592000, '/',$host_srv);
  	else
		setcookie('partner', WEB_SITE, time()+2592000, '/');
  }
if (SITE_IS_ADULT) {	
	if (!$logpwd>0){
    	if (!tep_session_is_registered('adult_pwd')) {
	    	$navigation->set_snapshot();
			tep_redirect(FILENAME_LOGIN_ADULTPWD);
		}  
  	}
}   
  
function removeCRForJS($text) {
    return preg_replace("/\r\n|\n\r|\n|\r/", ' ', $text);
}



?>