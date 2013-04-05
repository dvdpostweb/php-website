<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<? if (strpos(strtoupper($discount_values['discount_code']),'BGC') === 0) { ?> 
	<link href="http://www.dvdpost.be/images/relance012012/new.css" rel="stylesheet" type="text/css" />
<? } ?>
<?php
$link = PRIVATE_SITE.'/'.$lang_short.'/wishlist_start?login=1';
$sponsorship_link = PRIVATE_SITE.'/'.$lang_short.'/sponsorships?login=1';

?>
<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<form name="verify_form" method="get" action="<?= $link ?>" id="form_step">
<div class="jbwrapper">
  <div class="jbcontainer">
    <div id="container">
			<? require('partial/default/banner.php') ?>
		      <div class="content_step">
				<? require('partial/default/jacob_questions.php') ?>
				</div>




        <div class="content_jb">
          <div class="step_5 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="content">
              <div class="title"><span class="green_font"><?= TITLE_STEP4 ?></span></div>
              <p><?= COMPLETE ?></p>
              <div>
								<? if (!($discount_values[discount_type]==1 && $discount_values[discount_value]==0) && ($discount_type=='D' || $discount_type=='A') && $abo_dvd_credit!=10000) {?>
								  <p class="title_summary"><strong><?= TEXT_ACTIVE_PROMO ?></strong></p>
								<? } ?>
								<? if ((empty($discount_value) && !($discount_values[discount_type]==1 && $discount_values[discount_value]==0)) &&  ($discount_type=='D' || $discount_type=='A') ){?>
								  <? 
								    if ($promo_type == 'pre_paid' ) {
								  ?>
									  <p style="font-size:15px;"><?= $period ?></p>
								  <?
								    }else  if ($promo_type != 'unlimited' ) { 
								  ?>
								    <p style="font-size:15px;"><strong><?= TRIAL ?></strong>: <?= $period ?></p>
								  <? 
								    }else{ 
								  ?>
								    <p style="font-size:15px;"><? printf(UNLIMITED, $duration, $abo_dvd_credit) ?></p>
								  <? 
								  } 
								?>
							<? } 
								$nb=3;?>

								<? if ($reconduction == 0){ ?>
								<? if ($abo_dvd_credit != 10000) { ?>	
								<p style="font-size:15px;"><strong><?= (($discount_values['discount_value'] > 0 || $discount_type=='' || ($discount_values[discount_type]==1 && $discount_values[discount_value]==0)) ? ROLLER_PAYED : ROLLER) ?></strong>: <?= $period_next ?>
								<? } else { 
									echo '<p style="font-size:15px;"><strong>'.ROLLER_PAYED.' </strong>: '.TEXT_VOD_UNLIMITED.' '.TEXT_FOR_PRICE.' &euro; '.$price_abo;
								 }} ?>	
								<? if ($nb_recurring > 0) echo TEXT_CONFIRM_4.' '.$nb_recurring.' '.TEXT_MONTHS ?>
								</p>
							</div>
							<? if ((empty($discount_value) && !($discount_values[discount_type]==1 && $discount_values[discount_value]==0))  && $reconduction==0 &&  ($discount_type=='D' || $discount_type=='A')){?>
								<p class="liner_step"></p>
							<div>
								<p class="title_summary"><strong><?= FIRST_PAYMENT ?></strong></p>
								<?php 
									$price = PRICE;
									$price = str_replace('{{price}}',$price_abo,$price);
									$price = str_replace('{{date}}',$date,$price);
									
								?>
								<p><?= $price ?></p>
							</div>
							<? }?>
              <p class="liner_step"></p>
							<table cellpadding="0" cellspacing="0" width='100%' align='center'>
								<tr>
									<td align="right"><strong><?= TEXT_DETAILS ?> &nbsp;</strong></td>
									<td align="left"><?= ucfirst(strtolower($customers_value['customers_lastname'])) ?></td>
								</tr>
								<tr>
									<td align="right"><strong></strong></td>

									<td align="left"><?= ucfirst(strtolower($customers_value['customers_firstname'])) ?></td>
								</tr>
								<tr>
									<td class="adresse" valign="top" align="right"></td>
									<td class="adresse" valign="top" align="left">
										<?= $address_book_values['entry_street_address'] ?>
										<br />
										<?= $address_book_values['entry_postcode'].' '.ucfirst(strtolower($address_book_values['entry_city']))?>
									</td>
								</tr>
								<tr>
									<td>
									</td>
									<td>
										<?= TEXT_CLIENT_PHONE ?>: <?= $customers_value['customers_telephone'] ?>
									</td>
								</tr>

							</table>
              <p class="liner_step"></p>
              <span style="font-size:15px;"><?= TEXT_HELP_TITLE ?></span>
              <table cellspacing="0" cellpadding="0" border="0" align="center" width="92%" >
                <tbody>
                  <tr>
                    <td width="12%" align="right" valign="top"><img src="images/jb/icon_tel.png" /></td>
                    <td width="2%"></td>
                    <td width="86%"><p> <span class="title_help"><?= TEXT_PHONE_HELP ?></p></td>
                  </tr>
                  <tr>
                    <td width="12%" align="right" valign="top"><img src="images/jb/icon_mail.png" /></td>
                    <td></td>
                    <td width="86%"><p><span class="title_help"><?= TEXT_MAIL_HELP ?></p></td>
                  </tr>
                </tbody>
              </table>
              <p class="liner_step"></p>
              <div class="buttons_end">
                <p  style="float: left;">
                  <a href='<?= $sponsorship_link ?>' name="sent" class="button_step" id="truc"><?= TEXT_REFERER ?> </a>
                </p>
                <p style="float: right;">
                  <input type="submit" name="sent" value="<?= FILL_UP ?>" class="button_step" id="step1">
                </p>
                <div style="clear: both;"></div>
              </div>
            </div>
          </div>
        </div>
<div style='clear:both'></div>
      </div>
			
    </div>
  </div>
</form>
<!-- MSN START -->
<img height="1" width="1" src="http://view.atdmt.com/action/ppbhes_BEHomeEntertainmentConfirmationPage0603_7"/>
<!-- MSN END -->
<!-- PTG -->
<img src="http://dvdpost.ptg.be/protocols/pixel.php" border="0" width="0" height="0" />
