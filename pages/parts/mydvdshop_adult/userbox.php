<table width="267" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome//w_top.gif" width="267" height="12"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif" class="TYPO_STD2_GREY" style="padding-left:15px;"><?php  echo TEXT_INTRO ;?></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif">&nbsp;</td>
  </tr>
  <tr>
	<?php  
	$shopping_sql='SELECT customers_id , sum(`quantity`) AS QUANTITY, sum(`price`) AS PRICE ';
	//BEN001 $shopping_sql.='FROM `shopping_cart_new_adult` ';
	$shopping_sql.='FROM shopping_cart_new sc '; //BEN001
	//BEN001 $shopping_sql.='WHERE customers_id = '. $customer_id .' group by customers_id';
	$shopping_sql.='WHERE customers_id = '. $customer_id .' and products_type = "DVD_ADULT" group by customers_id'; //BEN001
	$shopping = tep_db_query($shopping_sql);
	if ($shopping_values = tep_db_fetch_array($shopping)){
		$quantity=$shopping_values[QUANTITY];
		$price=$shopping_values[PRICE];}
	else{
		$quantity=0;
		$price=0;}
	$inthebag = str_replace('µµµcountµµµ', $quantity , TEXT_DVD_IN_THE_BAG);
	$total = str_replace('µµµpriceµµµ', $price , TEXT_DVD_TOTAL_PRICE);
	
	?>	
    <td height="25" align="left" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif" class="SLOGAN_DETAIL" style="padding-left:15px;">
		<img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/caddie_x.gif" width="25" height="25" align="absmiddle">
		<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8" align="baseline">
		<?php  echo $inthebag ;?> (<a class="red_slogan" href="shopping_cart_new_adult.php"><?php  echo TEXT_SEE ;?></a>) 
	</td>
  </tr>
  <tr>
    <td height="15" align="left" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif" style="padding-left:43px;"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/grey.gif" width="180" height="1"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif" class="SLOGAN_DETAIL" style="padding-left:43px;">
		<b><?php  echo $total;?></b>
	</td>
  </tr>
  <tr>
    <td height="30" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif"  style="padding-left:43px;">
		<a href="shopping_cart_checkout_new_adult.php" class="red_slogan"><?php  echo TEXT_CONFIRM_ORDER ;?></a>
	</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_white_bckg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#666666"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_light_grey_bckg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_light_grey_bckg.gif" class="SLOGAN_DETAIL" style="padding-left:43px;"><b><?php  echo TEXT_INTRO2 ;?></b></td>
  </tr>
  <tr>
	<?php  
	$status1_sql="SELECT sum( quantity )as QUANTITY FROM  `shopping_orders` WHERE  `customers_id`  = ". $customer_id ." AND  `status`  = 1 AND products_type='DVD_ADULT' ";
	$status1 = tep_db_query($status1_sql);
	$status1_values = tep_db_fetch_array($status1);
	if ($status1_values[QUANTITY]==''){	$status1_quantity=0;}
	else{$status1_quantity=$status1_values[QUANTITY];}	
	$text_status1 = str_replace('µµµcountµµµ', $status1_quantity , TEXT_STATUS1);
	?>
    <td height="30" align="left" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_light_grey_bckg.gif" class="SLOGAN_DETAIL" style="padding-left:15px;">
		<img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/ship.gif" width="25" height="25" align="absmiddle">
		<span class="SLOGAN_DETAIL">
			<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8" align="baseline">
			<?php  echo $text_status1;?>
		</span> 
		(<a class="red_slogan" href="mydvdbought_adult.php"><?php  echo TEXT_SEE;?></a>)
	</td>
  </tr>
  <tr>
	<?php  
	$status2_sql="SELECT sum( quantity )as QUANTITY FROM  `shopping_orders` WHERE  `customers_id`  = ". $customer_id ." AND  `status`  = 2 AND products_type='DVD_ADULT' ";
	$status2 = tep_db_query($status2_sql);
	$status2_values = tep_db_fetch_array($status2);
	if ($status2_values[QUANTITY]==''){	$status2_quantity=0;}
	else{$status2_quantity=$status2_values[QUANTITY];}	
	$text_status2 = str_replace('µµµcountµµµ', $status2_quantity , TEXT_STATUS2);
	?>
    <td height="30" align="left" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_light_grey_bckg.gif" class="SLOGAN_DETAIL" style="padding-left:15px;">
		<img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/shiped.gif" width="25" height="25" align="absmiddle">
		<span class="SLOGAN_DETAIL">
			<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8" align="baseline">
			<?php  echo $text_status2;?>
		</span> 
		(<a class="red_slogan" href="mydvdbought_adult.php"><?php  echo TEXT_SEE;?></a>)
	</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_light_grey_bckg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#666666"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_grey_bckg.gif" align="center" valign="middle" height="50">
		<a href="dvdforsale_info.php" class="red_slogan"><?php  echo TEXT_HOW_TO_BUY ?></a>
	</td>
  </tr>
  <tr>
    <td ><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/welcome/w_bottom.gif"></td>
  </tr>
</table>