<?php  
$link_freetrial="/default.php";
$banner='banner_trial.gif';

switch($languages_id){
	case 1:
		$file_import = fopen('http://www.webmember.be/fct/fr/personnel/dvdpost/g/splashpage/dvdpost_master.html', 'rb');		
		break;
		
	case 2:
		$file_import = fopen('http://www.webmember.be/fct/nl/personnal/dvdpost/g/splashpage/dvdpost_master.html', 'rb');
		break;
		
	case 3:
		$file_import = fopen('http://www.webmember.be/fct/nl/personnal/dvdpost/g/splashpage/dvdpost_master.html', 'rb');
		break;
}
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

<script type="text/javascript" src="/js/ibox.js"></script>
<div align="center" class="public">
<br />
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
<br />
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
