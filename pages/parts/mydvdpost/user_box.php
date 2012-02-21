<?php   



//$wishlist = tep_db_query("select count(*) as cc from wishlist where customers_id= '".$customer_id."'");  
//$wishlist_values = tep_db_fetch_array($wishlist);

//BEN001 $wishlist = tep_db_query("select count(*) as cc from wishlist w left join products p on w.product_id = p.products_id where w.customers_id= '".$customer_id."' and p.products_availability > 1 ");  
$wishlist = tep_db_query("select count(*) as cc from wishlist w left join products p on w.product_id = p.products_id where w.customers_id= '".$customer_id."' and p.products_availability > -1 and wishlist_type = 'DVD_NORM' and products_status != -1");  //BEN001
$wishlist_values = tep_db_fetch_array($wishlist);

//$count_recomm = tep_db_query("select count(*) as cc from products_recommandation where customers_id = '" . $customer_id . "' ");
//$count_recomm_values = tep_db_fetch_array($count_recomm);


?>
<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13" height="13"  valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_top_left.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="13" colspan="2" nowrap  background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_top_line.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td width="13" height="13"  valign="top" background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_top_right.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td rowspan="12" background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_left_line.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="21" colspan="2" valign="top" class="TYPO_NUM_BLACK"><b><?php    echo TEXT_WELCOME.' '. $HTTP_COOKIE_VARS['first_name'] ;?></b></td>
    <td rowspan="12" background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_right_line.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="right" valign="top" class="TYPO_STD_BLACK">
		<?php   
		$youarent = TEXT_YOU_ARENT2;
		$youarent = str_replace('µµµuser_nameµµµ',  $HTTP_COOKIE_VARS['first_name'] , $youarent);
		echo $youarent ;
		?>
		?<a href="logoff.php" class="basiclink"><u><?php    echo TEXT_CLICK_HERE ;?></u></a></td>
  </tr>
    <?php   
    include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/urgent_message.php'));
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/info_post.php'));
	 include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/update_cc_message.php'));
    ?>
  <tr>
	<td height="24" width="31" valign="middle"><a href="info_post.php"><img src="<?php    echo DIR_WS_IMAGES;?>user_layout/custid.gif" width="31"  border="0"></a></td>
	<td height="24" valign="middle" class="TYPO_STD_GREY" align="left"><?php    echo TEXT_CLIENT_NUMBER.'<b>'.$customer_id.'</b>' ;?></td>
  </tr>
    <?php   
	//include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/tvv_update_cc_message.php'));
    if ($customers_values['customers_abo'] > 0) {
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="'. DIR_WS_IMAGES .'user_layout/usr_dvd_abo.gif" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
		
		$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $customers_values['customers_abo_type']);
		$products_abo = tep_db_fetch_array($products_abo_query);
		$DVD_total= $products_abo['qty_at_home'];
		
		$products_abo_name_query = tep_db_query("select  products_name  from products_description where products_id = " . $customers_values['customers_abo_type']." AND  language_id=".$languages_id);
		$products_abo_name = tep_db_fetch_array($products_abo_name_query);
		$abo='<b>'.$products_abo_name['products_name'].'</b>';
		
		//switch to another abo.
		//if ($customers_values['customers_abo_type']>16){
			$href="subscription_change_limited.php";			
		//}else{
		//	$href="subscription_change.php";
		//}
		
	    if ($products_abo['qty_credit']>0){
			echo $abo ;
			//if ($customers_values['customers_locked__for_reconduction']==0){
				echo ' (<a class="red_basiclink" href="'.$href.'">'.TEXT_CHANGE.'</a>)';
			//}
			//echo $abo ;	
		}else{
			echo $abo.' '.$DVD_total . ' ' . TEXT_ROTATION.' (<a class="red_basiclink" href="'.$href.'">'.TEXT_CHANGE.'</a>)';
			//echo $abo;
		}
		
		//MUTISHIPMENT - MULTI-SHIPMENT
		$check_multiship_query = tep_db_query("select customers_abo_type,customers_abo_multishipment  from customers where customers_id = " . $customers_id );
		$check_multiship_values = tep_db_fetch_array($check_multiship_query);
				
		if ($check_multiship_values['customers_abo_type']>9 && $check_multiship_values['customers_abo_multishipment']==0 ){
			tep_db_query("update customers set customers_abo_multishipment  = 1 where customers_id = " . $customers_id);		
		}
		if ($customers_values[customers_abo_suspended ]>0){
			echo '<br>' . TEXT_ABO_SUSPENDED ;
			if ($customers_values[customers_abo_suspended ]==1){
			///check reason // now only holiday
			$suspended = tep_db_query("select * from abo_suspended_holiday where customers_id = '" . $customer_id . "' order by abo_suspended_holiday_id desc limit 1");
			$suspended_values = tep_db_fetch_array($suspended);
			echo TEXT_SUSPENDED_TILL . ' ' .  tep_date_short($suspended_values['date_end']);
			}
		}	
	    echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="' . DIR_WS_IMAGES . 'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';

		if ($products_abo['qty_credit']>0){
				echo '<table><tr><td class="TYPO_STD_GREY">';
				if ($customers_values['customers_abo_dvd_credit']<1){
					if(tep_date_short($customers_values['customers_abo_validityto'])!=tep_date_short($customers_values['ajd']))
						echo TEXT_BASIC_ALREADY_RENTED;
					$start_prolong = tep_db_query("select *, IF(DATE_ADD(date, INTERVAL 5 DAY) > curdate(),1,0) as chkdte from abo where action = 13 and customerid = '" . $customer_id . "' order by abo_id desc limit 1");
					$start_prolong_values = tep_db_fetch_array($start_prolong);
					echo '</td></tr><tr><td class="TYPO_STD_GREY">';
					if($start_prolong_values['chkdte']>0){
						echo '<b>'.TEXT_WAIT_BASIC_WILL_BE_SOON_PROLONGATED.'</b></td></tr>';					
					}else{
							if ($customers_values['customers_abo_suspended']<2 && ($customers_values['customers_abo_payment_method']<3 || $customers_values['customers_abo_payment_method']==20 || $customers_values['customers_abo_payment_method'] =21 || $customers_values['customers_abo_payment_method']==30))
							{
								echo TEXT_NEXT_RECONDUCTION .' <b class="TYPO_PROMO">' . tep_date_short($customers_values['customers_abo_validityto']). '</b> ';
								if(tep_date_short($customers_values['customers_abo_validityto'])!=tep_date_short($customers_values['ajd']))
									echo '</td></tr><tr><td class="TYPO_STD_GREY" align="center"><a href="basic_reconduction_info.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/button_prolongation.gif" border="0"></a></td></tr>';
							}
					}				
				}
				else{ 
				//$cpt=$customers_values['customers_abo_start_rentthismonth'];
				$cpt=$customers_values['customers_abo_dvd_credit'];
				$dvd_basic_RENTED = TEXT_BASIC_XRENTED;
				$dvd_basic_RENTED = str_replace('µµµcountµµµ',  $cpt , $dvd_basic_RENTED);
				echo $dvd_basic_RENTED ; 
				echo '</td></tr>';
				}
				echo '</table>';
		}else{
			echo '<b class="TYPO_PROMO">'.$customers_values['customers_abo_dvd_norm']. '</b> ' .TEXT_NBR_NORM_DVD1.' (<a class="red_basiclink" href="dvd_rotate_info.php">'.TEXT_MORE_INFO.'</a>)';		
		}	    
		  //dom after BCMC pending
		    if ($customers_values['customers_abo_payment_method'] == 17 and $customers_values['domiciliation_status']<>12) {
				echo '<br>' . TEXT_BCMC_DOM_PENDING;
			}
		
	    echo '</td>';
	  echo '</tr>';		
	}else{
		//pas d'abo
		
	    if ($customers_values['customers_abo_payment_method'] == 2 and $customers_values['domiciliation_status']<3 and $customers_values['domiciliation_status']>0) {
		  echo '<tr>';
		    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
		    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
			echo TEXT_DOM_PENDING;
		    echo '</td>';
		  echo '</tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		}else{
			if ($customers_values['customers_abo_payment_method'] == 20){//abo par telephone
				
					echo '<tr>';
					    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
					    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
						echo TEXT_PHONE ;
					    echo '</td>';
					  echo '</tr>';
					  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';	
				
			}else{
			    if ($customers_values['customers_abo_payment_method'] == 14 and $customers_values['offline_payment_status']<2) {
				    $dnv_payinfo = tep_db_query("select *  from dnv_payment where customers_id = '" . $customer_id . "' and status = 1");
					$dnv_payinfo_values = tep_db_fetch_array($dnv_payinfo);
				  echo '<tr>';
				    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
				    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
					echo TEXT_DNV_PENDING ;
				    echo '</td>';
				  echo '</tr>';
				  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
				}else{
				  echo '<tr>';
				    echo '<td height="24" valign="top"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
				    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
					echo TEXT_NO_ABO;
					echo '<br><br>';
					echo TEXT_GOT_A_PROMO_CODE;
		    		echo '<table width="100%"><tr>';
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php'));
					echo '</tr></table>';
		    		echo '</td>';
				  echo '</tr>';
				  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
				}
			}	
		}
	}
	?>
  <!--<tr>
    <td height="24" valign="middle">img src="<?php    echo DIR_WS_IMAGES;?>user_layout/usr_critics.jpg" width="31" height="18"></td>
    <td height="24" valign="middle" class="TYPO_STD_GREY">
	<?php    
       /* if ($count_recomm_values['cc'] < 5 ) {
		echo TEXT_YOU_HAVE_RECOM ;
		}else{ echo '<b>'.$count_recomm_values['cc'] . '</b> ' . TEXT_RECOM_DISP ;}*/
    ?>
    </td>
  </tr>-->
<tr></tr>
  <tr>
    <td width="40" height="12" valign="middle"><a  href="mywishlist.php"><img src="<?php    echo DIR_WS_IMAGES;?>user_layout/usr_dvd_list.gif" width="31" height="18" border="0"></a></td>
    <td width="203" valign="middle" class="TYPO_STD_GREY">
		<?php   
		if ($wishlist_values['cc']==0){	echo '<a href="howtorent.php" class="red_basiclink">'.TEXT_HOW_TO_RENT_DVDS .'</a>';}
		else { echo '<b class="TYPO_PROMO">'.$wishlist_values['cc'].'</b> '.TEXT_DVD_SELECTED;}
		?>
	</td>
  </tr>
  <tr>
    <td height="6" colspan="2" valign="middle" class="TYPO_STD_GREY"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="6"></td>
  </tr>
  <tr>

  </tr>
  <tr>
    <td background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_back_left.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td colspan="2" background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_back_line.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td background="<?php    echo DIR_WS_IMAGES;?>user_layout/round_back_right.gif"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
</table>