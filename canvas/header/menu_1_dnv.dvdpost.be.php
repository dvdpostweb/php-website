   <table name="homepage_menu_grey" width="<?php  echo SITE_WIDTH_PUBLIC; ?>" border="0" align="center" cellpadding="0" cellspacing="0" class="TAB_MENU_GREY">
  	<tr>
		<td width="504" rowspan="2"><a href="/default.php"><img src="<?php  echo DIR_WS_IMAGES;?>logo.gif" width="226"height="38" border="0" alt="logo DVDPost"></a></td>
  	    <td width="54">&nbsp;</td>
  	    <td width="52"><img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;<a href="/faq.php"class="basiclink_menu">FAQ</a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	    <td width="55"><img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;<a href="/contact.php"class="basiclink_menu"><?php  echo TEXT_CONTACT;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	</tr>               
	<tr>
	<?php  
		if (!tep_session_is_registered('customer_id')) {
			?>
			<td colspan="4"align="right">
				<a href="" target="_self" class="memberlogon"></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
				<a href="" target="_self" class="memberlogon"></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
			</td>
			<?php 
		}else{
			?>
			<td colspan="4"align="right"><a href="/logoff.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
			<?php 
		}
	?>	
  	</tr>
  </table>