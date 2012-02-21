<?php 
$limit=12;
$x=intval($_GET['x']);
if(isset($x) && $x<0){
	$x=0;
}
//echo $listing_sql;
  //if ($listing_numrows = 0) {  
$cPrice=floatval($cPrice);
$cYear=intval($cYear);
$lim=intval($lim);
$cPath=intval($cPath);
	if ($cPath >0){
		include(DIR_WS_INCLUDES . 'functions/split_category.php');
		$split=$cPath;
		$category_name_sql='SELECT  categories_name FROM  categories_description WHERE language_id=' . $languages_id.' AND categories_id =  '. $cPath;
		$category_name_query = tep_db_query($category_name_sql);
		$category_name_values = tep_db_fetch_array($category_name_query);		
		$search_title=$category_name_values[categories_name];
		$query_count='SELECT count(p.products_id) as count FROM  products p ,  products_description pd,products_to_categories pc WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and  pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND pc.categories_id =  '. $cPath;
		$query_list ='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND pc.categories_id =  '. $cPath;
	
	
	
	}else{
		if ($cPrice >0){
			include(DIR_WS_INCLUDES . 'functions/split_price.php');
			$split=$cPrice;
			$search_title=$cPrice.'€ ';
			$query_count='SELECT count(DISTINCT p.products_id) as count FROM  products p ,  products_description pd,products_to_categories pc WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and  pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND p.products_sale_price =  '. $cPrice;
			$query_list ='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND p.products_sale_price =  '. $cPrice;
		}else{
			if ($lim >0){
				include(DIR_WS_INCLUDES . 'functions/split_shop_limited.php');
				$split=$lim;
				$search_title= TEXT_DVD_LIMITED;
			 	$query_count='SELECT count(DISTINCT p.products_id) as count FROM  products p ,  products_description pd,products_to_categories pc WHERE `quantity_to_sale`  > 0 and `quantity_to_sale`  <=5 AND p.products_id=pd.products_id and  pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id ';
				$query_list ='WHERE `quantity_to_sale`  > 0 and quantity_to_sale<=5  and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id ';
			}else {
				if ($cYear >0){
					include(DIR_WS_INCLUDES . 'functions/split_year.php');
					$split=$cYear;
					$search_title=$cYear;
					$query_count='SELECT count(DISTINCT p.products_id) as count FROM  products p ,  products_description pd,products_to_categories pc WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and  pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND p.products_year =  '. $cYear;
					$query_list ='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id AND p.products_year =  '. $cYear;
				}else{
					include(DIR_WS_INCLUDES . 'functions/split.php');
					//$split=$lim;
					$search_title= '';
				 	$query_count='SELECT count(DISTINCT p.products_id) as count FROM  products p ,  products_description pd,products_to_categories pc WHERE `quantity_to_sale`  > 0 AND p.products_id=pd.products_id and  pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id ';
					$query_list ='WHERE `quantity_to_sale`  > 0 and p.products_id=pd.products_id and p.products_directors_id=d.directors_id and pd.language_id=' . $languages_id.' AND p.products_id = pc.products_id ';			
				}
			}			
		}
	}
	
	
	$count_sql=$query_count;
	switch ($languages_id){
		case 1:
			$count_sql.= ' and p.products_language_fr >0 ';
		break;
		case 2:
			$count_sql.= ' and p.products_undertitle_nl >0 ';
		break;
		case 3:
		break;
	}
	$listing_sql.= ' and p.products_type = "DVD_NORM" and p.products_product_type= "Movie" ' ;	 //BEN001
	
	$count_query = tep_db_query($count_sql);
	$count_values = tep_db_fetch_array($count_query);
	$count=$count_values[count];
	$number_of_products = '0';
	$listing_sql='SELECT  p.products_id , pd. products_name , p.products_runtime , p.products_rating , p.products_language_fr ,d.directors_name, p.products_undertitle_nl, pd.products_image_big ,p.products_sale_price ';
	$listing_sql.=' FROM  products p ,  products_description pd, directors d, products_to_categories pc ';
	$listing_sql.=$query_list;
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
	$listing_sql.= ' and p.products_type = "DVD_NORM" ' ; //BEN001
	if ($x!=0){
		$listing_sql.=' GROUP BY p.products_id  ORDER BY p.products_date_available DESC limit '.$x.','.$limit ;}
	else{
		$x=0;
		$listing_sql.=' GROUP BY p.products_id ORDER BY p.products_date_available DESC limit '.$x.','.$limit ;}
	$listing = tep_db_query($listing_sql);
	$i=1;
?>
<br>
<table width="764" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left.gif" width="11" height="20"></td>
    <?php 
    	if ($search_title==''){
	    	$match=TEXT_MATCHING;	
	    }else{$match=TEXT_MATCHING_SEARCH;}
    ?>
    <td width="300" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid.gif" class="dvdpost_left_menu_title" align="left"><b><?php  echo $count.'</b> '.$match.' <b>'.$search_title.'</b>' ?></td>
    <td width="11"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right.gif" width="11" height="20"></td>
    <td width="431">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid.gif">&nbsp;</td>
    <td colspan="3">
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td>
				<br>
					<?php 							
					echo '<table width="666" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr>';
					while ($product_info_values = tep_db_fetch_array($listing)) {
						?>
						<td align="center">
						<form name="form1" method="post" action="addtoshoppingcart.php">							
							<table width="213" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td  height="30" valign="middle" class="SLOGAN_BLACK" align="center" colspan="2" width="213"><b><?php  echo $product_info_values['products_name'] ;?></b></td>
								</tr>
								<tr>
									<td>
										<TABLE width="102" border="0" cellpadding="0" cellspacing="0"  align="center">										
											<TR>
												<TD width="87" height="7"><IMG src="<?php  echo DIR_WS_IMAGES ;?>shop/jaquette/haut.gif" width="87" height="7"></TD>
												<TD rowspan="3"><IMG src="<?php  echo DIR_WS_IMAGES ;?>shop/jaquette/droite.gif" width="15"></TD>
											</TR>
										    <TR>
												<TD WIDTH="87" HEIGHT="130" valign="top"><a href="product_info_shop.php?products_id=<?php  echo $product_info_values['products_id'];?>"><img src="<?php echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" WIDTH="87" HEIGHT="130" ALT="<?php  echo $product_info_values['products_name'] ;?>"></a></TD>
											</TR>
											<TR>
												<TD width="87" height="5"><IMG src="<?php  echo DIR_WS_IMAGES ;?>shop/jaquette/bas.gif" width="87" height="5" ></TD>
					  						</TR>
					  					</table>
					  				</td>
					  			</tr>
								<tr>
									<td height="20" class="SLOGAN_BLACK" align="center"> <?php echo TEXT_LANG;?> :
										<?php  
										if ($product_info_values['products_language_fr']>0){
										echo '<img src="' . DIR_WS_IMAGES. 'shop/jaquette/dvd_circle_FR.gif" align="absmiddle">';
										}
										if ($product_info_values['products_undertitle_nl']>0){
										echo '<img src="' . DIR_WS_IMAGES. 'shop/jaquette/dvd_circle_NL.gif" align="absmiddle">';
										}
										?>
									</td>
								</tr>
								<tr>
									<td align="center"><a href="product_info_shop.php?products_id=<?php  echo $product_info_values['products_id'];?>" class="basiclink"><u><?php  echo TEXT_MORE_INFO ;?></u></a></td>
								</tr>
								<tr>
									<td height="22" valign="middle" class="SLOGAN_BLACK" align="center"><b><font color="#CC0000"><?php  echo $product_info_values['products_sale_price'] ;?>&euro;</font></b></td>
								</tr>
								<tr>
									<td align="center">
									  <input name="products_id" type="hidden" value="<?php  echo $product_info_values['products_id'] ;?>">
									  <input name="imageField" align="center" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy.gif" border="0">
									</td>
								</tr>
							</table>
						</form><br>
						</td>
						<?php  if ($i % 3 ==0){echo '</tr><tr>'; }
						$i++; ?>
				  <?php  }
					//SI PAS ASSEZ DE TITRES SUR LA PAGE<br>ESPACE PROMO SUR 2 COLONNES
					if ($i % 3 ==2){echo '<td width="426"colspan="2" align="center">&nbsp;</td>';}
					
					//SI PAS ASSEZ DE TITRES SUR LA PAGE<br>ESPACE PROMO SUR 1 COLONNE
					if ($i % 3 ==0){echo '<td width="213" align="center">&nbsp;</td>';}
				  ?>
					 
					</tr>			
					</table>
				</td>
		  </tr>
		  <tr>
			<td  align="right" class="SLOGAN_orange">
			<?php 			
			split_pages($x,$limit,$count, $split);
			?>
			</td>
		  </tr>
		</table>
    </td>
    <td background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right.gif" width="11" height="10"></td>
  </tr>
</table>