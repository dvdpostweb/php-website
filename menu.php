<? include(DIR_WS_INCLUDES . 'functions/language_switcher.php'); ?>
<? $url = curPageURL2() ?>
<div id="top">
	<div class="wrap">
  	<a href="/login.php" id="login">Log in</a>
  </div>
</div>
<ul id="lang">
	<? if ($nav == true) { ?>
	<li><a href="http://public.dvdpost.com/<?= $lang_short ?>/info/conditions?url_promo=<?= urlencode($url) ?>"><?= TEXT_RETRA ?> </a></li>
	<? }else{?>
		<li><a href="http://public.dvdpost.com/<?= $lang_short ?>/info/conditions"><?= TEXT_RETRA ?> </a></li>
	<? }?>
	<? if(!isset($hide_lang)){ ?>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') ?>" class="<?= $lang_short == 'en'? 'active': 'nothing' ?>">EN</a></li>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') ?>" class="<?= $lang_short == 'fr'? 'active': 'nothing' ?>">FR</a></li>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') ?>" class="<?= $lang_short == 'nl'? 'active': 'nothing' ?>">NL</a></li>
  <? } ?>
</ul>
<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header" >
    
		<? if ($nav == true) { ?>
		<h1>
	  	<a href="http://public.dvdpost.com/<?= $lang_short ?>?url_promo=<?= urlencode($url) ?>" class="f-btn" style="">DVDPost.be</a>
	  </h1>
		<ul id="nav" class="osc">
	  	<li><a href="http://public.dvdpost.com/<?= $lang_short ?>?url_promo=<?= urlencode($url) ?>" class="" id="nav1"><?= HOME_TEXT ?></a></li>
		  <li><a href="http://public.dvdpost.com/<?= $lang_short ?>/products?url_promo=<?= urlencode($url) ?>" class="" id="nav2"><?= CATALOGUE_TEXT ?></a></li>
	    <li><a href="http://public.dvdpost.com/<?= $lang_short ?>/info/price?url_promo=<?= urlencode($url) ?>" class="" id="nav5"><?= PRICE_TEXT ?></a></li>
	    <li><a href="http://public.dvdpost.com/<?= $lang_short ?>/phone_requests/new?url_promo=<?= urlencode($url) ?>" class="" id="nav5"><?= CONTACT_TEXT ?></a></li>
      <li><a href="http://public.dvdpost.com/<?= $lang_short ?>/adult?url_promo=<?= urlencode($url) ?>" id="nav7"><?= ADULT_TEXT ?></a></li>
		</ul>
		<? } else {?>
			<h1>
	      <a href="http://public.dvdpost.com/<?= $lang_short ?>" class="f-btn" style="">DVDPost.be</a>
	    </h1>
		<? } ?>
  </div>
  <!--   ==============   END HEADER   ==============   -->
