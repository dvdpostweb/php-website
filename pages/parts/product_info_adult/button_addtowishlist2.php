<?php 
$my_products_name = $product_info_values['products_name'];
$my_products_price = $product_info_values['products_price'];
$my_specials_new_products_price = tep_get_products_special_price($product_info_values['products_id']);
$my_products_quantity = tep_get_products_stock($product_info_values['products_id']);
$the_text= tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART);

$navigation->set_snapshot();
$url=$_SERVER['PHP_SELF'];

$url=$url. '?' . $_SERVER['QUERY_STRING'].'#link'.$url_count;
if (tep_session_is_registered('customer_id')) {
    //BEN001 $wl_query = tep_db_query("select count(*) total from wishlist_adult where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' ");
	$wl_query = tep_db_query("select count(*) total from wishlist where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' "); //BEN001 
    $wl = tep_db_fetch_array($wl_query);
    if ($wl['total']>0){
       echo '<span class="TYPO_STD_BLACK_bold">'.TEXT_ALW.'</span>';
    }else{
		if ($product_info_values['only_for_sale'] < 1 ){
	       	echo '<form action="addtowishlist_adult.php" method="post"><td align="right" valign="middle"><input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' .$url . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"><td></form>';
		}else{
			echo '<span class="TYPO_STD_BLACK_bold"><font color="red">'.TEXT_ONLY_FOR_SALE.'</font></span>' ;
		}
    }
}else{
  echo '<a href="registerforrent_adult.php?products_id=' . $product_info_values["products_id"] . '"><img border="0" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"></a>';
}
?>
