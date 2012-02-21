<style>

.welcome {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/welcome/home.jpg' ;?>);
background-repeat:no-repeat;
background-color:#ffffff;
}

#promo_code {
font-size:14px;
line-height:19px;
font-family:Arial, Helvetica, sans-serif;
text-align:center;
margin-bottom:20px;

}
#cinenews_dvd { 
text-align:center;
}


</style>
<div class="main-holder">

<form name="form1" method="post" action="activation_code_confirm.php">

	<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/welcome/home.jpg"></div>
			  	
                <div id="promo_code">

                    <p><?php echo TEXT_STUDENT_EXPLAIN ;?></p>
	                <input name="code" id="code" type="text" class="inputs_codes" size="20" value="" size="18" onclick="form1.code.value='';">&nbsp;<input class="no_border_button" name="imageField" type="image" src="http://www.dvdpost.be/images/www3/languages/french/images/ptg/go.gif" width="69" height="21" align="absmiddle" border="0"><br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/welcome/phone.gif' ;?>" />
                </div>
		</td>
	</tr>
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
 </div>
