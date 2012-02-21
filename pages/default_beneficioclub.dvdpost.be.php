<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/beneficio/home.jpg' ;?>);
background-repeat: no-repeat;
background-color:#ffffff;



}

#promocode {
font-family:Arial,Helvetica,sans-serif;
font-size:19px;
height:260px;
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
	
		
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/beneficio/home.jpg">
               
                <p align="left" style="padding-left:15px;"><?php echo TEXT_BENEFICIO_REGLEMENT ;?></p>
                
                </div>
			  	<div id="promocode">
                <?php echo TEXT_BENEFICIO_EXPLAIN ;?><br /><br />
                <a href="http://www.dvdpost.be/step1.php?activation_code=BENEFICIO6DVD" target="_blank"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language; ?>/images/sodexo/button.gif" width="289" height="51" border="0" alt="" /></a>
                    
                  <br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" /><br />
                 <p class="footer_actu"><?php echo TEXT_MEMBER_ALREADY_PANASONIC ;?></p>
                  <p class="footer_actu"><?php echo TEXT_FOOTER ;?></p>
                  
                </div>      
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>