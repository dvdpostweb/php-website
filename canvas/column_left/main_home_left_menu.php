<style type="text/css">
<!--
.NEW {
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
<table width="159" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <form name="quick_find2" action="advanced_search_result2.php" method="get" enctype="text/plain">
      <td width="115" height="23" valign="middle" bgcolor="#C4C4C4"><div align="center">
          <input name="keywords" type="text" class="TYPO_PROMO" value="<?php  echo TEXT_MOTOR ;?>" size="18" onclick="quick_find2.keywords.value='';">		  
      </div></td>
      <td width="44" valign="bottom" bgcolor="#C4C4C4"><input type="image" src="<?php  echo DIR_WS_IMAGES;?>button_go_search.jpg" align="bottom"></td>
    </form>
  </tr>
</table>

<table width="159" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="115" height="2" valign="middle" bgcolor="#FFFFFF"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></div></td>
  </tr>
  <tr>
   <td>
     <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
       <tr>
	    <td width="28%"></td>
	   </tr>
	   <tr valign="bottom">
  		<td height="15" colspan="2" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
 	   </tr><tr>
         <td height="7" colspan="2" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg">
             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title.jpg">
               <tr>
                 <th width="18%"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
                 <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php  echo TEXT_INCONTOURNABLES;?></strong></div></th>
               </tr>
             </table>
         </td>
       </tr>
       <tr>
         <td rowspan="4" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/cult.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/5star.php')); ?>
		</td>
       </tr>
       <tr>
	    <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/dvdpostchoice.php')); ?>
		</td>
       </tr>
       <tr>
        <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/awards.php')); ?>
		</td>
       </tr>
       <tr valign="bottom">
         <td height="15" colspan="2" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
       </tr>
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
		 <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title.jpg">
             <tr>
               <th width="18%"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
               <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php  echo TEXT_CATALOG; ?></strong></div></th>
             </tr>
          </table>s
		  </td>
       </tr>
       <tr>
         <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/new.php')); ?>
		</td>
       </tr>
       <tr>
         <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/fresh.php')); ?>
		</td>
       </tr>
       <tr>
         <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/next.php')); ?>
		</td>
       </tr>    
       <tr>
         <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/cinema_now.php')); ?>
		</td>
       </tr> 	   
       <tr>
         <td height="11" colspan="2" valign="top" nowrap><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg" width="134" height="11"></div></td>
       </tr>
       <tr>
         <td rowspan="5" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/action.php')); ?>
		 </td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/thriller.php')); ?>
		 </td>
       </tr>
       <tr>
        <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/horror.php')); ?>
		</td>
       </tr>
       <tr>
        <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/scifi.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/fantasy.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="11" colspan="2" valign="top" nowrap><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg" width="134" height="11"></div></td>
       </tr>
       <tr>
         <td rowspan="5" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/comedy.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/romance.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/drama.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/tv.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/family.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="1" colspan="2" valign="top" nowrap><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg" width="134" height="11"></div></td>
       </tr>
       <tr>
         <td rowspan="6" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
		 <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/documentarie.php')); ?>
		</td>
       </tr>
	   <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/travel.php')); ?>
		</td>
       </tr>
	   <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/history.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/music.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/humor.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/theater.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="1" colspan="2" valign="top" nowrap><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline3.jpg" width="134" height="11"></div></td>
       </tr>
       <tr>
         <td rowspan="3" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/french.php')); ?>
		</td>
       </tr>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/author.php')); ?>
		</td>
       </tr>
       <?php //echo '<tr>';?>
       <?php //echo '<td height="15" valign="middle">';?>
			<?php // include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/other_country.php')); ?>
		<?php //echo '</td>';?>
       <?php //echo '</tr>';?>
       <tr>
         <td height="15" valign="middle">
		 	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU/oldies.php')); ?>
		</td>
       </tr>
	   <?php  if ($language=='french'){
	    echo '<tr><td valign="top" valign="bottom" class="TYPO_STD_GREY" background="'.DIR_WS_IMAGES.'menu_background_link.jpg" height="15"><b><font color="#D32F30">NEW</font></b></td>';
        echo '<td height="15" valign="middle">&nbsp;<a href="studio.php?studio_id=124" class="dvdpost_left_menu_link1">Studio Montparnasse</a></td></tr>';
	   }
	   ?>
       <tr valign="middle">
         <td height="70" colspan="2" nowrap><table width="133" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td height="29" background="<?php  echo DIR_WS_IMAGES;?>x_border.jpg"><a href="mydvdxpost.php" class="dvdpost_left_menu_title"><div align="center"><?php  echo TEXT_CATALOG_X ;?></span> </div></A></td>
             </tr>
           </table>
             <div align="right"></div></td>
       </tr> 
	   <tr>
         <td height="1" colspan="2" valign="top" nowrap>
         	<img src="<?php  echo DIR_WS_IMAGES;?>minuscules/papillon.jpg" border="0" usemap="#Map"> 
			<map name="Map">
			  <area shape="poly" coords="30,4,41,10,58,28,74,57,84,82,94,115,104,111,141,82,149,83,152,89,144,116,116,148,101,160,102,167,96,173,81,172,68,162,80,162,84,155,48,125,35,110,42,110,40,102,44,94,49,96" href="advanced_search_result2.php?keywords=minuscule">
			  <area shape="poly" coords="16,256,22,266,27,262,56,295,72,290,105,328,130,341,81,268,26,241,47,218,31,225" href="advanced_search_result2.php?keywords=minuscule">
			</map>
		</td>
       </tr>
	   
     </table>
   </td>
  </tr>
 
</table>
