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
$recommendation_init = '"id";"firstname";"lastname";"language_id";"locale";"email";"title";"hebdo_number";';


$recommendation_init .='"vod_id_1";"vod_name_1";"vod_description_1";"vod_category_1";"vod_id_2";"vod_name_2";"vod_description_2";"vod_category_2";"vod_id_3";"vod_name_3";"vod_description_3";"vod_category_3";"vod_id_4";"vod_name_4";"vod_description_4";"vod_category_4";"vod_id_5";"vod_name_5";"vod_description_5";"vod_category_5";"vod_id_6";"vod_name_6";"vod_description_6";"vod_category_6";"vod_id_7";"vod_name_7";"vod_description_7";"vod_category_7";"vod_id_8";"vod_name_8";"vod_description_8";"vod_category_8";"vod_id_9";"vod_name_9";"vod_description_9";"vod_category_9"';

$recommendation_init .="\n";
$number = $_GET['number'];
$url_header = $_GET['link_header'];

define('SITE_HOST_ID',1);
define('WEBSITE',1);


if(!empty($number))
{
	$filename = 'hebdo_vod_'.$number.'_'.$_GET['language'].'.csv';
	$vod1 = $_GET['vod_id_1'];
	$vod2 = $_GET['vod_id_2'];
	$vod3 = $_GET['vod_id_3'];
	$vod4 = $_GET['vod_id_4'];
	$vod5 = $_GET['vod_id_5'];
	$vod6 = $_GET['vod_id_6'];
	$vod7 = $_GET['vod_id_7'];
	$vod8 = $_GET['vod_id_8'];
	$vod9 = $_GET['vod_id_9'];
	
	$vod_id = $vod1.','.$vod2.','.$vod3.','.$vod4.','.$vod5.','.$vod6.','.$vod7.','.$vod8.','.$vod9;
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
			$recommendation_data .= 	$customer_value['customers_id'].';"'.$customer_value['customers_firstname'].'";"'.$customer_value['customers_lastname'].'";'.$customer_value['customers_language'].';"'.$locale.'";"'.$customer_value['customers_email_address'].'";"'.$_GET['title'].'"';
			/***/
			$recommendation_data .=  ';'.$number;
			
			$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_year,p.imdb_id,products_description, products_studio';
			$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
			$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $customer_value['customers_language'] ;
			$listing_sql .= ' where  p.products_id in ('.$vod_id.') order by FIELD(p.products_id, '.$vod_id.')';
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
				where products_id = '.$dvd['products_id'].' order by rand() limit 1';
				$cat_query = mysql_query($cat_select,$links[0]);
				$cat =  mysql_fetch_array($cat_query, MYSQL_ASSOC);

				$vod_data .=  ';"'.$cat['categories_name'].'"';
			}
			$recommendation_data .= $dvd_data.''.$vod_data;
			/***/
						
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

