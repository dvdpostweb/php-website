<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13" height="13"  valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="13"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
	<td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td width="13" rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="21" align="center" valign="top" class="SLOGAN_BLACK"><b><?php  echo TEXT_LAST_TITELS;?></b></td>
    <td width="13"rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td width="243" align="left" valign="top" class="TYPO_STD_BLACK">
	<?php 
		//BEN001 $listing_sql = 'select p.products_id, pd.products_name , pd.products_image_big from products_adult p ';
		$listing_sql = 'select p.products_id, pd.products_name , pd.products_image_big from products p '; //BEN001
//BEN001	    $listing_sql .= ' left join products_description_adult pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	    $listing_sql .= ' left join products_description pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ; //BEN001
		//RALPH-005 $listing_sql .= ' left join products_to_categories_adult pc on p.products_id = pc.products_id ';
		$listing_sql .= ' left join products_to_categories pc on p.products_id = pc.products_id '; //RALPH-005
		$listing_sql.= ' where p.products_availability>3 ';
		$listing_sql.= ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 3 MONTH) and p.products_next=0';
		$listing_sql.= ' and products_type = "DVD_ADULT" '; //BEN001
		$listing_top_sql = $listing_sql;
		$top_query = tep_db_query($listing_top_sql . ' order by rand() limit 3');
		while ($top = tep_db_fetch_array($top_query)) {
		?>
		 <li><a class="basiclink" href="product_info_adult.php?cPath=21&products_id=<?php  echo $top['products_id'] ;?>"><?php  echo $top['products_name'];?></a></li><br>
		<?php 
		}
	?>
		<br>
		<div align="center"><a href="<?php  echo tep_href_link('listing_category_adult.php', 'list=LASTADDED');?>" class="dvdpost_brown_underline"><?php echo TEXT_VIEW_ALL;?></div></a>
	</td>
  </tr>
  <tr>
    <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
	<td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
</table>
