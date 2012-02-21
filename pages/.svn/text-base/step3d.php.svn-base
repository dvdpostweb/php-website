<!-- debut du CONTAINER -->
<div class="main-holder">
	<form name="step3d" method="get" action="domiciliation70_confirmation.php"> 
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="3">
                <div id="step_container">
                <!-- Formulaire adresse -->
					
						<div id="step_promo_explain" class="step3c_promo_explain">
        
        					<h2><?php  echo TITLE_STEP3D ;?></h2>
        
                             
                            
							<fieldset style ='width:910px'>
							<legend><?php  echo TITLE_LEGEND ;?></legend>
                               
                             <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px">
                           
								
                    			<tr>
                                <td >

                                    
								 	<?php  							
                                    echo TEXT_DOM;																		
                                    ?>

									<div class="<?= (($_POST['confirm']=='download' || empty($_POST['confirm']))?'rose':'') ?> all_phone" id ='all_option1' >
									<?php  							
                                    echo '<input name="confirm" type="radio" value="download" id ="option_confirm1" '.(($_POST['confirm']=='download' || empty($_POST['confirm']))?' checked="checked"':'').' ><img src="images/dvdpost_public/step/domicilation_form.png" border="0" class="icon_step3">';
echo str_replace('[phone]',FAXE,TEXT_DOM_OPTION1);
                                    ?>
									</div>
									<div class="<?= (($_POST['confirm']=='letter' )?'rose':'')?> all_phone" id ='all_option2' >
									<?php  							
									echo '<input name="confirm" type="radio" value="letter" id ="option_confirm2" '.(($_POST['confirm']=='letter' )?' checked="checked"':'').' ><img src="images/dvdpost_public/step/domiciliation_post.png" border="0" class="icon_step3">';                                    
									echo str_replace('[phone]',FAXE,TEXT_DOM_OPTION2);
                                    ?>
									</div>
                                   
                                    
                                    
                                    
                                    
									
									</td>			
						
                                    </tr>
								</table>
        						</fieldset>
							
            
								</div>
                              </div>
                          </td>
                          </tr>
         

                          <tr>
                             
                             <td><div class="subsubscription_tel" align="center"><img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/telephone.gif" border="0" /></div></td>
					         <td valign="bottom" class="step_title_button">					            	
					            	
					            </td>
                                <td valign="bottom" class="step_title_button" align="right">
                                	<img width="10" height="3" src="/images/blank.gif"/>
									<input type='image' src='/images/www3/languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_confirm.gif' />
	                                <table class="retour_confirm"><tr><td><a class="sub_black_link" href="/step3b.php"><?php  echo TEXT_BACK ;?></a></td><td><img  src="/images/dvdpost_public/bg-top-nav-sep.gif"/></td><td>
	                                <a class="sub_black_link" href="/logoff.php"><?php  echo TEXT_CANCEL ;?></a></td></tr></table></td>
                                
					      </tr>	
	
                          <tr>
                                <td colspan="3"><div id="step3_footer"><?= $promo_footer; ?> </div></td>
                          </tr>
                          </table>	</form>
</div>
<span style="display:none" id="sms_verif"><?= MOBILE_VERIF; ?></span>
