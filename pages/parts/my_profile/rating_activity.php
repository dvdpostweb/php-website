<?php  
$rating = tep_db_query("select count(products_rating_id) as cc from products_rating where customers_id= '".$customer_id."'");  
$rating_values = tep_db_fetch_array($rating);

$reviews = tep_db_query("select count(reviews_id) as cc from reviews where customers_id= '".$customer_id."'");  
$reviews_values = tep_db_fetch_array($reviews);

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
<table width="180" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_left ;?>" width="14" height="25"></td>
    <td width="156" background="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_line ;?>" class="SLOGAN_GRIS_13px"><?php  echo TEXT_RATING_ACTIVITY;?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_right ;?>" width="14" height="25"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="25" valign="bottom" class="SLOGAN_DETAIL">
        	<b><?php echo TEXT_NUM_RATING;?></b> : <?php  echo $rating_values['cc'];?>  
        </td>
      </tr>
      <tr>
        <td height="25" class="SLOGAN_DETAIL">
        	<b><?php  echo TEXT_NUMBER_REVIEW;?></b> : <?php  echo $reviews_values['cc'];?>   
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
