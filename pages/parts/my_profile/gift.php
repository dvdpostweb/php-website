<?php 
if ($PHP_SELF == "/my_profile_adult.php"){	
	$img_top_left="top_left_recom3_x.gif";
	$img_top_line="top_line_recom3_x.gif";
	$img_top_right="top_right_recom3_x.gif";
}else{
	$img_top_left="top_left_recom3.gif";
	$img_top_line="top_line_recom3.gif";
	$img_top_right="top_right_recom3.gif";
}
?>
<style type="text/css">
<!--
.Style1 {font-weight: bold}
-->
</style>
<table width="180" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_left ;?>" width="14" height="35"></td>
    <td width="156" background="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_line ;?>" class="SLOGAN_GRIS_13px"><?php  echo TEXT_GIFT;?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_right ;?>" width="14" height="35"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	  	<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8"></td>
	  </tr>
      <tr>
        <td height="6" valign="bottom" class="SLOGAN_GRIS_FONCE"><p align="center"><a href="gift_form.php" class="red_slogan"><?php  echo TEXT_BUY_GIFT;?></a></p>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg"></td>             
      </tr>
	  <tr>
        <td height="6" valign="bottom" class="SLOGAN_GRIS_FONCE"><p align="center"><a href="gift_history.php" class="red_slogan"><?php  echo TEXT_SEE_GIFT_HISTORY;?></a></p>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg"></td>             
      </tr>
	  
	  
      <form action='activation_code_confirm.php' method='post'>
        <tr>
          <td height="13" align="center" valign="bottom" class="SLOGAN_DETAIL"><?php  echo TEXT_ENTER_CODE;?></td>
        </tr>
        <tr>
          <td height="25" align="center" valign="middle"><input name="code" id="code" type="text" class="SLOGAN_DETAIL"></td>
        </tr>
        <tr>
          <td height="30" align="center" valign="middle"><input name="imageField" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_continue2.gif" border="0"></td>
        </tr>
      </form>
    </table></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
  </tr>
</table>
