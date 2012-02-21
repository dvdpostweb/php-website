<?php  
if (tep_session_is_registered('customer_id')){
	if ($no==1 || $customers_registration_step> 90){
		$show_freetrial=0;
		tep_db_query("update customers set activation_discount_code_id='0',activation_discount_code_type=' ',customers_next_discount_code='0' where customers_id = '" . $customer_id . "'");
	}	
	else{$show_freetrial=1;}
}else{$show_freetrial=1;}
?>
<table width="731" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="40" align="left" valign="bottom" class="limitedtitle"><?php   echo TEXT_FORMULA_TITLE ;?></td>
  </tr>
  <tr> 
    <td height="20" align="left" valign="middle" class="limitedathome"><?php  // echo TEXT_TRY_DVDPOST_NOW ;?></td>
  </tr>
  <tr> 
    <td> 
      <?php  
		$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
		$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id >16 AND p.products_type = 'ABO' AND p.products_id in (17,18,20,22,24)" ;
		$abo_passive_query = tep_db_query($abo_passive);		
				
	  ?>
      <table width="716" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center"> 
          <td width="132"> 
            <?php  
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public_bl.php'));
					?>
          </td>
          <td width="132"> 
            <?php  
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public_bl.php'));
					?>
          </td>
          <td width="132"> 
            <?php  
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public_bl.php'));
					?>
          </td>
          <td width="132"> 
            <?php  
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public_bl.php'));
					?>
          </td>
          <td width="132"> 
            <?php  
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public_bl.php'));
					?>
          </td>
        </tr>
        <tr>
        	<td colspan="2">&nbsp</td>
        	<td class="dvdpost_brown" align="center"><b><?php  echo TEXT_POPULAR ;?></b></td>
        	<td colspan="2">&nbsp</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td height="30">&nbsp;</td>
  </tr>
  <tr> 
    <td align="center"> 
      <table width="716">
        <tr> 
          <td align="left" valign="top"> 
            <table align="left" width="318" cellpadding="0" cellspacing="0" border="0">
              <tr> 
                <td width="42" align="center" valign="middle"><img src="<?php   echo DIR_WS_IMAGES ;?>limited/checked.gif" width="42" height="43"></td>
                <td width="15" align="center" valign="middle">&nbsp;</td>
                <td height="65" align="left" valign="middle" class="limitedathome"><b><?php   echo TEXT_DVD_GUARANTEE ;?></b> 
                  - <?php   echo TEXT_DVD_GUARANTEE2 ;?></td>
              </tr>
              <tr> 
                <td colspan="3" height="20"></td>
              </tr>
              <tr> 
                <td width="42" align="center" valign="middle"><img src="<?php   echo DIR_WS_IMAGES ;?>limited/clock.gif" width="42" height="43"></td>
                <td width="15" align="center" valign="middle">&nbsp;</td>
                <td height="65" align="left" valign="middle" class="limitedathome"><b><?php   echo TEXT_DVD_RETURN ;?></b> 
                  - <?php   echo TEXT_DVD_RETURN2 ;?></td>
              </tr>
              <tr> 
                <td colspan="3" height="20"></td>
              </tr>              
              <tr> 
                <td colspan="3" height="20"></td>
              </tr>
            </table>
          </td>
          <td align="right" valign="top"> 
            <table align="left" width="318" cellpadding="0" cellspacing="0" border="0" valign="top">              
              <tr> 
                <td width="42" align="center" valign="middle"><img src="<?php   echo DIR_WS_IMAGES ;?>limited/chain.gif" width="42" height="43"></td>
                <td width="15">&nbsp;</td>
                <td height="65" align="left" class="limitedathome"><b><?php   echo TEXT_NO_COMMITMENT ;?></b> 
                  - <?php   echo TEXT_NO_COMMITMENT2 ;?></td>
              </tr>
              <tr> 
                <td colspan="3" height="20"></td>
              </tr>
              <tr> 
                <td width="42" align="center" valign="middle"><img src="<?php   echo DIR_WS_IMAGES ;?>limited/mail.gif" width="42" height="43"></td>
                <td width="15">&nbsp;</td>
                <td height="65" align="left" class="limitedathome"><b><?php   echo TEXT_DVD_SEND ;?></b> 
                  - <?php   echo TEXT_DVD_SEND2 ;?></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td height="20">&nbsp;</td>
  </tr>
  <tr> 
    <td> <table width="731" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7E4F4">
        <tr align="center" valign="middle"> 
          <td width="26" height="110"></td>
          <td width="52"><img src="<?php   echo DIR_WS_IMAGES ;?>info_question.gif" width="52" height="52"></td>
          <td width="274" height="100" align="center"> <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="22" valign="middle" class="infotitle"><?php   echo TEXT_INFO_TITLE1 ;?></td>
              </tr>
              <tr> 
                <td height="20"><a href="mydvdpost.php" class="infolink"><?php   echo TEXT_INFO_LINK1 ;?></a></td>
              </tr>
              <tr> 
                <td height="20"><a href="how.php" class="infolink"><?php   echo TEXT_INFO_LINK2 ;?></a></td>
              </tr>
              <tr> 
                <td height="20"><a href="faq.php" class="infolink"><?php   echo TEXT_INFO_LINK3 ;?></a></td>
              </tr>
            </table></td>
          <td width="53"><img src="<?php   echo DIR_WS_IMAGES ;?>info_line.gif" width="2" height="85"></td>
          <td width="52"><img src="<?php   echo DIR_WS_IMAGES ;?>info_phone.gif" width="52" height="52"></td>
          <td width="274" align="center"> 
          	<table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td height="22" valign="top" class="infotitle"><?php   echo TEXT_INFO_TITLE2 ;?></td>
              </tr>
              <tr> 
                <td class="infotext"><?php   echo TEXT_INFO_PHONE ;?></td>
              </tr>              
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
