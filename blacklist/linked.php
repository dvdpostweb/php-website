<?php
require('../configure/application_top.php');
$father_id=$_GET['father_id'];
$codes=$_GET['codes'];
require('../includes/classes/gfc_actions.php');
$action=new gfc_actions();
$data=$action->execute($father_id,$codes);
$error=$data['error'];
$status=$data['status'];
echo 'linked => '.$data['status'].' error'. $data['error'];
if($data['status']==true)
{
	$son_id=$_GET['son_id'];
	$activation_code=$_GET['activation_code'];
	require_once('../includes/classes/activation_code_actions.php');
	$action=new Activation_code_actions();
	$data=$action->execute($son_id,intval($activation_code));
	$error=$data['error'];
	$status=$data['status'];
	echo '<br />son => '.$data['status'].' error'. $data['error'];
}


?>