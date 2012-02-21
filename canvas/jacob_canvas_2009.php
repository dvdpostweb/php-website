<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<?php
	
	$meta1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,$meta1);
	$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
		
	if (strlen($meta1)>1)
	{
		echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}
	else 
	{
		
		$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
		echo '<title>'.$strmeta.' - '. $title .  TEXT_META_TITLE2 .'</title>';
	}
	?>
	
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php echo   ((!empty($strdescription))?$strdescription:$strmeta.' - '.$meta_desc1 . TEXT_META_DESC2); ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<META name="y_key" content="6dad1b79d5decc74" >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<meta name="google-site-verification" content="bVK9E1XaKKd3WZH2L9mVBBRLomFtP0zmex-k8Jzm7Sk" />
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
	
<?php
$script_available= array(0=>'/product_info_public.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="/js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="/js/TheFilterCaptureService.js"></script>
<script type="text/javascript" src="/js/filterCapture.js.php?page=product_info_public.php&products_id=<?= $_GET['products_id']?>"></script>
<meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'].$constants['DIR_DVD_WS_IMAGES'].$meta_value['products_image_big'] ?>"/> 
<meta property="og:title" content="<?= $strtitle ?>">
<meta property="og:type" content="movie"/>
<meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?products_id='.$_GET['products_id'] ?>"/>
<meta property="og:site_name" content="DVDPost"/>
<meta property="fb:admins" content="542538810,586983921"/>
<meta property="og:description" content="<?= $strdescription ?>" />
<?php
}
?>
<?php
$script_available= array(0=>'/contact.php');
if(scriptAvailable($script_available)){
?>
<link href="http://www.brandialog.com/stylesheets/widget_button.css" media="screen" rel="stylesheet" type="text/css" />
<?php
}
?>
<?php
$script_available= array(0=>'/default.php');
if(scriptAvailable($script_available)){
?>
	<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
	<script src="/js/jquery-1.4.2.min.js?1276614285" type="text/javascript"></script>
  <script src="/js/facebox.js?1276614285" type="text/javascript"></script>
  <script src="/js/default.js" type="text/javascript"></script>

<?php
}
?>
<!--<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/public_2009.css?v=6','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">


<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/jquery-1.4.2.min.js?1276614285" type="text/javascript"></script>
<script src="/js/facebox.js?1276614285" type="text/javascript"></script>
<script src="/js/default.js" type="text/javascript"></script>
<script type="text/javascript" src="js/question2.js?v=2"></script>

	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="/stylesheet/ie6.css" media="screen"/><![endif]-->

</head>
<body>
<div id="background">
	
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

if(WEB_SITE_ID!=101 && WEB_SITE_ID!=1)
{
	$page= array(0=>'/default.php');
	if(scriptAvailable($page)){
		echo '<meta name="ROBOTS" content="NOINDEX,NOFOLLOW">';
	}	
}
$page= array(0=>'/product_info_public.php');
if(scriptAvailable($page)){
	echo '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>';
}	


?>
<div class="wrapper" >
					<!-- main menu -->
				<?php 
					if($_GET['debug']==1)
					{
						echo 'addresse'.getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,$_GET['debug'],$jacob);
						echo "<br>jacob$jacob<br>";
					}
					if(!empty($page_body_to_include))
					{
						require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,0,$jacob)); 
					}	
					else if(!empty($content))
						echo $content;
				?>
				
  </div>
	<!-- footer -->
	<div id="footer_jb">
		<a href="privacy.php" class="footer"><?= BOX_INFORMATION_PRIVACY ?></a>
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
	<?php
	$script_available= array(0 => '/default.php', 1 => '/how.php', 2 => '/catalog.php', 3 => '/contact.php');
	if(scriptAvailable($script_available)){
		switch($languages_id)
		{
			case 1:
		?>
		<!-- Google Code for Visitors public Remarketing List -->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1033549176;
		var google_conversion_language = "en";
		var google_conversion_format = "3";
		var google_conversion_color = "666666";
		var google_conversion_label = "ost4CODU1gEQ-Orq7AM";
		var google_conversion_value = 0;
		/* ]]> */
		</script>
		<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1033549176/?label=ost4CODU1gEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
		</div>
		</noscript>
		
		<?php
			break;
			case 2:
			?>
			<!-- Google Code for Visitors public NL Remarketing List -->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 1033549176;
			var google_conversion_language = "en";
			var google_conversion_format = "3";
			var google_conversion_color = "666666";
			var google_conversion_label = "GlvaCMj11gEQ-Orq7AM";
			var google_conversion_value = 0;
			/* ]]> */
			</script>
			<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1033549176/?label=GlvaCMj11gEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
			</div>
			</noscript>
			
			<?php
			break;
		}
	}
	?>
</body>
</html>
