<?php
require('../configure/application_top.php');
header ("content-type: text/xml");
$xml='<?xml version="1.0" encoding="UTF-8"?>
<root>';

$customers_id=$_GET['customers_id'];
$activation_code=$_GET['activation_code'];
require_once('../includes/classes/activation_code_actions.php');
$action=new Activation_code_actions();
$data=$action->execute($customers_id,intval($activation_code));
$error=$data['error'];
$status=$data['status'];
if ($error == 7)
{
	$data = parrainage_classic($customers_id);
	$error=$data['error'];
	$status=$data['status'];
	
}
$xml.='<status>'.$status.'</status>';
$xml.='<error>'.$error.'</error>';
$xml.='</root>';
echo $xml;



?>