<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/lesoir/home.jpg' ;?>);
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

.promocode {
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
}

</style>
<div class="main-holder">
<form name="form1" method="post" action="activation_code_confirm.php">
	
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/lesoir/home.jpg"></div>
			  	<div id="promocode">
                <p><?php echo TEXT_LESOIR_EXPLAIN ;?></p>
                    
                  <input name="code" id="code" type="text" class="inputs_codes" size="20" value ='LESOIR6DVD' size="18">&nbsp;<input class="no_border_button" name="imageField" type="image" src="/images/www3/languages/french/images/ptg/go.gif" width="69" height="21" align="absmiddle" border="0" ><br /><br />
                  <!--<p class="promocode"><strong>8 locations DVD ou Blu-ray gratuites pendant maximum 2 mois grâce à votre journal !</strong></p>
                  <p>Retrouvez votre code unique dans le journal Le Soir du 15 décembre, et revenez ensuite introduire <br />
                  ce même code sur cette page pour vous inscrire et profiter de cette offre exceptionnelle !</p>-->
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" />
                  
                  <p class="footer_actu"><?php echo TEXT_PADEG_FOOTER ;?></p>
                </div>      

	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>	
