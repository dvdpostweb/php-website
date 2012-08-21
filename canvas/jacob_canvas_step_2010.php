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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta name="verify-v1" content="PQdsGfiSvfFZFXwp5ZRxDgw37x89LYLkoOy2X5uD7tY=" /> 
<meta name="verify-v1" content="Fh6utipb6BPbYsezoaWU0qwP+ODl0ioypAFfh41Qbu0=" />
<META NAME="description" content="<?php echo $meta_desc1 . $strmeta . TEXT_META_DESC2; ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/reset.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/main.css','.css'); ?>">


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

$script_available= array(0=>'/step1.php');

if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/question3.js?v=2"></script>
<script type="text/javascript" src="js/step1.js?v=2"></script>
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>


<?php
}
?>
<?php
$script_available= array(0=>'/step4.php');
if(scriptAvailable($script_available)){
?>
<script>
  select=8;
</script>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/question3.js?v=2"></script>
<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>
<?php
}

$script_available= array(0=>'/step3b.php');
if(scriptAvailable($script_available))
{
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
	var eda_label_ask_phone = '<?= TEXT_PHONE_INIT ?>';
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
  
<script type="text/javascript" src="http://ws.formular1.biz/server/js/eda_formular1.js?v=2"></script>
<link type="text/css" href="eda/formular1/eda_formular1.css" rel="stylesheet" />

<script type="text/javascript" src="js/step3_jquery.js"></script>
<script src="/js/default.js" type="text/javascript"></script>

<script>
  select=1;
</script>
<script type="text/javascript" src="js/question2.js?v=2"></script>
<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox.js?1276614285" type="text/javascript"></script>
<script src="/js/default.js" type="text/javascript"></script>
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
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>
<?php
}

$script_available= array(0=>'/step3c.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3c.js"></script>
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>
<?php
}
$script_available= array(0=>'/step3d.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3d.js"></script>
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>
<?php
}
$script_available= array(0=>'/how.php', 1=>'/how_public.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/how.js"></script>
<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
<script src="/js/facebox_proto.js" type="text/javascript"></script>
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
<body id="hp" class="normal" >
    <!--   ==============   HEADER   ==============   -->
		<?php require ('menu.php') ?>
    <div class="container clearfix">
	
			<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,0,$jacob)); ?>
    </div>
	</div>
				
  </div></div>
	<!-- footer -->
	<div id="footer">
		<div class="wrap">
	   	<ul>
		  	<li><a href="privacy.php" class="footer"><?= BOX_INFORMATION_PRIVACY ?></a></li>
			</ul>
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
			$customers_query = tep_db_query("select * from customers where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);

			$customers_registration_step = $customers['customers_registration_step'];
			$email_address =$customers['customers_email_address'];
			$url = 'http://www.dvdpost.be/belgie/conversion.php?campaignID=2946&productID=4211&conversionType=lead&https=0&transactionID='. $customers_id.'&email='.$email_address.'&descrMerchant='.$_GET['type'].'&descrAffiliate='.$_GET['type'];
			//tep_mail('gs@dvdpost.be','gs@dvdpost.be','conversion trade tracker',$customer_id.'.'.$url.'.step'.$customers_registration_step.'. ref'.$_SERVER['HTTP_REFERER'],'bugreport@dvdpost.be','bugreport@dvdpost.be');
			echo '<img src="'.$url.'" width="1" height="1" border="0" alt="" />';   
			
			?>
			<!-- trade tracker -->
			<!-- click tron -->
			<?php
			if($customers['activation_discount_code_id'] == 999){
			switch ($languages_id){
				case 1:
					echo '<iframe src="http://www.addiliate.com/report.html?cp=FAZ74G89&rId=[]" width="1" height="1"  frameBorder="0"></iframe>';
					break;
				case 2:
				case 3:
					echo '<iframe src="http://www.addiliate.com/report.html?cp=GN8FE94L&rId=[]" width="1" height="1"  frameBorder="0"></iframe>';
			}
			}
			?>
			<!-- click tron-->
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
