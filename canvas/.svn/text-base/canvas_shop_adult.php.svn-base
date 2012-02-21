<?php 
if($current_page_name!='shop_offline.php')
	header('Location: /shop_offline.php?type=adult');
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<title><?php  echo TEXT_META_TITLE; ?></title>
<meta name="verify-v1" content="AtMCrSj7lrafTKW+wpFGnxbd0p2bM7Cqbxg71cu3ufk=" />
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/stylesheet_shop_adult.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico">
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body LEFTMARGIN="0">

<?php
$script_available= array(0=>'/product_info_shop_adult.php');
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
<CENTER >
  <table name="squelette" width="1006" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/corner_top_left.jpg" width="8" height="8"></td>
		<td width="10" valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/border_top.jpg" width="1006" height="8"></td>
		<td valign="bottom"><img src="<?php  echo DIR_WS_IMAGES;?>/corner_top_right.jpg" width="8" height="8"></td>
  	</tr>	

  	<tr>
    	<td nowrap background="<?php  echo DIR_WS_IMAGES;?>/border_left.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    	<td valign="top">
			<table name="espace_superieur_vide_20px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
				<tr>
            		<td height="20" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
          		</tr>
       		</table>
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1_shop_adult.php')); ?>
			<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td  width="159" valign="top" id="left_menu"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_adult.php')); ?></td>
					<td width="801" align="right" valign="top" id="main_page" >
					 <table width="764" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2_shop_adult.php')); ?>             
							</td>
						</tr>
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_3_shop_adult.php')); ?>
							</td>
						</tr>
						<tr>
							<td>
							  <?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
							</td>
						</tr>
					 </table>					 
					</td>
				</tr>
			</table>
                   	    <table name="espace_inferieur_vide_15px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
          		<tr>
          			<td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
        		</tr>
      		</table>
    		<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder2_shop.jpg" width="960" height="12"></div>
		</td>
		
    	<td nowrap background="<?php  echo DIR_WS_IMAGES;?>/border_right.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    </tr>
  	<tr>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_left.jpg" width="8" height="8"></td>
    	<td height="8"><img src="<?php  echo DIR_WS_IMAGES;?>/border_bottom.jpg" width="1007" height="8"></td>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_right.jpg" width="8" height="8"></td>
  	</tr>
</table>
<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer_shop.php')); ?>
</CENTER>
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
	var pageTracker = _gat._getTracker("UA-8475402-1");
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
		var pageTracker = _gat._getTracker("UA-8475379-1");
		pageTracker._trackPageview();
		} catch(err) {}</script>
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