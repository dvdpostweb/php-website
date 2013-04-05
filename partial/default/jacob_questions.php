<div class="navcontainer">
  <? if($current_page_name =='step_check.php' && (!($discount_values[discount_type]==1 && $discount_values[discount_value]==0))){  ?>
  <div style="padding:5px;background:#fff;border:1px solid #333; margin:0 0 10px">
  <?= TEXT_WARNING ?>
  </div>
  <? } ?>
  <h3 class="ttl"><?= TEXT_MENU_JACOB ?></h3>
	<div class="banner_help" align='center'><img src="/images/jb/womanguide.jpg" /></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question6'><?= HELP_FREE ?></div>
	<div id="response_color6"><div  class="text_guide" id='response6' style='display:none'><?= RESPONSE4 ?></div></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question1'><?= HELP_HOW ?></div>
	<div id="response_color1">
		<div  class="text_guide" id='response1' style='display:none'><?= RESPONSE1 ?></div>
	</div>
	
	<div class="nav_<?= $lang_short ?> question nav" id='question2'><?= HELP_SECURE ?></div>
	<div id="response_color2"><div  class="text_guide" id='response2' style='display:none'><?= RESPONSE3 ?></div></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question10'><?= QUESTION10 ?></div>
	<div id="response_color10"><div  class="text_guide" id='response10' style='display:none'><?= RESPONSE10 ?></div></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question3'><?= HELP_PAIMENT ?></div>
	<div id="response_color3"><div  class="text_guide" id='response3' style='display:none'><?= RESPONSE6 ?></div></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question4'><?= HELP_UNSUB ?></div>
	<div id="response_color4"><div  class="text_guide" id='response4' style='display:none'><?= RESPONSE9 ?></div></div>
	<div class="nav_<?= $lang_short ?> question nav" id='question5'><?= HELP_CONTACT ?></div>
	<div id="response_color5"><div  class="text_guide" id='response5' style='display:none'><?= str_replace('{{url}}','contact_public.php',RESPONSE7) ?></div></div>

