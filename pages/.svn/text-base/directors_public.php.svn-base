
<div class="main-holder">

<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td  width="170" valign="top" id="left_menu" class="limitedathome">
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public.php')); ?>
	</td>
	
    <td width="560" class="how_explain_actor" valign="top">
		<?php 
		$director_info = tep_db_query("select Directors_Name from " . TABLE_DIRECTORS . " where Directors_id = '" . $HTTP_GET_VARS['directors_id'] . "' ");
		if (!tep_db_num_rows($director_info)) { // product not found in database 
		?>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
		<tr>
			<td class="TYPO_STD2_BLACK" align="center"><br><?php  echo TEXT_PRODUCT_NOT_FOUND; ?></td>
		</tr>
		<tr>
			<td align="center"><br><a href="<?php  echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php  echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
		</tr>
		</table>
		<?php 
		} else { 
		//there is an director
		$director_info_values = tep_db_fetch_array($director_info);
		?>
        
        
<table width="560" cellpadding="0" cellspacing="0" border="0" align="center">  	
	<tr height="5">
    <td><h2><?php   echo $director_info_values['Directors_Name'] ; ?></h2></td>
		<?php 
		//movies count
		$movies_count = tep_db_query("select count(products_id) as cpt  from products where products_directors_id = '" . $HTTP_GET_VARS['directors_id'] . "'  ");
		$movies_count_value = tep_db_fetch_array($movies_count);	
		?>
		<td align="right" class="actor_director_count_text_v4">
			<h2>
				<?php  echo $movies_count_value['cpt'];?>
			
			<?php  
				if ($movies_count_value['cpt']>1){
					echo TXT_TITLES_ON ;
				}else{echo TXT_TITLE_ON ;}	
				?> DVDpost.be</h2></td>
	</tr>


	
	<tr>
	<?php 
	$movies_list = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.rating_users,p.rating_count,pd.products_image_big FROM products p LEFT JOIN products_description pd on p.products_id=pd.products_id and pd.language_id='".$languages_id."' where p.products_directors_id = '" . $HTTP_GET_VARS['directors_id'] . "' and p.products_status>-1 group by pd.products_name ");
	$movies_list_value = tep_db_fetch_array($movies_list);			
	$data_avg_count=avg_count_fct($movies_list_value['rating_users'],$movies_list_value['rating_count']);
	$jsrate=$data_avg_count['avg'];
	if ($movies_count_value['cpt']>1){
	?>	
    
     
    <td bgcolor="#FFFFFF" width="355" class="actor_director_name_v4"> 
      <table width="100%">
        <tr>
					
          <td rowspan="3" valign="top">
			<a href="<?= products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']);?>">
				<?php 
					$tag_dvd=TXT_TAG_DVD;
					$tag_dvd=str_replace('µµµdvdµµµ', $movies_list_value['products_name'], $tag_dvd);
					$tag_dvd=str_replace('µµµdirectorµµµ', $director_info_values['Directors_Name'], $tag_dvd);					
				
					echo '<img src="'.DIR_DVD_WS_IMAGES.$movies_list_value['products_image_big'].'" alt="'.$tag_dvd.'" title="'.$tag_dvd.'" width="108" height="162" border="0">';
				?>
			</a>
		   </td>
		   <td height="20" class="dvdpost_dvd_desc_v4"><strong><?php  echo $movies_list_value['products_name'];?></strong></td>
		</tr>
		<tr>
			<td height="20" ><img src="<?php echo $constants['DIR_WS_IMAGES'] ;?>/starbar/stars_1_<?php  echo $jsrate ;?>.gif" align="absmiddle"></td>
		</tr>
				<tr>
					<td class="dvdpost_dvd_desc_4b">
						<?php  echo substr($movies_list_value['products_description'],0,290) ;?>...						 
					</td>
				</tr>
			</table>			
		
    </td>
		
    <td width="185" valign="top" bgcolor="#FFFFFF" class="border_left_v4"> 
      <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
				<tr>					
					<td width="185" height="22" class="dvdpost_bio_titles_v4"><?php  echo TXT_FILMOGRAPHY ;?></td>
				</tr>
			</table>
			
      <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">                 
      	<?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?>          	
		<?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?> 		
        <?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?> 		
        <?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?> 		
        <?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?> 		
        <?php  
			if ($movies_list_value = tep_db_fetch_array($movies_list)){
			echo '<tr><td width="185" height="22" class="dvdpost_dvd_titles_v4">';
			echo '<strong><a class="dvdpost_dvd_titles_v5" href="'.products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']).'">'.$movies_list_value['products_name'].'</a></strong>';
			echo '</td></tr>';
			}
		?> 
		<tr>					
          <td width="185" height="22" class="dvdpost_dvd_all_titles_v4"><a href="<?php  echo ((!empty($_SERVER['REDIRECT_URL']))?$_SERVER['REDIRECT_URL']:$_SERVER['PHP_SELF']);?>?showtitles=1<?php  $query=remove_get($_GET,array('language','directors_id')); echo ((!empty($query))?'&'.$query:'');?>" class="dvdpost_dvd_all_titles_v4"><?php  echo TXT_VIEW_ALL ;?></a> 
            ...</td>
		</tr>			
		</table>		
    </td>
    <?php 
		}else{			
	?>
	<td bgcolor="#FFFFFF" width="355" class="actor_director_name_v4"> 
      <table width="100%">
        <tr>
				
      <td rowspan="3" valign="top"><a href="<?= products_link($lang_short,$movies_list_value['products_name'],$movies_list_value['products_id']);?>"><img src="<?php  echo DIR_DVD_WS_IMAGES. $movies_list_value['products_image_big'];?>" width="108" height="162" border="0"></a></td>
				<td height="20" class="dvdpost_dvd_desc_v4"><strong><?php  echo $movies_list_value['products_name'];?></strong></td>
			</tr>
			<tr>
				<td height="20" ><img src="<?php  echo  $constants['DIR_WS_IMAGES'].'/starbar/stars_1_'.$jsrate;?>.gif" align="absmiddle"></td>
			</tr>
			<tr>
				<td class="dvdpost_dvd_desc_4b">
					<?php  echo substr($movies_list_value['products_description'],0,290) ;?>...						 
				</td>
			</tr>
	</table>			
    </td>
	<?php 	
		}
		
		
	switch (ENTITY_ID){
	case 38 : 
		$try_banner='tryNL.gif';
		break;
		
	default :
		$try_banner='try.gif';
		break;	
	}
	?>
	</tr>
	<tr>
		<td align="left" height="40" class="dvdpost_mention_v42" bgcolor="#FFFFFF" colspan="2">
			<strong><?php   echo TXT_TRY_DVDPOST_AND_RENT .' '.$director_info_values['Directors_Name'] ; ?></strong></td>
	</tr>
	<tr>
		<td align="left" height="40" class="dvdpost_mention_v42" bgcolor="#FFFFFF" colspan="2">			
			<a href="<?php  echo $link_freetrial ;?>"><img src="<?php  echo DIR_WS_IMAGES.'languages/'.$language.'/images/promo/'.$try_banner ;?>" border="0"></a>
		</td>
	</tr>
	<tr>
		<td align="left" height="40" class="dvdpost_mention_v42" bgcolor="#FFFFFF" colspan="2">
			<span class="dvdpost_dvd_titles_v4"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="510" height="1"></span>
		</td>
	</tr>
	<?php 
	if ($showtitles==0){
	?>
	<tr>
		<td align="left" height="40" class="dvdpost_mention_v42" bgcolor="#FFFFFF" colspan="2"><strong><?php  echo TXT_HOW_DOES_IT_WORK ;?></strong></td>
	</tr>
	<tr>
		<td align="center" class="dvdpost_mention_v42" bgcolor="#FFFFFF" colspan="2">
			<img src="<?php  echo DIR_WS_IMAGES.'languages/'.$language.'/images/promo/rotate.jpg';?>">
		</td>
	</tr>
	<?php  } ?>
</table>
		
		
		
	<?php 
	if ($showtitles>0){
	?>		
		<?php 
			$i=1;
			//BEN001 $a = tep_db_query("select products_id  from " . TABLE_PRODUCTS. " where products_directors_id = '" . $HTTP_GET_VARS['directors_id'] . "'  ");
			$a = tep_db_query("select products_id  from " . TABLE_PRODUCTS. " where products_directors_id = '" . $HTTP_GET_VARS['directors_id'] . "' and products_type = 'DVD_NORM' and products_product_type= 'Movie'  and products_status>-1 "); //BEN001
			while ($a_v = tep_db_fetch_array($a)) {
			$product_info = tep_db_query("select p.products_id,p.products_media , pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image,p.products_next, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_public, p.products_runtime, p.products_year, p.products_picture_format , p.products_rating ,p.products_directors_id, pc.categories_id, p.products_regional_code, p.products_studio,p.products_availability,p.products_language_fr, p.products_undertitle_nl,pd.products_image_big  from products p LEFT JOIN products_description pd on pd.products_id=p.products_id LEFT JOIN products_to_categories pc on pc.products_id=p.products_id where p.products_id = '" . $a_v['products_id'] . "' and pd.language_id = '" . $languages_id . "'");
			$product_info_values = tep_db_fetch_array($product_info);
			//$directors_name = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");  
			//$directors_name_values = tep_db_fetch_array($directors_name);	
			//$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $product_info_values['products_id'] . "'");  
			
			
				if ($i % 2 ==0){echo '<table width="100%" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">'; }
				else {echo '<table width="100%" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">'; }
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
		              		$tag_dvd=TXT_TAG_DVD;
							$tag_dvd=str_replace('µµµdvdµµµ', $product_info_values['products_name'], $tag_dvd);
							$tag_dvd=str_replace('µµµdirectorµµµ', $director_info_values['Directors_Name'], $tag_dvd);
			              	switch ($product_info_values['products_media']){
								case 'BlueRay' :
									echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
									echo '<a  href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'">';
									echo '<img class="bluborder" src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="108" height="144" alt="'.$tag_dvd.'" title="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
									echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
									break;
								
								default :
									echo '<a href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'">';
									echo '<img class="border_dvd" src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="108" height="162" alt="'.$tag_dvd.'" title="'.$tag_dvd.'">';
									echo '</a></td>';
									echo '<td height="33" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
									break;
							}
							?>
						<b><?php  echo $product_info_values['products_name'];?></b> </td>
		            </tr>
                    
                    <tr>
                    <td width="92%" valign="top" class="SYNOPSIS">
								<?php   echo substr($product_info_values['products_description'],0,250)?> ...<br><br><br>
								<?php   if ($product_info_values['products_next']==1 || $product_info_values['products_date_available']>= date('Y-m-d 00:00:00') ){
								  	echo TEXT_DISPONIBILITY.' '; 
								   	echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
									}
								?>
					
		            </tr>
                    </table></td>
		        <td width="120" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
		            <tr valign="middle">
		              <td width="100%" height="20" align="center" class="SLOGAN_BLACK">
                      <?php   
												$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
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
								if ($product_info_values['products_language_fr']>0){
									echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR_new.gif" style="padding-right:10px; padding-top:5px">';
								}
								if ($product_info_values['products_undertitle_nl']>0){
									echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL_new.gif" style="padding-top:5px">';
								}
							?>
		              </span></td>
                    </tr>
                    <tr>
		            <td style="font-size:11px; font-weight:bold; padding-top:2px; font-family:Verdana, Geneva, sans-serif"><?php   echo TEXT_REALISATOR ; ?></td>
                    
                    </tr>
                    <tr >
		                    
		                    <td height="20" bordercolor="#FFFFFF" bgcolor="#ffffff" class="SLOGAN_DETAIL"><?php  
															$directors = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");
															$directors_values = tep_db_fetch_array($directors);														
															echo '<b class="TYPO_STD_BLACK_bold"><a href="'. directors_link($lang_short,$directors_values['Directors_name'],$product_info_values['products_directors_id']). '" class="basiclink"><u>'. $directors_values['Directors_name']. '</u></a><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
															?>
		                    </td>
		                  </tr>
                          
                          <tr>
                    <td style="font-size:11px; font-weight:bold; padding-top:2px; font-family:Verdana, Geneva, sans-serif"><?php   echo TEXT_ACTOR ; ?></td>
                    
                    </tr>
                    
                    <tr>
		                    
		                    <td height="20" bordercolor="#FFFFFF" bgcolor="#ffffff" ><?php  
															$cpt=1;
															$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $product_info_values['products_id'] . "'");
															while ($actors_values = tep_db_fetch_array($actors)) {
																$actors_name = tep_db_query("select an.Actors_Name from " . TABLE_ACTORS. " an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
																$actors_name_values = tep_db_fetch_array($actors_name);
																if ($cpt < 4)
																{
																echo '<span class="TYPO_STD_BLACK_bold"><A href="' .actors_link($lang_short,$actors_name_values['Actors_Name'],$actors_values['actors_id']) . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></span>';						 
																$cpt++;
																}							 
															} 
															?>
		                    </td>
		                  </tr>
                          <tr>
		                    
		                    <td align="right" style="padding-top:10px;"><a href="/step1.php">
							<?php   if ($product_info_values['products_next']==1){
								echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0">';
							}else{
								echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0">';
							}?>
							</a></td>
		                  </tr>
		              </table></td>
		            </tr>
		        </table></td>
		      </tr>
		    </table></TD>
		</TR>
		  <tr>
		   <td><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
		  </tr>
		</table>		
		  <?php   }
		  ?>
		  <table width="369" valign="top"  align="right" height="80" border="0" cellpadding="0" cellspacing="0">	
			
			<tr>
				<td valign="middle" nowrap><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="3" height="3"></td>
			</tr>
		</table>
		<?php 
		}?>
		
		</td>
	</tr>

</table>

<?php  } ?>

</div>
