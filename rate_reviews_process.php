<?php 
//modifie la pertinence d'une critique.
//JSP001

require('configure/application_top.php');


if (!tep_session_is_registered('customer_id')) {
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}else{
	$sql='select * from reviews_rating where reviews_id= '.$HTTP_GET_VARS['reviews'].' and  customers_id='. $customer_id;
	$query=tep_db_query($sql);
	if(!tep_db_fetch_array($query)){
		tep_db_query("insert into reviews_rating (reviews_id , customers_id, reviews_interesting ) values ('" . $HTTP_GET_VARS['reviews'] . "', '" . $customer_id . "' , '" . $HTTP_GET_VARS['rate'] . "') ");
		if ($HTTP_GET_VARS['rate']>0){
			tep_db_query("Update reviews set customers_best_rating=customers_best_rating+1 where reviews_id='".$HTTP_GET_VARS['reviews']."' ");
		}else{
			tep_db_query("Update reviews set customers_bad_rating=customers_bad_rating+1 where reviews_id='".$HTTP_GET_VARS['reviews']."' ");
		}
	}
	if(!empty($_GET['url']))
	{
		$url=$_GET['url'];
	}
	else if (!empty($HTTP_REFERER))
	{
		$url=$HTTP_REFERER;
	}
	else
	{
		$url="mydvdpost.php";
	}
	tep_redirect($url);

}
 

?>
