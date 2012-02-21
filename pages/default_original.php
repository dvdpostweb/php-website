<?php
switch(WEB_SITE_ID)
  {

}
?>
<table width="773" height="473" border="0" cellpadding="0" cellspacing="0" bgcolor="000000" >
	<form name="form1" method="post" action="activation_code_confirm.php">
	<tr>
		<td width="773" height="473" valign="top" background="<?php echo DIR_WS_IMAGES.'/canvas/home.jpg';?>">
			<div id="right">
				<b><?php echo TEXT_BEST_WAY ;?></b>
				<?php if (ENTITY_ID < 38){
					?>
						<div id="pastille"><a href="<?php echo $link_freetrial ;?>"><img src="<?php echo DIR_WS_IMAGES.'languages/'.$language.'/images/canvas/pastille.jpg' ;?>" border="0" /></a></div>
					<?php }else{
					?>	
						<div id="pastille"><a href="<?php echo $link_freetrial ;?>"><img src="<?php echo DIR_WS_IMAGES.'languages/'.$language.'/images/canvas/pastille_NL.jpg' ;?>" border="0" /></a></div>
					<?php
					}
					?>
				<div id="button"><a href="<?php echo $link_freetrial ;?>"><img src="<?php echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/button3_try_now.gif' ;?>" border="0"></a></div>
				
				<div id="freetrial">
					<span class="dvdexpformtitle" ><?php echo TEXT2_FREE; ?><span class="dvdexpform">&nbsp;&nbsp;(<a href="how.php?faq=4" class="dvdexpform"><?php echo TEXT2_INFO; ?></a>)</span></span>	
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN2; ?></span></li>			
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN3; ?></span></li>
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN4; ?></span></li>
					<input name="code" id="code" type="text" class="inputs_codes" size="20" value="<?php echo TEXT_GOT_A_PROMO_CODE;?>" size="18" onclick="form1.code.value='';"><input class="no_border_button" name="imageField" type="image" src="<?php echo DIR_WS_IMAGES;?>canvas/go.gif" width="32" height="25" align="absmiddle" border="0"></div>				
			</div>
		</td>
	</tr>
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</table>

        		