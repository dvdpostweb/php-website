<div class="main-holder_step1">
	<table cellspacing="0" cellpadding="0" border="0" width='950'>
		<tr>
			<td>
				<?php 
					$select_question=4;
					require('partial/step1/questions.php')
				?>
				<div class="content">
					<?php $step="step3"; ?>
					<?php require ('partial/step1/step.php'); ?>
					<h1><?= TITLE_METHODLEGEND ?></h1>
					<div id="step_container">
						<div class="free_trial">
							<div class="step_text"><p class="step_intro"><?= TEXT_STEP_INTRO ?></p></div>
							<div class="step_macaron"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?><?= $lang_short ?>/maracon_100.png" /></div>
							<div style="clear:both"></div>
						</div>
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
								<tr>
                  <td width="100%" class="active_verif" id="paypal"><div class="verif_type">Par PayPal </div>
                    <table class="type_credit">
                      <tbody>
                        <tr height="50">
                          <td><input id="paypal" name="payment" value="paypal" type="radio"></td>
                          <td><img alt="paypal" src="./step4_files/paypal.png"></td>
                          <td width="10">
                            </td>
                          <td align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt volutpat nibh vel sagittis. Proin dui odio, eleifend sit amet aliquam vel, congue aliquet urna.</td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td class="or">OU</td>
                </tr>
								<tr>
									<?php 
										if ($phone_available==false)
											echo '<td></td>';
									?>
									<td width="230" class="<?php echo (($_POST['payment']!='phone' )?'active_verif':'normal_verif') ?>" id="ogone">
										<div class="verif_type"><?= TITLE_PAYMETHOD ?></div>
										<table  class="type_credit">
											<tr height="50">
												<td><input id ='visa' name="payment" value="ogonevisa" type="radio" ></td>
												<td ><img alt="visa" src="<?php  echo DIR_DVD_WS_IMAGES ;?>visa_mini.png"></td>
												<td ><strong>Visa</strong></td>
											</tr>
											<tr height="50">
												<td><input id ='master' name="payment" value="ogonemaster" type="radio" ></td>
												<td><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>master_card_mini.png"></td>
												<td><strong>Eurocard Mastercard</strong></td>
											</tr>
											<tr height="50">
												<td><input id="amex" name="payment" value="ogoneamex" type="radio" ></td>

												<td><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>americanexpress_mini.png"></td>
												<td><strong>American Express</strong></td>
											</tr>
										</table>
										<table width="230" cellpadding="0" cellspacing="0">
											<tr bgcolor="#F7F3F3"> <td width="50" align="right"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>lock.png" alt="secure" width="36" height="49" align="absmiddle"></td>
												<td width="146"  class="text_lock"><div align="center"><?= TEXT_SECURED ?></div></td>
											</tr>
											<tr>
												<td colspan="3" align="center"><br />
													<img src="<?php  echo DIR_DVD_WS_IMAGES.$lang_short ;?>/ogone.gif" align="center">
												</td>
											</tr>
										</table>
									</td>
									<?php if($phone_available==true){?>
									<td width="76" class="or"><?= TEXT_OR ?></td>
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
											<img  src="<?php  echo DIR_DVD_WS_IMAGES ;?>/dvdpost_public/bg-top-nav-sep.gif"/>
										</td>
										<td>
											<a class="sub_black_link2" href="/logoff.php"><?php  echo TEXT_CANCEL ;?></a>
										</td>
										<td>
											<p align="right"><input type="submit" name ="sent" value= "<?= SUBMIT ?>" class="step31_image" /></p>
										</td>
									</tr>
								</table>
							</div>
						</form>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
