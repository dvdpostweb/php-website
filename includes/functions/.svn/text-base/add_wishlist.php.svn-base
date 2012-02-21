<?php 
function add_wishlist($products_id , $customers_id, $language,$self, $query_string, $align,$date=0) {
	$wl_query = tep_db_query("select count(*) total from wishlist where customers_id = '" . $customers_id . "' and product_id = '" . $products_id . "' ");
    $wl = tep_db_fetch_array($wl_query);
	
	$p_name_query = tep_db_query("select products_title from products where products_id = '" . $products_id . "' ");
    $pname = tep_db_fetch_array($p_name_query);
	
	
    if ($wl['total']>0){
        echo '<td align="'.$align.'" valign="middle" class="TYPO_STD_BLACK_bold ">'.TEXT_ALW;
    }else{
		if ($customer_id != 109576){
			echo '<td align="'.$align.'" valign="middle"><a href="add_wishlist_new.php?products_id='.$products_id.((!empty($date))?'&date='.$date:'').'" rel="ibox2&amp;width=470&amp;height=350" title="'.$pname['products_title'].'"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif" border="0"></a></td>';
		}else{
				echo '<form action="addtowishlist.php" method="post"><td align="'.$align.'" valign="middle"><input type="hidden" name="products_id" value="' . $products_id . '"><input type="hidden" value="' . $self. '?' . $query_string . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"><td></form>';
		}  
       	
	}    
}   
?>