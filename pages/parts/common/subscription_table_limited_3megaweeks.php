<table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr align="left" valign="middle" class="limitedtitle"> 
            <td height="35" colspan="7"><?php  echo TEXT_SELECT_A_FORMULA ;?></td>
          </tr>
          <tr> 
            <td>
				<?php 
				$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
				$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id >16 AND p.products_type = 'ABO' AND p.products_id in (17,18,20,22,24)" ;
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
			<td width="35">&nbsp;</td>         
            <td> 
				<?php 
				$abo_passive_values = tep_db_fetch_array($abo_passive_query);				
				include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_table_abo_switch.php'));
				?>
			</td>            
	       </tr>		   
		  <tr>
	        	<td colspan="8">&nbsp;</td>
	        	<td align="left" height="45" valign="middle">
	        		<input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/button_confirm_limited.gif' ;?>" border="0">
	        	</td>
	       </tr>		   
        </table>