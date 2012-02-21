<style type="text/css">
<!--
.Style1 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Style2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
-->
</style>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="" border="0" align="center" cellpadding="0" cellspacing="0"center>
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="Style1">
    <?php  echo TEXT_INFORMATION ?> 
		<table width="462"  border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			 <td height="40" ><strong class="Style2"> <?php  echo TEXT_QUESTION_ONE ; ?> : </strong>
				<span class="SLOGAN_DETAIL_ROUGE"><b><?php  if ($q1==0) {echo TEXT_NO ;}
				   else {echo TEXT_YES ;}
				?>			 </b></span></td>
		  </tr>
		  <tr>
			<td height="40" ><strong class="Style2"> <?php  echo TEXT_QUESTION_TWO ; ?> : </strong>
				<span class="SLOGAN_DETAIL_ROUGE"><b>
				<?php  if ($q2==0) {echo TEXT_NO ;}
				   		else {echo TEXT_YES ;}
					?>			</b></span></td>
		  </tr>
		  <tr>
			<td height="40"><strong class="Style2"> <?php  echo TEXT_QUESTION_THREE ; ?> : </strong>
				<span class="SLOGAN_DETAIL_ROUGE"><b>
					<?php  echo $q3;?>
				</b></span></td>
		  </tr>
		  <tr>
			<td height="40"><strong class="Style2"> <?php  echo TEXT_QUESTION_FOUR ; ?> </strong></td>
		  </tr>
		</table>			
        <table width="462"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="279" height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_A ;?></td>
            <td width="183" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_a ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_B ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_b ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_C ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_c ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_D ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_d ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_E ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_e ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_F ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_f ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_G ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_g ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_H ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_h ; ?>0.gif"></td>
          </tr>
          <tr>
            <td height="30" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1"><?php  echo TEXT_Q4_I ;?></td>
            <td height="30" colspan="2" valign="middle" class="Style1"><img src="<?php  echo DIR_WS_IMAGES;?>starbar/stars_1_<?php  echo $q4_i ; ?>0.gif"></td>
          </tr>
        </table>
      </td>    
  </tr>
</table>
<div align="center">
    <?php  echo '<a href="mydvdpost.php">'  . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?>
</div>