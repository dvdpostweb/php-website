<table width="764" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<?php  
		if($page_body_to_include=='mydvdxpost.php'){
			echo '<td width="20%" valign="middle" class="TAB_MENU2_ACTIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_home_active.jpg" width="15" height="15" align="texttop">';
		}else{
			echo '<td width="20%" valign="middle" class="TAB_MENU2_PASSIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_home_passive.jpg" width="15" height="15" align="texttop">';
		}
	?>
    
    <a href="mydvdxpost.php" class="dvdpost_menu3_private"><?php  echo TEXT_HOMEX;?></a>
    </td>
    
    <?php  
		if($page_body_to_include=='mywishlist_adult.php'){
			echo '<td width="20%" valign="middle" class="TAB_MENU2_ACTIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_vod_active.jpg" width="15" height="15" align="texttop">';
		}else{
			echo '<td width="20%" valign="middle" class="TAB_MENU2_PASSIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_vod_passive.jpg" width="15" height="15" align="texttop">';
		}
	?>
    
    <a href="vodx.php" class="dvdpost_menu3_private">VODX</a>
    </td>
    
	<?php  
		if($page_body_to_include=='mywishlist_adult.php'){
			echo '<td width="20%" valign="middle" class="TAB_MENU2_ACTIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_list_active.jpg" width="15" height="15" align="texttop">';
		}else{
			echo '<td width="20%" valign="middle" class="TAB_MENU2_PASSIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_list_passive.jpg" width="15" height="15" align="texttop">';
		}
	?>
    
    <a href="mywishlist_adult.php" class="dvdpost_menu3_private"><?php  echo TEXT_MY_LIST_ADULT ; ?></a>
    </td>
	<?php  
		if($page_body_to_include=='custserv_list.php'){
			echo '<td width="20%" valign="middle" class="TAB_MENU2_ACTIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_mail_active.jpg" width="15" height="15" align="texttop">';
		}else{
			echo '<td width="20%" valign="middle" class="TAB_MENU2_PASSIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_mail_passive.jpg" width="15" height="15" align="texttop">';
		}
	?>
    
    <a href="custserv_list.php" class="dvdpost_menu3_private"><?php  echo TEXT_MY_MESSAGES; ?></a> 
    </td>
	<?php  
		if($page_body_to_include=='my_profile_adult.php'){
			echo '<td width="20%" valign="middle" class="TAB_MENU2_ACTIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_profile_active.jpg" width="15" height="15" align="texttop">';
		}else{
			echo '<td width="20%" valign="middle" class="TAB_MENU2_PASSIVE">';
			echo '<img src="'.DIR_WS_IMAGES . 'menu_private_adult_pictos/logo_menu2_profile_passive.jpg" width="15" height="15" align="texttop">';
		}
	?>
    <a href="my_profile_adult.php" class="dvdpost_menu3_private"><?php  echo TEXT_MY_ACCOUNT ?></a> 
	</td>
  </tr>
  <tr>
    <td colspan="6" nowrap background="<?php  echo DIR_WS_IMAGES;?>/menu3_line.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></td>
  </tr>
</table>
