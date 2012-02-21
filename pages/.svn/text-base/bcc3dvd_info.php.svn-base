<style type="text/css">
<!--
.DVDP_l1 {
	color: #990000;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.DVDP_l2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 14px;
}
.DVDP_l3 {
	color: #990000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.DVDP_l4 {color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }

.INPUT {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	height:20px ; width: 250px ;
}
a.login_links {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
}
a.login_links:visited {
	color: #000000;
}
a.login_links:hover {
	color: #000000;
}
a.login_links:active {
	color: #000000;
}
-->
</style>
</head>

<body>
<table width="729" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#0D0D0D">
		<?php  
		switch($languages_id){
		case 1:
			$img_slogan="slogan-login.gif";
		break;
		case 2:
			$img_slogan="slogan-loginNL.gif";
		break;
		case 3:
			$img_slogan="slogan-loginEN.gif";
		break;
		}
		?> 
   
    <td colspan="2" scope="col"><img src="<?php  echo DIR_WS_IMAGES ;?>bcc3dvd/<?php  echo $img_slogan ;?>" width="729" height="203"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#0D0D0D" scope="row"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
      <tr>
        <td height="30" scope="col"><div align="left" class="DVDP_l2"><img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="6" height="6"><?php  echo BOX_HEADING_PROMO_ACTIVATION ;?></div></td>
      </tr>
      <tr>
        <td height="40" align="center" class="TYPO_ROUGE_ITALIQUE"><?php  echo BOX_HEADING_CUST_LOGIN ;?></td>
      </tr>
      <tr>
      	<form name="login" method="post" action="<?php  echo tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL'); ?>">
        <td align="center" scope="row">		
			<table style="margin-top:5px;padding:1px;" border="0">
				<tr>
					<td align="left" class="DVDP_l4">Email </td>
					<td><input type="text" name="email_address"  value="" class="INPUT"></td>
				</tr>
				<tr>
					<td align="left" class="DVDP_l4">Pass </td>
					<td><input type="password" name="password"  value="" class="INPUT"></td>
				</tr>
			</table>
			<br>
			<?php  echo tep_image_submit('button_confirm_update.gif', BOX_HEADING_DIRECTACCESS) ;?>
			<br>
			<hr>
			<span  class="TYPO_ROUGE_ITALIQUE"><?php  echo BOX_HEADING_CUST_NOT_LOGGED ;?></span><br>
			<span  class="DVDP_l4"><?php  echo BOX_HEADING_CREATE_ACCOUNT ;?></span>
		</td>
		</form>
      </tr>
      <tr>
        <td scope="row">&nbsp;</td>
      </tr>      
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#0D0D0D" scope="row">&nbsp;</td>
  </tr>
</table>
