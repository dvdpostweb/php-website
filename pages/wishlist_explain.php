<style>
.jah_title {
	font-family: Arial Black;
	font-size: 30px;
	color: #000000;
}
</style>
<table width="731" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="65" align="center" valign="middle" class="jah_title"><?php  echo HEADING_TITLE; ?></td>
  </tr>  
  <tr>
    <td class="limitedathome"><?php  echo TEXT_INFORMATION; ?></td>    
  </tr>
  <tr>
    <td align="center">
     <table width="574" border="0" cellspacing="0" cellpadding="0">
        	<tr> 
          		<td height="35">&nbsp;</td>
        	</tr>
			<tr>         		
	          	<td align="right">
	          		<table width="242" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
	              		<tr>
	                		<td width="50" height="40" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>wishlist/high.gif" width="31" height="31"></td>
	                		<td class="limitedathome"><?php  echo TEXT_HIGH ;?></td>
	              		</tr>
	              		<tr>
	                		<td width="50" height="40" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>wishlist/med.gif" width="31" height="31"></td>
	                		<td class="limitedathome"><?php  echo TEXT_MED ;?></td>
	              		</tr>
	              		<tr>
	                		<td width="50" height="40" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>wishlist/low.gif" width="31" height="31"></td>
	                		<td class="limitedathome"><?php  echo TEXT_LOW ;?></td>
	              		</tr>
				  		<tr>
	                		<td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>wishlist/bubble.gif"></td>
	             	 	</tr>
	            	</table>
	            </td>
        	</tr>			
			<tr> 
          		<td align="center">
          			<?php  
					switch($languages_id){
					case 1:			
						$wishlist_image="wishlist_FR.gif";
						$wishlist_button="switch_buttonFR.gif";
					break;
					case 2:
						$wishlist_image="wishlist_NL.gif";
						$wishlist_button="switch_buttonNL.gif";
					break;
					case 3:
						$wishlist_image="wishlist_EN.gif";
						$wishlist_button="switch_buttonEN.gif";
					break;
					}
					echo '<img src="'.DIR_WS_IMAGES.'wishlist/'.$wishlist_image.'">';
					?>          			
          		</td>
        	</tr>
        	<?php  if ($nob!=1){ ?>   	
        	<tr> 
          		<td height="80" valign="middle" align="center">
          			<?php            				
          				echo '<img src="'.DIR_WS_IMAGES.'wishlist/'.$wishlist_button.'" usemap="#Map" border="0">';
           			?>
          		</td>
        	</tr>
        	<?php   } ?>
        	<tr> 
          		<td>&nbsp;</td>
        	</tr>        	
      	</table>
      </td>         
  </tr>
  <tr> 
  	<td class="limitedathome"><b><u><?php  echo TEXT_FAQ_TITLE ;?><u></b></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr> 
  	<td class="limitedathome" height="15" align="left" valign="top"><b><?php  echo TEXT_FAQ_Q1 ;?></b></td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_R1 ;?></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr> 
  	<td class="limitedathome" height="15" align="left" valign="top"><b><?php  echo TEXT_FAQ_Q2 ;?></b></td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_R2 ;?></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr> 
  	<td class="limitedathome" height="15" align="left" valign="top"><b><?php  echo TEXT_FAQ_Q3 ;?></b></td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_R3 ;?></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr> 
  	<td class="limitedathome" height="15" align="left" valign="top"><b><?php  echo TEXT_FAQ_Q4 ;?></b></td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_R4 ;?></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr> 
  	<td class="limitedathome" height="15" align="left" valign="top"><b><?php  echo TEXT_FAQ_Q5 ;?></b></td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_R5 ;?></td>
  </tr>
  <tr> 
	<td height="20">&nbsp;</td>
  </tr>
  <tr>
  	<td class="limitedathome" height="20" align="left" valign="top"><?php  echo TEXT_FAQ_QUESTIONS ;?></td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="5,3,235,31" href="wishlist_switch_process.php">
</map>