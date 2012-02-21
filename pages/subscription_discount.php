<div align="center"><script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
  <?php 
  if (!tep_session_is_registered('customer_id')) {$bgcolor='#FFFFFF';}
  else{$bgcolor='#E3E3E3';}  
  ?>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="<?php  echo $bgcolor;?>">
    <tr>
      <td><table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" height="269" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
        <tr>
          <td height="30" colspan="5">&nbsp;</td>
        </tr>
        <tr align="center" valign="top">
          <td height="40" class="TYPO_STD2_GREY">&nbsp;</td>
          <td width="576" height="40" colspan="3" class="TYPO_STD2_GREY"><b><?php  echo TEXT_6_FORMULAS ?></b></td>
          <td height="40" class="TYPO_STD2_GREY">&nbsp;</td>
        </tr>
        <tr>
          <td height="30" colspan="5">&nbsp;</td>
        </tr>        
        <tr>
          <td width="99" height="49" valign="bottom"><table width="100%" height="40" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
            <tr>
              <td width="65" height="40" align="right" valign="middle" class="SLOGAN_GRIS_13px"><?php  echo TEXT_PROMO; ?></td>
              <td width="34" height="40" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/arrow.gif"></td>
            </tr>
          </table>
          </td>
          <td colspan="3" align="center" valign="bottom"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/subscription_table_discount.php')); ?></td>
          <td width="56">&nbsp;</td>
        </tr>
        <tr>
          <td height="70">&nbsp;</td>
          <td height="70" colspan="3" valign="top" class="TYPO_ASTERISK">              <br>
            <?php  //echo TEXT_ASTERISK ;?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="50" colspan="5">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>