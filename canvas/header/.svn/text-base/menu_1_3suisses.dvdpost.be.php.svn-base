<?php 
include(DIR_WS_INCLUDES . 'functions\language_switcher.php');
?>
  <table name="homepage_menu_grey" width="800" border="0" cellpadding="0" cellspacing="0" bgcolor="#5AA8DA" class="TAB_MENU_GREY">
   <tr>
		<?php  
		switch($languages_id){
		case 1:			
			echo '<td width="66"><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '" class="basiclink_menu">NL</a><span class="TYPO_STD_BLACK"> - </span><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '" class="basiclink_menu">EN</a></td>';
		break;
		case 2:
			echo '<td width="66"><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '" class="basiclink_menu">FR</a><span class="TYPO_STD_BLACK"> - </span><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '" class="basiclink_menu">EN</a></td>';					
		break;
		case 3:
			echo '<td width="66"><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '" class="basiclink_menu">FR</a><span class="TYPO_STD_BLACK"> - </span><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '" class="basiclink_menu">NL</a></td>';
		break;
		}
		?>
	<?php  	
		if (!tep_session_is_registered('customer_id')) {		
			?>
			<td align="right">
				<img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
				<a href="/faq.php"class="basiclink_menu">FAQ</a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
				<img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
				<a href="/contact.php"class="basiclink_menu"><?php  echo TEXT_CONTACT;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
				<img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
				<a href="/subscription.php" target="_self" class="memberlogon"><?php  echo TEXT_SUBSCRIPTION1;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
				<img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
				<a href="/login.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGON;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
			</td>
			<?php 
		}else{
			?>
			<td align="right"><a href="/logoff.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
			<?php 
		}
	?>	
  	</tr>
  </table>