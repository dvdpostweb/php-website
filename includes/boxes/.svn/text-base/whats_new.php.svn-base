<?php 
// WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
?>
<!-- whats_new //-->
          <tr>
            <td>
<?php 
  //BEN001 if ($random_product = tep_random_select("select products_id, products_image, products_tax_class_id, products_price from " . TABLE_PRODUCTS . " where products_status='1' and products_quantity >='1' order by products_date_added desc limit " . MAX_RANDOM_SELECT_NEW)) {
  if ($random_product = tep_random_select("select products_id, products_image, products_tax_class_id, products_price from " . TABLE_PRODUCTS . " where products_status='1' and products_quantity >='1' and products_type = 'DVD_NORM' order by products_date_added desc limit " . MAX_RANDOM_SELECT_NEW)) { //BEN001
    $random_product['products_name'] = tep_get_products_name($random_product['products_id']);
    $random_product['specials_new_products_price'] = tep_get_products_special_price($random_product['products_id']);
// BOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
            $my_products_name = $random_product['products_name'];
            $my_products_price = $random_product['products_price'];
            $my_specials_new_products_price = $random_product['specials_new_products_price'];
            $my_products_quantity = tep_get_products_stock($random_product['$products_id']);
// EOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => BOX_HEADING_WHATS_NEW
                                );
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_PRODUCTS_NEW, '', 'NONSSL'));
    //new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_DEFAULT . '?cPath=29&sort=3d', '', 'NONSSL'));

    if ($random_product['specials_new_products_price']) {
      $whats_new_price =  '<s>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s><br>';
      $whats_new_price .= '<span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span>';
    } else {
      $whats_new_price =  $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id']));
    }

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text'  => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $random_product['products_image'], clean_html_comments($random_product['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id'], 'NONSSL') . '">' . $random_product['products_name'] . '</a>' 
                                );
    new infoBox($info_box_contents);
  }
?>
            </td>
          </tr>
<!-- whats_new_eof //-->