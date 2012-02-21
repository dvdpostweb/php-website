<div align="right">
<?php 
$img="<img src=";
$img.=DIR_WS_IMAGES;
$img.="separator_link.jpg width=7 height=7>";
//display categories
//RALPH-005 $categories = tep_db_query("select cd.categories_name from products_to_categories_adult c, categories_description_adult cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
$categories = tep_db_query("select cd.categories_name from products_to_categories c, categories_description cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'"); //RALPH-005
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
</div>
<br>
<div align="right">
<?php 
//display themes
//RALPH-004 $themes = tep_db_query("select td.themes_name from products_to_themes_adult t, themes_description_adult td where td.themes_id=t.themes_id and t.products_id = '" . $product_info_values['products_id'] . "' and td.language_id = '" . $languages_id ."'");
$themes = tep_db_query("select td.themes_name from products_to_themes t, themes_description td where td.themes_id=t.themes_id and t.products_id = '" . $product_info_values['products_id'] . "' and td.language_id = '" . $languages_id ."'"); //RALPH-004
$i = 0;
while ($themes_values = tep_db_fetch_array($themes)) {
 if ($i==6) {
    echo '<br>';
	$i=0;
	
  } elseif ($i!=0) {
   echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
  } 
 echo $themes_values['themes_name'];
  $i++;
}
?>
</div>
<br><br>