<?php  echo tep_draw_form('account_edit', tep_href_link(FILENAME_ACCOUNT_EDIT_PROCESS, '', 'SSL'), 'post', 'onSubmit="return check_form();"') . tep_draw_hidden_field('action', 'process'); ?>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
	  <?php  
		  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/account/account_details.php'));
	  ?>    
    </td>    
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL"><?php  echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
    <td class="SLOGAN_DETAIL" align="right"><?php  echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
  </tr>
</table>
</form>