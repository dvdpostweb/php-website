<? $url = curPageURL2(); ?>
<?

$email = '';
if(isset($_POST['email_address']))
  $email = $_POST['email_address'];
if(isset($_GET['email']))
  $email = $_GET['email'];
if(empty($email))
{
  $email = $_POST['email_address_step'];
}
?>
<style>
#promo_content {
  background-image:url(/images/canvas/<?= $lang_short ?>/<?= $image ?>);
}
</style>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/canvas3.js"></script>
<link href="/stylesheet/canvas2.css" media="all" rel="stylesheet" type="text/css" />
<link href="/stylesheet/canvas3.css" media="all" rel="stylesheet" type="text/css" />

<link href="/stylesheet/promotions.css" media="all" rel="stylesheet" type="text/css" />

<div id="wrap">
  <!--   ==============   HEADER   ==============   -->
  <div id="header" >
    <h1> 
      <a href="http://public.dvdpost.com/<?= $lang_short ?>?url_promo=<?= urlencode($url) ?>" class="f-btn" style="">DVDPost.be</a> 
    </h1>
    <h2> <a href="<?= $brand_url ?>" class="f-btn" style="background:url(../images/canvas/<?= $brand_logo ?>) "><?= $brand_url ?></a> </h2>

  </div>
  <!--   ==============   END HEADER   ==============   -->
  <div class="container clearfix">
    <div id="promo_content">
      <h1 style="color: <?= $text_color ?>;"><?= (isset($t) ? constant("TEXT_DISCOVER_$t") : TEXT_DISCOVER)  ?></h1>
      <div id="promo_form">
        <h2><?= TEXT_VOD_NOW ?></h2>
        <h3><?= constant("TEXT_CODE_$brand_code") ?></h3>
        <form name="verify_form" method="post" action="/activation_code_confirm.php" id="form_step">
          <div style="float:left;  padding-left:10px;width:200px;">
            <input type='hidden' name='url' value='<?= curPageURL2().'?error=1' ?>'>
            <input type="hidden" name="language" value="<?= $lang_short ?>">
            <p align="left"><?= PROMO_CODE ?> :<br />
              <input type="text" size="20" value="<?= $code ?>" class="inputs_promo_code" id="code3" name="code">
            </p>
            <? if($_GET['error']=='1') {?>
              <span id="login_error"><?= TEXT_CODE_ERROR ?></span>
              <? } ?>
            </div>
            <div style="float:right; padding-right:10px; width:200px; padding-top:7px;color:#212A31;"> <img src="/images/canvas/<?= $lang_short ?>/enveloppe_<?= $brand_code ?>.jpg" /></div>
            <div class="clearfix"></div>
            <p class="news">
              <input type="checkbox"  name="marketing" class="marketing3" value="YES">
              <?= TEXT_CONDITION_PROMO ?></p>
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
                <input type="submit" border="0" align="absmiddle" id="submit_id3" class="promo_button" name="sent" value="<?= TEXT_PROMO_SUBMIT ?>" style="background-color: <?= $color_btn ?>;" />
              </p>
            </form>
          </div>
        </div>
        <? if (!isset($hide_old)) {?>
          <? if(empty($banner_url)){?>
            <div class="promo_customers" style="background: url(../images/canvas/bg_banner_<?= $brand_code ?>.jpg) scroll 0 0 transparent;"><span><?= TEXT_OLD_CUST ?></span>

              <a href="http://public.dvdpost.com/<?= $lang_short ?>/phone_requests/new" target="_blank"><?= TEXT_CONTACT_PHILIPS ?></a> <?= TEXT_CONTACT_PHILIPS2 ?>
              <?} else {?>
                <div class="promo_customers" style="background: url(../images/canvas/bg_banner_<?= $brand_code ?>.jpg) scroll 0 0 transparent;"><span><?= constant("TEXT_OLD_CUST_$brand_code") ?></span>

                  <a href="http://public.dvdpost.com/<?= $lang_short ?>/<?= $banner_url ?>" target="_blank"><?= constant("TEXT_CONTACT_$brand_code") ?></a> <?= constant("TEXT_CONTACT2_$brand_code") ?>
                  <? }} ?>
                </div>

                <div id="warp">

<? if (!isset($hide_explain)) {?>
                  <div id="commentcamarche_content">
                    <h2><?= constant("TEXT_HOW_$brand_code") ?></h2>
                    <div class="promo_info">


                      <table cellpadding="0" cellspacing="0" border="0">
                        <tr id="promotions">
                          <td><img src="/images/promotions/<?= $image_promotion1 ?>" /></td>
                          <td><img src="/images/promotions/<?= $image_promotion2 ?>"  style="padding-top:28px;" /></td>
                          <td><img src="/images/promotions/<?= $image_promotion3 ?>" style="padding-top:28px;" /></td>
                          <td><img src="/images/promotions/<?= $image_promotion4 ?>" style="padding-top:14px;"/></td>
                        </tr>
                        <tr id="dvd">
                          <td class="step1"><?= constant("TEXT_P_STEP1_$brand_code") ?></td>
                          <td class="step2"><?= constant("TEXT_P_STEP2_$brand_code") ?></td>
                          <td class="step3"><?= constant("TEXT_P_STEP3_$brand_code") ?></td>
                          <td class="step4"><?= constant("TEXT_P_STEP4_$brand_code") ?></td>
                        </tr>
                      </table>
                    </div> 



                  </div>
                  <? } ?>
                  <div id="warp">
                    <div id="commentcamarche_content">
                      <? if(!isset($vod_hide)){ ?>
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
                        <? } ?>
                        <? if(!isset($dvd_hide)){ ?>

                          <?= TEXT_PROMO_DVD_TITLE ?>
                          <table cellpadding="0" cellspacing="0" border="0">
                            <tr id="dvd">
                              <td><img src="/images/promotions/<?= $lang_short ?>/dvd.jpg" /></td>
                              <td><img src="/images/promotions/letter.jpg"  style="padding-top:28px;" /></td>
                              <td><img src="/images/promotions/tv_dvd.jpg" style="padding-top:28px;" /></td>
                              <td><img src="/images/promotions/poste.jpg" style="padding-top:14px;"/></td>
                            </tr>
                            <tr id="dvd">
                              <?= TEXT_PROMO_DVD_DESC ?>
                            </tr>
                          </table>
                          <? } ?>
                        </div>
                        <form name="verify_form" method="post" action="/activation_code_confirm.php" id="form_step2">
                          <div id="area_promo">
                            <h2><?= constant('TEXT_FORM_'.$brand_code)?></h2>

                            <p align="center"><?= PROMO_CODE ?> :<br>
                              <input type='hidden' name='url' value='<?= curPageURL2().'?error=1' ?>'>
                              <input type="text" size="20" value="<?= $code ?>" class="inputs_promo_code" id="code4" name="code">
                            </p>
                            <? if($_GET['error']=='1') {?>
                              <span id="login_error2"><?= TEXT_CODE_ERROR ?></span>
                              <? } ?>
                              <p class="news_form">
                                <input type="checkbox" name="marketing" class="marketing4" value="YES">
                                <input type="hidden" name="language" value="<?= $lang_short ?>">
                                <?= TEXT_CONDITION_PROMO ?>
                              </p>
                              <div class="clearfix"></div>
                              <p align="center">
                                <input type="submit" border="0" align="absmiddle" class="promo_button" id="submit_id4" name="sent" value="<?= TEXT_PROMO_SUBMIT ?>">
                              </p>
                            </div>
                          </form>
                          <p align="center"><img src="/images/promotions/<?= $lang_short ?>/info_tel.jpg" /> </p>
                          <div id="promo_footer"><?= isset($promo) ? constant("TEXT_".$promo."_FOOTER") : TEXT_PROMO_FOOTER ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div style="display:none" id='text_error_conditions'><?= TEXT_ERROR_CONDITIONS ?></div>