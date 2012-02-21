<tr> 
    
	<td width="12">&nbsp;</td>
    <td width="423" background="<?php  echo DIR_WS_IMAGES ;?>step/bckg_step2.gif" bgcolor="#FFFFFF"> 
      <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">        
          <tr> 
            <td height="40" class="limitedathome" align="left">
            	<br><?php  echo TEXT_START_HERE_NOW ;?><br><br>
            	<?php  echo TEXT_SUBSCRIBE_NOW.' <a href="subscription.php" class="limitedathome"><u><font color="#D71921">'.TEXT_CLICK_HERE.'</font></u></a>.' ;?><br><br>
            	<?php  echo TEXT_CLIENT_NUMBER.'<b>'.$customer_id.'</b>' ;?><br><br>            	
            </td>      
          </tr>
          <tr>
			<td>
				<table width="100%" cellspacing="0" cellpadding="0" border="0">					
					<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/urgent_message.php'));?>
				</table>
			</td>
		  </tr>
          <tr> 
            <td height="20" class="bottom_line_style" align="left">
            	&nbsp;
            </td>      
          </tr>
          <tr> 
            <td height="20" align="left">
            	&nbsp;
            </td>      
          </tr>		  
		  <tr> 
            <td height="40" class="limitedathome" align="left">
            	<br>
            	<a href="activation_code.php" class="limitedathome"><u><?php  echo TEXT_PROMO_CODE2 ;?></u><br><br>
            	<a href="gift_history.php" class="limitedathome"><u><?php  echo TEXT_GIFT_HISTORY ;?></u><br><br>            	
            	<?php  //echo '<a href="mydvdshop.php" class="limitedathome"><u>'.TEXT_BUY_DVD.'</u><br><br>'; ?>
            	<a href="account.php" class="limitedathome"><u><?php  echo TEXT_MODIFY_ACCOUNT ;?></u><br><br>
            	<a href="custserv_list.php" class="limitedathome"><u><?php  echo TEXT_CONTACT_US ;?></u><br><br>
            </td>      
          </tr>            
      </table>
    </td>
    <td width="12">&nbsp;</td>
</tr>