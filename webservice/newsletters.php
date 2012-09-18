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

$preview = $_POST['preview'];
$news_id = $_POST['news_id'];
$language = $_POST['locale'];
$product_id = $_POST['product_id'];
$desc_init = stripslashes($_POST['desc']);
$focus_desc[1] = stripslashes($_POST['focus_desc1']);
$focus_desc[2] = stripslashes($_POST['focus_desc2']);
$focus_rating[1] = $_POST['focus_rating1'];
$focus_rating[2] = $_POST['focus_rating2'];
$focus1_product_id = $_POST['focus1_product_id'];
$focus2_product_id = $_POST['focus2_product_id'];
$focus_details[1] = $_POST['focus1_details'];
$focus_details[2] = $_POST['focus2_details'];
$thumbs_id[1] = $_POST['thumbs1_products_id'];
$thumbs_id[2] = $_POST['thumbs2_products_id'];
$thumbs_id[3] = $_POST['thumbs3_products_id'];
$thumbs_id[4] = $_POST['thumbs4_products_id'];
$thumbs_id[5] = $_POST['thumbs5_products_id'];
$thumbs_id[6] = $_POST['thumbs6_products_id'];
$thumbs_id[7] = $_POST['thumbs7_products_id'];
$thumbs_id[8] = $_POST['thumbs8_products_id'];
$top_id[1] = $_POST['top1_id'];
$top_id[2] = $_POST['top2_id'];
$top_id[3] = $_POST['top3_id'];
$top_id[4] = $_POST['top4_id'];
$top_id[5] = $_POST['top5_id'];
$top_id[6] = $_POST['top6_id'];
$top_id[7] = $_POST['top7_id'];
$top_id[8] = $_POST['top8_id'];
$top_id[9] = $_POST['top9_id'];
$top_id[10] = $_POST['top10_id'];
$link = $_POST['link'];
$streaming = $_POST['streaming'];
$focus_streaming[1] = $_POST['focus1_streaming'];
$focus_streaming[2] = $_POST['focus2_streaming'];
$choice = $_POST['choice'];

define('SITE_HOST_ID',1);
define('WEBSITE',1);

if($locale ==1)
{
	$locale = 'fr';
}
else if($language ==2)
{
	$locale = 'nl';
}
else
{
	$locale = 'en';
}
$filename_read = './canva_news.html';
$filename_write = 'vod_'.$news_id.'_'.$locale.'.html';
$fr = fopen($filename_read, 'r');
$content = fread($fr, filesize($filename_read));
$content = str_replace( '{%locale%}',$locale,$content);
$content = str_replace( '{%news_id%}',$news_id,$content);
$content = str_replace( '{%product_id%}',$product_id,$content);
if($choice == "1")
{
	$content = str_replace( '{%choice%}','<img src="http://www.dvdpost.be/images/newsletters/newslarbre/coupdecoeurdvdpost_'.$locale.'.jpg" width="225" height="37" border="0" alt= "coup de coeur" />',$content);
}
else
{
	$content = str_replace( '{%choice%}','',$content);
}
  if($locale =='fr')
  {
  	$trailer = 'Voir la bande-annonce';
  	
  	$link1 = 'Si vous ne visualisez pas correctement ce message,';
  	$link2 ='rendez-vous sur cette page';
  	$director = 'R&eacute;alis&eacute; par';
  	$actors_txt = 'Avec';
  	$fan ='Devenez fan de DVDPost sur';
  	$desabo1 = 'Si vous ne souhaitez plus recevoir de newsletter de DVDPost,'; 
  	$desabo2 = 'rendez-vous sur cette page';
  }
  else if($locale =='nl')
  {
  	$trailer = 'De trailer bekijken';
  	$link1 = 'Als dit bericht onleesbaar is,';
  	$link2 ='ga naar deze pagina';
  	$director = 'Geregisseerd door';
  	$actors_txt = 'Acteurs';
  	$fan ='Wordt fan van onze DVDPost pagina';
  	$desabo1 = 'Indien u de nieuwsbrief van DVDPost niet meer wenst te ontvangen, '; 
  	$desabo2 = 'ga naar deze pagina'; 	
  }
  else
  {
  	$trailer = 'Watch the preview';
  	$link1 = 'If you cannot read this message, ';
  	$link2 ='please visit this page';
  	$director = 'Directed by';
  	$actors_txt = 'Actors';
  	$fan ='Become a fan of our DVDPost page';
  	$desabo1 = 'To unsubscribe to our DVDPost newsletter, '; 
  	$desabo2 = 'please visit this page';  	
  }
$listing_sql = 'select p.rating_users,p.rating_count,p.products_id, pd.products_name , pd.products_image_big,p.products_media,products_year,p.imdb_id,products_description, products_studio, directors_id,directors_name';
$listing_sql .= ' from  '.TABLE_PRODUCTS . ' p ';
$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $language ;
$listing_sql .= ' join directors d on p.products_directors_id = d.directors_id' ;
$listing_sql .= ' where  p.products_id in ('.$product_id.')';
#echo $listing_sql;
$query_vod = mysql_query($listing_sql,$links[0]);
$vod_data = '';
$i=0;
$dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC);
	$i++;
	$content = str_replace( '{%director_id%}',$dvd['directors_id'],$content);
	$content = str_replace( '{%director_name%}',htmlspecialchars(utf8_encode($dvd['directors_name'])),$content);
	$content = str_replace( '{%imdb_id%}',$dvd['imdb_id'],$content);
	
	if($streaming=="1")
  {
    $content = str_replace( '{%streaming%}','<a href="http://private.dvdpost.com/'.$locale.'/streaming_products/'.$dvd['imdb_id'].'?warning=1" target="_blank">',$content);
  }
  else
  {
    $content = str_replace( '{%streaming%}','',$content);
  }
	$desc = htmlspecialchars(utf8_encode(sub($dvd['products_description'],250)));
	if(empty($desc_init))
		$content = str_replace( '{%description%}',$desc,$content);
	else
		$content = str_replace( '{%description%}',$desc_init,$content);
	
	$sql_actor = 'select * from actors a
	join products_to_actors pa on pa.actors_id = a.actors_id 
	where products_id='.$product_id;
	#echo $sql_actor;
	$query_actors = mysql_query($sql_actor,$links[0]);
	$actors_data = '';
	$i=0;
	while($actors =  mysql_fetch_array($query_actors, MYSQL_ASSOC))
	{
		if ($i != 0)
		{
			$actors_data .= ' , ';
		}
		$actors_data .= '<a href="http://private.dvdpost.com/'.$locale.'/actors/'.$actors['actors_id'].'/products" target="_blank" style="color:  rgb(43, 56, 64); text-decoration: none;"><strong>'.htmlspecialchars(utf8_encode($actors['actors_name'])).'</strong></a>';
		
		$i++;
	}
	$content = str_replace( '{%actors_data%}',$actors_data,$content);
	if(!empty($focus1_product_id) && !empty($focus2_product_id))
	{
		$list = $focus1_product_id.','.$focus2_product_id;
		$focus = return_output('./focus.html');
		$listing_sql = 'select *';
		$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
		$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $language ;
		$listing_sql .= ' where  p.products_id in ('.$list.') order by FIELD(p.products_id, '.$list.')';
		$query_vod = mysql_query($listing_sql,$links[0]);
		$vod_data = '';
		$i=0;
		#echo $listing_sql;
		while ($dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC)) 
		{
			$i++;
			$focus = str_replace( '{%focus'.$i.'_product_id%}',$dvd['products_id'],$focus);
			$focus = str_replace( '{%focus'.$i.'_name%}',htmlspecialchars(utf8_encode($dvd['products_name'])),$focus);
			$focus = str_replace( '{%focus'.$i.'_details%}',$focus_details[$i],$focus);
			$d = empty($focus_desc[$i]) ? htmlspecialchars(utf8_encode(sub($dvd['products_description'],250))) : $focus_desc[$i];
			$focus = str_replace( '{%focus'.$i.'_description%}',$d,$focus);
			$focus = str_replace( '{%focus'.$i.'_stars%}',$focus_rating[$i],$focus);
			$focus = str_replace( '{%focus'.$i.'_imdb_id%}',$dvd['imdb_id'],$focus);
			if($focus_streaming[$i]=="1")
      {
        $focus = str_replace( '{%focus'.$i.'_streaming%}','<a href="http://private.dvdpost.com/'.$locale.'/streaming_products/'.$dvd['imdb_id'].'?warning=1" target="_blank" ><img src="http://www.dvdpost.be/images/newsletters/voir_'.$locale.'.jpg" width="160" height="29" border="0" alt="streaming" /></a>',$focus);//
      }
      else
      {
        $focus = str_replace( '{%focus'.$i.'_streaming%}','',$focus);
      }
			$focus = str_replace( '{%locale%}',$locale,$focus);
			
		}
		$content = str_replace( '{%focus%}',$focus,$content);
	}
	else
	{
		$content = str_replace( '{%focus%}','',$content);
	}
	if(!empty($thumbs_id[1]))
	{
		$thumbs = return_output('./thumbs.html');
		$list = $thumbs_id[1].','.$thumbs_id[2].','.$thumbs_id[3].','.$thumbs_id[4];
		$listing_sql = 'select  *';
		$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
		$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $language;
		$listing_sql .= ' join products_to_categories c on c.products_id = p.products_id';
		$listing_sql .= ' join `categories_description` cd on cd.categories_id = c.categories_id and cd.language_id = ' . $language;
		$listing_sql .= ' where  p.products_id in ('.$list.') group by p.products_id order by FIELD(p.products_id, '.$list.')';
		$query_vod = mysql_query($listing_sql,$links[0]);
		$vod_data = '';
		$i=0;
		#echo $listing_sql;
		while ($dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC)) 
		{
			$i++;
			$thumbs = str_replace( '{%thumbs'.$i.'_product_id%}',$dvd['products_id'],$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_name%}',htmlspecialchars(utf8_encode($dvd['products_name'])),$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_description%}',htmlspecialchars(utf8_encode(sub($dvd['products_description'],250))),$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_category%}',htmlspecialchars(utf8_encode($dvd['categories_name'])),$thumbs);
			$thumbs = str_replace( '{%locale%}',$locale,$thumbs);
			
		}
		$content = str_replace( '{%thumbs1%}',$thumbs,$content);
	}
	else
		$content = str_replace( '{%thumbs1%}','',$content);
	
	if(!empty($thumbs_id[5]))
	{
		$thumbs = return_output('./thumbs2.html');
		$list = $thumbs_id[5].','.$thumbs_id[6].','.$thumbs_id[7].','.$thumbs_id[8];
		$listing_sql = 'select  *';
		$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
		$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $language;
		$listing_sql .= ' join products_to_categories c on c.products_id = p.products_id';
		$listing_sql .= ' join `categories_description` cd on cd.categories_id = c.categories_id and cd.language_id = ' . $language;
		$listing_sql .= ' where  p.products_id in ('.$list.') group by p.products_id order by FIELD(p.products_id, '.$list.')';
		$query_vod = mysql_query($listing_sql,$links[0]);
		$vod_data = '';
		$i=0;
		#echo $listing_sql;
		while ($dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC)) 
		{
			$i++;
			$thumbs = str_replace( '{%thumbs'.$i.'_product_id%}',$dvd['products_id'],$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_name%}',htmlspecialchars(utf8_encode($dvd['products_name'])),$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_description%}',htmlspecialchars(utf8_encode(sub($dvd['products_description'],250))),$thumbs);
			$thumbs = str_replace( '{%thumbs'.$i.'_category%}',htmlspecialchars(utf8_encode($dvd['categories_name'])),$thumbs);
			$thumbs = str_replace( '{%locale%}',$locale,$thumbs);
			
		}
		$content = str_replace( '{%thumbs2%}',$thumbs,$content);
	}
	else
		$content = str_replace( '{%thumbs2%}','',$content);
	
	if(!empty($top_id[1]))
  {
  	$top = return_output('./footer.html');
  	$list = $top_id[1].','.$top_id[2].','.$top_id[3].','.$top_id[4].','.$top_id[5].','.$top_id[6].','.$top_id[7].','.$top_id[8].','.$top_id[9].','.$top_id[10];
		$listing_sql = 'select *';
		$listing_sql .= ' from  dvdpost_be_prod.'.TABLE_PRODUCTS . ' p ';
		$listing_sql .= ' left join dvdpost_be_prod.' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $language ;
		$listing_sql .= ' where  p.products_id in ('.$list.') order by FIELD(p.products_id, '.$list.')';
		$query_vod = mysql_query($listing_sql,$links[0]);
		$vod_data = '';
		$i=0;
		#echo $listing_sql;
		while ($dvd =  mysql_fetch_array($query_vod, MYSQL_ASSOC)) 
		{
			$i++;
			$top = str_replace( '{%top'.$i.'_id%}',$dvd['products_id'],$top);
			$top = str_replace( '{%top'.$i.'_name%}',htmlspecialchars(utf8_encode($dvd['products_name'])),$top);
		}
		$top = str_replace( '{%locale%}',$locale,$top);
		$top = str_replace( '{%news_id%}',$news_id,$top);
    
		
    $content = str_replace( '{%top%}',$top,$content);
  }
  else
  {
  		$content = str_replace( '{%top%}','',$content);
  }
  
  
  
  
	$content = str_replace( '{%trailer%}',$trailer,$content);
  $content = str_replace( '{%link1%}',$link1,$content);
  $content = str_replace( '{%link2%}',$link2,$content);
  $content = str_replace( '{%director%}',$director,$content);
  $content = str_replace( '{%actors%}',$actors_txt,$content);
  $content = str_replace( '{%fan%}',$fan,$content);
  $content = str_replace( '{%desabo1%}',$desabo1,$content);
  $content = str_replace( '{%desabo2%}',$desabo2,$content);
  $content = str_replace( '{%link%}',$link,$content);
	
if($preview==1)
{
  $content = str_replace( '{%header%}','',$content);
  $content = str_replace( '{%footer%}','',$content);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>news hebdo</title>
</head>
<body  bgcolor="#2c3841">
<?

	include('email_vision_data2.php');
	echo 'content';
	echo $content;	
?>
</body>
</html>
<?
}
else
{
  $header = return_output('./header.html');
  $footer = return_output('./foot.html');
  
	$content = str_replace( '{%header%}',$header,$content);
  $content = str_replace( '{%footer%}',$footer,$content);
	$fw = fopen($filename_write, 'w');
	fwrite($fw, $content);
	fclose($fr);
	fclose($fw);
	mysql_close($links[0]);
	#mysql_close($links[1]);
	forcerTelechargement($filename_write,'./'.$filename_write,filesize($filename_write));
	
}
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
function return_output($file){
    ob_start();
    include $file;
    return ob_get_clean();
}

?>

