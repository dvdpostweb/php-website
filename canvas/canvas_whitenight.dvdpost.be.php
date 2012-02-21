<?php 

	$link_freetrial="/step1.php?activation_code=FREETEST2";

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
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/stylesheet.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/basic.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/new.css','.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php  echo getBestMatchToIncludeAny('/stylesheet/ibox.css','.css'); ?>">
<script type="text/javascript" src="/js/ibox.js"></script>
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
<?php  require('canvas/header/'.SITE_ID . '/header.php'); ?> 
	  <table width="731" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="FFFFFF">
        <tr>
			<td valign="top" align="center">
			<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_1.php')); ?>
            <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/menu_2.php')); ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
	            <tr>
				  <td colspan="2" align="right" bgcolor="#FCE9B3" align="center">
				  		<?php 
				  		if ($current_page_name=='subscription2.php' || $current_page_name=='default.php' || $current_page_name=='how.php'){ 
				  			if ($show_freetrial==1 ){ ?>
				  			<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
				  				<tr>
				  				 <td align="center">
				  				 	<table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
						              <tr>
						                <td height="30" align="left" valign="middle" class="TYPO_PROMO">
						                		<?php  echo TEXT_SUBSCRIBE_NOW_AND_RECEIVE_FIRST ;?>
						                </td>						
						              </tr>
				            		</table>
				  				 </td>
				  				 <td>
				  					<table width="349" border="0" align="right" cellpadding="0" cellspacing="0">
						              <tr>
						                <td width="164" height="30" align="left" valign="middle" class="TYPO_PROMO">
						                	<div align="right">
						                		<?php  echo TEXT_GOT_A_PROMO_CODE ;?>
						                	</div>
						                </td>
										<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php')); ?>
						              </tr>
				            		</table>
				            	 </td>
				            	</tr>
				            </table>
				            	 
				            	 
				        <?php }else{?>
					        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
				              <tr>
				              	<td>&nbsp;</td>
				                <td width="164" height="30" align="left" valign="middle" class="TYPO_PROMO">
				                	<div align="right">
				                		<?php  echo TEXT_GOT_A_PROMO_CODE ;?>
				                	</div>
				                </td>
								<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/form_activation_code.php')); ?>
				              </tr>
				            </table>        
					    <?php  } 
					    }else{echo '&nbsp;';}?>
				  	</td>
				  </tr>
				  <tr> 
				    <?php 
				    	switch ($current_page_name){
					    	case 'subscription2.php':
					    		$bgcolor='#FFFFFF';
					    		break;
					    	case 'default.php': 
					    		$bgcolor='#000000';
					    		break;
					    	default: 
					    		$bgcolor='#FCE9B3';
					    		break;					    	
					    	}
					?>
				    <td colspan="2" bgcolor="<?php  echo $bgcolor;?>" align="center">
						<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
				  </tr>
	            </table>
				<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/whitenight/nuancierborder_whitenight.gif" width="786" height="12"><br>                				
            </div></td>
        </tr>
  </table>
  <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
</div>
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>