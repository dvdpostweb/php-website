<?php
 require('../configure/application_top.php');
 $current_page_name ='movie.php';
 include(DIR_WS_INCLUDES . 'translation.php');
 $sql = 'select pl.short_alpha audio, ifnull(pu.short_alpha,"non") subtitle from streaming_products sp
 left join products_languages pl on language_id = languages_id and languagenav_id='.$languages_id.'
 left join products_undertitles pu on subtitle_id = undertitles_id and pu.language_id='.$language_id.'
  where id = '.$_GET['id'];
  $query = tep_db_query($sql);
  $m = tep_db_fetch_array($query);
 ?>
<object width="696" height="389"><param name="movie" value="http://vod.dvdpost.be/StrobeMediaPlayback.swf"><param name="flashvars" value="src=http://vod.dvdpost.be/51d154b4c40e37.74065855_<?= $m['audio'] ?>_<?= $m['subtitle'] ?>.f4m&amp;loop=false&amp;autoPlay=true&amp;streamType=recorded&amp;verbose=true&amp;initialBufferTime=5&amp;expandedBufferTime=30"><param name="allowFullScreen" value="true"><param name="allowscriptaccess" value="always"><embed src="http://vod.dvdpost.be/StrobeMediaPlayback.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="696" height="389" flashvars="src=http://vod.dvdpost.be/51d154b4c40e37.74065855_<?= $m['audio'] ?>_<?= $m['subtitle'] ?>.f4m&amp;loop=false&amp;autoPlay=true&amp;streamType=recorded&amp;verbose=true&amp;initialBufferTime=5&amp;expandedBufferTime=30"></object>