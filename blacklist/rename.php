<?php

require('../configure/application_top.php');

$sql ='select * from dvdpost_be_prod.products p where products_studio = 825';
$customers_query = tep_db_query($sql);
$i=1;
$dir = "./playboy/";
//chmod($dir, 0777);

while($data = tep_db_fetch_array($customers_query)){
	for($i=1;$i <=6;$i++)
	{
		$nameFile = $data['imdb_id'].'_'.$i.'.jpg';
		//chmod($dir.$nameFile, 0777);
		rename($dir.$nameFile,$dir.$data['products_model'].$i.'.jpg');
	}

}
?>