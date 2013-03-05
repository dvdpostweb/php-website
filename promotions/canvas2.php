<? $url = curPageURL2(); ?>

<style>
#promo_content {
  background-image:url(/images/canvas/<?= $lang_short ?>/bg_promo.jpg);
}
</style>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/canvas2.js"></script>

<link href="/stylesheet/promotions.css" media="all" rel="stylesheet" type="text/css" />
<body id="hp" class="normal" >
<!--   ==============   HEADER   ==============   -->
<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header" >
    <h1> <a href="http://public.dvdpost.com/<?= $lang_short ?>?url_promo=<?= urlencode($url) ?>" class="f-btn" style="">DVDPost.be</a> </h1>
    <ul id="promo_date" class="osc">
      <li><?= TEXT_UNTIL ?> <?= $maDate = date('d/m/Y', strtotime('+3 day')) ?></li>
    </ul>
  </div>
  <!--   ==============   END HEADER   ==============   -->
  <div class="container clearfix">
    <div id="promo_content">
      <h1><?= TEXT_DISCOVER ?></h1>
      <div id="promo_form">
        <h2><?= TEXT_VOD_NOW ?></h2>
        <h3><?= TEXT_PROMO_4?></h3>
        <form name="verify_form" method="post" action="/step1.php" id="form_step"> 
					<input  TYPE="hidden" VALUE="<?php  echo $code ;?>" NAME="activation_code"></td>
					<input type="hidden" name='language' value='<?= $lang_short ?>'>
				
        <p style="float:left;  padding-left:10px;margin-bottom: 5px"><?= TEXT_EMAIL_STEP ?><br />
          <input class="inputs_promo_code" id='email' type="text"  name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" size="40" />
          
        </p>
        <p style="float:right; padding-right:10px;margin-bottom: 5px"><?= TEXT_PASS_STEP ?><br />
          <input class="inputs_promo_code" id='password' type="password" name="password_step" size="40"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>"  />
        </p>
        <p class="news">
          <input type='checkbox' checked="checked" name="marketing" class="Input1" value='YES' >
          <?php  echo TEXT_MARKETING_OK ?>
        </p>
        <span id='login_error'></span>
        <div class="clearfix"></div>
        <div class="garanties">
          <h4><?= TEXT_GUARANTIE ?></h4>
          <ul>
            <?= TEXT_GUARANTIE_DESC ?>
          </ul>
        </div>
        <div class="avantages">
          <h4><?= TEXT_ADVANTAGES ?></h4>
          <ul>
            <?= TEXT_ADVANTAGES_DESC ?>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p style="padding-top:5px;">
          <input type="submit" border="0" align="absmiddle" id="submit_id" class="promo_button" name="sent" value="<?= TEXT_PROMO_SUBMIT ?>" />
        </p>
        </form>
      </div>
    </div>
    
    <div id="arrow_down"><a href=""></a></div>
    <div id="warp">
      <div id="commentcamarche_content">
        <?= TEXT_VOD_DESC ?>
        <table cellpadding="0" cellspacing="0" border="0">
          <tr id="vod">
            <td><img src="/images/promotions/vod.jpg" style="padding-left:20px;"/></td>
            <td><img src="/images/promotions/<?= $lang_short ?>/streamingbutton.jpg"  style="padding-top:50px;"  /></td>
            <td><img src="/images/promotions/<?= $lang_short ?>/icon_subtitles.gif"  style="padding-top:30px; padding-left:40px;" /></td>
            <td><img src="/images/promotions/tv_vod.jpg"  style="padding-top:14px;" /></td>
          </tr>
          <tr id="vod">
            <?= TEXT_PROMO_VOD_DESC ?>
          </tr>
        </table>
        <?= TEXT_PROMO_DVD_TITLE ?>
        <table cellpadding="0" cellspacing="0" border="0">
          <tr id="dvd">
            <td><img src="/images/promotions/dvd.jpg" /></td>
            <td><img src="/images/promotions/letter.jpg"  style="padding-top:28px;" /></td>
            <td><img src="/images/promotions/tv_dvd.jpg" style="padding-top:28px;" /></td>
            <td><img src="/images/promotions/poste.jpg" style="padding-top:14px;"/></td>
          </tr>
          <tr id="dvd">
            <?= TEXT_PROMO_DVD_DESC ?>
          </tr>
        </table>
      </div>
      <form name="verify_form" method="post" action="/step1.php" id="form_step"> 
      <div id="area_promo">
        <h2><?= TEXT_FORM_AREA_PROMO ?></h2>
        <p style="float:left;  padding-left:200px;"><?= TEXT_EMAIL_STEP ?><br />
          <input class="inputs_promo_code" id='email2' type="text"  name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" size="40" />
        </p>
        <p style="float:right; padding-right:200px;"><?= TEXT_PASS_STEP ?><br />
          <input class="inputs_promo_code" id='password2' type="password" name="password_step" size="40"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>"  />
          
        </p>
        <p class="news">
          <input type='checkbox' checked="checked" name="marketing" class="Input1" value='YES' >
          <input type="hidden" name='language' value='<?= $lang_short ?>'>
					
          <?php  echo TEXT_MARKETING_OK ?>
        </p>
        
        <div class="clearfix"></div>
        <p align="center">
          <input type="submit" border="0" align="absmiddle" class="promo_button" id="submit_id2" name="sent" value="<?= TEXT_PROMO_SUBMIT ?>" />
        </p>
      </div></form>
      <p align="center"><img src="/images/promotions/<?= $lang_short ?>/info_tel.jpg" /> </p>
      <div id="promo_footer"><?= TEXT_PROMO_FOOTER ?></div>
    </div>
  </div>
</div>
<div style='display:none'>
	<div id ='email_abo'><?= TEXT_ERROR_MAIL ?></div>
	<div id ='error_emaail2'><? TEXT_ERROR_MAIL2 ?></div>
</div>