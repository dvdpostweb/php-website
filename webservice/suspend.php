<?php
require('../configure/configure.php');
foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');
tep_db_connect() or die('Unable to connect to database server!');
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