<div style="height:30px; background-color:#F4E2EE; padding:8px; width:180px; text-align:center; border-bottom:#CB1126 ; margin-bottom:15px;">
<!--
	    <form name="quick_find2" action="search_vod_adult.php" method="get" enctype="text/plain">
   	    	<input name="keywords" type="text" class="TYPO_PROMO" value="<?php    echo TEXT_MOTOR_X;?>" size="18" onclick="quick_find2.keywords.value='';"><br>
			<input type="image" src="<?php    echo DIR_WS_IMAGES;?>button_go_search2.jpg" >
	    </form>
	    !-->
</div>
<div>
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
	         	<?php
	         		switch ($languages_id){
	         			case 1 :
	         				$trad='category_fr';
	         				break;
	         			
	         			case 2 :
	         				$trad='category_nl'; 
	         				break;
	         				
	         			case 3 :
	         				$trad='category_en';
	         				break; 			
	         		}
	         		
					$droselia_category = tep_db_query("SELECT category_id , ".$trad."  FROM `droselia_category_stream` order by ".$trad.";") ;
						while ($droselia_category_values = tep_db_fetch_array($droselia_category)){
							$tab_category[$droselia_category_values['category_id']]=$droselia_category_values[$trad];
							echo '<a class="dvdpost_left_menu_link1" href="vodx.php?cat='.$droselia_category_values['category_id'].'">'.$tab_category[$droselia_category_values['category_id']].'</a><br>';
						}
				?>
	         </td>
	       </tr>	   
	 	       
		   
	       <tr valign="middle">
	         <td height="70" colspan="2" nowrap><table width="133" border="0" align="center" cellpadding="0" cellspacing="0">
	             <tr>
	               <td height="29" background="<?php    echo DIR_WS_IMAGES;?>x_border.jpg"  class="dvdpost_left_menu_title"><div align="center" style="color:#FFFFFF"><a class="bold_11px" href="vodx.php">VODX</a></div></td>
	             </tr>
	           </table>
	             <div align="right"></div></td>
	       </tr>
	       
	       <tr valign="middle">
	         <td height="70" colspan="2" nowrap><table width="133" border="0" align="center" cellpadding="0" cellspacing="0">
	             <tr>
	               <td height="29" class="dvdpost_left_menu_title_vodx"><div align="center"><?php echo TEXT_FAQ_VODX ;?></div></td>
	             </tr>
	             <tr>
	             <td height="29" class="dvdpost_left_menu_title_vodx"><div align="center"><?php echo TEXT_BUY_VODX ;?></div></td>
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
			 <td align="left" valign="middle" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg" ></td>
	         <td height="15" valign="middle">
			 	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/menu/dvd_to_buy_adult.php'));?>	
			</td>
	       </tr>       
	     </table>
	   </td>
	  </tr>
	</table>
</div>
