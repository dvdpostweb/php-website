<?php

require('../configure/application_top.php');
$current_page_name ='language.php';
include(DIR_WS_INCLUDES . 'translation.php');
if(empty($_COOKIE['email_vod_free']))
{
  die('error');
}
$sql_l = 'select * from products_languages where languages_id = '.$_GET['language_id'].' and languagenav_id= '.$languages_id;
$query_l = tep_db_query($sql_l);
$lang = tep_db_fetch_array($query_l);
$sql = 'select id,  IFNULL(`undertitles_description`,"'.TEXT_NO.'") name from streaming_products 
left  join products_undertitles pl on pl.undertitles_id = streaming_products.subtitle_id and pl.language_id= '.$language_id.'
where ( streaming_products.status = "online_test_ok" and ((streaming_products.available_from <= date(now()) and streaming_products.expire_at >= date(now())) or (streaming_products.available_backcatalogue_from <= date(now()) and streaming_products.expire_backcatalogue_at >= date(now()))) and available = 1) and imdb_id = 1602620 and country="BE" and streaming_products.language_id = ' . $_GET['language_id'];
 $query = tep_db_query($sql);
?>
<p class="choice_valided">
  <?= TEXT_AUDIO ?> : <span class="selected"><?= utf8_encode($lang['languages_description']) ?></span> | 
  <a href="#" id = 'change_step2'><?= TEXT_CHANGER ?></a>
</p>

<p class="choice_question"><?= TEXT_DESCRIPTION ?></p>

<p class="subs">
  <? while($l=tep_db_fetch_array($query)){ ?>
    
    <? echo "<a href='/promotions/subtitle.php?id=".$l['id']."' class = 'btn language_btn'><strong>".utf8_encode($l['name'])."</strong></a>"; ?>
  <? }?>
  
</p>