<?php 

	$data_avg_count=avg_count_fct($product_info_values['rating_users'],$product_info_values['rating_count']);
	$jsrate=$data_avg_count['avg']/10;		
	?>
<table width="317" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td width="118" height="162" rowspan="4" align="left">
    <?php 
    switch ($reviews_value['products_media']){
		
	    case 'BlueRay' :
			echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
			echo '<a  href="product_info.php?products_id='.$reviews_value['products_id'].'&recommend=1">';
			echo '<a href="product_info.php?products_id='.$product_info_values['products_id'].'"><img src="'.$constants['DIR_DVD_WS_IMAGES'].$product_info_values['products_image_big'].'" border="0" width="108" height="144"></a></td></tr></table>';
			break;
		
		default :
			echo '<a href="product_info.php?products_id='.$product_info_values['products_id'].'&recommend=1"><img src="'.$constants['DIR_DVD_WS_IMAGES'].$product_info_values['products_image_big'].'" border="0" width="108" height="162"></a>';
			break;
		}
	?>				
  	</td>
    <td width="242"><a class="basiclink" href="product_info.php?products_id=<?php  echo $product_info_values['products_id'] ?>"><b><?php  echo $product_info_values['products_name'];?></b> </a><img src="<?php  echo DIR_WS_IMAGES;?>recom/starflash.gif" align="absmiddle"><span class="SLOGAN_GRIS_FONCE"><?php  echo $product_info_values['correlation']; ?></span></td>
  </tr>
  <tr>
	<td valign="top" align="left"> 
		<p id ="<?= $product_info_values['products_id']?>">
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
							$star=$jsrate*10;
			               	if($star>50)	$star=50;
							if($star<0)	$star=0;	
			                echo  '<div id="img_star" class="img_star" style="background-image:url(' . DIR_WS_IMAGES . 'starbar/stars_1_' . $star. '.gif); width:92px; height:15px; ">
								<div class="star_rate" id="1" style="width:19px; height:16px; margin-left:0px; position:absolute;"></div>
								<div class="star_rate" id="2" style="width:19px; height:16px; margin-left:19px; position:absolute;"></div>
								<div class="star_rate" id="3" style="width:19px; height:16px; margin-left:38px; position:absolute;"></div>
								<div class="star_rate" id="4" style="width:19px; height:16px; margin-left:57px; position:absolute;"></div>
								<div class="star_rate" id="5" style="width:19px; height:16px; margin-left:76px; position:absolute;"></div></div>';
						}
					}else{
						?>
						<script language="javascript">
						<!--
						StarbarInsert(<?php  echo $product_info_values['products_id'];?>, 1, <?php  echo $jsrate; ?> ,0,0,0,0,0,0,0);
						// -->
						</script>
						<?php 
					}
					?></div>
				</TD>
			</tr>
			  <tr>
				<?php 
					$customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $product_info_values['products_id'] . "' and customers_id = '" . $customer_id . "' ");
					$customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
					if ($customers_notinterested_values['products_uninterested_id']>0){
						echo '<td valign="middle" class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif" align="absmiddle">' . TEXT_NOTINTERSED . '</td>';
					}else{
						//<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK">
						echo '<input type="hidden" name="movieid" value="' . $product_info_values['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><img class="interested" style= "cursor:pointer" product="'.$product_info_values['products_id'] .'" type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="'.TEXT_ALTINTERESTED.'"></td>';//</form>';
					}
				?>
			  </tr>	
		</table>
		</p>	
	</td>
  </tr>
  <tr>
    <td valign="top" class="SLOGAN_GRIS_FONCE">		
		<?php  echo substr($product_info_values['products_description'],0,70)?> ... 
		<a class="basiclink" href="product_info.php?products_id=<?php  echo $product_info_values['products_id'];?>"> (<u><?php  echo TEXT_MORE_INFO ?></u>) </a>	
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
				//echo '<form action="addtowishlist.php" method="post"><td align="left" valign="middle"><input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '" name="nexturl"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif"><td></form>';
					echo '<td><a href="add_wishlist_new.php?products_id='.$product_info_values['products_id'].'" rel="ibox2&amp;width=470&amp;height=350" title="'.$product_info_values['products_name'].'"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_add_dvd.gif" border="0"></a></td>';
			}
		?>
  </tr>
</table>
