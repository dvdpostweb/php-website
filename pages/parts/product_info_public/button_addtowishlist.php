<table width="200" border="0" align="center" cellpadding="0" cellspacing="0" >
<?php 
$my_products_name = $product_info_values['products_name'];
$my_products_price = $product_info_values['products_price'];
$my_specials_new_products_price = tep_get_products_special_price($product_info_values['products_id']);
$my_products_quantity = tep_get_products_stock($product_info_values['products_id']);
$the_text= tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART);

$navigation->set_snapshot();
      ?>
	  <tr align="center" valign="middle">
        <td height="40" align="center" valign="top" class="TYPO_STD_BLACK_bold">
		<?php  
		 echo TEXT_DISPONIBILITY; 
		?>
		</td>
		<td height="40" align="center" valign="top" class="TYPO_STD_BLACK_bold">
		<?php  
		 echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
		?>
		</td>
	  </tr>
	  <tr valign="top" align="center">
        <td height="28" colspan="2" align="center">
<?php 
if (tep_session_is_registered('customer_id')) {
    $wl_query = tep_db_query("select count(*) total from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' ");
    $wl = tep_db_fetch_array($wl_query);
    if ($wl['total']>0){
        echo '<img border="0" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/alreadyinwl.gif">';
    }else{
       	echo '<form action="addtowishlist.php"  method="post"><input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_buy_now.gif"></form>';
    }
}else{
	echo '<a href="registerforrent.php?products_id=' . $product_info_values["products_id"] . '"><img border="0" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_buy_now.gif"></a>';
	 }
?>
	</td>
</tr>

<?php 
if ($product_info_values['products_availability'] < 2 and $product_info_values['products_next'] < 1){
  	echo '<br><font class="TYPO_STD_BLACK_bold" color= red><b>' . TEXT_NOTAVAIL . '</b></font>';
}

echo '<br><div style="padding-top:5px;padding-bottom:5px;font-size:12">';

echo '</div>'
?>
</table>
