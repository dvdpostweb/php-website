<?php
$sql_droselia='SELECT count(1) as nb FROM droselia_catalog_stream d where is_active=1';
$data_droselia=tep_db_cache($sql_droselia,86400);
$count_droselia=ceil($data_droselia[0]['nb']/100)*100 ;
$sql_x='SELECT count(1) as nb FROM products p where products_type="DVD_ADULT" and products_status !=-1';
$data_x=tep_db_cache($sql_x,86400);
$count_x_location=ceil($data_x[0]['nb']/100)*100 ;
if($languages_id==1)
{
	$count_x_location = number_format($count_x_location, 0, '.', ' ');
	$count_droselia = number_format($count_droselia, 0, '.', ' ');
}
else if($languages_id==3)
{
	$count_x_location = number_format($count_x_location, 0, '.', ',');
	$count_droselia = number_format($count_droselia, 0, '.', ',');
}
else
{
	$count_x_location = number_format($count_x_location, 0, '.', '.');
	$count_droselia = number_format($count_droselia, 0, '.', '.');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
	<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php echo TEXT_META_DESC1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/public_2009.css?v=5','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
<?php if (strlen($meta1)>1){
	echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}else {
	$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
	echo '<title>'.$strmeta. $title . $strmeta. TEXT_META_TITLE2 .'</title>';
	}
?>
<?php
define('SITE_ACCESS','PUBLIC');
define('SITE_TYPE','DVD_ADULT');

$script_available= array(0=>'/product_info_public.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="/js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="/js/TheFilterCaptureService.js"></script>
<script type="text/javascript" src="/js/filterCapture.js.php?products_id=<?= $_GET['products_id']?>"></script>

<?php
}
?>
<script type="text/javascript" src="/js/main.js"></script>

	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="/stylesheet/ie6.css" media="screen"/><![endif]-->

</head>
<body id="movix">
<div id="backgroundx">
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
	$link_freetrial="/step1.php?activation_code=CATALOGX4";
	$banner='banner_trial.gif';
	break;
}

if(WEB_SITE_ID!=101 && WEB_SITE_ID!=1)
{
	$page= array(0=>'/default.php');
	if(scriptAvailable($page)){
		echo '<meta name="ROBOTS" content="NOINDEX,NOFOLLOW">';
	}	
}
?>
<?php
if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www' || $host== 'localhost'){
        echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';
}
?>

	<div class="wrapper">
		<div class="page">
			<!-- center holder -->
			<div class="center-holder">
				<?php 
					if(!empty($page_body_to_include))
						require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); 
					else if(!empty($content))
						echo $content;
				?>
				
			</div>
			<!-- header -->
			<div id="header">
				<!-- logotype -->
				<strong class="logox"><a href="/default.php">DVDPost.be</a></strong>
				<?php
				if(!empty($_GET['activation_code'])){
					
					$sql='SELECT *
					FROM `discount_code`
					WHERE `discount_code` = "'.$_GET['activation_code'].'"';
					$discount_query = tep_db_query($sql);

					$result = tep_db_fetch_array($discount_query);
					$img='images/www3/partners/'.$result['group_id'].'/logo.gif';
					if(is_file($img))
						echo "<div style='margin:25px 0 0 325px'><img src='".$img."'></div>";
				}
				?>
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
		} else {
		?>
            <a href="/logoff.php" target="_self" class="login"><?php  echo TEXT_MEMBER_LOGOFF;?></a>
         <?php
		}
?>
<ul class="top-nav">
	<li><a href ="faq.php"><?php  echo TEXT_HELP ;?></a></li>				
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
            if(strpos($_SERVER['SERVER_NAME'],'www')===0 && empty($_GET['activation_code']) ){
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
			try {
				var pageTracker = _gat._getTracker("UA-8474955-1");
				pageTracker._trackPageview();
			} catch(err) {}</script>
	 	<?php
	 	break;

	 	default:
	 		?>
				<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
				</script>
				<script type="text/javascript">
				try {
					var pageTracker = _gat._getTracker("UA-7320293-1");
					pageTracker._trackPageview();
				} catch(err) {}</script>		

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
	} catch(err) {}</script>
	<!-- Google Analytics tag -->

</body>
</html>
