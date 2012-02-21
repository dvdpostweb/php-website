<table width="122" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title2.gif" class="SLOGAN_MENU2"><b class="SLOGAN_MENU"><?php  echo TEXT_REVIEW;?> </td>
  </tr>
  <tr>
    <td width="19" rowspan="2">&nbsp;</td>
    <td width="103"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="10"></td>
  </tr>
  <tr>
    <td class="SLOGAN_MENU">
		<?php 
		//BEN001 $random_select = "select r.reviews_id, r.reviews_rating, substring(rd.reviews_text, 1, 60) as reviews_text, p.products_id, p.products_image from " . TABLE_REVIEWS . " r left join " . TABLE_PRODUCTS . " p on r.products_id = p.products_id, " . TABLE_REVIEWS_DESCRIPTION . " rd where p.products_status = '1' and rd.reviews_id = r.reviews_id and languages_id = '" . $languages_id . "' and r.reviews_check='1'";
		$random_select = "select r.reviews_id, r.reviews_rating, substring(r.reviews_text, 1, 60) as reviews_text, p.products_id, p.products_image from " . TABLE_REVIEWS . " r left join " . TABLE_PRODUCTS . " p on r.products_id = p.products_id where p.products_status = '1' and r.reviews_id = r.reviews_id and languages_id = '" . $languages_id . "' and r.reviews_check='1' and products_type = 'DVD_NORM'"; //BEN001
		//if ($HTTP_GET_VARS['products_id']) {
		//  $random_select .= " and p.products_id = '" . $HTTP_GET_VARS['products_id'] . "'";
		//}
		$random_select .= " order by r.reviews_id DESC limit " . MAX_RANDOM_SELECT_REVIEWS;
		$random_product = tep_random_select($random_select);
		//  if ($random_product) {
		// display random review box
		$random_product['products_name'] = tep_get_products_name($random_product['products_id']);
		$review = htmlspecialchars($random_product['reviews_text']);
		$review = tep_break_string($review, 15, '-<br>');
		echo '<div align="center"> <a class="link_SLOGAN_MENU2" href="'.FILENAME_PRODUCT_INFO.'?products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id'] . '">' . tep_image(DIR_DVD_WS_IMAGES . $random_product['products_image'], clean_html_comments($random_product['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div><a class="link_SLOGAN_MENU2" href="'. FILENAME_PRODUCT_INFO . '?products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id']. '">' . $review . ' ..</a><br><div align="center">' . tep_image(DIR_WS_IMAGES . '/starbar/stars_small_1_' . $random_product['reviews_rating'] . '0.gif' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $random_product['reviews_rating'])) . '</div>';
		echo '<br><div align="right"><a class="dvdpost_right_menu_more" href="reviews.php">'.TEXT_MORE_REVIEWS.'</a></div>'?>
		
		</td>
  </tr>
</table>