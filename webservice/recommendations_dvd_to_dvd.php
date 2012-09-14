<?php
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');

tep_db_connect() or die('Unable to connect to database server!');

$customer_id = $_GET['customer_id'];
$sql= 'select * from customers where customers_id = '.$customer_id;
$query = tep_db_query($sql);			
			
$customer_value = tep_db_fetch_array($query);

switch ($customer_value['customers_language']){
	case 1:
		$lang_short='fr';
	break;
	case 2:
		$lang_short='nl';
	break;
	case 3:
		$lang_short='en';
	break;
}


$languages_id = $customer_value['customers_language'];
$sql_product= 'select * from products p 
where p.products_id = '.$_GET['product_id'];



$query2 = tep_db_query($sql_product);			
$product = tep_db_fetch_array($query2);
if($product['products_type']=='DVD_ADULT')
	$adult="true";
else
	$adult="false";
	
define('SITE_HOST_ID',1);
define('WEBSITE',1);
require(DIR_WS_INCLUDES . 'translation_root.php');

$structure = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="700">
                    <tbody>';
if($_GET['hide']!=1)
{
                      $structure .= '<tr>
                        <td colspan="35"><img
 src="http://www.dvdpost.be/images/newsletters/mailinout/ligne.gif"></td>
                      </tr>
                      <tr>
                        
                        <td colspan="34">
                        <br /><font color="#444444">&nbsp;&nbsp;'.TEXT_RECOMMENDATION.'</font><br /><br />
                        </td>
                      </tr>';
}
											$structure .= '<tr valign="top">$$$rating$$$</tr><tr>$$$image$$$</tr><tr>$$$btn$$$</tr><tr>$$$title$$$</tr>
                      <tr>
                        <td colspan="35"></td>
                      </tr>
                    </tbody>
                  </table>';
					//http://partners.thefilter.com/DVDPostService/RecommendationService.ashx?cmd=UserDVDRecommendDVDs&number=10&id=206183&verbose=false
					$request =  'http://partners.thefilter.com/DVDPostService';
					$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
					$args =  'cmd=DVDRecommendDVDs';
					$args .= '&id='.$_GET['product_id'];
					$args .= '&number=100';
					$args .= '&includeAdult='.$adult.'&verbose=false&clientIp='.$_SERVER['REMOTE_ADDR'];
				
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
						$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_type  from  '.TABLE_PRODUCTS . ' p ';
						$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
						$listing_sql .= ' left join ' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' left join products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
						$listing_sql .= ' where p.products_id in ('.$list.')';
						$listing_sql .= 'and w.product_id is null and wa.products_id is null and pu.products_id is null and (products_quantity > 0 or products_next =1)';
						switch ($customer_value['customers_language']){
							case 1:
								$listing_sql.= ' and p.products_language_fr >0 ';
								$lang_short='fr';
							break;
							case 2:
								$listing_sql.= ' and p.products_undertitle_nl >0 ';
								$lang_short='nl';
							break;
							case 3:
								$lang_short='en';
							break;
							}
						$listing_recom_sql = $listing_sql . ' order by rand() limit '.$_GET['limit'];
						$recom_query = tep_db_query($listing_recom_sql);
						$image='';
						$btn='';
						$title='';
						$rating='';
					$nb=tep_db_num_rows($recom_query);
					if($nb > 0)
					{
						$p=700/$nb;
					}
					else
					{
						$p=0;
					}
					while ($recom = tep_db_fetch_array($recom_query)) {
						
						/*echo '<id>'.$recom['products_id'].'</id>';
						echo '<name>'.htmlspecialchars(($recom['products_name'])).'</name>';
						echo '<image>http://www.dvdpost.be/images/'.htmlspecialchars($recom['products_image_big']).'</image>';*/
						if($recom['products_type']=='DVD_ADULT')
						{
							$path = 'http://private.dvdpost.com/'.$lang_short.'/adult/products/'.$recom['products_id'].'?recommendation=5';
							$image_path = 'http://www.dvdpost.be/imagesx/'.htmlspecialchars($recom['products_image_big']);
							$path_add = 'http://private.dvdpost.com/'.$lang_short.'/adult/products/'.$recom['products_id'].'?recommendation=5&amp;add=1';

						}
						else
						{
							$path = 'http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=5';
							$image_path = 'http://www.dvdpost.be/images/'.htmlspecialchars($recom['products_image_big']);
							$path_add = 'http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=5&amp;add=1';

						}
						
						$product_type = $recom['products_media'] == 'DVD' ? 'dvd' : 'bluray';
						$image.=' <td valign="top" align="center"><table height="132" width="80" cellspacing="0" cellpadding="0" border="0" background="http://www.dvdpost.be/images/newsletters/mailinout/'.$product_type.'_little.gif">
					      <tbody>
					        <tr height="12">
					          <td colspan="4"></td>
					        </tr>
					        <tr>
					          <td align="left"> <a target="_blank" href="'.$path.'"><img height="109" width="74" border="0" src="'.$image_path.'" alt="'.(($recom['products_name'])).'" style="margin:0 0 0 2px"></a> </td>
					        </tr>
					      </tbody>
					    </table> </td>
					';
					$btn.='
				  <td valign="top" align="center"> <a target="_blank" href="'.$path_add.'"><img border="0" src="http://www.dvdpost.be/images/newsletters/mailinout/ajouter_button_'.$lang_short.'.gif"></a> </td>
				  ';
				$title .='
				  <td valign="top" align="center"> <a target="_blank" style="color: rgb(69, 69, 69); text-decoration: none;" href="'.$path.'"><font size="2">'.truncate($recom['products_name'],27).'</font></a> </td>
				';
				
					$rating_product =  $recom['rating_count'] > 0 ? round(($recom['rating_users'] / $recom['rating_count']) * 2) : 0 ;
					$rating.= '<td align="center"  width="'.$p.'"><table cellspacing="0" cellpadding="0"><tbody><tr>';
									for($i = 0 ; $i < 5 ; $i++)
									{
										if($rating_product>=2)
										{
											$type='on';
										}
										elseif($rating_product==1)
										{
											$type='half';
										}
										else
										{
											$type='off';
										}
										$rating_product -= 2;
					          $rating.= '<td> <img src="http://private.dvdpost.com/images/small-star-'.$type.'.png" /> </td>
					';
									}
					        $rating.= '</tr></tbody></table> </td>';
					}
					
					$structure = str_replace('$$$rating$$$', $rating, $structure);
					$structure = str_replace('$$$btn$$$', $btn, $structure);
					$structure = str_replace('$$$title$$$', $title, $structure);
					$structure = str_replace('$$$title_dvd$$$', $products['products_name'], $structure);
					if ($nb > 0)
					{
						echo str_replace('$$$image$$$', $image, $structure);
					}
					?>

