<?php  if ($abo_passive_values['products_id']==20){
	$bckg='bckg_midi_limited2.gif';	
	}else{$bckg='bckg_midi_limited1.gif';	}
?>
<table width="121" height="162" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="121" background="<?php  echo DIR_WS_IMAGES ;?>limited/<?php  echo $bckg ;?>">
			<table align="center" height="162" width="95%">			
				<tr> 
				  <td height="25" align="center" valign="bottom" class="limiteddvdnumber"><?php  echo $abo_passive_values ['qty_credit'];?> <?php  echo TEXT_DVDS ;?></td>
				</tr>
				<tr> 
				  <td height="18" align="center" valign="top" class="guarantee"><?php  echo TEXT_WARANTY2 ;?></td>
				</tr>
				<tr> 
				  <td height="20" align="center" valign="middle" class="limitedprice">
				  	<?php  
				    $price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_passive_values['products_price']);
				    echo '&euro;'.$price.'</span></sup>';
				    ?>
				  </td>
				</tr>				
				<?php  if ($_SERVER['PHP_SELF']=="/subscription.php"){
					echo '<tr><td height="20" align="center" valign="middle" class="limitedprice_perDVD ">';
				  	$price_per_dvd=$abo_passive_values['products_price']/$abo_passive_values ['qty_credit'];
				    echo '<b>€ '.round($price_per_dvd, 1).'</b>/DVD';				    
				    echo '</td></tr>';
				    if (!tep_session_is_registered('customer_id')) {
						?>
						<tr> 
						  <form name="verify_form" method="post" action="step1.php">
						  <td height="20" align="center" valign="top">							
								<input  TYPE="hidden" VALUE="<?php  echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
          						<input  TYPE="hidden" VALUE="299" NAME="discount_code_id">
          					<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/button_limited_bl.gif" border="0" value="submit">
						   </td>
						  </form>						  
						</tr> 							
					<?php }	else{?>
						<tr> 
						<form name="verify_form" method="get" action="step_subscription_info.php">
						   <td height="20" align="center" valign="top">
						   		<input  TYPE="hidden" VALUE="<?php  echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
						   		<input value="462" name="discount_code_id" type="hidden">						   									
          						<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/button_limited_bl.gif" border="0" value="submit">
						  </td>
						  </form>			  
						</tr> 							
					<?php }
					
				 } else {
					if ($abo_info_values['activation_discount_code_id']>0){
						switch($languages_id)
						  {
						  case 1:
						    $discount_info ='SELECT  discount_text_fr as discount_explain FROM discount_code where discount_code_id='.$abo_info_values['activation_discount_code_id'];
						  	break;
						  case 2:
						    $discount_info ='SELECT  discount_text_nl as discount_explain FROM discount_code where discount_code_id='.$abo_info_values['activation_discount_code_id'];
						    break;
						  case 3:
						    $discount_info ='SELECT  discount_text_en as discount_explain FROM discount_code where discount_code_id='.$abo_info_values['activation_discount_code_id'];
						    break;
						  }
					
					$discount_info_query = tep_db_query($discount_info);
					$discount_info_values = tep_db_fetch_array($discount_info_query);
					echo '<tr><td height="30" align="center" valign="middle" class="limited_promo_red">';
					echo '<input type="hidden" name="discount_code_id" value="'.$abo_info_values['activation_discount_code_id'].'">';
					echo '<b>'.$discount_info_values['discount_explain'].'</b></td></tr>';
					}
				 }	
				?>
				<tr>	
				  <td height="20" align="center" valign="top" class="guarantee"> 
					<?php  
						$send_at_home= TEXT_DVD_SENT_AT_HOME2 ;
						$send_at_home=str_replace('µµµcountµµµ',  $abo_passive_values['qty_at_home'] , $send_at_home);
						echo $send_at_home;
					?>
				  </td>
				</tr>				
			</table>
		</td>
	</tr>
</table>