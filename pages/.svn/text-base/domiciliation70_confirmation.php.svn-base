<!-- debut du CONTAINER -->
<div class="main-holder">
	<form name="domiciliation" method="post" action="domiciliation70_pending.php"> 
		<input type="hidden" name="confirm" value = "<?= $_GET['confirm'] ?>">
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="3">
                <div id="step_container">
                <!-- Formulaire adresse -->
					
						<div class="step3c_promo_explain" id="step_promo_explain">
        
        					<h2><?php  echo ($_GET['confirm']=='letter')?TITLE_DOMICILIATION_CONFIRMATION2:TITLE_DOMICILIATION_CONFIRMATION1;?></h2>
        
                             
                            
							<fieldset style ='width:910px'>
							<legend><?php  echo ($_GET['confirm']=='letter')?TITLE_LEGEND2:TITLE_LEGEND1 ;?></legend>
                               
                             <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px">
                           
								
                    			<tr>
                                <td >

                                    
								 	<?php 
								
								$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
								
								$city=$customers_value['entry_postcode'].' '.$customers_value['entry_city'];
								
								$address= $customers_value['entry_street_address'];					
								if($_GET['confirm']=='letter')
								    $info= TEXT_DOMICILIATION_CONFIRMATION2;
								else
								    $info= TEXT_DOMICILIATION_CONFIRMATION;
								$info=str_replace('[url_form]','/images/pdf_dom70/dom_form_'.$lang_short.'.pdf',$info);
								$info=str_replace('[url_letter]','domiciliation70_confirmation.php?confirm=letter',$info);
								$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
								$info=str_replace('[name]',$name,$info);
								$info=str_replace('[address]',$address,$info);
								$info=str_replace('[city]',$city,$info);
								
								$info=str_replace('[url_step3b]','step3b.php',$info);
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
