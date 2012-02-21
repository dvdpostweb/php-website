<?php header ("content-type: text/xml");
$langue=intval($_GET['langue']);
if(empty($langue) || ($langue!=1 && $langue!=2 && $langue!=3 ))
	$langue=1;
switch($langue)
{
	case 3:
		$lang='en';
		$extra='';
	break;
	case 2:
		$lang='nl';
		$extra='and p.products_undertitle_nl=1';
	break;
	case 1:
	default:
		$lang='fr';
		$extra='and p.products_language_fr=1';
}	

//$languages_id=$langue;
$current_page_name = 'default.php';
require('../configure/application_top.php');



//include(DIR_WS_INCLUDES . 'translation_root.php');

function xmlparse($data)
{
	$data=htmlspecialchars($data);
	return $data;
}

	

if(WEB_SITE_ID==101)
{
	$server='www.dvdpost.nl';
	$title=	TEXT_NEW.' - DVDpost.nl';
}
else
{
	$server='www.dvdpost.be';
	$title=	TEXT_NEW.' - DVDpost.be';
}
$title=xmlparse($title);

echo '<?xml version="1.0" encoding="iso-8859-1"?>';tr
?>


<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/">

<channel>
	<title><?=xmlparse($title) ?></title>
	<atom:link href="http://<?= $server ?>/feeds/new.xml" rel="self" type="application/rss+xml" />
	<link>http://<?= $server?>/</link>
	<description><?=xmlparse($title) ?></description>
	<language><?= $lang ?></language>
	
	
<?php

$sql='select p.products_id, p.products_ordered, pd.products_image_big,  pd.products_name,pd.products_description,products_date_available
from products p 
left join directors di on p.products_directors_id = di.Directors_id 
left join products_description pd on p.products_id = pd.products_id and pd.language_id='.$langue.' 
left join specials s on p.products_id = s.products_id 
where p.products_type = "DVD_NORM" and p.products_product_type= "Movie" and p.products_status>-1 and p.products_date_added<=curdate() and p.products_date_available >= DATE_SUB(now(), INTERVAL 2 MONTH) and p.products_next=0 and p.products_media = "DVD" '.$extra.' order by products_date_available desc limit 12 ';

$query=tep_db_cache($sql,14400);
foreach($query as $v)
{
	
	$dt=explode('-',$v['products_date_available']);
	$date  = date('r',mktime(0, 0, 0, $dt[1]  , $dt[2], $dt[0]));
	echo '<item>
			<title>'.xmlparse($v['products_name']).'</title>
			<link>http://'.$server.products_link($lang,$v['products_name'],$v['products_id']).'</link>
				<pubDate>'.$date.'</pubDate>
				<guid isPermaLink="false">http://'.$server.'/product_info_public.php?products_id='.$v['products_id'].'</guid>
				<image>
					<title>'.xmlparse($v['products_name']).'</title>
					<link>http://'.$server.'</link>
					<url>http://'.$server.'/images/'.$v['products_image_big'].'</url> 
				</image>
				
				<description><![CDATA[<img width="111" height="167" align="left" hspace="4" vspace="4" src="http://'.$server.'/images/'.$v['products_image_big'].'" />'.xmlparse($v['products_description']).']]></description>
				
				<content:encoded><![CDATA[<img width="111" height="167" align="left" hspace="4" vspace="4" src="http://'.$server.'/images/'.$v['products_image_big'].'" />'.xmlparse($v['products_description']).']]></content:encoded>
			</item>';
}

?>
</channel></rss>

