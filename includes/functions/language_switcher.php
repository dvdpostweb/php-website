<?php 

// Changing language without lose var parameter in the url.
function language_switcher($link , $query, $language) {
	$pos = strstr($query,'language');
	if($pos != false){
		$pos = strpos($query,'language');
		$query=substr_replace($query, $language, $pos,11)	;	
		}
		else{
			if(strlen($query)>0){
			$query=$query.'&'.$language;
			}
			else{$query=$language;}
		}
	$link=$link.'?'.$query;
	return $link;
} 
//actors
function language_switcher_actors($link , $query, $language) {
	preg_match("/.*\/(.*)/",$link,$match);
	switch($language)
	{
		case 'en':
		case 'nl':
			$cat='actors';
		break;
		case 'fr':
		default:
			$cat='acteurs';
		
	}	
	$link='/'.$language.'/'.$cat.'/'.$match[1].((!empty($query))?'?'.$query:'');
	return $link;
}
function language_switcher_directors($link , $query, $language) {
	preg_match("/.*\/(.*)/",$link,$match);
	switch($language)
	{
		case 'en':
		case 'nl':
			$cat='directors';
		break;
		case 'fr':
		default:
			$cat='realisateurs';
		
	}	
	$link='/'.$language.'/'.$cat.'/'.$match[1].((!empty($query))?'?'.$query:'');
	return $link;
}
//movie
function language_switcher_movie($link , $query, $language) {
	//$link=substr_replace($link, $language, 1,2);	
	//if(!empty($query)) $link=$link.'?'.$query;
	preg_match("/(films|movies)\/(.*)_([0-9]*)/",$link,$match);
	$id=$match[3];
	switch($language)
	{
		case 'en':
			$lang_id=3;
		break;
		case 'nl':
			$lang_id=2;
		break;
		case 'fr':
		default:
			$lang_id=1;
		
	}
	if(empty($id))
	{
		//$id=0;
		$pos = strpos($_SERVER['REQUEST_URI'], 'faq.php');

		if ($pos === false){
		$data='<br /><br />email<br />';

		$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
		$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
		$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
		$data.='redirect page -> '.$_SERVER['REDIRECT_URL'].'<br />';
		$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
		$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
		if(!empty($_COOKIE['customers_id']))
			$data.=$_COOKIE['customers_id'].'<br />';
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','switch error','<font color="#000000">'.$data.'</font>','bugreport@dvdpost.be','bugreport@dvdpost.be');
		}
		if($language=='fr')
		{
			$link_new=str_replace('/en/','/'.$language.'/',$link);
			$link_new=str_replace('/nl/','/'.$language.'/',$link_new);
		}
		if($language=='nl')
		{
			$link_new=str_replace('/fr/','/'.$language.'/',$link);
			$link_new=str_replace('/en/','/'.$language.'/',$link_new);
		}
		if($language=='en')
		{
			$link_new=str_replace('/fr/','/'.$language.'/',$link);
			$link_new=str_replace('/nl/','/'.$language.'/',$link_new);
		}
	}else
	{
	$select="select products_name from products_description pd where products_id =".$id." and language_id =".$lang_id;
	$query=tep_db_query($select);
	$row= tep_db_fetch_array($query);
	$link_new=products_link($language,$row['products_name'],$id);
	}
	return $link_new;
}

//categorie
function language_switcher_cat($cPath , $list, $language) {
	$link=get_cats($cPath,$list,$language);
	return $link;
}
?> 