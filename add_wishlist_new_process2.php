<?php 

require('configure/application_top.php');
include('includes/functions/isAdult.php'); //BEN001
if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_ADDTOWISHLIST . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

//BEN001 if ($HTTP_POST_VARS['products_id'] > 40 &&  $HTTP_POST_VARS['products_id']< 10000){	
if (!isAdult($HTTP_POST_VARS['products_id'])){

        //BEN001 $sql_addtowishlist  = " insert into " . TABLE_WISHLIST . " select null, c.customers_id, '" . $HTTP_POST_VARS['products_id'] . "', ifnull(w1.rank,0)+1,2, now() ";
		$sql_addtowishlist  = " insert into " . TABLE_WISHLIST . " select null, c.customers_id, '" . $HTTP_POST_VARS['products_id'] . "', ifnull(w1.rank,0)+1," . $HTTP_POST_VARS['priority'] . ", now(), 'DVD_NORM', 1 "; //BEN001
        $sql_addtowishlist  .= " from " . TABLE_CUSTOMERS . " c";
        $sql_addtowishlist  .= " left join " . TABLE_WISHLIST . " w1 on w1.customers_id=c.customers_id";
        $sql_addtowishlist  .= " left join " . TABLE_WISHLIST . " w2 on w2.product_id='" . $HTTP_POST_VARS['products_id'] . "' and w2.customers_id='" . $customer_id . "' ";
        $sql_addtowishlist  .= " where c.customers_id='" . $customer_id . "' and w2.wl_id is null";
		//$sql_addtowishlist .= " and w1.wishlist_type = 'DVD_NORM' "; //BEN001
        $sql_addtowishlist  .= " order by w1.rank desc limit 1";

        
        tep_db_query($sql_addtowishlist);

//tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_POST_VARS['products_id'] . "' and customers_id= '" . $customer_id . "' ");
        
/*
        //OLD WAY OF DOING IT: CAUSED DUPLICATE ADDITIONS WHEN TWICE A POST IS SUBMITTED
        //BY THE WAY, 3 QUERIES INSTEAD OF 1
	$maxwl_query = tep_db_query("select max(rank) as maxrank from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
	$maxwl = tep_db_fetch_array($maxwl_query);
	$nextrank = $maxwl['maxrank'] + 1; 
	$wl_query = tep_db_query("select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $HTTP_POST_VARS['products_id'] . "' ");
	$wl = tep_db_fetch_array($wl_query);
	if ($wl['product_id'] > 0) {
	}else{  
	    tep_db_query("insert into " . TABLE_WISHLIST . " (customers_id, product_id, rank, date_added,) values ('" . $customer_id . "', '" . $HTTP_POST_VARS['products_id']  . "', '" . $nextrank . "',now() )");
	}
*/	
	

$wlcust_query = tep_db_query("select wishlist_kind from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$wlcust = tep_db_fetch_array($wlcust_query);

switch($wlcust['wishlist_kind']){
	case 1:
		tep_reorder_wishlist($customer_id);
	break;
	case 2:
		tep_reorder_wishlist2($customer_id);
	break;
}

	

	$origin_href3 = $HTTP_POST_VARS['nexturl'];
	//echo 'from addtowishlist:' . $origin_href3;
	
	require(DIR_WS_INCLUDES . 'stat.php');
	
	tep_redirect($origin_href3, '', 'SSL');
	//echo $sql_addtowishlist;

}else{
    tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

?>