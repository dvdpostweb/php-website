 <?php
 	$link_freetrial="/step1.php?activation_code=TV4DVD";
    $banner='banner_loisirs_trial.gif';

//$file_import = fopen('http://www.programme-tv.com/includes.html?s=forum&i=dvdpost', 'rb');
$file_import = fopen('http://www.mon-programme-tv.be/includes.html?s=forum&i=dvdpost', 'rb');

//php5
// $layout = stream_get_contents($handle);
// fclose($handle);
$layout = '';
while (!feof($file_import)) {
  $layout .= fread($file_import, 8192);
}
fclose($file_import);

$layout_tab = explode('$$content$$', $layout);
//Header programmetv
	$header= $layout_tab['0'];
	//remplace le title dans le header
	$header =str_replace('$$page_title$$', 'DVDPost', $header);

//Footer programmetv
	$footer= $layout_tab['1'];


//affichage du layout  
echo $header;

//affichage du content
?>
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/dvdpost_public.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/ibox.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
<?php  


// echo'<div align="center">';
// 	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_1.php')); 
// 	echo'<br />';
// 	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_2.php'));
// 	echo '<div align="center">';
// 		include(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); 
// 	echo '</div>';
// echo '</div>';

?>
<div align="center" class="public">
<br />
<table name="layout" width="773" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
  	<?php 
	$logo_img='logo_DVDPost.png';
	?>
    <td width="374" align="left"><a href="/default.php"><img src="<?php  echo DIR_WS_IMAGES;?>canvas/<?php  echo $logo_img ;?>" width="258" border="0"></a></td>
    <td width="399" align="right" valign="top" class="yellowlink">
		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_1.php')); ?>
	</td>
  </tr>
  <tr> 
    <td colspan="2">
    	<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_2.php')); ?>
	</td>
  </tr>
  <?php  if ($page_body_to_include=='default.php'){
	    $bgcol= '#000000';
	}else{$bgcol= $bgcol= '#FEF6DD';;}
   ?>
  <tr>
			<td colspan="2" align="right" bgcolor="<?php  echo $bgcol;?>" align="center">
	        &nbsp;
			</td></tr>
  <tr> 
    <td colspan="2" class="public_bckg" align="center">
		<?php 
  			if ($page_body_to_include !='default.php' ){ echo '<img src="'.DIR_WS_IMAGES.'blank.gif" height="15">';  ;} 
			require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); 
		?>
	</td>
  </tr>
  <tr>   	
  	<?php  if ($page_body_to_include=='default.php'){
	    $img_footer= DIR_WS_IMAGES.'canvas/bottom_default.png';
	}else{$img_footer= DIR_WS_IMAGES.'canvas/bottom_default2.png';}
	?>
    <td colspan="2"><img src="<?php  echo $img_footer ;?>" width="773"><br></td>
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
