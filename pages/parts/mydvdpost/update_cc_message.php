  <tr>
  <?php  
  $sql_query = " SELECT count(*) as total FROM customers WHERE ogone_exp_date = DATE_FORMAT( now( ) , '%m%y' ) AND customers_abo_payment_method =1 AND customers_abo =1 and customers_id='".$customer_id."'";

  $sql_result = tep_db_query($sql_query);
  $sql = tep_db_fetch_array($sql_result);
  
  if ($sql['total'] > 0) {
    ?>	
		<td height="24" width="45" valign="middle"><a href="cc_intro.php"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_mail.gif" width="31" height="18" border="0"></a></td>
		<td height="24" valign="middle" class="SLOGAN_MENU" align="left"><a class="dvdpost_brown_basiclink" href="cc_intro.php"><?php  echo TEXT_TVV_CC;?></a></td>
	
 <?php   }else{ ?>
	<td height="1" colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
 <?php  	
 }
 ?>
 </tr>