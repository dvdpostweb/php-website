<link href="./stylesheet/groupon.css" media="all" rel="stylesheet" type="text/css" />
<link href="./stylesheet/public_2009.css" media="all" rel="stylesheet" type="text/css" />
<style>
	 body{background:none;} 
</style>
   <p><img src="./images/groupon/<?= $lang_short ?>/header.jpg" width="970" height="388" border="0" /></p>
  <div class="offre_ptg">
    <div class="main-holder_groupon">
		<form action="activation_code_confirm.php" method="post" name="form1">

		  <div id="promo">
		    <div id="promo_area">
		      <p class="text_promo"><?= TEXT_STUDENT_EXPLAIN ?></p>
					<p style="margin:0">
		      	<input type="text" size="20" value="" class="inputs_codes_groupon" id="code" name="code">
		      	<input type="image" border="0" align="absmiddle"  src="./images/www3/groupon_button_go.gif" name="imageField" class="no_border_button">
					</p>
		    </div>
		    <div align="center" id="help_area_groupon"><img width="347" height="72" src="<?= DIR_WS_IMAGES_LANGUAGES.$language  ?>/images/help_grey.gif" /><br />
	        <a href="/conditions.php"><strong><?= TEXT_CONDITION_SUMMER ?></strong></a></div>
		    <div class="clear"></div>

		    <input type="hidden" value="gift" id="condition1" name="condition1">
		  </div>

		</form></p></div>
   </div>
  </div>

  
  </div>
</div>
</div>