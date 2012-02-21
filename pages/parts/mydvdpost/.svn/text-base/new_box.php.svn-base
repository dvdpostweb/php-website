<br>
<table width="243" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	 <td colspan="2" height="30" valign="top" align="left"><b><?php   echo TEXT_NEW;?></b> <a href="listing_category.php?list=new" class="link_SLOGAN_MENU2">(<?php   echo TEXT_SEE_ALL ;?>)</a></td>
  	 <td width="10" background="<?php   echo  DIR_WS_IMAGES ;?>vert_line.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif"></td>
	</tr>
    <?php  
		$new_sql = 'select p.products_id, pd.products_name , pd.products_description , pd.products_image_big,p.imdb_id,p.products_rating,p.rating_users,p.rating_count from ' . TABLE_PRODUCTS . ' p ';
		$new_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
		$new_sql.= ' where p.products_availability>0 ';
		$new_sql.= ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 3 MONTH) and p.products_next=0  and (p.rating_users/p.rating_count)>=3 and p.products_status!= -1 ';
		$new_sql.= ' and p.products_type = "DVD_NORM"'; //BEN001
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
		$sql_wishlist='select product_id,priority from wishlist where customers_id ='.$customer_id;
		$sql_wishlist_assigned='select products_id from wishlist_assigned where customers_id ='.$customer_id;
		$top_tab = tep_db_cache_asso($new_sql,'products_id',14400);
		$sql_wishlist_tab = tep_db_cache_asso($sql_wishlist,'product_id',14400);
		$sql_wishlist_assigned_tab = tep_db_cache_asso($sql_wishlist_assigned,'products_id',14400);

		$top_tab=array_diff_key($top_tab,$sql_wishlist_tab,$sql_wishlist_assigned_tab);

		$top_tab=tep_db_rand($top_tab,3);

		foreach ($top_tab as $top) {
			echo'<tr><td width="100" align="left" height="150">';
	          	switch ($top['products_media']){
					case 'BlueRay' :
						echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.DIR_WS_IMAGES.'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a  href="product_info.php?products_id='.$top['products_id'].'">';
						echo '<img class="bluborder" src="'.DIR_DVD_WS_IMAGES.$top['products_image_big'].'" border="0" width="88" height="118" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						echo '<td width="133"><table width="100%" valign="top" cellspacing="0" cellpadding="0" border="0">';
						break;
					
					default :
						echo '<a href="product_info.php?products_id='.$top['products_id'].'">';
						echo '<img src="'.DIR_DVD_WS_IMAGES.$top['products_image_big'].'" border="0" width="90" height="135" alt="'.$tag_dvd.'">';
						echo '</a></td>';
						echo '<td width="133"><table width="100%" valign="top" cellspacing="0" cellpadding="0" border="0">';
						break;
				}
			echo'<tr><td class="dvdpost_brown" align="left"><b>'. $top['products_name'] .'</b></td></tr>';
			echo'<tr><td class="TYPO_STD_GREY" valign="top" align="left">'. substr($top['products_description'], 0, 142) .'...</td></tr>';
			//$data_avg_count=avg_count_fct($top['products_id'],$top['imdb_id']);
			//echo '<tr><td align="left" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$data_avg_count['avg'].'.gif" height="13" align="absmiddle" border="0"></td></tr><tr>';
			$data_avg_count=avg_count_fct($top['rating_users'],$top['rating_count']);
			$jsrate=$data_avg_count['avg'];
			echo '<tr><td align="left" valign="middle" height="22"><img src="' . DIR_WS_IMAGES . 'starbar/stars_1_' . $jsrate . '.gif"></td></tr><tr>';
			add_wishlist($top['products_id'] , $customers_id, $language,$PHP_SELF, $_SERVER['QUERY_STRING'],"left");
			echo '</tr></table></td><td width="10" background="'. DIR_WS_IMAGES.'vert_line.gif"><img src="'. DIR_WS_IMAGES.'blank.gif"></td></tr>';
		}		
	?>		
</table>
