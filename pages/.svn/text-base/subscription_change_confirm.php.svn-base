<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3">
  <TR>
    <TD height="40" class="slogan_detail" align="center" >
		<table width="621" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="40" align="center" class="TYPO_STD2_GREY"><b><?php  echo HEADING_TITLE ?></b></td>
			</tr>	
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_top.gif" width="621" height="19"></td>
			</tr>
			<tr>
				<td background="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bckg.gif">
					<table width="593"  border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>	
							<td class="SLOGAN_BLACK">
					            <?php  
					            $customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
								$customers = tep_db_fetch_array($customers_query);            

					            $sub_discount_use_query = tep_db_query("select * from " . TABLE_DISCOUNT_USE . " where customers_id = '" . $customer_id . "'  order by discount_use_id desc limit 1");
								$sub_discount_use = tep_db_fetch_array($sub_discount_use_query);

					            $sub_commitment_query = tep_db_query("select * from " . TABLE_DISCOUNT_CODE . " where discount_code_id = '" . $sub_discount_use['discount_code_id'] . "' ");
								$sub_commitment = tep_db_fetch_array($sub_commitment_query);
								
								switch($sub_commitment['discount_commitment']){
								case 0:
								$commit = 1;
								break;
								case 1:
								//$commit = 100000000;
								$commit = 2682000;
								break;
								case 2:
								//$commit = 200000000;
								$commit = 5364000;
								break;
								case 3:
								//$commit = 300000000;
								$commit = 8046000;
								break;
								case 4:
								//$commit = 400000000;
								$commit = 10728000;
								break;
								case 5:
								//$commit = 500000000;
								$commit = 13410000;
								break;
								case 6:
								//$commit = 600000000;
								$commit = 16092000;
								break;
								default:
								$commit = 1;
								break;
								}
								//100000000 = 1 mois 00 jours 00 h 00 min 00 sec!
					            //$sub_discount_query = tep_db_query("select if((now() - date)>" . $commit . ", 0, 1) as ced from abo where customerid = '" . $customer_id . "' and (action = 6) order by date desc");
					            $sub_discount_query = tep_db_query("select if((UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(date))>" . $commit . ", 0, 1) as ced from " . TABLE_ABO . " where customerid = '" . $customer_id . "' and (action = 6) order by date desc");
					            $sub_discount = tep_db_fetch_array($sub_discount_query);

					            $subchanged_query = tep_db_query("select if((now() - date)>100000000, 0, 1) as ced from " . TABLE_ABO . " where customerid = '" . $customer_id . "' and (action = 2 or action = 5) order by date desc");
					            $subchanged = tep_db_fetch_array($subchanged_query);
					            			
								if ($customers['customers_abo_type'] > $HTTP_GET_VARS['products_id']){
								//downgrade	
					            	//if (($subchanged['ced'] + $sub_discount['ced']) > 0) {
					            	//only discount. we can now downgrade after an upgrade.
					            	if (($sub_discount['ced']) > 0) {
										echo TEXT_CANNOT_DOWN_BCUP; 
					            	}else{
						            	switch ($HTTP_GET_VARS['ch']){
						            	case 2:
											echo TEXT_INFORMATIONUP; 
						            	break;
						            	case 3:
											echo TEXT_INFORMATIONDOWN; 
						            	break;
						            	}
										echo '<br><br><div align="center"><a class="red_slogan" href="' . FILENAME_SUBSCRIPTIONCHANGE_COMPLETE . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&ch=' . $HTTP_GET_VARS['ch'] . '"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_confirm_squared.jpg" border=0></a></div>';
					            	}
					            }else{
						        //upgrade    
						            //$activ_query = tep_db_query("select if((now() - activation_date)>100000000, 0, 1) as ced from activation_code where customers_id = '" . $customer_id . "' order by activation_date desc");
						            $activ_query = tep_db_query("select if((UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(activation_date))>2682000, 0, 1) as ced  from activation_code where customers_id = '" . $customer_id . "' order by activation_date desc");
						            //difference supperieurs a 1 mois --> 0
						            //difference inferieure a 1 mois --> 1
						            //2682000= 1 mois
						            
									echo TEXT_UPGRADE_TEMPORARY_STOP; 
						            
						            /*
									$activ = tep_db_fetch_array($activ_query);
					            	if ($activ['ced'] > 0) {
										echo TEXT_CANNOT_UP_BCACTIV; 
					            	}else{
							            $testupgrade_query = tep_db_query("select if((UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(date))>894000, 0, 1) as ced  from abo where customerid = '" . $customer_id . "' and action in (1,5,6,8,9,10) order by abo_id desc");
							            // 10 jours
										$testupgrade = tep_db_fetch_array($testupgrade_query);
						            	if ($testupgrade['ced'] > 0) {
											echo TEXT_CANNOT_UP_BCTOOSOON; 
						            	}else{
								        	switch ($HTTP_GET_VARS['ch']){
								        	case 2:
												echo TEXT_INFORMATIONUP; 
								        	break;
								        	case 3:
												echo TEXT_INFORMATIONDOWN; 
								        	break;
								        	}
											echo '<br><br><div align="center"><a class="red_slogan" href="' . FILENAME_SUBSCRIPTIONCHANGE_COMPLETE . '?products_id=' . $HTTP_GET_VARS['products_id'] . '&ch=' . $HTTP_GET_VARS['ch'] . '"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_confirm_squared.jpg" border=0></a></div>';
										}
									}
									*/
									
					            }
					            echo '<br><br><a class="red_slogan" href="javascript:window.history.go(-1);">' . TEXT_CANCEL. '</a>'; 
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><img src="<?php  echo DIR_WS_IMAGES;?>subscription_change/subchange_bottom.gif" width="621" height="19"></td>
			</tr>			
		</table>
	  </td>
	</tr>
	<tr>
		<td><br><br></td>
	</tr>
</table>