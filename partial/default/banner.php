<? if (strpos(strtoupper($activation_code),'BGC') === 0) { ?> 
	<div class="banner_step_relance"  id="<?= $lang_short ?>" align="center">
		<p style="width: 400px;margin: 26px auto;"><?= $promotion ?></p>
	</div>
<? } else if($customer_values['activation_discount_code_id']==1022 || $activation_id == 1022 || $promo_id == 1022) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_<?= $lang_short ?>.jpg' /></p>
<? } else if(strpos(strtoupper($activation_code),'CHEF') === 0 || $customer_values['activation_discount_code_id']==1023) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_chef_<?= $lang_short ?>.jpg' /></p>
<? } else if(strpos(strtoupper($activation_code),'SHADOW') === 0 || $customer_values['activation_discount_code_id']==1032) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_shadows_<?= $lang_short ?>.jpg' /></p>
<? } else if($customer_values['activation_discount_code_id']==1023 || $activation_id == 1023 || $promo_id == 1023) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_svod_<?= $lang_short ?>.jpg' /></p>
<? } else {?>
<div class="banner_title"><?= HUGE_CATALOG ?></div>
<div class="banner_step" align="center">
  <p><?= $promotion ?></p>
  <span><a href="catalog.php" class="browse_button"><?= EXPLORER ?></a></span> </div>
<? }?>