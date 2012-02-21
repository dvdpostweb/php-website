<?php 
?>
<!-- reviews //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_REVIEWS);
  new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_REVIEWS, '', 'NONSSL'));

  //BEN001 $random_select = "select r.reviews_id, r.reviews_rating, substring(rd.reviews_text, 1, 60) as reviews_text, p.products_id, p.products_image from " . TABLE_REVIEWS . " r left join " . TABLE_PRODUCTS . " p on r.products_id = p.products_id, " . TABLE_REVIEWS_DESCRIPTION . " rd where p.products_status = '1' and rd.reviews_id = r.reviews_id and languages_id = '" . $languages_id . "' and r.reviews_check='1'";
  $random_select = "select r.reviews_id, r.reviews_rating, substring(rd.reviews_text, 1, 60) as reviews_text, p.products_id, p.products_image from " . TABLE_REVIEWS . " r left join " . TABLE_PRODUCTS . " p on r.products_id = p.products_id, " . TABLE_REVIEWS_DESCRIPTION . " rd where p.products_status = '1' and rd.reviews_id = r.reviews_id and languages_id = '" . $languages_id . "' and r.reviews_check='1' and products_type = 'DVD_NORM'";  //BEN001
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

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<div align="center"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id'], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . $random_product['products_image'], clean_html_comments($random_product['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id'] . '&reviews_id=' . $random_product['reviews_id'], 'NONSSL') . '">' . $review . ' ..</a><br><div align="center">' . tep_image(DIR_WS_IMAGES . '/starbar/stars_small_1_' . $random_product['reviews_rating'] . '0.gif' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $random_product['reviews_rating'])) . '</div>');
    new infoBox($info_box_contents);
//  } elseif ($HTTP_GET_VARS['products_id']) {
// display 'write a review' box
//    $info_box_contents = array();
//    $info_box_contents[] = array('align' => 'left',
//                                 'text'  => '<table border="0" cellspacing="0" cellpadding="2"><tr><td class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'products_id=' . $HTTP_GET_VARS['products_id'], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . 'box_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a></td><td class="infoBoxContents"><a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'products_id=' . $HTTP_GET_VARS['products_id'], 'NONSSL') . '">' . BOX_REVIEWS_WRITE_REVIEW .'</a></td></tr></table>');
//    new infoBox($info_box_contents);
//  } else {
// display 'no reviews' box
//    $info_box_contents = array();
//    $info_box_contents[] = array('align' => 'left',
//                                 'text'  => BOX_REVIEWS_NO_REVIEWS);
//    new infoBox($info_box_contents);
//  }
?>
            </td>
          </tr>
<!-- reviews_eof //-->