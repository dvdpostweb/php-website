<table width="280"  border="0" align="center" cellpadding="0" cellspacing="0">
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
    <td align="right" class="SLOGAN_MENU">
    	<a href="my_recommandation.php" class="dvdpost_brown_underline"><?php   echo TEXT_RECOM_LINK;?></a>
  		<br>
  		<a href="my_recommandation_process_info.php" class="dvdpost_brown_underline"><?php   echo TEXT_COMPILE_RECOM;?></a>
  	</td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
  <tr>
    <td height="408">
		<?php   
			$count_recomm = tep_db_query("select count(*) as cc from products_recommandation where customers_id = '" . $customer_id . "' ");
			$count_recomm_values = tep_db_fetch_array($count_recomm);

		if ($count_recomm_values['cc'] < 5 ) {
			$listing_sql = 'select p.products_id, pd.products_name , pd.products_image_big , di.directors_name from ' . TABLE_PRODUCTS . ' p left join ' . TABLE_DIRECTORS . ' di on p.products_directors_id = di.Directors_id ';
			$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
			$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
			$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
			$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
			//BEN001 $listing_sql .= ' where p.products_id > 49 ';
			$listing_sql .= ' where p.products_type = "DVD_NORM" '; //BEN001
			$listing_sql .= 'and w.product_id is null and wa.products_id is null and pu.products_id is null';
			$listing_sql.= ' and p.products_availability>3 and p.products_rating > 3';
			$listing_sql.= ' and p.products_date_added > DATE_SUB(now(), INTERVAL 12 MONTH) and p.products_date_available >= DATE_SUB(now(), INTERVAL 12 MONTH) and p.products_next=0';
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
			$listing_top_sql = $listing_sql . ' order by rand() limit 4';
			$top_query = tep_db_query($listing_top_sql);			
		}else{
		//$select_str_products = "select p.products_id, pd.products_name, pd.products_description, pd.products_image_big, prr.correlation, di.directors_name from products_recommandation prr left join products p on prr.products_id = p.products_id left join directors di on p.products_directors_id = di.Directors_id left join products_description pd on prr.products_id = pd.products_id where customers_id = '" . $customer_id . "' and pd.language_id = '" . $languages_id . "' order by correlation desc limit 4";
		//BEN001 $select_str_products = "select p.products_id, pd.products_name, pd.products_description, pd.products_image_big, prr.correlation, di.directors_name from products_recommandation prr left join products p on prr.products_id = p.products_id left join directors di on p.products_directors_id = di.Directors_id left join products_description pd on prr.products_id = pd.products_id where customers_id = '" . $customer_id . "' and pd.language_id = '" . $languages_id . "' order by rand() limit 4";
		$select_str_products = "select p.products_id, pd.products_name, pd.products_description, pd.products_image_big, prr.correlation, di.directors_name from products_recommandation prr left join products p on prr.products_id = p.products_id left join directors di on p.products_directors_id = di.Directors_id left join products_description pd on prr.products_id = pd.products_id where customers_id = '" . $customer_id . "' and pd.language_id = '" . $languages_id . "' and p.products_type = 'DVD_NORM' order by rand() limit 4"; //BEN001
		$top_query = tep_db_query($select_str_products);
	}
		while ($top = tep_db_fetch_array($top_query)) {
				
				?>
			  
		      <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
		        <tr>
		          <td width="100" height="150" rowspan="4" valign="top"><a href="product_info.php?products_id=<?php   echo $top['products_id'] ;?>"><img src="'.$constants['DIR_DVD_WS_IMAGES'].'/<?php   echo $top['products_image_big'] ;?>" border="0" width="100" height="150" alt="<?php   echo $top['products_name'] ;?>"></a></td>
		          <td width="140" height="30" align="left" valign="middle" bordercolor="#FFFFFF" bgcolor="#999999" >
		          	<a class="button" href="product_info.php?products_id=<?php   echo $top['products_id'] ;?>"><b><?php   echo $top['products_name'] ;?></b></a>
		          	&nbsp;<img src="<?php   echo DIR_WS_IMAGES;?>recom/starflash2.gif" align="absmiddle"><span class="TYPO_STD_BLACK_bold"><?php   echo $top['correlation']; ?></span>
		          </td>
		        </tr>
		        <tr>
		          <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>director.jpg" align="absmiddle"><?php   echo $top['directors_name'] ;?></span></td>
		        </tr>
		        <tr>
		          <td bordercolor="#FFFFFF" bgcolor="#EAEAEA">
		          	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
		              <tr>
		                <td height="50" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>actor.jpg" align="absmiddle">
						<?php  
						$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" .  $top['products_id'] . "'");
						$cpt=1;
						while ($actors_values = tep_db_fetch_array($actors)) {
						$actors_name = tep_db_query("select an.Actors_Name from " . TABLE_ACTORS. " an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
						$actors_name_values = tep_db_fetch_array($actors_name);
					 	if ($cpt < 4)
							{
							echo '<b class="TYPO_STD_BLACK_bold"><A href="actors.php?actors_id=' .$actors_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
							$cpt++;
							} 
						}?>
		              </tr>
		          	</table>
		          </td>
		        </tr>
		        <tr>
		          <td>
		          	<table width="100%" background="<?php   echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
		              <tr>
		                <td align="center"  height="30" valign="middle">
							<?php   
						        $customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $top['products_id'] . "' and customers_id = '" . $customer_id . "' ");
						        $customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
						        if ($customers_notinterested_values['products_uninterested_id']>0){
						            echo '<td class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif"></td>';
						        }else{																																																																								
						            echo '<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK"><input type="hidden" name="movieid" value="' . $top['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' .DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="TEXT_ALTINTERESTED"></td></form>';
						        }
								$product_info_values['products_id']=$top['products_id'];
								include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));
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
  	<td align="center"><a href="<?php   echo tep_href_link('listing_category.php', 'list=new');?>" class="dvdpost_brown_underline"><?php  echo TEXT_SEE_NEWS;?></a></td>
  </tr>
  <tr>
    <td valign="top" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="9" height="9"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
</table>
