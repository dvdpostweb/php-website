<br>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="508">
  <tr>
	<td colspan="2" height="30" valign="top" align="left"><b><?php echo TEXT_SHOW_REVIEWS ;?></b> <a href="reviews.php" class="link_SLOGAN_MENU2">(<?php echo TEXT_SEE_MORE_REVIEWS ;?>)</a></td>
  </tr>  
	<?php
	//BEN001 $reviews = tep_db_query("select distinct(p.products_id),r.reviews_rating,r.reviews_id,r.customers_id,c.customers_firstname, rd.reviews_text, pd.products_image_big, pd.products_name from customers c,reviews r ,reviews_description rd, products p, products_description pd where r.reviews_rating>3 AND r.reviews_check=1 AND r.products_id=p.products_id AND p.products_rating>3 AND p.products_availability>2  AND r.reviews_id=rd.reviews_id AND pd.products_id=p.products_id AND rd.languages_id=".$languages_id." AND pd.language_id=rd.languages_id AND c.customers_id=r.customers_id AND CHAR_LENGTH(rd.reviews_text)>200 order by rand() LIMIT 3");
	$reviews = tep_db_query("select distinct(p.products_id),p.products_media, r.reviews_rating,r.reviews_id,r.customers_id,c.customers_firstname, rd.reviews_text, pd.products_image_big, pd.products_name from customers c,reviews r ,reviews_description rd, products p, products_description pd where r.reviews_rating>3 AND r.reviews_check=1 AND r.products_id=p.products_id AND p.products_rating>3 AND p.products_availability>0 AND r.reviews_id=rd.reviews_id AND pd.products_id=p.products_id AND rd.languages_id=".$languages_id." AND pd.language_id=rd.languages_id AND c.customers_id=r.customers_id AND CHAR_LENGTH(rd.reviews_text)>200 and p.products_type = 'DVD_NORM' order by rand() LIMIT 3"); //BEN001
	while ($reviews_value = tep_db_fetch_array($reviews)){
		echo '<tr><td rowspan="4" width="120" align="left" valign="top">';
		switch ($reviews_value['products_media']){
					case 'BlueRay' :
						echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="product_info.php?products_id='.$reviews_value['products_id'].'">';
						echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$reviews_value['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						break;
					
					default :
						echo '<a href="product_info_public.php?products_id='. $reviews_value['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$reviews_value['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a>';
						break;
					}
		echo '</td><td width="350" class="dvdpost_brown" height="20" valign="top"><b>'.$reviews_value['products_name'].'</b> <span class="TYPO_STD_GREY">('.TEXT_BY.' '.$reviews_value['customers_firstname'].')</span>&nbsp;<img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$reviews_value['reviews_rating'].'0.gif" height="11" align="baseline"></td></tr>';
		echo '<tr><td class="TYPO_STD_GREY" valign="top">'.$reviews_value['reviews_text'].'</td></tr>';
		echo '<tr><td class="TYPO_STD_GREY" height="20" valign="bottom">';
			$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $reviews_value['products_id'] . "'");
	        $ratings_count_values = tep_db_fetch_array($ratings_count);
	        $ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $reviews_value['products_id'] . "'");
	        $ratings_average_values = tep_db_fetch_array($ratings_average);
	
	        $reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $reviews_value['products_id'] . "' and reviews_check=1");
	        $reviews_count_values = tep_db_fetch_array($reviews_count);
	        $reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $reviews_value['products_id'] . "'");
	        $reviews_average_values = tep_db_fetch_array($reviews_average);
	
	        if ($ratings_average_values['prave']>0){
	            if ($reviews_average_values['rrave']>0){
	                $jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
	            }else{
	                $jsrate = round($ratings_average_values['prave'],1);
	            }
	        }else{
	            if ($reviews_average_values['rrave']>0){
	                $jsrate = round($reviews_average_values['rrave'],1);
	            }else{
	                $jsrate = 0;
	            }
	        }
	
	    Echo TEXT_AVERAGE_RATING .'<b class="TYPO_STD_GREY"> ' . $jsrate . ' </b> (' . ($ratings_count_values['count'] + $reviews_count_values['count']) . ' ' . TEXT_RATING .')<br>';
		echo '</td></tr>';
		echo '<tr><td valign="bottom" height="20"><a class="link_SLOGAN_MENU2" href="reviews_member_public.php?custid='.$reviews_value['customers_id'].'">'.TEXT_MORE_REVIEWS.' '.$reviews_value['customers_firstname'].'</a></td></tr>';
		echo '<tr><td colspan="2" height="20">&nbsp;</td></tr>';
	}
	?>
</table>