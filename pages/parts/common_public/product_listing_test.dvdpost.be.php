<table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php

  $colspan = sizeof($column_list);

  $listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $listing_sql, $listing_numrows);

  if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
?>
  <tr>
    <td colspan="<?php echo $colspan; ?>">
      <table border="0" style="margin-bottom:5px;" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td class="smallText">&nbsp;<?php echo $listing_split->display_count($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?>&nbsp;</td>
          <td align="right" class="smallText">&nbsp;<?php echo TEXT_RESULT_PAGE; ?> <?php echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="<?php echo $colspan; ?>"><?php echo tep_draw_separator(); ?></td>
  </tr>
<?php
  }
?>
  <tr>
    <td>
<?php
  $list_box_contents = array();
  $list_box_contents[] = array('params' => 'class="productListing-heading"');
  $cur_row = sizeof($list_box_contents) - 1;

  for ($col=0; $col<sizeof($column_list); $col++) {
    switch ($column_list[$col]) {
      case 'PRODUCT_LIST_MODEL':
        $lc_text = TABLE_HEADING_MODEL;
        $lc_align = 'left';
        break;
      case 'PRODUCT_LIST_NAME':
        $lc_text = TEXT_TITLE ;
        $lc_align = 'left';
        break;
      case 'PRODUCT_LIST_MANUFACTURER':
        $lc_text = TABLE_HEADING_MANUFACTURER;
        $lc_align = 'left';
        break;
      case 'PRODUCT_AVAILABILITY':
        $lc_text = Avail;
        $lc_align = 'right';
        break;
      case 'PRODUCT_LIST_QUANTITY':
          $lc_text = TEXT_SUMMARY;
          $lc_align = 'left';
        break;
      case 'PRODUCT_LIST_WEIGHT':
        $lc_text = TABLE_HEADING_WEIGHT;
        $lc_align = 'right';
        break;
      case 'PRODUCT_LIST_IMAGE':
        $lc_text = TABLE_HEADING_IMAGE;
        $lc_align = 'center';
        break;
      case 'PRODUCT_LIST_BUY_NOW':
        $lc_text = TABLE_HEADING_BUY_NOW;
        $lc_align = 'center';
        break;
    }
    
  if ($column_list[$col] != 'PRODUCT_LIST_BUY_NOW' &&
      $column_list[$col] != 'PRODUCT_LIST_IMAGE')
      $lc_text = tep_create_sort_heading($HTTP_GET_VARS['sort'], $col+1, $lc_text);
      $list_box_contents[$cur_row][] = array('align' => $lc_align,
                                             'params' => 'class="productListing-heading"',
                                             'text'  => "&nbsp;" . $lc_text . "&nbsp;");
  }

  if ($listing_numrows > 0) {
    $number_of_products = '0';
    $listing = tep_db_query($listing_sql);
    while ($listing_values = tep_db_fetch_array($listing)) {
      $number_of_products++;

      if ( ($number_of_products/2) == floor($number_of_products/2) ) {
        $list_box_contents[] = array('params' => 'class="productListing-even"');
      } else {
        $list_box_contents[] = array('params' => 'class="productListing-odd"');
      }

      $cur_row = sizeof($list_box_contents) - 1;
      
      for ($col=0; $col<sizeof($column_list); $col++) {
            $my_products_name = $listing_values['products_name'];
            $my_products_price = $listing_values['products_price'];
            $my_specials_new_products_price = $listing_values['specials_new_products_price'];
            $my_products_quantity = tep_get_products_stock($listing_values['products_id']);

        $lc_align = '';
        switch ($column_list[$col]) {
          case 'PRODUCT_LIST_MODEL':
            $columnwidth = '';
            $lc_text = '&nbsp;' . $listing_values['products_model'] . '&nbsp;';
            break;
          
          case 'PRODUCT_LIST_NAME':

            $columnwidth = 220;
            $products_directors = tep_db_query("select directors_name from  " . TABLE_DIRECTORS . "  where directors_id  = '" . $listing_values['products_directors_id'] . "' ");                        
            $products_directors_values = tep_db_fetch_array($products_directors);
            $actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $listing_values['products_id'] . "' limit 2");  
            
            $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($HTTP_GET_VARS['cPath'] ? 'cPath=' . $HTTP_GET_VARS['cPath'] . '&' : '') . 'products_id=' . $listing_values['products_id']) . '"><b><u><font color="#2C5196">' . $listing_values['products_name'] . '</font></u></b></a>';
            $lc_text = $lc_text . '<br><img src="' . DIR_WS_IMAGES . 'starbar/stars_small_1_' . $listing_values['products_rating'] . '0.gif" alt="' . $listing_values['products_rating'] . '/5">';

            if (PRODUCTS_LISTING_SHOW_LANGUAGE) {
              if ($listing_values['products_language_fr']>0){
                $lc_text = $lc_text . '<img src="' . DIR_WS_IMAGES . 'vfr.gif" alt="French Version">';
              }
              if ($listing_values['products_undertitle_nl']>0){
                $lc_text = $lc_text . '<img src="' . DIR_WS_IMAGES . 'vnl.gif" alt="Dutch Version">';
              }
            }
            $lc_text = $lc_text . '<br>' . TEXT_DIRECTOR . ': <A href="directors.php?directors_id='.$listing_values['products_directors_id'].'"><i>'. $products_directors_values['directors_name'] . '</i></A>&nbsp;';
            $lc_text = $lc_text . '<br>'.TEXT_ACTORS.': &nbsp;';
            while ($actors_values = tep_db_fetch_array($actors)) {
              $actors_name = tep_db_query("select an.actors_Name from " . TABLE_ACTORS. " an where an.actors_id = '" . $actors_values['actors_id'] . "'");  
              $actors_name_values = tep_db_fetch_array($actors_name);
              $lc_text = $lc_text . '<A href="actors.php?actors_id='.$actors_values['actors_id'].'"><u>' . $actors_name_values['actors_Name'] . '</u></A> &nbsp; ';
            }
            break;
            
          case 'PRODUCT_LIST_MANUFACTURER':
            $columnwidth = '';
            $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing_values['manufacturers_id'], 'NONSSL') . '">' . $listing_values['manufacturers_name'] . '</a>&nbsp;';
            break;
            
          case 'PRODUCT_AVAILABILITY':
            $lc_align = 'right';
                        $columnwidth = '70';
                        $lc_text = '';    

/*
                        if ($listing_values['products_next'] > 0){
                            //$lc_text = $lc_text . '<font color="#2C5196"><b>' . substr($listing_values['products_date_available'],0,10) . '</b></font>';                                
                            $strdate = substr($listing_values['products_date_available'], 0, 10);
                            $lc_text = $lc_text . '<font color="#2C5196"><b><span style="font-weight:bold">' . substr($strdate, 8, 2) . "/" . substr($strdate, 5, 2) . "/" . substr($strdate, 0, 4) . '</span></b></font>';                                
                        } else if ($listing_values['added_today'] > 0){
                            $lc_text = $lc_text . ' <span style="font-weight:bold">Added Today</span>';
                        } else{
                            $lc_text = $lc_text . '<img src="' . DIR_WS_IMAGES . 'avail' . $listing_values['products_availability'] . '.gif">';
                        }
*/
                        $lc_text = $lc_text . '<div style="text-align:center;font-weight:bold;font-size:9px;">' . formatAvailability($listing_values['added_today'], $listing_values['products_next'], $listing_values['products_date_available'], $listing_values['products_availability']) . '</div>';

                  break;
                  
          case 'PRODUCT_LIST_QUANTITY':
            $lc_align = 'left';
            $columnwidth = 190;
            $product_info = tep_db_query("select pd.products_description from  " . TABLE_PRODUCTS_DESCRIPTION. " pd where pd.products_id = '" . $listing_values['products_id'] . "' and pd.language_id = '" . $languages_id . "' ");                        
            $product_info_values = tep_db_fetch_array($product_info);
            $lc_text = '&nbsp;' . substr($product_info_values['products_description'],0,150) . '...&nbsp;';
            break;

          case 'PRODUCT_LIST_WEIGHT':
            $lc_align = 'right';
            $columnwidth = '';
            $lc_text = '&nbsp;' . $listing_values['products_weight'] . '&nbsp;';
            break;

          case 'PRODUCT_LIST_IMAGE':
            $lc_align = 'center';
            $columnwidth = ''; 
            $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($HTTP_GET_VARS['cPath'] ? 'cPath=' . $HTTP_GET_VARS['cPath'] . '&' : '') . 'products_id=' . $listing_values['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing_values['products_image'], clean_html_comments($listing_values['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>&nbsp;';
            break;

          case 'PRODUCT_LIST_BUY_NOW':
            $lc_align = 'center';
            $columnwidth = '60'; 
                        if (tep_session_is_registered('customer_id')) {
                                $wl_query = tep_db_query("select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and product_id = '" .  $listing_values['products_id'] . "' ");
                                $wl = tep_db_fetch_array($wl_query);
                                if ($wl['wl_id']>0){
                                        $lc_text = '<a href="mywishlist.php"><img border=0 bordercolor= white src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/alreadyinwl_small.gif"></a>';
                                }else{
                                        $lc_text = '</form><form action="addtowishlist.php" method="post"><input type="hidden" name="nexturl" value="' . $PHP_SELF."?".$_SERVER['QUERY_STRING'] . '"><input type="hidden" name="products_id" value="' . $listing_values['products_id'] . '"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_buy_now_small.gif"></form><form>';
                                }
                        }else{    
                                $lc_text = '<a href="registerforrent.php?products_id=' . $listing_values['products_id'] . '"><img border=0 bordercolor= white src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_buy_now_small.gif"></a>';
                        }           
                    if (tep_session_is_registered('customer_id')) {                        
                                $alreadyordered_query = tep_db_query("select * from " . TABLE_ORDERS . " o left join " . TABLE_ORDERS_PRODUCTS ." op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $listing_values['products_id'] . "' ");
                                $alreadyordered = tep_db_fetch_array($alreadyordered_query);
                                if ($alreadyordered['orders_products_id'] > 0){
                                        $lc_text = $lc_text . '<br><img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
                                }
                    }        
            break;
        }
        
        $list_box_contents[$cur_row][] = array('align' => $lc_align,
                                               'params' => 'style="padding:0" class="productListing-data" width=' . $columnwidth,
                                               'text'  => $lc_text);
      }
    }
    new tableBox($list_box_contents, true);

    echo '    </td>' . "\n";
    echo '  </tr>' . "\n";
  } else {
?>
  <tr class="productListing-odd">
    <td colspan="<?php echo $colspan; ?>" class="smallText">&nbsp;<?php echo ($HTTP_GET_VARS['manufacturers_id'] ? TEXT_NO_PRODUCTS2 : TEXT_NO_PRODUCTS); ?>&nbsp;</td>
  </tr>
<?php
  }
?>
  <tr>
    <td colspan="<?php echo $colspan; ?>"><?php echo tep_draw_separator(); ?></td>
  </tr>
<?php
  if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '2' || PREV_NEXT_BAR_LOCATION == '3')) {
?>
  <tr>
    <td colspan="<?php echo $colspan; ?>"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td class="smallText">&nbsp;<?php echo $listing_split->display_count($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?>&nbsp;</td>
        <td align="right" class="smallText">
          &nbsp;
          <?php echo TEXT_RESULT_PAGE; ?> 
          <?php echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); 
          ?>
          &nbsp;
        </td>
      </tr>
    </table></td>
  </tr>
<?php
  }
?>
</table>

