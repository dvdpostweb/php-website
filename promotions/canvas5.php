<?
$imdb_id = 1602620;
$sql = 'select * from streaming_products 
join products_languages pl on pl.languages_id = streaming_products.language_id and languagenav_id='.$languages_id.'
 where ( streaming_products.status = "online_test_ok" and ((streaming_products.available_from <= date(now()) and streaming_products.expire_at >= date(now())) or (streaming_products.available_backcatalogue_from <= date(now()) and streaming_products.expire_backcatalogue_at >= date(now()))) and available = 1) and imdb_id = '.$imdb_id.' and country="BE" group by language_id';
 $query = tep_db_query($sql);
$sql_p = 'select * from products_description where products_id = 51 and language_id = '.$languages_id.' limit 1';
$query_p = tep_db_query($sql_p);
$data=tep_db_fetch_array($query_p)

?>
<link href="/stylesheet/streaming.css" media="all" rel="stylesheet" type="text/css" />
<link href="/stylesheet/facebox.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="/js/canvas5.js"></script>
<div id='facebox_center'>
<div id="facebox" style="top: 72.7px; margin:auto 0; ">   <div class="popup">       <table>         <tbody>           <tr>             <td class="tl"></td><td class="b"></td><td class="tr"></td>           </tr>           <tr>             <td class="b"><div class="ten"></div></td>             <td class="body">               <div class="content" style="display: block; ">
  <br><br>
  <div style="width:400px;margin:25px">
    <h2>Tape ton email pour bénéficier du film gratuit</h2>
    <br><br>
    <form id="sub_email">
      email : <input name="email" id="input_email" type="text">
      <input type='hidden' name='source' value='<?= $source ?>'>
      <input type='hidden' name='imdb_id' value='<?= $imdb_id ?>'>
      <input type="submit" id="sub">
      <div class='error' id='error3' style='display:none'>Email incorrect</div>
      <div class='error' id='error2' style='display:none'>vous ne pouvez plus regarder des films avec cette email</div>
      <div class='error' id='error1' style='display:none'>Vous êtes deja client</div>
      </form>
      <br><br>
  </div>
</div>             </td>             <td class="b"><div class="ten"></div></td>           </tr>           <tr>             <td class="bl"></td><td class="b"></td><td class="br"></td>           </tr>         </tbody>       </table>     </div>   </div>
</div>

<div id="wrap">
    <div id="maincontent">
      <div id="vod-wrap">
        <h2>
          <span id="vod_title"><?= TEXT_TITLE_FREE_VOD ?><span>
          </span></span>
        </h2>
        <div id="presentation">
          <div id="image_vod"><img alt="<?= TEXT_TITLE_FREE_VOD ?>" src="http://www.dvdpost.be/images/<?= $data['products_image_big']?>"></div>
        </div>
        <div class="choice_language">
          <h3><?= TEXT_CHOOSE_MOVIE ?></h3>
          <div id="choice_new" style="position: relative; overflow: hidden; ">
            <div id="step1" class="step" style="width: 696px; height: 120px; position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 1; ">
              <p class="choice_question"><?= TEXT_CHOOSE_LANGUAGE ?></p>
              <p class="audios">
                <? while($l=tep_db_fetch_array($query)){ ?>
                  <a href="/promotions/language.php?language_id=<?= $l['language_id']?>" class="btn language_btn"><strong><?= $l['languages_description']?></strong></a>
                <? } ?>
              </p>
            </div>
            <div id="step2" class="step" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 2; "></div>
            <div id="step3" class="step" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 1; "></div>
          </div>
        </div>
      </div>
    </div>
</div>
<div id="facebox_overlay" class="facebox_hide facebox_overlayBG" style="display: block; opacity: 0.4; "></div>