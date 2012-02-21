<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="644"" border="0" align="center" cellpadding="0" cellspacing="0"center>
      <tr>
        <td align=center valign="top" class="SLOGAN_DETAIL"><br>
            <?php  
		$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
		$customers = tep_db_fetch_array($customers_query);
		if ($customers[customers_abo] > 0){
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
				            <form name="subcc" action="subscription_confirm.php" method="post">
				              <p>
				                <input type="hidden" name="products_id" value="<?php  echo $HTTP_GET_VARS['products_id']; ?> ">
				              </p>
				              <table width="428" border="0" cellspacing="0" cellpadding="0">
				                <tr>
				                  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
				                  <td width="400" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
				                </tr>
				                <tr>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><table cellspacing="0" width=99%>
				                      <tr valign="middle">
				                        <td width="180" align="center" valign="middle">
											<?php 
											if ($product_info_values[products_id] <16){ 
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/formula.php'));
											}else {
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/formula_limited.php'));
											}
											//$show_asterisk=0;
											?>
				                        </td>
				                        <td class="SLOGAN_DETAIL" valign="middle"><?php  echo  TEXT_SUBSCRIPTION; ?>: <b><?php  echo $product_info_values['products_name'];?></b> <br>
				                            <br>
				                            <?php 
												$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $HTTP_GET_VARS['products_id']);
												$products_abo = tep_db_fetch_array($products_abo_query);
												if ($products_abo['qty_credit']>0){
													$DVD_credit= $products_abo['qty_credit'];
													echo '<b>' . $DVD_credit . '</b> ' . TEXT_PER_MONTH;							
												}else{
													$DVD_at_home= $products_abo['qty_at_home'];
													echo '<b>' . $DVD_at_home . '</b> ' . TEXT_DVD_IN_ROTATION;
												}										
												?>
				                            <br><br>
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
					                            echo TEXT_FIRST_PAYMENT .'<b>'. round($final_price,2) .' &euro;</b><br><br>';

					                            echo  '<b>'. $discount_info_values['discount_abo_validityto_value'];
					                            switch ($discount_info_values['discount_abo_validityto_type']) {
													case 1:
							                            switch ($languages_id) {
															case 1:
																echo ' jour(s)';
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
												echo '</b><br><br>';

												echo TEXT_SUB_PRICES_AFTER .'<b>'. $product_info_values['products_price'] .' &euro;</b>';
							                            switch ($languages_id) {
															case 1:
																echo ' par mois';
															break;
															case 2:
																echo ' per maand';
															break;
															case 3:
																echo ' per month';
															break;
														}			
											  					  		
					                        }else{
					                            echo TEXT_SUB_PRICE .'<b>'.$final_price.'</b> &euro;<br><br>';
					                            echo '<b> 1' ;
							                            switch ($languages_id) {
															case 1:
																echo ' mois';
															break;
															case 2:
																echo ' maand';
															break;
															case 3:
																echo ' month';
															break;
														}			
												echo '</b>';
						                    }
				                            ?>				                         
				                        </td>
				                      </tr>
				                  </table></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                </tr>
				                <tr>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
				                </tr>
				              </table>
							  <br>
				              <table width="428" border="0" cellspacing="0" cellpadding="0">
				                <tr>
				                  <td width="14" height="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="SLOGAN_GRIS_13px"><?php  echo TEXT_SUB_PAY_METHOD ;?> (<a class="red_basiclink" href="payment.php"><?php echo TEXT_MORE_INFO;?></a>)</td>
				                  <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
				                </tr>
				                <tr>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><table  cellspacing="0" width=100%>
				                      <tr valign="middle" >
				                        <td width="397" class="SLOGAN_DETAIL"></td>
				                      </tr>
				                      <tr >
				                        <td class="SLOGAN_DETAIL"><table  width=100%>
				                            <?php 
									        	if ($HTTP_GET_VARS['error']>0){
										        	echo '<tr><td colapn=2 class="SLOGAN_DETAIL"><font color=red><b>' . TEXT_SUB_PAY_METHOD . '</b></font></tr>';
										        } 
									        	?>
				                            <tr>
				                              <td class="SLOGAN_DETAIL"><b><?php  echo TEXT_VISA;?></b></td>
				                              <td class="SLOGAN_DETAIL"><input type="radio" name="payment" value="ogonevisa"></td>
				                            </tr>
				                            <?php  
											//restrict  visa card 
											if ($discount_code_id != 294){
											?>
											<tr>
				                              <td class="SLOGAN_DETAIL"><b><?php  echo TEXT_EURO_MATER;?></b></td>
				                              <td class="SLOGAN_DETAIL"><input type="radio" name="payment" value="ogonemaster"></td>
				                            </tr>
				                            <tr>
				                              <td class="SLOGAN_DETAIL"><b><?php  echo TEXT_AMEX; ?></b></td>
				                              <td class="SLOGAN_DETAIL"><input type="radio" name="payment" value="ogoneamex"></td>
				                            </tr>
				                            <tr>
				                              <td class="SLOGAN_DETAIL" colspan=2>
				                              <?php  
				                              if($final_price<1){
					                              echo TEXT_NO_LINK_BCMC_BECAUSEFREE;
					                          }else{
					                              ?>
					                              <a class="red_basiclink" href="subscription_info_bcmc.php?products_id=<?php  echo $HTTP_GET_VARS['products_id'];?>&discount_code_id=<?php  echo $HTTP_GET_VARS['discount_code_id'];?>"><?php  echo TEXT_LINK_BCMC; ?></a>
					                              <?php 
						                      }
						                      ?>
				                              </td>
				                            </tr>
											<?php  } ?>
				                        </table></td>
				                      </tr>
				                  </table></td>
				                  <td align="right" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                </tr>
				                <tr>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
				                </tr>
				              </table>
				              <br>
				                            <?php 
				                        	if ($constants['WEB_SITE_ID'] == '26'){
					                        	?>
											<table width="428" border="0" cellspacing="0" cellpadding="0">
															<tr>
															  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
															  <td width="400" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="14"></td>
															  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
															</tr>
															<tr>
															  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
															  <td><table cellspacing="0" width=100%>
																  <tr>
																	<td>
											<table width=100%>
						                            <tr>
						                              <td colspan="2" height="35" valign="top" class="SLOGAN_DETAIL" align="center"><?php  echo TEXT_BELGIQUELOISIR_EXPLAIN;?></td>
						                            </tr>									
						                            <tr>
						                              <td class="SLOGAN_DETAIL"><b><?php  echo TEXT_BELGIQUELOISIRID;?></b></td>
						                              <td class="SLOGAN_DETAIL"><input name="belgiqueloisirs_id" type="text"></td>
						                            </tr>	
											   </table>
												</td>
											  </tr>
										  </table></td>
										  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
										</tr>
										<tr>
										  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
										  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
										  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
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
							  <?php  if ($show_asterisk==1){echo '<table width="428" border="0" cellspacing="0" cellpadding="0"><tr><td align="left" class="TYPO_ASTERISK">'.TEXT_ASTERISK.'</td></tr></table>';}?>
							  <br>
							  <input type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Continue" title=" Continue">
							  <br>
							  <br>
				              <table width="428" border="0" cellspacing="0" cellpadding="0">
				                <tr>
				                  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
				                  <td width="400" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="14"></td>
				                  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
				                </tr>
				                <tr>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><table cellspacing="0" width=100%>
				                      <tr>
				                        <td><table width=100%>
				                          <?php 
				                        	if ($constants['WEB_SITE_ID'] == '26'){
					                        	?>
				                          <?php 
					                        }
					                        //discount
				                            if ($HTTP_GET_VARS['discount_code_id'] > 0) {
				                            	echo '<input name="discount_code_id" type="hidden" value="' . $HTTP_GET_VARS['discount_code_id'] . '">';
				                            }else{
				                            	echo '<input name="discount_code_id" type="hidden" value="">';		                               
				                            } 
				                            ?>
				                          <tr>
				                            <td class="SLOGAN_DETAIL"><b><?php  echo TEXT_DELIVERY_ADRR; ?></b></td>
				                            <td class="SLOGAN_DETAIL"><?php 
											    		$addr_query = tep_db_query("select * from address_book where customers_id = '" . $customer_id . "' and address_book_id = '" . $customers['customers_default_address_id'] . "'");
														$addr = tep_db_fetch_array($addr_query);
														echo $addr['entry_firstname'] . ' ' . $addr['entry_lastname'] . '<br>' . $addr['entry_street_address'] . '<br>' . $addr['entry_postcode'] . ' ' .  $addr['entry_city'];
											        	?>
				                            </td>
				                          </tr>
				                        </table></td>
				                      </tr>
				                  </table></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                </tr>
				                <tr>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
				                  <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
				                  <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
				                </tr>
				              </table>		              
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
        <td align=center valign="top" class="SLOGAN_DETAIL">          <table width="120"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td height="160" align="left" valign="top"><table width="120" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hg_soft.jpg" width="9" height="9"></td>
                <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hd_soft.jpg" width="9" height="9"></td>
              </tr>
              <tr>
                <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
                <td><table width="159" border="0" cellpadding="0" cellspacing="0" class="DVDPost_softgrey">
                    <tr>
                      <td width="30"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/lock2.gif" width="27" height="27"></td>
                      <td width="122"><strong>SECURITY</strong></td>
                    </tr>
                    <tr valign="top">
                      <td height="90" colspan="2"><div align="left"><?php  echo TEXT_SECURITY ;?></div></td>
                    </tr>
                </table></td>
                <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
              </tr>
              <tr>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bg_soft.jpg" width="9" height="9"></td>
                <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bd_soft.jpg" width="9" height="9"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="160" align="left" valign="top"><table width="120" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hg_hard.jpg" width="9" height="9"></td>
                  <td bgcolor="#7C7A7A"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hd_hard.jpg" width="9" height="9"></td>
                </tr>
                <tr>
                  <td bgcolor="#7C7A7A"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
                  <td><table width="159" border="0" cellpadding="0" cellspacing="0" class="DVDPost_hardgrey">
                      <tr>
                        <td width="30"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/checkbox.gif" width="27" height="27"></td>
                        <td width="122"><strong>NO SPAM </strong></td>
                      </tr>
                      <tr valign="top">
                        <td height="90" colspan="2"><div align="left"><?php  echo TEXT_NO_SPAM ;?></div></td>
                      </tr>
                  </table></td>
                  <td bgcolor="#7C7A7A"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
                </tr>
                <tr>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bg_hard.jpg" width="9" height="9"></td>
                  <td bgcolor="#7C7A7A"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bd_hard.jpg" width="9" height="9"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="120" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hg_soft.jpg" width="9" height="9"></td>
                  <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/hd_soft.jpg" width="9" height="9"></td>
                </tr>
                <tr>
                  <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
                  <td><table width="159" border="0" cellpadding="0" cellspacing="0" class="DVDPost_softgrey">
                      <tr>
                        <td width="30"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/phone.gif" width="27" height="25"></td>
                        <td width="122"><strong>HELPLINE</strong></td>
                      </tr>
                      <tr valign="top">
                        <td height="90" colspan="2"><div align="left"><?php  echo TEXT_HELPLINE ;?></div></td>
                      </tr>
                  </table></td>
                  <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="13"></td>
                </tr>
                <tr>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bg_soft.jpg" width="9" height="9"></td>
                  <td bgcolor="#A5A3A3"><img src="<?php  echo DIR_WS_IMAGES;?>ogone/blank.gif" width="6" height="9"></td>
                  <td><img src="<?php  echo DIR_WS_IMAGES;?>ogone/bd_soft.jpg" width="9" height="9"></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>