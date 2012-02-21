<?php 
$abo_active ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
$abo_active .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id >16 AND p.products_type = 'ABO' AND p.products_id=".$products_id ;
$abo_active_query = tep_db_query($abo_active);
$abo_active_values = tep_db_fetch_array($abo_active_query);
?>
<table width="143" border="0" cellpadding="0" cellspacing="0">
	<tr> 
	  <td width="143" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/subscription/<?php  echo $abo_active_values['qty_credit'];?>.gif" ></td>
	</tr>
	<tr> 
	  <td height="10" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/grey_top.gif" width="143" height="10"></td>
	</tr>
	<tr> 
	  <td height="25" align="center" valign="middle" bgcolor="#E3E3E3" class="limiteddvdnumber"><?php  echo $abo_active_values['qty_credit'];?> 
		<?php  echo TEXT_DVDS ;?></td>
	</tr>
	<tr> 
	  <td height="18" align="center" valign="top" bgcolor="#E3E3E3" class="guarantee"><?php  echo TEXT_WARANTY2 ;?></td>
	</tr>
	<tr> 
	  <td height="40" align="center" valign="middle" bgcolor="#E3E3E3" class="limitedprice"> 
		<?php  
		$price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_active_values['products_price']);
		echo '&euro;'.$price.'</span></sup>';
		?>
	  </td>
	</tr>
	<tr> 
	  <td height="7" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/middle.gif" width="143" height="7"></td>
	</tr>
	<tr> 
	  <td height="20" align="center" valign="middle" bgcolor="#FEEF81" class="limitedathome"> 
		<?php  
			$send_at_home= TEXT_DVD_SENT_AT_HOME ;
			$send_at_home=str_replace('µµµcountµµµ',  $abo_active_values['qty_at_home'] , $send_at_home);
			echo $send_at_home;
		?>
	  </td>
	</tr>
	<tr> 
	  <td height="8" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/yellow_bottom.gif" width="143" height="8"></td>
	</tr>
</table>