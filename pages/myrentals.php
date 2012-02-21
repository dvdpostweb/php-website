<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
	<br>
	<a class="red_slogan" href="mydelayed.php"><u><?php  echo TEXT_MYDETAYED; ?></u></a>
	<br><br>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
    <td width="168"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border" ><B class="TYPO_STD_BLACK"><?php  echo TEXT_ORDER_NUMBER ; ?></B> </td>
    <td width="132"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_ORDER_STATUS ; ?></B> </td>
    <td width="130"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_ORDER_DATE ; ?></B> </td>
    <td width="299"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif"><B class="TYPO_STD_BLACK"><?php  echo TEXT_ORDER_PRODUCTS;?></B></td>
    <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
  </tr>
  <tr>
    <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
    <td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
    <td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
  <tr>
    <TD colspan="4">
		<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" cellspacing="0" cellpadding="0">
		<?php 
		include('includes/functions/isAdult.php'); //BEN001
 	 	$history_query_raw = "select o.orders_id, o.date_purchased, s.orders_status_name, o.orders_status, IF(DATE_ADD(o.date_purchased, INTERVAL 1 MONTH) > curdate(),1,0) as ced from " . TABLE_ORDERS . " o left join " . TABLE_ORDERS_STATUS . " s on (o.orders_status = s.orders_status_id and s.language_id = '" . $languages_id . "') where o.customers_id = '" . $customer_id . "' and o.orders_status<> 6 order by orders_id DESC";
 	 	$history_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_ORDER_HISTORY, $history_query_raw, $history_numrows);
  	 	$history_query = tep_db_query($history_query_raw);
  		if (tep_db_num_rows($history_query)) {
    	while ($history = tep_db_fetch_array($history_query)) {
      	?>
      	<tr class=or>
      	<td width="168" align="center" class="TYPO_STD_BLACK"><?php  echo $history['orders_id']; ?></td>
      	<td width="132" align="center" class="TYPO_STD_BLACK">
      		<?php  
      			echo $history['orders_status_name']; 
      			if ($history['orders_status'] == 17 || $history['orders_status'] == 12) {
	      			echo ' <a href="custserdvdfinallyarrived.php">' . TEXT_FINALLY_ARRIVED . '</a>';
	      		}
      			if ($history['orders_status'] == 2) {
				  	$finally_query = tep_db_query("select * from " . TABLE_CUSTSERV . " where orders_id = '" . $history['orders_id'] . "' and custserv_cat_id = 19");
				  	while ($finally = tep_db_fetch_array($finally_query)) {
					  	if ($finally['custserv_id'] > 0 ){
			      			echo TEXT_ANDFINALLY_ARRIVED ;
						} 
      				}
	      		}
      		?>
      	</td>
      	<td width="130" align="center" class="TYPO_STD_BLACK"><?php  echo tep_date_short($history['date_purchased']); ?></td>
      	<td class="TYPO_STD_BLACK">
      	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"><?php 
		
      	$products_name_query = tep_db_query("select * from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . $history['orders_id'] . "'");
      	while ($products_name = tep_db_fetch_array($products_name_query)) {
			if ($products_name['products_id'] < 10 ){
				echo $products_name['products_name'] . '<br>';
			}else{
			//BEN001 if ($products_name['products_id'] < 9999 ){
			if (!isAdult($products_name['products_id'])){ //BEN001
				echo '<a class="basiclink" href="product_info.php?products_id=' . $products_name['products_id'] . '">' . $products_name['products_name'] . '</a><br>';        
			}else{
				switch (WEB_SITE_ID) {
				case 9:
					echo '<a class="basiclink" href="product_info.php?products_id=' . $products_name['products_id'] . '">' . $products_name['products_name'] . '</a><br>';        
				break;
				case 11:
					echo '<a class="basiclink" href="product_info.php?products_id=' . $products_name['products_id'] . '">' . $products_name['products_name'] . '</a><br>';        
				break;
				default:
					echo 'MOVIX';
				break;
				}
			}
		}
      }      
      ?>
      </td>
	</tr>
	<tr class=os>
		<td colspan=6></td>
	</tr>
  <?php 
  }
  } else {
  ?>
  <tr class=or>
      <td colspan="5" class="SLOGAN_DETAIL"><?php  echo TEXT_NO_PURCHASES; ?></td>
  </tr>   
  <?php  
  				}
			?>
		</table>
	</TD>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
    <td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
  </tr>
</table>
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


