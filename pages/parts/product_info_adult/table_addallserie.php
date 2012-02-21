<?php 
if ($product_info_values['products_series_id']>0) {
	echo '<table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td align="left">';
	if (tep_session_is_registered('customer_id')) {
		$wl_query = tep_db_query("select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' ");
		$wl = tep_db_fetch_array($wl_query);
		if ($wl['wl_id']>0){
		}else{
          ?>
          </form><form action="addallserietowishlist.php" method="post">
          <input type="hidden" name="series_id" value="<?php  echo $product_info_values['products_series_id']; ?>">
          <input type="hidden" name="products_id" value="<?php  echo $product_info_values['products_id']; ?>">
          <input type="hidden" value="<?php  echo $PHP_SELF."?".$_SERVER['QUERY_STRING']; ?>" name="nexturl">
          <input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ?>/images/buttons/button_addall_serie.gif"></form><form>
          <?php 
		}
    }else{
	  ?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><a href="registerforrent.php?products_id=<?php  echo $product_info_values['products_id']; ?>"><img border="0" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ?>/images/buttons/button_addall_serie.gif"></a>
      <?php 
	}
	echo '</td></tr></table>';

}
?>        
          