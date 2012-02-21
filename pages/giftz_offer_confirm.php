<style>
.Style_white_bold {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14;
	color: #FFFFFF;
	font-weight: bold;
}
.formAreaX
{
    BORDER-RIGHT: #B5B5B5 1px solid; 
    BORDER-TOP: #B5B5B5 1px solid;
    BORDER-LEFT: #B5B5B5 1px solid;
    BORDER-BOTTOM: #B5B5B5 1px solid
}
.Xmas_black_style {	font-family: Arial, Helvetica, sans-serif;font-size: 13px;}
</style>

<table width="761" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>  
    <td height="15" class="Style_white_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="1"></td>
  </tr>
  <tr>  
    <td height="33" bgcolor="#977D8A" class="Style_white_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="20" height="1"><?php  echo HEADING_TITLE ; ?></td>
  </tr>
  <tr>
    <td>
	  <img src="<?php  echo DIR_WS_IMAGES.'blank.gif';?>" height="15" width="1">
	</td>
  </tr>	
  <tr>
    <td>
	  <table border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
	    <td><img src="<?php  echo DIR_WS_IMAGES.'txt_recom/gift_top.gif';?>" border="0"></td>
	  </tr>
	  <tr>
        <td width="761" height="119" bgcolor="#EDEAED" class="Xmas_black_style">
		<?php 
		$custabo_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
		$custabo = tep_db_fetch_array($custabo_query);
		if ($custabo['customers_abo'] > 0){
			echo TEXT_YOU_HAVE_ABO . '<br><br>'; 
		}else{		
				$product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.products_id = '" . $HTTP_POST_VARS['products_id'] . "' and pd.language_id = '" . $languages_id . "' ");
				$product_info_values = tep_db_fetch_array($product_info);
				$final_price =  $product_info_values['products_price'];
				switch ($HTTP_POST_VARS['products_id']) {
				  case 2:
				  	$intdvdout = 1;
				  break;    
				  case 5:
				  	$intdvdout = 1;
				  break;    
				  case 6:
				  	$intdvdout = 2;
				  break;    
				  case 7:
				  	$intdvdout = 3;
				  break;    
				  case 8:
				  	$intdvdout = 4;
				  break;    
				  case 9:
				  	$intdvdout = 5;
				  break;    	      
				}
				?>
							<table cellspacing="0" width=99%>
								<tr valign="middle">
								  <td width="160" align="center">
										<table class="formAreaX"><tr><td>
										<?php  
										  switch ($product_info_values['products_id']) {
											case 2:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/basic.php'));
												break;
											case 5:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/regular.php'));
												break;
											case 6:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/classic.php'));
												break;
											case 7:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/discovery.php'));
												break;
											case 8:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/adventure.php'));
												break;
											case 9:
												include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/passion.php'));
												break;
											} 
										?>
										</td>
										</tr>
										</table>
								  </td>
								  <td class="SLOGAN_DETAIL"><?php  echo  TEXT_SUBSCRIPTION; ?>: <b><?php  echo $product_info_values['products_name'];?></b> <br>
									  <br>
									  <?php 
									switch ($HTTP_POST_VARS['products_id']) {
									  case 2:
										$intdvdout = 1;
									  break;    
									  case 5:
										$intdvdout = 1;
									  break;    
									  case 6:
										$intdvdout = 2;
									  break;    
									  case 7:
										$intdvdout = 3;
									  break;    
									  case 8:
										$intdvdout = 4;
									  break;    
									  case 9:
										$intdvdout = 5;
									  break;    	      
									}
									echo '<b>' . $intdvdout . '</b> ' . TEXT_DVD_IN_ROTATION;
									?>
									  <br>
									  <br>
									  <?php  echo TEXT_SUB_PRICE ;?>: <b><?php  echo $product_info_values['products_price'];?></b> </td>
								</tr>
							</table>

				<?php 							
				$ogone_orderID = $customer_id . date('YmdHis');
				$ogone_amount = $final_price * 100;
				tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'giftz_offer', '" . $HTTP_POST_VARS['products_id'] . "', '138', '" . WEB_SITE_ID . "')");
				$pspid = OGONE_PSPID;
				$textaliasusage = TEXT_ALIAS_USAGE; 
				$txtconditions = TEXT_HAVE_READ_CONDITIONS; 
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
				$COM = 'DVDPost' ;
				$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
				$customers = tep_db_fetch_array($customers_query);
				$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
				$alias = $customer_id;
				include(DIR_WS_CLASSES . 'sha.php');
				$sha = new SHA;
				$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
				?>				
		  </td>		  
		</tr>
      	<tr>
	    <td><img src="<?php  echo DIR_WS_IMAGES.'txt_recom/gift_back.gif';?>" border="0"></td>
	   </tr>
	  </table>
	</td>
</tr>
</table>
<p align="justify" class="Xmas_black_style"><?php  echo TEXT_CONFIRM_7 ;?></p>
<p align="center">				
				<form name="checkout_confirmation" method="post" action="<?php  echo OGONE_FORM_ACTION;?>">                                                                        
				<input type="hidden" name="prod" value="">
				<input type="hidden" name="orderID" value="<?php  echo $ogone_orderID;?>">
				<input type="hidden" name="pspid" value="<?php  echo OGONE_PSPID;?>">
				<input type="hidden" name="RL" value="ncol-2.0">
				<input type="hidden" name="currency" value="EUR">
				<input type="hidden" name="language" value="<?php  echo $ogonelanguage ;?>">
				<input type="hidden" name="amount" value="<?php  echo $ogone_amount ; ?>">
				<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/freetrial_cancel.php">
				<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/freetrial_cancel.php">
				<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/freetrial_cancel.php">
				<input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
				<input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/default.php">
				<input type="hidden" name="COM" value="<?php  echo $COM; ?>">
				<input type="hidden" name="PM" value="CreditCard">
				<input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
				<input type="hidden" name="ALIAS" value="<?php  echo $alias ?>">
				<input type="hidden" name="ALIASUSAGE" value="<?php  echo $textaliasusage ; ?>">
				<input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
				
				
			<?php 
				switch ($languages_id) {
					case '1':
					?>
							<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/bt_gift_confirm.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
						<?php 
						break;
					case '2':
						?>	
							<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/bt_gift_confirm.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">		
						<?php 
						break;
					case '3':
						?>	
							<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/bt_gift_confirm.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
						<?php 		
						break;
				}
			?>
				</form>
			<?php 
		}			
		?>
</p>
