
<?php   
require('canvas/header/'.SITE_ID . '/header.php'); 
switch(WEB_SITE_ID) {
  case 34:
    $link_freetrial="/step1.php?activation_code=CINOPSIS4DVD";
    $banner='banner_msn_trial.gif';
    break;
}

if($ {"REMOTE_ADDR"}== ADMINIP) {
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';
}

$meta1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,$meta1);
$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
?>
<html>
<head>
<META NAME="description" content="<?php echo $meta_desc1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/public_2009.css?v=3','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
<?php 
$meta1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,$meta1);
$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
if (strlen($meta1)>1) {
	echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
}
else {
	echo '<title>'.$strmeta. TEXT_META_TITLE1 . $strmeta. TEXT_META_TITLE2 .'</title>';
}
?>
<style>
body {
	background :#F3F3F2 url(http://www.cinopsis.be/images/fonds/bord-film.gif) !important;
}
.gauche {
color: #fff !important;
font-size: 12px;
}
.quick-links {
height: 200px;
}
</style>
<script type="text/javascript" src="/js/main.js"></script>

	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="stylesheet/ie6.css" media="screen"/><![endif]-->

</head>
<body>
<?php 
switch(WEB_SITE_ID) {
  case 26:
    $link_freetrial="/step1.php?activation_code=BL4DVD";
    $banner='banner_loisirs_trial.gif';
    break;
  case 39:
    $link_freetrial="/default.php";
	$banner='banner_trial.gif';
    break;  
  
  case 101:
    $link_freetrial="/step1.php?activation_code=TRIALNL";
    $banner='banner_msn_trial.gif';
    break;
default: $link_freetrial="/step1.php";
	$banner='banner_trial.gif';
	break;
}
?>
<?php
if($ {"REMOTE_ADDR"
}
== ADMINIP) {
        echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';
}
?>

	<div class="wrapper">
		<div class="page">
			<!-- center holder -->
			<div class="center-holder">
				<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
			</div>
			<!-- header -->
			<div id="header">
				<!-- logotype -->
				<strong class="logo"><a href="/default.php">DVDPost.be</a></strong>
				<!-- main menu -->
				<ul class="menu">
					<li><a href="/default.php" <?= (($_SERVER['SCRIPT_NAME']=='/default.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU1 ;?></a></li>
					<li><a href="/how.php" <?= (($_SERVER['SCRIPT_NAME']=='/how.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU2 ;?></a></li>
					<li><a href="/catalog.php" <?= (($_SERVER['SCRIPT_NAME']=='/catalog.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU3 ;?></a></li>
					<li><a href="/contact.php" <?= (($_SERVER['SCRIPT_NAME']=='/contact.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU4 ;?></a></li>
					<!--<li class="last-item"><span><a href="/mydvdshop_public.php" <?= (($_SERVER['SCRIPT_NAME']=='/mydvdshop_public.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU5 ;?></a></span></li>-->

				</ul>
<?php 
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
		if (!tep_session_is_registered('customer_id')) {
			echo '<a href="/login.php" class="login">'.HEADER_TITLE_LOGIN.'</a>';
}
else {
		?>
            <a href="/logoff.php" target="_self" class="login"><?php  echo TEXT_MEMBER_LOGOFF;?></a>
         <?php
}
?>
<ul class="top-nav">
	<li><a href ="/faq.php"><?php  echo TEXT_HELP ;?></a></li>				
<?php
		switch($languages_id) {
		case 1:	// langue courante: Fr		
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '">NL</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '">EN</a></li>';
		break; 	
		case 2:// langue courante: NL	
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '">FR</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '">EN</a></li>';					
		break; 
		case 3:// langue courante: EN		
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '">FR</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '">NL</a></li>';
		break;
}
?>
</ul>
			</div>
		</div>
	</div>
	<!-- footer -->
	<div id="footer">
		<div class="footer-area">
			<div class="navbar">
				<h3><?php echo TITLE_QUICK_LINKS ;?></h3>
				<div class="quick-links">
					<ul class="column1">
						<li><strong><a href="/how.php?faq=7" class="black12pix"><?php echo TEXT_PRICE_ROOT ;?></a></strong></li>
						<li><a href="/how.php" class="black12pix"><?php echo TEXT_WHO_WE_ARE ;?></a></li>
						<li><a href="/privacy.php" class="black12pix"><?php echo TEXT_CONFIDENTIALITY ;?></a></li>
						<li><a href="/conditions.php" class="black12pix"><b><?php echo TEXT_CONDITION ;?></b></a></li>
					</ul>
					<ul class="column2">
						<li><a href="/login.php" class="black12pix"><?php echo HEADER_TITLE_LOGIN ;?></a></li>
						<li><a href="/contact.php" class="black12pix"><?php echo TEXT_CONTACT_US ;?></a></li>
                        <li><a href="/freetrial_info.php" class="black12pix"><?php echo TEXT_FREETRIAL ;?></a></li>
						<li><a href="/faq.php" class="black12pix"><b><?php echo TEXT_QUESTIONS ;?></b></li>
						<li><a href="/contest_public.php" class="black12pix"><?php echo TEXT_CONTEST ;?></a></li>
						<li><a href="/quizz_public.php" class="black12pix">Quizz</a></li>
                        <li><a href="http://insidedvdpost.blogspot.com/" class="black12pix" target="_blank">Blog</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Google Analytics tag -->
	<?php
	switch (WEB_SITE_ID) {
	 	case '101':		 	
	 	?>
	 		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("UA-8474955-1");
				pageTracker._trackPageview();
}
catch(err) {
}
</script>
	 	<?php
	 	break;
default: ?>
				<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
				</script>
				<script type="text/javascript">
				try {
					var pageTracker = _gat._getTracker("UA-7320293-1");
					pageTracker._trackPageview();
}
catch(err) {
}
</script>		

	      <!-- Woopra Code Start -->
	      <script type="text/javascript">
	      var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
	      document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
	      </script>
	      <!-- Woopra Code End -->

	 		<?php
	 	break;
}
	?>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-1121531-1");
	pageTracker._trackPageview();
}
catch(err) {
}
</script>
	<!-- Google Analytics tag -->

<?php   require('canvas/footer/'.SITE_ID . '/footer.php'); ?> 
	
    
</body>
</html>
