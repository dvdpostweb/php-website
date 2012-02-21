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
group by data having nb>1 and nb != 7;';
$data_query = tep_db_query($sql2);
while($customers = tep_db_fetch_array($data_query))
{
	$customers_id = $customers['customer_id'];
	$mail_id = $customers['mail_id'];
	$nb = $customers['nb'];
	$list_sql = 'select group_concat(t.id) list from tickets t	join message_tickets mt on t.id = mt.ticket_id where customer_id ='.$customers_id.' and mail_id = '.$mail_id.' ;';
	$list_query = tep_db_query($list_sql);
	$list = tep_db_fetch_array($list_query);
	$check = 'select count(*) nb from tickets t join message_tickets mt on t.id = mt.ticket_id where ticket_id in('.$list['list'].') ;';
	$check_query = tep_db_query($check);
	$check = tep_db_fetch_array($check_query);
	if($check['nb'] == $nb)
	{
		echo 'ok <br />';
		echo $list['list'].'<br />';
		$del = 'delete from tickets  where id in('.$list['list'].') limit '.($nb-1).';';
		echo $del;
		tep_db_query($del);
	}
	else
	{
		echo 'not ok '.$check['nb'].' == '.$nb.'<br />';
		echo $list['list'].'<br />';	
	}
}
?>