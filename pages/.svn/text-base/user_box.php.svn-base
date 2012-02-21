<?php 

$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$customers_values = tep_db_fetch_array($customers);

//$message = tep_db_query("select count(*) as cc  from custserv where customers_id= '".$customer_id."'");  
//$message_values = tep_db_fetch_array($message);
//$message_values['cc'];

$reviews = tep_db_query("select count(*) as cc from reviews where customers_id= '".$customer_id."'");  
$reviews_values = tep_db_fetch_array($reviews);

//BEN001 $wishlist = tep_db_query("select count(*) as cc from wishlist where customers_id= '".$customer_id."'");  
$wishlist = tep_db_query("select count(*) as cc from wishlist where wishlist_type = 'DVD_NORM' and customers_id= '".$customer_id."'");   //BEN001
$wishlist_values = tep_db_fetch_array($wishlist);

?>
<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="13" height="13"  valign="top" nowrap background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_top_left.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="13" colspan="2" nowrap  background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_top_line.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td width="13" height="13"  valign="top" background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_top_right.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td rowspan="9" background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_left_line.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td height="21" colspan="2" valign="top" class="TYPO_NUM_BLACK"><b><?php  echo TEXT_WELCOME.' '. $HTTP_COOKIE_VARS['first_name'] ;?></b></td>
    <td rowspan="9" background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_right_line.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="right" valign="top" class="TYPO_STD_BLACK"><?php  echo TEXT_YOU_ARENT.' '. $HTTP_COOKIE_VARS['first_name'];?> ? <a href="logoff.php" class="basiclink"><u><?php  echo TEXT_CLICK_HERE ;?></u></a></td>
  </tr>
    <?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/urgent_message.php'));
    if ($customers_values['customers_abo'] > 0) {
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="'. DIR_WS_IMAGES .'user_layout/usr_dvd_abo.gif" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
		$DVD_total=$customers_values['customers_abo_dvd_adult']+$customers_values['customers_abo_dvd_norm'];
	    echo TEXT_ABO .' <b class="TYPO_PROMO">'.$DVD_total . '</b> ' . TEXT_ROTATION.' ( <a class="red_basiclink" href="subscription_change.php">'.TEXT_CHANGE.'</a> )';
	    echo '</td>';
	  echo '</tr>';
	  echo '<tr>';
	    echo '<td height="24" valign="middle"><img src="' . DIR_WS_IMAGES . 'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
	    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
		echo '<b class="TYPO_PROMO">'.$customers_values['customers_abo_dvd_norm']. '</b> ' .TEXT_NBR_NORM_DVD1.' ( <a class="red_basiclink" href="dvd_rotate_info.php">'.TEXT_MORE_INFO.'</a> )';		
	    echo '</td>';
	  echo '</tr>';		
	}else{
	    if ($customers_values['customers_abo_payment_method'] == 2 and $customers_values['domiciliation_status']<3 and $customers_values['domiciliation_status']>1) {
		  echo '<tr>';
		    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
		    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
			echo TEXT_DOM_PENDING;
		    echo '</td>';
		  echo '</tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		}else{
		  echo '<tr>';
		    echo '<td height="24" valign="middle"><img src="'.DIR_WS_IMAGES.'user_layout/usr_dvd_rented.jpg" width="31" height="18"></td>';
		    echo '<td height="24" valign="middle" class="TYPO_STD_GREY">';
			echo TEXT_NO_ABO;
			echo '<br>';
    		echo '<a class="red_basiclink" href="activation_code.php">' . TEXT_GOT_A_PROMO_CODE . '</a>';
    		echo '</td>';
		  echo '</tr>';
		  echo '<tr><td colspan="2"><img src="'. DIR_WS_IMAGES .'blank.gif" width="31" height="1"></td></tr>';
		}
	}
	?>
  <tr>
    <td height="24" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>user_layout/usr_critics.jpg" width="31" height="18"></td>
	<?php 
	$review=TEXT_CRITICS;
	$review = str_replace('µµµcountµµµ',  $reviews_values['cc'] , $review);
	?>
    <td height="24" valign="middle" class="TYPO_STD_GREY"><?php  echo $review ;?> </td>
  </tr>
  <tr>
    <td width="40" height="12" valign="middle"><a  href="mywishlist.php"><img src="<?php  echo DIR_WS_IMAGES;?>user_layout/usr_dvd_list.gif" width="31" height="18" border="0"></a></td>
    <td width="203" valign="middle" class="TYPO_STD_GREY">
		<?php 
		if ($wishlist_values['cc']==0){	echo '<a href="howtorent.php" class="red_basiclink">'.TEXT_HOW_TO_RENT_DVDS .'</a>';}
		else { echo '<b class="TYPO_PROMO">'.$wishlist_values['cc'].'</b> '.TEXT_DVD_SELECTED;}
		?>
	</td>
  </tr>
  <tr>
    <td height="6" colspan="2" valign="middle" class="TYPO_STD_GREY"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="6">
	</td>
  </tr>
  <tr>
    <td height="6" colspan="2" valign="middle" class="TYPO_STD_GREY">
		<?php 
		echo 'ici';
		//BEN001 $wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 order by w.rank");
		$wl_query = tep_db_query("select already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 and wishlist_tyep = 'DVD_NORM' order by w.rank"); //BEN001
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
    <td background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_back_left.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_back_line.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>user_layout/round_back_right.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="13" height="13"></td>
  </tr>
</table>
