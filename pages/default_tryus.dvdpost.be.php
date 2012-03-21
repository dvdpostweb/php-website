<link href="./stylesheet/ipad.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://www.dvdpost.be/stylesheet/public_2009.css" media="all" rel="stylesheet" type="text/css" />
<p><img src="images/prospects/<?= $lang_short ?>/header.jpg" width="970" height="388" border="0" /></p>
<div class="offre_ptg">
  <form action="activation_code_confirm.php" method="post" name="form1">
    <div id="promo">
      <div id="promo_area">
            <p align="center">
								<input type ='hidden' value='IPad45GT' name="code" />
								<input type="submit" class="button_relance" value="<?= TRY_US ?>" name="sent">
						</p>
      </div>
      <div align="center" id="help_area"><img src="<?= DIR_WS_IMAGES_LANGUAGES.$language  ?>/images/help_grey.gif" width="347" height="72" /><br />
        <a href="/conditions.php"><strong><?= TEXT_CONDITION_SUMMER ?></strong></a></div>
      <div class="clear"></div>
      <input type="hidden" value="gift" id="condition1" name="condition1">
    </div>
  </form>
</div>