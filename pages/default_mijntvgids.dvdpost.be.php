<style>

.public_halloween { background:#e25b24;}
#pastille_halloween { padding-right: 115px;
padding-top: 5px;}
#right_halloween{
		float:right; 
		position:relative; 
		font-family	: Verdana ,Arial,  Helvetica, sans-serif; 
		font-size:33px; 
		color:#FFFFFF; 
		width: 430px;
		padding-top:20px;
		padding-right:40px;
		text-align:right;
		line-height:37px;}


</style>
<table width="773" height="473" border="0" cellpadding="0" cellspacing="0" bgcolor="000000" >
	<form name="form1" method="post" action="activation_code_confirm.php">
	<tr>
		<td width="773" height="473" valign="top" background="<?php echo DIR_WS_IMAGES.'movies/home_james.jpg';?>">
			<div id="right_halloween">
				<b><?php echo TEXT_BEST_WAY ;?></b>
				<?php if (ENTITY_ID < 38){
					?>
						<div id="pastille_halloween"><a href="<?php echo $link_freetrial ;?>"><img src="<?php echo DIR_WS_IMAGES.'languages/'.$language.'/images/canvas/pastille.png' ;?>" border="0" /></a></div>
					<?php }else{
					?>	
						<div id="pastille_halloween"><a href="<?php echo $link_freetrial ;?>"><img src="<?php echo DIR_WS_IMAGES.'languages/'.$language.'/images/canvas/pastille_nl.png' ;?>" border="0" /></a></div>
					<?php
					}
					?>
				<div id="freetrial_code">
                
                <table>
                <tr>
                <td><input name="code" id="code" type="text" class="inputs_codes" size="20" value="TV6DVD" size="18" onclick="form1.code.value='';"></td>
                <td valign="middle"><input class="no_border_button" name="imageField" type="image" src="<?php echo DIR_WS_IMAGES;?>canvas/go_trial.gif" width="48" height="22" border="0"></td>
                </tr>
                </table>
                </div>
				
				<div id="freetrial">
					<span class="dvdexpformtitle" ><?php echo TEXT2_FREE; ?><span class="dvdexpform">&nbsp;&nbsp;(<a href="how.php?faq=4" class="dvdexpform"><?php echo TEXT2_INFO; ?></a>)</span></span>	
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN2; ?></span></li>			
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN3; ?></span></li>
					<li class="point"><span class="dvdexpform"><?php echo TEXT2_EXPLAIN4; ?></span></li>
					</div>				
			</div>
		</td>
	</tr>
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
</table>

        		