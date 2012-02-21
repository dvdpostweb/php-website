<?php
require('configure/application_top.php');

$current_page_name = FILENAME_ADVANCED_SEARCH_RESULT2;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;


switch ($languages_id){
	case 1: 
		$lang_sql=" and p.products_language_fr = 1 ";
		break;
		
	case 2:
		$lang_sql=" and p.products_undertitle_nl = 1";
		break;
		
	case 3:
		$lang_sql=" ";
		break;
}

$HTTP_GET_VARS['keywords']=trim($HTTP_GET_VARS['keywords']);
$HTTP_GET_VARS['keywords']=replace_accents($HTTP_GET_VARS['keywords']);
if(empty($_GET['type']))
{
	$type='movie';
}
else
{
	$type=$_GET['type'];
}
include('sphinx/search.php');

if (strlen($HTTP_GET_VARS['keywords'])>1){
	//$arg = array('-s',' @weight DESC rate DESC');
	$arg = array('-s',' @weight DESC rate DESC');
	$search=trim($HTTP_GET_VARS['keywords']);
	$filter='';
	if(strpos($search,'dvd')!==false)
	{
		$filter=" and products_media='dvd'";	
		$search=str_replace('dvd','',$search);
	}
	else if(strpos($search,'bluray')!==false || strpos($search,'blueray')!==false || strpos($search,'blue-ray')!==false || strpos($search,'blu-ray')!==false)
	{
		$search=str_replace('bluray','',$search);
		$search=str_replace('blueray','',$search);
		$search=str_replace('blue-ray','',$search);
		$search=str_replace('blu-ray','',$search);
		$filter=" and products_media='blueray'";
	}
	$index_products='products_norm';
	$index_actors='actors_norm';
	$index_serie='products_norm_serie';
	$index_directors='directors_norm';
	
	if($_GET['debug']==1)
		$verbose=true;
	else
		$verbose=false;
	$page=((empty($_GET['page']))?1:$_GET['page']);
	$list=search($search,'@(products_name)',$index_products,$arg,$verbose);
	$list_serie=search($search,'@(products_name)',$index_serie,$arg,$verbose);
	$list_actors=search($search,'',$index_actors,array(),$verbose);
	$list_directors=search($search,'',$index_directors,array(),$verbose);
	
	$sql = "select count(p.products_id) as count ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_NORM'  AND p.products_product_type='Movie'  ".$lang_sql.$filter." and p.products_status != -1 and pd.products_id in(".$list.")";
	$count_movie_query = tep_db_query($sql); 
	$count_movie = tep_db_fetch_array($count_movie_query);
	
	$sql = "select * ";
	$sql .=" from " . TABLE_PRODUCTS . " p ";
	$sql .=" left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id;
	$sql .=" left JOIN products_to_actors pa ON p.products_id = pa.products_id ";
	$sql .=" left join actors a on a.actors_id = pa.actors_id ";
	$sql .=" where p.products_type = 'DVD_NORM'  AND p.products_product_type='Movie'  ".$lang_sql.$filter." and p.products_status != -1 and a.actors_id in(".$list_actors.") order by a.actors_id";
	
	$count_actors_query = tep_db_query($sql); //BEN001
	$list_actors_products='0';
	$count_actors = tep_db_num_rows($count_actors_query);
	while($row=tep_db_fetch_array($count_actors_query)){
		$list_actors_products.=','.$row['products_id'];
	}

	$count_actors_query = tep_db_query($sql); //BEN001

	$count_actors = tep_db_fetch_array($count_actors_query);
    
	$sql = "select * ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_NORM'  AND p.products_product_type='Movie'  ".$lang_sql.$filter." and p.products_status != -1 and p.products_directors_id in(".$list_directors.") ";
	$count_directors_query = tep_db_query($sql); //BEN001
	$list_directors_products='0';
	$count_directors = tep_db_num_rows($count_directors_query);
	while($row=tep_db_fetch_array($count_directors_query)){
		$list_directors_products.=','.$row['products_id'];
	}
	
	
	$sql = "select count(p.products_id) as count ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_NORM'  AND p.products_product_type='Movie'  ".$lang_sql.$filter." and p.products_status != -1 and p.products_series_id in(".$list_serie.") ";
	//echo $sql;
	$count_series_query = tep_db_query($sql); 
	$count_series = tep_db_fetch_array($count_series_query);
	
	$sql="select * from actors a where a.actors_id in(".$list_actors.") ";
	$query_actors=tep_db_query($sql);
	$actors_nb=tep_db_num_rows($query_actors);
	$sql="select * from directors d where d.directors_id in(".$list_directors.") ";
	$query_directors=tep_db_query($sql);
	$directors_nb=tep_db_num_rows($query_directors);
	if(	empty($_GET['type']) && $count_movie['count']==0 && $count_series['count']>0)
	{
		
		tep_redirect(tep_href_link('advanced_search_result2.php?type=serie&keywords='.$keywords, '', 'NONSSL'));
		die();
	}
	if(	empty($_GET['type']) && $count_movie['count']==0 && $count_series['count']==0 && $actors_nb>0)
	{
		
		tep_redirect(tep_href_link('advanced_search_result2.php?type=actors&keywords='.$keywords, '', 'NONSSL'));
		die();
	}
	if(empty($_GET['type']) && $count_movie['count']==0 && $actors_nb==0 && $count_series['count']==0  && $directors_nb>0)
	{
			tep_redirect(tep_href_link('advanced_search_result2.php?type=directors&keywords='.$keywords, '', 'NONSSL'));
			
			die();
	}
}
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private.php'));

require('configure/application_bottom.php');

?>