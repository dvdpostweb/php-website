<table width="115" height="119" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="125" background="<?php  echo DIR_WS_IMAGES ;?>limited/bckg_limited_mini.jpg">
			<table align="center" height="108" width="95%">			
				<tr> 
				  <td height="25" align="center" valign="bottom" class="limiteddvdnumber"><?php  echo $abo_passive_values ['qty_credit'];?> <?php  echo TEXT_DVDS ;?></td>
				</tr>
				<tr> 
				  <td height="18" align="center" valign="top" class="guarantee"><?php  echo TEXT_WARANTY2 ;?></td>
				</tr>
				<tr> 
				  <td height="30" align="center" valign="middle" class="limitedprice">
				  	<?php  
				    $price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_passive_values['products_price']);
				    echo '&euro;'.$price.'</span></sup>';
				    ?>
				  </td>
				</tr>
				<tr> 
				  <td height="20" align="center" valign="middle" class="guarantee"> 
					<?php  
						$send_at_home= TEXT_DVD_SENT_AT_HOME2 ;
						$send_at_home=str_replace('µµµcountµµµ',  $abo_passive_values ['qty_at_home'] , $send_at_home);
						echo $send_at_home;
					?>
				  </td>
				</tr>				
			</table>
		</td>
	</tr>
	<tr>
		<td height="25" align="center"> <input type="radio" name="products_id" value="<?php  echo $abo_passive_values ['products_id'];?>"></td>
	</tr>
</table>