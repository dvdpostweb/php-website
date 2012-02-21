<style>

.cinenews {
background:url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/cinenews/home.jpg' ;?>);
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




</style>
<div class="main-holder">
<form name="form1" method="post" action="/activation_code_confirm.php">
	
    
		
				<div id="cinenews_dvd"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/hello/home.jpg"></div>
			  	<div id="promocode">
                <?php echo TEXT_STUDENT_EXPLAIN ;?><br />
                    
                  <input name="code" id="code" type="text" class="inputs_codes" size="20" value="" size="18" onclick="form1.code.value='';">&nbsp;<input class="no_border_button" name="imageField" type="image" src="/images/www3/languages/french/images/ptg/go.gif" width="69" height="21" align="absmiddle" border="0"><br /><br />
				  <img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" />
                </div>      
		
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</div>