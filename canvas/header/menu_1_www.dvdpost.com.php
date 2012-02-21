<?php 
include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
?> 
 <table name="homepage_menu_grey" width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0" class="TAB_MENU_GREY">
  	<tr>
		<td width="504" rowspan="2"><a href="/"><img src="<?php  echo DIR_WS_IMAGES;?>logocom.gif" width="248"height="38" border="0"></a></td>
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
  	    <td width="54">&nbsp;</td>
  	    <td width="52"><img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;<a href="faq.php"class="basiclink_menu">FAQ</a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	    <td width="55"><img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;<a href="contact.php"class="basiclink_menu"><?php  echo TEXT_CONTACT;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	</tr>               
	<tr>
     <td><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	</tr>
  </table>