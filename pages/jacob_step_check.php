<? if (strpos(strtoupper($discount_values['discount_code']),'BGC') === 0) { ?> 
	<link href="http://www.dvdpost.be/images/relance012012/new.css" rel="stylesheet" type="text/css" />
<? } ?>
<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<div class="jbwrapper">
  <div class="jbcontainer">
    <div id="container">
			<? require('partial/default/banner.php') ?>
		      <div class="content_step">
				<? require('partial/default/jacob_questions.php') ?>
				</div>
        <div class="content_jb">
          <div class="step_4 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="content">
              <div class="title">STEP 3 <span class="green_font"><?= mb_strtoupper(TEXT_TITLE_JACOB4) ?></span></div>
              <form action="step_check.php" method="post">
								<table width="520">
									<tr>
										<td colspan="3" height='50'>
											<p id='second_title'><?php echo SECOND_TITLE ?></p>
										</td>
									</tr>
									<?php 
									if($error === true)
									{
										echo '<tr>
														<td colspan="3">
															<div class="red_check"><img src="'.DIR_DVD_WS_IMAGES.'dvdpost_public/step/attention_new.gif" align="absmiddle" />'.ERROR_VERIF.'</div>
														</td>
													</tr>';
									}
									?>
									<? if ($paypal_available == true ) { ?>
									  
                  <tr>
                    <td width="100%" class="<?php echo ($_POST['payment']=='paypal'?'active_verif':'normal_verif') ?>" id="paypal"><div class="verif_type"><?= TEXT_PAYPAL_TITLE ?></div>
                      <table class="type_credit">
                        <tbody>
                          <tr height="50">
                            <td><input id="paypal_id" name="payment" value="paypal" type="radio" <?php echo (($cc_available == false && $phone_available == false )?' checked="checked"':'') ?>></td>
                            <td width="75"><img alt="paypal" src="<?php  echo DIR_DVD_WS_IMAGES ;?>/paypal.png" width="70" height="35"></td>
                            <td width="10">
                              </td>
                            <td align="justify"><?= TEXT_PAYPAL ?></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                <? }
                if (($cc_available == true or $phone_available == true)){ 
                ?>  
                <tr><td width="23" class="or" colspan="3" ><?= TEXT_OR ?></td></tr>
								<? } ?>
 								<? if ($cc_available == true ) { ?>
								<tr>
										<td width="230" class="<?php echo (($_POST['payment']=='ogonevisa' && $_POST['payment']=='ogonemaster' && $_POST['payment']=='ogoneamex' )?'active_verif':'normal_verif') ?>" id="ogone">
											<div class="verif_type"><?= TITLE_PAYMETHOD ?></div>
											<table  class="type_credit">
												<tr height="50">
													<td width="22"><input id ='visa' name="payment" value="ogonevisa" type="radio" ></td>
													<td width="71"><img alt="visa" src="<?php  echo DIR_DVD_WS_IMAGES ;?>visa_mini.png"></td>
													<td width="71"><strong>Visa</strong></td>
													<td width="22"><input id ='master' name="payment" value="ogonemaster" type="radio" ></td>
													<td width="71"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>master_card_mini.png"></td>
													<td width="71"><strong>Eurocard Mastercard</strong></td>
													<td width="22"><input id="amex" name="payment" value="ogoneamex" type="radio" ></td>
													<td width="71"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>americanexpress_mini.png"></td>
													<td width="71"><strong>American Express</strong></td>
												</tr>
											</table>
											<table width="492" cellpadding="0" cellspacing="0">
												<tr> <td width="50" align="center" bgcolor="#F7F3F3"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>lock.png" alt="secure" width="36" height="49" align="absmiddle"></td>
													<td width="140"  class="text_lock" bgcolor="#F7F3F3"><div align="center"><?= TEXT_SECURED ?></div></td>
													<td width="25">&nbsp;</td>
													<td align="center"width="150" height="50">
														<img src="<?php  echo DIR_DVD_WS_IMAGES.$lang_short ;?>/ogone.gif" align="left" width="100">
													</td>
												</tr>
											</table>
										</td>
										</tr>
										<? } ?>
										<?php if($phone_available==true){?>
										<tr><td width="23" class="or" colspan="3" ><?= TEXT_OR ?></td>
										</tr>
										<tr>
										<td width="230" class="<?php echo (($_POST['payment']=='phone' )?'active_verif':'normal_verif') ?>" id ='bank' valign="top">	
											<div class="verif_type"><?= PAYMENT_METHOD_PHONE ?></div>
											<table  class="type_credit">
												<tr height="50">
													<td><input name="payment" type="radio" value="phone" id ="phone_confirm" <?php echo (($_POST['payment']=='phone' )?' checked="checked"':'') ?> ></td>
													<td ><img id="mf19" src="<?php  echo DIR_DVD_WS_IMAGES ;?>virement.png" align="absmiddle" border="0"></td>
													<td ><strong><?= TEXT_PHONE ?></strong></td>
												</tr>
											</table>
											<p id="mf46"><strong id="mf47"><?= TEXT_PHONEINTRO ?></strong></p>
											<p align="center">
											<input class="callback_step_input" type="text" autocomplete="off" name="phone" value='<?= $customer_values['customers_telephone'] ?>' id="phone" value=""><br /> 
											<?php
												if ($error_phone===true)
													echo '<span class="red" >'.TEXT_ERROR_PHONE.'</span><br />';
												else
													echo '<span class="grey" id ="phone_info">'.TEXT_PHONECORRECTION.'</span>';
											?>              

											<p id="mf50"><?php  echo TEXT_PHONEVALIDITY ;?></p>
										</td>
											<? } else{
												echo '<td></td>';
											} ?>
									</tr>
									<tr>
										<td colspan="3" height="20"></td>
									</tr>

								</table>
								<div class="other_payement_submit" >
									<table align='right' width='350'>
										<tr>
											<td width="40">
												<a class="sub_black_link2" href="/step3b.php"><?php  echo TEXT_BACK ;?></a>
											</td>
											<td>
												<img  src="<?php  echo DIR_DVD_WS_IMAGES ;?>/dvdpost_public/bg-top-nav-sep.gif" />
											</td>
											<td>
												<a class="sub_black_link2" href="/logoff.php"><?php  echo TEXT_CANCEL ;?></a>
											</td>
											<td>
												<p align="right"><input type="submit" name ="sent" value= "<?= SUBMIT ?>" class="button_step" /></p>
											</td>
										</tr>
									</table>
								</div>
							</form>
						</div>
              
          </div>
        </div>
      </div>
			<div style="clear:both"></div>
    </div>
  </div>

