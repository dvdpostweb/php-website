<style type="text/css">
<!--
.St_white_subs {	font-family: Arial, Helvetica, sans-serif;color: #FFFFFF;font-weight: bold;font-size: 13px;}
.St_title_red_login {color: #D32F30;font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 16px;}

.St_white{	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}

.St_black{	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
	font-size: 14px;
}
.St_black_subs {	font-family: Arial, Helvetica, sans-serif;color: #000000;font-weight: bold;font-size: 13px;}

a.subs {font-family: Arial, Helvetica, sans-serif;font-size: 13px;color: #FFFFFF;font-weight: bold;}
a:link.subs {text-decoration:underline;}
a:visited.subs {text-decoration: underline;color: #FFFFFF;}
a:hover.subs {text-decoration: underline;color: #FFFFFF;}
a:active.subs {text-decoration: underline;color: #FFFFFF;}

a.st_forgot {font-family: Arial, Helvetica, sans-serif;font-size: 10px;color: #D32F30;}
-->
</style>
<br><br>
<?php 
if($user['cpt']==1){
?>
<table width="507" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="middle">
    <td width="39" height="30" rowspan="2"><span class="St_title_red_login"><img src="<?php echo DIR_WS_IMAGES;?>minilock.gif" align="absmiddle"></span></td>
    <td width="354" height="30" valign="bottom"><span class="St_title_red_login"><?php echo HEADING_TITLE; ?></span></td>
    <td width="117" rowspan="2">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td height="2"><img src="blank.gif" width="1" height="2"><img src="blank.gif" width="1" height="2"></td>
  </tr>
  <tr>
  	<?php    
		if (WEB_SITE_ID==15) {
			$tablecolor="#D3ECFF";
			}
		else {
			$tablecolor="#FFFFFF";
			}
		?> 
    <td height="20" colspan="3" bgcolor="<?php echo $tablecolor ;?>">		
		<table  align="center" width="400">
			<tr>
				<td class="step_title" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td width="150" class="step_title" align="left"><?php echo TEXT_EMAIL ;?></td>
				<td width="250" class="step_title" align="left"><b><?php echo $cust_email ;?></b></td>
			</tr>
			<tr>
				<td class="step_title" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="step_title" align="left"><?php echo TEXT_PASSWORD ;?></td>
				<td class="step_title" align="left"><b><?php echo $new_pass ;?></b></td>
			</tr>
			<tr>
				<td class="step_title" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="step_title" colspan="2" align="right">
					
					<a href="logas_client.php?customer=<?php echo $cust_id ;?>&email=<?php echo $cust_email ;?>&pass=<?php echo $new_pass ;?>"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES. $language ;?>/images/buttons/button_login_squared.jpg" alt="Sign In" title=" Sign In "  border="0"></a>
				</td>
			</tr>			
			<tr>
				<td class="step_title" colspan="2">&nbsp;</td>
			</tr>
        </table>
    </td>
  </tr>
  <tr>
  	<td colspan="3" height="25">&nbsp;</td>
  </tr>
</table>
<?php 
}
?>
<br>