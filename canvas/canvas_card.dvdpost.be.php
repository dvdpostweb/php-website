<?php  

$link_freetrial="/default.php";
$banner='banner_trial.gif';

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
<META NAME="description" content="<?php echo TEXT_META_DESC1 . $strmeta . TEXT_META_DESC2; ?>">
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
<body class="public">
<br>
<table name="layout" width="773" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  	<?php
	switch ($constants['WEB_SITE_ID']) {
	case '10':
	$logo_img='logo_DVDPost_LU.png';	
	break;
	case '101':
	$logo_img='logo_DVDPost_NL.png';	
	break;
	default:
	$logo_img='logo_DVDPost.png';
	break;
	}
	?>
    <td width="374"><a href="/default.php"><img src="<?php echo DIR_WS_IMAGES;?>canvas/<?php echo $logo_img ;?>" width="258" border="0"></a></td>
    <td width="399" align="right" valign="top" class="yellowlink">
		<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_1.php')); ?>
	</td>
  </tr>
  <tr> 
    <td colspan="2">
    	<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_2.php')); ?>
	</td>
  </tr>  
	<tr>
			<td colspan="2" align="right" bgcolor="#FEF6DD" align="center">
	        &nbsp;
			</td></tr>
  <tr> 
    <td colspan="2" class="public_bckg">
		<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
	</td>
  </tr>
  <tr> 
  	<?php if ($page_body_to_include=='default.php'){
	    $img_footer= DIR_WS_IMAGES.'canvas/bottom_default.png';
	}else{$img_footer= DIR_WS_IMAGES.'canvas/bottom_default2.png';}
	?>
    <td colspan="2"><img src="<?php echo $img_footer ;?>" width="773"><br></td>
  </tr>
  <?php include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/public_footer.php')); ?>  
</table>

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
