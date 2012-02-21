<table width="355" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left_x.gif" width="11" height="20"></td>
    <td width="149" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid_x.gif" class="dvdpost_left_menu_title" align="left"><b><?php  echo TEXT_LAST_DVD_BOUGHT;?></b></td>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right_x.gif" width="11" height="20"></td>
    <td width="173">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right_x.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid_x.gif">&nbsp;</td>
    <td colspan="3">
        
		<table width="100%">
    		<tr>    			
			    <?php 
			    $listing_sql='SELECT COUNT( so.products_id ) , so.products_id, pd.products_name, p.products_new_sale_price, pd.products_image_big';
//BEN001				$listing_sql.=' FROM shopping_orders_new so, products_description_adult pd, products_adult p';
				$listing_sql.=' FROM shopping_orders_new so, products_description pd, products p'; //BEN001
				$listing_sql.=' WHERE so.products_id = pd.products_id AND so.products_id = p.products_id AND p.quantity_new_to_sale > 0';
				$listing_sql.=' and products_type = "DVD_ADULT" '; //BEN001
				$listing_sql.=' GROUP BY so.products_id';
				$listing_sql.=' ORDER BY `COUNT( so.products_id )` DESC LIMIT 7';
				$listing = tep_db_query($listing_sql);
				$i=1;
				while ($product_info_values = tep_db_fetch_array($listing)) {
					if ($i<4){
						echo '<td width="50%" align="center"><table><tr><form name="form1" method="post" action="addtoshoppingcart_new_adult.php">';
						echo '<input name="products_id" type="hidden" value="'.$product_info_values['products_id'].'">';
						echo '<td width="100" height="150" valign="top" colspan="2"><a href="product_info_shop_adult.php?products_id='.$product_info_values['products_id'] .'"><img src="'.$constants['DIR_WS_IMAGESX'].'/'.$product_info_values['products_image_big'].'" border="0" width="100" height="150" alt="'.$product_info_values['products_name'].'"></a></td>';
						echo '</tr><tr><td class="slogan_detail" align="right">'.$product_info_values['products_new_sale_price'].'€</td>';
						echo '<td align="right"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'shop/titlebar/box/add.gif" width="27" height="21" border="0"></td></form></tr></table></td>';
							if ($i==3){echo '</tr></table><table width="100%"><tr>';}
						}else{			
							
					echo '<td width="20%" align="center"><table><tr><form name="form1" method="post" action="addtoshoppingcart_new_adult.php">';
					echo '<td width="67" height="100" valign="top" colspan="2"><a href="product_info_shop_adult.php?products_id='.$product_info_values['products_id'] .'"><img src="'.$constants['DIR_WS_IMAGESX'].'/'.$product_info_values['products_image_big'].'" border="0" width="67" height="100" alt="'.$product_info_values['products_name'].'"></a></td>';
					echo '</tr><tr><td class="slogan_detail" align="right">'.$product_info_values['products_new_sale_price'].'€</td>';
					echo '<td align="right"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'shop/titlebar/box/add.gif" width="27" height="21" border="0"></td></form></tr></table></td>';
					if ($i==7){echo '</tr><tr>';}
					}
					$i++;	
				}			  
			    ?>
	    	</tr>
	    </table>    
    
    
    </td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left_x.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right_x.gif" width="11" height="10"></td>
  </tr>
</table>