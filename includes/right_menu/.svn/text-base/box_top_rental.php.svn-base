<table width="122" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title2.gif" class="SLOGAN_MENU2"><b class="SLOGAN_MENU">Top</b> <?php  echo TXT_RENTALS;?> </td>
  </tr>
  <tr>
    <td width="19" rowspan="2">&nbsp;</td>
    <td width="103"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="10"></td>
  </tr>
  <tr>
    <td class="SLOGAN_MENU">
		<?php 
		//BEN010 $top_query = tep_db_query('select * from products p left join products_description pd on p.products_id = pd.products_id left join products_lesoir pls on p.products_id = pls.products_id where pls.products_id > 0 and pls.context = 3 and pd.language_id = '.$languages_id.' order by rand() limit 5');
		$top_query = tep_db_query('select * from products p left join products_description pd on p.products_id = pd.products_id left join products_lesoir pls on p.products_id = pls.products_id where pls.products_id > 0 and pls.context = 3 and pd.language_id = '.$languages_id.' and p.products_type = "DVD_NORM" order by rand() limit 5'); //BEN001
		while ($top = tep_db_fetch_array($top_query)) {
				?>
			<a href="product_info.php?products_id=<?php  echo $top['products_id'];?>" class="link_SLOGAN_MENU2"><?php  echo substr($top['products_name'], 0, 18);?> </a><br>

			<?php 
				}
				?>
    	</td>
  </tr>
</table>