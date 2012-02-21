<?php  
if (strlen($HTTP_GET_VARS['keywords'])>1){
	switch($type)
	{
		case 'actors':
			$good_list=$list_actors_products;
			$class_actor='TAB_SELECT_ACTIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_PASSIVE';
			$class_serie='TAB_SELECT_PASSIVE';
			
		break;
		case 'directors':
			$good_list=$list_directors_products;
			$class_actor='TAB_SELECT_PASSIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_ACTIVE';
			$class_serie='TAB_SELECT_PASSIVE';
		break;
		case 'serie':
			$good_list=$list_serie;
			$class_actor='TAB_SELECT_PASSIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_PASSIVE';
			$class_serie='TAB_SELECT_ACTIVE';
		
		break;
		default:
			$good_list=$list;
			$class_actor='TAB_SELECT_PASSIVE';
			$class_movie='TAB_SELECT_ACTIVE';
			$class_director='TAB_SELECT_PASSIVE';
			$class_serie='TAB_SELECT_PASSIVE';
		
	}
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" height="15"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr>
	<?php
			    switch ($languages_id){
					case 1: 
						$lang=" and p.products_language_fr = 1";
						break;
						
					case 2:
						$lang=" and p.products_undertitle_nl = 1";
						break;
						
					case 3:
						$lang=" ";
						break;
				}
				
				// 1st pass begin //
				if($_GET['type']=='serie')
				{
					$id='p.products_series_id';
					$order="order by p.products_series_id asc, products_series_number asc";
				}
				else
				{
					$id ='pd.products_id';	
					$order="order by FIELD(p.products_id,".$good_list." )";
				}
				$select_str_products = "select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today,p.products_media, p.products_id , p.imdb_id, pd.products_name,p.products_date_added, p.products_availability, p.products_language_fr, p.products_undertitle_nl, p.products_next, p.products_date_available,p.products_rating ,p.products_directors_id,pd.products_image_big, p.in_cinema_now , "; 
				$select_str_products .=" month(p.products_date_available) as new_dvd_datemonth, year(p.products_date_available) as new_dvd_dateyear, ";
				$select_str_products .=" month(p.products_date_added) as last_added_dvd_datemonth, year(p.products_date_added) as last_added_dvd_dateyear,rating_users,rating_count ";
				$select_str_products .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id=".$languages_id." where p.products_type = 'DVD_NORM'  AND p.products_product_type='Movie'  ".$lang.$filter." and p.products_status != -1 and ".$id." in(".$good_list.") group by p.products_id ".$order; //BEN001
				#echo $select_str_products ;
				
				$query_search_products = tep_db_query($select_str_products);
				$count_dvd=tep_db_num_rows($query_search_products);
				if($_GET['debug']==1)
					echo $select_str_products;
				$cpt_pass=0;
				$imdb_list='0';
				while ($product_info_values = tep_db_fetch_array($query_search_products)) {
					$cpt_pass++;
					$tab[$cpt_pass]['products_media']=$product_info_values['products_media'] ;
					$tab[$cpt_pass]['products_image_big']=$product_info_values['products_image_big'];
					$tab[$cpt_pass]['products_id']=$product_info_values['products_id'];
					$tab[$cpt_pass]['products_name']=$product_info_values['products_name'];
					$tab[$cpt_pass]['products_language_fr']=$product_info_values['products_language_fr'];
					$tab[$cpt_pass]['products_undertitle_nl']=$product_info_values['products_undertitle_nl'];
					$tab[$cpt_pass]['products_directors_id']=$product_info_values['products_directors_id'];
					$tab[$cpt_pass]['new_dvd_datemonth']=$product_info_values['new_dvd_datemonth'];
					$tab[$cpt_pass]['new_dvd_dateyear']=$product_info_values['new_dvd_dateyear'];
					$tab[$cpt_pass]['in_cinema_now']=$product_info_values['in_cinema_now'];
					$tab[$cpt_pass]['last_added_dvd_datemonth']=$product_info_values['last_added_dvd_datemonth'];
					$tab[$cpt_pass]['last_added_dvd_dateyear']=$product_info_values['last_added_dvd_dateyear'];
					$tab[$cpt_pass]['products_rating']=$product_info_values['products_rating'];
					$tab[$cpt_pass]['imdb_id']=$product_info_values['imdb_id'];
					$tab[$cpt_pass]['rating_count']=$product_info_values['rating_count'];
					$tab[$cpt_pass]['rating_users']=$product_info_values['rating_users'];
					$imdb_list .=','.$product_info_values['imdb_id'];
				}
				?>

	<td width="650" height="34" bgcolor="#E5E5E5" class="TYPO_STD_BLACK">
		<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"> 
		<span class="TYPO_STD_BLACK_bold">
		<font color="D32F30"><?php echo $count_movie['count'];?></font> <?= TEXT_BY_TITLE ?>,<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		<font color="D32F30"><?php echo $count_series['count'];?></font> <?= TEXT_SERIE ?>,<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		<font color="D32F30"><?php echo $actors_nb.'</font> '.TEXT_ACTORZ;?>,<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		<font color="D32F30"><?php echo $directors_nb.'</font> '.TEXT_DIRECTORS;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		</span> 
		<?php echo TEXT_CORRESPONDING ;?> " <span class="TYPO_STD_BLACK_bold"><?php  echo stripslashes($keywords) ?>
		</span>"
	</td>
    <td width="238" align="right" bgcolor="#E5E5E5" class="TYPO_STD_BLACK"><a href="picto.php" class="dvdpost_brown_underline"> (<?php  echo TEXT_PICTO ; ?>)</a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="8"></td>
  </tr>

</table>



<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td colspan="13"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr align="center" valign="middle">
	
    <td width="91"  class="<?= $class_movie; ?>"> <font color="#D32F30"><?php echo $count_movie['count'] ?></font> <a href="advanced_search_result2.php?type=movie&keywords=<?php echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php  echo TEXT_BY_TITLE;?></u></a></td>
	<td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php  echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
	<td width="91"  class="<?= $class_serie; ?>"> <font color="#D32F30"><?php echo $count_series['count'] ?></font> <a href="advanced_search_result2.php?type=serie&keywords=<?php echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php  echo TEXT_SERIE ?></u></a></td>
    <td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php  echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <td width="87"  class="<?= $class_actor; ?>"> <font color="#D32F30"><?php echo $actors_nb;?></font> <a href="advanced_search_result2.php?type=actors&keywords=<?php echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php  echo TEXT_ACTORZ;?></u></a></td>
    <td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php  echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <td width="110"  class="<?= $class_director; ?>"> <font color="#D32F30"><?php echo $directors_nb;?></font> <a href="advanced_search_result2.php?type=directors&keywords=<?php echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php  echo TEXT_DIRECTORS;?></u></a></td>
    <td width="3"  class="TAB_SELECT_PASSIVE"><img src="<?php  echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <?php 
	
	
	$colspan = sizeof($column_list);

	$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS,$select_str_products, $listing_numrows);
	

	if($type=='actors')
	{
		if($actors_nb==0 || $actors_nb==1)
		{
			$style1='display:none;';
		}
		else if($actors_nb>18)
		{
			$style2='height:120px;';
		}
	?>
		<td align="center" class="TAB_SELECT_PASSIVE"><span class="SLOGAN_orange">
	<?php  
		if ($count_dvd > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) 
		{
			echo $listing_split->display_links($count_dvd, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'],tep_get_all_get_params(array('page', 'info')));} 		
		?>
		</span></td>
		</tr>
	</table>
	<h3 id='cadre_title' style='<?=$style1; ?>'><?= TEXT_LIST_ACTORS ?> </h3>
	<div id ='cadre' style="<?= $style1.' '.$style2 ?>">
		<table border="0" width='515'>
	<?php
	$i=0;
	while($row=tep_db_fetch_array($query_actors)){
	if($i % 3===0){echo '<tr>';}
	
	?>
	<td><a href='/actors.php?actors_id=<?= $row['actors_id']?>&showtitles=1'> &bull; <?= truncate($row['actors_name'],26,'...' )?></a></td>
	<?php 
		if($i % 3==3){echo '</tr>';}
		$i++; 	
	}
	?>
	</table>
	</div>
	<?php
	}
	else if($type=='directors')
	{
		if($directors_nb==0 || $directors_nb==1)
		{
			$style1='display:none;';
		}
		else if($directors_nb>18)
		{
			$style2='height:120px;';
		}
	?>
		<td align="center" class="TAB_SELECT_PASSIVE"><span class="SLOGAN_orange">
	<?php  
		if ($count_dvd > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) 
		{
			echo $listing_split->display_links($count_dvd, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'],tep_get_all_get_params(array('page', 'info')));} 		
		?>
		</span></td>
		</tr>
	</table>
	<h3 id='cadre_title' style='<?=$style1; ?>'><?= TEXT_LIST_DIRECTOR ?> </h3>
	<div id ='cadre' style="<?= $style1.' '.$style2 ?>">
		<table border="0" width='515'>
	<?php
	$i=0;
	while($row=tep_db_fetch_array($query_directors)){
	if($i % 3===0){echo '<tr>';}
	
	?>
	<td><a href='/directors.php?directors_id=<?= $row['directors_id']?>'> &bull; <?= truncate($row['directors_name'],26,'...' )?></a></td>
	<?php 
		if($i % 3==3){echo '</tr>';}
		$i++; 	
	}
	?>
	</table>
	</div>
	<?php
	}
	$i=1;
			
			$query_search_products = tep_db_query($select_str_products);
			
			$raw_per_page=10;
			if (!isset($page)){$page=1 ; $min_raw=$page;}
			else{$min_raw=(($page-1)*10)+1;}
			
			if ($min_raw+$raw_per_page < $count_dvd ){
				$max_raw=$min_raw+($raw_per_page)-1;
			}else{$max_raw=$count_dvd ;}
			
			
			for ($cpt_list=$min_raw ; $cpt_list<= $max_raw ; $cpt_list++ ) {

		if ($i % 2 ==0){echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
		else {echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">'; }
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
			<td width="762">
				<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="294" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
            <tr> 
              <td width="100" height="150" rowspan="5"> 
              	<?php 
	              	switch ($tab[$cpt_list]['products_media']){
						case 'BlueRay' :
							echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
							echo '<a  href="product_info.php?products_id='.$tab[$cpt_list]['products_id'].'">';
							echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].$tab[$cpt_list]['products_image_big'].'" border="0" width="108" height="144" alt="'.$tab[$cpt_list]['products_name'].'" valign="top"></a></td></tr></table>';
							echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
							break;
						
						default :
							echo '<a href="product_info.php?products_id='.$tab[$cpt_list]['products_id'].'">';
							echo '<img src="'.$constants['DIR_DVD_WS_IMAGES'].$tab[$cpt_list]['products_image_big'].'" border="0" width="108" height="162" alt="'.$tab[$cpt_list]['products_name'].'">';
							echo '</a></td>';
							echo '<td height="33" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
							break;
					}
				?>
                <b><?php  echo $tab[$cpt_list]['products_name'];?></b> </a> </td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"> 
                <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"> 
                <?php  
										if ($tab[$cpt_list]['products_language_fr']>0){
											echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';
										}
										if ($tab[$cpt_list]['products_undertitle_nl']>0){
											echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';
										}
										?>
              </td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr > 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>director.jpg"> 
                    </td>
                    <td bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_DETAIL"><span class="TYPO_STD_BLACK_bold"> 
                      <?php 
													$directors = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $tab[$cpt_list]['products_directors_id'] . "'");
													$directors_values = tep_db_fetch_array($directors);														
													echo '<b class="TYPO_STD_BLACK_bold"><a href="directors.php?directors_id='. $tab[$cpt_list]['products_directors_id']. '" class="basiclink"><u>'. $directors_values['Directors_name']. '</u></a><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
													?>
                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>actor.jpg"></td>
                    <td height="40" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_BLACK"> 
                      <?php 
													$cpt=1;
													$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $tab[$cpt_list]['products_id'] . "'");
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
              <td> <table width="100%" background="<?php  echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
                  <tr> 
                    <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"> 
                      <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"> 
                      <?php 
													$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $tab[$cpt_list]['products_id'] . "' ");
													$alreadyordered = tep_db_fetch_array($alreadyordered_query);
													if ($alreadyordered['orders_products_id']>0){
														echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
												    }
													?>
                      <?php 
													$today = getdate();
													if  ($tab[$cpt_list]['new_dvd_datemonth'] + 2 > $today['month'] AND $tab[$cpt_list]['new_dvd_dateyear'] == $today['year'] AND $tab[$cpt_list]['in_cinema_now'] == 0)  {
														echo '- NEW -';
														}
													else if ($tab[$cpt_list]['last_added_dvd_datemonth'] + 2 > $today['month'] AND $tab[$cpt_list]['last_added_dvd_dateyear'] == $today['year'] AND $tab[$cpt_list]['in_cinema_now'] == 0)  {
														echo '- FRESH -';
														}
												  	?>
                    </td>
                    <td align="right"  height="30" valign="middle"> 
                      <?php  
						$product_info_values['products_name']=$tab[$cpt_list]['products_name'];
						$product_info_values['products_id']=$tab[$cpt_list]['products_id'];
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));
					  ?>
                    </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        <td height="20" valign="top">		
			<table width="100%"  border="0" cellpadding="0" cellspacing="0">
				<tr valign="middle"> 
				  <td width="100%" height="30" align="center" class="SLOGAN_BLACK"> 
					<?php  
				$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $tab[$cpt_list]['products_id'] . "'");
				$categories_values = tep_db_fetch_array($categories);
				echo '<strong>' . $categories_values['categories_name'] .'</strong>';
				
				$lang_description = tep_db_query("select products_description from products_description where language_id = '" . $languages_id . "' and products_id='" . $tab[$cpt_list]['products_id'] . "'");
				$lang_description_values = tep_db_fetch_array($lang_description);				
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
						<td valign="top" class="SLOGAN_GRIS_FONCE"> <?php  echo substr($lang_description_values['products_description'],0,200)?> 
						  ... <br> <br> <div align="center"> <a class="basiclink" href="product_info.php?cPath=21&products_id=<?php  echo $tab[$cpt_list]['products_id'];?>"> 
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

							$data_avg_count=avg_count_fct($tab[$cpt_list]['rating_users'] ,$tab[$cpt_list]['rating_count'] );
							$jsrate=$data_avg_count['avg'];
							if ($jsrate==0){ 
								echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $tab[$cpt_list]['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
							}
							else {
								echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
								}
							?>			
						</td>
						<td height="20" valign="top"  width="50%" align="center">
							<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php 
							 echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $tab[$cpt_list]['products_rating'] . '0.gif">';
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
  ?>  
  <table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td ><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td  width="274" align="center" class="SLOGAN_orange"><?php  echo $listing_split->display_links($count_dvd, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
	</tr>
  </table>
<?php  
}else{ ?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
	  </tr>
	  <tr>
		<td height="34" bgcolor="#E5E5E5" align="center" class="TYPO_STD_BLACK_BOLD"><?php  echo TEXT_NO_MATCHING_SEARCH ;?></td>
	  </tr>
    </table>
<?php  } ?>

