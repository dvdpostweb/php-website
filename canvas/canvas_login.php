<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<?php
$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
?>
<?php 
switch(WEB_SITE_ID)
  {
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
    
  default:
	$link_freetrial="/step1.php";
	$banner='banner_trial.gif';
	break;
}

if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www' || $host== 'localhost'){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>

<?php if (strlen($meta1)>1){
	echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}else {
	$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
	echo '<title>'.$strmeta. $title . $strmeta. TEXT_META_TITLE2 .'</title>';
	}
?>
<META NAME="description" content="<?php echo $meta_desc1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/public_2009.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/new.css','.css'); ?>">

<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
<?php require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
<!-- BEGIN: AdSolution-Tag 4.3: Global-Code [PLACE IN HTML-HEAD-AREA!] -->
<!--<script type="text/javascript" language="javascript" src="http://a.as-eu.falkag.net/dat/dlv/aslmain.js"></script> -->
<!-- END: AdSolution-Tag 4.3: Global-Code -->
<script type="text/javascript">
    var keyword="<?php echo $current_page_name ; ?>";
    <?php
	switch ($languages_id) {
	case '1':
	?>
	var extra="fr";
	<?php
	break;
	case '2':
	?>
	var extra="nl";
	<?php
	break;
	case '3':
	?>
	var extra="en";
	<?php
	break;
	}
	?>
    metriwebTag ("dvdpost", keyword, extra);
</script>

</head>
 <?php
	//$rep='canvas/';
	$rep='halloween/';
	switch ($constants['WEB_SITE_ID']) {
	case '10':
	//$logo_img='logo_DVDPost_LU.png';
	$logo_img='logo_DVDPost_halloween_LU.png';
	break;
	case '101':
	//$logo_img='logo_DVDPost_NL.png';	
	$logo_img='logo_DVDPost_halloween_NL.png';
	break;
	default:
	//$logo_img='logo_DVDPost.png';
	$logo_img='logo_DVDpost_halloween.png';
	break;
	}
?>
</head>

<body>
<div id="background">
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
					<li><a href="/default.php"><?php echo TEXT_TOPMENU1 ;?></a></li>
					<li><a href="/how.php"><?php echo TEXT_TOPMENU2 ;?></a></li>
					<li><a href="/catalog.php"><?php echo TEXT_TOPMENU3 ;?></a></li>
					<li><a href="/contact.php"><?php echo TEXT_TOPMENU4 ;?></a></li>
					<?
					if(WEB_SITE!='nl' && 1==0)
					{
					?>
					<li class="last-item"><span><a href="/mydvdshop_public.php"><?php echo TEXT_TOPMENU5 ;?></a></span></li>
					<?
					}
					?>
				</ul>
<?php 
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
?>
<ul class="top-nav">
	<li><a href ="/faq.php"><?php  echo TEXT_HELP ;?></a></li>				
<?php
		switch($languages_id){
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
            <?php
            if(strpos($_SERVER['SERVER_NAME'],'www')===0){
            ?>
			<div class="other-logos">
				<h3><?php echo TITLE_PARTENAIRES ;?></h3>
				<ul>
					<li><a href="http://www.philips.be " target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-philips.gif" /></a></li>
					<li><a href="http://www.rtltvi.be/" target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-rtl.gif" /></a></li>
					<li><a href="http://www.cinenews.be/" target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-cinenews.gif" /></a></li>
					<li><a href="http://www.loreal.com" target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-loreal.gif" /></a></li>
					<li><a href="http://www.levif.be" target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-vif.gif" /></a></li>
					<li><a href="http://www.levif.be" target="_blank"><img alt="" src="http://www.dvdpost.be/images/logo_partenaires/logo-lesoir.gif" /></a></li>
				</ul>
			</div>
            <?php
        	}
            ?>
		</div>
	</div>	

<!-- Google Analytics tag -->
<?php
switch (WEB_SITE_ID){
 	case '101':		 	
 	?>
 		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-1121531-3");
		pageTracker._trackPageview();
		</script>
 	<?php
 	break;
  	
 	default:
 		?>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-1121531-1");
		pageTracker._trackPageview();
		</script>
 		<?php
 	break;		  	
 }
?>
<!-- Google Analytics tag -->
</body>
</html>
