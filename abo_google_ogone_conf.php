<?php  
$memcache_available=true; 
require('configure/application_top.php');

$current_page_name = FILENAME_MYDVDPOST;
$metriweb_tag='ok';
$mouchard_msn='ok';


	$customers_query = tep_db_query("select *, now() as ajd from customers where customers_id = " . $customer_id );
	$customers_values = tep_db_fetch_array($customers_query);
	$customers_val=$customers_values;
	$customers_id=$customer_id;

//update du step 
//BYPASS page MOUCHARD ogone
if ($customers_values['customers_registration_step']==95){	
    tep_db_query("update customers set customers_registration_step =100 where customers_id = '" . $customers_id . "'");
    setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
}


$customers_language_query = tep_db_query("select customers_language from customers where customers_id   = '" . $customers_id . "' ");
$customers_language = tep_db_fetch_array($customers_language_query);
if ($customers_language['customers_language']==0){
  $lang_id = $HTTP_COOKIE_VARS['language_id'];
  if($lang_id != 1 && $lang_id != 2 && $lang_id != 3)
  {
    $lang_id = 1;
  }
  tep_db_query("update customers set customers_language = '".$lang_id."' where customers_id = '" . $customers_id . "'");
}
	
// $customers_registration_step=100;
// if ($customers_registration_step<100){
// 	tep_redirect(tep_href_link('index.php'));	
// 	}	

	
// **** tradedoubler **** //
 
// Open session for cookie handling 
if (tep_session_is_registered('customer_id') && $customers_registration_step >=95) {
	$customers_query = tep_db_query("SELECT c.customers_id,c.customers_abo_type, p.products_price from customers c LEFT JOIN products p on p.products_id=c.customers_abo_type  WHERE  c.customers_id ='".$customer_id."'");

	$customers_query_values = tep_db_fetch_array($customers_query);
	 
	// Your organization ID 
	$organization = "955387"; 
	 
	// Your checksum code 
	$checksumCode = "2659"; 
	 
	// Value of the sale. 
	// Leave as "0.00" if not applicable. 
	$orderValue = $customers_query_values['products_price']; 

	// Currency of the sale. 
	$currency = "EUR"; 
	 
	// Event ID 
	
	switch ($customers_query_values['customers_abo_type']){
		//limited2
		case 17:
			$event="114722";
			break;
		//limited4
		case 18:
			$event="114724";
			break;
		//limited8
		case 20:
			$event="114726";
			break;
		//limited12
		case 22:
			$event="114728";
			break;
		//limited16
		case 24:
			$event="114730";
			break;
	}
	
	//shop
	//$event = "114720"; 
	 
	// Event type: 
	//     true  = Sale 
	//     false = Lead 
	// 
	$isSale = false; 
	 
	// Encrypted connection on this page: 
	//     true = Yes (https) 
	//     false = No (http) 
	// 
	$isSecure = true; 
	 
	// Here you must specify a unique identifier for the transaction. 
	// For a sale, this is typically the order number. 
	// $customers_id
	$orderNumber = $customers_id; 
	 
	// If you do not use the built-in session functionality in PHP, modify 
	// the following expressions to work with your session handling routines. 
	// 
	$tduid = ""; 
	if (!empty($_SESSION["TRADEDOUBLER"])) 
	 $tduid = $_SESSION["TRADEDOUBLER"]; 
	 
	// OPTIONAL: You may transmit a list of items ordered in the reportInfo  
	// parameter. See the chapter reportInfo for details. 
	// 
	$reportInfo = ""; 
	$reportInfo = urlencode($reportInfo); 
	 
	 
	/***** IMPORTANT:                                                    *****/ 
	/***** In most cases, you should not edit anything below this line.  *****/ 
	/***** Please consult with TradeDoubler before modifying the code.   *****/ 
	 
	
	if (!empty($_COOKIE["TRADEDOUBLER"])) 
	 $tduid = $_COOKIE["TRADEDOUBLER"]; 
	 
	if ($isSale) 
	{ 
	 $domain = "tbs.tradedoubler.com"; 
	 $checkNumberName = "orderNumber"; 
	} 
	else 
	{ 
	 $domain = "tbl.tradedoubler.com"; 
	 $checkNumberName = "leadNumber"; 
	 $orderValue = "1"; 
	} 
	 
	$checksum = "v04" . md5($checksumCode . $orderNumber . $orderValue); 
	 
	if ($isSecure) 
	 $scheme = "https"; 
	else 
	 $scheme = "http"; 
	 
	$trackBackUrl = $scheme . "://" . $domain . "/report" 
	              . "?organization="                 . $organization 
	              . "&amp;event="                    . $event 
	              . "&amp;" . $checkNumberName . "=" . $orderNumber 
	              . "&amp;checksum="                 . $checksum 
	              . "&amp;tduid="                    . $tduid 
	              . "&amp;reportInfo="               . $reportInfo; 
	 
	if ($isSale) 
	{ 
	 $trackBackUrl 
	     .= "&amp;orderValue=" . $orderValue 
	     .  "&amp;currency="   . $currency; 
	} 
	 
//	echo "<img src=\"" . $trackBackUrl . "\" alt=\"\" style=\"border: none\" />"; 
	
}
 
// oridian and dailymotion tracking //

$oridian_code = "<img src=\"http://ad.adserverplus.com/pixel?id=287497&t=2\" width=\"1\" height=\"1\" />";
$dailymotion_code = "<img src=\"http://mc.dailymotion.com/2/dailymotion/pixels/dvdpost@Middle\" alt=\"\">\n<img src=\"http://www.dailymotion.com/masscast/RealMedia/ads/cap.cgi?c=dvdpost\">";

// **** tradedoubler **** //


include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>
