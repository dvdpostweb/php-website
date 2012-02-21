<?php

header ("content-type: text/xml");

function ponctuation($str)
{
	$str=preg_replace("/[^\-\w]/", '_',$str);
	return $str;
}
function ponctuation2($str)
{
	$str=preg_replace("/[^\-\w]/", '_',$str);
	$str=preg_replace("/(_){2,9}/", '_',$str);
	return $str;
}
function lien_mort($lien) // retourne false si lien mort
{

 $file = @fopen($lien, 'r');
    if ($file) return "ok";
    else return "dead";
}
require('../configure/application_top.php');
if(empty($_GET['langue']))
{
	$_GET['langue']=1;
}
$xml='<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';


/* movies */
$limit=$_GET['limit'];
$sql="SELECT *
FROM `products` p
JOIN products_description pd ON p.products_id = pd.products_id
WHERE `products_type` LIKE 'dvd_norm'
AND `products_status` NOT LIKE '-1' and language_id='".$_GET['langue']."'".(!empty($limit)? ' limit '.$limit:'');
$query = tep_db_query($sql);
$i=0;
if($_GET['langue']==1)
{
	$lang='fr';
}
else if ($_GET['langue']==2)
{
	$lang='nl';
}
else
{
	$lang='en';
}
while($products_value = tep_db_fetch_array($query)){
	
	$url=products_link($lang,$products_value['products_name'],$products_value['products_id']);
	$xml.='<url><loc>http://'.$_SERVER["SERVER_NAME"].$url.'</loc>';
	if($products_value['producs_last_modified']>0)
      $xml.='<lastmod>'.$products_value['producs_last_modified'].'</lastmod>';
    $xml.='<priority>0.9</priority></url>
';
}
/* actors */

$sql="SELECT *
FROM `actors`".(!empty($limit)? ' limit '.$limit:'');
$query = tep_db_query($sql);
$i=0;

while($actors_value = tep_db_fetch_array($query)){
	$url=actors_link($lang,$actors_value['actors_name'],$actors_value['actors_id']);
	$xml.='<url><loc>http://'.$_SERVER["SERVER_NAME"].$url.'</loc>';
    $xml.='<priority>0.7</priority></url>
';
}
/* actors */

$sql="SELECT *
FROM `directors`".(!empty($limit)? ' limit '.$limit:'');
$query = tep_db_query($sql);
$i=0;

while($dir_value = tep_db_fetch_array($query)){
	$url= directors_link($lang,$dir_value['directors_name'],$dir_value['directors_id']);				
	$xml.='<url><loc>http://'.$_SERVER["SERVER_NAME"].$url.'</loc>';
    $xml.='<priority>0.7</priority></url>
';
}
/* categorie */


$sql="SELECT *
FROM categories c
WHERE categories_type = 'DVD_NORM' and active='yes' and product_type='movie'";
$query = tep_db_query($sql);
while($categorie_value = tep_db_fetch_array($query)){
	
	$url=get_cats($categorie_value['categories_id'],'',$lang,'DVD_NORM');
	$xml.='<url><loc>http://'.$_SERVER["SERVER_NAME"].$url.'</loc>
      <priority>0.7</priority></url>
';
	
	
 
	
}
$xml.='
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/default.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/how.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/catalog.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/contact.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/mydvdshop_public.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/faq.php?faq=new&amp;language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/how.php?faq=7&amp;language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/privacy.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/conditions.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/freetrial_info.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
<url>
  <loc>http://'.$_SERVER["SERVER_NAME"].'/quizz.php?language='.$lang.'</loc>
  <priority>1</priority>
</url>
';
$xml.='</urlset>';
echo $xml; 
?>