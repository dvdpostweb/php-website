<table name="homepage_menu_ACTIVE-PASSIVE"width="764"  border="0" align="right" cellpadding="0" cellspacing="0" >   
<tr align="left" valign="bottom">
	<?php  
		//if($page_body_to_include=='mydvdpost.php' || $page_body_to_include=='myrecommandation.php' ||$page_body_to_include=='mywishlist.php' ||$page_body_to_include=='custserv_list.php'||$page_body_to_include=='my_profile.php'){
		if($page_body_to_include=='mydvdpost.php'){		
		echo '<td width="170" class="TAB_MENU_ACTIVE">';
			?><a href="mydvdpost.php" class="typo_menu"><?php  echo TEXT_DVD_CATALOG;?></a><?php 
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE">';
			?>
			<a href="mydvdpost.php" class="typo_menu"><?php  echo TEXT_DVD_CATALOG ;?></a><?php 
		}
	?>	
	</td>
	<?php 
		if($page_body_to_include=='login_adultpwd.php'){
			echo '<td width="170" class="TAB_MENU_ACTIVE">';
			echo TEXT_CATALOG_X;
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE_VOD">';
			?>
			<a href="mydvdxpost.php" class="typo_menu"><?php  echo TEXT_CATALOG_X;?></a><?php 
			}
	?>
	</td>
	<?php  
		if($page_body_to_include!='mydvdshop.php'|| $page_body_to_include!='mydvdpost.php'){
		echo '<td width="170" class="TAB_MENU_ACTIVE">';
			?><a href="mydvdshop.php" class="typo_menu"><?php  echo TEXT_FOOTER_BUY_DVD;?></a><?php 
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE2">';
			?>
			<a href="mydvdshop.php" class="typo_menu"><?php  echo TEXT_FOOTER_BUY_DVD ;?></a><?php 
		}
	?>	
	</td>
    <td width="410" bgcolor="#757575">
		<table border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td background="<?php  echo DIR_WS_IMAGES;?>/bckg_2_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="210" height="3" align="left"></td>
				<td align="center" valign="middle" class="TAB_nuancier" background="<?php  echo DIR_WS_IMAGES;?>/nuancier_shop.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="200" height="3" align="left"></td>
			</tr>
	  </table>	
	</td>
  </tr>
</table>