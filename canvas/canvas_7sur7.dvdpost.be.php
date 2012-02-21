<?php 
switch(WEB_SITE_ID)
  {
  case 3:
    $link_freetrial="/msn4dvd.php";
    break;
  case 4:
    $link_freetrial="/msn4dvd.php";
    break;
  default:
	$link_freetrial="/step1.php?activation_code=FREETEST2";
	break;
}

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


<table width="790" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_top_left.gif" width="16" height="15"></td>
    <td height="15" colspan="3" background="<?php  echo DIR_WS_IMAGES;?>/hln/hln_top.gif"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_top_right.gif" width="16" height="15"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_left.gif" width="16" height="64"></td>
    <td height="64" colspan="3" bgcolor="#FF9900"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="18%" align="center"><a href="http://www.7sur7.be"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/logo_7sur7.gif" width="134" height="64" border="0"></a></td>
        <td width="48%">&nbsp;</td>
        <td width="34%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/canal_fun.gif" width="134" height="64"></td>
      </tr>
    </table></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_right.gif" width="16" height="64"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_back_left.gif" width="16" height="15"></td>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_middle_left.gif" width="16" height="15"></td>
    <td width="685" background="<?php  echo DIR_WS_IMAGES;?>/hln/hln_middle.gif"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_middle_right.gif" width="16" height="15"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>/hln/hln_back_right.gif" width="16" height="15"></td>
  </tr>
  <tr>
    <td rowspan="2">&nbsp;</td>
    <td width="16" background="<?php  echo DIR_WS_IMAGES;?>/hln/dvdpost_part_left.gif">&nbsp;</td>
    <td>
			<table align="center">
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
								if ($current_page_name=='subscription2.php'){
									$bgcolor='#FFFFFF';
								}else{$bgcolor='#FCE9B3';}
							?>
						    <td colspan="2" bgcolor="<?php  echo $bgcolor;?>">
								<?php  require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
							</td>
						  </tr>
			            </table>
						<table name="espace_inferieur_vide_15px_height" width="726"  border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="15"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
							</tr>
						</table>
						<div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/nuancierborder.jpg" width="726" height="12"></div>
					</td>    	
				</tr>
			</table>	
	</td>
    <td width="16" background="<?php  echo DIR_WS_IMAGES;?>/hln/dvdpost_part_right.gif">&nbsp;</td>
    <td rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/dvdpost_part_back_left.gif" width="16" height="15"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>/hln/dvdpost_part_back.gif"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    <td width="16"><img src="<?php  echo DIR_WS_IMAGES;?>/hln/dvdpost_part_back_right.gif" width="16" height="15"></td>
  </tr>
</table>
<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
<!-- FIN DU CODE tracking -->
	
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
    
    <!-- Woopra Code Start -->
    <script type="text/javascript">
    var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
    document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <!-- Woopra Code End -->
</body>
</html>