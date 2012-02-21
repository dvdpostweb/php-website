<?php  
include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
	switch ($constants['WEB_SITE_ID']) {
	case '10':
	$logo_img='dvdpostlu_background.gif';	
	break;
	case '101':
	$logo_img='dvdpostnl_background.gif';	
	break;
	default:
	$logo_img='dvdpost_background.gif';
	break;
	}
?>
 <table width="960" border="0" align="center" cellpadding="0" cellspacing="0" background="<?php   echo DIR_WS_IMAGES.$logo_img;?>" class="TAB_MENU_GREY" name="homepage_menu_grey">
  	<tr>
		
    <td width="723" rowspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="511" height="35" border="0" align="absmiddle" usemap="#header_map"></td>
		<?php  
		if(WEB_SITE_ID!=101){ 
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
		}
		?>
		<td width="70"><img src="<?php   echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8" align="baseline">&nbsp;<a href="sitemap.php" target="_self"  class="basiclink_menu"><?php   echo TEXT_SITEMAP;?></a><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3" align="absmiddle"> </td>
  	    <td width="42"><img src="<?php   echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8" align="baseline">&nbsp;<a href="faq.php"class="basiclink_menu">FAQ</a><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
  	    <td width="58"><img src="<?php   echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8" align="baseline">&nbsp;<a href="contact.php"class="basiclink_menu"><?php   echo TEXT_CONTACT;?></a><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3" align="absmiddle"></td>
  	</tr>               
	<tr>
		
	<?php   
		if (!tep_session_is_registered('customer_id')) {
			?>
			<td colspan="4" align="right" valign="middle"><a href="/login.php" target="_self" class="memberlogon"><?php   echo TEXT_MEMBER_LOGON;?></a><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
			<?php  
		}else{
			?>
			<td colspan="4" align="right" valign="middle"><a href="logoff.php" target="_self" class="memberlogon"><?php   echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
			<?php  
		}
	?>	
  	</tr>
  </table>
<map name="header_map">
  <area shape="rect" coords="5,6,178,29" href="mydvdpost.php">
</map>

