<?php
  require(DIR_WS_INCLUDES . 'counter.php');
  require(DIR_WS_INCLUDES . 'stat.php');
?>
<table width="786" border="0" align="center" cellpadding="0" cellspacing="0" class="TAB_MENU_GREY">
  <tr>               
    <td><div align="center" class="border"><a href="/whoweare.php" class="basiclink_menu"><?php echo TEXT_WHO_WE_ARE; ?></a></div></td>
	<td><div align="center" class="border"><a href="/contact.php" class="basiclink_menu"><?php echo TEXT_CONTACT_US; ?></a></div></td>
    <td><div align="center" class="border"><a href="/privacy.php" class="basiclink_menu"><?php echo TEXT_CONFIDENTIALITY; ?></a></div></td>
	<td><div align="center" class="border"><a href="/conditions.php" class="basiclink_menu"><?php echo TEXT_CONDITION; ?></a></div></td>		
	<td><div align="center" class="border"><a href="/faq.php" class="basiclink_menu">FAQ</a></div></td>
	<td><div align="center" class="border"><a href="/gift_form2_public.php" class="basiclink_menu"><? echo TEXT_GIFT_CHECK;?></a></div></td>
	<td><div align="center" ><a href="/mydvdpost.php" class="basiclink_menu"><?php echo TEXT_MEMBER_LOGON; ?></a></div></td>
  </tr>
</table>
</table>  
  <tr>
	<td colspan="7">
	  <?php require('canvas/footer/'.SITE_ID . '/footer.php'); ?>
	</td>
  </tr>
</table>
