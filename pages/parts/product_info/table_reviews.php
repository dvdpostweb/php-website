<?php 
$url="http://".$host.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

switch ($languages_id){
	case 1:
		$lang ='and languages_id = '.$languages_id.' ';
		break;	
	
	case 2:
		$lang ='and languages_id = '.$languages_id.' ';
		break;
		
	case 3:
		$lang =' ';
		break;
}
if ($imdb_query_values['imdb_id'] == 0){
	$reviews_count = tep_db_query("select count(*) as count from reviews where products_id = '" . $HTTP_GET_VARS['products_id'] . "' ".$lang." and  reviews_check=1 ");
	$reviews_count_values = tep_db_fetch_array($reviews_count);
}
else
{
	$reviews_count = tep_db_query("select count(*) as count from reviews r join products p on p.products_id = r.products_id where imdb_id = '" . $imdb_query_values['imdb_id'] . "' ".$lang." and  reviews_check=1 ");
	$reviews_count_values = tep_db_fetch_array($reviews_count);	
}
//$reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
//$reviews_average_values = tep_db_fetch_array($reviews_average);
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="top_reviews">&nbsp;</td>
  </tr>
  <tr>
    <td class="title_reviews" width="570" align="left" valign="middle"><?php  echo TEXT_MEMBER_DVDPOST_REVIEWS ; ?></td>
	<td align="right" valign="middle" height="30">
		<img align="absmiddle" src="<?php  echo DIR_WS_IMAGES;?>reviews_icon.gif" ><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
		<?php  echo '<a class="dvdpost_brown_basiclink" href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, $get_params, 'NONSSL') . '">' . TEXT_WRITE_REVIEW . '</a>'; ?>		
	</td>
  </tr>
  <tr>
    <td colspan="2" class="bottom_reviews">&nbsp;</td>
  </tr>
 </table>
 
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="top">
    <td colspan="2" height="25" nowrap class="title_reviews" valign="top" >
		<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php echo $reviews_count_values['count'] . ' ' . TEXT_REVIEW  ;?>
	</td>
  </tr>
					<?php 
					
                    $NUMBER_OF_REVIEWS_DISPLAYED = 5;
                    $FIRST_REVIEW_INDEX = 0;
                    if ($HTTP_GET_VARS['review_index']>0 && $HTTP_GET_VARS['review_index']<$reviews_count_values['count']) {
                        $FIRST_REVIEW_INDEX = $HTTP_GET_VARS['review_index'];
                    }
                    
                    //affichage de la dernière critique                    
					if ($FIRST_REVIEW_INDEX ==0){
						if($imdb_query_values['imdb_id']==0)
							$sql_last ="SELECT * FROM reviews r WHERE products_id = '" . $HTTP_GET_VARS['products_id'] . "' and reviews_check = 1 ".$lang." and customers_best_rating=0 and customers_bad_rating=0  order by r.reviews_id DESC LIMIT 1 ";
						else
							$sql_last ="SELECT * FROM reviews r join products p on p.products_id = r.products_id  WHERE imdb_id = '" . $imdb_query_values['imdb_id'] . "' and reviews_check = 1 ".$lang." and customers_best_rating=0 and customers_bad_rating=0  order by r.reviews_id DESC LIMIT 1 ";
						$last_review = tep_db_query($sql_last);

						if (tep_db_num_rows($last_review)) {
							$last_review_values = tep_db_fetch_array($last_review);
							$restrict_review=" AND reviews_id != '".$last_review_values['reviews_id']." '";
							$date_added = tep_date_short($last_review_values['date_added']);
							
							$last_date_added = tep_date_short($last_review_values['date_added']);
                        
							$last_rated_review=TEXT_MEMBER_RATED_REVIEWS;
                        
	                        if ($last_review_values['customers_best_rating']-$last_review_values['customers_bad_rating']<0){
		                        $last_top_members=0;
		                    }else{
	                        	$last_top_members=$last_review_values['customers_best_rating'] - $last_review_values['customers_bad_rating'];
	                    	}
                        $last_total_members=$last_review_values['customers_best_rating'] + $last_review_values['customers_bad_rating'];
                        
                        $last_rated_review = str_replace('µµµtop_membersµµµ',  $last_top_members , $last_rated_review);
                        $last_rated_review = str_replace('µµµtotal_membersµµµ',  $last_total_members , $last_rated_review);
                        
                        echo '<tr><td class="text_reviews_last" align="top">';
                        echo tep_image(DIR_WS_IMAGES . 'starbar2/last_review/stars_' . $last_review_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $last_review_values['reviews_rating'])) . '&nbsp;&nbsp;&nbsp;<a class="link_SLOGAN_MENU2" href="reviews_member.php?custid='.$last_review_values['customers_id'].'">' . substr($last_review_values['customers_name'], 0, strpos($last_review_values['customers_name'], ' ')) . '</a>&nbsp;&nbsp;&nbsp;' .  $date_added;
                        echo '</td><td align="right" align="top" class="rated_reviews_last">'.$last_rated_review.'</td><tr><td colspan="2" class="text_reviews_last"><div class="text_reviews_last">';
                        
                        $review_text = htmlspecialchars($last_review_values['reviews_text']);
                        $review_text = tep_break_string($review_text, 60, '-<br>');
                        echo $review_text;
                        echo '</div></td></tr>';
                        echo '<tr><td colspan="2">';
                        	$customers_reviews_count = tep_db_query("select *  from reviews_rating where reviews_id='".$last_review_values['reviews_id']."' and customers_id='".$customers_id."' LIMIT 1 ");
$customers_reviews_count_values = tep_db_fetch_array($customers_reviews_count);
                        	if (tep_db_num_rows($customers_reviews_count)<1){
                        		echo '<div class="pertinant_reviews_last">'.TEXT_PERTINANT_REVIEW.' <a href="rate_reviews_process.php?reviews='.$last_review_values['reviews_id'].'&rate=1&url='.urlencode($url).'">'.TEXT_YES.'</a> - <a href="rate_reviews_process.php?reviews='.$last_review_values['reviews_id'].'&rate=0&url='.urlencode($url).'">'.TEXT_NO.'</a></div>';
                        	}else{echo '&nbsp;';}
                        echo '</td></tr>';
							
						}
						else {$restrict_review=" ";}
						
					}
					                    
                    // affichage des reviews par pertinence
					// meilleures cotations - neutre - mauvaises cotations
					if($imdb_query_values['imdb_id']==0)
					{
							$sql ="SELECT `customers_best_rating` , `customers_bad_rating`, (`customers_best_rating` + `customers_bad_rating`) AS total_rating, customers_best_rating, customers_bad_rating,  customers_id,reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read  FROM reviews WHERE products_id = '" . $HTTP_GET_VARS['products_id'] . "' and reviews_check = 1 ".$lang." ".$restrict_review." ";
						$sql.=" ORDER BY (`customers_best_rating` - `customers_bad_rating`) DESC , (`customers_best_rating` + `customers_bad_rating`) DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED ." ";
						$reviews = tep_db_query($sql);
                	}
					else
					{
						$sql ="SELECT `customers_best_rating` , `customers_bad_rating`, (`customers_best_rating` + `customers_bad_rating`) AS total_rating, customers_best_rating, customers_bad_rating,  customers_id,reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read  FROM reviews r join products p on p.products_id = r.products_id WHERE imdb_id = '" . $imdb_query_values['imdb_id'] . "' and reviews_check = 1 ".$lang." ".$restrict_review." ";
					$sql.=" ORDER BY (`customers_best_rating` - `customers_bad_rating`) DESC , (`customers_best_rating` + `customers_bad_rating`) DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED ." ";
					$reviews = tep_db_query($sql);
					}

                    if (tep_db_num_rows($reviews)) {
                        while ($reviews_values = tep_db_fetch_array($reviews)) {
                        $date_added = tep_date_short($reviews_values['date_added']);
                        
                        $rated_reviews=TEXT_MEMBER_RATED_REVIEWS;
                        $top_members=$reviews_values['customers_best_rating'];
                    	$total_members=$reviews_values['total_rating'];
                        
                        $rated_reviews = str_replace('µµµtop_membersµµµ',  $top_members , $rated_reviews);
                        $rated_reviews = str_replace('µµµtotal_membersµµµ',  $total_members , $rated_reviews);
                        
                        echo '<tr><td class="text_reviews" align="top">';
                        echo tep_image(DIR_WS_IMAGES . 'starbar2/stars_' . $reviews_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating'])) . '&nbsp;&nbsp;&nbsp;<a class="link_SLOGAN_MENU2" href="reviews_member.php?custid='.$reviews_values['customers_id'].'">' . substr($reviews_values['customers_name'], 0, strpos($reviews_values['customers_name'], ' ')) . '</a>&nbsp;&nbsp;&nbsp;' .  $date_added;
                        echo '</td><td align="right" align="top" class="rated_reviews">'.$rated_reviews.'</td><tr><td colspan="2" class="text_reviews"><div class="text_reviews">';
                        $reviews_desc = tep_db_query("select r.reviews_text, r.reviews_rating, r.reviews_id, r.products_id, r.customers_name, r.date_added, r.last_modified, r.reviews_read from " . TABLE_REVIEWS . " r where r.reviews_id = '" . $reviews_values['reviews_id'] . "' ");
                        $reviews_desc_values = tep_db_fetch_array($reviews_desc);

                        $reviews_text = htmlspecialchars($reviews_desc_values['reviews_text']);
                        $reviews_text = tep_break_string($reviews_text, 60, '-<br>');
                        echo $reviews_text;
                        echo '</div></td></tr>';
                        echo '<tr><td colspan="2">';
                        	$customers_reviews_count = tep_db_query("select * from reviews_rating where reviews_id='".$reviews_values['reviews_id']."' and customers_id='".$customers_id."' LIMIT 1 ");
                        	if (tep_db_num_rows($customers_reviews_count)<1){
                        		echo '<div class="pertinant_reviews">'.TEXT_PERTINANT_REVIEW.' <a href="rate_reviews_process.php?reviews='.$reviews_values['reviews_id'].'&rate=1&url='.urlencode($url).'">'.TEXT_YES.'</a> - <a href="rate_reviews_process.php?reviews='.$reviews_values['reviews_id'].'&rate=0&url='.urlencode($url).'">'.TEXT_NO.'</a></div>';
                        	}else{echo '&nbsp;';}
                        echo '</td></tr>';
                        echo '<tr><td colspan="2" class="middle_reviews">&nbsp;</td></tr>';                        
                        }
                        echo '<tr><td colspan="2"><table align="right" width="120" style="font-height:8px"><tr><td> ';
                        if (($HTTP_GET_VARS['review_index']-$NUMBER_OF_REVIEWS_DISPLAYED)>=0) {
                            echo '<div class="pertinant_reviews" ><a href="' . $PHP_SELF.'?products_id='. $HTTP_GET_VARS['products_id'] .'&review_index='.($HTTP_GET_VARS['review_index']-$NUMBER_OF_REVIEWS_DISPLAYED).'">&lt;&lt; prev</a></div>';
                        } else {
                            echo '<div class="pertinant_reviews" >&lt;&lt; prev</div>';
                        }
                        echo '</td><td class="main-removed" style="text-align:right;font-weight:bold;font-size:8px">';
                        if (($HTTP_GET_VARS['review_index']+$NUMBER_OF_REVIEWS_DISPLAYED)<$reviews_count_values['count']) {
                            echo '<div class="pertinant_reviews" ><a  href="' . $PHP_SELF.'?products_id='. $HTTP_GET_VARS['products_id'] .'&review_index='.($HTTP_GET_VARS['review_index']+$NUMBER_OF_REVIEWS_DISPLAYED).'">next &gt;&gt;</a>';
                        } else {
                            echo '<div class="pertinant_reviews" >next &gt;&gt;</div>';
                        }
                        echo '</td></tr></table>';
                        
                    }
					else {
						if($imdb_query_values['imdb_id']==0)
						{					
						$reviews = tep_db_query("select customers_id,reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id='".$customer_id."' order by reviews_id DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED);
						}
						else
						{
							$reviews = tep_db_query("select customers_id,reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read from " . TABLE_REVIEWS . " r join products p on p.products_id = r.products_id where imdb_id = '" . $imdb_query_values['imdb_id'] . "' and customers_id='".$customer_id."' order by reviews_id DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED);	
						}
						if (tep_db_num_rows($reviews)) {
								echo '<table>';
                        while ($reviews_values = tep_db_fetch_array($reviews)) {
                        $date_added = tep_date_short($reviews_values['date_added']);
						echo '<tr><td class="text_reviews" align="top">';
                        echo tep_image(DIR_WS_IMAGES . 'starbar2/stars_' . $reviews_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating'])) . '&nbsp;&nbsp;&nbsp;' . substr($reviews_values['customers_name'], 0, strpos($reviews_values['customers_name'], ' ')) . '&nbsp;&nbsp;&nbsp;' .  $date_added;
                        echo '</td></tr><tr><td class="text_reviews" align="top">';
                        $reviews_desc = tep_db_query("select r.reviews_text, r.reviews_rating, r.reviews_id, r.products_id, r.customers_name, r.date_added, r.last_modified, r.reviews_read from " . TABLE_REVIEWS . " r where r.reviews_id = '" . $reviews_values['reviews_id'] . "' ");
                        $reviews_desc_values = tep_db_fetch_array($reviews_desc);

                        $reviews_text = htmlspecialchars($reviews_desc_values['reviews_text']);
                        $reviews_text = tep_break_string($reviews_text, 60, '-<br>');
                        echo $reviews_text;
                        echo '</td></tr>';
                        }
                        echo '</table><tr><td colspan="2"><table align="center" width="30%" style="font-height:8px"><tr><td class="main-removed" style="text-align:left;font-weight:bold;font-size:8px">';
                        if (($HTTP_GET_VARS['review_index']-$NUMBER_OF_REVIEWS_DISPLAYED)>=0) {
                            echo '<a style="color:gray;font-size:8px" href="' . $PHP_SELF.'?products_id='. $HTTP_GET_VARS['products_id'] .'&review_index='.($HTTP_GET_VARS['review_index']-$NUMBER_OF_REVIEWS_DISPLAYED).'">&lt;&lt; prev</a>';
                        } else {
                            echo '<div style="color:#CCCCCC;font-size:8px">&lt;&lt; prev</div>';
                        }
                        echo '</td><td class="main-removed" style="text-align:right;font-weight:bold;font-size:8px">';
                        if (($HTTP_GET_VARS['review_index']+$NUMBER_OF_REVIEWS_DISPLAYED)<$reviews_count_values['count']) {
                            echo '<a style="color:gray;font-size:8px" href="' . $PHP_SELF.'?products_id='. $HTTP_GET_VARS['products_id'] .'&review_index='.($HTTP_GET_VARS['review_index']+$NUMBER_OF_REVIEWS_DISPLAYED).'">next &gt;&gt;</a>';
                        } else {
                            echo '<div style="color:#CCCCCC;font-size:8px">next &gt;&gt;</div>';
                        }
                        echo '</td></tr></table></td></tr>';

						}
					}
					// show a text explaining that there is no reviews
					//else {
                    //echo TEXT_NO_REVIEWS; 
                    //}
                    ?>
	
</table>
		