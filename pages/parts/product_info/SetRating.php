<?php
require('configure/application_top.php');


if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
	$imdb_query = tep_db_query("SELECT imdb_id FROM products WHERE products_id = '".$HTTP_GET_VARS['movieid']."' ");
	$imdb_query_values = tep_db_fetch_array($imdb_query);
	
	tep_db_query("insert into products_rating (products_id ,  products_rating, products_rating_date , customers_id,  rating_type imdb_id ,) values ('". $HTTP_GET_VARS[movieid] ."' ,'" . $HTTP_GET_VARS[value] . "', now(), '" . $customer_id . "' , 'DVD_NORM' ,'".$imdb_query_values[imdb_id]."') ");
	tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_GET_VARS['movieid'] . "' and customers_id= '" . $customer_id . "' ");
	
	tep_redirect($HTTP_GET_VARS['url']);

}
  require(DIR_WS_INCLUDES . 'stat.php');

?>
