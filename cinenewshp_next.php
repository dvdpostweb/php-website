<?php
require('configure/application_top.php');

echo '<?xml version="1.0" encoding="windows-1252"?>';	 

$tisc = tep_db_query("select * from products p left join products_description pd on p.products_id = pd.products_id where p.in_the_bags_next = 1 and pd.language_id = 3 order by rand() limit 20");  
while ($tisc_values = tep_db_fetch_array($tisc)) {
	echo '<dvd>';
	echo '<id>' . $tisc_values['products_id'] . '</id>';
	echo '<title>' . $tisc_values['products_name'] . '</title>';
		$dir = tep_db_query("select * from directors where directors_id = '" . $tisc_values['products_directors_id'] . "' ");  
		while ($dir_values = tep_db_fetch_array($dir)) {
			echo '<director>' . $dir_values['directors_name'] . '</director>';			
		}
		$act = tep_db_query("select * from products_to_actors pa left join actors a on pa.actors_id = a.actors_id where pa.products_id = '" . $tisc_values['products_id'] . "' ");  
		while ($act_values = tep_db_fetch_array($act)) {
			echo '<actors>' . $act_values['actors_name'] . '</actors>';			
		}
	echo '</dvd>';
}
?>
