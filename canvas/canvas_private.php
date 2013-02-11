<?php 
header('Cache-Control: private');
if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www'|| $host== 'localhost' ){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<title><?php    echo ((!empty($strmeta))?$strmeta.' - ':'').TEXT_META_TITLE; ?></title>
<META NAME="description" content="<?php echo   ((!empty($strdescription))?$strdescription:$strmeta).' - '.$meta_desc1 . TEXT_META_DESC; ?>">

<META NAME="keywords" content="<?php    echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php    echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">

<link rel="stylesheet" type="text/css" href="<?php    echo getBestMatchToIncludeAny('stylesheet/stylesheet_private.css?v=5','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php    echo getBestMatchToIncludeAny('stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php    echo getBestMatchToIncludeAny('stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('stylesheet/ibox.css?v=2','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
<script type="text/javascript" src="/js/main.js"></script>

<script type="text/javascript" src="/js/wishlist.js"></script>
<script type="text/javascript" src="/js/mediareader.js"></script>
<LINK REL="SHORTCUT ICON" href="<?php    echo DIR_WS_IMAGES;?>/favicon.ico">
<!--[if lt IE 7.]>
<script defer type="text/javascript" src="/js/pngfix.js"></script>
<![endif]-->
<?php
$script_available= array(0=>'/custserdvdnotyetret.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/custserdvdnotyetret.js"></script>
<?php
}
?>
<?php
$script_available= array(0=>'/product_info.php',1=>'/mydvdpost.php',2=>'/rate_more.php',3=>'/my_recommandation.php',4=>'/custserdvdnotyetret.php');
if(scriptAvailable($script_available)){
?>

<script type="text/javascript" src="/js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="/js/TheFilterCaptureService.js"></script>
<script type="text/javascript" src="/js/filterCapture.js.php?products_id=<?= $_GET['products_id']?>"></script>

<?php
}
?>
<?php
$script_available= array(0=>'/payment_method_change.php');
if(scriptAvailable($script_available)){
if($_GET['payment']=='domiciliation'){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3d.js"></script>

<?php
if ($_GET['confirm']=='download')
{
?>
  <META HTTP-EQUIV="Refresh" CONTENT="3; URL=<?= '/download_dom.php' ?>">	
<?php
} 

}else if(empty($_GET['payment'])){?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/payment_method_change.js"></script>

<?php
}}
?>

<?php
$script_available= array(0=>'/member_get_member_points.php',1=>'/member_get_member.php',2=>'/member_get_member_gift.php',3=>'/member_get_member_faq.php');
if(scriptAvailable($script_available)){
	echo '<link rel="stylesheet" href="/stylesheet/tool.css" type="text/css" />';
	echo '<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />';
	echo '<script src="/js/jquery-1.4.2.min.js?1276614285" type="text/javascript"></script>';
  echo '<script src="/js/facebox.js?1276614285" type="text/javascript"></script>';
	echo '<script type="text/javascript" src="js/member_get_member.js"></script>';
	
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

<?php    require('form_check.js.php'); ?>
<script type="text/javascript" src="/metriweb/mwTag.js"></script>
</head>
<body>

<script type="text/javascript">
    var keyword="<?php    echo $current_page_name ; ?>";
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
<div id="background">

  <table name="squelette" width="1006" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
	

  	<tr>
    	
    	<td valign="top">
			<table name="espace_superieur_vide_20px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
				<tr>
            		<td height="20" valign="top"><img src="<?php    echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
          		</tr>
       		</table>
			<?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1_private.php')); ?>
			<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td  width="159" valign="top" id="left_menu"><?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left.php')); ?></td>
					<td width="801" align="right" valign="top" id="main_page" >
					 <table width="764" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2_private.php')); ?>             
							</td>
						</tr>
						<tr>
							<td>
								<?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_3_private.php')); ?>
							</td>
						</tr>
						<tr>
							<td>
							  <?php    require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
							</td>
						</tr>
					 </table>					 
					</td>
				</tr>
			</table>
                   	    <table name="espace_inferieur_vide_15px_height" width="990"  border="0" cellspacing="0" cellpadding="0">
          		<tr>
          			<td height="15"><img src="<?php    echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
        		</tr>
      		</table>
    		
		</td>
			
    	
    </tr>
  	
</table>
<?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer_private.php')); ?>


</div>
<?php  
 if (isset($HTTP_GET_VARS['fstlog'])){
	if ($HTTP_GET_VARS['fstlog']==1){
		switch ($languages_id){
			case 1:
			?>
			<!-- Google Code for purchase Conversion Page -->
			<script language="JavaScript" type="text/javascript">
			<!--
			var google_conversion_id = 1066320405;
			var google_conversion_language = "fr";
			var google_conversion_format = "1";
			var google_conversion_color = "FFFFFF";
			if (1) {
			  var google_conversion_value = 1;
			}
			var google_conversion_label = "purchase";
			//-->
			</script>
			<script language="JavaScript" src="http://www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<img height=1 width=1 border=0 src="http://www.googleadservices.com/pagead/conversion/1066320405/imp.gif?value=1&label=purchase&script=0">
			</noscript>
			<?php 
			break;
			
			case 2:
			?>
			<!-- Google Code for purchase Conversion Page -->
			<script language="JavaScript" type="text/javascript">
			<!--
			var google_conversion_id = 1066320405;
			var google_conversion_language = "nl";
			var google_conversion_format = "1";
			var google_conversion_color = "FFFFFF";
			if (1.0) {
			  var google_conversion_value = 1.0;
			}
			var google_conversion_label = "purchase";
			//-->
			</script>
			<script language="JavaScript" src="http://www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<img height=1 width=1 border=0 src="http://www.googleadservices.com/pagead/conversion/1066320405/imp.gif?value=1.0&label=purchase&script=0">
			</noscript>
			<?php 
			break;
			
			default :
			break;			
		}
	} 
 }
?>
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
	var pageTracker = _gat._getTracker("UA-8474969-1");
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
		var pageTracker = _gat._getTracker("UA-7319107-1");
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
<!-- Google Analytics tag -->




	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->

</body>
</html>