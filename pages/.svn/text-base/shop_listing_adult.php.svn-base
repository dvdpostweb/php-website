<?php  

$studio_id=intval($studio_id);
if($studio_id==0)
	$studio_id=149;
$studio_name_sql='SELECT studio_name FROM studio WHERE studio_id  ='. $studio_id;
$studio_name_query = tep_db_query($studio_name_sql);
$studio_name_values = tep_db_fetch_array($studio_name_query);
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
$limit=12;
//echo $listing_sql;
  //if ($listing_numrows = 0) {  
	
	
//BEN001	$count_sql='SELECT count(DISTINCT p.products_id )  AS count FROM products_description_adult pd, products_adult p, manufacturers m WHERE m.manufacturers_id ='. $manufacturers_id.'  AND p.manufacturers_id = m.manufacturers_id AND p.quantity_new_to_sale>0 AND p.products_id = pd.products_id GROUP  BY m.manufacturers_id ';
	$count_sql='SELECT count(DISTINCT p.products_id )  AS count FROM products_description pd, products p, studio s WHERE products_type = "DVD_ADULT" and s.studio_id ='. $studio_id.'  AND p.products_studio = s.studio_id AND p.quantity_new_to_sale>0 AND p.products_id = pd.products_id GROUP  BY s.studio_id ';  //BEN001
	$count_query = tep_db_query($count_sql);
	$count_values = tep_db_fetch_array($count_query);
	$count=$count_values[count];
	$number_of_products = '0';
	


	$listing_sql='select p.products_id,p.products_new_sale_price,pd.products_name ,pd.products_image_big ';
//BEN001	$listing_sql.=' from products_description_adult pd,products_adult p, manufacturers m ';
	$listing_sql.=' from products_description pd,products p, studio s ';  //BEN001
	$listing_sql.=' where s.studio_id  ='. $studio_id.' AND p.quantity_new_to_sale>0 AND p.products_studio=s.studio_id AND p.products_id=pd.products_id ';
	$listing_sql.=' and products_type = "DVD_ADULT" '; //BEN001	
	if ($x!=0){
		$listing_sql.='GROUP BY p.products_id  ORDER BY `products_new_sale_price` ASC limit '.$x.','.$limit ;}
	else{
		$x=0;
		$listing_sql.='GROUP BY p.products_id ORDER BY `products_new_sale_price` ASC limit '.$x.','.$limit ;}
	$listing = tep_db_query($listing_sql);
	$i=1;
?>
<br>
<table width="764" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left_x.gif" width="11" height="20"></td>
    <td width="300" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid_x.gif" class="dvdpost_left_menu_title" align="left"><b><?php   echo $count.'</b> '.TEXT_MATCHING_SEARCH.' <b>'.$studio_name_values[studio_name].'</b>' ?></td>
    <td width="11"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right_x.gif" width="11" height="20"></td>
    <td width="431">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right_x.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid_x.gif">&nbsp;</td>
    <td colspan="3">

		<table width="100%" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td>
				<br>
		<?php  
							
					echo '<table width="666" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr>';
					while ($product_info_values = tep_db_fetch_array($listing)) {
						?>
						<td align="center">
						<form name="form1" method="post" action="addtoshoppingcart_new_adult.php">
							<table width="213" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td  height="30" valign="middle" class="SLOGAN_BLACK" align="center" colspan="2" width="213"><b><?php   echo $product_info_values['products_name'] ;?></b></td>
								</tr>
								<tr>
									<td>
										<TABLE width="102" border="0" cellpadding="0" cellspacing="0"  align="center">										
											<TR>
												<TD width="87" height="7"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/haut.gif" width="87" height="7"></TD>
												<TD rowspan="3"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/droite.gif" width="15" height="142"></TD>
											</TR>
											<TR>
												<TD width="87" height="130" valign="top"><a href="product_info_shop_adult.php?products_id=<?php   echo $product_info_values['products_id'];?>"><img src="<?php   echo DIR_WS_IMAGESX ;?><?php   echo $product_info_values['products_image_big'] ;?>" border="0" width="87" height="130" ALT="<?php   echo $product_info_values['products_name'] ;?>"></a></TD>
											</TR>
											<TR>
												<TD width="87" height="5"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/bas.gif" width="87" height="5" ></TD>
					  						</TR>
					  					</table>
					  				</td>
					  			</tr>
								<tr>
									<td align="center"><a href="product_info_shop_adult.php?products_id=<?php   echo $product_info_values['products_id'];?>" class="basiclink"><u><?php   echo TEXT_MORE_INFO ;?></u></a></td>
								</tr>
								<tr>
									<td height="22" valign="middle" class="SLOGAN_BLACK" align="center"><b><font color="#CC0000"><?php   echo $product_info_values['products_new_sale_price'] ;?>&euro;</font></b></td>
								</tr>
								<tr>
									<td align="center">
									  <input name="products_id" type="hidden" value="<?php   echo $product_info_values['products_id'] ;?>">
									  <input name="imageField" align="center" type="image" src="<?php   echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy.gif" border="0">
									</td>
								</tr>
							</table>
						</form><br>
						</td>
						<?php   if ($i % 3 ==0){echo '</tr><tr>'; }
						$i++; ?>
				  <?php   }
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
			include(DIR_WS_INCLUDES . 'functions/split_studio.php');
			split_pages($x,$limit,$count, $studio_id);
			?>
			</td>
		  </tr>
		</table>



    </td>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left_x.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right_x.gif" width="11" height="10"></td>
  </tr>
</table>