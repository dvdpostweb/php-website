<?php 
//header ("Content-type: image/png"); 

require('configure/application_top.php');


  $query = tep_db_query("update mem_get_mem  set mail_opened=ifnull(mail_opened,0)+1,  mail_opened_date = if( mail_opened_date is null, now(),  mail_opened_date) where  mem_get_mem_id = '".$HTTP_GET_VARS['EmailMgt']."' ");


require('configure/application_bottom.php');
?>