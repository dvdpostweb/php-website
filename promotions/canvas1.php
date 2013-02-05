<link href="/stylesheet/public_2009.css" media="all" rel="stylesheet" type="text/css" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="/stylesheet/reset.css">
<link rel="stylesheet" type="text/css" href="/stylesheet/main.css">
<style>
#promo_content {
  background-image:url(../images/<?= $lang_short ?>/<?= $image ?>);
}
</style>
<link href="/stylesheet/promotions.css" media="all" rel="stylesheet" type="text/css" />

<div id="warp">
  <div id="promo_content">
    <div class="offre_ptg">
      <form action="activation_code_confirm.php" method="post" name="form1">
        <div id="promo_code">
          <p align="center"><?= TEXT_PROMO_TITLE ?></p>
          <div style="float:left; padding-top:10px;padding-left:27px;font-size:15px"><?= TEXT_CODE ?></div>
          <div style="float:right;">
            <input type="text" size="20" value="<?= $code ?>" class="inputs_codes_groupon" id="code" name="code">
            <input type="image" border="0" align="absmiddle"  src="/images/cami_button_go.gif" name="imageField" class="no_border_button">
          </div>
          <div class="clear"></div>
          <input type="hidden" value="gift" id="condition1" name="condition1">
        </div>
      </form>
      <div id="applestuffs">
      <p><img src="/images/apple.gif" /><br />
        <?= TEXT_COMPATIBLE_IPAD ?><br />
<a href="http://public.dvdpost.com/<?= $short ?>/streaming_products/faq" target="_blank"><?= TEXT_MORE ?></a></p>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<p id="footer_promo" align="right">* Via Air Play | <a href="http://private.dvdpost.com/fr/info/conditions" target="_blank"><strong><?= TEXT_CONDITION_SUMMER ?></strong></a></p>