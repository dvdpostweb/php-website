
<?php   


	$link_freetrial="/default.php";
	

if(${"REMOTE_ADDR"}== ADMINIP){
	echo '<a href="'. $translation_bo_url . '" target=new>edit text</a>';	
}
?>
<?php   require('canvas/header/'.SITE_ID . '/msn_doctype.php'); ?> 
<?php   require('canvas/header/'.SITE_ID . '/headermsnnl9.php'); ?>	
	  <table width="773" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="CC0000" >
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
    				<td <td class="public_bckg" align="center">
						<?php   require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/' .  $page_body_to_include)); ?>
					</td>
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
<?php   require('canvas/footer/'.SITE_ID . '/footermsnnl9.php'); ?>