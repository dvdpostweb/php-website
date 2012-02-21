<?php 
//RALPH-005 $cpt_gay_movies = tep_db_query("select COUNT(o.orders_id) as cpt from products_to_categories_adult pc, orders o LEFT JOIN orders_products op ON o.orders_id=op.orders_id where pc.categories_id=14 AND o.customers_id=". $customer_id ." AND pc.products_id=op.products_id ");
$cpt_gay_movies = tep_db_query("select COUNT(o.orders_id) as cpt from products_to_categories pc, orders o LEFT JOIN orders_products op ON o.orders_id=op.orders_id where pc.categories_id=14 AND o.customers_id=". $customer_id ." AND pc.products_id=op.products_id ");
$cpt_gay_movies_values = tep_db_fetch_array($cpt_gay_movies);
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
</table> 
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0"> 
    
	<?php  
	if ($cPath){
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_adult/category_adult.php'));
	}else{
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_adult/theme_adult.php'));
	}
    ?>
    <tr>
		<td>
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_adult/menu_subdirectory_adult.php'));?>
		</td>
	</tr>          
    <tr>
        <td>
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_adult/product_listing_adult.php'));?>
		</td>
    </tr>
</table>