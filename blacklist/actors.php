<?php  
require('../configure/application_top.php');


$sql= "select * from dvdpost_be_prod.actors where actors_type = 'dvd_norm' and actors_id > 24832 order by 1 desc";
$query = tep_db_query($sql);
$i=0;
echo '<table><tr>';
while($row = tep_db_fetch_array($query))
{
	$i++;
	echo '<td><table><tr><td>';
	echo $row['actors_id'];
	echo '<td></tr><tr><td>';
	echo $row['actors_name'];
	echo '<td></tr><tr><td>';
	echo "<img src='http://www.dvdpost.be/images/actors/".$row['actors_id'].".jpg' width='100'>";
	echo '</td/></tr></table></td>';
	if($i==4)
	{
		$i=0;
		echo '</tr><tr>';
	}
	
	
}
