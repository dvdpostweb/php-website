<?php 
require('configure/application_top.php');


// **** tradedoubler **** //
 
// Open session for cookie handling 
if (tep_session_is_registered('customer_id') && $customers_registration_step >=80) {
	$customers_query = tep_db_query("SELECT id,customers_id,amount, context from  ogone_check WHERE customers_id ='".$customer_id."' and context='dvdsale'  ORDER BY `id` DESC LIMIT 1");

	$customers_query_values = tep_db_fetch_array($customers_query);
	 
	// Your organization ID 
	$organization = "955387"; 
	 
	// Your checksum code 
	$checksumCode = "2659"; 
	 
	// Value of the sale. 
	// Leave as "0.00" if not applicable. 
	$orderValue = $customers_query_values['amount']/100; 

	// Currency of the sale. 
	$currency = "EUR"; 
	 
	// Event ID 
	
	//shop
	$event = "114720"; 
	 
	// Event type: 
	//     true  = Sale 
	//     false = Lead 
	// 
	$isSale = true; 
	 
	// Encrypted connection on this page: 
	//     true = Yes (https) 
	//     false = No (http) 
	// 
	$isSecure = true; 
	 
	// Here you must specify a unique identifier for the transaction. 
	// For a sale, this is typically the order number. 
	// $customers_id
	$orderNumber = $customers_id.'000'.$customers_query_values['id']; 
	 
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
	 
	//echo "<img src=\"" . $trackBackUrl . "\" alt=\"\" style=\"border: none\" />"; 
}
 

// **** tradedoubler **** //



$current_page_name = 'shopping_complete.php';

//if (!tep_session_is_registered('customer_id')) {
//	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
//	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
//}

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop_public.php'));
}else{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_shop.php'));
}

require('configure/application_bottom.php');

?>