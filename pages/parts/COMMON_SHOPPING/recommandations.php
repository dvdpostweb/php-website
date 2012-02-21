<?php
  $top_query = tep_db_query($listing_top_sql . ' order by rand() limit ' . DEFAULT_MAX_TITLES_PER_ROW);
  while ($top = tep_db_fetch_array($top_query)) {
    echo '<td class="main-removed" align="center" width="' . floor(100/DEFAULT_MAX_TITLES_PER_ROW) . '%" valign="top">';
    echo '<a href="product_info.php?products_id=' . $top['products_id'] . '"><img style="border-style:solid;border-width:1px;border-color:#CCCCCC" width="126" height="173" src="' . DIR_WS_IMAGES . '/' . $top['products_image_big'] . '"><br>';
    echo $top['products_name'];
    echo '</a></td>';        
  }
?>