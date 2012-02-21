<table border="0" align="center"width="764" cellspacing="0" cellpadding="0">
<?php 




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
			<td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
			<?php 	
				$url_count++;
				echo '<span id="link'.$url_count.'" >&nbsp;</span>';
			?>
		</tr>
		<tr>
			<td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			
    <td width="762"> <table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="294" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="1" >
              <tr>
                <td width="100" height="150" rowspan="5">
	                <?php 
	              	switch ($product_info_values['products_media']){
						case 'BlueRay' :
							echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.DIR_WS_IMAGES.'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
							echo '<a  href="product_info.php?products_id='.$product_info_values['products_id'].'">';
							echo '<img class="bluborder" src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="108" height="144" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
							echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
							break;
						
						default :
							echo '<a href="product_info.php?products_id='.$product_info_values['products_id'].'">';
							echo '<img src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="111" height="167" alt="'.$tag_dvd.'">';
							echo '</a></td>';
							echo '<td height="33" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
							break;
					}
					?>
                  <b><?php  echo $product_info_values['products_name'];?></b> </a> 
                </td>
              </tr>
              <tr> 
                <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"> 
                  <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"> 
                  <?php  
					$fr_movie_sql = "select (count(pl.products_languages_id) +count(pu. products_undertitles_id)) as cpt_FR from products_to_languages pl LEFT JOIN products_to_undertitles pu on pl.products_id=pu.products_id";
					$fr_movie_sql .=" where pl.products_id=".$product_info_values['products_id']."  and ( pl.products_languages_id=1 or pu.products_undertitles_id=1)";
					$fr_movie = tep_db_query($fr_movie_sql);
					$fr_movie_values = tep_db_fetch_array($fr_movie);
					if ($fr_movie_values['cpt_FR']>0){ echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';}
					$nl_movie_sql = "select (count(pl.products_languages_id) +count(pu. products_undertitles_id)) as cpt_NL from products_to_languages pl LEFT JOIN products_to_undertitles pu on pl.products_id=pu.products_id";
					$nl_movie_sql .=" where pl.products_id=".$product_info_values['products_id']."  and ( pl.products_languages_id=2 or pu.products_undertitles_id=2)";
					$nl_movie = tep_db_query($nl_movie_sql);
					$nl_movie_values = tep_db_fetch_array($nl_movie);
					if ($nl_movie_values['cpt_NL']>0){ echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';}
				  ?>
                  </span></td>
              </tr>
              <tr> 
                <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr > 
                      <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>director.jpg"> 
                      </td>
                      <td bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_DETAIL"><span class="TYPO_STD_BLACK_bold"> 
                        <?php 
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
                      <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>actor.jpg"></td>
                      <td height="40" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_BLACK"> 
                        <?php 
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
                <td><table width="100%" background="<?php  echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
                    <tr> 
                      <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"> 
                        <?php 
										$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
										$alreadyordered = tep_db_fetch_array($alreadyordered_query);
										if ($alreadyordered['orders_products_id']>0){
											echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
										}
										?>
                        <?php 
										$today = getdate();
										$listing_sql = "select month(p.products_date_available) as new_dvd_datemonth, year(p.products_date_available) as new_dvd_dateyear, month(p.products_date_added) as last_added_dvd_datemonth, year(p.products_date_added) as last_added_dvd_dateyear,  p.in_cinema_now from " . TABLE_PRODUCTS . " p where p.products_id ='".$product_info_values['products_id']."'";
										$product_info2 = tep_db_query($listing_sql);
										$product_info2_values = tep_db_fetch_array($product_info2);
										if  ($product_info2_values['new_dvd_datemonth'] + 2 > $today['month'] AND $product_info2_values['new_dvd_dateyear'] == $today['year'] AND $product_info2_values['in_cinema_now'] == 0 )  {
										echo '- NEW -';
										}
										else if  ($product_info2_values['last_added_dvd_datemonth'] + 2 > $today['month'] AND $product_info2_values['last_added_dvd_dateyear'] == $today['year'] AND $product_info2_values['in_cinema_now'] == 0)  {
										echo '- FRESH -';
										}
										?>
                      </td>
                      <td align="right"  height="30" valign="middle"> 
                        <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));?>
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td width="243" valign="top">
		  			<table width="100%"  border="0" cellpadding="0" cellspacing="0">
						<tr valign="middle"> 
						  <td width="100%" height="30" align="center" class="SLOGAN_BLACK"> 
							<?php  
							$sql="select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and categories_name!='' and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'".((!empty($_GET['cPath']))?' and c.categories_id= '.$_GET['cPath']:'');
						$categories = tep_db_query($sql);
						$categories_values = tep_db_fetch_array($categories);
						echo '<strong>' . $categories_values['categories_name'] .'</strong>';
						?>
						  </td>
						</tr>
						<tr> 
						  <td height="7" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/greyline2.jpg" width="430" height="4"></div></td>
						</tr>
						<tr> 
						  <td height="8" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="0">
							  <tr> 
								<td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
								<td valign="top" class="SLOGAN_GRIS_FONCE"> <?php  echo substr($product_info_values['products_description'],0,200)?> 
								  ... <br> <br> <div align="center"> <a class="basiclink" href="product_info.php?cPath=21&products_id=<?php  echo $product_info_values['products_id'];?>"> 
									(<u><?php  echo TEXT_MORE_INFO ?></u>) </a> </div></td>
								<td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
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
									$data_avg_count=avg_count_fct($product_info_values['rating_users'] ,$product_info_values['rating_count'] );
									$jsrate=$data_avg_count['avg'];
									if ($jsrate==0){ 
										echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
															
//							echo 'toto';
									}
									else {
										
//							echo 'tutu';
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
				  </table>		  
		  
		  
		  
		  </td>
        </tr>
      </table>
	  </TD>
		</TR>
		<tr>
			<td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
		</tr>
	</table>
  <?php  }
  } else {
?>
<table>
  <tr class="productListing-odd">
    <td colspan="<?php  echo $colspan; ?>" class="smallText">&nbsp;<?php  echo ($HTTP_GET_VARS['manufacturers_id'] ? TEXT_NO_PRODUCTS2 : TEXT_NO_PRODUCTS); ?>&nbsp;</td>
  </tr>
</table>
<?php 
  }
?>
<table align="center">
  <tr>
		<td width="650"> </td> 
		<td align="center" class="SLOGAN_orange"><?php  echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS_PRIVATE, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
  </tr>
</table>
