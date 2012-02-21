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
  else{$bgcolor='#E3E3E3';}?>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="<?php  echo $bgcolor;?>">
    <tr>
      <td><table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" height="631" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
        <tr>
          <td height="30" colspan="6">&nbsp;</td>
        </tr>
        <tr align="center" valign="top">
          <td height="40" colspan="2" class="TYPO_STD2_GREY">&nbsp;</td>
          <td height="40" colspan="3" class="TYPO_STD2_GREY"><b><?php  echo TEXT_6_FORMULAS ?></b></td>
          <td height="40" class="TYPO_STD2_GREY">&nbsp;</td>
        </tr>
        <tr>
          <td height="129" colspan="2">&nbsp;</td>
          <td height="129" colspan="3" rowspan="4" align="center"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/subscription_table_prepay.php')); ?></td>
          <td width="56">&nbsp;</td>
        </tr>
        <tr>
          <td width="65" height="40" align="right" valign="middle" class="SLOGAN_GRIS_13px">1 <?php  echo TEXT_MONTH; ?></td>
          <td width="34" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/arrow.gif"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="65" height="50" align="right" valign="middle" class="SLOGAN_GRIS_13px">3 <?php  echo TEXT_MONTHS; ?> </td>
          <td width="34" height="50" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/arrow.gif"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="50" align="right" valign="middle" class="SLOGAN_GRIS_13px">6 <?php  echo TEXT_MONTHS ;?> </td>
          <td height="50" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/arrow.gif"></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="70" colspan="2">&nbsp;</td>
          <td height="70" colspan="3" valign="top" class="TYPO_ASTERISK"><br>
              <?php  echo TEXT_ASTERISK ;?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" rowspan="3">&nbsp;</td>
          <td width="448" height="169"><table width="420" height="169" border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>prepay/promo.jpg" class="promo_freetrial">
              <tr>
                <td width="28" rowspan="4" class="SLOGAN_GRIS"><br>
                </td>
                <td width="221" height="60"><span class="Style5"><?php  echo TEXT_TRY_IT ;?></span></td>
                <td width="171" rowspan="4" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>prepay/movies.gif" width="177" height="140"></td>
              </tr>
              <tr>
                <td width="221" height="43" align="left" valign="middle"><a href="freetrial_info.php"><img src="<?php  echo DIR_WS_IMAGES;?>/languages/<?php  echo $language ;?>/images/buttons/button_try.jpg" width="209" height="33" border="0"></a></td>
              </tr>
              <tr>
                <td width="221" valign="middle" class="SLOGAN_BLACK"><?php  echo TEXT_TRY_IT_EXPLAIN ;?> (<a class="red_basiclink" href="freetrial_info.php"><?php  echo TEXT_MORE_INFO ;?></a>)</td>
              </tr>
              <tr>
                <td valign="middle" class="SLOGAN_BLACK">&nbsp;</td>
              </tr>
          </table></td>
          <td width="12" rowspan="3">&nbsp;</td>
          <td width="116">
          	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/basic.php'));?>
          	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/basic_normal_price.php'));?>
          </td>
          <td rowspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td height="5">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="5"><table width="420" cellspacing="0" cellpadding="0">
              <tr>
                <td width="228" class="TYPO_PROMO"><?php  echo TEXT_GOT_A_PROMO_CODE ;?></td>
                <td><table>
                    <tr>
                      <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php')); ?>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="50" colspan="6">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
<?php 
if ($customer_id>0){
	//Fetch cookie named TRADEDOUBLER
	$cookie = $HTTP_COOKIE_VARS["TRADEDOUBLER"];
	// If TRADEDOUBLER cookie exist do trackback
	if (isset($cookie)) {
		//Fetch session named TDUID
		session_start();
		
		$tduid = "";
		if (!empty($_SESSION['TDUID'])) {
		    $tduid = $_SESSION['TDUID'];
		}
		
		//Fetch tduid cookie named TRADEDOUBLER
		if (!empty($_COOKIE["TRADEDOUBLER"])) {
		    $tduid = $_COOKIE["TRADEDOUBLER"];
		}
		
		//Change to organization id provided by TradeDoubler
		$org_id = 1037333;
		
		//Change to secret code provided by TradeDoubler
		$secretcode = "5691";
		
		//Change to the order value of the current order or "1" if lead
		//Cannot consist of, (comma) or spaces. Decimal sign is . (dot)
		// Important no thousand separators.
		$orderValue = "1";
		
		//Change to the unique order number or lead number
		$leadNumber = $customer_id;
		
		//event supplied by TradeDoubler
		$event = 37869;
		
		//Create the checksum
		$chk = "v04" . md5($secretcode.$leadNumber.$orderValue);
		
		$reportInfo = "f1=ProdNr01&f2=ProdName1&f3=100.00&f4=2|f1=ProdNR02&f2=ProdName2&f3=1000.00&f4=1";
		
		//Important! reportInfo parameter need to be URLEncoded in UTF-8 format.
		$reportInfo = urlencode($reportInfo);
				
	//	echo "<img src=\"http://tbl.tradedoubler.com/report?organization=".$org_id."&event=".$event."&leadNumber=".$leadNumber."&checksum=".$chk."&reportInfo=".$reportInfo."&tduid=".$tduid."\">";
		//To test if TradeDoubler works, login on the website and click on "Check //implementation" in the menu. Follow the instructions on this page to complete the //test.
	}
}
?>