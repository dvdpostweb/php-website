<?php 
$img="<img src=";
$img.=DIR_WS_IMAGES;
$img.="separator_link.jpg width=7 height=7>";
//display categories
$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
$i = 0;
while ($categories_values = tep_db_fetch_array($categories)) {
  //if ($i<3) {
  //  echo '<br>';
  //}
  if ($i!=0) {
    
	//echo '<img src='.'DIR_WS_IMAGES'.'separator_link.jpg width=7 height=7>';
	echo $img;
  } 
  echo $categories_values['categories_name'];
  $i++;
}
?>
<br>
<?php 
//display themes
//$themes = tep_db_query("select td.themes_name from " . TABLE_PRODUCTS_TO_THEMES. " t, " . TABLE_THEMES_DESCRIPTION. " td where td.themes_id=t.themes_id and t.products_id = '" . $product_info_values['products_id'] . "' and td.language_id = '" . $languages_id ."'");
//$i = 0;
//while ($themes_values = tep_db_fetch_array($themes)) {
//  if ($i==3) {
//    echo '<br>';
//  } elseif ($i!=0) {
//   echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
//  } 
//  echo $themes_values['themes_name'];
//  $i++;
//}
?>