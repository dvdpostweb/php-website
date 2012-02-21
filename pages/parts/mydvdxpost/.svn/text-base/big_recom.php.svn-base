<table width="269"  border="0" align="center" cellpadding="0" cellspacing="0" style="padding-top:4px">
  <tr>
    <td width="14"><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
    <td width="245" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td width="10"><img src="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
  </tr>
  <tr>
    <td rowspan="5" background="<?php   echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td height="20" align="center" valign="top" class="SLOGAN_BLACK"><?php   echo TEXT_RECOM ?></td>
    <td rowspan="5" background="<?php   echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
  <tr>
    <td align="right" class="SLOGAN_MENU"><a href="#" class="dvdpost_brown_underline"><?php   echo TEXT_WHY_RECOM;?></a></td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
  
  <tr>
    <td height="408">
		<?php  
			//BEN001 $listing_sql = 'select p.products_id, p.manufacturers_id, pd.products_name , pd.products_image_big from products_adult p';
			$listing_sql = 'select p.products_id, p.products_studio, pd.products_name , pd.products_image_big from products p'; //BEN001
//BEN001			$listing_sql .= ' left join products_description_adult pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
			$listing_sql .= ' left join products_description pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ; //BEN001
			//BEN001 $listing_sql .= ' left join wishlist_adult w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
			$listing_sql .= ' left join wishlist w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ; //BEN001
			//BEN001 $listing_sql .= ' left join wishlist_assigned_adult wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
			$listing_sql .= ' left join wishlist_assigned wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' '; //BEN001
			if ($cpt_gay_movies_values['cpt']==0){
				//RALPH-005 $listing_sql .= ' left join products_to_categories_adult pc on pc.products_id=p.products_id ';
				$listing_sql .= ' left join products_to_categories pc on pc.products_id=p.products_id '; //RALPH-005
				//BEN001 $listing_sql .= ' where p.products_id > 49 ';
			$listing_sql.=' where products_type = "DVD_ADULT" '; //BEN001 
				$listing_sql .= 'and w.product_id is null and wa.products_id is null ';
				$listing_sql.= ' and p.products_availability>0  and pc.categories_id !=14';
			}
			else{
				//BEN001 $listing_sql .= ' where p.products_id > 49 ';
			$listing_sql.=' where products_type = "DVD_ADULT" '; //BEN001 
				$listing_sql .= 'and w.product_id is null and wa.products_id is null ';
				$listing_sql.= ' and p.products_availability>0 ';			
			}
			$listing_top_sql = $listing_sql;
			$top_query = tep_db_query($listing_top_sql . ' order by rand() limit 5	');
			while ($top = tep_db_fetch_array($top_query)) {
				?>
		      <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
		        <tr>
		          <td width="100" height="150" rowspan="4" valign="top"><a href="product_info_adult.php?cPath=21&products_id=<?php   echo $top['products_id'] ;?>"><img src="<?php   echo DIR_WS_IMAGESX;?><?php   echo $top['products_image_big'] ;?>" border="0" width="100" height="150"></a></td>
		          <td width="140" height="30" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E7A8D8" ><a class="button" href="product_info_adult.php?products_id=<?php   echo $top['products_id'] ;?>"><b><?php   echo $top['products_name'] ;?></b></a></td>
		        </tr>
		        <tr>
				  <?php  
				  	$studio_sql = 'select studio_name from studio where studio_id="'.$top['products_studio'].'"';
					$studio_query = tep_db_query($studio_sql);
					$studio = tep_db_fetch_array($studio_query)
				  ?>
		          <td height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><span class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>director_adult.jpg" align="absmiddle"><?php   echo $studio['studio_name'] ;?></span></td>
		        </tr>
		        <tr>
		          <td bordercolor="#FFFFFF" bgcolor="#EAEAEA">
		          	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		              <tr>
		                <td height="47" bordercolor="#FFFFFF" bgcolor="#F8E6F4">
							<img src="<?php   echo DIR_WS_IMAGES;?>actor_adult.jpg" align="absmiddle">
						<?php  
						//RALPH-002 $actors = tep_db_query("select a.actors_id from products_to_actors_adult a where a.products_id = '" .  $top['products_id'] . "'");
						$actors = tep_db_query("select a.actors_id from products_to_actors a where a.products_id = '" .  $top['products_id'] . "'"); //RALPH-002
						$cpt=1;
						while ($actors_values = tep_db_fetch_array($actors)) {
						//RALPH-002 $actors_name = tep_db_query("select an.Actors_Name from actors_adult an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
						$actors_name = tep_db_query("select an.Actors_Name from actors an where an.actors_type = 'DVD_ADULT' and an.Actors_id = '" . $actors_values['actors_id'] . "'");  //RALPH-002
						$actors_name_values = tep_db_fetch_array($actors_name);
					 	if ($cpt < 4)
							{
							echo '<b class="TYPO_STD_BLACK_bold"><A href="actors_adult.php?actors_id=' .$actors_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
							$cpt++;
							} 
						}?>
							
						</td>
		              </tr>
		          	</table>
		          </td>
		        </tr>
		        <tr>
		          <td>
		          	<table width="100%" background="<?php   echo DIR_WS_IMAGES;?>background_dvdinfo_search_a.jpg">
		              <tr>
		                <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
                  		<td align="right"  height="30" valign="middle">
							<?php   
								$product_info_values['products_id']=$top['products_id'];
								include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_adult/button_addtowishlist2.php'));
							?>
						</td>
		              </tr>
		          	</table>
		          </td>
		        </tr>		        
		      </table>	
		      <br>	
		      <?php  
			}
		?>    
        </td>
  </tr>
  <tr>
  	<td align="center"><a href="<?php  // echo tep_href_link('listing_category.php', 'list=new');?>" class="dvdpost_brown_underline"><?php  //echo TEXT_SEE_NEWS;?></a></td>
  </tr>
  <tr>
    <td valign="top" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="9" height="9"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
</table>
