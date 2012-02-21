<table width="349"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="109" align="center">
		<?php  
		$abo_price= 0;
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/regular.php'));
		$dicount_code_id = 252; 
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/regular_promo.php'));
		?>
	</td>
    <td width="131">&nbsp;</td>
    <td width="109" align="center" valign="middle">
		<?php  
		$abo_price= 0;
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/classic.php'));
		$dicount_code_id = 252; 
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/classic_promo.php'));
		?>
	</td>    
  </tr>
</table>