<?php 
  require(DIR_WS_INCLUDES . 'counter.php');
  require(DIR_WS_INCLUDES . 'stat.php');
?>
<table border="0" width="100%" cellspacing="0" cellpadding="1">
  <tr class="footer">
    <td align="left" class="footer">
    <?php  echo '<a class="basiclink_menu" href="' . tep_href_link(FILENAME_WHOWEARE, '', 'NONSSL') . '" >' . BOX_OFFER_WHOWEARE . '</a>'; ?>
    <img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
	<?php  echo '<a class="basiclink_menu" href="' . tep_href_link(FILENAME_PRIVACY, '', 'NONSSL') . '" >' . BOX_INFORMATION_PRIVACY . '</a>'; ?>
    <img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
	<?php  echo '<a class="basiclink_menu" href="' . tep_href_link(FILENAME_CONDITIONS, '', 'NONSSL') . '" >' . BOX_INFORMATION_CONDITIONS . '</a>'; ?>
    <img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
	<?php  echo '<a class="basiclink_menu" href="/faq.php"class="basiclink_menu">FAQ</a><img src="'.DIR_WS_IMAGES.'/blank.gif" width="6" height="3">'; ?>
	<img src="<?php  echo DIR_WS_IMAGES;?>/red_bloc-.gif" width="4" height="8">&nbsp;
	<?php  echo '<a class="basiclink_menu" href="/contact.php"class="basiclink_menu">'.TEXT_CONTACT.'</a><img src="'.DIR_WS_IMAGES.'/blank.gif" width="6" height="3">';?>
	</tr>
</table>
