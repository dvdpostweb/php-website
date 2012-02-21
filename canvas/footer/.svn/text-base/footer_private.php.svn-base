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
<?php 
switch ($constants['ENTITY_ID']) {
	case '1':
	$span=9;
	$company= "Home Entertainment Services S.A.";
	break;
	case '38':
	$span=8;
	$company= "Cameo Entertainment N.V.";	
	break;
	default:
    $span=9;
	$company= "Home Entertainment Services S.A.";
	break;
}
?>
<table width="1009" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle"> 
    <td height="40" colspan="2" class="yellowlink">
		<a href="/whoweare.php" class="yellowlink"><?php    echo TEXT_WHO_WE_ARE; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<a href="/contact.php" class="yellowlink"><?php    echo TEXT_CONTACT_US; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator">
		<a href="/privacy.php" class="yellowlink"><?php    echo TEXT_CONFIDENTIALITY; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<a href="/conditions.php" class="yellowlink"><?php    echo TEXT_CONDITION; ?></a>
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
		<!--<a href="/jobs.php" class="yellowlink">Jobs</a>			
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> -->
		<a href="/faq.php" class="yellowlink">FAQ</a>			
		
		<?php  
			if($span==9){
				echo '<img src="'.DIR_WS_IMAGES.'canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator">';
				echo '<a href="/gift_form2.php" class="yellowlink">'.TEXT_GIFT_CHECK.'</a>';
			}
		?>		
		<img src="<?php    echo DIR_WS_IMAGES;?>canvas/footer_separator.png" width="7" height="22" align="absmiddle" class="imgseparator"> 
			<a href="/faq.php" class="yellowlink"><?php  echo TEXT_MEMBER_LOGON ;?></a>
	</td>
  </tr>
  <tr align="center">
    <td colspan="9" class="yellowlink">
		<p align="center">
			© 2002-2008 DVDpost<br>
			<?php 				
				echo $company;
			?>
		</p>
    </td>
  </tr>
</table>