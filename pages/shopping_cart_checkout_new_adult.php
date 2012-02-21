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
<br>
<table width="360" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left_x.gif" width="11" height="20"></td>
    <td width="200" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid_x.gif" class="dvdpost_left_menu_title" align="left"><b><?php  echo HEADING_TITLE;?></b></td>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right_x.gif" width="11" height="20"></td>
    <td width="127">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right_x.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid_x.gif">&nbsp;</td>
    <td colspan="3">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>			   
			    <td height="21" align="center" valign="top" class="SLOGAN_BLACK"><b>&nbsp;</b></td>			    
			</tr>
			<tr>
			    <td width="243" align="left" valign="top" class="TYPO_STD_BLACK">
					<?php 
				echo '<div align="center"><table align="center">';	
				
				//check quant and delete quant = 0
				//BEN001 $dvdsale_query = tep_db_query("select * from shopping_cart_new_adult where customers_id = '" . $customer_id . "' ");
				$dvdsale_query = tep_db_query("select * from shopping_cart_new sc where products_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
			   	while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
						//BEN001 $products_quant_query = tep_db_query("select * from products_adult where products_id = '" . $dvdsale['products_id'] . "' ");
						$products_quant_query = tep_db_query("select quantity_new_to_sale from products where products_id = '" . $dvdsale['products_id'] . "' "); //BEN001
						$products_quant = tep_db_fetch_array($products_quant_query);
						if($products_quant['quantity_new_to_sale']< 1){
					   		//BEN001 tep_db_query("delete from shopping_cart_new_adult  where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "' ");					
							tep_db_query("delete from shopping_cart  where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "' ");					//BEN00A
						}else{
					   		//BEN001 tep_db_query("update shopping_cart_new_adult set quantity = '" . min($dvdsale['quantity'],$products_quant['quantity_new_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");
							tep_db_query("update shopping_cart_new set quantity = '" . min($dvdsale['quantity'],$products_quant['quantity_new_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'"); //BEN001
						}						   	
				}
				///count
				//BEN001 $countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart_new_adult where customers_id = '" . $customer_id . "' ");
				$countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart_new where products_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
				$countdvd = tep_db_fetch_array($countdvd_query);
				
				
//BEN001				$sc_query = tep_db_query("select * from shopping_cart_new_adult sc left join products_adult p on sc.products_id = p.products_id left join products_description_adult pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' ");
				$sc_query = tep_db_query("select * from shopping_cart_new sc left join products_description pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where products_type = 'DVD_ADULT' and sc.customers_id = '" . $customer_id . "' "); //BEN001
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
				$shipping=shipping($country['entry_country_id'],$countdvd['nbrdvd']);
			
				echo '<td width="25" class="slogan_red">' . $shipping . '</td></tr>';	
				$dectotprice = $dectotprice + $shipping;																		
				
				echo '<tr><td colspan="3" align="right" class="Std_pst"><b>Total: &nbsp;&nbsp;</b></td>';
				echo '<td class="Std_pst2"><b>' . $dectotprice . '€</b></td></tr>';	
				echo '</table>';				
				echo '<br>';
				//echo '<span class="slogan_black"><br><b>Total: ' . $dectotprice . 'EUR</b><br><br></span>';
					
						$ogone_orderID = $customer_id . date('YmdHis');
						$ogone_amount = $dectotprice * 100;
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'dvdsale_new_adult', '" . WEB_SITE_ID . "')");
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
						<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_new_adult.php">
						<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_new_adult.php">
						<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart_new_adult.php">
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
			</table>
	</td>
	<td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left_x.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid_x.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right_x.gif" width="11" height="10"></td>
  </tr>
</table>
