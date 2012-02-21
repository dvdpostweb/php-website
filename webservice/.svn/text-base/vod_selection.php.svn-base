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
$languages_id = $customer_value['customers_language'];
define('SITE_HOST_ID',1);
define('WEBSITE',1);
require(DIR_WS_INCLUDES . 'translation_root.php');


						$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,p.imdb_id  from product_lists pl
						join listed_products lp on lp.product_list_id = pl.id
						join products p on lp.product_id = p.products_id';
						$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
						if($_GET['kind']=='adult')
						{
							$image_path= 'imagesx';
							switch ($customer_value['customers_language']){
							case 1:
								$lang_short='fr';
								$listing_sql .= ' where pl.id = 250';
								
							break;
							case 2:
								$lang_short='nl';
								$listing_sql .= ' where pl.id = 250';
							break;
							case 3:
								$lang_short='en';
								$listing_sql .= ' where pl.id = 250';
							break;
							}
						}
						else
						{
							$image_path= 'images';
							switch ($customer_value['customers_language']){
							case 1:
								$lang_short='fr';
								$listing_sql .= ' where pl.id = 110';
								
							break;
							case 2:
								$lang_short='nl';
								$listing_sql .= ' where pl.id = 111';
							break;
							case 3:
								$lang_short='en';
								$listing_sql .= ' where pl.id = 112';
							break;
							}
						}	
							
							$structure = '<table border="0"><tr valign="top">$$$rating$$$</tr><tr>$$$image$$$</tr><tr>$$$btn$$$</tr><tr>$$$title$$$</tr></table>';
							
						$listing_recom_sql = $listing_sql . ' order by rand() limit '.$_GET['limit'];
						#echo $listing_recom_sql;
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
					          <td align="left"> <a target="_blank" href="http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=5"><img height="109" width="74" border="0" src="http://www.dvdpost.be/'.$image_path.'/'.htmlspecialchars($recom['products_image_big']).'" alt="'.($recom['products_name']).'" style="margin:0 0 0 2px "></a> </td>
					        </tr>
					      </tbody>
					    </table></td>
					  ';
					$btn.='<td valign="top" align="center"> <a target="_blank" href="http://private.dvdpost.com/'.$lang_short.'/streaming_products/'.$recom['imdb_id'].'?warning=1"><img border="0" src="http://www.dvdpost.be/images/newsletters/mailinout/vod_button_'.$lang_short.'.gif"></a> </td>
					';
				$title .='
				  <td valign="top" align="center"> <a target="_blank" style="color: rgb(69, 69, 69); text-decoration: none;" href="http://private.dvdpost.com/'.$lang_short.'/products/'.$recom['products_id'].'?recommendation=5"><font size="2">'.(truncate($recom['products_name'],25)).'</font></a> </td>
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

