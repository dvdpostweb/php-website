<?php

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_ADDTOWISHLIST . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if ($HTTP_POST_VARS['count_dvd_to_add'] > 0 ){	
	$cpt=1;
	$query_in ='( ';
	while ($cpt < $HTTP_POST_VARS['count_dvd_to_add']) {
		$query_in .=$HTTP_POST_VARS['pid'.$cpt].' ,';		
		$cpt++;		
	}
	$query_in .=$HTTP_POST_VARS['pid'.$cpt].' )';
	//echo $query_in ;
	$add_all_query = tep_db_query("select products_id ,products_type from products where products_id in ". $query_in ); 
	//echo "<br>select products_id ,products_type from products where products_id in ". $query_in . "<br>";
	while ($aaq = tep_db_fetch_array($add_all_query)){
		$wl_query = tep_db_query("select count(*) as cpt from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = ". $aaq['products_id'] );
		$wl = tep_db_fetch_array($wl_query);
		if ($wl['cpt'] > 0) {
		}else{  
			$maxwl_query = tep_db_query("select max(rank) as maxrank from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
			$maxwl = tep_db_fetch_array($maxwl_query);
			$nextrank = $maxwl['maxrank'] + 1; 
			//echo  $aaq['products_id'] . ' - ';
			tep_db_query("insert into " . TABLE_WISHLIST . " (customers_id, product_id, rank, date_added, wishlist_type) values ('" . $customer_id . "', '" . $aaq['products_id']  . "', '" . $nextrank . "',now(), '" . $aaq['products_type']  . "' )");
		}
	}						
	
require(DIR_WS_INCLUDES . 'stat.php');

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
	
	tep_redirect('mywishlist.php', '', 'SSL');
}
else{
    tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

?>
