<?php
require('configure/application_top.php');

$current_page_name = FILENAME_PRODUCT_REVIEWS_WRITE;

if (!tep_session_is_registered('customer_id')) {
	//$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name));
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => $current_page_name . '?products_id=' . $HTTP_GET_VARS['products_id']));
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
  if (@$HTTP_GET_VARS['action'] == 'process') {
    $customer = tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
    $customer_values = tep_db_fetch_array($customer);
	$imdb_query = tep_db_query("SELECT imdb_id,products_type FROM products WHERE products_id = '".$HTTP_GET_VARS['products_id']."' ");
	$imdb_query_values = tep_db_fetch_array($imdb_query);
    $date_now = date('Ymd');
	tep_rating_review($HTTP_GET_VARS['products_id'],$imdb_query_values['imdb_id'],$HTTP_POST_VARS['rating'],addslashes($customer_values['customers_firstname']). ' ' . addslashes($customer_values['customers_lastname']),$HTTP_POST_VARS['review'],$languages_id,$customer_id);
    // this line works because we requested $format='php' and not some other output format
    // this is your data returned; you could do something more useful here than just echo it
    //echo 'result'.$request.'/'.$format.'?'.$args.' -> '.$response.'.'.$resultsArray['result'];
    tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, $HTTP_POST_VARS['get_params'], 'NONSSL'));
  }
  
if($HTTP_GET_VARS['products_id']< 1){
	tep_redirect(tep_href_link(FILENAME_DEFAULT, '', 'SSL'));	
}

// lets retrieve all $HTTP_GET_VARS keys and values..
  $get_params = tep_get_all_get_params();
  $get_params_back = tep_get_all_get_params(array('reviews_id')); // for back button
  $get_params = substr($get_params, 0, -1); //remove trailing &
  if ($get_params_back != '') {
    $get_params_back = substr($get_params_back, 0, -1); //remove trailing &
  } else {
    $get_params_back = $get_params;
  }

  $product = tep_db_query("select pd.products_name, p.products_image from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . $languages_id . "'");
  $product_info_values = tep_db_fetch_array($product);

  $customer = tep_db_query("select customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
  $customer_values = tep_db_fetch_array($customer);

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;

include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>