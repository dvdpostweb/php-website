<style>
.student_title {
font-size:32px;
text-align:left;
color:#FFFFFF;
font-family:Arial, Helvetica, sans-serif;
padding-top:10px;
padding-left:10px;

}
.student {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/artisane_movie/home.jpg' ;?>);
background-repeat:no-repeat;
background-color:#fef6dd;
}

#promo_code {
padding-top:370px;
font-size:14px;
line-height:19px;
font-family:Arial, Helvetica, sans-serif;
text-align:center;

}

.logo_student { 
padding-top: 20px;
text-align:right;
padding-right:70px;
}

</style>
<div class="main-holder">
<table width="773" height="473" border="0" cellpadding="0" cellspacing="0" bgcolor="fef6dd" align="center">
<form name="form1" method="post" action="activation_code_confirm.php">
	<tr class="student">
		<td width="773" height="500" valign="top"  >
				<p class="student_title"><?php echo TEXT_STUDENT_TOP ;?></p>
			  	<div id="promo_code">
	                <p class="logo_student"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/artisane_movie/halloween.gif' ;?>" /><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/artisane_movie/artisane.gif' ;?>" /></p>
                    <p><?php echo TEXT_STUDENT_EXPLAIN ;?></p>
	                <input name="code" id="code" type="text" class="inputs_codes" size="20" value="" size="18" onclick="form1.code.value='';"><input class="no_border_button" name="imageField" type="image" src="http://www.dvdpost.be/images/www3/languages/french/images/student/go.gif" width="32" height="25" align="absmiddle" border="0"><br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/artisane_movie/phone.gif' ;?>" />
                </div>
		</td>
	</tr>
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</table>        		
</div>