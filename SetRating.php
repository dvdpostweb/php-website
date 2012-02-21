<?php
require('configure/application_top.php');
if(empty($HTTP_GET_VARS['lang']))
	$HTTP_GET_VARS['lang']='fr';

if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
	$imdb_query = tep_db_query("SELECT imdb_id,products_type FROM products WHERE products_id = '".$HTTP_GET_VARS['movieid']."' ");
	$imdb_query_values = tep_db_fetch_array($imdb_query);
	
	tep_rating_filter($HTTP_GET_VARS['movieid'],$imdb_query_values['imdb_id'],$HTTP_GET_VARS['value'],$HTTP_GET_VARS['lang'],$customer_id,'DVD_NORM');
	//tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_GET_VARS['movieid'] . "' and customers_id= '" . $customer_id . "' ");
	
	tep_redirect($HTTP_GET_VARS['url']);

}
  require(DIR_WS_INCLUDES . 'stat.php');

?>
