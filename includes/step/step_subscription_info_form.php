<tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="423" height="300" background="<?php  echo DIR_WS_IMAGES ;?>step/bckg_step3.gif" bgcolor="#FFFFFF" valign="top">       
	    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
	    	<tr> 
            	<td height="30" align valign="middle" class="limitedtitle""left"><?php  echo TEXT_TITLE_CONFIRM ;?></td>
            </tr>
	  		<tr>
	    		<td>
	    			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	      				<tr>
							<td align=center valign="top" class="SLOGAN_DETAIL"><br>
							<?php  
							$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
							$customers = tep_db_fetch_array($customers_query);
							if ($customers['customers_abo'] > 0){
								echo TEXT_YOU_HAVE_ALREADY_ABO;
							}else{
								if ($customers['domiciliation'] > 0){
									echo TEXT_ALREADYASKDOM;
								}else{
									if ($customers[domiciliation_status]>0){
										echo TEXT_ERROR_DOMICILIATIONEXISTS;
									}else{
										$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $HTTP_GET_VARS['products_id'] . "' and pd.products_id = '" . $HTTP_GET_VARS['products_id'] . "' and pd.language_id = '" . $languages_id . "' and  products_type='ABO' and  products_status=1 ");
										if ($product_info_values = tep_db_fetch_array($product_info)){					  		
										?>
											<form name="subcc" action="step_subscription_confirm.php" method="post">
											<p>
											<input type="hidden" name="products_id" value="<?php  echo $HTTP_GET_VARS['products_id']; ?> ">
											</p>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tr>													
													<td width="50%" align="left" valign="top" class="step_title"><br>
														<?php 
															echo TEXT_MEMBERSHIP.' ';
															$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $HTTP_GET_VARS['products_id']);
															$products_abo = tep_db_fetch_array($products_abo_query);
																if ($products_abo['qty_credit']>0){
																	$DVD_credit= $products_abo['qty_credit'];
																	echo '<b>' . $DVD_credit . '</b> ' . TEXT_DVDS;							
																}else{
																	$DVD_at_home= $products_abo['qty_at_home'];
																	echo '<b>' . $DVD_at_home . '</b> ' . TEXT_DVD_IN_ROTATION;
																}										
														?>
										            </td>
													<td width="50%" align="center" valign="top" class="step_title">
														<?php 					                            
														$final_price = $product_info_values['products_price'];
					                            		if($HTTP_GET_VARS['discount_code_id']>0){
											                switch ($languages_id) {
																case 1:
										                            echo '<b>'. $discount_info_values['discount_text_fr'] .'</b><br>';
																break;
																case 2:
										                            echo '<b>'. $discount_info_values['discount_text_nl'] .'</b><br>';
																break;
																case 3:
										                            echo '<b>'. $discount_info_values['discount_text_en'] .'</b><br>';
																break;
															}			
											                            	                            
														  	$discount_info = tep_db_query("select * from discount_code where discount_code_id = '" . $HTTP_GET_VARS['discount_code_id'] . "' ");
														  	$discount_info_values = tep_db_fetch_array($discount_info);	
									  	
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
																
															
															if ($discount_info_values['discount_recurring_nbr_of_month']>0){
																switch($languages_id)
																	  {
																	  case 1:
																	    $description=$discount_info_values['discount_text_fr'];
																	  	break;
																	  case 2:
																	  	$description=$discount_info_values['discount_text_nl'];
																	  	break;																	  
																	  case 3:
																	    $description=$discount_info_values['discount_text_en'];
																	  	break;
																	  }																
																	echo '<b>'. round($final_price,2) .' &euro;</b><br><br>';
																	echo $description.'<br>' ;	
															}else{
																echo '<b>'. round($final_price,2) .' &euro;</b><br><br>';
																echo  $discount_info_values['discount_abo_validityto_value'];
									                            switch ($discount_info_values['discount_abo_validityto_type']) {
																	case 1:
											                            switch ($languages_id) {
																			case 1:
																				echo ' jours';
																			break;
																			case 2:
																				echo ' dag(en)';
																			break;
																			case 3:
																				echo ' day(s)';
																			break;
																		}			
																	break;
																	case 2:
											                            switch ($languages_id) {
																			case 1:
																				echo ' mois';
																			break;
																			case 2:
																				echo ' maand(en)';
																			break;
																			case 3:
																				echo ' month(s)';
																			break;
																		}			
																	break;
																	case 3:
											                            switch ($languages_id) {
																			case 1:
																				echo ' année(s)';
																			break;
																			case 2:
																				echo ' jaar (jaren)';
																			break;
																			case 3:
																				echo ' year(s)';
																			break;
																		}			
																	break;
																}							
																echo '<br><br>';
		
																//echo TEXT_SUB_PRICES_AFTER .'<b>'. $product_info_values['products_price'] .' &euro;</b>';
									                            //switch ($languages_id) {
																//	case 1:
																//		echo ' par mois';
																//	break;
																//	case 2:
																//		echo ' per maand';
																//	break;
																//	case 3:
																//		echo ' per month';
																//	break;
																//}
															}												  				  		
														}else{
								                            echo'<br><b>'.$final_price.'</b> &euro; &nbsp;&nbsp;(<a class="infolink" href="step3.php">'.TEXT_MODIFY.'</a>)';
								                            
									                    }
														?>				                         
												</td>
											</tr>
										</table>
												
										
										<br>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
							                <tr>
			        							<td  height="10" align="center" background="<?php  echo DIR_WS_IMAGES ;?>step/step_line.gif" ><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" height="10" width="10"></td>			
									        </tr>
											<tr>							                  
							                  <td  class="step_title" height="35" valign="middle"><B><?php  echo TEXT_DELIVERY_ADRR ;?></B></td>							                  
							                </tr>
											<tr>	
											<?php 
												if ($constants['WEB_SITE_ID'] == '26'){
					                             }
						                        //discount
					                            if ($HTTP_GET_VARS['discount_code_id'] > 0) {
					                            	echo '<input name="discount_code_id" type="hidden" value="' . $HTTP_GET_VARS['discount_code_id'] . '">';
					                            }else{
					                            	echo '<input name="discount_code_id" type="hidden" value="">';		                               
					                            } 
					                        	?>											
												<td class="step_title">
													<?php 
										    		$addr_query = tep_db_query("select * from address_book where customers_id ='" . $customer_id . "' and address_book_id = '" . $customers['customers_default_address_id'] . "'");
													$addr = tep_db_fetch_array($addr_query);
													echo $addr['entry_firstname'] . ' ' . $addr['entry_lastname'] . '<br>' . $addr['entry_street_address'] . '<br>' . $addr['entry_postcode'] . ' ' .  $addr['entry_city'];
										        	?>
										        	<br><br>
												</td>												
									        </tr>
									    </table>							        
									    <br>    
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
							                <tr>
			        							<td colspan="2" height="10" align="center" background="<?php  echo DIR_WS_IMAGES ;?>step/step_line.gif" ><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" height="10" width="10"></td>			
									        </tr>
											<tr>							                  
							                  <td  colspan="2" class="step_title" height="35" valign="middle"><B><?php  echo TEXT_SUB_PAY_METHOD ;?></B> 
												<?php  
													if (ENTITY_ID == 1){
														echo  '(<a class="infolink" href="payment.php">'.TEXT_MORE_INFO.'</a>)';
													}
												?>
											</td>							                  
							                </tr>
												<?php 
												  	if ($HTTP_GET_VARS['error']>0){
													  	echo '<tr><td colspan="2" height="12" align="center" class="step_title"><font color=red><b>' . TEXT_SUB_PAY_METHOD_ERROR . '</b></font></tr>';
												     } 
												?>
											<tr>
												<td class="step_title" height="25" valign="middle"><b><?php  echo TEXT_VISA;?></b></td>
												<td class="step_title" height="25" valign="middle"><input type="radio" name="payment" value="ogonevisa"></td>
											</tr>
											<?php  
											//restrict  visa card 
											if ($discount_code_id != 294){
											?>
											<tr>
										       <td class="step_title" height="25" valign="middle"><b><?php  echo TEXT_EURO_MATER;?></b></td>
										       <td class="step_title" height="25" valign="middle"><input type="radio" name="payment" value="ogonemaster"></td>
										    </tr>
										    <tr>
				    	                      <td class="step_title" height="25" valign="middle"><b><?php  echo TEXT_AMEX; ?></b></td>
				                              <td class="step_title" height="25" valign="middle"><input type="radio" name="payment" value="ogoneamex"></td>
				                            </tr>
				                            <tr>
				                              <td class="step_title" colspan="2" height="25" valign="middle">
				                              <?php 
											  if (ENTITY_ID == 1){
												if($final_price<1){
													$dom_url_link ='step_subscription_info_dom.php?products_id='.$HTTP_GET_VARS['products_id'].'&discount_code_id='.$HTTP_GET_VARS['discount_code_id'];
													$DOM_LINK = TEXT_DOM_LINK ;
													$DOM_LINK = str_replace('µµµlink_domµµµ',  $dom_url_link , $DOM_LINK);
													echo '<br>'.$DOM_LINK.'<br>';
												}else{
													?>				                              
													<a class="infolink" href="step_subscription_info_bcmc.php?products_id=<?php  echo $HTTP_GET_VARS['products_id'];?>&discount_code_id=<?php  echo $HTTP_GET_VARS['discount_code_id'];?>"><?php  echo TEXT_LINK_BCMC; ?></a>
													<?php 
												}
											  }
						                      ?>
				                              </td>
				                            </tr>
											<?php  } ?>
										</table>										
										<br>
										<?php 
										if ($constants['WEB_SITE_ID'] == '26'){
										?>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td colspan="2" height="35" valign="top" class="SLOGAN_DETAIL" align="center"><?php  echo TEXT_BELGIQUELOISIR_EXPLAIN;?></td>
											</tr>									
											<tr>
												<td class="SLOGAN_DETAIL"><b><?php  echo TEXT_BELGIQUELOISIRID;?></b></td>
												<td class="SLOGAN_DETAIL"><input name="belgiqueloisirs_id" type="text"></td>
											</tr>	
										</table>							                      	
						                <?php 
						                }
						                //discount
										if ($HTTP_GET_VARS['discount_code_id'] > 0) {
											echo '<input name="discount_code_id" type="hidden" value="' . $HTTP_GET_VARS['discount_code_id'] . '">';
										}else{
											echo '<input name="discount_code_id" type="hidden" value="">';		                               
										} 
										?>										
										<br>
										<div align="right"><input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>/languages/<?php  echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit"></div>
										<br>
										<br>													              
										</form>
										<?php 
										} else {
										?>
										<br>
											<table width="428" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
													<td width="400" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="14"></td>
													<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
												</tr>
												<tr>
													<td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
													<td align="center" valign="middle" class="SLOGAN_DETAIL" height="400"> <?php  echo TEXT_NOT_EXISTING_FORMULA; ?></td>
													<td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
												</tr>
												<tr>
													<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
													<td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
													<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
												</tr>
											</table>
										<?php } 
									}
								}
							}
							?>			  
							</td>	        
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
    <td width="12" height="10">&nbsp;</td>
</tr>