<table width="540" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left.gif" width="11" height="20"></td>
    <td width="149" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid.gif" class="dvdpost_left_menu_title_shop" align="left"><b><?php  echo TEXT_DVD_LIMITED;?></b></td>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right.gif" width="11" height="20"></td>
    <td width="378">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid.gif">&nbsp;</td>
    <td colspan="3">
    	<table width="100%">
    		<tr>    			
			    <?php 
				$listing_sql='SELECT p.products_id , pd. products_name , pd.products_image_big ,p.products_sale_price ';
				$listing_sql.=' FROM  products p ,  products_description pd ';
				$listing_sql.='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and quantity_to_sale<5  and pd.language_id=' . $languages_id ;
				switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
					break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
					case 3:
					break;
					}
				
				$listing_sql.=' ORDER BY RAND() LIMIT 10 ';
				$listing = tep_db_query($listing_sql);
				$i=1;
				while ($product_info_values = tep_db_fetch_array($listing)) {
					echo '<td width="20%" align="center"><table><tr><form name="form1" method="post" action="addtoshoppingcart_public.php">';
					echo '<input name="products_id" type="hidden" value="'.$product_info_values['products_id'].'">';
					echo '<td width="100" height="150" valign="top" colspan="2"><a href="product_info_shop_public.php?products_id='.$product_info_values['products_id'] .'"><img src="'.$constants['DIR_DVD_WS_IMAGES'].$product_info_values['products_image_big'].'" border="0" width="100" height="150" alt="'.$product_info_values['products_name'].'" title="'.$product_info_values['products_name'].'"></a></td>';
					echo '</tr><tr><td class="slogan_detail" align="right">'.$product_info_values['products_sale_price'].'�</td>';
					echo '<td align="right"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'shop/titlebar/box/add.gif" width="27" height="21" border="0"></td></form></tr></table></td>';
					if ($i==5){echo '</tr><tr><td colspan="5" height="20">&nbsp;</td><tr>';}
					$i++;
	
				}				  
			    ?>
	    	</tr>
	    </table>
	    <br>
		<div align="right"><a href="shop_listing_public.php?lim=1" class="red_slogan"><?php  echo TEXT_SEE_ALL ;?></a></div>
    </td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right.gif" width="11" height="10"></td>
  </tr>
</table>