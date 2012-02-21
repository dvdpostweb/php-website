<?php 
if ($PHP_SELF == "/my_profile_adult.php"){	
	$img_top_left="top_left_recom2_x.gif";
	$img_top_line="top_line_recom2_x.gif";
	$img_top_right="top_right_recom2_x.gif";
}else{
	$img_top_left="top_left_recom2.gif";
	$img_top_line="top_line_recom2.gif";
	$img_top_right="top_right_recom2.gif";
}
?>
<table width="374" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_left ;?>" width="14" height="25"></td>
    <td width="350" background="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_line ;?>" class="SLOGAN_GRIS_13px"><?php  echo TEXT_CC;;?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_right ;?>" width="14" height="25"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="SLOGAN_DETAIL" valign="top">
			<?php 			
			//.' - <a class="dvdpost_brown_underline" href="cc_intro.php"> '.TEXT_MODIFY_CC.'</a>';
				echo '<br>';
				echo '<b class="SLOGAN_DETAIL_ROUGE">' . TEXT_YOUMUSTUPDATECC .'</b><br><br>';
				echo '<b>' .TEXT_CARD_TYPE . '</b>: ' . $customers_values['ogone_card_type'] . '<br>';
				echo '<b>' .TEXT_CARD_NO . '</b>: ' . $customers_values['ogone_card_no'] . '<br>';
				echo '<b>' .TEXT_CARD_OWNER . '</b>: ' . $customers_values['ogone_owner'] . '<br>';
				echo '<b>' .TEXT_EXP_DATE . '</b>: ' . $customers_values['ogone_exp_date']. '<br><br>' ;
			?>		
			<form name='cc_expiration' action='cc_expiration.php' method='post'>
				<b><?php  echo TEXT_NEW_EXP_DATE; ?></b>: 
				<input type='text' name='new_date_exp' id='new_date_exp'><br>(<?php  echo TEXT_NEW_EXP_DATE_EX; ?>)
				<br><br>
				<div align="center">
					<input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES;?>languages/<?php echo $language;?>/images/buttons/button_change.gif" width="74" height="18" border="0">
				</div>
			</form>		
		</td>
      </tr>
    </table></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
  </tr>
</table>


