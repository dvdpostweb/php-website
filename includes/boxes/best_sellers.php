<?php 
?>
<!-- best_sellers //-->
<?php 
  if ($cPath) {
    //BEN001 $best_sellers_query = tep_db_query("select distinct p.products_id, pd.products_name, p.products_ordered from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and (c.categories_id = '" . $current_category_id . "' OR c.parent_id = '" . $current_category_id . "') order by p.products_ordered DESC, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
	$best_sellers_query = tep_db_query("select distinct p.products_id, pd.products_name, p.products_ordered from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and (c.categories_id = '" . $current_category_id . "' OR c.parent_id = '" . $current_category_id . "') and p.products_type = 'DVD_NORM' order by p.products_ordered DESC, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS); //BEN001
  } else {
    //BEN001 $best_sellers_query = tep_db_query("select p.products_id, pd.products_name, p.products_ordered from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and p.products_id > 1 and pd.language_id = '" . $languages_id . "' order by p.products_ordered DESC, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
	$best_sellers_query = tep_db_query("select p.products_id, pd.products_name, p.products_ordered from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and p.products_id > 1 and pd.language_id = '" . $languages_id . "' and products_type = 'DVD_NORM' order by p.products_ordered DESC, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS); //BEN001
  }

  if (tep_db_num_rows($best_sellers_query) >= MIN_DISPLAY_BESTSELLERS) {
?>
          <tr>
            <td>
<?php 
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => BOX_HEADING_BESTSELLERS
                                );
    new infoBoxHeading($info_box_contents, false, false);

    $rows = 0;
    $info_box_contents = array();
    while ($best_sellers = tep_db_fetch_array($best_sellers_query)) {
      $rows++;
      $info_box_contents[] = array('align' => 'left',
                                   'text'  => tep_row_number_format($rows) . '.&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id'], 'NONSSL') . '">' . $best_sellers['products_name'] . '</a>');
    }

    new infoBox($info_box_contents);
?>
            </td>
          </tr>
<?php 
  }
?>
<!-- best_sellers_eof //-->

