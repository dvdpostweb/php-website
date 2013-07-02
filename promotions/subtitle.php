<?php
 require('../configure/application_top.php');
 $current_page_name ='subtitle.php';
 include(DIR_WS_INCLUDES . 'translation.php');
 $sql = 'select languages_description audio, ifnull(`undertitles_description`,"'.TEXT_NO.'") subtitle from streaming_products sp
 left join products_languages pl on language_id = languages_id and languagenav_id='.$languages_id.'
 left join products_undertitles pu on subtitle_id = undertitles_id and pu.language_id='.$language_id.'
  where id = '.$_GET['id'];
  $query = tep_db_query($sql);
  $m = tep_db_fetch_array($query);
 ?>
<p class="choice_valided"><?= TEXT_AUDIO ?> : <span class="selected"><?= utf8_encode($m['audio']) ?></span> | <a href="#" id="change_step2"><?= TEXT_CHANGER ?></a> </p>
<p class="choice_valided"><?= TEXT_SUB ?> : <span class="selected"><strong><?= utf8_encode($m['subtitle']) ?></strong></span> | <a href="#" id="change_step3"><?= TEXT_CHANGER ?></a> </p>
<p class="audios">
  <a href="/promotions/movie.php?id=<?= $_GET['id'] ?>" class="btn_play  qualityvod"><strong><?= TEXT_START ?></strong></a>
</p>