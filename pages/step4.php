<?php
$link = PRIVATE_SITE.'/'.$lang_short.'/wishlist_start';
?>
<form name="verify_form" method="get" action="<?= $link ?>" id="form_step">
	<div class="main-holder_step1">
		<table cellspacing="0" cellpadding="0" border="0" width='950'>
			<tr>
				<td>
					<?php 
				$select_question=8;
				require('partial/step1/questions.php')
					?>
					<div class="content">
						<?php $step="step4"; ?>
						<?php require ('partial/step1/step.php'); ?>
						<div class='title_left'>
							<h1><?= TITLE_METHODLEGEND ?></h1>
						</div>
						<div class="button_right">
							<input type="submit" class="step31whislist_image" value="<?= FILL_UP ?>" name="sent">
						</div>
						<div style="clear: both;"></div>
						<div id="step_container">



							<table cellpadding="0" cellspacing="0" border="0" align="center">
								

									<tr>

										<td colspan="3" height="50"><p><?= COMPLETE ?></p>

											<div class="free_trial">
												<div class="step_text"><?= NOT_EMPTY ?></div>
												<div class="step_macaron"><img src="<?php  echo DIR_DVD_WS_IMAGES ;?>dvd.png" /></div>
												<div style="clear:both"></div>
											</div>

											<div class="box_summary">


												<p class="title_summary"><strong><?= TEXT_MEMBER_ACCOUNT ?></strong></p>
												<table cellpadding="0" cellspacing="0">
													<tr>
														<td id="modif"  colspan="2" valign="top" align="right">
															<ul>
																<li class="links">
																	<a href="<?= PRIVATE_SITE ?>/<?= $lang_short ?>/customers/<?= $customer_id ?>" class="modification_account"><?= CHANGE_ACCOUNT ?></a>

																</li>
															</ul>
														</td>
													</tr>
													<tr>
														<td width="172" align="right"><strong><?= ID ?> :</strong></td>
														<td width="354" align="left"><?= $customers_value['customers_email_address'] ?></td>

													</tr>
													<tr>
														<td align="right"><strong><?= TEXT_CLIENT_LAST_NAME ?> : </strong></td>
														<td align="left"><?= ucfirst(strtolower($customers_value['customers_lastname'])) ?></td>
													</tr>
													<tr>
														<td align="right"><strong><?= TEXT_CLIENT_FIRST_NAME ?> : </strong></td>

														<td align="left"><?= ucfirst(strtolower($customers_value['customers_firstname'])) ?></td>
													</tr>
													<tr>
														<td align="right"><strong><?= TEXT_BIRTH_DATE ?> :</strong></td>
														<td align="left"><?= tep_date_short($customers_value['customers_dob']) ?></td>
													</tr>

													<tr>

														<td align="right"><strong><?= TEXT_CLIENT_PHONE ?> :</strong></td>
														<td align="left"><?= $customers_value['customers_telephone'] ?></td>
													</tr>
													<tr>

														<td id="modif" colspan="2" valign="top" align="right">
															<ul>
																<li class="links">

																	<a href="<?= PRIVATE_SITE ?>/<?= $lang_short ?>/customers/<?= $customer_id ?>" class="modification_address"><?= CHANGE_ADDRESS ?></a>
																</li>
															</ul>
														</td>
													</tr>
													<tr>
														<td class="adresse" valign="top" align="right"><strong><?= CHECKOUT_BAR_DELIVERY_ADDRESS ?> :</strong></td>
														<td class="adresse" valign="top" align="left">
															<?= ucfirst(strtolower($address_book_values['entry_firstname'])).' '.ucfirst(strtolower($address_book_values['entry_lastname'])) ?>
															<br />
															<?= $address_book_values['entry_street_address'] ?>
															<br />
															<?= $address_book_values['entry_postcode'].' '.ucfirst(strtolower($address_book_values['entry_city']))?>
														</td>
													</tr>

												</table>

											</div>
											<div class="box_summary">
												<? if ($discount_type=='D' || $discount_type=='A') {?>
												<p class="title_summary"><strong><?= TEXT_ACTIVE_PROMO ?></strong></p>
												<? } ?>
												<? if (empty($discount_value) &&  ($discount_type=='D' || $discount_type=='A') ){?>
												<? if ($promo_type == 'pre_paid') {?>	
														<p style="font-size:15px;"> <?= $period ?></p>
												<? } else if ($promo_type != 'unlimited' ) { ?>
												<p style="font-size:15px;"><strong><?= TRIAL ?></strong>: <?= $period ?></p>
												<? 
												}else{ 
												?>
												<p style="font-size:15px;"><? printf(UNLIMITED, $duration, $abo_dvd_credit) ?></p>
													
												<? } ?>
												<? } $nb=3;?>
												<? if ($reconduction == 0){ ?>
												<p style="font-size:15px;"><strong><?= (($discount_values['discount_value'] > 0 || $discount_type=='') ? ROLLER_PAYED : ROLLER) ?></strong>: <?= $period_next ?> 
												<? } ?>	
												<? if ($nb_recurring > 0) echo TEXT_CONFIRM_4.' '.$nb_recurring.' '.TEXT_MONTHS ?>
												</p>
											</div>
											<? if (empty($discount_value)  && $reconduction==0 &&  ($discount_type=='D' || $discount_type=='A')){?>
											<div class="box_summary">
												<p class="title_summary"><strong><?= FIRST_PAYMENT ?></strong></p>
												<?php 
													$price = PRICE;
													$price = str_replace('{{price}}',$price_abo,$price);
													$price = str_replace('{{date}}',$date,$price);
													
												?>
												<p><?= $price ?></p>
											</div>
											<? }?>


										</td>
									</tr>

									<tr>

									</tr>

									<tr>
										<td colspan="3" height="20"></td>
									</tr>

									<tr>

										<td colspan="3" align="right">
											<table id="call_action_step" cellpadding="0" cellspacing="0">
												<tr  align="right">

													<td colspan="2"><input id="mfa6" name="sent" value="<?= FILL_UP ?>" class="step31whislist_image" type="submit"></td>
												</tr>

											</table>
										</td>
										<td></td>
									</tr >            


								
							</table>
						</div>	
					</div>
					<div style="clear:both"></div>



					<!-- fin du CONTAINER --></td>
				</tr>
			</table>

		</div>	

	</td>
</tr>
</table>
</div>
</form>
<!-- MSN START -->
<img height="1" width="1" src="http://view.atdmt.com/action/ppbhes_BEHomeEntertainmentConfirmationPage0603_7"/>
<!-- MSN END -->
<!-- PTG -->
<img src="http://dvdpost.ptg.be/protocols/pixel.php" border="0" width="0" height="0" />
