<?php 
$navigation->set_snapshot();

    $to_sale_sql='SELECT quantity_to_sale,products_sale_price FROM  products WHERE products_id='. $HTTP_GET_VARS['products_id'] .' ';
	switch ($languages_id){
		case 1:
			$lto_sale_sql.= ' and products_language_fr >0 ';
		break;
		case 2:
			$to_sale_sql.= ' and products_undertitle_nl >0 ';
		break;
		case 3:
		break;
		}
    $to_sale = tep_db_query($to_sale_sql);
    $to_sale_values = tep_db_fetch_array($to_sale);
	if ($to_sale_values['quantity_to_sale'] >0 ) {?>
	<table align="left">
	<tr>
		<td class="TYPO_STD_BLACK" align="center"><b> 
			<?php 
			$DVDP_price = TEXT_DVDPOST_EXRENTAL_PRICE;
			$DVDP_price = str_replace('µµµpriceµµµ',  $to_sale_values['products_sale_price'] , $DVDP_price);
			echo $DVDP_price;
			?></b>
		</td>
	</tr>  
	<tr>
		<td  align="left" valign="middle" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3" align="absmiddle">
      		<a href="addtoshoppingcart_public.php?products_id=<?php  echo $product_info_values['products_id'];?>" class="basiclink"><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/buy-it_now.gif" border=0>'; ?></a>
		</td>
  	  </tr>
	  <tr>
	    <td align="center" height="20">
			<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3" align="absmiddle">
			<u><a href="dvdforsale_listing_public.php" target="_self" class="red_basiclink"><?php  echo TEXT_SEE_ALL_DVD_TO_BUY ;?></a></u>
		</td>
	  </tr>
	  <tr>
		<td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
	  </tr>
	  </table> 
	<?php    
	}
	?>
