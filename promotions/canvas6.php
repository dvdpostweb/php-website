
<script type="text/javascript">
function cdtd() {
var xmas = new Date("January 09, 2014 23:59:00")
var now = new Date();
var timeDiff = xmas.getTime() - now.getTime();
if (timeDiff <= 0) {        
    clearInterval(timer);
    /*document.getElementById('einde').innerHTML = '<span style="color:#FF0000;">Volgende woensdag een nieuwe aanbieding!</span>';*/
		return;
      // Run any code needed for countdown completion here
}
var seconds = Math.floor(timeDiff / 1000);
var minutes = Math.floor(seconds / 60);
var hours = Math.floor(minutes / 60);
var days = Math.floor(hours / 24);
minutes %= 60;
seconds %= 60;
hours %= 24
document.getElementById("daysBox").innerHTML = days;
document.getElementById("hoursBox").innerHTML = hours;
document.getElementById("minsBox").innerHTML = minutes;
document.getElementById("secsBox").innerHTML = seconds;
var timer = setTimeout('cdtd()',1000);
}
</script>

<? $url = curPageURL2(); ?>
<style>
#promo_content {
  background-image:url(//images/promotions/canvas/<?= $lang_short ?>/<?= $image ?>);
}
</style>
<script type="text/javascript" src="/js/jquery.js"></script>

<link href="/stylesheet/promotions.css" media="all" rel="stylesheet" type="text/css" />
<!--   ==============   HEADER   ==============   -->
<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header" >
    <h1> <a href="http://public.dvdpost.com/<?= $lang_short ?>?url_promo=<?= urlencode($url) ?>" class="f-btn" style="">DVDPost.be</a> </h1>
  </div>
  <!--   ==============   END HEADER   ==============   -->
  <div id="vp_header">
    <div id="vp_top_header"> </div>
    <div class="blockLeft">
      <h1><?= PRIVATE_TITLE ?></h1>
    </div>
    <p class="header_discount show"> <span><?= PRIVATE_UNTIL ?></span><strong><i class="maxDiscount">-60<sup>%</sup></i></strong> </p>
    <div id="vp_countdown">
      <div>
        <p><?= PRIVATE_TIME_LEFT ?></p>
        <p><?= PRIVATE_END ?></p>
        <table id="countInfos">
          <tbody>
            <tr>
              <td><?= PRIVATE_DAY ?></td>
              <td><?= PRIVATE_HOUR ?></td>
              <td><?= PRIVATE_MIN ?></td>
              <td><?= PRIVATE_SEC ?></td>
            </tr>
            <tr>
              <td ><div id='daysBox'></div></td>
              <td ><div id='hoursBox'></div></td>
              <td ><div id='minsBox'></div></td>
              <td ><div id='secsBox'></div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <!--products-->
    <div style="display: block;" class="pbx_clearFix" id="vp_products">
      <!--line 1-->
      <div class="column grid8 first_item"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD4&language=<?= $lang_short ?>"  class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO1_H2 ?></h2>
        <h3><?= PRIVATE_PROMO1_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPDVD4&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/bronze_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO1_DIV ?></div>
        <p class="show"><i class="maxDiscount">-10<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD4&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?> </a></div>
      </div>
      <div class="column grid8"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD4&language=<?= $lang_short ?>" class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO2_H2 ?></h2>
        <h3><?= PRIVATE_PROMO2_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPVOD4&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/bronze_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO2_DIV ?></div>
        <p class="show"><i class="maxDiscount">-20<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD4&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?></a></div>
      </div>
      <div class="column grid8 silver"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD6&language=<?= $lang_short ?>" class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO3_H2 ?></h2>
        <h3><?= PRIVATE_PROMO3_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPDVD6&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/silver_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO3_DIV ?></div>
        <p class="show"><i class="maxDiscount">-30<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD6&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?></a></div>
      </div>
      <!--line 2-->
      <div class="column grid8 first_item silver"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD6&language=<?= $lang_short ?>"  class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO4_H2 ?></h2>
        <h3><?= PRIVATE_PROMO4_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPVOD6&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/silver_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO4_DIV ?></div>
        <p class="show"><i class="maxDiscount">-40<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD6&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?></a></div>
      </div>
      <div class="column grid8 gold"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD12&language=<?= $lang_short ?>"  class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO5_H2 ?></h2>
        <h3><?= PRIVATE_PROMO5_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPDVD12&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/gold_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO5_DIV ?></div>
        <p class="show"><i class="maxDiscount">-50<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPDVD12&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?></a></div>
      </div>
      <div class="column grid8 gold"> <a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD12&language=<?= $lang_short ?>" class="title"> <span class="table"><span class="row"><span class="cell">
        <h2><?= PRIVATE_PROMO6_H2 ?></h2>
        <h3><?= PRIVATE_PROMO6_H3 ?></h3>
        </span></span></span> </a> <a class=" picture img_popup_link" href="http://www.dvdpost.be/step1.php?activation_code=VPVOD12&language=<?= $lang_short ?>"> <span class="table"><span class="row"><span class="cell"> <img src="/images/promotions/gold_star.jpg" height="157" width="281" /> </span></span></span> </a>
        <div class="infos"><?= PRIVATE_PROMO6_DIV ?></div>
        <p class="show"><i class="maxDiscount">-60<sup>%</sup></i></p>
        <div align="center"><a href="http://www.dvdpost.be/step1.php?activation_code=VPVOD12&language=<?= $lang_short ?>" class="btn_credits btn_credits_options"><?= PRIVATE_SIGNUP ?></a></div>
      </div>
      <div style='clear:both'></div>
    </div>
    <div class="faq">
      <h1>FAQ</h1>
      <h2><?= PRIVATE_Q1 ?></h2>
      <?= PRIVATE_R1 ?>
      <h2><?= PRIVATE_Q2 ?></h2>
     <?= PRIVATE_R2 ?>
      <h2><?= PRIVATE_Q3 ?></h2>
      <?= PRIVATE_R3 ?>
      <h2><?= PRIVATE_Q4 ?></h2>
      <?= PRIVATE_R4 ?>
      <h2><?= PRIVATE_Q5 ?></h2>
      <?= PRIVATE_R5 ?>
      <h2><?= PRIVATE_Q6 ?></h2>
      <?= PRIVATE_R6 ?>
	 <div class="conditions"> <h1><?= CONDITIONS ?></h1>
    <?= CONDTIONS_TITLE ?>
	  </div>
	  
	  </div>
  </div>
</div>
<div style='display:none'>
	<div id ='email_abo'><?= TEXT_ERROR_MAIL ?></div>
	<div id ='error_emaail2'><? TEXT_ERROR_MAIL2 ?></div>
	<div id ='email_not_abo'><?= str_replace('_code_', $code, TEXT_NOT_ABO) ?></div>
</div>
<script type="text/javascript">cdtd();</script>