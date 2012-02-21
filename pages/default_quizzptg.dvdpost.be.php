<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/ptgquizz/home.jpg' ;?>);
background-repeat: no-repeat;
background-color:#ffffff;



}

#promocode {
font-family:Arial,Helvetica,sans-serif;
font-size:19px;
height:300px;
line-height:19px;
margin-bottom:20px;
text-align:center;
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
	
		
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/ptgquizz/home.jpg"></div>
			  	<div id="promocode">
               <?php echo TEXT_PTGQUIZZ_EXPLAIN ;?><br /><br />
                <a href="http://www.dvdpost.be/step1.php?activation_code=QUIZZPTG6DVD" target="_blank"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language; ?>/images/sodexo/button.gif" width="289" height="51" border="0" alt="" /></a>
                    
                  <br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" /><br />
                <p class="footer_actu"><?php echo TEXT_MEMBER_ALREADY_PANASONIC ;?></p>
                  <p class="footer_actu"><?php echo TEXT_FOOTER ;?></p>
                  <p class="footer_actu"><?php echo TEXT_FOOTER_EXRENTAL ;?></p>
                  
                </div>      
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>