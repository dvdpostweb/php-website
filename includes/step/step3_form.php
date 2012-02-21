<?php 
$abo_info ='SELECT customers_next_abo_type, activation_discount_code_id FROM customers where customers_id='.$customer_id;
$abo_info_query = tep_db_query($abo_info);
$abo_info_values = tep_db_fetch_array($abo_info_query);

$abo=$abo_info_values['customers_next_abo_type'];

$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home, pa.most_popular_entity FROM products p ';
$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.popular_entity LIKE '%".ENTITY_ID."%' order by pa.qty_credit ASC" ;
$abo_passive_query = tep_db_query($abo_passive);			
?>
  <tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="463" height="200" background="<?php  echo DIR_WS_IMAGES ;?>step/bckg_step3.gif" bgcolor="#FFFFFF" valign="top" align="center"> 
      <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
        <form name="subscription_form" method="get" action="step_subscription_info.php">
          <input  TYPE="hidden" VALUE="3" NAME="step">
          <input  TYPE="hidden" VALUE="<?php  echo $abo_info_values['activation_discount_code_id'];?>" NAME="discount_code_id">                    
          <tr> 
            <td height="30" align="left" valign="middle" class="limitedtitle" ><?php  echo TEXT_TITLE_STEP3 ;?></td>
          </tr>
          <?php  if ($abo_info_values['activation_discount_code_id']==298){
	          echo '<tr><td height="15" align="left" valign="top" class="limitedathome">'.TEXT_TITLE_STEP3_EXPLAIN.'<br>'.TEXT_TITLE_STEP3_EXPLAIN_BIS.'<a href="subscription.php?no=1" class="infolink">'.TEXT_CLICK_HERE.'</a></td></tr>';
	          }
	      ?>       
	      <tr> 
            <td height="200" valign="top" width="423">            	
			      <table width="403" height="301" border="0" align="center" cellpadding="0" cellspacing="0">
              		<tr>
			        	<td colspan="3" align="left" height="40" valign="middle" class="step_title"><b><?php echo TEXT_POPULAR ;?></b></td>			
			        </tr>
			      	<tr align="center"> 
			          <?php  
							while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
								echo '<td width="134" height="18" align="center">';	
								$abo_selected=$abo_passive_values['products_id'];
								if ($abo_selected==$abo){$radio_button='checked';}else {$radio_button='';}
								include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public.php'));
								echo '<table><tr>';
								echo '<td width="134" height"30" valign="middle" align="center"><input name="products_id" type="radio" value="'.$abo_selected.'" '.$radio_button.'></td>';			          
								echo '</tr></table>';
								echo '</td>';
					  }								
					  ?>               
			        </tr>
			        <tr>
			        <td colspan="2" height="45" align="center">&nbsp;</td>
			        <td  height="45" align="center" valign="middle"><input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>/languages/<?php  echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit"></td>			
			        </tr>
			        <tr>
			        	<td colspan="3" height="9" align="center" background="<?php  echo DIR_WS_IMAGES ;?>step/step_line.gif" ><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" height="9" width="9"></td>			
			        </tr>
			        <tr>
			        	<td colspan="3" align="left" height="40" valign="middle" class="step_title"><b><?php echo TEXT_LESS_POPULAR ;?></b></td>			
			        </tr>
			        <tr>
			        <?php 
					$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
					$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND  pa.allowed_public_entity LIKE '%".ENTITY_ID."%' AND pa.popular_entity NOT LIKE '%".ENTITY_ID."%' order by pa.qty_credit ASC" ;
					$abo_passive_query = tep_db_query($abo_passive);			
					
					while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
						echo '<td width="134" height="18" align="center">';	
						$abo_selected=$abo_passive_values['products_id'];
						if ($abo_selected==$abo){$radio_button='checked';}else {$radio_button='';}
						include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_public.php'));
						echo '<table><tr>';
						echo '<td width="134" height"30" valign="middle" align="center"><input name="products_id" type="radio" value="'.$abo_selected.'" '.$radio_button.'></td>';			          
						echo '</tr></table>';
						echo '</td>';
					}
					?>
			        </tr>
			        <tr>
			        <td colspan="2" height="45" align="center">&nbsp;</td>
			        <td  height="45" align="center" valign="middle"><input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>/languages/<?php  echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit"></td>			
			        </tr>
			        <tr>
			        	<td colspan="3" height="9" align="center" background="<?php  echo DIR_WS_IMAGES ;?>step/step_line.gif" ><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" height="9" width="9"></td>			
			        </tr>			        
			        <tr>
			        	<td colspan="3" height="25" align="left" class="TYPO_STD_BLACK"><?php  echo TEXT_SWITCH_TO_ANOTHER_ABO ;?></td>			
			        </tr>				          		        
			      </table>
            </td>
          </tr>          
        </form>
      </table>
    </td>
    <td width="12" height="10">&nbsp;</td>
</tr>