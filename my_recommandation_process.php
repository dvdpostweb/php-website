<?php  
require('configure/application_top.php');
if (!tep_session_is_registered('customer_id')) {
   tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','page morte','?','bugreport@dvdpost.be','bugreport@dvdpost.be');
die();
tep_db_query("insert into products_recommandations_control_customers  (customers_id, date_started) values ('" . $customer_id . "', now() ) ");
$insert_id = tep_db_insert_id();

tep_db_query("delete from products_recommandation  where customers_id = '" . $customer_id . "' ");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Rating
tep_db_query("delete from products_recommandation_rating_temp where customers_id = '" . $customer_id . "' ");
tep_db_query("delete from products_recommandation_rating where customers_id = '" . $customer_id . "' ");

$customers_query = tep_db_query("SELECT p.products_id, p.customers_id, c.customers_language, p.products_rating FROM products_rating p left join customers c on p.customers_id = c.customers_id where c.customers_id = '" . $customer_id . "'  and p.products_rating > 2 and p.customers_id > 0 order by p.products_rating desc limit 50");
while ($customers = tep_db_fetch_array($customers_query)) {
	//feesharing
	//$strsql = "SELECT ps.products_id2, ps.correlation from products_similarities ps  left join products p on ps.products_id2 = p.products_id  left join products_uninterested pu on ps.products_id2 = pu.products_id and pu.customers_id = '" . $customer_id . "'  left join wishlist w on ps.products_id2 = w.product_id and w.customers_id = '" . $customer_id . "' left join wishlist_assigned wa on ps.products_id2 = wa.products_id and wa.customers_id = '" . $customer_id . "' left join products_rating pr on ps.products_id2 = pr.products_id and pr.customers_id = '" . $customer_id . "'  WHERE p.products_availability > 1 and (feesharing < 1 or (feesharing > 0 and feesharing_end < now() )) and ps.products_id = '" . $customers['products_id'] . "'  and pu.products_id is null and w.product_id is null and wa.products_id is null and pr.products_id is null";
	//avec le feesharing
	$strsql = "SELECT ps.products_id2, ps.correlation from products_similarities ps  left join products p on ps.products_id2 = p.products_id  left join products_uninterested pu on ps.products_id2 = pu.products_id and pu.customers_id = '" . $customer_id . "'  left join wishlist w on ps.products_id2 = w.product_id and w.customers_id = '" . $customer_id . "' left join wishlist_assigned wa on ps.products_id2 = wa.products_id and wa.customers_id = '" . $customer_id . "' left join products_rating pr on ps.products_id2 = pr.products_id and pr.customers_id = '" . $customer_id . "'  WHERE p.products_availability > 1 and ps.products_id = '" . $customers['products_id'] . "'  and pu.products_id is null and w.product_id is null and wa.products_id is null and pr.products_id is null and p.products_series_aboprocess_number < 2 ";
	switch ($customers['customers_language']){
		case 1:
			$strsql = $strsql . " and p.products_language_fr >0  "; 	
		break;
		case 2:
			$strsql = $strsql . " and p.products_undertitle_nl >0  "; 	
		break;
	}
	$similarities_query = tep_db_query($strsql);
	while ($similarities = tep_db_fetch_array($similarities_query)) {
		tep_db_query("insert into products_recommandation_rating_temp (customers_id, products_id, correlation) values ('" . $customer_id . "', '" . $similarities["products_id2"] . "', '" . $customers["products_rating"] * $similarities["correlation"] . "')");
	}
}
tep_db_query("insert into products_recommandation_rating SELECT prrt.customers_id, prrt.products_id, max(prrt.correlation) FROM products_recommandation_rating_temp prrt left join products_recommandation_rating prr on prrt.products_id = prrt.products_id and prr.customers_id = prrt.customers_id where prrt.customers_id = '" . $customer_id . "' group by prrt.products_id"); 
tep_db_query("delete from products_recommandation_rating_temp where customers_id = '" . $customer_id . "' ");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// review
tep_db_query("delete from products_recommandation_review_temp where customers_id = '" . $customer_id . "' ");
tep_db_query("delete from products_recommandation_review where customers_id = '" . $customer_id . "' ");

$customers_query = tep_db_query("SELECT p.products_id, p.customers_id, c.customers_language, p.reviews_rating FROM reviews p left join customers c on p.customers_id = c.customers_id where c.customers_id = '" . $customer_id . "'  and p.reviews_rating > 2 and p.customers_id > 0 order by p.reviews_rating desc limit 50");
while ($customers = tep_db_fetch_array($customers_query)) {
	$strsql = "SELECT ps.products_id2, ps.correlation from products_similarities ps ";
    $strsql = $strsql . "left join products p on ps.products_id2 = p.products_id ";
    $strsql = $strsql . "left join products_uninterested pu on ps.products_id2 = pu.products_id and pu.customers_id = '" . $customer_id . "' ";
    $strsql = $strsql . "left join wishlist w on ps.products_id2 = w.product_id and w.customers_id = '" . $customer_id . "' ";
    $strsql = $strsql . "left join wishlist_assigned wa on ps.products_id2 = wa.products_id and wa.customers_id = '" . $customer_id . "' ";
    $strsql = $strsql . "left join products_rating pr on ps.products_id2 = pr.products_id and pr.customers_id = '" . $customer_id . "' ";
    //avec ou sans le feesharing
    //$strsql = $strsql . "WHERE p.products_availability > 1 and (feesharing < 1 or (feesharing > 0 and feesharing_end < now() ))  and ps.products_id = '" . $customers['products_id'] . "' ";
	$strsql = $strsql . "WHERE p.products_availability > 1 and ps.products_id = '" . $customers['products_id'] . "' ";
    $strsql = $strsql . "and pu.products_id is null ";
    $strsql = $strsql . "and w.product_id is null and wa.products_id is null and pr.products_id is null  and p.products_series_aboprocess_number < 2 ";
	switch ($customers['customers_language']){
		case 1:
			$strsql = $strsql . " and p.products_language_fr >0  "; 	
		break;
		case 2:
			$strsql = $strsql . " and p.products_undertitle_nl >0  "; 	
		break;
	}
	$similarities_query = tep_db_query($strsql);
	while ($similarities = tep_db_fetch_array($similarities_query)) {
		tep_db_query("insert into products_recommandation_review_temp (customers_id, products_id, correlation) values ('" . $customer_id . "', '" . $similarities["products_id2"] . "', '" . $customers["reviews_rating"] * $similarities["correlation"] . "')");
	}
}
tep_db_query("insert into products_recommandation_review SELECT prrt.customers_id, prrt.products_id, max(prrt.correlation) FROM products_recommandation_review_temp prrt left join products_recommandation_review prr on prrt.products_id = prrt.products_id and prr.customers_id = prrt.customers_id where prrt.customers_id = '" . $customer_id . "' group by prrt.products_id"); 
tep_db_query("delete from products_recommandation_review_temp where customers_id = '" . $customer_id . "' ");

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// rentals
tep_db_query("delete from products_recommandation_rentals_temp where customers_id = '" . $customer_id . "' ");
tep_db_query("delete from products_recommandation_rentals where customers_id = '" . $customer_id . "' ");

$customers_query = tep_db_query("SELECT w.products_id, w.customers_id, w.rank, c.customers_language FROM wishlist_assigned w  left join customers c on w.customers_id = c.customers_id  where w.customers_id = '" . $customer_id . "' order by w.rank limit 50");
while ($customers = tep_db_fetch_array($customers_query)) {
	//feesharing
	//$strsql = "SELECT ps.products_id2, ps.correlation from products_similarities ps  left join products p on ps.products_id2 = p.products_id  left join products_uninterested pu on ps.products_id2 = pu.products_id and pu.customers_id = '" . $customer_id . "'  left join wishlist w on ps.products_id2 = w.product_id and w.customers_id = '" . $customer_id . "' left join wishlist_assigned wa on ps.products_id2 = wa.products_id and wa.customers_id = '" . $customer_id . "' left join products_rating pr on ps.products_id2 = pr.products_id and pr.customers_id = '" . $customer_id . "' WHERE p.products_availability > 1 and (feesharing < 1 or (feesharing > 0 and feesharing_end < now() ))  and ps.products_id = '" . $customers['products_id'] . "' and pu.products_id is null and w.product_id is null and wa.products_id is null and pr.products_id is null";
	$strsql = "SELECT ps.products_id2, ps.correlation from products_similarities ps  left join products p on ps.products_id2 = p.products_id  left join products_uninterested pu on ps.products_id2 = pu.products_id and pu.customers_id = '" . $customer_id . "'  left join wishlist w on ps.products_id2 = w.product_id and w.customers_id = '" . $customer_id . "' left join wishlist_assigned wa on ps.products_id2 = wa.products_id and wa.customers_id = '" . $customer_id . "' left join products_rating pr on ps.products_id2 = pr.products_id and pr.customers_id = '" . $customer_id . "' WHERE p.products_availability > 1  and ps.products_id = '" . $customers['products_id'] . "' and pu.products_id is null and w.product_id is null and wa.products_id is null and pr.products_id is null   and p.products_series_aboprocess_number < 2 ";
	switch ($customers['customers_language']){
		case 1:
			$strsql = $strsql . " and p.products_language_fr >0  "; 	
		break;
		case 2:
			$strsql = $strsql . " and p.products_undertitle_nl >0  "; 	
		break;
	}
	$similarities_query = tep_db_query($strsql);
	while ($similarities = tep_db_fetch_array($similarities_query)) {
		tep_db_query("insert into products_recommandation_rentals_temp (customers_id, products_id, correlation) values ('" . $customer_id . "', '" . $similarities["products_id2"] . "', '" . 4 * $similarities["correlation"] . "')");
	}
}
tep_db_query("insert into products_recommandation_rentals SELECT prrt.customers_id, prrt.products_id, max(prrt.correlation) FROM products_recommandation_rentals_temp prrt left join products_recommandation_rentals prr on prrt.products_id = prr.products_id and prrt.customers_id = prr.customers_id where prrt.customers_id = '" . $customer_id . "' group by prrt.products_id"); 
tep_db_query("delete from products_recommandation_rentals_temp where customers_id = '" . $customer_id . "' ");




//all
tep_db_query("delete from products_recommandation__temp where customers_id = '" . $customer_id . "' ");

tep_db_query("insert into products_recommandation__temp (customers_id  , products_id, correlation, context) select prr.customers_id  , prr.products_id, prr.correlation, 1 from products_recommandation_rating  prr left join products_recommandation__temp prt on prr.products_id = prt.products_id AND prt.customers_id = prr.customers_id where prt.products_id is null and prr.customers_id =  '" . $customer_id . "' order by prr.correlation desc limit 100 ");
tep_db_query("insert into products_recommandation__temp (customers_id  , products_id, correlation, context) select prr.customers_id  , prr.products_id, prr.correlation, 2 from products_recommandation_review  prr left join products_recommandation__temp prt on prr.products_id = prt.products_id AND prt.customers_id = prr.customers_id where prt.products_id is null and prr.customers_id =  '" . $customer_id . "' order by prr.correlation desc limit 100 ");
tep_db_query("insert into products_recommandation__temp (customers_id  , products_id, correlation, context) select prr.customers_id  , prr.products_id, prr.correlation, 3 from products_recommandation_rentals prr left join products_recommandation__temp prt on prr.products_id = prt.products_id and prt.customers_id = prr.customers_id where prt.products_id is null and prr.customers_id =  '" . $customer_id . "' order by prr.correlation desc limit 100 ");

tep_db_query("insert into products_recommandation (customers_id, products_id , correlation, context) select prt.customers_id, prt.products_id , prt.correlation, prt.context  from products_recommandation__temp prt left join products_recommandation pr on prt.products_id = prt.products_id and pr.customers_id = prt.customers_id where pr.products_id is null and prt.customers_id = '" . $customer_id . "' ");
tep_db_query("delete from products_recommandation__temp where customers_id = '" . $customer_id . "' ");

tep_db_query("update products_recommandations_control_customers set date_finished = now() where products_recommandations_control_customers_id = '" . $insert_id . "' ");

require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('my_recommandation.php', '', 'SSL'));
?>