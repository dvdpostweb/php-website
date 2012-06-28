<?php  
require('../configure/application_top.php');


$sql= "select * from dvdpost_be_prod.directors where image_active=1";
$query = tep_db_query($sql);

$i=0;
echo '<table><tr>';
while($row = tep_db_fetch_array($query))
{
	$i++;
	echo '<td><table><tr><td>';
	echo $row['directors_id'];
	echo '<td></tr><tr><td>';
	echo "<img src='http://www.dvdpost.be/images/directors/".$row['directors_id'].".jpg' width='100'>";
	echo '</td/></tr></table></td>';
	if($i==10)
	{
		$i=0;
		echo '</tr><tr>';
	}
	
	
}
