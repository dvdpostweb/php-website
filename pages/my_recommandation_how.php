<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" align="center" valign="bottom" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="10" align="right">
		<a href="picto.php" class="dvdpost_brown_underline"> (<?php  echo TEXT_PICTO ; ?>)</a>
	</td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="<?php  echo SITE_WIDTH_PUBLIC; ?>" height="6"></div></td>
  </tr>
  <tr>
    <td colspan="2"  class="SLOGAN_DETAIL">
			<?php 
				$count_products_query = tep_db_query("SELECT count(products_id) as count FROM products ");
				$count_products = tep_db_fetch_array($count_products_query);
				//BEN001 $count_products_query_adult = tep_db_query("SELECT count(products_id)as count FROM products_adult ");
				//BEN001 $count_products_adult = tep_db_fetch_array($count_products_query_adult);
				$cpt=$count_products['count'];
				//BEN001 $cpt+=$count_products_adult['count'];
				$info_text = TEXT_INFORMATION;
				$info_text = str_replace('µµµcountµµµ',  $cpt, $info_text);
				?>
				<br>
				<?php  echo $info_text ;?><br>
		
	</td>    
  </tr>
</table>