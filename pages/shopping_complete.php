<style type="text/css">
<!--
.Std_pst {
	font-family: Arial, Helvetica, sans-serif;font-size: 12px;color:#666666;
	text-decoration: overline; font-weight:bold;}
.Std_pst2 {
	font-family: Arial, Helvetica, sans-serif;font-size: 12px;color:#D32F30;
	text-decoration: overline; font-weight:bold;

}
-->
</style>
<table width="500" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE" colspan="2"><?php    echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>line-it.gif" width="500" height="6"></div></td>
  </tr>
  <tr>
  	
    <td colspan="2"  class="SLOGAN_DETAIL"><?php    echo TEXT_INFORMATION; ?><br><br></td>    
  </tr>
  <tr>
	<td colspan="2" align="center">
		<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			    <td width="13" height="13"  valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			    <td height="13"  background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
				<td width="13" background="<?php    echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			</tr>
			<tr>
			    <td width="13" rowspan="2" background="<?php    echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			    <td height="21" align="center" valign="top" class="SLOGAN_BLACK"><b>&nbsp;</b></td>
			    <td width="13"rowspan="2" background="<?php    echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			</tr>
			<tr>
			    <td width="440" align="left" valign="top" class="TYPO_STD_BLACK">
				<?php   
				echo '<div align="center"><table width="440" align="center">';	
				$add='<div align="center"><table width="440" align="center">';
				//check quant and delete quant = 0
				$dvdsale_query = tep_db_query("select * from shopping_orders where customers_id = '" . $customer_id . "' and  status=1");
			   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
						$products_quant_query = tep_db_query("select * from products where products_id = '" . $dvdsale['products_id'] . "' ");
						$products_quant = tep_db_fetch_array($products_quant_query);						   	
				}
				///count
				$countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_orders where customers_id = '" . $customer_id . "' and  status=1 and products_type='DVD_NORM'");
				$countdvd = tep_db_fetch_array($countdvd_query);
				$countbuy_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_orders where customers_id = '" . $customer_id . "' and  status=1 and products_type='BUY'");
				$countbuy = tep_db_fetch_array($countbuy_query);
				
				
				//BEN001 $sc_query = tep_db_query("select * from shopping_orders so left join products p on so.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = so.products_id and pd.language_id='" . $languages_id . "' where so.customers_id = '" . $customer_id . "' and  so.status= 1 ");
				$sc_query = tep_db_query("select * from shopping_orders so left join products p on so.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = so.products_id and pd.language_id='" . $languages_id . "' where so.customers_id = '" . $customer_id . "' and  so.status= 1 and (p.products_type = 'DVD_NORM' or p.products_type = 'BUY') "); //BEN001
		      	while ($sc = tep_db_fetch_array($sc_query)) {
				    echo '<tr>';
					$add.='<tr>';
				    echo '<td width="23" class="slogan_detail">' . $sc['quantity'] . '</td>';				  		
				    $add.='<td width="23" class="slogan_detail">' . $sc['quantity'] . '</td>';
					echo '<td width="337" class="slogan_detail">' . $sc['products_name'] . '</td>';				    	
				    $add.='<td width="337" class="slogan_detail">' . $sc['products_name'] . '</td>';
				    
					//echo '<td width="40" align="center" class="slogan_detail">' . $sc['products_sale_price'] . '</td>';	
				    //$add.='<td width="40" align="center" class="slogan_detail">' . $sc['products_sale_price'] . '</td>';	
					//echo '<td width="25" class="slogan_red">' . $sc['quantity'] * $sc['products_sale_price'] . '</td>';	
				    //$add.='<td width="25" class="slogan_red">' . $sc['quantity'] * $sc['products_sale_price'] . '</td>';	

   					echo '<td width="40" align="center" class="slogan_detail">' . $sc['price']/ $sc['quantity']. '</td>';	
				    $add.='<td width="40" align="center" class="slogan_detail">' . $sc['price'] /$sc['quantity']. '</td>';	
					echo '<td width="40" class="slogan_detail">' .  $sc['price'] . '</td>';	
				    $add.='<td width="40" class="slogan_detail">' . $sc['price'] . '</td>';	

   					echo '</tr>';	
			      	$add.='</tr>';
					//$dectotprice = $dectotprice + ($sc['quantity'] * $sc['products_sale_price']);
					$dectotprice = $dectotprice + ( $sc['price']);
					
					$intdiscount_id = $sc['discount_code_id'];
				}
				echo '<tr><td class="slogan_detail">&nbsp;</td>';				  		
				$add.='<tr><td class="slogan_detail">&nbsp;</td>';
				echo '<td class="slogan_detail">'. TEXT_SHIPPING_FEE .'</td>';
				$add.='<td class="slogan_detail">'. TEXT_SHIPPING_FEE .'</td>';
				echo '<td>&nbsp;</td>';	
				$add.='<td>&nbsp;</td>';
				$country_query = tep_db_query("select * from customers c left join address_book ab on c.customers_id = ab.customers_id   where c.customers_default_address_id = ab.address_book_id  and c.customers_id = '" . $customer_id . "' ");
				$country = tep_db_fetch_array($country_query);
				$shipping=shipping($country['entry_country_id'],$countdvd['nbrdvd']);
				$shipping+=6.2*$countbuy['nbrdvd'];
				echo '<td width="25" class="slogan_detail">'.$shipping.' </td></tr>';
				$add.='<td width="25" class="slogan_detail">'.$shipping.' </td></tr>';
				$dectotprice = $dectotprice + $shipping;
				
				echo '<tr><td colspan="3" align="right"><b>&nbsp;&nbsp;</b></td>';
				$add.='<tr><td colspan="3" align="right"><b>&nbsp;&nbsp;</b></td>';
				echo '<td class="Std_pst2"><b>' . $dectotprice . '�</b></td></tr>';	
				$add.='<td class="Std_pst2"><b>' . $dectotprice . '�</b></td></tr>';	
				

				if ($intdiscount_id > 0){
					$discount_query = tep_db_query("select * from  shopping_discount where shopping_discount_id =  '" . $intdiscount_id  . "' ");
					$discount = tep_db_fetch_array($discount_query);	
				
					switch($discount['discount_type'] ){
						case 1:
							$dectotprice = round($dectotprice - ($discount['discount_value']*$dectotprice/100),2);
						break;
						case 3:
							$dectotprice = $dectotprice - $discount['discount_value'];
						break;
					} 
					
					echo '<tr><td colspan="3" align="right" class="Std_pst"><b></b></td>';
					$add.='<tr><td colspan="3" align="right" class="Std_pst"><b></b></td>';
					echo '<td class="slogan_detail"><b>' . $discount['discount_text_fr']  . '</b></td></tr>';	
					$add.='<td class="slogan_detail"><b>' . $discount['discount_text_fr']  . '</b></td></tr>';	
										
					echo '<tr><td colspan="3" align="right" class="Std_pst"><b>Total: &nbsp;&nbsp;</b></td>';
					$add.='<tr><td colspan="3" align="right" class="Std_pst"><b>Total: &nbsp;&nbsp;</b></td>';
					echo '<td class="Std_pst2"><b>' . $dectotprice . '�</b></td></tr>';	
					$add.='<td class="Std_pst2"><b>' . $dectotprice . '�</b></td></tr>';	
					
				}				
				
				echo '</table>';				
				$add.='</table>';
				echo '<br>';				
				?>
		  <tr>
		    <td width="13" background="<?php    echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
		    <td background="<?php    echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			<td width="13" background="<?php    echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
		  </tr>
		</table>
	</td>
   </tr> 
  <tr>
    <td><a class="red_slogan" href="dvdforsale_listing.php"><u><?php    echo TEXT_BUY_CATALOG ;?></u></a> </td>
    <td height="50" align="right"><a class="red_slogan" href="mydvdpost.php"> <u><?php    echo TEXT_RENT_CATALOG ;?></u></a></td>
  </tr>
</table>
<?php   	
	$cust_info = tep_db_query("select customers_firstname, customers_lastname, customers_email_address  from customers   where customers_id = '" . $customer_id . "' ");
	$cust_info_values = tep_db_fetch_array($cust_info);
	$mail=$cust_info_values['customers_email_address'];
	$email_text = TEXT_MAIL;
	
	$check_logo_query = tep_db_query("select logo from site where site_id = '" . WEB_SITE_ID . "'");
	$check_log_values = tep_db_fetch_array($check_logo_query);
	$logo = $check_log_values['logo'];
		
	$email_text = str_replace('���logo_dvdpost���', $logo , $email_text);	
	$email_text = str_replace('���customers_name���', $cust_info_values['customers_firstname']. ' '. $cust_info_values['customers_lastname'] , $email_text);
	$email_text = str_replace('���add���', $add , $email_text);
    
    tep_mail($name, $mail , EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
?>