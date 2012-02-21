<?php 
  function tep_show_category($counter) {
    global $foo, $categories_string, $id;

    for ($a=0; $a<$foo[$counter]['level']; $a++) {
      $categories_string .= "&nbsp;&nbsp;";
    }

    $categories_string .= '<a href="';

    if ($foo[$counter]['parent'] == 0) {
      $cPath_new = 'cPath=' . $counter;
    } else {
      $cPath_new = 'cPath=' . $foo[$counter]['path'];
    }

    $categories_string .= tep_href_link(FILENAME_DEFAULT, $cPath_new);
    $categories_string .= '&sort=3d">';

    if ( ($id) && (in_array($counter, $id)) ) {
      $categories_string .= '<b>';
    }

// display category name
    $categories_string .= $foo[$counter]['name'];

    if ( ($id) && (in_array($counter, $id)) ) {
      $categories_string .= '</b>';
    }

    if (tep_has_category_subcategories($counter)) {
      //$categories_string .= '-&gt;';
      $categories_string .= '';
    }

    $categories_string .= '</a>';

    if (SHOW_COUNTS == 'true') {
      $products_in_category = tep_count_products_in_category($counter);
      if ($products_in_category > 0) {
        $categories_string .= '&nbsp;(' . $products_in_category . ')';
      }
    }

    $categories_string .= '<br>';

    if ($foo[$counter]['next_id']) {
      tep_show_category($foo[$counter]['next_id']);
    }
  }
?>
<!-- categories //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_CATEGORIES
                              );
  new infoBoxHeading($info_box_contents, true, false);

  $categories_string = '';

  //BEN001 $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");
  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and categories_type = 'DVD_NORM' order by sort_order, cd.categories_name"); //BEN001
  while ($categories = tep_db_fetch_array($categories_query))  {
    $foo[$categories['categories_id']] = array(
                                        'name' => $categories['categories_name'],
                                        'parent' => $categories['parent_id'],
                                        'level' => 0,
                                        'path' => $categories['categories_id'],
                                        'next_id' => false
                                       );

    if (isset($prev_id)) {
      $foo[$prev_id]['next_id'] = $categories['categories_id'];
    }

    $prev_id = $categories['categories_id'];

    if (!isset($first_element)) {
      $first_element = $categories['categories_id'];
    }
  }

  //------------------------
  if ($cPath) {
    $id = split('_', $cPath);
    reset($id);
    while (list($key, $value) = each($id)) {
      $new_path .= $value;
      unset($prev_id);
      unset($first_id);
      //BEN001 $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $value . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");
	  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $value . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and categories_type = 'DVD_NORM' order by sort_order, cd.categories_name"); //BEN001
      $category_check = tep_db_num_rows($categories_query);
      while ($row = tep_db_fetch_array($categories_query)) {
        $foo[$row['categories_id']] = array(
                                            'name' => $row['categories_name'],
                                            'parent' => $row['parent_id'],
                                            'level' => $key+1,
                                            'path' => $new_path . '_' . $row['categories_id'],
                                            'next_id' => false
                                           );

        if (isset($prev_id)) {
          $foo[$prev_id]['next_id'] = $row['categories_id'];
        }

        $prev_id = $row['categories_id'];

        if (!isset($first_id)) {
          $first_id = $row['categories_id'];
        }

        $last_id = $row['categories_id'];
      }
      if ($category_check != 0) {
        $foo[$last_id]['next_id'] = $foo[$value]['next_id'];
        $foo[$value]['next_id'] = $first_id;
      }

   	  $new_path .= '_';
    }
  }

  tep_show_category($first_element); 

  $info_box_contents = array();
  if (MOVIX_LINK) {
  	$info_box_contents[] = array('align' => 'left',
                               'text'  => $categories_string . "<a href='http://" . MOVIX_URL . "'><font color='#e5318d'>" . TEXT_ADULT . "</font></a>"
                              );
  }else{
  	$info_box_contents[] = array('align' => 'left',
                               'text'  => $categories_string
                              );	  
  }
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- categories_eof //-->
