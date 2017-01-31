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
$detail_type=$_GET['type'];
$sql= 'select * from customers where customers_id = '.$customer_id;
$query = tep_db_query($sql);			
$customer_value = tep_db_fetch_array($query);


$languages_id = $customer_value['customers_language'];

$sql_product= 'select * from products p 
join products_description pd on p.products_id = pd.products_id 
left join directors d on products_directors_id = directors_id
left join studio s on products_studio = studio_id
where p.products_id = '.$_GET['product_id'] .' and language_id = '.$languages_id;
$query2 = tep_db_query($sql_product);			
$product = tep_db_fetch_array($query2);
#echo $sql_product;
define('SITE_HOST_ID',1);
define('WEBSITE',1);
require(DIR_WS_INCLUDES . 'translation_root.php');

if (strtolower($detail_type) == 'vod')
	$product_type = 'vod';
else
	$product_type = $product['products_media'] == 'DVD' ? 'dvd' : 'bluray';

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

if($product['products_type']=='DVD_ADULT')
{
	$path = 'http://private.dvdpost.com/'.$lang_short.'/adult/products/'.$product['products_id'].'?recommendation=5';
	$path_review = 'http://private.dvdpost.com/'.$lang_short.'/adult/products/'.$product['products_id'].'?recommendation=5&review=1';
	$path_director = 'http://private.dvdpost.com/fr/adult/studios/'.$product['products_studio'].'/products';
	$image = 'http://www.dvdpost.be/imagesx/'.$product['products_image_big'];
	
}
else
{
	$path = 'http://private.dvdpost.com/'.$lang_short.'/products/'.$product['products_id'].'?recommendation=5';
	$path_review = 'http://private.dvdpost.com/'.$lang_short.'/products/'.$product['products_id'].'?recommendation=5&review=1';
	$path_director = 'http://private.dvdpost.com/'.$lang_short.'/directors/'.$product['directors_id'].'/products';
	$image = 'http://www.dvdpost.be/images/'.$product['products_image_big'];
	
}
$rating_product =  $product['rating_count'] > 0 ? round(($product['rating_users'] / $product['rating_count']) * 2) : 0 ;

$rating= '';
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
  $rating.= '<td><img src="http://private.dvdpost.com/images/star-'.$type.'.png"></td>';
}
$actors_sql = 'select a.actors_id, actors_name from  products_to_actors pa left join actors a on pa.actors_id= a.actors_id where pa.products_id = '.$_GET['product_id'].' limit 8';

$actors_query = tep_db_query($actors_sql);
$actors_links='';
while ($actors = tep_db_fetch_array($actors_query)) {
	if($product['products_type']=='DVD_ADULT')
		$actors_links.= '<a href="http://private.dvdpost.com/'.$lang_short.'/adult/actors/'.$actors['actors_id'].'/products" target="_BLANK" style="color: rgb(69, 69, 69); ">'.$actors['actors_name'].'</a>, ';
	else
		$actors_links.= '<a href="http://private.dvdpost.com/'.$lang_short.'/actors/'.$actors['actors_id'].'/products" target="_BLANK" style="color: rgb(69, 69, 69); ">'.$actors['actors_name'].'</a>, ';
}
$actors_links = substr($actors_links,0,-2);
	
$structure = '<td width="140" valign="top" align="center"><table height="198" width="119" cellspacing="0" cellpadding="0" border="0" background="http://www.dvdpost.be/images/newsletters/mailinout/'.$product_type.'.gif">
								                      <tbody>
								                        <tr height="15">
								                          <td colspan="4"></td>
								                        </tr>
								                        <tr>
								                          <td width="5"></td>
								                          <td width="100"><a target="_blank" href="'.$path.'"><img height="165" width="108" border="0" src="'.$image.'" alt="'.$product['products_name'].' ('.$product['products_year'].')"></a></td>
								                          <td width="2"></td>
								                        </tr>
								                      </tbody>
								                    </table></td>
								                  <td width="11"></td>
								                  <td align="left"><table cellspacing="0" cellpadding="0">
								                      <tbody>
								                        <tr>
								                          '.$rating.'
								                        </tr>
								                      </tbody>
								                    </table>
								                    <strong> <a target="_blank" style="color: rgb(69, 69, 69); text-decoration: none;" href="'.$path.'"><font size="3">'.$product['products_name'].' ('.$product['products_year'].')</font></a> </strong>
								                    <p> 
																			<font size="2">
																				<strong>'.TEXT_ACTORS.':</strong> '.$actors_links.'<br>
								                      	<strong>'.TEXT_DIRECTOR.' </strong><a href="'.$path_director.'" target="_BLANK" style="color: rgb(69, 69, 69);">'.(($product['products_type']=='DVD_ADULT')?$product['studio_name']  :$product['directors_name']).'</a></font></p>
								                    <p align="justify"> 
																			<font size="2">'.truncate($product['products_description'],1000).'
																			</font></p>
								                    <p>
																			<img align="absmiddle" src="http://private.dvdpost.com/images/more-icon.png">
																				<a href="'.$path.'" target="_blank" style="color: rgb(92, 100, 109); text-decoration: underline;"><font size="2">'.TEXT_MORE.'</font>
																				</a>
																		</p>';
																		if(strtolower($detail_type) =='in'){
								                    $structure .= '<p>
																										<span style="font-weight: bold">
																											<img src="http://www.dvdpost.be/images/newsletters/mailinout/etoile.gif"  align="absmiddle">
																											<a href="'.$path.'" target="_blank" style="color: rgb(254, 14, 0); text-decoration: underline;">'.TEXT_RATE_MOVIE.'</a> 
																											<img src="http://www.dvdpost.be/images/newsletters/mailinout/trait.gif"  align="absmiddle"> 
																											<img src="http://www.dvdpost.be/images/newsletters/mailinout/critiques.gif"  align="absmiddle">
																											<a href="'.$path_review.'" target="_blank" style="color: rgb(254, 14, 0); text-decoration: underline;">'.TEXT_REVIEW_MOVIE.'</a>
																										</span>
																									</p>';
																		}else if(strtolower($detail_type) =='vod')
																		{
																			$structure .='<p><a href="http://private.dvdpost.com/fr/streaming_products/'.$product['imdb_id'].'?warning=1"><img border="0" src="http://www.dvdpost.be/images/newsletters/mailinout/bg_callaction_'.$lang_short.'.gif"></a></p>';
																		}
																		$structure .= '</td>';				
					
					echo str_replace('$$$image$$$', $image, $structure);
					?>

