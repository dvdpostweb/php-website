<table width="<?php echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.gif" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td colspan="2"  class="SLOGAN_DETAIL"><br>
		<?php
			$products_query = tep_db_query("select count(products_id) as cpt from products where products_status >-1 "); 
			$products = tep_db_fetch_array($products_query);
			$text_info =TEXT_INFORMATION ;
			$text_info = str_replace('µµµcountµµµ',  $products['cpt'] , $text_info);
			echo $text_info;
		?>
	</td>    
  </tr>
</table>
<br>