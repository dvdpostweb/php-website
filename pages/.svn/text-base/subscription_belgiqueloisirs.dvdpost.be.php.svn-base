<style type="text/css">
<!--
.Style2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="100%" height="25" colspan="3" align="right" valign="top">
			<table width="349" border="0" align="right" cellpadding="0" cellspacing="0">
				<tr>
					<td height="15" colspan="3" valign="bottom"><div align="right"><img src="<?php  echo DIR_WS_IMAGES;?>greyline2.jpg" width="349" height="4"></div></td>
				</tr>
				<tr>
					<td width="164" height="30" align="left" valign="middle" class="TYPO_PROMO">
						<div align="right">
							<?php  echo TEXT_GOT_A_PROMO_CODE ;?>
						</div>
					</td>
					<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php')); ?>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
	  	<td height="45" colspan="3" align="center" valign="middle" bgcolor="#F2F2F2" class="dvdpost_formula_red">
			<?php  echo TEXT_SIX_FORMULAS_TO_CHOSE ;?>
		</td>
		</tr>

	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/subscription_table.php')); ?>
	
		<tr>
		<td height="15" colspan="3" align="right" valign="top" bgcolor="#F2F2F2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="3" height="3"></td>
    </tr>
	
    <tr>
		<td height="8" colspan="3" align="right" valign="top" bgcolor="#F2F2F2">
			<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" cellspacing="0" cellpadding="0">
				<?php  
				include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/subscription_slogan.php'));
				?>
			</table>
		</td>
		</tr>
	<tr>
		<td width="100%" height="25" colspan="3" align="left" valign="bottom" class="TYPO_PROMO">
		<?php  echo TEXT_ASTERISK ;?>
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
				
		echo "<img src=\"http://tbl.tradedoubler.com/report?organization=".$org_id."&event=".$event."&leadNumber=".$leadNumber."&checksum=".$chk."&reportInfo=".$reportInfo."&tduid=".$tduid."\">";
		//To test if TradeDoubler works, login on the website and click on "Check //implementation" in the menu. Follow the instructions on this page to complete the //test.
	}
}
?>
