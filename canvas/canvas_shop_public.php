<?php  
if($current_page_name!='shop_offline.php')
	header('Location: /shop_offline.php');

	$link_freetrial="/step1.php?activation_code=FREETEST2";

if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<?php  if (strlen($meta1)>1){
	echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}else {
	$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
	echo '<title>'.$strmeta. $title . $strmeta. TEXT_META_TITLE2 .'</title>';
	}
?>
<meta name="verify-v1" content="AtMCrSj7lrafTKW+wpFGnxbd0p2bM7Cqbxg71cu3ufk=" />
<META NAME="description" content="<?php  echo TEXT_META_DESC1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/ibox.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/dvdpost_public.css','.css'); ?>">

<script type="text/javascript" src="/js/ibox.js"></script>
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico"> 
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
<!-- BEGIN: AdSolution-Tag 4.3: Global-Code [PLACE IN HTML-HEAD-AREA!] -->
<!-- <script type="text/javascript" language="javascript" src="http://a.as-eu.falkag.net/dat/dlv/aslmain.js"></script>
-->
<!-- END: AdSolution-Tag 4.3: Global-Code -->
<?php
$script_available= array(0=>'/product_info_shop.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/filterCapture.js.php?products_id=<?= $_GET['products_id']?>"></script>
<script type="text/javascript" src="js/TheFilterCaptureService.js"></script>
<?php
}
?>
<script type="text/javascript">
    var keyword="<?php  echo $current_page_name ; ?>";
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
<script type="text/javascript">
    var keyword="<?php  echo $current_page_name ; ?>";
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
    <td width="374"><a href="/default.php"><img src="<?php  echo DIR_WS_IMAGES;?>canvas/<?php  echo $logo_img ;?>" width="258" border="0"></a></td>
    <td width="399" align="right" valign="top" class="yellowlink">
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_1.php')); ?>
	</td>
  </tr>
  <tr> 
    <td colspan="2">
    	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_shop.php')); ?>
	</td>
  </tr>
  <tr>
  	<td colspan="2" align="right" bgcolor="#FFFFFF" align="center">
		<br> 
  		<table "773" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td  width="189" rowspan="2" valign="top" id="left_menu" align="center">
					<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_public.php')); ?>
				</td>
				<td  width="584" colspan="2" valign="top" align="center"  class="slogan_black">			  
					<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
				</td>
			</tr>		
		</table>
		<br>	
     </td>      
     </tr>
  <tr> 
    <td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>canvas/bottom_default.png" width="773"><br></td>
  </tr>
  <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/public_footer.php')); ?>  
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
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>