<?php
header('Content-Type: text/html; charset=utf-8');
$_SERVER['DOCUMENT_ROOT']='/data/sites/benelux/www3test/';
$doc= '<?xml version="1.0" encoding="UTF-8" ?>
<ROOT xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
$fp = fopen('catalogue_test.xml', 'w+');
fwrite($fp, $doc);
//require('../configure/application_top.php');

$server='192.168.100.204';
$username='webuser';
$password='3gallfir-';
$database='dvdpost_be_prod';
$db_link = mysql_connect($server, $username, $password);
mysql_select_db($database);


$sql="SELECT *, DATE_FORMAT(products_date_available,'%Y-%m-%dT%T.000Z') products_date_available_formated FROM products p  left join products_description pd on p.products_id=pd.products_id join products_availability pa on p.products_id = pa.products_id left JOIN `directors` d ON d.directors_id = p.products_directors_id left join studio s on s.studio_id = products_studio left join products_countries pc on products_countries_id = countries_id left join public on products_public = public_id and public.language_id = 3 where (products_type= 'DVD_NORM' or products_type='DVD_ADULT') and pd.language_id=3 and p.products_status !=-1 order by p.products_id;";
$query =  mysql_query($sql,$db_link);

while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
	if($row['products_status']==-1 && empty($row['products_name']))
	{}
	else{	
		//actor
		$sql_actor='SELECT * FROM `products_to_actors` pa
		join actors a on pa.actors_id = a.actors_id WHERE products_id='.$row['products_id'];
		$query_actor = mysql_query($sql_actor);
		$actors='';
		while($row_actor= mysql_fetch_array($query_actor,MYSQL_ASSOC)){
			$actors.='<actor id="'.$row_actor['actors_id'].'">'.htmlspecialchars($row_actor['actors_name']).'</actor>';
		}
		$sql_description='SELECT * FROM `products_description` pd WHERE products_id='.$row['products_id'];
		$query_description = mysql_query($sql_description);
		$desc='';
		while($row_description= mysql_fetch_array($query_description,MYSQL_ASSOC)){
			if($row_description['language_id']==1)
			{
				$short='fr';
			}
			else if($row_description['language_id']==2)
			{
				$short='nl';
			}
			else
			{
				$short ='en';
			}
			$desc .= '<language name="'.$short.'"><title>'.htmlspecialchars($row_description['products_name']).'</title><description>'.htmlspecialchars($row_description['products_description']).'</description><image>http://www.dvdpost.be/images/'.htmlspecialchars($row_description['products_image_big']).'</image></language>';
		}
		//subtitle
		$sql_undertitles='SELECT * FROM products_to_undertitles ptu
		join products_undertitles pu on ptu.products_undertitles_id = pu.undertitles_id  where ptu.products_id ='.$row['products_id'].' and pu.language_id=3';
		$query_undertitles = mysql_query($sql_undertitles);
		$undertitles='';
		while($row_undertitles= mysql_fetch_array($query_undertitles,MYSQL_ASSOC)){
			$undertitles.=$row_undertitles['undertitles_description'].',';
		}
		$undertitles=substr($undertitles,0,-1);
		// category
		$sql_category='select * from products_to_categories pc 
		join categories_description cd on cd.categories_id = pc.categories_id
		where cd.language_id=3 and pc.products_id='.$row['products_id'];
		$query_category = mysql_query($sql_category);
		$category='';
		while($row_category= mysql_fetch_array($query_category,MYSQL_ASSOC)){
			$category.='<category id="'.$row_category['categories_id'].'">'.htmlspecialchars($row_category['categories_name']).'</category>';
		}
		//language
		$sql_lang='select languages_description from products_to_languages ptl 
		join products_languages pl on pl.languages_id = ptl.products_languages_id
		where pl.languagenav_id=3 and ptl.products_id='.$row['products_id'];
	
		$query_lang =  mysql_query($sql_lang);
		$lang='';
		while($row_lang= mysql_fetch_array($query_lang,MYSQL_ASSOC)){
			$lang.=$row_lang['languages_description'].',';
		}
		$lang=substr($lang,0,-1);
		
		$sql_vod = 'select * from `streaming_products` where imdb_id='.$row['imdb_id'].' and available_from < now() and expire_at > now() and status = "online_test_ok" and available = 1 limit 1 ';
	
		$query_vod =  mysql_query($sql_vod);
		$row_vod= mysql_fetch_array($query_vod,MYSQL_ASSOC);
		if($row_vod['id']>0)
			$vod='1';
		else
			$vod='0';
	$row= utf8_encode('<row><catalogid>'.$row['products_id'].'</catalogid><active>'.$row['products_status'].'</active><publicage>'.$row['public_name'].'</publicage><languages __type="array">'.$desc.'</languages><year xsi:nil="true" >'.((empty($row['products_year']))?'':$row['products_year']).'</year><genre>'.$row['products_type'].'</genre><categories __type="array">'.$category.'</categories><country xsi:nil="true" id="'.$row['countries_id'].'">'.$row['countries_name'].'</country><mediaType>'.$row['products_media'].'</mediaType><certificate/><audioLanguage xsi:nil="true" >'.$lang.'</audioLanguage><subTitleLanguage xsi:nil="true" >'.$undertitles.'</subTitleLanguage><director xsi:nil="true" id="'.$row['directors_id'].'" >'.htmlspecialchars($row['directors_name']).'</director><actors __type="array">'.$actors.'</actors><availableDate>'.$row['products_date_available_formated'].'</availableDate><locales/><restrictions /><vod>'.$vod.'</vod><availability>'.$row['ratio'].'</availability><imdb_id>'.$row['imdb_id'].'</imdb_id><studio id="'.$row['studio_id'].'">'.$row['studio_name'].'</studio></row>');
		fwrite($fp, $row);
#echo $row;
	}
}
$doc='</ROOT>';
fwrite($fp, $doc);
fclose($fp);

mysql_close($db_link);
?>
