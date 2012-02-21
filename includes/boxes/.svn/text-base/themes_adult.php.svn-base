<?php 
  //RALPH-004 $themes_query = tep_db_query("select c.themes_id, cd.themes_name, c.parent_id  from  themes_adult  c, themes_description_adult  cd where  c.themes_id = cd.themes_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.themes_name");
  $themes_query = tep_db_query("select c.themes_id, cd.themes_name, c.parent_id  from  themes  c, themes_description  cd where  c.themes_type = 'DVD_ADULT' and c.themes_id = cd.themes_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.themes_name"); //RALPH-004
if(SITE_ACCESS=='PUBLIC')
	$link='listing_category_public.php';
else
	$link='listing_category_adult.php';
  while ($themes = tep_db_fetch_array($themes_query))  {
    
    if(SITE_ACCESS!='PUBLIC')
		echo '<a class="dvdpost_left_menu_link1" href="'.$link.'?list='.$themes['themes_id'].'">'.$themes['themes_name'].'</a><br>';
	else
		echo '<a class="dvdpost_left_menu_link1" href="'.themes_link($lang_short,$themes['themes_name'],$themes['themes_id']).'">'.$themes['themes_name'].'</a><br>';
   
  }
?>



