<p  style="color: rgb(16, 15, 15); font-family: Arial,Helvetica,sans-serif; font-size: 18px; text-decoration:none; width: 690px; margin-left: 15px;""><strong><?php echo TEXT_PAYMENT_DOMICILIATION_CHOICE ; ?></strong></p>

<form name="domiciliation" method="get" action="payment_method_change.php"> 
	<input type="hidden" name="confirm" value = "<?= $_GET['confirm'] ?>_end">
	<input type="hidden" name="payment" value = "domiciliation">

<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td colspan="3">
            <div id="step_container">
            <!-- Formulaire adresse -->
				
					<div class="step3c_promo_explain" id="step_promo_explain">
    
    
                         
                        
						<fieldset style ='width:735px'>
						<legend><?php  echo ($_GET['confirm']=='letter')?TITLE_LEGEND2:TITLE_LEGEND1 ;?></legend>
                           
                         <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px;  width: 690px;">
                       
							
                			<tr>
                            <td  style="color: rgb(16, 15, 15); font-family: Arial,Helvetica,sans-serif; font-size: 12px; text-decoration:none; padding:10px;">

                                
							 	<?php 
							
							$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
							
							$city=$customers_value['entry_postcode'].' '.$customers_value['entry_city'];
							
							$address= $customers_value['entry_street_address'];					
							if($_GET['confirm']=='letter')
							    $info= TEXT_DOMICILIATION_CONFIRMATION2;
							else
							    $info= TEXT_DOMICILIATION_CONFIRMATION;
							$info=str_replace('[url_form]','/images/pdf_dom70/dom_form_'.$lang_short.'.pdf',$info);
							$info=str_replace('[url_letter]','payment_method_change.php?payment=domiciliation&confirm=letter',$info);
							$name=ucfirst($customers_value['customers_firstname']).' '.ucfirst($customers_value['customers_lastname']);
							$info=str_replace('[name]',$name,$info);
							$info=str_replace('[address]',$address,$info);
							$info=str_replace('[city]',$city,$info);
							
							$info=str_replace('[url_adress_book]','address_book.php',$info);
							$info=str_replace('[url_change]','payment_method_change.php',$info);
							echo $info;
                                ?>
								</td>			
					
                                </tr>
							</table>
    						</fieldset>
						
        
							</div>
                          </div>
                          <br />
                      </td>
                      </tr>
     

                      <tr>
                         
                         <td><div class="subsubscription_tel" align="center"><img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/telephone.gif" border="0" /></div></td>
				         <td valign="bottom" class="step_title_button">					            	
				            	
				            </td>
                           <td valign="bottom" class="step_title_button" align="right">
                            	<img width="10" height="3" src="/images/blank.gif"/>
								<input valign="middle" type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/canvas/bouton_confirmer.gif" />
                                </td>
                            
				      </tr>	

                      <tr>
                            <td colspan="3"><div id="step3_footer"><?= $promo_footer; ?> </div></td>
                      </tr>
                      </table>	</form>