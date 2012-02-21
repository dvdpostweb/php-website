        <?php 
		if (tep_session_is_registered('customer_id')){
		?>
			<table width="115">
				<tr>
				  <td width="100%" height="15" valign="middle"><div align="left"><a href="pack_shop.php" class="dvdpost_left_menu_link1_shop"><?php echo TEXT_PACK ;?></a></div></td>
				</tr>		
			</table>
		<?php 		
		}
		else{
		?>
			<table width="115">
				<tr>
				  <td width="100%" height="15" valign="middle"><div align="left"><a href="pack_shop_public.php" class="dvdpost_left_menu_link1_shop"><?php echo TEXT_PACK ;?></a></div></td>
				</tr>		
			</table>
		<?php 		
		}