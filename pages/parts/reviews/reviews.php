<?php 
?>
<table border="0" cellspacing="0" cellpadding="2">
<?php 
  if (sizeof($reviews_array) == '0') {
?>
  <tr>
    <td class="slogan_detail"><?php echo TEXT_NO_REVIEWS; ?></td>
  </tr>
<?php 
  } else {
    for($i=0; $i<sizeof($reviews_array); $i++) {
?>
  <tr>
    <td valign="top" class="slogan_detail"><?php echo '<a class="red_slogan" href="' . tep_href_link($link, 'products_id=' . $reviews_array[$i]['products_id'] , 'NONSSL') . '">' . tep_image(DIR_DVD_WS_IMAGES . $reviews_array[$i]['products_image_big'], clean_html_comments($reviews_array[$i]['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>'; ?></td>
    <td valign="top" class="slogan_detail"><?php echo '<a class="red_slogan" href="' . tep_href_link($link, 'products_id=' . $reviews_array[$i]['products_id'] , 'NONSSL') . '"><b><u>' . $reviews_array[$i]['products_name'] . '</u></b></a> (<a class="link_SLOGAN_MENU2" href="'.$reviews_link.'?custid='.$reviews_array[$i]['customers_id'].'">' . sprintf(TEXT_REVIEW_BY, $reviews_array[$i]['authors_name']) . ', ' . sprintf(TEXT_REVIEW_WORD_COUNT, $reviews_array[$i]['word_count']) . ')</a><br>' . $reviews_array[$i]['review'] . '<br><br><i>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_IMAGES . 'starbar2/stars_' . $reviews_array[$i]['rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_array[$i]['rating'])), sprintf(TEXT_OF_5_STARS, $reviews_array[$i]['rating'])) . '<br>' . sprintf(TEXT_REVIEW_DATE_ADDED, $reviews_array[$i]['date_added']) . '</i>'; ?></td>
  </tr>
<?php 
      if (($i+1) != sizeof($reviews_array)) {
?>
  <tr>
    <td colspan="2" height="10" align="center" class="slogan_detail"><img src="<?php  echo DIR_WS_IMAGES;?>/line-it.gif"</td>
  </tr>
<?php 
      }
    }
  }
?>
</table>
