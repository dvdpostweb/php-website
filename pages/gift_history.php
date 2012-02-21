<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
	<br>
    <?php  
	$gift_query_count = tep_db_query("select count(*) as cc from activation_gift ag left join activation_code ac on ag.activation_gift_id  = ac.activation_group_id and ac.activation_group  = 2 where ag.activation_gift_id >'163' and ag.customers_id = '" . $customer_id . "' ");
	$gift_query_count_values = tep_db_fetch_array($gift_query_count);
	if ($gift_query_count_values['cc']<1){
	    echo TEXT_NOGIFT_BOUGHT; 		
	}else{
	    echo TEXT_INTRO; 	
		echo '<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">';
		echo '<tr align="center">';
		echo '<td width="14"><img src="'. DIR_WS_IMAGES .'img_recom/top_left_recom3.gif" width="14" height="35"></td>';
		echo '<td width="111"   background="'. DIR_WS_IMAGES .'img_recom/top_line_recom3.gif" class="border" >';
	  	echo '<B class="TYPO_STD_BLACK">' . TEXT_CRE_DATE . '</B></td>';
		echo '<td width="111"   background="'. DIR_WS_IMAGES .'img_recom/top_line_recom3.gif" class="border">';
	  	echo '<B class="TYPO_STD_BLACK">' .TEXT_ACT_CODE .'</B></td>';
	    echo '<td width="111"   background="'. DIR_WS_IMAGES .'img_recom/top_line_recom3.gif" class="border">';
	  	echo '<B class="TYPO_STD_BLACK">' . TEXT_ABO_TYPE . '</B></td>';
		echo '<td width="122"   background="' . DIR_WS_IMAGES . 'img_recom/top_line_recom3.gif" class="border">';
	  	echo '<B class="TYPO_STD_BLACK">' . TEXT_DURATION . '</B></td>';
        echo '<td width="122"   background="' . DIR_WS_IMAGES . 'img_recom/top_line_recom3.gif" class="border">';
	  	echo '<B class="TYPO_STD_BLACK">' . TEXT_GIFT_CODE_USED . '</B></td>';
		echo '<td width="122"  background="' .DIR_WS_IMAGES. 'img_recom/top_line_recom3.gif">&nbsp;</td>';
		echo '<td width="14" ><img src="' . DIR_WS_IMAGES . 'img_recom/top_right_recom3.gif" width="14" height="35"></td></tr>';
        ?>
		<tr>
		  <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		  <td colspan="6"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
		  <td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		</tr>
		<tr>
			<td colspan="6">
				<table >
				<?php 	
				$gift_query = tep_db_query("select * from activation_gift ag left join activation_code ac on ag.activation_gift_id  = ac.activation_group_id and ac.activation_group  = 2 where ag.activation_gift_id >'163' and ag.customers_id = '" . $customer_id . "' ");
				while ($gift = tep_db_fetch_array($gift_query)) {
				$Ddate = substr($gift['activation_code_creation_date'], 0, 10);
				echo '<tr>';
					echo '<td align="center" class="slogan_detail" width="111">' . $Ddate . '</td>';
					echo '<td align="center" class="slogan_detail" width="111">' . $gift['activation_code'] . '</td>';
					$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $gift['activation_products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . $languages_id . "' ");
					$product_info_values = tep_db_fetch_array($product_info);
					echo '<td align="center" class="slogan_detail" width="111">' . $product_info_values['products_name'] . '</td>';
					echo '<td align="center" class="slogan_detail" width="122">' . $gift['validity_value'] . ' ' . TEXT_MONTH . '</td>';
					if($gift['customers_id']>0){
					echo '<td align="center" class="slogan_detail" width="122">' . TEXT_CODE_USED . '</td>';
					}else{
					echo '<td align="center" class="slogan_detail" width="122">' . TEXT_CODE_NOTUSED . '</td>';
					}
					echo '<td align="center" width="122"><a  class="red_basiclink"href="gift_history_detail.php?activation_gift_id=' . $gift['activation_gift_id'] . '">' . TEXT_CLICKTOSEE . '</a></td></tr>';
				}
				?>
				</table>
			</td>
		</tr>
		<?php 
		echo '<tr><td><img src="' . DIR_WS_IMAGES . 'img_recom/back_left_recom.gif" width="14" height="14"></td>';
		echo '<td colspan="6" background="'. DIR_WS_IMAGES. 'img_recom/back_line_recom.gif">';
		echo '<img src="'. DIR_WS_IMAGES .'blank.gif" width="14" height="3"></td>';
		echo '<td><img src="' .DIR_WS_IMAGES. 'img_recom/back_right_recom.gif" width="14" height="14"></td></tr></table>';
	}
    ?>
	
	</td>    
  </tr>
</table>
<br>