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
<?php  
$count_not_rated = tep_db_query("select count(o.orders_id) as cc from ". TABLE_ORDERS ." o left join  orders_products op on op.orders_id = o.orders_id  left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id  where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and orders_products_type ='DVD_NORM' and pr.products_id is NULL ");

$count_not_rated_values = tep_db_fetch_array($count_not_rated) ;		
if ($count_not_rated_values['cc']>0){
	$limit=5;
?>
<br>
<table width="200" cellspacing="0" cellpadding="0" border="0" align="0" align="left" >
	<tr>
		<td width="15" height="25" background="<?php   echo DIR_WS_IMAGES;?>box_recom/left_top.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td width="170"  bgcolor="#EDCD9C" align="center" valign="middle"><b><?php   echo TEXT_RATE ;?></b></td>
		<td width="15" height="25" background="<?php   echo DIR_WS_IMAGES;?>box_recom/right_top.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
	</tr>
	<tr>
		<td rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>box_recom/left_middle.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td bgcolor="#FCF1C4" height="10"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>box_recom/right_middle.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
	</tr>
	<tr>
		<td bgcolor="#FCF1C4">	
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<?php   
			      	$history_query_raw =  "select o.orders_id, o.date_purchased ";
					$history_query_raw .= "from ". TABLE_ORDERS ." o ";
					$history_query_raw .= "left join  orders_products op on op.orders_id = o.orders_id  ";
					$history_query_raw .= "left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id ";
					$history_query_raw .= "where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and orders_products_type ='DVD_NORM' and pr.products_id is NULL ";
					$history_query_raw.=" order by rand() limit 1 ;";
					//echo $history_query_raw;
			  	 	$history_query = tep_db_query($history_query_raw);
					$history = tep_db_fetch_array($history_query);
					$products_name_query = tep_db_query("select op.products_id,pd.products_name ,pd.products_image_big  from " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_PRODUCTS_DESCRIPTION ." pd  where op.products_id=pd.products_id and pd.language_id = '" . $languages_id . "' and op.orders_id = '" . $history['orders_id'] . "'");
			      	$product_info_values = tep_db_fetch_array($products_name_query) ;
					echo'<td width="170" align="center" valign="top" class="TYPO_STD_BLACK"><p>';
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/show_rate_mydvdpost.php'));
					echo '</p><a href="rate_more.php" class="dvdpost_brown_underline">'.TEXT_RATE_MORE.'</a></td>';
				?>	
			  </tr>				  
			</table>			
		</td>
	</tr>
	<tr>
		<td width="15" height="20" background="<?php   echo DIR_WS_IMAGES;?>box_recom/left_bottom.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td background="<?php   echo DIR_WS_IMAGES;?>box_recom/bottom_middle.gif">&nbsp;</td>
		<td width="15" height="20" background="<?php   echo DIR_WS_IMAGES;?>box_recom/right_bottom.gif"><img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif"></td>
	</tr>
	<tr>
		<td colspan="3" height="25" valign="bottom"><?php   echo '<img src="'.DIR_WS_IMAGES.'greyline3.jpg" width="200" height="11" > ';?><br></td>
	</tr>
</table>
<?php   }else {$limit=15;}?>	

