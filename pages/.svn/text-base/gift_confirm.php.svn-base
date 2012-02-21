<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
    <td>
	 <br>
	 <table align="center">
	 	<tr>
<td class="SLOGAN_DETAIL">
    
	<?php 
	echo TEXT_INTRO; 
    //echo '<br><br>';
    echo '<div align="center"><span class="TYPO_ROUGE_ITALIQUE">'.HEADING_TITLE.'</span></div><br><br>';		

	    $gift_products_id= $HTTP_POST_VARS['products_id'];	
	    tep_session_register('gift_products_id');

	    $gift_duration= $HTTP_POST_VARS['duration'];	
	    tep_session_register('gift_duration');
    
	    $gift_quantity= $HTTP_POST_VARS['quantity'];	
	    tep_session_register('gift_quantity');
    
	    $gift_gifttype= $HTTP_POST_VARS['gifttype'];	
	    tep_session_register('gift_gifttype');
    
	    $gift_firstname= $HTTP_POST_VARS['firstname'];	
	    tep_session_register('gift_firstname');
    
	    $gift_lastname= $HTTP_POST_VARS['lastname'];	
	    tep_session_register('gift_lastname');
   
	    $gift_message= $HTTP_POST_VARS['message'];	
	    tep_session_register('gift_message');

    $products_query = tep_db_query("select * from products p left join products_description pd on p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' where p.products_id = '" . $gift_products_id . "' ");
	$products = tep_db_fetch_array($products_query);

	echo '<blockquote class="std_black">';
	echo TEXT_CONFIRM_1 . '<br><br>';
	echo '- ' . TEXT_CONFIRM_2 . $products['products_name'] . ' ( ' ;
	
	switch 	($gift_products_id) {
		case 5:
			echo 1;
		break;	
		case 6:
			echo 2;
		break;	
		case 7:
			echo 3;
		break;	
		case 8:
			echo 4;
		break;	
		case 9:
			echo 5;
		break;	
	}
	echo TEXT_CONFIRM_3 . ')<br><br>';
	echo '- ' . TEXT_CONFIRM_4 . $gift_duration . TEXT_CONFIRM_5 .'<br><br>' ;
	echo '- ' . TEXT_CONFIRM_6 . $gift_duration * $products['products_price'] .' EUR <br><br><br>' ;
	echo TEXT_CONFIRM_7 . '</blockquote>	<br><br><br>';
	    
	$ogone_amount = $HTTP_POST_VARS['duration'] * $products['products_price'] * 100;
	$ogone_orderID = $customer_id . date('YmdHis');
	tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, gift_duration, gift_firstname, gift_lastname, gift_message, site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'gift', '" . $gift_products_id . "', '', '" . $gift_duration . "','" . strtr($gift_firstname,"'","''") . "', '" . strtr($gift_lastname,"'","''") . "', '" . strtr($gift_message,"'","''") . "', '" . WEB_SITE_ID . "')");
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
	$COM = TEXT_OGONE_COM ;
	$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
	$customers = tep_db_fetch_array($customers_query);
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
	
	<table width=100%><tr><td align=center>
	<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/button_continue.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
	</td></tr></table>
	</form>
	
    </td>		
		</tr>
	 </table>
	</td>
	    
  </tr>
</table>