<?php

require('configure/application_top.php');
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
if(empty($customer_id))
	$customer_id=$_SESSION['customer_id'];
if(empty($customer_id))
	$customer_id=$_COOKIE['customers_id'];

function addToFilter($product_id,$customer_id,$lang){
	$request =  'http://partners.thefilter.com/DVDPostService';
	$format = 'CaptureService.ashx';   // this can be xml, json, html, or php
	$args .= 'cmd=AddEvidence';
	$args .= '&catalogId='.$product_id;
	$args .= '&eventType=buy';
	$args .= '&userId='.$customer_id;
	$args .= '&userLanguage='.$lang;
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
}
if (!tep_session_is_registered('customer_id')) {
    //$navigation->set_snapshot(array('mode' => 'SSL', 'page' => 'addtoshoppingcart.php' . '?products_id=' . $HTTP_GET_VARS['products_id']));
    //tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  
    $cart = $_SESSION['cart'];
    $cart_box = $_SESSION['cart_box'];
    
    //Shopping bag products_id
    if ($HTTP_POST_VARS['products_id']>0){
		if ($cart) {
			$cart .= ','.$HTTP_POST_VARS['products_id'];
		} else {
			$cart = $HTTP_POST_VARS['products_id'];
		}
	}
	
	//Shopping bag box_id
	if ($HTTP_POST_VARS['shopping_box_id']>0){
			if ($cart_box) {
				$cart_box .= ','.$HTTP_POST_VARS['shopping_box_id'];
			} else {
				$cart_box = $HTTP_POST_VARS['shopping_box_id'];
			}
	}
	
	$_SESSION['cart_box'] = $cart_box;
	$_SESSION['cart'] = $cart;
    
}else{
//post ou get
if ($HTTP_POST_VARS['products_id'] > 0 ) {
	$products_query = tep_db_query("select * from products where products_id = '" . $HTTP_POST_VARS['products_id'] . "' ");
	$products = tep_db_fetch_array($products_query);
	
	$shopping_cart_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and products_id = '" . $HTTP_POST_VARS['products_id'] . "' ");
	$shopping_cart = tep_db_fetch_array($shopping_cart_query);
	if ($shopping_cart['shopping_cart_id']>0){
	}else{
	tep_db_query(" insert into shopping_cart (customers_id, products_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $HTTP_POST_VARS['products_id'] . "', 1,'" . $products['products_sale_price'] . "',now() ) ");
	addToFilter($HTTP_POST_VARS['products_id'],$customer_id,$lang);
	
	}
	
}else{
	if ($HTTP_GET_VARS['products_id'] > 0 ) {
		$products_query = tep_db_query("select * from products where products_id = '" . $HTTP_GET_VARS['products_id'] . "' ");
		$products = tep_db_fetch_array($products_query);
		
		$shopping_cart_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and products_id = '" . $HTTP_GET_VARS['products_id'] . "' ");
		$shopping_cart = tep_db_fetch_array($shopping_cart_query);
		if ($shopping_cart['shopping_cart_id']>0){
		}else{
		tep_db_query(" insert into shopping_cart (customers_id, products_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $HTTP_GET_VARS['products_id'] . "', 1,'" . $products['products_sale_price'] . "',now() ) ");
		addToFilter($HTTP_GET_VARS['products_id'],$customer_id,$lang);
		}		
	}
}


if ($HTTP_POST_VARS['shopping_box_id'] > 0 ) {
	$shopping_box_query = tep_db_query("select * from shopping_box where shopping_box_id = '" . $HTTP_POST_VARS['shopping_box_id'] . "' ");
	$shopping_box = tep_db_fetch_array($shopping_box_query);
	
	$shopping_cart_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and shopping_box_id = '" . $HTTP_POST_VARS['shopping_box_id'] . "' ");
	$shopping_cart = tep_db_fetch_array($shopping_cart_query);
	if ($shopping_cart['shopping_cart_id']>0){
	}else{
	tep_db_query(" insert into shopping_cart (customers_id, shopping_box_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $HTTP_POST_VARS['shopping_box_id'] . "', 1,'" . $shopping_box['sale_price'] . "',now() ) ");
	addToFilter($HTTP_POST_VARS['shopping_box_id'],$customer_id,$lang);
	}
	
}else{
	if ($HTTP_GET_VARS['shopping_box_id'] > 0 ) {
		$shopping_box_query = tep_db_query("select * from shopping_box where shopping_box_id = '" . $HTTP_GET_VARS['shopping_box_id'] . "' ");
		$shopping_box = tep_db_fetch_array($shopping_box_query);
		
		$shopping_cart_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and shopping_box_id = '" . $HTTP_GET_VARS['shopping_box_id'] . "' ");
		$shopping_cart = tep_db_fetch_array($shopping_cart_query);
		if ($shopping_cart['shopping_cart_id']>0){
		}else{
		tep_db_query(" insert into shopping_cart (customers_id, shopping_box_id, quantity, price, date_added) values ('" . $customer_id. "' , '" . $HTTP_GET_VARS['shopping_box_id'] . "', 1,'" . $shopping_box['sale_price'] . "',now() ) ");
		addToFilter($HTTP_GET_VARS['shopping_box_id'],$customer_id,$lang);
		}
	}
}
}



require(DIR_WS_INCLUDES . 'stat.php');

tep_redirect(tep_href_link('shopping_cart_public.php', '', 'SSL'));


?>