<style type="text/css">
<!--
.Style4 {
	color: #414141;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}

.Style_soft_black {
	color: #000000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}

.Style_soft_white {
	color: #552B7A;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

.Style_min_white {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}

.Style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<form name="form1" method="post" action="gift_complete2_coupon_info.php">
  <table width="761" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="20" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2" valign="top" class="Style4"><b><?php  echo TEXT_OGONE_OK ;?></b></td>
    </tr>
    <tr>
      <td height="30" colspan="2" valign="top" class="Style4"><?php  echo TEXT_CHOSE_LAYOUT ?></td>
    </tr>
    <tr>
      <td height="33" colspan="2" bgcolor="977D8A" class="Style5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="1"><?php  echo TEXT_CHOSE_GIFT_STYLE ; ?></td>
    </tr>
    <tr>
      <td width="228" height="188" align="left" valign="middle" class="Style_soft_black"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="40" height="8">
      <input name="gift" type="radio" value="1" checked><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="8"><?php  echo TEXT_STANDARD_GIFT_STYLE ;?></td>
      <td align="center"><?php  echo TEXT_TABLE_TEMPLATE_1 ;?></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#000000"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="1"></td>
    </tr>
    <tr>
      <td height="188" class="Style_soft_black"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="40" height="8">
      <input type="radio" name="gift" value="2">
      <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="8"><?php  echo TEXT_FUN_GIFT_STYLE ;?></td>
      <td align="center"><?php  echo TEXT_TABLE_TEMPLATE_2 ;?></td>
    </tr>
    <tr bgcolor="#977D8A">
      <td height="33" colspan="2" bgcolor="977D8A" class="Style5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="1"><?php  echo TEXT_SEND_GIFT_BY_MAIL ; ?></td>
    </tr>
    <tr>
      <td height="80" colspan="2" class="Style_soft_black"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="40" height="8">
        <input name="by_mail" type="checkbox" id="by_mail" value="1">      
      <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="8"><?php  echo TEXT_WANT_TO_RECEIVE_IT ;?></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/bt_gift_confirm.jpg" width="129" height="34" border="0"></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
