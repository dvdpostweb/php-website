
<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/public/home.jpg' ;?>);
background-repeat: no-repeat;
background-color:#ffffff;



}

#promocode {
font-size:24px;
line-height:24px;
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
	
		
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/public/home.jpg"></div>
			  	<div id="promocode">
                <p><strong>Notre concours est terminé</strong><br />
Cependant, vous pouvez toujours gagner 6 DVD ou Blu-ray gratuits** pendant maximum un mois.<br />
Les gagnants du concours sont :
Premier prix : L.Gonzalez, Deuxième prix : P.Martens, troisième prix : M.Pierre </p>
                 
               
<a href="/step1-2-1.php?activation_code=PUB6DVD"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language; ?>/images/buttons/button_relance.gif" width="305" height="111" border="0" alt="" /></a>
            
                    
                  <br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" />
         
                  <p class="footer_actu"><?php echo TEXT_PADEG_FOOTER ;?></p>
                  <p class="footer_actu"><?php echo TEXT_FOOTER ;?></p>
                  
                </div>      
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>