<?php
$HTTP_GET_VARS['keywords']=trim($HTTP_GET_VARS['keywords']);



	switch($type)
	{
		case 'actors':
			$good_list=$list_actors;
			$class_actor='TAB_SELECT_ACTIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_PASSIVE';
			$class_serie='TAB_SELECT_PASSIVE';
		break;
		case 'directors':
			$good_list=$list_directors;
			$class_actor='TAB_SELECT_PASSIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_ACTIVE';
			$class_serie='TAB_SELECT_PASSIVE';
		break;
		default:
			$good_list=$list;
			$class_actor='TAB_SELECT_PASSIVE';
			$class_movie='TAB_SELECT_ACTIVE';
			$class_director='TAB_SELECT_PASSIVE';
			$class_serie='TAB_SELECT_PASSIVE';
		
	}
?>
<style type="text/css">
<!--
.DVDp_catalog1 {
	font-family: Arial, Helvetica, sans-serif;
	Color: #333333;
	font-size: 14px;
	font-weight: bold;
}
.DVDp_catalog2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.DVDp_catalog3 {
	color: #CC0000;
	font-weight: bold;
}

a.DVDp_catalog_link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
a:link.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}
a:visited.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}
a:hover.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
	text-decoration:underline
}
a:active.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}

-->
</style>
<?php



?>
<div class="main-holder">

<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
	<td  width="170" valign="top" id="left_menu" class="limitedathome">
			<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public_adult.php')); ?>
	</td>
		
    	<td align="left" class="dvdpost_formula_grey" valign="top">
		<?php  if (strlen($HTTP_GET_VARS['keywords'])>1){?>
			<table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
				<td height="24"  class="actor_director_count_text_v4">
					
					<h2>
					<?php  echo $count_movie['count'].' <a href="advanced_search_result2_public_adult.php?type=movie&keywords='.htmlspecialchars($keywords).'">'.TEXT_BY_TITLE.'</a>';?> |
					<?php  echo $count_directors['count'].' <a href="advanced_search_result2_public_adult.php?type=directors&keywords='.htmlspecialchars($keywords).'"> Studios</a>';?> |
					<?php  echo $count_actors['count'].' <a href="advanced_search_result2_public_adult.php?type=actors&keywords='.htmlspecialchars($keywords).'">'.TEXT_ACTORZ.'</a>';?> |
					<?php  echo TEXT_CORRESPONDING ;?> " <?php   echo $keywords ?> "</h2>
				</td>
			  </tr>
			</table>
			<table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
		    <?php  

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
				$select_str_products = "select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today, p.products_id, p.products_media, pd.products_name, p.products_availability, p.products_language_fr, p.products_undertitle_nl, p.products_next, p.products_date_available,p.products_rating ,p.products_directors_id,pd.products_description,pd.products_image_big,products_studio ";
				$select_str_products .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id= ".$languages_id." where p.products_type = 'DVD_ADULT'  AND p.products_product_type='Movie'  ".$filter." and p.products_status != -1 and ".$id." in(".$good_list.") group by p.products_id ".$order; //BEN001
				#echo $select_str_products;
				$query_search_products = tep_db_query($select_str_products);
				$count_dvd=tep_db_num_rows($query_search_products);
				//echo$select_str_products;
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
					$tab[$cpt_pass]['products_description']=$product_info_values['products_description'];
					$tab[$cpt_pass]['products_studio']=$product_info_values['products_studio'];
					
					$imdb_list .=','.$product_info_values['imdb_id'];
				}
				$colspan = sizeof($column_list);
				$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS,$select_str_products, $listing_numrows);
				
				?>
					<td align="right" style="padding-right:7px; padding-bottom:10px;"><span class="SLOGAN_orange"><?php   echo $listing_split->display_links($count_dvd, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></span></td>

			  </tr>
			</table>
			<?php
			if($type=='actors'){
		
			if($actors_nb==0 || $actors_nb==1)
			{
				$style1='display:none;';
			}
			else if($actors_nb>18)
			{
				$style2='height:120px;';
			}
			?>
			<h3 id='cadre_title' style='<?=$style1; ?>'><?= TEXT_LIST_ACTORS ?> </h3>
			<div id ='cadre' style="<?= $style1.' '.$style2 ?>">
			<table border="0" width='515'>
			<?
			$i=0;
			while($row=tep_db_fetch_array($query)){
				if($i % 3===0){echo '<tr>';}
				
			?>
 				<td><a href='<?= actors_link($lang_short,$row['actors_name'],$row['actors_id']); ?>?showtitles=1'> &bull; <?= $row['actors_name']?></a></td>
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
			
			$raw_per_page=10;
			if (empty($_GET['page']))
			{
				$page=1 ; $min_raw=1;
			}
			else
			{
				$min_raw=(($_GET['page']-1)*10)+1;
			}
			
			if ($min_raw+$raw_per_page < $count_dvd ){
				$max_raw=$min_raw+($raw_per_page)-1;
			}else{$max_raw=$count_dvd ;}
			
				
			if(SITE_TYPE=='DVD_ADULT'){	
				if ($_COOKIE['adult_pwd_public']!=1) 
				{
				echo '<div class="disclaimer_x"><div style="margin-top:200px">';
				require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/login_adultpwd_public.php'));  
				echo '</div></div>';
				}
				echo '<div id="catalog_explain"><div class="catalog_adult_text2">
			    <div class="catalog_adult_title2">'.TITRE_CATALOGX.'</div>
                <p>'.str_replace('[count_x_location]',$count_x_location,str_replace('[count_vodx]',$count_droselia,TEXT_CATALOGX1 )).'</p>
                <p>'.TITRE_CATALOGX2.'</p>
				</div>';
			}
			for ($cpt_list=$min_raw ; $cpt_list<= $max_raw ; $cpt_list++ ) {

				if ($i % 2 ==0){echo '<table width=width="537" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">'; }
				else {echo '<table width=width="537" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">'; }
				$i++; 
				?>
		
				<tr>
		  <td>
		    <table width="537" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#666 1px solid; padding:5px;">
		      <tr>
		                    <td width="294" height="140" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0" >
		                        <tr>
		                          <td width="100" height="150" rowspan="2">
		                          <?php  
					              	switch ($tab[$cpt_list]['products_media']){
										case 'BlueRay' :
											echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
											echo '<a  href="'. products_link($lang_short,$tab[$cpt_list]['products_name'],$tab[$cpt_list]['products_id']).'">';
											echo '<img class="bluborder" src="'.$constants['DIR_WS_IMAGESX'].$tab[$cpt_list]['products_image_big'].'" border="0" width="108" height="144" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
											echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
											break;
										
										default :
											echo '<a href="'. products_link($lang_short,$tab[$cpt_list]['products_name'],$tab[$cpt_list]['products_id']).'">';
											echo '<img src="'.$constants['DIR_WS_IMAGESX'].$tab[$cpt_list]['products_image_big'].'" border="0" width="108" height="162" alt="'.$tag_dvd.'" class="border_dvd">';
											echo '</a></td>';
											echo '<td height="33" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
											break;
									}
								  ?>
		                          <b><?php   echo $tab[$cpt_list]['products_name'];?></b> </td>
		                        </tr>
                                
                    <tr>
                    <td width="92%" valign="top" class="SYNOPSIS">
								<?php   echo substr($tab[$cpt_list]['products_description'],0,250)?> ...<br><br><br>
										<?php   if ($tab[$cpt_list]['products_next']==1 || $tab[$cpt_list]['products_date_available']>= date('Y-m-d 00:00:00') ){
										  	echo TEXT_DISPONIBILITY.' '; 
										   	echo formatAvailability($tab[$cpt_list]['added_today'], $tab[$cpt_list]['products_next'], $tab[$cpt_list]['products_date_available'], $tab[$cpt_list]['products_availability']); 
											}
										?>										
                                </td>
					
		            </tr>
                    
                    </table></td>
		        <td width="120" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
		            <tr valign="middle">
		              <td width="100%" height="20" align="center" class="SLOGAN_BLACK"><?php   
												$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $tab[$cpt_list]['products_id'] . "'");
												$categories_values = tep_db_fetch_array($categories);
												echo '<strong>' . $categories_values['categories_name'] .'</strong>';
												?>
		              </td>
                      
		            </tr>
                    
                    <tr>
		              <td height="8" valign="top">
                      
                      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
		                <tr>
                    	
		              <td height="22"  bgcolor="#ffffff" width="100%"><span class="TYPO_STD_BLACK_bold"> <img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3">
		                    <?php   
												if ($tab[$cpt_list]['products_language_fr']>0){
													echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR_new.gif" style="padding-right:10px; padding-top:5px">';
												}
												if ($tab[$cpt_list]['products_undertitle_nl']>0){
													echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL_new.gif" style="padding-top:5px">';
												}
												?>
							
							
		              </span></td>
                    </tr>
                    <?php
                    if(!empty($tab[$cpt_list]['products_studio'])){
                    ?>
                    <tr valign="top">
					    <td  style="font-size:11px; font-weight:bold; padding-top:2px; font-family:Verdana, Geneva, sans-serif">Studio :</td>
					</tr>
					<tr>
					    <td colspan="2"  class="TYPO_STD_BLACK"><?php
					          		$studio_query = tep_db_query("select studio_id,  studio_name from studio where studio_id=".$tab[$cpt_list]['products_studio']);
					          		$studio_query_values = tep_db_fetch_array($studio_query);
					          		echo '<A class="basiclink" href="'.studios_link($lang_short,$studio_query_values['studio_name'],$studio_query_values['studio_id']).'"><u>' . $studio_query_values['studio_name'] . '</u></A> ';
					        	?>
					    </td>
					  </tr>
					<?php } ?>
                            <tr>
                    			<td style="font-size:11px; font-weight:bold; padding-top:2px; font-family:Verdana, Geneva, sans-serif"><?php   echo TEXT_ACTOR ; ?></td>
                    		</tr>
                            
                            <tr>
		                    
		                    <td height="20" bordercolor="#FFFFFF" bgcolor="#ffffff" ><?php  
															$cpt=1;
															$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $tab[$cpt_list]['products_id'] . "'");
															while ($actors_values = tep_db_fetch_array($actors)) {
																$actors_name = tep_db_query("select an.Actors_Name from " . TABLE_ACTORS. " an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
																$actors_name_values = tep_db_fetch_array($actors_name);
																if ($cpt < 4)
																{
																echo '<b class="TYPO_STD_BLACK_bold"><A href="' .actors_link($lang_short,$actors_name_values['Actors_Name'],$actors_values['actors_id']) . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
																$cpt++;
																}							 
															} 
															?>
		                    </td>
		                  </tr>
		                  
		                        
		                        
		                          
		                              <tr>
		                            
		                                <td align="right" style="padding-top:10px;"><a href="subscription.php">
											<a href="<?= $link_freetrial ?>">
                                            
												<?php   if ($tab[$cpt_list]['products_next']==1){
													echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0">';
												}else{
													echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0">';
												}?>
											</a>
										</td>
		                              </tr>
		                          </table></td>
		                        </tr>
		                    </table></td>
		                    
		                </table></TD>
				</TR>
				<tr>
					<td><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
				</tr>
			</table>
		  <?php   }
		  ?>  
		  <table width="537" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
				<td ><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
				<td  width="274" align="right" class="SLOGAN_orange">
				
				<?php   
				echo $listing_split->display_links($count_dvd, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); 
				?>
				</td>
			</tr>
		  </table>
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		      <tr>
		        <td>&nbsp;</td>
		      </tr>
		      <tr>
		        <td>
		          <?php  
				  switch(WEB_SITE_ID)
				  {
				  case 29:
					$href='login.php';			
					break; 		
				  case 26:
					$href='step1.php?activation_code=BL4DVD';
					$img_button="buttonBL.gif";
					$img_promo="promoBL2.gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
				  case 3:
					$href='step1.php?activation_code=MSN4DVD';
					$img_button="button.gif";
					$img_promo="promo2.gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break; 
				  case 4:
					$href='step1.php?activation_code=MSN4DVD';
					$img_button="button".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
					$img_promo="promo2".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
				  default:
					$href='step1.php';
					$img_button="button".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
						 switch(ENTITY_ID)
							{
							case 38 : 
								$img_promo="promo2".((SITE_TYPE=='DVD_ADULT')?'x':'')."NL.gif";
								break;
								
							default :
								$img_promo="promo2".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
								break;						
							}
					
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
					}        
		        ?>  
		        
		        </td>
		      </tr>
		    </table>
		<?php   
		}else{ ?>
			<table width="537" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tr>
			    <td height="15"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
			  </tr>
			  <tr>
				<td width="526" height="34" bgcolor="#ffffff" align="center" class="TYPO_STD_BLACK_BOLD"><?php   echo TEXT_NO_MATCHING_SEARCH ;?></td>
			  </tr>
		    </table>
		<?php   } ?>
	</td>
  </tr>
</table>
</div>