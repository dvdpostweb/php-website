<?php
require('../configure/application_top.php');
$msgid=$_GET['msgid'];
$status=$_GET['status'];
$sql='update registration_sms_status set status="'.$status.'",modify_date=now(),modify_time=now() where senderid='.$msgid;
tep_db_query($sql);
//tep_mail('gs@dvdpost.be','gs@dvdpost.be','sms','msgid'.$msgdd.'  status '.$status.'.'.$sql,'gs@dvdpost.be','gs@dvdpost.be')
?>