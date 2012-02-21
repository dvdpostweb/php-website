<?php 
	include(DIR_WS_INCLUDES . 'functions\language_switcher.php');
	?>   
  <table name="homepage_menu_grey" width="<?php  echo SITE_WIDTH_PUBLIC; ?>" border="0" align="center" cellpadding="0" cellspacing="0" class="TAB_MENU_GREY">
    <tr>
      <td width="226" class="memberlogon"><a href="/default.php"><img src="<?php  echo DIR_WS_IMAGES;?>logolu.gif" width="226"height="38" border="0" alt="logo DVDPost"></a></td>
      <td width="590" class="memberlogon">&nbsp;</td>
      <td width="400"  class="memberlogon" align="right" valign="middle">
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
		&nbsp;|&nbsp;
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			?>
				<a href="/login.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGON;?></a>
			<?php 
		}else{
			?>
				<a href="/logoff.php" target="_self" class="memberlogon"><?php  echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
			<?php 
		}
		?>	
        &nbsp;|&nbsp;
      	<a href="/faq.php"class="memberlogon"><?php  echo TEXT_HELP ;?></a>
	  </td>     
    </tr>
  </table>