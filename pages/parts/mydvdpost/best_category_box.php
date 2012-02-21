<br>
<?php  

$sql_wishlist_categories="Select count(ptc.categories_id) as cpt,ptc.categories_id from products_to_categories ptc LEFT JOIN wishlist w ON ptc.products_id=w.product_id  where wishlist_type = 'DVD_NORM'AND w.customers_id=".$customer_id." group by ptc.categories_id  order by cpt DESC LIMIT 10"; //BEN001
$tab_categories=array();
$wishlist_count=tep_db_query($sql_wishlist_categories);
while ($wishlist_count_values = tep_db_fetch_array($wishlist_count)){
	$tab_categories[]=$wishlist_count_values['categories_id'];
}
//
if (count($tab_categories)>0) 
{
	$cat=$tab_categories[array_rand($tab_categories)];
	$sql_category='select categories_name ,categories_id from categories_description where language_id='.$languages_id.' and categories_id='.$cat;
	$category_name_values_tab=tep_db_cache($sql_category,14400);
}
else
{
	
	$sql_category='select categories_name,c.categories_id from categories_description cd join categories c on c.categories_id = cd.categories_id where language_id='.$languages_id.' and categories_type="DVD_NORM" and product_type="movie" and show_home="YES" ';

	$category_name_values_tab=tep_db_cache($sql_category,14400,1);
}
	
	
     
	$category_name_values = $category_name_values_tab[0];
	?>
	<table border="0" align="right" cellpadding="0" cellspacing="0" width="100%">
  		<tr>
			<td colspan="13" height="30" valign="top" align="left"><b><?php   echo TEXT_CATEGORY ;?> : <?php   echo $category_name_values['categories_name'];?></b> <a href="listing_category.php?cPath=<?php   echo $category_name_values['categories_id'];?>" class="link_SLOGAN_MENU2">(<?php   echo TEXT_SEE_ALL ;?>)</a></td>
  		</tr>
  		<tr>  			
			<?php  
			$listing_sql='select p.products_id, pd.products_image_big, p.rating_users,p.rating_count,pd.products_name from products_description pd ';
			$listing_sql.=' inner join products p on p.products_id=pd.products_id ';
			$listing_sql.=' inner join products_to_categories p2c on p2c.products_id = pd.products_id '; 
			$listing_sql.=' where p.products_status != -1 and pd.language_id =' . $languages_id .'  and p2c.categories_id ='.$category_name_values['categories_id'];
			$listing_sql.= ' and p.products_type = "DVD_NORM" '; //BEN001
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
			$listing_sql.=' order by rand() LIMIT 350 ';
			
			
			$sql_wishlist='select product_id,priority from wishlist where customers_id ='.$customer_id;
			$sql_wishlist_assigned='select products_id from wishlist_assigned where customers_id ='.$customer_id;
			$listing_tab = tep_db_cache_asso($listing_sql,'products_id',14400);
			$sql_wishlist_tab = tep_db_cache_asso($sql_wishlist,'product_id',14400);
			$sql_wishlist_assigned_tab = tep_db_cache_asso($sql_wishlist_assigned,'products_id',14400);

			$listing_tab=array_diff_key($listing_tab,$sql_wishlist_tab,$sql_wishlist_assigned_tab);
			$listing_tab=tep_db_rand($listing_tab,7);

			$cpt=1;
			foreach ($listing_tab as $listing_query_values) {
					echo '<td align="center" valign="bottom"><table><tr><td class="dvdpost_brown" height="30" align="center" valign="middle"><b>'. substr($listing_query_values['products_name'], 0, 30).'</b><td></tr>';
					switch ($listing_query_values['products_media']){
					case 'BlueRay' :
						echo '<tr><td><table cellspacing="0" cellpadding="0"><tr><td><img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="product_info.php?products_id='.$listing_query_values['products_id'].'">';
						echo '<img class="bluborder" src="'.$constants['DIR_DVD_WS_IMAGES'].'/'.$listing_query_values['products_image_big'].'" border="0" width="88" height="118" alt="'.$listing_query_values['products_name'].'" valign="top"></a></td></tr></table>';
						echo '</td></tr>';
						break;
					
					default :
						echo '<tr><td><a href="product_info.php?products_id='. $listing_query_values['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$listing_query_values['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a></td></tr>';
						break;
					}	
					//$data_avg_count=avg_count_fct($listing_query_values['products_id'],$listing_query_values['imdb_id']);
					//echo '<tr><td align="center" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$data_avg_count['avg'].'.gif" height="13" align="absmiddle" border="0"></td></tr>';
					$data_avg_count=avg_count_fct($listing_query_values['rating_users'],$listing_query_values['rating_count']);
					$jsrate=$data_avg_count['avg'];
					echo '<tr><td align="left" valign="middle" height="22"><img src="' . DIR_WS_IMAGES . 'starbar/stars_1_' . $jsrate . '.gif"></td></tr>';
										
					echo '<tr>';
					add_wishlist($listing_query_values['products_id'] , $customers_id, $language,$PHP_SELF, $_SERVER['QUERY_STRING'],"center");
					if ($cpt<7){
						echo '</tr></table></td><td>&nbsp;</td>';
						$cpt++;
						}else{
						echo '</tr></table></td>';	
				}					
			}				
			?>		
		</tr>		
	</table>
	