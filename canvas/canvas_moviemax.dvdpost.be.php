<?php 

	$link_freetrial="step1.php?activation_code=FREETEST2";

if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html>
<head>
<title><?php  echo TEXT_META_TITLE1 . $strmeta . TEXT_META_TITLE2 ; ?></title>
<META NAME="description" content="<?php  echo TEXT_META_DESC1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/dvdpost_public.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico"> 
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>

<!-- BEGIN: AdSolution-Tag 4.3: Global-Code [PLACE IN HTML-HEAD-AREA!] -->
<!-- <script type="text/javascript" language="javascript" src="http://a.as-eu.falkag.net/dat/dlv/aslmain.js"></script>
-->
<!-- END: AdSolution-Tag 4.3: Global-Code -->

</head>
<body bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
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
<table width="100%" height="847" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="180px" rowspan="4" align="left" valign="top" bgcolor="#000000" class="thumb"><img src="<?php  echo DIR_WS_IMAGES;?>moviemax/left_side.gif" width="180" height="847"></td>
    <td width="80px" height="20" align="center" valign="middle" bgcolor="#FFDC00" class="thumb">&nbsp;</td>
    <td width="682px" bgcolor="#FFDC00">&nbsp;</td>
    <td bgcolor="#FFDC00">&nbsp;</td>
  </tr>
  <tr> 
    <td height="20" colspan="2" width="762px">
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2.php')); ?>
	</td>
    <td bgcolor="#000000">&nbsp;</td>
  </tr>
  
  <tr> 
    <td height="742px" colspan="2" valign="top" class="TAB_MAIN_PAGE">
    	<br>
		<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
	</td>
    <td align="left" valign="top" class="TAB_RIGHT"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="5"></td>
  </tr>
  <tr> 
    <td height="65" colspan="2" valign="top">
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
	</td>
    <td>&nbsp;</td>
  </tr>
</table>		
  
<!-- Google Analytics tag -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1121531-1";
urchinTracker();
</script>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>