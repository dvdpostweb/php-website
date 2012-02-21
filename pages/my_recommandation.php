<table width="761" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="534" height="40" align="left" valign="middle" class="TYPO_ROUGE_ITALIQUE"><img src="<?php  echo DIR_WS_IMAGES;?>recom/starflash.gif" align="texttop"><?php  echo HEADING_TITLE; ?></td>
    <td width="227" align="right" valign="bottom" ><a href="picto.php" class="dvdpost_brown_underline"> (<?php  echo TEXT_PICTO ; ?>)</a></td>
  </tr>
</table>
<table width="761" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td height="6" colspan="2" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="761" height="6"></div></td>
  </tr>
  <tr>
    <td width="365" class="SLOGAN_DETAIL">
	<?php  


$request =  'http://partners.thefilter.com/DVDPostService';
$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
$args =  'cmd=UserDVDRecommendDVDs';
$args .= '&id='.$customer_id;
$args .= '&number=100';
$args .= '&includeAdult=false&verbose=false&clientIp='.$_SERVER['REMOTE_ADDR'];

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
 // echo "bad xml";
}
if($_GET['debug']==1)
	echo 'list->'.$list;
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
	$args .= '&includeAdult=false&number=100&verbose=false&genres=all&clientIp='.$_SERVER['REMOTE_ADDR'];
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
if($_GET['debug']==1)
	echo 'list->'.$list;

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
	$listing_sql = 'select p.products_rating,p.products_media,p.products_id,rating_users,rating_count, pd.products_name , pd.products_image_big , di.directors_name from  '.TABLE_PRODUCTS . ' p left join ' . TABLE_DIRECTORS . ' di on p.products_directors_id = di.Directors_id ';
	$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
	$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
	$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
	$listing_sql .= ' left join products_rating pr on pr.products_id=p.products_id and pr.customers_id=\'' . $customer_id . '\' ';
	$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
	$listing_sql .= ' where p.products_id in ('.$list.')';
	$listing_sql .= 'and w.product_id is null and pr.products_id is null and wa.products_id is null and pu.products_id is null and p.products_status!=-1 ';
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
	$listing_recom_sql = $listing_sql . ' limit '.($page*8).',8';
	//echo $listing_recom_sql;
	$query_search_products = tep_db_query($listing_recom_sql);			
	
			
	$cpt=0;
	while ($product_info_values = tep_db_fetch_array($query_search_products)) {
	 if ($cpt ==4)  { ?>
	 </td> 
    <td width="365" align="left" class="SLOGAN_DETAIL">
	  <?php 
	 echo '<p>';
	 include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/show_recom.php'));
	 echo '</p>';
	 $cpt++;	 
	 }
	 else {
	 	echo '<p>';
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/show_recom.php'));
		echo '</p>';
		$cpt++;
		} 
	}
	echo '<td></tr><tr><td colspan="2" align="center"><br /><br />';
	if ($HTTP_GET_VARS['page'] > 0 && $HTTP_GET_VARS['page']!=4 ) {
		echo '<a class="red_basiclink" href="my_recommandation.php?page=' . ($HTTP_GET_VARS['page'] - 1). '"><img src="images/www3/languages/'.$language.'/images/buttons/precedent.gif" border="0" /></a>';				
		echo '&nbsp;&nbsp;';
		echo '<a class="red_basiclink" href="my_recommandation.php?page=' . ($HTTP_GET_VARS['page'] + 1). '"><img src="images/www3/languages/'.$language.'/images/buttons/suivant.gif" border="0" /></a>';				
	}else if($HTTP_GET_VARS['page'] ==4){
				echo '<a class="red_basiclink" href="my_recommandation.php?page=' . ($HTTP_GET_VARS['page'] - 1). '"><img src="images/www3/languages/'.$language.'/images/buttons/precedent.gif" border="0" /></a>';	
	}	else{
		echo '<a class="red_basiclink" href="my_recommandation.php?page=1"><img src="images/www3/languages/'.$language.'/images/buttons/suivant.gif" border="0" /></a>';		
	}
	?>
	<?= '</td></tr>'; ?>
	
	</td>  	
  </tr>
</table>
<?php
	 switch($languages_id){
		case 1:
			$lang='fr';
		break;
		case 2:
			$lang='nl';
		break;
		case 3:
			$lang='en';
		break;
		
	}
?>
<div id='filter' language='<?= $lang ?>'>