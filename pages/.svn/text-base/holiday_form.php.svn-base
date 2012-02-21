<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
    <td  height="6" colspan="3" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.gif" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
			<br>
			<?php   			
			$custsuspended_query = tep_db_query("select * from customers  where customers_id = '" . $customer_id . "'  ");
			$custsuspended = tep_db_fetch_array($custsuspended_query);
			
			if ($custsuspended['customers_abo'] < 1 ){
					echo '<font color=red><b>' . TEXT_NO_ABO . '</b></font>';				
			}else{
				if ($custsuspended['customers_abo_suspended'] > 0 ){
					echo '<font color=red><b>' . TEXT_ABO_ALREADY_SUSPENDED . '</b></font>';
				}else{
					$checknbrtimes_query = tep_db_query("select count(*) as cc from abo_suspended_holiday where customers_id = '" . $customer_id . "' and date_asked > DATE_SUB(now(), INTERVAL 1 year) ");
					$checknbrtimes = tep_db_fetch_array($checknbrtimes_query);
						if ($checknbrtimes['cc'] > 3 ){
							echo '<font color=red><b>' . TEXT_ABO_ALREADY_SUSPENDED_3TIMES . '</b></font>';
						}else{
							?>
							<div align="justify"><?php   echo TEXT_ABO_SUSPENDED_INTRO ; ?></div>
							<br>										
							<form name="form" action="holiday_process.php" method="post"><div align="center"><br>
							<table width="300" border="0" cellspacing="0" cellpadding="0">
							  <tr>
							    <td width="13" height="13"  valign="top" nowrap background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							    <td height="13"  background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
								<td width="13" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							  </tr>
							  </tr>
							  <tr>
							    <td rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							    <td class="SLOGAN_DETAIL" align="center" height="60" valign='top'>									
									<?php   
									echo TEXT_SELECT_NBR_WEEKS.' : <br><br>';
									echo '<SELECT ID="weeks" NAME="weeks" class="SLOGAN_DETAIL">';
									echo '<OPTION value="1">1 ' . TEXT_WEEK . '</OPTION>';
									echo '<OPTION value="2">2 ' . TEXT_WEEKS . '</OPTION>';
									echo '<OPTION value="3">3 ' . TEXT_WEEKS . '</OPTION>';
									echo '<OPTION value="4">1 ' . TEXT_MONTH . '</OPTION>';
									echo '<OPTION value="8">2 ' . TEXT_MONTHS . '</OPTION>';
									echo '<OPTION value="12">3 ' . TEXT_MONTHS . '</OPTION>';
									echo '</SELECT>';
									?>
								</td>
							    <td rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							  </tr>
							  <tr>
							    <td align="center" height="30">
									<?php  
									switch($languages_id){
									case 1:
										echo '<input name="imageField" type="image" src="'. DIR_WS_IMAGES_LANGUAGES.'french/images/buttons/button_confirm_squared.jpg"  border="0">';
									break;
									case 2:
										echo '<input name="imageField" type="image" src="'. DIR_WS_IMAGES_LANGUAGES.'dutch/images/buttons/button_confirm_squared.jpg"  border="0">';
									break;
									case 3:
										echo '<input name="imageField" type="image" src="'. DIR_WS_IMAGES_LANGUAGES.'english/images/buttons/button_confirm_squared.jpg" border="0">';
									break;
									}?>	
								</td>
							  </tr>
							  <tr>
							    <td width="13" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
								<td width="13" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
							  </tr>
							</table>							
							</div></form>
						<?php  	
						}
				}					
			}					
			?>
			<br>
			<div align="center"><a  class="red_slogan" href="custserv.php"><?php   echo TEXT_BACK; ?></a></div>
    </td>
  </tr>
</table>
<br>