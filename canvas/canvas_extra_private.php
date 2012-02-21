<?php 
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
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('stylesheet/stylesheet_private.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico">
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body LEFTMARGIN="0">
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
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1_private.php')); ?>
			<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td  width="159" valign="top" id="left_menu"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_extra.php')); ?></td>
					<td width="801" align="right" valign="top" id="main_page" >
					 <table width="764" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2_private.php')); ?>             
							</td>
						</tr>
						<tr>
							<td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_3_private.php')); ?>
							</td>
						</tr>
						<tr>
							<td><?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
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
      		<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>minuscules/herbe.jpg" width="960" height="75"></div>
    		<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder2.jpg" width="960" height="12"></div>
		</td>
		
    	<td nowrap background="<?php  echo DIR_WS_IMAGES;?>/border_right.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    </tr>
  	<tr>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_left.jpg" width="8" height="8"></td>
    	<td height="8"><img src="<?php  echo DIR_WS_IMAGES;?>/border_bottom.jpg" width="1007" height="8"></td>
    	<td height="8" nowrap><img src="<?php  echo DIR_WS_IMAGES;?>/corner_bottom_right.jpg" width="8" height="8"></td>
  	</tr>
</table>
<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer_private.php')); ?>
</CENTER>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>  		
    		