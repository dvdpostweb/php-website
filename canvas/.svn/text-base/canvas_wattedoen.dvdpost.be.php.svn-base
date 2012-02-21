
<?php   
switch(WEB_SITE_ID)
  {
  case 3:
    $link_freetrial="/step1.php?activation_code=MSN4DVD";
    break;
  case 4:
    $link_freetrial="/step1.php?activation_code=MSN4DVD";
    break;
  case 26:
    $link_freetrial="/step1.php?activation_code=BL4DVD";
    break;
  case 32:
    $link_freetrial="/step1.php?activation_code=WTD4DVD";
    break;  
  case 33:
    $link_freetrial="/step1.php?activation_code=QF4DVD";
    break;  
  default:
	$link_freetrial="/step1.php?activation_code=FREETEST2";
	break;
}

?>
<?php   require('canvas/header/'.SITE_ID . '/header.php'); ?>
	 <table width="<?php  echo SITE_WIDTH_PUBLIC ;?>" align="right" border="0" cellpadding="0" cellspacing="0" ; >
	     <tr> 
    		<td width="60%">&nbsp;</td>
    		<td width="40%" align="right" valign="top" class="yellowlink">
				<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_1.php')); ?>
			</td>
  		</tr>
  		<tr> 
    		<td colspan="2">
    			<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/header/public_menu_2.php')); ?>
			</td>
  		</tr>
  		
  <tr>
	<td  colspan="2" valign="top" align="center">				
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr> 					
    				<td class="public_bckg" align="center">
    					
						<?php   require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
				  </tr>
				  <tr> 
				  	<?php  if ($page_body_to_include=='default.php'){
					    $img_footer= DIR_WS_IMAGES.'canvas/bottom_default.png';
					}else{$img_footer= DIR_WS_IMAGES.'canvas/bottom_default2.png';}
					?>
				    <td colspan="2"><img src="<?php  echo $img_footer ;?>" width="773"><br></td>
				  </tr>
	            </table>
                <?php    include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/footer/footer.php')); ?>
            </td>
        </tr>
      </table>
      
      <!-- Woopra Code Start -->
      <script type="text/javascript">
      var _wh = ((document.location.protocol=='https:') ? "https://sec1.woopra.com" : "http://static.woopra.com");
      document.write(unescape("%3Cscript src='" + _wh + "/js/woopra.js' type='text/javascript'%3E%3C/script%3E"));
      </script>
      <!-- Woopra Code End -->
<?php   require('canvas/footer/'.SITE_ID . '/footer.php'); ?> 