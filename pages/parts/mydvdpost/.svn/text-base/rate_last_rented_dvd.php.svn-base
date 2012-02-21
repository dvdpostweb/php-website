<script language="javascript">
var STARBAR_IMG_ROOT = '<?php   echo DIR_WS_IMAGES; ?>/starbar/';
var STARBAR_SET_PAGE = '<?php   echo HTTP_SERVER; ?>/SetRating.php?foo=bar&foo=bar';
</script>
<script type="text/javascript" src='<?php   echo DIR_WS_INCLUDES; ?>javascript/starbar_rate_more.js'></script>
<script type="text/javascript" src='<?php   echo DIR_WS_INCLUDES; ?>javascript/shared.js'></script>
<?php  
$count_not_rated = tep_db_query("select count(o.orders_id) as cc from ". TABLE_ORDERS ." o left join  orders_products op on op.orders_id = o.orders_id  left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id  where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and op.products_id < 10000 and pr.products_id is NULL ");
$count_not_rated_values = tep_db_fetch_array($count_not_rated) ;		
if ($count_not_rated_values['cc']>0){
	?>		
	<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
	    <td width="14" height="14"  valign="top" nowrap background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	    <td height="14"  background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
		<td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	  </tr>
	  <tr>
	    <td width="14" rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	    <td height="25" align="center" valign="top" class="SLOGAN_BLACK"><b><?php   echo TEXT_RATE ;?></b></td>
	    <td width="14"rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	  </tr>
	  <tr>
		<?php   
	      	$history_query_raw =  "select o.orders_id, o.date_purchased ";
			$history_query_raw .= "from ". TABLE_ORDERS ." o ";
			$history_query_raw .= "left join  orders_products op on op.orders_id = o.orders_id  ";
			$history_query_raw .= "left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id ";
			$history_query_raw .= "where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and op.products_id < 10000 and pr.products_id is NULL ";
			$history_query_raw.=" order by orders_id DESC limit 1 ;";
	  	 	$history_query = tep_db_query($history_query_raw);
			$history = tep_db_fetch_array($history_query);
			$products_name_query = tep_db_query("select op.products_id,pd.products_name ,pd.products_image_big  from " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_PRODUCTS_DESCRIPTION ." pd  where op.products_id=pd.products_id and pd.language_id = '" . $languages_id . "' and op.orders_id = '" . $history['orders_id'] . "'");
	      	$product_info_values = tep_db_fetch_array($products_name_query) ;
			echo'<td width="241" align="center" valign="top" class="TYPO_STD_BLACK"><p>';
			include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/show_rate_mydvdpost.php'));
			echo '</p><a href="rate_more.php" class="dvdpost_brown_underline">'.TEXT_RATE_MORE.'</a></td>';
		?>	
	  </tr>
	  <tr>
	    <td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
		<td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	  </tr>
	</table>
<?php   }?>