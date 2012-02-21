<?php  
function calcdicountprice($final_price, $discount_code_id) {	
	$code_discount_query = tep_db_query("select * from discount_code where discount_code_id  = '" . $discount_code_id . "' and discount_status > 0 ");
	$discount_info_values = tep_db_fetch_array($code_discount_query);
	if ($discount_info_values['discount_code_id'] > 0){		
		switch ($discount_info_values['discount_type']) {
			case 1: // - X%
				$final_price  = ($final_price  - ($discount_info_values['discount_value']  / 100 * $final_price ))  ;
			break;
			case 2: //tot=x euro 
				$final_price = ($final_price - $final_price + $discount_info_values['discount_value'])  ;
			break;
			case 3: //tot=tot - x euro 
				$final_price = ($final_price - $discount_info_values['discount_value'])  ;
			break;
		}			
	}
    return $final_price ;
}
?>

<table width="229" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
  <tr>
    <td width="109" align="center">
		<?php  
		$abo_price= calcdicountprice(15.95 , $HTTP_GET_VARS['discount_code_id']);
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/regular.php'));
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/regular_normal_price.php'));
		?>
	</td>
    <td width="11">&nbsp;</td>
    <td width="109" align="center" valign="middle">
		<?php  
		$abo_price= calcdicountprice(22.95 , $HTTP_GET_VARS['discount_code_id']);
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/classic.php'));
		include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/classic_normal_price.php'));
		?>
	</td>
  </tr>
</table>