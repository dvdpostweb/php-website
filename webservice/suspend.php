<?php
require(DIR_WS_CLASSES . 'class.phpmailer.php');
tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'suspend 1', "ok".$_GET['customer_id'].$_GET['duration'].$_GET['type'], STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

require('../configure/configure.php');
foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');

tep_db_connect() or die('Unable to connect to database server!');
tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'suspend 2', "ok".$_GET['customer_id'].$_GET['duration'].$_GET['type'], STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');

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