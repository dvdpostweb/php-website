        <table width="115">
		<?php
				if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) { $link='dvdforsale_listing_public.php';}
				else{$link='dvdforsale_listing.php';}
		?>
				<tr>
					<td width="100%" height="15" valign="middle"><div align="left"><a href="<?php echo $link;?>" class="dvdpost_left_menu_link1"><?php echo TEXT_SEEALL_DVD_TO_BUY;?></a></div></td>
 				</tr>
		</table>