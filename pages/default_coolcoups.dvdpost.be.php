<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/robin/robin.jpg' ;?>);
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
font-family:Arial, Helvetica, sans-serif;
padding:5px; 
font-size: 12px;
font-weight:bold;
text-align:center;
}
.text_cine {
font-size:15px;
font-family:Arial, Helvetica, sans-serif;
}
.other-logos
{
	display:none;
}

.cine_help{
font-size:14px;
font-family:Arial, Helvetica, sans-serif;
text-align:center;
}
.cine_help a{
color: #0c9fe4;
font-size:14px;
font-family:Arial, Helvetica, sans-serif;
}

</style>
<div class="main-holder">
	<form name="form1" method="post" action="activation_code_confirm.php">
	  <div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/header_coolcoups.jpg"></div>
	  <div id="promo">
	    <div id="promo_area">
	      <p class="text_promo" ><?php echo TEXT_GFC_TITLE ;?></p>
				<p style="margin:0">
	      	<input name="code" id="code" class="inputs_codes" value="" size="20" type="text">
	      	<input class="no_border_button" name="imageField" src="<?= DIR_WS_IMAGES ?>/button_go.gif" type="image" align="absmiddle" border="0" >
				</p>
	    </div>
	    <div id="help_area" align="center"><img src="<?= DIR_WS_IMAGES_LANGUAGES.$language  ?>/images/help_grey.gif" width="347" height="72" /></div>
	    <div class="clear"></div>
	    <p class="footer_actu"><?= TEXT_COOLCOUPS ?> | <a href="/conditions.php"><strong><?= TEXT_CONDITION_SUMMER ?></strong></a></p>
	    <input name="condition1" id="condition1" value="gift" type="hidden">
	  </div>
	</form>
</div>