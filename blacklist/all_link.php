<?php
require('../configure/application_top.php');
require('../includes/classes/gfc_actions.php');
$sql ='select * from dvdpost_be_prod.gfc_customers_mem';
$customers_query = tep_db_query($sql);
$i=1;
while($customers = tep_db_fetch_array($customers_query)){
	$father_id = $customers['customer_id'];
	$sql_t = "select GROUP_CONCAT(activation_code SEPARATOR ';') codes from (select activation_code from dvdpost_be_prod.activation_code where activation_code like 'gfc10%' limit ".$i.",1) a";
	$activation_code_query = tep_db_query($sql_t);
	$activation_code = tep_db_fetch_array($activation_code_query);
	$codes = $activation_code['codes'];
	$i=$i+2;
	$action=new gfc_actions();
	$data=$action->execute($father_id,$codes);
	$error=$data['error'];
	$status=$data['status'];
	echo 'customers_id'.$father_id.' codes '.$codes.' linked => status '.$data['status'].' error'. $data['error'].'<br />';
}

?>