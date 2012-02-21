<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>    
  </tr>
  <tr>
    <td  height="15" valign="middle"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  
  <?php   
  if ($w_faq==1){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q1.'</b></u></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R1 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist_adult.php?w_faq=1" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q1.'</u></a></td></tr>';
  } 
  if ($w_faq==2){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q2.'</b></u><img src="'.DIR_WS_IMAGES.'wish_exp.gif" border="0" align="absmiddle"></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R2 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist_adult.php?w_faq=2" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q2.'</u><img src="'.DIR_WS_IMAGES.'wish_exp.gif" border="0" align="absmiddle"></a></td></tr>';
  }
  if ($w_faq==4){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q4.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R4 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist_adult.php?w_faq=4" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q4.'</u></a></td></tr>';
  }
  if ($w_faq==5){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q5.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R5 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist_adult.php?w_faq=5" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q5.'</u></a></td></tr>';
  }
  if ($w_faq==6){
	echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_WISHLIST2_FAQ_Q6.'</b></td></tr>';
	echo '<tr><td>'. TEXT_WISHLIST2_FAQ_R6 .'</td></tr>';
  }
  else {
  echo '<tr><td  valign="middle" height="30" align="left"><a href="mywishlist_adult.php?w_faq=6" class="dvdpost_recom"><u>'.TEXT_WISHLIST2_FAQ_Q6.'</u></a></td></tr>';
  }   
  ?>
  <tr>
    <td  height="15" valign="middle"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="3"></div></td>
  </tr>
</table> 
<br>
<?php  
$abo_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$abo = tep_db_fetch_array($abo_query);
//BEN001 $aboname_query = tep_db_query("select * from products_description_adult where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'");
$aboname_query = tep_db_query("select * from products_description where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'"); //BEN001
$aboname = tep_db_fetch_array($aboname_query);
if ($abo['customers_abo'] == 0) {
    if ($abo['customers_abo_payment_method'] == 14 and $abo['offline_payment_status']<2) {
	    $dnv_payinfo = tep_db_query("select *  from dnv_payment where customers_id = '" . $customer_id . "' and status = 1");
		$dnv_payinfo_values = tep_db_fetch_array($dnv_payinfo);
	  	echo '<div class="SLOGAN_DETAIL">' . TEXT_DNV_PENDING . '</div><br>'; 
	}else{
	  echo '<div class="SLOGAN_DETAIL">'. TEXT_NOABO .'</div><br>';
	  $show_kiala=0;
    }
}
else {$show_kiala=1;}
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="bottom">
			<li class="SLOGAN_DETAIL">
				<?php   echo TEXT_NBR_DVD_HOME1 . ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']) . TEXT_NBR_DVD_HOME2; ?>
			</li>		
		<?php  
		//BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist_adult where customers_id = '" . $customer_id . "' ");
		$countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist where wishlist_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
		$countwl = tep_db_fetch_array($countwl_query);
		?>
		  <li class="SLOGAN_DETAIL"><?php   echo TEXT_WLCOUNTA . $countwl['countwl'] . TEXT_WLCOUNTB; ?></li>
		  <li class="SLOGAN_DETAIL"><a class="red_slogan" href="myrentals_adult.php"><?php   echo TEXT_SEE_RENTALS ?></a></li>
	</td>    
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>

<?php  
  	if ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']>0) {
  ?>  
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="14"><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      <td width="368" align="left"   background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border" >
	  	<B class="TYPO_STD_BLACK"><?php   echo TEXT_TITLE; ?></B>
	  </td>
      <td width="123" align="center"   background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php   echo TEXT_STATUS; ?></B>
	 </td>
      <td width="123" align="center"   background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
	  	<B class="TYPO_STD_BLACK"><?php   echo TEXT_DATE_SHIPPED; ?></B>
	</td>
      <td width="122" align="center" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
		<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1">
	  </td>
      <td width="14" ><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
    </tr>
	<tr>
	<?php  
//BEN001	  $dvdout_query = tep_db_query("select ifnull(pd.products_name,pda.products_name) products_name, op.products_id, o.orders_status, o.last_modified from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op left join products_description pd on op.products_id = pd.products_id and pd.language_id='" . $languages_id . "' left join products_description_adult pda on op.products_id = pda.products_id and pda.language_id='" . $languages_id . "' where o.orders_id = op.orders_id and o.customers_id = " . $customer_id . " and o.orders_status < 3  and op.products_id>49 order by o.orders_status");
	  $dvdout_query = tep_db_query("select ifnull(pd.products_name,pda.products_name) products_name, op.products_id, o.orders_status, o.last_modified ,op.orders_products_type as products_type from " . TABLE_ORDERS . " o inner join " . TABLE_ORDERS_PRODUCTS . " op on o.orders_id = op.orders_id left join products_description pd on op.products_id = pd.products_id and pd.language_id='" . $languages_id . "' left join products_description pda on op.products_id = pda.products_id and pda.language_id='" . $languages_id . "' where o.customers_id = " . $customer_id . " and o.orders_status < 3  and op.products_id>49 order by o.orders_status"); //BEN001
	  $i=1;	
	  while ($dvdout = tep_db_fetch_array($dvdout_query)) {
		if ($i % 2 ==0){$bcolor='#FBEEF8'; }
		else {$bcolor='#FFFFFF'; }
		?>			
		<tr>
			<td height="30" width="14" background="<?php   echo DIR_WS_IMAGES.'img_recom/left_line_recom_transpa.gif';?>" bgcolor="<?php   echo $bcolor;?>">
					<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14">
			</td>
			<td width="368" class="slogan_detail" bgcolor="<?php   echo $bcolor;?>">
				<?php  
				 switch($dvdout['products_type'])
					  {
					  case 'DVD_ADULT':
					    $href_link='product_info_adult.php';
					    break;
					  case 'DVD_NORM': //RALPH-002
					    $href_link='product_info.php';
					    break;
					  }
				echo '<a class="basiclink" href="'.$href_link.'?products_id=' . $dvdout['products_id'] . '"><b>' . $dvdout['products_name'] . '</b></a>';
				?>
			</td>
			<td width="123" align="center" class="slogan_detail" bgcolor="<?php   echo $bcolor;?>">
			  <?php  
				switch ($dvdout['orders_status']){
				  case 1:
					echo TEXT_STATUS_RFE;
				  break;
				  case 2:
					echo TEXT_STATUS_EXP;
				  break;
				}
				?>
			</td>
			<td width="123" align="center" class="slogan_detail" bgcolor="<?php   echo $bcolor;?>">
				<?php  
				switch ($dvdout['orders_status']){
				  case 1:
					echo "&nbsp;";
				  break;
				  case 2:
					echo $dvdout['last_modified'];
				  break;
				}
			   ?>
			</td>							  
			<td width="122" align="center" class="slogan_detail" bgcolor="<?php   echo $bcolor;?>">
				<a class="red_basiclink" href="custserproblemdvd.php"><?php   echo TEXT_REPORT_PROBLEM; ?></a>
			</td>
			<td width="14" background="<?php   echo DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif';?>" bgcolor="<?php   echo $bcolor;?>">
				<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14">
			</td>
		</tr>				
		<?php  
		$i++;
		} // end while
		?>
	<tr>
      <td><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      <td colspan="4" height="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
    </tr>
	<tr>
    <td  colspan="6" align="center" height="35">&nbsp;</td>
  </tr>
</table>
<?php  
            } // end if
?>
</div>
<?php  
if ($countwl['countwl']>0) {
?>
  <form name="form1" action="mywishlistupdate3_adult.php" method="post">
  		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td colspan="6" align="right" valign="middle" height="40">
				<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/list_update_w2.gif" align="middle" border="0">
			</td>
		  </tr>
		  <tr align="center">
      		<td width="14" height="35"><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom3_x.gif" width="14"></td>
	  		<td width="295" align="left" height="35" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom3_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php   echo TEXT_TITLE; ?></B>
			</td>
	  		<td width="168" height="35" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom3_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php   echo TEXT_ADVICE; ?></B>
			</td>
      		<td  width="176" height="35" align ="center" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom3_x.gif">
      			<table width="176" height="27" border="0" align="center" cellpadding="0" cellspacing="0"> 
	      			<tr>
						<td width="53" align ="center">
							<img src="<?php   echo DIR_WS_IMAGES;?>hi_x.jpg" width="27" height="27">
						</td>
						<td width="53" align ="center">
							<img src="<?php   echo DIR_WS_IMAGES;?>med_x.jpg" width="27" height="27">
						</td>
						<td width="54" align ="center">
							<img src="<?php   echo DIR_WS_IMAGES;?>low_x.jpg" width="27" height="27">
						</td>
					</tr>
   			  </table>
	  		</td>
      		<td width="97" height="35" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom3_x.gif" >
				<B class="TYPO_STD_BLACK"><?php   echo TEXT_REMOVE; ?></B>
			</td>
	  		<td width="14" height="35" valign="top" ><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom3_x.gif" width="14" height="35"></td>
	 	  </tr>    	  
		 		<?php  
//BEN001      			$wl_query = tep_db_query("select distinct if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.priority, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist_adult w, products_adult p left join wishlist_assigned_adult wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description_adult pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' order by w.priority, pd.products_name");
      			$wl_query = tep_db_query("select  already_rented,p.rating_users,p.rating_count, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.priority, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day,p.imdb_id from wishlist w inner join products p on p.products_id=w.product_id left join products_description pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where  w.wishlist_type = 'DVD_ADULT' and w.customers_id = '" . $customer_id . "' order by w.priority, pd.products_name"); //BEN001
      			$i=1;				
				while ($wl = tep_db_fetch_array($wl_query)) {
					if ($i % 2 ==0){$bcolor='#FBEEF8'; }
					else {$bcolor='#FFFFFF'; }
						
      			?>
      				<tr align="center">
						<td background="<?php   echo DIR_WS_IMAGES.'img_recom/left_line_recom_transpa.gif';?>" bgcolor="<?php   echo $bcolor;?>">
							<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14">
						</td>						
        				<td width="300" align="left" bgcolor="<?php   echo $bcolor;?>" height="32">
          					<a class="basiclink" href="product_info_adult.php?products_id=<?php   echo $wl['product_id']; ?>">
            				<b><font color="#000000"><?php   echo $wl['products_name'];?></font></b>
          					</a>
          					<?php  
            				if ($wl['already_rented']=='YES'){
              					echo '&nbsp;&nbsp;&nbsp;<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
            					}
          					?>
        				</td>
        				<td width="168" class="TYPO_STD_BLACK" bgcolor="<?php   echo $bcolor;?>">
	          				<?php  
	            			if ($wl['products_next'] > 0 ){
	              				echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
	            			}else{
								if ($wl['products_availability'] < 0){
	              				echo '<font color="red">' . TEXT_NOT_AVAILABLE . '</font>';
								}else{
	              				//echo '<img src="' . DIR_WS_IMAGES . 'avail' . $wl['products_availability'] . '.gif">';
									$data_avg_count=avg_count_fct($wl['rating_users'],$wl['rating_count']);
									$jsrate=$data_avg_count['avg'];
								if ($jsrate==0){ 
									echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE_ADULT . '?cPath=21&products_id='. $wl['product_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
								}
								else {
									
									echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
									}								
								}
							}
	          				?>
        				</td>        				
        				<td width="176" bgcolor="<?php   echo $bcolor;?>">
	        				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		        				<tr align="center">
									<input type='hidden' name='id[]' value='<?php    echo $wl['wl_id']; ?>' />
			        				<?php  
			        				switch ($wl['priority']) {
				        				case 1:
				        					?>
					        				<td width="53">
												<input type='hidden' name='rank_original<?php    echo $wl['wl_id']; ?>' value='h' />
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="h" checked=true>
								  </td>
					        				<td width="53">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="m">
								  </td>
					        				<td width="54">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="l">
								  </td>
			                				<?php  		
				        				break;
				        				case 2:
				        					?>
					        				<td width="53">
												<input type='hidden' name='rank_original<?php    echo $wl['wl_id']; ?>' value='m' />
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="h">
								  </td>
					        				<td width="53">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="m"  checked=true>
								  </td>
					        				<td width="54">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="l">
								  </td>
					        				<?php  		
				        				break;
				        				case 3:
				        					?>
					        				<td width="53">
												<input type='hidden' name='rank_original<?php    echo $wl['wl_id']; ?>' value='l' />
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="h">
								  </td>
					        				<td width="53">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="m">
								  </td>
					        				<td width="54">
												<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="l" checked=true>
								  </td>
					        				<?php  		
				        				break;
				        			}
			        				?>
	        				  </tr>
        				  </table>
						</td>	
        				<td width="100" bgcolor="<?php   echo $bcolor;?>">
 	         				<INPUT type="radio" id="rank<?php   echo $wl['wl_id']; ?>" name="priority<?php   echo $wl['wl_id']; ?>" value="del">
							<!--<INPUT type="checkbox" id="del<?php   echo $wl['wl_id']; ?>" name="del<?php   echo $wl['wl_id']; ?>"> -->
        				</td>
						<td background="<?php   echo DIR_WS_IMAGES.'img_recom/right_line_recom_transpa.gif';?>" bgcolor="<?php   echo $bcolor;?>">
							<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14">
						</td>
					</tr>
					<?php  
					$i++; 
					} 
					?>
		<tr>
			<td height="14"><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td colspan="4" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      		<td><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr> 
		<tr>
			<td colspan="6" align="right" valign="middle" height="40">
				<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/list_update_w2.gif" align="middle" border="0">
			</td>
		</tr>
  </table>
  
  <br><br>
<?php  
}else {
	?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr >
			<td align="center" width="14">
				<br>
				<a href="mydvdxpost.php"><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/add_a_dvd_in_wl.gif" border="0"></a>
				<br>
			</td>
		</tr>
	</table>
	<?php  
}
?>
