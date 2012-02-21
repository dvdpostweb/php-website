<?php 
	$listing_sql='SELECT p.products_id , pd. products_name , p.products_runtime , p.products_year , p.products_rating , p.products_language_fr ,d.directors_name, p.products_undertitle_nl, pd.products_image_big ,p.products_sale_price ';
	$listing_sql.=' FROM  products p ,  products_description pd, directors d ';
	$listing_sql.='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id ;
	switch ($languages_id){
		case 1:
			$listing_sql.= ' and p.products_language_fr >0 ';
		break;
		case 2:
			$listing_sql.= ' and p.products_undertitle_nl >0 ';
		break;
		case 3:
		break;
		}
	$listing_sql.= ' and p.products_type = "DVD_NORM" ';	//BEN001
	$listing_sql.=' ORDER BY RAND() LIMIT 1 ';
    $listing = tep_db_query($listing_sql);
	$product_info_values = tep_db_fetch_array($listing)
?>
<table width="122" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title2.gif" class="SLOGAN_MENU"><b><?php  echo TEXT_BUY_DVD;?></b> </td>
  </tr>
  <tr>
    <td align="center" height="120"><a href="product_info_shop.php?products_id=<?php  echo $product_info_values['products_id'];?>"><img src="'.$constants['DIR_DVD_WS_IMAGES'].'/<?php  echo $product_info_values['products_image_big'] ;?>" border="0" width="67" height="100" alt="<?php  echo $product_info_values['products_name'] ;?>"></a></td>
  </tr>
  <tr>
    <td align="center" class="slogan_red" height="20"><b><?php  echo $product_info_values['products_sale_price'] ;?>€</b></td>
  </tr>  
  <tr>
	<form name="form1" method="post" action="addtoshoppingcart.php">
    <td align="center" height="20">
		<input name="products_id" type="hidden" value="<?php  echo $product_info_values['products_id'] ;?>">
		<input name="imageField" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_add_to_shopping_cart2.gif" border="0">
	</td>
	</form>
	</tr>
  <tr>
    <td align="center" height="20"><u><a href="mydvdshop.php" target="_self" class="red_basiclink"><?php  echo TEXT_SEE_ALL_DVD_TO_BUY ;?></a></u></td>
  </tr>
</table>