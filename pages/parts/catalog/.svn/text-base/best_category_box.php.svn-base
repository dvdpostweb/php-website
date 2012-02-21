<?php
	$cat= rand(1,52);	
    $category_name = tep_db_query('select categories_name  from categories_description where language_id='.$languages_id.' and categories_id='.$cat);  
	$category_name_values = tep_db_fetch_array($category_name);
	?>
	<table border="0" align="center" cellpadding="0" cellspacing="0" width="98%">
  		<tr>
			<td colspan="9" height="30" valign="top" align="left"><b><?php echo TEXT_CATEGORY ;?> : <?php echo $category_name_values['categories_name'];?></b> <a href="listing_category_public.php?cPath=<?php echo $cat;?>" class="link_SLOGAN_MENU2">(<?php echo TEXT_SEE_ALL ;?>)</a></td>
  		</tr>
  		<tr>  			
			<?php
			$listing_sql='select DISTINCT p.products_id,p.products_media, pd.products_image_big, p.products_rating, products_next,  p.products_availability, p.products_language_fr,pd.products_name, p.products_undertitle_nl from products_description pd ';
			$listing_sql.=' LEFT JOIN products p on p.products_id=pd.products_id ';
			$listing_sql.=' LEFT JOIN products_to_categories p2c on p.products_id=p2c.products_id  '; 
			$listing_sql.='where p.products_status =1 and pd.language_id =' . $languages_id .' and pd.products_id=p2c.products_id and p2c.categories_id ='.$cat;
			$listing_sql.= ' and p.products_type = "DVD_NORM" and p.products_status>-1 '; //BEN001
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
			$listing_sql.=' and p.products_availability>0 and p.products_rating>3 order by rand() LIMIT 5 ';
			$listing_query = tep_db_query($listing_sql);
			$cpt=1;
			while ($listing_query_values = tep_db_fetch_array($listing_query)){								
					echo '<td align="center" valign="bottom"><table><tr><td class="dvdpost_brown" height="30" align="center" valign="middle"><b>'. substr($listing_query_values['products_name'], 0, 30).'</b><td></tr>';
					switch ($top['products_media']){
					case 'BlueRay' :
						echo '<tr><td><table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="product_info.php?products_id='.$listing_query_values['products_id'].'">';
						echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$listing_query_values['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						echo '</td></tr>';
						break;
					
					default :
						echo '<tr><td><a href="product_info_public.php?products_id='. $listing_query_values['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$listing_query_values['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a></td></tr>';
						break;
					}					
					$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $listing_query_values['products_id'] . "'");
					$ratings_average_values = tep_db_fetch_array($ratings_average);
					$rate = round($ratings_average_values['prave'],1)*10;
					echo '<tr><td align="center" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$rate.'.gif" height="13" align="absmiddle" border="0"></td></tr>';					
					echo '<tr>';
					echo '<td align="center">';
					if ($listing_query_values['products_next']==1){
							echo '<a href="product_info_public.php?products_id='.$listing_query_values['products_id'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0"></a>';
							echo TEXT_DISPONIBILITY; 
							echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
						}else{
							echo '<a href="product_info_public.php?products_id='.$listing_query_values['products_id'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0"></a>';
					}					
					echo '</td>';
					if ($cpt<5){
						echo '</tr></table></td><td>&nbsp;</td>';
						$cpt++;
						}else{
						echo '</tr></table></td>';	
				}					
			}				
			?>		
		</tr>		
	</table>