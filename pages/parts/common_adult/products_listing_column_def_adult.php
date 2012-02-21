<?php 
if (PRODUCTS_LISTING_DISPLAY_SUMMARY) {

    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER, 
                         'PRODUCT_AVAILABILITY' => PRODUCT_LIST_PRICE, 
                         'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY, 
                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT, 
                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE, 
                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);
}else {
    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER, 
                         'PRODUCT_AVAILABILITY' => PRODUCT_LIST_PRICE, 
                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT, 
                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE, 
                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);
}


    asort($define_list);

    $column_list = array();
    reset($define_list);
    while (list($column, $value) = each($define_list)) {
      if ($value) $column_list[] = $column;
    }

  $select_column_list = 'if(to_days(products_date_added)=to_days(curdate()),1,0) added_today,p.rating_users,p.rating_count, products_date_available, p.products_id, p.products_ordered, pd.products_image_big, p.products_studio, p.products_directors_id, p.products_rating, p.products_quantity, p.products_dvd_quantity, products_next, p.products_availability,products_media';


    for ($col=0; $col<sizeof($column_list); $col++) {
      if ( ($column_list[$col] == 'PRODUCT_LIST_BUY_NOW') || ($column_list[$col] == 'PRODUCT_AVAILABILITY') ) {
        continue;
      }

      if ($select_column_list != '') {
        $select_column_list .= ', ';
      }

      switch ($column_list[$col]) {
        case 'PRODUCT_LIST_MODEL':        
          $select_column_list .= 'p.products_model';
        break;
        case 'PRODUCT_LIST_NAME':         
          $select_column_list .= 'pd.products_name';
        break;
        case 'PRODUCT_LIST_MANUFACTURER': 
          $select_column_list .= 's.studio_name';
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $select_column_list .= 'p.products_quantity';
          break;
        case 'PRODUCT_LIST_IMAGE':
          $select_column_list .= 'p.products_image';
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $select_column_list .= 'p.products_weight';
          break;
      }
    }

?>