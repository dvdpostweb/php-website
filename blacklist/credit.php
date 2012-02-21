<?php
//require('../configure/application_top.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');

tep_db_connect() or die('Unable to connect to database server!');

$sql2='select customer_id,mail_id,count(*) nb  
from tickets t
join message_tickets mt  on t.id = mt.ticket_id 
group by data having nb>1 and nb != 7 limit 1;';
$data_query = tep_db_query($sql2);
while($customers = tep_db_fetch_array($data_query))
{
	$customers_id = $customers['customer_id'];
	$mail_id = $customers['mail_id'];
	$nb = $customers['count'];
	$list_sql = 'select group_concat(t.id) list from tickets t	join message_tickets mt on t.id = mt.ticket_id where customer_id ='.$customers_id.' ;'
	$list_query = tep_db_query($list_sql);
	$list = tep_db_fetch_array($list_query);
	echo $list['list'];
}
?>