<?php 
//header ("Content-type: image/png"); 

require('configure/application_top.php');


if ($HTTP_GET_VARS['mail_id']>0){
//------------------------------------------------ DB CONNECT + DB INSERTION -----------------------------
	$sql = "update mail_messages_sent_history  set mail_opened=ifnull(mail_opened,0)+1,  mail_opened_date = if( mail_opened_date is null, now(),  mail_opened_date) where  mail_messages_sent_history_id = '".$HTTP_GET_VARS['mail_id']."';";
	$status = tep_db_query($sql);	
	$sql = "update message_tickets set `is_read`=1, updated_at = now() where mail_history_id= ".$HTTP_GET_VARS['mail_id'].";";
	$status = tep_db_query($sql);	
//------------------------------------------------------- END ---------------------------------------------
}
//$im = ImageCreate (1, 1)
//$img = ImageColorAllocate ($im, 255, 255, 255);  
//ImagePng ($im); 

//echo '<img src="pixel.gif">';

require('configure/application_bottom.php');
?>