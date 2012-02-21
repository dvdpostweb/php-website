<?php 
?>
<!-- themes //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_THEMES
                              );
  new infoBoxHeading($info_box_contents, true, false);

  $themes_string = '';

  //BEN001 $themes_query = tep_db_query("select c.themes_id, cd.themes_name, c.parent_id from " . TABLE_THEMES . " c, " . TABLE_THEMES_DESCRIPTION . " cd where  c.themes_id = cd.themes_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.themes_name");
  $themes_query = tep_db_query("select c.themes_id, cd.themes_name, c.parent_id from " . TABLE_THEMES . " c, " . TABLE_THEMES_DESCRIPTION . " cd where  c.themes_id = cd.themes_id and cd.language_id='" . $languages_id ."' and themes_type = 'DVD_NORM' order by sort_order, cd.themes_name"); //BEN001
  while ($themes = tep_db_fetch_array($themes_query))  {
    $themes_string = $themes_string . '- <a href="' . tep_href_link(FILENAME_PRODUCTS_NEW, 'list=' . $themes['themes_id']) . '">' . $themes['themes_name'] . '</a><br>' ;  
  }


  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => $themes_string 
                              );
  
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- themes_eof //-->
