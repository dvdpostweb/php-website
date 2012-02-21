<?php  

require('configure/application_top.php');
include(DIR_WS_INCLUDES . 'translation.php');
$offer_id = $_GET['offer_id'];
if(empty($offer_id))
{
	die('error');
}

echo "<body onLoad='checkout_confirmation.submit();'>
<div style='height:389px;width:800px'><div class='load' style='width: 32px; height: 32px; margin: 100px auto;'><img src='/images/loading.gif'/></div></div>";

$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
$customers = tep_db_fetch_array($customers_query);
$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
$sql ="select products_price, 	products_title from products where products_type='ABO' and products_media='VOD' and products_id='".$offer_id."' ";
$droselia_price = tep_db_query($sql);
$droselia_price_values = tep_db_fetch_array($droselia_price);
$ogone_orderID = $customer_id . date('YmdHis');
$ogone_amount = $droselia_price_values['products_price'] * 100;

tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,  site,products_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'droselia_credit', '" . WEB_SITE_ID . "',".$offer_id.")");

tep_db_query("insert into shopping_cart (customers_id, products_id, quantity , price , date_added , products_type) values ( '" . $customers_id . "', '".$offer_id."' , 1 , '".$droselia_price_values['products_price']."',  now(), 'VOD'  )"); 

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


$COM = 'DVDPost' ;

$alias = $customer_id;
include(DIR_WS_CLASSES . 'sha.php');
$sha = new SHA;
$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID . MODULE_PAYMENT_OGONE_SHA_STRING);
?>
				
				<form name="checkout_confirmation" method="post" action="<?php  echo OGONE_FORM_ACTION;?>">                                                                        
				<input type="hidden" name="prod" value="<?php echo $offer_id ;?>">
				<input type="hidden" name="orderID" value="<?php  echo $ogone_orderID;?>">
				<input type="hidden" name="pspid" value="<?php  echo OGONE_PSPID;?>">
				<input type="hidden" name="RL" value="ncol-2.0">
				<input type="hidden" name="currency" value="EUR">
				<input type="hidden" name="language" value="<?php  echo $ogonelanguage ;?>">
				<input type="hidden" name="amount" value="<?php  echo $ogone_amount ; ?>">
				<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/vodx.php">
				<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/vodx.php">
				<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/vodx.php">
				<input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
				<input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/vodx.php">
				<input type="hidden" name="COM" value="<?php  echo $COM; ?>">
				<input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
				<input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
<?php
echo "</body>";
?>