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
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html>
<head>
<?php if (strlen($meta1)>1){
	echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}else {
	$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
	echo '<title>'.$strmeta. $title . $strmeta. TEXT_META_TITLE2 .'</title>';
	}
?>
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php echo   ((!empty($strdescription))?$strdescription:$strmeta).' - '.$meta_desc1 . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/dvdpost_public.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<link href="http://public.dvdpost.com/stylesheets/reset.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://public.dvdpost.com/stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://public.dvdpost.com/stylesheets/hp.css" media="all" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/ibox.js"></script>
<script type="text/javascript" src="/js/wishlist.js"></script>
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
<body class="normal" id="hp">
  <div id="wrap"> 
    <div id="header" >
      <h1>
        <a href="http://public.dvdpost.com/fr" class="f-btn">DVDPost - VOD streaming & online DVD rental</a>
      </h1>


    </div>
		<?php 
			require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); 
		?>
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
