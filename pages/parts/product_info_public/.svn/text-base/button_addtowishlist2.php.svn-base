<?php 
$my_products_name = $product_info_values['products_name'];
$my_products_price = $product_info_values['products_price'];
$my_specials_new_products_price = tep_get_products_special_price($product_info_values['products_id']);
$my_products_quantity = tep_get_products_stock($product_info_values['products_id']);
$the_text= tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART);

$navigation->set_snapshot();

if (tep_session_is_registered('customer_id')) {
    $wl_query = tep_db_query("select count(*) total from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' ");
    $wl = tep_db_fetch_array($wl_query);
    if ($wl['total']>0){
        echo '<td align="right" valign="middle"><img align="absmiddle" border="0" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/alreadyinwl2.gif"></td>';
    }else{
       	echo '<form action="addtowishlist.php" method="post"><td align="right" valign="middle"><input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"><td></form>';
    }
}else{
  echo '<td align="right" valign="middle"><a href="registerforrent.php?products_id=' . $product_info_values["products_id"] . '"><img border="0" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"></a><td>';
}
?>
