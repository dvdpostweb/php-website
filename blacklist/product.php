<?php  
require('../configure/application_top.php');


$sql= "select * from dvdpost_be_prod.products where products_type = 'dvd_norm' and products_status!=-1 and products_id > 126154 group by imdb_id order by products_id desc  limit 5000";
$query = tep_db_query($sql);

$i=0;
echo '<table><tr>';
while($row = tep_db_fetch_array($query))
{
	$i++;
	echo '<td><table><tr><td>';
	echo $row['products_id'];
	echo '<td></tr><tr><td>';
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_1.jpg'>";
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_2.jpg'>";
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_3.jpg'>";
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_4.jpg'>";
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_5.jpg'>";
	echo "<img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_6.jpg'>";
	echo '</td/></tr></table></td>';
		echo '</tr><tr>';
	
	
}
