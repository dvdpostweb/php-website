<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
	  <br>
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <?php  $emails_query = tep_db_query("select * from emails where emails_id = '" . $HTTP_GET_VARS['emails_id']  . "' and  customers_id = '" . $customer_id . "' ");
 	  while ($emails = tep_db_fetch_array($emails_query)){?>
      <tr>
        <td width="13" height="25"  valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td height="25"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" Class="slogan_detail"><?php  echo tep_date_short($emails['date_sent']); ?></td>
        <td width="13" height="25" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <tr>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td width="738" height="25" valign="middle" class="SLOGAN_DETAIL_ROUGE"><?php  echo $emails['subject']; ?> </td>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <tr>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td valign="top" class="SLOGAN_BLACK"><?php  echo $emails['full'];	?><br><br></td>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <?php 
  if (strlen($emails['admindate'])>1){
	?>
      <tr>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom_bis.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td height="25" valign="middle" class="slogan_detail"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/line_recom_bis.gif"><?php  echo TEXT_CS_ADMINDATE . ':  ' . tep_date_short($emails['admindate']);?></td>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom_bis.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <tr>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td valign="top" class="SLOGAN_BLACK"><br><?php  echo $emails['adminmessage'];?></td>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <?php  }?>
      <tr>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
        <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
      </tr>
      <?php  } ?>
    </table>
    </td>
  </tr>
</table>
