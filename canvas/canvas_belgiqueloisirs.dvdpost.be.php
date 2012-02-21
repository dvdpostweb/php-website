<?php  
switch(WEB_SITE_ID)
  {
  case 26:
    $link_freetrial="/step1.php?activation_code=BL4DVD";
    $banner='banner_loisirs_trial.gif';
    break;
  case 101:
    $link_freetrial="/step1.php?activation_code=FREETEST2";
    $banner='banner_msn_trial.gif';
    break;
    
  default:
	$link_freetrial="/step1.php?activation_code=FREETEST2";
	$banner='banner_trial.gif';
	break;
}

if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>


<html>
<head>
<title><?php  echo TEXT_META_TITLE; ?></title>
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
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
<script type="text/javascript" src="<?php  //echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body>
<p>
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
	var extra="fr";
	?>
	
    //metriwebTag ("dvdpost", keyword, extra);
</script>
  <!-- cobranding  header //-->
  <?php //php include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/header.php')); ?>
</p>
<table width="780" height="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="104" height="45" align="center" bgcolor="#019ADE"><a href="http://www.belgiqueloisirs.com" target="_blank"><img src="<?php  echo DIR_WS_IMAGES;?>BLoisirs/logo1.gif" border="0"></a></td>
    <td colspan="2" align="left" valign="middle" bgcolor="#019ADE"><img src="<?php  echo DIR_WS_IMAGES;?>BLoisirs/s_accueil.gif"></td>
  </tr>
  <tr>
    <td height="55" align="center" valign="top" bgcolor="#0075BD"><a href="http://www.belgiqueloisirs.com" target="_blank"><img src="<?php  echo DIR_WS_IMAGES;?>BLoisirs/logo2.gif" border="0"></a></td>
    <td width="161" valign="bottom" bgcolor="#0075BD"><img src="<?php  echo DIR_WS_IMAGES;?>BLoisirs/s_part_dvdpost.gif"></td>
    <td width="530" bgcolor="#019ADE" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>BLoisirs/s_location.gif"></td>
  </tr>
  <tr bgcolor="#0075BD">
    <td height="19" colspan="3"><table width="761" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="35">&nbsp;</td>
        <td width="726" bgcolor="#0075BD" align="right"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1.php')); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="346" colspan="3" align="right"><table width="761" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td width="12" rowspan="2">&nbsp;</td>
        <td colspan="2" rowspan="2" bgcolor="#006666"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_2.php')); ?></td>
        <td width="12" bgcolor="#0075BD"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="15"></td>
      </tr>
      <tr>
        <td><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="10"></td>
      </tr>
      <tr>
        <td height="264">&nbsp;</td>
        <td colspan="2" rowspan="3" class="BL_form" align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				  <tr> 
				    <td colspan="2" class="public_bckg" align="center">
						<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
						<br>
					</td>
				  </tr>
	            </table>
        
        </td>
        <td width="12" rowspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#003333">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#003333">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#003333">&nbsp;</td>
        <td width="490" bgcolor="#003333"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?></td>
        <td width="321" >&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<!-- cobranding footer //-->
<?php  // require('canvas/footer/'.SITE_ID . '/footer_BL.php'); ?>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>
