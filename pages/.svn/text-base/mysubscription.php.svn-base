<table width="764" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td >
		<style type="text/css">
		.dvd-out
		{
		    BORDER-RIGHT: #B2B2B2 2px solid;
		    BORDER-TOP: #B2B2B2 2px solid;
		    BORDER-LEFT: #B2B2B2 2px solid;
		    BORDER-BOTTOM: #B2B2B2 2px solid
		}
		</style>
      <?php  echo TEXT_INFORMATION; ?>  
      <br>
                		<?php           
          if (tep_session_is_registered('customer_id')) {
				$subscription = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
				$subscription_values = tep_db_fetch_array($subscription);
				if ($subscription_values['customers_abo'] > 0) {
					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
					echo SUBSCRIPTION_STATUS;
					$subscription_name = tep_db_query("select * from " . TABLE_PRODUCTS. " where products_id= '". $subscription_values['customers_abo_type'] ."'");  
					$subscription_name_values = tep_db_fetch_array($subscription_name);
					echo '<b>' . $subscription_name_values['products_model'] . '</b>'; 
					echo '<br>';
					echo '<br>';
					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
					echo SUBSCRIPTION_DVD_UCANRENT;
					echo '<b>' . ($subscription_values['customers_abo_dvd_norm'] + $subscription_values['customers_abo_dvd_adult']) .'</b> ' . SUBSCRIPTION_DVD_UCANRENT2;
					echo '<br>';
					echo '<br>';

					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
					echo SUBSCRIPTION_SUB_PRICE1;
					if ($subscription_values['flagminiat1995'] == 1 and $subscription_values['customers_abo_type']==6 ){					
					echo '<b>19,95</b> ' . SUBSCRIPTION_SUB_PRICE2;
					}else{
					echo '<b>' . $subscription_name_values['products_price'] .'</b> ' . SUBSCRIPTION_SUB_PRICE2;
					}
					$activation = tep_db_query("select * from " . TABLE_ACTIVATION_CODE . " where customers_id= '". $customer_id ."' order by activation_date desc limit 1");  
					$activation_values = tep_db_fetch_array($activation);
					if ($activation_values['activation_id'] > 0) {
						echo '<br>';
						echo '<br>';
						echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
						echo SUBSCRIPTION_ACTAVATED;
						echo '<b>' . tep_date_short($activation_values['activation_date']) . '</b>'; 
						echo SUBSCRIPTION_ACTAVATION_MONTH1;
						echo ' <b>' . $activation_values['validity_value'] . '</b> '; 
						switch ($activation_values['validity_type']){
							case 2:
								echo SUBSCRIPTION_ACTAVATION_MONTH2;
							break;
							case 1:
								echo ' Jours/dagen/Days';
							break;						
						}
					}

					echo '<br>';
					echo '<br>';


					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
					echo SUBSCRIPTION_VALIDTO;
					echo '<b>' . tep_date_short($subscription_values['customers_abo_validityto']) . '</b>'; 
					echo '<br>';
					echo '<br>';


					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
        				$totabo = $subscription_values['customers_abo_dvd_norm'] + $subscription_values['customers_abo_dvd_adult'];
                                        echo '<form action="mywlnbradultupdate.php" method="post" name="nbradult" ID="Form1">';
                                        echo TEXT_NBR_ADULT_DVD1;
                                        echo '&nbsp;&nbsp;&nbsp;';
                                        echo '<SELECT id="wlDVDadult" name="wlDVDadult">';
                                        for ($i = 0; $i <= $totabo; $i++) {
                                          echo ($i==$subscription_values['customers_abo_dvd_adult'])? '<OPTION selected>' . $i . '</OPTION>':'<OPTION>' . $i . '</OPTION>';
                                        }
                                        echo '</SELECT>'; 
                                        echo '&nbsp;&nbsp;&nbsp;'; 
                                        echo '<INPUT id="Submitnbradult" type="submit" value="update" name="Submitnbradult">';
                                        echo '</form>';
					echo '<br>';
					echo '<br>';

					echo '<img src="' .  DIR_WS_IMAGES . '/point.gif" width="4" height="5">&nbsp;';
					echo SUBSCRIPTION_VALIDTO_NB;
					echo '<br>';
					echo '<br>';

					
					
					if ($subscription_values['customers_abo_type'] == 2 ){
					echo SUBSCRIPTION_DISCOVERY1;
					echo $subscription_values['customers_abo_start_rentthismonth'];
					echo SUBSCRIPTION_DISCOVERY2;
					}

					echo SUBSCRIPTION_DVD_ATHOME1;
					echo '<b>' . ($subscription_values['customers_abo_dvd_home_norm'] + $subscription_values['customers_abo_dvd_home_adult']) . '</b>';
					echo SUBSCRIPTION_DVD_ATHOME2;

				if ($subscription_values['ogone_cc_expiration_status'] == 1) {
				echo '<br>';
				echo '<br>';
				echo TEXT_YOUMUSTUPDATECC .'<br><br>';
				echo TEXT_CARD_TYPE . ': ' . $subscription_values['ogone_card_type'] . '<br>';
				echo TEXT_CARD_NO . ': ' . $subscription_values['ogone_card_no'] . '<br>';
				echo TEXT_CARD_OWNER . ': ' . $subscription_values['ogone_owner'] . '<br>';
				echo TEXT_EXP_DATE . ': ' . $subscription_values['ogone_exp_date'] . '<br>';
				
				?>
				
				
				<form name='cc_expiration' action='cc_expiration.php' method='post'>
				<?php  echo TEXT_NEW_EXP_DATE; ?>: <br>
				<input type='text' name='new_date_exp' id='new_date_exp'><?php  echo TEXT_NEW_EXP_DATE_EX; ?>
				<br>
				<input type='submit' value='GO'>
				</form>
				<?php 				
				}
					?>
					</td>
					<td valign="top"  width="200">
					<?php  echo '<a href="' . FILENAME_SUBSCRIPTIONCHANGE . '"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/Upgrade-Gratuit-samll.gif" border=0></a><br>'; ?>
					<div class="dvd-out">
					<?php  echo TEXT_BOXMENU ; ?>
					</div>					
					<?php 
				}else{
				echo NOSUBSCRIPTION;
				}
		   }
		  ?>

    </td>    
  </tr>
</table>