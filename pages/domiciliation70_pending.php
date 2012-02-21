<!-- debut du CONTAINER -->
<div class="main-holder">
  <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="3">
                <div id="step_container">
                <!-- Formulaire adresse -->
					
						<div id="step_promo_explain" class="step3c_promo_explain">
        
        					<h2><?php  echo TITLE_DOMICILIATION_PENDING ;?></h2>
        
                             
                            
							<fieldset style ='width:910px'>
							<legend><?php  echo TITLE_LEGEND ;?></legend>
                               
                             <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px">
                    			<tr>
                                <td >
								 	<?php  	
									$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
								    $info=TEXT_DOMICILIATION_PENDING;
									$info=str_replace('[url_form]','/images/pdf_dom70/dom_form_'.$lang_short.'.pdf',$info);
									$info=str_replace('[url_step3b]','domiciliation70_pending.php?change=1',$info);
									$info=str_replace('[name]',$name,$info);
									
									echo $info;
                                    ?>
									</td>			
						
                                    </tr>
								</table>
        						</fieldset>
								</div>
                              </div>
                          </td>
                          </tr>
         

                          <tr>
                             
                             <td align="left"><div class="subsubscription_tel" align="left" style="margin-left:10px"><img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/telephone.gif" border="0" /></div></td>
					         <td valign="bottom" class="step_title_button">					            	
					            	
					            </td>
                                <td >
                                	<img width="150" height="3" src="/images/blank.gif"/>
	                                </td>
                                
					      </tr>	
	
                          <tr>
                                <td colspan="3"><div id="step3_footer"><?= $promo_footer; ?> </div></td>
                          </tr>
                          </table>	
</div>
<span style="display:none" id="sms_verif"><?= MOBILE_VERIF; ?></span>
