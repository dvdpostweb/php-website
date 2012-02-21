<?php 
  require(DIR_WS_INCLUDES . 'counter.php');
  require(DIR_WS_INCLUDES . 'stat.php');
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center" class="border"><a href="/whoweare.php" class="basiclink_menu"><?php  echo TEXT_WHO_WE_ARE; ?></a></div></td>
	<td><div align="center" class="border"><a href="/contact.php" class="basiclink_menu"><?php  echo TEXT_CONTACT_US; ?></a></div></td>
    <td><div align="center" class="border"><a href="/privacy.php" class="basiclink_menu"><?php  echo TEXT_CONFIDENTIALITY; ?></a></div></td>
	<td><div align="center" class="border"><a href="/conditions.php" class="basiclink_menu"><?php  echo TEXT_CONDITION; ?></a></div></td>		
	<td><div align="center" class="border"><a href="/faq.php" class="basiclink_menu"> FAQ </a></div></td>
	
	<?php  if (!$customers_registration_step) {
	echo '<td><div align="center" class="border"><a href="/gift_form2_public.php" class="basiclink_menu">'.TEXT_GIFT_CHECK.'</a></div></td>';
	//echo '<td><div align="center" class="border"><a href="jobs.php" class="basiclink_menu">Jobs</a></div></td>';		
	echo '<td><div align="center" ><a href="/mydvdpost.php" class="basiclink_menu">'.TEXT_MEMBER_LOGON.'</a></div></td>';
	$colspan=8;
	} else {
	echo '<td><div align="center" class="border"><a href="/gift_form2.php" class="basiclink_menu">'.TEXT_GIFT_CHECK.'</a></div></td>';
	//echo '<td><div align="center"><a href="jobs.php" class="basiclink_menu">Jobs</a></div></td>';
	$colspan=7;		
	} ?>
  </tr>
  <tr align="center">
    <td colspan="<?php  echo $colspan ;?>" class="TYPO_STD_BLACK" align="center"><br> &copy; 2002-2007 DVDpost<br>Home Entertainment Services S.A.</td>
  </tr>
</table>