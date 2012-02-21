<table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" bgcolor="F2F2F2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="8" height="2"></td>
  </tr>
  <tr>
    <td width="328" height="35" valign="middle" nowrap class="TYPO_STD2_BLACK"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php echo $reviews_count_values['count'] . ' ' . TEXT_REVIEW  ;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3">
	  <?php 
	  if ($reviews_count_values['count']>5)
	  {
		echo '<a href="#" class="dvdpost_brown_basiclink">'. TEXT_VIEW_ALL_REVIEWS . '</a>';
      }
	  ?>
	</td>
    <td width="154" align="center" valign="middle">
	<?php 
	 echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE_ADULT, $get_params, 'NONSSL') . '">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>'; 
	?>
	</td>	 
	<td width="179" class="TYPO_STD2_BLACK">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="F2F2F2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="8" height="2"></td>
  </tr>
  <tr>
    <td colspan="3" ><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="8" height="15"></td>
  </tr>
  <tr>
    <td colspan="3" class="TYPO_STD_BLACK">
					<?php 
					
                    $NUMBER_OF_REVIEWS_DISPLAYED = 5;
                    $FIRST_REVIEW_INDEX = 0;
                    if ($HTTP_GET_VARS['review_index']>0 && $HTTP_GET_VARS['review_index']<$reviews_count_values['count']) {
                        $FIRST_REVIEW_INDEX = $HTTP_GET_VARS['review_index'];
                    }
                    $reviews = tep_db_query("select reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and reviews_check = 1 order by reviews_id DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED);
                    if (tep_db_num_rows($reviews)) {
                        while ($reviews_values = tep_db_fetch_array($reviews)) {
                        $date_added = tep_date_short($reviews_values['date_added']);
                        echo tep_image(DIR_WS_IMAGES . 'starbar2/stars_' . $reviews_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating'])) . '&nbsp;&nbsp;&nbsp;' . substr($reviews_values['customers_name'], 0, strpos($reviews_values['customers_name'], ' ')) . '&nbsp;&nbsp;&nbsp;' .  $date_added;
                        echo '<br>';
                        $reviews_desc = tep_db_query("select r.reviews_text, r.reviews_rating, r.reviews_id, r.products_id, r.customers_name, r.date_added, r.last_modified, r.reviews_read from " . TABLE_REVIEWS . " r where r.reviews_id = '" . $reviews_values['reviews_id'] . "' ");
                        $reviews_desc_values = tep_db_fetch_array($reviews_desc);

                        $reviews_text = htmlspecialchars($reviews_desc_values['reviews_text']);
                        $reviews_text = tep_break_string($reviews_text, 60, '-<br>');
                        echo $reviews_text;
                        echo '<br><br>';
                        }
                        echo '<table align="center" width="30%" style="font-height:8px"><tr><td class="main-removed" style="text-align:left;font-weight:bold;font-size:8px">';
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
                        echo '</td></tr></table>';

                    }
					else {					
						$reviews = tep_db_query("select reviews_rating, reviews_id, customers_name, date_added, last_modified, reviews_read from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id='".$customer_id."' order by reviews_id DESC limit " . $FIRST_REVIEW_INDEX . "," . $NUMBER_OF_REVIEWS_DISPLAYED);
							if (tep_db_num_rows($reviews)) {
                        while ($reviews_values = tep_db_fetch_array($reviews)) {
                        $date_added = tep_date_short($reviews_values['date_added']);
                        echo tep_image(DIR_WS_IMAGES . 'starbar2/stars_' . $reviews_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating'])) . '&nbsp;&nbsp;&nbsp;' . substr($reviews_values['customers_name'], 0, strpos($reviews_values['customers_name'], ' ')) . '&nbsp;&nbsp;&nbsp;' .  $date_added;
                        echo '<br>';
                        $reviews_desc = tep_db_query("select r.reviews_text, r.reviews_rating, r.reviews_id, r.products_id, r.customers_name, r.date_added, r.last_modified, r.reviews_read from " . TABLE_REVIEWS . " r where r.reviews_id = '" . $reviews_values['reviews_id'] . "' and r.reviews_id ");
                        $reviews_desc_values = tep_db_fetch_array($reviews_desc);

                        $reviews_text = htmlspecialchars($reviews_desc_values['reviews_text']);
                        $reviews_text = tep_break_string($reviews_text, 60, '-<br>');
                        echo $reviews_text;
                        echo '<br><br>';
                        }
                        echo '<table align="center" width="30%" style="font-height:8px"><tr><td class="main-removed" style="text-align:left;font-weight:bold;font-size:8px">';
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
                        echo '</td></tr></table>';

						}
					}					
					// show a text explaining that there is no reviews
					//else {
                    //echo TEXT_NO_REVIEWS; 
                    //}
                    ?>
	</td>
  </tr>
</table>					
					