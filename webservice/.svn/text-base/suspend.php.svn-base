<?php
require('../configure/application_top.php');
header ("content-type: text/xml");
$xml='<?xml version="1.0" encoding="UTF-8"?>
<root>';

$customer_id=$_GET['customer_id'];
$user_id=$_GET['user_id'];
$duration=$_GET['duration'];
$type=$_GET['type'];
require_once('../includes/classes/suspend.php');
$suspension = new Suspend();
$data=$suspension->execute(intval($customer_id),intval($user_id),intval($duration),strtoupper($type));
$error=$data['error'];
$status=$data['status'];

$xml.='<status>'.$status.'</status>';
$xml.='<error>'.$error.'</error>';
$xml.='</root>';
echo $xml;



?>