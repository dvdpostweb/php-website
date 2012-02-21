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

/*$sql ='select * from customers where customers_abo = 1 ';
$result = @mysql_query($sql, $links[0]);
echo '<table>';
while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
	
	$sql2 ='select count(*) nb from customers where customers_abo = 1 and customers_id = '.$data['customers_id'].' and customers_language ='.$data['customers_language'];
	$result2 = @mysql_query($sql2, $links[1]);
	$data2 = mysql_fetch_array($result2, MYSQL_ASSOC);
	
	if ($data2['nb'] == 0)
	{
	echo '<tr><td>'.$data['customers_id'].',</td></tr>';
	}
	
}*/
$sql ='select * from customers where customers_id in (1068413,1068529,1068698)';
$result = @mysql_query($sql, $links[0]);
echo '<table>';
while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$list = '';
	
	foreach($data as $item)
	{
		$list .='"'.$item .'",';
	}
	$list = substr($list,0,-1);
	$sql2 ="insert into customers values (".$list.")";
	echo $sql2;
	echo '<br />';	echo '<br />';
	
	/*$result2 = @mysql_query($sql2, $links[1]);*/
}
mysql_close($links[0]);
mysql_close($links[1]);

?>