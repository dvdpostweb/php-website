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
			$produt_id=20;
		}	
		else{
			$nb_dvd=$_GET['dvd'];
			switch($nb_dvd)
			{
				case 2:
					$produt_id=17;	
				break;
				case 4:
					$produt_id=18;
				break;
				case 8:
					$produt_id=20;
				break;
				case 12:
					$produt_id=22;
				break;
				case 16:
					$produt_id=24;
				break;
				default:
					$produt_id=20;

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
    <div class="jblogo"><a href="/default.php">DVDPost.be</a></div>
    <div class="jbtopnav">
      <ul class="top-nav"><li class="retractation"><a href="/conditions.php#article3"><?= TEXT_RETRA ?> </a></li><li class="langues"><a href="/step2b.php?language=fr">FR</a></li>
        <li class="langues"><a href="/step2b.php?language=nl">NL</a></li>
        <li class="langues"> <a href="/step2b.php?language=en">EN</a> </li>
        <li><a class="login" href="/login.php">Login membres</a></li>
      </ul>
      <div style="clear:both;"></div>
    </div>
    <div style="clear:both;"></div>
    <div class="breadcrumb"><a href="" class="link_selected">Home &gt;</a> <a href="" class="link_selected">Step 1 <?= TEXT_TITLE_JACOB1 ?></a>> <a href="">Step 2 <?= TEXT_TITLE_JACOB2 ?></a></div>
    <div id="container">
      <div class="banner_title"><?= HUGE_CATALOG ?></div>
      <div class="banner_step" align="center">
        <p>
					<?= $promotion ?>
				</p>
        <span><a href="catalog.php" class="browse_button"><?= EXPLORER ?></a></span> </div>
      <div class="content_step">
			<? require('partial/default/jacob_questions.php') ?>

        </div>
        <div class="content_jb"> <div class="step_2 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="top"></div>
            <div class="middle_content">
              <div class="title_step2">STEP 2 <span class="red_font"><?= mb_strtoupper(TEXT_TITLE_JACOB2) ?></span></div> <div class="free_vod"> <img src="images/jb/free_vod_en.gif" /></div>
              <div style="clear:both;"></div>
              <a href ='step2b.php?dvd=2' class="dvd dvd_2  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=4' class="dvd dvd_4  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=8' class="dvd dvd_8  <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=12' class="dvd dvd_12 <?= $lang_short; ?>"></a>
              <a href ='step2b.php?dvd=16' class="dvd dvd_16 <?= $lang_short; ?>"></a>
            </div>
            <div class="end"></div>
          </div>
        </div>
      </div>
			<div style="clear:both"></div>
    </div>
  </div>
