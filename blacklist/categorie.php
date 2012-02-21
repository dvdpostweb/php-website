<?php
//require('../configure/application_top.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
$links= array();
require(DIR_WS_CLASSES . 'class.phpmailer.php');
$username = DB_SERVER_USERNAME;
$password = DB_SERVER_PASSWORD;
$database = DB_DATABASE;
$servers=array(DB_SERVER,DB_SERVER_RO);

	$link0 = mysql_connect(DB_SERVER, $username, $password);
	mysql_select_db($database);
	$link1 = mysql_connect(DB_SERVER_RO, $username, $password);
	mysql_select_db($database);


$sql ='select * from dvdpost_be_prod.products_to_categories';
$result = @mysql_query($sql, $link1);
echo '<table>';
while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$sql2 ='select count(*) nb from dvdpost_be_prod.products_to_categories where products_id = '.$data['products_id'].' and categories_id = '.$data['categories_id'];
	$result2 = @mysql_query($sql2, $link0);
	$sql4 ='select * from dvdpost_be_prod.products_to_categories where products_id = '.$data['products_id'].' and categories_id = '.$data['categories_id'];
	$result4 = @mysql_query($sql4, $link0);
	$data2 = mysql_fetch_array($result2, MYSQL_ASSOC);
	$sql3="select * from dvdpost_be_prod.categories_description where language_id = 1 and categories_id = ".$data['categories_id'];
	$result3 = @mysql_query($sql3, $link1);
	$data3 = mysql_fetch_array($result3, MYSQL_ASSOC);
	$sql3="select * from dvdpost_be_prod.products_description where language_id = 1 and products_id = ".$data['products_id'];
	$result3 = @mysql_query($sql3, $link1);
	$data4 = mysql_fetch_array($result3, MYSQL_ASSOC);
	if ($data2['nb'] == 0)
	{
	echo '<tr><td>'.$data['products_id'].'</td><td>'.$data4['products_name'].'</td><td>'.$data3['categories_name'].'</td><td>'.$data3['categories_id'].'</td><td>'.$data4['created_at'].'</td></tr>';
	$sql9= 'delete from dvdpost_be_prod.products_to_categories where products_id = '.$data['products_id'].' and categories_id = '.$data3['categories_id'];
	 mysql_query($sql9, $link0);
	}
	
}
mysql_close($link0);
?>