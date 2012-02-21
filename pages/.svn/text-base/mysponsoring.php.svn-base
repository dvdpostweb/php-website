<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
        <br>
		<?php  
		echo TEXT_INFORMATION . "<br><br>"; 
				
        $query_sponsoring = tep_db_query("select *, DAYOFMONTH(date) as cedday, MONTH(date) as cedmonth, YEAR(date) as cedyear   from " . TABLE_SPONSORING_USED . " where father_id = '".$customer_id."' ");  
		?>
		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr align="center">
				<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
				<td width="184"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border" ><B class="TYPO_STD_BLACK"><?php  echo TEXT_TH_DATE; ?></B> </td>
				<td width="184"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_TH_SONNAME; ?></B> </td>
				<td width="184"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border"><B class="TYPO_STD_BLACK"><?php  echo TEXT_TH_SUNABO; ?></B> </td>
				<td width="184"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" ><B class="TYPO_STD_BLACK"><?php  echo TEXT_TH_EXTRADAYS; ?></B> </td></td>
				<td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
			</tr>
			<tr>
				<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
				<td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
				<td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
				</tr>
				<tr>
					<TD colspan="4">
						<table width="736" border="0" align="center" cellpadding="0" cellspacing="0">
							<?php 
							while ($query_sponsoring_values = tep_db_fetch_array($query_sponsoring)) {
								echo '<tr align="center">';
								echo '<td cwidth="184" class="TYPO_STD_BLACK" >' . $query_sponsoring_values['cedday'] . '/' . $query_sponsoring_values['cedmonth'] . '/' . $query_sponsoring_values['cedyear'] . '</td>';
								$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $query_sponsoring_values['son_id'] . "' ");
								$customers = tep_db_fetch_array($customers_query);
								echo '<td width="184" class="TYPO_STD_BLACK">' . $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] . '</td>';
								$products_query = tep_db_query("select * from products_description where products_id = '" . $query_sponsoring_values['son_abo_type'] . "' and language_id = '" . $languages_id . "' ");
								$products = tep_db_fetch_array($products_query);
								echo '<td width="184" class="TYPO_STD_BLACK">' . $products['products_name'] . '</td>';
								echo '<td width="184" class="TYPO_STD_BLACK" align="center">' . $query_sponsoring_values['extra_days'] . '</td>';						
								echo '<tr>';
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
		<?php  echo  '<br><br>' . TEXT_INFORMATION2;?>
      </td>    
  </tr>
</table>