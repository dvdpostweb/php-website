<style type="text/css">
<!--
.NEW {
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
<script>
function check_search_click(){
	if(quick_find2.keywords.value=="<?= TEXT_MOTOR_X; ?>")
	{
		quick_find2.keywords.value='';
	}
}
function check_search_blur()
{
	if(quick_find2.keywords.value=='')
	{
		quick_find2.keywords.value='<?= TEXT_MOTOR_X; ?>';
	}
}
</script>
<table width="159" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <form name="quick_find2" action="advanced_search_result2_adult.php" method="get" enctype="text/plain"   onsubmit="return search(quick_find2.keywords.value,'<?=TEXT_MOTOR_X?>')">
      <td width="115" height="23" valign="middle" bgcolor="#F4E2EF"><div align="center">
          <input name="keywords" type="text" class="TYPO_PROMO" value="<?= ((empty($_GET['keywords']))?TEXT_MOTOR_X: $_GET['keywords']);?>" size="18" onblur="check_search_blur()" onclick="check_search_click()">	
		  <input type="hidden" name="type" value="">
      </div></td>
      <td width="44" valign="bottom" bgcolor="#F4E2EF"><input type="image" src="<?php    echo DIR_WS_IMAGES;?>button_go_search2.jpg" align="bottom"></td>
    </form>
  </tr>
</table>

<table width="159" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="115" height="2" valign="middle" bgcolor="#FFFFFF"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></div></td>
  </tr>
  <tr>
   <td>
     <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
       <tr>
	    <td width="28%"></td>
	   </tr>
	   <tr valign="bottom">
  		<td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
 	   </tr>
	   <tr>
         <td height="7" colspan="2" valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg">
             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title_adult.jpg">
               <tr>
                 <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
                 <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php   echo TEXT_CATEGORY;?></strong></div></th>
           	   </tr>
             </table>
         </td>
       </tr>
	   <tr>
         <td valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
			<!--
			<div align="left"><a href="<?php    echo tep_href_link('listing_category_adult.php', 'list=new');?>" class="dvdpost_left_menu_link1"><?php    echo TEXT_NEW;?></a>
			<br>
			-->
		 	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/categories_adult.php'));?>
		</td>
       </tr>
	   
 	   <tr valign="bottom">
  		<td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
 	   </tr>
	   <tr>	   
	   <tr>
         <td height="7" colspan="2" valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg">
             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title_adult.jpg">
               <tr>
                 <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
                 <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php   echo TEXT_STUDIOS;?></strong></div></th>
               </tr>
             </table>
         </td>
       </tr>
	   <tr>
		<td  colspan="2" height="15" colspan="2" valign="middle">
			<?php   
				include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/studio.php'));
				//include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/manufacturers.php'));
			?>
		</td>
       </tr>
	   
       <tr valign="bottom">
         <td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
       </tr>
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
		 <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title_adult.jpg">
             <tr>
               <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
               <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_THEME;?></strong></div></th>
             </tr>
          </table>
		  </td>
       </tr>
	   <tr>
         <td valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
         <td height="15" valign="middle">
		 	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/themes_adult.php'));?>	
		</td>
       </tr>      
	   
       <tr valign="middle">
         <td height="70" colspan="2" nowrap><table width="133" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td height="29" background="<?php    echo DIR_WS_IMAGES;?>x_border.jpg"  class="dvdpost_left_menu_title"><div align="center"><a class="bold_11px" href="vodx.php">VODX</a></div></td>
             </tr>
           </table>
             <div align="right"></div></td>
       </tr>
       
       <tr valign="bottom">
         <td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
       </tr>
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
		 <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title_adult.jpg">
             <tr>
               <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
               <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_BUY_DVDS; ?></strong></div></th>
             </tr>
          </table>
		  </td>
       </tr>
       <tr>
		 <td align="left" valign="middle" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg" class="NEW">NEW</td>
         <td height="15" valign="middle">
		 	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/menu/dvd_to_buy_adult.php'));?>	
		</td>
       </tr>       
     </table>
   </td>
  </tr>
</table>
<br>
