<?php
require('../configure/application_top.php');
if(!empty($_GET['number']) && tep_session_is_registered('customer_id'))
{
	$number=$_GET['number'];
	$sql='select * from registration_sms_status where phone='.$_GET['number'].' and customers_id = '.$customer_id.' order by id desc limit 1';
	$query=tep_db_query($sql);
	$values=tep_db_fetch_array($query);
	if(strtolower($values['status'])=='handset')
	{
		echo 'hanset';
	}
	else
	{
		echo 'error';
	}
}
?>