<?php  

require('configure/application_top.php');
$current_page_name = 'ogone_change.php';
include(DIR_WS_INCLUDES . 'translation.php');
echo "<body onLoad='checkout_confirmation.submit();'>";
	$ogone_orderID = $customer_id . date('YmdHis');
	$ogone_amount = 0;
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
	//$customer_id.$usage
	if(SITE_ID=='localhost' || SITE_ID=='test')
	{
		$site='www.dvdpost.be';
	}
	else
	{
		$site=SITE_ID;
	}
include(DIR_WS_CLASSES . 'sha.php');
$sha = new SHA;


if($_POST['type']=="change")
{
	$textaliasusage=OGONE_CHANGE_ALIAS;
	tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . 	$customer_id . "', 'ogone_change', '" . WEB_SITE_ID . "')");
	
}
else
{
	$textaliasusage=OGONE_CREATE_ALIAS;
	tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'payment_method_change', '" . WEB_SITE_ID . "')");
	
}
$ogone_amount=0;
$alias=$customer_id;
$COM=$textaliasusage;

$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . $alias . $textaliasusage . MODULE_PAYMENT_OGONE_SHA_STRING);
?>
<form name="checkout_confirmation" method="post" action="<?php  echo OGONE_FORM_ACTION;?>">                                                                         
<input type="hidden" name="prod" value="">
<input type="hidden" name="orderID" value="<?php   echo $ogone_orderID;?>">
<input type="hidden" name="pspid" value="<?php   echo OGONE_PSPID;?>">
<input type="hidden" name="RL" value="ncol-2.0">
<input type="hidden" name="currency" value="EUR">
<input type="hidden" name="language" value="<?php   echo $ogonelanguage ;?>">
<input type="hidden" name="amount" value="<?php   echo $ogone_amount ; ?>">
<input type="hidden" name="declineurl" value="http://<?php   echo SITE_ID; ?>/payment_method_change.php">
<input type="hidden" name="exceptionurl" value="http://<?php   echo SITE_ID; ?>/payment_method_change.php">
<input type="hidden" name="cancelurl" value="http://<?php   echo SITE_ID; ?>/payment_method_change.php">
<input type="hidden" name="CN" value="<?php   echo $customers_name;?>">
<input type="hidden" name="catalogurl" value="http://<?php   echo SITE_ID; ?>/catalog.php">
<input type="hidden" name="accepturl" value="http://<?php   echo SITE_ID; ?>/payment_method_change.php">
<input type="hidden" name="COM" value="<?php   echo $COM;?>">
<input type="hidden" name="TP" value="http://<?php   echo $site; ?>/<?php   echo $template_ogone; ?>">
<input type="hidden" name="ALIAS" value="<?php   echo $alias ?>">
<input type="hidden" name="ALIASUSAGE" value="<?php   echo $textaliasusage ; ?>">
<input type="hidden" name="SHASign" value="<?php   echo $sha->hash_to_string($hasharray);?>">			
</form>