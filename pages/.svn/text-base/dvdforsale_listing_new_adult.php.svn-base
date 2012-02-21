<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  valign="middle" height="40"width="50%" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
    <td  valign="middle" align="right"><?php  echo '<a class="red_slogan" href="dvdforsale_info_adult.php"><u>' . HEADING_HELP . '</u></a>'; ?></td>
  </tr>
    <tr>
    <td  height="6" colspan="2" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
  <tr>
	<td colspan="2">
<?php 
$limit=14;
//echo $listing_sql;
  //if ($listing_numrows = 0) {
//BEN001	$count_sql='SELECT count(p.products_id) as count FROM  products_adult p ,  products_description_adult pd WHERE `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and  pd.language_id=' . $languages_id ;
	$count_sql='SELECT count(p.products_id) as count FROM  products p ,  products_description pd WHERE products_type = "DVD_ADULT" and `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and  pd.language_id=' . $languages_id ; //BEN001
	$count_query = tep_db_query($count_sql);
	$count_values = tep_db_fetch_array($count_query);
	$count=$count_values[count];
	
	$number_of_products = '0';
	$listing_sql='SELECT p.products_id , pd. products_name , p.products_runtime , p.products_year , p.products_rating , pd.products_image_big ,p.products_new_sale_price ';
//BEN001	$listing_sql.=' FROM  products_adult p ,  products_description_adult pd ';
	$listing_sql.=' FROM  products p ,  products_description pd '; //BEN001
	$listing_sql.='WHERE `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and pd.language_id=' . $languages_id ;
	$listing-sql.=' and products_type = "DVD_ADULT" ';
	if ($x!=0){
		$listing_sql.=' ORDER BY `products_id` DESC limit '.$x.','.$limit ;}
	else{
		$x=0;
		$listing_sql.=' ORDER BY `products_id` DESC limit '.$x.','.$limit ;}
		
    $listing = tep_db_query($listing_sql);
	$i=1;
	echo '<table width="640" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr>';
    while ($product_info_values = tep_db_fetch_array($listing)) {
		?>
 		<td>			
		<form name="form1" method="post" action="addtoshoppingcart_new_adult.php">
		  <table border="0" align="center" width="300" height="150"cellspacing="0" cellpadding="0" background="<?php  echo DIR_WS_IMAGES;?>shop/shopping_bckg.gif">
		    <tr>
		      <td width="122" rowspan="7" align="center"><div align="center"><a href="product_info_adult.php?products_id=<?php  echo $product_info_values['products_id'];?>"><img src="<?php echo $constants['DIR_WS_IMAGESX'].'/'.$product_info_values['products_image_big'] ;?>" border="0" width="80" height="120"></a></div></td>
		      <td width="178"></td>
		    </tr>
		    <tr>
		      <td height="30" class="SLOGAN_BLACK"><b><?php  echo $product_info_values['products_name'] ;?></b> </td>
		    </tr>
		    <tr>
		      <td ><a href="product_info_adult.php?products_id=<?php  echo $product_info_values['products_id'];?>" class="basiclink"><u><?php  echo TEXT_MORE_INFO ;?></u></a></td>
		    </tr>
		    <tr>
		      <td height="10"><img src="<?php  echo  DIR_WS_IMAGES ;?>blank.gif" width="10" height="10"></td>
		    </tr>
		    <tr>
		      <td class="SLOGAN_BLACK"><?php  echo TEXT_PRICE ;?> <b><font color="#CC0000"><?php  echo $product_info_values['products_new_sale_price'] ;?>&euro;</font></b></td>
		    </tr>
		    <tr>
		      <td>
			  <input name="products_id" type="hidden" value="<?php  echo $product_info_values['products_id'] ;?>">
			  <img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="30" height="3">
			  <input name="imageField" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_add_to_shopping_cart.gif" border="0">
		    </tr>
		  </table>
		</form><br>
		</td>
		<?php  if ($i % 2 ==0){echo '</tr><tr>'; }
		$i++; ?>
  <?php  }?>
	</tr>
	</table>
	</td>
	</tr>
	<tr>
		<td  colspan="2"align="right" class="SLOGAN_orange">
		<?php 
		include(DIR_WS_INCLUDES . 'functions\split.php');
		split_pages($x,$limit,$count);
		?>
		</td>
	</tr>
</table>
  
  