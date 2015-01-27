<?php 
	if(!empty($customers_id))
	{
		$check_customers="select customers_id, customers_firstname,customers_default_address_id from customers where customers_id=".$customers_id;
		$check_customers_query = tep_db_query($check_customers);
		$check_customers_values = tep_db_fetch_array($check_customers_query);
		$sql_a = "select * from address_book where customers_id = '" . $check_customers_values['customers_id'] . "' and address_book_id = '" . $check_customers_values['customers_default_address_id'] . "'";
		$address = tep_db_query($sql_a);
		$address_values = tep_db_fetch_array($address);
	}
	else{
		$check_customers_values['customers_firstname']='';
		$address_values = '';
	}
	$host=$_SERVER['HTTP_HOST'];
  if(strpos($host,'.nl')>0 || ($address_values != '' && $address_values['entry_country_id'] == 150)){
    $abo_cat = 10;
  }
  else {
    $abo_cat = 6;
  }
?>
<!-- debut du CONTAINER -->
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
<div id="step_container">
	<!-- debut Client_info -->
	<div id="step_promo_container">
		<div id="step_promo_explain">
			<form name="form1" method="post" action="activation_code_confirm.php">				
			<div id="step90_welcome">				
					<?php 
						echo '<div class="subscription_start"><b>'.TEXT_WELCOME.'</b> '.$check_customers_values['customers_firstname'].'</div><br />';
						echo '<p>'.TEXT_REACTIVATE.'</p>';
						echo '<p>'.TEXT_FORMULA_CHOSER.'</p>';
						echo '<p>'.TEXT_PROMO_CODE.'<br />';
						echo '<input name="code" id="code" type="text" class="inputs_codes" size="20" size="18"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'canvas/go.gif" align="absbottom" border="0"></p>';
						echo '<p>'.TEXT_ALSO_DO.'<br />';
						echo '- <a href="gift_form2.php">'.TEXT_BUY_GIFT.'</a><br />';
						echo '- <a href="custserv_list_public.php">'.TEXT_CONTACT_US.'</a><br />';
						echo'</p>';
					?>
				
			</div>
			</form>
		</div>
  </div>
  <!-- fin Client_info -->
	
	<!-- debut SHOW_FORMULAS -->
	<div id="step_subscription_container">
		<div id="step_subscription_top">&nbsp;</div>		
	  	<div id="step_subscription">
	    <table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">
	    	<form name="subscription_form" method="post" action="step3b.php">
				<input type="hidden" name="old_customer" value="1">
			<tr>
				<td align="left" class="subscription_start"><?php  echo TEXT_CHOSE_FORMULA ;?></td>				
			</tr>
	    	<tr><td height="20">&nbsp;</td></tr>
	    	<tr>
	    		<td  align="center">
	    			<table cellspacing="0" cellpadding="0" border="0" width="380">	    				
	    				<?php  
							$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home, pa.most_popular_group, qty_dvd_max FROM products p ';
							$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.allowed_public_group = ". $abo_cat ." or pa.allowed_private_group = ". $abo_cat ." order by pa.qty_credit ASC" ;
							$abo_passive_query = tep_db_query($abo_passive);		
							$colspan=0;
							
							while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
								echo '<tr>';
								include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_abo_private.php'));
								echo '</tr>';											  
							}
							tep_db_query("update customers set `activation_discount_code_id` = '0', `activation_discount_code_type` = ' ' where customers_id = '" . $customer_id . "'");
						  ?>
	    			</table>
	    		</td>
	    	</tr>	
	    	<tr>
	    		<td align="center" height="70" valign="middle" class="step90_table_top">
	    			<input  TYPE="hidden" VALUE="0" NAME="discount_code_id">	    			
	    			<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_continue.gif" border="0" value="submit">
	    		</td>
	    	</tr>	
	    	</form>	
		</table>
	  	</div>
		<div id="step_subscription_bottom"></div>
  	</div>
	<br />	
	<!-- fin SHOW_FORMULAS -->
</div>
<!-- fin du CONTAINER -->

</td>
</tr>
</table>
<?php echo WEB_SITE_ID.' '.GROUP_ID ; ?>