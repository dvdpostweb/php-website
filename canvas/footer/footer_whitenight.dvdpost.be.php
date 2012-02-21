<?php
  require(DIR_WS_INCLUDES . 'counter.php');
  require(DIR_WS_INCLUDES . 'stat.php');
?>
<table border="0" align="center" width="<?php echo TABLE_MAIN_WIDTH; ?>" cellspacing="0" cellpadding="1">
  <tr class="footer">
    <td align="center" class="TYPO_STD_BLACK">&nbsp;&nbsp;<?php echo strftime(DATE_FORMAT_LONG); ?>
    &nbsp;|&nbsp;<?php echo '<a class="basiclink" href="' . tep_href_link(FILENAME_WHOWEARE, '', 'NONSSL') . '" class="headerNavigation">' . BOX_OFFER_WHOWEARE . '</a>'; ?>
    &nbsp;|&nbsp;<?php echo '<a class="basiclink" href="' . tep_href_link(FILENAME_PRIVACY, '', 'NONSSL') . '" class="headerNavigation">' . BOX_INFORMATION_PRIVACY . '</a>'; ?>
    &nbsp;|&nbsp;<?php echo '<a class="basiclink" href="' . tep_href_link(FILENAME_CONDITIONS, '', 'NONSSL') . '" class="headerNavigation">' . BOX_INFORMATION_CONDITIONS . '</a>'; ?>
    &nbsp;|&nbsp;<?php echo '<a class="basiclink" href="' . tep_href_link(FILENAME_PRESSE, '', 'NONSSL') . '" class="headerNavigation">' . BOX_INFORMATION_PRESSE . '</a>'; ?>
	</tr>
</table>
<?php
	switch ($languages_id){
		case 1:
			require(SITE_ID . '/footerwnfr2.php'); 
			break; 
		case 2:
			require(SITE_ID . '/footerwnfr2.php'); 
			break;
		case 3:
			require(SITE_ID . '/footerwnfr2.php'); 
			break;
	}
?>