  <tr>
  <?php  
  //query payment problem
  $msg_query = 'select count(*) total';
  $msg_query .= ' from payment';
  $msg_query .= ' where customers_id=' . $customer_id . ' ';
  $msg_query .= ' and payment_status in (13,14,15,16,17,18,19,20,21,22)';

  $msg_result = tep_db_query($msg_query);
  $msg = tep_db_fetch_array($msg_result);
  
  if ($msg['total'] > 0) {
    ?>	
		<td height="24" width="45" valign="middle"><a href="messages_urgent.php"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_mail.gif" width="31" height="18" border="0"></a></td>
		<td height="24" valign="middle" class="SLOGAN_MENU" align="left"><a class="dvdpost_brown_basiclink" href="messages_urgent.php"><?php   echo $msg['total'] .' '. TEXT_NEW_MESSAGES;?></a></td>
	
 <?php   }else{
	 	//query update client profile
		$msg2_query = 'SELECT count(*) as cpt_address  FROM address_book WHERE customers_id =' . $customer_id . ' ';
		$msg2_result = tep_db_query($msg2_query);
  		$msg2 = tep_db_fetch_array($msg2_result);
		if ($msg2['cpt_address']<1) {
    		?>	
			<td height="24" width="45" valign="middle"><a href="messages_urgent.php"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_mail.gif" width="31" height="18" border="0"></a></td>
			<td height="24" valign="middle" class="SLOGAN_MENU" align="left"><a class="dvdpost_brown_basiclink" href="account.php"><?php   echo TEXT_EDIT_ACCOUNT;?></a></td>
	
 		<?php   }else{ 	
		?>
		<td height="1" colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
		<?php  
		}
	} 
?>
 </tr>