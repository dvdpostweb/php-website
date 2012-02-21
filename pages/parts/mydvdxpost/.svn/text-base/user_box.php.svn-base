<?php  

$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$customers_values = tep_db_fetch_array($customers);

$reviews = tep_db_query("select count(*) as cc from reviews where customers_id= '".$customer_id."'");  
$reviews_values = tep_db_fetch_array($reviews);

//BEN001 $wishlist = tep_db_query("select count(*) as cc from wishlist where customers_id= '".$customer_id."'");  
$wishlist = tep_db_query("select count(*) as cc from wishlist where wishlist_type = 'DVD_NORM' and customers_id= '".$customer_id."'");   //BEN001
$wishlist_values = tep_db_fetch_array($wishlist);

?>
<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13" height="13"  valign="top" nowrap background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_top_left.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="13" colspan="2" nowrap  background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_top_line.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td width="13" height="13"  valign="top" background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_top_right.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td rowspan="12" background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_left_line.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="21" colspan="2" valign="top" class="TYPO_NUM_BLACK"><b><?php  echo TEXT_WELCOME.' '. $HTTP_COOKIE_VARS['first_name'] ;?></b></td>
    <td rowspan="12" background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_right_line.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td height="13" colspan="2" align="right" valign="top" class="TYPO_STD_BLACK">
		<?php 
		$youarent = TEXT_YOU_ARENT2;
		$youarent = str_replace('µµµuser_nameµµµ',  $HTTP_COOKIE_VARS['first_name'] , $youarent);
		echo $youarent ;
		?>
		? <a href="logoff.php" class="basiclink"><u><?php  echo TEXT_CLICK_HERE ;?></u></a></td>
  </tr>
  <tr>
    <?php 
	//BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist_adult where customers_id = '" . $customer_id . "' ");
	$countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist where wishlist_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
	$countwl = tep_db_fetch_array($countwl_query);
	if ($countwl['countwl']==0){
    ?>
	<td height="40" colspan="2" align="center" valign="middle" class="TYPO_STD_RED"><?php  echo TEXT_DVD_X_RECEIVE;?></td>
    <?php  }else { ?>  
	<td colspan="2" align="center" valign="middle" class="TYPO_STD_RED"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="2"></td>	
	<?php  } ?>
 </tr>
  <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/urgent_message.php'));
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
			echo $abo . ' (<a class="red_basiclink" href="'.$href.'">'.TEXT_CHANGE.'</a>)';			
		}else{
			echo $abo.' '.$DVD_total . ' ' . TEXT_ROTATION.' (<a class="red_basiclink" href="'.$href.'">'.TEXT_CHANGE.'</a>)';
		}
	    
	    echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="' . DIR_WS_IMAGES . 'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
		echo '<b class="TYPO_PROMO">'.$customers_values['customers_abo_dvd_norm']. '</b> ' .TEXT_NBR_NORM_DVD1;		
	    echo '</td>';
	  echo '</tr>';		
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="' . DIR_WS_IMAGES . 'user_layout/usr_dvd_selected_x.gif" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
		echo '<b class="TYPO_PROMO">'.$customers_values['customers_abo_dvd_adult']. '</b> ' .TEXT_NBR_ADULT_DVD1.' (<a class="red_basiclink" href="dvdxpost_rotate_info2.php">?</a>) (<a class="red_basiclink" href="mydvdxpost.php?upgrade=UPGRADE">'.TEXT_CHANGE.'</a>)';			
	    echo '</td>';
	  echo '</tr>';
		if ($upgrade=='UPGRADE'){
		echo '<tr><td height="30" align="center" valign="bottom"  colspan="2">';
		$totabo = $customers_values['customers_abo_dvd_norm'] + $customers_values['customers_abo_dvd_adult'];
		echo '<form action="mywlnbradultupdate.php" method="post" name="nbradult" ID="Form1">';            
		echo '<table border="0" cellspacing="0" cellpadding="0"><tr><td>';
		echo '<SELECT id="wlDVDadult" name="wlDVDadult">';
		for ($i = 0; $i <= $totabo; $i++) {
			echo ($i==$subscription_values['customers_abo_dvd_adult'])? '<OPTION selected>' . $i . '</OPTION>':'<OPTION>' . $i . '</OPTION>';
			}
		echo '</SELECT></td><td valign="bottom">'; 
		 
		//echo '<INPUT id="Submitnbradult" type="submit" value="update" name="Submitnbradult">';
		echo '<input name="Submitnbradult" type="image" id="Submitnbradult" src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/button_confirm_update.gif" align="bottom" width="113" height="21" border="0">';
		echo '</td></tr></table>';
		echo '</form>';
		echo '</td></tr>';	
	    }
		else {
		echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';		
		}
		
	}else{
	    if ($customers_values['customers_abo_payment_method'] == 2 and $customers_values['domiciliation_status']<3 and $customers_values['domiciliation_status']>0) {
		  echo '<tr>';
		    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
		    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
			echo TEXT_DOM_PENDING;
		    echo '</td>';
		  echo '</tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		}else{
		  echo '<tr>';
		    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
		    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
			echo TEXT_NO_ABO;
		    echo '</td>';
		  echo '</tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		}
	}
	?>
  <tr>
    <td height="24" valign="middle"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_critics.jpg" width="31" height="18"></td>
    <?php 
	$review=TEXT_CRITICS;
	$review = str_replace('µµµcountµµµ',  $reviews_values['cc'] , $review);
	?>
    <td height="24" valign="middle" class="TYPO_STD_GREY"><?php  echo $review ;?> </td>
  </tr>
  <tr>
    <td width="40" height="6" valign="middle"><a href="mywishlist_adult.php"><img src="<?php   echo DIR_WS_IMAGES;?>user_layout/usr_dvd_list.gif" width="31" height="18" border="0"></a></td>
    <?php 
 	//BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist_adult where customers_id = '" . $customer_id . "' ");
	$countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist where wishlist_type = 'DVD_ADULT' and  customers_id = '" . $customer_id . "' "); //BEN001
  	$countwl = tep_db_fetch_array($countwl_query);
	?>
	<td width="203" valign="middle" class="TYPO_STD_GREY"><b class="TYPO_PROMO"><?php   echo $countwl['countwl'] ?></b> <?php  echo TEXT_DVD_SELECTED;?> </td>
  </tr>
  <tr>
    <td height="6" colspan="2" valign="middle"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="6"></td>
  </tr>
  <tr>
        <td height="6" colspan="2" valign="middle" class="TYPO_STD_GREY">
		<?php 
//BEN001		$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist_adult w, products_adult p left join wishlist_assigned_adult wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description_adult pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 order by w.rank");
		$wl_query_sql="select already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist w ";
		$wl_query_sql .= "inner join products p on p.products_id=w.product_id left join wishlist_assigned wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where  w.customers_id = '" . $customer_id . "' and p.products_availability > -1 and w.wishlist_type = 'DVD_ADULT' order by w.rank ";
		$wl_query = tep_db_query($wl_query_sql); //BEN001
    	$cpt=0;
		while ($wl = tep_db_fetch_array($wl_query)) {
			if ($cpt<7){
				$cpt++;
      			echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="40" height="2">'.$cpt.'. '.$wl['products_name'];?>
				<br>
      			<?php 
		}else {
			echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="40" height="2">8. ............<br>';
			echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="40" height="2"><div align="center"><a class="red_basiclink" href="mywishlist.php">'.TEXT_SEE_MY_LIST.'</a></div>';
			break;
			}
		}
		?></td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_back_left.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td colspan="2" background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_back_line.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>user_layout/round_back_right.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
</table>
