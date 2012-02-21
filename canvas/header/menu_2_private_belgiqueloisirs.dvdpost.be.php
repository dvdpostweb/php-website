<table name="homepage_menu_ACTIVE-PASSIVE"width="764"  border="0" align="right" cellpadding="0" cellspacing="0" >   
<tr align="left" valign="bottom">
	<?php 
		//if($page_body_to_include=='mydvdpost.php' || $page_body_to_include=='myrecommandation.php' ||$page_body_to_include=='mywishlist.php' ||$page_body_to_include=='custserv_list.php'||$page_body_to_include=='my_profile.php'){
		if($page_body_to_include!='login_adultpwd.php'){		
		echo '<td width="170" class="TAB_MENU_ACTIVE">';
			?><a href="mydvdpost.php" class="typo_menu"><? echo TEXT_DVD_CATALOG;?></a><?
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE2">';
			?>
			<a href="mydvdpost.php" class="typo_menu"><? echo TEXT_DVD_CATALOG ;?></a><?
		}
	?>	
	</td>
	<?php
		if($page_body_to_include=='login_adultpwd.php'){
			echo '<td width="170" class="TAB_MENU_ACTIVE">';
			echo TEXT_CATALOG_X;
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE">';
			?>
			<a href="mydvdxpost.php" class="typo_menu"><? echo TEXT_CATALOG_X;?></a><?
			}
	?>
	</td>
    <td width="424" bgcolor="#757575">		
		<table border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td height="23" background="<?php echo DIR_WS_IMAGES;?>/bckg_2.gif"><img src="<?php echo DIR_WS_IMAGES;?>/blank.gif" width="64" height="3" align="left"></td>
				<td width="170" align="center" valign="middle" class="TAB_button_try"><a href="http://www.belgiqueloisirs.com/" class="typo_menu"><? echo TEXT_BL ;?></a></td>
				<td width="170" align="center" valign="middle" class="TAB_button_formula"><a href="subscription.php" class="typo_menu"><? echo TEXT_FORMULA ;?></a></td>
				<td align="center" valign="middle" class="TAB_nuancier" background="<?php echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php echo DIR_WS_IMAGES;?>/blank.gif" width="100" height="3" align="left"></td>
			</tr>
	  </table>
  
	</td>
  </tr>
</table>