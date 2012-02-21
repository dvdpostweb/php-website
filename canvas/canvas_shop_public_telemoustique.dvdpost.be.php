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
<link rel="shortcut icon" href="http://www.telemoustique.be/images/favicon.ico">
<script type="text/javascript" src="http://www.telemoustique.be/js/actions.js"></script>
<script type="text/javascript" language="javascript" src="http://www.telemoustique.be/js/BIMtag.js"></script>
<!-- <script type="text/javascript" src="http://a.as-eu.falkag.net/dat/dlv/aslmain.js"></script>
-->

<script type="text/javascript" src="<?php  //echo HTTP_SERVER;?>/metriweb/mwTag.js"></script>

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


<!--WEBSIDESTORY CODE HBX1.0 (Universal)-->
<!--COPYRIGHT 1997-2005 WEBSIDESTORY,INC. ALL RIGHTS RESERVED. U.S.PATENT No. 6,393,479B1. MORE INFO:http://websidestory.com/privacy-->
<script language="javascript">
var _hbEC=0,_hbE=new Array;function _hbEvent(a,b){b=_hbE[_hbEC++]=new Object();b._N=a;b._C=0;return b;}
var hbx=_hbEvent("pv");hbx.vpc="HBX0100u";hbx.gn="ehg-edgebe.hitbox.com";
//BEGIN EDITABLE SECTION
//CONFIGURATION VARIABLES
hbx.acct="DM560223C2NE71EN3";//ACCOUNT NUMBER(S)
hbx.pn="index.html";//PAGE NAME(S)
hbx.mlc="/RENDEZVOUS";//MULTI-LEVEL CONTENT CATEGORY
hbx.pndef="title";//DEFAULT PAGE NAME
hbx.ctdef="full";//DEFAULT CONTENT CATEGORY
//OPTIONAL PAGE VARIABLES
//ACTION SETTINGS
hbx.fv="";//FORM VALIDATION MINIMUM ELEMENTS OR SUBMIT FUNCTION NAME
hbx.lt="auto";//LINK TRACKING
hbx.dlf="n";//DOWNLOAD FILTER
hbx.dft="n";//DOWNLOAD FILE NAMING
hbx.elf="n";//EXIT LINK FILTER
//SEGMENTS AND FUNNELS
hbx.seg="";//VISITOR SEGMENTATION
hbx.fnl="";//FUNNELS
//CAMPAIGNS
hbx.cmp="";//CAMPAIGN ID
hbx.cmpn="";//CAMPAIGN ID IN QUERY
hbx.dcmp="";//DYNAMIC CAMPAIGN ID
hbx.dcmpn="";//DYNAMIC CAMPAIGN ID IN QUERY
hbx.dcmpe="";//DYNAMIC CAMPAIGN EXPIRATION
hbx.dcmpre="";//DYNAMIC CAMPAIGN RESPONSE EXPIRATION
hbx.hra="";//RESPONSE ATTRIBUTE
hbx.hqsr="";//RESPONSE ATTRIBUTE IN REFERRAL QUERY
hbx.hqsp="";//RESPONSE ATTRIBUTE IN QUERY
hbx.hlt="";//LEAD TRACKING
hbx.hla="";//LEAD ATTRIBUTE
hbx.gp="";//CAMPAIGN GOAL
hbx.gpn="";//CAMPAIGN GOAL IN QUERY
hbx.hcn="";//CONVERSION ATTRIBUTE
hbx.hcv="";//CONVERSION VALUE
hbx.cp="null";//LEGACY CAMPAIGN
hbx.cpd="";//CAMPAIGN DOMAIN
//CUSTOM VARIABLES
hbx.ci="";//CUSTOMER ID
hbx.hc1="";//CUSTOM 1
hbx.hc2="";//CUSTOM 2
hbx.hc3="";//CUSTOM 3
hbx.hc4="";//CUSTOM 4
hbx.hrf="";//CUSTOM REFERRER
hbx.pec="";//ERROR CODES
//INSERT CUSTOM EVENTS
//END EDITABLE SECTION
//REQUIRED SECTION. CHANGE "YOURSERVER" TO VALID LOCATION ON YOUR WEB SERVER (HTTPS IF FROM SECURE SERVER)
</script>
<script language="javascript1.1" defer src="http://www.telemoustique.be/js/hbx.js"></script>
<!--END WEBSIDESTORY CODE-->
</head>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
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
<table width="973" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="139" background="<?php  echo DIR_WS_IMAGES;?>telemoustique/entete.jpg">&nbsp;
	<?php 
		$day=date("d");
		$month=date("m");
		$year=date("Y");

		switch ($month)
			{
			case 1:
			$month="janvier";
			break;
			case 2:
			$month="février";
			break;
			case 3:
			$month="mars";
			break;
			case 4:
			$month="avril";
			break;
			case 5:
			$month="mai";
			break;
			case 6:
			$month="juin";
			break;
			case 7:
			$month="juillet";
			break;
			case 8:
			$month="août";
			break;
			case 9:
			$month="septembre";
			break;
			case 10:
			$month="octobre";
			break;
			case 11:
			$month="novembre";
			break;
			case 12:
			$month="décembre";
			break;
			}					
	?>
	<div id="date"><?php  echo $day.' '.$month.' '.$year	;?></div> 
	</td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>telemoustique/bg_interface.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="10"></td>
  </tr>
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>telemoustique/bg_interface.jpg"><table width="973" border="0" cellspacing="0" cellpadding="0">
      <tr>
        
		<td width="30" align="center">&nbsp;
		
        </td>
        <td width="154" align="center" valign="top">
			<!--menu-->
            <!--the target_url attribute is determined in bas_main-->
           	<div class="menu_haut_down"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/index.html">ACCUEIL</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/magazine.html">LE MAGAZINE</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/infos.html">LES INFOS</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/liens.html">LES LIENS</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/tv.html">LES PROGRAMMES TELE</a></div>

	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/critiques.html">TOPS CULTURE</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/mosquito.html">MOSQUITO, L'AGENDA</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/loisirs.html">CONCOURS &amp; QUIZ</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/detente.html">DETENTE</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/forum.html">FORUMS &amp; BLOG</a></div>

	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/telemouskid.html">TELEMOUS'KID</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/abonnements.html">ABONNEMENTS</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/faq.html">FAQ</a></div>
	<div class="menu"><a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/contact.html">NOUS CONTACTER</a></div>
	<div class="menu_bas"></div> 
            <!--newsletter-->		
		</td>
        <td width="786" align="center">
		<table width="762" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>telemoustique/dvdp_top.gif" width="762" height="16"></td>
            </tr>
          <tr>
            <td colspan="2" width="758" bgcolor="cc0000">
			 <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1.php')); ?>
              <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_shop.php')); ?>
            </td>
           </tr>
           <tr>
           	<td bgcolor="FFFFFF">
              <br>
			  <table width="758" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td valign="top" id="left_menu" align="center">
						<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_shop_public.php')); ?>
					</td>
					<td  width="542" colspan="2" valign="top" align="center"  class="slogan_black">			  
						<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
				</tr>		
			  </table>	
			<br>
			</td>
            <td width="4" background="<?php  echo DIR_WS_IMAGES;?>telemoustique/right.gif"><img src="<?php  echo DIR_WS_IMAGES;?>telemoustique/right.gif" width="6" height="5"></td>
          </tr>
          <tr>
            <td colspan="2">
            <img src="<?php  echo DIR_WS_IMAGES;?>telemoustique/dvdp_bottom.gif" width="762" height="4"><br>
            <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
            
            </td>
          </tr>
        </table><br><br>		
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>telemoustique/pieds.gif"></td>
  </tr>
</table>

<div id="rightbanner">
<!-- BEGIN: AdSolution-Website-Tag 4.3 : TÉLÉMOUSTIQUE / TELEMOUSTIQUE_FR_HOME_120X600_RIGHT  -->
<!-- <script language="javascript" type="text/javascript">
 -->
<!-- Ads_kid=0;Ads_bid=0;Ads_xl=0;Ads_yl=0;Ads_xp='';Ads_yp='';Ads_xp1='';Ads_yp1='';Ads_opt=0;Ads_wrd='';Ads_prf='';Ads_par='';Ads_cnturl='';Ads_sec=0;Ads_channels='';
 -->
<!-- </script>
 -->
<!-- <script type="text/javascript" language="javascript" src="http://a.as-eu.falkag.net/dat/cjf/00/44/20/09.js"></script>
 -->

<!-- <noscript>
 -->
<!-- <a href="http://sel.as-eu.falkag.net/sel?cmd=lnk&dat=442009&opt=0&rdm=[timestamp]" target="_blank"><img src="http://sel.as-eu.falkag.net/sel?cmd=ban&dat=442009&opt=0&rdm=[timestamp]" width="0" height="0" alt="Please click here." border="0"></a>
 -->
<!-- </noscript>
 -->
<!-- END:AdSolution-Tag 4.3 -->
</div>

<div id="pieds">Telemoustique.® be est une initiative de Sanoma Magazines Belgium SA. © 2006 - Télémoustique. <a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/disclaimer.html">Disclaimer</a> - <a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/disclaimer.html#privacy">Privacy</a> - <a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/regles1.html">Règlement Concours</a> - <a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/regles2.html">Règlement Forum</a> - <a href="http://www.telemoustique.be/cps/rde/xchg/tm/hs.xsl/contact.html">Contact</a> - webdesign: [<a href="http://www.vertige.org" target="_blank">Vertige</a>]</div>
<p>&nbsp;</p>	
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>