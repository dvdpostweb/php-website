<?php
$sql= 'select translation_key as cfgKey, translation_value as cfgValue from dvdpost_common.translation2 where language_id = ' . intval($languages_id) . ' and translation_page="root" and (site_host_id  = ' . SITE_HOST_ID . ' or site_host_id  = ' . WEBSITE . ' or site_host_id =0 )  order by FIELD(site_host_id,'.SITE_HOST_ID.','.WEBSITE.',0 )';
#echo $sql;
$translation_query = tep_db_query($sql);
while ($translation = tep_db_fetch_array($translation_query)) {
	define($translation['cfgKey'], $translation['cfgValue']);
}	
?>