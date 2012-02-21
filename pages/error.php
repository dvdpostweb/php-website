<?php 
if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<html><head>
<link rel="stylesheet" type="text/css" href="http://www.dvdpost.be/stylesheet/dvdpost_public.css">
<style>
#global {position: absolute;
	left: 50%;
	width: 400px;
	margin-top: 20px;
	margin-left: -200px;
	}
	
#header {	
	text-align:left;
	height: 60px;	
	}

#content {	
	text-align:left;
	padding:15px;
	border : 1px solid #FFFFFF;
	background-color:#C5C5C5;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height:22px;
	}	
	
.inputs_404 {	
	width:300px;
	border: 1px solid #FFFFFF;
	background-color:#DFC3C4;
	height :22px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	}


</style>
<title>Error <?=$code?></title>
</head><body class="public">
<div id="global">
	<div id="header">
		<a href="default.php"><img src="/images/404/logo_404.png" border="0"></a>
	</div>
	<div id="content">
		<h1><?php echo TEXT_OOOPS ;?></h1>
		<p>
			<?php echo str_replace('[link]','http://'.$host.'/',TEXT_EXPLAIN_PROMO_OOOPS) ;?>
		</p>
		<form name="form1" method="post" action="activation_code_confirm.php">
			<table align="center">
				<tr>
	                <td><input name="code" id="code" class="inputs_404" value="OOOPS" size="20" onclick="form1.code.value='';" type="text"></td>
	                <td valign="middle"><input class="no_border_button" name="imageField" src="http://www.dvdpost.be/images/www3/canvas/go_trial.gif" border="0" height="22" type="image" width="48"></td>
	            </tr>
			</table>
		</form>
	</div>
</div>

<!-- Google Analytics tag -->
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-1121531-1");
		pageTracker._trackPageview();
		</script>
		
		
      <!-- Woopra Code Start -->

      <script type="text/javascript">
      var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
      document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
      <!-- Woopra Code End -->

 		<!-- Google Analytics tag -->

</body></html>