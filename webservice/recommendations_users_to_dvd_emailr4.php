<?php
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
$links= array();
$username = DB_SERVER_USERNAME;
$password = DB_SERVER_PASSWORD;
$database = DB_DATABASE;
$servers=array(DB_SERVER,DB_SERVER_RO);
foreach($servers as $server){
	$db_link = @mysql_connect($server, $username, $password);
		mysql_select_db($database);
		@array_push($links,$db_link);
}
$recommendation = Array();
$recommendation_init = '"id";"firstname";"lastname";"language_id";"locale";"email";"hebdo_number";"url_header";';


$recommendation_init .='"new_dvd_id_1";"new_dvd_name_1";"new_dvd_description_1";"new_dvd_category_1";"new_dvd_id_2";"new_dvd_name_2";"new_dvd_description_2";"new_dvd_category_2";"new_dvd_id_3";"new_dvd_name_3";"new_dvd_description_3";"new_dvd_category_3";"vod_id_1";"vod_name_1";"vod_description_1";"vod_category_1";"vod_id_2";"vod_name_2";"vod_description_2";"vod_category_2";"vod_id_3";"vod_name_3";"vod_description_3";"vod_category_3"';
if($_GET['kind']=='normal')
{
$recommendation_init .= ';"recommendation_display";"Id_1";"Image_1";"media_1";"star_1_1";"star_1_2";"star_1_3";"star_1_4";"star_1_5";"title_1";"Id_2";"Image_2";"media_2";"star_2_1";"star_2_2";"star_2_3";"star_2_4";"star_2_5";"title_2";"Id_3";"Image_3";"media_3";"star_3_1";"star_3_2";"star_3_3";"star_3_4";"star_3_5";"title_3";"Id_4";"Image_4";"media_4";"star_4_1";"star_4_2";"star_4_3";"star_4_4";"star_4_5";"title_4";"Id_5";"Image_5";"media_5";"star_5_1";"star_5_2";"star_5_3";"star_5_4";"star_5_5";"title_5";"Id_6";"Image_6";"media_6";"star_6_1";"star_6_2";"star_6_3";"star_6_4";"star_6_5";"title_6";"Id_7";"Image_7";"media_7";"star_7_1";"star_7_2";"star_7_3";"star_7_4";"star_7_5";"title_7";"Id_8";"Image_8";"media_8";"star_8_1";"star_8_2";"star_8_3";"star_8_4";"star_8_5";"title_8";"Id_9";"Image_9";"media_9";"star_9_1";"star_9_2";"star_9_3";"star_9_4";"star_9_5";"title_9";"Id_10";"Image_10";"media_10";"star_10_1";"star_10_2";"star_10_3";"star_10_4";"star_10_5";"title_10"';
}
$recommendation_init .="\n";
$number = $_GET['number'];
$url_header = $_GET['link_header'];

define('SITE_HOST_ID',1);
define('WEBSITE',1);


if(!empty($number))
{
	$filename = 'hebdo_'.$number.'_'.$_GET['language'].'.csv';
	$dvd_id = $_GET['dvd_id_1'].','.$_GET['dvd_id_2'].','.$_GET['dvd_id_3'];
	$vod_id = $_GET['vod_id_1'].','.$_GET['vod_id_2'].','.$_GET['vod_id_3'];
	$fp = fopen($filename, 'w');
	fwrite($fp, $recommendation_init);
	if($_GET['kind']=='normal')
	{
		$sql = 'select * from customers where customers_abo = 1 and customers_language = '.$_GET['language'].' and customers_abo_suspended in(0,1) and customers_newsletter = 1';
	}
	else
	{
		$sql = 'select * from customers c	join customer_attributes ca on c.customers_id = customer_id	where customers_abo = 1 and customers_language = '.$_GET['language'].' and customers_abo_suspended in(0,1) and newsletters_x=1';
	}
	
	
	
	
	
	$query = mysql_query($sql,$links[0]);
	$j=0;
	while ($customer_value =  mysql_fetch_array($query, MYSQL_ASSOC)) 
	{
		$j++;
			#echo 'number '.$j.'<br />';
			$recommendation_data =  $list_header;
			$customer_id = $customer_value['customers_id'];
			$languages_id = $customer_value['customers_language'];
			if($languages_id ==1)
			{
				$locale = 'fr';
			}
			else if($languages_id ==2)
			{
				$locale = 'nl';
			}
			else
			{
				$locale = 'en';
			}
			$recommendation_data .= 	$customer_value['customers_id'].';"'.$customer_value['customers_firstname'].'";"'.$customer_value['customers_lastname'].'";'.$customer_value['customers_language'].';"'.$locale.'";"'.$customer_value['customers_email_address'].'"';
			/***/
			$recommendation_data .=  ';'.$number;
			$recommendation_data .=  ';"'.$url_header.'"';
			$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_year,p.imdb_id,products_description, products_studio';
			$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
			$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
			$listing_sql .= ' where  p.products_id in ('.$dvd_id.')';
			$query_dvd = mysql_query($listing_sql,$links[0]);
			#echo $listing_sql;
			$dvd_data = '';
			while ($dvd =  mysql_fetch_array($query_dvd, MYSQL_ASSOC)) 
			{
				$dvd_data .=  ';'.$dvd['products_id'];
				$dvd_data .=  ';"'.sub($dvd['products_name'],40).'"';
				if($_GET['kind']=='normal')
				{
					$dvd_data .=  ';"'.sub($dvd['products_description'],250).'"';
				}
				else
				{
					$sql_actor = 'select group_concat(actors_name) actors from actors a
					join products_to_actors pa on pa.actors_id = a.actors_id 
					where products_id='.$dvd['products_id'];
					$query_actors = mysql_query($sql_actor,$links[0]);
					$actors =  mysql_fetch_array($query_actors, MYSQL_ASSOC);
					$sql_studio = 'select * from studio where studio_id = '.$dvd['products_studio'].';';
					#echo $sql_studio;
					$query_studio = mysql_query($sql_studio,$links[0]);
					$studio =  mysql_fetch_array($query_studio, MYSQL_ASSOC);
					if($_GET['language'] == 1)
					{
						$actor_title = 'Hardeu(r)ses';
					}
					else if($_GET['language'] == 2)
					{
						$actor_title = 'Performers';
					}
					else
					{
						$actor_title = 'Performers';
					}
					$dvd_data .=  ';"<strong>'.$actor_title.'</strong> : '.$actors['actors'].'<br /><br /><strong>studio</strong> : '.$studio['studio_name'].'"';
				}
				
				$cat_select = 'select c.* from products_to_categories pc 
				join categories_description c on c.categories_id = pc.categories_id and language_id= '.$languages_id.'
				where products_id = '.$dvd['products_id'].' limit 1';
				$cat_query = mysql_query($cat_select,$links[0]);
				$cat =  mysql_fetch_array($cat_query, MYSQL_ASSOC);

				$dvd_data .=  ';"'.$cat['categories_name'].'"';
			}
			$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_year,p.imdb_id,products_description, products_studio';
			$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
			$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
			$listing_sql .= ' where  p.products_id in ('.$vod_id.')';
			$query_vod = mysql_query($listing_sql,$links[0]);
			$vod_data = '';
			while ($dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC)) 
			{
				$vod_data .=  ';'.$dvd['products_id'];
				$vod_data .=  ';"'.sub($dvd['products_name'],40).'"';
				if($_GET['kind']=='normal')
				{
					$vod_data .=  ';"'.sub($dvd['products_description'],250).'"';
				}
				else
				{
					$sql_actor = 'select group_concat(actors_name) actors from actors a
					join products_to_actors pa on pa.actors_id = a.actors_id 
					where products_id='.$dvd['products_id'];
					$query_actors = mysql_query($sql_actor,$links[0]);
					$actors =  mysql_fetch_array($query_actors, MYSQL_ASSOC);
					$sql_studio = 'select * from studio where studio_id = '.$dvd['products_studio'].';';
					$query_studio = mysql_query($sql_studio,$links[0]);
					$studio =  mysql_fetch_array($query_studio, MYSQL_ASSOC);
					if($_GET['language'] == 1)
					{
						$actor_title = 'Hardeu(r)ses';
					}
					else if($_GET['language'] == 2)
					{
						$actor_title = 'Performers';
					}
					else
					{
						$actor_title = 'Performers';
					}
					$vod_data .=  ';"<strong>'.$actor_title.'</strong> : '.$actors['actors'].'<br /><br /><strong>Studio</strong> : '.$studio['studio_name'].'"';
				}
				$cat_select = 'select c.* from products_to_categories pc 
				join categories_description c on c.categories_id = pc.categories_id and language_id= '.$languages_id.'
				where products_id = '.$dvd['products_id'].' limit 1';
				$cat_query = mysql_query($cat_select,$links[0]);
				$cat =  mysql_fetch_array($cat_query, MYSQL_ASSOC);

				$vod_data .=  ';"'.$cat['categories_name'].'"';
			}
			$recommendation_data .= $dvd_data.''.$vod_data;
			/***/
			if($_GET['kind']=='normal')
			{			
				
				//http://partners.thefilter.com/DVDPostService/RecommendationService.ashx?cmd=UserDVDRecommendDVDs&number=10&id=206183&verbose=false
				$request =  'http://partners.thefilter.com/DVDPostService';
				$format = 'RecommendationService.ashx';   // this can be xml, json, html, or php
				$args =  'cmd=UserDVDRecommendDVDs';
				$args .= '&id='.$customer_id;
				$args .= '&number=100';
				$args .= '&includeAdult=false&verbose=false&clientIp='.$_SERVER['REMOTE_ADDR'];

				// Get and config the curl session object
				// 
				// 

				#echo $request.'/'.$format.'?'.$args.'<br />';
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
					//echo "bad xml";
					
					
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
				#echo $list.'<br />';
				if(empty($list))
					$list=0;
				$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_year,p.imdb_id, sp.id streaming_id ,products_description,directors_name,directors_id';
				$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
				$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
				$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_WISHLIST . ' w on w.product_id=p.products_id and w.customers_id=\'' . $customer_id . '\'' ;
				$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_WISHLIST_ASSIGNED . ' wa on wa.products_id=p.products_id and wa.customers_id=\'' . $customer_id . '\' ';
				$listing_sql .= ' left join dvdpost_be_prod.directors d on products_directors_id = directors_id';
				$listing_sql .= ' left join dvdpost_be_prod.products_uninterested  pu on pu.products_id=p.products_id and pu.customers_id=\'' . $customer_id . '\' ';
				$listing_sql .= ' left join dvdpost_be_prod.streaming_products sp on p.imdb_id = sp.imdb_id and available = 1 and available_from < now() and sp.expire_at > now() and status = "online_test_ok"';
				$listing_sql .= ' where p.products_id in (6733,'.$list.')';
				$listing_sql .= 'and w.product_id is null and wa.products_id is null and pu.products_id is null ';
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
				$listing_recom_sql = $listing_sql . 'group by p.products_id order by rand() limit '.$_GET['limit'];
				#echo $listing_recom_sql.'<br />';
				$recom_query = mysql_query($listing_recom_sql,$links[0]);
				$rating='';
				if(mysql_num_rows($recom_query)==0)
					$recommendation_data .= ';"none"';
				else
					$recommendation_data .= ';""';
				
				while ($recom =  mysql_fetch_array($recom_query, MYSQL_ASSOC)) {
					if ($recom['streaming_id']>0)
						$product_type = 'vod';
					else
						$product_type = $recom['products_media'] == 'DVD' ? 'dvd' : 'bluray';
					$rating_product =  $recom['rating_count'] > 0 ? round(($recom['rating_users'] / $recom['rating_count']) * 2) : 0 ;
					$recommendation_data .= ';'.$recom['products_id'].';"'.$recom['products_image_big'].'";"'.$product_type.'"';
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
						$recommendation_data .=  ';"small-star-'.$type.'.png"';
					}
					$recommendation_data .=  ';"'.sub($recom['products_name'],40).'"';
				}
			}
			
			fwrite($fp, $recommendation_data."\n");
	}		
	
	
	#WriteCsv($result_name, $recommendation);
}
fclose($fp);
mysql_close($links[0]);
#mysql_close($links[1]);
forcerTelechargement($filename,'./'.$filename,filesize($filename));
unlink('./'.$filename);
function sub($text,$length)
{
	if (strlen($text) > $length)
	{
		$text=substr($text,0,($length-3));
		$text.='...';
		
	}
	return str_replace('"','""',$text);
}
function WriteCsv($fileName, $records)
{

  $result = array();
  foreach($records as $key => $value)
  $fp = fopen($fileName, 'w+');
  foreach ($records as $record)
    fwrite($fp, $record);
  fclose($fp);
}

function WriteCsv_from_array($fileName, $delimiter = ';', $records)
{

  $result = array();
  foreach($records as $key => $value)
  $results[] = implode($delimiter, $value);
  $fp = fopen($fileName, 'w+');
  foreach ($results as $result)
    fputcsv($fp, explode($delimiter, $result));
  fclose($fp);
}

function forcerTelechargement($nom, $situation, $poids)
 {
   header('Content-Type: application/octet-stream');
   header('Content-Length: '. $poids);
   header('Content-disposition: attachment; filename='. $nom);
   header('Pragma: no-cache');
   header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
   header('Expires: 0');
   readfile($situation);
   exit();
 }
?>

