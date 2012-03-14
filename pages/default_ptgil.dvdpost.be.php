<style>
.offre_ptg {
	padding-top:40px;
}
body
{
	background: url(images/ptgil/bg_ptg.jpg) !important;
}
</style>
<link href="./stylesheet/playthegame.css" media="all" rel="stylesheet" type="text/css" />
<link href="./stylesheet/public_2009.css" media="all" rel="stylesheet" type="text/css" />

<p><img src="images/ptgil/<?= $lang_short ?>/header.jpg" width="970" height="388" border="0" /></p>
<div class="offre_ptg">
<form action="activation_code_confirm.php" method="post" name="form1">
 
  <div id="promo">
    <div id="promo_area">
      <p class="text_promo"><?= TEXT_PROMO_TITLE ?></p>
			<p style="margin:0">
      	<input type="text" size="20" value="ptg3456" class="inputs_codes_groupon" id="code" name="code">
      	<input type="image" border="0" align="absmiddle"  src="images/ptgil/ptg_button_go.gif" name="imageField" class="no_border_button">
			</p>
    </div>
    <div align="center" id="help_area_ptg"><img width="347" height="72" src="images/ptgil/<?= $lang_short ?>/help_grey.gif" /><br />
      <a href="/conditions.php"><strong><?= TEXT_CONDITION ?></strong></a></div>
    <div class="clear"></div>
    
    <input type="hidden" value="gift" id="condition1" name="condition1">
  </div>

</form>
</div>


</div>