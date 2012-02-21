<?php 
  require(DIR_WS_INCLUDES . 'counter.php');
  require(DIR_WS_INCLUDES . 'stat.php');
?>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25"><div align="center" class="border"><a href="/whoweare.php" class="basiclink_menu"><?php  echo TEXT_WHO_WE_ARE; ?></a></div></td>
	<td><div align="center" class="border"><a href="/contact.php" class="basiclink_menu"><?php  echo TEXT_CONTACT_US; ?></a></div></td>
    <td><div align="center" class="border"><a href="/privacy.php" class="basiclink_menu"><?php  echo TEXT_CONFIDENTIALITY; ?></a></div></td>
	<td><div align="center" class="border"><a href="/conditions.php" class="basiclink_menu"><?php  echo TEXT_CONDITION; ?></a></div></td>	
	<td><div align="center" class="border"><a href="/faq.php" class="basiclink_menu">FAQ</a></div></td>
	<td><div align="center" class="border"><a href="/gift_how.php" class="basiclink_menu"><?php  echo TEXT_GIFT_CHECK;?></a></div></td>	
	<td><div align="center" ><a href="/mydvdpost.php" class="basiclink_menu"><?php  echo TEXT_MEMBER_LOGON; ?></a></div></td>
  </tr>
  <tr align="center">
    <td colspan="9" class="TYPO_STD_BLACK">
		<p align="center">
			© 2002-2008 DVDpost<br>
			<?php 
				switch ($constants['ENTITY_ID']) {
				case '1':
				$company= "Home Entertainment Services S.A.";
				break;
				case '38':
				$company= "Cameo Entertainment N.V.";	
				break;
				default:
				$company= "Home Entertainment Services S.A.";
				break;
				}
				echo $company;
			?>
		</p>
    </td>
  </tr>
</table>
