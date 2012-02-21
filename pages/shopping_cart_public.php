<style type="text/css">
<!--
.Std_pst {
	font-family: Arial, Helvetica, sans-serif;font-size: 12px;
	text-decoration: overline; font-weight:bold;
}
td {
  font-size:12px !important;
}

-->
</style>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr><td>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top" height="25" align="left" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>    
  </tr>
</table>
<br>

<?php 
  if (!tep_session_is_registered('customer_id')) {
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdshop_public/shopping_cart.php'));		
		if($_GET['debug']==1)
		{
			echo 'not logsession';
			var_dump($_SESSION);
			echo 'cookie';
			var_dump($_COOKIE);
			
		}
  }else{
		if($_GET['debug']==1)
		{
			echo 'log'.$customer_id;
		}
	
  //BEN001 $countsc_query = tep_db_query("select count(*) as cc from shopping_cart where customers_id = '" . $customer_id . "' ");
  //verif pack DVD
  //$count_box_query = tep_db_query("select sum(sb.nbr_items) as ccbox from shopping_box sb LEFT JOIN shopping_cart sc on sb.shopping_box_id=sc.shopping_box_id WHERE sc.shopping_box_id> 0 AND sc.customers_id = '" . $customer_id . "'  "); //JER001
  $count_box_query = tep_db_query("select count(*) as ccbox from shopping_cart WHERE shopping_box_id > 0 AND customers_id = '" . $customer_id . "'  "); //JER001
  $count_box = tep_db_fetch_array($count_box_query);
  
  $sql="
  select count(*) as cc 
  from shopping_cart sc 
  left join products p on (sc.products_id = p.products_id) 
  where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') or ( p.products_type='BUY')) and customers_id = " . $customer_id ;
  $countsc_query = tep_db_query($sql); //BEN001
  $countsc = tep_db_fetch_array($countsc_query);
  $total_count=$count_box['ccbox']+$countsc['cc'];
	$sql='select * from customers where customers_id ='.$customer_id;
	$customers_query = tep_db_query($sql); //BEN001
  $customers_value = tep_db_fetch_array($customers_query);
  $customers_registration_step=$customers_value['customers_registration_step'];
	$_SESSION['customers_registration_step']=$customers_registration_step;
  }
  
?> 

  <li class="SLOGAN_DETAIL"><?php  echo TEXT_SCCOUNTA .' <b>'. $total_count .'</b> '. TEXT_SCCOUNTB; ?></li><br>

<?php
if ($total_count >0) {
?>
  <form name="form1" action="shoppingcartupdate_public.php" method="post">
  		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    	  <tr align="center">
      		<td width="1%"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      		<td width="13%" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_REMOVE; ?></B>
			</td>
      		<td  width="13%"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_QUANTITY; ?></B>
	  		</td>
	  		<td width="59%"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_TITLE; ?></B>
			</td>
	  		<td width="13%"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" >
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_PRICE; ?></B>
			</td>
	  		<td width="1%" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="3"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
      		<td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="10"></td>
      		<td  rowspan="3"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
    	  </tr>
    	  <tr>
			<td colspan="4">
		 		<table width="100%" align="right">
		 		<?php 
		 			if (!tep_session_is_registered('customer_id') ||$customers_registration_step<10 ){
			 			$dectotprice=0;
						$nbrtotdvd =0;
						//shopping bag products_id
			 			$cart = $_SESSION['cart'];
						if($_GET['debug']==1)
						{
							var_dump($cart);
						}
			 			if ($cart) {
							$items = explode(',',$cart);
							$contents = array();
							foreach ($items as $item) {
								$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
							}
							
							foreach ($contents as $id=>$qty) {
							    $sql="select p.products_sale_price, pd.products_name,products_type from products p left join products_description pd on pd.products_id = p.products_id and pd.language_id='" . $languages_id . "' where p.products_id =".$id;
								$sc_query = tep_db_query($sql);
								$sc = tep_db_fetch_array($sc_query);
									echo '<tr align="center">';
									echo '<td width="70">';
									echo '<INPUT type="checkbox" id="del'.$id.'" name="del'.$id.'">';
									echo '</td><td width="46">';
									echo '<INPUT type="text" size="3" class="TYPO_STD_BLACK" id="quantity'.$id.'" name="quantity'.$id.'" size="2" value="'.$qty.'">';
							    echo '</td><td width="300"><a class="basiclink" href="product_info_shop.php?products_id='.$id.'">';
									echo '<b><font color="#000000">'.$sc['products_name'].'</font></b>';
							    echo '</a>';
		          		echo '</td><td width="100" class="TYPO_STD_BLACK">';
		          		echo $sc['products_sale_price']; 
		          		echo '</td></tr>';
		          		$dectotprice += $sc['products_sale_price']*$qty;
		          		$dvdprice=$dectotprice ;
		          		$nbrtotdvd +=$qty;
							}
								
						}
						//Shopping bag box_id
						$cart_box = $_SESSION['cart_box'];
			 			if ($cart_box) {
							$items = explode(',',$cart_box);
							$contents = array();
										foreach ($items as $item) {
								$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
							}
							foreach ($contents as $id=>$qty) {
								$sql="select sb.shopping_box_id,sb.sale_price,sb.nbr_items, sbd.shopping_box_name from shopping_box sb left join shopping_box_description sbd on sbd.shopping_box_id = sb.shopping_box_id and sbd.language_id='" . $languages_id . "' where sb.shopping_box_id ='".$id."'";
								$sc_query = tep_db_query();
								$sc = tep_db_fetch_array($sc_query);
									echo '<tr align="center">';
									echo '<td width="70">';
									echo '<INPUT type="checkbox" id="del'.$id.'" name="del'.$id.'">';
									echo '</td><td width="46">';
									echo '<INPUT type="text" size="3" class="TYPO_STD_BLACK" id="quantity'.$id.'" name="quantity'.$id.'" size="2" value="'.$qty.'">';
									echo '</td><td width="300" class="typo_std_black">';
									echo 'box :<b><font color="#000000">'.$sc['shopping_box_name'].'</font></b>';
		          		echo '</td><td width="100" class="TYPO_STD_BLACK">';
		          		echo $sc['sale_price']; 
		          		echo '</td></tr>';
		          		$dectotprice += $sc['sale_price']*$qty;
		          		$dvdprice=$dectotprice ;
		          		$nbrtotdvd +=$qty*$sc['nbr_items'];
							}
								
						}
  					}else{	
		 				$dectotprice='0';
						$sql= "select * from shopping_cart sc left join products p on sc.products_id = p.products_id left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie') or ( p.products_type='BUY')) and sc.customers_id = '" . $customer_id . "' and sc.products_id > 0";
						$sc_query = tep_db_query($sql); //BEN001
						
		      			while ($sc = tep_db_fetch_array($sc_query)) {
			      		$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);
		      			?>
		      				<tr align="center">
		        				<td width="13%">
		          				<INPUT type="checkbox" id="del<?php  echo $sc['shopping_cart_id']; ?>" name="del<?php  echo $sc['shopping_cart_id']; ?>">
		        				</td>
		        				<td width="13%">
		          				<INPUT type="text" size="3" class="TYPO_STD_BLACK" id="quantity<?php  echo $sc['shopping_cart_id']; ?>" name="quantity<?php  echo $sc['shopping_cart_id']; ?>" size="2" value="<?php  echo $sc['quantity']; ?>">
		        				</td>
		        				<td width="59%">
		        				    <?php if (strtoupper($sc['products_type']) != 'BUY') {?>
		          					<a class="basiclink" href="product_info_shop.php?products_id=<?php  echo $sc['products_id']; ?>">
		            				<b><font color="#000000"><?php  echo $sc['products_name'];?></font></b>
		          					</a>
		          					<?php }else{?>
		            				<span style='font-family:Arial;font-size:11px;'><b><font color="#000000"><?php  echo $sc['products_name'];?></font></b></span>
		          					<?}?>
		          				</td>
		          				<td width="13%" class="TYPO_STD_BLACK">
		          					<?php  
		          					echo $sc['price']; 
		          					?>€          					
		        				</td>
		      				</tr>
		      			<?php  
		  				}
      			     $sql="select * from shopping_cart sc left join shopping_box sb on sc.shopping_box_id = sb.shopping_box_id left join shopping_box_description sbd on sbd.shopping_box_id = sc.shopping_box_id and sbd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' and sb.shopping_box_id>0 ";
		      			$sc_query = tep_db_query($sql);
						//$sc_query = tep_db_query("select * from shopping_cart sc left join shopping_box sb on sc.shopping_box_id = sb.shopping_box_id left join shopping_box_description sbd on sbd.shopping_box_id = sc.shopping_box_id and sbd.language_id='" . $languages_id . "' left join products p on (sc.products_id = p.products_id) where p.products_type = 'DVD_NORM' and sc.customers_id = '" . $customer_id . "' and sb.shopping_box_id>0 "); //BEN001
		      			while ($sc = tep_db_fetch_array($sc_query)) {
			      		$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);
		      			?>
		      				<tr align="center">
		        				<td width="13%">
		          				<INPUT type="checkbox" id="del<?php  echo $sc['shopping_cart_id']; ?>" name="del<?php  echo $sc['shopping_cart_id']; ?>">
		        				</td>
		        				<td width="13%">
		          				<INPUT type="text" size="3" class="TYPO_STD_BLACK" id="quantity<?php  echo $sc['shopping_cart_id']; ?>" name="quantity<?php  echo $sc['shopping_cart_id']; ?>" size="2" value="<?php  echo $sc['quantity']; ?>">
		        				</td>
		        				<td width="59%" class="TYPO_STD_BLACK">
		          					<b><font color="#000000"><?php  echo $sc['shopping_box_name'];?></font></b>
		          				</td>
		          				<td width="13%" class="TYPO_STD_BLACK">
		          					<?php  
		          					echo $sc['price']; 
		          					$total_prices=+$sc['price'];
		          					?>€          					
		        				</td>
		      				</tr>
		      			<?php  
		  				}
	  				}
	  				?>
		 		</table>
			</td>
		</tr>
		<tr>
			<td colspan="4">
			<?php  echo '<div align="right" class="Std_pst">'. TEXT_SUBTOTAL. ' ' . $dectotprice . '€</div>';?>
			</td>
		</tr>
		<tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3"></td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
  </table>  
  
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40">
	  <div align="right">
	    <input name="submit" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_update_shopping_cart.gif" align="absbottom"  border="0">	   	
	  </div>
	</td>
  </tr>  
  </table>
  </form>
  
  <?php 
  //count for delivery price
  if (tep_session_is_registered('customer_id')) {
	//BEN001 $countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart where customers_id = '" . $customer_id . "' and products_id > 0");
	$countdvd_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'DVD_NORM' and p.products_product_type= 'Movie')) and customers_id = '" . $customer_id . "' and p.products_id > 0"); //BEN001
	$countdvd = tep_db_fetch_array($countdvd_query);
	$nbrtotdvd= $countdvd['nbrdvd'];
	$countbuy_query = tep_db_query("select sum(quantity) as nbrdvd from shopping_cart sc left join products p on (sc.products_id = p.products_id) where ((p.products_type = 'BUY')) and customers_id = '" . $customer_id . "' and p.products_id > 0"); //BEN001
	$countdvd = tep_db_fetch_array($countbuy_query);
	$nbrtotbuy= $countdvd['nbrdvd'];
	$boxsale_query = tep_db_query("select * from shopping_cart where customers_id = '" . $customer_id . "' and shopping_box_id > 0");
	//$boxsale_query = tep_db_query("select * from shopping_cart sc left join products p on (sc.products_id = p.products_id) where p.products_type = 'DVD_NORM' and customers_id = '" . $customer_id . "' and shopping_box_id > 0"); //BEN001
   	$dvdprice=$dectotprice;
	while ($boxsale = tep_db_fetch_array($boxsale_query)) {
		$countbox_query = tep_db_query("select sum(nbr_items) as nbrdvd from shopping_box where shopping_box_id = '" . $boxsale['shopping_box_id'] . "'");
		$countbox = tep_db_fetch_array($countbox_query);				
	   	$nbrtotdvd =  $nbrtotdvd + $countbox['nbrdvd'] * $boxsale['quantity'];
   	}
  }  
  
  //default Belgian Post.
  $country_val=21;
   
  if (tep_session_is_registered('customer_id')) {	
  $country_query = tep_db_query("select entry_country_id,shopping_discount from customers c left join discount_code d on c.activation_discount_code_id = d.discount_code_id left join address_book ab on c.customers_id = ab.customers_id   where c.customers_default_address_id = ab.address_book_id  and c.customers_id = '" . $customer_id . "' ");
  $country = tep_db_fetch_array($country_query);
  $country_val=$country['entry_country_id'];
  }else{
   switch(SITE_ID){
	   case 101:
		   $country_val=150;
		   break;
	   case 10:
	   		$country_val=124;
		   break;
		default:
			$country_val=21;
		   
  	}
  }
  $shipping=shipping($country_val,$nbrtotdvd);
	$dectotprice=$dectotprice+$shipping;
	$ship_price=$shipping+($nbrtotbuy*6.2);
  ?>
  
  <form name="form2" action="shopping_cart_checkout_public.php" method="post">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td width="48%" valign="top">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td  width="100%" class="SLOGAN_GRIS_13px" valign="top" height="30"><?php  echo TEXT_HEADING_FAQ ; ?></td>
		</tr>
		<?php  
		  if ($w_faq==1){
			echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_SHOPPING_FAQ_Q1.'</b></u></td></tr>';
			echo '<tr><td>'. TEXT_SHOPPING_FAQ_R1 .'</td></tr>';
		  }
		  else {
		  echo '<tr><td  valign="middle" height="30" align="left"><a href="shopping_cart_public.php?w_faq=1" class="dvdpost_left_menu_link1_shop"><u>'.TEXT_SHOPPING_FAQ_Q1.'</u></a></td></tr>';
		  } 
		  if ($w_faq==2){
			echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_SHOPPING_FAQ_Q2.'</b></u></td></tr>';
			echo '<tr><td>'. TEXT_SHOPPING_FAQ_R2 .'</td></tr>';
		  }
		  else {
		  echo '<tr><td  valign="middle" height="30" align="left"><a href="shopping_cart_public.php?w_faq=2" class="dvdpost_left_menu_link1_shop"><u>'.TEXT_SHOPPING_FAQ_Q2.'</u></a></td></tr>';
		  }
		  if ($w_faq==3){
			echo '<tr><td  valign="middle" height="30" align="left" class="TYPO_STD_GREY"><u><b>'.TEXT_SHOPPING_FAQ_Q3.'</b></td></tr>';
			echo '<tr><td>'. TEXT_SHOPPING_FAQ_R3 .'</td></tr>';
		  }
		  else {
		  echo '<tr><td  valign="middle" height="30" align="left"><a href="shopping_cart_public.php?w_faq=3" class="dvdpost_left_menu_link1_shop"><u>'.TEXT_SHOPPING_FAQ_Q3.'</u></a></td></tr>';
		  }
		  ?>
		  </table>
	</td>
	<td width="4%">
		<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="60" height="3">
	</td>
	<td width="48%" valign="top">
		<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
    	  <tr align="center">
      		<td width="1%"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      		<td width="220" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_ENTER_PROMO_CODE; ?></b>
			</td>
      		<td width="1%" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="10"></td>
      		<td  rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
    	  </tr>
		  <tr>
			<td>			
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <tr>
			    <td  valign="middle" height="40" align="center">
				  <input type="text" name="promo_code" class="step_input" value="<?= ((!empty($country['shopping_discount']))? $country['shopping_discount'] : '')?>" />
				</td>
			  </tr>  
			  </table>			
			</td>
		  </tr>
		  <tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3"></td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		  </tr>      
          <tr>
            <td colspan="3" height="25">&nbsp;</td>
          </tr>
    	  <tr align="center">
      		<td width="1%"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      		<td width="220" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_CHOOSE_SHIPPING_METHOD; ?></b>
			</td>
      		<td width="1%" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="2"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="10"></td>
      		<td  rowspan="2" background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3">
			</td>
    	  </tr>
		  <tr>
			<td>			
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td  valign="middle" align="left" height="40" class="TYPO_STD_BLACK">
				  		<input type="radio" name="shipping_method" value="post" checked> <?php  echo TEXT_POST . ' <b>' . $ship_price . ' €</b>'; ?>
				  		
				  		<!--
						<br>   		
						<input type="radio" name="shipping_method" value="kiala"> <?php  echo TEXT_KIALA . '<b> 1,5 €</b> (' . TEXT_ONLY_BELGIUM . ')'; ?>			  
						-->
						
				</td>
			  </tr>  
			  </table>			
			</td>
		  </tr>
		  <tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1%" height="3"></td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		  </tr>
		  <tr>
            <td colspan="3" height="43" align="right">
            	<input name="submit" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_confirm_buy.gif" align="absbottom"  border="0">	   	
            </td>
          </tr>    
		</table>
	</td>
  </tr>
  </table>
  </form>  


  <?php 
}
else {
	?>
	<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td align="left" width="50%">
				<br>
					<a href='dvdforsale_listing.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_show_shopping_list.gif" border="0" align="absbottom"></a>				  	
				<br>
			</td>
			<td align="right" width="50%">
				<br>
					<a href='dvdforsale_info.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/how_to_buy_dvd.gif" border="0" align="absbottom"></a>				  	
				<br>
			</td>
		</tr>
	</table>
	<?php 
}
?>
</td></tr></table>