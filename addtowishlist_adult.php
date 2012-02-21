<?php

require('configure/application_top.php');
include('includes/functions/isAdult.php'); //BEN001
if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'addtowishlist_adult.php' . '?products_id=' . $HTTP_POST_VARS['products_id']));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}
if(empty($HTTP_POST_VARS['products_id']))
	$HTTP_POST_VARS['products_id']=$HTTP_GET_VARS['products_id'];
if(empty($HTTP_POST_VARS['products_id']))
{
	$origin_href3 = $HTTP_POST_VARS['nexturl'];
	if(!empty($origin_href3))
		tep_redirect($origin_href3, '', 'SSL');
	else
		tep_redirect('mywishlist_adult.php', '', 'SSL');
}
if (isAdult($HTTP_POST_VARS['products_id'])){	//BEN001

        //BEN001 $sql_addtowishlist  = " insert into wishlist_adult select null, c.customers_id, '" . $HTTP_POST_VARS['products_id'] . "', ifnull(w1.rank,0)+1,2, now() ";
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
		$sql_addtowishlist  = " insert into wishlist (customers_id, product_id,rank, priority, date_added,wishlist_type,already_rented,wishlist_source_id) VALUES ";
		$sql_addtowishlist  .= "(".$customer_id.",".$HTTP_POST_VARS['products_id'].",0 ,2 ,now(), 'DVD_ADULT', '".$assigned."','7')";
    tep_db_query($sql_addtowishlist);


		/////////////////////
		///////filter////////
		/////////////////////
		
		$priority='med';	
		
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
	    tep_db_query("insert into " . TABLE_WISHLIST . " (customers_id, product_id, rank, date_added) values ('" . $customer_id . "', '" . $HTTP_POST_VARS['products_id']  . "', '" . $nextrank . "',now() )");
	}
*/	
	
	tep_reorder_wishlist_adult($customer_id);
	$origin_href3 = $HTTP_POST_VARS['nexturl'];
	if(empty($origin_href3))
		$origin_href3 = 'mydvdxpost.php';
	//echo 'from addtowishlist:' . $origin_href3;
	
	require(DIR_WS_INCLUDES . 'stat.php');
	
	tep_redirect($origin_href3, '', 'SSL');
	

}else{
    tep_redirect(tep_href_link('default.php', '', 'SSL'));
}

?>