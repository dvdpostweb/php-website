<? if(!($discount_values[discount_type]==1 && $discount_values[discount_value]==0) || $customer_values['activation_discount_code_id']==1022 ){ ?>
<? if (strpos(strtoupper($activation_code),'BGC') === 0) { ?> 
	<div class="banner_step_relance"  id="<?= $lang_short ?>" align="center">
		<p style="width: 400px;margin: 26px auto;"><?= $promotion ?></p>
	</div>
<? } else if($customer_values['activation_discount_code_id']==10220 || $activation_id == 10220 || $promo_id == 10220) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_<?= $lang_short ?>.jpg' /></p>
<? } else if($customer_values['activation_discount_code_id']==1461 || $activation_id == 1461 || $promo_id == 1461) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_<?= $lang_short ?>.jpg' /></p>
<? } else if(strpos(strtoupper($activation_code),'CHEF') === 0 || $customer_values['activation_discount_code_id']==1023) {?>
  	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_chef_<?= $lang_short ?>.jpg' /></p>
<? } else if(strpos(strtoupper($activation_code),'DP23DT42') === 0 || $customer_values['activation_discount_code_id']==1038) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_paypal_<?= $lang_short ?>.jpg' /></p>
<? } else if(strpos(strtoupper($activation_code),'SHADOW') === 0 || $customer_values['activation_discount_code_id']==1032) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_shadows_<?= $lang_short ?>.jpg' /></p>
<? } else if($customer_values['activation_discount_code_id']==1023 || $activation_id == 1023 || $promo_id == 1023) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_svod_<?= $lang_short ?>.jpg' /></p>
<? } else if($customer_values['activation_discount_code_id']==1041 || $activation_id == 1041 || $promo_id == 1041) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_perenoel_<?= $lang_short ?>.jpg' /></p>
<? } else if($customer_values['activation_discount_code_id']==1040 || $activation_id == 1040 || $promo_id == 1040) {?>
	<p style="width: 889px;margin: 26px auto;"><img src='/images/banner_step_jason_<?= $lang_short ?>.jpg' /></p>

<? } else {?>
  <?
  $test = 0;
  $list = array(1044,1045,1046,1047,1048,1049,1050,1051,1052,1053,1054,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085); 
  foreach ($list as $value)
  {
    if($customer_values['activation_discount_code_id']==$value || $activation_id == $value || $promo_id == $value)
    {
      $test = 1;
      echo '<p style="width: 889px;margin: 26px auto;"><img src="/images/landing_step/banner_step_'.$value.'_'.$lang_short.'.jpg" /></p>';
    }
  }
  if($test == 0){
  ?>
  
<div class="banner_title"><?= HUGE_CATALOG ?></div>
<div class="banner_step" align="center">
  <p><?= $promotion ?></p>
  <span><a href="catalog.php" class="browse_button"><?= EXPLORER ?></a></span> </div>
<? }}} ?>