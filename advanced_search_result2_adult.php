<?php
require('configure/application_top.php');

$current_page_name = FILENAME_ADVANCED_SEARCH_RESULT2_ADULT;

if (!tep_session_is_registered('customer_id')) {
	$page=((!empty($_GET['page']))?$_GET['page']:1);
	
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('keywords'=>$_GET['keywords'],'page'=>$page)));
	tep_redirect(FILENAME_LOGIN);
}
if (!tep_session_is_registered('adult_pwd')) {
	$page=((!empty($_GET['page']))?$_GET['page']:1);
	
	$navigation->set_snapshot(array('mode' => 'NONSSL', 'page' => $current_page_name,'get' => array('keywords'=>$_GET['keywords'],'page'=>$page)));
	tep_redirect(FILENAME_LOGIN_ADULTPWD);
}


include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
switch ($languages_id){
	case 1: 
		$lang_sql=" and p.products_language_fr= 1 ";
		break;
		
	case 2:
		$lang_sql="  and p.products_undertitle_nl=1 ";
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
	$arg = array('-s',' @weight DESC rate DESC');
	$search=trim($HTTP_GET_VARS['keywords']);
	$filter='';
	if(strpos($search,'dvd')!==false)
	{
		$search=str_replace('dvd','',$search);
		$filter=" and products_media='dvd'";
	}
	else if(strpos($search,'bluray')!==false || strpos($search,'blueray')!==false || strpos($search,'blue-ray')!==false || strpos($search,'blu-ray')!==false)
	{
		$search=str_replace('bluray','',$search);
		$search=str_replace('blueray','',$search);
		$search=str_replace('blue-ray','',$search);
		$search=str_replace('blu-ray','',$search);
		$filter=" and products_media='blueray'";
	}
	$index_products='products_adult';
	$index_actors='actors_adult';
		
	$page=((empty($_GET['page']))?1:$_GET['page']);
	$list=search($search,'@products_name ',$index_products,$arg,false);
	$list_actors=search($search,'',$index_actors,array(),false);
	$list_directors=search($search,'@studio_name ',$index_products,$arg,false);
	
	$sql = "select count(p.products_id) as count ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_ADULT'  AND p.products_product_type='Movie'  ".$filter." and p.products_status != -1 and p.only_for_sale=0 and pd.products_id in(".$list.")";
	$count_movie_query = tep_db_query($sql); 
	$count_movie = tep_db_fetch_array($count_movie_query);
	$sql = "select count(p.products_id) as count ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_ADULT'  AND p.products_product_type='Movie'  ".$filter." and p.products_status != -1 and p.only_for_sale=0 and pd.products_id in(".$list_actors.") ";

	$count_actors_query = tep_db_query($sql); //BEN001

	$count_actors = tep_db_fetch_array($count_actors_query);
    
	$sql = "select count(p.products_id) as count ";
	$sql .=" from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id and pd.language_id = ".$languages_id." where p.products_type = 'DVD_ADULT'  AND p.products_product_type='Movie'  ".$filter." and p.products_status != -1 and p.only_for_sale=0 and pd.products_id in(".$list_directors.") ";
	$count_directors_query = tep_db_query($sql); 
	$count_directors = tep_db_fetch_array($count_directors_query);
	if(	empty($_GET['type']) && $count_movie['count']==0 && $count_actors['count']>0)
	{
		
		tep_redirect(tep_href_link('advanced_search_result2_adult.php?type=actors&keywords='.$keywords, '', 'NONSSL'));
		die();
	}
	if(empty($_GET['type']) && $count_movie['count']==0 && $count_actors['count']==0 && $count_directors['count']>0)
	{
			tep_redirect(tep_href_link('advanced_search_result2_adult.php?type=studio&keywords='.$keywords, '', 'NONSSL'));
			die();
	}
}
include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_private_adult.php'));

require('configure/application_bottom.php');

?>