<?php
$sql_phone='select * from registration_sms_status where customers_id ='.$customer_id.' and status ="handset" and  (used_date="0000-00-00" or used_date is null)';
$query=tep_db_query($sql_phone);
$value=tep_db_fetch_array($query);
?>
<!-- debut du CONTAINER -->
<div class="main-holder">
	<form name="step3c" method="post" action="step3c.php"> 
    <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="3">
                <div id="step_container">
                <!-- Formulaire adresse -->
					
						<div id="step_promo_explain" class="step3c_promo_explain">
        
        					<h2><?php  echo TITLE_STEP3C ;?></h2>
        
                             
                            
							<fieldset style ='width:910px'>
							<legend><?php  echo TITLE_LEGEND ;?></legend>
                               
                             <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin-left:10px">
                           
								
                    			<tr>
                                <td >
                                <p class="validation_intro"><?php  echo TEXT_INTRO ;?></p>
 
                                <p class="validation_intro"><strong><?php  echo TEXT_METHOD ;?></strong></p>

                                    
									<?php  	
										/*
                                    echo '	<div id ="all_sms" class="all_sms '.(($_POST['confirm']=='sms' || empty($_POST['confirm']))?' rose':'').'"><input name="confirm" type="radio" value="sms" id ="portable_confirm"  '.(($_POST['confirm']=='sms' || empty($_POST['confirm']))?'checked="checked"':'').'><img src="images/dvdpost_public/step/sms_ok.png" border="0"> '.TEXT_SMS;
									
                                    //if ( $confirm=='sms'){$checked='checked';}else{$checked='';}	
                                    
                                    if(!empty($_POST['portable']))
									{
										$error_phone=tep_check_portable($_POST['portable']);
										$phone=$_POST['portable'];
										if($error_phone)
											$button_enabled=false;
										else
											$button_enabled=true;
									}
									else
									{
										if(!empty($value['phone']))
										{
											$phone=$value['phone'];
										}
										
										else if (empty($_POST['portable']) && !tep_check_portable($customers_value['customers_telephone'] ) ){
											$phone=$customers_value['customers_telephone'];
											$error_phone=false;
											$button_enabled=true;
										}
										else
										{
											if(empty($_POST['portable']))
											{
													$error_phone=NULL;
													$phone='';
													$button_enabled=false;
											}
											else
											{
												$button_enabled=false;
												$phone=$_POST['portable'];	
											}
											
											
										}
									}
										$data=tep_send_portable(tep_fix_portable($phone));
										//var_dump($data);

									if($data['customer']!=$customer_id && $data['customer']!=0)
									{
										$input_code= 'display:none';
										$input_form= 'display:block';
										$input_link= 'display:block';
										$input_star= 'display:block';
										
										$button_enabled=false;
										$error_phone=NULL;
									}
									else
									{
										if ($data['status']!='SEND') 
										{
											$input_code= 'display:none';
											$input_form= 'display:block';
											$input_link= 'display:none';
											$input_star= 'display:block';
										}
										else
										{
											$input_code= 'display:block';
											$input_form= 'display:none';
											$input_link= 'display:none';
											$input_star= 'display:none';	
											//$_POST['confirm']=$confirmation='sms';
										}
									} 
									switch($code_error)
									{
										case 'WRONG_CODE':
										case 'EMPTY_CODE':
										case 'USED_CODE':
											$wrong_code= WRONG_CODE;
									}
								#		var_dump($error_phone);
									if($error_phone===true){
										$e1='none';
										$e1='block';
									}
									else if($error_phone===false){
										$e1='none';
										$e2='block';
									}
									else{
										$e1='none';
										$e2='none';
									}
								
									?>
									<div class='check_sms'>
										<div id='input_code' style='<?= $input_code ?>; color :#30292A;'/><br />
											<?= CODE_TEXT; ?><br /><br /><div style="background:#FFEBEB;margin:0 10px 0 0;padding:5px;"><br /><?= TEXT_COMBINAISON ?> : <input type='text' name='code_portable' value='' id='code_portable'><input name="submit" <?= (($confirm!='sms' && $confirm!='' )? 'style="display:none"':'')?> type="image" id='sms_btn' src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_finish.gif" border="0" value="submit"><br /><br /></span><span style="color:#C84327;" ><?= $wrong_code ?></span></div>
										</div>
	                                    <div id="pending"  style="display:none">
	                                    	<p id='sms_pending'><?= SMS_SEND.'<br />'.PHONE_CALLBACK ?></p>
	                                    </div>

	                                    <div id ='input_form' style='<?= $input_form?>;color :#30292A;font-size:13px;margin-bottom:0px'>
											<b><?= SMS_TITLE ?></b><br /><br />
										<div id="portable_div">
											<input class="new_step_input" type="text" autocomplete="off" name="portable" value='<?= $phone ?>' 	style="position:absolute" id="portable"  />
											<div id='send_sms' <?php echo 'style="'. (($_POST['confirm']!='sms' && $_POST['confirm']!='' )? ';display:none;':'').'"'; ?> class='btn_sms_<?= $language ?> <?= $button_enabled===false ?  'btn_sms_top': 'btn_sms_bottom'; ?>' ></div>
										</div>
										<?php

												echo '<br /><span style="color:#C84327; font-size:12px;display:'.$e1.';" id ="error_portable" >'.TEXT_ERROR_PHONE.'<br /><br /></span>';
												echo '<span style="color:#999999; font-size:12px;display:'.$e2.';"  class="validation_intro" id ="explain_portable" />'.TEXT_PHONECORRECTION.'<br /><br /></span>';
										?>
	                                    </div>
										<p id ='input_link' style='<?= $input_link ?>'>
	                                    	<span style="color:#C84327;" ><?= PHONE_ALREAY_USED; ?></span>
	                                    </p>
	<div id="input_star" style='font-size:10px;<?= $input_star?>'><?= SMS_STAR ?></div>
									
									
									
									</div>
									</div>
									<?php */ ?>
									<div class="<?php echo (($_POST['confirm']=='phone' || empty($_POST['confirm']))?'rose':'') ?> all_phone" id ='all_phone' >
									
                                   
                                    
									<?php  							
                                    echo '<input name="confirm" type="radio" value="phone" id ="phone_confirm" '.(($_POST['confirm']=='phone' || empty($_POST['confirm']))?' checked="checked"':'').' ><img src="images/dvdpost_public/step/phone.png" border="0">';
                                    /// if ( $confirm=='phone'){$checked='checked';}else{$checked='';}	
                                    echo TEXT_PHONE;																		
                                    ?>
									<div class="check_phone">
                                    <span>
                                    <p><strong><?php  echo TEXT_PHONEINTRO ;?></strong></p>
                                    <p style="height:29px"><input class="new_step_input" type="text" autocomplete="off" name="phone" value='<?= $customers_value['customers_telephone'] ?>' id="phone" value=""> <input name="submit" id ='phone_btn' type="image" <?= ((1==0)? 'style="display:none"':'')?>src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_finish.gif" border="0" value="submit"<br />
									<?php
									//$confirm!='phone')
									if ($error===true)
										echo '<span style="color:#C84327; font-size:12px;" >'.TEXT_ERROR_PHONE.'</span><br />';
									else
										echo '<span style="color:#999999; font-size:12px;" ><?php  echo TEXT_PHONECORRECTION ;?></span>';
									?>
                                    </p>
                                    <p><?php  echo TEXT_PHONEVALIDITY ;?></p>
                                    
                                   </span>
                                   </div>
									</div>
                                   
                                    
                                    
                                    
                                    
									<div class="all_phone">
                                    <p style="color:#999999;"><span>
									<?php  							
                                    echo '<input name="confirm" type="radio" value="coupon" disabled="disabled" ><img src="images/dvdpost_public/step/coupon.png" border="0">';
                                    if ( $confirm=='coupon'){$checked='checked';}else{$checked='';}	
                                    echo TEXT_COUPON;																		
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
                                <td >
                                	<img width="10" height="3" src="/images/blank.gif"/>
	                                <table><tr><td><a class="sub_black_link" href="/step_check.php"><?php  echo TEXT_BACK ;?></a></td><td><img  src="/images/dvdpost_public/bg-top-nav-sep.gif"/></td><td>
	                                <a class="sub_black_link" href="/logoff.php"><?php  echo TEXT_CANCEL ;?></a></td></tr></table></td>
                                
					      </tr>	
	
                          <tr>
                                <td colspan="3"><div id="step3_footer"><?= $promo_footer; ?> </div></td>
                          </tr>
                          </table>	</form>
</div>
<span style="display:none" id="sms_verif"><?= MOBILE_VERIF; ?></span>
