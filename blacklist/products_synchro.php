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


$sql ='select * from dvdpost_be_prod.products where products_type != "abo" and products_id !=0 order by products_id desc';
$result = @mysql_query($sql, $link1);
echo '<table>';

while($data = mysql_fetch_array($result, MYSQL_ASSOC))
{
  #var_dump($data);
	$sql2 ='select * from dvdpost_be_prod.products where  products_id = '.$data['products_id'];
	$result2 = @mysql_query($sql2, $link0);
	$data2 = mysql_fetch_array($result2, MYSQL_ASSOC);
	$res = array_diff_assoc($data2,$data);
	if (count($res)>0)
	{
	echo '<tr><td>products_id '.$data['products_id'].'<pre>dump';
	var_dump($res);
	echo '</pre></td></tr>';
	$sql_dublin = 'update products set ';
	$i=0;
	while (list($key, $value) = each($res)) {
			if ($i==0)
			  $sql_dublin .= $key.' = "'.$value.'"';
			else
				$sql_dublin .= ','.$key.' = "'.$value.'"';
			$i++;
	}
	$sql_dublin .=' where products_id = '.$data['products_id'].';';
	echo $sql_dublin.'<br />';
	#mysql_query($sql_dublin, $link1);
	}
	
}
mysql_close($link0);
mysql_close($link1);

?>