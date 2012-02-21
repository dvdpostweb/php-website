<?php 
$navigation->set_snapshot();

    $to_sale_sql='SELECT quantity_to_sale,products_sale_price FROM products WHERE products_id='. $HTTP_GET_VARS['products_id'];
	switch ($languages_id){
		case 1:
			$lto_sale_sql.= ' and products_language_fr >0 ';
		break;
		case 2:
			$to_sale_sql.= ' and products_undertitle_nl >0 ';
		break;
		case 3:
		break;
		}
		
    $to_sale = tep_db_query($to_sale_sql);
    $to_sale_values = tep_db_fetch_array($to_sale);
	if ($to_sale_values['quantity_to_sale'] > 0 ) {?>
	<table align="center" width="100%">
	<tr>
		<td class="SLOGAN_RED" align="center"><b> 
			<?php 
			echo $to_sale_values['products_sale_price'].' €';
			?></b>
		</td>
	</tr>  
	<tr>
    	<form action="addtoshoppingcart_public.php" method="post">
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
	}else{
	?>
	<table align="center" width="100%">
	<tr>
		<td class="TYPO_STD_BLACK" align="center">
			<?php 			
				echo  TEXT_NO_DVD_REMAINS;
			?>
		</td>
	</tr>
	</table>		
	<?php 	
	}
	?>
	
