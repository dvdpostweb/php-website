<?php 
	//$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
	//$ratings_count_values = tep_db_fetch_array($ratings_count);
	//$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
	//$ratings_average_values = tep_db_fetch_array($ratings_average);

	//$reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "' and reviews_check=1");
	//$reviews_count_values = tep_db_fetch_array($reviews_count);
	//$reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "'");
	//$reviews_average_values = tep_db_fetch_array($reviews_average);

	//if ($ratings_average_values['prave']>0){
	//	if ($reviews_average_values['rrave']>0){
	//		$jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
	//	}else{
	//		$jsrate = round($ratings_average_values['prave'],1);
	//	}
	//}else{
	//	if ($reviews_average_values['rrave']>0){
	//		$jsrate = round($reviews_average_values['rrave'],1);
	//	}else{
	//		$jsrate = 0;
	//	}
	//}
	
	$jsrate = 0;
			
	//if ($customers_ratings_count_values['products_rating']>0){

	//}else { 
		
		?>

<table width="317" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="118" height="162" rowspan="4" align="left"><a href="product_info.php?products_id=<?php  echo $product_info_values['products_id'];?>"><img src="<?php  echo $constants['DIR_DVD_WS_IMAGES']. $product_info_values['products_image_big'] ;?>" border="0" width="108" height="162"> </a> </td>
    <td width="242" height="40" valign="top"><a class="basiclink" href="product_info.php?products_id=<?php  echo $product_info_values['products_id'] ?>"><b><?php  echo $product_info_values['products_name'];?></b> </a></td>
  </tr>
  
  <tr>
    <td height="40" valign="top" class="TYPO_STD_BLACK">
		<?php  echo TEXT_RENTED . " : " . tep_date_short($history['date_purchased'], 0, 10);	?>		
    </td>	
  </tr>
  
  <tr>
	<td height="40" valign="top" align="left"> 
		<Table align="left">
			<TR>
				<TD class="TYPO_STD_BLACK" width="242" valign="top">
					<div align="left">
					<?php 

					if (tep_session_is_registered('customer_id')) {
						$customers_ratings_count = tep_db_query("select * from products_rating where products_id = '" . $product_info_values['products_id'] . "' and customers_id = '" . $customer_id . "' ");
						$customers_ratings_count_values = tep_db_fetch_array($customers_ratings_count);
						if ($customers_ratings_count_values['products_rating']>0){
							echo TEXT_U_HAVE_ALREADY_RATED . '<img src="' . DIR_WS_IMAGES . 'starbar/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
						}else{
							
								$star=$jsrate*10;
				               	if($star>50)	$star=50;
								if($star<0)	$star=0;	
				                echo  '<div  style="float:left;position:absolute;margin-top:-6px;">'.TEXT_RATE_THIS_PRODUCT.'</div><div id="img_star" class="img_star" style="float:left;position:absolute;margin:-8px 0 0 80px;background-image:url(' . DIR_WS_IMAGES . 'starbar/stars_1_' . $star. '.gif); width:92px; height:15px; ">
									<div class="star_rate" id="1" style="width:19px; height:16px; margin-left:0px; position:absolute;"></div>
									<div class="star_rate" id="2" style="width:19px; height:16px; margin-left:19px; position:absolute;"></div>
									<div class="star_rate" id="3" style="width:19px; height:16px; margin-left:38px; position:absolute;"></div>
									<div class="star_rate" id="4" style="width:19px; height:16px; margin-left:57px; position:absolute;"></div>
									<div class="star_rate" id="5" style="width:19px; height:16px; margin-left:76px; position:absolute;"></div>
									</div><div style:"clear:both"></div>';
						}
					}else{
						echo TEXT_RATE_THIS_PRODUCT;
						?>
						<script language="javascript">
						<!--
						StarbarInsert(<?php  echo $product_info_values['products_id'];?>, 1, <?php  echo $jsrate; ?> ,0,0,0,0,0,0,0);
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
  
  <tr>
	<td height="40" valign="top" align="left"> 
		<?php  echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>'; ?>
	</td>
  </tr>	
</table>
<?php 
//}
?>