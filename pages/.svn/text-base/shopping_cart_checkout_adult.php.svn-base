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
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" align="center" height="40"width="50%" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td
  </tr>
    <tr>
    <td  height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
</table>
<br>
		<br>
		<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			    <td width="13" height="13"  valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			    <td height="13"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
				<td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			</tr>
			<tr>
			    <td width="13" rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			    <td height="21" align="center" valign="top" class="SLOGAN_BLACK"><b>&nbsp;</b></td>
			    <td width="13"rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
			</tr>
			<tr>
			    <td width="243" align="left" valign="top" class="TYPO_STD_BLACK">
					<?php 
				echo '<div align="center"><table align="center">';	
				
				//check quant and delete quant = 0
				//BEN001 $dvdsale_query = tep_db_query("select * from shopping_cart_adult where customers_id = '" . $customer_id . "' ");
				$dvdsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where products_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
			   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
						//BEN001 $products_quant_query = tep_db_query("select * from products_adult where products_id = '" . $dvdsale['products_id'] . "' ");
						$products_quant_query = tep_db_query("select * from products where products_id = '" . $dvdsale['products_id'] . "' "); //BEN001
						$products_quant = tep_db_fetch_array($products_quant_query);
						if($products_quant['quantity_to_sale']< 1){
					   		//BEN001 tep_db_query("delete from shopping_cart_adult  where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "' ");					
							tep_db_query("delete from shopping_cart where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "' ");				//BEN001	
						}else{
					   		//BEN001 tep_db_query("update shopping_cart_adult set quantity = '" . min($dvdsale['quantity'],$products_quant['quantity_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");
							tep_db_query("update shopping_cart set quantity = '" . min($dvdsale['quantity'],$products_quant['quantity_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'"); //BEN001
						}						   	
				}
				///count
				//BEN001 $countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart_adult where customers_id = '" . $customer_id . "' ");
				$countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart sc left join products p on (sc.products_id = p.products_id) where products_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
				$countdvd = tep_db_fetch_array($countdvd_query);
				
				
//BEN001				$sc_query = tep_db_query("select * from shopping_cart_adult sc left join products_adult p on sc.products_id = p.products_id left join products_description_adult pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' ");
				$sc_query = tep_db_query("select * from shopping_cart sc left join products p on sc.products_id = p.products_id left join products_description pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where products_type = 'DVD_ADULT' and sc.customers_id = '" . $customer_id . "' ");  //BEN001
		      	while ($sc = tep_db_fetch_array($sc_query)) {
				    echo '<tr>';
				    echo '<td width="23" class="slogan_detail">' . $sc['quantity'] . '</td>';				  		
				    echo '<td width="155" class="slogan_detail">' . $sc['products_name'] . '</td>';				    	
				    echo '<td width="40" align="center" class="slogan_detail">' . $sc['price'] . '</td>';	
				    echo '<td width="25" class="slogan_red">' . $sc['quantity'] * $sc['price'] . '</td>';	
				    echo '</tr>';	
			      	$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);
				}
				echo '<tr><td class="slogan_detail">&nbsp;</td>';				  		
				echo '<td class="slogan_detail">'. TEXT_SHIPPING_FEE . ' <i>(' . $countdvd['nbrdvd'] . ' DVD)</i></td>';
				echo '<td>&nbsp;</td>';	
				
				$country_query = tep_db_query("select * from customers c left join address_book ab on c.customers_id = ab.customers_id   where c.customers_default_address_id = ab.address_book_id  and c.customers_id = '" . $customer_id . "' ");
				$country = tep_db_fetch_array($country_query);
				switch ($country['entry_country_id']){
					case '21' :
						//echo '<td width="25" class="slogan_red">' . ($countdvd['nbrdvd']* 1 + 1). '</td></tr>';	
						//$dectotprice = $dectotprice + $countdvd['nbrdvd']*1 + 1;
						switch ($countdvd['nbrdvd']){
							case 1:
								echo '<td width="25" class="slogan_red"> 2.56 </td></tr>';	
								$dectotprice = $dectotprice + 2.56;
							break;
							case 2:
								echo '<td width="25" class="slogan_red"> 2.56 </td></tr>';	
								$dectotprice = $dectotprice + 2.56;
							break;
							default:
								echo '<td width="25" class="slogan_red">' . ((ceil($countdvd['nbrdvd']/7))* 4.7) . '</td></tr>';	
								$dectotprice = $dectotprice + (ceil($countdvd['nbrdvd']/7))*4.7;																		
							break;							
						}
					break;
					case '124' :
						echo '<td width="25" class="slogan_red">' . ($countdvd['nbrdvd']* 2 + 4). '</td></tr>';	
						$dectotprice = $dectotprice + $countdvd['nbrdvd']*2 + 4;
					break;
				}
				
				echo '<tr><td colspan="3" align="right" class="Std_pst"><b>Total: &nbsp;&nbsp;</b></td>';
				echo '<td class="Std_pst2"><b>' . $dectotprice . '€</b></td></tr>';	
				echo '</table>';				
				echo '<br>';
				//echo '<span class="slogan_black"><br><b>Total: ' . $dectotprice . 'EUR</b><br><br></span>';
					
						$ogone_orderID = $customer_id . date('YmdHis');
						$ogone_amount = $dectotprice * 100;
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'dvdsale_adult', '" . WEB_SITE_ID . "')");
						$pspid = OGONE_PSPID;
						$textaliasusage = TEXT_ALIAS_USAGE; 
						$txtconditions = TEXT_HAVE_READ_CONDITIONS; 
						switch ($languages_id) {
							case '1':
								$ogonelanguage = 'fr_FR';
								$template_ogone = 'Template_freetrial2FR.htm';
								break;
							case '2':
								$ogonelanguage = 'nl_NL';
								$template_ogone = 'Template_freetrial2NL.htm';
								break;
							case '3':
								$ogonelanguage = 'en_US';
								$template_ogone = 'Template_freetrial2EN.htm';
								break;
						}
						$COM = 'DVDPost' ;
						$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
						$customers = tep_db_fetch_array($customers_query);
						$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
						$alias = $customer_id;
						include(DIR_WS_CLASSES . 'sha.php');
						$sha = new SHA;
						$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . MODULE_PAYMENT_OGONE_SHA_STRING);
						?>
						
						<form name="checkout_confirmation" method="post" action="<?php  echo OGONE_FORM_ACTION;?>">                                                                        
						<input type="hidden" name="prod" value="">
						<input type="hidden" name="orderID" value="<?php  echo $ogone_orderID;?>">
						<input type="hidden" name="pspid" value="<?php  echo OGONE_PSPID;?>">
						<input type="hidden" name="RL" value="ncol-2.0">
						<input type="hidden" name="currency" value="EUR">
						<input type="hidden" name="language" value="<?php  echo $ogonelanguage ;?>">
						<input type="hidden" name="amount" value="<?php  echo $ogone_amount ; ?>">
						<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_adult.php">
						<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_adult.php">
						<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_adult.php">
						<input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
						<input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/default.php">
						<input type="hidden" name="COM" value="<?php  echo $COM; ?>">
						<input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
						<input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
						
						<?php 
							echo '<INPUT type="checkbox" checked>';
							echo '<a  class="red_slogan" href="conditions_buy_dvd.php" target=new>';
							echo TEXT_HAVE_READ_CONDITIONS . '<br>'; 
							echo '</a><br>';
						?>
					<?php 
						switch ($languages_id) {
							case '1':
							?>
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 
								break;
							case '2':
								?>	
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 
								break;
							case '3':
								?>	
									<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
								<?php 		
								break;
						}
					?>
				</form>
				</div>
	</td>
  </tr>
  <tr>
    <td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
	<td width="13" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
</table>
