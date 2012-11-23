<? $short = $lang_short == 'en' ? 'fr' : $lang_short ;?>
<!--   ==============   END HEADER   ==============   -->
<link href="stylesheet/public_2009.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheet/paypal.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheet/cinefriends.css" media="all" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="/stylesheet/reset.css">
<link rel="stylesheet" type="text/css" href="/stylesheet/main.css">
  <div id="promo_content">
    <div class="offre_ptg">
      <form action="activation_code_confirm.php" method="post" name="form1">
        <div id="promo_code">
          <div style="float:left; padding-top:10px;padding-left:27px;font-size:15px">CODE</div>
          <div style="float:right;">
            <input type="text" size="20" value="" class="inputs_codes_groupon" id="code" name="code">
            <input type="image" border="0" align="absmiddle"  src="images/cami_button_go.gif" name="imageField" class="no_border_button">
          </div>
          <div class="clear"></div>
          <input type="hidden" value="gift" id="condition1" name="condition1">
        </div>
      </form>
      <div id="applestuffs">
      <p><img src="images/apple.gif" /><br />
        <?= TEXT_COMPATIBLE_IPAD ?><br />
<a href="http://public.dvdpost.com/<?= $short ?>/streaming_products/faq" target="_blank"><?= TEXT_MORE ?></a></p>
        </div>
    </div>
  </div>
</div>
</div>
<p id="footer_promo" align="right">* Via Air Play | <a href="/conditions.php" target="_blank"><strong><?= TEXT_CONDITION_SUMMER ?></strong></a></p>