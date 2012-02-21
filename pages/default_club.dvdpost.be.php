<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/club/home.jpg' ;?>);
background-repeat: no-repeat;
background-color:#ffffff;



}

#promocode {
font-size:14px;
line-height:19px;
font-family:Arial, Helvetica, sans-serif;
text-align:center;
margin-bottom:20px;
}

#cinenews_dvd { 
text-align:center;
}

.footer_actu {
font-size:9px;
font-family:Arial, Helvetica, sans-serif;
}
.other-logos
{
	display:none;
}


</style>
<div class="main-holder">
<form name="form1" method="post" action="activation_code_confirm.php">
	
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/club/home.jpg"></div>
			  	<div id="promocode">
                <p>Activez ci-dessous votre abonnement gratuit en introduisant <br />votre code-promotion <font color="#CC0000"><strong>CLUB4DVD</strong></font> ci-dessous:</p>
                    
                  <input name="code" id="code" type="text" class="inputs_codes" size="20" value="CLUB4DVD" size="18" onclick="form1.code.value='';">&nbsp;<input class="no_border_button" name="imageField" type="image" src="http://www.dvdpost.be/images/www3/languages/french/images/ptg/go.gif" width="69" height="21" align="absmiddle" border="0"><br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" />
                  <p class="footer_actu"><?php echo TEXT_PADEG_FOOTER ;?></p>
                </div>      
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
    </div>
        		    		
