<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="main-removed" align=center>
      <?php  
      $product_info = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_image_big, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '5' and pd.products_id = '5' and pd.language_id = '" . $languages_id . "' ");
	  $product_info_values = tep_db_fetch_array($product_info);
	  
  	  $intdvdout = 1;	
	  $final_price = 39.9 ;
		
      ?>  
   	  	<table width="428" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom3.gif" width="14" height="35"></td>
            <td width="156" align="center" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom3.gif" class="SLOGAN_GRIS_13px"><?php  echo TEXT_ORDER_CONFIRMATION; ?></td>
            <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom3.gif" width="14" height="35"></td>
          </tr>
          <tr>
            <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
            <td><table  width=100%>
              <tr>
                <td><b><?php  echo TEXT_SUBSCRIPTION; ?> :</b></td>
                <td><?php  echo $product_info_values['products_name']; ?></td>
              </tr>
              <tr>
                <td><b><?php  echo TEXT_DVD_IN_ROTATION; ?> : </b></td>
                <td><?php  echo $intdvdout ; ?></td>
              </tr>
              <tr>
                <td><b><?php  echo TEXT_SUB_PRICE; ?> : </b></td>
                <td><?php  echo $product_info_values['products_price']; ?> EUR</td>
              </tr>
              <tr>
                <td><b><?php  echo TEXT_DISCOUNT; ?> : </b></td>
                <td><?php  echo TEXT_DISCOUNT_AS; ?> <br>
                    <font color=red><?php  echo TEXT_DISCOUNT_AS_EXPLAINED;?></font>             
              </tr>
              <tr>
                <td colspan=2><hr></td>
              </tr>
              <tr>
                <td><b><?php  echo TEXT_FINAL_PRICE; ?> : </b></td>
                <td><?php  echo $final_price; ?> EUR</td>
              </tr>
              <tr>
                <td colspan=2 align=center><?php 
					    
						$ogone_amount = $final_price * 100;
						$ogone_orderID = $customer_id . date('YmdHis');
						tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id,sponsoring_email,site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'as_reconduction_upfront', '5', '109', '" . $sponsoring_email . "', '" . WEB_SITE_ID . "')");
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
                      <input type="hidden" name="PM" value="CreditCard">
                      <input type="hidden" name="COM" value="<?php  echo $COM;?>">
                      <input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
                      <input type="hidden" name="ALIAS" value="<?php  echo $alias ?>">
                      <input type="hidden" name="ALIASUSAGE" value="<?php  echo $textaliasusage ; ?>">
                      <input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
                      <input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/continue.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">
                  </form></td>
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
    <br><br>
	</td>    
  </tr>
</table>