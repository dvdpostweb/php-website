
<?php 
$manufacturer_info = tep_db_query("select manufacturers_name from manufacturers where manufacturers_id = '" . $HTTP_GET_VARS['manufacturers_id'] . "' ");
if (!tep_db_num_rows($manufacturer_info)) { // product not found in database 
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td class="TYPO_STD2_BLACK"><br><?php  echo TEXT_PRODUCT_NOT_FOUND; ?></td>
</tr>
<tr>
	<td align="right"><br><a href="<?php  echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php  echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
</tr>
</table>
<?php 
} else { 
//there is a manufacturer
$manufacturer_info_values = tep_db_fetch_array($manufacturer_info);
?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
  	<td  height="40" align="center" class="TYPO_STD2_BLACK">
	<?php  echo TEXT_FILMOGRAPHY . ' : ' . $manufacturer_info_values['manufacturers_name'] ; ?>
	<br>
	</td>
  </tr>
  <tr>
	<td   height="6"valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
</table>
<?php 
	$i=1;
	//BEN001 $a = tep_db_query("select products_id  from products_adult where only_for_sale=0 and  manufacturers_id = '" . $HTTP_GET_VARS['manufacturers_id'] . "'  ");
	$a = tep_db_query("select products_id  from products where products_type = 'DVD_ADULT' and only_for_sale=0 and  manufacturers_id = '" . $HTTP_GET_VARS['manufacturers_id'] . "'  "); //BEN001
	while ($a_v = tep_db_fetch_array($a)) {
	//RALPH-005 $product_info = tep_db_query("select p.products_id,p.only_for_sale, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_public, p.products_runtime, p.products_year, p.products_picture_format , p.products_rating ,p.manufacturers_id, pc.categories_id, p.products_regional_code, p.products_studio, p.products_availability,p.products_language_fr, p.products_undertitle_nl, pd.products_image_big  from products_adult p, products_description_adult pd, products_to_categories_adult pc where p.only_for_sale=0 and p.products_id = '" . $a_v['products_id'] . "' and pd.products_id = '" . $a_v['products_id'] . "'  and pd.language_id = '" . $languages_id . "' and pc.products_id= '" . $a_v['products_id'] . "'");
	$product_info = tep_db_query("select p.products_id,p.only_for_sale, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_public, p.products_runtime, p.products_year, p.products_picture_format , p.products_rating ,p.manufacturers_id, pc.categories_id, p.products_regional_code, p.products_studio, p.products_availability,p.products_language_fr, p.products_undertitle_nl, pd.products_image_big  from products p, products_description pd, products_to_categories pc where p.only_for_sale=0 and p.products_id = '" . $a_v['products_id'] . "' and pd.products_id = '" . $a_v['products_id'] . "'  and pd.language_id = '" . $languages_id . "' and pc.products_id= '" . $a_v['products_id'] . "'"); //BEN001
	$product_info_values = tep_db_fetch_array($product_info);
	$manufacturers_name = tep_db_query("select manufacturers_name from manufacturers where manufacturers_id = '" . $product_info_values['manufacturers_id'] . "'");  
	$manufacturers_name_values = tep_db_fetch_array($manufacturers_name);
	//RALPH-002 $actors = tep_db_query("select a.actors_id from products_to_actors_adult a where a.products_id = '" . $product_info_values['products_id'] . "'");  
	$actors = tep_db_query("select a.actors_id from products_to_actors a where a.products_id = '" . $product_info_values['products_id'] . "'");   //RALPH-002
									
		if ($i % 2 ==0){echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
		else {echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F7EAF4">'; }
		$i++; 
?>
  <tr>
   <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
   <td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10">
		<?php 	
			$url_count++;
			echo '<span id="link'.$url_count.'" >&nbsp;</span>';
		?>
	
</td>
  </tr>
  <tr>
  <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
  <td width="762"> <table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="294" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
            <tr> 
              <td width="100" height="150" rowspan="5"><a href="product_info_adult.php?cPath=21&products_id=<?php  echo $product_info_values['products_id'];?>"><img src="<?php  echo DIR_WS_IMAGESX;?><?php  echo $product_info_values['products_image_big'] ;?>" border="0" width="108" height="162"></a></td>
              <td height="30" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="E7A8D8" ><a class="button" href="product_info_adult.php?cPath=21&products_id= <?php  echo $product_info_values['products_id'] ?>"><b><?php  echo $product_info_values['products_name'];?></b></a></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><span class="TYPO_STD_BLACK_bold"> 
                <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"> 
                <?php  
			if ($product_info_values['products_language_fr']>0){
				echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';
			}
			if ($product_info_values['products_undertitle_nl']>0){
				echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';
			}
			?>
                </span></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr > 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><img src="<?php  echo DIR_WS_IMAGES;?>director_adult.jpg"> 
                    </td>
                    <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4" class="SLOGAN_DETAIL"><span class="TYPO_STD_BLACK_bold"><a href="manufacturers.php?manufacturers_id=<?php  echo $product_info_values['manufacturers_id'];?>" class="basiclink"><u><?php  echo $manufacturers_name_values['manufacturers_name'];?></u></a></span></td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><img src="<?php  echo DIR_WS_IMAGES;?>actor_adult.jpg"></td>
                    <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4" class="SLOGAN_BLACK"> 
                      <?php 
						$cpt=1;
						while ($actors_values = tep_db_fetch_array($actors)) {
						//RALPH-002 $actors_name = tep_db_query("select actors_name, actors_id from actors_adult  where actors_id = '" . $actors_values['actors_id'] . "'"); 
						$actors_name = tep_db_query("select actors_name, actors_id from actors  where actors_type = 'DVD_ADULT' and actors_id = '" . $actors_values['actors_id'] . "'");  //RALPH-002
						$actors_name_values = tep_db_fetch_array($actors_name);
					 	if ($cpt < 4)
							{
							echo '<b class="TYPO_STD_BLACK_bold"><A href="actors_adult.php?actors_id=' .$actors_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['actors_name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
							$cpt++;
							}							 
						} ?>
                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td> <table width="100%" background="<?php  echo DIR_WS_IMAGES;?>background_dvdinfo_search_a.jpg">
                  <tr> 
                    <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"> 
                      <?php 
			    									$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
                									$alreadyordered = tep_db_fetch_array($alreadyordered_query);
                									if ($alreadyordered['orders_products_id']>0){
                  										echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
                									}
			   										?>
                    </td>
                    <td align="right"  height="30" valign="middle"> 
                      <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_adult/button_addtowishlist2.php'));?>
                    </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        <td width="438" valign="top"> 
          <table width="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr valign="middle"> 
              <td width="100%" height="30" align="center" class="SLOGAN_BLACK"> 
                <?php  
		  	//RALPH-005 $categories = tep_db_query("select cd.categories_name from products_to_categories_adult c, categories_description_adult cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
		  	$categories = tep_db_query("select cd.categories_name from products_to_categories c, categories_description cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'"); //RALPH-005
		    $categories_values = tep_db_fetch_array($categories);
			echo '<strong>' . $categories_values['categories_name'] .'</strong>';
			?>
              </td>
            </tr>
            <tr> 
              <td height="7" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/greyline2.gif" width="431" height="4"></div></td>
            </tr>
            <tr> 
              <td height="8" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                    <td valign="top" class="SLOGAN_GRIS_FONCE"><?php  echo substr($product_info_values['products_description'],0,250)?> 
                      ...</td>
                    <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                  </tr>
                </table></td>
            </tr>
          </table>
		  <table width="100%">
				   <tr>
					<td height="10" colspan="2" valign="bottom" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
				  </tr>			  
				  <tr>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_ADVICE ;?></td>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3" class="TYPO_PROMO"><?php  echo DVDPOST_ADVICE ;?></td>
				  </tr>
				  <tr>			
					<td height="20" valign="top"  width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php 
						//BEN001 $ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating_adult where products_id = '" . $product_info_values['products_id'] . "'");
						$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $product_info_values['products_id'] . "'"); //BEN001
						$ratings_count_values = tep_db_fetch_array($ratings_count);
						//BEN001 $ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating_adult where products_id = '" . $product_info_values['products_id'] . "'");
						$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $product_info_values['products_id'] . "'"); //BEN001
						$ratings_average_values = tep_db_fetch_array($ratings_average);
				
						$reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "'");
						$reviews_count_values = tep_db_fetch_array($reviews_count);
						$reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "'");
						$reviews_average_values = tep_db_fetch_array($reviews_average);
				
						if ($ratings_average_values['prave']>0){
							if ($reviews_average_values['rrave']>0){
								$jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
							}else{
								$jsrate = round($ratings_average_values['prave'],1);
							}
						}else{
							if ($reviews_average_values['rrave']>0){
								$jsrate = round($reviews_average_values['rrave'],1);
							}else{
								$jsrate = 0;
							}
						}
						if ($jsrate==0){ 
							echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE_ADULT . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
						}
						else {
							$jsrate=$jsrate*10;
							echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
							}
						?>			
					</td>
					<td height="20" valign="top"  width="50%" align="center">
						<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php 
						 echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
						?>
					</td>				
				</tr>			
			</table>
        </td>
      </tr>
    </table></TD>
</TR>
  <tr>
   <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
   <td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
  </tr>
</table>
  <?php  } 
}?>

