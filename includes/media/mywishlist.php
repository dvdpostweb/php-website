<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40"width="50%" class="TYPO_ROUGE_ITALIQUE"><?php echo HEADING_TITLE; ?></td>
    <td  valign="middle" align="right"><?php echo '<a class="red_slogan" href="howtorent.php"><u>' . HEADING_HELP . '</u></a>'; ?></td>
  </tr>
    <tr>
    <td  height="6" colspan="3" valign="top"><div align="center"><img src="<?php echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
</table>
<br>
<?php
			   include('INCLUDES/FUNCTIONS/isAdult.php'); //BEN001
$abo_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id='" . $customer_id . "'");
$abo = tep_db_fetch_array($abo_query);
$aboname_query = tep_db_query("select * from products_description where products_id='" . $abo['customers_abo_type'] . "' and language_id = '" . $languages_id . "'");
$aboname = tep_db_fetch_array($aboname_query);

if ($abo['customers_abo'] == 0) {
	  echo '<div class="SLOGAN_DETAIL">'. TEXT_NOABO .'</div><br>';
}
?>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="bottom">
		<ul>
			<li class="SLOGAN_DETAIL">
				<?php echo TEXT_NBR_DVD_HOME1 . ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']) . TEXT_NBR_DVD_HOME2; ?>
			</li>
		</ul>
	</td>
  </tr>
  <tr>
    <td valign="bottom">&nbsp;</td>
  </tr>
</table>


<?php
  	if ($abo['customers_abo_dvd_home_norm'] + $abo['customers_abo_dvd_home_adult']>0) {
  ?>  
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
      <td width="14"><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      <td width="368"   background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border" >
	  	<B class="TYPO_STD_BLACK"><?php echo TEXT_TITLE; ?></B>
	  </td>
      <td width="123"   background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php echo TEXT_STATUS; ?></B>
	 </td>
      <td width="123"   background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
	  	<B class="TYPO_STD_BLACK"><?php echo TEXT_DATE_SHIPPED; ?></B>
	</td>
      <td width="122"  background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">&nbsp;</td>
      <td width="14" ><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
    </tr>
    <tr>
      <td  rowspan="2"  background="<?php echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td colspan="4"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
      <td  rowspan="2"background="<?php echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
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
			  <td width="368" class="slogan_detail">
			   <?php
              if (SITE_IS_ADULT) {
				      echo '<a class="basiclink" href="product_info.php?products_id=' . $dvdout['products_id'] . '">' . $dvdout['products_name'] . '</a>';	              
	          }else{
		         //BEN001 if ($dvdout['products_id']>9999){
				  if (isAdult($dvdout['products_id'])){ //BEN001
			          echo TEXT_TITEL_DVDXPOST;
			      }else{
				      echo '<a class="basiclink" href="product_info.php?products_id=' . $dvdout['products_id'] . '"><b>' . $dvdout['products_name'] . '</b></a>';
				  }
		      }
                  //echo ($dvdout['products_id']>9999)? TEXT_TITEL_DVDXPOST : '<a href="product_info.php?products_id=' . $dvdout['products_id'] . '">' . $dvdout['products_name'] . '</a>';
              ?>
			  </td>
			  <td width="123" align="center" class="slogan_detail">
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
				<td width="123" align="center" class="slogan_detail">
                <?
				switch ($dvdout['orders_status']){
                  case 1:
                  break;
                  case 2:
                    echo $dvdout['last_modified'];
                  break;
                }
               ?>
			  </td>			 
		  </td>			  
			  <td width="122" align="center" class="slogan_detail">
			  	<a class="red_basiclink" href="custserproblemdvd.php"><?php echo TEXT_REPORT_PROBLEM; ?></a>
			  </td>
			</tr>
            <?php
              } // end while
            ?>
   	  </table></TD>
    </tr>
    <tr>
      <td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      <td colspan="4" background="<?php echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      <td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
    </tr>
</table>
<?php
            } // end if
?>
</div>
<?php
  //BEN001 $countwl_query = tep_db_query("select count(wl_id) as countwl from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
  $countwl_query = tep_db_query("select count(wl_id) as countwl from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and wishlist_type = 'DVD_NORM' "); //BEN001
  $countwl = tep_db_fetch_array($countwl_query);
?>
<ul>
  <li class="SLOGAN_DETAIL"><?php echo TEXT_WLCOUNTA . $countwl['countwl'] . TEXT_WLCOUNTB; ?></li>
</ul>
<ul>
  <li class="SLOGAN_DETAIL"><a class="red_slogan" href="myrentals.php"><?php echo TEXT_SEE_RENTALS ?></a></li>
</ul>
<?php
if ($countwl['countwl']>0) {
?>
  <form name="form1" action="mywishlistupdate.php" method="post">
  		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    	  <tr align="center">
      		<td width="14"><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      		<td width="100" background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_REMOVE; ?></B>
			</td>
      		<td  width="100"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_RANK; ?></B>
	  		</td>
	  		<td width="300"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_TITLE; ?></B>
			</td>
	  		<td width="236"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" >
				<B class="TYPO_STD_BLACK"><?php echo TEXT_ADVICE; ?></B>
			</td>
	  		<td width="14" ><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="2"  background="<?php echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
      		<td colspan="4"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
      		<td  rowspan="2"background="<?php echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
    	  </tr>
    	  <tr>
			<td colspan="4">
		 		<table width="736">
		 		<?php
      			//BEN001 $wl_query = tep_db_query("select distinct if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 order by w.rank");
				$wl_query = tep_db_query("select distinct if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability > 1 and w.wishlist_type = 'DVD_NORM' order by w.rank"); //BEN001
      			while ($wl = tep_db_fetch_array($wl_query)) {
      			?>
      				<tr align="center">
        				<td width="100">
          				<INPUT type="checkbox" id="del<?php echo $wl['wl_id']; ?>" name="del<?php echo $wl['wl_id']; ?>">
        				</td>
        				<td width="100">
          				<INPUT type="text" size="3" id="rank<?php echo $wl['wl_id']; ?>" name="rank<?php echo $wl['wl_id']; ?>" size="2" value="<?php echo $wl['rank']; ?>">
        				</td>
        				<td width="300">
          					<a class="basiclink" href="product_info.php?products_id=<?php echo $wl['product_id']; ?>">
            				<b><font color="#000000"><?php echo $wl['products_name'];?></font></b>
          					</a>
          					<?php
            				if ($wl['already_rented']>0){
              					echo '&nbsp;&nbsp;&nbsp;<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
            					}
          					?>
        				</td>
        				<td width="236" class="TYPO_STD_BLACK">
          				<?php
	            			if ($wl['products_next'] > 0 ){
	              				echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
	            			}else{
	              				//echo '<img src="' . DIR_WS_IMAGES . 'avail' . $wl['products_availability'] . '.gif">';
	              				$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $wl['product_id'] . "'");
								$ratings_count_values = tep_db_fetch_array($ratings_count);
								$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $wl['product_id'] . "'");
								$ratings_average_values = tep_db_fetch_array($ratings_average);
						
								$reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $wl['product_id'] . "'");
								$reviews_count_values = tep_db_fetch_array($reviews_count);
								$reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $wl['product_id'] . "'");
								$reviews_average_values = tep_db_fetch_array($reviews_average);
						
								if ($ratings_average_values['prave']>0){
									if ($reviews_average_values['rrave']>0){
										$jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
									}else{
										$jsrate = round($ratings_average_values['prave'],1);
									}
								}else{
									if ($reviews_average_values['rrave']>0){
										$jsrate = round($reviews_average_values['rrave'],1);
									}else{
										$jsrate = 0;
									}
								}
								if ($jsrate==0){ 
									echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $wl['product_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
								}
								else {
									$jsrate=$jsrate*10;
									echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
									}								
	              			}
	          				?>
        				</td>
      				</tr>
      				<? } ?>
		 		</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td colspan="4" background="<?php echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      		<td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
  </table>
  
  <br><br>
  <?php
    //BEN001 $wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 order by w.rank");
	$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 and w.wishlist_type = 'DVD_NORM' order by w.rank"); //BEN001
    if(tep_db_fetch_array($wl_query)) { 
	echo '<b class="SLOGAN_DETAIL_ROUGE">' . TEXT_WL_NOTAVAIL_LIST . '</b></font>';
	?>
	<br><br>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr align="center">
			<td width="14"><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
			<td width="100" background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_REMOVE; ?></B>
			</td>
			<td  width="100"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_RANK; ?></B>
			</td>
			<td width="300"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php echo TEXT_TITLE; ?></B>
			</td>
			<td width="236"background="<?php echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" >
				<B class="TYPO_STD_BLACK"><?php echo TEXT_AVAIL; ?></B>
			</td>
			<td width="14" ><img src="<?php echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
		</tr>
		<tr>
			<td  rowspan="2"  background="<?php echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
			<td colspan="4"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
			<td  rowspan="2"background="<?php echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<table width="736">
				<?php
					//BEN001 $wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 order by w.rank");
					$wl_query = tep_db_query("select if(wa.date_assigned is null,0,1) already_rented, pd.products_name, p.products_next, p.products_availability, w.wl_id, w.rank, w.product_id, date_format(p.products_date_available,'%Y-%m-%d') day from " . TABLE_WISHLIST . " w, " . TABLE_PRODUCTS . " p left join " . TABLE_WISHLIST_ASSIGNED . " wa on wa.customers_id=w.customers_id and wa.products_id=w.product_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = w.product_id and pd.language_id='" . $languages_id . "' where p.products_id=w.product_id and w.customers_id = '" . $customer_id . "' and p.products_availability < 2 and w.wishlist_type = 'DVD_NORM' order by w.rank"); //BEN001
					while ($wl = tep_db_fetch_array($wl_query)) {      
					?>
					<tr align="center">
						<td width="100">
							<INPUT type="checkbox" id="del<?php echo $wl['wl_id']; ?>" name="del<?php echo $wl['wl_id']; ?>">
						</td>
						<td width="100">
							<INPUT type="text" size="3" id="rank<?php echo $wl['wl_id']; ?>" name="rank<?php echo $wl['wl_id']; ?>" size="2" value="<?php echo $wl['rank']; ?>">
						</td>
						<td width="300">
							<a class="basiclink" href="product_info.php?products_id=<?php echo $wl['product_id']; ?>">
							<b><font color="#000000"><?php echo $wl['products_name'];?></font></b>
							</a>
							<?php
							if ($wl['already_rented']>0){
								echo '<img src="' . DIR_WS_IMAGES . 'eye.gif" alt="You have alreay ordered this products the ' . substr($alreadyordered['date_purchased'],0, 10) . '">' ;
								}
							?>
						</td>
						<td width="236" class="TYPO_STD_BLACK">
						<?php
						if ($wl['products_next'] > 0 ){
							echo ' (' . TEXT_PRODUCTS_NEXT . $wl['day'] . ')';
						}else{
							echo '<img src="' . DIR_WS_IMAGES . 'avail' . $wl['products_availability'] . '.gif">';
							}
						?>
						</td>
					</tr><?
				}
          			?>
				</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
			<td colspan="4" background="<?php echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
			<td><img src="<?php echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
	</table>
<? } ?>
  
  <br>
  <div align="center">  
  	<input name="submit" type="image" src="<?echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/list_update.gif" align="middle" border="0">
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
				<a href="mydvdpost.php"><img src="<?echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/add_a_dvd_in_wl.gif" border="0"></a>
				<br>
			</td>
		</tr>
	</table>
	<?
}
?>
