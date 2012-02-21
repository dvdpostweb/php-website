<table width="731" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<table width="731"  border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td width="731" height="50" colspan="3" align="right" valign="top"><table width="349" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td height="15" colspan="3" valign="bottom"><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline2.jpg" width="349" height="4"></div></td>
              </tr>
              <tr>
                <td width="164" height="30" align="left" valign="middle" class="TYPO_PROMO">
                	<div align="right">
                		<?php  echo TEXT_GOT_A_PROMO_CODE ;?>
                	</div>
                </td>
				<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php')); ?>
              </tr>
            </table>
		    </td>
		</tr>
		<tr>
			<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
		</tr>
        <tr valign="bottom">
		  <td colspan="3" align="left"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>dvd_part_a.jpg" width="183" height="17"></td>
	    </tr>
		<tr>
			<td width="183" rowspan="2" bgcolor="#E3E3E3" valign="top"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>dvd_part_b.jpg" width="183" height="49"></td>
			<td width="28" bgcolor="#FFFFFF"><div align="center"><strong class="TYPO_NUM_BLACK">1</strong></div></td>
			<td width="520" bgcolor="#E3E3E3" class="SLOGAN_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><?php  echo TEXT_CHOOSE_ALL_DVD ;?></td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td height="25" valign="top" bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<?php 
						$count_products_query = tep_db_query("SELECT count(products_id) as count FROM products ");
						$count_products = tep_db_fetch_array($count_products_query);
						//BEN001 $count_products_query_adult = tep_db_query("SELECT count(products_id)as count FROM products_adult ");
						//BEN001 $count_products_adult = tep_db_fetch_array($count_products_query_adult);
						$cpt=$count_products['count'];
						//BEN001 $cpt+=$count_products_adult['count'];
						$create_text = TEXT_CREATE_YOUR_LIST;
						$create_text = str_replace('µµµcountµµµ',  $cpt , $create_text);
				echo $rent_text ;
						
						?>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo $create_text;?></td>
					</tr>
				</table>
 			</td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>dvd_fly_part_a.jpg" width="183" height="16" align="absbottom">
		    </td>
		</tr>
		<tr>
			<td rowspan="3" bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>dvd_fly_part_b.jpg" width="183" height="61"></td>
			<td width="28" bgcolor="#FFFFFF"><div align="center"><strong class="TYPO_NUM_BLACK">2</strong></div></td>
			<td bgcolor="#E3E3E3" class="SLOGAN_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><?php  echo TEXT_RECEIVE_IT;?></td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_FREE_SEND_VIA_POST;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td height="25" valign="top" bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50" height="20"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_FORMULA_CHOSE;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>calendar_part_a.jpg" width="183" height="16"></td>
		</tr>
		<tr>
			<td rowspan="3" bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>calendar_part_b.jpg" width="183" height="68"></td>
			<td width="28" bgcolor="#FFFFFF"><div align="center"><strong class="TYPO_NUM_BLACK">3</strong></div></td>
			<td bgcolor="#E3E3E3" class="SLOGAN_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><?php  echo TEXT_KEEP_IT_LONGER ;?></td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
							<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_WATCH_IT_ALL ;?></td>
				  </tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td height="25" valign="top" bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_NO_FEES ;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td height="16" colspan="3" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="3" height="3"></td>
		</tr>
		<tr>
			<td rowspan="3" bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>mail_part_a.jpg" width="183" height="60"></td>
			<td width="28" bgcolor="#FFFFFF"><div align="center"><strong class="TYPO_NUM_BLACK">4</strong></div></td>
			<td bgcolor="#E3E3E3" class="SLOGAN_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><?php  echo TEXT_QUICK_RETURN ;?></td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_DVD_IN_SPECIAL_BOX ;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td height="25" valign="top" bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_POST_IT_WITHOUT_STAMP ;?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>mail_part_b.jpg" width="183" height="16"></td>
		</tr>
		<tr>
			<td rowspan="2" bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>rotate_part_a.jpg" width="183" height="60"></td>
			<td width="28" bgcolor="#FFFFFF"><div align="center"><strong class="TYPO_NUM_BLACK">5</strong></div></td>
			<td bgcolor="#E3E3E3" class="SLOGAN_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"><?php  echo TEXT_RECEIVE_OTHERS_DVD ;?></td>
		</tr>
		<tr>
			<td bgcolor="#E3E3E3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
			<td height="35" valign="top" bgcolor="#E3E3E3">
				<table width="520" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="50"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
						<td width="470"class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"><?php  echo TEXT_WE_SEND_OTHER_DVD;?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</td>	
  </tr>
 
  <tr>
  	<td height="15" valign="bottom" bgcolor="#FFFFFF"><img src="<?php  echo DIR_WS_IMAGES_HOW;?>rotate_part_b.jpg" width="183" height="16"></td>
  </tr>
  <tr>
    <td height="6" valign="top" bgcolor="#FFFFFF"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6" align="bottom"></div></td>
  </tr>
</table>
<table width="731"  align="center" border="0"  cellspacing="0" cellpadding="0">
	<tr valign="top">
		<td height="10" colspan="6" bgcolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
    <tr valign="top">
		<td height="18" colspan="2" bgcolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><span class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"></span><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"><?php  echo TEXT_NO_SURPRISE;?></td>
        <td colspan="2" bgcolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><span class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"></span><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"><?php  echo TEXT_NO_WORRIES;?></td>
        <td colspan="2" bgcolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><span class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>black_point.jpg" width="5" height="5"></span><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"><?php  echo TEXT_NO_AGREEMENT;?></td>
    </tr>
    <tr valign="top">
		<td width="12" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="3"></td>
        <td width="227" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><?php  echo TEXT_NEVER_FEES;?></td>
        <td width="12" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="3"></td>
        <td width="238" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><?php  echo TEXT_DOM_OR_CC_PAYMENT;?></td>
        <td width="12" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="3"></td>
        <td width="232" bgcolor="#FFFFFF" class="SLOGAN_DETAIL"><?php  echo TEXT_YOU_CAN_STOP;?> </td>
    </tr>
</table>

