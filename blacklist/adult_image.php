<?php  
require('../configure/application_top.php');


$sql= "select * from dvdpost_be_prod.products where imdb_id > 0 and products_type='dvd_adult' and imdb_id > 1147597776";
$query = tep_db_query($sql);

$i=0;
echo '<table><tr>';
while($row = tep_db_fetch_array($query))
{
	$i++;
	#echo '<td><table><tr><td>';
	#echo $row['products_id'];
	#echo '<td></tr><tr><td>';
	#echo "<img src='/imagesx/screenshots/".$row['products_model']."1.jpg' width='100'>";
	#echo '</td/></tr></table></td>';
	#if($i==10)
	#{
	#	$i=0;
	#	echo '</tr><tr>';
	#}
	#echo "<img src='./screenshots/".$row['products_model']."1.jpg' width='100'>";
	#copy ("screenshots/".$row['products_model']."1.jpg'", "./screenshots/small/".$row['imdb_id']."_1.jpg'");
	echo $row['products_id'].'<br />';
	for($i=1;$i<=7;$i++)
	{
	  $source = "./screenshots/".$row['products_model'].$i.".jpg";
    $destination = "./screenshots/small/".$row['imdb_id']."_".$i.".jpg";

    $data = file_get_contents($source);
    if($data)
    {
      $handle = fopen($destination, "w");
      fwrite($handle, $data);
      fclose($handle);
    }
  }
  echo 'ok';
}
