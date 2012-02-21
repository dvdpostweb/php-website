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
<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/stylesheet.css">
<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/basic.css">
<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/new.css">

<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/ibox.css">
<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/dvdpost_public.css">

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
<div align="left">
<?php
$timeout = 2;
$old = ini_set('default_socket_timeout', $timeout);
switch($lang_short)
{
	case 'fr':
		$l='fr';
		break;
	case 'nl':
		$l='nl';
		break;
	case 'en':
		$l='nl';
		break;
	
}
if($file_import = @fopen('http://partners.neteventsmedia.be/cinenews/webintegration/header.cfm?lang='.$l, 'rb'))
{
	//php5
	// $layout = stream_get_contents($handle);
	// fclose($handle);
	$layout = '';
		ini_set('default_socket_timeout', $old);
		stream_set_timeout($file_import, $timeout);
		stream_set_blocking($file_import, 0);
	while (!feof($file_import)) {
	  $layout .= fread($file_import, 8192);
	}
	fclose($file_import);
}
if(${"REMOTE_ADDR"}== ADMINIP){
//	$layout = 'le site le soir $$content$$ lesoir '; 
}
$layout_tab = explode('$$content$$', $layout);
//Header lesoir
	$header= $layout_tab['0'];
	//remplace le title dans le header
	$header =str_replace('$$page_title$$', 'DVDPost', $header);

//Footer lesoir
	$footer= $layout_tab['1'];


//affichage du layout  
echo $header;



	?>
	  <table width="786" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#005083" bgcolor="FFFFFF">
        <tr>
			<td valign="top" align="center">
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1.php')); ?>
            <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2.php')); ?>
			<br>
			  <table width="731" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td  width="189" rowspan="2" valign="top" id="left_menu" align="center">
						<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_public.php')); ?>
					</td>
					<td  width="542" colspan="2" valign="top" align="center"  class="slogan_black">			  
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
	<div align="center" style ="font-size:12px;"><img src="<?php  echo DIR_WS_IMAGES;?>/msn/nuancierborder_msn.gif" width="786" height="12"><br>
		<?php
		$layout = '';
		if($file_import = @fopen('http://partners.neteventsmedia.be/cinenews/webintegration/footer.cfm?lang='.$l, 'rb'))
			{
				//php5
				// $layout = stream_get_contents($handle);
				// fclose($handle);
				
					ini_set('default_socket_timeout', $old);
					stream_set_timeout($file_import, $timeout);
					stream_set_blocking($file_import, 0);
				while (!feof($file_import)) {
				  $layout .= fread($file_import, 8192);
				}
				fclose($file_import);
			}
			echo $layout;
		?>            </div>
</div>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>