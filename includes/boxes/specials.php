<?php 
/*
  $Id: specials.php,v 1.29 2002/04/26 20:28:06 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
// WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
?>
<!-- specials //-->
<?php 
  //BEN001 if ($random_product = tep_random_select("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . $languages_id . "' and s.status = '1' order by s.specials_date_added DESC limit " . MAX_RANDOM_SELECT_SPECIALS)) {
  if ($random_product = tep_random_select("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . $languages_id . "' and s.status = '1' and products_type = 'DVD_NORM' order by s.specials_date_added DESC limit " . MAX_RANDOM_SELECT_SPECIALS)) { //BEN001
?>
          <tr>
            <td>
<?php 
// BOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
            $my_products_name = $random_product['products_name'];
            $my_products_price = $random_product['products_price'];
            $my_specials_new_products_price = $random_product['specials_new_products_price'];
            $my_products_quantity = tep_get_products_stock($random_product['$products_id']);
// EOF: WebMakers.com Added: FREE-CALL FOR PRICE-COMING SOON ETC. v2.1
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => BOX_HEADING_SPECIALS
                                );
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_SPECIALS, '', 'NONSSL'));

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text'  => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product["products_id"], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . $random_product['products_image'], clean_html_comments($random_product['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id'], 'NONSSL') . '">' . $random_product['products_name'] . '</a><br><s>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s><br><span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span>'
                                );
    new infoBox($info_box_contents);
?>
            </td>
          </tr>
<?php 
  }
?>
<!-- specials_eof //-->