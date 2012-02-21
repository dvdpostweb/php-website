<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
  <TR>
    <TD height="40" class="slogan_detail" align="center" >
		<table width="621" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="40" align="center" class="TYPO_STD2_GREY"><b><?php  echo HEADING_TITLE ?></b></td>
			</tr>	
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_top.gif" width="621" height="19"></td>
			</tr>
			<tr>
				<td background="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bckg.gif">
					<table width="593"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>	
							<td class="SLOGAN_BLACK">

				            <?php  
				            $customers_query = tep_db_query("select *, (UNIX_TIMESTAMP(customers_abo_validityto) - UNIX_TIMESTAMP(now())) / 86400 as nbrdays from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
							$customers = tep_db_fetch_array($customers_query);            

							if ($customers['customers_abo_type'] < 1 ){
								echo TEXT_NO_ABO.'<br><br>';
				            }else{
								if ($customers['customers_abo_type'] > $HTTP_GET_VARS['products_id']){
									echo TEXT_NO_UPGRADE.'<br><br>';
					            }else{
						            $products_query = tep_db_query("select p.products_price,  pd.products_name from products p,products_description pd where p.products_id  = '" . $customers['customers_abo_type'] . "' and p.products_id=pd.products_id AND pd.language_id=".$languages_id);
									$products = tep_db_fetch_array($products_query);            
									$oldaboprice = $products['products_price'];
									$oldaboname = $products['products_name'];
						
						            $products_query = tep_db_query("select p.products_price,  pd.products_name from products p,products_description pd where p.products_id = '" . $HTTP_GET_VARS['products_id'] . "' and p.products_id=pd.products_id AND pd.language_id=".$languages_id);
									$products = tep_db_fetch_array($products_query);            
									$newaboprice = $products['products_price'];
									$newaboname = $products['products_name'];
						
									$topay =  round(($newaboprice - $oldaboprice) * $customers['nbrdays'] / 30,2) ;		
									
										// NAME OF THE ACTUAL FORMULA
										$current_abo ='<font color="#d32f30">'. strtoupper($oldaboname) . '</font> ('.$oldaboprice.' €)' ;
										
										
										// NAME OF THE FORMULA AFTER UPGRADE										
										$upgrage_abo ='<font color="#d32f30">'. strtoupper($newaboname) . '</font> ('.$newaboprice.' €)' ;
										
									
									echo TEXT_YOUR_CURRENT_SUB . ' : <b>' . $current_abo . '</b><br><br>'; 
									echo TEXT_YOUR_UPGARDE .  ' :<b> ' . $upgrage_abo . '</b><br><br>'; 
									//echo TEXT_YOUR_VALIDITY .  ' :<b> ' .substr($customers['customers_abo_validityto'],0,10) . '</b><br><br>'; 
									echo TEXT_DAYS_TO_VALIDITY .  ' :<b> ' .floor($customers['nbrdays']) . ' '.TEXT_DAYS.'</b><br><br>'; 
									echo TEXT_TO_PAY .  ' :<b> ' . $topay . '€<br>'; 
									
						
									$ogone_amount = $topay * 100;
									$ogone_orderID = $customer_id . date('YmdHis');
									tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'upgrade', '" . $HTTP_GET_VARS['products_id'] . "' )");
									$pspid = OGONE_PSPID;
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
									$COM = 'ABO upgrade' ;
									$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
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
						              <input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/gift_cancel.php">
						              <input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/gift_cancel.php">
						              <input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/gift_cancel.php">
						              <input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
						              <input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/default.php">
						              <input type="hidden" name="COM" value="<?php  echo $COM;?>">
						              <input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
						              <input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
									  <div align="center"><br>
						              <input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">
									  </div>
									</form>			
									<?php         
								}
							}

							echo '<br><a class="red_slogan" href="javascript:window.history.go(-1);">' . TEXT_CANCEL. '</a>';
							?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bottom.gif" width="621" height="19"></td>
			</tr>			
		</table>
	  </td>
	</tr>
	<tr>
		<td><br><br></td>
	</tr>
</table>