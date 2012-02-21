<?php  
require('../configure/application_top.php');


$sql= "select p.*,pd.* from dvdpost_be_prod.products p
	join dvdpost_be_prod.products_description pd on pd.products_id = p.products_id and pd.language_id = 1
	left join dvdpost_be_prod.products_to_categories pc on pc.products_id = p.products_id and pc.categories_id in (76,72) 

where products_type = 'dvd_adult' and products_status !=-1 and pc.products_id is null limit 4300,1000";
$query = tep_db_query($sql);
echo '<table>';
$i=0;
while($row = tep_db_fetch_array($query))
{
	if ($i==0)
	{
		echo '<tr>';
	}
	$i++;
	echo '<td><table><tr><td>'.$row['products_id'].'</td></tr><tr><td> '.$row['products_name'].'</td></tr>
	<tr><td> <img src ="http://www.dvdpost.be/imagesx/screenshots/'.$row['products_model'].'1.jpg" width="200" /></td></tr>
	</table></td>';
	if ($i==4)
	{
		echo '</tr>';
		$i=0;
	}
}
