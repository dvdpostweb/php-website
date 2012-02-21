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
<table width="762" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td><div align="center" class="border"><a href="/contact.php" class="basiclink"><?php echo TEXT_CONTACT_US; ?></a></div></td>
    <td><div align="center" class="border"><a href="/privacy.php" class="basiclink"><?php echo TEXT_CONFIDENTIALITY; ?></a></div></td>
	<td><div align="center" class="border"><a href="/conditions.php" class="basiclink"><?php echo TEXT_CONDITION; ?></a></div></td>		
	<td><div align="center" class="border"><a href="/faq.php" class="basiclink"> FAQ </a></div></td>
	<?php 
	switch($languages_id){
	case 1:
		?> <td><div align="center" class="border"><a class="basiclink" href="javascript:MM_openBrWindow('http://www.tradedoubler.com/pan/program_info?merchant=33301&amp;language=fr','DVDPost','width=513,height=628')"><? echo TEXT_TRADEDOUBLER;?></a></div></td><?
	break;
	case 2:
		?> <td><div align="center" class="border"><a class="basiclink" href="javascript:MM_openBrWindow('http://www.tradedoubler.com/pan/program_info?merchant=33301&amp;language=nl','DVDPost','width=513,height=628')"><? echo TEXT_TRADEDOUBLER;?></a></div></td> <?
	break;
	case 3:
		?> <td><div align="center" class="border"><a class="basiclink" href="javascript:MM_openBrWindow('http://www.tradedoubler.com/pan/program_info?merchant=33301&amp;language=fr','DVDPost','width=513,height=628')"><? echo TEXT_TRADEDOUBLER;?></a></div></td> <?
	break;
	}
	?>
	<td><div align="center" class="border"><a href="/gift_form2_public.php" class="basiclink"><? echo TEXT_GIFT_CHECK;?></a></div></td>	
	<td><div align="center" ><a href="/mydvdpost.php" class="basiclink"><?php echo TEXT_MEMBER_LOGON; ?></a></div></td>
  </tr>
</table>