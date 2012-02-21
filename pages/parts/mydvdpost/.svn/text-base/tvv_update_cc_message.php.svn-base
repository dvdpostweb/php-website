  <tr>
  <?php  
  $sql_query = "select   count(c.customers_id) as total from activation_code ac LEFT JOIN customers c on c. activation_discount_code_id=ac.activation_id ";
  $sql_query.= " where c.customers_id=' . $customer_id . ' AND  c. activation_discount_code_type='A' AND ac.activation_group=93 AND c.customers_abo=1 AND (c. ogone_owner is NULL OR  c.ogone_exp_date is NULL OR  c.ogone_card_no is NULL) ";
    
  $sql_result = tep_db_query($sql_query);
  $sql = tep_db_fetch_array($sql_result);
  
  if ($sql['total'] > 0) {
    ?>	
		<td height="24" width="45" valign="middle"><a href="cc_intro.php"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_mail.gif" width="31" height="18" border="0"></a></td>
		<td height="24" valign="middle" class="SLOGAN_MENU" align="left"><a class="dvdpost_brown_basiclink" href="cc_intro.php"><?php  echo $msg['total'] .' '. TEXT_TVV_CC;?></a></td>
	
 <?php   }else{ ?>
	<td height="1" colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
 <?php  	
 }
 ?>
 </tr>