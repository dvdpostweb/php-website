	<table border="0" align="center" cellpadding="0" cellspacing="0" width="560">
  		<tr>
			<td colspan="9"  width="100" height="30" valign="middle" align="left" class="category_name"><?php echo $cat_name?> <a href="<?= get_cats($cat,'',$lang_short)?>" class="link_SLOGAN_MENU2">(<?php echo TEXT_VIEW_MORE ;?>)</a></td>
  		</tr>
  		<tr>  			
			<?php
			$listing_sql='select DISTINCT p.products_id,p.products_media, pd.products_image_big, p.products_rating, products_next,  p.products_availability, p.products_language_fr,pd.products_name, p.products_undertitle_nl from products_description pd ';
			$listing_sql.=' LEFT JOIN products p on p.products_id=pd.products_id ';
			$listing_sql.=' LEFT JOIN products_to_categories p2c on p.products_id=p2c.products_id  '; 
			$listing_sql.='where pd.language_id =' . $languages_id .' and pd.products_id=p2c.products_id and p2c.categories_id ='.$cat;
			$listing_sql.= ' and p.products_type = "DVD_NORM" and p.products_product_type= "Movie" and p.products_status>-1 '; //BEN001
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
			$listing_sql.=' and p.products_rating>=3 and p.products_id not in ('.$restrict.') group by imdb_id  order by products_date_available  desc LIMIT 200 ';
			
			$listing = tep_db_cache($listing_sql,14400,5);
			$cpt=1;
			foreach($listing as $listing_query_values){	
					$restrict.= ', '.$listing_query_values['products_id'] ; 
					echo '
							<td align="center">
								<table>';
					switch ($top['products_media']){
					case 'BlueRay' :
						echo '<tr><td height="118"><table cellspacing="0" cellpadding="0"><tr><td><br /><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="'. products_link($lang_short,$listing_query_values['products_name'],$listing_query_values['products_id']).'">';
						echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$listing_query_values['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						echo '</td></tr>';
						break;
					
					default :
						echo '<tr><td><br/><a href="'. products_link($lang_short,$listing_query_values['products_name'],$listing_query_values['products_id']).'"><img class="border_dvd" src="'.DIR_DVD_WS_IMAGES.$listing_query_values['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a></td></tr>';
						break;
					}	
					echo '<tr>
							<td width="98" height="47" align="center" valign="top"><a  href="'. products_link($lang_short,$listing_query_values['products_name'],$listing_query_values['products_id']).'" class="dvdtitle_link">'. substr($listing_query_values['products_name'], 0, 30).'</a>
							</td>
						  </tr>';
					if ($cpt<5){
						echo '</table></td><td></td>';
						$cpt++;
						}else{
						echo '</table></td>';	
				}					
			}				
			?>		
		</tr>
		<tr><td colspan="9" height="20">&nbsp;</td></tr>		
	</table>