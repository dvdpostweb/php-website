<?php  
$wishlist = tep_db_query("select count(wl_id) as cc  from wishlist  where customers_id= '".$customer_id."'");  
$wishlist_values = tep_db_fetch_array($wishlist);

?>
<table width="374" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
    <td width="350" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="SLOGAN_GRIS_13px"><?php  echo TEXT_RENTAL_ACTIVITY;?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
    <td><table border="0" align="left" cellpadding="0" cellspacing="0" >
      		<tr>
	  			<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="6"></td>
	  		</tr>
	  		<tr>
        		<td valign="top" height="65" colspan="3" class="SLOGAN_DETAIL">
        				<b>
        				<?php  echo TEXT_DVD_IN_QUEUE; ?> 
        				</b> 
        				<?php  echo $wishlist_values['cc']; 
						   if ($wishlist_values['cc']<50){
								echo'<br>'.TEXT_ADD_DVD_RECOM .' (<a href="faq.php#21" class="dvdpost_brown_underline">'.TEXT_WHY.'</a>)';
								} 
						?>						
       	 		</td>
     		 </tr>
      		 <tr>
        		<td width="230" class="SLOGAN_DETAIL"SLOGAN_DETAIL"">
        			<b><?php  echo TEXT_LAST_DVD_SHIPPED;?></b>  </td>
        		<td width="5" align="center" class="SLOGAN_DETAIL"> </td>
				<td align="center"valign="center" class="SLOGAN_DETAIL"><b><?php  echo TEXT_SHIPPED;?></b></td>
      		</tr>
			<tr>
        		<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      		</tr>
		<?php  
		$dvdathome = tep_db_query("select * from orders o left join orders_products op on o.orders_id =op.orders_id where o.customers_id= '".$customer_id."' and o.orders_status = 2 ");  
		//$dvdathome_values = tep_db_fetch_array($dvdathome);
		while ($dvdathome_values = tep_db_fetch_array($dvdathome)) {
   			echo '<tr>';
   			echo '<td width="214" height="25"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3"><a href="mywishlist.php" class="dvdpost_brown_underline">';
   			if ($dvdathome_values['orders_products_type']='DVD_NORM')
				{echo $dvdathome_values['products_name'];
			}else {echo 'MOVIX';}				
   			echo '</a></td>';
   			echo '<td width="5">&nbsp;</td>';
   			echo '<td align="center" class="TYPO_STD_GREY">';
   			echo $dvdathome_values['date_purchased'];
   			echo '</td>';
   			echo '</tr>';
  		}
		?>
		<tr>
			<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      	</tr>
		<tr><td><a href="mywishlist.php" class="dvdpost_brown_underline"><?php  echo TEXT_VIEW_ALL;?></a> - <a href="custserv_list.php" class="dvdpost_brown_underline"><?php  echo TEXT_REPORT_A_PROBLEM;?></a></td></tr>     
		
		
		
		
		<!--
      		<tr>
        		<td height="40" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>greyline2.jpg" width="300" height="3"></td>
      		</tr>
      		<tr>
        		<td width="230" class="SLOGAN_DETAIL"><b><?php  echo TEXT_TRANSIT_KIALA;?></b> </td>
        		<td width="5" align="center" class="SLOGAN_DETAIL"> </td>
       			<td align="center"valign="center" class="SLOGAN_DETAIL"><b><?php  echo TEXT_KIALA_NBR;?></b></td>
      		</tr>
			<tr>
        		<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      		</tr>
		-->
		<?php  
		//$dvdathome = tep_db_query("select * from kiala k left join orders_products op on k.orders_id = op.orders_id where k.customers_id =  '".$customer_id."' and k.return_date is null");  
		//while ($dvdathome_values = tep_db_fetch_array($dvdathome)) {
   		//	echo '<tr>';
   		//	echo '<td width="214" height="25"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3"><a href="myrentals.php" class="dvdpost_brown_underline">';
   		//	if ($dvdathome_values['orders_products_type']='DVD_NORM')
		//		{echo $dvdathome_values['products_name'];
		//	}else {echo 'MOVIX';}	
   		//	echo '</a></td>';
   		//	echo '<td width="5">&nbsp;</td>';
   		//	echo '<td align="center" class="TYPO_STD_GREY">';
   		//	echo $dvdathome_values['kiala_nbr'];
   		//	echo '</td>';
   		//	echo '</tr>';
  		//}
		?>
		
		
		
		
		
		
		
		
		
      		<tr>
        		<td height="40" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>greyline2.jpg" width="300" height="3"></td>
      		</tr>
      		<tr>
        		<td width="230" class="SLOGAN_DETAIL"><b><?php  echo TEXT_DVD_RETURNED;?></b> </td>
        		<td width="5" align="center" class="SLOGAN_DETAIL"> </td>
       			<td align="center"valign="center" class="SLOGAN_DETAIL"><b><?php  echo TEXT_RETURNED;?></b></td>
      		</tr>
			<tr>
        		<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      		</tr>
		<?php  
		$dvdathome = tep_db_query("select * from orders o left join orders_products op on o.orders_id =op.orders_id left join orders_status_history os on o.orders_id =os.orders_id where o.customers_id= '".$customer_id."' and o.orders_status = 3 and os.new_value= 3 order by o.orders_id desc limit 3");  
		while ($dvdathome_values = tep_db_fetch_array($dvdathome)) {
   			echo '<tr>';
   			echo '<td width="214" height="25"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3"><a href="myrentals.php" class="dvdpost_brown_underline">';
   			if ($dvdathome_values['orders_products_type']='DVD_NORM')
				{echo $dvdathome_values['products_name'];
			}else {echo 'MOVIX';}	
   			echo '</a></td>';
   			echo '<td width="5">&nbsp;</td>';
   			echo '<td align="center" class="TYPO_STD_GREY">';
   			echo $dvdathome_values['date_added'];
   			echo '</td>';
   			echo '</tr>';
  		}
		?>
		<tr>
        	<td height="10" colspan="3" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="300" height="3"></td>
      	</tr>
		<tr><td><a href="myrentals.php" class="dvdpost_brown_underline"><?php  echo TEXT_VIEW_ALL;?></a> - <a href="custserv_list.php" class="dvdpost_brown_underline"><?php  echo TEXT_REPORT_A_PROBLEM;?></a></td></tr>            
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