<style type="text/css">
<!--
.Std_pst {
	font-family: Arial, Helvetica, sans-serif;font-size: 12px;
	text-decoration: overline; font-weight:bold;
}
-->
</style>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40" align="left" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
</table>
<br>

<?php 
echo '<span class="SLOGAN_DETAIL">'.TEXT_EXPLAIN_DVDEXRENTAL8NEW . '</class><br>';

  //BEN001 $countsc_query = tep_db_query("select count(*) as cc from shopping_cart_new_adult where customers_id = '" . $customer_id . "' ");
  $countsc_query = tep_db_query("select count(*) as cc from shopping_cart_new sc where products_type = 'DVD_ADULT' and customers_id = '" . $customer_id . "' "); //BEN001
  $countsc = tep_db_fetch_array($countsc_query);
?>
<ul>
  <li class="SLOGAN_DETAIL"><?php  echo TEXT_SCCOUNTA .' <b>'. $countsc['cc'] .'</b> '. TEXT_SCCOUNTB; ?></li>
</ul>
<?php 
if ($countsc['cc']>0) {
?>
  <form name="form1" action="shoppingcartupdate_new_adult.php" method="post">
  		<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    	  <tr align="center">
      		<td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom2.gif" width="14" height="25"></td>
      		<td width="100" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_REMOVE; ?></B>
			</td>
      		<td  width="100"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_QUANTITY; ?></B>
	  		</td>
	  		<td width="300"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" class="border">
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_TITLE; ?></B>
			</td>
	  		<td width="100"background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom2.gif" >
				<B class="TYPO_STD_BLACK"><?php  echo TEXT_PRICE; ?></B>
			</td>
	  		<td width="14" ><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom2.gif" width="14" height="25"></td>
	 	  </tr>
     	  <tr>
      		<td  rowspan="3"  background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
      		<td colspan="4"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="10"></td>
      		<td  rowspan="3"background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			</td>
    	  </tr>
    	  <tr>
			<td colspan="4">
		 		<table width="736">
		 		<?php 
//BEN001      			$sc_query = tep_db_query("select * from shopping_cart_new_adult sc left join products_adult p on sc.products_id = p.products_id left join products_description_adult pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where sc.customers_id = '" . $customer_id . "' ");
      			$sc_query = tep_db_query("select * from shopping_cart_new sc left join products_description pd on pd.products_id = sc.products_id and pd.language_id='" . $languages_id . "' where products_type = 'DVD_ADULT' and sc.customers_id = '" . $customer_id . "' "); //BEN001
      			while ($sc = tep_db_fetch_array($sc_query)) {
	      		$dectotprice = $dectotprice + ($sc['quantity'] * $sc['price']);
      			?>
      				<tr align="center">
        				<td width="100">
          				<INPUT type="checkbox" id="del<?php  echo $sc['shopping_cart_id']; ?>" name="del<?php  echo $sc['shopping_cart_id']; ?>">
        				</td>
        				<td width="100">
          				<INPUT type="text" size="3" class="TYPO_STD_BLACK" id="quantity<?php  echo $sc['shopping_cart_id']; ?>" name="quantity<?php  echo $sc['shopping_cart_id']; ?>" size="2" value="<?php  echo $sc['quantity']; ?>">
        				</td>
        				<td width="300">
          					<a class="basiclink" href="product_info_adult.php?products_id=<?php  echo $sc['products_id']; ?>">
            				<b><font color="#000000"><?php  echo $sc['products_name'];?></font></b>
          					</a>
          				</td>
          				<td width="100" class="TYPO_STD_BLACK">
          					<?php  
          					//echo $sc['quantity'] * $sc['price']; 
          					echo $sc['price']; 
          					?>€          					
        				</td>
      				</tr>
      			<?php  
  				}
  				?>
		 		</table>
			</td>
		</tr>
		<tr>
			<td colspan="4">
			<?php  echo '<div align="right" class="Std_pst">'. TEXT_SUBTOTAL. ' ' . $dectotprice . '€<img src="'.DIR_WS_IMAGES.'blank.gif" width="49" height="3"></div>';?>
			</td>
		</tr>
		<tr>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
      		<td colspan="4" background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif">
				<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
      		<td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
		</tr>      
  </table>  
  
  <table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="middle" height="40">
	  <div align="right">
	    <a href='dvdforsale_listing_new_adult.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_show_shopping_list.gif" border="0" align="absbottom"></a>
	  	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="320" height="14">
	    <input name="submit" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_update_shopping_cart.gif" align="absbottom"  border="0">
	   	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="14">
	  	<a href='shopping_cart_checkout_new_adult.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_confirm_buy.gif" border="0" align="absbottom"></a>
	  </div>
	</td>
  </tr>
  </table>
  </form>

  <?php 
}
else {
	?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr >
			<td align="center" width="14">
				<br>
					<div align="center">
					    <a href='dvdforsale_listing_new_adult.php'><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_show_shopping_listx.gif" border="0" align="absbottom"></a>				  	
					</div>
				<br>
			</td>
		</tr>
	</table>
	<?php 
}
?>
