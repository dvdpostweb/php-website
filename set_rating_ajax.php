<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require('configure/application_top.php');
$current_page_name = FILENAME_PRODUCT_INFO;
include(DIR_WS_INCLUDES . 'translation.php');
if(empty($HTTP_GET_VARS['movieid']))
	die();
if($HTTP_GET_VARS['type']=='adult')
 include(DIR_WS_COMMON .'pages/parts/product_info_adult/query_productsid_info.php');
else
 include(DIR_WS_COMMON .'pages/parts/product_info/query_productsid_info.php');

 $product_info_values = tep_db_fetch_array($product_info);
if (!tep_session_is_registered('customer_id')) {
	//tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
	//echo 'not ok';
}else{
	if(empty($customer_id))
		$customer_id=$_SESSION['customer_id'];
	if(empty($customer_id))
		$customer_id=$_COOKIE['customers_id'];
	
	$imdb_query = tep_db_query("SELECT imdb_id,products_type FROM products WHERE products_id = '".$HTTP_GET_VARS['movieid']."' ");
	$imdb_query_values = tep_db_fetch_array($imdb_query);
	tep_rating($HTTP_GET_VARS['movieid'],$imdb_query_values['imdb_id'],$HTTP_GET_VARS['value'],$customer_id);
	
	//tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_GET_VARS['movieid'] . "' and customers_id= '" . $customer_id . "' ");
	
	//tep_redirect($HTTP_GET_VARS['url']);

}
  if($HTTP_GET_VARS['type']=='adult')
	include(DIR_WS_COMMON . 'pages/parts/product_info_adult/table_average_ranking.php'); 
  else
	include(DIR_WS_COMMON . 'pages/parts/product_info/table_average_ranking.php'); 	
?>
