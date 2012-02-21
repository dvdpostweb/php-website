<style type="text/css">
<!--
.NEW {
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
<?php 
	if (!tep_session_is_registered('customer_id')) {
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop_public/shopping_cart.php'));
		
	}else{		
		if(empty($customer_id))
			$customer_id=$_SESSION['customer_id'];
		$shopping_sql='SELECT customers_id , sum(`quantity`) AS QUANTITY, sum(`price`) AS PRICE ';
		$shopping_sql.='FROM `shopping_cart` ';
		$shopping_sql.='WHERE customers_id = '. $customer_id .' group by customers_id';
		$shopping = tep_db_query($shopping_sql);
		if ($shopping_values = tep_db_fetch_array($shopping)){
			$total_count=$shopping_values['QUANTITY'];
			$dectotprice=$shopping_values['PRICE'];}
		else{
			$quantity=0;
			$price=0;}
			
	}
?>
<table width="162" height="48" border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/search_bckg.jpg">
  <form name="quick_find2" action="advanced_search_result2_shop_public.php" method="get" enctype="text/plain">
  <tr align="left">    
      <td height="12" colspan="2" valign="middle" class="SLOGAN_MENU2" style="padding-left:10px; "><?php  echo TEXT_QUICK_SEARCH;?> </td>    
  </tr>
  <tr>
    <td width="127" height="11" align="right" valign="middle"><input name="keywords" type="text" class="TYPO_PROMO" value="<?php  echo TEXT_MOTOR_SHOP ;?>" size="18" onClick="quick_find2.keywords.value='';" style="width:118; "></td>
    <td width="35" align="left" valign="middle"><input type="image" src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/search_button.jpg" align="bottom" width="28" height="21"></td>
  </tr>
  </form>
</table>
<br>
<table width="159" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
   <td>   	 
     <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
         	<table width="159" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title_shop.gif">
			 <tr bgcolor="#0072B6">
			   <th height="21" colspan="2" align="left" class="dvdpost_left_menu_title_shop" style="padding-left:15px; " background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/top_menu.gif"><strong ><?php  echo TEXT_SHOPPING_BAG; ?></strong></th>
			  </tr>
			 <tr>
			   <th><table width="159" border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_bckg.gif">
				 <tr>
				   <td height="7" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"> </td>
				   </tr>
				 <tr>
				   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
				   <td width="131" height="15" valign="middle" align="left"><a href="shopping_cart_public.php" class="dvdpost_left_menu_link1_shop"><font color="#D62C2E"><?php  echo $total_count.' '.TEXT_ITEMS.' ('.$dectotprice.'€)' ;?></font></a></td>
				 </tr>				 
			   </table></th>
			 </tr>
			 <tr>
			   <th><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/bottom_menu.gif" width="159" height="16"></th>
			 </tr>
			</table>
			<br>
		    <table width="159" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title_shop.gif">
			 <tr bgcolor="#0072B6">
			   <th height="21" colspan="2" align="left" class="dvdpost_left_menu_title_shop" style="padding-left:15px; " background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/top_menu.gif"><strong ><?php  echo TEXT_DVD_FOR_TITLE; ?></strong></th>
			  </tr>
			 <tr>
			   <th><table width="159" border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_bckg.gif">
				 <tr>
				   <td height="7" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"> </td>
				   </tr>
				 <tr>
				   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
				   <td width="131" height="15" valign="middle" align="left"><a href="shop_listing_public.php?cPrice=2.95" class="dvdpost_left_menu_link1_shop"><font color="#D62C2E"><?php  echo TEXT_DVD_FOR ;?> 2.95€</font></a></td>
				 </tr>
				<tr>
				   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
				   <td width="131" height="15" valign="middle" align="left"><a href="shop_listing_public.php?cPrice=3.95" class="dvdpost_left_menu_link1_shop"><font color="#D62C2E"><?php  echo TEXT_DVD_FOR ;?> 3.95€</font></a></td>
				 </tr>
				 <tr>
				   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif">&nbsp;</td>
				   <td height="15" valign="middle" align="left"><a href="shop_listing_public.php?cPrice=4.95" class="dvdpost_left_menu_link1_shop"><font color="#D62C2E"><?php  echo TEXT_DVD_FOR ;?> 4.95€</font></a></td>
				 </tr>
			   </table></th>
			 </tr>
			 <tr>
			   <th><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/bottom_menu.gif" width="159" height="16"></th>
			 </tr>
			</table>
			<br>
		    <table width="159" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title_shop.gif">
			 <tr bgcolor="#0072B6">
			   <th height="21" colspan="2" align="left" class="dvdpost_left_menu_title_shop" style="padding-left:15px; " background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/top_menu.gif"><strong ><?php  echo TEXT_DVD_BY_YEAR; ?></strong></th>
			  </tr>
			 <tr>
			   <th><table width="159" border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_bckg.gif">
				 <tr>
				   <td height="7" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"> </td>
				 </tr>
				 <?php 
				 $year_query = tep_db_query("SELECT products_year FROM `products` WHERE `quantity_to_sale` >0 group by products_year  ORDER BY `products_year`  DESC LIMIT 4 ");
				 while ($year_values = tep_db_fetch_array($year_query)){
					echo '<tr>';
					echo '<td width="28" valign="top" nowrap background="'.DIR_WS_IMAGES.'shop/titlebar/menu_background_link_shop.gif"><img src="'.DIR_WS_IMAGES.'blank.gif" width="6" height="15"></td>';
				    echo '<td width="131" height="15" valign="middle" align="left"><a href="shop_listing_public.php?cYear='.$year_values['products_year'].'" class="dvdpost_left_menu_link1_shop"><b>'.$year_values['products_year'].'</b></a></td>';
				    echo '</tr>'; 
				 }
				 ?>			 
			   </table></th>
			 </tr>
			 <tr>
			   <th><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/bottom_menu.gif" width="159" height="16"></th>
			 </tr>
			</table>
		 <br>		 
		 <table width="159" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title_shop.gif">
             <tr bgcolor="#0072B6">
              </tr>
               <th height="21" colspan="2" align="left" class="dvdpost_left_menu_title_shop" style="padding-left:15px; " background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/top_menu.gif"><strong ><?php  echo TEXT_CATALOG; ?></strong></th>
             <tr>
               <th><table width="159" height="168"  border="0" cellpadding="0" cellspacing="0" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_bckg.gif">
                 <tr>
                   <td height="7" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"> </td>
                 </tr>
                 
				 <tr>
                   <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><a class="dvdpost_left_menu_link1_shop" href="shop_listing_public.php?lim=1"><?php  echo TEXT_DVD_LIMITED ; ?></a></td>   
                 </tr>
                 <tr>
                   <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><a class="dvdpost_left_menu_link1_shop" href="shop_last_added_public.php"><?php  echo TEXT_LAST_DVD_ADDED ; ?></a></td>   
                 </tr>
                 <tr>
                   <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><a class="dvdpost_left_menu_link1_shop" href="shop_selected_dvd_public.php"><?php  echo TEXT_DVDPOST_SELECT ; ?></a></td>   
                 </tr>
                 <tr>
                   <td height="8" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"></td>
                 </tr>
                 <tr>
                   <td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
                 </tr>
                 
                 <tr>
                   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td width="131" height="8" valign="middle"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/action.php')); ?></td>
                 </tr>
                 <tr>
                   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif">&nbsp;</td>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/thriller.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td width="28" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif">&nbsp;</td>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/crime.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
                 </tr>
                 <tr>
                   <td rowspan="3" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/horror.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/scifi.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/fantasy.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
                 </tr>
                 <tr>
                   <td rowspan="3" valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/comedy.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/romance.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/drama.php')); ?>
                   </td>
                 </tr>
                 <tr>
                   <td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
                 </tr>
                 <tr>
                   <td valign="top" rowspan="2" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/Cartoon.php')); ?>                   
                   </td>                   
                 </tr>
                 <tr>
                   <td height="7" valign="middle"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/documentarie.php')); ?>
                   </td>
                 </tr>
				 <!--
 				 <tr>
					<td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
				</tr>
				 <tr>
					<td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
					<td height="15" valign="middle" align="left"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/MENU_SHOP/pack.php')); ?></td>                   
				</tr>
				 -->
                 <tr>
                   <td height="8" colspan="2" valign="top" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="12"></td>
                 </tr>
                                               
                 <tr>
                   <td height="1" colspan="2" valign="top" nowrap align="right" style="padding-right:10px; "><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/greyline3.gif" width="124" height="11"></td>
                 </tr>
                  <tr>
                   <td valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/menu_background_link_shop.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
                   <td height="15" valign="middle" align="left"><a class="dvdpost_left_menu_link1_shop" href="shop_listing_public.php"><?php  echo TEXT_SHOP_ALL ; ?></a></td>                   
                 </tr>
               </table>
                </th>
              </tr>
             <tr>
               <th><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/bottom_menu.gif" width="159" height="16"></th>
             </tr>
          </table><br>
          <div align="center"><a href="dvdforsale_info_public.php" class="dvdpost_left_menu_link1_shop"><?php  echo TEXT_HOW_TO_BUY ;?></a></div>
		  <br>	  
		  </td>
       </tr>
     </table>
   </td>
  </tr>
 
</table>
<div align="center">
	<p>
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop/banner_promo_box2.php'));?>
	</p>
</div>