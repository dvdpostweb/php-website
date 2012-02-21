<?php    

$most_popular_sql ="SELECT count(products_id) as cpt FROM products_abo WHERE products_id=".$abo_passive_values['products_id']." AND most_popular_entity LIKE '%".ENTITY_ID."%' " ;
$most_popular_query = tep_db_query($most_popular_sql);
$most_popular_values = tep_db_fetch_array($most_popular_query);

	if ($most_popular_values['cpt']>0){
	$bckg='bckg_midi_limited2.gif';
		switch ($current_page_name){
			case 'subscription2.php':	
				$subscription_footer='<tr><td class="dvdpost_brown" align="center"><b>'.TEXT_POPULAR.'</b></td></tr>';
				$subscription_header='<tr><td class="dvdpost_brown" align="center">&nbsp;</td></tr>';
				break;
				
			case 'step3.php':
				$subscription_footer='';
				$subscription_header='<tr><td class="dvdpost_brown" align="center"><b>'.TEXT_POPULAR2.'</b></td></tr>';
				break;	
		}
		
	}else{
		$bckg='bckg_midi_limited1.gif';
		$subscription_footer='';
		$subscription_header='<tr><td class="dvdpost_brown" align="center">&nbsp;</td></tr>';
	}
?>
<table width="121" height="162" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php   echo $subscription_header; ?>
	<tr>
		<td height="162" background="<?php    echo DIR_WS_IMAGES ;?>limited/<?php    echo $bckg ;?>">
			<table align="center" height="162" width="95%">			
				<tr> 
				  <td height="22" align="center" valign="bottom" class="limiteddvdnumber"><?php    echo $abo_passive_values ['qty_credit'];?> <?php    echo TEXT_DVDS ;?></td>
				</tr>
				<tr> 
				  <td height="13" align="center" valign="top" class="guarantee"><?php    echo TEXT_WARANTY2 ;?></td>
				</tr>
				<tr> 
				  <td height="20" align="center" valign="middle" class="limitedprice">
				  	<?php    
				    $price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_passive_values['products_price']);
				    echo '&euro;'.$price.'</span></sup>';
				    ?>
				  </td>
				</tr>								
				<?php    if ($_SERVER['PHP_SELF']=="/subscription.php"){
					echo '<tr><td height="20" align="center" valign="middle" class="limitedprice_perDVD ">';
					if ($abo_passive_values ['qty_credit'] == 0) { //RALPH-999
						$price_per_dvd=''; //RALPH-999
					} //RALPH-999
					else { //RALPH-999
				  	$price_per_dvd=$abo_passive_values['products_price']/$abo_passive_values ['qty_credit'];
			  	     } //RALPH-999
				    echo '<b>€ '.round($price_per_dvd, 1).'</b>/DVD';				    
				    echo '</td></tr>';
					switch ($show_freetrial){
						case 0:
							?>
							<tr> 
							  <form name="verify_form" method="post" action="step1.php">
							  <td height="20" align="center" valign="top">							
									<input  TYPE="hidden" VALUE="<?php    echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
	          						<input  TYPE="hidden" VALUE="0" NAME="discount_code_id">
	          					<input class="noborder" name="submit" type="image" src="<?php    echo DIR_WS_IMAGES ;?>languages/<?php    echo $language ;?>/images/buttons/button_subscribe_2.gif" border="0" value="submit">
							   </td>
							  </form>						  
							</tr> 							
							<?php  
							break;
						case 1:						
							?>
							<tr> 
							  <form name="verify_form" method="post" action="step1.php">
							  <td height="20" align="center" valign="top"> 
								
									<input  TYPE="hidden" VALUE="<?php    echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
	          						<input  TYPE="hidden" VALUE="298" NAME="discount_code_id">
	          					<input class="noborder" name="submit" type="image" src="<?php    echo DIR_WS_IMAGES ;?>languages/<?php    echo $language ;?>/images/buttons/button_limited_freetest.gif" border="0" value="submit">
							  </td>
							  </form>			  
							</tr> 							
							<?php   
							break;
						case 2:					
							?>
							<tr> 
							  <form name="verify_form" method="post" action="step1.php">
							  <td height="20" align="center" valign="top"> 
								
									<input  TYPE="hidden" VALUE="<?php    echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
	          						<input  TYPE="hidden" VALUE="451" NAME="discount_code_id">
	          					<input class="noborder" name="submit" type="image" src="<?php    echo DIR_WS_IMAGES ;?>languages/<?php    echo $language ;?>/images/buttons/button_limited_freetest.gif" border="0" value="submit">
							  </td>
							  </form>			  
							</tr> 							
							<?php   
							break; 
						}
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
	<?php  
	echo $subscription_footer;	
	?>
</table>