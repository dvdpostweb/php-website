<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<?php

	$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
	if(is_array($refresh))
	{
		echo '<META http-equiv="refresh" content="'.$refresh['secondes'].'; URL='.$refresh['link'].'">';
	}
?>
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php echo $meta_desc1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/public_2009.css?v=9','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/step_2010.css','.css'); ?>">

<script type="text/javascript">document.write(unescape("%3Cscript src='" + (("https:" == document.location.protocol) ? "https" : "http") + "://a.mouseflow.com/projects/2cb0497a-995f-4b44-8df2-fc2b120642c9_p.js' type='text/javascript'%3E%3C/script%3E"));</script>
<?php 
$script_available= array(0=>'/domiciliation70_confirmation.php');

if(scriptAvailable($script_available)){
	if($_GET['confirm']=='download')
	{
?>
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=<?= '/download_dom.php' ?>">
<?php
}}
$host=$_SERVER["SERVER_NAME"];
	if (strlen($meta1)>1){
		echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}else {
	$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
		echo '<title>'.$strmeta. $title . $strmeta. TEXT_META_TITLE2 .'</title>';
	}

$script_available= array(0=>'/step3b.php',1=>'/step4.php');

if(scriptAvailable($script_available)){
?>

<script type="text/javascript" src="js/question_jquery.js?v=2"></script>
<?php
}
?>
<?php

	$script_available= array(0=>'/step1.php');
	if(scriptAvailable($script_available)){
	?>
		<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
		<script type="text/javascript" src="js/step1.js?v=2"></script>
		<script>select=1;</script>
		<script type="text/javascript" src="js/question.js?v=2"></script>
	<?php
	}
$script_available= array(0=>'/step4.php');
if(scriptAvailable($script_available)){
?>
<script>
  select=8;
</script>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/question.js?v=2"></script>
<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">

<?php
}

$script_available= array(0=>'/step3b.php');
if(scriptAvailable($script_available)){

$eda_username = 'dvdpost'; 
$eda_key = 'sign/key.pem';
?>
<link type="text/css" href="eda/jquery/css/jquery.ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="eda/jquery/js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="eda/jquery/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="eda/jquery/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="eda/jquery/js/jquery.ui.position.js"></script>
<script type="text/javascript" src="eda/jquery/js/jquery.ui.autocomplete.js"></script>
<!-- // JQuery Includes Needed By Formular1 -->

<?php
	require_once 'eda/formular1/eda_session.php';
?>
<script type="text/javascript">
	var eda_label_ask_phone = 'Enter your phone number';
	var eda_form_phone_id = 'phone';
	var eda_form_firstname_id = 'firstname';
	var eda_form_lastname_id = 'lastname';
	var eda_form_address_id = 'street_address';
	var eda_form_zip_id = 'postcode';
	var eda_form_locality_id = 'city';
	var eda_form_country_id = 'country2';
	var eda_form_language_id = 'language';
	var eda_form_housenum_id = 'housenum';
  </script>     
  
  <script type="text/javascript" src="http://ws.formular1.biz/server/js/eda_formular1.js"></script>
<link type="text/css" href="eda/formular1/eda_formular1.css" rel="stylesheet" />

<script type="text/javascript" src="js/step3_jquery.js"></script>
<script>
  select=1;
</script>

<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">

<?php
}
$script_available= array(0=>'/step_check.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step_check.js"></script>
<script>
  select=4;
</script>
<script type="text/javascript" src="js/question.js?v=2"></script>
<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">
<?php
}

$script_available= array(0=>'/step3c.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3c.js"></script>
<?php
}
$script_available= array(0=>'/step3d.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3d.js"></script>
<?php
}
$script_available= array(0=>'/create_account.php',1=>'/create_account_process.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/create_account.js"></script>
<?php
}
?>
<script type="text/javascript" src="js/main.js?v=2"></script>
	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="stylesheet/ie6.css" media="screen"/><![endif]-->
</head>
<body>
	<?php
//if($host!='localhost' && $host!='test'){
if(1==0){
	$script_available= array(0=>'/step1.php');

	if(scriptAvailable($script_available)){
		if(empty($_GET['var1']) && empty($_GET['var2'])){
			if(WEBSITE==101){
	?>
	<!-- Google Website Optimizer Control Script -->
	<!-- Google Website Optimizer Control Script -->
	<script>
	function utmx_section(){}function utmx(){}
	(function(){var k='2743409462',d=document,l=d.location,c=d.cookie;function f(n){
	if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.indexOf(';',i);return c.substring(i+n.
	length+1,j<0?c.length:j)}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;
	d.write('<sc'+'ript src="'+
	'http'+(l.protocol=='https:'?'s://ssl':'://www')+'.google-analytics.com'
	+'/siteopt.js?v=1&utmxkey='+k+'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='
	+new Date().valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
	'" type="text/javascript" charset="utf-8"></sc'+'ript>')})();
	</script><script>utmx("url",'A/B');</script>
	<!-- End of Google Website Optimizer Control Script -->

	

	<?php } else {?>
	<!--step 1 -> step 2 -->
	<!-- Google Website Optimizer Control Script -->
	<script>
	function utmx_section(){}function utmx(){}
	(function(){var k='2451790909',d=document,l=d.location,c=d.cookie;function f(n){
	if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.indexOf(';',i);return c.substring(i+n.
	length+1,j<0?c.length:j)}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;
	d.write('<sc'+'ript src="'+
	'http'+(l.protocol=='https:'?'s://ssl':'://www')+'.google-analytics.com'
	+'/siteopt.js?v=1&utmxkey='+k+'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='
	+new Date().valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
	'" type="text/javascript" charset="utf-8"></sc'+'ript>')})();
	</script><script>utmx("url",'A/B');</script>
	<!-- End of Google Website Optimizer Control Script -->

	
	<?php
	}}}}
	?>
<div id="background">
<?php 
switch(WEB_SITE_ID)
  {
  case 26:
    $link_freetrial="/step1.php?activation_code=BL4DVD";
    $banner='banner_loisirs_trial.gif';
    break;
  case 39:
    $link_freetrial="/default.php";
	$banner='banner_trial.gif';
    break;  
  
  case 101:
    $link_freetrial="/step1.php?activation_code=TRIALNL";
    $banner='banner_msn_trial.gif';
    break;
    
  default:
	$link_freetrial="/step1.php";
	$banner='banner_trial.gif';
	break;
}
?>
<?php
//echo ${"REMOTE_ADDR"}.'< --- >'.ADMINIP;
if(${"REMOTE_ADDR"}== ADMINIP || $host=='localhost'){
        echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';
}
?>

	<div class="wrapper">
		<div class="page_step<?php //$logo ?>">
			<!-- center holder -->
			<div class="center-holder">
				<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,0,$jacob)); ?>
			</div>
			<!-- header -->
			<div id="header" class="step_header<?php //$logo ?>">
				<!-- logotype -->
				
				<strong class="logo<?php //$logo ?>"><a href="default.php">DVDPost.be</a></strong>
				
<?php 
	if(WEBSITE==101)
	{
		echo "<div id='logo_slogan'>".SLOGAN."</div>";
	}
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
?>

<ul class="top-nav_step">
	<li><a href ="default.php"><?php  echo TEXT_ACCUEIL ;?></a></li>	
	<li><a href ="faq_public.php" target="_blank">Help</a></li>					
<?php
	if(WEBSITE!=101)
	{
		switch($languages_id){
		case 1:	// langue courante: Fr		
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '">NL</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '">EN</a></li>';
		break; 	
		case 2:// langue courante: NL	
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '">FR</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=en') . '">EN</a></li>';					
		break; 
		case 3:// langue courante: EN		
			echo '<li><a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=fr') . '">FR</a> - <a href="' . language_switcher($PHP_SELF,$QUERY_STRING, 'language=nl') . '">NL</a></li>';
		break;
		}
	}
?>
</ul>
			</div>
		</div>
	</div>
    </div>
	<!-- footer -->
	
	
	<div id="footer">
		<div id="subfooter">
			<div id="footer-nav">
				<h3>
					<?php echo TITLE_QUICK_LINKS ;?>     
				</h3>

				<ul>
					<li><a href="/whoweare.php" target='_blank'><?php echo TEXT_WHO_WE_ARE ;?></a></li>
					<li><a href="presse_public.php" target="_blank" class="black12pix"><?php echo TEXT_PRESS ;?></a></li>
					<li><a href="privacy_public.php" target="_blank" class="black12pix"><?php echo TEXT_CONFIDENTIALITY ;?></a></li>
					<li><a href="conditions_public.php" target="_blank" class="black12pix"><b><?php echo TEXT_CONDITION ;?></b></a></li>
				</ul>
				<ul id="contacts">
					<li><a href="contact_public.php" target="_blank" class="black12pix"><?php echo TEXT_CONTACT_US ;?></a></li>
					<li><a href="faq_public.php" target="_blank" class="black12pix"><b><?php echo TEXT_QUESTIONS ;?></b></a></li>
				</ul>
			</div>
			<div id="partners">
				<h3><?= FINANCIAL_PARTNERS ?></h3>
					<div id="partners-box">
						<a href="http://visa.be/" target="_blank">
							<img src="/images/visa_footer.gif" width="99" height="46" />
						</a>
						<a href="http://www.mastercard.com/be/personal/en/" target="_blank">
							<img src="/images/mastercard_footer.gif" width="99" height="46" />
						</a>  
						<a href="http://www.americanexpress.be/american_express_home_particuliers.html?utm_source=google&utm_medium=cpc2&utm_term=american%2Bexpress&utm_campaign=FR%2BBrand&gclid=CPWZtt2VtKMCFRIqDgod2zF43Q" target="_blank">
							<img src="/images/american_footer.gif"  align="absmiddle" width="58" height="58" />
						</a>
						<a href="http://www.ogone.be/" target="_blank">
							<img src="/images/ogone_footer.gif" width="110" height="51"  align="absmiddle" />
						</a>
					</div>
				</div>

				<div class="clear"></div>
				<p id="copyr">&copy; 2002-<?= date("Y"); ?> DVDpost  | Home Entertainment Services S.A. </p>
			</div>
		</div>
	</div>



	<!-- Google Analytics tag -->
	<?php
	switch (WEBSITE){
	 	case '101':		 	
	 	?>
	 		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("UA-8474955-1");
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
					var pageTracker = _gat._getTracker("UA-7320293-1");
					pageTracker._trackPageview();
				} catch(err) {}</script>		

	      <!-- Woopra Code Start -->
	      <script type="text/javascript">
	      var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
	      document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
	      </script>
	      <!-- Woopra Code End -->

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
	<?php  
//echo 'type'.$type_tag;
	$script_available= array(0=>'/step4.php');
	if(scriptAvailable($script_available)){
	?>
		<!-- Hi-Media Belgium - Lead Tag -->
		<script language="Javascript">
		(document.URL.substr(0, 8)=="https://")? proto = "https://" : proto = "http://";
		document.write('<img src="'+proto+'fl01.ct2.comclick.com/vente.ct2?id_regie=2&num_campagne=688&montant=0&num_commande=<?= $customers_id?>&email=<?= $email_address ?>" />');
		</script>
		<!-- Lead tag end-->
		
		
		<!-- trade tracker-->
		<?php
/*
		echo '<img 
		src="/belgie/conversion.php?campaignID=2946&productID=4211&conversionType=lead&https=0&transactionID='. $customers_id.'&transacti 
		onAmount=123.45&email='.$email_address.'&descrMerchant='.$_GET['type'].'&descrAffiliate='.$_GET['type'].'" width="1" height="1" border="0" alt="" />';   
*/		
		?>
		<!-- trade tracker -->
	<?php 
	
		if(WEBSITE!=101)
			echo '<!-- Begin AdsMarket Lead Tracking code -->
			<script src="http://network.adsmarket.com/cpx?script=1&programid=14319&action=lead&p1='. $customers_id.'" type="text/javascript"></script> 
			<!-- End AdsMarket Lead Tracking code -->

		
			<!-- Begin AdsMarket Lead Tracking code -->
			<script src="http://network.adsmarket.com/cpx?script=1&programid=14431&action=lead&p1='. $customers_id.'" type="text/javascript"></script> 
			<!-- End AdsMarket Lead Tracking code -->
			';
		else
			echo '<!-- Begin AdsMarket Lead Tracking code -->
			<script src="http://network.adsmarket.com/cpx?script=1&programid=14435&action=lead&p1='. $customers_id.'" type="text/javascript"></script> 
			<!-- End AdsMarket Lead Tracking code -->


			<!-- Begin AdsMarket Lead Tracking code -->
			<script src="http://network.adsmarket.com/cpx?script=1&programid=14439&action=lead&p1='. $customers_id.'" type="text/javascript"></script> 
			<!-- End AdsMarket Lead Tracking code -->
			';
		
		
		
			switch ($languages_id){
				case 1:
				?>
				<!-- Google Code for Ogone Confirmation Conversion Page -->
				<script language="JavaScript" type="text/javascript">
				<!--
				var google_conversion_id = 1033549176;
				var google_conversion_language = "en_US";
				var google_conversion_format = "3";
				var google_conversion_color = "ffffff";
				var google_conversion_label = "84cwCJayjwEQ-Orq7AM";
				if (20.0) {
				  var google_conversion_value = 20.0;
				}
				//-->
				</script>
				<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
				</script>
				<noscript>
				<img height="1" width="1" border="0" src="https://www.googleadservices.com/pagead/conversion/1033549176/?value=20.0&amp;label=84cwCJayjwEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
				</noscript>
				<?php 
				break;

				case 2:
				?>	
				<!-- Google Code for Ogone Confirmation Conversion Page -->
				<script language="JavaScript" type="text/javascript">
				<!--
				var google_conversion_id = 1033549176;
				var google_conversion_language = "en_US";
				var google_conversion_format = "3";
				var google_conversion_color = "ffffff";
				var google_conversion_label = "84cwCJayjwEQ-Orq7AM";
				if (20.0) {
				  var google_conversion_value = 20.0;
				}
				//-->
				</script>
				<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
				</script>
				<noscript>
				<img height="1" width="1" border="0" src="https://www.googleadservices.com/pagead/conversion/1033549176/?value=20.0&amp;label=84cwCJayjwEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
				</noscript> 
				<?php 
				break;
				case 3:
				?>	
				<!-- Google Code for Ogone Confirmation Conversion Page -->
				<script language="JavaScript" type="text/javascript">
				<!--
				var google_conversion_id = 1033549176;
				var google_conversion_language = "en_US";
				var google_conversion_format = "3";
				var google_conversion_color = "ffffff";
				var google_conversion_label = "84cwCJayjwEQ-Orq7AM";
				if (20.0) {
				  var google_conversion_value = 20.0;
				}
				//-->
				</script>
				<script language="JavaScript" src="https://www.googleadservices.com/pagead/conversion.js">
				</script>
				<noscript>
				<img height="1" width="1" border="0" src="https://www.googleadservices.com/pagead/conversion/1033549176/?value=20.0&amp;label=84cwCJayjwEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
				</noscript> 
				<?php 
				break;			
				default :
				break;			
			}
		}
		
		if($host!='localhost' && $host!='test'){
		$script_available= array(0=>'/step1.php');

		if(scriptAvailable($script_available)){
			if(WEBSITE==101){
		?>
		<!-- Google Website Optimizer Tracking Script -->
		<script type="text/javascript">
		if(typeof(_gat)!='object')document.write('<sc'+'ript src="http'+
		(document.location.protocol=='https:'?'s://ssl':'://www')+
		'.google-analytics.com/ga.js"></sc'+'ript>')</script>
		<script type="text/javascript">
		try {
		var gwoTracker=_gat._getTracker("UA-1121531-7");
		gwoTracker._trackPageview("/2743409462/test");
		}catch(err){}</script>
		<!-- End of Google Website Optimizer Tracking Script -->
		
		<?php 
		
		}else{
		
		?>
		<!-- step 1 -> step2 -->
		<!-- Google Website Optimizer Tracking Script -->
		<script type="text/javascript">
		if(typeof(_gat)!='object')document.write('<sc'+'ript src="http'+
		(document.location.protocol=='https:'?'s://ssl':'://www')+
		'.google-analytics.com/ga.js"></sc'+'ript>')</script>
		<script type="text/javascript">
		try {
		var gwoTracker=_gat._getTracker("UA-1121531-7");
		gwoTracker._trackPageview("/2451790909/test");
		}catch(err){}</script>
		<!-- End of Google Website Optimizer Tracking Script -->
		
		<?php
		}}}
		
		
		$script_available= array(0=>'/step2b.php',1=>'/step3b.php',2=>'/step_check.php');

		if(scriptAvailable($script_available)){
			if(WEBSITE==101){
		?>
		<!-- Google Website Optimizer Conversion Script -->
		<script type="text/javascript">
		if(typeof(_gat)!='object')document.write('<sc'+'ript src="http'+
		(document.location.protocol=='https:'?'s://ssl':'://www')+
		'.google-analytics.com/ga.js"></sc'+'ript>')</script>
		<script type="text/javascript">
		try {
		var gwoTracker=_gat._getTracker("UA-1121531-7");
		gwoTracker._trackPageview("/2743409462/goal");
		}catch(err){}</script>
		<!-- End of Google Website Optimizer Conversion Script -->
		
		<?php }else{ ?>
		<!-- step 1 -> step 2 -->
		<!-- Google Website Optimizer Conversion Script -->
		<script type="text/javascript">
		if(typeof(_gat)!='object')document.write('<sc'+'ript src="http'+
		(document.location.protocol=='https:'?'s://ssl':'://www')+
		'.google-analytics.com/ga.js"></sc'+'ript>')</script>
		<script type="text/javascript">
		try {
		var gwoTracker=_gat._getTracker("UA-1121531-7");
		gwoTracker._trackPageview("/2451790909/goal");
		}catch(err){}</script>
		<!-- End of Google Website Optimizer Conversion Script -->
		
		<?php
		}}
				
	?>
</body>
</html>
