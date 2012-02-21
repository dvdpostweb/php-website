<?php 

$link_freetrial="/default.php";
$banner='banner_trial.gif';
$timeout = 2;
$old = ini_set('default_socket_timeout', $timeout);
if($file_import = @fopen('http://www.lesoir.be/special/phptemplate/index_fullsize.php?partner=dvdpost', 'rb'))
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

//affichage du content
?>
<link rel="stylesheet" type="text/css" href="<?php echo  getBestMatchToIncludeAny('/stylesheet/public_lesoir.css?v=3','.css'); ?>">
	<div class="wrapper">
		<div class="page">
			<!-- center holder -->
			<div class="center-holder">
				<?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
			</div>
			<!-- header -->
			<div id="header_dvdpost">
				<!-- logotype -->
				<strong class="logo"><a href="/default.php">DVDPost.be</a></strong>
				<!-- main menu -->
				<ul class="menu">
					<li><a href="/default.php" <?= (($_SERVER['SCRIPT_NAME']=='/default.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU1 ;?></a></li>
					<li><a href="/how.php" <?= (($_SERVER['SCRIPT_NAME']=='/how.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU2 ;?></a></li>
					<li><a href="/catalog.php" <?= (($_SERVER['SCRIPT_NAME']=='/catalog.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU3 ;?></a></li>
					<li><a href="/contact.php" <?= (($_SERVER['SCRIPT_NAME']=='/contact.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU4 ;?></a></li>
					<!--<li class="last-item"><span><a href="/mydvdshop_public.php" <?= (($_SERVER['SCRIPT_NAME']=='/mydvdshop_public.php')?' class="active"':'') ?>><?php echo TEXT_TOPMENU5 ;?></a></span></li>-->

				</ul>
<?php 
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
		if (!tep_session_is_registered('customer_id')) {
			echo '<a href="/login.php" class="login">'.HEADER_TITLE_LOGIN.'</a>';
		} else {
		?>
            <a href="/logoff.php" target="_self" class="login"><?php  echo TEXT_MEMBER_LOGOFF;?></a>
         <?php
		}
?>
<ul class="top-nav">
	<li><a href ="/faq.php"><?php  echo TEXT_HELP ;?></a></li>				
<?php
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
?>
</ul>
			</div>
		</div>
	</div>
	<!-- footer -->
	<div id="footer_lesoir">
		<div class="footer-area">
			<div class="navbar">
				<h3><?php echo TITLE_QUICK_LINKS ;?></h3>
				<div class="quick-links">
					<ul class="column1">
						<li><strong><a href="/how.php?faq=7" class="black12pix"><?php echo TEXT_PRICE_ROOT ;?></a></strong></li>
						<li><a href="/how.php" class="black12pix"><?php echo TEXT_WHO_WE_ARE ;?></a></li>
						<li><a href="/privacy.php" class="black12pix"><?php echo TEXT_CONFIDENTIALITY ;?></a></li>
						<li><a href="/conditions.php" class="black12pix"><b><?php echo TEXT_CONDITION ;?></b></a></li>
					</ul>
					<ul class="column2">
						<li><a href="/login.php" class="black12pix"><?php echo HEADER_TITLE_LOGIN ;?></a></li>
						<li><a href="/contact.php" class="black12pix"><?php echo TEXT_CONTACT_US ;?></a></li>
                        <li><a href="/freetrial_info.php" class="black12pix"><?php echo TEXT_FREETRIAL ;?></a></li>
						<li><a href="/faq.php" class="black12pix"><b><?php echo TEXT_QUESTIONS ;?></b></li>
						<li><a href="/contest_public.php" class="black12pix"><?php echo TEXT_CONTEST ;?></a></li>
						<li><a href="/quizz_public.php" class="black12pix">Quizz</a></li>
                        <li><a href="http://insidedvdpost.blogspot.com/" class="black12pix" target="_blank">Blog</a></li>
					</ul>
				</div>
			</div>

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

//affichage du footer
echo $footer;
?>
