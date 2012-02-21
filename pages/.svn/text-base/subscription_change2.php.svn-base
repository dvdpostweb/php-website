<br><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
  <TR>
    <TD height="40" class="slogan_detail" align="center" >
		<?php  
        $customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
		$customers = tep_db_fetch_array($customers_query);
		if ($customers[customers_abo_type] > 0){
			$abo_query = tep_db_query("select products_name from products_description where products_id = '" . $customers[customers_abo_type] . "'  and language_id = '" . $languages_id . "'");
			$abo = tep_db_fetch_array($abo_query);
		?>
		<table width="621" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="40" align="center" class="TYPO_STD2_GREY"><b><?php  echo TEXT_CHANGE_FORMULA ?></b></td>
			</tr>	
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_top.gif" width="621" height="19"></td>
			</tr>
			<tr>
				<td background="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bckg.gif">
					<table width="593"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
						<?php 
						switch ($customers[customers_abo_type]) {
							case '2':
							$formula ='basic.php';
							$bgcolor='#A1D2E6';
							break;
							case '5':
							$formula ='regular.php';
							$bgcolor='#73AFC7';
							break;
							case '6':
							$formula ='classic.php';
							$bgcolor='#5092AC';
							break;
							case '7':
							$formula ='discovery.php';
							$bgcolor='#37758E';
							break;
							case '8':
							$formula ='adventure.php';
							$bgcolor='#215B71';
							break;
							case '9':
							$formula ='passion.php';
							$bgcolor='#144357';
							break;
							}
						?>
							<td width="109" rowspan="2" align="center" valign="top" bgcolor="<?php  echo $bgcolor ;?>">
								<?php 					 
								include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/'.$formula));
								?>
							</td>
							<td width="12" rowspan="2">&nbsp;</td>
							<td width="472" height="40" align="left" valign="top" class="SLOGAN_BLACK"><?php  echo TEXT_CURRENTSUB; ?> <strong><font color=#D32F30><?php  echo $abo[products_name]; ?></font></strong></td>
						</tr>
						<tr>
							<td align="left" valign="middle" class="SLOGAN_BLACK">
								<div align="justify"><?php  echo TEXT_CHANGESUB_NB ;?></div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bottom.gif" width="621" height="19"></td>
			</tr>
		</table>    
	    <br>
	    <br>
	    <?php 
	    $formulas_query = tep_db_query("SELECT p.products_id, p.products_price, pd.`products_name` FROM products p, products_description pd WHERE p.products_id < 10 AND p.products_id = pd.products_id AND `language_id` = 3");
	    ?>
	    <table width="621" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_top.gif" width="621" height="19"></td>
			</tr>
			<tr>
				<td background="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bckg.gif">
					<table width="593" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr align="center" valign="top">
							<?php 
							$cpt=1;
							while ($formulas_result = tep_db_fetch_array($formulas_query))
							{
								if ($formulas_result[products_id] < $customers[customers_abo_type])	{ 
									echo'<td width="109">';
									include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/' .$formulas_result[products_name]. '.php')); 
									include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/subscription_change/downgrade.php'));
									echo '</td>';
									if ($cpt<5){ echo '<td width="12">&nbsp;</td>';}
									$cpt++;
									}
								if($formulas_result[products_id]> $customers[customers_abo_type]){ 
									echo'<td width="109">';
									include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/prepay/' .$formulas_result[products_name]. '.php')); 
									include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/subscription_change/upgrade.php'));
									echo '</td>';
									if ($cpt<5){echo '<td width="12">&nbsp;</td>';}
									$cpt++;
									}
							}
							?>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bottom.gif" width="621" height="19"></td>
			</tr>
		</table>
		<p>&nbsp;</p>
		<?php 
		}else{
			echo '<br>'.TEXT_NOABO.'<br><br>';
		}		
		?>
	</TD>
  </TR>
</table>
