<?php
header('Content-Type: text/html; charset=utf-8');
$doc= '<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE ROOT SYSTEM "TheFilter_Catalogue.dtd">
<ROOT xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
$fp = fopen('catalogue.xml', 'w+');
fwrite($fp, $doc);
//require('../configure/application_top.php');

$server='matadi';
$username='webuser';
$password='3gallfir-';
$database='dvdpost_be_prod';
$db_link = mysql_connect($server, $username, $password);
mysql_select_db($database);


$sql="SELECT * FROM products p 
left join products_description pd on p.products_id=pd.products_id
left JOIN `directors` d ON d.directors_id = p.products_directors_id
where (products_type= 'DVD_NORM' or products_type='DVD_ADULT') and pd.language_id=3 and p.products_status !=-1 and products_media not in ('dvd','BlueRay') order by 1 desc limit 10";
$query =  mysql_query($sql,$db_link);

while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
	if($row['products_status']==-1 && empty($row['products_name']))
	{}
	else{	
		//actor
		$sql_actor='SELECT * FROM `products_to_actors` pa
		join actors a on pa.actors_id = a.actors_id WHERE products_id='.$row['products_id'];
		$query_actor = mysql_query($sql_actor);
		$actor='';
		while($row_actor= mysql_fetch_array($query_actor,MYSQL_ASSOC)){
			$actor.=$row_actor['actors_name'].',';
		}
		$actor=substr($actor,0,-1);
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
			$category.=$row_category['categories_name'].',';
		}
		$category=substr($category,0,-1);
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
		
		$sql_vod = 'select * from `streaming_products` where imdb_id='.$row['imdb_id'].' and available_from < now() and expire_at > now() and status = "online_test_ok" limit 1 ';
	
		$query_vod =  mysql_query($sql_vod);
		$row_vod= mysql_fetch_array($query_vod,MYSQL_ASSOC);
		if($row_vod['id']>0)
			$vod='true';
		else
			$vod='false';
	$row= utf8_encode('<row><field name="catalogid">'.$row['products_id'].'</field><field name="active">'.$row['products_status'].'</field><field name="title">'.htmlspecialchars($row['products_name']).'</field><field name="year" xsi:nil="true" >'.((empty($row['products_year']))?'':$row['products_year']).'</field><field name="genre">'.$row['products_type'].'</field><field name="sub-genre"/><field name="categories" xsi:nil="true" >'.htmlspecialchars($category).'</field><field name="country" xsi:nil="true" /><field name="mediaType">'.$row['products_media'].'</field><field name="certificate"/><field name="audioLanguage" xsi:nil="true" >'.$lang.'</field><field name="subTitleLanguage" xsi:nil="true" >'.$undertitles.'</field><field name="director" xsi:nil="true" >'.htmlspecialchars($row['directors_name']).'</field><field name="actors" xsi:nil="true" >'.htmlspecialchars($actor).'</field><field name="availableDate">'.$row['products_date_available'].'</field><field name="locales"/><field name="restrictions"/><field name="vod">'.$vod.'</field></row>');
		fwrite($fp, $row);

	}
}
$doc='</ROOT>';
fwrite($fp, $doc);
fclose($fp);

mysql_close($db_link);
?>