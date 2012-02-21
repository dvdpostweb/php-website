<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  align="center" class="SLOGAN_DETAIL">
		<?php 
		echo '<br>';
		$custabo_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
		$custabo = tep_db_fetch_array($custabo_query);
		if ($custabo['customers_abo'] > 0){
			echo TEXT_YOU_HAVE_ABO . '<br><br>'; 
		}else{		
			//$freetrial_query = tep_db_query("select * from abo where action = 6 and (code_id = 97 or code_id = 100) and customerid = '" . $customer_id . "' ");
			$freetrial_query = tep_db_query("select * from abo where action in (1,5,6,8,9,10) and customerid = '" . $customer_id . "' ");
			$freetrial = tep_db_fetch_array($freetrial_query);
			if ($freetrial['abo_id'] > 0){
				echo '<br>' . TEXT_FREETRIAL_ALREADY_USED . '<br><br>'; 
			}else{				
				$img_main_trial=rand(1, 4);
				$info_text = TEXT_INFORMATION;
				$info_text = str_replace('µµµimgµµµ',  $img_main_trial , $info_text);
				echo $info_text . '<br><br>'; 
				$ogone_orderID = $customer_id . date('YmdHis');
				$ogone_amount = 0;
				switch (WEB_SITE_ID){
				case 19:
					tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'freetrial3suisses', '5', '97', '" . WEB_SITE_ID . "')");
				break;
				default:
					tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context, products_id, discount_code_id, site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'freetrial', '5', '97', '" . WEB_SITE_ID . "')");
				}
				$pspid = OGONE_PSPID;
				$textaliasusage = TEXT_ALIAS_USAGE; 
				$txtconditions = TEXT_HAVE_READ_CONDITIONS; 
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
				$COM = 'FreeTrial' ;
				$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
				$customers = tep_db_fetch_array($customers_query);
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
				<input type="hidden" name="amount" value="0">
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
				
			<div align="center">
				<?php 
					echo '<INPUT type="checkbox" checked>';
					echo '<a  class="red_slogan" href="conditions.php" target=new>';
					echo TEXT_HAVE_READ_CONDITIONS . '<br>'; 
					echo '</a><br>';
				?>
			</div>
			<?php 
				switch ($languages_id) {
					case '1':
					?>
							<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
						<?php 
						break;
					case '2':
						?>	
							<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
						<?php 
						break;
					case '3':
						?>	
							<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_squared.jpg" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
						<?php 		
						break;
				}
			?>
				</form>
			<?php 
			}
		}			
		?>
		<div align="left">
			<br><br><br>
			<table bgcolor="#F2F2F2" width="100%"><tr><td style="padding-left:20px;" height="60px" valign="middle" class="SLOGAN_DETAIL">
				<?php 
					echo TEXT_GOT_A_PROMO_CODE2;
					echo '<br><table width="300px" align="left"><tr>';
					echo '<td class="SLOGAN_DETAIL">'.PROMO_CODE.'</td>';
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php'));
					echo '</tr></table>';
				?>	
			</td></tr></table>
		</div>
    </td>
  </tr>
</table>
<?php 
if ($customer_id>0){
	//Fetch cookie named TRADEDOUBLER
	$cookie = $HTTP_COOKIE_VARS["TRADEDOUBLER"];
	// If TRADEDOUBLER cookie exist do trackback
	if (isset($cookie)) {
		//Fetch session named TDUID
		session_start();
		
		$tduid = "";
		if (!empty($_SESSION['TDUID'])) {
		    $tduid = $_SESSION['TDUID'];
		}
		
		//Fetch tduid cookie named TRADEDOUBLER
		if (!empty($_COOKIE["TRADEDOUBLER"])) {
		    $tduid = $_COOKIE["TRADEDOUBLER"];
		}
		
		//Change to organization id provided by TradeDoubler
		$org_id = 1037333;
		
		//Change to secret code provided by TradeDoubler
		$secretcode = "5691";
		
		//Change to the order value of the current order or "1" if lead
		//Cannot consist of, (comma) or spaces. Decimal sign is . (dot)
		// Important no thousand separators.
		$orderValue = "1";
		
		//Change to the unique order number or lead number
		$leadNumber = $customer_id;
		
		//event supplied by TradeDoubler
		$event = 37869;
		
		//Create the checksum
		$chk = "v04" . md5($secretcode.$leadNumber.$orderValue);
		
		$reportInfo = "f1=ProdNr01&f2=ProdName1&f3=100.00&f4=2|f1=ProdNR02&f2=ProdName2&f3=1000.00&f4=1";
		
		//Important! reportInfo parameter need to be URLEncoded in UTF-8 format.
		$reportInfo = urlencode($reportInfo);
				
		//echo "<img src=\"http://tbl.tradedoubler.com/report?organization=".$org_id."&event=".$event."&leadNumber=".$leadNumber."&checksum=".$chk."&reportInfo=".$reportInfo."&tduid=".$tduid."\">";
		//To test if TradeDoubler works, login on the website and click on "Check //implementation" in the menu. Follow the instructions on this page to complete the //test.
	}
}
?>
