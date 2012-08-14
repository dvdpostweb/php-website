<? include(DIR_WS_INCLUDES . 'functions/language_switcher.php'); ?>
<div id="top">
	<div class="wrap">
  	<a href="/login.php" id="login">Sign in</a>
  </div>
</div>
<ul id="lang">
	<li><a href="http://public.dvdpost.com/fr/info/conditions#article3"><?= TEXT_RETRA ?> </a></li>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') ?>" class="nothing">EN</a></li>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') ?>" class="active">FR</a></li>
  <li><a href="<?= language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') ?>" class="nothing">NL</a></li>
</ul>
<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header" >
    <h1>
      <a href="http://www.dvdpost.be" class="f-btn" style="">DVDPost.be</a>
    </h1>
  </div>
  <!--   ==============   END HEADER   ==============   -->
