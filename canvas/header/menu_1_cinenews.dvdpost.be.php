<?php 
include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
?>
  <table name="homepage_menu_grey" width="786" border="0" cellpadding="0" cellspacing="0" bgcolor="#5AA8DA" class="TAB_MENU_GREY">
   <tr>
      <td width="226" class="memberlogon">&nbsp;
		<?php  
		switch($languages_id){
		case 1:			
			echo '<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '" class="memberlogon">NL</a>-<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '" class="memberlogon">EN</a>';
		break;
		case 2:
			echo '<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '" class="memberlogon">FR</a>-<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '" class="memberlogon">EN</a>';					
		break;
		case 3:
			echo '<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '" class="memberlogon">FR</a>-<a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '" class="memberlogon">NL</a>';
		break;
		}
		?>		
      </td>
     <td width="105" class="memberlogon">&nbsp;</td>
     <td height='33' valign="middle" align="right">     	     	
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			?>
			<table cellspacing="0" cellpadding="0" border="0" width="350">
			<form name="login" action="/login.php?action=process" method="post">
			<tr>
				<td align="right" height="20" width="151" class="login_input"><font color="#FFFFFF">email&nbsp;:</font></td>
				<td><input class="" name="email_address" type="text"></td>
				<td align="right" height="20" width="15"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif"></td>
				<td align="right" height="20" class="login_input"><font color="#FFFFFF">pass&nbsp;:</font></td>
				<td><input class="" name="password" type="password"></td>
				<td align="right" height="20" width="15"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif"></td>
				<td><input name="imageField" src="<?php  echo DIR_WS_IMAGES;?>button_go3.jpg" type="image" align="middle" border="0" height="19" width="40"></td>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="8" align="absmiddle"></td>
			</tr>
			</form>		
			</table>			
			<?php 
		}else{
			?>
				<a href="logoff.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
			<?php 
		}
		?>
	  </td>     
    </tr>
  </table>