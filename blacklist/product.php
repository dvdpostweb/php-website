<?php  
require('../configure/application_top.php');

$page = $_GET['page'];
if(!isset($page) )
{
	$page = 1;
}
$limit = 1000;
$offset = ($page-1) * $limit;
$sql= "select * from dvdpost_be_prod.products p
left join dvdpost_be_prod.products_to_categories s on s.products_id = p.`products_id`
where products_type = 'dvd_norm' and products_status!=-1 and p.products_id > 126154 and categories_id!=55 group by imdb_id order by p.products_id desc  limit $offset, $limit";
$query = tep_db_query($sql);

$i=0;
echo '<table><tr>';
while($row = tep_db_fetch_array($query))
{
	$i++;
	echo '<td><table><tr><td>';
	echo $row['products_id'].' imdb_id '.$row['imdb_id'];
	echo '<td></tr><tr><td>';
	echo "1<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_1.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_1.jpg'></a>";
	echo "2<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_2.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_2.jpg'></a>";
	echo "3<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_3.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_3.jpg'></a>";
	echo "4<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_4.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_4.jpg'></a>";
	echo "5<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_5.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_5.jpg'></a>";
	echo "6<a href='http://www.dvdpost.be/images/screenshots/big/".$row['imdb_id']."_6.jpg' target='_blank'><img src='http://www.dvdpost.be/images/screenshots/small/".$row['imdb_id']."_6.jpg'></a>";
	echo '</td/></tr></table></td>';
		echo '</tr><tr>';
	
	
}
