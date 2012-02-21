<?php 
require('configure/application_top.php');

$current_page_name = FILENAME_LISTING_CATEGORY_PUBLIC;

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));
$page_body_to_include = $current_page_name;

$meta1 =TEXT_META_TITLE1B ;
$HTTP_GET_VARS['cPath']=intval($HTTP_GET_VARS['cPath']);
$cPath=$_GET['cPath']=$HTTP_GET_VARS['cPath'];
if ($HTTP_GET_VARS['cPath']>0){
	$category_query = tep_db_query("select categories_name ,categories_type from categories_description cd join categories c on c.categories_id = cd.categories_id where c.categories_id ='".$HTTP_GET_VARS['cPath']."' and language_id='".$languages_id."' "); 
	$category = tep_db_fetch_array($category_query);
	$tag1=$category['categories_name'];
	$type=$category['categories_type'];
	
	$tag2='';
	$Parent_category_query = tep_db_query("select categories_id from categories where  parent_id ='".$HTTP_GET_VARS['cPath']."' "); 
	while ($Parent_category = tep_db_fetch_array($Parent_category_query)){
		$child_category_query = tep_db_query("select categories_name from categories_description where  categories_id ='".$Parent_category['categories_id']."' and language_id='".$languages_id."'" );
		$child_category = tep_db_fetch_array($child_category_query);
		$tag2.= $child_category['categories_name'].' - ';	
	}
}else{
	$type='DVD_NORM';
	switch ($list){	
	  case '1':
	    $tag1= TEXT_CULT_MOVIES;
	    break;
	  	case 'stars':
		    $tag1= TEXT_5STARS;
		    break;
		case 'cinema':
//			    $tag1= TEXT_5STARS;
			    break;
	case 'dvdpostchoice':
	    $tag1= TEXT_DVDP_CHOICE;
	    break;
	  case 'awards':
	  	$tag1= TEXT_AWARDS;
	  	break;
	  case 'new':
	  	$tag1= TEXT_NEW;
	  	break;
	  case 'next':
	  	$tag1= TEXT_NEXT;
	  	break;
	  case 'french':
	  	$tag1= TEXT_FRENCH;
	  	break;
	  case 'classic':
	  	$tag1= TEXT_OLDIES;
	  	break;
	  case 'bluray':
	  	$tag1= TEXT_BLURAY;
	 	break;	
	  case 'fresh':
	  	$tag1= TEXT_FRESH;
	 	break;	
	  case 'fresh':
	  	$tag1= TEXT_CINEMA;
	 	break;	
	  case '6':
	  	$tag1= TEXT_FAMILY;
	  	break;
	  case '7':
	  	$tag1= TEXT_SMALL_PRODUCTION;
	  	break;
	  }			
	if($_GET['list']>=18 && $_GET['list']<=71)
		$type='DVD_ADULT';
} 

$meta1 = str_replace('µµµtag1µµµ',  $tag1 , $meta1);
$meta1 = str_replace('µµµtag2µµµ',  $tag2 , $meta1);
if($type=='DVD_NORM')
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php'));
else
{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_movix.php'));
}
require('configure/application_bottom.php');
?>