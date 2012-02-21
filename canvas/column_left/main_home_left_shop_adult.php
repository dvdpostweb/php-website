<style type="text/css">
<!--
.NEW {
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
<table width="162" height="48" border="0" cellpadding="0" cellspacing="0" background="<?php     echo DIR_WS_IMAGES;?>shop/titlebar/search_bckg_adult.gif">
  <form name="quick_find2" action="advanced_search_result2_shop_adult.php" method="get" enctype="text/plain">
  <tr align="left">    
      <td height="12" colspan="2" valign="middle" class="SLOGAN_MENU2" style="padding-left:10px; "><?php     echo TEXT_QUICK_SEARCH;?> </td>    
  </tr>
  <tr>
    <td width="127" height="11" align="right" valign="middle"><input name="keywords" type="text" class="TYPO_PROMO" value="<?php     echo TEXT_MOTOR_SHOP ;?>" size="18" onClick="quick_find2.keywords.value='';" style="width:118; "></td>
    <td width="35" align="left" valign="middle"><input type="image" src="<?php     echo DIR_WS_IMAGES;?>shop/titlebar/search_button.jpg" align="bottom" width="28" height="21"></td>
  </tr>
  </form>
</table>


<table width="159" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="115" height="2" valign="middle" bgcolor="#FFFFFF"><div align="center"><img src="<?php     echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></div></td>
  </tr>
  <tr>
   <td>
     <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
       <tr>
	    <td width="28%"></td>
	   </tr>
	   <tr valign="bottom">
  		<td height="15" colspan="2" nowrap>&nbsp;</td>
 	   </tr>
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
		 <table width="159" height="23"  border="0" cellpadding="0" cellspacing="0" >
             <tr bgcolor="#0072B6">
               <th height="21" colspan="2" align="left" class="dvdpost_left_menu_title" style="padding-left:15px; " background="<?php     echo DIR_WS_IMAGES;?>shop/titlebar/top_menu_x.gif"><strong >STUDIO</strong></th>
              </tr>
             <tr>
               <th><table width="159" height="168"  border="0" cellpadding="0" cellspacing="0" background="<?php     echo DIR_WS_IMAGES;?>shop/titlebar/menu_bckg_x.gif">
                 <tr>
                   <td height="7" colspan="2" valign="top" nowrap><img src="<?php     echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"> </td>
                   </tr>
                                    
                   		<?php                   
	               		//BEN001 $studio = tep_db_query("SELECT count( p.manufacturers_id ) as cpt ,p.manufacturers_id, m.manufacturers_name FROM products_adult p, manufacturers m WHERE p.quantity_new_to_sale AND p.manufacturers_id = m.manufacturers_id GROUP BY p.manufacturers_id ORDER BY `cpt` DESC ");
						$studio = tep_db_query("SELECT count( s.studio_id ) as cpt ,p.products_studio, s.studio_name FROM products p, studio s WHERE p.quantity_new_to_sale AND p.products_studio = s.studio_id and products_type = 'DVD_ADULT' GROUP BY p.products_studio ORDER BY `cpt` DESC "); //BEN001
	               		while ($studio_values = tep_db_fetch_array($studio)){
		               		echo '<tr><td width="28" valign="top" nowrap background="'.DIR_WS_IMAGES.'shop/titlebar/menu_background_link_shop_x.gif"><img src="'.DIR_WS_IMAGES.'blank.gif" width="6" height="15"></td>';
                   			echo '<td width="131" height="8" valign="top">';
		               		echo '<a href="shop_listing_adult.php?studio_id='. $studio_values['products_studio'].'" class="dvdpost_left_menu_link1_x_shop">'.$studio_values['studio_name'].'</a></td></tr>' ;
	               		}					
						?>                                 
               </table>
                </th>
              </tr>
             <tr>
               <th><img src="<?php     echo DIR_WS_IMAGES;?>shop/titlebar/bottom_menu_x.gif" width="159" height="16"></th>
             </tr>
          </table>
		  <p>&nbsp;</p>
		</td>
       </tr>
     </table>
   </td>
  </tr>
 
</table>
