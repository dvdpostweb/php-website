<?php 
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}

$file_import = fopen('http://www.levif.be/dvdpost/template.jsp', 'rb');
//php5
// $layout = stream_get_contents($handle);
// fclose($handle);
$layout = '';
while (!feof($file_import)) {
  $layout .= fread($file_import, 8192);
}
fclose($file_import);

$layout_tab = explode('$$content$$', $layout);
//Header lesoir
	$header= $layout_tab['0'];
	//remplace le title dans le header
	$header =str_replace('$$page_title$$', 'DVDPost', $header);

//Footer lesoir
	$footer= $layout_tab['1'];


//affichage du layout  
echo $header;

//affichage du content
?>
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/dvdpost_public.css','.css'); ?>">
<LINK REL="SHORTCUT ICON" href="<?php  echo DIR_WS_IMAGES;?>/favicon.ico"> 
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  //echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
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
    //metriwebTag ("dvdpost", keyword, extra);
</script>
<div align="center">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="FFFFFF">
        <tr>
			<td valign="top" align="left">
            <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_shop.php')); ?>
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			  	<tr><td colspan="3" bgcolor="#B5B5B5"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="1" height="1"></td></tr>
				<tr>
					<td  width="189" rowspan="2" valign="top" id="left_menu" align="center">
						<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_public.php')); ?>
					</td>
					<td   colspan="2" valign="top" align="center"  class="slogan_black">			  
						<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
				</tr>		
			  </table>	
			<table name="espace_inferieur_vide_15px_height" width="786"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
              </tr>
            </table>
			</td>
        </tr>
  </table>
</div>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
<?php 

//affichage du footer
echo $footer;
?>

