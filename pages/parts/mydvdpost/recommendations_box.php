<table width="731" cellspacing="0" cellpadding="0" border="0" align="0">
	<tr>
		<td width="15" height="41"><img src="<?php    echo DIR_WS_IMAGES ;?>box_recom/left_top.gif"></td>
		<td width="701"  bgcolor="#EDCD9C" align="left" valign="middle"><b><?php    echo TEXT_LOVED_MOVIES ;?></b><img src="<?php    echo DIR_WS_IMAGES ;?>box_recom/coeur.gif"  align="baseline"><a href="my_recommandation.php" class="link_SLOGAN_MENU2">(<?php    echo TEXT_RECOM_LINK ;?>)</a></td>
		<td width="15" height="41"><img src="<?php    echo DIR_WS_IMAGES ;?>box_recom/right_top.gif"></td>
	</tr>
	<tr>
		<td rowspan="2" background="<?php    echo DIR_WS_IMAGES;?>box_recom/left_middle.gif"><img src="<?php    echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td bgcolor="#FCF1C4" height="10"><img src="<?php    echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td rowspan="2" background="<?php    echo DIR_WS_IMAGES;?>box_recom/right_middle.gif"><img src="<?php    echo DIR_WS_IMAGES ;?>blank.gif"></td>
	</tr>
	<tr>
		<td bgcolor="#FCF1C4">
			<table width="100%" cellspacing="0" cellpadding="0" border="0" align="0">
				<tr>
					
					<?php
					//http://partners.thefilter.com/DVDPostService/RecommendationService.ashx?cmd=UserDVDRecommendDVDs&number=10&id=206183&verbose=false
					$request =  'http://partners.thefilter.com/DVDPostService';
					$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
					$args =  'cmd=UserDVDRecommendDVDs';
					$args .= '&id='.$customer_id;
					$args .= '&number=100';
					$args .= '&includeAdult=false&verbose=false&clientIp='.$_SERVER['REMOTE_ADDR'];
				
				    // Get and config the curl session object
				    // 
				    $session = curl_init($request.'/'.$format.'?'.$args);
				    curl_setopt($session, CURLOPT_HEADER, false);
				    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
					    //execute the request and close
				    $response = curl_exec($session);
				    curl_close($session);
				    // this line works because we requested $format='php' and not some other output format
				    // this is your data returned; you could do something more useful here than just echo it
				    try {
					  $recommend = new SimpleXMLElement($response);
						$i=0;
						$list='';
						foreach ($recommend->children()->children() as $dvd) {
					
							if($i==0)
								$list=$dvd['Id'];
							else
								$list.=','.$dvd['Id'];
							$i++;
						}
					} catch (Exception $e) {
					  //echo "bad xml";
					}
					if($_GET['debug']==1){
						echo '<div style="width:250px">';
						echo ' query->'.$request.'/'.$format.'?'.$args.'list->'.$list.'</div>';						
					}
					if(empty($list))
					{
						$categories=array('Action', 'Action/Adventure', 'Action/Platform', 'Action/Tactics', 'Adventure', 'Animated', 'Cineclub', 'Comedy', 'Crime', 'Drama', 'Fantasy', 'Fight', 'First%20Personal%20Shooter', 'Horror', 'Kids/Family', 'Online/Multi./Access', 'Race,Role-Playing', 'Romance', 'Sci-Fi', 'Sport', 'Strategy', 'Thriller', 'TV');
						shuffle($categories);
						$list_cat='';
						for($i=0;$i<count($categories);$i++){
							if($i==0)
								$list_cat=$categories[$i];
							else
								$list_cat.=','.$categories[$i];
						}
						$request =  'http://partners.thefilter.com/DVDPostService';
						$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
						$args =  'cmd=UserDVDRecommendDVDs';
						$args .= '&id='.$customer_id;
						$args .= '&includeAdult=false&number=100&verbose=true&genres=all&clientIp='.$_SERVER['REMOTE_ADDR'];
					    // Get and config the curl session object
					    $session = curl_init($request.'/'.$format.'?'.$args);
					    curl_setopt($session, CURLOPT_HEADER, false);
					    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
						    //execute the request and close
					    $response = curl_exec($session);
					    curl_close($session);
					    // this line works because we requested $format='php' and not some other output format
					    // this is your data returned; you could do something more useful here than just echo it
					    try {
						  $recommend = new SimpleXMLElement($response);
							$i=0;
							$list='';
							foreach ($recommend->children()->children() as $dvd) {

								if($i==0)
									$list=$dvd['Id'];
								else
									$list.=','.$dvd['Id'];
								$i++;
							}
						} catch (Exception $e) {
						  //echo "bad xml";
						}
						
					}
					  if(empty($list))
						$list=0;
					//$count_recomm = tep_db_query("select count(*) as cc from products_recommandation where customers_id = '" . $customer_id . "' ");
					//$count_recomm_values = tep_db_fetch_array($count_recomm);
		
					//if ($count_recomm_values['cc'] < 5 ) {
					/*	$listing_sql = 'select p.products_rating,p.products_media,p.products_id, pd.products_name , pd.products_image_big , di.directors_name from ' .	TABLE_PRODUCTS . ' p left join ' . TABLE_DIRECTORS . ' di on p.products_directors_id = di.Directors_id ';
						$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
						//BEN001 $listing_sql .= ' where p.products_id > 49 ';
						$listing_sql .= ' where p.products_type = "DVD_NORM" '; //BEN001
						$listing_sql .= 'and w.product_id is null and wa.products_id is null and pu.products_id is null';
						$listing_sql.= ' and p.products_availability>-1 and p.products_rating > 3 and p.products_media="DVD" ';
						$listing_sql.= ' and p.products_date_added > DATE_SUB(now(), INTERVAL 12 MONTH) and p.products_date_available >= DATE_SUB(now(), INTERVAL 12 MONTH) and p.products_next=0';*/
						$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big  from  '.TABLE_PRODUCTS . ' p ';
						$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' left join products_rating pr on pr.products_id=p.products_id and pr.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' where p.products_id in ('.$list.')';
						$listing_sql .= 'and w.product_id is null and pr.products_id is null and wa.products_id is null and pu.products_id is null and p.products_status !=-1 ';
						
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
						$listing_recom_sql = $listing_sql . ' order by rand() limit 6';
						#echo $listing_recom_sql;
						$recom_query = tep_db_query($listing_recom_sql);			

					while ($recom = tep_db_fetch_array($recom_query)) {
						echo '<td align="center" valign="bottom"><table><tr><td class="dvdpost_brown" height="30" align="center" valign="middle"><b>'. substr($recom['products_name'], 0, 30).'</b><td></tr>';
						echo '<tr><td width="105" align="center">';
						switch ($reviews_value['products_media']){
							case 'BlueRay' :
								echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.DIR_WS_IMAGES.'/canvas/blu-ray3.png" border="0" valign="bottom"></td></tr><tr><td>';
								echo '<a href="product_info.php?products_id='. $recom['products_id'].'&recommend=1"><img src="'.DIR_DVD_WS_IMAGES.$recom['products_image_big'].'" border="0" width="88" height="118" alt="'.$recom['products_name'].'" title="'.$recom['products_name'].'"></a></td></tr></table>';
								break;
							
							default :
								echo '<a href="product_info.php?products_id='. $recom['products_id'].'&recommend=1"><img src="'.DIR_DVD_WS_IMAGES.$recom['products_image_big'].'" border="0" width="90" height="135" alt="'.$recom['products_name'].'" title="'.$recom['products_name'].'"></a>';
								break;
						}
						
						echo '</td></tr><tr>';
						add_wishlist($recom['products_id'] , $customers_id, $language,$PHP_SELF, $_SERVER['QUERY_STRING'],"center");
						echo '</tr>';
						$data_avg_count=avg_count_fct($recom['rating_users'] ,$recom['rating_count'] );
						$rate=$data_avg_count['avg'];
						echo '<tr><td align="center" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$rate.'.gif" height="13" align="absmiddle" border="0"></td></tr>';
						$customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $recom['products_id'] . "' and customers_id = '" . $customer_id . "' ");
				        $customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
				        if ($customers_notinterested_values['products_uninterested_id']>0){
				            echo '<td class="TYPO_STD_BLACK" align="center"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif"></td>';
				        }else{																																																																								
				            echo '<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK" align="center"><input type="hidden" name="movieid" value="' . $recom['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' .DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="TEXT_ALTINTERESTED"></td></form>';
				        }
						if ($cpt<6){							
							echo '</table></td><td width="14">&nbsp;</td>';
							$cpt++;
						}else{
							echo '</table></td>';
						}					
					}
					?>
				</TR>
			</TABLE>		
		</td>
	</tr>
	<tr>
		<td width="15" height="20" background="<?php    echo DIR_WS_IMAGES;?>box_recom/left_bottom.gif"><img src="<?php    echo DIR_WS_IMAGES ;?>blank.gif"></td>
		<td background="<?php    echo DIR_WS_IMAGES;?>box_recom/bottom_middle.gif">&nbsp;</td>
		<td width="15" height="20" background="<?php    echo DIR_WS_IMAGES;?>box_recom/right_bottom.gif"><img src="<?php    echo DIR_WS_IMAGES ;?>blank.gif"></td>
	</tr>
</table>	
