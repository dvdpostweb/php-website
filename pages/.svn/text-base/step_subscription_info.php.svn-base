<table width="731" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td width="244" rowspan="4" align="center" valign="top" class="limitedtitle"> 
      	<table cellpadding="0" cellspacing="0" border="0" align="center" width="220">
      		<tr>
				<td colspan="2" height="50" valign="middle" align="left" class="step_big_title">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2" height="50" valign="middle" align="left" class="step_big_title"><?php   echo TEXT_STEP_EXPLAIN_TITLE ;?></td>
			</tr>
			<tr>
				<td width="20" valign="top">*</td>
				<td width="200" valign="top" class="TYPO_STD_BLACK"><?php   echo TEXT_EXPLAIN_PAYMENT_METHOD ;?></td>
			</tr>
			<tr>
				<td height="20" colspan="2" valign="top">&nbsp;</td>		
			</tr>
			<tr>
				<td width="20" valign="top">*</td>
				<td width="200" valign="top" class="TYPO_STD_BLACK"><?php   echo TEXT_EXPLAIN_CUSTOMER_INFO ;?></td>
			</tr>
			<tr>
				<td height="20" colspan="2" valign="top">&nbsp;</td>		
			</tr>
			<tr>
				<td width="20" valign="top">*</td>
				<td width="200" valign="top" class="TYPO_STD_BLACK"><?php   echo TEXT_EXPLAIN_PRIVACY ;?></td>
			</tr>
			<tr>
				<td height="270" colspan="2" valign="top">&nbsp;</td>		
			</tr>
			<tr>
				<td colspan="2">
				   	<table width="220" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7E4F4">
		              	<tr>
		              		<td align="center"><img src="<?php   echo DIR_WS_IMAGES ;?>info_question.gif" width="52" height="52"></td>
		              	</tr>
		          		<tr align="center" valign="middle">                
		                <td width="208" height="100" align="center"> 
		                	<table width="" border="0" cellspacing="0" cellpadding="0">
		                    <tr> 
		                      <td height="22" valign="middle" class="infotitle"><?php   echo TEXT_INFO_TITLE1 ;?></td>
		                    </tr>
		                    <tr> 
		                      <td height="20"><a href="catalog.php" class="infolink"><?php   echo TEXT_INFO_LINK1 ;?></a></td>
		                    </tr>
		                    <tr> 
		                      <td height="20"><a href="how.php" class="infolink"><?php   echo TEXT_INFO_LINK2 ;?></a></td>
		                    </tr>
		                    <tr> 
		                      <td height="20"><a href="faq.php" class="infolink"><?php   echo TEXT_INFO_LINK3 ;?></a></td>
		                    </tr>
		                  </table></td>
		              </tr>
		            </table>	
				</td>	
			</tr>
		</table>
    </td>
    <td width="12" height="50" align="left" valign="middle" class="limitedtitle">&nbsp;</td>
    <td width="463" align="left" valign="middle" class="step_big_title"><?php   echo TEXT_SUBSCRIPTION ;?></td>
    <td width="12" align="left" valign="middle" class="limitedtitle">&nbsp;</td>
  </tr>
  <tr> 
    <td width="12" align="left" valign="middle" class="limitedtitle">&nbsp;</td>
    <td align="center" valign="middle" class="limitedtitle" height="54" width="463" background="<?php   echo DIR_WS_IMAGES ;?>/step/top_blue_step2.gif"> 
      <br>
      <table width="90%" cellspacing="0" cellpadding="0" border="0" background="<?php   echo DIR_WS_IMAGES ;?>step/phone_bckg.gif">
        <tr> 
          <td width="55" height="52" align="center" valign="middle"><img src="<?php   echo DIR_WS_IMAGES ;?>/step/phone.gif" width="31" height="29"></td>
          <td width="394" class="limitedathome" align="left" valign="middle"><b><?php   echo TEXT_NEED_HELP ;?></b><br> 
            <?php   echo TEXT_CALL_NOW ;?></td>
        </tr>
      </table>
    </td>
    <td width="12" align="left" valign="middle" class="limitedtitle">&nbsp;</td>
  </tr>
  <?php    
	$check_abo="select customers_abo from customers where customers_id=".$customer_id;
	$check_abo_query = tep_db_query($check_abo);
	$check_abo_values = tep_db_fetch_array($check_abo_query);
	
	if ($check_abo_values['customers_abo']<1){  
  	$disc_code ="SELECT next_discount from discount_code where discount_code_id='".$discount_code_id."'";
	$disc_code_query = tep_db_query($disc_code);
	$disc_code_values = tep_db_fetch_array($disc_code_query);
	$activation_discount_code_id=$discount_code_id;
	$activation_discount_code_type="D";
	$activation_discount_next=$disc_code_values['next_discount'];
	if (!isset( $activation_discount_code_id) || ($activation_discount_code_id =='')){
	  $activation_discount_code_id = 0;
	}	
	if (!isset( $activation_discount_next) || ($activation_discount_next =='')){
	  $activation_discount_next = 0;
	}		
	tep_db_query("update customers set activation_discount_code_id='".$activation_discount_code_id."',activation_discount_code_type='".$activation_discount_code_type."',customers_next_discount_code='".$activation_discount_next."' where customers_id = '" . $customer_id . "'");
    }
	include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/step/step_subscription_info_form.php'));  
  ?>
  <tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="463" height="10" valign="top"><img src="<?php   echo DIR_WS_IMAGES ;?>/step/bottom_step.gif" width="463" height="22" align="bottom"></td>
    <td width="12" height="10">&nbsp;</td>
  </tr>
  <tr> 
    <td width="244" height="10">&nbsp;</td>
    <td width="12" height="10">&nbsp;</td>
    <td width="463" height="10">&nbsp;</td>
    <td width="12" height="10">&nbsp;</td>
  </tr>
</table>