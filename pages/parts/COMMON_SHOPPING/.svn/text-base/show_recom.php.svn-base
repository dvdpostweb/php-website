<?
	$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
	$ratings_count_values = tep_db_fetch_array($ratings_count);
	$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
	$ratings_average_values = tep_db_fetch_array($ratings_average);

	$reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "' and reviews_check=1");
	$reviews_count_values = tep_db_fetch_array($reviews_count);
	$reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "'");
	$reviews_average_values = tep_db_fetch_array($reviews_average);

	if ($ratings_average_values['prave']>0){
		if ($reviews_average_values['rrave']>0){
			$jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
		}else{
			$jsrate = round($ratings_average_values['prave'],1);
		}
	}else{
		if ($reviews_average_values['rrave']>0){
			$jsrate = round($reviews_average_values['rrave'],1);
		}else{
			$jsrate = 0;
		}
	}
			
	?>
<table width="317" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="118" height="162" rowspan="4" align="left"><a href="product_info.php?cPath=21&products_id=<? echo $product_info_values['products_id'];?>"><img src="'.$constants['DIR_DVD_WS_IMAGES'].'/<? echo $product_info_values['products_image_big'] ;?>" border="0" width="108" height="162"> </a> </td>
    <td width="242"><a class="basiclink" href="product_info.php?cPath=21&products_id= <? echo $product_info_values['products_id'] ?>"><b><? echo $product_info_values['products_name'];?></b> </a><img src="<?php echo DIR_WS_IMAGES;?>recom/starflash.gif" align="absmiddle"><span class="SLOGAN_GRIS_FONCE"><?php echo $product_info_values['correlation']; ?></span></td>
  </tr>
  <tr>
	<td valign="top" align="left"> 
		<Table align="left">
			<TR>
				<TD class="TYPO_STD_BLACK" width="242" valign="top">
					<div align="left">
					<?php

					if (tep_session_is_registered('customer_id')) {
						$customers_ratings_count = tep_db_query("select * from products_rating where products_id = '" . $product_info_values['products_id'] . "' and customers_id = '" . $customer_id . "' ");
						$customers_ratings_count_values = tep_db_fetch_array($customers_ratings_count);
						if ($customers_ratings_count_values['products_rating']>0){
							echo '<img src="' . DIR_WS_IMAGES . 'starbar/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
						}else{
							?>
							<script language="javascript">
							<!--
							StarbarInsert(<?php echo $product_info_values['products_id'];?>, 1, <?php echo $jsrate; ?> ,0,0,0,0,0,0,0);
							// -->
							</script>
							<?php
						}
					}else{
						?>
						<script language="javascript">
						<!--
						StarbarInsert(<?php echo $product_info_values['products_id'];?>, 1, <?php echo $jsrate; ?> ,0,0,0,0,0,0,0);
						// -->
						</script>
						<?php
					}
					?>
				</TD>
			</tr>
			  <tr>
				<?php
					$customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $product_info_values['products_id'] . "' and customers_id = '" . $customer_id . "' ");
					$customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
					if ($customers_notinterested_values['products_uninterested_id']>0){
						echo '<td valign="middle" class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif" align="absmiddle">' . TEXT_NOTINTERSED . '</td>';
					}else{
						echo '<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK"><input type="hidden" name="movieid" value="' . $product_info_values['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="'.TEXT_ALTINTERESTED.'"></td></form>';
					}
				?>
			  </tr>	
		</table>	
	</td>
  </tr>
  <tr>
    <td valign="top" class="SLOGAN_GRIS_FONCE">		
		<? echo substr($product_info_values['products_description'],0,70)?> ... 
		<a class="basiclink" href="product_info.php?cPath=21&products_id=<? echo $product_info_values['products_id'];?>"> (<u><? echo TEXT_MORE_INFO ?></u>) </a>	
	</td>
  </tr>
  <tr>
    <?php
		$my_products_name = $product_info_values['products_name'];
		$my_products_price = $product_info_values['products_price'];
		$my_specials_new_products_price = tep_get_products_special_price($product_info_values['products_id']);
		$my_products_quantity = tep_get_products_stock($product_info_values['products_id']);
		$the_text= tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART);
		
		$navigation->set_snapshot();
		
		$wl_query = tep_db_query("select count(*) total from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" . $product_info_values['products_id'] . "' ");
		$wl = tep_db_fetch_array($wl_query);
			if ($wl['total']>0){
				echo '<td align="left" valign="middle" class="TYPO_STD_BLACK_bold ">'.TEXT_ALW;
			}else{
				echo '<form action="addtowishlist.php" method="post"><td align="left" valign="middle"><input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"><td></form>';
			}
		?>
  </tr>
</table>
