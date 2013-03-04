<? $url = curPageURL2(); ?>

<style>
#promo_content {
  background-image:url(/images/canvas/fr/bg_promo.jpg);
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
    <h1> <a href="http://public.dvdpost.com/fr?url_promo=<?= urlencode($url) ?>" class="f-btn" style="">DVDPost.be</a> </h1>
    <ul id="promo_date" class="osc">
      <li>Offre valable jusqu'au <?= $maDate = date('d/m/Y', strtotime('+3 day')) ?></li>
    </ul>
  </div>
  <!--   ==============   END HEADER   ==============   -->
  <div class="container clearfix">
    <div id="promo_content">
      <h1>Découvrez <font color="#FF3300">gratuitement</font> le plus grand<br />
        catalogue de film en Belgique</h1>
      <div id="promo_form">
        <h2>Regardez aujourd'hui déjà <br />votre premier film</h2>
        <h3>Inscrivez vous pour profiter de <strong>4 films gratuits</strong>*</h3>
        <form name="verify_form" method="post" action="/step1.php" id="form_step"> 
					<input  TYPE="hidden" VALUE="<?php  echo $code ;?>" NAME="activation_code"></td>
					
				
        <p style="float:left;  padding-left:10px;margin-bottom: 5px">Votre adresse email:<br />
          <input class="inputs_promo_code" id='email' type="text"  name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" size="40" />
          
        </p>
        <p style="float:right; padding-right:10px;margin-bottom: 5px">Votre mot de passe :<br />
          <input class="inputs_promo_code" id='password' type="password" name="password_step" size="40"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>"  />
        </p>
        <p class="news">
          <input type='checkbox' checked="checked" name="marketing" class="Input1" value='YES' >
          <?php  echo TEXT_MARKETING_OK ?>
        </p>
        <span id='login_error'></span>
        <div class="clearfix"></div>
        <div class="garanties">
          <h4>Vos garanties</h4>
          <ul>
            <li class="engagement">Sans engagement</li>
            <li class="stop">Vous arretez quand <br />
              vous voulez</li>
            <li class="security">100% sécurisé</li>
          </ul>
        </div>
        <div class="avantages">
          <h4>Vos avantages</h4>
          <ul>
            <li class="film">Large catalogue de films</li>
            <li class="home">Louez les films 
              sans quitter votre fauteuil</li>
            <li class="platform">Multi-plateforme</li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <p style="padding-top:5px;">
          <input type="submit" border="0" align="absmiddle" id="submit_id" class="promo_button" name="sent" value="Essayez gratuitement" />
        </p>
        </form>
      </div>
    </div>
    
    <div id="arrow_down"><a href=""></a></div>
    <div id="warp">
      <div id="commentcamarche_content">
        <h2>Comment ca fonctionne ?</h2>
        <h3>Video à la demande (VOD)</h3>
        <table cellpadding="0" cellspacing="0" border="0">
          <tr id="vod">
            <td><img src="/images/promotions/vod.jpg" style="padding-left:20px;"/></td>
            <td><img src="/images/promotions/fr/streamingbutton.jpg"  style="padding-top:50px;"  /></td>
            <td><img src="/images/promotions/fr/icon_subtitles.gif"  style="padding-top:30px; padding-left:40px;" /></td>
            <td><img src="/images/promotions/tv_vod.jpg"  style="padding-top:14px;" /></td>
          </tr>
          <tr id="vod">
            <td class="step1">Choisissez un film<br />
              disponible en VOD</td>
            <td class="step2">Appuyez sur <br />
              le bouton regarder</td>
            <td class="step3">Choisissez la langue<br />
              du film et du sous-titre</td>
            <td class="step4">Profitez à votre aise<br />
              de votre film !</td>
          </tr>
        </table>
        <h3>Location DVD/Blu-ray</h3>
        <table cellpadding="0" cellspacing="0" border="0">
          <tr id="dvd">
            <td><img src="/images/promotions/dvd.jpg" /></td>
            <td><img src="/images/promotions/letter.jpg"  style="padding-top:28px;" /></td>
            <td><img src="/images/promotions/tv_dvd.jpg" style="padding-top:28px;" /></td>
            <td><img src="/images/promotions/poste.jpg" style="padding-top:14px;"/></td>
          </tr>
          <tr id="dvd">
            <td class="step1">Créez votre liste <br />
              de films souhaités</td>
            <td class="step2">Recevez les films <br />
              dans votre boîte aux lettres</td>
            <td class="step3">Profitez à votre aise<br />
              de vos films !</td>
            <td class="step4">Renvoyez les films dans<br />
              l'enveloppe pré-affranchie</td>
          </tr>
        </table>
      </div>
      <form name="verify_form" method="post" action="/step1.php" id="form_step"> 
      <div id="area_promo">
        <h2>Découvrez gratuitement le service <br />
          pendant 1 mois avec <strong>4 films offerts</strong></h2>
        <p style="float:left;  padding-left:200px;">Votre adresse email:<br />
          <input class="inputs_promo_code" id='email2' type="text"  name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" size="40" />
        </p>
        <p style="float:right; padding-right:200px;">Votre mot de passe :<br />
          <input class="inputs_promo_code" id='password2' type="password" name="password_step" size="40"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>"  />
          
        </p>
        <p class="news">
          <input type='checkbox' checked="checked" name="marketing" class="Input1" value='YES' >
          <?php  echo TEXT_MARKETING_OK ?>
        </p>
        
        <div class="clearfix"></div>
        <p align="center">
          <input type="submit" border="0" align="absmiddle" class="promo_button" id="submit_id2" name="sent" value="Essayez gratuitement" />
        </p>
      </div></form>
      <p align="center"><img src="/images/promotions/fr/info_tel.jpg" /> </p>
      <div id="promo_footer">*L'offre est valable pour un abonnement de 4 films ( 2 films dans tous les formats + 2 films uniquement en format VOD). Après le mois gratuit, l'abonnement de la formule 4 films est prolongée automatiquement à 9,95&euro; par mois. Vous pouvez modifier la formule de votre abonnement en contactant le service client au numéro gratuit 0800/95 990 ou au numéro payant 0032 2 5036811 pour les appels effectués hors de la Belgique. Si vous ne souhaitez pas prolonger votre abonnement il suffit de contacter notre service client par téléphone, au plus tard un jour ouvrable avant la fin de la période d'essai, et votre compte sera alors clÙturé sans aucun frais. Si vous annulez votre abonnement avant la fin de l'essai gratuit vous ne serez pas facturé.</div>
    </div>
  </div>
</div>
<div style='display:none'>
	<div id ='email_abo'><?= TEXT_ERROR_MAIL ?></div>
	<div id ='error_emaail2'><? TEXT_ERROR_MAIL2 ?></div>
</div>