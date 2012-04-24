<?
require('../configure/configure.php');
foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');
tep_db_connect() or die('Unable to connect to database server!');
$sql = 'select count(*) nb,products_url from dvdpost_be_prod.`products_description` where products_url is not null group by products_url having nb>10 order by nb desc ;';
echo $sql;
$data_query = tep_db_query($sql);

while($customers = tep_db_fetch_array($data_query))
{
	echo $customers['nb'].'<a href="http://'.$customers['products_url'].'">'.$customers['products_url'].'</a><br />';
}
?>
