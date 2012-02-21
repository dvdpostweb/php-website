<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/nostalgie/home.jpg' ;?>);
background-repeat: no-repeat;
background-color:#ffffff;



}

#promocode {
font-size:24px;
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
	
		
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/nostalgie/home.jpg"></div>
			  	<div id="promocode">
                
               

                <p>Introduire le CODE PROMO  <font color="#CC0000"><strong>NOSTALGIE6DVD</strong></font> ou <font color="#CC0000"><strong>votre code VIP</strong></font> ci-dessous : </p>
                    
                  <input name="code" id="code" type="text" class="inputs_codes" size="20" value="" size="18">&nbsp;<input class="no_border_button" name="imageField" type="image" src="http://www.dvdpost.be/images/www3/languages/french/images/ptg/go.gif" width="69" height="21" align="absmiddle" border="0"><br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" />
         
                  <p class="footer_actu">(*) Offre non cumulable et limitée aux nouveaux membres DVDPost. Votre premier mois d’abonnement offert par Nostalgie, jusqu’à 6 locations pendant maximum 1 mois.</p>
               
                  
                </div>      
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>