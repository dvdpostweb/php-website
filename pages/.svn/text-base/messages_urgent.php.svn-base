

<table width="700" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo MESSAGES_URGENT_PAGE_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.gif" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td  class="SLOGAN_DETAIL">
<?php 
$my_customers_query = tep_db_query("select customers_firstname, customers_lastname from customers where customers_id  = '" . $customer_id . "' ");
$my_customers = tep_db_fetch_array($my_customers_query);
$my_customer_first_name = $my_customers['customers_firstname'];
$my_customer_last_name = $my_customers['customers_lastname'];

echo '<br><br>' . GREETING . ' ' . $my_customer_first_name . ' ' . $my_customer_last_name  . ',<br><br>';

echo MESSAGES_URGENT_INTRO;

?>

<?php 
$dom_reason_name = 'domiciliation_payment_id';
$ogone_reason_name = 'ogone_payment_id';
$abostopped_reason_name = 'abo_stopped_with_dvdathome_id';	


$my_query = 'select *,date_format(date_reconduction,"%d/%m/%Y") as date';
$my_query .= ' from payment_offline_request por';
$my_query .= ' where por.customers_id=' . $customer_id . ' and payment_status  in (14,15,16,17,18,19,20,21,22)';//create, cancel, payed,eurofead
$top_query = tep_db_query($my_query);
?>

	<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr align="center">
			<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
			<td width="135"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border" >
				<B class="TYPO_STD_BLACK" ><?php  echo MESSAGES_URGENT_COLUMN_DATE; ?></B>
			</td>
			<td width="134"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo MESSAGES_URGENT_COLUMN_AMOUNT; ?></B>
			</td>
			<td width="134"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo MESSAGES_URGENT_COLUMN_REASON; ?></B>
			</td>
			<td width="134"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo MESSAGES_URGENT_COLUMN_COMMUNICATION; ?></B>
			</td>
			<td width="135"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif">
				<B class="TYPO_STD_BLACK"><?php  echo MESSAGES_URGENT_COLUMN_ACCOUNT; ?></B>
			</td>
			<td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
		</tr>
		<tr>
			<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
			<td colspan="5" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
			<td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		</tr>
		<tr>
			<TD colspan="5" bgcolor="#FFFFFF">
				<table bgcolor="#FFFFFF">
				<?php 
				while ($top = tep_db_fetch_array($top_query)) {
					echo '<tr>';
					echo '<td width="147" class="TYPO_STD_BLACK" align="center">' . $top['date'] . '</td>';
					echo '<td width="147" class="TYPO_STD_BLACK" align="center">' . $top['amount'] . '</td>';
					switch($top['reason_pk_name'])
					{
						case 'OGONE':
							$reason_description=MESSAGE_PAYMENT_OGONE_FAILED;
							break;
						case 'BANK_TRANSFER':
							$reason_description=MESSAGE_PAYMENT_BANK_TRANSFER_FAILED;
						break;
						case 'DOMICILIATION':	
						case 'domiciliation_payment_id':
							$reason_description=MESSAGE_PAYMENT_DOM_FAILED;
							break;
						case 'abo_stopped_with_dvdathome_id':
							$reason_description=MESSAGE_PAYMENT_ABO_STOPPED_DVD_AT_HOME;
						break;
						default:
							$reason_description = 'unspecified';
					}
				
					echo '<td width="147" class="TYPO_STD_BLACK">' . $reason_description . '</td>';
					echo '<td width="147" class="TYPO_STD_BLACK" align="center">+++'.substr($top['communication'], 0, 3).'/'.substr($top['communication'], 3, 4).'/'.substr($top['communication'], 7, 5).'+++</td>'; 
					//echo '<td width="147" class="TYPO_STD_BLACK" align="center">' . $top['communication'] . '</td>';
					echo '<td width="147"class="TYPO_STD_BLACK" align="center">' . DVDPOST_BANK_ACCOUNT . '</td>';
					echo '</tr>';
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


	</td>
  </tr>
</table>
<br>

