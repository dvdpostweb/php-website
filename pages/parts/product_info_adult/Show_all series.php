<?php 
if ($product_info_values['products_series_id']>0) {
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
		<?php 
		echo '<div align="left" class="TYPO_STD_BLACK_bold" >' . TEXT_OTHERTITLEINSERIE .'</div>';
		//BEN001 $series_query = tep_db_query("select p.products_id, pd.products_name from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id where p.products_series_id = '" . $product_info_values['products_series_id'] . "' and pd.language_id = '" . $languages_id . "' order by products_series_number ");
		$series_query = tep_db_query("select p.products_id, pd.products_name from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id where p.products_series_id = '" . $product_info_values['products_series_id'] . "' and pd.language_id = '" . $languages_id . "' and products_type = 'DVD_ADULT' order by products_series_number "); //BEN001
		while ($series = tep_db_fetch_array($series_query)) {
			echo '<a  class="basiclink" href="product_info.php?products_id=' . $series['products_id'] . '">';
			echo $series['products_name'] . '</a> - ';}
			?>
	</td>
  </tr>
</table>
<?php  }?>
