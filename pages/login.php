
<div class="main-holder">
<br><br>
<table width="930" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr valign="middle">
    <td><h1><?php  echo HEADING_TITLE; ?></h1></td>
  </tr>
  <tr valign="middle">
    <td height="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></td>
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
			$tablecolor="#FFFFFF";
			}
        include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/login/login_form.php'));
         ?>
    </span></td>
  </tr>
  <tr>
  	<td colspan="3" height="25">&nbsp;</td>
  </tr>
  <?php // include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/login/register_button.php'));?>

</table>
<br>
</div>