<style type="text/css">
<!--
.St_white_subs {	font-family: Arial, Helvetica, sans-serif;color: #FFFFFF;font-weight: bold;font-size: 13px;}
.St_title_red_login {color: #D32F30;font-family: Arial, Helvetica, sans-serif;font-weight: bold;font-size: 16px;}

.St_white{	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}
a.subs {font-family: Arial, Helvetica, sans-serif;font-size: 13px;color: #FFFFFF;font-weight: bold;}
a:link.subs {text-decoration:underline;}
a:visited.subs {text-decoration: underline;color: #FFFFFF;}
a:hover.subs {text-decoration: underline;color: #FFFFFF;}
a:active.subs {text-decoration: underline;color: #FFFFFF;}

a.st_forgot {font-family: Arial, Helvetica, sans-serif;font-size: 10px;color: #D32F30;}
-->
</style>
<br><br>
<table width="507" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="middle">
    <td width="39" height="30" rowspan="2"><span class="St_title_red_login"><img src="<?php  echo DIR_WS_IMAGES;?>minilock.gif" align="absmiddle"></span></td>
    <td width="354" height="30" valign="bottom"><span class="St_title_red_login"><?php  echo HEADING_TITLE; ?></span></td>
    <td width="117" rowspan="2">&nbsp;</td>
  </tr>
  <tr valign="middle">
    <td height="2"><img src="blank.gif" width="1" height="2"><img src="blank.gif" width="1" height="2"></td>
  </tr>
  <tr>
    <td height="20" colspan="3"><span class="SLOGAN_DETAIL">
    <?php 
  		if ($HTTP_GET_VARS['login'] == 'fail') {
    		$info_message = TEXT_LOGIN_ERROR;
			//var used on login_form.php
  		}
   		echo tep_draw_form('login', tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL')); 
        
		if (WEB_SITE_ID==15) {
			$tablecolor="#D3ECFF";
			}
		else {
			$tablecolor="#E3E3E3";
			}
        include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/login/login_form.php'));
         ?>
    </span></td>
  </tr>
  <tr>
  	<td colspan="3" height="25">&nbsp;</td>
  </tr>  
</table>
<br>