<style type="text/css">
<!--
.Std_pst2 {
	font-family: Arial, Helvetica, sans-serif;font-size: 12px;color:#D32F30;
	text-decoration: overline; font-weight:bold;

}
-->
</style>
<table width="100%"  align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF"><tr><td>
<?php  
	$bgcolor='#FFFFFF';
	$dectotprice = 0;
	$cptcolor=1;
	$left_border='<td width="14" background="'.DIR_WS_IMAGES .'img_recom/left_line_recom_transpa.gif"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14"></td>';
	$right_border='<td width="14" background="'.DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14"></td>';
	?>
<br>
<table width="428" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
	  <td align="center" colspan="5"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" >
		<B class="TYPO_STD_BLACK"><?php  echo HEADING_TITLE; ?></B>
	  </td>				      
	  <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	</tr>
	  <?php 
		//check quant and delete quant = 0
		//BEN001 $dvdsale_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' ");
		$dvdsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') or ( p.products_type='BUY')) and customers_id = '" . $customer_id . "' ");
		while ($dvdsale = tep_db_fetch_array($dvdsale_query)) {
			if($dvdsale['products_id']>0){
				$products_quant_query = tep_db_query("select * from products where products_id = '" . $dvdsale['products_id'] . "' ");
				$products_quant = tep_db_fetch_array($products_quant_query);
				if($products_quant['quantity_to_sale']< 1){
					tep_db_query("delete from shopping_cart  where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "' ");					
				}else{
					tep_db_query("update shopping_cart set quantity = '" . min($dvdsale['quantity'],$products_quant['quantity_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale['shopping_cart_id'] . "'");
				}						  
			}
		}
		$dvdsale_box_query = tep_db_query("select * from shopping_cart WHERE shopping_box_id > 0 AND customers_id = '" . $customer_id . "' ");
		while ($dvdsale_box = tep_db_fetch_array($dvdsale_box_query)) {	 	
			if($dvdsale_box['shopping_box_id']>0){
				$products_quant_query = tep_db_query("select * from shopping_box where shopping_box_id = '" . $dvdsale_box['shopping_box_id'] . "' ");
				$products_quant = tep_db_fetch_array($products_quant_query);
				if($products_quant['quantity_to_sale']< 1){
					tep_db_query("delete from shopping_cart  where shopping_cart_id =  '" . $dvdsale_box['shopping_cart_id'] . "' ");					
				}else{
					tep_db_query("update shopping_cart set quantity = '" . min($dvdsale_box['quantity'],$products_quant['quantity_to_sale']) . "' where shopping_cart_id =  '" . $dvdsale_box['shopping_cart_id'] . "'");
				}						  
			}	 	
		}
		///count
		//BEN001 $countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart where customers_id = '" . $customer_id . "' and products_id > 0");
		$countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') ) and customers_id = '" . $customer_id . "' and p.products_id > 0"); //BEN001
		$countdvd = tep_db_fetch_array($countdvd_query);
		$nbrtotdvd= $countdvd['nbrdvd'];
		$countbuy_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'BUY' ) ) and customers_id = '" . $customer_id . "' and p.products_id > 0"); //BEN001
		$countbuy = tep_db_fetch_array($countbuy_query);
		$nbrtotbuy= $countbuy['nbrdvd'];
		
		$boxsale_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and shopping_box_id > 0");
		while ($boxsale = tep_db_fetch_array($boxsale_query)) {
			$countbox_query = tep_db_query("select sum(nbr_items) as nbrdvd from shopping_box where shopping_box_id = '" . $boxsale['shopping_box_id'] . "'");
			$countbox = tep_db_fetch_array($countbox_query);				
			$nbrtotdvd =  $nbrtotdvd + $countbox['nbrdvd'] * $boxsale['quantity'];
		}		
				
		//BEN001 $sc_query = tep_db_query("select * from shopping_cart sc left join products p on sc.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' and sc.products_id > 0 ");
		$sc_query = tep_db_query("select * from shopping_cart sc left join products p on sc.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') or ( p.products_type='BUY')) and sc.customers_id = '" . $customer_id . "' and sc.products_id > 0 "); //BEN001
		while ($sc = tep_db_fetch_array($sc_query)) {
			if ($cptcolor %2==0){$bgcolor='#F4F4F4';}
			else {$bgcolor='#FFFFFF';}
			echo '<tr bgcolor="'.$bgcolor.'">';
			echo $left_border;
			echo '<td width="50" height="25" class="TYPO_STD_BLACK">' . $sc['quantity'] . '</td>';				  		
			echo '<td width="200" class="TYPO_STD_BLACK">' . $sc['products_name'] . '</td>';				    	
			echo '<td width="50" align="center" class="TYPO_STD_BLACK">' . $sc['price'] . '</td>';
			echo '<td width="50" align="center" class="TYPO_STD_BLACK">&nbsp;</td>';	
			echo '<td width="50" class="slogan_red TYPO_STD_BLACK">' . $sc['quantity'] * $sc['price'] . '</td>';
			echo $right_border;
			echo '</tr>';
			$cptcolor++;
			$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);			
		}
		
		$sc_query = tep_db_query("select * from shopping_cart sc left join shopping_box sb on sc.shopping_box_id = sb.shopping_box_id left join shopping_box_description sbd on sbd.shopping_box_id = sc.shopping_box_id and sbd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' and sc.shopping_box_id > 0");
		while ($sc = tep_db_fetch_array($sc_query)) {
			if ($cptcolor %2==0){$bgcolor='#F4F4F4';}
			else {$bgcolor='#FFFFFF';}
			echo '<tr bgcolor="'.$bgcolor.'">';
			echo $left_border;
			echo '<td width="50" height="25" class="TYPO_STD_BLACK">' . $sc['quantity'] . '</td>';				  		
			echo '<td width="200" class="TYPO_STD_BLACK">' . $sc['shopping_box_name'] . '</td>';				    	
			echo '<td width="50" align="center" class="TYPO_STD_BLACK">' . $sc['price'] . '</td>';
			echo '<td width="50" align="center" class="TYPO_STD_BLACK">&nbsp;</td>';	
			echo '<td width="50" class="slogan_red TYPO_STD_BLACK">' . $sc['quantity'] * $sc['price'] . '</td>';	
			echo $right_border;
			$cptcolor++;	
			$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);
		}
		$fullprice=$dectotprice;
		if (strlen($HTTP_POST_VARS['promo_code']) > 0){
				$discount_query = tep_db_query("select * ,  DATE_FORMAT(validity_to, '%Y%m%d') as validity from  shopping_discount where discount_code =  '" . $HTTP_POST_VARS['promo_code'] . "' ");
				$discount = tep_db_fetch_array($discount_query);	
					if (($discount['discount_status'] > 0 && $discount['validity'] > date('Ymd')) || ($discount['discount_status'] > 0 && is_null($discount['validity']) )  ){
					//if ($discount['discount_status'] > 0  ){
						switch($discount['discount_type'] ){
							case 1:
								$dectotprice = round($dectotprice - ($discount['discount_value']*$dectotprice/100),2);
							break;
							case 3:
								$dectotprice = $dectotprice - $discount['discount_value'];
							break;
						} 
						echo '<tr>'.$left_border;
						echo '<td colspan="2" align="center" class="TYPO_STD_BLACK">&nbsp;</td>';
						echo '<td align="center" class="TYPO_STD_BLACK"><b>' . $discount['discount_text_fr']  . '</b></td>';
						echo '<td align="center" class="TYPO_STD_BLACK">&nbsp;</td>';
						echo '<td align="left" height="25" class="TYPO_STD_BLACK"><b>' . $dectotprice  . '</b></td>';
						echo $right_border.'</tr>';
					}				
		}
		if ($cptcolor %2==0){$bgcolor='#F4F4F4';}
		else {$bgcolor='#FFFFFF';}
		echo '<tr bgcolor="'.$bgcolor.'">'.$left_border;
		echo '<td class="TYPO_STD_BLACK">&nbsp;</td>';				  		
		echo '<td class="TYPO_STD_BLACK">'. TEXT_SHIPPING_FEE . ' <i>(' . $nbrtotdvd . ' DVD)</i></td>';
		echo '<td colspan="2">&nbsp;</td>';	
		$sql ="select * from customers c left join address_book ab on c.customers_id = ab.customers_id   where c.customers_default_address_id = ab.address_book_id  and c.customers_id = '" . $customer_id . "' ";
		$country_query = tep_db_query($sql);
		$country = tep_db_fetch_array($country_query);
		echo '<td width="25" height="25" class="slogan_red TYPO_STD_BLACK">';
		$price=shipping($country['entry_country_id'],$nbrtotdvd);
		$price=$price+($nbrtotbuy*6.2);
		$dectotprice = $dectotprice + $price;
		
		$fullprice=$fullprice+$price;
		echo $price.'</td>';
		echo '<td width="14"  background="'.DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif">';
		echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="14"></td></tr>';
		if ($fullprice==$dectotprice){
			echo '<tr bgcolor="#DCDCDC">'.$left_border;
			echo '<td colspan="3" height="25" align="right" class="TYPO_STD_BLACK" >&nbsp;</td>';
			echo '<td width="20" align="center" class="TYPO_STD_BLACK" >&nbsp;</td>';	
			echo '<td class="Std_pst2" ><b>' . $fullprice . '€</b></td>';	
			echo $right_border.'</tr>';
		}else{
			if (strlen($HTTP_POST_VARS['promo_code']) > 0){
				if ($discount['shopping_discount_id'] > 0){
					if (($discount['discount_status'] > 0 && $discount['validity'] > date('Ymd')) || ($discount['discount_status'] > 0 && is_null($discount['validity']) )  ){
							echo '<tr bgcolor="DCDCDC">'.$left_border;
							echo '<td width="20" align="center" class="slogan_detail">&nbsp;</td>';	
							echo '<td colspan="2" align="left" class="TYPO_STD_BLACK" ><b>'. TEXT_DISCONT_SUBTOTAL.':&nbsp;&nbsp;</b></td>';
							echo '<td width="20" align="center" class="slogan_detail">&nbsp;</td>';	
							echo '<td class="Std_pst2" height="25"><b>' . $dectotprice . '€</b></td>';
							echo $right_border.'</tr>';
						}else{
							echo '<tr>'.$left_border;
							echo '<td colspan="5" height="25" align="center" >'.TEXT_DISCOUNT_NOT_VALID_ANYMORE.'</b></td>';
							echo $right_border.'</tr>';
						}										
					}else{
						echo '<tr>'.$left_border;
						echo '<td colspan="5" height"25" align="center" >'.TEXT_DISCOUNT_DOES_NOT_EXISTS.'</b></td>';
						echo $right_border.'</tr>';
					}				
				}
			}				
			echo '<tr bgcolor="#FFFFFF">'.$left_border;
		?>

		<td colspan="5" class="slogan_detail" align="center"><br>
		<div align="center">
		<?php 
		switch ($HTTP_POST_VARS['shipping_method']){
			case 'post':
				echo '<b><u>'.TEXT_SHIP_BY_POST.'</u></b>';
				echo '<br>';						
				echo $country['entry_firstname'] . ' ' . $country['entry_lastname'];
				echo '<br>';						
				echo $country['entry_street_address'] ;
				echo '<br>';						
				echo $country['entry_postcode'] . ' ' . $country['entry_city'];
				echo '<br>';					
				switch ($country['entry_country_id']){
					case 21:
						echo 'Belgium';
					break;
					case 124:
						echo 'Luxembourg';
					break;							
				}
			break;
			/*case 'kiala':
				echo '<b><u>'.TEXT_SHIP_BY_KIALA.'</u></b>';					
				echo '<br>';					
				$kiala_query = tep_db_query("select * from kiala_point where kiala_point_id =  '" . $HTTP_POST_VARS['kiala_point_id'] . "' ");
				$kiala = tep_db_fetch_array($kiala_query);
				switch ($languages_id){
					case 1:
						?>
							<?php  echo $kiala['name_fr'] ;?>
							<br>
							<?php  echo $kiala['street_fr']  . ' ' . $kiala['nbr'];?>
							<br>
							<?php  echo $kiala['postcode']  . ' ' . $kiala['city_fr'];?>
						<?php 
					break;
					case 2:
						?>
							<?php  echo $kiala['name_nl'] ;?>
							<br>
							<?php  echo $kiala['street_nl']  . ' ' . $kiala['nbr'];?>
							<br>
							<?php  echo $kiala['postcode']  . ' ' . $kiala['city_nl'];?>
						<?php 
					break;
					case 3:
						?>
							<?php  echo $kiala['name_fr'] ;?>
							<br>
							<?php  echo $kiala['street_fr']  . ' ' . $kiala['nbr'];?>
							<br>
							<?php  echo $kiala['postcode']  . ' ' . $kiala['city_fr'];?>
						<?php 
					break;
				}
			break;*/
		}
		?>
		</div>
		</td>
		<?php  echo '<td width="14"  background="'.DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14"></td></tr>';?>
	<tr>
		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
		<td colspan="5" height="14" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
	</tr>
</table>
<?php 
	$ogone_orderID = $customer_id . date('YmdHis');
	$ogone_amount = $dectotprice * 100;
	//tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,   products_id, site ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'dvdsale', '" . $HTTP_POST_VARS['kiala_point_id'] . "', '" . WEB_SITE_ID . "')");
	tep_db_query("insert into " . TABLE_OGONE_CHECK . " (orderID,amount,customers_id, context,   products_id, site, discount_code_id ) values ('" . $ogone_orderID . "', '" . $ogone_amount . "', '" . $customer_id . "', 'dvdsale', '" . $HTTP_POST_VARS['kiala_point_id'] . "', '" . WEB_SITE_ID . "', '" . $discount['shopping_discount_id'] . "')");
	
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
	$COM = 'DVDPost' ;
	$customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
	$customers = tep_db_fetch_array($customers_query);
	$customers_name = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
	$alias = $customer_id;
	include(DIR_WS_CLASSES . 'sha.php');
	$sha = new SHA;
	$hasharray = $sha->hash_string($ogone_orderID . $ogone_amount . 'EUR' . OGONE_PSPID .  MODULE_PAYMENT_OGONE_SHA_STRING);
	if($ogone_amount>0){
	?>
	
	<form name="checkout_confirmation" method="post" action="<?php  echo OGONE_FORM_ACTION;?>">                                                                    
	<input type="hidden" name="prod" value="">
	<input type="hidden" name="orderID" value="<?php  echo $ogone_orderID;?>">
	<input type="hidden" name="pspid" value="<?php  echo OGONE_PSPID;?>">
	<input type="hidden" name="RL" value="ncol-2.0">
	<input type="hidden" name="currency" value="EUR">
	<input type="hidden" name="language" value="<?php  echo $ogonelanguage ;?>">
	<input type="hidden" name="amount" value="<?php  echo $ogone_amount ; ?>">
	<input type="hidden" name="declineurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart.php">
	<input type="hidden" name="exceptionurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart.php">
	<input type="hidden" name="cancelurl" value="http://<?php  echo SITE_ID; ?>/shopping_cart.php">
	<input type="hidden" name="CN" value="<?php  echo $customers_name;?>">
	<input type="hidden" name="catalogurl" value="http://<?php  echo SITE_ID; ?>/default.php">
	<input type="hidden" name="COM" value="<?php  echo $COM; ?>">
	<input type="hidden" name="TP" value="http://<?php  echo SITE_ID; ?>/<?php  echo $template_ogone; ?>">
	<input type="hidden" name="SHASign" value="<?php  echo $sha->hash_to_string($hasharray);?>">
	<div align="center"
	<?php 
		echo '<INPUT type="checkbox" checked>';
		echo '<a  class="red_slogan" href="conditions_buy_dvd_public.php" target=new>';
		echo TEXT_HAVE_READ_CONDITIONS . '<br>'; 
		echo '</a><br>';
	?>
<?php 

	switch ($languages_id) {
		case '1':
		?>
				<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
			<?php 
			break;
		case '2':
			?>	
				<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
			<?php 
			break;
		case '3':
			?>	
				<input align="center" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_buy.gif" border="0" alt="Confirmer la commande" title=" Confirmer la commande ">			
			<?php 		
			break;
	}
}else
{
	echo '<div align="center"><br /><a href="/dvdforsale_listing.php"> <img src="/images/www3/languages/'.$language.'/images/buttons/button_show_shopping_list.gif" border="0" /></a></div>';

}
?>
	</div>
</form>
</td></tr></table>