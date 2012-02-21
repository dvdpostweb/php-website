<?php
require('../configure/application_top.php');
header ("content-type: text/xml");

echo '<?xml version="1.0" encoding="iso-8859-1"?>';
$sql= 'select * from customers where customers_id = '.$_GET['customers_id'];
$query = tep_db_query($sql);			
$customer_value = tep_db_fetch_array($query);

					//http://partners.thefilter.com/DVDPostService/RecommendationService.ashx?cmd=UserDVDRecommendDVDs&number=10&id=206183&verbose=false
					$request =  'http://partners.thefilter.com/DVDPostService';
					$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
					$args =  'cmd=UserDVDRecommendDVDs';
					$args .= '&id='.$_GET['customers_id'];
					$args .= '&number=100';
					$args .= '&includeAdult=false&verbose=false&clientIp='.$_SERVER['REMOTE_ADDR'];
				
				    // Get and config the curl session object
				    // 
				    // 
					#echo $request.'/'.$format.'?'.$args;
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
					} catch (Exception $e) {
					  echo "bad xml";
					}
					$i=0;
					$list='';
					foreach ($recommend->children()->children() as $dvd) {
					
						if($i==0)
							$list=$dvd['Id'];
						else
							$list.=','.$dvd['Id'];
						$i++;
					}
					  if(empty($list))
						$list=0;
						$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big  from  '.TABLE_PRODUCTS . ' p ';
						$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' where p.products_id in ('.$list.')';
						$listing_sql .= 'and w.product_id is null and wa.products_id is null and pu.products_id is null';
						switch ($customer_value['customers_language']){
							case 1:
								$listing_sql.= ' and p.products_language_fr >0 ';
							break;
							case 2:
								$listing_sql.= ' and p.products_undertitle_nl >0 ';
							break;
							case 3:
							break;
							}
						$listing_recom_sql = $listing_sql . ' order by rand() limit '.$_GET['limit'];
						#echo $listing_recom_sql;
						$recom_query = tep_db_query($listing_recom_sql);			
					echo '<root>';
					while ($recom = tep_db_fetch_array($recom_query)) {
						echo '<item>';
						echo '<id>'.$recom['products_id'].'</id>';
						echo '<name>'.htmlspecialchars(($recom['products_name'])).'</name>';
						echo '<image>http://www.dvdpost.be/images/'.htmlspecialchars($recom['products_image_big']).'</image>';
						echo '</item>';
							
					}
					echo '</root>';
					
					?>

