<?php
require('../configure/application_top.php');
header ("content-type: text/xml");
$xml='<?xml version="1.0" encoding="UTF-8"?>
<root>';

$customers_id=$_GET['customers_id'];
$codes=$_GET['codes'];
require('../includes/classes/gfc_actions.php');
$action=new gfc_actions();
$data=$action->execute($customers_id,$codes);
$error=$data['error'];
$status=$data['status'];
$xml.='<status>'.$status.'</status>';
$xml.='<error>'.$error.'</error>';
$xml.='</root>';
echo $xml;



?>