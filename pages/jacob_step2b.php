<!-- debut du CONTAINER -->
<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
<style>
.free_vod {
float:right;
padding-right:19px;
}
</style>
<?php 
		echo '<link rel="stylesheet" type="text/css" href="'.getBestMatchToIncludeAny('stylesheet/prices_belgique.css','.css').'">';
		if(empty($_GET['dvd'])){
			$nb_dvd=8;
			$produt_id=127766;
		}	
		else{
			$nb_dvd=$_GET['dvd'];
			switch($nb_dvd)
			{
				case 3:
					$produt_id=127762;	
				break;
				case 5:
					$produt_id=127764;
				break;
				case 8:
					$produt_id=127766;
				break;
				case 13:
					$produt_id=127768;
				break;
				case 15:
					$produt_id=127769;
				break;
				default:
					$produt_id=127764;

			}
		}

	$code = tep_db_query("SELECT activation_discount_code_id, activation_discount_code_type  from customers WHERE customers_id ='".$customers_id."'");
	$code_values = tep_db_fetch_array($code);
	if ($code_values['activation_discount_code_id']=='298'){
	 $show_discount_form=1;
  	}

  	if ($code_values['activation_discount_code_type']=='D'){
  		$code_explain = tep_db_query("SELECT  banner,footer,  discount_validityto from discount_code WHERE discount_code_id ='".$code_values['activation_discount_code_id']."'");
  		$code_explain_values = tep_db_fetch_array($code_explain);
	  	$disc_explain='';
	  	switch ($code_explain_values['footer']){
		 	case 'FREETRIAL':
		 	$promo_footer=TEXT_FOOTER_EXPLAIN;
		 	break;	
		  	
		 	case 'PERCENT':		 	
		 	$promo_footer=str_replace("µµµdateµµµ",$code_explain_values['discount_validityto'],TEXT_FOOTER_PERCENT);
		 	break;
		  	
		 	case 'VALID_TILL':
		 	$promo_footer=str_replace("µµµdateµµµ",$code_explain_values['discount_validityto'],TEXT_FOOTER_TILL);
		 	break;		  	
		 }
  	}else{
	$activation_explain = tep_db_query("SELECT  ac.banner from activation_code ac WHERE  ac.activation_id ='".$code_values['activation_discount_code_id']."'");
  	if ($activation_explain_values = tep_db_fetch_array($activation_explain)){
	$disc_explain='';
		 	$promo_footer=TEXT_FOOTER_ACTIVATION;
  
		}	  
  	}
?>
<div class="jbwrapper">
  <div class="jbcontainer">
    <div id="container">
      <? require('partial/default/banner.php') ?>
      <div class="content_step">
			<? require('partial/default/jacob_questions.php') ?>

        </div>
        <div class="content_jb"> <div class="step_2 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="content <?= ($discount_type == 1) ? "promo".round($discount_value) : "" ?>">
              <div class="title_step2">STEP 2 <span class="green_font"><?= mb_strtoupper(TEXT_TITLE_JACOB2) ?></span></div> 
              <div style="clear:both;"></div>
              <a href ='step2b.php?dvd=3' class="dvd dvd_2  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=5' class="dvd dvd_4  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=8' class="dvd dvd_8  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=13' class="dvd dvd_12 <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=15' class="dvd dvd_16 <?= $lang_short; ?>"></a>
              <font size="1"><?= TEXT_STEP2 ?></font>
              
            </div>
          </div>
        </div>
      </div>
			<div style="clear:both"></div>
    </div>
  </div>
