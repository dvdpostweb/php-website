<br>
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left.gif" width="11" height="20"></td>
    <td width="400" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid.gif" class="dvdpost_left_menu_title" align="left">
		<b><?php echo TEXT_PACK ;?></b>
	</td>
	<td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right.gif" width="11" height="20"></td>
    <td width="331">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid.gif">&nbsp;</td>
    <td colspan="3">
		<table width="100%">
			<tr>
				<td valign="top" align="center"  class="slogan_black">
					<?php 
					//switch($languages_id)
					//{
					//	  case 1:			 
					//		    include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_pack7FR.php'));
					//			break;
					//	  case 2:
					//		    include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_pack7NL.php'));
					//		    break;
					//	  case 3:
					//			include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_pack7EN.php'));
					//	  }				
					
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_lost_season_1.php'));
					echo '<br><br>';
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_despe_season_1.php'));
					echo '<br>';
					
					
					
					switch($languages_id)
					 {
						  case 1:			 
							    //include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_cartoon_1FR.php'));
								break;
						  case 2:
							    //include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_cartoon_1NL.php'));	
							    break;
						  case 3:
						    $box=rand(1, 2);
							switch($box)
							{
							  case 1:
							    //include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_cartoon_1NL.php'));	
							    break;
							  case 2:
							    //include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/box_cartoon_1FR.php'));	
							    break;
							}	
						    break;
						  }
					
					
					
					?>
				</td>
			</tr>
		</table>
    </td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right.gif" width="11" height="10"></td>
  </tr>
</table>