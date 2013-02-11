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

$script_available= array(0=>'/step2b.php');

if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/question3.js?v=2"></script>
<script type="text/javascript" src="js/step1.js?v=2"></script>
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
<script type="text/javascript" src="js/question.js?v=2"></script>
<link rel="stylesheet" type="text/css" href="/stylesheet/step_check.css">

<?php
}

$script_available= array(0=>'/step3b.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="js/step3.js"></script>
<script>
  select=1;
</script>

<script type="text/javascript" src="js/question.js?v=2"></script>
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
				<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,0,$jacob)); ?>
  </div>
	<!-- footer -->
	




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
