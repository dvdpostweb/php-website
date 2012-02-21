<?php 
$navigation->set_snapshot();
    $to_sale_sql='SELECT quantity_new_to_sale,products_new_sale_price FROM  products WHERE products_id='. $HTTP_GET_VARS['products_id'] .' ';
    $to_sale = tep_db_query($to_sale_sql);
    $to_sale_values = tep_db_fetch_array($to_sale);
	if (tep_session_is_registered('customer_id') && $to_sale_values['quantity_new_to_sale'] >0 ) {?>
	<table align="center" width="100%">
	<tr>
		<td class="SLOGAN_RED" align="center"><b> 
			<?php 
			echo $to_sale_values['products_new_sale_price'].' €';
			?></b>
		</td>
	</tr>  
	<tr>
    	<form action="addtoshoppingcart_new_adult.php" method="post">
		<td  align="center" valign="middle" class="TYPO_STD_BLACK_bold">
      		<?php  echo '<input type="hidden" name="products_id" value="' . $product_info_values['products_id'] . '"><input type="hidden" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '" name="nexturl">'; ?>
			<input name="imageField" align="center" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy.gif" border="0">
		</td>
		</form>
  	  </tr>
	  <tr>
		<td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
	  </tr>
	  </table> 
	<?php    
	}
	?>
