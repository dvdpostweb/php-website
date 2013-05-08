<?php
require($_SERVER['DOCUMENT_ROOT'].'/includes/classes/class.phpmailer.php');
#tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'suspend 1', "ok".$_GET['customer_id'].$_GET['duration'].$_GET['type'], STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
$recipient = 'gs@dvdpost.be';
$mail = new PHPmailer();
$mail->IsSMTP();
$mail->IsHTML(true);
$mail->Host='mail.dvdpost.local';
$mail->From='gs@dvdpost.be';
$mail->FromName='DVDPost';
$mail->AddAddress($recipient);
$mail->AddReplyTo('gs@dvdpost.be');	
$mail->Subject= 'suspend 1';
$mail->Body="ok".$_GET['customer_id'].$_GET['duration'].$_GET['type'];
if(!$mail->Send()){ //Teste si le return code est ok.
  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
}else
{
	//echo 'ok';
}
$mail->SmtpClose();
unset($mail);

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