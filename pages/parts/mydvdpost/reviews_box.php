<br>
<table border="0" align="right" cellpadding="0" cellspacing="0" width="486">
  <tr>
	<td colspan="2" height="30" valign="top" align="left"><b><?php   echo TEXT_SHOW_REVIEWS ;?></b> <a href="reviews.php" class="link_SLOGAN_MENU2">(<?php   echo TEXT_SEE_MORE_REVIEWS ;?>)</a></td>
  </tr>  
	<?php  
	$sql_reviews="select distinct(p.products_id),p.rating_users, p.rating_count, r.reviews_rating,r.reviews_id,r.customers_id,c.customers_firstname, r.reviews_text, pd.products_image_big, pd.products_name from customers c,reviews r , products p, products_description pd where r.reviews_rating>3 AND r.reviews_check=1 AND r.products_id=p.products_id AND p.products_rating>3 AND p.products_availability>0  AND pd.products_id=p.products_id AND r.languages_id=".$languages_id." AND pd.language_id=r.languages_id AND c.customers_id=r.customers_id AND CHAR_LENGTH(r.reviews_text)>200 and p.products_type = 'DVD_NORM' and p.products_status != -1 order by rand() LIMIT 600";
	
	$reviews_tab=tep_db_cache_asso($sql_reviews,'products_id',1800);
	$reviews_tab=tep_db_rand($reviews_tab,3);
	foreach($reviews_tab as $reviews_value){
		echo '<tr><td rowspan="4" width="120" align="left" valign="top">';
		switch ($reviews_value['products_media']){
			case 'BlueRay' :
				echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
				echo '<a  href="product_info.php?products_id='.$reviews_value['products_id'].'">';
				echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$reviews_value['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
			break;
					
			default :
				echo '<a href="product_info.php?products_id='. $reviews_value['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$reviews_value['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a>';
			break;
					}
		echo '</td><td width="350" class="dvdpost_brown" height="20" valign="top"><b>'.$reviews_value['products_name'].'</b> <span class="TYPO_STD_GREY">('.TEXT_BY.' '.$reviews_value['customers_firstname'].')</span>&nbsp;<img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$reviews_value['reviews_rating'].'0.gif" height="11" align="baseline"></td></tr>';
		echo '<tr><td class="TYPO_STD_GREY" valign="top">'.$reviews_value['reviews_text'].'</td></tr>';
		echo '<tr><td class="TYPO_STD_GREY" height="20" valign="bottom">';
		$data_avg_count=avg_count_fct($reviews_value['rating_users'] ,$reviews_value['rating_count'] );
	    echo TEXT_AVERAGE_RATING .'<b class="TYPO_STD_GREY"> ' . ($data_avg_count['avg']/10) . ' </b> (' . $reviews_value['rating_count'] . ' ' . TEXT_RATING .')<br>';
		echo '</td></tr>';
		echo '<tr><td valign="bottom" height="20"><a class="link_SLOGAN_MENU2" href="reviews_member.php?custid='.$reviews_value['customers_id'].'">'.TEXT_MORE_REVIEWS.' '.$reviews_value['customers_firstname'].'</a></td></tr>';
		echo '<tr><td colspan="2" height="20">&nbsp;</td></tr>';
	}
	?>
</table>