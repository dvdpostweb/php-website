<div class="main-holder">

<table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td  width="170" valign="top" id="left_menu" class="limitedathome">
			<?php   
			if(SITE_TYPE=='DVD_ADULT')
				include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public_adult.php')); 
			else
				include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public.php')); 
			
			?>
	</td>
	
    <td width="" class="" valign="top">
<?
$studio_info = tep_db_query("select studio_name from studio where studio_id = '" . $HTTP_GET_VARS['studio_id'] . "' AND  studio_type='DVD_ADULT' ");
if (!tep_db_num_rows($studio_info)) { // product not found in database 
?>
<table width="560" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td class="TYPO_STD2_BLACK" align="center"><br><?php   echo TEXT_PRODUCT_NOT_FOUND; ?></td>
</tr>
<tr>
	<td align="center"><br><a href="<?php   echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php   echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
</tr>
</table>
<?php  
} else { 
//there is an Adult Studio
$studio_info_values = tep_db_fetch_array($studio_info);
	if ($_COOKIE['adult_pwd_public']!=1) 
	{
		echo '<div class="disclaimer_x"><div style="margin-top:200px">';
		require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/login_adultpwd_public.php'));  
		echo '</div></div>';
	}
	echo '<div id="catalog_explain">
			<div class="catalog_adult_text2">
				<div class="catalog_adult_text2">
    				<div class="catalog_adult_title2">'.TITRE_CATALOGX.'</div>
    					<p>'.str_replace('[count_x_location]',$count_x_location,str_replace('[count_vodx]',$count_droselia,TEXT_CATALOGX1 )).'</p>
    					<p>'.TITRE_CATALOGX2.'</p>
					</div>
				</div>
			</div>
		</div>';
	switch (ENTITY_ID){
			case 38 : 
				$try_banner='bouton_freetrial_catalogue'.((SITE_TYPE=='DVD_ADULT')?'x':'').'_nl.gif';
				break;
				
			default :
				$try_banner='bouton_freetrial_catalogue'.((SITE_TYPE=='DVD_ADULT')?'x':'').'.gif';
				break;	
		}
		
		echo '<div id="catalog_button"><a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'" align="right"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/'.$try_banner.'" border="0"></a></div>';
    
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="560">
	
 <tr>
  	<td  height="40" align="center" class="category_name">
	<?php   echo TEXT_FILMOGRAPHY . ' : ' . $studio_info_values['studio_name'] ; ?>
	<br />
	</td>
  </tr>

</table><br />

<?php  
	$i=1;
	//BEN001 $a = tep_db_query("select products_id  from products_adult where only_for_sale=0 and  manufacturers_id = '" . $HTTP_GET_VARS['manufacturers_id'] . "'  ");
	$sql="select p.products_id,p.only_for_sale,p.rating_users,p.rating_count, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_public, p.products_runtime, p.products_year, p.products_picture_format , p.products_rating ,p.manufacturers_id, p.products_regional_code, p.products_studio, p.products_availability,p.products_language_fr, p.products_undertitle_nl, pd.products_image_big  from products p join products_description pd on p.products_id = pd.products_id where products_type = 'DVD_ADULT' and only_for_sale=0 and  products_studio = '" . $HTTP_GET_VARS['studio_id'] . "' AND  products_status>-1  and pd.language_id = '" . $languages_id . "'";
	//echo $sql;
	$a = tep_db_query($sql); //BEN001
	$studio_name = tep_db_query("select studio_name from studio where studio_id = '" . $HTTP_GET_VARS['studio_id'] . "'");  
	$studio_name_values = tep_db_fetch_array($studio_name);
		$path=$constants['DIR_WS_IMAGESX'];
	while ($product_info_values = tep_db_fetch_array($a)) {


	//RALPH-002 $actors = tep_db_query("select a.actors_id from products_to_actors_adult a where a.products_id = '" . $product_info_values['products_id'] . "'");  
	$actors = tep_db_query("select a.actors_id from products_to_actors a where a.products_id = '" . $product_info_values['products_id'] . "'");   //RALPH-002
									
			if ($i % 2 ==0){echo '<table width="540" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">'; }
			else {echo '<table width="540" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
			$i++;
?>
<tr>
  <td>
    <table width="537" border="0" align="center" cellpadding="0" cellspacing="0" style="border:#666 1px solid; padding:5px;">
      <tr>
        <td width="294" height="140" valign="top">
			<table width="100%"  border="0" cellpadding="0" cellspacing="0" >
            <tr>
              <td width="100" height="150" rowspan="2">
              	<?php 
              		$tag_dvd=TXT_TAG_DVD;
					$tag_dvd=str_replace('µµµdvdµµµ', $product_info_values['products_name'], $tag_dvd);
					$tag_dvd=str_replace('µµµactorµµµ', $actor_info_values['Actors_Name'], $tag_dvd);
	              	switch ($product_info_values['products_media']){      
						case 'BlueRay' :
							echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
							echo '<a  href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'">';
							echo '<img class="bluborder" src="'.$path.$product_info_values['products_image_big'].'" border="0" width="108" height="144" alt="'.$tag_dvd.'" title="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
							echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
							break;
						
						default :
							echo '<a href="'. products_link($lang_short,$product_info_values['products_name'],$product_info_values['products_id']).'">';
							echo '<img src="'.$path.$product_info_values['products_image_big'].'" border="0" width="108" height="162" alt="'.$tag_dvd.'" title="'.$tag_dvd.'" class="border_dvd">';
							echo '</a></td>';
							echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
							break;
					}
					?>
              <b><?php   echo $product_info_values['products_name'];?></b> 
			</td>
            </tr>
            <tr>
            <td width="92%" valign="top" class="SYNOPSIS">
						<?php   echo substr($product_info_values['products_description'],0,250)?> ...<br><br><br>
						<?php   if ($product_info_values['products_next']==1 || $product_info_values['products_date_available']>= date('Y-m-d 00:00:00') ){
						  	echo TEXT_DISPONIBILITY.' '; 
						   	echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
							}
						?>
                        </td>
			
            </tr>
            
        </table></td>
        <td width="120" valign="top"><table width="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr valign="middle">
              <td width="100%" height="20" align="center" class="SLOGAN_BLACK"><?php   
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
            <tr valign="top">
			    <td  class="TYPO_STD_BLACK_bold">Studio :</td>
			</tr>
			<tr>
			    <td colspan="2"  class="TYPO_STD_BLACK"><?php 
			          		$studio_query = tep_db_query("select studio_id,  studio_name from studio where studio_id=".$product_info_values['products_studio']);
			          		$studio_query_values = tep_db_fetch_array($studio_query);
			          		echo '<A class="basiclink" href="'.studios_link($lang_short,$studio_query_values['studio_name'],$studio_query_values['studio_id']).'"><u>' . $studio_query_values['studio_name'] . '</u></A> ';
			        	?>
			    </td>
			  </tr>
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
														echo '<span class="TYPO_STD_BLACK_bold"><A href="'.actors_link($lang_short,$actors_name_values['Actors_Name'],$actors_values['actors_id']) . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></span>';						 
														$cpt++;
														}							 
													} 
													?>
                    </td>
                  </tr>
                  <tr>
                    
                    <td align="right" style="padding-top:10px;"><a href="<?= $link_freetrial?>">
					<?php   if ($product_info_values['products_next']==1){
						echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0">';
					}else{
						echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0">';
					}?>
					</a></td>
                  </tr>
              </table></td>
            </tr>
        </table></td></tr>
      </table>	</td></tr>
    </table>
  <?php   } ?>

<?
}?>
</td>
	</tr>

</table>
</div>
