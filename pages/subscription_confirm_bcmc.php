<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
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
	  	<table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
            <td width="572" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
            <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
          </tr>
          <tr>
            <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
            <td class="SLOGAN_DETAIL">
			  <b><?php  echo TEXT_ORDER_CONFIRMATION; ?><b><br>
			  <table  width=572>
              <tr>
                <td width="66%"><b class="SLOGAN_DETAIL"><?php  echo TEXT_SUBSCRIPTION; ?> :</b></td>
                <td width="34%" class="SLOGAN_DETAIL"><?php  echo $product_info_values['products_name']; ?></td>
              </tr>
              <tr>
                <td><b class="SLOGAN_DETAIL"><?php  echo TEXT_SUBSCRIPTION_INFO; ?> : </b></td>
                <td class="SLOGAN_DETAIL"><?php  echo $formula_inf ; ?></td>
              </tr>
              <tr>
                <td><b class="SLOGAN_DETAIL"><?php  echo TEXT_SUB_PRICE; ?> : </b></td>
                <td class="SLOGAN_DETAIL"><?php  echo $product_info_values['products_price']; ?> EUR</td>
              </tr>
              <?php  
				        if($code['discount_code_id'] > 0){
					        ?>
              <tr>
                <td class="SLOGAN_DETAIL"><b class="SLOGAN_DETAIL"><?php  echo TEXT_DISCOUNT; ?> : </b></td>
                <td class="SLOGAN_DETAIL"><?php  
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
                    <font class="SLOGAN_DETAIL_ROUGE"><?php  echo $strdiscount_code_line_explained;?></font>             
              </tr>
              <tr align="center">
                <td colspan=2><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="500" height="6"></td>
              </tr>
              <tr>
                <td class="SLOGAN_DETAIL"><b class="SLOGAN_DETAIL"><?php  echo TEXT_FINAL_PRICE; ?> : </b></td>
                <td class="SLOGAN_DETAIL_ROUGE"><?php  echo $final_price; ?> EUR</td>
              </tr>
              <?php 
					    }
							if (strlen($HTTP_POST_VARS['sponsoring_email'])>0){
					        ?>
              <tr>
                <td><b class="SLOGAN_DETAIL"><?php  echo TEXT_SPONSORING_EMAIL; ?> : </b></td>
                <td class="SLOGAN_DETAIL"><?php  echo $HTTP_POST_VARS['sponsoring_email']; ?></td>
              </tr>
              <?php 
					    }
					    
				        ?>
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
	
		<table width="600"  border="0" cellspacing="0" cellpadding="0">
		    <tr>
		      <td align="left">        <table width="120" border="0" cellspacing="0" cellpadding="0">
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
		        </table>      </td>
		      <td align="center"><table width="120" border="0" cellspacing="0" cellpadding="0">
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
		      </table>
		      </td>
		      <td align="right"><table width="120" border="0" cellspacing="0" cellpadding="0">
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
		      </table>
		      </td>
		    </tr>
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
      
				$ogone_amount = $final_price * 100;
				$ogone_orderID = $customer_id . date('YmdHis');
				tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id,sponsoring_email,site,belgiqueloisirs_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'bcmc', '" . $HTTP_POST_VARS['products_id'] . "', '" . $code['discount_code_id'] . "', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "', '" . $HTTP_POST_VARS['belgiqueloisirs_id']. "')");
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
				//$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
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
				<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/subscription_cancel.php">
				<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/subscription_cancel.php">
				<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/subscription_cancel.php">
				<input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
				<input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/default.php">
				<?php  
					switch ($HTTP_POST_VARS['payment']){
						case 'bcmc' :
		        			?>
							<input type="hidden" name="PM" value="CreditCard">
							<input type="hidden" name="BRAND" value="bcmc">
		        			<?php 
						break;			
						case 'inghomepay' :
		        			?>
							<input type="hidden" name="PM" value="ING HomePay">
		        			<?php 
						break;			
						case 'cbconline' :
		        			?>
							<input type="hidden" name="PM" value="CBC Online">
		        			<?php 
						break;			
						case 'dexianetbanking' :
		        			?>
							<input type="hidden" name="PM" value="DEXIA NetBanking">
		        			<?php 
						break;			
						case 'kbconline' :
		        			?>
							<input type="hidden" name="PM" value="KBC Online">
		        			<?php 
						break;			
						}
				?>
		        <input type="hidden" name="COM" value="<?php  echo $COM;?>">
				<input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
				<input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
				<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
				</form>
				<?php 
		
	}else{
		echo TEXT_THEREIS_A_PROBLEM . '<br>';
		echo $strreason;	
	}
      ?>       
    </td>    
  </tr>
</table>