<table name="homepage_menu_ACTIVE-PASSIVE"width="764"  border="0" align="right" cellpadding="0" cellspacing="0" >   
<tr align="left" valign="bottom">
	<?php   
		//if($page_body_to_include=='mydvdpost.php' || $page_body_to_include=='myrecommandation.php' ||$page_body_to_include=='mywishlist.php' ||$page_body_to_include=='custserv_list.php'||$page_body_to_include=='my_profile.php'){
		if($page_body_to_include!='login_adultpwd.php'){		
		echo '<td width="170" class="TAB_MENU_ACTIVE">';
			?><a href="mydvdpost.php" class="typo_menu"><?php   echo TEXT_DVD_CATALOG;?></a><?php  
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE2">';
			?>
			<a href="mydvdpost.php" class="typo_menu"><?php   echo TEXT_DVD_CATALOG ;?></a><?php  
		}
	?>	
	</td>
	<?php  
		if($page_body_to_include=='login_adultpwd.php'){
			echo '<td width="170" class="TAB_MENU_ACTIVE_VOD">';
			echo TEXT_CATALOG_X;
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE_VOD">';
			?>
			<a href="mydvdxpost.php" class="typo_menu"><font color="#ffffff"><?php   echo TEXT_CATALOG_X;?></font></a><?php  
			}
	?>
	</td>
	<?php
	 if(WEB_SITE!='nl')
 	 { 
		
		if($page_body_to_include=='mydvdshop_adult.php'){
		echo '<td width="170" class="TAB_MENU_ACTIVE">';
			?><a href="mydvdshop.php" class="typo_menu"><?php   echo TEXT_FOOTER_BUY_DVD;?></a><?php  
		}else{
			echo '<td width="170" class="TAB_MENU_PASSIVE">';
			?>
			<a href="mydvdshop.php" class="typo_menu"><font color="#8AABE3"><?php   echo TEXT_FOOTER_BUY_DVD ;?></font></a><?php  
		}
	 }
	?>	
	</td>	
    <td width="424" bgcolor="#757575" >
		
		<?php  
		$customers = tep_db_query("select customers_abo, customers_abo_payment_method  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
		$customers_values2 = tep_db_fetch_array($customers);
		if ($customers_values2['customers_abo'] > 0 || $customers_values2['customers_abo_payment_method'] == 2|| $customers_values2['customers_abo_payment_method'] == 3) {?>
		<table border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td bgcolor="#06A5DD" background="<?php   echo DIR_WS_IMAGES;?>/bckg_2.gif"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="64" height="3" align="left"></td>
				<td align="center" valign="middle" class="TAB_nuancier" background="<?php   echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="190" height="3" align="left"></td>
			</tr>
	  </table>	
	  <?php   }else { 
			$freetrial_query = tep_db_query("select * from abo where action in (1,5,6,8,9,10) and customerid = '" . $customer_id . "' ");
			$freetrial = tep_db_fetch_array($freetrial_query);
			if ($freetrial['abo_id'] > 0){
			?>	
			<table border="0" align="right" cellpadding="0" cellspacing="0">
				<tr>
					<td bgcolor="#050505" background="<?php   echo DIR_WS_IMAGES;?>/bckg_2.gif"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="64" height="3" align="left"></td>
					<td width="170" align="center" valign="middle" class="TAB_button_formula"><a href="subscription.php" class="typo_menu"><?php   echo TEXT_FORMULA ;?></a></td>
					<td align="center" valign="middle" class="TAB_nuancier" background="<?php   echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="190" height="3" align="left"></td>
				</tr>
			</table>	
			<?php   }else{ ?>
		<table border="0" align="right" cellpadding="0" cellspacing="0">
			<tr>
				<td height="23" bgcolor="#06A5DD" background="<?php   echo DIR_WS_IMAGES;?>/bckg_2.gif"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="64" height="3" align="left"></td>
				<td width="170" align="center" valign="middle" class="TAB_button_try"><a href="freetrial.php" class="typo_menu"><?php   echo TEXT_TRY ;?></a></td>
				<td width="170" align="center" valign="middle" class="TAB_button_formula"><a href="subscription.php" class="typo_menu"><?php   echo TEXT_FORMULA ;?></a></td>
				<td align="center" valign="middle" class="TAB_nuancier" background="<?php   echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php   echo DIR_WS_IMAGES;?>/blank.gif" width="100" height="3" align="left"></td>
			</tr>
	  </table>
	  <?php   }} ?>
	</td>
  </tr>
</table>