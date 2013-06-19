<?
require_once 'authentification2/src/authentification.php';
require_once 'authentification2/examples/example_public.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  lang="<?= $lang_short ?>" xml:lang="<?= $lang_short ?>">
<head>
<?php
	$meta1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,$meta1);
	$meta_desc1 = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_META_DESC1);
		
	if (strlen($meta1)>1)
	{
		echo '<title>'.$meta1 . $strmeta . TEXT_META_TITLE2 .'</title>';
	}
	else 
	{
		
		$title=((defined(TEXT_META_TITLE1))?TEXT_META_TITLE1:TEXT_META_TITLE_ROOT);
		echo '<title>'.$strmeta.' - '. $title .  TEXT_META_TITLE2 .'</title>';
	}
	?>
	
<META NAME="description" content="<?php echo   ((!empty($strdescription))?$strdescription:$strmeta.' - '.$meta_desc1 . TEXT_META_DESC2); ?>">
<META NAME="keywords" content="<?php echo TEXT_META_KEYWORDS; ?>">
<META name="y_key" content="6dad1b79d5decc74" >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Language" content="<?php echo TEXT_META_LANGUAGE; ?>">
<meta name="author" content ="Home Entertainment Services">
<meta name="Revisit-after" content="14 days">
<meta name="Robots" content="all">
<LINK REL="SHORTCUT ICON" href="<?php echo DIR_WS_IMAGES;?>/favicon.ico"> 
	
<?php
$script_available= array(0=>'/product_info_public.php');
if(scriptAvailable($script_available)){
?>
<script type="text/javascript" src="/js/prototype-1.6.0.3.js"></script>
<script type="text/javascript" src="/js/TheFilterCaptureService.js"></script>
<script type="text/javascript" src="/js/filterCapture.js.php?page=product_info_public.php&products_id=<?= $_GET['products_id']?>"></script>
<meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'].$constants['DIR_DVD_WS_IMAGES'].$meta_value['products_image_big'] ?>"/> 
<meta property="og:title" content="<?= $strtitle ?>">
<meta property="og:type" content="movie"/>
<meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?products_id='.$_GET['products_id'] ?>"/>
<meta property="og:site_name" content="DVDPost"/>
<meta property="fb:admins" content="542538810,586983921"/>
<meta property="og:description" content="<?= $strdescription ?>" />
<?php
}
?>
<?php
$script_available= array(0=>'/contact.php');
if(scriptAvailable($script_available)){
?>
<link href="http://www.brandialog.com/stylesheets/widget_button.css" media="screen" rel="stylesheet" type="text/css" />
<?php
}
?>
<?php
$script_available= array(0=>'/default.php');
if(scriptAvailable($script_available)){
?>
	<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />
	<script src="/js/jquery-1.4.2.min.js?1276614285" type="text/javascript"></script>
  <script src="/js/facebox.js?1276614285" type="text/javascript"></script>
  <script src="/js/default.js" type="text/javascript"></script>

<?php
}
?>

<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/public_2009.css?v=6','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>

<script type="text/javascript" src="/js/main.js"></script>

	<!--[if lt IE 7]><link rel="stylesheet" type="text/css" href="/stylesheet/ie6.css" media="screen"/><![endif]-->

</head>
<body>
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

if(WEB_SITE_ID!=101 && WEB_SITE_ID!=1)
{
	$page= array(0=>'/default.php');
	if(scriptAvailable($page)){
		echo '<meta name="ROBOTS" content="NOINDEX,NOFOLLOW">';
	}	
}
$page= array(0=>'/product_info_public.php');
if(scriptAvailable($page)){
	echo '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>';
}	

if(${"REMOTE_ADDR"}== ADMINIP || $host== 'www'|| $host== 'localhost'){
        echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';
}
?>

	<div class="wrapper">
		<?
		if($_SERVER['SERVER_NAME'] == 'tryus.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'tryusagain.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'cinefriends.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'ptg.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'ptg.dvdpost.be')
		{
			if (isset($_GET['email_address'])){

				$email_address=$_GET['email_address'];

			}else{
				$email_address=$_POST['email_address'];
			}
			if (isset($_GET['code']))
				$code=$_GET['code'];
			else
				$code=$_POST['code'];
			if (isset($_GET['force']))
				$force=$_GET['force'];
			else
				$force=$_POST['force'];

			echo '<style>#background{background: none !important} body {background: #191E24 !important}
			.f-btn {
			  display: block;
			  text-indent: -999em;
			  outline: none;
			}</style>';
			if($page_body_to_include == 'login_code.php'){
			echo '
			<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/images/relance012012/style.css" />
			<!--   ==============   HEADER   ==============   -->
		  <div id="header_relance" >
		    <h1> <a href="http://www.dvdpost.be" class="f-btn" style="">DVDPost - Online DVD rental</a> </h1>
		    <div class="relancetopnav">
		      <ul class="top-nav">
		        <li class="retractation"><a href="/conditions.php">'.TEXT_RETRA.'</a></li>
		        <li class="langues '.($languages_id == 1 ? "selected" : "") .'"><a href="?language=fr&email='.$email.'&code='.$code.'&force='.$force.'">FR</a></li>
		        <li class="langues '.($languages_id == 2 ? "selected" : "" ).'"><a href="?language=nl&email='.$email.'&code='.$code.'&force='.$force.'">NL</a></li>
		        <li class="langues '.($languages_id == 3 ? "selected" : "" ).'"><a href="?language=en&email='.$email.'&code='.$code.'&force='.$force.'">EN</a> </li>
		      </ul>
		      <div style="clear:both;"></div>
		    </div>
		  </div>
		  <!--   ==============   END HEADER   ==============   -->';
		}
		}
		?>
		<? if ($_SERVER['SERVER_NAME'] != 'lavenir.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryus.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryusagain.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'cinefriends.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'ptg.dvdpost.be'){ ?>
		<div class="page <?= (($page_body_to_include == 'default.php' && (strpos($_SERVER['SERVER_NAME'],'www')===0 || $host== 'localhost')) ? '' : 'old') ?>">
		<? }?>
			<!-- center holder -->
			<?php if($page_body_to_include == 'default.php' && (strpos($_SERVER['SERVER_NAME'],'www')===0 || $host== 'localhost')) { ?>
				<div id="header">
					<!-- logotype -->
					<strong class=""><a href="/default.php">DVDPost.be</a></strong> <span>All the film emotions you want, whenever you want! </span>
					<!-- main menu -->
					<ul class="top-nav">
						<li><a href ="/faq_public.php"><Aide><?= TEXT_HELP ?></a></li>
						<?	include_once(DIR_WS_INCLUDES . 'functions/language_switcher.php'); ?>
						<?php
								//switch($languages_id){
								if(count($lang_available)==0)
									$lang_available=array(1=>'FR',2=>'NL',3=>'EN');	
								if(WEB_SITE_ID==101)
									$lang_available=array();
								echo '<li>';
								$first=true;
								foreach($lang_available as $key =>$value)
								{
									if($key!=$languages_id){
										if($first==false)
										{
											echo ' - ';
										}
										if(!empty($_SERVER['REDIRECT_URL']) && (preg_match('/^\/fr\//',$_SERVER['REDIRECT_URL'],$match) || preg_match('/^\/nl\//',$_SERVER['REDIRECT_URL'],$match) || preg_match('/^\/en\//',$_SERVER['REDIRECT_URL'],$match)))
										{
											$uri=$_SERVER['REDIRECT_URL'];
											if(strpos($uri,'/films/')!==false ||  strpos($uri,'/movies/')!==false)
												echo '<a href="' . language_switcher_movie($uri,'', strtolower($value)) . '">'.$value.'</a> ';

											else if(strpos($uri,'/categories/')!==false ||  strpos($uri,'/categorien/')!==false)
											{
													echo '<a href="' . language_switcher_cat($_GET['cPath'],$_GET['list'], strtolower($value)) . '">'.$value.'</a> ';
											}
											else if(strpos($uri,'/acteurs/')!==false ||  strpos($uri,'/actors/')!==false)
											{
													echo '<a href="' . language_switcher_actors($uri,remove_get($_GET,array('language','actors_id')), strtolower($value)) . '">'.$value.'</a> ';
											}
											else
											{
													echo '<a href="' . language_switcher_directors($uri,remove_get($_GET, array('language','directors_id')), strtolower($value)) . '">'.$value.'</a> ';
											}

										}
										else
										{
												$uri=$_SERVER['PHP_SELF'];
												echo '<a href="' . language_switcher($uri,$QUERY_STRING, 'language='.strtolower($value)) . '">'.$value.'</a> ';
										}


										$first=false;
									}
								}
								echo '</li>';
								?>
						<li><?= TEXT_ALREADY ?> <a href="/login.php" class="login"><?= TEXT_LOGIN_BTN ?></a></li>
					</ul>
					<!-- header -->
				</div>
			<?php }		?>
			<div class="center-holder">

				<?php 
					if($_GET['debug']==1)
					{
						getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,$_GET['debug']);
					}
					if(!empty($page_body_to_include))
					{
						require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include,0,$jacob)); 
					}	
					else if(!empty($content))
						echo $content;
				?>
			</div>
			<!-- header -->
			
			<? 
			if ($_SERVER['SERVER_NAME'] != 'lavenir.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryus.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryusagain.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'cinefriends.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'ptg.dvdpost.be'){
			if($page_body_to_include != 'default.php' || strpos($_SERVER['HTTP_HOST'],'www')===false ) 
			   {
			?>
			<div id="header" class="old">
				<!-- logotype -->
				<strong class="logo old"><a href="/default.php">DVDPost.be</a></strong>
				<?php
				if(WEB_SITE_ID==101)
				{
					echo "<div id='logo_slogan'>".SLOGAN."</div>";
				}
				if(!empty($_GET['activation_code'])){
					
					$sql='SELECT *
					FROM `discount_code`
					WHERE `discount_code` = "'.$_GET['activation_code'].'"';
					$discount_query = tep_db_query($sql);

					$result = tep_db_fetch_array($discount_query);
					$img='images/www3/partners/'.$result['group_id'].'/logo.gif';
					if(is_file($img))
						echo "<div style='margin:25px 0 0 325px'><img src='".$img."'></div>";
				}
				?>
				<!-- main menu -->
				<ul class="menu">
					<li><a href="/default.php" <?= (($_SERVER['SCRIPT_NAME']=='/default.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU1 ;?></a></li>
					<li><a href="/how.php" <?= (($_SERVER['SCRIPT_NAME']=='/how.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU2 ;?></a></li>
					<li><a href="/catalog.php" <?= (($_SERVER['SCRIPT_NAME']=='/catalog.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU3 ;?></a></li>
					<li><a href="/contact.php" <?= (($_SERVER['SCRIPT_NAME']=='/contact.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU4 ;?></a></li>
                    
					<?
					if(WEB_SITE!='nl' && 1==0)
					{
					?>
						<li class="last-item"><span><a href="/mydvdshop_public.php" <?= (($_SERVER['SCRIPT_NAME']=='/mydvdshop_public.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU5 ;?></a></span></li> <?
					}
					?>

				</ul>
<?php 
	include_once(DIR_WS_INCLUDES . 'functions/language_switcher.php');
			echo '<a href="/login.php" class="login2">'.HEADER_TITLE_LOGIN.'</a>';
		
?>
<ul class="top-nav">
	<li><a href ="/faq_public.php"><?php  echo TEXT_HELP ;?></a></li>				
<?php
		//switch($languages_id){
		if(count($lang_available)==0)
			$lang_available=array(1=>'FR',2=>'NL',3=>'EN');	
		if(WEB_SITE_ID==101)
			$lang_available=array();
		echo '<li>';
		$first=true;
		foreach($lang_available as $key =>$value)
		{
			if($key!=$languages_id){
				if($first==false)
				{
					echo ' - ';
				}
				if(!empty($_SERVER['REDIRECT_URL']) && (preg_match('/^\/fr\//',$_SERVER['REDIRECT_URL'],$match) || preg_match('/^\/nl\//',$_SERVER['REDIRECT_URL'],$match) || preg_match('/^\/en\//',$_SERVER['REDIRECT_URL'],$match)))
				{
					$uri=$_SERVER['REDIRECT_URL'];
					if(strpos($uri,'/films/')!==false ||  strpos($uri,'/movies/')!==false)
						echo '<a href="' . language_switcher_movie($uri,'', strtolower($value)) . '">'.$value.'</a> ';
					
					else if(strpos($uri,'/categories/')!==false ||  strpos($uri,'/categorien/')!==false)
					{
							echo '<a href="' . language_switcher_cat($_GET['cPath'],$_GET['list'], strtolower($value)) . '">'.$value.'</a> ';
					}
					else if(strpos($uri,'/acteurs/')!==false ||  strpos($uri,'/actors/')!==false)
					{
							echo '<a href="' . language_switcher_actors($uri,remove_get($_GET,array('language','actors_id')), strtolower($value)) . '">'.$value.'</a> ';
					}
					else
					{
							echo '<a href="' . language_switcher_directors($uri,remove_get($_GET, array('language','directors_id')), strtolower($value)) . '">'.$value.'</a> ';
					}
					
				}
				else
				{
						$uri=$_SERVER['PHP_SELF'];
						echo '<a href="' . language_switcher($uri,$QUERY_STRING, 'language='.strtolower($value)) . '">'.$value.'</a> ';
				}
				
				
				$first=false;
			}
		}
		echo '</li>';
			
?>
</ul>
			</div>
			<? }} ?>
		</div>
	</div>
    </div>
	<!-- footer -->
	<? if ($_SERVER['SERVER_NAME'] != 'lavenir.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryus.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'tryusagain.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'cinefriends.dvdpost.be' && $_SERVER['SERVER_NAME'] != 'ptg.dvdpost.be'){ ?>
	<div id="footer">
		<div class="footer-area">
			<div class="navbar">
				<h3><?php echo TITLE_QUICK_LINKS ;?></h3>
				<div class="quick-links">
					<ul class="column1">
						<li><strong><a href="/how.php?faq=7" class="black12pix"><?php echo TEXT_PRICE_ROOT ;?></a></strong></li>
						<li><a href="/how.php" class="black12pix"><?php echo TEXT_WHO_WE_ARE ;?></a></li>
						<li><a href="/presse_public.php" class="black12pix"><?php echo TEXT_PRESS ;?></a></li>
						<li><a href="/privacy_public.php" class="black12pix"><?php echo TEXT_CONFIDENTIALITY ;?></a></li>
						<li><a href="/conditions.php" class="black12pix"><b><?php echo TEXT_CONDITION ;?></b></a></li>
						<!--<li><a href="/jobs.php" class="black12pix"><b>Jobs</b></a></li>-->
					</ul>
					<ul class="column2">
						<li><a href="/login.php" class="black12pix"><?php echo HEADER_TITLE_LOGIN ;?></a></li>
						<li><a href="/contact.php" class="black12pix"><?php echo TEXT_CONTACT_US ;?></a></li>
                        <li><a href="/freetrial_info.php" class="black12pix"><?php echo TEXT_FREETRIAL ;?></a></li>
						<li><a href="/faq_public.php" class="black12pix"><b><?php echo TEXT_QUESTIONS ;?></b></li>
						<li><a href="/contest_public.php" class="black12pix"><?php echo TEXT_CONTEST ;?></a></li>
						<li><a href="/quizz_public.php" class="black12pix">Quizz</a></li>
                        <li><a href="http://insidedvdpost.blogspot.com/" class="black12pix" target="_blank">Blog</a></li>
					</ul>
				</div>
			</div>
            <?php
            if(strpos($_SERVER['SERVER_NAME'],'www')===0 && empty($_GET['activation_code']) ){
            ?>
					<?php
						$script_available= array(0=>'/default.php');
						if(scriptAvailable($script_available)){
							?>
							
							<div class="facebook">
								<h3><?php echo TITLE_FACEBOOK ;?></h3>
							<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fdvdpost&amp;width=515&amp;colorscheme=light&amp;connections=9&amp;stream=false&amp;header=false&amp;height=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:515px; height:165px; background-color: #fff;"></iframe>
							</div>
						<?php
						}else{
						?>

			<div class="other-logos">
				
				<h3><?php echo TITLE_PARTENAIRES ;?></h3>
				<ul>
					<li><a href="http://www.bcc.be/index_bcc.jsp " target="_blank"><img alt="" src="/images/logo_partenaires/logo_bcc.gif" /></a></li>
					<li><a href="http://www.rtltvi.be/" target="_blank"><img alt="" src="/images/logo_partenaires/logo-rtl.gif" /></a></li>
					<li><a href="http://www.cinenews.be/" target="_blank"><img alt="" src="/images/logo_partenaires/logo-cinenews.gif" /></a></li>
					<li><a href="http://www.loreal.com" target="_blank"><img alt="" src="/images/logo_partenaires/logo-loreal.gif" /></a></li>
					<li><a href="http://www.levif.be" target="_blank"><img alt="" src="/images/logo_partenaires/logo-vif.gif" /></a></li>
					<li><a href="http://www.levif.be" target="_blank"><img alt="" src="/images/logo_partenaires/logo-lesoir.gif" /></a></li>
                    <li><a href="http://www.krefel.be" target="_blank"><img alt="" src="/images/logo_partenaires/logo_krefel.gif" /></a></li>
					<li><a href="http://www.nostalgie.be/" target="_blank"><img alt="" src="/images/logo_partenaires/logo_nostalgie.gif" /></a></li>
                    <li><a href="http://www.philips.be " target="_blank"><img alt="" src="/images/logo_partenaires/logo_philips.gif" /></a></li>
				</ul>
			</div>
            <?php
        	}}}
            ?>
		</div>
	</div>

	<!-- Google Analytics tag -->
	<?php
	switch (WEB_SITE_ID){
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
	$script_available= array(0 => '/default.php', 1 => '/how.php', 2 => '/catalog.php', 3 => '/contact.php');
	if(scriptAvailable($script_available)){
		switch($languages_id)
		{
			case 1:
		?>
		<!-- Google Code for Visitors public Remarketing List -->
		<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 1033549176;
		var google_conversion_language = "en";
		var google_conversion_format = "3";
		var google_conversion_color = "666666";
		var google_conversion_label = "ost4CODU1gEQ-Orq7AM";
		var google_conversion_value = 0;
		/* ]]> */
		</script>
		<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
		</script>
		<noscript>
		<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1033549176/?label=ost4CODU1gEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
		</div>
		</noscript>
		
		<?php
			break;
			case 2:
			?>
			<!-- Google Code for Visitors public NL Remarketing List -->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = 1033549176;
			var google_conversion_language = "en";
			var google_conversion_format = "3";
			var google_conversion_color = "666666";
			var google_conversion_label = "GlvaCMj11gEQ-Orq7AM";
			var google_conversion_value = 0;
			/* ]]> */
			</script>
			<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1033549176/?label=GlvaCMj11gEQ-Orq7AM&amp;guid=ON&amp;script=0"/>
			</div>
			</noscript>
			
			<?php
			break;
		}
	}
	?>
</body>
</html>
