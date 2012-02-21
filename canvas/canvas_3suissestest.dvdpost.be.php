<?php 
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html>
<head>
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/stylesheet.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico"> 
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body>
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

  <table width="936" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="top">
		<table name="squelette" width="777" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
	          <td valign="top" align="center">
				<table name="espace_superieur_vide_20px_height" width="761"  border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="20" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
					</tr>
				</table>
				<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1.php')); ?>
				<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2.php')); ?>
				<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
				<table name="espace_inferieur_vide_15px_height" width="761"  border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
					</tr>
				</table>
				<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder.jpg" width="732" height="12"></div>
			  </td>				
			</tr>        
		</table>
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
	  </td>
    </tr>
  </table>  
  
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>