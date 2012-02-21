<br>
<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" align="left" valign="top" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
	<br>
		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr align="center">
		    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
		    <td width="120"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border" ><B class="TYPO_STD_BLACK"><?php  echo TEXT_DVD_QUANTITY ; ?></B> </td>
			<td width="240"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_DVD_PRODUCTS;?></B></td>
		    <td width="152"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_DVD_STATUS ; ?></B> </td>
		    <td width="112"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_DVD_ORDER_DATE ; ?></B> </td>
		    <td width="112"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif"><B class="TYPO_STD_BLACK"><?php  echo TEXT_DVD_SHIPPING_DATE ; ?></B> </td>
		    <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
		  </tr>
		  <tr>
		    <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		    <td colspan="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
		    <td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		  </tr>
		  <tr>
		    <TD colspan="5">
				<table width="736"0" cellspacing="0" cellpadding="0">
				<?php 
				$history_query_raw="select so.products_id , so.shopping_orders_id, so.quantity, so.status, so.date, pd.products_name from products_description pd , shopping_orders so where so. customers_id= '" . $customer_id . "' AND so.products_id=pd.products_id AND pd.language_id= '" . $languages_id . "'  AND products_type='DVD_NORM' order by so.date DESC";
		 	 	$history_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_ORDER_HISTORY, $history_query_raw, $history_numrows);
		  	 	$history_query = tep_db_query($history_query_raw);
		  		if (tep_db_num_rows($history_query)) {
				$show_explain=1;
		    	while ($history = tep_db_fetch_array($history_query)) {
		      	?>
		      	<tr class=or>
		      	<td width="119" align="center" class="TYPO_STD_BLACK"><?php  echo $history['quantity']; ?></td>
		      	<td width="240" align="center" class="TYPO_STD_BLACK"><?php  echo '<a class="basiclink" href="product_info_shop.php?products_id= ' . $history['products_id'] . '">' . $history['products_name'] . '</a><br>';?> 	</td>
				<td width="152" align="center" class="TYPO_STD_BLACK">
					<?php  
						switch($history['status']){
						case 1:
							echo TEXT_READY_TO_SHIP;
						break;
						case 2:
							echo TEXT_EXPEDITED;
						break;
						case 3:
							echo TEXT_DELIVERED;
						break;
						case 9:
							echo TEXT_CANCELED;
						break;
						}
					if ($history['status'] == 2 ){						
						echo '(<a href="mydvdbought_update.php?products_id='.$history['products_id'].'&order_id='.$history['shopping_orders_id'].'" class="dvdpost_left_menu_link1">' . TEXT_FINALLY_ARRIVED . '</a>)';
					}
					if ($history['status'] >1 ){	
						$shipping_query="select date_added from shopping_orders_status_history where shopping_orders_id='".$history['shopping_orders_id']."' AND new_value= '2'";
		 	 			$shipping_val = tep_db_query($shipping_query);
						$shipping = tep_db_fetch_array($shipping_val);}			
				
		      		?>										
				</td>
				<td width="112" align="center" class="TYPO_STD_BLACK"><?php  echo tep_date_short($history['date']); ?></td>
			    <td width="112" align="center" class="TYPO_STD_BLACK"><?php  if ($history['status'] >1){echo tep_date_short($shipping['date_added']);}?></td>
		      	</tr>			
			<tr class=os>
				<td colspan=7></td>
			</tr>
		  <?php 
		  }
		  } else {
		  $show_explain=0;
		  ?>
		  <tr class=or>
		      <td colspan="6" class="SLOGAN_DETAIL"><?php  echo TEXT_NO_PURCHASES; ?></td>
		  </tr>   
		  <?php  
		  				}
					?>
				</table>
			</TD>
		  </tr>
		  <tr>
		    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
		    <td colspan="5" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		  </tr>
		</table>
		<br>
		<?php  if ($show_explain==1){echo '<span class="TYPO_PROMO">'. TEXT_CLICK_DVD_ARRIVED . '</span><br>' ;}?>
		<br>
  </td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php 
  if (tep_db_num_rows($history_query)) {
?>
          <tr>
            <td class="TYPO_STD_BLACK" valign="top"><?php  echo $history_split->display_count($history_numrows, MAX_DISPLAY_ORDER_HISTORY, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_ORDERS); ?></td>
            <td class="SLOGAN_orange" align="right"><?php  echo $history_split->display_links($history_numrows, MAX_DISPLAY_ORDER_HISTORY, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
          </tr>
<?php 
  }
?>
        </table>		
    </td>    
  </tr>
</table>
<br>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40" align="center">
	    <a href='dvdforsale_listing.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_show_shopping_list.gif" border="0" align="absbottom"></a>
	</td>
  </tr>
  </table>