<?php  
	$jsrate = 0;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="162" align="center"><a href="product_info.php?cPath=21&products_id=<?php   echo $product_info_values['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" width="108" height="162"> </a> </td>
  </tr>  
  <tr >
	<td height="25" valign="top" align="center" id ="rating_box"> 
		<Table align="center">
			<TR>
				<TD class="TYPO_STD_BLACK" width="205" valign="top" align="center">
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
							echo  '<div id="img_star" class="img_star" style="text-align:left;background-image:url(' . DIR_WS_IMAGES . 'starbar/stars_1_' . $star. '.gif); width:92px; height:15px; ">
							<div class="star_rate" id="1" style="width:19px; height:16px; margin-left:0px; position:absolute;"></div>
							<div class="star_rate" id="2" style="width:19px; height:16px; margin-left:19px; position:absolute;"></div>
							<div class="star_rate" id="3" style="width:19px; height:16px; margin-left:38px; position:absolute;"></div>
							<div class="star_rate" id="4" style="width:19px; height:16px; margin-left:57px; position:absolute;"></div>
							<div class="star_rate" id="5" style="width:19px; height:16px; margin-left:76px; position:absolute;"></div>
								
								</div>';
							  
						}
					}else{						
						?>
						<script language="javascript">
						<!--
						StarbarInsert(<?php   echo $product_info_values['products_id'];?>, 1, <?php   echo $jsrate; ?> ,0,0,0,0,0,0,0);
						// -->
						</script>
						<?php  
					}
					?>
				</TD>
			</tr>	
		</table>	
	</td>
  </tr>  
  <tr id ="review_box">
	<td height="25" valign="top" align="center"> 
		<?php   echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>'; ?>
	</td>
  </tr>	
</table>
<?php  
//}
?>
<?php
	 switch($languages_id){
		case 1:
			$lang='fr';
		break;
		case 2:
			$lang='nl';
		break;
		case 3:
			$lang='en';
		break;
		
	}
?>
<div id='filter' movie_id='<?= $product_info_values['products_id'] ?>' language='<?= $lang ?>'>