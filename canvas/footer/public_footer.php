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
<tr align="center" valign="middle"> 
    <td height="40" colspan="2" class="yellowlink">
		<a href="<?= ruby_host('private') ?><?= $lang_short ?>/info/whoweare" class="yellowlink"><?php    echo TEXT_WHO_WE_ARE; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<a href="<?= ruby_host('private') ?><?= $lang_short ?>/phone_requests/new" class="yellowlink"><?php    echo TEXT_CONTACT_US; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator">
		<a href="<?= ruby_host('private') ?><?= $lang_short ?>/info/privacy" class="yellowlink"><?php    echo TEXT_CONFIDENTIALITY; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<a href="<?= ruby_host('private') ?><?= $lang_short ?>/info/conditions" class="yellowlink"><?php    echo TEXT_CONDITION; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<!--<a href="/jobs.php" class="yellowlink">Jobs</a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> -->
		<a href="<?= ruby_host('private') ?><?= $lang_short ?>/faq" class="yellowlink">FAQ</a>			
	</td>
</tr>
<tr align="center" valign="middle">
    <td height="20" colspan="2" class="yellowlink">
    	© 2002-<?= date('Y') ?> DVDpost<br>
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
	</td>
</tr>
<tr align="center">
    <td colspan="2" class="TYPO_STD_BLACK" align="center">
    	<?php   
    	if ($_SERVER['QUERY_STRING']=='language=nl' && $_SERVER['PHP_SELF']=='/default.php' && $constants['WEB_SITE_ID']==1 ){
	 		echo '<p  align="center" class="login_input">';
	 		echo 'Rent A Wife, the final decision (<a href="http://www.emakina.com/files/rent-a-wife-the-final-decision-nl.pdf" class="login_input"><u>NL</u></a>) ';
	 	}if ($_SERVER['QUERY_STRING']=='language=fr' && $_SERVER['PHP_SELF']=='/default.php' && $constants['WEB_SITE_ID']==1 ){
	 		echo '<p  align="center" class="login_input">';
	 		echo 'Rent A Wife, the final decision (<a href="http://www.emakina.com/files/rent-a-wife-the-final-decision-fr.pdf" class="login_input"><u>FR</u></a>) ';
	 	}
	 	
	 	?>
    </td>
  </tr>