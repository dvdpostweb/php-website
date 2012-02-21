<style type="text/css">
.St_black_log {	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding-right:30px;
}

a.link_forget {
color:#D62C2E;
font-family: Arial, Helvetica, sans-serif;
font-size:11px;
text-decoration:underline;
}


</style>
      
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
		  		<td width="10" rowspan="3" valign="top"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="8" height="155"></td>
		  		<td width="490" height="20" valign="top">&nbsp;</td>
			</tr>
			<tr>
		  		<td valign="top">
		  			<table width="600" height="95" border="0" cellpadding="0" cellspacing="0">
                  		<tr>
	                    	<td height="20" colspan="4" align="center" valign="middle">&nbsp;</td>
                  		</tr>
                  		<tr>
			                <td width="151" height="20" align="right" class="St_black_log"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
			                <td  height="20" align="right"><?php echo tep_draw_input_field('email_address',((!empty($_GET['email']))?$_GET['email']:''),'size=35'); ?></td>
			                
		                </tr>  
		                <tr>
		                    <td height="20" colspan="2" align="right">&nbsp;</td>
		                </tr>
		                 <tr>
		                    <td width="151" height="20" align="right" class="St_black_log"><?php echo ENTRY_PASSWORD; ?></td>
		                    <td height="20" align="right"><?php echo tep_draw_password_field('password','','size=35'); ?></td>
		                 </tr>                  
               		</table>
				</td>
			</tr>
	
			<tr>
			<td align="right">
                <?php echo '<a  class="link_forget" href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?> 
           		<?php echo tep_image_submit('button_login_squared.gif', IMAGE_BUTTON_LOGIN); ?></td>
		  	</tr>
			<?php 
				if (isset($info_message)) {
					echo '<tr><td></td><td align="center"  class="St_black_log">'.$info_message.'</td></tr>' ; 
				}
			?>
		</table>
	</td>
	</tr>
</table>

