<?php 

require('configure/application_top.php');
include('includes/functions/isAdult.php'); //BEN001
if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'add_wishlist_new_process.php' . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if(empty($HTTP_POST_VARS['products_id']))
	$HTTP_POST_VARS['products_id']=$HTTP_GET_VARS['products_id'];
if(empty($HTTP_POST_VARS['priority']))
	$HTTP_POST_VARS['priority']=2;
if(empty($HTTP_POST_VARS['products_id']))
{
	$origin_href3 = $HTTP_POST_VARS['nexturl'];
	if(!empty($origin_href3))
		tep_redirect($origin_href3, '', 'SSL');
	else
		tep_redirect('mywishlist.php', '', 'SSL');
}
//BEN001 if ($HTTP_POST_VARS['products_id'] > 40 &&  $HTTP_POST_VARS['products_id']< 10000){	
if (!isAdult($HTTP_POST_VARS['products_id'])){

        //BEN001 $sql_addtowishlist  = " insert into " . TABLE_WISHLIST . " select null, c.customers_id, '" . $HTTP_POST_VARS['products_id'] . "', ifnull(w1.rank,0)+1,2, now() ";`
		//if dvd already assigned
		$sql_assigned='select * from wishlist_assigned where products_id='.$HTTP_POST_VARS['products_id'].' and customers_id ='.$customer_id;
		
		$query_assigned=tep_db_query($sql_assigned);
		
		
		if(tep_db_num_rows($query_assigned) != 0)
		{
			$assigned="YES";
		}
		else
		{
			$assigned="NO";
		}
		
		$sql_addtowishlist  = " insert into " . TABLE_WISHLIST . " select null, c.customers_id, '" . $HTTP_POST_VARS['products_id'] . "', ifnull(w1.rank,0)+1," . $HTTP_POST_VARS['priority'] . ", now(), 'DVD_NORM', 1,'".$assigned."'"; //BEN001
        $sql_addtowishlist  .= " from " . TABLE_CUSTOMERS . " c";
        $sql_addtowishlist  .= " left join " . TABLE_WISHLIST . " w1 on w1.customers_id=c.customers_id";
        $sql_addtowishlist  .= " left join " . TABLE_WISHLIST . " w2 on w2.product_id='" . $HTTP_POST_VARS['products_id'] . "' and w2.customers_id='" . $customer_id . "' ";
        $sql_addtowishlist  .= " where c.customers_id='" . $customer_id . "' and w2.wl_id is null";
		//$sql_addtowishlist .= " and w1.wishlist_type = 'DVD_NORM' "; //BEN001
        $sql_addtowishlist  .= " order by w1.rank desc limit 1";

     //   echo $sql_addtowishlist;
        tep_db_query($sql_addtowishlist);

		//tep_db_query("delete from  products_recommandation where  products_id = '" . $HTTP_POST_VARS['products_id'] . "' and customers_id= '" . $customer_id . "' ");
		/////////////////////
		///////filter////////
		/////////////////////
		switch($HTTP_POST_VARS['priority']){
			case 1:
				$priority='high';
				break;
			case 2:
				$priority='med';	
				break;
			case 3 :
				$priority='low';	
				break;
			default:
				$priority='med';	
				break;
		}
		switch($languages_id){
			case 1:
				$lang='FR';
			break;
			case 2:
				$lang='NL';
			break;
			case 3:
				$lang='EN';
			break;
		}
		$request =  'http://partners.thefilter.com/DVDPostService';
		$format = 'CaptureService.ashx';   // this can be xml, json, html, or php
		$args .= 'cmd=AddEvidence';
		$args .= '&catalogId='.$HTTP_POST_VARS['products_id'];
		$args .= '&eventType=AddToWishlist';
		$args .= '&userId='.$customer_id;
		$args .= '&userLanguage='.$lang;
		$args .= '&priority='.$priority;
		$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
		
	    // Get and config the curl session object
	    $session = curl_init($request.'/'.$format.'?'.$args);
	    curl_setopt($session, CURLOPT_HEADER, false);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		    //execute the request and close
	    $response = curl_exec($session);
	    curl_close($session);
	    // this line works because we requested $format='php' and not some other output format
	    // this is your data returned; you could do something more useful here than just echo it
	    //echo 'result'.$request.'/'.$format.'?'.$args.' -> '.$response;
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
	if(!empty($origin_href3))
		tep_redirect($origin_href3, '', 'SSL');
	else
		tep_redirect('mywishlist.php', '', 'SSL');
	//echo $sql_addtowishlist;

}else{
    tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

?>