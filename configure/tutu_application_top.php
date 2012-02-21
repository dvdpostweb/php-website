<?php
//in case of emergency
//header("Location: http://".$SERVER_NAME."/default.htm");
//exit();

//working prrocess
header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"'); 

function getBestMatchToInclude($pathname) {
  $tmp = substr($pathname,0,-4);
  if (file_exists($tmp . '_' . SITE_ID . '.php')) {
      return $tmp . '_' . SITE_ID . '.php';
  } else {
      return $pathname;
  }
}

function getBestMatchToIncludeAny($pathname, $file_ext) {
  $tmp = substr($pathname,0,-4);
  if (file_exists($tmp . '_' . SITE_ID . $file_ext)) {
      return $tmp . '_' . SITE_ID . $file_ext;
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
  
// Start the clock for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());

// Set the level of error reporting
  error_reporting(E_ALL & ~E_NOTICE);

// Check if register_globals is enabled.
// Since this is a temporary measure this message is hardcoded. The requirement will be removed before 2.2 is finalized.
  if (function_exists('ini_get')) {
    ini_get('register_globals') or exit('FATAL ERROR: register_globals is disabled in php.ini, please enable it!');
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

// define how the session functions will be used
  require(DIR_WS_FUNCTIONS . 'sessions.php');
  tep_session_name('osCsid');

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

// include currencies class and create an instance
  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

// include the mail classes
  require(DIR_WS_CLASSES . 'mime.php');
  require(DIR_WS_CLASSES . 'email.php');

// language
  if ( (!$language) || ($HTTP_GET_VARS['language']) ) {
    if (!$language) {
      tep_session_register('language');
      tep_session_register('languages_id');
    }

    include(DIR_WS_CLASSES . 'language.php');
    
    if (strlen(DEFAULT_LANGUAGE)>0) {
	    $lng = new language(DEFAULT_LANGUAGE);
	}else{
    	$lng = new language($HTTP_GET_VARS['language']);
    	if (!$HTTP_GET_VARS['language']) $lng->get_browser_language();
	}

    $language = $lng->language['directory'];
    $languages_id = $lng->language['id'];
  }
  
  if ($languages_id<1) {
	$languages_id= 1;
	$language = 'french';
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

// define our general functions used application-wide
  require(DIR_WS_FUNCTIONS . 'general.php');
  require(DIR_WS_FUNCTIONS . 'html_output.php');

  
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

// set which precautions should be checked
  define('WARN_INSTALL_EXISTENCE', 'true');
  define('WARN_CONFIG_WRITEABLE', 'true');
  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');
  define('WARN_SESSION_AUTO_START', 'true');
  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');
  
  
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