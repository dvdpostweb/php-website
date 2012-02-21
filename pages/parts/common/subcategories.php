<?php 
  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' order by sort_order, cd.categories_name");
  while ($categories = tep_db_fetch_array($categories_query)) {
    $thereisundercat = 1;
    $cPath_new = tep_get_path($categories['categories_id']);
    $txtundercat = $txtundercat . '<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new, 'NONSSL') . '">' . $categories['categories_name'] . '</a><br>';
  }
  if ($thereisundercat > 0) {
?>
<td align="left" valign="top" width="20%" class="main-removed">
  <b><u><?php  echo TEXT_UNDER_CATEGORIES ; ?></u></b>
  <br><br>
  <table style="padding:0;spacing:0;width:50%" class="formArea">
    <tr>
      <td class="main-removed" align=left>
        <?php  
          echo $txtundercat;
        ?>
      </td>
    </tr>
  </table>
</td>
<?php 
  }
?>