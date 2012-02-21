<?php 
function ReplaceTranslationAll($translation_text, $language) {	
  $output = $translation_text;
  $i = 0;
  $i = strpos($output, '$$$');	
  while ($i>0) {
      $j = strpos($output, '£££',$i);	
 	  $text_to_replace = substr($output, $i, ($j - $i)+3);
	  $constant_name = substr($text_to_replace,3,strlen($text_to_replace)-6);
	  if(!defined($constant_name)){
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','constante erreur','constante'.$constant_name.' dans la traduction '.$translation_text,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		$output = str_replace($text_to_replace, '' , $output);
	  }
	  else
		  $output = str_replace($text_to_replace, constant($constant_name) , $output);
	  $old_i=$i;
	  $i = strpos($output, '$$$');
	  if($old_i==$i){
		break;
		tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','constante erreur','constante'.$constant_name.' dans la traduction '.$translation_text,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		echo 'error';
 	  }
  }	  
   @eval('$output = "' . str_replace('£££',' . "',str_replace('$$$','" . ',str_replace("\"", "\\\"", $translation_text))) . '";'); 
  return $output;

}
$sql='select translation_key as cfgKey, translation_value as cfgValue from dvdpost_common.translation2 where language_id = ' . intval($languages_id) . ' and translation_page="' . $current_page_name . '"and (EntityID ='.ENTITY_ID.' or EntityID =1) and (site_host_id = ' . SITE_HOST_ID . ' or site_host_id ='.WEBSITE.' or site_host_id =0 ) order by entityID desc , FIELD(site_host_id,'.SITE_HOST_ID.','.WEBSITE.',0 )';
#echo $sql;
$translation_query = tep_db_query($sql);
while ($translation = tep_db_fetch_array($translation_query)) {
	//define($translation['cfgKey'], $translation['cfgValue']);
	define($translation['cfgKey'], ReplaceTranslationAll($translation['cfgValue'],$language));
}

$translation_bo_url= "http://bo.dvdpost.be/translation2/viewtranslation.aspx?translation_page=" . $current_page_name;
?>