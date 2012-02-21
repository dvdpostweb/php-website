<table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4" height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="4" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.gif" width="730" height="6"></div></td>
  </tr>
  <tr>
    <td colspan="4" class="slogan_orange">
		<?php  
		  $link='product_info.php';
		  //BEN001 $reviews_query_raw = "select r.customers_id, r.reviews_id, rd.reviews_text, r.reviews_rating, r.date_added, p.products_id, pd.products_name, p.products_image, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = r.products_id and r.reviews_id = rd.reviews_id and r.reviews_check = '1' and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and rd.languages_id = '" . $languages_id . "' order by r.reviews_id DESC";
		  $reviews_query_raw = "select r.customers_id, r.reviews_id, r.reviews_text, r.reviews_rating, r.date_added, p.products_id, pd.products_name, pd.products_image_big, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = r.products_id and r.reviews_check = '1' and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and r.languages_id = '" . $languages_id . "' and products_type = 'DVD_NORM' order by r.reviews_id DESC"; //BEN001
		  $reviews_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_NEW_REVIEWS, $reviews_query_raw, $reviews_numrows);
		  $reviews_query = tep_db_query($reviews_query_raw);
		  while ($reviews = tep_db_fetch_array($reviews_query)) {
		    $reviews_array[] = array('customers_id' => $reviews['customers_id'],
									 'id' => $reviews['reviews_id'],
		                             'products_id' => $reviews['products_id'],
		                             'reviews_id' => $reviews['reviews_id'],
		                             'products_name' => $reviews['products_name'],
		                             'products_image_big' => $reviews['products_image_big'],
		                             'authors_name' => substr($reviews['customers_name'], 0, strpos($reviews['customers_name'], ' ')), //substr($reviews_values['customers_name'], 0, strpos($reviews_values['customers_name'], ' '))
		                             'review' => htmlspecialchars(substr($reviews['reviews_text'], 0, 250)) . '..',
		                             'rating' => $reviews['reviews_rating'],
		                             'word_count' => tep_word_count($reviews['reviews_text'], ' '),
		                             'date_added' => tep_date_long($reviews['date_added']));
		  }
		
		  if ($reviews_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
		?>
		      <tr>
		        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
		          <tr>
		            <td class="slogan_black"><?php   echo $reviews_split->display_count($reviews_numrows, MAX_DISPLAY_NEW_REVIEWS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
		            <td align="right" class="slogan_orange"><?php   echo TEXT_RESULT_PAGE; ?> <?php   echo $reviews_split->display_links($reviews_numrows, MAX_DISPLAY_NEW_REVIEWS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
		          </tr>
				  <tr>
					<td height="6" colspan="4" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.gif" width="730" height="6"></div></td>
				  </tr>
		        </table></td>
		      </tr>
		
		<?php
		  }
		?>
		      <tr>
		        <td>
					<?php  
		              include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/reviews/reviews.php'));
					?>
		        </td>
		      </tr>
		<?php  
		  if ($reviews_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '2' || PREV_NEXT_BAR_LOCATION == '3')) {
		?>
		      <tr>
		        <td><br><table border="0" width="100%" cellspacing="0" cellpadding="2">
		          <tr>
		            <td class="slogan_black"><?php   echo $reviews_split->display_count($reviews_numrows, MAX_DISPLAY_NEW_REVIEWS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
		            <td align="right" class="slogan_orange"><?php   echo TEXT_RESULT_PAGE; ?> <?php   echo $reviews_split->display_links($reviews_numrows, MAX_DISPLAY_NEW_REVIEWS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
		          </tr>
		        </table></td>
		      </tr>
		<?php  
		  }
		?>
    </td>    
  </tr>
</table>