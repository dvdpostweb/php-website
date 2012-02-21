<?php  

require('configure/application_top.php');
include(DIR_WS_INCLUDES . 'translation.php');

echo "<body onLoad='checkout_confirmation.submit();'>";



$cust_info = tep_db_query("select c.customers_firstname, c.customers_lastname, c.activation_discount_code_type, oc.orderid ,oc.amount FROM customers c LEFT JOIN ogone_check oc on oc.customers_id=c.customers_id where  c.customers_id='".$customers_id."' ORDER BY id desc LIMIT 1");
$cust_info_values = tep_db_fetch_array($cust_info);
$customers_firstname=$cust_info_values['customers_firstname'];
$customers_lastname=$cust_info_values['customers_lastname'];
$ogone_amount=$cust_info_values['amount'];
$ogone_orderID=$cust_info_values['orderid'];

 

if ($cust_info_values['orderid']=='A'){$COM = 'activation code' ;}else{$COM = TEXT_OGONE_COM ;}

switch ($HTTP_GET_VARS['payment']){				
		case 'ogonevisa' :			
			$pspid = OGONE_PSPID;			
			switch ($languages_id) {
				case '1':
					$textaliasusage = 'Confirmation';
					$ogonelanguage = 'fr_FR';
					$template_ogone = 'Template_standard2FR.htm';
					break;
				case '2':
					$textaliasusage = 'Bevestiging';
					$ogonelanguage = 'nl_NL';
					$template_ogone = 'Template_standard2NL.htm';
					break;
				case '3':
					$textaliasusage = 'Confirm';
					$ogonelanguage = 'en_US';
					$template_ogone = 'Template_standard2EN.htm';
					break;
			}				
			$customers_name = $customers_firstname . ' ' . $customers_lastname;
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
			<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
			<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/catalog.php">
			<input type="hidden" name="accepturl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
			<input type="hidden" name="PM" value="CreditCard">
			<input type="hidden" name="BRAND" value="VISA">
			<input type="hidden" name="COM" value="<?php   echo $COM;?>">
			<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
			<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
			<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
			<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">			
			</form>
			<?php  
		break;
		
		
		case 'ogonemaster' :
			$pspid = OGONE_PSPID;			
			switch ($languages_id) {
				case '1':
					$textaliasusage = 'Confirmation';
					$ogonelanguage = 'fr_FR';
					$template_ogone = 'Template_standard2FR.htm';
					break;
				case '2':
					$textaliasusage = 'Bevestiging';
					$ogonelanguage = 'nl_NL';
					$template_ogone = 'Template_standard2NL.htm';
					break;
				case '3':
					$textaliasusage = 'Confirm';
					$ogonelanguage = 'en_US';
					$template_ogone = 'Template_standard2EN.htm';
					break;
			}				
			$customers_name = $customers_firstname . ' ' . $customers_lastname;
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
			<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
			<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/catalog.php">
			<input type="hidden" name="accepturl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
			<input type="hidden" name="PM" value="CreditCard">
			<input type="hidden" name="BRAND" value="Mastercard">
			<input type="hidden" name="COM" value="<?php   echo $COM;?>">
			<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
			<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
			<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
			<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">			
			</form>
			<?php 
		break;

		
					
		case 'ogoneamex' :
			$pspid = OGONE_PSPID;			
			switch ($languages_id) {
				case '1':
					$textaliasusage = 'Confirmation';
					$ogonelanguage = 'fr_FR';
					$template_ogone = 'Template_standard2FR.htm';
					break;
				case '2':
					$textaliasusage = 'Bevestiging';
					$ogonelanguage = 'nl_NL';
					$template_ogone = 'Template_standard2NL.htm';
					break;
				case '3':
					$textaliasusage = 'Confirm';
					$ogonelanguage = 'en_US';
					$template_ogone = 'Template_standard2EN.htm';
					break;
			}				
			$customers_name = $customers_firstname . ' ' . $customers_lastname;
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
			<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/step_check.php">
			<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
			<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/catalog.php">
			<input type="hidden" name="accepturl" value="http://<?php   echo SITE_ID; ?>/abo_google_ogone_conf.php">
			<input type="hidden" name="PM" value="CreditCard">
			<input type="hidden" name="BRAND" value="American Express">
			<input type="hidden" name="COM" value="<?php   echo $COM;?>">
			<input type="hidden" name="TP" value="http://<?php   echo SITE_ID; ?>/<?php   echo $template_ogone; ?>">
			<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
			<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
			<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">			
			</form>
			<?php 
		break;
		
		
	}