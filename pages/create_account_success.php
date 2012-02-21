<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
    	<br>
		<?php  
    	echo TEXT_ACCOUNT_CREATED;
        echo '<br><br>';
        echo '<div align="center"><a href="' . FILENAME_SUBSCRIPTION . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a></div>'; 
        ?>
    </td>    
  </tr>
</table>