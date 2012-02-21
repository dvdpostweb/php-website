<?php  if ($abo_passive_values['products_id']==20){
	$bckg='bckg_midi_limited2.gif';	
	}else{$bckg='bckg_midi_limited1.gif';	}
	
	$check_discount_query =" select discount_type, discount_value, discount_code , discount_code_id from discount_code where  landing_page_php= '".$current_page_name."'";
	$check_discount_info = tep_db_query($check_discount_query);
	
	$check_discount_values = tep_db_fetch_array($check_discount_info);
	
	switch ($check_discount_values['discount_type']){
		case 1;
			//x% sur le tot
			$discount_price=round($abo_passive_values['products_price']-($abo_passive_values['products_price']*$check_discount_values['discount_value'])/100, 2);
			break;		
	
		case 2;
			//tot abo = x
			$discount_price=round($check_discount_values['discount_value'], 2);
			break;
			
		case 3;
			//- X euros
			$discount_price=round($abo_passive_values['products_price']-$check_discount_values['discount_value'], 2);
			break;				
	}
	
?>
<table width="121" height="162" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td height="162" background="<?php  echo DIR_WS_IMAGES ;?>1year15/<?php  echo $bckg ;?>">
			<table align="center" height="150" width="95%">			
				<tr> 
				  <td height="25" align="center" valign="bottom" class="limiteddvdnumber"><?php  echo $abo_passive_values ['qty_credit'];?> <?php  echo TEXT_DVDS ;?></td>
				</tr>
				<tr> 
				  <td height="18" align="center" valign="top" class="guarantee"><?php  echo TEXT_WARANTY2 ;?></td>
				</tr>
				<tr> 
				  <td height="20" align="center" valign="middle" class="limitedprice">
				  	<?php  
				    $price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $discount_price );
				    echo '&euro;'.$price.'</span></sup>';
				    ?>
				  </td>
				</tr>
				<?php 				
					echo '<tr><td height="20" align="center" valign="middle" class="limitedpricemini ">';				  	
				  	$price=round($abo_passive_values['products_price'], 2);
				    echo '<b><del>€ '.$price.'</del></b>';				    			    
				    echo '</td></tr>';
				?>
						<tr> 
						<?php  if (!tep_session_is_registered('customer_id')) {
						?>
						  <form name="verify_form" method="post" action="step1.php">
						  <td height="20" align="center" valign="top">							
								<input  TYPE="hidden" VALUE="<?php  echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
								<input  TYPE="hidden" VALUE="<?php  echo $check_discount_values['discount_code_id'] ;?>" NAME="discount_code_id">
								<input  TYPE="hidden" VALUE="<?php  echo $check_discount_values['discount_code_id'] ;?>" NAME="activation_discount_code_id">
          					<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/button_limited_freetest.gif" border="0" value="submit">
						   </td>
						  </form>
						<?php  }else{
						?>
						  <form name="verify_form" method="get" action="step_subscription_info.php">
						  <td height="20" align="center" valign="top">
						  	<input  TYPE="hidden" VALUE="<?php  echo $abo_passive_values['products_id'] ;?>" NAME="products_id">
						  	<input  TYPE="hidden" VALUE="<?php  echo $check_discount_values['discount_code_id'] ;?>" NAME="discount_code_id">
							<input  TYPE="hidden" VALUE="<?php  echo $check_discount_values['discount_code_id'] ;?>" NAME="activation_discount_code_id">							
          					<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/button_limited_freetest.gif" border="0" value="submit">
						   </td>
						  </form>
						<?php 	
						}
						?>						  
						</tr> 											
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