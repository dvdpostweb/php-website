<br>
<?php 
$abo_active ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
$abo_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id LEFT JOIN customers c ON c.customers_abo_type = p.products_id WHERE c.customers_id ='.$customer_id ;
$abo_active_query = tep_db_query($abo_active);
$abo_active_values = tep_db_fetch_array($abo_active_query);

//SELECT products_id FROM products WHERE products_id >16 AND products_type = 'ABO' AND products_id NOT LIKE 20 
	$next_abo=$abo_active_values['products_id'];	
	switch($abo_active_values['products_id']) {
		case 2:
			$next_abo=18;	  
		break;
		case 5:
			$next_abo=18;	  
		break;
		case 6:
			$next_abo=20;	  
		break;
		case 7:
			$next_abo=22;	  
		break;
		case 8:
			$next_abo=24;	  
		break;
		case 9:
			$next_abo=25;	  
		break;
		}
		$abo_next_active ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
		$abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id ='.$next_abo ;
		$abo_next_active_query = tep_db_query($abo_next_active);
		$abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
	?>
		<table width="677" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>  
		   <td height="55" colspan="3" class="limitedtitle"><?php  echo TEXT_SELECT_A_FORMULA ;?></td>
		  </tr>
		  <tr>
		    <td height="20" colspan="3" class="limitedathome"><?php  echo TEXT_MEMBER_EXPLAIN ;?></td>
		  </tr>
		  <tr>
		    <td height="20" colspan="3" class="limitedathome">&nbsp;</td>
		  </tr>
		  <form action="relaunch_tvv_process.php" method="post" name="subscription_change">		  
		  <tr> 
		    <td width="248" rowspan="6" align="center" valign="bottom" class="limitedexplain"> 
		      <strong><?php  echo TEXT_YOUR_FORMULA2 ;?></strong> <table width="140" border="0" cellpadding="0" cellspacing="0" >
		        <tr> 
		          <td width="140" height="20" align="center" valign="bottom">&nbsp;</td>
		        </tr>
		        <tr> 
		          <td width="140" align="center" valign="bottom"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/subscription/<?php  echo $abo_next_active_values['qty_credit'];?>.gif" width="116" ></td>
		        </tr>
		        <tr> 
		          <td height="142" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES ;?>limited/bckg_limited.jpg"> 
		            <table height="103" width="90%" align="center" valign="middle" border="0"  cellpadding="0" cellspacing="0">
		              <tr> 
		                <td height="30" align="center" valign="bottom" class="limiteddvdnumber"><?php  echo $abo_next_active_values['qty_credit'];?> 
		                  <?php  echo TEXT_DVDS ;?> </td>
		              </tr>
		              <tr> 
		                <td height="18" align="center" valign="top" class="guarantee"><?php  echo TEXT_WARANTY2B ;?></td>
		              </tr>
		              <tr> 
		                <td height="30" align="center" valign="middle" class="limitedprice"> 
		                  <?php  
										$price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_next_active_values['products_price']);
										echo '&euro;'.$price.'</span></sup>';
										?>
		                </td>
		              </tr>
		              <tr>
						<td height="13" align="center" valign="middle" class="limitedprice_perDVD ">
							<?php  
							$price_per_dvd=$abo_next_active_values['products_price']/$abo_next_active_values ['qty_credit'];
							echo '<b>€ '.round($price_per_dvd, 1).'</b>/DVD';
							?>				    
						</td>
					</tr>
		              <tr> 
		                <td height="25" align="center" valign="middle"  class="guarantee"> 
		                  <?php  
										$send_at_home= TEXT_DVD_SENT_AT_HOME ;
										$send_at_home=str_replace('µµµcountµµµ',  $abo_next_active_values['qty_at_home'] , $send_at_home);
										echo $send_at_home;
										?>
		                </td>
		              </tr>
		            </table></td>
		        </tr>
				<tr>
					<td height="25" align="center"> <input type="radio" name="products_id" checked="1" value="<?php  echo $abo_next_active_values ['products_id'];?>"></td>
				</tr>
		      </table></td>
		    <td width="57" height="70" align="left" valign="middle">&nbsp;</td>
		    <td width="372" class="limitedathome">&nbsp;</td>
		  </tr>		  
		  <tr> 
		    <td height="20" colspan="2" align="left" valign="middle">&nbsp;</td>
		  </tr>
		  <tr> 
		    <td align="left" valign="middle" class="limitedathome"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/clock.gif" width="43" height="43"></td>
		    <td align="left" valign="middle" class="limitedathome"> 
		      <?php  
				$customers = tep_db_query("select DATE_FORMAT( customers_abo_validityto,  '%e/%m/%Y '  ) as date_x from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");
				$customers_values = tep_db_fetch_array($customers);		
				$updown2= TEXT_UPDOWN2 ;
				$updown2=str_replace('µµµdateµµµ',  $customers_values['date_x'] , $updown2);
				echo $updown2;
				?>
		    </td>
		  </tr>
		  <tr> 
		    <td height="20" colspan="2" align="left" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="15" height="15"></td>
		  </tr>
		  <tr> 
		    <td width="57" align="left" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/cash.gif" width="43" height="43"></td>
		    <td width="372" align="left" valign="middle" class="limitedathome"><?php  echo TEXT_TIP2 ; ?></td>
		  </tr>
		  <tr> 
		    <td height="40" colspan="3">&nbsp;</td>
		  </tr>
		  <tr align="right">			
		    <td colspan="3"> 
			<table width="677" border="0" cellspacing="0" cellpadding="0">
		        <tr align="left" valign="middle" class="limitedtitle"> 
		          <td height="35" colspan="7"><?php  echo TEXT_SELECT_A_FORMULA2 ;?></td>
		        </tr>
		        <tr> 
		          <td> 
		            <?php 
						$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
						$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id >16 AND p.products_type = 'ABO' AND p.products_id NOT LIKE ".  $abo_next_active_values['products_id'] ;
						$abo_passive_query = tep_db_query($abo_passive);
						$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
						include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
						?>
		          </td>		          
				<td width="35">&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	          <td width="35">&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	          <td width="35">&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	        </tr>
	        <tr> 
	          <td height="30" colspan="7">&nbsp;</td>
	        </tr>
	        <tr> 
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	          <td>&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	          <td>&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	          <td>&nbsp;</td>
	          <td> 
	            <?php 
					$abo_passive_values = tep_db_fetch_array($abo_passive_query);
					include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
					?>
	          </td>
	        </tr>
	        <tr>
	        	<td colspan="6">&nbsp;</td>
	        	<td align="left" height="45" valign="middle">
	        		<input type="hidden" name="discount_code" value="309">
	        		<input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/button_confirm_limited.gif' ;?>" border="0">
	        	</td>
	        </tr>
	      </table></td></form>
	  </tr>
	  <tr> 
	    <td colspan="3" height="30">&nbsp;</td>
	  </tr>
	  <tr> 
	    <td colspan="3" align="center"> <table width="677" height="100" border="0" cellpadding="0" cellspacing="0" bgcolor="#D7E4F4">
	        <tr align="center" valign="middle"> 
	          <td width="26" height="110"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_question.gif" width="52" height="52"></td>
	          <td width="247" height="100" align="center"> <table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="middle" class="infotitle"><?php  echo TEXT_INFO_TITLE1 ;?></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="mydvdpost.php" class="infolink"><?php  echo TEXT_INFO_LINK1 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="how.php" class="infolink"><?php  echo TEXT_INFO_LINK2 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="faq.php" class="infolink"><?php  echo TEXT_INFO_LINK3 ;?></a></td>
	              </tr>
	            </table></td>
	          <td width="53"><img src="<?php  echo DIR_WS_IMAGES ;?>info_line.gif" width="2" height="85"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_phone.gif" width="52" height="52"></td>
	          <td width="247" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="top" class="infotitle"><?php  echo TEXT_INFO_TITLE2 ;?></td>
	              </tr>
	              <tr> 
	                <td class="infotext"><?php  echo TEXT_INFO_PHONE ;?> 
	                <td> </tr>
	              <tr> 
	                <td height="20" class="infotext"><?php  echo TEXT_INFO_MAIL ;?></td>
	              </tr>
	            </table></td>
	        </tr>
	      </table></td>
	  </tr>
	</table>