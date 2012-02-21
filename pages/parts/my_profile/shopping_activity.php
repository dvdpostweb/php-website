<?php 
$countsc_query = tep_db_query("select count(*) as cc from shopping_cart where customers_id = '" . $customer_id . "' ");
$countsc = tep_db_fetch_array($countsc_query);
//if ($countsc['cc']>0){
?>
<table width="374" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
    <td width="350" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="SLOGAN_GRIS_13px"><?php  echo TEXT_SHOPPING_ACTIVITY;?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><table border="0" align="left" cellpadding="0" cellspacing="0" >
      		<tr>
	  			<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="6"></td>
	  		</tr>
	  		<tr>
        		<td valign="top" height="30" colspan="3" class="SLOGAN_DETAIL">
        				<b><?php  echo TEXT_DVD_FOR_PURCHASE ; ?></b> <?php  echo $countsc['cc'];?>						
       	 		</td>
     		 </tr>
      		 <tr>
        		<td width="230" class="SLOGAN_DETAIL"SLOGAN_DETAIL"">
        			<b><?php  echo TEXT_PRODUCTS_TITLE;?></b>  </td>
        		<td width="5" align="center" class="SLOGAN_DETAIL"> </td>
				<td align="center"valign="center" class="SLOGAN_DETAIL"><b><?php  echo TEXT_PRICE;?></b></td>
      		</tr>
			<tr>
        		<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      		</tr>
			<tr>
				<td colspan="3">
					<table width="100%">
					<?php  
		  			$sc_query = tep_db_query("select * from shopping_cart sc left join products p on sc.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' ");
		   			while ($sc = tep_db_fetch_array($sc_query)) {		      		
		      			?>
							<tr>
		        				<td width="214" height="25"><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="14" height="3">         					
		            				<a href="shopping_cart.php" class="dvdpost_brown_underline"><?php  echo $sc['products_name'];?></a>
		          				</td>
								<td width="5">&nbsp;</td>
		          				<td align="center" class="TYPO_STD_GREY">
		          					<?php  echo $sc['price']; ?>€          					
		        				</td>
		      				</tr>
		      			<?php  
		  				}
  					?>
		 			</table>
				</td>
			</tr>			
			<tr>
        	<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      	</tr>
		<tr><td><a href="shopping_cart.php" class="dvdpost_brown_underline"><?php  echo TEXT_VIEW_SHOPPINGCART ;?></a> - <a href="shopping_cart_checkout.php" class="dvdpost_brown_underline"><?php  echo TEXT_CONFIRM_ORDER;?></a> <br><br> <a href="mydvdbought.php" class="dvdpost_brown_underline"><?php  echo TEXT_HISTORY_BOUGHT;?></a></td></tr>            
    </table>
	</td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
  </tr>
</table>
<?php // } ?>