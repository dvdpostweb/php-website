<?php
require($_SERVER['DOCUMENT_ROOT'].'/includes/classes/class.phpmailer.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');

tep_db_connect() or die('Unable to connect to database server!');

$customer_id = $_GET['customer_id'];
$sql= 'select * from customers c
join address_book a on a.customers_id = c.customers_id and a.address_book_id = c.customers_default_address_id
 where c.customers_id = '.$customer_id;
$query = tep_db_query($sql);			
$customer_value = tep_db_fetch_array($query);
$languages_id = $customer_value['customers_language'];
define('SITE_HOST_ID',1);
define('WEBSITE',1);
require(DIR_WS_INCLUDES . 'translation_root.php');


						$listing_sql = "select * from (select count(distinct t.id)nb , t.imdb_id,pd.* 
						from  products p 
						join products_description pd on p.products_id = pd.products_id and pd.language_id=".$customer_value['customers_language']." 
						join streaming_products sp on p.imdb_id = sp.imdb_id 
						join tokens t on t.`imdb_id` = p.imdb_id
						where available = 1 and status='online_test_ok' and source ='alphanetworks' and ((available_from < now() and expire_at > date_add(now(), interval 10 DAY)) or (available_backcatalogue_from < now() and expire_backcatalogue_at > date_add(now(), interval 10 DAY))) and products_type='".($_GET['kind']=='adult' ? 'dvd_adult': 'dvd_norm')."'  group by t.imdb_id  order by nb desc limit 30) t ";
						if($_GET['kind']=='adult')
						{
							$image_path= 'imagesx';
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
						}
						else
						{
							$image_path= 'images';
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
						}	
							
							$structure = '<table border="0"><tr valign="top">$$$rating$$$</tr><tr>$$$image$$$</tr><tr>$$$btn$$$</tr><tr>$$$title$$$</tr></table>';
							
						$listing_recom_sql = $listing_sql . '  limit '.$_GET['limit'];
						
						echo $listing_recom_sql;
						$recom_query = tep_db_query($listing_recom_sql);
						$image='';
						$btn='';
						$title='';
						$rating='';
						$nb = tep_db_num_rows($recom_query);
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
						$image.='<td valign="top" align="center"><table height="132" width="80" cellspacing="0" cellpadding="0" border="0" background="http://www.dvdpost.be/images/newsletters/retardposte/vod_little.gif">
					      <tbody>
					        <tr height="12">
					          <td colspan="4"></td>
					        </tr>
					        <tr>
					          <td align="left"> <a target="_blank" href="http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=39"><img height="109" width="74" border="0" src="http://www.dvdpost.be/'.$image_path.'/'.htmlspecialchars($recom['products_image_big']).'" alt="'.($recom['products_name']).'" style="margin:0 0 0 2px "></a> </td>
					        </tr>
					      </tbody>
					    </table></td>
					  ';
					$btn.='<td valign="top" align="center"> <a target="_blank" href="http://private.dvdpost.com/'.$lang_short.'/streaming_products/'.$recom['imdb_id'].'?warning=1"><img border="0" src="http://www.dvdpost.be/images/newsletters/mailinout/vod_button_'.$lang_short.'.gif"></a> </td>
					';
				$title .='
				  <td valign="top" align="center"> <a target="_blank" style="color: rgb(69, 69, 69); text-decoration: none;" href="http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=39"><font size="2">'.(truncate($recom['products_name'],25)).'</font></a> </td>
				';
				
					$rating_product =  $recom['rating_count'] > 0 ? round(($recom['rating_users'] / $recom['rating_count']) * 2) : 0 ;
					$rating.= '<td align="center"  width="'.$p.'"><table cellspacing="0" cellpadding="0"><tbody><tr>
					';
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
					          $rating.= '<td> <img src="http://private.dvdpost.com/images/small-star-'.$type.'.png"> </td>
					';
									}
					        $rating.= '</tr></tbody></table> </td>';
					}
					
					$structure = str_replace('$$$rating$$$', $rating, $structure);
					$structure = str_replace('$$$btn$$$', $btn, $structure);
					$structure = str_replace('$$$title$$$', $title, $structure);
					echo str_replace('$$$image$$$', $image, $structure);
					?>

