<?php 
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php  echo HTML_PARAMS; ?>>
<head>
<title><?php  echo TEXT_META_TITLE; ?></title>
<META NAME="description" content="<?php  echo TEXT_META_DESC; ?>">
<META NAME="keywords" content="<?php  echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php  echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=iso-8859-1">
<SCRIPT TYPE="text/javascript" SRC="/metriweb/mwTag.js">
</SCRIPT>
<META NAME="description" content="RTL, Radio Télévision Luxembourg. Luxembourg's N°1 Information and Entertainment Portal.">
<META NAME="keywords" content="RTL, Radio Télévision Lëtzebuerg, chat, news, services, fun, rtl, top sites, headlines, internet, business, high tech, sport, infotel, meteo, traffic, what's up, tv, kino, travel, restaurant, rtl service, horoskop, carweb, luxbazar, emploi, music, books, comedy, games, models, postcards, boulevard, planet rtl, netzap, radio, télé, rtl actions, dossiers, autos, motos, careers, computer, entertainment, erotic, lifestyle, media, science, shopping, travel, hollywood, acl, traffic, portal, search, luxembourg">
<META NAME="robots" CONTENT="all">

<link rel="stylesheet" type="text/css" href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . '/' . getBestMatchToIncludeAny('stylesheet/stylesheet.css','.css'); ?>">
<LINK REL="STYLESHEET" TYPE="text/css" HREF="/stylesheet/rtl.dvdpost.be_common.css">   
<LINK REL="STYLESHEET" TYPE="text/css" HREF="/stylesheet/rtl.dvdpost.be_main.css">   

<base href="<?php  echo (getenv('HTTPS') == 'on' ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<SCRIPT LANGUAGE="JavaScript">
<!--
  function mmil() {
      var mywindow5=window.open('http://model.newmedia.lu/intro.html','mmil','width=590,height=483,scrollbars=no');
  }
  function odcpop() {
      var mywindow6=window.open('http://www.odc.lu/intro.php','odcpop','width=560,height=475,scrollbars=no');
  }
  function internaxx() {
  	var mywindow8=window.open('/news/internaxx_popup.rtl','internaxx','width=300,height=250,dependent=no,location=no,menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no');
  }
  function quicklogin() {
    window.name="content";       
      var quickloginwindow=window.open("/vip/vipevents/rtlviplogin/quicklogin.rtl","QuickLogin","width=550,height=550,status=no,toolbar=no,resizable=yes,menubar=no,location=no,scrollbars=yes");
	    if (!quickloginwindow) {
		      alert("Et ass net méiglech dës Fënster opzemaachen ! Desaktivéiert Äre Pop-Up Killer w.e.g.!");
	    } else {
		    quickloginwindow.moveTo( ((screen.width-550)/2) , ((screen.height - 550)/2) );
	    }
  }
  function muzoom() {
		  var mywindow6=window.open('/vip/models2004/zoom.html','MuZoom','width=550,height=430,scrollbars=no');
  }       
   
//-->
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!--

function yoyosearch() {

    if (document.yoyo.searchwhere[0].checked==true) {
        document.yoyo.action='http://yoyo.rtl.lu/web/index.php';
    } else if (document.yoyo.searchwhere[1].checked==true) {
        document.yoyo.action='http://yoyo.rtl.lu/luxwebwrapper.php';
    } else if (document.yoyo.searchwhere[2].checked==true) {
        document.yoyo.action='http://yoyo.rtl.lu/rtl/index.php';
    }
    document.yoyo.submit();
}

//-->
  </SCRIPT>
<?php  require('form_check.js.php'); ?>
<script type="text/javascript" src="<?php  //echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>
</head>
<body marginwidth="0" class="main-removed" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

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

<table width="<?php  echo TABLE_MAIN_WIDTH; ?>" align="<?php  echo TABLE_MAIN_ALIGN; ?>" bgcolor="<?php  echo TABLE_MAIN_COLOR; ?>" style="<?php  echo TABLE_MAIN_STYLE; ?>" background="<?php  echo TABLE_MAIN_BACKGROUND; ?>" >
  <tr>
    <td>
      <!-- header //-->
      <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/header.php')); ?>
            <!-- body_text //-->
			<div align="center">
            <table "731" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td  width="189" rowspan="2" valign="top" id="left_menu" align="center">
						<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_public.php')); ?>
					</td>
					<td  width="542" colspan="2" valign="top" align="center"  class="slogan_black">			  
						<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
				</tr>		
			  </table>
            </div>
			<!-- body_text_eof //-->
      <!-- body_eof //-->
      <br>

      <!-- footer //-->
      <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
      <!-- footer_eof //-->
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