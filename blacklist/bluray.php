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
foreach($servers as $server){
	$db_link = @mysql_connect($server, $username, $password);
		mysql_select_db($database);
		@array_push($links,$db_link);
}

$sql ='select * from dvdpost_be_prod.message_tickets where mail_id = 582 and data like "%bluray%";';
$result = @mysql_query($sql, $links[0]);
echo '<table>';
#echo mysql_num_rows($result);
while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
$text= $data['data'];	
	
	$var = explode(";;;", $text);
	foreach($var as $value)
	{
		$dat= explode(':::', $value);
		if($dat[0]=='$$$product_id$$$')
		{
			$sql2 = 'select * from dvdpost_be_prod.products where products_id = '.$dat[1];
			$result2 = @mysql_query($sql2, $links[0]);
			$movie = mysql_fetch_array($result2, MYSQL_ASSOC);
			if($movie['products_media']=='DVD')
			{
				echo $data['id'].',';
			}
			else
			{
			}
			
		}
	}
	
}
mysql_close($links[0]);
?>