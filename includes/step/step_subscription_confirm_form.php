<tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="423" height="300" background="<?php   echo DIR_WS_IMAGES ;?>step/bckg_step3.gif" bgcolor="#FFFFFF" valign="top">       
	    <table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		    <td class="SLOGAN_DETAIL"  align=center>
			<br>
		    <?php   
			$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.language_id = '" . $languages_id . "' ");
			$product_info_values = tep_db_fetch_array($product_info);
								  		
			$final_price =  $product_info_values['products_price'];
			
			$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $product_info_values['products_id']);
			$products_abo = tep_db_fetch_array($products_abo_query);
			if ($products_abo['qty_credit']>0){
				$DVD_credit= $products_abo['qty_credit'];
				$formula_inf = '<b>' . $DVD_credit . '</b> ' . TEXT_PER_MONTH;							
			}else{
				$DVD_at_home= $products_abo['qty_at_home'];
				$formula_inf = '<b>' . $DVD_at_home . '</b> ' . TEXT_DVD_IN_ROTATION;
			}										
		
			$allisok = 1;
		
			if($HTTP_POST_VARS['discount_code_id'] >0 ){
				$code_query = tep_db_query("select * from " . TABLE_DISCOUNT_CODE . " where discount_code_id  = '" . $HTTP_POST_VARS['discount_code_id'] . "' ");
				$code = tep_db_fetch_array($code_query);
				if($code['discount_code_id'] > 0){
					if($code['discount_status'] < 1 or $code['discount_limit'] < 1){
						$allisok = 0;
						$strreason= TEXT_DISCOUNT_EXPIRED;				
					}
					if($code['bypass_discountuse'] < 1){									
						$use_query = tep_db_query("select * from " . TABLE_DISCOUNT_USE . " where customers_id  = '" . $customer_id . "' and discount_use_date > DATE_sub(now(), INTERVAL " . $code['discount_nbr_month_before_reuse'] . " MONTH)");
						$use = tep_db_fetch_array($use_query);
						if($use['discount_use_id'] > 0){
							$allisok = 0;
							$strreason= TEXT_DISCOUNT_ALREADY_USED;					
						}			
					}			
					switch ($code['discount_type']) {
						case 1: // - X%
						if ($code['discount_code_id'] == 28){ //amex reduction not for other pay method than amex
							if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){
								$strdiscount_code_line_explained = ($code['discount_value'] / 100 * $final_price ) . ' EUR';
								$final_price  = ($final_price  - ($code['discount_value'] / 100 * $final_price ))  ;
								$discount_code_id_used= $code['discount_code_id'];	
							    tep_session_register('discount_code_id_used');
							}else{
								$allisok = 0;
								$strreason= TEXT_ERROR_AMEX;					
							}	
						}else{
							$strdiscount_code_line_explained= ($code['discount_value'] / 100 * $final_price ) . ' EUR';
							$final_price  = ($final_price  - ($code['discount_value']  / 100 * $final_price ))  ;
							$discount_code_id_used= $code['discount_code_id'];	
						    tep_session_register('discount_code_id_used');								
						}
						break;
						case 2: //tot=x euro 
							if ($code['discount_code_id'] == 59){ //amex reduction not for other pay method than amex
								if ($HTTP_POST_VARS['payment'] == 'ogoneamex'){ 
									$strdiscount_code_line_explained= ($final_price - $code['discount_value']) . ' EUR';
									$final_price = ($final_price - $final_price + $code['discount_value'])  ;
									$discount_code_id_used= $code['discount_code_id'];	
								    tep_session_register('discount_code_id_used');
								}else{
									$allisok = 0;
									$strreason= TEXT_ERROR_AMEX;					
								}	
							}else{
									//$strdiscount_code_line_explained= ($final_price - $code['discount_value']) . ' EUR';
									$final_price = ($final_price - $final_price + $code['discount_value'])  ;
									$discount_code_id_used= $code['discount_code_id'];	
								    tep_session_register('discount_code_id_used');
							}
						break;
						case 3: //tot=tot - x euro 
							$strdiscount_code_line_explained= ($code['discount_value']) . ' EUR';
							$final_price = ($final_price - $code['discount_value'])  ;
							$discount_code_id_used= $code['discount_code_id'];	
						    tep_session_register('discount_code_id_used');
						break;
					}			
				}else{
					$allisok = 0;
					$strreason= TEXT_WRONG_DISCOUNT;	
				}
			}
			
			$final_price = round($final_price,2);
			
			if ($allisok>0){			
				?>
			  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		          <tr>
		            <td class="step_title" colspan="2" height="45" valign="middle">
					  <b><?php   echo TEXT_ORDER_CONFIRMATION; ?><b>
					</td>
				  </tr>		              
		              <tr>
		                <td class="step_title" height="20"><?php   echo TEXT_SUBSCRIPTION_INFO; ?> : </td>
		                <td class="step_title"><?php   echo $formula_inf ; ?></td>
		              </tr>
		              <tr>
		                <td class="step_title" height="20"><?php   echo TEXT_SUB_PRICE; ?> : </td>
		                <td class="step_title"><?php   echo $product_info_values['products_price']; ?> EUR</td>
		              </tr>
		              <?php   
				        if($code['discount_code_id'] > 0){
			          ?>
		              <tr>
		                <td class="step_title" height="20"><?php   echo TEXT_DISCOUNT; ?> : </td>
		                <td class="step_title"><?php   
											switch ($languages_id){
												case 1:
													echo $code['discount_text_fr'];
												break;
												case 2:
													echo $code['discount_text_nl'];
												break;
												case 3:
													echo $code['discount_text_en'];
												break;
											}				        	
							        	?>
		                    <br>
		                    <font class="SLOGAN_DETAIL_ROUGE" height="20"><?php   echo $strdiscount_code_line_explained;?></font>             
		              </tr>
		              <tr>
			        	<td colspan="2" height="10" align="center" background="<?php   echo DIR_WS_IMAGES ;?>step/step_line.gif" >
			        		<img src="<?php   echo DIR_WS_IMAGES ;?>blank.gif" height="10" width="10">
			        	</td>			
			        </tr>
		              <tr>
		                <td class="step_title" height="20"><?php   echo TEXT_FINAL_PRICE; ?> : </td>
		                <td class="SLOGAN_DETAIL_ROUGE"><?php   echo $final_price; ?> EUR</td>
		              </tr>
		              <?php  
							    }
									if (strlen($HTTP_POST_VARS['sponsoring_email'])>0){
							        ?>
		              <tr>
		                <td class="step_title"><?php   echo TEXT_SPONSORING_EMAIL; ?> : </td>
		                <td class="step_title"><?php   echo $HTTP_POST_VARS['sponsoring_email']; ?></td>
		              </tr>
		              <?php  
							    }
							    
						        ?>
				  </table>
				  <br>
			
			  	<?php  
			  	//code tracking 3 suisses 
				$ci_query = tep_db_query("select site from customers where customers_id  = '" . $customer_id . "' ");
				$ci = tep_db_fetch_array($ci_query);
			  	if ($ci['site'] == '3suisses') {
						switch ($languages_id) {
							case '1':
							  	?>
							  	<a href="http://home.edt02.net/emc/banner/mstbc.php?c=11050-109193-8307-1131-129681" target=_blank>
									<img src="http://home.edt02.net/emc/banner/mstbo.php?c=11050-109193-8307-1131-129681&edt_rnd=[timestamp]" border=0 width=1 height=0>
								</a>
							  	<?php  
							case '2':
							  	?>
								<a href="http://home.edt02.net/emc/banner/mstbc.php?c=13990-109195-8308-1131-132624" target=_blank>
									<img src="http://home.edt02.net/emc/banner/mstbo.php?c=13990-109195-8308-1131-132624&edt_rnd=[timestamp]" border=0 width=1 height=0>
								</a>					  	
								<?php  
							case '3':
							  	?>
							  	<a href="http://home.edt02.net/emc/banner/mstbc.php?c=11050-109193-8307-1131-129681" target=_blank>
									<img src="http://home.edt02.net/emc/banner/mstbo.php?c=11050-109193-8307-1131-129681&edt_rnd=[timestamp]" border=0 width=1 height=0>
								</a>
							  	<?php  
						}				
				}
				$sponsoring_email = $HTTP_POST_VARS['sponsoring_email'] ;
				
				if ($final_price == 0){
					//echo '<br>' . TEXT_WARANTYWHENFREE . '<br>';
					echo '<br>' ;			
				}
				echo '<INPUT type="checkbox" checked>';
				echo '<a  class="red_slogan" href="conditions.php" target=new>';
				echo TEXT_HAVE_READ_CONDITIONS . '<br>'; 
				echo '</a><br>';
		      
				switch ($HTTP_POST_VARS['payment']){
					case 'domiciliation' :
					?>
						<form name="checkout_confirmation" method="post" action="checkout_domiciliation2.php">                                                                         
							<input type="hidden" name="products_id" value="<?php   echo $HTTP_POST_VARS['products_id'] ; ?>">
							<input type="hidden" name="discount_id" value="<?php   echo $code['discount_code_id'] ; ?>">
							<input type="hidden" name="firstpayment" value="<?php   echo $final_price ; ?>">
							<input name="submit" type="image" src="<?php   echo DIR_WS_IMAGES ;?>/languages/<?php   echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit">
						</form>
						<?php  
					break;
							
					case 'ogonevisa' :
						$ogone_amount = $final_price * 100;
						$ogone_orderID = $customer_id . date('YmdHis');
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'norm', '" . $HTTP_POST_VARS['products_id'] . "', '" . $code['discount_code_id'] . "', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
						$pspid = OGONE_PSPID;
						$textaliasusage = TEXT_ALIAS_USAGE; 
						switch ($languages_id) {
							case '1':
								$ogonelanguage = 'fr_FR';
								$template_ogone = 'Template_standard2FR.htm';
								break;
							case '2':
								$ogonelanguage = 'nl_NL';
								$template_ogone = 'Template_standard2NL.htm';
								break;
							case '3':
								$ogonelanguage = 'en_US';
								$template_ogone = 'Template_standard2EN.htm';
								break;
						}				
						$COM = TEXT_OGONE_COM ;
						$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
						$alias = $customer_id;
						include(DIR_WS_CLASSES . 'sha.php');
						$sha = new SHA;
						$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
						?>
						<form name="checkout_confirmation" method="post" action="<?php   echo OGONE_FORM_ACTION;?>">                                                                         
						<input type="hidden" name="prod" value="">
						<input type="hidden" name="orderID" value="<?php   echo $ogone_orderID;?>">
						<input type="hidden" name="pspid" value="<?php   echo OGONE_PSPID;?>">
						<input type="hidden" name="RL" value="ncol-2.0">
						<input type="hidden" name="currency" value="EUR">
						<input type="hidden" name="language" value="<?php   echo $ogonelanguage ;?>">
						<input type="hidden" name="amount" value="<?php   echo $ogone_amount ; ?>">
						<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
						<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
						<input type="hidden" name="PM" value="CreditCard">
				        <input type="hidden" name="BRAND" value="VISA">
				        <input type="hidden" name="COM" value="<?php   echo $COM;?>">
						<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
						<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
						<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
						<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">
						<input name="submit" type="image" src="<?php   echo DIR_WS_IMAGES ;?>/languages/<?php   echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit">
						</form>
						<?php  
					break;
					
					
					case 'ogonemaster' :
						$ogone_amount = $final_price * 100;
						$ogone_orderID = $customer_id . date('YmdHis');
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'norm', '" . $HTTP_POST_VARS['products_id'] . "', '" . $code['discount_code_id'] . "', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
						$pspid = OGONE_PSPID;
						$textaliasusage = TEXT_ALIAS_USAGE; 
						switch ($languages_id) {
							case '1':
								$ogonelanguage = 'fr_FR';
								$template_ogone = 'Template_standard2FR.htm';
								break;
							case '2':
								$ogonelanguage = 'nl_NL';
								$template_ogone = 'Template_standard2NL.htm';
								break;
							case '3':
								$ogonelanguage = 'en_US';
								$template_ogone = 'Template_standard2EN.htm';
								break;
						}				
						$COM = TEXT_OGONE_COM ;
						$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
						$alias = $customer_id;
						include(DIR_WS_CLASSES . 'sha.php');
						$sha = new SHA;
						$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
						?>
						<form name="checkout_confirmation" method="post" action="<?php   echo OGONE_FORM_ACTION;?>">                                                                         
						<input type="hidden" name="prod" value="">
						<input type="hidden" name="orderID" value="<?php   echo $ogone_orderID;?>">
						<input type="hidden" name="pspid" value="<?php   echo OGONE_PSPID;?>">
						<input type="hidden" name="RL" value="ncol-2.0">
						<input type="hidden" name="currency" value="EUR">
						<input type="hidden" name="language" value="<?php   echo $ogonelanguage ;?>">
						<input type="hidden" name="amount" value="<?php   echo $ogone_amount ; ?>">
						<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
						<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
						<input type="hidden" name="PM" value="CreditCard">
				        <input type="hidden" name="BRAND" value="Mastercard">
				        <input type="hidden" name="COM" value="<?php   echo $COM;?>">
						<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
						<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
						<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
						<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">
						<input name="submit" type="image" src="<?php   echo DIR_WS_IMAGES ;?>/languages/<?php   echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit">
						</form>
						<?php  
					break;
		
					
								
					case 'ogoneamex' :
						$ogone_amount = $final_price * 100;
						$ogone_orderID = $customer_id . date('YmdHis');
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'norm', '" . $HTTP_POST_VARS['products_id'] . "', '" . $code['discount_code_id'] . "', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
						$pspid = OGONE_PSPID;
						$textaliasusage = TEXT_ALIAS_USAGE; 
						switch ($languages_id) {
							case '1':
								$ogonelanguage = 'fr_FR';
								$template_ogone = 'Template_standard2FR.htm';
								break;
							case '2':
								$ogonelanguage = 'nl_NL';
								$template_ogone = 'Template_standard2NL.htm';
								break;
							case '3':
								$ogonelanguage = 'en_US';
								$template_ogone = 'Template_standard2EN.htm';
								break;
						}				
						$COM = TEXT_OGONE_COM ;
						$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
						$alias = $customer_id;
						include(DIR_WS_CLASSES . 'sha.php');
						$sha = new SHA;
						$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
						?>
						<form name="checkout_confirmation" method="post" action="<?php   echo OGONE_FORM_ACTION;?>">                                                                         
						<input type="hidden" name="prod" value="">
						<input type="hidden" name="orderID" value="<?php   echo $ogone_orderID;?>">
						<input type="hidden" name="pspid" value="<?php   echo OGONE_PSPID;?>">
						<input type="hidden" name="RL" value="ncol-2.0">
						<input type="hidden" name="currency" value="EUR">
						<input type="hidden" name="language" value="<?php   echo $ogonelanguage ;?>">
						<input type="hidden" name="amount" value="<?php   echo $ogone_amount ; ?>">
						<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/subscription_cancel.php">
						<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
						<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
						<input type="hidden" name="PM" value="CreditCard">
				        <input type="hidden" name="BRAND" value="American Express">
				        <input type="hidden" name="COM" value="<?php   echo $COM;?>">
						<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
						<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
						<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
						<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">
						<input name="submit" type="image" src="<?php   echo DIR_WS_IMAGES ;?>/languages/<?php   echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit">
						</form>
						<?php  
					break;
					
				}      
				
			}else{
				echo TEXT_THEREIS_A_PROBLEM . '<br>';
				echo $strreason;	
			}
		      ?>       
		    </td>    
		  </tr>
		</table>
    <td width="12" height="10">&nbsp;</td>
</tr>