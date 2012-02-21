<table border="0" align="center"width="764" cellspacing="0" cellpadding="0">
<?php
//echo $listing_sql;
  if ($listing_numrows > 0) {
    $number_of_products = '0';
    $listing = tep_db_query($listing_sql);
	$i=1;
    while ($product_info_values = tep_db_fetch_array($listing)) {
		if ($i % 2 ==0){echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">'; }
		else {echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
		$i++; 
		?>
		<tr>
			<td width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
		</tr>
		<tr>
			<td width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td width="762">
				<table width="<? echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="294" rowspan="6" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="1" >
                        <tr>
                          <td width="100" height="150" rowspan="5"><a href="product_info.php?cPath=21&products_id=<? echo $product_info_values['products_id'];?>"> <img src="'.$constants['DIR_DVD_WS_IMAGES'].'/<? echo $product_info_values['products_image_big'] ;?>" border="0" width="108" height="162"> </a> </td>
                          <td height="30" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#999999" ><a class="button" href="product_info.php?cPath=21&products_id= <? echo $product_info_values['products_id'] ?>"> <b><? echo $product_info_values['products_name'];?></b> </a> </td>
                        </tr>
                        <tr>
                          <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"> <img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3">
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
                          <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr >
                                <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php echo DIR_WS_IMAGES;?>director.jpg"> </td>
                                <td bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_DETAIL"><span class="TYPO_STD_BLACK_bold">
                                  <?
													$directors = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");
													$directors_values = tep_db_fetch_array($directors);														
													echo '<b class="TYPO_STD_BLACK_bold"><a href="directors.php?directors_id='. $product_info_values['products_directors_id']. '" class="basiclink"><u>'. $directors_values['Directors_name']. '</u></a><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
													?>
                                </span></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php echo DIR_WS_IMAGES;?>actor.jpg"></td>
                                <td height="40" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_BLACK"><?
													$cpt=1;
													$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $product_info_values['products_id'] . "'");
													while ($actors_values = tep_db_fetch_array($actors)) {
														$actors_name = tep_db_query("select an.Actors_Name from " . TABLE_ACTORS. " an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
														$actors_name_values = tep_db_fetch_array($actors_name);
														if ($cpt < 4)
														{
														echo '<b class="TYPO_STD_BLACK_bold"><A href="actors.php?actors_id=' .$actors_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
														$cpt++;
														}							 
													} 
													?>
                                </td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" background="<?php echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
                              <tr>
                                <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
										<?
										$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
										$alreadyordered = tep_db_fetch_array($alreadyordered_query);
										if ($alreadyordered['orders_products_id']>0){
											echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
										}
										?>
										<?php
										$today = getdate();
										$listing_sql = "select month(p.products_date_available) as new_dvd_datemonth, year(p.products_date_available) as new_dvd_dateyear, month(p.products_date_added) as last_added_dvd_datemonth, year(p.products_date_added) as last_added_dvd_dateyear from " . TABLE_PRODUCTS . " p where p.products_id ='".$product_info_values['products_id']."'";
										$product_info2 = tep_db_query($listing_sql);
										$product_info2_values = tep_db_fetch_array($product_info2);
										if  ($product_info2_values['new_dvd_datemonth'] + 2 > $today['month'] AND $product_info2_values['new_dvd_dateyear'] == $today['year'])  {
										echo '- NEW -';
										}
										else if  ($product_info2_values['last_added_dvd_datemonth'] + 2 > $today['month'] AND $product_info2_values['last_added_dvd_dateyear'] == $today['year'])  {
										echo '- FRESH -';
										}
										?>
					            </td>
                                <td align="right"  height="30" valign="middle"><? include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));?></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="243" rowspan="6" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                        <tr valign="middle">
                          <td width="100%" height="30" align="center" class="SLOGAN_BLACK"><? 
										$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
										$categories_values = tep_db_fetch_array($categories);
										echo '<strong>' . $categories_values['categories_name'] .'</strong>';
										?>
                          </td>
                        </tr>
                        <tr>
                          <td height="7" valign="top"><div align="center"><img src="<?php echo DIR_WS_IMAGES;?>/greyline2.jpg" width="214" height="4"></div></td>
                        </tr>
                        <tr>
                          <td height="8" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                                <td valign="top" class="SLOGAN_GRIS_FONCE"><? echo substr($product_info_values['products_description'],0,100)?> ... <br>
                                    <br>
                                    <div align="center"> <a class="basiclink" href="product_info.php?cPath=21&products_id=<? echo $product_info_values['products_id'];?>"> (<u><? echo TEXT_MORE_INFO ?></u>) </a> </div></td>
                                <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                    <td width="194" height="25" valign="bottom" class="TYPO_PROMO"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><? echo TEXT_DISPONIBILITY; ?></td>
                  </tr>
                  <tr>
                    <td height="20" valign="top"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
                        <?
							echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability'])
							?>
                    </td>
                  </tr>
                  <tr>
                    <td height="25" valign="bottom" class="TYPO_PROMO"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><? echo TEXT_ADVICE ;?></td>
                  </tr>
                  <tr>
                    <td height="20" colspan="5" valign="top"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
                        <?
							$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
							$ratings_count_values = tep_db_fetch_array($ratings_count);
							$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $product_info_values['products_id'] . "'");
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
							    echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
							}else {
								$jsrate=$jsrate*10;
								echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
							}
							?>
                    </td>
                  </tr>
                  <tr>
                    <td height="30" valign="bottom" class="TYPO_PROMO"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3" class="TYPO_PROMO"><? echo DVDPOST_ADVICE ;?></td>
                  </tr>
                  <tr>
                    <td height="20" valign="top"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
                        <?php
							echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
							?>
                    </td>
                  </tr>
                </table></TD>
		</TR>
		<tr>
			<td width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
		</tr>
	</table>
  <? }
  } else {
?>
<table>
  <tr class="productListing-odd">
    <td colspan="<?php echo $colspan; ?>" class="smallText">&nbsp;<?php echo ($HTTP_GET_VARS['manufacturers_id'] ? TEXT_NO_PRODUCTS2 : TEXT_NO_PRODUCTS); ?>&nbsp;</td>
  </tr>
</table>
<?php
  }
?>
<table align="center">
  <tr>
		<td width="650"> </td> 
		<td align="center" class="SLOGAN_orange"><?php echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
  </tr>
</table>
