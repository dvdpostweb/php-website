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

$i=0;
$sql ='select * from dvdpost_be_prod.customers where customers_abo = 1;';
$result = @mysql_query($sql, $link1);
echo '<table>';
while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
	
	$sql2 ='select * from dvdpost_be_prod.customers where customers_id = '.$data['customers_id'];
	$result2 = @mysql_query($sql2, $link0);
	$data2 = mysql_fetch_array($result2, MYSQL_ASSOC);
	if ($data2['customers_abo_dvd_credit'] != $data['customers_abo_dvd_credit'])
	{
	echo '<tr><td>'.$data['customers_id'].'</td><td>'.$data2['customers_abo_dvd_credit'].' != '.$data['customers_abo_dvd_credit'].'</td></tr>';
	$i++;
	}
	
}
echo "i".$i;
mysql_close($link0);
?>