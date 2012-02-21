<br>
<table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	 <td colspan="2" height="30" valign="top" align="left"><b><? echo TEXT_NEW;?></b> <a href="listing_category_public.php?list=new" class="link_SLOGAN_MENU2">(<? echo TEXT_SEE_ALL ;?>)</a></td>
  	 <td width="30" background="<? echo  DIR_WS_IMAGES ;?>catalog/line_catalog.gif"><img src="<? echo DIR_WS_IMAGES;?>catalog/line_catalog.gif"></td>
	</tr>
    <?
		$listing_sql = 'select pr.products_rating , p.products_media , p.products_media, p.products_id, p.products_rating, pd.products_name , pd.products_description , pd.products_image_big from ' . TABLE_PRODUCTS . ' p ';
		$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
		$listing_sql .= ' left join ' . TABLE_PRODUCTS_TO_CATEGORIES . ' pc on p.products_id = pc.products_id ';
		$listing_sql .= ' left join products_rating pr on p.products_id = pr.products_id ';
		$listing_sql.= ' where p.products_availability>0 and pr.products_rating > 2 and p.products_status>-1';
		$listing_sql.= ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 1 MONTH) and p.products_next=0 and p.products_rating>2 ';
		$listing_sql.= ' and p.products_type = "DVD_NORM" '; //BEN001
		switch ($languages_id){
				case 1:
					$listing_sql.= ' and p.products_language_fr >0 ';
				break;
				case 2:
					$listing_sql.= ' and p.products_undertitle_nl >0 ';
				break;
				case 3:
				break;
				}
		$listing_top_sql = $listing_sql;
		$top_query = tep_db_query($listing_top_sql . 'group by p.products_id order by rand() limit 3');
		while ($top = tep_db_fetch_array($top_query)) {
			echo'<tr><td width="100" align="left" height="150">';
	          	switch ($top['products_media']){
					case 'BlueRay' :
						echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="product_info.php?products_id='.$top['products_id'].'">';
						echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$top['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						echo '<td width="133"><table width="100%" valign="top" cellspacing="0" cellpadding="0" border="0">';
						break;
					
					default :
						echo '<a href="product_info.php?products_id='.$top['products_id'].'">';
						echo '<img src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$top['products_image_big'].'" border="0" width="90" height="135" alt="'.$tag_dvd.'">';
						echo '</a></td>';
						echo '<td width="133"><table width="100%" valign="top" cellspacing="0" cellpadding="0" border="0">';
						break;
				}
			echo'<tr><td class="dvdpost_brown" align="left"><b>'. $top['products_name'] .'</b></td></tr>';
			echo'<tr><td class="TYPO_STD_GREY" valign="top" align="left">'. substr($top['products_description'], 0, 142) .'...</td></tr>';
			$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $top['products_id'] . "'");
			$ratings_average_values = tep_db_fetch_array($ratings_average);
			$rate = round($ratings_average_values['prave'],1)*10;
			echo '<tr><td align="left" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$rate.'.gif" height="13" align="absmiddle" border="0"></td></tr><tr>';
			echo '<td align="left">';
					if ($listing_query_values['products_next']==1){
							echo '<a href="product_info_public.php?products_id='.$top['products_id'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0"></a><br><br>';
							echo TEXT_DISPONIBILITY; 
							echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
						}else{
							echo '<a href="product_info_public.php?products_id='.$top['products_id'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0"></a>';
					}					
			echo '</td>';
			echo '</tr></table></td><td width="10" background="'. DIR_WS_IMAGES.'catalog/line_catalog.gif"><img src="'. DIR_WS_IMAGES.'catalog/line_catalog.gif"></td></tr>';
		}		
	?>		
</table>
