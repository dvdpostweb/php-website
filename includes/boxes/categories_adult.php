<?php 
  //RALPH-005 $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id  from  categories_adult  c, categories_description_adult  cd where  c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");
  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id  from  categories  c, categories_description  cd where c.categories_type = 'DVD_ADULT' and  c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' order by sort_order, cd.categories_name");  //RALPH-005
  while ($categories = tep_db_fetch_array($categories_query))  {
	?>
	<a class="dvdpost_left_menu_link1" href="listing_category_adult.php?cPath=<?php echo $categories['categories_id'];?>"><?php echo $categories['categories_name'] ;?></a><br>
 <?php  
 }
?>
