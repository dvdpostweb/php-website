<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40"width="50%" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
    <td  valign="middle" align="right"><?php  echo '<a class="red_slogan" href="howtorent.php"><u>' . HEADING_HELP . '</u></a>'; ?></td>
  </tr>
    <tr>
    <td  height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
</table>
<div class="SLOGAN_DETAIL">
<?php 
$abo_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$abo = tep_db_fetch_array($abo_query);
//BEN001 $aboname_query = tep_db_query("select * from products_description_adult where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'");
$aboname_query = tep_db_query("select * from products_description where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'"); //BEN001
$aboname = tep_db_fetch_array($aboname_query);
if ($abo['customers_abo'] == 0) {
  echo TEXT_NOABO;
}
?>
</div>
<br>
<?php 
  //BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist_adult where customers_id = '" . $customer_id . "' ");
  $countwl_query = tep_db_query("select count(wl_id) as countwl from wishlist where wishlist_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
  $countwl = tep_db_fetch_array($countwl_query);
  if ($countwl['countwl']==0){
  ?> 

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" class="SLOGAN_DETAIL_ROUGE"><?php  echo TEXT_RECEIVE_DVD; ?><br><br></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL"><?php  echo TEXT_NUM_DVD_ADULT.' : <b>'.$abo['customers_abo_dvd_adult'].' </b>(<a class="red_basiclink" href="mydvdxpost.php?upgrade=UPGRADE">'.TEXT_CHANGE.'</a>)';?></td>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>/greyline2.gif" width="764" height="4"></td>
  </tr>
</table>
<?php  } ?>
<br>
<span class="SLOGAN_DETAIL"><?php  echo TEXT_NBR_DVD_HOME1 . ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']) . TEXT_NBR_DVD_HOME2; ?></span>
<?php 
  	if ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']>0) {
  ?>
  <table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2_x.gif" width="14" height="25"></td>
      <td width="368"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border" >
	  	<B class="TYPO_STD_BLACK"><?php  echo TEXT_TITLE; ?></B>
	  </td>
      <td width="123"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php  echo TEXT_STATUS; ?></B>
	 </td>
      <td width="123"   background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php  echo TEXT_DATE_SHIPPED; ?></B>
	</td>
      <td width="122"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif">&nbsp;</td>
      <td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2_x.gif" width="14" height="25"></td>
    </tr>
    <tr>
      <td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
      <td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
    </tr>
    <tr>
      <TD colspan="4">
        <table width="736">
            <?php 
//BEN001              $dvdout_query = tep_db_query("select ifnull(pd.products_name,pda.products_name) products_name, op.products_id, o.orders_status, o.last_modified from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op left join products_description pd on op.products_id = pd.products_id and pd.language_id='" . $languages_id . "' left join products_description_adult pda on op.products_id = pda.products_id and pda.language_id='" . $languages_id . "' where o.orders_id = op.orders_id and o.customers_id = " . $customer_id . " and o.orders_status < 3  and op.products_id>49 order by o.orders_status");
              $dvdout_query = tep_db_query("select ifnull(pd.products_name,pda.products_name) products_name, op.products_id, o.orders_status, o.last_modified from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op left join products_description pd on op.products_id = pd.products_id and pd.language_id='" . $languages_id . "' left join products_description pda on op.products_id = pda.products_id and pda.language_id='" . $languages_id . "' where o.orders_id = op.orders_id and o.customers_id = " . $customer_id . " and o.orders_status < 3  and op.products_id>49 order by o.orders_status"); //BEN001
              while ($dvdout = tep_db_fetch_array($dvdout_query)) {
            ?>
			<tr>
			  <td width="368"class="slogan_detail">
			   <?php 
			      echo '<a class="basiclink" href="product_info_adult.php?products_id=' . $dvdout['products_id'] . '"><b>' . $dvdout['products_name'] . '</b></a>';
              ?>
			  </td>
			  <td width="123"class="slogan_detail" align="center">
			  <?php 
                switch ($dvdout['orders_status']){
                  case 1:
                    echo TEXT_STATUS_RFE;
                  break;
                  case 2:
                    echo TEXT_STATUS_EXP;
                  break;
                }?>
				</td>
				<td width="123" class="slogan_detail" align="center">
				<?php                 
                switch ($dvdout['orders_status']){
                  case 1:
                  break;
                  case 2:
                    echo $dvdout['last_modified'];
                  break;
                }
               ?>
				</td>
				<td width="122" class="slogan_detail" align="center"> 
					<a class="red_basiclink" href="custserproblemdvd.php"><?php  echo TEXT_REPORT_PROBLEM; ?></a>
				</td>
			</tr>
            <?php 
              } // end while
            ?>
   	  </table></TD>
    </tr>
    <tr>
      <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      <td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
    </tr>
  </table>
<?php 
            } // end if
?>
</div>
  <br>
  <span class="SLOGAN_DETAIL"><?php  echo TEXT_WLCOUNTA . $countwl['countwl'] . TEXT_WLCOUNTB; ?></span>
  <br><br>
  <span class="SLOGAN_DETAIL"><a class="red_slogan" href="myrentals_adult.php"><?php  echo TEXT_SEE_RENTALS ?></a></span>
  <br><br>	
<?php 
if ($countwl['countwl']>0) {
?>
  <form name="form1" action="mywishlistupdate_adult.php" method="post">
  		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    	  <tr align="center">
      		<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2_x.gif" width="14" height="25"></td>
      		<td width="100" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_REMOVE; ?></B>
			</td>
      		<td  width="100"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
	  			<B class="TYPO_STD_BLACK"><?php  echo TEXT_RANK; ?></B>
	  		</td>
	  		<td width="300"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_TITLE; ?></B>
			</td>
	  		<td width="236"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" >
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_AVAIL; ?></B>
			</td>
	  		<td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2_x.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
      		<td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
      		<td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
    	  </tr>
    	  <tr>
			<td colspan="4">
		 		<table width="736">
		 		<?php 
//BEN001      			$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist_adult w, products_adult p left join wishlist_assigned_adult wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description_adult pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 order by w.rank");
      			$wl_query = tep_db_query("select distinct if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.priority, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist w inner join products p on p.products_id=w.product_id left join wishlist_assigned wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where  w.wishlist_type = 'DVD_ADULT' and w.customers_id = '" . $customer_id . "' order by w.priority, pd.products_name"); //BEN001
      			while ($wl = tep_db_fetch_array($wl_query)) {
      			?>
      				<tr align="center">
        				<td width="100">
          				<INPUT type="checkbox" id="del<?php  echo $wl['wl_id']; ?>" name="del<?php  echo $wl['wl_id']; ?>">
        				</td>
        				<td width="100">
          				<INPUT type="text" size="3" id="rank<?php  echo $wl['wl_id']; ?>" name="rank<?php  echo $wl['wl_id']; ?>" size="2" value="<?php  echo $wl['rank']; ?>">
        				</td>
        				<td width="300">
          					<a class="basiclink" href="product_info_adult.php?products_id=<?php  echo $wl['product_id']; ?>">
            				<b><font color="#000000"><?php  echo $wl['products_name'];?></font></b>
          					</a>
          					<?php 
            				if ($wl['already_rented']>0){
              					echo '&nbsp;&nbsp;&nbsp;<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
            					}
          					?>
        				</td>
        				<td width="236">
          				<?php 
            			if ($wl['products_next'] > 0 ){
              				echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
            			}else{
              				echo '<img src="' . DIR_WS_IMAGES . 'avail' . $wl['products_availability'] . '.gif">';
            				}
 	         			}
          				?>
        				</td>
      				</tr>
		 		</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
  </table>
  
  <br><br>
  <?php 
//BEN001    $wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist_adult w, products_adult p left join wishlist_assigned_adult wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description_adult pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 order by w.rank");
    $wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist w inner join products p on p.products_id=w.product_id left join wishlist_assigned wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where w.wishlist_type = 'DVD_ADULT' and p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 1 order by w.rank"); //BEN001
    if(tep_db_fetch_array($wl_query)) { 
	echo '<b class="SLOGAN_DETAIL_ROUGE">' . TEXT_WL_NOTAVAIL_LIST . '</b></font>';
	?>
	<br><br>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr align="center">
			<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2_x.gif" width="14" height="25"></td>
			<td width="100" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_REMOVE; ?></B>
			</td>
			<td  width="100"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
				<a class="red_basiclink" href="mywishlist_adult.php?orderby=rank"><?php  echo TEXT_RANK; ?></a>
			</td>
			<td width="300"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_TITLE; ?></B>
			</td>
			<td width="236"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2_x.gif" >
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_AVAIL; ?></B>
			</td>
			<td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2_x.gif" width="14" height="25"></td>
		</tr>
		<tr>
			<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
			<td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
			<td  rowspan="2"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<table width="736">
				<?php 
//BEN001					$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist_adult w, products_adult p left join wishlist_assigned_adult wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description_adult pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 order by w.rank");
					$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from wishlist w, products p left join wishlist_assigned wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join products_description pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where products_type = 'DVD_ADULT' and p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 order by w.rank"); //BEN001
					while ($wl = tep_db_fetch_array($wl_query)) {      
					?>
					<tr align="center">
						<td width="100">
							<INPUT type="checkbox" id="del<?php  echo $wl['wl_id']; ?>" name="del<?php  echo $wl['wl_id']; ?>">
						</td>
						<td width="100">
							<INPUT type="text" size="3" id="rank<?php  echo $wl['wl_id']; ?>" name="rank<?php  echo $wl['wl_id']; ?>" size="2" value="<?php  echo $wl['rank']; ?>">
						</td>
						<td width="300">
							<a class="basiclink" href="product_info_adult.php?products_id=<?php  echo $wl['product_id']; ?>">
							<b><font color="#000000"><?php  echo $wl['products_name'];?></font></b>
							</a>
							<?php 
							if ($wl['already_rented']>0){
								echo '<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
								}
							?>
						</td>
						<td width="236">
						<?php 
						if ($wl['products_next'] > 0 ){
							echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
						}else{
							echo '<img src="' . DIR_WS_IMAGES . 'avail' . $wl['products_availability'] . '.gif">';
							}
						?>
						</td>
					</tr><?php 
				}
          			?>
				</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
			<td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
	</table>
<?php  } ?>
  
  <br>
  <div align="center">  
  	<input name="submit" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/list_update.gif" align="middle" border="0">
  </div>
  </form>

  
  <?php 
}
else {
	?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr >
			<td align="center" width="14">
				<br>
				<a href="mydvdxpost.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/add_a_dvd_in_wl.gif" border="0"></a>
				<br>
			</td>
		</tr>
	</table>
	<?php 
}
?>
